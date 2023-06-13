<?php
require_once "db.inc.php";
require_once "config.inc.php";
session_start();

$secure_pages = array(
    "/cnambook2023/order.php",
);
$login_register_pages = array(
    "/cnambook2023/login.php",
    "/cnambook2023/register.php"
);
$admin_url = "/cnambook2023/admin/";

if
(
    // Check if the page should be secured with login
    in_array($_SERVER["PHP_SELF"], $secure_pages) && 
    // Check if the user is not logged in
    !isset($_SESSION["user"])
){
    header("location:login.php");
}
else if
(
    // Check if the page should not be accessible if the user is logged in
    in_array($_SERVER["PHP_SELF"], $login_register_pages) &&
    // Check if the user is logged in
    isset($_SESSION["user"]) 
)
{
    header("location:index.php");
}
else if
(
    // Check if user is accessing an admin page
    strrpos($_SERVER["PHP_SELF"], $admin_url) === 0 &&
    (
        // Check if user is logged in
        !isset($_SESSION["user"]) ||
        // Check if user is admin
        $_SESSION["user"]["is_admin"] != 1
    )
)
{
    header("location:http://localhost/cnambook2023/index.php");
}

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

/* FORM INPUTS VALIDATION */
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

function checkBirthdate($birthdate){
    // Check if user has more than 18 years old
    // Methode 1
    // return (time() - strtotime($birthdate)) / 3600 / 24 / 365 >= 18
    // Methode 2
    return date_diff(date_create(), date_create($birthdate))->format("%y%") >= 18;
}

function checkEmailUsernameExistance($email, $username){
    global $connection;
    $query = "SELECT id FROM user WHERE `email` = '$email' OR `username` = '$username'";
    $result = mysqli_query($connection, $query);
    return mysqli_num_rows($result) > 0;
}
/* FORM INPUTS VALIDATION */

function getLatestBooks($count){
    global $connection;
    $query = "SELECT    b.isbn, 
                        b.title, 
                        b.file,
                        c.description AS category, 
                        a.name as author, 
                        b.price 
            FROM        book b,
                        category c,
                        book_category bc,
                        author a
            WHERE       b.isbn = bc.isbn 
            AND         bc.category = c.id 
            AND         b.author = a.id 
            ORDER BY    created DESC 
            LIMIT       0, $count";
    $result = mysqli_query($connection, $query);
    $html = "<table border='1'>";
    $html .= "<thead>";
    $html .= "<th>ISBN</th>";
    $html .= "<th>Title</th>";
    $html .= "<th>Categories</th>";
    $html .= "<th>Author</th>";
    $html .= "<th>Price</th>";
    $html .= "<th>Buy Now</th>";
    $html .= "<th>Download</th>";
    $html .= "</thead>";
    
    while($row = mysqli_fetch_array($result)){
        $html .= "<tr>";
        $html .= "<td>" . $row["isbn"] . "</td>";
        $html .= "<td>" . $row["title"] . "</td>";
        $html .= "<td>" . $row["category"] . "</td>";
        $html .= "<td>" . $row["author"] . "</td>";
        $html .= "<td align='right'>" . number_format($row["price"], 2) . "</td>";
        $html .= "<td><a href='order.php?isbn=" . $row["isbn"] . "'>Buy it now</a></td>";
        $html .= "<td><a href='/cnambook2023/download.php?isbn=".$row["isbn"]."' target='_blank'>Download ".$row["title"]."</a></td>";
        $html .= "</tr>";
    }

    $html .= "</table>";

    return $html;
}

function getBestAuthors(){
    global $connection;
    $query = "SELECT    a.name AS author, 
                        COUNT(isbn) AS BooksNbr 
            FROM        book b,
                        author a 
            WHERE       b.author = a.id
            GROUP BY    a.name 
            HAVING      COUNT(isbn) > 1 
            ORDER BY    COUNT(isbn) DESC";
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