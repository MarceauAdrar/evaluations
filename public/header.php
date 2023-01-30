<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <!-- CSS only -->
    <link href="//cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="http://<?=$_SERVER["SERVER_NAME"]?>/public/css/base.css" />
    <link rel="stylesheet" href="http://<?=$_SERVER["SERVER_NAME"]?>/public/css/connexion.css" />
    <link rel="stylesheet" href="http://<?=$_SERVER["SERVER_NAME"]?>/public/css/tables.css" />
    <link rel="stylesheet" href="http://<?=$_SERVER["SERVER_NAME"]?>/public/css/evals.css" />
    <link rel="stylesheet" href="http://<?=$_SERVER["SERVER_NAME"]?>/public/css/animations.css" />
    <title>Evaluation finale<?= $title ?></title>
</head>

<body>
    <div class="wrapper">
    <?php if(isset($_SESSION["intern"]["intern_id"])) { ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="http://<?=$_SERVER["SERVER_NAME"]?>/public">
                    <img src="http://<?=$_SERVER["SERVER_NAME"]?>/public/imgs/adrar_logo.svg" alt="Logo de l'ADRAR" id="logo_adrar" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="http://<?=$_SERVER["SERVER_NAME"]?>/public">Accueil</a>
                        </li>
                        <?php
                        if($_SESSION["intern"]["intern_username"] == "mrodrigues18") { ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="http://<?=$_SERVER["SERVER_NAME"]?>/public/admin.php">Administration</a>
                        </li>
                        <?php } ?>
                        <?php /*
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbar_dropdown_modules" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Modules
                            </a>
                            <?php 
                            $sql_evaluations = "SELECT evaluation_dd_name, evaluation_dd_link 
                                                FROM evaluations_dd
                                                WHERE evaluation_dd_active = 1;";
                            $req_evaluations = $db->prepare($sql_evaluations);
                            $req_evaluations->execute(); ?>
                            <ul class="dropdown-menu" aria-labelledby="navbar_dropdown_modules">
                                <?php foreach($req_evaluations->fetchAll(PDO::FETCH_ASSOC) as $eval) { ?>
                                    <li><a class="dropdown-item" href="http://<?=$_SERVER["SERVER_NAME"]?>/public/modules/<?=$eval["evaluation_dd_link"]?>/"><?=$eval["evaluation_dd_name"]?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbar_dropdown_quiz" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Quiz
                            </a>
                            <?php 
                            $sql_quiz = "SELECT quiz_dd_name, quiz_dd_link 
                                                FROM quiz_dd
                                                WHERE quiz_dd_active = 1;";
                            $req_quiz = $db->prepare($sql_quiz);
                            $req_quiz->execute(); ?>
                            <ul class="dropdown-menu" aria-labelledby="navbar_dropdown_quiz">
                                <?php foreach($req_quiz->fetchAll(PDO::FETCH_ASSOC) as $eval) { ?>
                                    <li><a class="dropdown-item" href="http://<?=$_SERVER["SERVER_NAME"]?>/public/quiz?cours=<?=$eval["quiz_dd_link"]?>"><?=$eval["quiz_dd_name"]?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        */ ?>
                    </ul>
                    <span class="navbar-text">
                        <?=$_SESSION["intern"]["intern_first_name"] . " " . $_SESSION["intern"]["intern_last_name"]?>
                        &nbsp;
                        <a href="http://<?=$_SERVER["SERVER_NAME"]?>/public/logout.php">Se déconnecter</a>
                    </span>
                </div>
            </div>
        </nav>
    <?php } ?>