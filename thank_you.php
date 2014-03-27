<html>
	<head>
	<title>Thank you!</title>
	<?php 
		require ("/Applications/MAMP/htdocs/Chef-Wow/functions/main_functions.php");
		require ("/Applications/MAMP/htdocs/Chef-Wow/functions/add_user_functions.php");
		require ("/Applications/MAMP/htdocs/Chef-Wow/header.php");
		connect();
	?>
	<link rel="stylesheet" type="text/css" href="css/page_style.css">
	<link rel="stylesheet" type="text/css" href="css/header_style.css">
	</head>

	<body>
		<div id="container">
			<div id="content">
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
					echo "<h2>Thanks " . $username . ", you have successfully signed up!</h2>";
				} else {
					foreach ($error_messages as $error_message) {
					echo $error_message;
				}
					echo "</br><a href='signup.php'>Try again</a>";
				}
			?>
			</div>
		</div>
	</body>

<?php #disconnect(); ?>
</html>