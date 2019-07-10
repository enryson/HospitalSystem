<?php
session_start();

if (isset($_GET['id'])) {
    $accountId = $_GET['id'];
    require_once("../Controllers/AccountController.php");
    require_once("../Controllers/RoleController.php");
    AccountUpdate();
    roleList();
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
            <?php while ($rowAccount = mysqli_fetch_array($rsAccount)) { ?>
                Email :<br>
                <input id="email" type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="<?php echo $rowAccount['accountEmail'] ?>" />
                <br>
                Senha :<br>
                <input id="password" type="password" name="password" />
                <br>
                Nome :<br>
                <input id="nome" type="text" name="nome" value="<?php echo $rowAccount['accountNome'] ?>" />
                <br>
                CPF :<br>
                <input id="cpf" type="text" name="cpf" value="<?php echo $rowAccount['accountCPF'] ?>" />
                <br>
                Tel :<br>
                <input id="tel" type="text" name="tel" value="<?php echo $rowAccount['accountTel'] ?>" />
                <br>
                Nascimento :<br>
                <input id="data" type="text" name="data" value="<?php echo $rowAccount['accountDate'] ?>" />
                <br>
                CEP :<br>
                <input id="cep" type="text" name="cep" onblur="pesquisacep(this.value);" value="<?php echo $rowAccount['accountCEP'] ?>" />
                <br>
                Rua :<br>
                <input id="rua" type="text" name="rua" value="<?php echo $rowAccount['accountRua'] ?>" />
                <br>
                Numero :<br>
                <input id="numero" type="text" name="numero" value="<?php echo $rowAccount['accountNumero'] ?>" />
                <br>
                Bairro :<br>
                <input id="bairro" type="text" name="bairro" value="<?php echo $rowAccount['accountBairro'] ?>" />
                <br>
                Cidade :<br>
                <input id="cidade" type="text" name="cidade" value="<?php echo $rowAccount['accountCidade'] ?>" />
                <br>
                UF :<br>
                <input id="uf" type="text" name="uf" value="<?php echo $rowAccount['accountUF'] ?>" />
                <br>
                Complemento :<br>
                <input id="complemento" type="text" name="complemento" value="<?php echo $rowAccount['accountComplemento'] ?>" />
                <br>
                <br>
                <!--
                <select name="select">
                    <option value="1">Admin</option>
                    <option value="2" selected>Atendimento</option>
                    <option value="3">Medico</option>
                    <option value="4">Usuario</option>
                </select>-->


                <?php
                if ($_SESSION['accountRole'] == 1) {

                    echo '<select id="accountRole" name="accountRole">';
                    while ($rowRole = mysqli_fetch_array($rsRole)) {
                        echo '<option '.($rowAccount['accountRole']==$rowRole['accountRole']?" selected" : "").' value="' . $rowRole['accountRole'] . '">'. $rowRole['roleName'] .'</option>';
                    }
                    echo '</select>';                    
                }               

                ?>

            <?php } ?>
            <br>
            <br>
            <input class="btn btn-primary" id="update" type="submit" name="update" value="Atualizar">
            <input class="btn btn-danger" id="delete" type="submit" name="update" value="Remover">
        </form>
    </div>
</main>
<script src="JS/ViaCEP.js"></script>
<?php include("Components/Scripts.php"); ?>