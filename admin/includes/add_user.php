<?php

	if (isset($_POST['create_user'])) {
		
		$user_name = $_POST['user_name'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$user_email = $_POST['user_email'];
		$user_role = $_POST['user_role'];
		$user_password = $_POST['user_password'];	

		//    hash                        // senha 
		$user_password = password_hash($user_password, PASSWORD_DEFAULT);
		
		$query = "INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `first_name`, `last_name`, `user_email`, `user_image`, `user_role`) 
			VALUES (NULL, '{$user_name}', '{$user_password}', '{$first_name}', '{$last_name}', '{$user_email}', '', '{$user_role}')";

		$create_user_query = mysqli_query($connection, $query);

		confirm_query($create_user_query);

		?>
		<h4 class="bg-success">User created: <?= $user_name ?><br><a href='users'>
		View Users</a></h4>
		<?php

		//header("Location: users");

	}

?>

<h2>Criar Novo Usuário</h2>

<form action="" method="post" enctype="multipart/form-data">
	
	<!-- Name -->
	<div class="form-group">
		<label for="user_name">Usuário</label>
		<input type="text" class="form-control" name="user_name" required id="user_name">
	</div>

	<!-- First Name -->
	<div class="form-group">
		<label for="first_name">Primeiro Nome</label>
		<input type="text" class="form-control" name="first_name" required id="first_name">
	</div>

	<!-- Last Name -->
	<div class="form-group">
		<label for="last_name">Sobrenome</label>
		<input type="text" class="form-control" name="last_name" required id="last_name">
	</div>

	<!-- Email -->
	<div class="form-group">
		<label for="user_email">Email</label>
		<input type="email" class="form-control" name="user_email" required id="email">
	</div>

	<!-- Role -->
	<div class="form-group">

		<label for="user_role">Papel</label><br>

		<select name="user_role" id="user_role" class="form-control">

	    <option value="admin">Administrador</option>	

	    <option value="subscriber">Inscrito</option>	        

		</select>

	</div>

	<!-- Password -->
	<div class="form-group">
		<label for="user_password">Senha</label>
		<input type="password" class="form-control" name="user_password" required id="user_password">
	</div>

	<!-- Submit -->
	<div class="form-group">		
		<input type="submit" name="create_user" value="Create User" class="btn btn-primary">
	</div>

</form>