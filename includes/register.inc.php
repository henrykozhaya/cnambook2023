<?php
    if
	(
		isset($_POST['first_name']) && $_POST['first_name'] != '' && 
		isset($_POST['last_name']) && $_POST['last_name'] != '' && 
		isset($_POST['email']) && $_POST['email'] != '' && 
		isset($_POST['mobile_nummber']) && $_POST['mobile_nummber'] != '' && 
		isset($_POST['birthdate']) && $_POST['birthdate'] != '' && 
		isset($_POST['username']) && $_POST['username'] != '' && 
		isset($_POST['password']) && $_POST['password'] != '' 		
	)
	{
		require_once "includes/db.inc.php";
		
		$query = "INSERT INTO `user`(`first_name`, `last_name`, `birthdate`, `email`, `mobile_number`, `username`, `password`, `created`, `modified`) VALUES (";
		$query .= "'" . $_POST["first_name"] . "', ";
		$query .= "'" . $_POST["last_name"] . "', ";
		$query .= "'" . $_POST["birthdate"] . "', ";
		$query .= "'" . $_POST["email"] . "', ";
		$query .= "'" . $_POST["mobile_nummber"] . "', ";
		$query .= "'" . $_POST["username"] . "', ";
		$query .= "'" . MD5($_POST["password"]) . "', ";
		$query .= "NOW(), ";
		$query .= "NOW() ";
		$query .= ")";

		// $conn->query($query);
		mysqli_query($conn, $query);
	}