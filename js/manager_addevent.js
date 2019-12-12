$(document).ready(function () {
    let date_regex = /[0-9]{4}-[0-9]{2}-[0-9]{2}/;
    let time_regex = /[0-9]{2}:[0-9]{2}/;
    let id_regex = /^[0-9]*$/;
    $("button").click(function () {
        let id = $("#movie").find("option:checked").attr("id");
        let date = $("#date").val();
        let time = $("#time").val();

        if (id_regex.test(id) && date_regex.test(date) && time_regex.test(time)) {
            $.ajax({
                type: "POST",
                url: "php/route.php",
                data: {
                    "action": "manager_addevent",
                    "id": id,
                    "date": date,
                    "time": time
                },
                success: function (response) {
                    response = JSON.parse(response);
                    if (response["status"]) {
                        alert("新增成功!");
                        window.location = "index.php";
                    } else {
                        alert("新增失敗，請通知管理員");
                    }
                }
            });
        } else {
            alert("請重新選擇電影");
        }
    });
});