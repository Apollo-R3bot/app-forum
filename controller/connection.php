<?php

$host = 'localhost';
$user = "root";
$dbname = "forum";
$password = "";

$dsn = "mysql:host=$host;dbname=$dbname;charset=UTF8";

try {
    $conn = new PDO($dsn, $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

    echo $e->getMessage();

}