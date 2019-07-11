<?php

if (isset($_GET['id'])) {
    $accountId = $_GET['id'];
    if ($_SESSION['accountRole'] == 1) {
        require_once("../Controllers/SpecialtyDoctorController.php");
        require_once("../Controllers/SpecialtyController.php");

        doctorInsert($accountId);
        roleList();
        specialtyDoctorInsert();
        specialtyList();
    }
} else {
    header("Location: /Views/Index.php");
}
//-------- Bypass Error Check -----///
$rsSpecialtyDoctorGet = null;

//-------- Check Account Role -----///
if ($_SESSION['accountRole'] == 1) {
    //-------- Check Account Role -----///
    echo '</div>';
    echo '<div class="col-md-4">';
    echo '<h4 class="mb-3" >Dados Administrativos</h4>';


    //-------- Account Role -----///
    echo '<select class="form-control" id="accountRole" name="accountRole">';
    while ($rowRole = mysqli_fetch_array($rsRole)) {
        echo '<option ' . ($rowAccount['accountRole'] == $rowRole['accountRole'] ? " selected" : "") . ' value="' . $rowRole['accountRole'] . '">' . $rowRole['roleName'] . '</option>';
    }
    echo '</select>';


    //-------- HIDE DOCTOR OPTIONS -----///
    echo '<div id="doctor" class="" ' . ($rowAccount['accountRole'] == 3 ? 'style="display: "";' : 'style="display: none;"') . ' >';
    echo '<div class="pr-4 pl-4 bg-light rounded">';

    //-------- ADD account AS DOCTOR -----///
    echo '<br>';
    echo 'CRM :<br>';

    //-------- FORM LIST Specialitys -----///
    echo '<form class="form-inline my-2 my-lg-0 mb-3" method="post">';
    echo '<input class="form-control" id="doctorCRM" type="text" name="doctorCRM" value="';
    while ($rowDoctor = mysqli_fetch_array($rsDoctor)) {
        echo $rowDoctor['doctorCRM'];
        getspecialtyDoctor($rowDoctor['doctorCRM']);
    }
    echo '" /><br>';

    //-------- Doctor Speciality -----///
    echo '<h6 class="font-weight-bold">Lista Especialidades</h6>';
    echo '<table class="table table-striped">';
    echo '<tbody>';
    //-------- Bypass Error Check when the value is NULL-----///
    if ($rsSpecialtyDoctorGet != null) {
        while ($rowSpecialtyDoctorGet = mysqli_fetch_array($rsSpecialtyDoctorGet)) {
            echo "<tr>";
            //echo '<td>' . $rowSpecialtyDoctorGet['doctorCRM'] . '</td>';
            echo '<td name="' . $rowSpecialtyDoctorGet['specialtyId'] . '" id="' . $rowSpecialtyDoctorGet['specialtyId'] . '">' . $rowSpecialtyDoctorGet['specialtyNome'] . '</td>';            
            //echo '<td> <input class=" btn-sm btn btn-warning" type="submit" id="deleteSpecialty"  name="deleteSpecialty" value="Remover"> </td>';
            echo '</tr>';
        }
    }
    echo '</tbody>';
    echo '</table>';
    echo '</form>';

    //-------- ADD Speciality To a DOCTOR -----///
    echo '<h5 class="mb-3">Especialidade</h5>';
    echo '<select class="form-control m-2" id="specialtyId" name="specialtyId">';
    while ($rowSpecialtyDoctor = mysqli_fetch_array($rsSpecialtyDoctor)) {
        echo '<option value="' . $rowSpecialtyDoctor['specialtyId'] . '">' . $rowSpecialtyDoctor['specialtyNome'] . '</option>';
    }
    echo '</select>';
    echo '<input class="m-sm-2 btn btn-primary" id="addSpecialty" type="submit" name="addSpecialty" value="Cadastrar">';
    echo '<input class=" btn btn-warning" type="submit" id="deleteSpecialty"  name="deleteSpecialty" value="Remover">';
    echo '</div>';
    echo '</div>';
}
