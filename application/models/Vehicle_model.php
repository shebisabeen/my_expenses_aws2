<?php
class Vehicle_model extends CI_Model
{
    function createVehicle($data)
    {
        try {
            $vehicleCount = $this->db->select('number')
                ->from('vehicles')
                ->where('number', $data['number'])
                ->count_all_results();

            if ($vehicleCount > 0) {
                $response = array('status' => false, 'message' => 'Vehicle already entered');
            } else {
                $newVehicle = array(
                    'id' => $data['id'],
                    'number' => $data['number'],
                    'type' => $data['type'],
                    'company' => $data['company'],
                    'model' => $data['model'],
                    'colour' =>    $data['colour'],
                    'case_no' =>    $data['case_no'],
                    'station' =>    $data['station'],
                    'owner' =>    $data['owner'],
                    'created_at' => date("Y-m-d H:i:s"),
                    'case_description' =>    $data['case_description'],
                    'missing_date' =>    $data['missing_date'],
                    'status' =>    $data['status'],
                    'added_by' =>    $data['added_by'],
                    'otherdata' =>    $data['otherdata']
                );

                $this->db->insert('vehicles', $newVehicle);

                $response = array('status' => true, 'message' => 'Vehicle Created Successfully', 'vehicle' => $newVehicle);
            }
        } catch (Exception $e) {
            $response = array('status' => false, 'message' => 'Something Went Wrong');
        }
        return $response;
    }


    function getVehicles()
    {
        try {
            $vehiclesArray = $this->db->select('vehicles.*, stations.name as stationName,stations.district as district')
                ->from('vehicles')
                ->join('stations', 'stations.id = vehicles.station')
                ->get()->result_array();

            $response = $vehiclesArray;
        } catch (Exception $e) {
            $response = [];
        }
        return $response;
    }

    function getVehicleById($vehicleId)
    {
        try {
            $vehiclesArray = $this->db->select('vehicles.*, stations.name as stationName,stations.district as district')
                ->from('vehicles')
                ->join('stations', 'stations.id = vehicles.station')
                ->where('vehicles.id', $vehicleId)
                ->get()->result_array();

            $response =  $vehiclesArray[0];
        } catch (Exception $e) {
            $response = array('status' => false, 'message' => 'Something Went Wrong');
        }
        return $response;
    }

    function updateVehicle($data)
    {
        try {
            $newVehicle = array(
                'number' => $data['number'],
                'type' => $data['type'],
                'company' => $data['company'],
                'model' => $data['model'],
                'colour' =>    $data['colour'],
                'case_no' =>    $data['case_no'],
                'station' =>    $data['station'],
                'owner' =>    $data['owner'],
                'case_description' =>    $data['case_description'],
                'missing_date' =>    $data['missing_date'],
                'status' =>    $data['status'],
                'added_by' =>    $data['added_by'],
                'otherdata' =>    $data['otherdata']
            );

            $this->db->where('id', $data['id']);
            $this->db->update('vehicles', $newVehicle);

            $response = array('status' => true, 'message' => 'Vehicle Updated Successfully', 'vehicle' => $newVehicle);
        } catch (Exception $e) {
            $response = array('status' => false, 'message' => 'Something Went Wrong');
        }
        return $response;
    }

    function deleteVehicle($id)
    {
        $this->db->delete('vehicles', array('id' => $id));
        $response = array('status' => true, 'message' => 'Vehicle Deleted Successfully', 'vehicleid' => $id);
        return $response;
    }

    function getVehiclesCounts()
    {
        try {
            $totalCount = $this->db->select('COUNT(id) as totalCount')
                ->from('vehicles')
                ->get()->result_array();
            $response['totalCount'] = $totalCount[0]['totalCount'];

            $missingCount = $this->db->select('COUNT(id) as missingCount')
                ->from('vehicles')
                ->where('status', "missing")
                ->get()->result_array();
            $response['missingCount'] = $missingCount[0]['missingCount'];

            $recoveredCount = $this->db->select('COUNT(id) as recoveredCount')
                ->from('vehicles')
                ->where('status', "recovered")
                ->get()->result_array();
            $response['recoveredCount'] = $recoveredCount[0]['recoveredCount'];
        } catch (Exception $e) {
            $response = [];
        }
        return $response;
    }
}
