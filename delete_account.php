<?php 
session_start();

include('queries.php');

$id = $_GET['id'];
$result = delete($id);

if ($result) {
    header("Location: index.php?success=Account deleted successfully");
    session_unset();
    session_destroy();
    exit();
}else{
    header("Location: account.php?id=$id&error=Some error occured, please try again");
    exit();
}