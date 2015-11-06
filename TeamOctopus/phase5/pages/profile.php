<?php
session_start();
$pageTitle="Template";
# Checks if logged in. If NOT logged in, the login button stays the same.
# If IS logged in, the login button changes to logout.
if(isset($_SESSION['loggedin']))
    $loggedin = $_SESSION['loggedin'];
include_once("$_SERVER[DOCUMENT_ROOT]/phase5/inc/header.php");
// Body content
$favoritesArray = explode(',', $_SESSION['favorites']);
echo '<ul>';


foreach ($favoritesArray as &$fav) {
    echo '<li>' . $fav . '</li>';
}
echo '</ul>';

?>

<div id="wrap"> <!-- footer.php CLOSES this tag -->



<?php
include_once("$_SERVER[DOCUMENT_ROOT]/phase5/inc/footer.php");
?>