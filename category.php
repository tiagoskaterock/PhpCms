<?php require('includes/header.php'); ?>

    <!-- Navigation -->
    <?php require('includes/navigation.php'); ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">



            <?php

            if (isset($_GET['category'])) {
                    $post_category = $_GET['category'];
                }

              $query = "SELECT * FROM categories WHERE cat_id = $post_category";

              $select_all_categories_query = mysqli_query($connection, $query);

              while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
                $cat_title = $row['cat_title'];
              }          
            ?>

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <h1 class="page-header">
                    Categories
                    <small><?= $cat_title ?></small>
                </h1>

                <!--
                <?php 

                    $per_page = 5;

                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                    }
                    else {
                        $page = "";
                    }

                    if ($page == "" || $page == 1) {
                        $page_1 = 0;
                    }
                    else {
                        $page_1 = ($page * $per_page) - $per_page;
                    }

                ?>
                -->

                <?php 
                    $count = conta_posts_ativos_por_categoria('posts', $post_category); 
                ?>

                <?php $total_ativos = conta_posts_ativos_por_categoria('posts', $post_category);  ?>

                <?php $count = ceil($count / $per_page) ?>
            
                <?php 

                    if ($total_ativos == 0) {
                        ?>
                        <h2 class="text-warning text-center">Nenhum post publicado</h2>
                        <?php
                    }

                ?>
                <?php                

                    if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {
                        // published posts from certain category
                        $query = "SELECT * FROM posts WHERE post_category_id = $post_category ORDER BY post_id DESC";
                    }
                    else {
                        // published posts from certain category
                        $query = "SELECT * FROM posts WHERE post_category_id = $post_category AND post_status = 'Published' ORDER BY post_id DESC";                        
                    }


                    $select_all_posts_query = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                        $post_views_count = $row['post_views_count'];
                        $post_id = $row['post_id'];
                        $the_post_id = $post_id;
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = substr($row['post_content'], 0, 100) . "...";

                        ?>                    

                        <!-- First Blog Post -->
                        <h2>
                            <a href="post?p_id=<?php echo $post_id ?>"><?php echo $post_title; ?></a>
                        </h2>

                        <p>
                            <span class="glyphicon glyphicon-time">
                                
                            </span> 
                            Posted on <?php echo $post_date; ?>
                        </p>



                        <p><span><?php mostra_views() ?></span></p>

                        <hr>

                        <a href="post?p_id=<?php echo $post_id ?>">
                            <img class="img-responsive" style="width: 50%;" src="images/<?php echo $post_image; ?>" alt="">
                        </a>
                            

                        <hr>

                        <p>
                            <?php echo $post_content; ?>
                        </p>

                        <a class="btn btn-primary" href="post?p_id=<?php echo $post_id ?>">
                            Read More 
                            <span class="glyphicon glyphicon-chevron-right">
                                
                            </span>
                        </a>

                        <hr>

                        <?php
                    }

                ?>

                

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php require('includes/sidebar.php'); ?>

        </div>
        <!-- /.row -->

        <!--
            <ul class="pagination justify-content-center">
            <?php
                for ($i=1; $i <= $count ; $i++) { 
                  if ($page == $i) {
                    ?>
                    <li class="active" ><a href="category?category=<?= $the_cat_id ?>?page=<?= $i ?>"><?= $i ?></a></li>
                    <?php
                  }
                  else {
                    ?>
                    <li><a href="category?category=<?= $the_cat_id ?>?page=<?= $i ?>"><?= $i ?></a></li>
                    <?php
                }
            }
           ?>
         </ul>
     -->

<?php require('includes/footer.php'); ?>