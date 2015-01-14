<?php
	require ("/Applications/MAMP/htdocs/Chef-Wow/header.php");
	$id = $_GET['id'];
?>
	<div id="content">
		<?php 
		$recipe_data_array = fetch_individual_recipe_data($id);
		?>

			<h3><?php echo $recipe_data_array['name']?></h3>
			<?php
			if (isset($_SESSION['username']))
				echo "<button type=button id='add-to-book'>Add to my Book</button>";
			?>
			<div id="hidden_fields">
				<input type=hidden id='username' name='username' value="<?php echo $_SESSION['username']; ?>">
				<input type=hidden id='recipe-id' name='recipe_id' value="<?php echo $id; ?>">
			</div>
				<p>
					<img style='width:200px; height:200px; padding:1px; border:2px solid grey;' src="<?php echo $recipe_data_array['image_url'] ?>">
				</p>
				<p>
				<h5>Ingredients</h5>
					<ul>
						<?php fetch_recipe_ingredients($id); ?>
					</ul>
				</p>
				<p>
				<h5>Instructions</h5>
					<?php echo $recipe_data_array['instructions'] ?>
				</p>
	</div>
</body>
</html>