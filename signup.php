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
								<option value='1'>1</option>
								<option value='2'>2</option>
								<option value='3'>3</option>
								<option value='4'>4</option>
								<option value='5'>5</option>
								<option value='6'>6</option>
								<option value='7'>7</option>
								<option value='8'>8</option>
								<option value='9'>9</option>
								<option value='10'>10</option>
								<option value='11'>11</option>
								<option value='12'>12</option>
								<option value='13'>13</option>
								<option value='14'>14</option>
								<option value='15'>15</option>
								<option value='16'>16</option>
								<option value='17'>17</option>
								<option value='18'>18</option>
								<option value='19'>19</option>
								<option value='20'>20</option>
								<option value='21'>21</option>
								<option value='22'>22</option>
								<option value='23'>23</option>
								<option value='24'>24</option>
								<option value='25'>25</option>
								<option value='26'>26</option>
								<option value='27'>27</option>
								<option value='28'>28</option>
								<option value='29'>29</option>
								<option value='30'>30</option>
								<option value='31'>31</option>
								</select>


								<label style="font-size: 15px;">Month</label>
								<select name='month' id='monthddl'>
								<option value='1'>1</option>
								<option value='2'>2</option>
								<option value='3'>3</option>
								<option value='4'>4</option>
								<option value='5'>5</option>
								<option value='6'>6</option>
								<option value='7'>7</option>
								<option value='8'>8</option>
								<option value='9'>9</option>
								<option value='10'>10</option>
								<option value='11'>11</option>
								<option value='12'>12</option>
								</select>


								<label style="font-size: 15px;">Year</label>
								<select name='day' id='blah'>
								<option value='1947'>1947</option>
								<option value='1948'>1948</option>
								<option value='1949'>1949</option>
								<option value='1950'>1950</option>
								<option value='1951'>1951</option>
								<option value='1952'>1952</option>
								<option value='1953'>1953</option>
								<option value='1954'>1954</option>
								<option value='1955'>1955</option>
								<option value='1956'>1956</option>
								<option value='1957'>1957</option>
								<option value='1958'>1958</option>
								<option value='1959'>1959</option>
								<option value='1960'>1960</option>
								<option value='1961'>1961</option>
								<option value='1962'>1962</option>
								<option value='1963'>1963</option>
								<option value='1964'>1964</option>
								<option value='1965'>1965</option>
								<option value='1966'>1966</option>
								<option value='1967'>1967</option>
								<option value='1968'>1968</option>
								<option value='1969'>1969</option>
								<option value='1970'>1970</option>
								<option value='1971'>1971</option>
								<option value='1972'>1972</option>
								<option value='1973'>1973</option>
								<option value='1974'>1974</option>
								<option value='1975'>1975</option>
								<option value='1976'>1976</option>
								<option value='1977'>1977</option>
								<option value='1978'>1978</option>
								<option value='1979'>1979</option>
								<option value='1980'>1980</option>
								<option value='1981'>1981</option>
								<option value='1982'>1982</option>
								<option value='1983'>1983</option>
								<option value='1984'>1984</option>
								<option value='1985'>1985</option>
								<option value='1986'>1986</option>
								<option value='1987'>1987</option>
								<option value='1988'>1988</option>
								<option value='1989'>1989</option>
								<option value='1990'>1990</option>
								<option value='1991'>1991</option>
								<option value='1992'>1992</option>
								<option value='1993'>1993</option>
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
