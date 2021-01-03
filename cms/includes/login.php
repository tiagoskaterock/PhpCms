<?php require('db.php') ?>

<?php session_start() ?>

<?php 

	if (isset($_POST['login'])) {
		$pass = $_POST['password'];
		$user = $_POST['user_name'];

		$username = mysqli_real_escape_string($connection, $user);
		$password = mysqli_real_escape_string($connection, $pass);

		$query = "SELECT * FROM users 
							WHERE user_name = '{$username}'
							AND user_password = '{$password}'";

		$select_user_query = mysqli_query($connection, $query);  

		if (!$select_user_query) {
			die('ERROR: ' . mysqli_error($connection));
		}

		while ($row = mysqli_fetch_assoc($select_user_query)) {
			$user_id = $row['user_id'];
			$db_user_name = $row['user_name'];
			$db_user_password = $row['user_password'];
			$db_first_name = $row['first_name'];
			$db_last_name = $row['last_name'];
			$user_email = $row['user_email'];
			$user_image = $row['user_image'];
			$db_user_role = $row['user_role'];
			$rand_salt = $row['user_id'];
		}

		// wrong username OR wrong password do not login
		if ($username !== $db_user_name || $password !== $db_user_password) {
			header("Location: ../index.php");
		}
		// right username AND right password do login
		else if ($username === $db_user_name && $password === $db_user_password) {
			$_SESSION['username'] = $db_user_name;
			$_SESSION['first_name'] = $db_first_name;
			$_SESSION['last_name'] = $db_last_name;
			$_SESSION['password'] = $db_user_password;
			$_SESSION['user_role'] = $db_user_role;		

			header("Location: ../admin");
				
		}

	}

?>