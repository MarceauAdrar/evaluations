<?php 
session_start();

if(!isset($_SESSION["intern"]) && $_SERVER["REQUEST_URI"] !== "/public/connexion.php") {
	header("Location: /");
}

$USER = "phpmyadmin";
$PASS = "NkBx6";

try {
    $db = new PDO("mysql:host=localhost;dbname=adrar", $USER, $PASS);
} catch(PDOException $e) {
    $db = NULL;
    print("Erreur: " . $e->getMessage() . "<br/>");
    die;
}
