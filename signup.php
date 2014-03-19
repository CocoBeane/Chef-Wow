<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/page_style.css">
	<title>Chef WOW!</title>
</head>
	<body>
		<div id="container">
			<div id="logo">
				Welcome to Chef WOW!
				<br>
				LOGO GOES HERE
			</div>
			<div id="sign-in">
				SIGN IN
			</div>
			<div id="nav-bar">
				<ul>
					<li class="navigation"><a href="#home">Home</a></li>
					<li class="navigation"><a href="#mybook">My Recipe Book</a></li>
					<li class="navigation"><a href="#recipes">Browse Recipes</a></li>
					<li class="navigation"><a href="#episodes">Episodes</a></li>
				</ul>
			</div>
			<div id="form">
				<h3 align="center">Sign up</h3>
				<p align="center">By creating an account, you can save recipes in your very own magic recipe book, share 
				your favorite recipes with friends, and even create recipes of your own!</p> 
				<form name="sign up" action="thank_you.php" method="post">
					<p class="required">* indicates a required field</p>
					<label class="required">Username:</label>
					<input type="text" name="username">
					</br>
					Pick a nickname that you want to go by on the site.
					<p>
					<label class="required">Email address:</label>
					<input type="text" name="email">
					</br>
					Provide an email address so we can contact you if we need to.
					<p>
					<label class="required">Password:</label>
					<input type="password" name="password1">
					</br>
					<label class="required">Re-type password:</label><input type="password" name="password2">
					</br>
					Create a password that you'll use when you log in.
					<p>
					<label class="required">What is your birthday?</label>
					</br>
					<input type="text" name="birthday" placeholder="MM/DD/YYYY">
					<p>
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
		</div>
	</body>
</html>