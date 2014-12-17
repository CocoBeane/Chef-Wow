<?php require ("/Applications/MAMP/htdocs/Chef-Wow/header.php");?>

	<div id="content">
		<?php
			if (isset($_SESSION['username']))
				echo "<h3>My Recipe Book</h3>
				<p>signed in test test</p>";
				//display_my_recipe_book();
			else{
				echo "<h4>Whoops, you have to be signed in to do that!</h4>";
				show_sign_in_form();
				}
		?>
	</div>
</body>
</html>