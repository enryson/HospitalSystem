<?php
//inicia a sessão
include_once("../Config/Config.php");

session_start();

if ( isset( $_SESSION['accountId'] ) ) {
    $accountId = $_SESSION['accountId'];
	//Agora ele irá fazer uma consulta para preencher os dados recebidos
	$result = mysqli_query($mysqli, " SELECT * FROM accounts WHERE accountId='$accountId' ");
	//um loop para separar o objeto em cada variavel com seus dados.
	while ($res = mysqli_fetch_array($result)) {
        $email = $res['accountEmail'];
		$nome = $res['accountNome'];
		$cpf = $res['accountCPF'];
		$tel = $res['accountTel'];
		$data = $res['accountDate'];
		$cep = $res['accountCEP'];
		$rua = $res['accountRua'];
		$numero = $res['accountNumero'];
		$bairro = $res['accountBairro'];
		$cidade = $res['accountCidade'];
		$uf = $res['accountUF'];
		$complemento = $res['accountComplemento'];
    }
} else{
    header("Location: /Views/Index.php");
}

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>
  <body>


    <div class="container">
        <h2>Atualizar Dados</h2>
        <form method="post" action="/Controllers/AccountRegisterController.php">
            Email :<br>
            <input id="email" type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="<?php echo $email ?>"/>
            <br>
            Senha :<br>
            <input id="password" type="password" name="password" />
            <br>
            Nome :<br>
            <input id="nome" type="text" name="nome" value="<?php echo $nome ?>"/>
            <br>
            CPF :<br>
            <input id="cpf" type="text" name="cpf" value="<?php echo $cpf ?>"/>
            <br>
            Tel :<br>
            <input id="tel" type="text" name="tel" value="<?php echo $tel ?>"/>
            <br>
            Nascimento :<br>
            <input id="data" type="text" name="data" value="<?php echo $data ?>"/>
            <br>
            CEP :<br>
            <input id="cep" type="text" name="cep" value="<?php echo $cep ?>"/>
            <br>
            Rua :<br>
            <input id="rua" type="text" name="rua" value="<?php echo $rua ?>"/>
            <br>
            Numero :<br>
            <input id="numero" type="text" name="numero" value="<?php echo $numero ?>" />
            <br>
            Bairro :<br>
            <input id="bairro" type="text" name="bairro" value="<?php echo $bairro ?>"/>
            <br>
            Cidade :<br>
            <input id="cidade" type="text" name="cidade" value="<?php echo $cidade ?>"/>
            <br>
            UF :<br>
            <input id="uf" type="text" name="uf" value="<?php echo $uf ?>"/>
            <br>
            Complemento :<br>
            <input id="complemento" type="text" name="complemento" value="<?php echo $complemento ?>"/>
            <br>
            <input type="submit" name="update" value="Atualizar">
        </form>
    </div>


    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
</html>