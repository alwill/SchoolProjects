<?php
include_once("$_SERVER[DOCUMENT_ROOT]/phase5/inc/inc.info.php");
session_start();
# Checks if logged in. If NOT logged in, the login button stays the same.
# If IS logged in, the login button changes to logout.
if(isset($_SESSION['loggedin']))
    $loggedin = $_SESSION['loggedin'];
# Gets ID. ID is passed as a GET method. Creates a Title class
# this class contains all the title data
if(isset($_GET['id'])) {
    getTitleData($_GET['id']);
    $_SESSION['title_id'] = $_GET['id'];
}
$pageTitle = getPageTitle();
// To get the title for favoriting
$_SESSION['title'] = $pageTitle;
if(isset($_SESSION['favorites']))
    if(in_array($_SESSION['title'], $_SESSION['favorites']))
        $isFavorite = true;
include_once("$_SERVER[DOCUMENT_ROOT]/phase5/inc/header.php");
// Body content ?>
<div class="wrap">
    <div class="row">
        <div class="col-md-8">
            <img class="img-responsive img-rounded pull-right" src="../images/info_banner_1.jpg" alt="<?php getTitle() ?>">
        </div>
        <div class="col-md-4">
            <h3><?php getTitle() ?></h3>
            <p>Rating: <?php getRating(); ?> / 10 &nbsp;&nbsp;&nbsp; <?php getParentalGuide(); ?> &nbsp;&nbsp;&nbsp;
                <?php if(isset($_SESSION['loggedin'])) : ?>
                    <input type="submit" id="favorite" name="favorite" value= <?= isset($isFavorite) ? "Unfavorite" : "Favorite" ?> >
                <?php else : ?>
                    <strong>Login to Favorite</strong>
                <?php endif; ?>
                </p>                               
            <p><?php getPlot() ?></p>
        </div>
    </div>
    <div class="row">
        <div class="panel panel-heading col-md-4">
            <h2> Cast </h2>
            <?php listCast() ?>
        </div>
        <div class="panel-heading col-md-4">
            <h2> Upcoming Showings </h2>
            <p> date 1 </p>
            <p> date 1 </p>
            <p> date 1 </p>
            <p> date 1 </p>
            <p> date 1 </p>
            <p> date 1 </p>
            <p> date 1 </p>
            <p> date 1 </p>
            <p> date 1 </p>
        </div>
        <div class="panel panel-heading col-md-4">
            <?php if(getTitleType() == "feature") : ?>
                <h2>Production Stats </h2>
                <p> Cool stat </p>
                <p> Cool stat </p>
                <p> Cool stat </p>
                <p> Cool stat </p>
                <p> Cool stat </p>
            <?php else : ?>
                <h2>Episode Guide</h2>
                <p> next showing at this time</p>
                <p> next showing at this time</p>
                <p> next showing at this time</p>
                <p> next showing at this time</p>
                <p> next showing at this time</p>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div id="comment-section" class="container">
            <h2> What Users Are Saying </h2>
            <div id="comments">
                <?php buildCommentSection(getComments()); ?>
            </div>
            <?php if(isset($_SESSION['loggedin'])) : ?>
                <div class="form-group">
                    <textarea id="comment" name="comment" cols="75" rows="4"></textarea>
                    <input class="btn btn-lg pull-right" id="post" type="submit" value="Post Comment">
                </div>
            <?php else : ?>
                <div class="center-block">
                    <p> You must be <a href="login.php">logged in</a> to post comments. </p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<script type="text/javascript" src="../js/info.js"></script>
<?php
include_once("$_SERVER[DOCUMENT_ROOT]/phase5/inc/footer.php");
?>