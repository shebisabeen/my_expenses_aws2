<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('api_model');
		if (!$this->session->userdata('userid')) {
			redirect('login');
		}
	}
	//------------------------------------------------------------------------------->>>>
	//---------------------------- 		  Views        ------------------------------>>>>
	//------------------------------------------------------------------------------->>>>

	public function index()
	{
		$data['usersList'] = $this->user_model->getUsers();
		$this->load->view('listUsers', $data);
	}

	public function listUsers()
	{
		if ($this->session->userdata('role') == "admin") {
			$data['usersList'] = $this->user_model->getUsers();
			$this->load->view('listUsers', $data);
		} else {
			redirect('welcome/dashboard');
		}
	}

	public function addUser()
	{
		if ($this->session->userdata('role') == "admin") {
			$this->load->view('addUser');
		} else {
			redirect('welcome/dashboard');
		}
	}

	public function myProfile()
	{
		$userId =  $this->session->userdata('userid');
		$data['userData'] = $this->user_model->getUserById($userId);
		$this->load->view('myProfile', $data);
	}

	public function editUser()
	{
		if ($this->session->userdata('role') == "admin") {
			$userId =  $this->input->post('userid');
			$data['userData'] = $this->user_model->getUserById($userId);
			$this->load->view('editUser', $data);
		} else {
			redirect('welcome/dashboard');
		}
	}

	//------------------------------------------------------------------------------->>>>
	//----------------------------		 Functions	   ------------------------------>>>>
	//------------------------------------------------------------------------------->>>>

	public function createUser()
	{
		if ($this->session->userdata('role') == "admin") {
			$insertData['id'] = uniqid();

			$insertData['name'] = $this->input->post('name');
			$shortname = str_split($this->input->post('name'), 15);
			$insertData['username'] = str_replace(" ", "_", strtolower($shortname[0]));
			$insertData['email'] = $this->input->post('email');
			$insertData['password'] = base64_encode($this->input->post('password'));
			$insertData['otherdata'] = "";

			$this->user_model->createUser($insertData);

			redirect('users/listUsers');
		} else {
			redirect('welcome/dashboard');
		}
	}

	public function updateUser()
	{
		if ($this->session->userdata('role') == "admin") {
			$updateData['id'] = $this->input->post('userId');
			$updateData['name'] = $this->input->post('name');
			$updateData['email'] = $this->input->post('email');
			$updateData['otherdata'] = "";
			$isActiveFlag = $this->input->post('isactive');
			$updateData['is_active'] = 0;
			if ($isActiveFlag == "yes") {
				$updateData['is_active'] = 1;
			}

			$response = $this->user_model->updateUser($updateData);
			if ($response['status'] == true) {
				redirect('users/listUsers');
			}
		} else {
			redirect('welcome/dashboard');
		}
	}

	public function updateMyProfile()
	{
		$updateData['id'] = $this->input->post('userId');
		$updateData['name'] = $this->input->post('name');
		$updateData['email'] = $this->input->post('email');

		$response = $this->user_model->updateProfile($updateData);
		if ($response['status'] == true) {
			redirect('users/myProfile');
		}
	}

	public function changePassword()
	{
		$updateData['id'] = $this->input->post('userId');
		$password = (null != $this->input->post('password') && $this->input->post('password') !== "") ? $this->input->post('password') : "password";
		$updateData['password'] = base64_encode($password);

		$response = $this->user_model->updateUserPassword($updateData);
		if ($response['status'] == true) {
			redirect('users/listUsers');
		}
	}
}
