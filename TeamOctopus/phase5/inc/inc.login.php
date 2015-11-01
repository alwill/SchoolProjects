<?php

include("$_SERVER[DOCUMENT_ROOT]/db/tvguruDB.php");
try {
    $con = new PDO(DB_CONNECTION_STRING . ";dbname=test", DB_USER, DB_PWD);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}

if(isset($_POST['submit']))
    login();

function login(){
    global $con;
    try {
        $sql = $con->prepare("SELECT * FROM `users` WHERE `username` = :username AND `password` = :password");
        $sql->bindParam(':username', $_POST['username']);
        $sql->bindParam(':password', $_POST['password']);
        $sql->execute();
        if($sql->rowCount() == 1){
            session_start();
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['loggedin'] = true;
            header("Location: /");
            exit();
        }
    } catch(PDOException $e){
        echo $e->getMessage();
    }
}
?>