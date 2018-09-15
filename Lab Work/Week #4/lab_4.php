<!DOCTYPE html>
<html>
<head>
	<title>Lab 4</title>
</head>
<body>

	<?php 
		$time = date("H");
		$my_array = array( 5, 10, 15, 20, 30, 35, 40 ); 
		$index = 0;

		if ($time < 10) {
			# code...
			echo "Have a good morning";
		}
		else if ( $time > 10 && $time < 20) {
			# code...
			echo "Have a good day";
		}
		else{
			echo "Have a good night";
		}

		echo "Using while loop to display an array of numbers";
		while ( $index != 1 ) {
			# code...
			foreach ($my_array as $first) {
				# code...
				echo "$first ";
			}

			$index++;
		}


	 ?>

</body>
</html>