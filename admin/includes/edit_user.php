<?php

	function vai_pra_casa_do_admin() {
		header("Location: ../admin");
	}

	if (isset($_GET['user_id'])) {

		if ($_GET['user_id'] == '') {
			// id vazio
			vai_pra_casa_do_admin();
		}

		$user_id = $_GET['user_id'];

		$query = "SELECT * FROM users WHERE user_id = $user_id;";

		$select_user = mysqli_query($connection, $query);

		confirm_query($select_user); 

		if (mysqli_num_rows($select_user) < 1) {
			// id inexistente na base de dados
			vai_pra_casa_do_admin();
		}

		while ($row = mysqli_fetch_assoc($select_user)) {
			$name = $row['user_name'];
			$password = $row['user_password'];
			$email = $row['user_email'];
			$first = $row['first_name'];
			$last = $row['last_name'];
			//$role = $row['user_role'];	
		}
		
	}
	else {
		// sem get id
		vai_pra_casa_do_admin();
	}
	
	if (isset($_POST['update_user'])) {

		$user_name = $_POST['user_name'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$user_email = $_POST['user_email'];
		//$user_role = $_POST['user_role'];
		$user_password = $_POST['user_password'];

		$user_password = password_hash($user_password, PASSWORD_DEFAULT);
				
		$query = "UPDATE `users` SET `user_name` = '{$user_name}', `user_password` = '{$user_password}', `first_name` = '{$first_name}', `last_name` = '{$last_name}', `user_email` = '{$user_email}' /*`user_role` = '{$user_role}'*/ WHERE `users`.`user_id` = $user_id; ";

		$update_user_query = mysqli_query($connection, $query);

		confirm_query($update_user_query);

		header("Location: users");	

	}

?>

<h2>Editar Usuário</h2>

<form action="" method="post" enctype="multipart/form-data">
	
	<!-- Name -->
	<div class="form-group">
		<label for="user_name">Usuário</label>
		<input type="text" class="form-control" name="user_name" required id="user_name" value="<?= $name ?>">
	</div>

	<!-- First Name -->
	<div class="form-group">
		<label for="first_name">Primeiro Nome</label>
		<input type="text" class="form-control" name="first_name" required id="first_name" value="<?= $first ?>">
	</div>

	<!-- Last Name -->
	<div class="form-group">
		<label for="last_name">Sobrenome</label>
		<input type="text" class="form-control" name="last_name" required id="last_name" value="<?= $last ?>">
	</div>

	<!-- Email -->
	<div class="form-group">
		<label for="user_email">Email</label>
		<input type="email" class="form-control" name="user_email" required id="email" value="<?= $email ?>">
	</div>

	<!--
	<div class="form-group">

		<label for="user_role">Papel</label><br>

		<select name="user_role" id="user_role" class="form-control">

			<?php

				$query = "SELECT * FROM users";

	      $select_user = mysqli_query($connection, $query); 

	      confirm_query($select_user);

	    ?>

	    <option 
	    	<?php
	    		if ($role == "admin") {
	    			echo "selected";
	    		}
	    	?>
	    value="admin">Administrador</option>	

	    <option 
	    	<?php
	    		if ($role == "subscriber") {
	    			echo "selected";
	    		}
	    	?>
	    value="subscriber">Inscrito</option>	        

		</select>

	</div>
	-->

	<!-- Password -->
	<div class="form-group">
		<label for="user_password">Senha</label>
		<input type="password" class="form-control" name="user_password" required id="user_password" value="" autocomplete="off">
	</div>

	<!-- Submit -->
	<div class="form-group">		
		<input type="submit" name="update_user" value="Update User" class="btn btn-primary">
	</div>

</form>