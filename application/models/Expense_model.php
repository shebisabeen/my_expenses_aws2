<?php
class Expense_model extends CI_Model
{
    function createExpense($data)
    {
        try {

            $newExpense = array(
                'id' => $data['id'],
                'title' => $data['title'],
                'type' => $data['type'],
                'amount' => $data['amount'],
                'spent_date' =>    $data['spent_date'],
                'created_at' => date("Y-m-d H:i:s"),
                'userid' =>    $data['userid'],
                'otherdata' =>    $data['otherdata']
            );

            $this->db->insert('expenses', $newExpense);

            $response = array('status' => true, 'message' => 'Expense Created Successfully', 'expense' => $newExpense);
        } catch (Exception $e) {
            $response = array('status' => false, 'message' => 'Something Went Wrong');
        }
        return $response;
    }


    function getExpenses($userId)
    {
        try {
            $expensesArray = $this->db->select('*')
                ->from('expenses')
                ->where('userid', $userId)
                ->order_by('spent_date', 'desc')
                ->get()->result_array();

            $response = $expensesArray;
        } catch (Exception $e) {
            $response = [];
        }
        return $response;
    }

    function getExpenseById($expenseId)
    {
        try {
            $expensesArray = $this->db->select('*')
                ->from('expenses')
                ->where('id', $expenseId)
                ->get()->result_array();

            $response =  $expensesArray[0];
        } catch (Exception $e) {
            $response = array('status' => false, 'message' => 'Something Went Wrong');
        }
        return $response;
    }

    function updateExpense($data)
    {
        try {
            $newExpense = array(
                'title' => $data['title'],
                'type' => $data['type'],
                'amount' => $data['amount'],
                'spent_date' =>    $data['spent_date'],
                'userid' =>    $data['userid'],
                'otherdata' =>    $data['otherdata']
            );

            $this->db->where('id', $data['id']);
            $this->db->update('expenses', $newExpense);

            $response = array('status' => true, 'message' => 'Expense Updated Successfully', 'expense' => $newExpense);
        } catch (Exception $e) {
            $response = array('status' => false, 'message' => 'Something Went Wrong');
        }
        return $response;
    }

    function deleteExpense($id)
    {
        $this->db->delete('expenses', array('id' => $id));
        $response = array('status' => true, 'message' => 'Expense Deleted Successfully', 'expenseid' => $id);
        return $response;
    }


    function getDashboardTotals($userId)
    {
        try {

            $date = new DateTime("now");

            $curr_date = $date->format('Y-m-d');
            $previous_first_date = date('Y-m-d', strtotime('first day of last month'));
            $previous_last_date = date('Y-m-d', strtotime('last day of last month'));

            $todaysTotal = $this->db->select_sum('amount')
                ->from('expenses')
                ->where('userid', $userId)
                ->where('DATE(spent_date)', $curr_date)
                ->get()->result_array();

            $sevenDaysTotal = $this->db->select_sum('amount')
                ->from('expenses')
                ->where('userid', $userId)
                ->where('spent_date BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()')
                ->get()->result_array();

            $currentMonthTotal = $this->db->select_sum('amount')
                ->from('expenses')
                ->where('userid', $userId)
                ->where('MONTH(spent_date)', date('m')) //For current month
                ->where('YEAR(spent_date)', date('Y'))
                ->get()->result_array();

            $previousMonthTotal = $this->db->select_sum('amount')
                ->from('expenses')
                ->where('userid', $userId)
                ->where('spent_date BETWEEN "' . $previous_first_date . '" AND "' . $previous_last_date . '" ')
                ->get()->result_array();

            $response['todaysTotal'] = $todaysTotal[0]['amount'] > 0 ? round($todaysTotal[0]['amount'], 2) : 0;
            $response['sevenDaysTotal'] = $sevenDaysTotal[0]['amount'] > 0 ? round($sevenDaysTotal[0]['amount'], 2) : 0;
            $response['currentMonthTotal'] = $currentMonthTotal[0]['amount'] > 0 ? round($currentMonthTotal[0]['amount'], 2) : 0;
            $response['previousMonthTotal'] = $previousMonthTotal[0]['amount'] > 0 ? round($previousMonthTotal[0]['amount'], 2) : 0;
        } catch (Exception $e) {
            $response['todaysTotal'] = 0;
            $response['sevenDaysTotal'] = 0;
            $response['currentMonthTotal'] = 0;
            $response['previousMonthTotal'] = 0;
        }
        return $response;
    }

    function getDashboardTotalsByTypes($userId)
    {
        try {

            $currentMonthTypesTotal = $this->db->select_sum('amount')
                ->select('type')
                ->from('expenses')
                ->where('userid', $userId)
                ->where('MONTH(spent_date)', date('m')) //For current month
                ->where('YEAR(spent_date)', date('Y'))
                ->group_by('type')
                ->order_by('SUM(amount)', 'desc')
                ->get()->result_array();

            // printAndExit($currentMonthTypesTotal, "CurrentMonthlyTypes");

            $response = $currentMonthTypesTotal;
        } catch (Exception $e) {
            $response = [];
        }
        return $response;
    }

    function getDashboardTotalsByMonths($userId)
    {
        try {

            $MonthlyTotals = $this->db->select_sum('amount')
                ->select('YEAR(spent_date) as Year')
                ->select('MONTHNAME(spent_date) as Month')
                ->from('expenses')
                ->where('userid', $userId)
                ->group_by('YEAR(spent_date)')
                ->group_by('MONTH(spent_date)')
                ->order_by('YEAR(spent_date)', 'desc')
                ->order_by('MONTH(spent_date)', 'desc')
                ->limit(6)
                ->get()->result_array();

            // printAndExit($MonthlyTotals, "MonthlyTotals");

            $response = $MonthlyTotals;
        } catch (Exception $e) {
            $response = [];
        }
        return $response;
    }
}
