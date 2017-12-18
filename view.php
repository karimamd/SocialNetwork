<?php 
session_start();
$link = mysqli_connect("127.0.0.1", "root", "", "trial");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
 printf("Hello my dear friend %s\n",$_SESSION['user_email']);
echo '<br />';
$main=$link->query("SELECT DISTINCT deptNO from student WHERE  `student`.`email` = '$_SESSION[user_email]'");
$result=$main->fetch_row();
if($result[0]==NULL)
init();
else{
  $temp=$link->query("SELECT DISTINCT deptName from department WHERE  `department`.`deptNO` = '$result[0]'");
  $result1=$temp->fetch_row();
showCourses($result[0],$result1[0]);}

 function showCourses($DeptNumber,$DeptName){
 	global $link;
    $count=1;                  
$main=$link->query("SELECT DISTINCT courseName from course WHERE  `course`.`deptNO` = '$DeptNumber'");
 	                 while($r=$main->fetch_row())
                 { 
                       echo '<br />';
                       //printf("\n %d- Course name: %s in Department: %s\n",$count,$r[0],$DeptName);
                       echo "<font face = 'Verdana' size = '3'>$count- Course name: $r[0] ($DeptName)</font><br />";
                       $count++;
                 }
 }
 function init(){
 	global $link;
//echo 'Hello my dear friend '.$_SESSION['user_email'];
echo '<br />';
echo '<br />';
printf("You are not enlisted in any departments yet. Please select your department:\n");
 	echo '<form id="form" action="view.php" method="post">';
 	echo '<select name="DeptName">';
 	//echo "<option value=""> -----------ALL----------- </option> ";
 	$query=$link->query("Select DISTINCT deptName from department");
 	                 while($r=$query->fetch_row())
                 { 
                       echo "<option value='$r[0]'> $r[0] </option>";
                 }
                 echo '</select>';
                 echo '<input type ="submit" Name="submit" ID="submit" value = "DONE">';
                 echo '</form>';
 }
if(isset($_POST['submit']))
{
  echo "<meta http-equiv='refresh' content='0'>";
	$query1=$link->query("SELECT DISTINCT deptNO from department WHERE deptName= '$_POST[DeptName]'");
	$result=$query1->fetch_row();
	$query2=$link->query("UPDATE `student` SET `deptNo` = '$result[0]' WHERE `student`.`email` = '$_SESSION[user_email]'");
	 showCourses($result[0],$_POST['DeptName']);
}
 ?>
