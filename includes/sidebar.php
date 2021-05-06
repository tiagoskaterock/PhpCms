<div class="col-md-4" style="position: -webkit-sticky; position: sticky; top: -70px;">

    <!-- Blog Search Well -->
    <div class="well">

        <h4>Blog Search</h4>

        <form action="search" method="post">
            
            <div class="input-group">
                <input name="search" type="text" class="form-control" required>
                <span class="input-group-btn">
                    <button name="submit" class="btn btn-default" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                </button>
                </span>
            </div>

        </form><!-- search for -->
        <!-- /.input-group -->
    </div>







    <!-- Login -->
    <div class="well">

        <h4>Login</h4>

        <form action="includes/login" method="post">
            
            <div class="form-group">
                <!-- name -->
                <input name="user_name" type="text" class="form-control" placeholder="Enter User Name" id="user_name" style="margin-bottom: 5px;"> 
            </div>

            <div class="input-group">
                <!-- password -->
                <input name="password" type="password" class="form-control" placeholder="Enter Password" id="password">  
                <span class="input-group-btn">
                    <button class="btn btn-primary" name="login" type="submit">
                        Submit
                    </button>
                </span>          
            </div>

        </form>
        <!-- /.input-group -->
    </div>
    <!-- end login -->








    <!-- Blog Categories Well -->
    <div class="well">

        <?php

          $query = "SELECT * FROM categories;";
          $select_categories_sidebar = mysqli_query($connection, $query);                    
        ?>

        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">

                    <?php

    while ($row = mysqli_fetch_assoc($select_categories_sidebar))
    {
        $the_cat_id = $row['cat_id'];
        ?>
          <li>
            <a href="category?category=<?= $the_cat_id ?>"><?php echo $row['cat_title']; ?></a>
          </li>
        <?php
    } ?>

                </ul>

            </div>

        </div>
        <!-- /.row -->

    </div>

    <!-- Side Widget Well -->
   <?php require('widget.php'); ?>

</div>