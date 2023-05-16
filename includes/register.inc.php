<?php
    require_once "includes/functions.php";
    if(isset($_SESSION["loggedInUser"])){
        header("location:index.php");
    }
    if
	(
		isset($_POST['first_name']) && $_POST['first_name'] != '' && 
		isset($_POST['last_name']) && $_POST['last_name'] != '' && 
		isset($_POST['email']) && $_POST['email'] != '' && 
		isset($_POST['mobile_number']) && $_POST['mobile_number'] != '' && 
		isset($_POST['birthdate']) && $_POST['birthdate'] != '' && 
		isset($_POST['username']) && $_POST['username'] != '' && 
		isset($_POST['password']) && $_POST['password'] != '' 		
	)
	{
		require_once "includes/db.inc.php";
		$user["first_name"] = cleanTextInput($_POST['first_name']);
		$user["last_name"] = cleanTextInput($_POST['last_name']);
		$user["email"] = checkEmail($_POST['email']);
		$user["mobile_number"] = cleanTextInput($_POST['mobile_number']);
		// $user["birthdate"] = checkDate($_POST['birthdate']);
		$user["username"] = cleanTextInput($_POST['username']);
		$user["password"] = cleanTextInput($_POST['password']);
		preDisplay($user);
		die();
		
		$query = "INSERT INTO `user`(`first_name`, `last_name`, `birthdate`, `email`, `mobile_number`, `username`, `password`, `created`, `modified`) VALUES (";
		$query .= "'" . $_POST["first_name"] . "', ";
		$query .= "'" . $_POST["last_name"] . "', ";
		$query .= "'" . $_POST["birthdate"] . "', ";
		$query .= "'" . $_POST["email"] . "', ";
		$query .= "'" . $_POST["mobile_number"] . "', ";
		$query .= "'" . $_POST["username"] . "', ";
		$query .= "'" . MD5($_POST["password"]) . "', ";
		$query .= "NOW(), ";
		$query .= "NOW() ";
		$query .= ")";

		// $conn->query($query);
		mysqli_query($connection, $query);
	}