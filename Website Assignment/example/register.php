<?php 
	include("server.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration to Joseph`s Library</title>
	<link rel="stylesheet" type="text/css" href="../Stylesheet.css">
</head>
<body>
	<div class="main">
		<div id="header">
			<header>
				<img src="../Images/headerlibrary.jpg" width="100%", height="200px" />
			</header>
		</div>
		<!--create a div class for navigation bar -->
		<div id = "navigationbar">
			<ul id ="navbar">
				<li><a href="../mainPage.php">HOME PAGE</a></li>
				<li><a href="#">ABOUT US</a></li>
				<li><a href="#">SERVICES</a></li>
				<li><a href="#">BOOKS</a></li>
				<li><a href="#">CONTACT</a></li>
			</ul>
		</div>
			<!--<div id="completeForm"> -->
				<div class="hdr">
					<h1>Register</h1>
				</div>
				<form method="post" action="server.php">
					<?php include('errors.php')  ?>

					<div class="input_form">
						<label>Username</label>
						<input type="text" name="Username" value="<?php echo $Username; ?>">
					</div>
					<div class="input_form">
						<label>Password</label>
						<input type="password" name="Password_1">
					</div>
					<div class="input_form">
						<label>Re-entry password</label>
						<input type="password" name="Password_2">
					</div>
					<div class="input_form">
						<label>Email </label>
						<input type="email" name="Email" value="<?php echo $Email; ?>">
					</div> 
					<div class="input_form">
						<label>First Name</label>
						<input  type="text" name="FirstName" value="<?php echo $FirstName; ?>">
					</div>

					<div class="input_form">
						<label>Last Name</label>
						<input type="text" name="LastName" value="<?php echo $LastName; ?>">
					</div>
					<div class="input_form">
						<label>Address 1</label>
						<input type="text" name="AddressLine1" value="<?php echo $AddressLine1; ?>">
					</div>
					<div class="input_form">
						<label>Address 2</label>
						<input type="text" name="AddressLine2" value="<?php echo $AddressLine2; ?>">
					</div>
					<div class="input_form">
						<label>City</label>
					<input type="text" name="City" value="<?php echo $City; ?>">
					</div>
					<div class="input_form">
						<label>Country</label>
						<input type="text" name="Country" value="<?php echo $Country; ?>">
					</div>
					<div class="input_form">
						<label>Thelephone No.</label>
					<input type="text" name="Telephone" value="<?php echo $Telephone; ?>">
					</div>
					<div class="input_form">
						<label>Mobile No.</label>
					<input type="text" name="Mobile" value="<?php echo $Mobile; ?>">
					</div>
					<div class="input_form">
						<button type="submit" class="btn" name="registration_user">Register</button>
					</div>
				</form>
			

		<div id = "footer">
			<p>
				Copyright @ All rights are reserved. Created 2017 by Joseph Dobos 
			</p>
			<img src="../Images/footerbg.png" width="100%"  />
		</div>

	</div>

</body>
</html>