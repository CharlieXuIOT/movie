$(document).ready(function () {
    $("#Login").click(function (e) {
        $account = $("#account").val();
        $password = $("#password").val();
        $.ajax({
            type: "POST",
            url: "php/member.php",
            data: {
                "action": "login",
                "account": $account,
                "password": $password
            },
            success: function (response) {
                response = JSON.parse(response);
                if (response["status"] === true) {
                    alert("登入成功!");
                    window.location.href = "index.php";
                } else if (response["status"] === false) {
                    alert("請確認帳號或是密碼!");
                }
            }
        });
    });
});