<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {


	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function post_text()
	{
		$this->load->model('sms_model');
		$this->sms_model->
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */