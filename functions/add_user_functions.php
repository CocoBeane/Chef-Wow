<?php

function passwords_match ($password1, $password2) {
	if ($password1 != $password2){
		echo "password miss match.";
		return "Your passwords did not match!";
	}
}

function required_fields_are_present ($username, $email, $password1, $birthday) {
	if (empty($username)){
		return "A username is required.</br>";
	}	
	
	if (empty($email)){
		return "An email address is required.</br>";
	}	
	
	if (empty($password1)){
		return "A password is required.</br>";
	}	
	
	if (empty($birthday)){
		return "A birthday is required.</br>";
	}	 
}

function email_check ($email) {
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
		return "A valid email address is required. <br>";
	}
}	

function birthday_check ($birthday) {
	if (substr_count($birthday, "/") == 2) {
		$date = explode ("/", $birthday);
		list($month, $day, $year) = $date;
	} else {
		return "Please make sure your birthday is in the correct format (MM/DD/YYYY).<br>";
	}

	if (!is_numeric($month) && 
		!is_numeric($day) && 
		!is_numeric($year) &&
		strlen($year) != 4) {
			return "A valid birthday is required<br>";			
	}
	
	if (checkdate($month, $day, $year) != true) {
		return "A valid birthday is required<br>";
	}			
}





?>