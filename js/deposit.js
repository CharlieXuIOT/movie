$(document).ready(function () {
    $("#deposit").click(function () {
        let amount = $('#amount').find(":selected").val();
        let regex = /^[0-9]*$/;

        if (!regex.test(parseInt(amount))) {
            alert("不乖不給你錢");
            return false;
        }
        $.ajax({
            type: "POST",
            url: "php/route.php",
            data: {
                "action" : "deposit",
                "amount" : amount
            },
            success: function (response) {
                response = JSON.parse(response);
                if (!response["status"]) {
                    alert(response["msg"]);
                } else {
                    alert("給你錢");
                    $("#navCash").html('<span class="glyphicon glyphicon-usd"></span>' + response["cash"]);
                }
            }
        });
    });
});