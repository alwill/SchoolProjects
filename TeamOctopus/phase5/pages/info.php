<?php
require_once("$_SERVER[DOCUMENT_ROOT]/phase5/inc/inc.info.php");
session_start();
# Checks if logged in. If NOT logged in, the login button stays the same.
# If IS logged in, the login button changes to logout.
if(isset($_SESSION['loggedin']))
    $loggedin = $_SESSION['loggedin'];
# Gets title. Title is passed as a GET method. Sets the page title to
# the movie/tv show title.
if(isset($_GET['title']))
    $pageTitle = $_GET['title'];
include_once("$_SERVER[DOCUMENT_ROOT]/phase5/inc/header.php");
// Body content ?>
<div id="wrap"> <!-- footer.php CLOSES this tag -->
<p>This is the info page for <?php echo $pageTitle; ?></p>

<?php
include_once("$_SERVER[DOCUMENT_ROOT]/phase5/inc/footer.php");
?>