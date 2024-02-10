<?php
include 'queries.php';

$errors =[];

function is_empty(string $username, string $pwd ){
    return (empty($username) || empty($pwd));
}

function is_username_wrong( bool|array $result){
    return !$result;
} 

function is_password_wrong( string $pwd, string $hashedPwd ){
    return !password_verify($pwd, $hashedPwd);
}

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $username = $_POST["username"];
    $password = $_POST["pwd"];

    is_empty($username, $password) ? $errors["empty_input"]="Fill in all fields!" : '';
    
    $user = fetch_user("username = '" . $username . "'"); #fetch from database
    is_username_wrong($user) ? $errors["loging_incorrect"]="Incorrect login info!" : '';
    !is_username_wrong($result) && is_password_wrong( $pwd,$result["pwd"]) ? $errors["loging_incorrect"]="Incorrect login info!" : '';
    
    if($errors){
        $_SESSION["errors_login"]=$errors;
        header("Location: login.php");
        die();    
    }
    else{
        echo 'success';
    }

}
else{
    header("Location: login.php"); 
    die ();
}