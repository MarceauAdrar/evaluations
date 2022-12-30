<?php
include_once("../src/db.php");

if (!isset($_SESSION["intern"]["intern_id"])) {
    header("Location: ./connexion.php");
}

$title = " | Cours";

ob_start();
include_once("./header.php");
?> 
<div class="container">
    <div class="row pt-5 courses">
        <?php 
        $sql_select_courses = "SELECT course_id, course_title, course_synopsis, course_link, course_illustration 
                                FROM courses
                                WHERE course_active = 1 
                                AND course_category=:course_category;";
        $req_select_courses = $db->prepare($sql_select_courses);
        $req_select_courses->bindParam(":course_category", $_GET["cours"]);
        $req_select_courses->execute();
        $courses = $req_select_courses->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($courses)) { ?>
            <h3>Les cours</h3>
            <?php 
            foreach($courses as $course) { ?>
                <div class="col-3 mb-3">
                    <a href="<?=$course['course_link']?>" target="_blank" class="text-decoration-none text-black">
                        <div class="card">
                            <span class="card-img-top" alt="Illustration HTML/CSS/JS">
                                <?php include("./imgs/".$course["course_illustration"]); ?>
                            </span>
                            <div class="card-body">
                                <h5 class="card-title text-decoration-underline"><?=$course["course_title"]?></h5>
                                <p class="card-text"><?=$course["course_synopsis"]?></p>
                            </div>
                        </div>
                    </a>
                </div>
        <?php }} else { ?>
            <div class="col-3 offset-4 mt-5 text-center">
                <?php include_once("./imgs/no_data.svg") ?>
                <h3 class="mt-3">Aucun cours trouvé...</h3>
            </div>
        <?php } ?>

    </div>
</div>

<!-- Modale pour afficher un cours -->
<div class="modal fade" id="modalCourse" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalCourseTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"></div>
    </div>
</div>

<?php
include_once("./js.php");
include_once("./footer.php");
die(ob_get_clean());
?> 