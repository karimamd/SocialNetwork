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

  $query=$link->query("Select Fname, Lname, Email, ProfileID from Profile where ProfileID=".$_SESSION['ProfileID']);

  $result=$query->fetch_row();


  $fname=$result[0];
  $lname=$result[1];
  $email=$result[2];
  $profileID=$result[3];
  upper_bar();

}


function printResults(){
    global $link,$profileID,$caption;
$stylish_border=0;
$results=0;
$var=$_POST['result'];
    $query2=$link->query("Select Fname, Lname, Caption, ProfilePic, Hometown, Email from Profile NATURAL JOIN POST where Fname Like '%" . $var . "%' or Lname Like '%" . $var . "%' or Caption Like '%" . $var . "%'  or Hometown Like '%" . $var . "%'   or Email Like '%" . $var . "%' ");
//or  or
       //
echo "<div id='results_wall'>";

while($capt=$query2->fetch_row()){
++$results;
        echo "<div  id='result_entity'";
    if($stylish_border% 2==0)
        echo " style='border-right:3px solid #af7f1099'>";
    else
        echo " style='border-left:3px solid #af7f1099'>";
if($capt[3]) echo '<img height="40" width="40" style="margin-right:0.5em;vertical-align:middle;border-radius:50%" src="data:image/png;base64,'.base64_encode( $capt[3] ).'"/>';
        echo '<b>'.$capt[0]." ".$capt[1].": ".'</b>'." found by: ";
        //echo '<hr>';
        if($capt[0])
echo '</br><hr>'."First Name: ".$capt[0];
        if($capt[1])
            echo '</br><hr>'."Last name: ".$capt[1];
            if($capt[2])
echo '</br><hr>'."Caption: ".$capt[2];
        if($capt[4])
echo '</br><hr>'."Hometown: ".$capt[4];
        if($capt[5])
            echo '</br><hr>'."Email: ".$capt[5];
            echo '</div>';
$stylish_border++;

}
echo "</div>";
}
init();



 ?>
<style>
<?php include 'search.css'; ?>
</style>


<?php



if(isset($_POST['do_search']))
{
printResults();
}



?>
