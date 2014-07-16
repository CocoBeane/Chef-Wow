<?php require ("/Applications/MAMP/htdocs/Chef-Wow/header.php");?>

<div id="content">
<?php
if (!empty($_POST)){
	$main_values = array($_POST['name'], $_POST['image_url']);
	$nutrition_values = array($_POST['serving_size'], $_POST['calories'], $_POST['fat'], $_POST['cholesterol'], $_POST['sodium'],
	$_POST['carbs'], $_POST['fiber'], $_POST['sugar'], $_POST['protein'], $_POST['vitamin_a'], $_POST['vitamin_c'], $_POST['calcium'], $_POST['iron']);

		$error = false;
		foreach($_POST as $field) {
		  if (empty($field)) {
		    $error = true;
		 }
	}
}

if (!empty($_POST) && $error == true) {
  	echo "<p style='color:red'>Please fill in every field.</p>";
} elseif (!empty($_POST) && !is_numeric($_POST) && $error == false) {
	$new_nutrition_id = add_nutrition_facts($nutrition_values);
	add_ingredient($main_values, $new_nutrition_id);
	echo "Ingredient has been added to the database.";
}
?>

	<h3 align="center">Create New Ingredient</h3>	
	<form id="new_item" name="new_item" action="add_new.php" method="post">
		<p>
		Ingredient Name: <input type="text" name="name" class="required"><br>
		Image URL: <input type="text" name="image_url" class="required">
		</p>
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
		<input id="button" type="submit" value="Submit" disabled="">	
	</form>
</div>
</body>
</html>