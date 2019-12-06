$(document).ready(function () {
    let waitBook = $("#waitBook").html();
    $(".btn").click(function (e) {
        if ($(this).hasClass("btn-default")) {
            if (waitBook > 0) {
                $(this).removeClass("btn-default");
                $(this).addClass("btn-success");
                waitBook = waitBook - 1;
                $("#waitBook").text(waitBook);
            }
        } else if ($(this).hasClass("btn-success")) {
            $(this).removeClass("btn-success");
            $(this).addClass("btn-default");
            waitBook = waitBook + 1;
            $("#waitBook").text(waitBook);
        }

        if (waitBook === 0) {
            $("#checkout").removeClass("seat-sold");
        } else {
            if (!$("#checkout").hasClass("seat-sold")) {
                $("#checkout").addClass("seat-sold");
            }
        }
    });

    $("#checkout").click(function (e) {
        if (waitBook === 0) {
            var arr = new Array();
            $(".btn-success").each(function(){
                let row = $(this).parent().attr("class");
                let number = $(this).html();
                arr.push({
                    'row':row,
                    'number':number
                })
            });
            document.cookie = "seats=" + JSON.stringify(arr) + ";path=/";

            let url = new URL(window.location.href);
            let event = url.searchParams.get('event');
            window.location = "book_checkout.php?event=" + event;
        } else {
            alert("尚有座位待劃位!");
        }
    });
});