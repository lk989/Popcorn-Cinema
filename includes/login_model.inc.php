<?php

function get_user( object $pdo,  string $username){


        $query="SELECT * FROM user WHERE username= :username;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
        
}





?>