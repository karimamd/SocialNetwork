<?php
session_start();
$requesterID=$_GET["friendRequest"];
require 'SQLconnect.php';
$conn = openConnection();
//TODO remove request from database here or from showing in friendRequests page
//TODO current problem is that I need to pass friend ID or friendRequest ID to
//accept or refuse it
$deleteSQL="DELETE from FriendRequest WHERE ProfileID_1=".$requesterID."
 AND ProfileID_2=".$_SESSION['ProfileID'];
$conn->query($deleteSQL);
 echo "friend request deleted";
  echo "user  of ID ". $_SESSION['ProfileID'] .
   "refused to be friend with user with ID:".$requesterID;


//need to redirect to friendRequests page
$conn->close();
header("Location: /SocialNetwork/friendRequests.php"); /* Redirect browser */
exit();
?>
