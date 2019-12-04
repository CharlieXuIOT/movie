$(document).ready(function () {
    let url = new URL(window.location.href);
    let event = url.searchParams.get('event');
    $("#checkout").click(function () {
        $.ajax({
            type: "POST",
            url: "php/book.php",
            data: {
                "action": "checkout",
                "event" : event,
                "token": getCookie("token"),
                "ticket": getCookie("ticket"),
                "seat": getCookie("seats"),
                "total": getCookie("total")
            },
            success: function (response) {
                response = JSON.parse(response);
                if (response["status"]) {
                    alert("訂票成功!");
                    window.location = "index.php";
                } else {
                    alert(response["msg"]);
                    window.location = "book_ticket.php?event=" + event;
                }
            }
        });
    });
});

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i].trim();
        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
    }
    return "";
}