<?php 

include_once("../src/db.php");

$title = " | Contrôle administration";

if($_SESSION["intern"]["intern_username"] != "mrodrigues18") {
    header("Location: ./index.php");
}

$sql_select_interns = "SELECT intern_id, intern_last_name, intern_first_name, intern_username, evaluation_errors_max, intern_evaluation_completed, intern_evaluation_correction, intern_evaluation_errors_found, evaluation_id, evaluation_dd_link
                    FROM interns_evaluations ie 
                    JOIN interns i ON (i.intern_id = ie.id_intern) 
                    JOIN evaluations e ON (e.evaluation_id = ie.id_evaluation) 
                    JOIN evaluations_dd edd ON (edd.evaluation_dd_id = e.id_evaluation_dd) 
                    ORDER BY evaluation_dd_id, evaluation_id;";
$req_select_interns = $db->prepare($sql_select_interns);
$req_select_interns->execute();
$interns = $req_select_interns->fetchAll(PDO::FETCH_ASSOC);

$sql_select_tps = "SELECT evaluation_id, id_evaluation_dd 
                    FROM evaluations e
                    JOIN interns_evaluations ie ON (e.evaluation_id = ie.id_evaluation 
                                                    AND intern_evaluation_correction = 0 
                                                    AND intern_evaluation_completed = 1
                                                    ) 
                    GROUP BY evaluation_id;";
$req_select_tps = $db->prepare($sql_select_tps);
$req_select_tps->execute();
$tps = $req_select_tps->fetchAll(PDO::FETCH_ASSOC);

$arr = array(
    ["html-css" => 0], 
    ["bootstrap" => 0], 
);

