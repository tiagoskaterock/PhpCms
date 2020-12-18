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

                    if (isset($_POST['submit'])) {
                        $search = $_POST['search'];

                        echo $search;

                        $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' OR post_title LIKE '%$search%'
                            OR post_author LIKE '%$search%'
                            OR post_content LIKE '%$search%';";
                            
                        $search_query = mysqli_query($connection, $query);

                        if (!$search_query) {
                            die("QUERY FAILED" . mysqli_error($connection));
                        }

                        $count = mysqli_num_rows($search_query);
                        echo $count;

                        if ($count == 0) {
                            echo "<h1>NO RESULT</h1>";
                        }
                        else{
                            while ($row = mysqli_fetch_assoc($search_query)) {
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

                        
                        }
                    } 
                    ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php require('includes/sidebar.php'); ?>

        </div>
        <!-- /.row -->

        <hr>

<?php require('includes/footer.php'); ?>