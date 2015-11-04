<?php

if(isset($_POST['register']))
    register();

function register(){
	if($_POST["regPassword"] == $_POST["regRepassword"]){
		global $con;
		try {
			$sql = $con->prepare("INSERT INTO `test`.`users` (`id`, `userid`, `username`, `password`, `email`, `favorites`) VALUES (NULL, 0, :username, :password, :email, NULL)");
			$sql->bindParam(':username', $_POST['regUsername']);
			$sql->bindParam(':password', $_POST['regPassword']);
			$sql->bindParam(':email', $_POST['regEmail']);
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
	else{
		echo '<script type="text/javascript">';
        echo 'alert ("passwords do not match");';
		echo '</script>';
	}
}
?>