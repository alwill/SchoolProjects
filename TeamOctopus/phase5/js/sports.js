/**
 * Created by AlexWill on 11/5/15.
 */

$(function(){
    var button = '<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Sports';
     button += '<span class="caret"></span></button>';
     button += '<ul class="dropdown-menu"><li><a href="#">NFL</a></li><li><a href="#">MLB</a></li> <li><a href="#">NHL</a></li> </ul>';
    $(".dropdown").append(button);
});