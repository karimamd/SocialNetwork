<!DOCTYPE html>
<html>
<body>
<?php
session_start();
require 'SQLconnect.php';
$conn = openConnection();
//select FriendRequest sent to this user
//$sql = "SELECT ProfileID_1, Fname FROM FriendRequest WHERE ProfileID_2 = $_SESSION["ProfileID"]";
//INSERT INTO FriendRequest (ProfileID_1,ProfileID_2) VALUES (1,2);
$sql = "SELECT Fname, ProfileID_1,ProfileID_2,ProfilePic FROM Friend NATURAL JOIN
Profile WHERE Friend.ProfileID_1=Profile.ProfileID AND ProfileID_2 =".$_SESSION["ProfileID"];
$result = $conn->query($sql);

//if there are friend requests sent to this user
if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {

        $requesterID=$row['ProfileID_1'];
        echo '<br><img height="55" width="55" style="border-radius:50%"
        class="profileImage" src="data:image/jpeg;base64,'.base64_encode($row['ProfilePic']).'"/>';
        // $acceptFunction="alert('Accepted!')";
        // $rejectFunction="alert('Rejected!')";
        echo "<a href='profile.php/?id=" . $requesterID . "'>". $row["Fname"] .'</a>';
        //can get it from profile page using :
        //if(isset($_GET['id'])){$_SESSION['id'] = $_GET['id'];}

        //  '<a class="buttonLink" href="function.php?hello=true">Accept Request</a>
        //  <a class="buttonLink" href="function.php?hello=false">Refuse</a><br>';
        //TODO make it equal to current profile ID

      //  else {
      //    echo $row['ProfileID_1'] . $row['ProfileID_2'];
      //  }
                                          }


                            }  else {
                                      echo "No friend requests pending";
                                  }

                                  $sql = "SELECT Fname, ProfileID_1,ProfileID_2,ProfilePic FROM Friend NATURAL JOIN
                                  Profile WHERE Friend.ProfileID_2=Profile.ProfileID AND ProfileID_1 =".$_SESSION["ProfileID"];
                                  $result = $conn->query($sql);

                                  //if there are friend requests sent to this user
                                  if ($result->num_rows > 0) {

                                      // output data of each row
                                      while($row = $result->fetch_assoc()) {

                                          $requesterID=$row['ProfileID_2'];
                                          echo '<br><img height="55" width="55" style="border-radius:50%"
                                          class="profileImage" src="data:image/jpeg;base64,'.base64_encode($row['ProfilePic']).'"/>';
                                          // $acceptFunction="alert('Accepted!')";
                                          // $rejectFunction="alert('Rejected!')";
                                          echo "<a href='profile.php/?id=" . $requesterID . "'>". $row["Fname"] .'</a>';
                                          //can get it from profile page using :

                                          //  '<a class="buttonLink" href="function.php?hello=true">Accept Request</a>
                                          //  <a class="buttonLink" href="function.php?hello=false">Refuse</a><br>';
                                          //TODO make it equal to current profile ID

                                        //  else {
                                        //    echo $row['ProfileID_1'] . $row['ProfileID_2'];
                                        //  }
                                                                            }


                                                              }




$conn->close();
?>
<!-- <form action="acceptFriendRequest.php" method="get">
<button type="submit" name="friendRequest" value='<?php echo $requesterID ?>’>Accept Request
</form>
<form action="refuseFriendRequest.php" method="get">
<button type="submit" name="friendRequest" value=value='<?php echo $requesterID ?>’>Refuse<br>
</form> -->

</body>
</html>
