<?php 
require ("/Applications/MAMP/htdocs/Chef-Wow/header.php");
require ("/Applications/MAMP/htdocs/Chef-Wow/functions/recipe_book_functions.php");
?>

	<div id="content">
		<?php
			if (isset($_SESSION['username'])){
				echo "<h3>My Recipe Book</h3>";
				echo "<input type=hidden id=username name=username value=".$_SESSION['username'].">";
				display_my_recipe_book();
			}else{
				echo "<h4>Whoops, you have to be signed in to do that!</h4>";
				show_sign_in_form();
			}
		?>
	</div>
</body>
</html>