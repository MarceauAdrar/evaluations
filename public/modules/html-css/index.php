<?php
include_once("../../../src/db.php");

$title = " | HTML/CSS";

$lignes = "";
$sql_lignes = "SELECT evaluation_id, evaluation_title, evaluation_goals, evaluation_token, evaluation_errors_max, intern_evaluation_completed, intern_evaluation_errors_found, id_intern
                FROM evaluations e
                LEFT JOIN interns_evaluations ie ON (e.evaluation_id = ie.id_evaluation AND id_intern=:id_intern) 
                WHERE id_evaluation_dd = 1;";
$req_lignes = $db->prepare($sql_lignes);
$req_lignes->bindParam(":id_intern", $_SESSION["intern"]["intern_id"]);
$req_lignes->execute();
if ($req_lignes->rowCount() > 0) {
    foreach ($req_lignes->fetchAll(PDO::FETCH_ASSOC) as $eval) {
        $goals = "";
        $evaluation_goals = explode(";", $eval["evaluation_goals"]);
        foreach ($evaluation_goals as $goal) {
            $goals .= "- &nbsp;" . $goal . "<br/>";
        }
        $lignes .= '<tr>';
        $lignes .= '    <td>' . $eval["evaluation_id"] . '</td>';
        $lignes .= '    <td>' . $eval["evaluation_title"] . '</td>';
        $lignes .= '    <td class="text-start">' . $goals . '</td>';
        if(empty($eval["id_intern"])) {
            $lignes .= '    <td><button type="button" class="btn btn-warning" data-bs-target="#modalJoinEvaluation" onclick="displayPromptJoinModal(' . $eval["evaluation_id"] . ');">Rejoindre l\'évaluation</button></td>';
        } elseif(empty($eval["intern_evaluation_completed"])) {
            $lignes .= '    <td><a class="btn btn-info" id="eval_' . $eval["evaluation_id"] . '" href="/eval/public/resolve.php?token=' . $eval["evaluation_token"] . '">Reprendre l\'évaluation</a></td>';
        } elseif($eval["evaluation_errors_max"] > $eval["intern_evaluation_errors_found"]) {
            $lignes .= '    <td><a class="btn btn-dark">Voir mes erreurs</a></td>';
        } else {
            $lignes .= '    <td><div class="alert alert-success">Félicitations, vous avez réussi ce TP !</div></td>';
        }
        $lignes .= '    <td>(<span>' . (!isset($eval["intern_evaluation_errors_found"]) ? "XX" : $eval["intern_evaluation_errors_found"]) . '</span>/<span>' . $eval["evaluation_errors_max"] . '</span>)</td>';
        $lignes .= '    <td>' . 
                            (empty($eval["id_intern"]) ? 
                                '<span class="circle missing" data-bs-toggle="tooltip" data-bs-placement="right" title="Pas encore inscrit à l\'évaluation !"'
                                : (!empty($eval["intern_evaluation_completed"]) ? 
                                    '<span class="circle completed" data-bs-toggle="tooltip" data-bs-placement="right" title="Évaluation terminée !"' 
                                    : '<span class="circle awaiting" data-bs-toggle="tooltip" data-bs-placement="right" title="Évaluation en cours !"'
                                )
                            ) . '></span></td>';
        $lignes .= '</tr>';
    }
} else {
    $lignes .= '<tr><td colspan="6">Aucune donnée disponible</td></tr>';
}
ob_start();
include_once("../../header.php"); ?>
<div class="container">
    <div class="row">
        <div class="col-8 offset-2 text-center">
            <h1>Liste des évaluations disponibles</h1>
            <img class="svgs-full" src="http://localhost/eval/public/imgs/inspection.svg" alt="Illustration code review" />
            <table class="table table-bordered table-striped table-responsive mt-3">
                <thead>
                    <th>N°</th>
                    <th>Titre</th>
                    <th>Objectifs</th>
                    <th>Lien</th>
                    <th>Notation (trouvées/totales)</th>
                    <th>État</th>
                </thead>
                <tbody>
                    <?= $lignes ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modale pour accepter de rejoindre l'évaluation -->
<div class="modal fade" id="modalJoinEvaluation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalJoinEvaluationTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"></div>
    </div>
</div>
<?php
include_once("../../js.php"); ?>
<script>
    sessionStorage.setItem("previous_uri", "<?=$_SERVER["REQUEST_URI"]?>");
</script>
<?php 
include_once("../../footer.php");
die(ob_get_clean());