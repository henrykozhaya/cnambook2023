<?php
require_once "db.inc.php";
session_start();

// Check if user ccookie exists
if(!isset($_SESSION["user"]) && isset($_COOKIE["user_token"])){
    $login_token = $_COOKIE["user_token"];
    if($login_token != ''){
        $query = "SELECT * FROM user WHERE login_token = '$user_token'";
        $result = mysqli_query($connection, $query);
        $_SESSION["user"] = mysqli_fetch_array($result);
        header("location:index.php");
    }
}

function getRandomToken(){
    return hash('sha256', time() * rand() * 3228432);
}

function preDisplay($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function cleanTextInput($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function checkEmail($email){
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    return $email;
    
}