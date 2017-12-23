<?php
  session_start();

  require 'SQLconnect.php';
  $conn = openConnection();

  $id = $_SESSION["ProfileID"];

  $marital = $_POST['marital'];
  $hometown = $_POST['hometown'];
  $aboutme = $_POST['aboutme'];

  $sql1 = "UPDATE profile SET Marital = '$marital', Hometown = '$hometown', AboutMe = '$aboutme' WHERE ProfileID = '$id'";
  $result1 = $conn->query($sql1);

  $phone = $_POST['phone'];

  if(!is_null($phone) && $phone != "") {
    $sql2 = "INSERT INTO phone(ProfileID, Phone) values ('$id', '$phone')";
    $result2 = $conn->query($sql2);
  }

  header ('Location: profile.php');

  $conn->close();

?>
