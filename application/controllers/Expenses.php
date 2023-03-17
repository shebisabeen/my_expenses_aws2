<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Expenses extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('expense_model');
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
		$this->listExpenses();
	}

	public function listExpenses()
	{
		$userId = $this->session->userdata('userid');
		$data['expensesList'] = $this->expense_model->getExpenses($userId);
		$this->load->view('listExpenses', $data);
	}

	public function addExpense()
	{
		$data['typesList'] = $this->api_model->getTypes();
		$this->load->view('addExpense', $data);
	}

	public function editExpense()
	{
		$expenseId =  $this->input->post('expenseId');
		$data['typesList'] = $this->api_model->getTypes();
		$data['expenseData'] = $this->expense_model->getExpenseById($expenseId);
		$this->load->view('editExpense', $data);
	}

	public function viewExpense($id = 0)
	{
		$expenseId = null !== $this->input->post('expenseId') ? $this->input->post('expenseId') : $id;
		$data['expenseData'] = $this->expense_model->getExpenseById($expenseId);
		$this->load->view('viewExpense', $data);
	}

	//------------------------------------------------------------------------------->>>>
	//----------------------------		 Functions	   ------------------------------>>>>
	//------------------------------------------------------------------------------->>>>

	public function createExpense()
	{
		$insertData['id'] = uniqid();

		$insertData['title'] = $this->input->post('title');
		$insertData['type'] = $this->input->post('type') != "" ? $this->input->post('type') : "OTHER";
		$insertData['amount'] = $this->input->post('amount');
		$insertData['spent_date'] = $this->input->post('spent_date');
		$insertData['userid'] = $this->session->userdata('userid');
		$insertData['otherdata'] = "";

		$response = $this->expense_model->createExpense($insertData);
		if ($response['status'] == true) {
			redirect('expenses/listExpenses');
		}
	}

	public function updateExpense()
	{
		$updateData['id'] = $this->input->post('expenseId');
		$updateData['title'] = $this->input->post('title');
		$updateData['type'] = $this->input->post('type');
		$updateData['amount'] = $this->input->post('amount');
		$updateData['spent_date'] = $this->input->post('spent_date');
		$updateData['userid'] = $this->session->userdata('userid');
		$updateData['otherdata'] = "";

		$response = $this->expense_model->updateExpense($updateData);
		if ($response['status'] == true) {
			redirect('expenses/listExpenses');
		}
	}

	public function deleteExpense()
	{
		$expenseId = $this->input->post('expenseId');

		$response = $this->expense_model->deleteExpense($expenseId);
		if ($response['status'] == true) {
			redirect('expenses/listExpenses');
		}
	}
}
