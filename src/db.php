<?php 
session_start();

$USER = "root";
$PASS = "Q45tx1020disney05!";

$USER = "phpmyadmin";
$PASS = "NkBx6";

try {
    $db = new PDO("mysql:host=localhost;dbname=adrar", $USER, $PASS);
} catch(PDOException $e) {
    $db = NULL;
    print("Erreur: " . $e->getMessage() . "<br/>");
    die;
}