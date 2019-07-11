<?php
require_once("../Model/SpecialtyDoctor.php");

function specialtyDoctorList()
{
    global $rowSpecialtyDoctor;
    global $rsSpecialtyDoctor;

    $specialtyDoctor = new SpecialtyDoctor();

    $specialtyDoctor->getSpecialtyDoctor('SELECT * FROM specialtyDoctor 
            INNER JOIN specialty ON specialtyDoctor.specialtyId = specialty.specialtyId');

    $rowSpecialtyDoctor = $specialtyDoctor->_row;
    $rsSpecialtyDoctor = $specialtyDoctor->_result;
}

function getspecialtyDoctor($id)
{
    
    global $rowSpecialtyDoctorGet;
    global $rsSpecialtyDoctorGet;

    $specialtyDoctor = new SpecialtyDoctor();

    $specialtyDoctor->getSpecialtyDoctor('SELECT * FROM specialtyDoctor 
            INNER JOIN specialty ON specialtyDoctor.specialtyId = specialty.specialtyId WHERE doctorCRM="'. $id .'"');

    $rowSpecialtyDoctorGet = $specialtyDoctor->_row;
    $rsSpecialtyDoctorGet = $specialtyDoctor->_result;

    
}

function specialtyDoctorInsert()
{
    global $rowSpecialtyDoctor;
    global $rsSpecialtyDoctor;

    $specialtyDoctor = new SpecialtyDoctor();

    $specialtyDoctor->getSpecialtyDoctor('SELECT * FROM specialtyDoctor 
            INNER JOIN specialty ON specialtyDoctor.specialtyId = specialty.specialtyId');

    $rowSpecialtyDoctor = $specialtyDoctor->_row;
    $rsSpecialtyDoctor = $specialtyDoctor->_result;

    if (isset($_POST['addSpecialty'])) { 
        
        $doctorCRM = $_POST['doctorCRM'];
        $specialtyId = $_POST['specialtyId'];
        $specialtyDoctor->setSpecialtyDoctor($doctorCRM,$specialtyId);

        //header("Location: /Views/SpecialtyRegister.php");
    }

    if (isset($_POST['deleteSpecialty'])) {
        
        $specialtyDoctor->deleteSpecialtyDoctor($_POST['doctorCRM'],$_POST['specialtyId']);
    }
}