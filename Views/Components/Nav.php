<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-light">
    <div class="container">
        <a class="navbar-brand" href="#">Hospital</a>
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
                echo '
                <form class="form-inline my-2 my-lg-0">
                <div class="btn-group">
                    <button class="btn btn-outline-success dropdown-toggle my-2 my-sm-0" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Bem Vindo : ' . $_SESSION['accountNome'] . ' 
                    </button>
                    <div class="dropdown-menu">
                    ' . ($_SESSION['accountRole'] == 1 || $_SESSION['accountRole'] == 2 ? '<a class="dropdown-item" href="../Views/AdminAccountDetailsView.php">Admin</a>' : "") . '
                    ' . ($_SESSION['accountRole'] == 1 || $_SESSION['accountRole'] == 2 ? '<a class="dropdown-item" href="../Views/SpecialtyRegister.php">Cadastro Especialidade</a>' : "") . '
                    ' . ($_SESSION['accountRole'] == 4 ? '<a class="dropdown-item" href="../Views/AccountSchedule.php">Agendar</a>' : "") . ' 
                    ' . ($_SESSION['accountRole'] == 3 ? '<a class="dropdown-item" href="../Views/DoctorSchedule.php">Cadastro Agenda</a>' : "") . ' 
                    ' . ($_SESSION['accountRole'] == 1 || $_SESSION['accountRole'] == 2 ? '<a class="dropdown-item" href="../Views/AdminDoctorSchedule.php">Agenda Amin</a>' : "") . ' 
                        <a class="dropdown-item" href="../Views/AccountDetailsView.php?id=' . $_SESSION['accountId'] . '">Meus Dados</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../Controllers/LogoutController.php">Sair</a>
                    </div>

                </div>
            </form>
              ';
            } else {
                echo '
                <form class="form-inline my-2 my-lg-0" action="../Controllers/AuthenticateController.php" method="post">
                    <input class="form-control m-sm-2 " placeholder="E-mail" id="email" type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required/>
                    <input class="form-control m-sm-2 "  placeholder="Senha" id="password" type="password" name="password" required/>
                    <button class="btn btn-success m-sm-2 " type="submit" name="login" value="Login">Login</button>
                    <a class="btn btn-primary m-sm-2" href="../Views/AccountRegisterView.php">Cadastro <span class="sr-only">(current)</span></a>
                </form>
                ';
            }

            ?>
        </div>
    </div>
</nav>

<?php
if (isset($_SESSION["error"])) {
    $error = $_SESSION["error"];    
    $_SESSION["error"] = null;
    alert($error);
}

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
?>