$(document).ready(function() {
    $('#favorite').click(function(e){
        var button = $(e.target);
        $.ajax({
            type: 'POST',
            url: '../inc/inc.info.php',
            data: {favorite: button.val()},
            success: function(data) {
                alert(data);
                if(button.val() == "Favorite")
                    button.val("Unfavorite");
                else
                    button.val("Favorite");
            }
        });
    });
});

$(document).ready(function() {
    $('#post').click(function(){
        var text = $("#comment").val();
        $.ajax({
            type: 'POST',
            url: '../inc/inc.info.php',
            data: {comment: text},
            success: function(data) {        
                $("#comments").html(data);
                $("#comment").val("");
            }
        });
    });
});
