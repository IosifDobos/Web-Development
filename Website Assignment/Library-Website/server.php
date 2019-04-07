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
			$Username = mysqli_real_escape_string($connection, $_POST['username']);
			$Password = mysqli_real_escape_string($connection, $_POST['password']);
			$RetypePassword = mysqli_real_escape_string($connection, $_POST['retypePassword']);
			$Email = mysqli_real_escape_string($connection, $_POST['email']);
			$FistName = mysqli_real_escape_string($connection, $_POST['firstName']);
			$LastName = mysqli_real_escape_string($connection, $_POST['lastName']);
			$AddressLine1 = mysqli_real_escape_string($connection, $_POST['addressLine1']);
			$AddressLine2 = mysqli_real_escape_string($connection, $_POST['addressLine2']);
			$Country = mysqli_real_escape_string($connection, $_POST['country']);
			$City = mysqli_real_escape_string($connection, $_POST['city']);
			$Telephone = mysqli_real_escape_string($connection, $_POST['telephoneNo']);
			$Mobile = mysqli_real_escape_string($connection, $_POST['mobileNo']);

			//create an if statement to ensure that the registration form is correctly completed 
			//and there are not any type of errors
			if (empty($Username)) { array_push($checkerrors, "* Username can`t be blank"); }
			if (strlen($Username) < 3) {
				array_push($checkerrors, "Username must be greather than 3 characters");
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
			// if (strlen($Mobile) < 9) {
			// 	array_push($Mobile, "The mobile number must contain 10 numbers");
			// } Warning given
			if (empty($Password)) {array_push($checkerrors, "* Password required");}
			if (strlen($Password) < 6) 
			{
				array_push($checkerrors, "Password must be greather than 6 characters");
			}
			//check if both password are match
			if ($Password !== $RetypePassword)
			{
				array_push($checkerrors, "* Password do not match");
			}

			// check database for user with same username
			$user_check_query = "SELECT * FROM Users WHERE username = '$Username' or email = '$Email' LIMIT 1";

			$queryResult = mysqli_query($connection, $user_check_query);
			$userQuery = mysqli_fetch_assoc($queryResult);

			if ($userQuery) {
				# code...
				if ($userQuery['username'] === $Username) {
					# code...
					array_push($checkerrors, "User already exists!");
				}

				if ($userQuery['email'] === $Email) {
					# code...
					array_push($checkerrors, "Email already exists!");
				}
			}

			//register user if the form is filled correctly
			if (count($checkerrors) == 0) 
			{
				// $Password = md5($Password); //encrypt the password 
				$query = "INSERT INTO Users (username, password, email, firstName, lastName, addressLine1, addressLine2, country, city, telephoneNo, mobileNo) 
						VALUES('$Username', '$Password', 'Email', '$FirstName', '$LastName', '$AddressLine1', '$AddressLine2', '$Country', '$City', '$Telephone', '$Mobile')";
				mysqli_query($connection, $query);
				$_SESSION['username'] = $Username;
				$_SESSION['success'] = "You have register successfully";
				header('location: login.php');
			}

			//check if form works correct
			echo $Username. "</br>" .$FirstName . "</br>" .$LastName;

			// mysqli_close($connection);
		}

		// LOGIN USER
		if (isset($_POST['login_user'])) 
		{
			$Username = mysqli_real_escape_string($connection, $_POST['username']);
			$Password = mysqli_real_escape_string($connection, $_POST['password']);

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
				
				// $Password = md5($Password);
				$query = "SELECT * FROM Users WHERE username = '$Username' AND password ='$Password' ";
				$result = mysqli_query($connection, $query);

				$result_count = mysqli_num_rows($result);

				console.log("Data recieved: " + JSON.stringify($result_count));

				if (mysqli_num_rows($result)) 
				{

					$_SESSION['username'] = $Username;
					$_SESSION['success'] = "You are now logged in";
					header('location:index.php');
				}
				else 
				{	
				  	array_push($checkerrors, "Wrong username/password combination");
				}
			}
		}
	}

?>