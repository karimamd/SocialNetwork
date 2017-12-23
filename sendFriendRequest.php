<?php
  session_start();
  require 'SQLconnect.php';
  $conn = openConnection();

  $visitID = $_GET["friendRequest"];
  $profileID = $_SESSION["ProfileID"];

  $sql = "INSERT INTO FriendRequest(ProfileID_1, ProfileID_2) values ('$profileID', '$visitID')";
  if($conn->query($sql) === TRUE) {
    header ('Location: friendRequests.php');
    exit();
  }

  $conn->close();
?>
