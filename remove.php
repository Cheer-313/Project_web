<?php
session_start();
require_once('db.php');
//Remove Class
$token = $_GET['token'];
$result = delete_class($token);
if(!$result){
    return false;
}
unset($_POST);
header("Location: home.php");
exit();
?>