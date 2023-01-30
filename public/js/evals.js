var textarea = document.querySelector('textarea');
var lineNumbers = document.querySelector('.line-numbers');
var typingTimer;
var doneTypingInterval = 1000;

textarea.addEventListener('keyup', event => {
    clearTimeout(typingTimer)
    typingTimer = setTimeout(
        function() { 
            saveCode($("#code_editor").attr("attr-extension"), $("#code_editor").attr("attr-module"), $("#code_editor").attr("attr-tp"))
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

function addLinesToEditor(onlyBody = false, lineFromIFrame = true) {
    var lineNumberMin;
    
    if($("#web_preview").length && lineFromIFrame) {
        if(onlyBody) {
            lineNumberMin = document.getElementById("web_preview").contentDocument.body.innerHTML.split(/\r\n|\r|\n/).length + 1;
        } else {
            lineNumberMin = document.getElementById("web_preview").contentWindow.document.documentElement.innerHTML.split(/\r\n|\r|\n/).length + 3;
        }
    } else {
        lineNumberMin = $("#code_editor").val().split(/\r\n|\r|\n/).length + 3;
    }

    $(".line-numbers").html("");
    for(var i = 0 ; i < lineNumberMin ; i++) {
        $(".line-numbers").html($(".line-numbers").html() + "<span></span>");
    }
}

function reloadBoxs() {
    var intern_username = sessionStorage.getItem("intern_username");
    var link = "http://" + SERVER_NAME + "/public/stagiaires/" + intern_username + "/html-css/tp" + sessionStorage.getItem("tp");
    var ext;
    var lineFromIFrame = true;
    if(sessionStorage.getItem("bHtml") == "1") {
        ext = ".html";
    } else if(sessionStorage.getItem("bCss") == "1") {
        lineFromIFrame = false;
        ext = ".css";
    }

    if($("#code_editor").length) {
        // Éditeur
        $("#code_editor").val(getHtmlContent(link + ext));
        
        setTimeout(function() {
            // On ajoute les lignes à l'éditeur
            addLinesToEditor(false, lineFromIFrame);
        }, 250);
    }
    
    if($("#web_preview").length) {
        // IFrame
        var iframe = document.getElementById('web_preview');
        iframe.src = link + ".html";
    }    
}

function getHtmlContent(URI) {
    var xmlHttp = null;

    xmlHttp = new XMLHttpRequest();
    xmlHttp.open("GET", URI, false);
    xmlHttp.send(null);

    return xmlHttp.responseText;
}

function saveCode(extension, module, tp) {
    $.ajax({
        url: "http://" + SERVER_NAME + "/src/requests.php", 
        method: "post",
        data: {
            save_code: 1, 
            code: $("#code_editor").val(), 
            extension: extension, 
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
        url: "http://" + SERVER_NAME + "/src/requests.php", 
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

function loadInformationsTP(tp) {
    $.ajax({
        url: "http://" + SERVER_NAME + "/src/requests.php", 
        method: "post",
        dataType: "json",
        data: {
            load_informations_tp: 1, 
            tp: tp
        }, 
        success: function(r) {
            $("#information_tp_title").text(r.title);
            $("#information_tp_body").html(r.body);
        }
    });
}
