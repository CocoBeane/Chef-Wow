<?php
	require ("/Applications/MAMP/htdocs/Chef-Wow/functions/main_functions.php");
	require ("/Applications/MAMP/htdocs/Chef-Wow/header.php");

if ( isset($_SESSION['username']))
	echo '<div id="content">Welcome back, ' . $_SESSION['username'] .'</div>';
else{	
	echo '<div id="content">
			<h3 align="center">Sign In</h3>
			<form id="sign_in" name="sign_in" action="sign_in.php" method="post">
			<p>
			<label>Username:</label>
			<input type="text" name="username">
			</br>
			<label>Password:</label>
			<input type="password" name="password">
			<input id="button" type="submit" value="Submit">
			</form>
		</div>';
	}
?>
	</body>
</html>