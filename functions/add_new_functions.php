<?php

//add ingredient functions

	//add nutrition facts to nutrition facts database and grab ID
	function add_nutrition_facts($nutrition_values) {
		$connection = mysqli_connect("localhost","root","root","chef_wow");
		$result = mysqli_query($connection, 
		
		//insert each value into table
		"INSERT INTO nutritional_facts (
			id,
			serving_size, 
			calories, 
			total_fat, 
			cholesterol, 
			sodium, 
			carbs, 
			fiber, 
			sugar, 
			protein, 
			vitamin_a, 
			vitamin_c, 
			calcium, 
			iron)
		VALUES(
			'',
			'$nutrition_values[0]', 
			'$nutrition_values[1]', 
			'$nutrition_values[2]', 
			'$nutrition_values[3]', 
			'$nutrition_values[4]', 
			'$nutrition_values[5]', 
			'$nutrition_values[6]', 
			'$nutrition_values[7]', 
			'$nutrition_values[8]', 
			'$nutrition_values[9]', 
			'$nutrition_values[10]',
			'$nutrition_values[11]',
			'$nutrition_values[12]')"
		);

		//return ID for entry that was just created and save it as a variable for the ingredients table
		$id = mysqli_insert_id($connection);
		return $id;
	}

	//add ingredient and nutrition fact ID to ingredients database
	function add_ingredient($main_ingredient_values, $new_nutrition_id) {
		//connect
		$connection = mysqli_connect("localhost","root","root","chef_wow");
		$result = mysqli_query($connection,

		//insert values into database
			"INSERT INTO ingredients (id, name, nutrition_id, image_url) VALUES ('', '$main_ingredient_values[0]', '$new_nutrition_id', '$main_ingredient_values[1]')");
	}

//add recipe functions

	//add recipe to database, and return ID for entry to save it as a variable for the recipe/ingredient join table table
	function add_recipe($main_recipe_values){
		//connect
		$connection = mysqli_connect("localhost","root","root","chef_wow");
		$result = mysqli_query($connection,

		//insert values into database
		"INSERT INTO recipes (id, name, image_url, instructions) VALUES ('', '$main_recipe_values[0]', '$main_recipe_values[1]', '$main_recipe_values[2]')");
	
		$id = mysqli_insert_id($connection);
		return $id;
	}

	//add ingredients and recipe ID to join table
	function add_recipe_ingredients($ingredient_hidden_field_values, $recipe_id){
	
		foreach ($ingredient_hidden_field_values as $field_value){	

			//split the hidden field value into an array of ingredient and quantity
			$quantity_and_ingredient_array = explode("##", $field_value);

			//connect and insert to database
			$result = mysqli_query(connect(),

			"INSERT INTO recipe_ingredients (recipe_id, ingredient, quantity) VALUES ('$recipe_id', '$quantity_and_ingredient_array[1]', '$quantity_and_ingredient_array[0]')");
		}
	}

	//display ingredients from database in ingredients select box
	function display_ingredients_in_select(){
		//connect and pull data collection from ingredients database
		$result = mysqli_query(connect(),
		"SELECT id, name, nutrition_id FROM ingredients ORDER BY name ASC");

		//echo each row to the select box
		while ($row = mysqli_fetch_assoc($result)) {
        	echo ("<option db_id=" .$row['id']. "> " .$row['name']. "</option>");
    	}
	}
?>