<?php
require_once "includes/functions.inc.php";
if(isset($_SESSION["user"])){
    unset($_SESSION["user"]);
    setcookie("login_token", "", time() - 1, "/");
    header("location:index.php");
}