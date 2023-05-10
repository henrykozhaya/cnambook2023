<?php
require_once "includes/functions.php";
if(isset($_SESSION["user"])){
    unset($_SESSION["user"]);
    header("location:index.php");
}