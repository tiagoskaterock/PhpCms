<?php require('db.php') ?>

<?php session_start() ?>

<?php 

	
	if (isset($_POST['login'])) {
		$pass = $_POST['password'];
		$user = $_POST['user_name'];

		$username = mysqli_real_escape_string($connection, $user);
		$password = mysqli_real_escape_string($connection, $pass);

		$query = "SELECT * FROM users 
							WHERE user_name = '{$username}' /*
							AND user_password = '{$password}'*/";

		$select_user_query = mysqli_query($connection, $query);  

		if (!$select_user_query) {
			// die('ERROR: ' . mysqli_error($connection));
		}

		while ($row = mysqli_fetch_assoc($select_user_query)) {
			$db_user_id = $row['user_id'];
			$db_user_name = $row['user_name'];
			$db_user_password = $row['user_password'];
			$db_first_name = $row['first_name'];
			$db_last_name = $row['last_name'];
			$db_user_email = $row['user_email'];
			$user_image = $row['user_image'];
			$db_user_role = $row['user_role'];
			$rand_salt = $row['user_id'];
		}

		// echo $db_user_password;

		// boolean                       // senha      // hash
		$senha_certa = password_verify($password, $db_user_password);

		// echo "<br>";

		// echo $senha_certa;

		?>
		<script type="text/javascript">
			// var senha_certa = '<?php echo $senha_certa ?>';
			// alert(senha_certa);
		</script>
		<?php

		// wrong username OR wrong password do not login
		
		if ($username !== $db_user_name) {
			?>
			<script type="text/javascript">
				alert("Usuário não cadastrado");
				window.location.href = "../index.php";
			</script>
			<?php
			//header("Location: ../index.php");
		}
		else if (!$senha_certa) {
			/*
			echo "senha_certa: $senha_certa";
			echo "<br>";
			echo "senha: $password";
			echo "<br>";
			echo "db_user_password: $db_user_password";
			echo "<br>";
			echo "senha_digitada_em_hash_1: $senha_digitada_em_hash_1";
			echo "<br>";
			echo "senha_digitada_em_hash_2: $senha_digitada_em_hash_2";
			echo "<br>";

			$hash_1_senha_combinam = password_verify($password, $senha_digitada_em_hash_1);


			if ($hash_1_senha_combinam) {
				echo 'combina essa porra';
			}
			else {
				echo 'deu merda essa bosta';
			}
			*/

			?>
			<script type="text/javascript">
				alert("Senha incorreta");
				window.location.href = "../index.php";
			</script>
			<?php
			
		}
		// right username AND right password do login
		else if ($username === $db_user_name && $senha_certa && $db_user_role == 'admin') {

			$_SESSION['user_id'] = $db_user_id;
			$_SESSION['username'] = $db_user_name;
			$_SESSION['first_name'] = $db_first_name;
			$_SESSION['last_name'] = $db_last_name;
			$_SESSION['password'] = $db_user_password;
			$_SESSION['user_role'] = $db_user_role;		
			$_SESSION['user_email'] = $db_user_email;		
			$_SESSION['user_role'] = $db_user_role;		
			$_SESSION['user_password'] = $db_user_password;	
			/*	
			echo 'tudo certo';
			echo '<pre>';
			print_r($_SESSION);
			echo '</pre>';
			*/
			?>
			<script>
				alert('logged in as admin');
				window.location.href = '../admin';
			</script>
			<?php
				
		}
		else if ($username === $db_user_name && $senha_certa && $db_user_role != 'admin'){
			?>
			<script>
				alert('logged in as user');
				window.location.href = '..';
			</script>
			<?php
		}

	}

?>