<?php
	require ("/Applications/MAMP/htdocs/Chef-Wow/header.php");

if ( isset($_SESSION['username']))
	echo '<div id="content">Welcome back, ' . $_SESSION['username'] .'</div>';
else{	
	echo '<div id="content"><h3 align="center">Sign In</h3>';
	show_sign_in_form();
	}
?>
	</body>
</html>