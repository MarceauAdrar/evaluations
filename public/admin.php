<?php 

include_once("../src/db.php");

$title = " | Contrôle administration";

if($_SESSION["intern"]["intern_username"] != "mrodrigues18") {
    header("Location: ./index.php");
}

$sql_select_html = "SELECT intern_id, intern_last_name, intern_first_name, intern_username, evaluation_errors_max, intern_evaluation_completed, intern_evaluation_correction, intern_evaluation_errors_found, evaluation_id
                    FROM interns_evaluations ie 
                    JOIN interns i ON (i.intern_id = ie.id_intern) 
                    JOIN evaluations e ON (e.evaluation_id = ie.id_evaluation) 
                    JOIN evaluations_dd edd ON (edd.evaluation_dd_id = e.id_evaluation_dd) 
                    WHERE evaluation_dd_link = 'html-css' 
                    ORDER BY evaluation_dd_id, evaluation_id;";
$req_select_html = $db->prepare($sql_select_html);
$req_select_html->execute();
$interns_html = $req_select_html->fetchAll(PDO::FETCH_ASSOC);

$sql_select_tps_html_css = "SELECT evaluation_id 
                            FROM evaluations e
                            JOIN interns_evaluations ie ON (e.evaluation_id = ie.id_evaluation AND intern_evaluation_correction = 0 AND intern_evaluation_completed = 1) 
                            WHERE id_evaluation_dd = 1;";
$req_select_tps_html_css = $db->prepare($sql_select_tps_html_css);
$req_select_tps_html_css->execute();
$tps_html_css = $req_select_tps_html_css->fetchAll(PDO::FETCH_COLUMN);

$sql_select_bootstrap = "SELECT intern_id, intern_last_name, intern_first_name, intern_username, evaluation_errors_max, intern_evaluation_completed, intern_evaluation_correction, intern_evaluation_errors_found, evaluation_id
                        FROM interns_evaluations ie 
                        JOIN interns i ON (i.intern_id = ie.id_intern) 
                        JOIN evaluations e ON (e.evaluation_id = ie.id_evaluation) 
                        JOIN evaluations_dd edd ON (edd.evaluation_dd_id = e.id_evaluation_dd) 
                        WHERE evaluation_dd_link = 'bootstrap' 
                        ORDER BY evaluation_dd_id, evaluation_id;";
$req_select_bootstrap = $db->prepare($sql_select_bootstrap);
$req_select_bootstrap->execute();
$interns_bootstrap = $req_select_bootstrap->fetchAll(PDO::FETCH_ASSOC);

$sql_select_tps_bootstrap = "SELECT evaluation_id 
                            FROM evaluations e
                            JOIN interns_evaluations ie ON (e.evaluation_id = ie.id_evaluation AND intern_evaluation_completed = 0) 
                            WHERE id_evaluation_dd = 2;";
$req_select_tps_bootstrap = $db->prepare($sql_select_tps_bootstrap);
$req_select_tps_bootstrap->execute();
$tps_bootstrap = $req_select_tps_bootstrap->fetchAll(PDO::FETCH_COLUMN);

