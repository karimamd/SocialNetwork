<?php
session_start();

$link = mysqli_connect("127.0.0.1", "root", "", "Social");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

/*echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;*/

//mysqli_close($link);
/*$link = new mysqli("localhost", "root", "", "trial");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}*/

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
