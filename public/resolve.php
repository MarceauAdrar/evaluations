<?php 
include_once("../src/db.php");

if (!empty($_SESSION["intern"]["intern_id"]) && isset($_SESSION["intern"]["intern_id"]) && !isset($_GET["token"])) {
    header("Location: ./index.php");
}

$sql_check_token = "SELECT evaluation_id, evaluation_title, evaluation_title, evaluation_synopsis, evaluation_token 
                    FROM evaluations e
                    LEFT JOIN interns_evaluations ie ON (e.evaluation_id = ie.id_evaluation AND ie.id_intern=:id_intern AND intern_evaluation_completed = 0)
                    WHERE evaluation_token=:evaluation_token;";
$req_check_token = $db->prepare($sql_check_token);
$req_check_token->bindParam(":id_intern", $_SESSION["intern"]["intern_id"]);
$req_check_token->bindParam(":evaluation_token", $_GET["token"]);
$req_check_token->execute();
$eval = $req_check_token->fetch(PDO::FETCH_ASSOC);

$html = "";
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

    switch($eval["evaluation_id"]) {
        case 1:
            $tp = 1;
            $title = " | HTML/CSS (TP1)";
            $html = file_get_contents("../modules/html-css/tp1.php", false, $context);
            break;
        case 2:
            $tp = 2;
            $title = " | HTML/CSS (TP2)";
            $html = file_get_contents("../modules/html-css/tp2.php", false, $context);
            break;
        default:
            $tp = 0;
            $title = " | Erreur - Page introuvable";
            $html = file_get_contents("./error404.php");
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
</div>
<?php 
echo $html; 
include_once("./js.php"); ?>
<script src="./js/evals.js" type="text/javascript"></script>
<script type="text/javascript">
    /* Charge les boutons en haut de la page */
    loadButtons();
    /* Charge l'aide dans la modale */
    loadInformationsTP(<?=$tp;?>);
    /* Charge l'éditeur et la fenêtre simulant la page écrite */
    reloadBoxs();
</script>
<?php include_once("./footer.php"); 
die(ob_get_clean());
?>
