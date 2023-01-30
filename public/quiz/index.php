<?php
include_once("../../src/db.php");

$title = " | Quiz";

$sql_quiz_list = "SELECT quiz_list_id, quiz_list_title, quiz_dd_link
                FROM quiz_lists ql
                JOIN quiz_dd qd ON (qd.quiz_dd_id = ql.id_dd_quiz)
                WHERE quiz_dd_link=:quiz_dd_link;";
$req_quiz_list = $db->prepare($sql_quiz_list);
$req_quiz_list->bindParam(":quiz_dd_link", $_GET["cours"]);
$req_quiz_list->execute();
$quiz_list = $req_quiz_list->fetchAll(PDO::FETCH_ASSOC);

$lignes = '';
if(!empty($quiz_list)) {
    foreach($quiz_list as $value) {
        $lignes .= '<tr>';
        $lignes .= '    <td>' . $value['quiz_list_title'] . '</td>';
        $lignes .= '    <td>' . strtoupper($value['quiz_dd_link']) . '</td>';
        $lignes .= '    <td><button role="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalDisplayQuiz" onclick="fetchQuizData(' . $value['quiz_list_id'] . ');">Commencer</button></td>';
        $lignes .= '    <td><span class="circle awaiting"></span></td>';
        $lignes .= '</tr>';
    }
} else {
    $lignes = '<tr><td colspan="4">Aucune donnée à afficher...</td></tr>';
}

ob_start();
include_once("../header.php"); ?>
<div class="container">
    <div class="row">
        <div class="col-8 offset-2 text-center">
            <h1>Liste des quiz disponibles</h1>
            <img class="svgs-full" src="http://<?=$_SERVER["SERVER_NAME"]?>/public/imgs/online_test.svg" alt="Illustration code review" />
            <table class="table table-bordered table-striped table-responsive mt-3">
                <thead>
                    <th>Titre</th>
                    <th>Type</th>
                    <th>Lien</th>
                    <th>État</th>
                </thead>
                <tbody>
                    <?=$lignes?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal modal-lg fade" id="modalDisplayQuiz" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalDisplayQuizTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
    </div>
</div>

<?php include_once("../js.php"); ?>
<script>
    sessionStorage.setItem("previous_uri", "<?=$_SERVER["REQUEST_URI"]?>");

    function fetchQuizData(quiz_list_id, offset = 0) {
        $.ajax({
            url: "../../src/requests.php", 
            method: "post",
            data: {
                fetch_quiz_data: 1,
                quiz_list_id: quiz_list_id, 
                offset: offset
            }, 
            success: function(r) {
                $("#modalDisplayQuiz .modal-content").html(r);
            }
        });
    }

    function sendQuiz(quiz_id, id_quiz_list, offset) {
        var answers = "";
        $(".quiz_propositions").each(function() {
            if($(this).is(":checked")) {
                answers += $(this).data("quiz-id") + ";";
            }
        });

        if(answers === "") {
            $("#error").show();
            return false;
        } else {
            $("#error").hide();
            $.ajax({
                url: "../../src/requests.php", 
                method: "post",
                data: {
                    send_quiz: 1,
                    quiz_id: quiz_id, 
                    answers: answers
                }, 
                success: function(r) {
                    $("#modalDisplayQuiz .modal-content").html(r);
                }
            });
            if(offset != 0) {
                fetchQuizData(id_quiz_list, offset);
            }
        }
    }
</script>
<?php 
include_once("../footer.php");
die(ob_get_clean());
