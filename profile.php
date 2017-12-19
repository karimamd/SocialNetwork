<?php
  session_start();
  //$_SESSION["ProfileID"] = 1;
  require 'SQLconnect.php';
  $conn = openConnection();
  $id = $_SESSION["ProfileID"];

  $sql1 = "SELECT Fname, Lname, Nick, BirthDate, ProfilePic, Hometown FROM profile WHERE ProfileID = '$id'";
  $profile = mysqli_query($conn, $sql1);
  $row1 = mysqli_fetch_array($profile);
  $name = $row1['Fname'] . " " . $row1['Lname'];

  $sql2 = "SELECT * FROM post WHERE ProfileID = '$id'";
  $posts = mysqli_query($conn, $sql2);

  $conn->close();
?>

<html>
  <head>
    <title> Profile </title>
  </head>
  <body>
      <div>
        <?php
          echo $name . " ";
          if(!is_null($row1['Nick']))
            echo $row1['Nick'];
          echo "<br />";
          echo $row1['BirthDate'] . "<br />";
          echo $row1['Hometown'] . "<br />";
        ?>
      </div>
      <div>
        <?php
          while($row2 = mysqli_fetch_array($posts)) {
            echo "<div>" . $name . "<br />";
            echo $row2['PostTime'] . "<br />";
            echo $row2['Caption'] . "<br />";
            if(!is_null($row2['Image']))
              echo '<img src="data:image/jpeg;base64,'.base64_encode($row2['Image']).'"/>';
            echo "</div>";
          }
        ?>
      </div>
  </body>
</html>
