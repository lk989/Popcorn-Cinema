<?php 
session_start(); 
include "queries.php";

if (isset($_POST['username']) && isset($_POST['pwd'])
    && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['birthdate'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$username = validate($_POST['username']);
	$password = validate($_POST['pwd']);
	$phone = validate($_POST['phone']);
	$email = validate($_POST['email']);
    $birthdate = $_POST['birthdate'];

	$user_data = 'username='. $username. '&email='. $email. '&phone='. $phone;

    echo $user_data;


	if (empty($username)) {
		header("Location: signup.php?error=Username is required&$user_data");
	    exit();
	}else if(empty($password)){
        header("Location: signup.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($phone)){
        header("Location: signup.php?error=Phone is required&$user_data");
	    exit();
	}

	else if(empty($email)){
        header("Location: signup.php?error=Email is required&$user_data");
	    exit();
	}

	else if(empty($birthdate)){
        header("Location: signup.php?error=Birthdate is required&$user_data");
	    exit();
	}

	else{
        $result = fetch_user("username = '$username' OR email = '$email' OR phone = '$phone'");

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=The username is taken try another&$user_data");
	        exit();
		}else {
            $result2 = create_user($username, $password, $email ,$phone, $birthdate);
            if ($result2) {
                header("Location: login.php?success=Your account has been created successfully");
                exit();
            }else {
                header("Location: signup.php?error=unknown error occurred&$user_data");
                exit();
            }
		}
	}
}else{
	header("Location: signup.php");
	exit();
}