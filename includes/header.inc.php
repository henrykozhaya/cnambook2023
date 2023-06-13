<?php
require_once "includes/functions.inc.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cnam Book 2023</title>
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    </head>
    <body>
    <header>
        <div class="logo">
            <h3>Cnam Book 2023</h3>
        </div>
        <nav>
        <ul class="menu">
            <li><a href="/cnambook2023">Home</a></li>
            <li><a href="/cnambook2023/admin/index.php">Admin</a></li>
            <li><a href="/cnambook2023/books.php">Books</a></li>
            <li><a href="/cnambook2023/contact-us.php">Contact</a></li>
            
            <?php
            if(isset($_SESSION["user"])){
            ?>
            <li><a href='logout.php'>Logout</a></li>
            <?php
            }
            else{
            ?>
            <li><a href='register.php'>Register</a></li>
            <li>
            <a href='login.php'>Login</a></li>
            <?php
            }
            ?>
            
        </ul>
        </nav>
        <div class="search">
            <form action="/cnambook2023/books.php" method="GET">
            <input type="text" name="search" placeholder="Search">
            <button type="submit">Search</button>
            </form>
        </div>
    </header>