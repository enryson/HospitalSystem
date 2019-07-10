<?php
require_once("../Model/Account.php");

function AccountList()
{
    global $row;
    global $rs;

    $account = new Account();

    $account->getAccount("SELECT * FROM accounts");

    $row = $account->_row;
    $rs = $account->_result;
}

function AccountInsert()
{
    global $row;
    global $rs;

    $account = new Account();

    $account->getAccount("SELECT * FROM accounts");
    $row = $account->_row;
    $rs = $account->_result;


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

function AccountUpdate()
{
    global $row;
    global $rs;


    $account = new Account();

    $account->getAccount("SELECT * FROM accounts WHERE accountId=" . $_GET['id']);

    $row = $account->_row;
    $rs = $account->_result;

    $accountId =  $_GET['id'];


    if (isset($_POST['update'])) {

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

        echo $accountId;

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
            $accountComplemento
        );
        header("Location: /Views/AdminAccountDetailsView.php");
    }

    if (isset($_POST['delete'])) {
        $account->deleteAccount($_GET['id']);
        header("Location: /Views/AdminAccountDetailsView.php");
    }
}

