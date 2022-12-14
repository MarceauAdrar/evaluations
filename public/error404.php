<?php 
include_once("../src/db.php");

$title = " | Erreur - Page introuvable";

ob_start();
include_once("./header.php"); ?>
<img class="img-center" src="http://localhost/eval/public/imgs/not_found_404.svg" alt="Illustration pour une page non trouvée">
<?php 
include_once("./footer.php");
die(ob_get_clean());