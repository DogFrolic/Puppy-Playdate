<?php
require_once "db.php";
session_start();

if ( isset($_POST['name']) && isset($_POST['email']) 
     && isset($_POST['password']) && isset($_POST['id']) ) {
    $n = mysql_real_escape_string($_POST['name']);
    $e = mysql_real_escape_string($_POST['email']);
    $p = mysql_real_escape_string($_POST['password']);
    $id = mysql_real_escape_string($_POST['id']);
    $sql = "UPDATE users SET name='$n', email='$e',
              password='$p' WHERE id='$id'"; 
    mysql_query($sql);
    $_SESSION['success'] = 'Record updated';
    header( 'Location: index.php' ) ;
    return;
}

$id = mysql_real_escape_string($_GET['id']);
$result = mysql_query("SELECT name, email, password, id 
    FROM users WHERE id='$id'");
$row = mysql_fetch_row($result);
if ( $row == FALSE ) {
    $_SESSION['error'] = 'Bad value for id';
    header( 'Location: index.php' ) ;
    return;
}

$n = htmlentities($row[0]);
$e = htmlentities($row[1]);
$p = htmlentities($row[2]);
$id = htmlentities($row[3]);

echo <<< _END
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
		<input type="text" name="name" value="$n">
		</p>
		<p>Email:
		<input type="text" name="email" value="$e">
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
		<input type="submit" value="Update"/>
		<a href="index.php">Cancel</a></p>
    </form>
_END
?>

