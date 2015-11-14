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
        echo "<div class=\"panel-body\">\n                    
                    <p class=\"well\">$favorite</p>\n
              </div>\n";
    }
}