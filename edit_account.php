<?php 
session_start(); 
include "queries.php";

if (isset($_POST['id']) && isset($_POST['pwd'])) {
	$id = $_POST['id'];
	$pass = $_POST['pwd'];
	
	if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		// hashing the password
        $options =[
            'cost'=> 12
        ];
        $hashedPwd= password_hash($pass,PASSWORD_BCRYPT,$options);
        $result = update("pwd = '$hashedPwd'", $id);

		if ($result) {
            header("Location: account.php?id=$id&success=Updated successfully");
            exit();
		}else{
			header("Location: account.php?id=$id&error=Some error occured, please try again");
	        exit();
		}
	}
	
}else{
	header("Location: account.php?id=$id");
	exit();
    // echo 'false';
}