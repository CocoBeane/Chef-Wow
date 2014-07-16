		<?php require ("/Applications/MAMP/htdocs/Chef-Wow/header.php");
		?>
			
			<div id="content">
				<h3 align="center">Sign up</h3>
				<p align="center">By creating an account, you can save recipes in your very own magic recipe book, share 
				your favorite recipes with friends, and even create recipes of your own!</p> 
				<form id="sign up" name="sign up" action="thank_you.php" method="post">
					<p style ="color:red;font-size:10px;">* indicates a required field</p>
					
					<label>Username:</label>
					<input type="text" name="username" class="required">
					</br>
					<span class="descriptor">Pick a nickname that you want to go by on the site.</span>
					</br>
					<p>
					<label>Email address:</label>
					<input type="text" name="email" class="required">
					</br>
					<span class="descriptor">Provide an email address so we can contact you if we need to.</span>
					</br>
					<p>
					<label>Password:</label>
					<input type="password" name="password1" class="required">
					</br>
					<label>Re-type password:</label>
					<input type="password" name="password2" class="required">
					</br>
					<span class="descriptor">Create a password that you'll use when you log in.</span>
					<p>
					<label>What is your birthday?</label>
					</br>
					<input type="text" name="birthday" class="required" placeholder="MM/DD/YYYY">
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