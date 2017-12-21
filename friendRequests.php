<!DOCTYPE html>
<html>
<body>

<?php
require 'SQLconnect.php';
$conn = openConnection();
//select FriendRequest sent to this user
//$sql = "SELECT ProfileID_1, Nick FROM FriendRequest WHERE ProfileID_2 = $_SESSION["ProfileID"]";
$sql = "SELECT Nick, ProfileID_1 FROM FriendRequest NATURAL JOIN Profile WHERE FriendRequest.ProfileID_1=Profile.ProfileID AND
ProfileID_2 = 2";
$result = $conn->query($sql);
//if there are friend requests sent to this user
if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<a href='profile.php'>". $row["Nick"] ."</a><br>";
        //TODO need to add 2 buttons to accept or cancel request
    }
} else {
    echo "No friend requests pending";
}

$conn->close();
?>

</body>
</html>
