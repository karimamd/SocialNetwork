<?php
session_start();
$_SESSION['requesterID']=$_GET["friendRequest"];
require 'SQLconnect.php';
$conn = openConnection();
//TODO remove request from database here or from showing in friendRequests page
//TODO current problem is that I need to pass friend ID or friendRequest ID to
//accept or refuse it
$deleteSQL="DELETE from FriendRequest WHERE ProfileID_1=".$_SESSION['requesterID']."
 AND ProfileID_2=".$_SESSION['ProfileID'];
$conn->query($deleteSQL);
 echo "friend request deleted";

  $insertSQL="INSERT INTO Friend(ProfileID_1,ProfileID_2)
  VALUES (" . $_SESSION['requesterID'] . "," . $_SESSION['ProfileID'] . ")";
  $result = $conn->query($insertSQL);

    echo "user  of ID " . $_SESSION['requesterID'] .
     "is now a friend with user with ID:".$_SESSION['ProfileID'];

//need to redirect to friendRequests page
$conn->close();

?>
