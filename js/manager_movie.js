$(document).ready(function () {
    
});

$(document).on('click', '.btn', function () {
    if (!confirm("確定更改影片狀態?")) {
        return false;
    }
    
    if ($(this).hasClass("suspend")) {
        permission = "-1";
    } else if ($(this).hasClass("lift")) {
        permission = "1";
    }

    id = $(this).parent().parent().attr("id");
    alert(id);
})