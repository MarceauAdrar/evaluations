function showInformationsModal() {
    $(".help-resource").toggleClass("fade-in");
    if(!$(".help-resource").hasClass("fade-in")) {
        $(".help-resource").toggleClass("fade-out");
    }
}

function showCourse(course_id) {
    $.ajax({
        url: "http://" + SERVER_ADDR + "/evaluations/src/requests.php", 
        method: "post",
        dataType: "json",
        data: {
            show_course: 1, 
            course_id: course_id
        }, 
        success: function(r) {
            if(r.success == "ok") {
                $("#modalCourse .modal-content").html(r.modal_content);
                $("#modalCourse").modal("show");
            }
        }
    });
}

function addCourse() {
    $.ajax({
        url: "http://" + SERVER_ADDR + "/evaluations/src/requests.php", 
        method: "post",
        data: {
            add_course: 1, 
            form_course_title: form_course_title, 
            form_course_title: $("#form_course_title").val(), 
            form_course_synopsis: $("#form_course_synopsis").val(), 
            form_course_text: $("#form_course_text").val(), 
            form_course_keywords: $("#form_course_keywords").val(), 
            form_course_link: $("#form_course_link").val(), 
            form_course_active: $("#form_course_active").is(":checked"), 
        }, 
        success: function(r) {
            if(r == "ok") {
                $("#modalCourse .modal-content").html("");
                $("#modalCourse").modal("hide");
            }
        }
    });
}