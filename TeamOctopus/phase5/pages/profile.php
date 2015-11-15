<?php
include_once("$_SERVER[DOCUMENT_ROOT]/phase5/inc/inc.profile.php");
session_start();
$pageTitle="Profile";
# Checks if logged in. If NOT logged in, the login button stays the same.
# If IS logged in, the login button changes to logout.
if(isset($_SESSION['loggedin'])){
    $loggedin = $_SESSION['loggedin'];
} else {
    header("Location: /phase5/pages/login.php");
}

if(isset($_GET['remove']))
    removeFavorite($_GET['remove']);
include_once("$_SERVER[DOCUMENT_ROOT]/phase5/inc/header.php");
// Body content
?>
<div class="wrap">
	<div class="row">
		<h3 class="page-header" align="center">Your Profile</h3>
	</div>
	<div Class="row">
		<div class="col-md-4">
			<div class="panel panel-primary">
            <div class="panel-heading">
                <h4>Favorites</h4>
            </div>
            <?php buildUserFavorites(getUserFavorites()); ?>
            </div>		
		</div>
	<div class="col-md-4">
		<div class="panel panel-primary">
            <div class="panel-heading">
                <h4>Upcoming Favorites</h4>
            </div>
            <?php buildUpcomingFavorites(); ?>
        </div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-primary">
            <div class="panel-heading">
                <h4>Comment History</h4>
            </div>
            <?php buildUserComments(getUserComments()); ?>
        </div>
   </div>
</div>

<?php
include_once("$_SERVER[DOCUMENT_ROOT]/phase5/inc/footer.php");
?>