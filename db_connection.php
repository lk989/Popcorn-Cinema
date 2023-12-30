<?php
    function OpenCon(){
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "root";
        $dbname = "popcorn";
        $conn = new mysqli($dbhost, $dbuser, $dbpass,$dbname) or die("Connect failed: %s\n". $conn -> error);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
    function CloseCon($conn){
        $conn -> close();
    }
?>