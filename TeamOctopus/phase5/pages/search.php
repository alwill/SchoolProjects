<?php
require_once("$_SERVER[DOCUMENT_ROOT]/inc/inc.search.php");
session_start();
$pageTitle="Search";
# Checks if logged in. If NOT logged in, the login button stays the same.
# If IS logged in, the login button changes to logout.
if(isset($_SESSION['loggedin']))
    $loggedin = $_SESSION['loggedin'];
include_once("$_SERVER[DOCUMENT_ROOT]/inc/header.php");
// Body content ?>
<div id"wrap"> <!-- footer.php CLOSES this tag -->

<p>Displaying Results: <br> <?php queryTitle() ?></p>
<?php
include_once("$_SERVER[DOCUMENT_ROOT]/inc/footer.php");
?>