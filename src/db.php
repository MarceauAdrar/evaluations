<?php 
session_start();

$USER = "phpmyadmin";
$PASS = "NkBx6";

$USER = "login4017";
$PASS = "btsinfo";

try {
    $db = new PDO("mysql:host=localhost;dbname=adrar", $USER, $PASS);
} catch(PDOException $e) {
    $db = NULL;
    print("Erreur: " . $e->getMessage() . "<br/>");
    die;
}