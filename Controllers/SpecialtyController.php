<?php
require_once("../Model/Specialty.php");

function specialtyList()
{
    global $rowSpecialty;
    global $rsSpecialty;

    $specialty = new Specialty();

    $specialty->getSpecialty("SELECT * FROM specialty");

    $rowSpecialty = $specialty->_row;
    $rsSpecialty = $specialty->_result;
}


function specialtyInsert()
{
    global $rowSpecialty;
    global $rsSpecialty;

    $specialty = new Specialty();

    $specialty->getSpecialty("SELECT * FROM specialty");

    $rowSpecialty = $specialty->_row;
    $rsSpecialty = $specialty->_result;

    if (isset($_POST['add'])) { 
        
        $specialtyNome = $_POST['specialtyNome'];
        $specialty->setSpecialty($specialtyNome);

        header("Location: /Views/SpecialtyRegister.php");
    }

    if (isset($_POST['delete'])) {
        $specialty->deleteSpecialty($_POST['specialtyId']);
    }
}