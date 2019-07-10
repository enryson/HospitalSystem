<?php
require_once("DatabaseConnection.php");


class Doctor
{

    private $accountId;
    private $doctorCRM;


    public function setDoctor($accountId,$doctorCRM ) {

        
        $query = 'INSERT INTO doctor( accountId, doctorCRM ) 
            VALUES  (
            "' . $accountId . '",
            "' . $doctorCRM . '")
            ';


        $database = new DatabaseConnection();

        $database->connection();

        $database->query($query);
    }


    public function updateDoctor ( $accountId, $doctorCRM) {


        $query = 'UPDATE doctor SET 
            accountEmail = "' . $accountId . '",
            WHERE doctorCRM= "' . $doctorCRM . '"
        ';

        $database = new DatabaseConnection();

        $database->connection();

        $database->query($query);

        $this->_row = @mysqli_affected_rows($database->result);

        $this->_result = $database->result;
    }


    public function getDoctor($query)
    {

        $database = new DatabaseConnection();

        $database->connection();

        $database->query($query);

        $this->_row = @mysqli_num_rows($database->result);

        $this->_result = $database->result;
    }

    public function deleteDoctor($id)
    {
        $database = new DatabaseConnection();

        $query = 'DELETE FROM doctor WHERE doctorCRM="' . $id . '"';

        $database->connection();

        $database->query($query);
    }
}
?>