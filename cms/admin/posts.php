<?php require('includes/admin_header.php'); ?>

<div id="wrapper">

  <?php require('includes/admin_navigation.php'); ?>

  <div id="page-wrapper">

    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="row">

        <div class="col-lg-12">
      
        	<h1>Posts</h1>

          <?php 

            $source;

            if (isset($_GET['source'])) {
              $source = $_GET['source'];
            }
            else{
              $source = "";
            }

            switch ($source) {
              case '43':
                echo 'NICE 43';
                break;
              
              default:
                include('includes/view_all_posts.php');
                break;
            }








          ?>






        </div><!-- col-lg-12 -->

      </div><!-- /.row -->
    
    </div><!-- /.container-fluid -->
  
  </div><!-- /#page-wrapper -->

<?php require('includes/admin_footer.php'); ?>