<?php
  session_start();
  require 'SQLconnect.php';
  $conn = openConnection();

  $PostID = $_GET["deletePost"];
  $profileID = $_SESSION["ProfileID"];

  $sql = "DELETE FROM POST WHERE PostID = '$PostID'";

  if($conn->query($sql) === TRUE) {
    header ('Location: profile.php');
    exit();
  }

  $conn->close();
?>
