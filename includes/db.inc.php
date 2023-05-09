<?php
$config = require_once 'config.inc.php';

// Create connection
$conn = new mysqli($config["MYSQL_HOST"], $config["MYSQL_USER"], $config["MYSQL_PASS"], $config["MYSQL_DB"]);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
