$(document).ready(function () {
    $.ajax({
        url: "/tam/ebooks/air-ticket/includes/check-auth.php",
        type: "GET",
        dataType: "json",
        success: function (res) {
            if (res.status !== 1) {
                window.location.href = "/tam/login";
            }
        },
        error: function () {
            window.location.href = "/tam/login";
        }
    });
});
