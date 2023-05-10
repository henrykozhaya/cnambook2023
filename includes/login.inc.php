<?php
    require_once "includes/functions.php";
    if(isset($_SESSION["user"])){
        header("location:index.php");
    }
    if
	(
		isset($_POST['username']) && $_POST['username'] != '' && 
		isset($_POST['password']) && $_POST['password'] != '' 
	)
	{
		require_once "includes/db.inc.php";
		$query = "SELECT * FROM user WHERE username = '" . $_POST['username'] . "' AND password = MD5('" . $_POST['password'] . "')";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0)
		{
			$_SESSION["user"] = mysqli_fetch_array($result);
            header("location:index.php");
		}
		else
		{
			$loginFailed = true;
		}

    }

?>