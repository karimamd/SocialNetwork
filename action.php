<?php
  session_start();
  require 'SQLconnect.php';
  $link = openConnection();

function SignUp() {
	global $link;
	$query=$link->query("SELECT * FROM student WHERE email = '$_POST[email]'");
if($query->num_rows>0){ echo "Already another account with the same email exists.
   Please log in. Redirecting after 5 seconds.";header('refresh: 5; url=index.php'); }
 else {

        $query2=$link->query("INSERT INTO student ( firstName, lastName, email, pass )
        VALUES ( '$_POST[fname]', '$_POST[lname]','$_POST[email]','$_POST[password]' );");

        $_SESSION['user_email'] = $_POST['email'];header('Location: view.php');
      }
 }
if(isset($_POST['submit']))
{
	SignUp();
}
 ?>
