<?php
class User_model extends CI_Model
{
    function createUser($data)
    {
        try {
            $emailUsedCount = $this->db->select('email')
                ->from('users')
                ->where('email', $data['email'])
                ->count_all_results();

            if ($emailUsedCount > 0) {
                $response = array('status' => false, 'message' => 'Email ID already used');
            } else {
                $newUser = array(
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'username' => $data['username'],
                    'email' => $data['email'],
                    'password' => $data['password'],
                    'is_active' => '1',
                    'created_at' => date("Y-m-d H:i:s"),
                    'otherdata' =>    $data['otherdata']
                );

                $this->db->insert('users', $newUser);

                $response = array('status' => true, 'message' => 'User Created Successfully', 'user' => $newUser);
            }
        } catch (Exception $e) {
            $response = array('status' => false, 'message' => 'Something Went Wrong');
        }
        return $response;
    }

    function can_login($email, $password)
    {
        $passwordEncoded = base64_encode($password);
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                if ($passwordEncoded == $row->password) {
                    $this->session->set_userdata('userid', $row->id);
                    $this->session->set_userdata('name', $row->name);
                    $this->session->set_userdata('username', $row->username);
                    $this->session->set_userdata('email', $row->email);
                    $this->session->set_userdata('role', $row->role);
                } else {
                    return 'Username or Password is wrong';
                }
            }
        } else {
            return 'Username or Password is wrong';
        }
    }

    function userLogin($data)
    {
        try {
            $usersArray = $this->db->select('id, name ,email, username')
                ->from('users')
                ->where('email', $data['email'])
                ->where('password', $data['password'])
                ->get()->result_array();

            $userCount = count($usersArray, 0);
            if ($userCount == 1) {
                // $response = array('status' => true, 'message' => 'User Logged in Successfully', 'userData' => $usersArray[0]);
                $response = $usersArray;
            } else {
                // $response = array('status' => false, 'message' => 'Incorrect Login');
                $response = [];
            }
        } catch (Exception $e) {
            // $response = array('status' => false, 'message' => 'Something Went Wrong');
            $response = [];
        }
        return $response;
    }

    function getUsers()
    {
        try {
            $usersArray = $this->db->select('users.id, users.name, users.username, users.email, users.is_active')
                ->from('users')
                ->get()->result_array();
            $response = $usersArray;
        } catch (Exception $e) {
            $response = [];
        }
        return $response;
    }

    function getUserById($userId)
    {
        try {
            $usersArray = $this->db->select('users.id, users.name, users.username, users.email, users.is_active')
                ->from('users')
                ->where('users.id', $userId)
                ->get()->result_array();

            $response = $usersArray[0];
        } catch (Exception $e) {
            $response = [];
        }
        return $response;
    }

    function updateUser($data)
    {
        try {
            $newUser = array(
                'name' => $data['name'],
                'email' => $data['email'],
                'is_active' =>    $data['is_active'],
                'otherdata' =>    $data['otherdata']
            );

            $this->db->where('id', $data['id']);
            $this->db->update('users', $newUser);

            $response = array('status' => true, 'message' => 'User Updated Successfully', 'user' => $newUser);
        } catch (Exception $e) {
            $response = array('status' => false, 'message' => 'Something Went Wrong');
        }
        return $response;
    }

    function updateProfile($data)
    {
        try {
            $newUser = array(
                'name' => $data['name'],
                'email' => $data['email']
            );

            $this->db->where('id', $data['id']);
            $this->db->update('users', $newUser);

            $response = array('status' => true, 'message' => 'User Updated Successfully', 'user' => $newUser);
        } catch (Exception $e) {
            $response = array('status' => false, 'message' => 'Something Went Wrong');
        }
        return $response;
    }

    function updateUserPassword($data)
    {
        try {
            $newUser = array(
                'password' => $data['password']
            );

            $this->db->where('id', $data['id']);
            $this->db->update('users', $newUser);

            $response = array('status' => true, 'message' => 'User Password Updated Successfully', 'user' => $newUser);
        } catch (Exception $e) {
            $response = array('status' => false, 'message' => 'Something Went Wrong');
        }
        return $response;
    }
}
