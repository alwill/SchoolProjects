<?php

if(isset($_POST['recovery']))
    recovery();

function recovery(){
		echo '<script type="text/javascript">';
        echo 'alert ("An email with recovery instructions has been sent to you");';
		echo '</script>';
}
?>