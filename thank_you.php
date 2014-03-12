<html>
<head>
<?php 
// PATH: Applications/MAMP/htdocs/Chef-Wow
require ("/Applications/MAMP/htdocs/Chef-Wow/functions/main_functions.php");
require ("/Applications/MAMP/htdocs/Chef-Wow/functions/add_user_functions.php");
connect();
?>
	<title>Thank you!</title>
</head>
<body>
	
<?php

 $username = $_POST['username'];
 $email = $_POST['email'];
 $password1 = $_POST['password1'];
 $password2 = $_POST['password2'];
 $birthday = $_POST['birthday'];
 $gender = $_POST['gender'];
 $location = $_POST['location'];
	
$password_check = passwords_match($password1, $password2);
$required_field_check = required_fields_are_present($username, $email, $password1, $birthday);
$email_check = email_check($email);
$birthday_check = birthday_check($birthday);

if ($password_check != "" || $required_field_check != "" || $email_check != "" || $birthday_check != "") {
	$error_messages = array();
	array_push($error_messages, $password_check);
	array_push($error_messages, $required_field_check);
	array_push ($error_messages, $email_check);
	array_push ($error_messages, $birthday_check);
}


if (empty($error_messages)) {
		add_user($username, $email, $password1, $birthday, $gender, $location);
		echo "Thanks " . $username . ", you have successfully signed up!";
} else {
	foreach ($error_messages as $error_message) {
		echo $error_message;
	}
	echo "</br><a href='signup.php'>Try again</a>";
}

?>
</body>
<?php #disconnect();
 ?>
</html>