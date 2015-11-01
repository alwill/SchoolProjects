<?php
      
include("$_SERVER[DOCUMENT_ROOT]/db/tvguruDB.php");
try {
    $con = new PDO(DB_CONNECTION_STRING . ";dbname=test", DB_USER, DB_PWD);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}

function queryTitle() {
    global $con;
    try {
        // input not being sanitized
        $sql = $con->prepare("SELECT * FROM `titles` WHERE `TITLE` REGEXP (:title)");
        $sql->bindParam(':title', $_GET['title']);
        $sql->execute();
            while($title = $sql->fetch())
                echo $title['TITLE'] . "<br>";                
    } catch(PDOException $e) {
        echo  $e->getMessage();
    }
}
?>