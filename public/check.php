<?php

include_once("../src/db.php");

$title = " | Vérification";

$errors = array();
$error404 = false;

if($_GET["module"] == "html-css") {
    $sql_select_interns = "SELECT intern_id, intern_username
                            FROM interns;";
    $req_select_interns = $db->prepare($sql_select_interns);
    $req_select_interns->execute();
    $interns = $req_select_interns->fetchAll(PDO::FETCH_ASSOC);

    switch($_GET["tp"]) {
        case "1":
            $re = '/(<!DOCTYPE html>)|(<html[\ a-zA-Z="]+>)|(<head>)|(<meta[\ a-zA-Z0-9=,."-]+[\>\/>])|(<title>[a-zA-Z0-9]+<\/title>)|(<\/head>)|(<body>)|(<\/body>)|(<\/html>)/m';

            foreach($interns as $intern) {
                $tp = "./stagiaires/" . $intern["intern_username"] . "/html-css/tp1.html";
                if(file_exists($tp)) {
                    $str = file_get_contents($tp);
                    preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
                    
                    $errors_found = sizeof($matches);

                    $sql_update_tp = "UPDATE interns_evaluations 
                                        SET intern_evaluation_correction = 1, 
                                        intern_evaluation_completed = 1,  
                                        intern_evaluation_errors_found=:intern_evaluation_errors_found
                                        WHERE id_intern=:intern_id 
                                        AND id_evaluation = 1;";
                    $req_update_tp = $db->prepare($sql_update_tp);
                    $req_update_tp->bindParam(":intern_id", $intern["intern_id"]);
                    $req_update_tp->bindParam(":intern_evaluation_errors_found", $errors_found);
                    if(!$req_update_tp->execute()) {
                        $errors[$intern["intern_id"]]["message"] = "Une erreur s'est produite lors de la correction des tps";
                        $errors[$intern["intern_id"]]["module"] = "html-css";
                        $errors[$intern["intern_id"]]["tp"] = "1";
                        $errors[$intern["intern_id"]]["username"] = $intern["intern_username"];
                    }
                }
            }
            break;
        case "2":
            $re = '/(<link rel="stylesheet"[\ \/a-zA-Z0-9=,."-]+[\>\/>])|(<title>[\ a-zA-Z0-9]+<\/title>)/m';

            foreach($interns as $intern) {
                $tp = "./stagiaires/" . $intern["intern_username"] . "/html-css/tp2.html";
                if(file_exists($tp)) {
                    $str = file_get_contents($tp);
                    preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
                    
                    $errors_found = sizeof($matches);
                
                    $sql_update_tp = "UPDATE interns_evaluations 
                                    SET intern_evaluation_correction = 1, 
                                    intern_evaluation_completed = 1,  
                                    intern_evaluation_errors_found=:intern_evaluation_errors_found
                                    WHERE id_intern=:intern_id 
                                    AND id_evaluation = 2;";
                    $req_update_tp = $db->prepare($sql_update_tp);
                    $req_update_tp->bindParam(":intern_id", $intern["intern_id"]);
                    $req_update_tp->bindParam(":intern_evaluation_errors_found", $errors_found);
                    if(!$req_update_tp->execute()) {
                    $errors[$intern["intern_id"]]["message"] = "Une erreur s'est produite lors de la correction des tps";
                    $errors[$intern["intern_id"]]["module"] = "html-css";
                    $errors[$intern["intern_id"]]["tp"] = "2";
                    $errors[$intern["intern_id"]]["username"] = $intern["intern_username"];
                    }
                }
            }
            break;
        case "3":
            break;
        case "4":
            break;
        default:
            $error404 = true;
    }
} 
include_once("./header.php");
if($error404) {
    include_once("./error404.php");
} else { ?>
<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            <table class="table table-bordered table-striped mt-3 text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Module</th>
                        <th>TP</th>
                        <th>Error</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(!empty($errors)) {
                        
                    foreach($errors as $key => $value) { ?>
                        <tr>
                            <td><?=$key?></td>
                            <td><?=$value["username"]?></td>
                            <td><?=$value["module"]?></td>
                            <td><?=$value["tp"]?></td>
                            <td><?=$value["message"]?></td>
                        </tr>
                    <?php } 
                    } else { ?>
                        <tr>
                            <td colspan="5">Aucune erreur reportée</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php 
} 
include_once("./js.php");
include_once("./footer.php");
