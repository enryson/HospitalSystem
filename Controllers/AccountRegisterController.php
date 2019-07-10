<?php

include_once("../Config/Config.php");
//accountRole3 User
session_start();


if (isset($_POST['add'])) {
	//verifica se existem as rowns na nossa tabela
	$accountEmail = mysqli_real_escape_string($mysqli, $_POST['email']);
	$accountPassword = mysqli_real_escape_string($mysqli, $_POST['password']);
	$accountNome = mysqli_real_escape_string($mysqli, $_POST['nome']);
	$accountCPF = mysqli_real_escape_string($mysqli, $_POST['cpf']);
	$accountTel = mysqli_real_escape_string($mysqli, $_POST['tel']);
	$accountDate = mysqli_real_escape_string($mysqli, $_POST['data']);
	$accountCEP = mysqli_real_escape_string($mysqli, $_POST['cep']);
	$accountRua = mysqli_real_escape_string($mysqli, $_POST['rua']);
	$accountNumero = mysqli_real_escape_string($mysqli, $_POST['numero']);
	$accountBairro = mysqli_real_escape_string($mysqli, $_POST['bairro']);
	$accountCidade = mysqli_real_escape_string($mysqli, $_POST['cidade']);
	$accountUF = mysqli_real_escape_string($mysqli, $_POST['uf']);
	$accountComplemento = mysqli_real_escape_string($mysqli, $_POST['complemento']);


	// verificando se deixamos algo em branco
	if (empty($accountEmail) || empty($accountPassword)) {
		//bla bla bla.... verifica se deixamos algo em branco

		if (empty($accountEmail)) {
			echo "<font color='red'>nao deixe em branco</font><br/>";
		}

		if (empty($accountPassword)) {
			echo "<font color='red'>nao deixe em branco</font><br/>";
		}
	} else {

		if (filter_var($accountEmail, FILTER_VALIDATE_EMAIL)) {
			$user = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM accounts WHERE accountEmail='$accountEmail'"));

			if ($accountEmail == $user['accountEmail']) {
				echo 'usuario já existe';
			} else {
				$result = mysqli_query($mysqli, "INSERT INTO accounts(
					accountEmail,
					accountPassword,
					accountNome,
					accountCPF,
					accountTel,
					accountDate,
					accountCEP,
					accountRua,
					accountNumero,
					accountBairro,
					accountCidade,
					accountUF,
					accountComplemento,
					accountRole
				) VALUES(
					'$accountEmail',
					( SELECT PASSWORD('$accountPassword')),
					'$accountNome',
					'$accountCPF',
					'$accountTel',
					'$accountDate',
					'$accountCEP',
					'$accountRua',
					'$accountNumero',
					'$accountBairro',
					'$accountCidade',
					'$accountUF',
					'$accountComplemento',
					3)"
				);
				echo 'Usuario cadastrado com sucesso!';
			}
			header("Location: /Views/Index.php");
		} else {
			header("Location: /views/error.php");
		}
	}
}

if (isset($_POST['update'])) {
	//verifica se existem as rowns na nossa tabela
	$accountId = mysqli_real_escape_string($mysqli, $_POST['accountId']);
	$accountEmail = mysqli_real_escape_string($mysqli, $_POST['email']);
	$accountPassword = mysqli_real_escape_string($mysqli, $_POST['password']);
	$accountNome = mysqli_real_escape_string($mysqli, $_POST['nome']);
	$accountCPF = mysqli_real_escape_string($mysqli, $_POST['cpf']);
	$accountTel = mysqli_real_escape_string($mysqli, $_POST['tel']);
	$accountDate = mysqli_real_escape_string($mysqli, $_POST['data']);
	$accountCEP = mysqli_real_escape_string($mysqli, $_POST['cep']);
	$accountRua = mysqli_real_escape_string($mysqli, $_POST['rua']);
	$accountNumero = mysqli_real_escape_string($mysqli, $_POST['numero']);
	$accountBairro = mysqli_real_escape_string($mysqli, $_POST['bairro']);
	$accountCidade = mysqli_real_escape_string($mysqli, $_POST['cidade']);
	$accountUF = mysqli_real_escape_string($mysqli, $_POST['uf']);
	$accountComplemento = mysqli_real_escape_string($mysqli, $_POST['complemento']);
	($_SESSION['accountRole'] == 1 ?  $accountRole = mysqli_real_escape_string($mysqli, $_POST['accountRole']) : '');

	// verificando se deixamos algo em branco
	if (empty($accountEmail) || empty($accountPassword)) {
		//bla bla bla.... verifica se deixamos algo em branco

		if (empty($accountEmail)) {
			echo "<font color='red'>nao deixe em branco</font><br/>";
		}

		if (empty($accountPassword)) {
			echo "<font color='red'>nao deixe em branco</font><br/>";
		}
	} else {
		//$accountId = mysqli_real_escape_string($mysqli, $_SESSION(['accountId']));
		// agora sim! ele captura os dados das variaveis e as atualiza no banco de dados.
		if ($_SESSION['accountRole'] == 1){
			$result = mysqli_query($mysqli, "UPDATE accounts SET 
				accountEmail = '$accountEmail',
				accountPassword=(select password('$accountPassword')),
				accountNome = '$accountNome',
				accountCPF = '$accountCPF',
				accountTel = '$accountTel',
				accountDate = '$accountDate',
				accountCEP = '$accountCEP',
				accountRua = '$accountRua',
				accountNumero = '$accountNumero',
				accountBairro = '$accountBairro',
				accountCidade = '$accountCidade',
				accountUF = '$accountUF',
				accountRole = '$accountRole',
				accountComplemento = '$accountComplemento'
				WHERE accountId=$accountId "			
			);

			header("Location: /Views/AdminAccountDetailsView.php");

			
		} else{
			$result = mysqli_query($mysqli, "UPDATE accounts SET 
				accountEmail = '$accountEmail',
				accountPassword=(select password('$accountPassword')),
				accountNome = '$accountNome',
				accountCPF = '$accountCPF',
				accountTel = '$accountTel',
				accountDate = '$accountDate',
				accountCEP = '$accountCEP',
				accountRua = '$accountRua',
				accountNumero = '$accountNumero',
				accountBairro = '$accountBairro',
				accountCidade = '$accountCidade',
				accountUF = '$accountUF',
				accountComplemento = '$accountComplemento'
				WHERE accountId=$accountId "			
			);

			header("Location: /Views/Index.php");
		}
		
		//echo 'Usuario cadastrado com sucesso!';
		//redireciona para a index
		//$_SESSION['accountNome'] = $accountNome;

		
	}
}
