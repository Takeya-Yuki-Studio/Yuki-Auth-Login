$(document).ready(function() {
    $(".webapi").click(function () {
        document.location="/api/webapi/login.php?appid=2&appsecret=takeya-yuki";
    });
    $(".appapi").click(function () {
        document.location="yuki://login?appid=2&appsecret=takeya-yuki";
    });
});