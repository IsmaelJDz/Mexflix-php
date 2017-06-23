<?php
require_once('Model.php');
/**
 *
 */
class StatusModel extends Model
{
    public $status_id;
    public $status;

    function __construct()
    {
        $this->db_name = 'mexflix';
    }

    public function create( $status_data = array() ){
        foreach ($status_data as $key => $value) {
            $$key = $value;
        }

        $this->query = "INSERT INTO status (status_id,status) VALUES ($status_id, '$status')";
        $this->set_query();
    }
    public function read( $status_id = '' ){
        $this->query = ($status_id != '') ?
        "SELECT * FROM status WHERE status_id = $status_id" :
        "SELECT * FROM status";

        $this->get_query();
        //var_dump($this->rows);
        //return $this->rows;

        $num_rows = count( $this->rows );
        $data = array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
            //$data[$key] = $value;
        }

        return $data;
    }
    public function update( $status_data = array() ){
        foreach ($status_data as $key => $value) {
            $$key = $value;
        }

        $this->query = "UPDATE status SET status_id = $status_id, status = '$status' WHERE status_id = $status_id";
        $this->set_query();
    }
    public function delete( $status_id = '' ){
        $this->query = "DELETE FROM status WHERE status_id = $status_id";
        $this->set_query();
    }

    public function __destruct()
    {
        unset($this);
    }
}
