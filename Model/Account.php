<?php
require_once("DatabaseConnection.php");


class Account
{

    private $accountEmail;
    private $accountPassword;
    private $accountNome;
    private $accountCPF;
    private $accountTel;
    private $accountDate;
    private $accountCEP;
    private $accountRua;
    private $accountNumero;
    private $accountBairro;
    private $accountCidade;
    private $accountUF;
    private $accountComplemento;
    private $accountRole;



    public function setAccount(
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
    ) {

        
        $query = 'INSERT INTO accounts(
            accountEmail,
            accountPassword,
            accountNome,
            accountCPF,
            accountTel,
            accountDate,
            accountCEP,
            accountRua,
            accountNumero,
            accountBairro,
            accountCidade,
            accountUF,
            accountComplemento,
            accountRole
        ) VALUES(
            "' . $accountEmail . '",
            (SELECT PASSWORD("' . $accountPassword. '")),
            "' . $accountNome . '",
            "' . $accountCPF . '",
            "' . $accountTel . '",
            "' . $accountDate . '",
            "' . $accountCEP . '",
            "' . $accountRua . '",
            "' . $accountNumero . '",
            "' . $accountBairro . '",
            "' . $accountCidade . '",
            "' . $accountUF . '",
            "' . $accountComplemento . '",
            "3")
            ';

        echo $query;

        $database = new DatabaseConnection();

        $database->connection();

        $database->query($query);
    }


    public function updateAccount(
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
    ) {


        $query = 'UPDATE accounts SET 
            accountEmail = "' . $accountEmail . '",
            accountPassword = (select password("' . $accountPassword . ' ")),
            accountNome = "' . $accountNome . '",
            accountCPF = "' . $accountCPF . '",
            accountTel ="' . $accountTel . '",
            accountDate ="' . $accountDate . '",
            accountCEP = "' . $accountCEP . '",
            accountRua = "' . $accountRua . '",
            accountNumero = "' . $accountNumero . '",
            accountBairro = "' . $accountBairro . '",
            accountCidade = "' . $accountCidade . '",
            accountUF = "' . $accountUF . '",
            accountComplemento = "' . $accountComplemento . '"
            WHERE accountId= "' . $accountId . '"
        ';

        $database = new DatabaseConnection();

        $database->connection();

        $database->query($query);

        $this->_row = @mysqli_affected_rows($database->result);

        $this->_result = $database->result;
    }


    public function getAccount($query)
    {

        $database = new DatabaseConnection();

        $database->connection();

        $database->query($query);

        $this->_row = @mysqli_num_rows($database->result);

        $this->_result = $database->result;
    }

    public function deleteAccount($id)
    {
        $database = new DatabaseConnection();

        $query = 'DELETE FROM accounts WHERE accountId="' . $id . '"';

        $database->connection();

        $database->query($query);
    }
}
