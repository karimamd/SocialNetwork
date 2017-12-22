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

  $insertSQL="INSERT INTO Friend(ProfileID_1,ProfileID_2)
  VALUES (" . $requesterID . "," . $_SESSION['ProfileID'] . ")";
  $result = $conn->query($insertSQL);

    echo "user  of ID " . $requesterID .
     "is now a friend with user with ID:".$_SESSION['ProfileID'];

//need to redirect to friendRequests page
$conn->close();

?>
