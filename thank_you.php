<html>
<head>
<?php 
// PATH: Applications/MAMP/htdocs
require ("/Applications/MAMP/htdocs/functions/main_functions.php");
require ("/Applications/MAMP/htdocs/functions/add_user_functions.php");
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
	
$error_messages = array();

array_push($error_messages, passwords_match($password1, $password2));
array_push($error_messages, required_fields_are_present($username, $email, $password1, $birthday));

if (empty($error_messages)) {
		add_user($username, $email, $password1, $birthday, $gender, $location);
		echo "Thanks " . $username . ", you have successfully signed up!";
} else {
	foreach ($error_messages as $error_message) {
		echo $error_message . "</br><a href='signup.php'>Try again..</a>";
	}
}

?>
</body>
<?php #disconnect();
 ?>
</html>