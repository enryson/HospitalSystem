<?php
session_start();

if (isset($_GET['id'])) {
    $accountId = $_GET['id'];
    require_once("../Controllers/AccountController.php");
    AccountUpdate();
} else {
    header("Location: /Views/Index.php");
}

?>


<?php
include("Components/Head.php");
include("Components/Nav.php");
?>
<main role="main" class="container">
    <div class="containter p-5">
        <h1>Atualizar Dados</h1>
    </div>
    <div class="container">
        <form method="post">
            <?php while ($row = mysqli_fetch_array($rs)) { ?>
                Email :<br>
                <input id="email" type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="<?php echo $row['accountEmail'] ?>" />
                <br>
                Senha :<br>
                <input id="password" type="password" name="password" />
                <br>
                Nome :<br>
                <input id="nome" type="text" name="nome" value="<?php echo $row['accountNome'] ?>" />
                <br>
                CPF :<br>
                <input id="cpf" type="text" name="cpf" value="<?php echo $row['accountCPF'] ?>" />
                <br>
                Tel :<br>
                <input id="tel" type="text" name="tel" value="<?php echo $row['accountTel'] ?>" />
                <br>
                Nascimento :<br>
                <input id="data" type="text" name="data" value="<?php echo $row['accountDate'] ?>" />
                <br>
                CEP :<br>
                <input id="cep" type="text" name="cep" onblur="pesquisacep(this.value);" value="<?php echo $row['accountCEP'] ?>" />
                <br>
                Rua :<br>
                <input id="rua" type="text" name="rua" value="<?php echo $row['accountRua'] ?>" />
                <br>
                Numero :<br>
                <input id="numero" type="text" name="numero" value="<?php echo $row['accountNumero'] ?>" />
                <br>
                Bairro :<br>
                <input id="bairro" type="text" name="bairro" value="<?php echo $row['accountBairro'] ?>" />
                <br>
                Cidade :<br>
                <input id="cidade" type="text" name="cidade" value="<?php echo $row['accountCidade'] ?>" />
                <br>
                UF :<br>
                <input id="uf" type="text" name="uf" value="<?php echo $row['accountUF'] ?>" />
                <br>
                Complemento :<br>
                <input id="complemento" type="text" name="complemento" value="<?php echo $row['accountComplemento'] ?>" />
                <br>

                <?php
                /*
            if ($_SESSION['accountRole'] == 1) {
                echo '
                Role :<br>
                <input id="accountRole" type="number" name="accountRole" value="' . $accountRole . '"/>
                <br>
                
                <h4>Cadastrar Médico</h4>
                Complemento :<br>
                <input id="complemento" type="text" name="complemento" value="<?php echo $complemento ?>"/>
                <br>
                
                ';
            }*/
                ?>

            <?php } ?>
            <br>
            <input class="btn btn-primary" id="update" type="submit" name="update" value="Atualizar">
            <input class="btn btn-danger" id="delete" type="submit" name="delete" value="Remover">
        </form>
    </div>
</main>
<script src="JS/ViaCEP.js"></script>
<?php include("Components/Scripts.php"); ?>