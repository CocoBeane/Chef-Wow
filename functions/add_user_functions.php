<?php

function passwords_match ($password1, $password2) {
	if ($password1 != $password2)
		return "Your passwords did not match!";
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
		return "A password is required.</br>";
	}	 
}

?>