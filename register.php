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
		require_once "includes/db.php";
		
		$query = "INSERT INTO `user`(`first_name`, `last_name`, `birthdate`, `email`, `mobile_number`, `username`, `password`, `created`, `modified`) VALUES (";
		$query .= "'" . $_POST["first_name"] . "', ";
		$query .= "'" . $_POST["last_name"] . "', ";
		$query .= "'" . $_POST["birthdate"] . "', ";
		$query .= "'" . $_POST["email"] . "', ";
		$query .= "'" . $_POST["mobile_nummber"] . "', ";
		$query .= "'" . $_POST["username"] . "', ";
		$query .= "'" . $_POST["password"] . "', ";
		$query .= "NOW(), ";
		$query .= "NOW() ";
		$query .= ")";

		// $conn->query($query);
		mysqli_query($conn, $query);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
	<h1>Register</h1>
	<div class="form_container">
		<form action="#" method="post">
			<div class="input_container">
			<label for="first_name">First Name</label>
			<input type="text" name="first_name" id="first_name" required value="Cnam">
			</div>
			<div class="input_container">
			<label for="last_name">Last Name</label>
			<input type="text" name="last_name" id="last_name" required value="Bickfaya">
			</div>
			<div class="input_container">
			<label for="email">Email Address</label>
			<input type="email" name="email" id="email" required  value="info@cnam.com">
			</div>
			<div class="input_container">
			<label for="mobile_nummber">Mobile Number</label>
			<input type="text" name="mobile_nummber" id="mobile_nummber" required value="04123456">
			</div>
			<div class="input_container">
			<label for="birthdate">Birthdate</label>
			<input type="date" name="birthdate" id="birthdate" value="1990-12-31">
			</div>
			<div class="input_container">
			<label for="username">Username</label>
			<input type="text" name="username" id="username" required  value="cnamuser">
			</div>
			<div class="input_container">
			<label for="password">Password</label>
			<input type="password" name="password" id="password" required value="cnamuser2023">
			</div>
			<div class="input_container">
			<label for="confirm_password">Confirm Password</label>
			<input type="password" name="confirm_password" id="confirm_password" required value="cnamuser2023">
			</div>
			
			<!-- <h2>Shipping Address</h2>
			<div class="input_container">			
			<label for="shipping_street_address">Street Address</label>
			<input type="text" name="shipping_street_address" id="shipping_street_address" required>
			</div>
			<div class="input_container">
			<label for="shipping_city">City</label>
			<input type="text" name="shipping_city" id="shipping_city" required>
			</div>
			<div class="input_container">
			<label for="shipping_state">State/Province/Region</label>
			<input type="text" name="shipping_state" id="shipping_state">
			</div>
			<div class="input_container">
			<label for="shipping_postal_code">ZIP/Postal Code</label>
			<input type="text" name="shipping_postal_code" id="shipping_postal_code">
			</div>
			<div class="input_container">
			<label for="shipping_country">Country</label>
			<input type="text" name="shipping_country" id="shipping_country" required>
			</div>

			<h2>Billing Address</h2>
			<div class="input_container">
			<label for="billing_street_address">Street Address</label>
			<input type="text" name="billing_street_address" id="billing_street_address" required>
			</div>
			<div class="input_container">
			<label for="billing_city">City</label>
			<input type="text" name="billing_city" id="billing_city" required>
			</div>
			<div class="input_container">
			<label for="billing_state">State/Province/Region</label>
			<input type="text" name="billing_state" id="billing_state">
			</div>
			<div class="input_container">
			<label for="billing_postal_code">ZIP/Postal Code</label>
			<input type="text" name="billing_postal_code" id="billing_postal_code">
			</div>
			<div class="input_container">
			<label for="billing_country">Country</label>
			<input type="text" name="billing_country" id="billing_country" required>
			</div>
			
			<h2>Payment Information</h2>
			<div class="input_container">
			<label for="credit_card_number">Credit Card Number</label>
			<input type="text" name="credit_card_number" id="credit_card_number" required>
			</div>
			<div class="input_container">
			<label for="expiration_date">Expiration Date</label>
			<input type="text" name="expiration_date" id="expiration_date" placeholder="MM/YY" required>
			</div>
			<div class="input_container">
			<label for="cvv">CVV</label>
			<input type="text" name="cvv" id="cvv" required>
			</div>
			 -->
			<div class="input_container">
			<input type="submit" name="register" value="Register">
			</div>
		</form>
	</div>
</body>
</html>
