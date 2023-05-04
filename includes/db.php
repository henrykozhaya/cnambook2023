<?php
$servername = "localhost";
$username = "cnambook";
$password = ".[L5P4s@D3w]n!Uw";
$dbname = "cnambook23";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
