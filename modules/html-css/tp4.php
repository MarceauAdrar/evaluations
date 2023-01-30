<div class="container-fluid">
    <div class="row">
        <div class="col-12 mb-3 mt-3">
            <div class="float-start">
                <a class="btn btn-primary" id="btn_go_back"><i class="fa-solid fa-chevron-left"></i>&nbsp;Retour</a>
            </div>
            <div class="float-end">
                <a class="btn btn-success" id="btn_submit" href="#" onclick="submitEvaluation('html-css', 'tp4');"><i class="fa-solid fa-paper-plane"></i>&nbsp;Soumettre à validation</a>
            </div>
        </div>
        <div class="col-6" id="box_code">
            <div class="editor">
                <span class="fake-apple-buttons">
                    <span class="fake-btn fake-close"></span>
                    <span class="fake-btn fake-resize"></span>
                    <span class="fake-btn fake-minimize"></span>
                </span>
                <span class="file-title"><i>style.css</i></span>
                <div class="line-numbers">
                    <span></span>
                </div>
                <textarea id="code_editor" attr-extension="css" attr-module="html-css" attr-tp="tp4" spellcheck="false"></textarea>
            </div>
        </div>
        <div class="col-6" id="box_preview">
            <iframe id="web_preview" src="" frameborder="0"></iframe>
        </div>
    </div>
</div>