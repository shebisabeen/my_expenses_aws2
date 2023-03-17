<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Types extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
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
		$data['typesList'] = $this->api_model->getTypes();
		$this->load->view('listTypes');
	}

	public function listTypes()
	{
		$data['typesList'] = $this->api_model->getTypes();
		$this->load->view('listTypes', $data);
	}
	public function addType()
	{
		$this->load->view('addType');
	}


	//------------------------------------------------------------------------------->>>>
	//----------------------------		 Functions	   ------------------------------>>>>
	//------------------------------------------------------------------------------->>>>

	public function insertType()
	{
		$insertData['typeId'] = uniqid();
		$insertData['name'] = strtoupper($this->input->post('name'));
		if (trim($insertData['name']) != "") {
			$this->api_model->insertType($insertData);
		}

		$this->listTypes();
	}
	public function viewType()
	{
		$data = [];
		$this->load->view('viewType', $data);
	}
	public function editType()
	{
		$data = [];
		$this->load->view('editType', $data);
	}
}
