<?php
require_once("../Controllers/AccountController.php");
AccountInsert();

?>


<?php
include("Components/Head.php");
include("Components/Nav.php");
?>
<main role="main" class="container">
  <div class="containter p-3">
    <h1>Cadastro de Usuario</h1>
  </div>

  <div class="container">
    <div class="pt-2 text-left">
      <form method="post">
        <div class="row">
          <div class="col-md-4">
            Email :<br>
            <input class="form-control" id="email" type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required/>
            <br>
            Senha :<br>
            <input class="form-control" id="password" type="password" name="password" />
            <br>
            Nome :<br>
            <input class="form-control" id="nome" type="text" name="nome" required/>
            <br>
            CPF :<br>
            <input class="form-control" id="cpf" type="text" name="cpf" onkeydown="javascript: fMasc( this, mCPF );" maxlength="14" required/>
            <br>
            Tel :<br>
            <input class="form-control" id="tel" type="text" name="tel" onkeyup="mascara( this, mtel );" maxlength="15" required/>
            <br>
            Nascimento :<br>
            <input class="form-control" id="data" type="text" name="data" maxlength="10" required/>
            <br>
          </div>
          <div class="col-md-4">
            CEP :<br>
            <input class="form-control" id="cep" type="text" name="cep" onblur="pesquisacep(this.value);" maxlength="9" required/>
            <br>
            Rua :<br>
            <input class="form-control" id="rua" type="text" name="rua" required />
            <br>
            Numero :<br>
            <input class="form-control" id="numero" type="text" name="numero" required/>
            <br>
            Bairro :<br>
            <input class="form-control" id="bairro" type="text" name="bairro" required/>
            <br>
            Cidade :<br>
            <input class="form-control" id="cidade" type="text" name="cidade" required/>
            <br>
            UF :<br>
            <input class="form-control" id="uf" type="text" name="uf" required/>
            <br>
            Complemento :<br>
            <input class="form-control" id="complemento" type="text" name="complemento" required/>
            <br>
            <br>
          </div>
        </div>

        <input class="btn btn-primary" id="add" type="submit" name="add" value="Cadastrar">
      </form>
    </div>
  </div>
</main>
<script src="JS/MascaraCPF.js"></script>
<script src="JS/ViaCEP.js"></script>
<script>
  $(document).ready(function() {
    $('#data').mask('00/00/0000');
    $('#tel').mask('(00) 00000-0000');
    $('#cep').mask('00000-000');
  });
</script>
<?php include("Components/Scripts.php"); ?>