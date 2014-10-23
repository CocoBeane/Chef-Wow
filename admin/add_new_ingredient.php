<?php 
	require ("/Applications/MAMP/htdocs/Chef-Wow/header.php");
	require ("/Applications/MAMP/htdocs/Chef-Wow/functions/add_new_functions.php");
?>
<link rel="stylesheet" type="text/css" href="/Chef-Wow/styles/add_new_page_style.css">
<script src="/Chef-Wow/functions/AddNew_jsFunctions.js"></script>

<div id="content">

	<div id="AddIngredient" class="Add_Things">
		<?php
		if (!empty($_POST)){
			$main_ingredient_values = array($_POST['ing_name'], $_POST['ing_image_url']);
			$nutrition_values = array($_POST['serving_size'], $_POST['calories'], $_POST['fat'], $_POST['cholesterol'], $_POST['sodium'],
			$_POST['carbs'], $_POST['fiber'], $_POST['sugar'], $_POST['protein'], $_POST['vitamin_a'], $_POST['vitamin_c'], $_POST['calcium'], $_POST['iron']);
		}

		if (!empty($_POST)) {
			$new_nutrition_id = add_nutrition_facts($nutrition_values);
			add_ingredient($main_ingredient_values, $new_nutrition_id);
			echo "Ingredient has been added to the database.";
		}
		?>

			<h3 align="center">Create New Ingredient</h3>	
			<form id="new_ingredient" name="new_ingredient" action="add_new_ingredient.php" method="post">
				<p>
				Ingredient Name: <input type="text" name="ing_name" class="required"><br>
				Image URL: <input type="text" name="ing_image_url" class="required">
				<p>
				<h4>Nutritional Facts</h4>
				<p>
				Serving Size: <input type="text" name="serving_size" class="required"><br>
				Calories: <input type="text" name="calories" class="required"><br>
				Total Fat: <input type="text" name="fat" class="required"><br>
				Cholesterol: <input type="text" name="cholesterol" class="required"><br>
				Sodium: <input type="text" name="sodium" class="required"><br>
				Carbohydrates: <input type="text" name="carbs" class="required"><br>
				Fiber: <input type="text" name="fiber" class="required"><br>
				Sugar: <input type="text" name="sugar" class="required"><br>
				Protein: <input type="text" name="protein" class="required"><br>
				Vitamin A: <input type="text" name="vitamin_a" class="required"><br>
				Vitamin C: <input type="text" name="vitamin_c" class="required"><br>
				Calcium: <input type="text" name="calcium" class="required"><br>
				Iron: <input type="text" name="iron" class="required"><br>
				<input class="button" type="submit" value="Submit" disabled="">	
			</form>
	</div>
</div>
</body>
</html>