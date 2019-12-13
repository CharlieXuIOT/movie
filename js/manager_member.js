let id = new String();
let permission = new String();
$(document).ready(function () {
    $(".page").click(function () {
        let page = $(this).text();
        if (!$(this).hasClass("active")) {
            if (!$(".toggle").hasClass("off")) {
                // console.log("quick search with page click");
                window.location = "manager_member.php?quick=1&page=" + page;
            } else {
                // console.log("page click");
                window.location = "manager_member.php?page=" + page;
            }
        }
    });
});

$(document).on('click', '.toggle', function () {
    if (!$(this).hasClass("off")) {
        window.location = "manager_member.php?quick=1";
    } else {
        window.location = "manager_member.php";
    }
});

$(document).on('click', '.btnn', function () {
    if (!confirm("確定更改權限?")) {
        return false;
    }
    
    if ($(this).hasClass("suspend")) {
        permission = "-1";
    } else if ($(this).hasClass("lift")) {
        permission = "1";
    }
    id = $(this).parent().parent().attr("id");
    $.ajax({
        type: "Post",
        url: "php/route.php",
        data: {
            "action": "manager_member",
            "id": id,
            "permission": permission
        },
        success: function (response) {
            response = JSON.parse(response);
            if (response["status"]) {
                if (permission === "-1") {
                    $("#"+id).children(".level").empty().append('<p style="color: red">停權會員</p>');
                    $("#"+id).children(".switch").empty().append('<input type="button" class="btn btn-info btnn lift" value="解除"></input>');
                    permission = "1";
                } else if (permission === "1") {
                    $("#"+id).children(".level").empty().append('<p style="color: green">一般會員</p>');
                    $("#"+id).children(".switch").empty().append('<input type="button" class="btn btn-danger btnn suspend" value="停權"></input>');
                    permission = "-1";
                    if ($('.toggle').hasClass("btn-primary")) {
                        $("#"+id).fadeOut();
                    }
                }
            } else {
                console.log("更改失敗");
            }
        }
    });
});