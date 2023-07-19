$(document).ready(function() {
    var paragraph = $(".description").text();
    if (window.innerWidth <= 767) {

        // $(".login-link").css("width", "100%");
        $("#dashboard-link").addClass("login-link");
        $(".login-link").addClass("d-flex justify-content-center");
        $(".login-link").addClass("d-flex justify-content-center");

       


        $(".navbarSupportedContent").removeClass("d-flex");

        $(".login-link").removeClass("mr-2");
        $("i.fa-regular.fa-user.ml-1").remove();


        // $("#login-link").css("width", "100%");



        $("#search").addClass("d-flex justify-content-center");

        $("#extra").remove();

        $(".description").css("font-size", "12px");
        $(".date").css("font-size", "10px");



        if (paragraph.length > 100) {
            var shortenedParagraph = paragraph.substring(0, 41) + "...";
            $(".description").text(shortenedParagraph);

        }

    } else {
        $("#login-link").removeClass("d-flex justify-content-center");
        if (paragraph.length > 400) {
            var shortenedParagraph = paragraph.substring(0, 401) + "...";
            $(".description").text(shortenedParagraph);
        }

    }
    
});
// $(document).ready(function() {

// });