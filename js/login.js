$(document).ready(function () {
    let regex = /^[A-Za-z0-9]{3,}$/;
    $("#Login").click(function () {
        account = $("#account").val();
        password = $("#password").val();
        if (!regex.test(account) || !regex.test(password)) {
            alert("帳號或是密碼格式不符");
            return false;
        }

        $.ajax({
            type: "POST",
            url: "php/member.php",
            data: {
                "action": "login",
                "account": account,
                "password": password
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