<?php 

function connect() {
	// Create connection
	$connection = mysqli_connect("localhost","root","root","chef_wow");

	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	} else
		return $connection;
}

function add_user($username, $email, $password1, $birthday, $gender, $location) {

	//$connect = mysqli_connect("localhost","root","root","chef_wow");
	$result = mysqli_query(connect(), "INSERT INTO users (username, email, password, birthday, gender, location) 
	VALUES('$username', '$email', '$password1', '$birthday', '$gender', '$location')");

	if ($result == false) {
		print_r (mysqli_error_list($connect));
	}
}

function valid_user($username, $password){
	$connect = mysqli_connect("localhost","root","root","chef_wow");
	$results = mysqli_query($connect, "SELECT * FROM users WHERE `username` = '$username' && `password` = '$password'");

	return mysqli_num_rows($results) >= 1 ? true : false;
}

function disconnect() {
	mysqli_close();
}

?>