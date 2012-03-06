<h1>Register with DogFrolic</h1>
<?php
require_once "db.php";
session_start();

if ( isset($_POST['name']) && isset($_POST['email']) 
     && isset($_POST['password'])) {
   $n = mysql_real_escape_string($_POST['name']);
   $e = mysql_real_escape_string($_POST['email']);
   $p = mysql_real_escape_string($_POST['password']);
   if ( !$_POST['name'] || !$_POST['email'] || !$_POST['password'] ) {
     $_SESSION['error'] = 'Please enter information in each field';
	 header( 'Location: index.php');
	 return;
   }
   $sql = "INSERT INTO users (name, email, password) 
              VALUES ('$n', '$e', '$p')";
   mysql_query($sql);
   $_SESSION['success'] = 'Record Added';
   header( 'Location: index.php' ) ;
   return;
}
?>

<link rel="stylesheet" type="text/css" href="/template.css" />
<script type="text/javascript">
    function checkPass(){
      //Store the password field objects into variables ...
      var pass1 = document.getElementById('password');
      var pass2 = document.getElementById('confirm');
      //Store the Confimation Message Object ...
      var message = document.getElementById('confirmMessage');
      //Set the colors we will be using ...
      var goodColor = "#66cc66";
      var badColor = "#ff6666";
      //Compare the values in the password field 
      //and the confirmation field
      if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
      }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
      }
    }  
</script>

    <form method="post">
		<p>Name: 
		<input type="text" name="name">
		</p>
		<p>Email:
		<input type="text" name="email">
		</p>
        <p>
		<label for="pass1">Password:</label>
        <input type="password" name="password" id="password" />
		</p>
		<p>
        <label for="pass2">Confirm Password:</label>
        <input type="password" name="confirm" id="confirm" 
          onkeyup="checkPass(); return false;" />
        <span id="confirmMessage" class="confirmMessage"></span>
		</p>
		<input type="submit" value="Add New"/>
		<a href="index.php">Cancel</a></p>
    </form>


<!--
<p>Add A New User</p>
<form method="post">
<p>Name:
<input type="text" name="name"></p>
<p>Email:
<input type="text" name="email"></p>

<p>Password:
<input type="password" name="password"></p>
<p>Confirm Password:
<input type="password" name="confirm"></p>
<p><input type="submit" value="Add New"/>
<a href="index.php">Cancel</a></p>
</form>

