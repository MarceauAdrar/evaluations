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
            $title = " | HTML/CSS (TP1)";
            $html = file_get_contents("../modules/html-css/tp1.php", false, $context);
            break;
        default:
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
include_once("./header.php"); 
echo $html; 
include_once("./js.php"); ?>
<script src="./js/evals.js" type="text/javascript"></script>
<script type="text/javascript">
    loadButtons();
    reloadBoxs();
</script>
<?php include_once("./footer.php"); 
die(ob_get_clean());
?>
