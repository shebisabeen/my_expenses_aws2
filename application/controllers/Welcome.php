<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('api_model');
		$this->load->model('expense_model');
		// $this->load->helper(array('common_helper'));
		if (!$this->session->userdata('userid')) {
			redirect('login');
		}
	}

	//------------------------------------------------------------------------------->>>>
	//---------------------------- 		  Views        ------------------------------>>>>
	//------------------------------------------------------------------------------->>>>

	public function index()
	{
		$this->dashboard();
	}
	public function dashboard()
	{
		$userId = $this->session->userdata('userid');
		$data['dashboardCounts'] = $this->expense_model->getDashboardTotals($userId);
		$data['currentMonthlyTypes'] = $this->expense_model->getDashboardTotalsByTypes($userId);
		$data['LastFewMonths'] = $this->expense_model->getDashboardTotalsByMonths($userId);
		// printAndExit($data['CurrentMonthlyTypes'], "CurrentMonthlyTypes");
		$this->load->view('dashboard', $data);
	}
}
