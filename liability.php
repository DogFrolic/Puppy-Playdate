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

?>

<h1>Liability Waiver</h1>
<p>By agreeing, I acknowledge that I use DogFrolic at my own risk. DogFrolic is not responsible for anything that may happen as a result of using the site.</p>
<form>
<?php
$agree_status = 'unchecked';
$disagree_status = 'unchecked';

if (isset($_POST['Submit1'])) {

$selected_radio = $_POST['agreement'];

if ($selected_radio == 'agree') {
$agree_status = 'checked';
}
else if ($selected_radio == 'disagree') {
$disagree_status = 'checked';
}
}

?>