include_once("./header.php"); ?>
<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            
            <div class="modules mt-3">
                <h4>Données du module HTML</h4>
                <?php foreach($tps_html_css as $value) { ?>
                    <a class="btn btn-warning mb-2" href="check.php?module=html-css&tp=<?=$value?>">Correction TP<?=$value?></a>
                <?php } ?>
                <table class="table table-bordered table-striped table-responsive">
                    <thead>
                        <tr class="text-center">
                            <th>TP n°</th>
                            <th>(#ID) Prénom NOM</th>
                            <th>Voir</th>
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
                                <td><a href="achieved.php?module=html-css&tp=<?=$intern["evaluation_id"]?>&intern_username=<?=$intern["intern_username"]?>&intern_id=<?=$intern["intern_id"]?>&correction=1" class="btn btn-info btn-sm">Voir</a></td>
                                <td><?=(!empty($intern["intern_evaluation_completed"]) ? '<span class="circle completed" data-bs-toggle="tooltip" data-bs-placement="right" title="Évaluation terminée !"></span>' : '<span class="circle awaiting" data-bs-toggle="tooltip" data-bs-placement="right" title="Évaluation en cours !"></span>')?></td>
                                <td><?=(!empty($intern["intern_evaluation_correction"]) ? '<span class="circle completed" data-bs-toggle="tooltip" data-bs-placement="right" title="Évaluation corrigée !"></span>' : '<span class="circle awaiting" style="cursor: pointer;" onclick="validInternCorrection(' . $intern["intern_id"] . ', ' . $intern["evaluation_id"] . ');" data-bs-toggle="tooltip" data-bs-placement="right" title="Évaluation non corrigée !"></span>')?></td>
                                <td class="text-center"><span id="errors_found_plus_one_<?=$intern["evaluation_id"]?>_<?=$intern["intern_id"]?>" value="<?=intval($intern["intern_evaluation_errors_found"]+1)?>"><?=$intern["intern_evaluation_errors_found"]?></span>/<?=$intern["evaluation_errors_max"]?><?=($intern["intern_evaluation_errors_found"] < $intern["evaluation_errors_max"] ? '<i class="fa-solid fa-plus-circle" style="cursor: pointer; float: right; padding-top: 2%; color: var(--col_base);" onclick="validInternCorrection(' . $intern["intern_id"] . ', ' . $intern["evaluation_id"] . ');"></i>' : '')?></td>
                                <td class="text-center"><?=number_format(floatval($intern["intern_evaluation_errors_found"]/$intern["evaluation_errors_max"])*100, 0)?></td>
                            </tr>
                        <?php }} else { ?>
                            <tr>
                                <td class="text-center" colspan="7">Aucune donnée à afficher</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            
            <div class="modules mt-3">
                <h4>Données du module Bootstrap</h4>
                <?php foreach($tps_bootstrap as $value) { ?>
                    <a class="btn btn-warning mb-2" href="check.php?module=html-css&tp=<?=$value?>">Correction TP<?=$value?></a>
                <?php } ?>
                <table class="table table-bordered table-striped table-responsive">
                    <thead>
                        <tr class="text-center">
                            <th>TP n°</th>
                            <th>(#ID) Prénom NOM</th>
                            <th>Voir</th>
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
                                <td><a href="achieved.php?module=bootstrap&tp=<?=$intern["evaluation_id"]?>&intern_username=<?=$intern["intern_username"]?>&intern_id=<?=$intern["intern_id"]?>&correction=1" class="btn btn-info btn-sm">Voir</a></td>
                                <td><?=(!empty($intern["intern_evaluation_completed"]) ? '<span class="circle completed" data-bs-toggle="tooltip" data-bs-placement="right" title="Évaluation terminée !"></span>' : '<span class="circle awaiting" data-bs-toggle="tooltip" data-bs-placement="right" title="Évaluation en cours !"></span>')?></td>
                                <td><?=(!empty($intern["intern_evaluation_correction"]) ? '<span class="circle completed" data-bs-toggle="tooltip" data-bs-placement="right" title="Évaluation corrigée !"></span>' : '<span class="circle awaiting" data-bs-toggle="tooltip" data-bs-placement="right" title="Évaluation non corrigée !"></span>')?></td>
                                <td class="text-center"><?=$intern["intern_evaluation_errors_found"]?>/<?=$intern["evaluation_errors_max"]?></td>
                                <td class="text-center"><?=number_format(floatval($intern["intern_evaluation_errors_found"]/$intern["evaluation_errors_max"])*100, 0)?></td>
                            </tr>
                        <?php }} else { ?>
                            <tr>
                                <td class="text-center" colspan="7">Aucune donnée à afficher</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<?php 
include_once("./js.php"); ?>
<script>
    sessionStorage.setItem("previous_uri", "<?=$_SERVER["REQUEST_URI"]?>");
    function validInternCorrection(id_intern, tp) {
        $.ajax({
            url: "http://" + SERVER_ADDR + "/eval/src/requests.php", 
            method: "post",
            data: {
                valid_intern_correction: 1,
                tp: tp, 
                errors_found: $("#errors_found_plus_one_" + tp + "_" + id_intern).attr("value"), 
                id_intern: id_intern
            }, 
            success: function(r) {
                location.reload();
            }
        });
    }
</script>
<?php 
include_once("./footer.php");