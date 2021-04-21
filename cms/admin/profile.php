<?php require('includes/admin_header.php'); ?>

<?php 
  // exibição
  if (isset($_SESSION['username'])) {
    $user_id = $_SESSION['user_id'];
  
    $query = "SELECT * FROM users WHERE user_id = '{$user_id}'";

    $select_user_profile_query = mysqli_query($connection, $query); 

    while ($row = mysqli_fetch_assoc($select_user_profile_query)) {
      $user_id = $row['user_id'];
      $user_name = $row['user_name'];
      $first_name = $row['first_name'];
      $last_name = $row['last_name'];
      $user_email = $row['user_email'];
      $user_role = $row['user_role'];
      $user_password = $row['user_password'];
    }   
  }
?>

<?php

  if (isset($_POST['update_profile'])) {
    $nome = $_POST['user_name'];
    $primeiro_nome = $_POST['first_name'];
    $ultimo_nome = $_POST['last_name'];
    $correio_eletronico = $_POST['user_email'];
    $papel_de_usuario = $_POST['user_role'];
    $senha = $_POST['user_password'];
        
    $query = "UPDATE `users` SET `user_name` = '{$nome}', `user_password` = '{$senha}', `first_name` = '{$primeiro_nome}', `last_name` = '{$ultimo_nome}', `user_email` = '{$correio_eletronico}', `user_role` = '{$papel_de_usuario}' WHERE `users`.`user_id` = $user_id; ";

    $update_user_query = mysqli_query($connection, $query);

    confirm_query($update_user_query);

    header("Location: profile.php");    

  }

?>

<div id="wrapper">

  <?php require('includes/admin_navigation.php'); ?>

  <div id="page-wrapper">

    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="row">

        <div class="col-lg-12">
      
        	<h1>Perfil</h1>

          <form action="" method="post" enctype="multipart/form-data">
  
            <!-- Name -->
            <div class="form-group">
              <label for="user_name">Usuário</label>
              <input type="text" class="form-control" name="user_name" required id="user_name" value="<?= $user_name ?>">
            </div>

            <!-- First Name -->
            <div class="form-group">
              <label for="first_name">Primeiro Nome</label>
              <input type="text" class="form-control" name="first_name" required id="first_name" value="<?= $first_name ?>">
            </div>

            <!-- Last Name -->
            <div class="form-group">
              <label for="last_name">Último Nome</label>
              <input type="text" class="form-control" name="last_name" required id="last_name" value="<?= $last_name ?>">
            </div>

            <!-- Email -->
            <div class="form-group">
              <label for="user_email">Email</label>
              <input type="email" class="form-control" name="user_email" required id="email" value="<?= $user_email ?>">
            </div>

            <!-- Role -->
            <div class="form-group">

              <label for="user_role">Papel</label><br>

              <select name="user_role" id="user_role" class="form-control">

                <?php

                  $query = "SELECT * FROM users";

                  $select_user = mysqli_query($connection, $query); 

                  confirm_query($select_user);

                ?>

                <!-- admin -->
                <option 
                  <?php
                    if ($user_role == "admin") {
                      echo "selected";
                    }
                  ?>
                value="admin">Administrador</option>  

                <!-- subscriber -->
                <option 
                  <?php
                    if ($user_role == "subscriber") {
                      echo "selected";
                    }
                  ?>
                value="subscriber">Inscrito</option>          

              </select>

            </div>

            <!-- Password -->
            <div class="form-group">
              <label for="user_password">Senha</label>
              <input type="password" class="form-control" name="user_password" required id="user_password" value="<?= $user_password ?>">
            </div>

            <!-- Submit -->
            <div class="form-group">    
              <input type="submit" name="update_profile" value="Update Profile" class="btn btn-primary">
            </div>

          </form>          

        </div><!-- col-lg-12 -->

      </div><!-- /.row -->

      <?php //show_post_buttons(); ?>
    
    </div><!-- /.container-fluid -->
  
  </div><!-- /#page-wrapper -->

<?php require('includes/admin_footer.php'); ?>