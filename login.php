<?php //require_once 'includes/register.inc.php' ?>
<?php
    if
	(
		isset($_POST['username']) && $_POST['username'] != '' && 
		isset($_POST['password']) && $_POST['password'] != '' 
	)
	{
		require_once "includes/db.inc.php";
		echo $_POST['password'];
		echo "<br>";
		$query = "SELECT * FROM user WHERE username = '" . $_POST['username'] . "' AND password = MD5('" . $_POST['password'] . "')";
		echo $query;
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0)
		{
			$user = mysqli_fetch_array($result);
			echo "Welcome " . $user["first_name"];
		}
		else
		{
			echo "Invalid username and/or password";
		}


        // echo "Login request sent";
        // echo "<br>";
        // echo "Usermame sent:" . $_POST['username'];
        // echo "<br>";
        // echo "Password sent:" . $_POST['password'];
    }
    else
    {
        echo "Visited the login page for the first time";
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
	<h1>Login</h1>
	<div class="form_container">
		<form action="#" method="post">
			<div class="input_container">
			<label for="username">Username</label>
			<input type="text" name="username" id="username" required value="cnamuser">
			</div>
			<div class="input_container">
			<label for="password">Password</label>
			<input type="password" name="password" id="password" required value="cnamuser2023">
			</div>
            <div class="input_container">
			<input type="submit" name="login" value="login">
			</div>
        </form>
    </div>
</body>
</html>