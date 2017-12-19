<!DOCTYPE html>
<html>

<head>
<script type="text/javascript">
			function validateForm(){
				var email= document.getElementById("email").value;
				var password=document.getElementById("password").value;

				if(email==null || email==""){
					alert("Enter your email! ");
					return false;
				}
				else if(password==null || password==""){
					alert("Enter your password! ");
					return false;
				}
					else return true;
				}
		</script>
</head>
<link rel="stylesheet"type="text/css" href="loginStyle.css">
<body>

			<form id="form" action="login.php" method="post" onsubmit="return validateForm()">
				<div class="inner">
				<center>
				<h2>Log in to your Account</h2>
				<input type = "text" Name ="Email" ID="Email"  placeholder="Email" >
								<br />
				<input type = "password" Name ="password" ID="password" placeholder="Password" >

                <br />
				<input type ="submit" Name="submit" ID="submit" value = "LOG IN">
				<br />
				<br />
				<p class="message">Not registered? <a href="signup.php">Create an account</a></p>
				</center>
			</div>
			</form>
			<br />

</body>
</html>
