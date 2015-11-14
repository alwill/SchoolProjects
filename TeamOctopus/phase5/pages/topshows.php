<?php
session_start();
$pageTitle="topshows";
# Checks if logged in. If NOT logged in, the login button stays the same.
# If IS logged in, the login button changes to logout.
if(isset($_SESSION['loggedin']))
    $loggedin = $_SESSION['loggedin'];
include_once("$_SERVER[DOCUMENT_ROOT]/phase5/inc/header.php");
include_once("$_SERVER[DOCUMENT_ROOT]/phase5/inc/inc.topshows.php");
// Body content ?>
    <div class="wrap">
        <div class="row">
            <div class="col-md-6" >
                <?php buildTopNetflix() ?>
            </div>
            <div class = "col-md-6" >
                <?php buildTopPrime() ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php buildTopShowsTable() ?>
            </div>
        </div>

    </div>
<?php
include_once("$_SERVER[DOCUMENT_ROOT]/phase5/inc/footer.php");
?>