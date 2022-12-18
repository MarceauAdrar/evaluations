<?php 

include_once("../src/db.php");

$title = " | Contrôle administration";

if($_SESSION["intern"]["intern_username"] != "mrodrigues18") {
    header("Location: ./index.php");
}

$sql_select_html = "SELECT intern_id, intern_last_name, intern_first_name, evaluation_errors_max, intern_evaluation_completed, intern_evaluation_correction, intern_evaluation_errors_found, evaluation_id
                    FROM interns_evaluations ie 
                    JOIN interns i ON (i.intern_id = ie.id_intern) 
                    JOIN evaluations e ON (e.evaluation_id = ie.id_evaluation) 
                    JOIN evaluations_dd edd ON (edd.evaluation_dd_id = e.id_evaluation_dd) 
                    WHERE evaluation_dd_link = 'html-css' 
                    ORDER BY evaluation_dd_id, evaluation_id;";
$req_select_html = $db->prepare($sql_select_html);
$req_select_html->execute();
$interns_html = $req_select_html->fetchAll(PDO::FETCH_ASSOC);

$sql_select_bootstrap = "SELECT intern_id, intern_last_name, intern_first_name, evaluation_errors_max, intern_evaluation_completed, intern_evaluation_correction, intern_evaluation_errors_found, evaluation_id
                        FROM interns_evaluations ie 
                        JOIN interns i ON (i.intern_id = ie.id_intern) 
                        JOIN evaluations e ON (e.evaluation_id = ie.id_evaluation) 
                        JOIN evaluations_dd edd ON (edd.evaluation_dd_id = e.id_evaluation_dd) 
                        WHERE evaluation_dd_link = 'bootstrap' 
                        ORDER BY evaluation_dd_id, evaluation_id;";
$req_select_bootstrap = $db->prepare($sql_select_bootstrap);
$req_select_bootstrap->execute();
$interns_bootstrap = $req_select_bootstrap->fetchAll(PDO::FETCH_ASSOC);

include_once("./header.php"); ?>
<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            
            <div class="modules mt-3">
                <h4>Données du module HTML</h4>
                <a class="btn btn-warning mb-2" href="check.php?module=html-css&tp=1">Correction TP1</a>
                <table class="table table-bordered table-striped table-responsive">
                    <thead>
                        <tr class="text-center">
                            <th>TP n°</th>
                            <th>(#ID) Prénom NOM</th>
                            <th>TP terminé</th>
                            <th>TP corrigé</th>
                            <th>Score obtenu/Score max</th>
                            <th>Note</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($interns_html)) { 
                        foreach($interns_html as $intern) { ?>
                            <tr>
                                <td class="text-center"><?=$intern["evaluation_id"]?></td>
                                <td>(<?=$intern["intern_id"]?>)&nbsp;<?=$intern["intern_first_name"]?> <?=$intern["intern_last_name"]?></td>
                                <td><?=(!empty($intern["intern_evaluation_completed"]) ? '<span class="circle completed" data-bs-toggle="tooltip" data-bs-placement="right" title="Évaluation terminée !"></span>' : '<span class="circle awaiting" data-bs-toggle="tooltip" data-bs-placement="right" title="Évaluation en cours !"></span>')?></td>
                                <td><?=(!empty($intern["intern_evaluation_correction"]) ? '<span class="circle completed" data-bs-toggle="tooltip" data-bs-placement="right" title="Évaluation corrigée !"></span>' : '<span class="circle awaiting" data-bs-toggle="tooltip" data-bs-placement="right" title="Évaluation non corrigée !"></span>')?></td>
                                <td class="text-center"><?=$intern["intern_evaluation_errors_found"]?>/<?=$intern["evaluation_errors_max"]?></td>
                                <td class="text-center"><?=number_format(floatval($intern["intern_evaluation_errors_found"]/$intern["evaluation_errors_max"])*100, 0)?></td>
                            </tr>
                        <?php }} else { ?>
                            <tr>
                                <td class="text-center" colspan="6">Aucune donnée à afficher</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            
            <div class="modules mt-3">
                <h4>Données du module Bootstrap</h4>
                <table class="table table-bordered table-striped table-responsive">
                    <thead>
                        <tr class="text-center">
                            <th>TP n°</th>
                            <th>(#ID) Prénom NOM</th>
                            <th>TP terminé</th>
                            <th>TP corrigé</th>
                            <th>Score obtenu/Score max</th>
                            <th>Note</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($interns_bootstrap)) { 
                        foreach($interns_bootstrap as $intern) { ?>
                            <tr>
                                <td class="text-center"><?=$intern["evaluation_id"]?></td>
                                <td>(<?=$intern["intern_id"]?>)&nbsp;<?=$intern["intern_first_name"]?> <?=$intern["intern_last_name"]?></td>
                                <td><?=(!empty($intern["intern_evaluation_completed"]) ? '<span class="circle completed" data-bs-toggle="tooltip" data-bs-placement="right" title="Évaluation terminée !"></span>' : '<span class="circle awaiting" data-bs-toggle="tooltip" data-bs-placement="right" title="Évaluation en cours !"></span>')?></td>
                                <td><?=(!empty($intern["intern_evaluation_correction"]) ? '<span class="circle completed" data-bs-toggle="tooltip" data-bs-placement="right" title="Évaluation corrigée !"></span>' : '<span class="circle awaiting" data-bs-toggle="tooltip" data-bs-placement="right" title="Évaluation non corrigée !"></span>')?></td>
                                <td class="text-center"><?=$intern["intern_evaluation_errors_found"]?>/<?=$intern["evaluation_errors_max"]?></td>
                                <td class="text-center"><?=number_format(floatval($intern["intern_evaluation_errors_found"]/$intern["evaluation_errors_max"])*100, 0)?></td>
                            </tr>
                        <?php }} else { ?>
                            <tr>
                                <td class="text-center" colspan="6">Aucune donnée à afficher</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<?php 
include_once("./js.php");
include_once("./footer.php");