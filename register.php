<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://kit.fontawesome.com/9fce6096a5.js" crossorigin="anonymous"></script>
</head>
<body>
	<?php include 'header.php'; ?>
	<section class="user-login-section user-register" id="user-login-section">
		<div style="text-align: center;">
			<div class="loginform-logo"><i class="fa-solid fa-user"></i></div>
		</div>
		<form class="userlogin-form" action="post_register.php" method="post">
			<label class="label">Name</label>
			<input type="text" name="user_name" placeholder="Enter you name">
			<label class="mobile-no">Mobile No:</label>
			<input type="text" name="user_phone" placeholder="Enter your phone no...">
			<label>Email:</label>
			<input type="email" name="user_email" placeholder="Enter your email..">
			<label>Password:</label>
			<input type="Password" name="user_password" placeholder="password.." rows="5"></input>
			<input type="submit" value="Register">
		</form>
	</section>
</body>
</html>
