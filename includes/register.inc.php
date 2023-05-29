<?php
	require_once "includes/header.inc.php";
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
		$user["mobile_number"] = cleanTextInput($_POST['mobile_number']);
		$user["username"] = cleanTextInput($_POST['username']);
		$user["password"] = cleanTextInput($_POST['password']);
		if(checkBirthdate($_POST['birthdate']) && checkEmail($_POST['email'])){
			$user["email"] = checkEmail($_POST['email']);
			$user["birthdate"] = $_POST['birthdate'];

			$query = "INSERT INTO `user`";
			$query .= "(`first_name`, `last_name`, `birthdate`, `email`, `mobile_number`, `username`, `password`) ";
			$query .= "VALUES (";
			$query .= "'" . $user["first_name"] . "', ";
			$query .= "'" . $user["last_name"] . "', ";
			$query .= "'" . $user["birthdate"] . "', ";
			$query .= "'" . $user["email"] . "', ";
			$query .= "'" . $user["mobile_number"] . "', ";
			$query .= "'" . $user["username"] . "', ";
			$query .= "MD5('" . $user["password"] . "')";
			$query .= ")";
			
			mysqli_query($connection, $query);

			header("location:login.php");
		}
		else{
			die("Some information are not correct");
		}
	}