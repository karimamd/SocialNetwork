<?php
  session_start();
  require 'SQLconnect.php';
  $link = openConnection();
function SignUp() {
    global $link;
    $email=$_POST["Email"];
	$query=$link->query("SELECT * FROM Profile WHERE Email = '$email'");
    if($query->num_rows>0){
        echo "Already another account with the same email exists.<br/>";
        echo "Please log in. Redirecting after 5 seconds.<br/>";
        header('refresh: 5; url=index.php');
    } else {
        $fname = $_POST['Fname'];
        $lname = $_POST['Lname'];
        $nick  = $_POST['Nick'];
        $gender = $_POST['gender'];
        $hashed_password = password_hash($_POST['Pass'], PASSWORD_DEFAULT);
        echo $hashed_password . "<br/>";
        $query2=$link->query("INSERT INTO Profile ( FName, LName, Nick, Email, Pass, Gender )
        VALUES ( '$fname', '$lname','$nick','$email','$hashed_password', '$gender' );");
        /*
        $_SESSION['user_email'] = $_POST['email'];header('Location: view.php');
        */
    }
 }
if(isset($_POST['submit'])) {
	SignUp();
}
 ?>
