<?php

include("$_SERVER[DOCUMENT_ROOT]/phase5/db/tvguruDB.php");
try {
    $con = new PDO(DB_CONNECTION_STRING, DB_USER, DB_PWD);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}

if(isset($_POST['login']))
    login();

if(isset($_POST['register']))
    register();

function login(){
    global $con;
    try {
        $sql = $con->prepare("SELECT * FROM `users` WHERE `username` = :username AND `password` = :password");
        $sql->bindParam(':username', $_POST['username']);
        $sql->bindParam(':password', $_POST['password']);
        $sql->execute();
        if($sql->rowCount() == 1){
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['loggedin'] = true;
            //getting favorites
            $sql =$con->query("SELECT favorites FROM `users` WHERE `username` = '".$_POST['username']."'");
            //$sql->bindParam(':username', $_POST['username']);
            $result = $sql->fetch();
            $_SESSION['favorites'] = explode(',',$result['favorites']);

            header("Location: /phase5/");
            exit();
        }
    } catch(PDOException $e){
        echo $e->getMessage();
    }
}

function register(){
    if($_POST["regPassword"] == $_POST["regRepassword"]){
        global $con;
        try {
            $sql = $con->prepare("INSERT INTO `users` (`id`, `username`, `password`, `email`, `favorites`) VALUES (NULL, :username, :password, :email, NULL)");
            $sql->bindParam(':username', $_POST['regUsername']);
            $sql->bindParam(':password', $_POST['regPassword']);
            $sql->bindParam(':email', $_POST['regEmail']);
            $sql->execute();
            session_start();
            $_SESSION['username'] = $_POST['regUsername'];
            $_SESSION['loggedin'] = true;
            $_SESSION['favorites'] = array();
            header("Location: /phase5/");
            exit();
        } catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    else{
        echo '<script type="text/javascript">';
        echo 'alert ("passwords do not match");';
        echo '</script>';
    }
}
?>