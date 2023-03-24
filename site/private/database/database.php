<?php

session_start();

$servername = 'mariadb';
$username = 'root';
$password = 'password';

try {
    $conn = new PDO("mysql:host=$servername;dbname=kimchi_chronicles", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
