<?php
include("class.title.php");
include("$_SERVER[DOCUMENT_ROOT]/phase5/db/tvguruDB.php");
try {
    $con = new PDO(DB_CONNECTION_STRING . ";dbname=test", DB_USER, DB_PWD);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}
$title = new Title;

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