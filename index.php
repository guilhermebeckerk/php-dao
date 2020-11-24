<?php

require_once("config.php");

//-------------------------- Select All Users from Database ---------------------------
/*
$sql = new Sql();

$usuarios = $sql->select("SELECT * FROM tb_users");

echo json_encode($usuarios);
*/

//-------------------------- Load User By ID ----------------------

$user = new User();

$user->loadByID(5);

echo $user;

?>