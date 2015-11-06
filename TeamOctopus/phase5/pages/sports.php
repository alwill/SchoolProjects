<?php
session_start();
$pageTitle="Sports";
# Checks if logged in. If NOT logged in, the login button stays the same.
# If IS logged in, the login button changes to logout.
if(isset($_SESSION['loggedin']))
    $loggedin = $_SESSION['loggedin'];
include_once("$_SERVER[DOCUMENT_ROOT]/phase5/inc/header.php");
// Body content ?>
    <div class="dropdown">

    </div>
    <div id="wrap"> <!-- footer.php CLOSES this tag -->
    <script src="/phase5/js/sports.js"></script>
<?php
include_once("$_SERVER[DOCUMENT_ROOT]/phase5/inc/footer.php");
?>