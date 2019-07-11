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

        while ($rowDoctor = mysqli_fetch_array($rsDoctor)) {
            $_SESSION['doctorCRM'] = $rowDoctor['doctorCRM'];
        }
        getspecialtyDoctor();
    }
} else {
    header("Location: /Views/Index.php");
}
//-------- Bypass Error Check -----///

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

    echo '<input class="form-control" id="doctorCRM" type="text" name="doctorCRM" value="';

    echo $_SESSION['doctorCRM'];
    /*
    while ($rowDoctor = mysqli_fetch_array($rsDoctor)) {
        echo $rowDoctor['doctorCRM'];
        getspecialtyDoctor($rowDoctor['doctorCRM']);
    };*/
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
            echo '<td>' . $rowSpecialtyDoctorGet['specialtyNome'] . '</td>';
            echo '<td><form  method="post">
								<input type="hidden" name="specialtyId" value="' . $rowSpecialtyDoctorGet['specialtyId'] . '" />
								<input class="btn btn-warning" id="deleteSpecialty" name="deleteSpecialty" type="submit" value="Delete" />
							</form>
						</td>';
            echo '</tr>';
        }
    }
    echo '</tbody>';
    echo '</table>';

    //-------- ADD Speciality To a DOCTOR -----///
    echo '<h5 class="mb-3">Especialidade</h5>';
    echo '<select class="form-control m-2" id="specialtyId" name="specialtyId">';
    while ($rowSpecialty = mysqli_fetch_array($rsSpecialty)) {
        echo '<option value="' . $rowSpecialty['specialtyId'] . '">' . $rowSpecialty['specialtyNome'] . '</option>';
    }
    echo '</select>';

    echo '<input class="m-sm-2 btn btn-primary" id="addSpecialty" type="submit" name="addSpecialty" value="Cadastrar">';

    echo '</div>';
    echo '</div>';
}
