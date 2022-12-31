<?php 
include_once("../src/db.php");

if(isset($_SESSION["intern"]["intern_id"])) {
    session_destroy();
}
header("Location: /evaluations/public/index.php");
?> 