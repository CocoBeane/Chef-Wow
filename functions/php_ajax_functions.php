<?php
require ("/Applications/MAMP/htdocs/Chef-Wow/functions/main_functions.php");
require ("/Applications/MAMP/htdocs/Chef-Wow/functions/recipe_book_functions.php");

//add current recipe to book
function add_recipe_to_book(){

	//set variables for use later.
	$username = $_POST['username'];
	$recipe_id = $_POST['recipe_id'];

	//get user id from users table
	$user_id = find_user_id($username);

	//$connect and insert this info to db
	if (is_recipe_inactive_for_user($recipe_id, $user_id) == true){
		$reactivate_recipe = mysqli_query(connect(), "UPDATE users_recipes SET status='active' WHERE user_id = '$user_id' && recipe_id = '$recipe_id'");

	} else {
		$recipe_added_to_book = mysqli_query(connect(), "INSERT INTO users_recipes (user_id, recipe_id, status) VALUES ('$user_id', '$recipe_id', 'active')");

		return $recipe_added_to_book;
	}
}

//delete selected recipe
function delete_recipe_from_book(){

	//set variables for use later
	$username = $_POST['username'];
	$recipe_id = $_POST['recipe_id_to_delete'];

	//get user id from users table
	$user_id = find_user_id($username);

	//$connect and insert this info to db
	$delete_from_book = mysqli_query(connect(), "UPDATE users_recipes SET status='inactive' WHERE user_id = '$user_id' && recipe_id = '$recipe_id'");

	return $delete_from_book;
}

//decide which functions to execute for ajax calls
if (isset($_POST['username']) && isset($_POST['recipe_id']))
     add_recipe_to_book();

if (isset($_POST['username']) && isset($_POST['recipe_id_to_delete']))
     delete_recipe_from_book();

?>