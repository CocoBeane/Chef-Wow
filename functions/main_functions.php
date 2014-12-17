<?php 
//add user and basic database functions

//add user to database
function add_user($username, $email, $password1, $birthday, $gender, $location) {

	//$connect = mysqli_connect("localhost","root","root","chef_wow");
	$result = mysqli_query(connect(), "INSERT INTO users (username, email, password, birthday, gender, location) 
	VALUES('$username', '$email', '$password1', '$birthday', '$gender', '$location')");

	if ($result == false) {
		print_r (mysqli_error_list($connect));
	}
}

//connect to database
function connect() {
	// Create connection
	$connection = mysqli_connect("localhost","root","root","chef_wow");

	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	} else
		return $connection;
}

//disconnect from database
function disconnect() {
	mysqli_close();
}

//check if username and password are valid to sign in
function valid_user($username, $password){
	$connect = mysqli_connect("localhost","root","root","chef_wow");
	$results = mysqli_query($connect, "SELECT * FROM users WHERE `username` = '$username' && `password` = '$password'");

	return mysqli_num_rows($results) >= 1 ? true : false;
}

//echo sign in form
	function show_sign_in_form(){
		echo '<form id="sign_in" name="sign_in" action="signin.php" method="post">
			<p>
			<label>Username:</label>
			<input class="required" type="text" name="username">
			</br>
			<label>Password:</label>
			<input class="required" type="password" name="password">
			<br><br>
			<input id="button" class="button" disabled="disabled" type="submit" value="Submit">
			</form>
			<p style="font-size:smaller">Or <a href="signup.php">sign up</a></p>';
	}

//recipe functions

//display name and image of all recipes, and link to recipe pages
function show_all_recipes(){
	//connect and pull recipe name, id, and img
	$result = mysqli_query(connect(),
	"SELECT id, name, image_url FROM recipes ORDER BY name ASC");

	//iterate over/display each with a link to the recipe page
	while ($row = mysqli_fetch_assoc($result)) {
    	echo 
    	"<li style='display: inline-block; vertical-align: top;'>
    		<a href='/Chef-Wow/show_recipe.php?id=" .$row['id']. "'> " .$row['name']. " 
    		<br> 
    		<img src='" .$row['image_url']. "' style='width:200px; height:200px; padding:1px; border:2px solid grey;'>
    		</a>
    		</li>";
    }
}

//show recipe data on individual recipe page
function fetch_individual_recipe_data($id){
	//connect and pull recipe name, id, and img
	$recipe_result = mysqli_query(connect(),
		"SELECT * FROM recipes WHERE id = '$id'");

	return mysqli_fetch_assoc($recipe_result);
}

//show ingredient data for recipe on individual recipe page
function fetch_recipe_ingredients($id) {
	//connect and pull recipe ingredients
	$recipe_ingredients_result = mysqli_query (connect(),
	"SELECT * FROM recipe_ingredients WHERE recipe_id = '$id'");

	//iterate over/display each ingredient in list
	while ($row = mysqli_fetch_assoc($recipe_ingredients_result)) {
		echo 
 			"<li>" 
 			.$row['quantity']. " - <a href='/Chef-Wow/show_ingredient.php?id=" .$row['ingredient_id']. "'>" .$row['ingredient']."</a>
 			</li>";
    }

}


//ingredient functions

//display name and image of all ingredients, and link to ingredient pages
function show_all_ingredients(){
	//connect and pull ingredient name, id, and img
	$result = mysqli_query(connect(),
	"SELECT id, name, image_url FROM ingredients ORDER BY name ASC");

	//iterate over/display each with a link to the recipe page
	while ($row = mysqli_fetch_assoc($result)) {
    	echo 
    	"<li style='display: inline-block; vertical-align: top;'>
    		<a href='/Chef-Wow/show_ingredient.php?id=" .$row['id']. "'> " .$row['name']. " 
    		<br> 
    		<img src='" .$row['image_url']. "' style='width:200px; height:200px; padding:1px; border:2px solid grey;'>
    		</a>
    		</li>";
    }
}

//show ingredient data on individual ingredient page
function fetch_individual_ingredient_data($id){
	//connect and pull ingredient name, id, and img
	$ingredient_result = mysqli_query(connect(),
		"SELECT * FROM ingredients WHERE id = '$id'");

	return mysqli_fetch_assoc($ingredient_result);
}

//show nutrition facts for ingredient on ingredient page
function fetch_ingredient_nutrition_info($nutrition_id) {
	//connect and pull recipe ingredients
	$ingredient_nutrition_result = mysqli_query (connect(),
	"SELECT * FROM nutritional_facts WHERE id = '$nutrition_id'");

	//iterate over/display each ingredient in list
	while ($row = mysqli_fetch_assoc($ingredient_nutrition_result)) {
		echo 
    	"<li>Serving Size: " .$row['serving_size']. "</li>
    	<li>Calories: " .$row['calories']. "</li>
    	<li>Total Fat: " .$row['total_fat']. "g</li>
    	<li>Cholesterol: " .$row['cholesterol']. "mg</li>
    	<li>Sodium: " .$row['sodium']. "mg</li>
    	<li>Carbohydrates: " .$row['carbs']. "g</li>
    	<li>Fiber: " .$row['fiber']. "g</li>
    	<li>Sugar: " .$row['sugar']. "g</li>
    	<li>Protein: " .$row['protein']. "g</li>
    	<li>Vitamin A: " .$row['vitamin_a']. "%</li>
    	<li>Vitamin C: " .$row['vitamin_c']. "%</li>
    	<li>Calcium: " .$row['calcium']. "%</li>
    	<li>Iron: " .$row['iron']. "%</li>";
    }
}
?>