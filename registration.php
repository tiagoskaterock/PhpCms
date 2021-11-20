<?php define('TITLE', 'Registration') ?>

<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>

<?php

$message = '';
$minino_caracteres_username = 4;
$minino_caracteres_password = 5;

if (isset($_POST['username'])) {

  // tirando espaços em branco no começo e final dos campos
  $username = trim($_POST['username']);
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);

  // evitando ataques sql injection
  $username = mysqli_real_escape_string($connection, $username);
  $email = mysqli_real_escape_string($connection, $email);
  $password = mysqli_real_escape_string($connection, $password);   

  // mostrando erros
  $error = [
    'username' => '',
    'email' => '',
    'password' => '',
  ];

  // username vazio
  if ($username == '') {
    $message = "Username can't be empty";
  }
  // username menor que 4
  else if (strlen($username) < $minino_caracteres_username) {
    $message = 'Username needs to have a least ' . $minino_caracteres_username . ' characters';
  }
  
  // if name already exists kills the script
  else if (username_exists($username)) {
    $message = 'User already exists';
  }

  // if useremail already exists kills the script
  else if (useremail_exists($email)) {
    $message = 'This email is already beeing used, you can log in here <a href="index">Login</a>';
  }

  // empty fields kill the script
  else if (empty($username) && empty($email) && empty($password)) {
    $message = 'Fields cannot be empty';
  } 
  else if(empty($username) && empty($email)) {
    $message = 'Fields cannot be empty';
  }
  else if (empty($email) && empty($password)) {
    $message = 'Fields cannot be empty';
  }
  else if (empty($username) && empty($password)) {
    $message = 'Fields cannot be empty';
  }
  else if (empty($username)) {
    $message = 'Username cannot be empty';
  }
  else if (empty($email)) {
    $message = 'Email cannot be empty';
  }
  else if (empty($password)) {
    $message = 'Password cannot be empty';
  }
  else if (strlen($password) <  $minino_caracteres_password) {
    $message = 'Password needs to have a least ' . $minino_caracteres_password . ' characters';
  }

  // if all goes right, save new user
  else {



  // NICE HASH SYSTEM TO SECURITY HERE
      $password = password_hash($password, PASSWORD_DEFAULT);  
  //


      $query = "SELECT rand_salt FROM users";
      $select_randsalt_query = mysqli_query($connection, $query);

      if (!$select_randsalt_query) {
        die("Query failed: " . mysqli_error($connection));
      }

      $row = mysqli_fetch_array($select_randsalt_query);

      $salt = $row['rand_salt'];

      $query = "INSERT INTO `users` 
      (`user_id`, `user_name`, `user_email`, `user_password`) 
      VALUES 
      (NULL, '$username', '$email', '$password');";

      $register_user_query = mysqli_query($connection, $query);

      if (!$register_user_query) {
        die("QUERY FAILED: " . mysqli_error($connection));
      }
      else {
        ?>
        <div style="text-align: center;">                
          <h3 class="bg-success text-center" style="width: 500px; margin: 0 auto; padding: 5px; margin-bottom: 20px; border-radius: 5px;">Registro criado com sucesso</h3>
        </div>

        <div style="text-align: center;">
          <button style="text-align: center;" type="button" class="btn btn-success" style="margin: 0 auto">
            <a href="index" style="text-decoration: none; color: white;">Entrar no CMS</a>
          </button>
        </div>
        <?php
      }

    } 

  }

  ?>


  <!-- Navigation -->
  
  <?php  include "includes/navigation.php"; ?>
  
  
  <!-- Page Content -->
  <div class="container">
    
    <section id="login">
      <div class="container">
        <div class="row">
          <div class="col-xs-6 col-xs-offset-3">
            <div class="form-wrap">
              <h1 class="text-center">Register</h1>
              <form role="form" action="registration" method="post" id="login-form" autocomplete="off">

                <h4 class="text-center bg-warning"><?= $message ?></h4>

                <div class="form-group">
                  <label for="username" class="sr-only">username</label>
                  <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username" required>
                </div>
                <div class="form-group">
                  <label for="email" class="sr-only">Email</label>
                  <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" required>
                </div>
                <div class="form-group">
                  <label for="password" class="sr-only">Password</label>
                  <input type="password" name="password" id="key" class="form-control" placeholder="Password" required>
                </div>
                
                <input type="submit" name="submit" id="btn-login" class="btn btn-primary btn-md btn-block" value="Register">
              </form>
              
            </div>
          </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
      </div> <!-- /.container -->
    </section>


    <hr>



    <?php include "includes/footer.php";?>
