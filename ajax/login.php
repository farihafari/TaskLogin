<?php
session_start();
// ini_set('display_errors', 1);
// error_reporting(E_ALL);
include  "../model/auth.php";
include "../model/Login.php";



$name = isset($_POST['user-name']) ? $_POST['user-name'] : '';
$password = isset($_POST['user-password']) ? $_POST['user-password'] : '';
$output = '';

$LoggedIn = new Login($name, $password, $output, $connect);
$response = $LoggedIn->LoggedIn();
echo $response;
// var_dump($response);
?>