<?php

declare(strict_types=1);

function output_username(){

    if(isset($_SESSION['user_id'])){
        echo "your are logged in as ".$_SESSION['user_username'];

    }

else{
    echo 'you are not logged in';
}}

function check_login_error(){

if(isset($_SESSION["errors_login"])){
$errors= $_SESSION["errors_login"];

echo"<br>";
foreach($$errors as $error){
    echo "<p>$error</p>";

}
unset($_SESSION["errors_login"]);
}


else if(isset($_GET['login']) && $_GET['login']=== "success"){

echo "<br>";
}
}

?>