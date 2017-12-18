<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">

			function validateForm(){
				var email= document.getElementById("email").value;
				var password=document.getElementById("password").value;
				var fname= document.getElementById("fname").value;
				var lname= document.getElementById("lname").value;
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
				<input type = "password" Name ="confirm" ID="confirm" placeholder="Confirm Password" >
				<br />
					<form id="gender style="font-size: 10px;
					  font-family:Verdana,sans-serif;">
						 <input type="radio" name="gender" value="male" checked>
						 <input type="radio" name="gender" value="female"> Female<br>
					</form>
				<input type = "text" Name ="bdate" ID="bdate"  placeholder="birthdate" >
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
