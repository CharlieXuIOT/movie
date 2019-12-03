/* Set values + misc */
var fadeTime = 300;

$(document).ready(function () {
    $('.goSeat').hide();

    /* Assign actions */
    $('select').change(function () {
        updateQuantity(this);
    });

    $(".goSeat").click(function () { 
        var arr = new Array();
        var count = 0;
        var total = $('#basket-total').html();
        $('.basket-product').each(function () {
            var ticketType = $(this).find("strong").text();
            var price = parseFloat($(this).children('.price').text());
            var quantity = $(this).find("select").val();
            if (quantity !== "0") {
                arr.push({
                    'ticketType':ticketType,
                    'quantity':quantity
                })
                count += parseInt(quantity);
            }
        });
        document.cookie = "ticket=" + JSON.stringify(arr) + ";path=/";
        document.cookie = "count=" + count + ";path=/";
        document.cookie = "total=" + total + ";path=/";

        let url = new URL(window.location.href);
        let event = url.searchParams.get('event');
        window.location = "book_seat.php?event=" + event;
    });
});

/* Recalculate cart */
function recalculateCart(onlyTotal) {
    var subtotal = 0;

    /* Sum up row totals */
    // 將左欄位的小計加總
    $('.basket-product').each(function () {
        subtotal += parseFloat($(this).children('.subtotal').text());
    });

    /* Calculate totals */
    var total = subtotal;


    /* Update summary display. */
    $('.final-value').fadeOut(fadeTime, function () {
        $('#basket-total').html(total);
        if (total == 0) {
            $('.goSeat').fadeOut(fadeTime);
        } else {
            $('.goSeat').fadeIn(fadeTime);
        }
        $('.final-value').fadeIn(fadeTime);
    });
}

/* Update quantity */
function updateQuantity(quantityInput) {
    /* Calculate line price */
    var productRow = $(quantityInput).parent().parent();
    var price = parseFloat(productRow.children('.price').text());
    var quantity = $(quantityInput).val();
    var linePrice = price * quantity;

    /* Update line price display and recalc cart totals */
    productRow.children('.subtotal').each(function () {
        $(this).fadeOut(fadeTime, function () {
            $(this).text(linePrice);
            recalculateCart();
            $(this).fadeIn(fadeTime);

        });
    });

    updateSumItems();
}

function updateSumItems() {
    $(".whatubuy").empty();
    $('.basket-product').each(function () {
        var ticketType = $(this).find("strong").text();
        var price = parseFloat($(this).children('.price').text());
        var quantity = $(this).find("select").val();
        if (quantity !== "0") {
            $(".whatubuy").append('<p>'+ticketType+' X '+quantity+'<span class="pull-right price">'+price*quantity+'</span></p>');
        }
    });
}