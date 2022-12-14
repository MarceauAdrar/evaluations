<?php
include_once("../src/db.php");

if (!isset($_SESSION["intern"]["intern_id"])) {
    header("Location: ./connexion.php");
}

$title = " | Accueil";

ob_start();
include_once("./header.php");
?>

<?php
include_once("./footer.php");
die(ob_get_clean());
?> 