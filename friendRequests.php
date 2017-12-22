<!DOCTYPE html>
<html>
<body>
<link rel="stylesheet" href="style.css">
<?php
session_start();
$_SESSION["ProfileID"] = 1;
require 'SQLconnect.php';
$conn = openConnection();
//select FriendRequest sent to this user
//$sql = "SELECT ProfileID_1, Nick FROM FriendRequest WHERE ProfileID_2 = $_SESSION["ProfileID"]";
$sql = "SELECT Nick, ProfileID_1,ProfileID_2,ProfilePic FROM FriendRequest NATURAL JOIN
Profile WHERE FriendRequest.ProfileID_1=Profile.ProfileID AND ProfileID_2 = 2";
$result = $conn->query($sql);


//if there are friend requests sent to this user
if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<img height="55" width="55" style="border-radius:50%"
        class="profileImage" src="data:image/jpeg;base64,'.base64_encode($row['ProfilePic']).'"/>';
        // $acceptFunction="alert('Accepted!')";
        // $rejectFunction="alert('Rejected!')";
        echo "<a href='profile.php'>". $row["Nick"] .'</a>
         <a class="buttonLink" href="function.php?hello=true">Accept Request</a>
         <a class="buttonLink" href="function.php?hello=false">Refuse</a><br>';
         $_SESSION["ProfileID"] = $row["Nick"];
    }
} else {
    echo "No friend requests pending";
}

$conn->close();
?>
<form action="handleFriendRequest.php" method="get">
<button type="submit" name="friendRequest" value="accept">Accept Request<br>
<button type="submit" name="friendRequest" value="refuse">Refuse<br>
</form>


</body>
</html>
