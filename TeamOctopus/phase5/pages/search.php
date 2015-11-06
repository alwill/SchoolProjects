<?php
require_once("$_SERVER[DOCUMENT_ROOT]/phase5/inc/inc.search.php");
session_start();
$pageTitle="Search";
# Checks if logged in. If NOT logged in, the login button stays the same.
# If IS logged in, the login button changes to logout.
if(isset($_SESSION['loggedin']))
    $loggedin = $_SESSION['loggedin'];
query_title();
include_once("$_SERVER[DOCUMENT_ROOT]/phase5/inc/header.php");
// Body content ?>
<div id="wrap"> <!-- footer.php CLOSES this tag -->
    <div class="col-md-8">
        <?php isset($_GET['refine']) ? build_table(refine_query()) : build_table(query_title()); ?>
    </div>
    <div class="col-md-4">
        <h3 class="page-header">Refine your search</h3>
        <form class="form-group" role="search" action="search.php">
            <div style="padding: 5px;">
                <input type="text" value="<?php echo $_GET['title']; ?>" name="title">
            </div>            
            <label>Streaming Service: </label>
            <div class="checkbox">
                <label><input type="checkbox" name="netflix">Netflix</label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" name="prime">Amazon Instant Video</label>
            </div>
            <label>Type of Title: </label>
            <div class="radio">
                <label class="radio">
                    <input type="radio" value="feature" name="type"> Movie
                </label> 
            </div>
            <div class="radio">   
                <label class="radio">
                    <input type="radio" value="tv_series" name="type"> TV Show
                </label>
            </div>
            <input type="submit" class="btn btn-lg btn-block" name="refine" value="Search">
        </form>
    </div>
<?php
include_once("$_SERVER[DOCUMENT_ROOT]/phase5/inc/footer.php");
?>