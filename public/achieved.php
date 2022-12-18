<?php

include_once("../src/db.php");

if(!empty($_GET["module"]) && !empty($_GET["tp"])) { 
    $sql_check_achieved = "SELECT intern_evaluation_correction 
                            FROM interns_evaluations 
                            WHERE id_evaluation=:id_evaluation 
                            AND id_intern=:id_intern;";
    $req_check_achieved = $db->prepare($sql_check_achieved);
    $req_check_achieved->bindParam(":id_evaluation", $_GET["tp"]);
    $req_check_achieved->bindParam(":id_intern", $_SESSION["intern"]["intern_id"]);
    $req_check_achieved->execute();
    if(empty($req_check_achieved->fetch(PDO::FETCH_COLUMN))) {
        header("Location: ./index.php");
    }
}

$title = " | Vision du TP terminé";

include_once("./header.php"); ?>
    <script>
        var module = sessionStorage.setItem("module", "<?=$_GET["module"]?>");
        var tp = sessionStorage.setItem("tp", "<?=$_GET["tp"]?>");
    </script>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-3 mt-3">
                <div class="float-start">
                    <a class="btn btn-primary" id="btn_go_back"><i class="fa-solid fa-chevron-left"></i>&nbsp;Retour</a>
                </div>
            </div>
            <div class="col-6">
                <div class="editor">
                    <div class="line-numbers">
                        <span></span>
                    </div>
                    <textarea readonly id="code_editor_readonly" spellcheck="false"></textarea>
                </div>
            </div>
            <div class="col-6">
                <div class="editor">
                    <div class="line-numbers-correction">
                        <span></span>
                    </div>
                    <textarea readonly id="code_editor_correction_readonly" spellcheck="false"></textarea>
                </div>
            </div>
        </div>
    </div>
    <?php 
    include_once("./js.php");
    ?>
    <script src="./js/evals.js" type="text/javascript"></script>
    <script>
        loadButtons();
        chargerCorrection();
        function chargerCorrection() {
            var intern_username = sessionStorage.getItem("intern_username");
            const link = "http://" + SERVER_ADDR + "/eval/public/stagiaires/" + intern_username + "/" + sessionStorage.getItem("module") + "/tp" + sessionStorage.getItem("tp") + ".html";
            const linkCorrection = "http://" + SERVER_ADDR + "/eval/modules/" + sessionStorage.getItem("module") + "/corrections/tp" + sessionStorage.getItem("tp") + ".html";
            
            var html_editor_1 = getHtmlContent(link);
            $("#code_editor_readonly").val(html_editor_1);
            var html_editor_2 = getHtmlContent(linkCorrection);
            $("#code_editor_correction_readonly").val(html_editor_2);

            setTimeout(function() {
                // On ajoute les lignes aux éditeurs
                $(".line-numbers").html("");
                for(var i = 0 ; i < html_editor_1.split(/\r\n|\r|\n/).length + 3 ; i++) {
                    $(".line-numbers").html($(".line-numbers").html() + "<span></span>");
                }
                
                $(".line-numbers-correction").html("");
                for(var i = 0 ; i < html_editor_2.split(/\r\n|\r|\n/).length + 3 ; i++) {
                    $(".line-numbers-correction").html($(".line-numbers-correction").html() + "<span></span>");
                }
            }, 250);
        }
    </script>
