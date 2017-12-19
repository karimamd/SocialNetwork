<!DOCTYPE html>
<html>
<body>

<?php
include'header.php';

$sql = "SELECT ProfileID_1, Nick FROM Friend WHERE ProfileID_2 == $_SESSION["ProfileID"]";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>

</body>
</html>
