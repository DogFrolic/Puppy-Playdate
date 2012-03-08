<?php
require_once "db.php";
session_start();

if (!isset($_SESSION['name'])) {
	header('Location: index.php');
}
?>
<html>
  <body>
	<h1><a href="home.php">DogFrolic</a></h1>
	<a href="adddog.php">Add a Dog</a>
	<a href="editdog.php">Edit your Dog</a>
	<a href="logout.php">Logout <?php echo $_SESSION['name']; ?></a>
	<p>
	<form name="form" action="search.php" method="get">
		<input type="text" name="search">
	</form>
	</p>
  </body>
</html>