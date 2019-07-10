<?php
require_once("DatabaseConnection.php");

class Specialty
{
    private $specialtyId;
    private $specialtyNome;


    public function setSpecialty($specialtyNome) {

        $query = 'INSERT INTO specialty(specialtyNome ) VALUES ("' . $specialtyNome . '")';

        $database = new DatabaseConnection();

        $database->connection();

        $database->query($query);
    }
    
    public function getSpecialty($query)
    {

        $database = new DatabaseConnection();

        $database->connection();

        $database->query($query);

        $this->_row = @mysqli_num_rows($database->result);

        $this->_result = $database->result;
    }

    public function deleteSpecialty($id)
    {
        $database = new DatabaseConnection();

        $query = 'DELETE FROM specialty WHERE specialtyId="' . $id . '"';

        $database->connection();

        $database->query($query);
    }

}
?>