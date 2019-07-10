<?php
require_once("../Model/Account.php");

function accountList()
{
    global $rowAccount;
    global $rsAccount;

    $account = new Account();

    $account->getAccount("SELECT * FROM accounts INNER JOIN role ON accounts.accountRole = role.accountRole");

    $rowAccount = $account->_row;
    $rsAccount = $account->_result;
}

function accountInsert()
{
    global $rowAccount;
    global $rsAccount;

    $account = new Account();

    $account->getAccount("SELECT * FROM accounts");
    $rowAccount = $account->_row;
    $rsAccount = $account->_result;


    if (isset($_POST['add'])) {
        $accountEmail = $_POST['email'];
        $accountPassword = $_POST['password'];
        $accountNome = $_POST['nome'];
        $accountCPF = $_POST['cpf'];
        $accountTel = $_POST['tel'];
        $accountDate = $_POST['data'];
        $accountCEP = $_POST['cep'];
        $accountRua = $_POST['rua'];
        $accountNumero = $_POST['numero'];
        $accountBairro = $_POST['bairro'];
        $accountCidade = $_POST['cidade'];
        $accountUF = $_POST['uf'];
        $accountComplemento = $_POST['complemento'];

        $account->setAccount(
            $accountEmail,
            $accountPassword,
            $accountNome,
            $accountCPF,
            $accountTel,
            $accountDate,
            $accountCEP,
            $accountRua,
            $accountNumero,
            $accountBairro,
            $accountCidade,
            $accountUF,
            $accountComplemento
        );
        header("Location: /Views/Index.php");
    }
}

function accountUpdate()
{
    global $rowAccount;
    global $rsAccount;


    $account = new Account();

    $account->getAccount("SELECT * FROM accounts WHERE accountId=" . $_GET['id']);

    $rowAccount = $account->_row;
    $rsAccount = $account->_result;

    $accountId =  $_GET['id'];


    if (isset($_POST['update'])) {
        if (isset($_POST['accountRole'])) { }
        $accountEmail = $_POST['email'];
        $accountPassword = $_POST['password'];
        $accountNome = $_POST['nome'];
        $accountCPF = $_POST['cpf'];
        $accountTel = $_POST['tel'];
        $accountDate = $_POST['data'];
        $accountCEP = $_POST['cep'];
        $accountRua = $_POST['rua'];
        $accountNumero = $_POST['numero'];
        $accountBairro = $_POST['bairro'];
        $accountCidade = $_POST['cidade'];
        $accountUF = $_POST['uf'];
        $accountComplemento = $_POST['complemento'];

        isset($_POST['accountRole']) ?  $accountRole = $_POST['accountRole'] : $accountRole = 4  ;


        $account->updateAccount(
            $accountId,
            $accountEmail,
            $accountPassword,
            $accountNome,
            $accountCPF,
            $accountTel,
            $accountDate,
            $accountCEP,
            $accountRua,
            $accountNumero,
            $accountBairro,
            $accountCidade,
            $accountUF,
            $accountComplemento,
            $accountRole
        );
        isset($_POST['accountRole']) ? header("Location: /Views/AdminAccountDetailsView.php") : header("Location: /Views/AccountDetailsView.php")  ;
        //header("Location: /Views/AdminAccountDetailsView.php");
    }

    if (isset($_POST['delete'])) {
        $account->deleteAccount($_GET['id']);
        header("Location: /Views/AdminAccountDetailsView.php");
    }
}
