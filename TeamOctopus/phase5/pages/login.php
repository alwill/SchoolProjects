<?php
require_once("$_SERVER[DOCUMENT_ROOT]/phase5/inc/inc.login.php");
require_once("$_SERVER[DOCUMENT_ROOT]/phase5/inc/inc.register.php");
session_start();
$pageTitle="Login";
# Checks if logged in. If NOT logged in, the login button stays the same.
# If IS logged in, the login button changes to logout.
if(isset($_SESSION['loggedin']))
    $loggedin = $_SESSION['loggedin'];

include_once("$_SERVER[DOCUMENT_ROOT]/phase5/inc/header.php");
// Body content ?>
<div id="wrap"> <!-- footer.php CLOSES this tag -->
    <!-- ALL fields have a required attribute. They must be filled. IF NOT, alert is displayed -->
    <div class="row">
        <div class="container center-block">
            <form class="form-signin col-sm-5 col-md-6" action="login.php" method="POST">
                <h2 class="form-signin-heading">Sign In Below</h2>
                <label for="inputUser" class="sr-only">Username: </label>
                <input type="text" id="inputUser" class="form-control" name="username" placeholder="Username" required autofocus>
                <label for="inputPassword" class="sr-only">Password: </label>
                <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
                <input type="submit" class="btn btn-lg btn-primary btn-block" name="submit" value="Login">
            </form>
            <form class="form-signin col-sm-5 col-sm-offset-2 col-md-6 col-md-offset-0" action="login.php" method="POST">
                <h2 class="form-signin-heading">Register Below</h2>
                <label for="inputUser" class="sr-only">Username: </label>
                <input type="text" id="inputUser" class="form-control" name="regUsername" placeholder="Username" required autofocus>
                <label for="inputEmail" class="sr-only">E-mail: </label>
                <input type="email" id="inputEmailr" class="form-control" name="regEmail" placeholder="E-mail" required>
                <label for="inputPassword" class="sr-only">Password: </label>
                <input type="password" id="inputPassword" class="form-control" name="regPassword" placeholder="Password" required>
                <label for="reinputPassword" class="sr-only">Re-enter Password: </label>
                <input type="password" id="reinputPassword" class="form-control" name="regRepassword" placeholder="Re-enter Password" required>
                <input type="submit" class="btn btn-lg btn-primary btn-block" name="register" value="Register">
            </form>
        </div>
    </div>
    <div class="row">
        <div class="container center-block">
            <form class="form-signin col-md-4" action="login.php" method="POST">
                <h2 class="form-signin-heading">Forgot Your Password?</h2>
                <label for="inputEmail" class="sr-only">E-mail: </label>
                <input type="email" id="inputEmailr" class="form-control" name="email" placeholder="E-mail" required>
                <input type="submit" class="btn btn-lg btn-primary btn-block" name="submit" value="Send E-mail">
                <p>*An e-mail will be sent you with further instructions.</p> 
            </form>  
        </div>
    </div>
<?php
include_once("$_SERVER[DOCUMENT_ROOT]/phase5/inc/footer.php");
?>