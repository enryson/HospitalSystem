<?php
require_once("DatabaseConnection.php");

class Apointment
{
    private $doctorCRM;
    private $specialtyId;
    private $accountId;
    private $apointmenStatus;
    private $apointmenDateTime;
    private $apointmentDetails;
    private $apointmentId;


    public function setApointment($doctorCRM, $specialtyId, $accountId, $apointmenStatus, $apointmenDateTime, $apointmentDetails)
    {
        $query = 'INSERT INTO apointment( 
                    doctorCRM,
                    specialtyId,
                    accountId,
                    apointmenStatus,
                    apointmenDateTime,
                    apointmentDetails
                    ) VALUES (
            "' . $doctorCRM . '",
            "' . $specialtyId . '",
            "' . $accountId . '",
            "' . $apointmenStatus . '",
            "' . $apointmenDateTime . '",
            "' . $apointmentDetails . '")
            ';
         
        $database = new DatabaseConnection();

        $database->connection();

        $database->query($query);
    }

    public function updateApointment($doctorCRM, $specialtyId, $accountId, $apointmenStatus, $apointmenDateTime, $apointmentDetails,$apointmentId)
    {
        $query = 'UPDATE apointment SET (
            doctorCRM = "' . $doctorCRM . '",
            specialtyId = "' . $specialtyId . '",
            accountId = "' . $accountId . '",
            apointmenStatus ="' . $apointmenStatus . '",
            apointmenDateTime ="' . $apointmenDateTime . '",
            apointmentDetails = "' . $apointmentDetails . '"
            WHERE apointmentId= "' . $apointmentId . '"
            ';
            
        $database = new DatabaseConnection();

        $database->connection();

        $database->query($query);
    }



    public function getApointment($query)
    {

        $database = new DatabaseConnection();

        $database->connection();

        $database->query($query);

        $this->_row = @mysqli_num_rows($database->result);

        $this->_result = $database->result;
    }

    public function deleteApointment($id)
    {
        $database = new DatabaseConnection();

        $query = 'DELETE FROM apointment WHERE apointmentId="' . $id . '"';

        $database->connection();

        $database->query($query);
    }

}
?>