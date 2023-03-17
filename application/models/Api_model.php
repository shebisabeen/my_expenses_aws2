<?php
class Api_model extends CI_Model
{
    function insertType($data)
    {
        try {
            $nameUsedCount = $this->db->select('name')
                ->from('types')
                ->where('name', $data['name'])
                ->count_all_results();
            if ($nameUsedCount == 0) {
                $newUser = array(
                    'id' => $data['typeId'],
                    'name' => $data['name']
                );

                $this->db->insert('types', $newUser);

                $response = array('status' => true, 'message' => 'Type Created Successfully', 'type' => $newUser);
            } else {
                $response = array('status' => true, 'message' => 'Already present');
            }
        } catch (Exception $e) {
            $response = array('status' => false, 'message' => 'Something Went Wrong');
        }
        return $response;
    }

    function getTypes()
    {
        $typesArray = $this->db->select('*')
            ->from('types')
            ->order_by('name', 'asc')
            ->get()->result_array();
        return $typesArray;
    }
}
