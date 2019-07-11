<?php
require_once("../Model/Apointment.php");

function doctorApoitmentList($id)
{
    global $rowApointment;
    global $rsApointment;

    $apointment = new Apointment();

    $apointment->getApointment("SELECT * FROM apointment 
                                    inner join specialty on apointment.specialtyId = specialty.specialtyId 
                                    WHERE doctorCRM='$id' ORDER BY apointment.apointmenDateTime DESC");

    $rowApointment = $apointment->_row;
    $rsApointment = $apointment->_result;
}

function specialityApoitmentList()
{
    global $rowApointment;
    global $rsApointment;

    $apointment = new Apointment();


    if (isset($_POST['searchApoitment'])) {
        $specialtyId = $_POST['specialtyId'];

        $apointment->getApointment("SELECT * FROM apointment 
                                    inner join specialty on apointment.specialtyId = specialty.specialtyId 
                                    inner join doctor on doctor.doctorCRM = apointment.doctorCRM 
                                    inner join accounts on doctor.accountId = accounts.accountId  
                                    WHERE apointment.specialtyId='$specialtyId' ORDER BY apointment.apointmenDateTime DESC");

        $rowApointment = $apointment->_row;
        $rsApointment = $apointment->_result;
    }
}


function AccountApoitmentList($id)
{
    global $rowApointment;
    global $rsApointment;

    $apointment = new Apointment();

    $apointment->getApointment("SELECT * FROM apointment 
                                    inner join specialty on apointment.specialtyId = specialty.specialtyId
                                    inner join doctor on apointment.doctorCRM = doctor.doctorCRM
                                    inner join accounts on doctor.accountId = accounts.accountId
                                    WHERE accountId='$id' ORDER BY apointment.apointmenDateTime DESC");

    $rowApointment = $apointment->_row;
    $rsApointment = $apointment->_result;
}

function apointmentInsert()
{

    global $rowApointment;
    global $rsApointment;

    $apointment = new Apointment();

    $apointment->getApointment("SELECT * FROM apointment");

    $rowApointment = $apointment->_row;
    $rsApointment = $apointment->_result;



    if (isset($_POST['addApoitment'])) {

        $doctorCRM = $_SESSION['doctorCRM'];
        $specialtyId = $_POST['specialtyId'];
        $accountId = $_POST['accountId'];
        $apointmenStatus = $_POST['apointmenStatus'];
        $apointmenDateTime = $_POST['apointmenDateTime'];
        $apointmentDetails = $_POST['apointmentDetails'];

        $apointment->setApointment(
            $doctorCRM,
            $specialtyId,
            $accountId,
            $apointmenStatus,
            $apointmenDateTime,
            $apointmentDetails
        );
        header("Location: /Views/DoctorSchedule.php");
    }
}

function apointmentUpdate()
{
    $apointment = new Apointment();


    if (isset($_POST['update'])) {
        $accountId =  $_POST['id'];
        $doctorCRM = $_POST['doctorCRM'];
        $specialtyId = $_POST['specialtyId'];
        $accountId = $_POST['accountId'];
        $apointmenStatus = 1;
        $apointmenDateTime = $_POST['apointmenDateTime'];
        $apointmentDetails = $_POST['apointmentDetails'];
        $apointmentId = $_POST['apointmentId'];

        $apointment->updateApointment(
            $doctorCRM,
            $specialtyId,
            $accountId,
            $apointmenStatus,
            $apointmenDateTime,
            $apointmentDetails,
            $apointmentId
        );
        //isset($_POST['accountRole']) ? header("Location: /Views/AdminAccountDetailsView.php") : header("Location: /Views/AccountDetailsView.php")  ;
        header("Location: /Views/AccountSchedule.php");
    }

    if (isset($_POST['delete'])) {
        $apointment->deleteApointment($_POST['apointmentId']);
        header("Location: /Views/DoctorSchedule.php");
    }
}
