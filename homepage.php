<style>
<?php include 'bar.css'; ?>
</style>
<?php 
session_start();
include('emo.php');
include('postWall.php');
include('upper_bar.php');
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
  echo "<script type='text/javascript'> function showStuff() {
    myspan = document.getElementById('notify_news');
if (myspan.innerText) {
	var val=parseInt(myspan.innerText);
	val++;
    myspan.innerText = val;
}
else
if (myspan.textContent) {
		var val=parseInt(myspan.textContent);
	val++;
        myspan.textContent = val;   
}}
</script>";

  $fname=$result[0];
  $lname=$result[1];
  $email=$result[2];
  $profileID=$result[3];
  upper_bar();

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

	//printPosts();
}

function printPosts(){
	global $link,$profileID,$caption;
$stylish_border=0;
	$query2=$link->query("(Select Fname, Lname, Caption, ProfilePic, Image, PostTime from Profile NATURAL JOIN POST where ProfileID!='$profileID' AND isPublic=1) UNION
	(Select Fname, Lname, Caption, ProfilePic, Image, PostTime from Profile NATURAL JOIN POST where ProfileID='$profileID')  UNION
	(Select Fname, Lname, Caption, ProfilePic, Image, PostTime from Profile NATURAL JOIN (Select ProfileID,Caption, Image, PostTime from POST where ProfileID=(Select Distinct ProfileID_2 from Friend where isPublic=0 AND ProfileID_1='$profileID')) AS T)order by PostTime desc");
echo "<div id='post_wall'>";
while($capt=$query2->fetch_row()){
	$text=convertText($capt[2]);
	
	//echo "</br>";
	echo "<div  id='post_entity'";
	if($stylish_border% 2==0)
		echo " style='border-right:3px solid #af7f1099'>";
	else
		echo " style='border-left:3px solid #af7f1099'>";

		if($capt[3]) echo '<img height="40" width="40" style="margin-right:0.5em;vertical-align:middle;border-radius:50%" src="data:image/png;base64,'.base64_encode( $capt[3] ).'"/>';
		echo '<b>'.$capt[0]." ".$capt[1].":	".'</b>'.$text;
		if($capt[4])
			echo '</br><hr><img style="width:70%;height:50%;display:block;margin:auto" src="data:image/png;base64,'.base64_encode( $capt[4] ).'"/>'."</div>";//$funcky_text;
		else
			echo '</div>';
$stylish_border++;
}
echo "</div>";
}
init();


 
 ?>
<style>
<?php include 'main.css'; ?>
</style>


<?php
 post($fname,$lname);
printPosts();

if(isset($_POST['submit']))
{
	//echo "YES";
	confirmPost();
}



?>


