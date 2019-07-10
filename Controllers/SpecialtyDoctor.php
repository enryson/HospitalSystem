<?php
require_once("../Model/Specialty.php");

function specialtyDoctorList()
{
    global $rowSpecialtyDoctor;
    global $rsSpecialtyDoctor;

    $specialtyDoctor = new SpecialtyDoctor();

    $specialtyDoctor->getSpecialtyDoctor("SELECT * FROM specialty");

    $rowSpecialtyDoctor = $specialtyDoctor->_row;
    $rsSpecialtyDoctor = $specialtyDoctor->_result;
}


function specialtyDoctorInsert()
{
    global $rowSpecialtyDoctor;
    global $rsSpecialtyDoctor;

    $specialtyDoctor = new SpecialtyDoctor();

    $specialtyDoctor->SpecialtyDoctor("SELECT * FROM specialty");

    $rowSpecialtyDoctor = $specialtyDoctor->_row;
    $rsSpecialtyDoctor = $specialtyDoctor->_result;

    if (isset($_POST['add'])) { 
        
        $specialtyNome = $_POST['specialtyNome'];
        $specialty->setSpecialty($specialtyNome);

        header("Location: /Views/SpecialtyRegister.php");
    }

    if (isset($_POST['delete'])) {
        $specialty->deleteSpecialty($_POST['specialtyId']);
    }
}