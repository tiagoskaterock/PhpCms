<?php require('includes/db.php'); ?>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">

    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?= index() ?>">CMS</a>
    </div>   

    <?php 
      if (isset($_GET['category'])) {
        $categoria_id = $_GET['category'];
      }    
    ?>  

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php

          $query = "SELECT * FROM categories;";
          $select_all_categories_query = mysqli_query($connection, $query);

          while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
            $the_cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
            ?>
              <li                 
                <?php 
                  // destaca categoria ativa
                  if(isset($categoria_id) && $categoria_id == $the_cat_id){
                    echo 'class="active"';
                  } ?>
              >
                <a href="category?category=<?= $the_cat_id ?>"><?php echo $row['cat_title']; ?></a>
              </li>
            <?php
          }          
        ?>

        



        <?php
          if(!isset($_SESSION)) 
          { 
              session_start(); 
          } 
          if (isset($_SESSION['username']) && $_SESSION['user_role'] == 'admin') {
            ?>
            <li>
              <a href="admin">Admin</a>
            </li>
            <?php

            if (isset($_GET['p_id'])) {
              $the_post_id = $_GET['p_id'];
            ?>
            <li>
              <a href="admin/posts?source=edit_post&p_id=<?= $the_post_id ?>">Edit Post</a>
            </li>


            


            
            <?php              
            }
                        
          }
          ?>
          <li
            <?php 
              // destaca classe se estiver em registration
              if (basename($_SERVER['PHP_SELF']) == 'registration.php') {
                echo 'class="active"';
              }
            ?>
          >
              <a href="registration">Registration</a>
          </li>
          <?php


          /*
          $query = "SELECT post_id FROM posts;";
          $select_post_id = mysqli_query($connection, $query);

          while ($row = mysqli_fetch_assoc($select_post_id)) {
            print_r($row);
          }
          */

        ?>

                
         
                     






      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container -->
</nav>