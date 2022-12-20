<?php
include_once("./db.php");

if(!empty($_POST["intern_connexion"]) && $_POST["intern_connexion"] == 1) {
    $sql = "SELECT *  
            FROM interns 
            WHERE intern_username=:intern_username;";
    $req = $db->prepare($sql);
    $req->bindParam(":intern_username", $_POST["intern_username"]);
    $req->execute();
    $intern = $req->fetch(PDO::FETCH_ASSOC);

    if(password_verify($_POST["intern_password"], $intern["intern_password"])) {
        $_SESSION["form_connexion"]["errors"] = 0;
        $_SESSION["intern"] = $intern;
        header("Location: ../public/index.php");
    } else {
        $_SESSION["form_connexion"]["errors"] = 1;
        header("Location: ../public/connexion.php");
    }
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
                    <img class="svgs-sm" src="/eval/public/imgs/join.svg" alt="Illustration pour l'intégration à l'évaluation"/>
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

if(!empty($_POST["save_code"])) {
    $link = "../public/stagiaires/" . $_SESSION["intern"]["intern_username"]."/" . $_POST["module"];
    $file = $_POST["tp"] . "." . $_POST["extension"];

    if(!file_exists($link."/".$file)) {
        if(!mkdir($link, 0777, true)) {
            touch($link."/".$file);
        }
    }
    $eval = fopen($link."/".$file, "w") or die("ko");
    fwrite($eval, $_POST["code"]);
    fclose($eval);

    die("ok");
}

if(!empty($_POST["submit_evaluation"])) {
    $sql_update_intern_evaluation = "UPDATE interns_evaluations 
                                    SET intern_evaluation_completed = 1 
                                    WHERE id_intern=:id_intern 
                                    AND id_evaluation=:id_evaluation;";
    $req_update_intern_evaluation = $db->prepare($sql_update_intern_evaluation);
    $req_update_intern_evaluation->bindParam(":id_intern", $_SESSION["intern"]["intern_id"]);
    $id_evaluation = substr($_POST["tp"], 2);
    $req_update_intern_evaluation->bindParam(":id_evaluation", $id_evaluation);
    if($req_update_intern_evaluation->execute()) {
        die("ok");
    }
    die("ko");
}

if($_POST["load_informations_tp"]) {
    $sql_select_informations_tp = "SELECT evaluation_title, evaluation_synopsis
                                    FROM evaluations 
                                    WHERE evaluation_id=:evaluation_id;";
    $req_select_informations_tp = $db->prepare($sql_select_informations_tp);
    $req_select_informations_tp->bindParam(":evaluation_id", $_POST["tp"]);
    $req_select_informations_tp->execute();
    $informations_tp = $req_select_informations_tp->fetch(PDO::FETCH_ASSOC);

    die(json_encode(array(
        "title" => $informations_tp["evaluation_title"], 
        "body" => $informations_tp["evaluation_synopsis"], 
    )));
}

if($_POST["valid_intern_correction"]) {
    $sql_update_correction = "UPDATE interns_evaluations 
                                SET intern_evaluation_correction = 1, 
                                intern_evaluation_errors_found=:errors_found
                                WHERE id_intern=:id_intern 
                                AND id_evaluation=:id_evaluation;";
    $req_update_correction = $db->prepare($sql_update_correction);
    $req_update_correction->bindParam(":id_intern", $_POST["id_intern"]);
    $req_update_correction->bindParam(":errors_found", $_POST["errors_found"]);
    $req_update_correction->bindParam(":id_evaluation", $_POST["tp"]);
    if($req_update_correction->execute()) {
        die("ok");
    }
    die("ko");
}
?> 