<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {


	public function index()
	{
		$this->load->library('user_agent');
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->form_validation->set_rules('phone', 'phone', 'required');			
		$this->form_validation->set_rules('area', 'area', 'required');			
		$this->form_validation->set_rules('age', 'age', '');			
		$this->form_validation->set_rules('gender', 'gender', '');			
		$this->form_validation->set_rules('question', 'question', 'required');
		
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE) // first load or invalid
		{
			if ($this->agent->is_mobile())
			{
				$this->load->view('mobile');
			}
			else
			{
				$this->load->view('desktop');
			}
		}
		else // 
		{
			$this->load->model('sms_model');
			$this->sms_model->register_number(set_value('area'), set_value('phone'), set_value('age'), set_value('gender'), set_value('myquestion'))
			//$message = $this->sms_model->send_text($this->input->post('phone'), $this->input->post('message'));
			//print_r($message);
			$this->load->view('desktop');
			}
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */