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
                    ' . ($_SESSION['accountRole'] == 1 ? '<a class="dropdown-item" href="/Views/AdminAccountDetailsView.php">Admin</a>' : "") . '
                    ' . ($_SESSION['accountRole'] == 1 & 2 ? '<a class="dropdown-item" href="/Views/AdminAccountDetailsView.php">Admin</a>' : "") . ' 
                        <a class="dropdown-item" href="/Views/AccountDetailsView.php?id=' . $_SESSION['accountId'] . '">Meus Dados</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/Controllers/LogoutController.php">Sair</a>
                    </div>

                </div>
            </form>
              ';
            } else {
                echo '
                <form class="form-inline my-2 my-lg-0" action="/Controllers/AuthenticateController.php" method="post">
                    <input class="form-control m-sm-2 " placeholder="E-mail" id="email" type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" />
                    <input class="form-control m-sm-2 "  placeholder="Senha" id="password" type="password" name="password" />
                    <button class="btn btn-success m-sm-2 " type="submit" name="login" value="Login">Login</button>
                    <a class="btn btn-primary m-sm-2" href="/Views/AccountRegisterView.php">Cadastro <span class="sr-only">(current)</span></a>
                </form>
                ';
            }

            ?>
        </div>
    </div>
</nav>


<!--

<a class="dropdown-item" href="/Views/AccountDetailsView.php?id=' . $_SESSION['accountId'] . '">Meus Dados<a/>
                        ' . ($_SESSION['accountRole'] == 1 ? '<a class="dropdown-item"href="/Views/AdminAccountDetailsView.php">Admin<a/>' : "") . '
                        <a class="dropdown-item"href="/Controllers/LogoutController.php">Sair<a/>
                        

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">Carousel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(atual)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Desativado</a>
            </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
        </form>
    </div>
</nav>
        -->