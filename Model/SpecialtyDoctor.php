<?php
require_once("DatabaseConnection.php");

class SpecialtyDoctor
{
    private $doctorCRM;
    private $specialtyId;


    public function setSpecialtyDoctor($doctorCRM,$specialtyId) {

        $query = 'INSERT INTO specialtyDoctor(doctorCRM,specialtyId ) 
                    VALUES ("'. $doctorCRM .'","' .$specialtyId .'")';
        $database = new DatabaseConnection();
        
        $database->connection();

        $database->query($query);
    }
    
    public function getSpecialtyDoctor($query)
    {

        $database = new DatabaseConnection();

        $database->connection();

        $database->query($query);

        $this->_row = @mysqli_num_rows($database->result);

        $this->_result = $database->result;
        
    }

    public function deleteSpecialtyDoctor($doctorCRM,$specialtyId)
    {
        $database = new DatabaseConnection();

        $query = 'DELETE FROM specialtyDoctor WHERE doctorCRM="' . $doctorCRM . '" AND specialtyId="'. $specialtyId .'"';

        $database->connection();
        //echo $query;
        $database->query($query);
    }

}
?>