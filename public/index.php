<?php
include_once("../src/db.php");

if (!isset($_SESSION["intern"]["intern_id"])) {
    header("Location: ./connexion.php");
}

$title = " | Accueil";

ob_start();
include_once("./header.php");
?> 
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Bienvenue sur la plateforme pour valider vos acquis</h1>      
        </div>
    </div>
    
    <div class="row pt-5 courses">
        <h3>Les cours</h3>

        <?php 
        $sql_select_courses = "SELECT course_id, course_title, course_synopsis, course_illustration 
                                FROM courses
                                WHERE course_active = 1;";
        $req_select_courses = $db->prepare($sql_select_courses);
        $req_select_courses->execute();
        $courses = $req_select_courses->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($courses)) {
            foreach($courses as $course) { ?>
                <div class="col-3 mb-3">
                    <div class="card" onclick="showCourse(<?=$course["course_id"]?>);">
                        <img src="/eval/public/imgs/<?=$course["course_illustration"]?>" class="card-img-top" alt="Illustration HTML/CSS/JS">
                        <div class="card-body">
                            <h5 class="card-title"><?=$course["course_title"]?></h5>
                            <p class="card-text"><?=$course["course_synopsis"]?></p>
                        </div>
                    </div>
                </div>
        <?php }} ?>

    </div>
</div>

<!-- Modale pour afficher un cours -->
<div class="modal fade" id="modalCourse" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalCourseTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"></div>
    </div>
</div>

<script>
    sessionStorage.setItem("intern_username", "<?=$_SESSION["intern"]["intern_username"]?>");
    sessionStorage.setItem("SERVER_ADDR", "<?=($_SERVER["SERVER_ADDR"]=="::1" ? "localhost":$_SERVER["SERVER_ADDR"])?>");
</script>
<?php
include_once("./js.php");
include_once("./footer.php");
die(ob_get_clean());
?> 