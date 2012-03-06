<?php
require_once "db.php";
session_start();
if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}
if ( isset($_SESSION['success']) ) {
    echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
    unset($_SESSION['success']);
}
echo '<table border="1">'."\n";
$result = mysql_query("SELECT name, email, password, id FROM users");
/* while ( $row = mysql_fetch_row($result) ) {
    echo "<tr><td>";
    echo(htmlentities($row[0]));
    echo("</td><td>");
    echo(htmlentities($row[1]));
    echo("</td><td>");
    echo(htmlentities($row[2]));
    echo("</td><td>\n");
    echo('<a href="edit.php?id='.htmlentities($row[3]).'">Edit</a> / ');
    echo('<a href="delete.php?id='.htmlentities($row[3]).'">Delete</a>');
    echo("</td></tr>\n");
} */
?>
<?php include('nav.php'); ?>
</table>
<a href="add.php">Create Account</a>
<a href="login.php">Login</a>