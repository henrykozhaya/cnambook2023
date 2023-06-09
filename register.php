<?php require_once 'includes/register.inc.php'?>
<h1>Register</h1>
<div class="form_container">
	<form action="#" method="post">
		<div class="input_container">
		<label for="first_name">First Name</label>
		<input type="text" name="first_name" id="first_name" required value="">
		</div>
		<div class="input_container">
		<label for="last_name">Last Name</label>
		<input type="text" name="last_name" id="last_name" required value="">
		</div>
		<div class="input_container">
		<label for="email">Email Address</label>
		<input type="email" name="email" id="email" required  value="">
		</div>
		<div class="input_container">
		<label for="mobile_number">Mobile Number</label>
		<input type="text" name="mobile_number" id="mobile_number" required value="">
		</div>
		<div class="input_container">
		<label for="birthdate">Birthdate</label>
		<input type="date" name="birthdate" id="birthdate" value="">
		</div>
		<div class="input_container">
		<label for="username">Username</label>
		<input type="text" name="username" id="username" required  value="">
		</div>
		<div class="input_container">
		<label for="password">Password</label>
		<input type="password" name="password" id="password" required value="">
		</div>
		<div class="input_container">
		<label for="confirm_password">Confirm Password</label>
		<input type="password" name="confirm_password" id="confirm_password" required value="">
		</div>
		<div class="input_container">
		<input type="submit" name="register" value="Register">
		</div>
		<div class="login-error">
			<?= $error ?>
		</div>
	</form>
</div>
</body>
</html>
