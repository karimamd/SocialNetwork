<?php
  session_start();
  require 'SQLconnect.php';
  $link = openConnection();
function SignUp() {
    global $link;
    $email=$_POST["Email"];
	$query=$link->query("SELECT * FROM Profile WHERE Email = '$email'");
    if($query->num_rows > 0){
        //XXX Should immediately redirect to log in page with error message there
        //echo "Already another account with the same email exists.<br/>";
        //echo "Please log in. Redirecting after 5 seconds.<br/>";
        $_SESSION['error'] = "account_exist";
        header('Location: index.php');
    } else {
        echo "Redirecting ...<br/>";
        $fname = $_POST['Fname'];
        #echo $fname . "<br/>";
        $lname = $_POST['Lname'];
        #echo $lname . "<br/>";
        $nick = $_POST['Nick'];
        #echo $nick . "<br/>";
        $gender = $_POST['gender'];
        #echo $gender . "<br/>";
        $day = $_POST['day'];
        #echo $day . "<br/>";
        $month = $_POST['month'];
        #echo $month . "<br/>";
        $year = $_POST['year'];
        #echo $year . "<br/>";
        $date = $day . "/" . $month ."/" . $year;
        #echo $date . "<br/>";
        $hashed_password = password_hash($_POST['Pass'], PASSWORD_DEFAULT);
        #echo $hashed_password . "<br/>";
        #XXX missing checks that query is done
        $new_account  = "INSERT INTO Profile ( FName, LName, Nick, Email, Pass, Gender, BirthDate )
        VALUES ( '$fname', '$lname','$nick','$email','$hashed_password', '$gender', STR_TO_DATE('$date', '%d/%m/%Y') );";
        #echo $new_account . "<br/>";
        $link->query($new_account);
        #XXX missing checks here too
        $query=$link->query("Select ProfileID from Profile where Email='$email'");
        $result=$query->fetch_row();
        $ProfileID = $result[0];

        #echo $ProfileID . "<br/>";
        $_SESSION['ProfileID'] = $ProfileID;
        header('Location: homepage.php');

    }
 }
 function LogIn(){
    global $link;
    $email=$_POST["Email"];
	$query=$link->query("SELECT Pass, ProfileID FROM Profile WHERE Email = '$email'");
    if($query->num_rows == 0){
        //Should redirect to signup page with error message on top
        $_SESSION['error'] = "no_account";
        //echo "Account doesn't exists.<br/>";
        //echo "Please Sign Up. Redirecting after 5 seconds.<br/>";refresh: 5;
        header('Location: index.php');
    } else {
        $Pass = $_POST["Pass"];
        $result=$query->fetch_row();
        $hashed_password=$result[0];
        if (password_verify($Pass, $hashed_password)) {
            $ProfileID = $result[1];
            $_SESSION['ProfileID'] = $ProfileID;

           header('Location: homepage.php');
        } else {
            //XXX invalid password
            $_SESSION['error'] = "invalid_password";
            header('Location: index.php');
        }
    }
 }
if(isset($_POST['signup'])) {
    #echo 'signup<br/>';
	SignUp();
} elseif (isset($_POST['login'])) {
  //  echo 'login<br/>';
    LogIn();
}
 ?>
