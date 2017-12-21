<?php
function post(){
echo "<form  id='form' action='homepage.php' method='post'>";
 echo " Post: <br>";
  echo "<input type='text' name='post' ID='post' placeholder='Write your post'><br>";
 echo  "<input type='submit' name='submit' ID='submit' value='Submit'><br>";
 echo "<input type='checkbox' name='isPublic' value='NO'>Public<br>";
echo "</form>";}
//post();

?>