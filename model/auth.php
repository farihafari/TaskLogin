<?php

try {

    $host     = "localhost";
    $user = "root";
    $password = "";
    $dbname   = "task";

    $connect = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // print_r($connect);
} catch (PDOException $e) {
    $e->getMessage();
}
