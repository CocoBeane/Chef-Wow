<?php 

//check if recipe is in book already
function is_recipe_active_in_book($id){

	//set variables for use later
	$username = $_SESSION['username'];
	$recipe_id = $id;

	//get user id from users table
	$user_id = find_user_id($username);

	//check database for a match of both, and return true or false
	$find_match = mysqli_query(connect(), "SELECT * FROM users_recipes WHERE recipe_id = '$recipe_id' && user_id = '$user_id' && status ='active'");

	if (mysqli_num_rows($find_match) >= 1){
		return true;
	} else {
		return false;
	}
}

function is_recipe_inactive_for_user($recipe_id, $user_id){

	//check database for a match of both with inactive status, and return true or false
	$find_match = mysqli_query(connect(), "SELECT * FROM users_recipes WHERE recipe_id = '$recipe_id' && user_id = '$user_id' && status ='inactive'");

	if (mysqli_num_rows($find_match) >= 1){
		return true;
	} else {
		return false;
	}
}

//display recipes on myBook page
function display_my_recipe_book(){

	//get user id from users table
	$username = $_SESSION['username'];
	$user_id = find_user_id($username);

	//connect and pull all saved recipe ids for user, match up with recipe info from recipe table
	$my_book_contents = mysqli_query(connect(),
	"SELECT recipes.id, recipes.name, recipes.image_url
	FROM recipes, users_recipes
	WHERE recipes.id = users_recipes.recipe_id
	AND users_recipes.user_id = '$user_id' && users_recipes.status = 'active'");

	//iterate over/display each with a link to the recipe page and option to delete
	if (mysqli_num_rows($my_book_contents) == false){
		echo "You should add some recipes to your book!<br><a href='/recipes.php'>Browse Recipes</a>";
	} else {
		while ($row = mysqli_fetch_assoc($my_book_contents)) {
			echo 
			"<li style='display: inline-block; vertical-align: top;' id='".$row['id']."'>
				<a href='/Chef-Wow/show_recipe.php?id=" .$row['id']. "'> " .$row['name']. "
				<br>
				<img src='" .$row['image_url']. "' style='width:200px; height:200px; padding:1px; border:2px solid grey;'>
				</a>
				<br>
				<button type=button id='delete-from-book-".$row['id']."' name='delete-from-book-".$row['id']."' class='delete-from-book' data-id='".$row['id']."'>Delete</button>
				</li>";
		}
	}	
}

//add ingredient to watched ingredients list

//display watched ingredients

?>