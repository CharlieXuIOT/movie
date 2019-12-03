$(document).ready(function () {
    let url = new URL(window.location.href);
    let event = url.searchParams.get('event');
    $("#checkout").click(function () {
        $.ajax({
            type: "POST",
            url: "php/member.php",
            data: {
                "action" : "book",
                "token" : getCookie("token"),
                "ticket" : getCookie("ticket"),
                "seat" : getCookie("seats"),
                "total" : getCookie("total")
            },
            success: function (response) {

            }
        });
    });
});

function getCookie(cname)
{
  var name = cname + "=";
  var ca = document.cookie.split(';');
  for(var i=0; i<ca.length; i++) 
  {
    var c = ca[i].trim();
    if (c.indexOf(name)==0) return c.substring(name.length,c.length);
  }
  return "";
}