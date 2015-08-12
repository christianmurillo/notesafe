<?php

	session_start();

	
	include("connection.php");

	if($_POST['submit'] == "Sign Up"){

		if(!$_POST['email']) $error .= "<br>Please enter your email.";
		elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    		$error .= "<br>Please enter a valid email address.";
		}
		if(!$_POST['password']){
			$error .= "<br>Please enter a password.";
		}
		else{
			if(strlen($_POST['password']) < 8)
				$error .= "<br>Enter a password with at least 8 characters.";
			if(!preg_match('`[A-Z]`', $_POST['password']))
				$error .= "<br>Password must have at least one capital letter.";
			/*** Check for matching passwords  ***/
			if(strcmp($_POST['password'], $_POST['confirm_password']) != 0) {
				$error .= "<br>Passwords do not match.";
			}
		}
		if($error) $error = "There are error(s) in your submission:".$error;
		else{ #insert into db, but need to check if another user has same email

			$query = "SELECT * FROM `users` WHERE email='".mysqli_real_escape_string($link, $_POST['email'])."'";

			$result = mysqli_query($link, $query);

			$results = mysqli_num_rows($result);

			# echo $results;

			if($results) $error = "That email address already exists in database. Try a different email.";
			else{ # now insert into db

				$query = "INSERT INTO `users` (`name`,`email`, `password`) VALUES ('".mysqli_real_escape_string($link, $_POST['name'])."', '".mysqli_real_escape_string($link, $_POST['email'])."', '".md5(md5($_POST['email']).$_POST['password'])."')";

				mysqli_query($link, $query);

				# echo "Success!";

				 # creates a session variable for the most recently added id
				$_SESSION['id'] = mysqli_insert_id($link);

				# print_r($_SESSION);

				//redirect to logged in page
				header("Location:main.php");
			}
		}

	}

	if($_POST['submit'] == "Log In"){

		$query = "SELECT * FROM `users` WHERE email='".mysqli_real_escape_string($link, $_POST['loginemail'])."' AND password='".md5(md5($_POST['loginemail']).$_POST['loginpassword'])."'";

		$result = mysqli_query($link, $query);

		# $results = mysqli_num_rows($result); //should only be 1

		$row = mysqli_fetch_array($result);

		if($row){
			# echo "You are logged in!<br>";

			$_SESSION['id'] = $row['id'];

			#print_r($_SESSION);

			//redirect to logged in page
			header("Location:main.php");
		}
		else
			$error = "You entered incorrect credentials or you are not registered.";

	}

?>
