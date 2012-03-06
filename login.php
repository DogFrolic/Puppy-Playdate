<h1>Login to DogFrolic</h1>
<?php
session_start();
require_once "db.php";

if ( isset($_POST['email']) && isset($_POST['password'])  ) {
   $e = mysql_real_escape_string($_POST['email']);
   $p = mysql_real_escape_string($_POST['password']);
   $sql = "SELECT name FROM users 
              WHERE email = '$e' AND password='$p'";
   echo "<!--\n$sql\n-->\n";
   $result = mysql_query($sql);
   $row = mysql_fetch_row($result);	
   if ( $row === FALSE ) {
      echo "<p>Login incorrect.</p>\n";
      unset($_SESSION['name']);
   } else { 
      echo "<p>Login success.</p>\n";
      $_SESSION['name'] = $row[0];
      
   }
}
if ( isset($_SESSION['name'] )) {
   echo('<p>Hello '.htmlentities($_SESSION['name']).'</p>'."\n");
   echo('<p><a href="logout.php">Logout</a></p>'."\n");
   return;
}
?>
<p>Login</p>
<form method="post">
<p>Email:
<input type="text" name="email"></p>
<p>Password:
<input type="text" name="password"></p>
<p><input type="submit" value="Login"/>
<a href="index.php">Cancel</a>
</form>