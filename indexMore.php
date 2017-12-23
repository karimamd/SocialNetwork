<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Edit Profile</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>

<body id="index">

  <div id="grid3" class="grid">
    <form action="actionMore.php" method="POST" class="form login">

      <div class="form__field">
        <input class="more" type="text" name="phone" placeholder="Phone Number">
      </div>

      <div class="form__field">
        <input class="more" type="text" name="hometown" placeholder="Hometown">
      </div>

      <div class="form__field">
        <input class="more" type="text" name="aboutme" placeholder="About Me">
      </div>

      <div class="select-group">
        <select name='marital' id="marital">
          <option value="" selected disabled hidden>Select Marital Status</option>
          <option value=0>Single</option>
          <option value=1>Engaged</option>
          <option value=2>Married</option>
        </select>
      </div>

      <div class="form__field">
        <input type="submit" name="signup" value="Done" class="form__input">
      </div>

    </form>

  </div>
