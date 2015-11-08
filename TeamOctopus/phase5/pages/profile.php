<?php
session_start();
$pageTitle="Profile";
# Checks if logged in. If NOT logged in, the login button stays the same.
# If IS logged in, the login button changes to logout.
if(isset($_SESSION['loggedin'])){
    $loggedin = $_SESSION['loggedin'];
	$favoritesArray = explode(',', $_SESSION['favorites']);
	echo '<ul>';
	foreach ($favoritesArray as &$fav) {
    echo '<li>' . $fav . '</li>';
}
echo '</ul>';
}
else{
header("Location: /phase5/pages/login.php");

}
include_once("$_SERVER[DOCUMENT_ROOT]/phase5/inc/header.php");
// Body content
?>
<div id="wrap">


</div>
<?php
include_once("$_SERVER[DOCUMENT_ROOT]/phase5/inc/footer.php");
?>