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
    <div class="row">
        <div class="col-md-8">
            <img class="img-responsive img-rounded pull-right" src="../images/info_banner_1.jpg" alt="<?php getTitle() ?>">
        </div>
        <div class="col-md-4">
            <h3><?php getTitle() ?></h3>
            <p>Rating: <?php getRating(); ?> / 10 &nbsp;&nbsp;&nbsp; <?php getParentalGuide(); ?> &nbsp;&nbsp;&nbsp;
                    <button action="#">Favorite</button></p>
            <p><?php getPlot() ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <h2> Cast </h2>
            <?php listCast() ?>
        </div>
        <div class="col-md-4">
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
    </div>
    <div clas="row">
            <h2> What Users Are Saying </h2>
            <h5>ThatsLife:</h5>
            <p class="well"> With a mixture of scoop and scandal, comedy and drama, heroes and villains this show is the best thing that you will ever watch, so hop on this roller-coaster ride and hold on tight because this is one journey that you will never forget, with the housewives and the rest of America and the world, this is so exciting and energetic that you will want to go without sleep to know how it ends!</p>
            <h6>WeKnowFilms:</h6>
            <p class="well">The best series so far! Amazing! I am in love with Dave Williams/Dash ! He is so interesting and you just don't know what he is going to do next! Love it! So many twists and turns with the characters and this series keeps you constantly interested! LOVED IT! </p>
            <h5>DudleideO:</h6>
            <p class="well"> Desperate Housewives is a modern masterpiece of art. It brings the saddest dramatic situations with the most sarcastic scenes of humour within a misterious thriller plot. From a literary point of view, the characters' construction is one of the most important elements in the plot, giving the public a good sense of reality concerning the character's behaviour. </p>
            <h5>AmazingWatch: </h5>
            <p class="well">For a show it is a truly amazing watch with a fine, fine story line and excellent narration. One of the best shows ever created by a long shot! F.R.I.E.N.D.S. is funny, like this show, but it does not have an juicy scandels or cliff hangers! MOVE OVER F.R.I.E.N.D.S.! WOOOHOOO! Edie's husband brings a scary/cliff-hanger feel to the show and you are just waiting for more!</p>
            <h5>AmazingWatch: </h5>
            <p class="well">For a show it is a truly amazing watch with a fine, fine story line and excellent narration. One of the best shows ever created by a long shot! F.R.I.E.N.D.S. is funny, like this show, but it does not have an juicy scandels or cliff hangers! MOVE OVER F.R.I.E.N.D.S.! WOOOHOOO! Edie's husband brings a scary/cliff-hanger feel to the show and you are just waiting for more!</p>
            <h5>AmazingWatch: </h5>
            <p class="well">For a show it is a truly amazing watch with a fine, fine story line and excellent narration. One of the best shows ever created by a long shot! F.R.I.E.N.D.S. is funny, like this show, but it does not have an juicy scandels or cliff hangers! MOVE OVER F.R.I.E.N.D.S.! WOOOHOOO! Edie's husband brings a scary/cliff-hanger feel to the show and you are just waiting for more!</p>
            <h5>AmazingWatch: </h5>
            <p class="well">For a show it is a truly amazing watch with a fine, fine story line and excellent narration. One of the best shows ever created by a long shot! F.R.I.E.N.D.S. is funny, like this show, but it does not have an juicy scandels or cliff hangers! MOVE OVER F.R.I.E.N.D.S.! WOOOHOOO! Edie's husband brings a scary/cliff-hanger feel to the show and you are just waiting for more!</p>
            <div class="container">
                <form action="#" method="POST" id="comment_form">
                    <textarea name="comment" cols="50" rows="4"></textarea>
                    <input type="submit" value="Post Comment">
                </form>
            </div>
    </div>
        
</div>
<?php
include_once("$_SERVER[DOCUMENT_ROOT]/phase5/inc/footer.php");
?>