<?php
session_start();

if (isset($_SESSION['accountId'])) {
	if ($_SESSION['accountRole'] == 1 || $_SESSION['accountRole'] == 4) {
		$accountId = $_SESSION['accountId'];
		require_once("../Controllers/ApointmentController.php");
		require_once("../Controllers/SpecialtyDoctorController.php");
		require_once("../Controllers/SpecialtyController.php");
		require_once("../Controllers/DoctorController.php");

		specialtyList();

		specialityApoitmentList();

		apointmentUpdate();

		AccountApoitmentList($_SESSION['accountId']);
	}
} else {
	header("Location: /Views/Index.php");
}



include("Components/Head.php");
include("Components/Nav.php");
?>
<main role="main" class="container">
	<div class="containter p-3">
		<h1>Consulta</h1>
	</div>
	<div class="container position-relative m-4">
		<div class="bg-dark p-2 text-light">
			<h2>Minhas Consultas</h2>
			<table class="table table-dark table-striped">
				<thead>
					<tr class="text-uppercase font-weight-bold">
						<td>Doutor</td>
						<td>Data e hora</td>
						<td>Especialidade</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					<?php
					while ($rowApointmentAccount = mysqli_fetch_array($rsApointmentAccount)) {

						$apointmenStatus = $rowApointmentAccount['apointmenStatus'];

						echo "<tr>";

						echo "<td >" . $rowApointmentAccount['accountNome'] . "</td>";
						echo "<td>" . $rowApointmentAccount['apointmenDateTime'] . "</td>";
						echo "<td>" . $rowApointmentAccount['specialtyNome'] . "</td>";
						echo '<td>
										<form  method="post">
											<input type="hidden" name="apointmentId" value="' . $rowApointmentAccount['apointmentId'] . '" />
											<input class="btn btn-warning" id="remove" name="remove" type="submit" value="Desistir" />
										</form>
									</td>';
					} ?>
				</tbody>
			</table>

		</div>
		<div class="m-4">
			<h2>Agendar</h2>
			<form class="form-inline m-sm-2" method="post">
				<label class="m-sm-2 " for="lastName">Especialidade
					<?php
					echo '<select class="form-control m-2" id="specialtyId" name="specialtyId">';
					while ($rowSpecialty = mysqli_fetch_array($rsSpecialty)) {
						echo '<option value="' . $rowSpecialty['specialtyId'] . '">' . $rowSpecialty['specialtyNome'] . '</option>';
					}
					echo '</select>';

					?>
				</label>
				<input class="m-2 btn btn-primary" id="searchApoitment" type="submit" name="searchApoitment" value="Pesquisar">
			</form>




			<table class="table table-dark table-striped">
				<thead>
					<tr>
						<td>ID Consulta</td>
						<td>Status</td>
						<td>Doutor</td>
						<td>Data e Hora</td>
						<td>Especialidade</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					<?php
					if ($rsApointment != null) {
						while ($rowApointment = mysqli_fetch_array($rsApointment)) {

							$apointmenStatus = $rowApointment['apointmenStatus'];

							echo "<tr>";
							echo "<td>" . $rowApointment['apointmentId'] . "</td>";
							echo ($apointmenStatus == 1 ? '<td class="text-danger" >Ocupado</td>' : '<td class="text-success" >Livre</td>');

							echo "<td >" . $rowApointment['accountNome'] . "</td>";
							echo "<td>" . $rowApointment['apointmenDateTime'] . "</td>";
							echo "<td>" . $rowApointment['specialtyNome'] . "</td>";

							echo '<td>
							<form  method="post">							
								<input type="hidden" name="doctorCRM" value="' . $rowApointment['doctorCRM'] . '" />
								<input type="hidden" name="specialtyId" value="' . $rowApointment['specialtyId'] . '" />
								<input type="hidden" name="apointmenDateTime" value="' . $rowApointment['apointmenDateTime']  . '" />
								<input type="hidden" name="apointmentId" value="' . $rowApointment['apointmentId'] . '" />
								<input type="hidden" name="accountId" value="' . $accountId . '" />
								<input class="btn btn-primary" id="update" name="update" type="submit" value="MarcarConsulta" />
							</form>
						</td>';
							echo "</tr>";
						}
					}
					?>
				</tbody>
			</table>
		</div>
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