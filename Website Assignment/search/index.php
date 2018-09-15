<?php
	include 'header.php';
?>

<form action="search.php" method="POST">
	<input type="text" name="search" placeholder="Search">
	<button type="submit" name="submit">Search</button>
</form>

<h1>Front page</h1>
<h2>All articles:</h2>

<div class="article-container">
<?php
	$sql = "SELECT * FROM article";
	$result = mysqli_query($conn, $sql);
	$queryResult = mysqli_num_rows($result);
	if ($queryResult > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<div class='article-box'>";
				echo "<h3>".$row['a_title']."</h3>";
				echo "<p>".$row['a_text']."</p>";
				echo "<p>".$row['a_date']."</p>";
				echo "<p>".$row['a_author']."</p>";
			echo "</div>";
		}
	} else {
		echo "There are no articles.";
	}
?>
</div>

</body>
</html>