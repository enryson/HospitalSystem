<?php
//inicia a sessão
session_start(); 
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

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-light">
        <a class="navbar-brand" href="#">Meu Site</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    
                </li>

            </ul>



            <?php
            if (isset($_SESSION['accountId'])) {
                // Grab user data from the database using the user_id
                // Let them access the "logged in only" pages
                //echo '<h6>Bem Vindo : ' . $_SESSION['accountId'] . ' </h6>';
                echo '
                <div class="dropdown">
                    <button class="btn btn-outline-success dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Bem Vindo : ' . $_SESSION['accountNome'] . '
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <a class="dropdown-item"href="/Views/AccountDetailsView.php">Meus Dados<a/>
                    <a class="dropdown-item"href="/Controllers/LogoutController.php">Sair<a/>
                    </div>
                </div>
              ';
            } else {
                echo '
                <form class="form-inline my-2 my-lg-0" action="/Controllers/AuthenticateController.php" method="post">
                    <input class="form-control mr-sm-2" placeholder="E-mail" id="email" type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" />
                    <input class="form-control mr-sm-2"  placeholder="Senha" id="password" type="password" name="password" />
                    <button class="btn btn-success mr-sm-2"" type="submit" name="login" value="Login">Login</button>
                    <a class="btn btn-primary mr-sm-2" href="/Views/AccountRegisterView.php">Cadastro <span class="sr-only">(current)</span></a>
                </form>
                ';
            }
            ?>


        </div>
    </nav>


</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>