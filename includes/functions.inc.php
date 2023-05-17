<?php
require_once "db.inc.php";
session_start();

// $adminPath = "/cnambook2023/admin/";
// if(! 
//     (
//         strpos($_SERVER['REQUEST_URI'], $adminPath) == 0 && 
//         isset($_SESSION["user"]) && 
//         $_SESSION["user"]["isAdmin"]
//     )
// )
// {
//     echo "Not Admin";
// }

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

function getLatestBooks($count){
    global $connection;
    $query = "SELECT isbn, title, category, author, price FROM book ORDER BY created DESC LIMIT 0, $count";
    $result = mysqli_query($connection, $query);
    $html = "<table border='1'>";
    $html .= "<thead>";
    $html .= "<th>ISBN</th>";
    $html .= "<th>Title</th>";
    $html .= "<th>Categories</th>";
    $html .= "<th>Author</th>";
    $html .= "<th>Price</th>";
    $html .= "<th>Buy Now</th>";
    $html .= "</thead>";
    
    while($row = mysqli_fetch_array($result)){
        $html .= "<tr>";
        $html .= "<td>" . $row["isbn"] . "</td>";
        $html .= "<td>" . $row["title"] . "</td>";
        $html .= "<td>" . $row["category"] . "</td>";
        $html .= "<td>" . $row["author"] . "</td>";
        $html .= "<td align='right'>" . number_format($row["price"], 2) . "</td>";
        $html .= "<td><a href='order.php?isbn=" . $row["isbn"] . "'>Buy it now</a></td>";
        $html .= "</tr>";
    }

    $html .= "</table>";

    return $html;
}

function getBestAuthors(){
    global $connection;
    $query = "SELECT author, COUNT(isbn) AS BooksNbr FROM book GROUP BY author HAVING COUNT(isbn) > 1 ORDER BY COUNT(isbn) DESC";
    $result = mysqli_query($connection, $query);

    $html = "<table border='1'>";
    $html .= "<thead>";
    $html .= "<th>Author</th>";
    $html .= "<th>Number of Books</th>";
    $html .= "</thead>";
    
    while($row = mysqli_fetch_array($result)){
        $html .= "<tr>";
        $html .= "<td>". $row["author"] . "</td>";
        $html .= "<td>". $row["BooksNbr"] . "</td>";
        $html .= "</tr>";
    }

    $html .= "</table>";

    return $html;
}