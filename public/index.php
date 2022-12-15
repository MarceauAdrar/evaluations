<?php
include_once("../src/db.php");

if (!isset($_SESSION["intern"]["intern_id"])) {
    header("Location: ./connexion.php");
}

$title = " | Accueil";

ob_start();
include_once("./header.php");
?>
<script>
    sessionStorage.setItem("intern_username", "<?=$_SESSION["intern"]["intern_username"]?>");
</script>
<?php
include_once("./js.php");
include_once("./footer.php");
die(ob_get_clean());
?> 