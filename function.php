<html>
<?php
  function runMyFunction() {
    echo 'Friend Request Accepted';
  }

  if (isset($_GET['hello'])) {
    runMyFunction();
  }
  else {
    {
      echo 'Friend Request Refused';
    }
  }
?>


</html>
