<?php

include("$_SERVER[DOCUMENT_ROOT]/phase5/db/tvguruDB.php");
try {
    $con = new PDO(DB_CONNECTION_STRING, DB_USER, DB_PWD);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}

function getUserComments() {
    global $con;
    try {
        $sql = "SELECT comment, title, title_id from comments WHERE username = :username";
        $sql = $con->prepare($sql);
        $sql->bindParam(":username", $_SESSION['username']);
        $sql->execute();
        return $sql->fetchAll();
    } catch (PDOException $e) {
        echo $e;
    }
}

function buildUserComments($comments) {
    /*
        Builts the recent user comments box with what getUserComments() returned
    */

    foreach($comments as $comment){
        echo "<div class=\"panel-body\">\n
                    <p><a href=\"/phase5/pages/info.php?id=$comment[2]\">$comment[1]</a></p>\n
                    <p class=\"well\">$comment[0]</p>\n
              </div>\n";
    }
}

function getUserFavorites() {
    global $con;
    try {
        $sql = "SELECT favorites from users WHERE username = :username";
        $sql = $con->prepare($sql);
        $sql->bindParam(":username", $_SESSION['username']);
        $sql->execute();
        return $sql->fetch();
    } catch (PDOException $e) {
        echo $e;
    }
}

function buildUserFavorites($favorites) {
    $favorites = explode(",", $favorites['favorites']);

    foreach($favorites as $favorite){
        if($favorite == ""){}
        else {
            echo "<div class=\"panel-body\">\n
                    <p class=\"well\">$favorite
                    <a class=\"pull-right\" href=\"/phase5/pages/profile.php?remove=$favorite\">Remove</a></p>\n
              </div>\n";
        }
    }
}

function getTimeForFavorites($favorite){
    /*
        Queries the database for title id and time of the favorite
    */
    global $con;
    try {
        $sql = "SELECT `ID`, 'TIME' FROM `titles` WHERE TITLE = :title LIMIT 5";
        $sql = $con->prepare($sql);
        $sql->bindParam(":title", $favorite);
        $sql->execute();
        return($sql->fetch());
    } catch (PDOException $e) {
        echo $e;
    }
}

function buildUpcomingFavorites(){
    /*
        Builds the list of the next 5 favorites showing soon.
    */
    $favorites = getUserFavorites();
    $favorites = explode(",", $favorites['favorites']);
    foreach($favorites as $favorite){
        $titleInfo = getTimeForFavorites($favorite);
        echo "<div class=\"panel-body\">\n                    
                    <p class=\"well\"><a href=\"/phase5/pages/info.php?id=$titleInfo[0]\">
                    $favorite</a> on at $titleInfo[1]</p>\n
              </div>\n";
    }
}

function removeFavorite($favorite){
    session_start();
    $_SESSION['favorites'] = array_diff($_SESSION['favorites'], array($_GET['remove']));
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
}