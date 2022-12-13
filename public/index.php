<?php 
include_once("../src/consts.php");

include_once($PRIVATE_DIR . "db.php");

if(empty($_SESSION["intern"]["intern_id"]) && !isset($_SESSION["intern"]["intern_id"])) {
    header("Location: " . $PUBLIC_DIR . "connexion.php");
}

