<?php require('includes/header.php'); ?>

    <!-- Navigation -->
    <?php require('includes/navigation.php'); ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <?php

                    $query = "SELECT * FROM posts ORDER BY post_id DESC";

                    $select_all_posts_query = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                        $post_title = utf8_encode($row['post_title']);
                        $post_author = utf8_encode($row['post_author']);
                        $post_date = utf8_encode($row['post_date']);
                        $post_image = utf8_encode($row['post_image']);
                        $post_content = utf8_encode($row['post_content']);

                        ?>                    

                        <!-- First Blog Post -->
                        <h2>
                            <a href="#"><?php echo $post_title; ?></a>
                        </h2>

                        <p class="lead">
                            by <a href="index.php"><?php echo $post_author; ?></a>
                        </p>

                        <p>
                            <span class="glyphicon glyphicon-time">
                                
                            </span> 
                            Posted on <?php echo $post_date; ?>
                        </p>

                        <hr>

                        <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">

                        <hr>

                        <p>
                            <?php echo $post_content; ?>
                        </p>

                        <a class="btn btn-primary" href="#">
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

        <hr>

<?php require('includes/footer.php'); ?>