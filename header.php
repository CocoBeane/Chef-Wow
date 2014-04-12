<?php
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Chef WOW!</title>
	<link rel="stylesheet" type="text/css" href="styles/page_style.css">
	<link rel="stylesheet" type="text/css" href="styles/header_style.css">
</head>
	<body>
		<div id="container">
<div id="logo">
	Chef <span>WOW!</span><br>
</div>
			
<div id="sign-in">
	<?php
		if ($_SESSION['username'] != "" )
			echo "Welcome back, " . $_SESSION['username'];
		else
			echo "<a href=sign_in.php>SIGN IN</a>";
	?>
</div>
			
<div id="nav-bar">
		<ul>
			<li class="navigation"><a href="signup.php">Home</a></li>
			<li class="navigation"><a href="#mybook">My Recipe Book</a></li>
			<li class="navigation"><a href="#recipes">Browse Recipes</a></li>
			<li class="navigation"><a href="#episodes">Episodes</a></li>
		</ul>
</div>