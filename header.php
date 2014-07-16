<?php
	require ("/Applications/MAMP/htdocs/Chef-Wow/functions/main_functions.php");
	session_start();

	//if ($_SESSION['username'] !== null && $_POST['username'] !== null && $_POST['password'] !== null){
	//	if (valid_user($_POST['username'], $_POST['password']) == true)
	//		$_SESSION['username'] = $_POST['username'];
	//}
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Chef WOW!</title>
	<link rel="stylesheet" type="text/css" href="/Chef-Wow/styles/page_style.css">
	<link rel="stylesheet" type="text/css" href="/Chef-Wow/styles/header_style.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="/Chef-Wow/functions/jquery_functions.js"></script>
</head>
	<body>
		<div id="container">
<div id="logo">
	Chef <span>WOW!</span>
</div>		
<div id="sign-in">
	<?php
		echo isset($_SESSION['username']) ? "<a href=logout.php>LOG OUT</a>" : "<a href=signin.php>SIGN IN</a></br><a href=signup.php>SIGN UP</a>";
	?>
</div>
			
<div id="nav-bar">
		<ul>
			<li class="navigation"><a href="/Chef-Wow/signin.php">Home</a></li>
			<li class="navigation"><a href="/Chef-Wow/mybook.php">My Recipe Book</a></li>
			<li class="navigation"><a href="/Chef-Wow/recipes.php">Browse Recipes</a></li>
			<li class="navigation"><a href="/Chef-Wow/episodes.php">Episodes</a></li>
		</ul>
</div>