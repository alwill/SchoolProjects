<?php
include_once("$_SERVER[DOCUMENT_ROOT]/phase5/inc/inc.info.php");
session_start();
# Checks if logged in. If NOT logged in, the login button stays the same.
# If IS logged in, the login button changes to logout.
if(isset($_SESSION['loggedin']))
    $loggedin = $_SESSION['loggedin'];
# Gets ID. ID is passed as a GET method. Creates a Title class
# this class contains all the title data
if(isset($_GET['id']))
    getTitleData($_GET['id']);
$pageTitle = getPageTitle();
include_once("$_SERVER[DOCUMENT_ROOT]/phase5/inc/header.php");
// Body content ?>
<div id="wrap">
    <div class="row-fluid">
        <div class="editable text-center">
            <h3><?php getTitle() ?></h3>
            <p><?php getPlot() ?></p>
        </div>
    </div>
</div>
<?php
include_once("$_SERVER[DOCUMENT_ROOT]/phase5/inc/footer.php");
?>