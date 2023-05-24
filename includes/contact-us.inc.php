<?php
    require_once "includes/header.inc.php";

    $messageSent = false;
    if
	(
		isset($_POST['first_name']) && $_POST['first_name'] != '' && 
		isset($_POST['last_name']) && $_POST['last_name'] != '' && 
		isset($_POST['email']) && $_POST['email'] != '' && 
		isset($_POST['mobile_number']) && $_POST['mobile_number'] != '' && 
		isset($_POST['message']) && $_POST['message'] != '' 
	)
	{
		require_once "includes/db.inc.php";
		$message["first_name"] = cleanTextInput($_POST['first_name']);
		$message["last_name"] = cleanTextInput($_POST['last_name']);
		$message["email"] = checkEmail($_POST['email']);
		$message["mobile_number"] = cleanTextInput($_POST['mobile_number']);
		$message["message"] = cleanTextInput($_POST['message']);
		
		$query = "INSERT INTO `message`(`first_name`, `last_name`, `email`, `mobile_number`, `message`) VALUES (";
		$query .= "'" . $message["first_name"] . "', ";
		$query .= "'" . $message["last_name"] . "', ";
		$query .= "'" . $message["email"] . "', ";
		$query .= "'" . $message["mobile_number"] . "', ";
		$query .= "'" . $message["message"] . "' ";
		$query .= ")";
		// $conn->query($query);
        $messageSent = true;
		mysqli_query($connection, $query);

        // Send an email for the admin
        $to = "info@cnambook.com";
        $from = $message["email"];
        $subject = "New contact message";
        $body = "<p>Dear,</p>";
        $body .= "<p>You have received a new message from ".$message["first_name"];
        $body .= "<table>";
        $body .= "<tr><td>Email</td><td>".$message["email"]."</td></tr>";
        $body .= "<tr><td>Mobile Number</td><td>".$message["mobile_number"]."</td></tr>";
        $body .= "<tr><td>Mobile Number</td><td>".$message["message"]."</td></tr>";
        $body .= "</table>";

        mail($to, $subject, $body, "from: $from");

        //Send an email to the visitor
        $to = $message["email"];
        $from = "info@cnambook.com";
        $subject = "Your message has been received";
        $body = "<p>Dear ".$message["first_name"].",</p>";
        $body .= "<p>Your message has been received</p>";
        $body .= "<p>Have a nice day!</p>";

        mail($to, $subject, $body, "from: $from");

	}