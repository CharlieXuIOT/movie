let id = new String();
let permission = new String();
$(document).ready(function () {

});

$(document).on('click', '#quicksearch', function () {
    if ($(this).hasClass("btn-warning")) {
        $(this).removeClass("btn-warning").addClass("btn-default");
        // 隱藏非停權帳號
        $(".suspend").each(function(){
            $(this).parent().parent().hide();
        })
    } else {
        $(this).removeClass("btn-default").addClass("btn-warning");
        // 顯示所有帳號
        $("tr:hidden").show();
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
        url: "php/member.php",
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
                    if ($('#quicksearch').hasClass("btn-default")) {
                        $("#"+id).hide();
                    }
                }
            } else {
                console.log("更改失敗");
            }
        }
    });
});