<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}
	//------------------------------------------------------------------------------->>>>
	//---------------------------- 		  Views        ------------------------------>>>>
	//------------------------------------------------------------------------------->>>>

	public function index()
	{
		$this->load->view('login');
	}

	public function logout()
	{
		$data = $this->session->all_userdata();
		foreach ($data as $row => $rows_value) {
			$this->session->unset_userdata($row);
		}
		redirect('login');
	}


	//------------------------------------------------------------------------------->>>>
	//----------------------------		 Functions	   ------------------------------>>>>
	//------------------------------------------------------------------------------->>>>

	public function userLogin()
	{
		$insertData['email'] = $this->input->post('email');
		$insertData['password'] = base64_encode($this->input->post('password'));
		$userdata = $this->user_model->userLogin($insertData);
		if ($userdata != []) {
			$this->session->set_userdata('userid', $userdata['id']);
			$this->session->set_userdata('name', $userdata['name']);
			$this->session->set_userdata('username', $userdata['username']);
			$this->session->set_userdata('email', $userdata['email']);
			$this->session->set_userdata('role', $userdata['role']);

			redirect('welcome/dashboard');
		} else {
			redirect('login');
		}
	}
	public function validation()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim');
		$this->form_validation->set_rules('admin_pass', 'Password', 'trim');
		if ($this->form_validation->run()) {
			$result = $this->user_model->can_login($this->input->post('email'), $this->input->post('admin_pass'));
			//   print_r($result);
			//   exit();
			if ($result == '') {

				redirect('welcome/dashboard');
			} else {
				$this->session->set_flashdata('message', $result);
				redirect('login');
			}
		} else {
			$this->index();
		}
	}
}
