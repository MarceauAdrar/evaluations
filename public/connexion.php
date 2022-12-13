<?php
include_once("../src/consts.php");

if (!empty($_SESSION["intern"]["intern_id"]) && isset($_SESSION["intern"]["intern_id"])) {
    header("Location: " . $PUBLIC_DIR . "index.php");
}

$title = " | Connexion";

ob_start();
include_once($PUBLIC_DIR . "header.php");
// Le contenu de ma page HTML vient se glisser entre les balises PHP fermantes et ouvrantes
?>

<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <form action="../src/forms.php" method="POST" id="form_connexion">
                <!-- Champs caché permettant en back de pouvoir traiter uniquement ce formulaire -->
                <input type="hidden" name="intern_connexion" id="intern_connexion" value="1">

                <!-- Nom d'utilisateur -->
                <label class="form-label" for="intern_username">Nom d'utilisateur du stagiaire:</label>
                <input class="form-control" type="text" name="intern_username" id="intern_username" />

                <!-- MDP -->
                <label class="form-label" for="intern_password">Mot de passe pour la session:</label>
                <input class="form-control" type="password" name="intern_password" id="intern_password" />

                <!-- Gestion des erreurs -->
                <div class="alert alert-warning alert-dismissible d-flex align-items-center mt-2<?=(!empty($_SESSION["form_connexion"]["errors"]) ? " fade show" : " d-none")?>" role="alert">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    &nbsp;Une erreur s'est produite, veuillez réessayer !
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <!-- Boutons -->
                <div class="text-end">
                    <button class="btn btn-primary mt-2" type="submit">Se connecter</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include_once($PUBLIC_DIR . "footer.php");
die(ob_get_clean());
