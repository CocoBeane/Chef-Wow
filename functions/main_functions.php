<?php 

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
	//$i = 0
	//	while ($i < count($values)){
	//		foreach ($nutritional_values as $value) {
	//			$string = $string + $value;
	//			$string = $string + ", "};
	//			$i++;
	//		}
	//	}
	);

	//return ID for entry that was just created and save it as a variable for the ingredients table
	$id = mysqli_insert_id($connection);
	return $id;
}

function add_ingredient($main_values, $new_nutrition_id) {
	//connect
	$result = mysqli_query(connect(),

	//insert values into database
		"INSERT INTO ingredients (name, image_url, nutrition_id) VALUES ('$main_values[0]', '$main_values[1]', '$new_nutrition_id')");
}


function add_user($username, $email, $password1, $birthday, $gender, $location) {

	//$connect = mysqli_connect("localhost","root","root","chef_wow");
	$result = mysqli_query(connect(), "INSERT INTO users (username, email, password, birthday, gender, location) 
	VALUES('$username', '$email', '$password1', '$birthday', '$gender', '$location')");

	if ($result == false) {
		print_r (mysqli_error_list($connect));
	}
}

function connect() {
	// Create connection
	$connection = mysqli_connect("localhost","root","root","chef_wow");

	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	} else
		return $connection;
}

function disconnect() {
	mysqli_close();
}

function valid_user($username, $password){
	$connect = mysqli_connect("localhost","root","root","chef_wow");
	$results = mysqli_query($connect, "SELECT * FROM users WHERE `username` = '$username' && `password` = '$password'");

	return mysqli_num_rows($results) >= 1 ? true : false;
}

?>