<?php 
include_once("../src/db.php");
// TODO: remove this redirection
header("Location: ./index.php");

if (!empty($_SESSION["intern"]["intern_id"]) && isset($_SESSION["intern"]["intern_id"]) && !isset($_GET["token"])) {
    header("Location: ./index.php");
}

$sql_check_token = "SELECT evaluation_id, evaluation_title, evaluation_title, evaluation_synopsis, evaluation_token, evaluation_errors_max 
                    FROM evaluations e
                    LEFT JOIN interns_evaluations ie ON (e.evaluation_id = ie.id_evaluation AND ie.id_intern=:id_intern AND intern_evaluation_completed = 0)
                    WHERE evaluation_token=:evaluation_token;";
$req_check_token = $db->prepare($sql_check_token);
$req_check_token->bindParam(":id_intern", $_SESSION["intern"]["intern_id"]);
$req_check_token->bindParam(":evaluation_token", $_GET["token"]);
$req_check_token->execute();
$eval = $req_check_token->fetch(PDO::FETCH_ASSOC);
$evaluation_errors_max = $eval["evaluation_errors_max"];

$html = "";
$tp = 0;
$bHtml = 0;
$bCss = 0;
if($req_check_token->rowCount() > 0) {
    $data = array('intern_username' => $_SESSION["intern"]["intern_username"]);
    $postdata = http_build_query(
        array(
            'intern_username' => $_SESSION["intern"]["intern_username"]
        )
    );
    
    $opts = array('http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-Type: application/x-www-form-urlencoded',
            'content' => $postdata
        )
    );
    
    $context  = stream_context_create($opts);
    $link_template_html = "../modules/html-css/templates";
    $link_intern_html = "../public/stagiaires/" . $_SESSION["intern"]["intern_username"]."/html-css";
    if(!is_dir($link_intern_html)) {
        if(!mkdir($link_intern_html, 0664, true)) {
            die("Erreur lors de la création de l'arborescence");
    	}
    }

    $file = "";
    switch($eval["evaluation_id"]) {
        case 1:
            $tp = 1;
            $title = " | HTML/CSS (TP1)";

            $bHtml = 1;
            $bCss = 0;
            $file = "tp1.html";

            $html = file_get_contents("../modules/html-css/tp1.php", false, $context);
            break;
        case 2:
            $tp = 2;
            $title = " | HTML/CSS (TP2)";
            
            $bHtml = 1;
            $bCss = 0;
            $file = "tp2.html";
            
            $html = file_get_contents("../modules/html-css/tp2.php", false, $context);
            break;
        case 3:
            $tp = 3;
            $title = " | HTML/CSS (TP3)";
            
            $bHtml = 0;
            $bCss = 1;
            $file = "tp3.html";

            /* Création du fichier CSS */
            if(!file_exists($link_intern_html."/tp3.css")) {
                touch($link_intern_html."/tp3.css");
            }

            $html = file_get_contents("../modules/html-css/tp3.php", false, $context);
            break;
        case 4:
            $tp = 4;
            $title = " | HTML/CSS (TP4)";
            
            $bHtml = 0;
            $bCss = 1;
            $file = "tp4.html";

            /* Création du fichier CSS */
            if(!file_exists($link_intern_html."/tp4.css")) {
                touch($link_intern_html."/tp4.css");
            }

            $html = file_get_contents("../modules/html-css/tp4.php", false, $context);
            break;
        case 5:
            $tp = 5;
            $title = " | HTML/CSS (Intégration 2)";
            
            $bHtml = 1;
            $bCss = 1;
            $file = "index.html";
            $link_template_html = $link_template_html . "/rando_nuit";
            $link_intern_html = $link_intern_html . "/rando_nuit";

            if(!is_dir($link_intern_html)) {
                mkdir($link_intern_html);
            }

            /* Création du fichier CSS */
            if(!file_exists($link_intern_html."/style.css")) {
                touch($link_intern_html."/style.css");
            }
            
            $html = '
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 mb-3 mt-3">
                            <div class="float-start">
                                <a class="btn btn-primary" id="btn_go_back"><i class="fa-solid fa-chevron-left"></i>&nbsp;Retour</a>
                            </div>
                            <div class="float-end">
                                <a class="btn btn-success" id="btn_submit" href="#" onclick="submitEvaluation(\'html-css\', \'tp1\');"><i class="fa-solid fa-paper-plane"></i>&nbsp;Soumettre à validation</a>
                            </div>
                        </div>
                        <div class="col-12" id="box_preview">
                            <iframe id="web_preview_full" src="http://' . $_SERVER["SERVER_ADDR"] . '/eval/public/stagiaires/' . $_SESSION["intern"]["intern_username"] . '/html-css/rando_nuit/index.html" frameborder="0"></iframe>
                        </div>
                    </div>
                </div>';
            break;
        default:
            $tp = 0;
            $title = " | Erreur - Page introuvable";
            $html = file_get_contents("./error404.php");
    }
    if(!empty($file) && !file_exists($link_intern_html."/".$file)) {
        copy($link_template_html."/".$file, $link_intern_html."/".$file);
    }
} else {
    $title = " | Erreur - Page introuvable";
    $html = file_get_contents("./error404.php");
}

/* Début du document généré
 * @var html est la variable qui reçoit le contenu à charger
 */
ob_start();
include_once("./header.php"); ?>
<!-- Div permettant d'afficher une petite bulle sur les pages de TPs -->
<button role="button" onclick="showInformationsModal();" class="btn help-floating-btn btn-floating wave-effect">
    <i class="fa-solid fa-circle-info"></i>
</button>
<div class="help-resource">
    <h3 id="information_tp_title"></h3>
    <hr/>
    <p id="information_tp_body"></p>
    <hr/>
    <p><i>Points maximums obtenables:</i> <?=$evaluation_errors_max?></p>
</div>
<?php 
echo $html; 
include_once("./js.php"); ?>
<?php if($bHtml == 1 || $bCss == 1) { ?>
    <script src="./js/evals.js" type="text/javascript"></script>
    <script type="text/javascript">
        sessionStorage.setItem("tp", "<?=$tp?>");
        sessionStorage.setItem("bHtml", <?=$bHtml?>);
        sessionStorage.setItem("bCss", <?=$bCss?>);
        /* Charge les boutons en haut de la page */
        loadButtons();
        /* Charge l'aide dans la modale */
        loadInformationsTP(<?=$tp;?>);
        /* Charge l'éditeur et la fenêtre simulant la page écrite */
        reloadBoxs();
    </script>
<?php } ?>
<?php include_once("./footer.php"); 
die(ob_get_clean());
?>
