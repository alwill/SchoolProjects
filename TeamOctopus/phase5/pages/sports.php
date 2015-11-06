<?php
session_start();
$pageTitle="Sports";
# Checks if logged in. If NOT logged in, the login button stays the same.
# If IS logged in, the login button changes to logout.
if(isset($_SESSION['loggedin']))
    $loggedin = $_SESSION['loggedin'];
include_once("$_SERVER[DOCUMENT_ROOT]/phase5/inc/header.php");
// Body content ?>
    <link rel="stylesheet" type="text/css" href="/phase5/css/sports.css">
    <div class="dropdown">
        <script src="/phase5/js/sports.js"></script>
    </div>
    <div id="wrap"> <!-- footer.php CLOSES this tag -->

<?php
include_once("$_SERVER[DOCUMENT_ROOT]/phase5/inc/footer.php");
?>