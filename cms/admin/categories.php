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
            <form action="">

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

          <?php
            $query = "SELECT * FROM categories;";
            $select_categories = mysqli_query($connection, $query);                  
          ?>

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
              while ($row = mysqli_fetch_assoc($select_categories)) { ?>
                  <tr>
                    <td><?= $row['cat_id'] ?></td>
                    <td><?= $row['cat_title'] ?></td>
                  </tr>
                <?php 
              } ?>
              </tbody>

            </table>

          </div><!-- END RIGHT -->

        </div><!-- col-lg-12 -->

      </div><!-- /.row -->
    
    </div><!-- /.container-fluid -->
  
  </div><!-- /#page-wrapper -->

<?php require('includes/admin_footer.php'); ?>