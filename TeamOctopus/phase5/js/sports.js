/**
 * Created by AlexWill on 11/5/15.
 */

$(function(){
    showSport("");
    var button = '<form>';
    button += '<select name="sports" onchange="showSport(this.value)">';
    button += '<option value="">Select a sport:</option>';
    button += '<option value="MLB">MLB</option>';
    button += '<option value="NFL">NFL</option>';
    button += '<option value="NHL">NHL</option>';
    button += '<option value="NBA">NBA</option>';
    button += '</select>';
    button += '</form>';
    $(".dropdown").append(button);
});


function showSport(str) {
   /*if (str == "") {
        document.getElementById("sportsBox").innerHTML = "";
        return;
    } else {*/
        if(str == ""){
            str = "current";
        }
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("sportsBox").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","../inc/getSports.php?sport="+str,true);
        xmlhttp.send();
    //}
}

$(document).ready(function() {
    $('#post').click(function(){
        var text = $("#comment").val();
        $.ajax({
            type: 'POST',
            url: '../inc/inc.sports.php',
            data: {comment: text},
            success: function(data) {
                $("#comments").html(data);
                $("#comment").val("");
            }
        });
    });
});


setInterval(refreshChat, 10000);  // 10 seconds
function refreshChat() {
    $.ajax({
        type: "POST",
        url: "../inc/inc.sports.php",
        data: {refresh: "1"},
        sucess: function(data) {
            $("#comments").html(data);
        }
    });
}