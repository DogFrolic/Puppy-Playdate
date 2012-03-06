<?php
session_start();
unset($_SESSION['name']);
?>
<p>Logged out...</p>
<p><a href="index.php">Return to home page</a></p>
