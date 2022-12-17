function displayPromptJoinModal(id) {
    $("#modalJoinEvaluation .modal-content").html("");

    $.ajax({
        url: "http://" + SERVER_ADDR + "/eval/src/requests.php", 
        method: "post",
        data: {
            display_prompt_join_modal: 1, 
            evalId: id
        }, 
        success: function(r) {
            $("#modalJoinEvaluation .modal-content").html(r);
            $("#modalJoinEvaluation").modal("show");
        }, 
        error: function() {
            $("#modalJoinEvaluation").modal("hide");
        }
    });
}

function btnJoinEvaluation(id) {
    $.ajax({
        url: "http://" + SERVER_ADDR + "/eval/src/requests.php", 
        method: "post",
        data: {
            btn_join_evaluation: 1, 
            evalId: id
        }, 
        success: function(r) {
            $("#modalJoinEvaluation .modal-content").html("");
            location.reload();
            setTimeout(function() {
                location.href = $("#eval_" + id).attr("href");
            }, 1000);
        }
    });
}