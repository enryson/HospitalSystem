<?php
require_once("DatabaseConnection.php");

class SpecialtyDoctor
{
    private $doctorCRM;
    private $specialtyId;


    public function setSpecialtyDoctor($doctorCRM,$specialtyId) {

        $query = 'INSERT INTO specialty(specialtyNome ) VALUES ("")';

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

    public function deleteSpecialtyDoctor($id)
    {
        $database = new DatabaseConnection();

        $query = 'DELETE FROM specialty WHERE specialtyId="' . $id . '"';

        $database->connection();

        $database->query($query);
    }

}
?>