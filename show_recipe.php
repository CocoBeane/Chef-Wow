<?php
	require ("/Applications/MAMP/htdocs/Chef-Wow/header.php");
	$id = $_GET['id'];
?>
	<div id="content">
	<?php 
	$recipe_data_array = fetch_individual_recipe_data($id);
	?>

		<h3><?php echo $recipe_data_array['name']?></h3>
			<p>
				<img style='width:200px; height:200px; padding:1px; border:2px solid grey;' src="<?php echo $recipe_data_array['image_url'] ?>">
			</p>
			
			<h5>Ingredients</h5>
			<p>
				<ul>
					<?php fetch_recipe_ingredients($id); ?>
				</ul>
			</p>

			<h5>Instructions</h5>
			<p>
				<?php echo $recipe_data_array['instructions'] ?>
			</p>
	</div>
</body>
</html>