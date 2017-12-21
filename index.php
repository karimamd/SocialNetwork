<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <!-- Javascript validations -->
  <script type="text/javascript">
    function validateForm() {
    	var email= document.getElementById("email").value;
    	var password=document.getElementById("password").value;
    	var fname= document.getElementById("signup__firstname").value;
    	var lname= document.getElementById("signup__lastname").value;
    	var ck_name = /^[A-Za-z0-9 ]{3,20}$/;
    	var ck_password =  /^[A-Za-z0-9!@#$%^&*()_]{6,20}$/;
      var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    	if(!mailformat.test(email)){
    		alert("Enter a valid email! ");
    		return false;
    	}
      else if(!ck_name.test(fname)){
        alert("Enter a valid first name! ");
        return false;
      }
      else if(!ck_name.test(lname)){
        alert("Enter a valid last name! ");
        return false;
      }
    	else if(!ck_password.test(password)){
    		alert("Enter a valid password! ");
    		return false;
    	}
    }
  </script>
  <!-- start of jQuery code -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      $("#signup").click(function(){
        $("#grid2").show();
        $("#grid1").hide();
      });
      $("#login").click(function(){
        $("#grid1").show();
        $("#grid2").hide();
      });
    });
  </script>
  <!-- end of jQuery code -->
</head>

<body>

  <div id="grid1" class="grid">
    <form action="action.php" method="POST" class="form login">

      <div class="form__field">
        <label for="login__email" class="words"><svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#user"></use></svg><span class="hidden">Username</span></label>
        <input id="login__email" type="text" name="Email" class="form__input" placeholder="Email" required>
      </div>

      <div class="form__field">
        <label for="login__password" class="words"><svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#lock"></use></svg><span class="hidden">Password</span></label>
        <input id="login__password" type="password" name="Pass" class="form__input" placeholder="Password" required>
      </div>

      <div class="form__field">
        <input type="submit" name='login' value="Log In" class="form__input">
      </div>

    </form>

    <p class="text--center">Not a member? <a id="signup"> Sign up</a> <svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="assets/images/icons.svg#arrow-right"></use></svg></p>

  </div>

  <div id="grid2" class="grid">
    <form action="action.php" method="POST" class="form login" onsubmit="return validateForm()">

      <div class="form__field">
        <label for="login__email" class="words"><svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#user"></use></svg><span class="hidden">Username</span></label>
        <input id="email" type="text" name="Email" class="form__input" placeholder="Email" required>
      </div>

      <div class="form__field">
        <input id="signup__firstname" type="text" name="Fname" placeholder="First Name" required>
        <input id="signup__lastname" type="text" name="Lname" placeholder="Last Name" required>
      </div>

      <div class="form__field">
        <label for="login__nickname" class="words"><svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#user"></use></svg><span class="hidden">Username</span></label>
        <input id="signup__nickname" type="text" name="Nick" class="form__input" placeholder="Nick Name">
      </div>

      <div class="form__field">
        <label for="login__password" class="words"><svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#lock"></use></svg><span class="hidden">Password</span></label>
        <input id="password" type="password" name="Pass" class="form__input" placeholder="Password" required>
      </div>

      <div class="radio-group">
        <input type="radio" id="m-option" name="gender" value=0 checked="checked">
        <label for="m-option" class="option"> Male&ensp;</label>
        <input type="radio" id="f-option" name="gender" value=1>
        <label for="f-option" class="option">Female</label>
      </div>

      <div class="select-group">
        <select name='day' id="day" required>
          <option value="" selected disabled hidden>Day</option>
          <?php
            $i = 1;
            while ($i <= 31){
              echo "<option value=" . $i . ">" . $i . "</option>";
              $i = $i + 1;
            }
          ?>
        </select>

        <select name="month" id="month" required>
          <option value="" selected disabled hidden>Month</option>
          <?php
            $i = 1;
            while ($i <= 12){
              echo "<option value=" . $i . ">" . $i . "</option>";
              $i = $i + 1;
            }
          ?>
        </select>

        <select name="year" id="year" required>
          <option value="" selected disabled hidden>Year</option>
          <?php
            $i = 1970;
            while ($i <= 2004){
              echo "<option value=" . $i . ">" . $i . "</option>";
              $i = $i + 1;
            }
          ?>
        </select>
      </div>

      <div class="form__field">
        <input type="submit" name="signup" value="Sign Up" class="form__input">
      </div>

    </form>

    <p class="text--center">Already a member? <a id="login"> Log In</a> <svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="assets/images/icons.svg#arrow-right"></use></svg></p>

  </div>

  <svg xmlns="http://www.w3.org/2000/svg" class="icons"><symbol id="arrow-right" viewBox="0 0 1792 1792"><path d="M1600 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H245q-52 0-84.5-37.5T128 1024V896q0-53 32.5-90.5T245 768h704L656 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z"/></symbol><symbol id="lock" viewBox="0 0 1792 1792"><path d="M640 768h512V576q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28H416q-40 0-68-28t-28-68V864q0-40 28-68t68-28h32V576q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z"/></symbol><symbol id="user" viewBox="0 0 1792 1792"><path d="M1600 1405q0 120-73 189.5t-194 69.5H459q-121 0-194-69.5T192 1405q0-53 3.5-103.5t14-109T236 1084t43-97.5 62-81 85.5-53.5T538 832q9 0 42 21.5t74.5 48 108 48T896 971t133.5-21.5 108-48 74.5-48 42-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-320-893q0 159-112.5 271.5T896 896 624.5 783.5 512 512t112.5-271.5T896 128t271.5 112.5T1280 512z"/></symbol></svg>
  <?php
  if(isset($_SESSION['ProfileID'])) {
    header('Location: homepage.php');
  } elseif (isset($_SESSION['error'])){
    if ($_SESSION['error'] == "invalid_password") {
      echo "<script>alert(\"Invalid Password\");</script>";
    } elseif ($_SESSION['error'] == 'account_exist') {
      echo "<script>$(\"#grid1\").show();$(\"#grid2\").hide();alert(\"Account exist!\");</script>";
    } elseif ($_SESSION['error'] == "no_account") {
      echo "<script>$(\"#grid2\").show();$(\"#grid1\").hide();alert(\"Account doesn't exist!\");</script>";
    }
    unset($_SESSION['error']);
  } else {
    echo "<script>$(\"#grid1\").show();$(\"#grid2\").hide();</script>";
  }
?>
</body>
</html>
