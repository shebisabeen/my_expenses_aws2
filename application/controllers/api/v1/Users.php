<?php defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('api_model');
        $this->load->helper(array('common_helper'));
        header('Content-Type: application/json');
    }

    public function createUser()
    {
        $inputData = json_decode(trim(file_get_contents('php://input')), true);

        $data['userId'] = uniqid();
        $token = generateToken(32);

        date_default_timezone_set("Asia/Kolkata");
        $currentTime = date("d-m-Y h:i:sa");

        $data['name'] = $inputData['name'];
        $data['email'] = $inputData['email'];
        $data['password'] = hash('sha256', $inputData['password']);
        $data['role'] = $inputData['role'];
        $data['station'] = isset($inputData['station']) && $inputData['station'] != "" ? $inputData['station'] : "";
        $data['otherdata'] = array(
            'token' => $token,
            'createdAt' => $currentTime,
        );

        $response =  $this->api_model->createUser($data);

        header('Content-Type: application/json');
        echo json_encode($response);
    }


    public function userLogin()
    {
        $inputData = json_decode(trim(file_get_contents('php://input')), true);

        $data['email'] = $inputData['email'];
        $data['password'] = hash('sha256', $inputData['password']);

        $loginResponse =  $this->api_model->userLogin($data);

        $response = array('status' => true, 'message' => 'User Logged in Successfully', 'userData' => $loginResponse['userData']);

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function getUsers()
    {
        $response = $this->api_model->getUsers();

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function getUserById($userId)
    {
        $response = $this->api_model->getUserById($userId);

        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
