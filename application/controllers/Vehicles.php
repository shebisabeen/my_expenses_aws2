<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vehicles extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('vehicle_model');
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
		$this->load->view('listVehicles');
	}

	public function listVehicles()
	{
		$data['vehiclesList'] = $this->vehicle_model->getVehicles();
		$this->load->view('listVehicles', $data);
	}

	public function addVehicle()
	{
		$data['districtsList'] = $this->api_model->getDistricts();
		$this->load->view('addVehicle', $data);
	}

	public function editVehicle()
	{
		$vehicleId =  $this->input->post('vehicleid');
		$data['districtsList'] = $this->api_model->getDistricts();
		$data['vehicleData'] = $this->vehicle_model->getVehicleById($vehicleId);
		$this->load->view('editVehicle', $data);
	}

	public function viewVehicle($id = 0)
	{
		$vehicleId = null !== $this->input->post('vehicleid') ? $this->input->post('vehicleid') : $id;
		$data['vehicleData'] = $this->vehicle_model->getVehicleById($vehicleId);
		$this->load->view('viewVehicle', $data);
	}

	//------------------------------------------------------------------------------->>>>
	//----------------------------		 Functions	   ------------------------------>>>>
	//------------------------------------------------------------------------------->>>>

	public function createVehicle()
	{
		$insertData['id'] = uniqid();

		$insertData['number'] = strtoupper($this->input->post('number'));
		$insertData['type'] = $this->input->post('type');
		$insertData['company'] = strtoupper($this->input->post('company'));
		$insertData['model'] = strtoupper($this->input->post('model'));
		$insertData['colour'] = strtoupper($this->input->post('colour'));
		$insertData['case_no'] = strtoupper($this->input->post('case_no'));
		$insertData['station'] = $this->input->post('station');
		$insertData['owner'] = $this->input->post('owner');
		$insertData['case_description'] = $this->input->post('case_description');
		$insertData['missing_date'] = $this->input->post('missing_date');
		$insertData['status'] = $this->input->post('status');
		$insertData['added_by'] = $this->session->userdata('userid');
		$insertData['otherdata'] = "";

		$response = $this->vehicle_model->createVehicle($insertData);
		if ($response['status'] == true) {
			redirect('vehicles/listVehicles');
		}
	}

	public function updateVehicle()
	{
		$updateData['id'] = $this->input->post('vehicleId');
		$updateData['number'] = strtoupper($this->input->post('number'));
		$updateData['type'] = $this->input->post('type');
		$updateData['company'] = strtoupper($this->input->post('company'));
		$updateData['model'] = strtoupper($this->input->post('model'));
		$updateData['colour'] = strtoupper($this->input->post('colour'));
		$updateData['case_no'] = strtoupper($this->input->post('case_no'));
		$updateData['station'] = $this->input->post('station');
		$updateData['owner'] = $this->input->post('owner');
		$updateData['case_description'] = $this->input->post('case_description');
		$updateData['missing_date'] = $this->input->post('missing_date');
		$updateData['status'] = $this->input->post('status');
		$updateData['added_by'] = $this->session->userdata('userid');
		$updateData['otherdata'] = "";

		$response = $this->vehicle_model->updateVehicle($updateData);
		if ($response['status'] == true) {
			redirect('vehicles/listVehicles');
		}
	}

	public function deleteVehicle()
	{
		$vehicleId = $this->input->post('vehicleid');

		$response = $this->vehicle_model->deleteVehicle($vehicleId);
		if ($response['status'] == true) {
			redirect('vehicles/listVehicles');
		}
	}
}
