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
            <input class="form-control"id="email" type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" />
            <br>
            Senha :<br>
            <input class="form-control"id="password" type="password" name="password" />
            <br>
            Nome :<br>
            <input class="form-control"id="nome" type="text" name="nome" />
            <br>
            CPF :<br>
            <input class="form-control"id="cpf" type="text" name="cpf" />
            <br>
            Tel :<br>
            <input class="form-control"id="tel" type="text" name="tel" />
            <br>
            Nascimento :<br>
            <input class="form-control"id="data" type="text" name="data" />
            <br>
          </div>
          <div class="col-md-4">
            CEP :<br>
            <input class="form-control"id="cep" type="text" name="cep" onblur="pesquisacep(this.value);" />
            <br>
            Rua :<br>
            <input class="form-control"id="rua" type="text" name="rua" />
            <br>
            Numero :<br>
            <input class="form-control"id="numero" type="text" name="numero" />
            <br>
            Bairro :<br>
            <input class="form-control"id="bairro" type="text" name="bairro" />
            <br>
            Cidade :<br>
            <input class="form-control"id="cidade" type="text" name="cidade" />
            <br>
            UF :<br>
            <input class="form-control"id="uf" type="text" name="uf" />
            <br>
            Complemento :<br>
            <input class="form-control"id="complemento" type="text" name="complemento" />
            <br>
            <br>
          </div>
        </div>
        
        <input class="btn btn-primary" id="add" type="submit" name="add" value="Cadastrar">
      </form>
    </div>
  </div>
</main>
<script src="JS/ViaCEP.js"></script>
<?php include("Components/Scripts.php"); ?>