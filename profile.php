<style>
<?php include 'bar.css'; ?>
</style>
<?php
  session_start();
  require 'SQLconnect.php';
  $conn = openConnection();
  include('upper_bar.php');

  if(isset($_GET['id'])) {
    $visitID = $_GET['id'];
  } else {
    $visitID = 0;
  }

  $profileID = $_SESSION["ProfileID"];

  if($visitID != 0) {
    $id = $visitID;
  }
  else {
    $id = $_SESSION["ProfileID"];
  }

  /* determine whether you visit your friend's profile or not */
  $friends = 0;
  if($visitID != 0) {
    $sqlFriends1 = "SELECT ProfileID_2 FROM Friend WHERE ProfileID_1 = '$profileID' AND ProfileID_2 = '$visitID'";
    $friends1 = mysqli_query($conn, $sqlFriends1);
    $sqlFriends2 = "SELECT ProfileID_1 FROM Friend WHERE ProfileID_2 = '$profileID' AND ProfileID_1 = '$visitID'";
    $friends2 = mysqli_query($conn, $sqlFriends2);
    if(mysqli_num_rows($friends1) == 1)
      $friends = 1;
    else if(mysqli_num_rows($friends2) == 1) {
      $friends = 1;
    }
  }

  /* if you aren't visiting your friend, then maybe you've sent him a request */
  $sentRequest = 0;
  if($visitID != 0 && $friends == 0) {
    $sqlSentRequest = "SELECT ProfileID_2 FROM FriendRequest WHERE ProfileID_1 = '$profileID' AND ProfileID_2 = '$visitID'";
    $sent = mysqli_query($conn, $sqlSentRequest);
    if(mysqli_num_rows($sent) == 1)
      $sentRequest = 1;
  }

  /* if you aren't visiting your friend and you haven't sent him a request, then maybe he has sent you the request */
  $receivedRequest = 0;
  if($visitID != 0 && $friends == 0 && $sentRequest == 0) {
    $sqlreceivedRequest = "SELECT ProfileID_1 FROM FriendRequest WHERE ProfileID_2 = '$profileID' AND ProfileID_1 = '$visitID'";
    $received = mysqli_query($conn, $sqlreceivedRequest);
    if(mysqli_num_rows($received) == 1)
      $receivedRequest = 1;
  }

  $sql1 = "SELECT Fname, Lname, Nick, BirthDate, ProfilePic, Hometown, Gender, Marital, AboutMe FROM Profile WHERE ProfileID = '$id'";
  $profile = mysqli_query($conn, $sql1);
  $row1 = mysqli_fetch_array($profile);

  $name = $row1['Fname'] . " " . $row1['Lname'];
  $birthdate = $row1['BirthDate'];
  $aboutMe = $row1['AboutMe'];
  $hometown = $row1['Hometown'];

  $marital = "";
  if(!is_null($row1['Marital']) && $row1['Marital'] != "") {
      if($row1['Marital'] == 0)
        $marital = "Single";
      else if($row1['Marital'] == 1)
        $marital = "Engaged";
      else /* $row1['Marital'] == 2 */
        $marital = "Married";
  }

  if($row1['Gender'] == 0) {
    $gender = "Male";
  }
  else {
    $gender = "Female";
  }

  if($visitID == 0 || $friends == 1)  {
    $sqlPosts = "SELECT * FROM POST WHERE ProfileID = '$id' ORDER BY PostTime DESC";
  }
  else {
    $sqlPosts = "SELECT * FROM POST WHERE ProfileID = '$id' AND IsPublic = 1 ORDER BY PostTime DESC";
  }

  $posts = mysqli_query($conn, $sqlPosts);

  $conn->close();
?>
<style>
<?php include 'style.css'; ?>
</style>

<html>
  <head>
    <title>Profile</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
<!--    <link rel="stylesheet" href="style.css"> -->
  </head>
  <body>
<?php upper_bar();?>
    <div id="ProfileHeader">
      <div id="profileImage">
        <?php
          echo '<img class="profileImage" src="data:image/jpeg;base64,'.base64_encode($row1['ProfilePic']).'"/>';
        ?>
      </div>
      <div id="profileInfo">
        <?php
            echo $name . " ";
            if(!is_null($row1['Nick']) && $row1['Nick'] != "") {
              echo "(" . $row1['Nick'] . ")";
            }
        ?>
      </div>
      <div id="sendRequest">
        <?php
        if($visitID != 0 && $friends == 0) {
          if($sentRequest == 1);
          else if($receivedRequest == 1) {
            echo '<form action="http://localhost/SocialNetwork/acceptFriendRequest.php" method="get">
            <button type="submit" name="friendRequest" value="' . $visitID . '">Accept Request </button> </form>';

            echo '<form action="http://localhost/SocialNetwork/refuseFriendRequest.php" method="get">
            <button type="submit" name="friendRequest" value="' . $visitID . '">Refuse Request </button> </form>';
          }
          else
            echo '<form action="http://localhost/SocialNetwork/sendFriendRequest.php" method="get">
            <button type="submit" name="friendRequest" value="' . $visitID . '">Send Friend Request </button> </form>';
        }
        ?>
      </div>
    </div>

    <div id="AboutMe">
      <?php
        echo "<br />";
        echo "Gender: " . $gender . "<br />";
        if($marital != "")
          echo "Marital: " . $marital . "<br />";
        if(!is_null($hometown) && $hometown != "")
          echo "Hometown: " . $hometown . "<br />";

        if($visitID == 0 || $friends == 1) {
          echo "Birthdate: " . $birthdate . "<br />";
          if(!is_null($aboutMe) && $aboutMe != "")
            echo "<br /> About Me: <br />" . $aboutMe . "<br />";
        }

        if($visitID == 0) {
          echo "<br /> <form id='more' action='indexMore.php' method='post'><input type='submit' value='Edit Profile' /></form>";
        }
      ?>
    </div>

    <div id="Timeline">
      <?php
        if($visitID == 0) {
          echo '
          <div id="newPost">
            <form action="profileNew.php" method="post">
              <textarea name="post" id="post" placeholder="Write your post, tick for publicity" required /></textarea><br />
              <div class="checkbox"><input type="checkbox" name="isPublic" id="checkboxPublic"/><label for="checkboxPublic"></label></div>
              <input type="submit" name="submit" id="submit" value="Submit" />
            </form>
          </div>
          ';
        }
      ?>

        <?php
          while($row2 = mysqli_fetch_array($posts)) {
            echo '<div id="profilePosts">';
            //if(!is_null($row1['ProfilePic']))
              echo '<img class="ppInPosts" src="data:image/jpeg;base64,'.base64_encode($row1['ProfilePic']).'"/>';
        /*    else if($row1['Gender'] == 0)
              echo '<img class="ppInPosts" src="default/Male.png" />';
            else
              echo '<img class="ppInPosts" src="default/Female.png" />';
        */

            echo "<div class='poster'>" . $name . "<br />";
            echo $row2['PostTime'] . "</div>";

            if($visitID == 0) {
              echo '<div class="delete"> <form action="http://localhost/SocialNetwork/deletePost.php" method="get">
              <button type="submit" name="deletePost" value="' . $row2['PostID'] . '">X </button> </form> </div>';
            }

            echo "<div class='postsCaption'>" . $row2['Caption'] . "<br />";
            if(!is_null($row2['Image']))
              echo '<img class="postsImage" src="data:image/jpeg;base64,'.base64_encode($row2['Image']).'"/>' . '<br />';
            echo "</div> </div>";
          }
        ?>
      </div>
    </div>
  </body>
</html>
