<?php
  session_start();
  require 'SQLconnect.php';
  $conn = openConnection();
  $post = $_POST['post'];
  $public = (isset($_POST['isPublic'])) ? b'1' : b'0';
  $id = $_SESSION['ProfileID'];
  $sql3 = "INSERT INTO POST(Caption, IsPublic, ProfileID) values('$post','$public','$id')";
  if ($conn->query($sql3) === TRUE) {
      header ('Location: profile.php');
      exit();
  }
  $conn->close();
?>
