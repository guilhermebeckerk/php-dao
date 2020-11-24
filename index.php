<?php

require_once("config.php");

//-------------------------- Select All Users from Database ---------------------------
/*
$sql = new Sql();

$usuarios = $sql->select("SELECT * FROM tb_users");

echo json_encode($usuarios);
*/

//-------------------------- Load User By ID ----------------------
/*
$user = new User();

$user->loadByID(5);

echo $user;
*/

//-------------------------------- Load All User From Database ---------------------
/*
$list = User::listUsers();

echo json_encode($list);
*/

//--------------------------------- Load List By Login ------------------------------
/*
$search = User::search("A");

echo json_encode($search);
*/

//------------------------------- Load User with Login And Password ----------------------

$user = new User();

$user->login("Anna", "abcdefg");

echo $user;

?>