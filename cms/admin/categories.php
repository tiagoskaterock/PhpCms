<?php require('includes/admin_header.php'); ?>

<div id="wrapper">

  <?php require('includes/admin_navigation.php'); ?>

  <div id="page-wrapper">

    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">
            Welcome to Admin
            <small>Author</small>
          </h1>

          <!-- LEFT -->
          <div class="col-xs-6">

            <?php

              if (isset($_POST['submit'])) {

                $cat_title = $_POST['cat_title'];

                if ($cat_title == "" || empty($cat_title)) {
                  echo '<h3>This field should not be empty</h3>';
                }

                else{
                  $query = "INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES (NULL, '{$cat_title}'); ";

                  $create_category_query = mysqli_query($connection, $query);

                  if (!$create_category_query) {
                    die('QUERY FAILED' . mysqli_error($connection));
                  }
                }
              }

            ?>

            <form action="" method="post">

              <label for="cat_title">Add Category</label>
              <div class="form-group">
                <input type="text" name="cat_title">
              </div>

              <div class="form-group">
                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
              </div>
            </form>
          </div>
          <!-- END LEFT -->



          <!-- RIGHT -->
          <div class="col-xs-6">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Category Title</th>
                </tr>
              </thead>

              <tbody>              
                <?php 
                  // FIND ALL CATEGORIES 
                  $query = "SELECT * FROM categories;";
                  $select_categories = mysqli_query($connection, $query);   

                  while ($row = mysqli_fetch_assoc($select_categories)) { ?>
                    <tr>
                      <!-- ID -->
                      <td><?= $row['cat_id'] ?></td>

                      <!-- Categoria -->
                      <td><?= $row['cat_title'] ?></td>                    

                      <!-- Botão delete -->
                      <td>
                        <a href="categories.php?delete=<?= $row['cat_id'] ?>">
                        Delete
                        </a>
                      </td> 

                    </tr>
                    <?php 
                  }                   
                ?>




                  <?php
                    // DELETE QUERY
                    if (isset($_GET['delete'])) {

                      $the_cat_id = $_GET['delete'];

                      $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";

                      $delete_query = mysqli_query($connection, $query);

                      // REFRESH
                      header("Location: categories.php");
                    }
                    
                  ?>



              </tbody>

            </table>

          </div><!-- END RIGHT -->

        </div><!-- col-lg-12 -->

      </div><!-- /.row -->
    
    </div><!-- /.container-fluid -->
  
  </div><!-- /#page-wrapper -->

<?php require('includes/admin_footer.php'); ?>