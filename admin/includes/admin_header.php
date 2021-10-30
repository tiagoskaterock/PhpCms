<?php include('../includes/rotas.php') ?>

<?php require_once('../includes/db.php'); ?>

<?php require_once('functions.php'); ?>

<?php ob_start(); ?>

<?php
  if(!isset($_SESSION)) 
  { 
      session_start(); 
  } 
  
  // not admin go back to blog
  /*
  if ($_SESSION['user_role'] != "admin") {
    header("Location: ../");
  }
  */
  
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Bootstrap Admin Template</title>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  

  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="css/sb-admin.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>


  <![endif]-->

  <script src="https://www.gstatic.com/charts/loader.js"></script>

  <link rel="stylesheet" type="text/css" href="../css/loader.css">

  

  
 

</head>

<body>




<?php 

if ($_SESSION['user_role'] != 'admin') {
  ?>
  <script>
    window.location.href = '..';
  </script>
  <?php
}

?>