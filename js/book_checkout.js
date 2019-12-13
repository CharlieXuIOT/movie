$(document).ready(function () {
    let url = new URL(window.location.href);
    let event = url.searchParams.get('event');
    let token = getCookie("token");
    let ticket = getCookie("ticket");
    let seat = getCookie("seats");
    let total = getCookie("total");
    
        $("#checkout").click(function () {
            if (token !== "" && ticket !== "" && seat !== "" && total !== "") {
                $.ajax({
                    type: "POST",
                    url: "php/route.php",
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
            } else {
                alert("訂票手續不全!");
                window.location = "book_ticket.php?event=" + event;
            }
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