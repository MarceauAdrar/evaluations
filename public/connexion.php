<?php
include_once("../src/db.php");

if (!empty($_SESSION["intern"]["intern_id"]) && isset($_SESSION["intern"]["intern_id"])) {
    die(var_dump($_SESSION));
    header("Location: ../index.php");
}

$title = " | Connexion";

ob_start();
include_once("./header.php");
// Le contenu de ma page HTML vient se glisser entre les balises PHP fermantes et ouvrantes
?>

<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <div id="form_connexion_container">
                <!-- Illustration de la connexion -->
                <img src="/public/imgs/login.svg" alt="Illustration de la connexion" id="form_logo_login">
                
                <form action="/src/requests.php" method="POST">
                    <!-- Champs caché permettant en back de pouvoir traiter uniquement ce formulaire -->
                    <input type="hidden" name="intern_connexion" id="intern_connexion" value="1">

                    <!-- Nom d'utilisateur -->
                    <label class="form-label" for="intern_username">Nom d'utilisateur du stagiaire:</label>
                    <input class="form-control" type="text" name="intern_username" id="intern_username" placeholder="aformation22" required/>

                    <!-- MDP -->
                    <label class="form-label" for="intern_password">Mot de passe pour la session:</label>
                    <input class="form-control" type="password" name="intern_password" id="intern_password" placeholder="azerty1234" required/>

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

    <div class="row">
        <div class="col-3">
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <h5 class="card-title">Kanban</h5>
                <p class="card-text">Accédez au kanban, gérez vos TODO</p>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <h5 class="card-title">Évaluations</h5>
                <p class="card-text">Validez vos acquis avec les évaluations proposées dans les modules</p>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <h5 class="card-title">Évaluations</h5>
                <p class="card-text">Validez vos acquis avec les évaluations proposées dans les modules</p>
            </div>
        </div>
    </div>
</div>

<script>
    sessionStorage.clear();
</script>

<?php
include_once("./footer.php");
die(ob_get_clean()); 