<?php require('includes/admin_header.php'); ?>

<div id="wrapper">

  <?php require('includes/admin_navigation.php'); ?>

  <div id="page-wrapper">

    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">
            Categorias
          </h1>

          <!-- LEFT -->
          <div class="col-xs-4">

            <?php insert_categories(); ?>

            <!-- ADD CATEGORY -->
            <form action="" method="post">

              <label for="cat_title">Adicionar Categoria</label>
              <div class="form-group">
                <input type="text" name="cat_title" class="form-control">
              </div>

              <div class="form-group">
                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
              </div>
            </form>
            <!-- END ADD CATEGORY -->


            <?php update_categories(); ?>
            
          </div>



          
          <!-- END LEFT -->



          <!-- RIGHT -->
          <div class="col-xs-8">
            <table class="table table-bordered table-hover text-center">
              <thead>
                <tr>
                  <th style="text-align: center !important;">Título</th>
                  <th style="text-align: center !important;" colspan="2">Ação</th>
                </tr>
              </thead>

              <tbody>              
                
                <?php find_all_categories(); ?>

                <?php delete_categories(); ?>

              </tbody>

            </table>

          </div><!-- END RIGHT -->

        </div><!-- col-lg-12 -->

      </div><!-- /.row -->
    
    </div><!-- /.container-fluid -->
  
  </div><!-- /#page-wrapper -->

<?php require('includes/admin_footer.php'); ?>