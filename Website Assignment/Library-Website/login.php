<?php 
	include('server.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Joseph`s Library</title>
	<link rel="stylesheet" type="text/css" href="">
</head>
<body>
	<div class ="main">
		<div id="header">
			<header>
				<img src="Images/headerlibrary.jpg" width="100%", height="200px" />
			</header>
		</div>
		<!--create a div class for navigation bar -->
		<div id = "navigationbar">
			<ul id ="navbar">
				<li><a href="index.php">HOME PAGE</a></li>
				<li><a href="#">ABOUT US</a></li>
				<li><a href="#">SERVICES</a></li>
				<li><a href="#">BOOKS</a></li>
				<li><a href="#">CONTACT</a></li>
			</ul>
		</div>
		<div class="hdr">
			<h2>Login</h2>
		</div>
			
				<form method="post" action="login.php">

					<?php include('errors.php'); ?>

					<div class="input_form">
						<label>Username</label>
						<input type="text" name="username" >
					</div>
					<div class="input_form">
						<label>Password</label>
						<input type="password" name="password">
					</div>
					<div class="input_form">
						<button type="submit" class="btn" name="login_user">Login</button>
					</div>
					<p>
						Not yet a member? <a href="register.php">Sign up</a>
					</p>
				</form>
		

		<div id = "footer">
			<p>
				Copyright @ All rights are reserved. Created 2017 by Joseph Dobos 
			</p>
			<img src="Images/footerbg.png" width="100%"  />
		</div>

	</div>

</body>
</html>