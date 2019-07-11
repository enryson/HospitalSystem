<?php
session_start();

if (isset($_SESSION['accountId'])) {
	if ($_SESSION['accountRole'] == 1 || $_SESSION['accountRole'] == 2 || $_SESSION['accountRole'] == 3) {
		$accountId = $_SESSION['accountId'];
		require_once("../Controllers/ApointmentController.php");		
        require_once("../Controllers/SpecialtyDoctorController.php");
        require_once("../Controllers/SpecialtyController.php");
		require_once("../Controllers/DoctorController.php");

		doctorList();
		
        specialtyList();
		
		apoitmentList();
		apointmentInsert();	
		
		
		
		/*
		if (isset($_POST['addApoitment'])) {

			
		}*/

	}
} else {
	header("Location: /Views/Index.php");
}




include("Components/Head.php");
include("Components/Nav.php");
?>
<main role="main" class="container">
	<div class="containter p-3">
		<h1>Cadastrar Horários</h1>
	</div>
	<div class="container position-relative m-4">

		<form class="form-inline my-2 my-lg-0 mb-3" method="post">
		<label class="m-sm-2" for="lastName">CRM
				<?php
					while ($rowDoctor = mysqli_fetch_array($rsDoctor)) {
						echo $rowDoctor['doctorCRM'];
						getspecialtyDoctor($rowDoctor['doctorCRM']);
					}

				?>

			</label>
			<label class="m-sm-2" for="lastName">Especialidade
				<?php
					echo '<select class="form-control m-2" id="specialtyId" name="specialtyId">';
					while ($rowSpecialtyDoctor = mysqli_fetch_array($rsSpecialtyDoctor)) {
						echo '<option value="' . $rowSpecialtyDoctor['specialtyId'] . '">' . $rowSpecialtyDoctor['specialtyNome'] . '</option>';
					}
					echo '</select>';

				?>
			</label>
			
			<label class="m-sm-2" for="lastName">Data e Hora
				<input class="m-sm-2 form-control" type="text" id="apointmenDateTime" name="apointmenDateTime">
			</label>

				
			<input class="m-sm-2 btn btn-primary" id="addApoitment" type="submit" name="addApoitment" value="Cadastrar">
		</form>


		<table class="table table-dark table-striped">
			<thead>
				<tr>
					<td>doctorCRM</td>
					<td>accountId</td>
					<td>apointmenStatus</td>
					<td>apointmenDateTime</td>
					<td>specialtyId</td>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($rowApointment = mysqli_fetch_array($rsApointment)) {
					echo "<tr>";
					echo "<td>" . $rowApointment['doctorCRM'] . "</td>";
					echo "<td>" . $rowApointment['accountId'] . "</td>";
					echo "<td>" . $rowApointment['apointmenStatus'] . "</td>";
					echo "<td>" . $rowApointment['apointmenDateTime'] . "</td>";
					echo "<td>" . $rowApointment['specialtyId'] . "</td>";
					//echo "<td><a href=\"AccountDetailsView.php?id=$rowApointment[accountId]\">Edit</a></td>";
					echo "</tr>";
				}
				?>
			</tbody>
		</table>
	</div>


</main>
<?php include("Components/Scripts.php"); ?>
