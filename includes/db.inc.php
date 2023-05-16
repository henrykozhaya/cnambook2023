<?php
$config = require_once 'config.inc.php';

// Create connection
$connection = new mysqli($config["MYSQL_HOST"], $config["MYSQL_USER"], $config["MYSQL_PASS"], $config["MYSQL_DB"]);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
