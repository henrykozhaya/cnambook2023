<?php require_once 'includes/login.inc.php' ?>

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
			<div class="login-error">
				<?php echo isset($loginFailed) && $loginFailed?"Login Failed":""; ?>
			</div>
        </form>
    </div>
</body>
</html>