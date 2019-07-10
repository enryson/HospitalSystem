<?php
require_once("DatabaseConnection.php");

class Role
{
    public function getRole($query)
    {

        $database = new DatabaseConnection();
        $database->connection();
        $database->query($query);

        $this->_row = @mysqli_num_rows($database->result);
        $this->_result = $database->result;
    }

}
?>