<?php 
session_start();
include('emo.php');
include('postWall.php');
$link = mysqli_connect("127.0.0.1", "root", "", "social");
mysqli_set_charset($link, "utf8mb4");
$profileID; $fname; $lname; $email; /*$caption;*/ $result;

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

function init(){
  global $link, $fname, $lname, $email,$profileID, $numberPosts_1, $caption;

  $query=$link->query("Select Fname, Lname, Email, ProfileID from Profile where Profile.Email='yuri.z@gmail.com'");
 
  $result=$query->fetch_row();
   

  $fname=$result[0];
  $lname=$result[1];
  $email=$result[2];
  $profileID=$result[3];

}
function confirmPost(){
	global $link,$profileID;
	$is_Public=0;
	if(!empty($_POST['isPublic']))
		$is_Public=1;
	
	//echo "the id is: ".$profileID;
	$theID=$profileID;
	$query=$link->query("INSERT INTO `post` (`Caption`, `Image`, `isPublic`, `ProfileID`) VALUES
('$_POST[post]', NULL, b'$is_Public','$theID')");

	echo"<script>
$( '#post_wall' ).load( 'homepage.php #post_wall' );
function() {
  alert( 'Load was performed.' );
});
</script>";
	//printPosts();
}

function printPosts(){
	global $link,$profileID,$caption;

	$query2=$link->query("(Select Fname, Lname, Caption, PostTime from Profile NATURAL JOIN POST where ProfileID='$profileID') UNION (Select Fname, Lname, Caption, PostTime from Profile NATURAL JOIN (Select ProfileID,Caption, PostTime from POST where ProfileID=(Select ProfileID_2 from Friend where ProfileID_1='$profileID' AND isPublic=1)) AS T) order by PostTime desc");
echo "<br>Posts<br>";
echo "<div id='post_wall'>";
while($capt=$query2->fetch_row()){
	$text=convertText($capt[2]);
	echo "<p style='font-family:verdana;font-size:125%;'>".$capt[0]." ".$capt[1]." wrote:	" .$text."</p>";//$funcky_text;
	echo "</br>";
}
echo "</div>";
}
init();

 ?>



<?php


 echo "<h1>Sweet Home."." ".$fname." ".$lname."</h1>";
 echo "</br>";
 echo "<h2>"."Email is: ".$email."</h2>";
 post();
printPosts();

if(isset($_POST['submit']))
{
	//echo "YES";
	confirmPost();
}



?>

