<html>
<head>
	<title>Chef WOW!</title>
	<link rel="stylesheet" type="text/css" href="css/page_style.css">
	<link rel="stylesheet" type="text/css" href="css/header_style.css">
</head>
	<body>
		<div id="container">
		
		<?php require ("/Applications/MAMP/htdocs/Chef-Wow/header.php");?>
			
			<div id="content">
				<h3 align="center">Sign up</h3>
				<p align="center">By creating an account, you can save recipes in your very own magic recipe book, share 
				your favorite recipes with friends, and even create recipes of your own!</p> 
				<form id="sign up" name="sign up" action="thank_you.php" method="post">
					<p style ="color:red;font-size:10px;">* indicates a required field</p>
					
					<label class="required">Username:</label>
					<input type="text" name="username">
					</br>
					<span class="descriptor">Pick a nickname that you want to go by on the site.</span>
					</br>
					<p>
					<label class="required">Email address:</label>
					<input type="text" name="email">
					</br>
					<span class="descriptor">Provide an email address so we can contact you if we need to.</span>
					</br>
					<p>
					<label class="required">Password:</label>
					<input type="password" name="password1">
					</br>
					<label class="required">Re-type password:</label>
					<input type="password" name="password2">
					</br>
					<span class="descriptor">Create a password that you'll use when you log in.</span>
					<p>
					<label class="required">What is your birthday?</label>
					</br>
					<input type="text" name="birthday" placeholder="MM/DD/YYYY">
					</p>
					<p>
					<label>Gender:</label></br>
					<input type="radio" name="gender" value="male"><label>Male</label></br>
					<input type="radio" name="gender" value="female"><label>Female</label></br>
					<input type="radio" name="gender" value="other"><label>Other</label></br>
					</br>
					<p>
					<label>Location:</label> <input type="text" name="location">
					</br></br>	
					<input id="button" type="submit" value="Submit">	
				</form>
			</div>
		</div>
	</body>
</html>