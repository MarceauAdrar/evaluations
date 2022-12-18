function showInformationsModal() {
    $(".help-resource").toggleClass("fade-in");
    if(!$(".help-resource").hasClass("fade-in")) {
        $(".help-resource").toggleClass("fade-out");
    }
}