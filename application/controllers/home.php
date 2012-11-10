<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {


	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function test()
	{
		$this->load->model('sms_model');
		$message = $this->sms_model->send_text($this->input->post('phone'), $this->input->post('message'));
		print_r($message);
		echo "ya";
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */