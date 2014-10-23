<?php 
	require ("/Applications/MAMP/htdocs/Chef-Wow/header.php");
	require ("/Applications/MAMP/htdocs/Chef-Wow/functions/add_new_functions.php");
?>
<link rel="stylesheet" type="text/css" href="/Chef-Wow/styles/add_new_page_style.css">
<script src="/Chef-Wow/functions/AddNew_jsFunctions.js"></script>

<div id="content">

	<div id="AddRecipe" class="Add_Things">
		<?php

		//Create array for recipe components
		if (!empty ($_POST))         {
			$main_recipe_values = array ($_POST['recipe_name'], $_POST['recipe_image_url'], $_POST['recipe_instructions']);
		}

		//Submit recipe components, and return recipe id# from database
		if (!empty($_POST)) {
			$recipe_id = add_recipe($main_recipe_values);
			echo "Recipe has been added to the database.";
			
			//Submit ingredients from hidden fields, along with recipe id#, to join table
			unset($_POST['recipe_name'], $_POST['recipe_image_url'], $_POST['recipe_instructions'], $_POST['SelectIngredient']);
			$ingredient_hidden_field_values = array ();
				foreach ($_POST as $post_item){
					array_push($ingredient_hidden_field_values, $post_item);
				}
			add_recipe_ingredients($ingredient_hidden_field_values, $recipe_id);
		}
?>
<h3 align="center">Create New Recipe</h3>	
				<form id="new_recipe" name="new_recipe" action="add_new_recipe.php" method="post">
					<p>
					Recipe Name: <input type="text" name="recipe_name" class="required"><br>
					Image URL: <input type="text" name="recipe_image_url" class="required">
					</p>
					<h4>Ingredients</h4>
					<p>
					<select name="SelectIngredient" id="SelectIngredient">
						<option value="" disabled selected>Select Ingredient</option>
						<option>Example Ingredient</option>
					</select>
					Amount: <input type="text" id="IngredientAmount" placeholder="Ex. 4 tablespoons">
					<br>
					<input type="button" id="AddIngredientToList" value="Add" style="background-color: gold;">
					<p>
					<div id="IngredientsList" name="Ingredients List"></div>
					<p>
					<h4>Instructions</h4>
					<textarea rows="6" cols="75" id="recipe_instructions" name="recipe_instructions" class="required" placeholder="1. Pre-heat oven to 350 degrees..." ></textarea>
					<br>
					<input class="button" type="submit" value="Submit" disabled="">	
				</form>
</div>
</body>
</html>