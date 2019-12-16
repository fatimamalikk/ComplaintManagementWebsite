
<?php
session_start();
include_once('functions.php');
 
// unset user_login session.
unset($_SESSION['loggedin_user']);
 
// Go back to index page.
redirect('homepage.php');
?>