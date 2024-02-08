<?php
require_once 'dhb.inc.php';


if($_SERVER["REQUEST_METHOD"] ==="POST"){

$username= $_POST['username'];
$pwd= $_POST['pwd'];
$email= $_POST['email'];
$birthday=$_POST['birthdate'];
$phone=$_POST['phone'];


try {

require_once 'dhb.inc.php';
require_once 'signup_model.inc.php';
require_once 'signup_view.inc.php';
require_once 'signup_contr.inc.php';
#Erorr handling
#اللي حترجع ترو يعني ايررو

$errors =[];


if(is_input_empty($username, $pwd, $email)){
    $errors["empty_input"]="Fill in all fields!";
}

if(is_email_invalid($email)){
    $errors["invalid_email"]="invalid email used!";

}

if(is_username_taken ($pdo, $username)){
    $errors["username_taken"]="Username is already taken";

}

if( is_email_registered($pdo, $email)){
$errors["email_used"]=" Email is already registered!";
}

require_once 'config_session.inc.php';

if($errors){
    
$_SESSION["errors_signup"]=$errors;
header("Location: ../signup.php");
die();

}
create_user($pdo, $username, $pwd, $email, $phone , $birthday);


header("Location: ../signup.php?signup=success");#رجعه
$pdo=null;
$stmt=null;



die ();  #يوقفه من التشغيل 
}

catch (PDOException $e){

die("Query failed: ".$e->getMessage());

}

}
else{

    header("Location: ../signup.php");#رجعه
die ();  #يوقفه من التشغيل 
}

?>