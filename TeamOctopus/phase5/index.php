<?php
require_once("$_SERVER[DOCUMENT_ROOT]/phase5/inc/inc.index.php");
session_start();
$pageTitle="Home";
# Checks if logged in. If NOT logged in, the login button stays the same.
# If IS logged in, the login button changes to logout.
if(isset($_SESSION['loggedin']))
    $loggedin = $_SESSION['loggedin'];
    
include_once("$_SERVER[DOCUMENT_ROOT]/phase5/inc/header.php");
// Body content ?>
    
<div class="wrap">
    <div class="row-fluid">          
        <p class="editable text-center"><img src="images/guru.png"></p>        
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-8">     
            <?php build_guide() ?> 
        </div>
        <div class="col-xs-6 col-sm-3">
            <p>Trending stuff</p>
        </div>
    </div>
</div>
<?php
include_once("$_SERVER[DOCUMENT_ROOT]/phase5/inc/footer.php");
?>