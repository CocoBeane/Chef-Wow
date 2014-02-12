<?php

function connect() {
	// Create connection
	$connect = mysqli_connect("localhost","root","root","chef_wow");

	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
}

function add_user($username, $email, $password1, $birthday, $gender, $location) {
	mysqli_query("INSERT INTO `chef_wow`.`users` (`username`, `email`, `password`, `birthday`, `gender`, `location`)
	VALUES 
	($username, $email, $password1, $birthday, $gender, $location)");
}

function disconnect() {
	mysqli_close();
}

?>