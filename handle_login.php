<?php 
session_start(); 
include "queries.php";

if (isset($_POST['username']) && isset($_POST['pwd'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$username = validate($_POST['username']);
	$pass = validate($_POST['pwd']);
	
	if (empty($username)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		// hashing the password
        $result = fetch_user("username = '$username'");

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['username'] === $username && password_verify($pass, $row['pwd'])) {
            	$_SESSION['username'] = $row['username'];
            	$_SESSION['id'] = $row['id'];
				header("Location: index.php?id=" . $_SESSION['id']);
		        exit();
            }else{
				header("Location: login.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: login.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}