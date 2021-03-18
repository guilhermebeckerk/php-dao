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

$user->loadByID(3);

echo $user;
*/

//-------------------------------- Insert User on Database ---------------------
/*
$newUser = new User();

$newUser->setDeslogin("");
$newUser->setDespass("");

$newUser->insert();
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
/*
$user = new User();

$user->login("", "");

echo $user;
*/

//-------------------------------- Update User on database --------------------------------------
/*
$user = new User();

$user->loadById(4);

$user->update('', '');

echo $user;
*/

//-------------------------------- Delete User on database --------------------------------------
/*
$user = new User();

$user->loadById(5);

$user->delete();

echo $user;
*/
?>