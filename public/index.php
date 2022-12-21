<?php
include_once("../src/db.php");

if (!isset($_SESSION["intern"]["intern_id"])) {
    header("Location: ./connexion.php");
}

$title = " | Accueil";

ob_start();
include_once("./header.php");
?> 
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Bienvenue sur la plateforme pour valider vos acquis</h1>      
        </div>
    </div>
</div>

<script>
    sessionStorage.setItem("intern_username", "<?=$_SESSION["intern"]["intern_username"]?>");
    sessionStorage.setItem("SERVER_ADDR", "<?=($_SERVER["SERVER_ADDR"]=="::1" ? "localhost":$_SERVER["SERVER_NAME"])?>");
</script>
<?php
include_once("./js.php");
include_once("./footer.php");
die(ob_get_clean());
?> 