<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');

class User_model extends CI_Model {

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
			'question_id', => $qid
			);
		$this->db->insert('sent_texts', $text);
	}

	public function register_number($number, $age, $gender, $question)
	{

	}

	public function send_text($phone, $text)
	{

	}

}
