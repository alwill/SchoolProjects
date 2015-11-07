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

function getPlot() {
    global $title;
    echo $title->plot;
}