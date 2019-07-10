<?php
//require_once("../Model/Account.php");
//accountRole3 User
session_start();

if (isset($_SESSION['accountId'])) {
	if ($_SESSION['accountRole'] == 1) {
		$accountId = $_SESSION['accountId'];
		require_once("../Controllers/AccountController.php");
		//AccountController('get');
		AccountList();
	}
} else {
	header("Location: /Views/Index.php");
}


?>

<?php include("Components/Head.php"); ?>
<?php include("Components/Nav.php"); ?>

	<main role="main" class="container">
		<div class="containter p-5">
			<h1>Área Administrativa</h1>
		</div>

		<div class="container position-relative m-4">
			<table class="table table-dark table-striped">
				<thead>
					<tr>
						<td>Nome</td>
						<td>CPF</td>
						<td>Email</td>
						<td>Conta</td>
						<td>Update</td>
					</tr>
				</thead>
				<tbody>


					<?php
					while ($row = mysqli_fetch_array($rs)) {
						echo "<tr>";
						echo "<td>" . $row['accountNome'] . "</td>";
						echo "<td>" . $row['accountCPF'] . "</td>";
						echo "<td>" . $row['accountEmail'] . "</td>";
						echo "<td>" . $row['accountRole'] . "</td>";
						echo "<td><a href=\"AccountDetailsView.php?id=$row[accountId]\">Edit</a></td>";
						echo "</tr>";
					}
					?>
				</tbody>
			</table>
		</div>

	</main>


<?php include("Components/Scripts.php"); ?>
