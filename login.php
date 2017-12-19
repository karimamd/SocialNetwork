<?php
session_start();
require 'SQLconnect.php';
$link = openConnection();

function Login() {
	global $link;
	$query=$link->query("SELECT * FROM Profile WHERE Email = '$_POST[email]' AND Pass = '$_POST[password]'");
if(!$query->num_rows){ echo "No account with such information.
   Redirecting after 5 seconds."; header('refresh: 5; url=index.php');}
 else { $_SESSION['user_email'] = $_POST['email'];/*header('Location: view.php');*/ } }
if(isset($_POST['submit']))
{
	Login();
}
 ?>
