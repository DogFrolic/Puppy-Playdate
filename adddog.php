<?php
require_once "db.php";
session_start();

if ( isset($_POST['dogname']) && isset($_POST['birthyear']) 
     && isset($_POST['weight'])) {
   $n = mysql_real_escape_string($_POST['name']);
   $e = mysql_real_escape_string($_POST['email']);
   $p = mysql_real_escape_string($_POST['password']);
   if ( !$_POST['name'] || !$_POST['email'] || !$_POST['password'] ) {
     $_SESSION['error'] = 'Please enter information in each field';
	 header( 'Location: index.php');
	 return;
   }
   $sql = "INSERT INTO dogs (dogname, birthyear, weight) 
              VALUES ('$n', '$e', '$p')";
   mysql_query($sql);
   $_SESSION['success'] = 'Record Added';
   header( 'Location: index.php' ) ;
   return;
}

?> 
<h1>Add a Dog</h1>
<p>Please give us some information about your dog</p>
  <form method="post">
		<p>Name: 
		<input type="text" name="dogname">
		</p>
		<p>Birth Year:
		<input type="int" name="birthyear">
		<p>Weight:
		<? 
		$query="SELECT id,weight from weight";
		$result = mysql_query ($query);
		echo "<select name=weight value=''>Weight</option>";
// printing the list box select command

		while($nt=mysql_fetch_array($result)){//Array or records stored in $nt
		echo "<option value=$nt[id]>$nt[weight]</option>";
/* Option values are added by looping through the array */
		}
		echo "</select>";// Closing of list box
		?>
		<p>Breed:
<? 
$query="SELECT id,breed from breed order by breed";

/* You can add order by clause to the sql statement if the names are to be displayed in alphabetical order */

$result = mysql_query ($query);
echo "<select name=breed value=''>Breed</option>";
// printing the list box select command


while($nt=mysql_fetch_array($result)){//Array or records stored in $nt
echo "<option value=$nt[id]>$nt[breed]</option>";
/* Option values are added by looping through the array */
}
echo "</select>";// Closing of list box
?>
<p>If your dog's breed is not listed, please select "Other"</p>
		</p>
		<input type="submit" value="Continue"/>
		<a href="index.php">Cancel</a></p>
</form>

