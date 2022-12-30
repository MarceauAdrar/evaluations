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
    
    <div class="row pt-5">
        <h3>Les cours</h3>

        <div class="col-3 mb-3">
            <a href="http://<?=$_SERVER["SERVER_NAME"]?>/evaluations/public/courses.php?cours=html" class="text-black">
                <div class="card">
                    <span class="card-img-top" alt="Illustration HTML">
                        <?php include_once("./imgs/html.svg"); ?>
                    </span>
                    <div class="card-body">
                        <h5 class="card-title text-decoration-underline">HTML</h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-3 mb-3">
            <a href="http://<?=$_SERVER["SERVER_NAME"]?>/evaluations/public/courses.php?cours=css" class="text-black">
                <div class="card">
                    <span class="card-img-top" alt="Illustration CSS">
                        <?php include_once("./imgs/css.svg"); ?>
                    </span>
                    <div class="card-body">
                        <h5 class="card-title text-decoration-underline">CSS</h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-3 mb-3">
            <a href="http://<?=$_SERVER["SERVER_NAME"]?>/evaluations/public/courses.php?cours=frameworks" class="text-black">
                <div class="card">
                    <span class="card-img-top" alt="Illustration Frameworks">
                        <?php include_once("./imgs/frameworks.svg"); ?>
                    </span>
                    <div class="card-body">
                        <h5 class="card-title text-decoration-underline">Frameworks</h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-3 mb-3">
            <a href="http://<?=$_SERVER["SERVER_NAME"]?>/evaluations/public/courses.php?cours=js" class="text-black">
                <div class="card">
                    <span class="card-img-top" alt="Illustration JS">
                        <?php include_once("./imgs/js.svg"); ?>
                    </span>
                    <div class="card-body">
                        <h5 class="card-title text-decoration-underline">JS</h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-3 mb-3">
            <a href="http://<?=$_SERVER["SERVER_NAME"]?>/evaluations/public/courses.php?cours=php" class="text-black">
                <div class="card">
                    <span class="card-img-top" alt="Illustration php">
                        <?php include_once("./imgs/php.svg"); ?>
                    </span>
                    <div class="card-body">
                        <h5 class="card-title text-decoration-underline">PHP</h5>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>

<script>
    sessionStorage.setItem("intern_username", "<?=$_SESSION["intern"]["intern_username"]?>");
    sessionStorage.setItem("SERVER_ADDR", "<?=($_SERVER["SERVER_ADDR"]=="::1" ? "localhost":$_SERVER["SERVER_ADDR"])?>");
</script>
<?php
include_once("./js.php");
include_once("./footer.php");
die(ob_get_clean());
?> 