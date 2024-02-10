<?php
if($_SERVER["REQUEST_METHOD"] ==="POST"){

$username= $_POST["username"];
$pwd= $_POST["pwd"];

try {

require_once 'dhb.inc.php';
require_once 'login_model.inc.php';
require_once 'login_contr.inc.php';
require_once 'login_view.inc.php';
#Erorr handling
#اللي حترجع ترو يعني ايررو

$errors =[];

function validate_credentials ($username, $pwd){
    if(is_input_empty($username, $pwd)){
        $errors["empty_input"]="Fill in all fields!";
    }
}

$result = get_user($pdo,$username); #fetch from database



 if(is_username_wrong($result)){
    $errors["loging_incorrect"]="Incorrect login info!";
 }



 if(!is_username_wrong($result)&& is_password_wrong( $pwd,$result["pwd"])){
    $errors["loging_incorrect"]="Incorrect login info!";

 }

 require_once 'config_session.inc.php';

if($errors){
    
$_SESSION["errors_login"]=$errors;
header("Location: login.php");
die();

}


$newSessionId = session_create_id();
$sessionId = $newSessionId . "_" .$result["id"];
session_id($sessionId);

$_SESSION["user_id"]= $result["id"];
$_SESSION["user_username"]= htmlspecialchars($result["username"]);
$_SESSION["last_regeneration"]=time();

header("Location: login.php?loging=success");
#رجعه
$pdo=null;
$stmt=null;
die();
}
catch (PDOException $e){

die("Query failed: ".$e->getMessage());

}

}

else{

    header("Location: login.php");#رجعه
die ();  #يوقفه من التشغيل 
}

?>