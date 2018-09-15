<!--
	Welcome to Joseph`s Library website
	Website created for user to take advantage of the new book available in this website
	User must login to have access to site if are already a member if not they must singup and fill the form 
	and user details are stored in a database. 
	After user signup and login successfuly they have full acess to the site
	A navigation bar is created to help user searching easier trough the website,
	also a seaching bar is provided if user want to saerch for a book or other information more easier
	This site will provide user to reserve a book or more available in the website 

	Website created by Iosif Dobos, C16735789 DT228/2 BSc In Computer Science
	Copyright @all rights are reserved
	
-->
<!-- include the server.php to connect to database -->
<!DOCTYPE html>
<html>
<head>
	<title>Joseph`s Library</title>
	<link rel="stylesheet" type="text/css" href="Stylesheet.css">
	<meta charset="utf-8" name="viewport" content ="width=device-width initial-scale=1">
</head>
<body>
	<div class ="main">
		<div id ="header">
				<img src="Images/headerlibrary.jpg" width="100%", height="200px" />
		</div> <!-- closing header tag -->
		<!--create a div class for navigation bar -->
		<div id = "navigationbar">
			<ul id ="navbar">
				<li><a href="mainPage.php">HOME PAGE</a></li>
				<li><a href="#">ABOUT US</a></li>
				<li><a href="#">SERVICES</a></li>
				<li><a href="#">BOOKS</a></li>
				<li><a href="#">CONTACT</a></li>
			</ul>
		</div> <!-- closing navigation bar div class -->
		<div id = "searchbar">
			<form action="search.php" method="POST">
				<input type="text" name="search" placeholder="Search">
				<button type="submit" name="submit-search">Search</button>
				<select name="cataogue" style="margin-left: 20px; ">
					<option value="cataogue">Catalogue</option>
					<option value = "science">Computer Science</option>
					<option value="health">Health Care</option>
					<option value="enginerin">Enginering </option>
					<option value="sport">Sport</option>
					<option value="article">Article</option>
					<option value="it">Programming</option>
				</select>
				<div id="login-singup" style=" margin-left: 450px; margin-top: -30px;; ">
					<img src="Images/login.png" alt="login" width="40" height="40"/>
					<a href="registration/index.php" >LogIn </a>
					<img src="Images/register.png" alt="register" width="40" height="40"/>
					<a href="registration/register.php" >SignUp </a>
				</div>
			</form>
		</div>
		

		<div  class = "article-container">
			<!--
			<?php
				$querry = "SELECT * FROM article";
				$result = mysqli_query($connection, $querry);
				$queryResults = mysqli_num_rows($result);

				if ( $queryResults > 0 ) {
					# code...
					while ($row = mysqli_fetch_assoc($result)) 
					{
						echo 
						"<div>
							<h3>".$row['a_title']."</h3>
							<p>".$row['a_text']."</p>
							<p>".$row['a_date']."</p>
							<p>".$row['a_author']."</p>
						</div>";		
					}
				}
			?> -->
		</div> 

		<div id = "footer">
			<p>
				Copyright @ All rights are reserved. Created 2017 by Joseph Dobos 
			</p>
			
		</div> <!-- closing footer tag -->
		<img src="Images/footerbg.png" width="100%"  />
	
	</div> <!-- closing main div tag -->

</body>
</html>