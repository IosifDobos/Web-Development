<?php 
	session_start();

	//create the variables to connect to the database
	// $servername = "localhost";
	// $username = "localhost";
	// $password = "";
	// $dbname = "registration";
	//declare variables
	$Username = " ";
	$Email = " ";
	$FirstName = " ";
	$LastName = " ";
	$AddressLine1 = " ";
	$AddressLine2 = " ";
	$City = " ";
	$Country = " ";
	$Telephone = " ";
	$Mobile = " ";
	$Password_1 = " ";
	$Password_2 = " ";
	$checkerrors = array();
	$_SESSION['success'] = "";

	//connect to the database
	$connection = mysqli_connect('localhost', 'root', '', 'registrationform' );

	if (!$connection) {
	 	die("Failed to connect to the database".mysqli_connect_error());
	}
	else
	{

		//register user
		if(isset($_POST['registration_user']))
		{
			//recieve all the user information from the form
			$Username = mysqli_real_escape_string($connection, $_POST['Username']);
			$Password_1 = mysqli_real_escape_string($connection, $_POST['Password_1']);
			$Password_2 = mysqli_real_escape_string($connection, $_POST['Password_2']);
			$Email = mysqli_real_escape_string($connection, $_POST['Email']);
			$FistName = mysqli_real_escape_string($connection, $_POST['FirstName']);
			$LastName = mysqli_real_escape_string($connection, $_POST['LastName']);
			$AddressLine1 = mysqli_real_escape_string($connection, $_POST['AddressLine1']);
			$AddressLine2 = mysqli_real_escape_string($connection, $_POST['AddressLine2']);
			$City = mysqli_real_escape_string($connection, $_POST['City']);
			$Country = mysqli_real_escape_string($connection, $_POST['Country']);
			$Telephone = mysqli_real_escape_string($connection, $_POST['Telephone']);
			$Mobile = mysqli_real_escape_string($connection, $_POST['Mobile']);

			//create an if statement to ensure that the registration form is correctly completed 
			//and there are not any type of errors
			if (empty($Username)) { array_push($checkerrors, "* Username can`t be blank"); }
			if (strlen($Username) < 3) {
				array_push($Username, "Username must be greather than 3 characters");
			}
			if (empty($Email) ) 
			{ 
				array_push($checkerrors, "* Email address is required");
			}
			if(!filter_var($Email, FILTER_VALIDATE_EMAIL))
			{
				array_push($checkerrors, "Please enter a valid email address");
			}
			if (empty($FirstName)) { array_push($checkerrors, "* Please enter your First Name"); }
			if (empty($LastName)) { array_push($checkerrors, "* Please enter your Last Name"); }
			if (strlen($LastName) < 2)
			{
				array_push($checkerrors, "* Last name is too short");
			}
			if (empty($AddressLine1)) { array_push($checkerrors, "* Enter your address"); }
			if (empty($City)) { array_push($checkerrors, "* Enter your city"); }
			if (empty($Country)) { array_push($checkerrors, "* Enter your country"); }
			if (empty($Mobile)) { array_push($checkerrors, "* Enter mobile number"); }
			if (strlen($Mobile) < 10) {
				array_push($Mobile, "The mobile number must contain 10 numbers");
			}
			if (empty($Password_1)) {array_push($checkerrors, "* Password required");}
			if (strlen($Password_1) < 6) 
			{
				array_push($checkerrors, "Password must be greather than 10 characters");
			}
			//check if both password are match
			if ($Password_1 !== $Password_2)
			{
				array_push($checkerrors, "* Password do not match");
			}

			//register user if the form is filled correctly
			if (count($checkerrors) == 0) 
			{
				$Password = md5($Password_1); //encrypt the password 
				$querry = "INSERT INTO user (Username, Password, Email, FirstName, LastName, AddressLine1, AddressLine2, City, Country, Telephone, Mobile) 
						VALUES('$Username', '$Password', 'Email', '$FirstName', '$LastName', '$AddressLine1', '$AddressLine2', '$City', '$Country', '$Telephone', '$Mobile' )";
				mysqli_query($connection, $querry);
				$_SESSION['Username'] = $Username;
				$_SESSION['success'] = "You are logged in";
				header('location: login.php');
			}

			//check if form works correct
			echo $Username. "</br>" .$FirstName . "</br>" .$LastName;
		}

		// LOGIN USER
		if (isset($_POST['login_user'])) 
		{
			$Username = mysqli_real_escape_string($connection, $_POST['Username']);
			$Password = mysqli_real_escape_string($connection, $_POST['Password']);

			if (empty($Username)) 
			{
				array_push($checkerrors, "* Username is required");
			}
			if (empty($Password)) 
			{
				array_push($checkerrors, "* Password is required");
			}

			if (count($checkerrors) == 0) 
			{
				$Password = md5($Password);
				$query = "SELECT * FROM user WHERE Username = '$Username' AND Password ='$Password' ";
				$results = mysqli_query($connection, $query);

				if (mysqli_num_rows($results) == 1) 
				{
					$_SESSION['Username'] = $Username;
					$_SESSION['success'] = "You are now logged in";
					header('location: index.php');
				}
				else 
				{
					array_push($checkerrors, "Wrong username/password combination");
				}
			}
		}
	}

?>