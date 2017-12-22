<?php
session_start();
$state=$_GET["friendRequest"];
require 'SQLconnect.php';
$conn = openConnection();
//TODO remove request from database here or from showing in friendRequests page
//TODO current problem is that I need to pass friend ID or friendRequest ID to
//accept or refuse it
$deleteSQL="DELETE from FriendRequest WHERE ProfileID_1=$_SESSION['requesterID']
 AND ProfileID_2=$_SESSION['ProfileID'] "
 $result = $conn->query($deleteSQL);
 if ($result->num_rows > 0 && $result->num_rows <3 ) {
   echo "friend request deleted";
 }
 $row=$result->fetch_assoc();
 if ($state == "refuse") {
  echo "user  of ID ". $row['ProfileID_2'] .
   "refused to be friend with user with ID:".$row['ProfileID_1'] ;;
}

//need to redirect to friendRequests page
$conn->close();
?>
