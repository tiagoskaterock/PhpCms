<?php require('includes/header.php'); ?>

    <!-- Navigation -->
    <?php require('includes/navigation.php'); ?>

    <!-- Page Content -->
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

                    $query = "SELECT * FROM posts WHERE post_status = 'Published' ORDER BY post_id DESC";

                    $select_all_posts_query = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
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

            <!-- Blog Sidebar Widgets Column -->
            <?php require('includes/sidebar.php'); ?>

        </div>
        <!-- /.row -->

        <hr>

<?php require('includes/footer.php'); ?>