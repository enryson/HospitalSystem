<?php
session_start();

if (isset($_SESSION['accountId'])) {
	if ($_SESSION['accountRole'] == 1) {
		$accountId = $_SESSION['accountId'];
		require_once("../Controllers/ApointmentController.php");
		require_once("../Controllers/SpecialtyDoctorController.php");
		require_once("../Controllers/SpecialtyController.php");
		require_once("../Controllers/DoctorController.php");

		doctorList();

		specialtyList();

		apointmentInsert();

		apointmentUpdate();
		adminApoitmentList();
		
	}
} else {
	header("Location: /Views/Index.php");
}



include("Components/Head.php");
include("Components/Nav.php");
?>
<main role="main" class="container">
	<div class="containter p-3">
		<h1>Consultar Horários</h1>
	</div>
	<div class="container position-relative m-4">

		

		<table class="table table-dark table-striped">
			<thead>
				<tr>
					<td>ID Consulta</td>
					<td>Doutor</td>
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
					echo "<tr>";
					echo "<td>" . $rowApointment['apointmentId'] . "</td>";
					echo "<td>" . $rowApointment['accountNome'] . "</td>";
					echo ($apointmenStatus == 1 ? '<td class="text-danger" >Ocupado</td>' : '<td class="text-success" >Livre</td>');
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