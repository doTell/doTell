<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');

class Sms_model extends CI_Model {

	public function process_text($phone, $text)
	{
		$this->db->where('phone', $phone);
		$this->db->limit(1);
		$this->db->from('users');
		$q = $this->db->get();
		if ($q->num_rows() > 0)
		{
			$this->db->where('answer_id', $q->row()->id);
			$this->db->where('closed', 0);
			$this->db->from('sent_text');
			$t = $this->db->get();
			if ($t->num_rows() > 0)
			{
				//if answering submit answer
				$answer = array(
					'user_id' => $q->row()->id,
					'question_id' => $t->row()->question_id,
					'response' => $text,
					'date' => time()
				);
				$this->db->insert('answers', $answer);
			} else {
				//submit question
				$question = array(
					'user_id' => $q->row()->id,
					'question' => $text
				);
				$this->db->insert('questions', $question);
			}
		}
	}

	public function send_question($qid, $user_id)
	{
		$text = array(
			'asker_id' => $user_id,
			'question_id' => $qid
			);
		$this->db->insert('sent_texts', $text);
	}

	public function register_number($area, $number, $age, $gender, $question)
	{
		$user = array(
				'phone' => $number,
				'area_code' => $area,
				'age' => $age,
				'gender' => $gender,
			);
		$this->db->insert('users', $user);
		$question = array(
			'user_id' => $this->db->insert_id(),
			'question' => $question
		);
		$this->db->insert('questions', $question);
		$phone_number = $area . $number;
		$this->curl->simple_post('https://secure.mcommons.com/profiles/join', array('opt_in_path[]'=>'134401', 'person[phone]' => $phone_number), array(CURLOPT_BUFFERSIZE => 10));
	}

	public function send_text($phone, $text)
	{
// Start session (also wipes existing/previous sessions)
$this->curl->create('https://secure.mcommons.com/api/send_message');
// More human looking options
$this->curl->option('buffersize', 10);

// Login to HTTP user authentication
$this->curl->http_login('keepevets@gmail.com', 'dotelldotell');

// Post - If you do not use post, it will just run a GET request
$post = array('campaign_id'=>'103711', 'phone_number' => $phone, 'body' => $text);
$this->curl->post($post);

// Execute - returns responce
return $this->curl->execute();
	}

}
