<?php
	require ("/Applications/MAMP/htdocs/Chef-Wow/header.php");
	$id = $_GET['id'];
?>
	<div id="content">
	<?php 
	$ingredient_data_array = fetch_individual_ingredient_data($id);
	?>

		<h3><?php echo $ingredient_data_array['name']?></h3>
			<p>
				<img style='width:200px; height:200px; padding:1px; border:2px solid grey;' src="<?php echo $ingredient_data_array['image_url'] ?> " >
			</p>
			<p>
			<h5>Nutrition Facts</h5>
				<ul>
					<?php 
					$nutrition_id = $ingredient_data_array['nutrition_id'];
					fetch_ingredient_nutrition_info($nutrition_id); ?>
				</ul>
			</p>
			<p>
			<h5>Recipes</h5>
				Recipes this ingredient can be found in (coming soon...)
			</p>
	</div>
</body>
</html>