var textarea = document.querySelector('textarea');
var lineNumbers = document.querySelector('.line-numbers');
var typingTimer;
var doneTypingInterval = 1000;
var lineNumberMin = document.getElementById("web_preview").contentDocument.body.innerHTML.split(/\r\n|\r|\n/).length;

textarea.addEventListener('keyup', event => {
    if(event.code == "Enter") {
        addLinesToEditor(event.target.value.split('\\n').length);
    }
    clearTimeout(typingTimer);
    if(textarea.value) {
        typingTimer = setTimeout(
            function() { 
                saveCode($("#code_editor").attr("attr-module"), $("#code_editor").attr("attr-tp"))
            }, 
            doneTypingInterval);
    }
});

textarea.addEventListener('keydown', event => {
    if (event.key === 'Tab') {
        const start = textarea.selectionStart;
        const end = textarea.selectionEnd;

        textarea.value = textarea.value.substring(0, start) + '\\t' + textarea.value.substring(end);

        event.preventDefault();
    }
});

function addLinesToEditor(i = 0) {
    for(i ; i <= lineNumberMin ; i++) {
        $(".line-numbers").html($(".line-numbers").html() + "<span></span>");
    }
}

function reloadBoxs() {
    var intern_username = sessionStorage.getItem("intern_username");
    const link = "http://localhost/eval/public/stagiaires/" + intern_username + "/html-css/tp1.html";
    addLinesToEditor(document.documentElement.innerHTML.split(/\r\n|\r|\n/).length);
    // Éditeur
    $("#code_editor").val(getHtmlContent(link));
    // IFrame
    var iframe = document.getElementById('web_preview');
    iframe.src = link;
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
        url: "http://localhost/eval/src/requests.php", 
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