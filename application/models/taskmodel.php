<?php
class TaskModel extends CI_Model {

    public $_tablename;

    function __construct()
    {
        $this->_tablename = "task";
        parent::__construct();
    }

    public function addTask($pmData)
    {
        $this->db->insert($this->_tablename, $pmData);
        return $this->db->insert_id();
    }

    function get_enums($field){
        //$query = "SHOW COLUMNS FROM ".$this->_tablename." LIKE '$field'";
        $row = $this->db->query("SHOW COLUMNS FROM ".$this->_tablename." LIKE '$field'")->row()->Type;
        $regex = "/'(.*?)'/";
        preg_match_all( $regex , $row, $enum_array );
        $enum_fields = $enum_array[1];
        foreach ($enum_fields as $key=>$value)
        {
            $enums[$value] = $value;
        }
        return $enums;
    }

    public function getAllTask($pmOrder = "desc")
    {
        $this->db->order_by("id", $pmOrder); 
        $query = $this->db->get($this->_tablename);
        return $query->result();
    }

    public function getTask($pmData, $pmSingleRow = false, $pmOrder = "asc")
    {
        $this->db->where($pmData);
        $this->db->order_by("id", $pmOrder); 
        $query = $this->db->get($this->_tablename);
        $result = $pmSingleRow ? $query->row() : $query->result();
        return $result;
    }

    public function updateTask($pmData, $pmWhere)
    {
        $vUpdateStatus = $this->db->update($this->_tablename, $pmData, $pmWhere);
        return $vUpdateStatus;
    }

    public function updateOverallTaskStatus($taskIds,$status)
    {
        $this->db->where_in("id",$taskIds);
        $vUpdateStatus = $this->db->update($this->_tablename, array("status"=>$status));
        return $vUpdateStatus;
    }

    public function deleteTask($pmData)
    {
        $this->db->where($pmData);
        $vStstus = $this->db->delete($this->_tablename);
        return $vStstus;
    }
}