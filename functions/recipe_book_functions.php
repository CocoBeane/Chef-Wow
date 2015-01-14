<?php 

//find user id based on session username
function find_user_id($username){
	//connect to db
	$connection = mysqli_connect("localhost","root","root","chef_wow");

	$find_user_id_query = mysqli_query($connection,
		"SELECT id FROM users WHERE username = '$username'");

	$row = mysqli_fetch_assoc($find_user_id_query); 
	return $row['id'];
}

//add current recipe to book
function add_recipe_to_book(){
	//connect to db
	$connection = mysqli_connect("localhost","root","root","chef_wow");

	//set variables for use later
	$username = $_POST['username'];
	$recipe_id = $_POST['recipe_id'];

	//get user id from users table
	$user_id = find_user_id($username);

	//$connect and insert this info to db
	$recipe_added_to_book = mysqli_query($connection, "INSERT INTO users_recipes (user_id, recipe_id) VALUES ('$user_id', '$recipe_id')");

	return $recipe_added_to_book;
}

//display recipes on myBook page
function display_my_recipe_book(){

	//connect to db
	$connection = mysqli_connect("localhost","root","root","chef_wow");

	//get user id from users table
	$username = $_SESSION['username'];
	$user_id = find_user_id($username);

	//connect and pull all saved recipe ids for user, match up with recipe info from recipe table

	$my_book_contents = mysqli_query(connect(),
	"SELECT recipes.id, recipes.name, recipes.image_url
	FROM recipes, users_recipes
	WHERE recipes.id = users_recipes.recipe_id
	AND users_recipes.user_id = '$user_id';");

	//iterate over/display each with a link to the recipe page

	if (mysqli_num_rows($my_book_contents) == false){
		echo "You should add some recipes to your book!<br><a href='/recipes.php'>Browse Recipes</a>";
	} else {
		while ($row = mysqli_fetch_assoc($my_book_contents)) {
			echo 
			"<li style='display: inline-block; vertical-align: top;'>
				<a href='/Chef-Wow/show_recipe.php?id=" .$row['id']. "'> " .$row['name']. " 
				<br> 
				<img src='" .$row['image_url']. "' style='width:200px; height:200px; padding:1px; border:2px solid grey;'>
				</a>
				</li>";
		}
	}	
}

//add ingredient to watched ingredients list

//display watched ingredients

//decide which functions to execute for ajax call/add to book button on recipe page
if (isset($_POST['username']) && isset($_POST['recipe_id']))
     add_recipe_to_book();

?>