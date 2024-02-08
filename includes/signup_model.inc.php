<?php

declare(strict_types=1);

require_once 'dhb.inc.php';

#هذا كلاس الفتش للديتا 
function get_username(object $pdo, string $username){

$query="SELECT username FROM user WHERE username= :username;";
$stmt = $pdo->prepare($query);
$stmt->bindParam(":username", $username);
$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);
return $result;
}


function get_email(object $pdo, string $email){

    $query="SELECT email FROM user WHERE email= :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
    }

    function set_user($pdo, $username, $pwd, $email, $phone , $birthdate){

        $query="INSERT INTO user (username, pwd, email, phone, birthdate) VALUES (:username, :pwd, :email, :phone, :birthdate);";
        $stmt = $pdo->prepare($query);

        $options =[
            'cost'=> 12

        ];
        $hashedPwd= password_hash($pwd,PASSWORD_BCRYPT,$options);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":pwd", $hashedPwd);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":birthdate", $birthdate);


        $stmt->execute();

    }
?>