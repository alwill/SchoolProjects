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
    <div class="row">
        <p class="editable text-center panel"><img src="images/guru.png"></p>        
    </div>
    <div class="col-xs-12 col-md-8">     
        <?php build_guide(); ?> 
    </div>
    <div class="col-xs-6 col-sm-3 pull-right">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>Trending Titles</h3>
            </div>
            <?php getTrendingTitles(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>More Stuff 1</h4>
                </div>
                <div class="panel-body">
                    <p>Content</p>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Recent Comments</h4>
                </div>
                <?php buildRecentComments(getRecentComments()); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Favorites?</h4>
                </div>
                <div class="panel-body">
                    <p>Content</p>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Sports?</h4>
                </div>
                <div class="panel-body">
                    <p>Content</p>
                </div>
            </div>
        </div>
    </div>
<?php
include_once("$_SERVER[DOCUMENT_ROOT]/phase5/inc/footer.php");
?>