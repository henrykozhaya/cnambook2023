<?php
    require_once "includes/functions.inc.php";
    if
	(
		isset($_POST['username']) && $_POST['username'] != '' && 
		isset($_POST['password']) && $_POST['password'] != '' 
	)
	{
		require_once "includes/db.inc.php";
		$query = "SELECT * FROM user WHERE username = '" . $_POST['username'] . "' AND password = MD5('" . $_POST['password'] . "')";
		$result = mysqli_query($connection, $query);
		if(mysqli_num_rows($result) > 0)
		{
			$_SESSION["user"] = mysqli_fetch_array($result);
			
			// Check if remember me checkbox is on
			if(isset($_POST["remember_me"])){
				$login_token = getRandomtoken();
				mysqli_query($connection, "UPDATE user SET login_token = '$login_token' WHERE id = '".$_SESSION["user"]["id"]."'");
				setcookie("user_token", $login_token, time() + 3600, "/");
			}

            header("location:index.php");
		}
		else
		{
			$loginFailed = true;
		}

    }

?>