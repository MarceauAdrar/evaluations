<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-no-fit=1">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/base.css" />
    <link rel="stylesheet" href="./css/connexion.css" />
    <title>Evaluation finale<?= $title ?></title>
</head>

<body>
    <?php if(isset($_SESSION["intern"]["intern_id"])) { ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">ADRAR</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Accueil</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbar_dropdown_modules" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Modules
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbar_dropdown_modules">
                                <li><a class="dropdown-item" href="modules/html_css/">HTML/CSS</a></li>
                            </ul>
                        </li>
                    </ul>
                    <span class="navbar-text">
                        <?=$_SESSION["intern"]["intern_first_name"] . " " . $_SESSION["intern"]["intern_last_name"]?>
                        &nbsp;
                        <a href="<?=$PUBLIC_DIR?>logout.php">Se déconnecter</a>
                    </span>
                </div>
            </div>
        </nav>
    <?php } ?>

    <div class="text-center">
        <img src="./imgs/adrar_logo.svg" alt="Logo de l'ADRAR" id="logo_adrar" />
    </div>