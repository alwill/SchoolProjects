<?php
session_start();
$pageTitle="Profile";
# Checks if logged in. If NOT logged in, the login button stays the same.
# If IS logged in, the login button changes to logout.
if(isset($_SESSION['loggedin'])){
    $loggedin = $_SESSION['loggedin'];
}
else{
header("Location: /phase5/pages/login.php");
}
include_once("$_SERVER[DOCUMENT_ROOT]/phase5/inc/header.php");

// Body content
?>
    <div id="wrap">
    <h3 class="page-header" align="center">Your Profile</h3>
    	<div Class="row">
    		<div class="container center-block col-sm-5 col-md-6">

			<ul class = "list-group"><h4>Favorites</h4>
			<?php
			foreach ($_SESSION['favorites'] as &$fav) {
    		echo '<li class="list-group-item">' . $fav . '</li>';
			}
		echo '</ul>';

?>			
			</div>
		<div class="container center-block col-sm-5 col-sm-offset-2 col-md-6 col-md-offset-0">
			<ul class = "list-group"><h4>Upcoming Favorites</h4>
			
			</ul>

		</div>

	</div>
	<div class='row'>
		<div class="container center-block col-sm-5 col-md-6">
		<ul class = "list-group"><h4>Comment History</h4>
				<?php
				include_once("$_SERVER[DOCUMENT_ROOT]/phase5/inc/inc.usercomments.php");
				for ($i = 0; $i< count($result); $i++){
					echo '<li class="list-group-item"><h5><strong>' . $result[$i]['mediaName'] . '</strong></h5>';
					echo '<p>' .  $result[$i]['comment'] . '</p></li>';
				}
				?>
			</ul>

		</div>
	</div>
</div>
<?php
include_once("$_SERVER[DOCUMENT_ROOT]/phase5/inc/footer.php");
?>