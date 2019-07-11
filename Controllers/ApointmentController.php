<?php
require_once("../Model/Apointment.php");

function doctorApoitmentList($id)
{
    global $rowApointment;
    global $rsApointment;

    $apointment = new Apointment();

    $apointment->getApointment("SELECT * FROM apointment inner join specialty on apointment.specialtyId = specialty.specialtyId WHERE doctorCRM='$id' ORDER BY apointment.apointmenDateTime DESC" );

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
    global $rowApointment;
    global $rsApointment;

    $apointment = new Apointment();

    $apointment->getApointment("SELECT * FROM apointment WHERE apointmentId=" . $_GET['id']);

    $rowApointment = $apointment->_row;
    $rsApointment = $apointment->_result;

    $apointmentId =  $_GET['id'];


    if (isset($_POST['update'])) {
        $doctorCRM = $_POST['doctorCRM'];
        $specialtyId = $_POST['specialtyId'];
        $accountId = $_POST['accountId'];
        $apointmenStatus = $_POST['apointmenStatus'];
        $apointmenDateTime = $_POST['apointmenDateTime'];
        $apointmentDetails = $_POST['apointmentId'];

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
        header("Location: /Views/AdminAccountDetailsView.php");
    }

    if (isset($_POST['delete'])) {
        $apointment->deleteApointment($_GET['id']);
        header("Location: /Views/AdminAccountDetailsView.php");
    }
}
