<?php
require_once("../Model/Account.php");

session_start();


if (!empty($_POST)) {
    if (isset($_POST['email']) && isset($_POST['password'])) {

        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

            $account = new Account();
            $account->getAccount('SELECT * FROM accounts WHERE accountEmail="' . $_POST['email'] . '" AND accountPassword=(select password("' . $_POST['password'] . '"))');

            $row = $account->_row;
            $rs = $account->_result;

            $user = mysqli_fetch_array($rs);

            if (isset($user)) {
                $_SESSION['accountId'] = $user['accountId'];
                $_SESSION['accountNome'] = $user['accountNome'];
                $_SESSION['accountEmail'] = $user['accountEmail'];
                $_SESSION['accountRole'] = $user['accountRole'];
                //print_r($_SESSION['accountId']) ;
                //header("Location: index.php");
            }
            header("Location: /Views/Index.php");
        } else {
            header("Location: /Views/error.php");
        }
    }
}

if (isset($_SESSION['accountId'])) {
    if ($_SESSION['accountRole'] == 3) {
        header("Location: /Views/Index.php");
    }
    if ($_SESSION['accountRole'] == 2) {
        header("Location: /Views/Index.php");
    }
    if ($_SESSION['accountRole'] == 1) {
        header("Location: /Views/Index.php");
    }
} else {
    // Redirect them to the login page
    header("Location: ../Views/Index.php");
}
