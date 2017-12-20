<?php
  session_start();
  $_SESSION["ProfileID"] = 1;
  require 'SQLconnect.php';
  $conn = openConnection();
  $id = $_SESSION["ProfileID"];

  $sql1 = "SELECT Fname, Lname, Nick, BirthDate, ProfilePic, Hometown, Gender FROM profile WHERE ProfileID = '$id'";
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
    <link href="style.css" rel="stylesheet">
  </head>
  <body>
    <div id="header">

    </div>
    <div id="profileImage">
      <?php
          if(!is_null($row1['ProfilePic']))
            echo '<img class="profileImage" src="data:image/jpeg;base64,'.base64_encode($row1['ProfilePic']).'"/>';
          else if($row1['Gender'] == 0)
            echo '<img class="profileImage" src="defaultMale.png" />';
          else
            echo '<img class="profileImage" src="defaultFemale.png" />';
      ?>
    </div>
    <div id="profileHeader">
      <?php
          echo $name . " ";
          if(!is_null($row1['Nick']))
            echo $row1['Nick'];
          echo "<br />";
          echo $row1['BirthDate'] . "<br />";
          echo $row1['Hometown'] . "<br />";
      ?>
    </div>
    <div id="newPost">
      <form action="profile.php" method="post">
        <textarea name="post" id="post" placeholder="Write your post "/></textarea> <br/>
        <input type="submit" name="submit" id="submit" value="Submit" />
        <input type="checkbox" name="isPublic" value=1 /> Public
      </form>
    </div>
    <div id="profilePosts">
      <?php
        while($row2 = mysqli_fetch_array($posts)) {
          echo "<div>" . $name . "<br />";
          echo $row2['PostTime'] . "<br />";
          echo $row2['Caption'] . "<br />";
          if(!is_null($row2['Image']))
            echo '<img class="postsImage" src="data:image/jpeg;base64,'.base64_encode($row2['Image']).'"/>' . '<br />';
          echo "<br /><br /></div>";
        }
      ?>
    </div>
  </body>
</html>
