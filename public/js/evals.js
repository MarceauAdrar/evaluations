var textarea = document.querySelector('textarea');
var lineNumbers = document.querySelector('.line-numbers');
var typingTimer;
var doneTypingInterval = 1000;

textarea.addEventListener('keyup', event => {
    clearTimeout(typingTimer)
    typingTimer = setTimeout(
        function() { 
            saveCode($("#code_editor").attr("attr-module"), $("#code_editor").attr("attr-tp"))
        }, 
        doneTypingInterval);
});

textarea.addEventListener('keydown', event => {
    if (event.key === 'Tab') {
        const start = textarea.selectionStart;
        const end = textarea.selectionEnd;

        textarea.value = textarea.value.substring(0, start) + '\\t' + textarea.value.substring(end);

        event.preventDefault();
    }
});

function loadButtons() {
    var goBackBtn = document.getElementById('btn_go_back');
    goBackBtn.href = sessionStorage.getItem("previous_uri");
}

function addLinesToEditor(onlyBody = false) {
    var lineNumberMin;
    if(onlyBody) {
        lineNumberMin = document.getElementById("web_preview").contentDocument.body.innerHTML.split(/\r\n|\r|\n/).length + 1;
    } else {
        lineNumberMin = document.getElementById("web_preview").contentWindow.document.documentElement.innerHTML.split(/\r\n|\r|\n/).length + 3;
    }
    console.log(lineNumberMin);
    $(".line-numbers").html("");
    for(var i = 0 ; i < lineNumberMin ; i++) {
        $(".line-numbers").html($(".line-numbers").html() + "<span></span>");
    }
}

function reloadBoxs() {
    var intern_username = sessionStorage.getItem("intern_username");
    const link = "http://" + SERVER_ADDR + "/eval/public/stagiaires/" + intern_username + "/html-css/tp1.html";

    if($("#code_editor").length) {
        // Éditeur
        $("#code_editor").val(getHtmlContent(link));
        
        setTimeout(function() {
            // On ajoute les lignes à l'éditeur
            addLinesToEditor(false);
        }, 250);
    }
    
    if($("#web_preview").length) {
        // IFrame
        var iframe = document.getElementById('web_preview');
        iframe.src = link;
    }    
}

function getHtmlContent(URI) {
    var xmlHttp = null;

    xmlHttp = new XMLHttpRequest();
    xmlHttp.open("GET", URI, false);
    xmlHttp.send(null);

    return xmlHttp.responseText;
}

function saveCode(module, tp) {
    $.ajax({
        url: "http://" + SERVER_ADDR + "/eval/src/requests.php", 
        method: "post",
        data: {
            save_code: 1, 
            html: $("#code_editor").val(), 
            module: module, 
            tp: tp
        }, 
        success: function(r) {
            if(r == "ok") {
                reloadBoxs();
            }
        }
    });
}

function submitEvaluation(module, tp) {
    $.ajax({
        url: "http://" + SERVER_ADDR + "/eval/src/requests.php", 
        method: "post",
        data: {
            submit_evaluation: 1,  
            module: module, 
            tp: tp
        }, 
        success: function(r) {
            if(r == "ok") {
                location.href = $("#btn_go_back").attr("href");
            }
        }
    });
}