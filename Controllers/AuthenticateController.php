<?php
require_once("../Model/Account.php");

session_start();

if (isset($_POST)) {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            accountLogin($_POST['email'],$_POST['password']);
            header("Location: /Views/Index.php");
        }
        header("Location: /Views/Index.php");
    }
}

function accountLogin($email,$password){
    $account = new Account();
    $account->getAccount('SELECT * FROM accounts WHERE accountEmail="' . $email . '" AND accountPassword=(select password("' . $password . '"))');
    $rs = $account->_result;
    createSession(mysqli_fetch_array($rs));
}

function createSession($user){
    if (isset($user)) {
        $_SESSION['accountId'] = $user['accountId'];
        $_SESSION['accountNome'] = $user['accountNome'];
        $_SESSION['accountEmail'] = $user['accountEmail'];
        $_SESSION['accountRole'] = $user['accountRole'];
    }else {
        $_SESSION["error"] = "Usuário ou senha incorreto";
    }
}

if (isset($_SESSION['accountId'])) {
} else {
    // Redirect them to the login page
    header("Location: ../Views/Index.php");
}
