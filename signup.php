<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">

			function validateForm(){
				var email= document.getElementById("email").value;
				var password=document.getElementById("password").value;
				var fname= document.getElementById("fname").value;
				var lname= document.getElementById("lname").value;
				var nname= document.getElementById("nname").value;
				var ck_name = /^[A-Za-z0-9 ]{3,20}$/;
				var ck_password =  /^[A-Za-z0-9!@#$%^&*()_]{6,20}$/;
                var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

				if(!mailformat.test(email)||email==null || email==""){
					alert("Enter your email! ");
					return false;
				}
				else if(password==null || password=="" || !ck_password.test(password)){
					alert("Enter a valid password! ");
					return false;
				}
								else if(fname==null || fname=="" || !ck_name.test(fname)){
					alert("Enter a valid fname! ");
					return false;
				}
								else if(lname==null || lname=="" || !ck_name.test(lname)){
					alert("Enter a valid lname! ");
					return false;
				}
				if(nname==null || nname=="")
				{
					nname= fname.concat("_"+lname);
				}
					else return true;
				}
		</script>
</head>
<link rel="stylesheet"type="text/css" href="signUpStyle.css">
<body>

			<form id="form" action="action.php" method="post" onsubmit="return validateForm()">
								<div class="inner">
				<center>
				<h2>Enter your Information</h2>
				<input type = "text" Name ="fname" ID="fname"  placeholder="First Name" >
				<input type = "text" Name ="lname" ID="lname"  placeholder="Last Name" >
				<br />
				<input type = "text" Name ="nname" ID="nname"  placeholder="Nick Name" >
				<input type = "text" Name ="email" ID="email"  placeholder="E-mail" >
				<br />
				<input type = "password" Name ="password" ID="password" placeholder="Password" >
				<br />
				<br />
			  <input type="radio" name="genderM" id="gender"  value="male"/>
				<label style="font-size: 15px;" class="genderlabel">Male</label>
				<input type="radio" name="genderF" id="gender"  value="female"/>
				<label style="font-size: 15px;">Female</label>
				<br />
				<br />
				<form Name ="bdate" id="bdate" >
				    <div>

								<label style="font-size: 15px;">Day</label>
								<select name='day' id='dayddl'>
							<?php
							$i = 1;
							while ($i <= 31){
								echo "<option value=" . $i . ">" . $i . "</option>";
								$i = $i + 1;
							}
							?>
								</select>

								<label style="font-size: 15px;">Month</label>
								<select name='month' id='monthddl'>

									<?php
									$i = 1;
									while ($i <= 12){
										echo "<option value=" . $i . ">" . $i . "</option>";
										$i = $i + 1;
									}
									?>
								</select>


								<label style="font-size: 15px;">Year</label>
								<select name='day' id='blah'>
									<?php
									$i = 1970;
									while ($i <= 2004){
										echo "<option value=" . $i . ">" . $i . "</option>";
										$i = $i + 1;
									}
									?>
								</select>

				    </div>
		    </form>
				<br />
				<input type ="submit" Name="submit" ID="submit" value = "Sign Up">
				<br />
				<br />
				<p class="message">Already have account? <a href="index.php">Log in</a></p>
				</center>
			</div>
			</form>
			<br />


</body>
</html>
