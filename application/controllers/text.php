<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {


	public function index()
	{
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->form_validation->set_rules('phone', 'add_number', 'required');			
		$this->form_validation->set_rules('area', 'area', 'required');			
		$this->form_validation->set_rules('age', 'age', '');			
		$this->form_validation->set_rules('gender', 'gender', '');			
		$this->form_validation->set_rules('question', 'question', '');
		
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('welcome_message');
		}
		else
		{
			$this->load->model('sms_model');
			$this->sms_model->register_number(set_value('add_area'), set_value('add_number'), set_value('age'), set_value('gender'), set_value('myquestion'))
			$this->load->view('welcome_message');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */