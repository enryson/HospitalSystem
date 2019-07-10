<?php
session_start();

if (isset($_GET['id'])) {
    $accountId = $_GET['id'];
    require_once("../Controllers/AccountController.php");

    if ($_SESSION['accountRole'] == 1) {
        require_once("../Controllers/RoleController.php");
        require_once("../Controllers/DoctorController.php");
        doctorInsert($accountId);
        roleList();
    }

    accountUpdate();
} else {
    header("Location: /Views/Index.php");
}

?>


<?php
include("Components/Head.php");
include("Components/Nav.php");
?>
<main role="main" class="container">
    <div class="containter p-3">
        <h1>Atualizar Dados</h1>
    </div>
    <div class="container">
        <div class="pt-2 text-left">
            <form method="post">
                <div class="row">
                    <?php while ($rowAccount = mysqli_fetch_array($rsAccount)) { ?>
                        <div class="col-md-4">
                            <h4 class="mb-3">Dados Pessoais</h4>

                            <label for="Email :"></label> Email :<br>
                            <input class="form-control" id="email" type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="<?php echo $rowAccount['accountEmail'] ?>" />
                            <br>
                            Senha :<br>
                            <input class="form-control" id="password" type="password" name="password" />
                            <br>
                            Nome :<br>
                            <input class="form-control" id="nome" type="text" name="nome" value="<?php echo $rowAccount['accountNome'] ?>" />
                            <br>
                            CPF :<br>
                            <input class="form-control" id="cpf" type="text" name="cpf" value="<?php echo $rowAccount['accountCPF'] ?>" />
                            <br>
                            Tel :<br>
                            <input class="form-control" id="tel" type="text" name="tel" value="<?php echo $rowAccount['accountTel'] ?>" />
                            <br>
                            Nascimento :<br>
                            <input class="form-control" id="data" type="text" name="data" value="<?php echo $rowAccount['accountDate'] ?>" />
                            <br>
                        </div>
                        <div class="col-md-4">
                            <h4 class="mb-3">Endereço</h4>
                            CEP :<br>
                            <input class="form-control" id="cep" type="text" name="cep" onblur="pesquisacep(this.value);" value="<?php echo $rowAccount['accountCEP'] ?>" />
                            <br>
                            Rua :<br>
                            <input class="form-control" id="rua" type="text" name="rua" value="<?php echo $rowAccount['accountRua'] ?>" />
                            <br>
                            Numero :<br>
                            <input class="form-control" id="numero" type="text" name="numero" value="<?php echo $rowAccount['accountNumero'] ?>" />
                            <br>
                            Bairro :<br>
                            <input class="form-control" id="bairro" type="text" name="bairro" value="<?php echo $rowAccount['accountBairro'] ?>" />
                            <br>
                            Cidade :<br>
                            <input class="form-control" id="cidade" type="text" name="cidade" value="<?php echo $rowAccount['accountCidade'] ?>" />
                            <br>
                            UF :<br>
                            <input class="form-control" id="uf" type="text" name="uf" value="<?php echo $rowAccount['accountUF'] ?>" />
                            <br>
                            Complemento :<br>
                            <input class="form-control" id="complemento" type="text" name="complemento" value="<?php echo $rowAccount['accountComplemento'] ?>" />
                            <br>
                            <br>
                            <?php
                            //-------- Check Account Role -----///
                            if ($_SESSION['accountRole'] == 1) {

                                echo '</div>
                                
                                <div class="col-md-4">
                                <h4 class="mb-3" >Dados Administrativos</h4>
                                ';

                                //-------- Account Role -----///
                                echo '<select id="accountRole" name="accountRole">';
                                while ($rowRole = mysqli_fetch_array($rsRole)) {
                                    echo '<option ' . ($rowAccount['accountRole'] == $rowRole['accountRole'] ? " selected" : "") . ' value="' . $rowRole['accountRole'] . '">' . $rowRole['roleName'] . '</option>';
                                }
                                echo '</select>';


                                //-------- Doctor Insert -----///
                                echo '
                                <div id="doctor" class="" ' . ($rowAccount['accountRole'] == 3 ? 'style="display: "";' : 'style="display: none;"') . ' >
                                <br>
                                CRM :<br>
                                <input class="form-control" id="doctorCRM" type="text" name="doctorCRM" value="
                                ';
                                while ($rowDoctor = mysqli_fetch_array($rsDoctor)) {
                                    echo $rowDoctor['doctorCRM'];
                                }
                                echo '
                                " />
                                    <br>
                                </div>
                                
                                ';

                                //-------- Doctor Speciality -----///
                                echo '
                                <div id="doctor" class="" ' . ($rowAccount['accountRole'] == 3 ? 'style="display: "";' : 'style="display: none;"') . ' >
                                <br>
                                CRM :<br>
                                <input class="form-control" id="doctorCRM" type="text" name="doctorCRM" value="
                                ';
                                while ($rowDoctor = mysqli_fetch_array($rsDoctor)) {
                                    echo $rowDoctor['doctorCRM'];
                                }
                                echo '
                                " />
                                    <br>
                                </div>
                                
                                ';

                                

                            }

                            ?>

                        <?php } ?>
                        <br>
                        <br>
                    </div>
                </div>

                <input class="btn btn-primary" id="update" type="submit" name="update" value="Atualizar">
                <input class="btn btn-danger" id="delete" type="submit" name="delete" value="Remover">
            </form>
        </div>
    </div>
</main>
<?php include("Components/Scripts.php"); ?>
<script type="text/javascript">
    (function() {
        $('#accountRole').change(function() {
            if ($(this).val() == 3) {
                $("#doctor").fadeToggle();
            } else {
                $("#doctor").fadeOut();
            }
        });
    })();
</script>
<script src="JS/ViaCEP.js"></script>