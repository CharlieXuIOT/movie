$(document).ready(function () {
    $("#navLogout").click(function (e) {
        e.preventDefault();
        var r = confirm("確定登出?");
        if (r === true) {
            $.ajax({
                type: "POST",
                url: "php/route.php",
                data: {
                    "action": "logout"
                },
                success: function (response) {
                    response = JSON.parse(response);
                    if (response["status"] === true) {
                        window.location.href = "index.php";
                    } else {
                        alert(response["msg"]);
                    }
                }
            });
        } else {
            return false;
        }
    })
});