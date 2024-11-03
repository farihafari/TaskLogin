<?php
include "../model/auth.php";
include "../model/Register.php";

$name  = $_POST['user-name'];
$email      = $_POST['user-email'];
$password   = $_POST['user-password'];
$output     = "";

$AccountRegistered = new Register($name,$email,$password, $output, $connect);
echo $AccountRegistered->output();
?>