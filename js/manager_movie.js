$(document).ready(function () {
    $(".edit").click(function () {
        let id = $(this).parent().parent().attr("id");
        $.ajax({
            type: "GET",
            url: "php/route.php?action=manager_movie_status&id=" + id,
            success: function (response) {
                response = JSON.parse(response);
                if (response["status"]) {
                    let data = response["data"];
                    $("#nametw").val(data["name_tw"]);
                    $("#nameen").val(data["name_en"]);
                    $("#intro").text(data["intro"]);
                    $(".submit").attr('id', data["id"]);
                }
            }
        });
    });

    $(".submit").click(function () {
        if ($("#nametw").val() === "" || $("#nameen").val() === "" || $("#intro").val() === "") {
            alert("no empty!");
            return false;
        }
        let id = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: "php/route.php",
            data: {
                "action": "manager_movie_info",
                "id": id,
                "name_tw": $("#nametw").val(),
                "name_en": $("#nameen").val(),
                "intro": $("#intro").val()
            },
            success: function (response) {
                response = JSON.parse(response);
                if (response["status"]) {
                    alert("修改成功!");
                    window.location.reload();
                } else {
                    alert(response["msg"]);
                }
            }
        });
    });
});

$(document).on('click', '.btnn', function () {
    if (!confirm("確定更改影片狀態?")) {
        return false;
    }
    
    if ($(this).hasClass("suspend")) {
        status = "0";
    } else if ($(this).hasClass("lift")) {
        status = "1";
    }

    let status_position = $(this).parent().parent().find(".status");
    let button_position = $(this);
    let id = $(this).parent().parent().attr("id");
    // console.log(button_position.attr("class"));
    $.ajax({
        type: "POST",
        url: "php/route.php",
        data: {
            "action": "manager_movie_status",
            "id": id,
            "status": status
        },
        success: function (response) {
            response = JSON.parse(response);
            if (response["status"]) {
                if (status === "0") {
                    // button_position.empty().append('<button type="button" class="btn btn-info btnn lift">上架</button>');
                    button_position.attr({type:"button",  class:"btn btn-info btnn lift", value:"上架"})
                    status_position.empty().append('<p style="color: red" class="status">已下架</p>');
                } else {
                    button_position.attr({type:"button",  class:"btn btn-danger btnn suspend", value:"下架"});
                    status_position.empty().append('<p style="color: green" class="status">播映中</p>');
                }
            }
        }
    });
});