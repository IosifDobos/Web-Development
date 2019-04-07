<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['Logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header('location: login.php');
	}
		
?>

<!DOCTYPE html>
<html>
<head>
	<title>Joseph`s Library</title>
	<link rel="stylesheet" type="text/css" href="css/websiteCSS.css">
</head>

<body>
	<div class="main">
		<div id="header">
			<header>
				<img src="Images/headerlibrary.jpg" width="100%", height="200px" />
			</header>
		</div>
		<!--create a div class for navigation bar -->
		<nav class = "menu">
			<ul class ="active">
				<li class="current-item"><a href="index.php">HOME PAGE</a></li>
				<li><a href="aboutUS.php">ABOUT US</a></li>
				<li><a href="#">SERVICES</a></li>
				<li><a href="#">BOOKS</a></li>
				<li><a href="#">CONTACT</a></li>
			</ul>
			<a class="toggle-nav" href="#">&#9776;</a>

			<form class="search-form">
				<input type="text">
				<button>Search</button>
			</form>
		</nav>
		<div id="hdr">
			<h1>Home Page</h1>
		</div>

		<div id="content">
			<!-- notification message -->
			<?php if (isset($_SESSION['success'])) : ?>
				<div class="error success" >
					<h3>
						<?php 
							echo $_SESSION['success']; 
							unset($_SESSION['success']);
						?>
					</h3>
				</div>
			<?php endif ?>

			<!-- logged in user information -->
			<?php  if (isset($_SESSION['username'])) : ?>
				<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
				<p> <a href="login.php?logout='1'" style="color: red;">Logout</a> </p>
			<?php endif ?>
		</div>

		<div id = "footer">
			<p>
				Copyright @ All rights are reserved. Created 2017 by Joseph Dobos 
			</p>
			<img src="Images/footerbg.png" width="100%"  />
		</div>

	</div>

</body>
</html>