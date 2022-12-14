<?php 
include_once("../src/db.php");

$title = " | HTML/CSS (TP1)";

if (!empty($_SESSION["intern"]["intern_id"]) && isset($_SESSION["intern"]["intern_id"]) && !isset($_GET["token"])) {
    header("Location: ./index.php");
}

$sql_check_token = "SELECT evaluation_title, evaluation_title, evaluation_synopsis, evaluation_token 
                    FROM evaluations e
                    LEFT JOIN interns_evaluations ie ON (e.evaluation_id = ie.id_evaluation AND ie.id_intern=:id_intern AND intern_evaluation_completed = 0)
                    WHERE evaluation_token=:evaluation_token;";
$req_check_token = $db->prepare($sql_check_token);
$req_check_token->bindParam(":id_intern", $_SESSION["intern"]["intern_id"]);
$req_check_token->bindParam(":evaluation_token", $_GET["token"]);
$req_check_token->execute();

if($req_check_token->rowCount() == 0) {
    header('Location: ./error404.php');
}

ob_start(); 
include_once("./header.php"); ?>

<?php 
include_once("./footer.php"); 
die(ob_get_clean());
?>
