<?php
require_once("../Model/Doctor.php");


function doctorList()
{
    global $rowDoctor;
    global $rsDoctor;

    $doctor = new Doctor();

    $doctor->getDoctor('SELECT * FROM doctor INNER JOIN accounts ON doctor.accountId = accounts.accountId');

    $rowDoctor = $doctor->_row;
    $rsDoctor = $doctor->_result;
}

function doctorInsert($id)
{

    global $rowDoctor;
    global $rsDoctor;

    $doctor = new Doctor();

    $doctor->getDoctor('SELECT * FROM doctor INNER JOIN accounts ON doctor.accountId = accounts.accountId WHERE accounts.accountId="' . $id . '"');

    $rowDoctor = $doctor->_row;
    $rsDoctor = $doctor->_result;

    if (isset($_POST['update'])) {

        $accountId = $id;
        $doctorCRM = $_POST['doctorCRM'];
        
        if($doctorCRM != null and $doctorCRM != 0){
            $doctor->setDoctor($accountId, $doctorCRM);
        }
    }

    if (isset($_POST['delete'])) {
        $doctor->deleteDoctor($_POST['doctorCRM']);
    }
}
