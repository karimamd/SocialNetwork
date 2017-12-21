<?php
session_start();
$link = mysqli_connect("127.0.0.1", "root", "", "social");
$profileID; $fname; $lname; $email;//DDD  /*$caption;*/ $result;

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

function init(){
  global $link, $fname, $lname, $email,$profileID, $numberPosts_1, $caption;
//global $result;
  $query=$link->query("Select Fname, Lname, Email, ProfileID from Profile where Profile.Email='yuri.z@gmail.com'");
  //$numberPosts_1=$link->query("Select COUNT(*) AS numberPost_1 from POST where ProfileID=(Select ProfileID_2 from Friend where ProfileID_1='$profileID') AND isPublic=1");
  //$query2=$link->query("Select Caption from POST where ProfileID=(Select * from Friend where ProfileID_1='$profileID')");
  $result=$query->fetch_row();
   //$caption=$query2->fetch_row();

  $fname=$result[0];
  $lname=$result[1];
  $email=$result[2];
  $profileID=$result[3];
  //printf("the number of posts: %d",$numberPosts_1);
}

function printPosts(){
	global $link,$profileID,$caption;
	$i=0;
	//$query2=$link->query("Select ProfileID_2 from friend where ProfileID_1=1");
	$query2=$link->query("Select Caption from POST where ProfileID=(Select ProfileID_2 from Friend where ProfileID_1='$profileID')");
		//$number=$capt->num_rows;

	//$capt=$query2->fetch_row();
while($capt=$query2->fetch_row()){
	//$caption=$link->query("Select Caption from POST where ProfileID=(Select ProfileID_2 from Friend where ProfileID_1='$profileID')");


	//echo "</br>";
	echo "The post:	" . $capt[$i];
	echo "</br>";
	$i++;
}
}
init();
printPosts();
 ?>


<?php
 echo "<h1>Sweet Home."." ".$fname." ".$lname."</h1>";
 echo "</br>";
 echo "<h2>"."Email is: ".$email."</h2>";
//printPosts();



?>
