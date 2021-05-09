<?php require('includes/header.php'); ?>

    <?php show_navigation() ?>

    <div class="container">

        <div class="row">

            <h1 class="bg-danger">Banco mudado em casa 7 de maio</h1>

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <h1 class="page-header">
                    MY CMS
                    <small>Tiago's CMS</small>
                </h1>




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

                <?php $count = conta_posts_ativos() ?>

                <?php $count = ceil($count / $per_page) ?>


                <?php

                    $query = "SELECT * FROM posts WHERE post_status = 'Published'  ORDER BY post_id DESC LIMIT $per_page OFFSET $page_1";

                    $select_all_posts_query = mysqli_query($connection, $query);

                    $index = index();

                    if ($select_all_posts_query->num_rows == 0) {
                        header("Location: $index");
                    }

                    while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                        $post_views_count = $row['post_views_count'];
                        $post_id = $row['post_id'];
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

                        <p class="lead">
                            by <a href="author_posts?author=<?= $post_author ?>"><?php echo $post_author; ?></a>
                        </p>

                        <p>
                            <span class="glyphicon glyphicon-time">
                                
                            </span> 
                            Posted on <?php echo $post_date; ?>
                        </p>

                        <p>
                            <span>
                                <?php mostra_views() ?> 
                            </span>
                        </p>

                        <hr>

                        <a href="post?p_id=<?php echo $post_id ?>">
                            <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="Image" style="width: 50%;">
                        </a>
                            

                        <hr>

                        <div>
                            <?php echo $post_content; ?>
                        </div>

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

            <?php show_sidebar() ?>

        </div>

        <ul class="pagination justify-content-center">
            <?php
                for ($i=1; $i <= $count ; $i++) { 
              if ($page == $i) {
                ?>
                <li class="active" ><a href="index?page=<?= $i ?>"><?= $i ?></a></li>
                <?php
              }
              else {
                ?>
                <li><a href="index?page=<?= $i ?>"><?= $i ?></a></li>
                <?php
              }
            }
           ?>
         </ul>

<?php show_footer() ?>