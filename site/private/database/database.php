<?php
// Hier wordt de session van een ingelogde gebruiker bewaard
session_start();
// De databasegegevens
$servername = 'mariadb';
$username = 'root';
$password = 'password';
// Databaseverbinding
try {
    $conn = new PDO("mysql:host=$servername;dbname=kimchi_chronicles", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
