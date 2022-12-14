<?php 
include_once("../src/consts.php");

if(isset($_SESSION["intern"]["intern_id"])) {
    session_destroy();
}
header("Location: " . $PUBLIC_DIR . "index.php");
?> 