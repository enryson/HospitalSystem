<?php
include_once("../Config/Config.php");

session_start();

if (!empty($_POST)) {
    if (isset($_POST['email']) && isset($_POST['password'])) {

        $accountEmail = mysqli_real_escape_string($mysqli, $_POST['email']);
        $accountPassword = mysqli_real_escape_string($mysqli, $_POST['password']);

        if (filter_var($accountEmail, FILTER_VALIDATE_EMAIL)) {
            $result = mysqli_query($mysqli, "SELECT * FROM accounts WHERE accountEmail='$accountEmail' AND accountPassword=(select password('$accountPassword'))");

            $user = mysqli_fetch_array($result);
            if (isset($user)) {
                $_SESSION['accountId'] = $user['accountId'];
                $_SESSION['accountNome'] = $user['accountNome'];
                $_SESSION['accountEmail'] = $user['accountEmail'];
                $_SESSION['accountRole'] = $user['accountRole'];
                //print_r($_SESSION['accountId']) ;
                //header("Location: index.php");
            }
            header("Location: /Views/Index.php");
        } else{
            header("Location: /Views/error.php");
        }
    }
}

if ( isset( $_SESSION['accountId'] ) ) {
    if ( $_SESSION['accountRole'] == 3 ) {
        header("Location: /Views/Index.php");
    }
    if ( $_SESSION['accountRole'] == 2 ) {
        header("Location: /Views/Index.php");
    }
    if ( $_SESSION['accountRole'] == 1 ) {
        header("Location: /Views/Index.php");
    }
} else {
    // Redirect them to the login page
    header("Location: /views/index.php");
}
