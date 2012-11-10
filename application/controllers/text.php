<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Text extends CI_Controller {

	public function post_text()
	{
		$this->load->model('sms_model');
		$args = $this->input->post('args');
		$phone = $this->input->post('phone');
		$this->sms_model->post_text($args, $phone);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */