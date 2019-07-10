<?php
require_once("../Controllers/AccountController.php");
AccountInsert();



?>


<?php
include("Components/Head.php");
include("Components/Nav.php");
?>
<main role="main" class="container">
  <div class="containter p-5">
    <h1>Cadastro de Usuario</h1>
  </div>
  <div class="container">
    <form method="post">
      Email :<br>
      <input id="email" type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" />
      <br>
      Senha :<br>
      <input id="password" type="password" name="password" />
      <br>
      Nome :<br>
      <input id="nome" type="text" name="nome" />
      <br>
      CPF :<br>
      <input id="cpf" type="text" name="cpf" />
      <br>
      Tel :<br>
      <input id="tel" type="text" name="tel" />
      <br>
      Nascimento :<br>
      <input id="data" type="text" name="data" />
      <br>
      CEP :<br>
      <input id="cep" type="text" name="cep" onblur="pesquisacep(this.value);" />
      <br>
      Rua :<br>
      <input id="rua" type="text" name="rua" />
      <br>
      Numero :<br>
      <input id="numero" type="text" name="numero" />
      <br>
      Bairro :<br>
      <input id="bairro" type="text" name="bairro" />
      <br>
      Cidade :<br>
      <input id="cidade" type="text" name="cidade" />
      <br>
      UF :<br>
      <input id="uf" type="text" name="uf" />
      <br>
      Complemento :<br>
      <input id="complemento" type="text" name="complemento" />
      <br>
      <br>
      <input class="btn btn-primary" id="add" type="submit" name="add" value="Cadastrar">
    </form>
  </div>
</main>
<script src="JS/ViaCEP.js"></script>
<?php include("Components/Scripts.php"); ?>