include_once("./header.php"); ?>
<div class="container">
    <div class="row mt-2">
        <div class="col-8 offset-2">
            <button role="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAddCourse">Ajouter un cours</button>
            <button role="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalManageCourses" onclick="showModalManageCourses();">Gérer les cours</button>
        </div>
    </div>
    <div class="row">
        <div class="col-8 offset-2">
            
            <div class="modules mt-3">
                <details close>
                    <summary>
                        <span class="admin-titles">Données du module HTML/CSS</span>
                    </summary>
                    <?php foreach($tps as $value) if($value['id_evaluation_dd'] == 1) { ?>
                        <a class="btn btn-warning mb-2" href="./check.php?module=html-css&tp=<?=$value['evaluation_id']?>">Correction TP<?=$value?></a>
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
                            <?php if(!empty($interns)) { 
                            foreach($interns as $intern) if($intern['evaluation_dd_link'] == "html-css") {
                                $arr[0]["html-css"] += 1;
                            ?>
                                <tr>
                                    <td class="text-center"><?=$intern["evaluation_id"]?></td>
                                    <td>(<?=$intern["intern_id"]?>)&nbsp;<?=$intern["intern_first_name"]?> <?=$intern["intern_last_name"]?></td>
                                    <td><a href="./achieved.php?module=html-css&tp=<?=$intern["evaluation_id"]?>&intern_username=<?=$intern["intern_username"]?>&intern_id=<?=$intern["intern_id"]?>&correction=1" class="btn btn-info btn-sm">Voir</a></td>
                                    <td><?=(!empty($intern["intern_evaluation_completed"]) ? '<span class="circle completed" data-bs-toggle="tooltip" data-bs-placement="right" title="Évaluation terminée !"></span>' : '<span class="circle awaiting" data-bs-toggle="tooltip" data-bs-placement="right" title="Évaluation en cours !"></span>')?></td>
                                    <td><?=(!empty($intern["intern_evaluation_correction"]) ? '<span class="circle completed" data-bs-toggle="tooltip" data-bs-placement="right" title="Évaluation corrigée !"></span>' : '<span class="circle awaiting" style="cursor: pointer;" onclick="validInternCorrection(' . $intern["intern_id"] . ', ' . $intern["evaluation_id"] . ', \'plus\');" data-bs-toggle="tooltip" data-bs-placement="right" title="Évaluation non corrigée !"></span>')?></td>
                                    <td class="text-center">
                                        <?php if(!empty($intern["evaluation_errors_max"])) { ?>
                                            <?=(!empty($intern["intern_evaluation_errors_found"]) ? '<i class="fa-solid fa-circle-minus" style="cursor: pointer; float: left; padding-top: 2%; color: var(--col_base);" onclick="validInternCorrection(' . $intern["intern_id"] . ', ' . $intern["evaluation_id"] . ', \'minus\');"></i>' : '')?>
                                            <span id="errors_found_plus_one_<?=$intern["evaluation_id"]?>_<?=$intern["intern_id"]?>" value="<?=intval($intern["intern_evaluation_errors_found"])?>"><?=$intern["intern_evaluation_errors_found"]?></span>
                                            /
                                            <?=$intern["evaluation_errors_max"]?><?=($intern["intern_evaluation_errors_found"] < $intern["evaluation_errors_max"] ? '<i class="fa-solid fa-plus-circle" style="cursor: pointer; float: right; padding-top: 2%; color: var(--col_base);" onclick="validInternCorrection(' . $intern["intern_id"] . ', ' . $intern["evaluation_id"] . ', \'plus\');"></i>' : '')?>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center"><?=(!empty($intern["evaluation_errors_max"]) ? number_format(floatval($intern["intern_evaluation_errors_found"]/$intern["evaluation_errors_max"])*100, 0) : "")?></td>
                                </tr>
                            <?php }} 
                            if(empty($arr[0]["html-css"]) || empty($interns)) { ?>
                                <tr>
                                    <td class="text-center" colspan="7">Aucune donnée à afficher</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </details>
            </div>
            
            <div class="modules mt-3">
                <details open>
                    <summary>
                        <span class="admin-titles">Données du module Bootstrap</span>
                    </summary>
                    <?php foreach($tps as $value) if($value['id_evaluation_dd'] == 3) { ?>
                        <a class="btn btn-warning mb-2" href="./check.php?module=bootstrap&tp=<?=$value['evaluation_id']?>">Correction TP<?=$value?></a>
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
                            <?php if(!empty($interns)) { 
                            foreach($interns as $intern) if($intern['evaluation_dd_link'] == "bootstrap") { 
                                $arr[0]["bootstrap"] += 1;
                            ?>
                                <tr>
                                    <td class="text-center"><?=$intern["evaluation_id"]?></td>
                                    <td>(<?=$intern["intern_id"]?>)&nbsp;<?=$intern["intern_first_name"]?> <?=$intern["intern_last_name"]?></td>
                                    <td><a href="achieved.php?module=bootstrap&tp=<?=$intern["evaluation_id"]?>&intern_username=<?=$intern["intern_username"]?>&intern_id=<?=$intern["intern_id"]?>&correction=1" class="btn btn-info btn-sm">Voir</a></td>
                                    <td><?=(!empty($intern["intern_evaluation_completed"]) ? '<span class="circle completed" data-bs-toggle="tooltip" data-bs-placement="right" title="Évaluation terminée !"></span>' : '<span class="circle awaiting" data-bs-toggle="tooltip" data-bs-placement="right" title="Évaluation en cours !"></span>')?></td>
                                    <td><?=(!empty($intern["intern_evaluation_correction"]) ? '<span class="circle completed" data-bs-toggle="tooltip" data-bs-placement="right" title="Évaluation corrigée !"></span>' : '<span class="circle awaiting" data-bs-toggle="tooltip" data-bs-placement="right" title="Évaluation non corrigée !"></span>')?></td>
                                    <td class="text-center"><?=$intern["intern_evaluation_errors_found"]?>/<?=$intern["evaluation_errors_max"]?></td>
                                    <td class="text-center"><?=number_format(floatval($intern["intern_evaluation_errors_found"]/$intern["evaluation_errors_max"])*100, 0)?></td>
                                </tr>
                            <?php }} 
                            if(empty($arr[0]["bootstrap"]) || empty($interns)) { ?>
                                <tr>
                                    <td class="text-center" colspan="7">Aucune donnée à afficher</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </details>
            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="modalAddCourse" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalAddCourseTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddCourseTitle">Ajouter un cours</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../src/requests.php" method="post">
                    <div class="mb-3">
                        <label for="form_course_title" class="form-label">Titre du cours:</label>
                        <input type="text" class="form-control" name="form_course_title" id="form_course_title" placeholder="HTML...">
                    </div>
                    <div class="mb-3">
                        <label for="form_course_synopsis" class="form-label">Synopsis du cours:</label>
                        <textarea class="form-control" name="form_course_synopsis" id="form_course_synopsis" placeholder="Bref énoncé..." cols="" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="form_course_text" class="form-label">Enoncé du cours:</label>
                        <textarea class="form-control" name="form_course_text" id="form_course_text" placeholder="Énoncé..." cols="" rows="15"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="form_course_keywords" class="form-label">Mots-clés du cours:</label>
                        <input type="text" class="form-control" name="form_course_keywords" id="form_course_keywords" placeholder="...">
                    </div>
                    <div class="mb-3">
                        <label for="form_course_link" class="form-label">Lien du cours:</label>
                        <input type="text" class="form-control" name="form_course_link" id="form_course_link" placeholder="https://...">
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="form_course_active">
                        <label class="form-check-label" for="form_course_active">
                            Cours visible ?
                        </label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-success" onclick="addCourse();">Enregistrer</button>
            </div>
        </div>
    </div>
</div>


<div class="modal modal-lg fade" id="modalManageCourses" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalManageCoursesTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalManageCoursesTitle">Gérer les cours</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>

<?php 
include_once("./js.php"); ?>
<script>
    sessionStorage.setItem("previous_uri", "<?=$_SERVER["REQUEST_URI"]?>");
    function validInternCorrection(id_intern, tp, operation) {
        var errors_found = $("#errors_found_plus_one_" + tp + "_" + id_intern).attr("value");
        if(operation === 'minus') errors_found--;
        if(operation === 'plus') errors_found++;

        $.ajax({
            url: "../src/requests.php", 
            method: "post",
            data: {
                valid_intern_correction: 1,
                tp: tp, 
                errors_found: errors_found, 
                id_intern: id_intern
            }, 
            success: function(r) {
                $("#errors_found_plus_one_" + tp + "_" + id_intern).attr("value", errors_found);
                $("#errors_found_plus_one_" + tp + "_" + id_intern).text(errors_found);
            }
        });
    }

    function showModalManageCourses() {
        $.ajax({
            url: "../src/requests.php", 
            method: "post",
            data: {
                show_modal_manage_courses: 1 
            }, 
            success: function(r) {
                $("#modalManageCourses .modal-content .modal-body").html(r);
            }
        });
    }

    function updateStatusCourse(course_id) {
        var course_active = ($("#course_" + course_id + " span").hasClass("course-active") ? 0 : 1);

        $.ajax({
            url: "../src/requests.php", 
            method: "post",
            data: {
                update_status_course: 1, 
                course_id: course_id, 
                course_active: course_active
            }, 
            success: function(r) {
                if(r == "ok") {
                    $("#course_" + course_id + " span").toggleClass("course-active course-inactive");
                }
            }
        });
    }
</script>
<?php 
include_once("./footer.php");