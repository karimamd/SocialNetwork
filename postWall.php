<?php
function post($fname,$lname){

echo "<form  id='post_form' action='homepage.php' method='post' enctype='multipart/form-data'>";
echo "<div id='inner_form' style='font-family: verdana;font-size: 10px;'>";
  echo '<input type="text" name="post" ID="post" placeholder="Write post "'.$fname.'mm '.$lname.'><br>';
 echo  "<input type='submit' name='submit' ID='submit' value='Submit'>";
 echo "
         <input id='pic_load_file' type='file' name='image' />

";
 echo "<input type='checkbox' id='public' name='isPublic' value='NO'>Public<br>";
 echo "</div>";
echo "</form>";
}


?>