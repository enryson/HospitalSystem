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

		apointmentInsert();

		apointmentUpdate();

		while ($rowDoctor = mysqli_fetch_array($rsDoctor)) {
			getspecialtyDoctor($rowDoctor['doctorCRM']);
			$_SESSION['doctorCRM'] = $rowDoctor['doctorCRM'];
			doctorApoitmentList($_SESSION['doctorCRM']);
		}
		
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
			</label>
			<label class="m-sm-2" for="lastName">Especialidade
				<?php

				if ($rsSpecialtyDoctorGet != null) {
					echo '<select class="form-control m-2" id="specialtyId" name="specialtyId">';
					while ($rowSpecialtyDoctorGet = mysqli_fetch_array($rsSpecialtyDoctorGet)) {
						echo '<option value="' . $rowSpecialtyDoctorGet['specialtyId'] . '">' . $rowSpecialtyDoctorGet['specialtyNome'] . '</option>';
					}
				}
				echo '</select>';

				?>
			</label>

			<label class="m-sm-2" for="lastName">Data e Hora
				<!--<input class="m-sm-2 form-control" type="text" id="apointmenDateTime" name="apointmenDateTime">
			-->
			</label>

			<div class="input-group date" id="datetimepicker1" name="apointmenDateTime" data-target-input="nearest">
				<input type="text" class="form-control datetimepicker-input" id="apointmenDateTime" name="apointmenDateTime" data-target="#datetimepicker1" />
				<div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
					<div class="input-group-text"><i class="fa fa-calendar"></i></div>
				</div>
			</div>


			<input class="m-sm-2 btn btn-primary" id="addApoitment" type="submit" name="addApoitment" value="Cadastrar">
		</form>


		<table class="table table-dark table-striped">
			<thead>
				<tr>
					<td>ID Consulta</td>
					<td>Cliente</td>
					<td>Status</td>
					<td>Data e Hora</td>
					<td>Especialidade</td>
					<td>Remover</td>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($rowApointment = mysqli_fetch_array($rsApointment)) {
					$apointmenStatus = $rowApointment['apointmenStatus'];
					($apointmenStatus=0? $apointmenStatus = 'Ocupado' : $apointmenStatus = 'Livre' );
					echo "<tr>";
					echo "<td>" . $rowApointment['apointmentId'] . "</td>";
					echo "<td>" . $rowApointment['accountId'] . "</td>";
					//echo "<td>" . $rowApointment['apointmenStatus'] . "</td>";
					echo "<td>" . $apointmenStatus . "</td>";
					echo "<td>" . $rowApointment['apointmenDateTime'] . "</td>";
					echo "<td>" . $rowApointment['specialtyNome'] . "</td>";
					echo '<td>
							<form  method="post">
								<input type="hidden" name="apointmentId" value="' . $rowApointment['apointmentId'] . '" />
								<input class="btn btn-warning" id="delete" name="delete" type="submit" value="Delete" />
							</form>
						</td>';
					echo "</tr>";
				}
				?>
			</tbody>
		</table>
	</div>


</main>


<script type="text/javascript">
	$(document).ready(function(e) {
		$(function() {
			$('#datetimepicker1').datetimepicker();
		});
	});


	$.fn.datetimepicker.Constructor.Default = $.extend({}, $.fn.datetimepicker.Constructor.Default, {
		format: 'YYYY/MM/DD HH:mm',
		icons: {
			time: 'far fa-clock',
			date: 'far fa-calendar',
			up: 'fas fa-arrow-up',
			down: 'fas fa-arrow-down',
			previous: 'fas fa-chevron-left',
			next: 'fas fa-chevron-right',
			today: 'far fa-calendar-check',
			clear: 'fas fa-trash',
			close: 'fas fa-times'
		}
	});
</script>



<?php include("Components/Scripts.php"); ?>