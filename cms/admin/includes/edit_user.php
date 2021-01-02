<?php

	if (isset($_GET['user_id'])) {

		$user_id = $_GET['user_id'];

		$query = "SELECT * FROM users WHERE user_id = $user_id;";

		$select_user = mysqli_query($connection, $query);  

		confirm_query($select_user); 

		while ($row = mysqli_fetch_assoc($select_user)) {
			$name = $row['user_name'];
			$password = $row['user_password'];
			$email = $row['user_email'];
			$first = $row['first_name'];
			$last = $row['last_name'];
			$role = $row['user_role'];	
		}		
		
	}
	
	if (isset($_POST['update_user'])) {

		$user_name = $_POST['user_name'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$user_email = $_POST['user_email'];
		$user_role = $_POST['user_role'];
		$user_password = $_POST['user_password'];
				
		$query = "UPDATE `users` SET `user_name` = '{$user_name}', `user_password` = '{$user_password}', `first_name` = '{$first_name}', `last_name` = '{$last_name}', `user_email` = '{$user_email}', `user_role` = '{$user_role}' WHERE `users`.`user_id` = $user_id; ";

		$update_user_query = mysqli_query($connection, $query);

		confirm_query($update_user_query);

		header("Location: users.php");	

	}

?>

<h2>Edit User</h2>

<form action="" method="post" enctype="multipart/form-data">
	
	<!-- Name -->
	<div class="form-group">
		<label for="user_name">User Name</label>
		<input type="text" class="form-control" name="user_name" required id="user_name" value="<?= $name ?>">
	</div>

	<!-- First Name -->
	<div class="form-group">
		<label for="first_name">First Name</label>
		<input type="text" class="form-control" name="first_name" required id="first_name" value="<?= $first ?>">
	</div>

	<!-- Last Name -->
	<div class="form-group">
		<label for="last_name">Last Name</label>
		<input type="text" class="form-control" name="last_name" required id="last_name" value="<?= $last ?>">
	</div>

	<!-- Email -->
	<div class="form-group">
		<label for="user_email">Email</label>
		<input type="email" class="form-control" name="user_email" required id="email" value="<?= $email ?>">
	</div>

	<!-- Role -->
	<div class="form-group">

		<label for="user_role">Role</label><br>

		<select name="user_role" id="user_role" class="form-control">

			<?php

				$query = "SELECT * FROM users";

	      $select_user = mysqli_query($connection, $query); 

	      confirm_query($select_user);

	    ?>

	    <!-- admin -->
	    <option 
	    	<?php
	    		if ($role == "admin") {
	    			echo "selected";
	    		}
	    	?>
	    value="admin">Admin</option>	

	    <!-- subscriber -->
	    <option 
	    	<?php
	    		if ($role == "subscriber") {
	    			echo "selected";
	    		}
	    	?>
	    value="subscriber">Subscriber</option>	        

		</select>

	</div>

	<!-- Password -->
	<div class="form-group">
		<label for="user_password">Password</label>
		<input type="password" class="form-control" name="user_password" required id="user_password" value="<?= $password ?>">
	</div>

	<!-- Submit -->
	<div class="form-group">		
		<input type="submit" name="update_user" value="Update User" class="btn btn-primary">
	</div>

</form>