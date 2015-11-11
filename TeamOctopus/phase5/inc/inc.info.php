<?php
include("class.title.php");
include("$_SERVER[DOCUMENT_ROOT]/phase5/db/tvguruDB.php");
try {
    $con = new PDO(DB_CONNECTION_STRING . ";dbname=test", DB_USER, DB_PWD);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}

if(isset($_POST['favorite'])) {
    switch($_POST['favorite']) {
        case 'Favorite':
            favorite();
            break;
        case 'Unfavorite':
            unfavorite();
            break;
    }

}

if(isset($_POST['comment'])) 
    postComment($_POST['comment']);

$title = new Title;

function favorite() {
    session_start();
    global $con;
    try {
        $sql = "UPDATE `users` SET `favorites` = CONCAT(`favorites`, :title) WHERE `users`.`username` = :name";
        $sql = $con->prepare($sql);
        $title = $_SESSION['title'] . ",";
        $sql->bindParam(':title', $title);
        $sql->bindParam(':name', $_SESSION['username']);
        $sql->execute();
        array_push($_SESSION['favorites'], $_SESSION['title']);
    } catch (PDOException $e) {
        echo "$e";
        return;
    }
    echo $_SESSION['title'] . " added to favorites";
}

function unfavorite() {
    session_start();
    $_SESSION['favorites'] = array_diff($_SESSION['favorites'], array($_SESSION['title']));
    $favorites = implode(",", $_SESSION['favorites']);
    try {
        global $con;
        $sql = "UPDATE `users` SET `favorites` = :favorites WHERE `users`.`username` = :name";
        $sql = $con->prepare($sql);
        $sql->bindParam(':favorites', $favorites);
        $sql->bindParam(':name', $_SESSION['username']);
        $sql->execute();
    } catcH(PDOException $e) {
        echo "Must be logged in.";
        return;
    }
    echo $_SESSION['title'] . " removed from favorites";
}

function postComment($comment) {    
    session_start();
    global $con;
    try {
        $sql = "INSERT INTO `comments` (`id`, `title`, `comment`, `username`) VALUES (NULL, :title, :comment, :name)";
        $sql = $con->prepare($sql);
        $sql->bindParam(':title', $_SESSION['title']);
        $sql->bindParam(':comment', $comment);
        $sql->bindParam(':name', $_SESSION['username']);
        $sql->execute();
    } catch(PDOException $e) {
        echo $e;
        return;
    }
    buildCommentSection(getComments());
}

function getComments() {
    global $con;
    try {
        $sql = "SELECT * FROM `comments` WHERE `title` = :title";
        $sql = $con->prepare($sql);
        $sql->bindParam(':title', $_SESSION['title']);
        $sql->execute();
        buildCommentSection($sql->fetchAll());
    } catch(PDOException $e) {
        echo $e;
    }
}

function buildCommentSection($comments) {
    $commentSection = "";
    if(is_array($comments) || is_object($comments)){
        foreach($comments as $comment) {
            $commentSection .= "<h5>$comment[3]</h5>\n
                                <p class=\"well\">$comment[2]</p>\n";
        }
    }
    echo $commentSection;
}

function getTitleData($id){
    // Queries the DB for the ID number. Returns all the title info.
    global $con;
    try {
        $sql = "SELECT * FROM `titles` WHERE `ID` = (:id)";
        $sql = $con->prepare($sql);
        $sql->bindParam(':id', $_GET['id']);
        $sql->execute();
        buildTitle($sql->fetch());
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}

function buildTitle($titleData) {
    // Gets the sql result. Sets all the correct values in the title class.
    global $title;
    $title->id = $titleData['ID'];
    $title->title = $titleData['TITLE'];
    $title->rating = $titleData['RATING'];
    $title->parentalGuide = $titleData['PARENTAL_GUIDE'];
    $title->plot = $titleData['PLOT'];
    $title->cast = $titleData['CAST'];
    $title->netflix = $titleData['NETFLIX'];
    $title->prime = $titleData['PRIME'];
    $title->type = $titleData['TYPE'];
    $title->time = $titleData['TIME'];
    $title->runtime = $titleData['RUNTIME'];
    $title->network = $titleData['NETWORK'];
}

function getPageTitle() {
    global $title;
    return $title->title;
}

function getTitle() {
    global $title;
    echo $title->title;
}

function getRating() {
    global $title;
    echo $title->rating;
}

function getParentalGuide() {
    global $title;
    echo $title->parentalGuide;
}

function getPlot() {
    global $title;
    echo $title->plot;
}

function listCast() {
    // cast in DB is comma delimited. explodes into an array. Echos each person
    global $title;
    $cast = explode(",", $title->cast);
    foreach($cast as $person)
        // Messed up when adding cast. There's an extra comma at the end.
        // ctype_space checks for just space in string. Which is what that extra element is.
        if(!ctype_space($person)) 
            echo "<p> <img class=\"img-rounded\" src=\"../images/actor_thumbnail.jpeg\">&nbsp; $person</p>";
}

function listShowings() {
    global $title;

}