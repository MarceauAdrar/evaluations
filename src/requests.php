<?php
include_once("./db.php");

if(!empty($_POST["intern_connexion"]) && $_POST["intern_connexion"] == 1) {
    $sql = "SELECT * 
            FROM interns 
            WHERE intern_username=:intern_username 
            AND intern_password=:intern_password;";
    $req = $db->prepare($sql);
    $req->bindParam(":intern_username", $_POST["intern_username"]);
    $req->bindParam(":intern_password", md5($_POST["intern_password"]));
    $req->execute();

    $_SESSION["form_connexion"]["errors"] = 0;

    if($req->rowCount() == 1) {
        $_SESSION["intern"] = $req->fetch(PDO::FETCH_ASSOC);
        header("Location: ../public/index.php");
    }
    $_SESSION["form_connexion"]["errors"] = 1;
    header("Location: ../public/connexion.php", );
}

if(!empty($_POST["display_prompt_join_modal"])) {
    $sql_select_evaluation = "SELECT evaluation_id, evaluation_title, evaluation_goals, evaluation_synopsis 
                            FROM evaluations 
                            WHERE evaluation_id=:evaluation_id;";
    $req_select_evaluation = $db->prepare($sql_select_evaluation);
    $req_select_evaluation->bindParam(":evaluation_id", $_POST["evalId"]);
    $req_select_evaluation->execute();
    $modal = $req_select_evaluation->fetch(PDO::FETCH_ASSOC);
    $goals = "";
    $evaluation_goals = explode(";", $modal["evaluation_goals"]);
    foreach ($evaluation_goals as $goal) {
        $goals .= "- &nbsp;" . $goal . "<br/>";
    }
    ob_start(); ?>
    <div class="modal-header">
        <h5 class="modal-title" id="modalJoinEvaluationTitle"><?= $modal["evaluation_title"] ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <h3>Compétences: </h3>
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <?= $goals ?>
                </div>
                <div class="col-6">
                    <img class="svgs-sm" src="http://localhost/eval/public/imgs/join.svg" alt="Illustration pour l'intégration à l'évaluation"/>
                </div>
            </div>
        </div>
        <hr class="hrs">
        <h3>Marche à suivre:</h3>
        <p><?= $modal["evaluation_synopsis"] ?></p>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-success" data-bs-dismiss="modal" onclick="btnJoinEvaluation(<?= $modal['evaluation_id'] ?>);">Rejoindre</button>
    </div>
    <?php 
    die(ob_get_clean());
}

if(!empty($_POST["btn_join_evaluation"])) {
    $sql_insert_intern = "INSERT INTO interns_evaluations(intern_evaluation_completed, id_intern, id_evaluation) 
                        VALUES(0, :id_intern, :id_evaluation);";
    $req_insert_intern = $db->prepare($sql_insert_intern);
    $req_insert_intern->bindParam(":id_intern", $_SESSION["intern"]["intern_id"]);
    $req_insert_intern->bindParam(":id_evaluation", $_POST["evalId"]);
    if($req_insert_intern->execute()) {
        die("ok");
    }
    die("ko");
}

?> 