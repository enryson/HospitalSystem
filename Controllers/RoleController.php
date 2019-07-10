<?php
require_once("../Model/Role.php");

function roleList()
{
    global $rowRole;
    global $rsRole;

    $role = new Role();

    $role->getRole("SELECT * FROM role");

    $rowRole = $role->_row;
    $rsRole = $role->_result;
}


