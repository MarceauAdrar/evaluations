<?php
include_once("../src/consts.php");
include_once($PRIVATE_DIR . "db.php");

if(!empty($_POST["intern_connexion"]) && $_POST["intern_connexion"] == 1) {
    $sql = "SELECT * 
            FROM interns 
            WHERE intern_username=:intern_username 
            AND intern_password=:intern_password;";
    $req = $db->prepare($sql);
    $req->bindParam(":intern_username", $_POST["intern_username"]);
    $req->bindParam(":intern_password", md5($_POST["intern_password"]));
    $req->execute();

    $_SESSION["form_connexion"]["errors"] = 0;

    if($req->rowCount() == 1) {
        $_SESSION["intern"] = $req->fetch(PDO::FETCH_ASSOC);
        header("Location: " . $PUBLIC_DIR . "index.php");
    }
    $_SESSION["form_connexion"]["errors"] = 1;
    header("Location: " . $PUBLIC_DIR . "connexion.php", );
}

?>