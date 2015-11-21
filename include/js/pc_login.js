$(document).ready(
    function () {
        $("#login_normal").click(function () {
            $("#qr_login").hide();
            $("#normal_login").show();
            $("#login_normal").addClass("active");
            $("#login_qr").removeClass("active");
        });
        $("#login_qr").click(function () {
            $("#qr_login").show();
            $("#normal_login").hide();
            $("#login_qr").addClass("active");
            $("#login_normal").removeClass("active");
        });
        $("#login_btn").click(function () {
            $.ajax({
                type: "POST",
                url: "/pc_api/login.php",
                data: {
                    username: $("#username").val(),
                    password: $("#password").val()
                },
                dataType: "json",
                success: function (data) {
                    alert(data.login);
                }
            });
        });
    }
);