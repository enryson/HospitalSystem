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
                                    WHERE apointment.specialtyId='$specialtyId' AND apointmenStatus=0 ORDER BY apointment.apointmenDateTime DESC");

        $rowApointment = $apointment->_row;
        $rsApointment = $apointment->_result;
    }
}


function AccountApoitmentList($id)
{
    global $rowApointmentAccount;
    global $rsApointmentAccount;
    
    $apointment = new Apointment();

    $apointment->getApointment("SELECT * FROM apointment 
                                    inner join specialty on apointment.specialtyId = specialty.specialtyId
                                    inner join doctor on apointment.doctorCRM = doctor.doctorCRM
                                    inner join accounts on doctor.accountId = accounts.accountId
                                    WHERE apointment.accountId='$id' ORDER BY apointment.apointmenDateTime DESC");

    $rowApointmentAccount = $apointment->_row;
    $rsApointmentAccount = $apointment->_result;
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

function apointmentAccountUpdate()
{
    $apointment = new Apointment();


    if (isset($_POST['update'])) {
        $accountId =  $_SESSION['accountId'];
        $doctorCRM = $_POST['doctorCRM'];
        $specialtyId = $_POST['specialtyId'];
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
        header("Location: /Views/AccountSchedule.php");
    }

    if (isset($_POST['remove'])) {
        $apointmentId = $_POST['apointmentId'];

        $apointment->disableApointment($apointmentId);
        header("Location: /Views/AccountSchedule.php");
    }
}


function apointmentUpdate()
{
    $apointment = new Apointment();


    if (isset($_POST['update'])) {
        $accountId =  $_SESSION['accountId'];
        $doctorCRM = $_POST['doctorCRM'];
        $specialtyId = $_POST['specialtyId'];
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
        header("Location: /Views/AccountSchedule.php");
    }

    if (isset($_POST['delete'])) {
        $apointment->deleteApointment($_POST['apointmentId']);
        header("Location: /Views/DoctorSchedule.php");
    }
}

function adminApoitmentList()
{
    global $rowApointment;
    global $rsApointment;

    $apointment = new Apointment();

    $apointment->getApointment("SELECT * FROM apointment 
                                    inner join specialty on apointment.specialtyId = specialty.specialtyId 
                                    inner join doctor on apointment.doctorCRM = doctor.doctorCRM 
                                    inner join accounts on doctor.accountId = accounts.accountId 
                                    ORDER BY apointment.apointmenDateTime DESC");

    $rowApointment = $apointment->_row;
    $rsApointment = $apointment->_result;
}