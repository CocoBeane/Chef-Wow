<html>
<head>
	<title>Chef WOW!</title>
</head>
<body>
	<div id="container">
		<div id="logo" style="width: 50%;background: cornflowerblue;color: yellow;height: 100px;">
			LOGO GOES HERE
		</div>
		<div id="logo" style="width: 50%;background: black;color: white;height: 50px;">
			SIGN IN!
		</div>
		Welcome to Chef WOW!
		<h3 align="center">Sign up</h3>
		<p align="center">By creating an account, you can save recipes in your very own magic recipe book, share 
		your favorite recipes with friends, and even create recipes of your own!</p> 
			<form name="sign up" action="thank_you.php" method="post">
				<p style="size:10px";"color:red";>* indicates a required field</p>
				Username: <input type="text" name="username">*
				</br>
				Pick a nickname that you want to go by on the site.
				</br>
				</br>
				Email address: <input type="text" name="email">*
				</br>
				Provide an email address so we can contact you if we need to.
				</br>
				</br>
				Password: <input type="password" name="password1">*
				</br>
				Re-type password: <input type="password" name="password2">*
				</br>
				Create a password that you'll use when you log in.
				</br>
				</br>
				What is your birthday? 
				</br>
				<input type="text" name="birthday" value="MM/DD/YYYY">*
				</br>
				</br>
				Gender:</br>
				<input type="radio" name="gender" value="male">Male</br>
				<input type="radio" name="gender" value="female">Female</br>
				<input type="radio" name="gender" value="other">Other</br>
				</br>
				Location: <input type="text" name="location"></br>
				</br>	
				<input type="submit" value="Submit">
			</form>
		</div>
	</body>
</html>