<?php require('includes/admin_header.php'); ?>

    <div id="wrapper">

        <?php require('includes/admin_navigation.php'); ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin,       


                            <small><?= ucfirst($_SESSION['username']) ?></small>
                        </h1>

                    </div>
                </div>
                <!-- /.row -->


                <!-- /.row -->                
                <div class="row">



                    <!-- Posts -->
                    <?php
                        // query for ALL posts
                        $query_total_posts = "SELECT COUNT(post_id) total_posts FROM posts;";
                        $select_total_posts = mysqli_query($connection, $query_total_posts);   

                        while ($row_total_posts = mysqli_fetch_assoc($select_total_posts)) { 
                            $total_posts = $row_total_posts['total_posts'];
                        }

                        // query only for published posts
                        $published_posts = "SELECT COUNT(post_id) published_posts FROM posts WHERE post_status = 'Published'";
                        $select_published_posts = mysqli_query($connection, $published_posts);   
                        while ($row_published_posts = mysqli_fetch_assoc($select_published_posts)) { 
                            $published_posts = $row_published_posts['published_posts'];
                        }

                        // query only for draft posts
                        $draft_posts = "SELECT COUNT(post_id) draft_posts FROM posts WHERE post_status = 'Draft'";
                        $select_draft_posts = mysqli_query($connection, $draft_posts);   
                        while ($row_draft_posts = mysqli_fetch_assoc($select_draft_posts)) { 
                            $draft_posts = $row_draft_posts['draft_posts'];
                        }
                    ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                  <div class='huge'><?= $total_posts ?></div>
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- end posts -->



                    <!-- comments -->
                    <?php
                        // query for ALL comments
                        $query_total_comments = "SELECT COUNT(comment_id) total_comments FROM comments;";
                        $select_total_comments = mysqli_query($connection, $query_total_comments);   

                        while ($row_total_comments = mysqli_fetch_assoc($select_total_comments)) { 
                            $total_comments = $row_total_comments['total_comments'];
                        }




                        // query ONLY for comments approved
                        $query_approved_comments = "SELECT COUNT(comment_id) approved_comments FROM comments WHERE comment_status = 'Approved'";

                        $select_approved_comments = mysqli_query($connection, $query_approved_comments);   

                        while ($row_approved_comments = mysqli_fetch_assoc($select_approved_comments)) { 
                            $approved_comments = $row_approved_comments['approved_comments'];
                        }




                        // query ONLY for NOT approved comments
                        $query_unapproved_comments = "SELECT COUNT(comment_id) unapproved_comments FROM comments WHERE comment_status = 'Unapproved'";

                        $select_unapproved_comments = mysqli_query($connection, $query_unapproved_comments);   

                        while ($row_unapproved_comments = mysqli_fetch_assoc($select_unapproved_comments)) { 
                            $unapproved_comments = $row_unapproved_comments['unapproved_comments'];
                        }
                    ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                     <div class='huge'><?= $total_comments ?></div>
                                      <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- end comments -->



                    <!-- users -->
                    <?php
                        // query for users
                        $query_total_users = "SELECT COUNT(user_id) total_users FROM users;";
                        $select_total_users = mysqli_query($connection, $query_total_users);   

                        while ($row_total_users = mysqli_fetch_assoc($select_total_users)) { 
                            $total_users = $row_total_users['total_users'];
                        }

                        // query admin users
                        $query_admin_users = "SELECT COUNT(user_id) admin_users FROM users WHERE user_role = 'admin'";
                        $select_admin_users = mysqli_query($connection, $query_admin_users);   

                        while ($row_admin_users = mysqli_fetch_assoc($select_admin_users)) { 
                            $admin_users = $row_admin_users['admin_users'];
                        }

                        // query subscriber users
                        $query_subscriber_users = "SELECT COUNT(user_id) subscriber_users FROM users WHERE user_role = 'Subscriber'";
                        $select_subscriber_users = mysqli_query($connection, $query_subscriber_users);   

                        while ($row_subscriber_users = mysqli_fetch_assoc($select_subscriber_users)) { 
                            $subscriber_users = $row_subscriber_users['subscriber_users'];
                        }
                    ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    <div class='huge'><?= $total_users ?></div>
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- end users -->


                    <!-- categories -->
                    <?php
                        // query for categories
                        $query_total_categories = "SELECT COUNT(cat_id) total_categories FROM categories;";
                        $select_total_categories = mysqli_query($connection, $query_total_categories);   

                        while ($row_total_categories = mysqli_fetch_assoc($select_total_categories)) { 
                            $total_categories = $row_total_categories['total_categories'];
                        }
                    ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class='huge'><?= $total_categories ?></div>
                                         <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- end categories -->



                </div>
                <!-- /.row -->





                <div class="row">
                    <script type="text/javascript">
                      google.charts.load('current', {'packages':['bar']});
                      google.charts.setOnLoadCallback(drawChart);

                      function drawChart() {
                        var data = google.visualization.arrayToDataTable([                        
                          ['Stats', 'Count'],

                          <?php

                            $element_text = ['Active Posts', 'Draft Posts', 'Approved Comments', 'Unapproved Comments', 'Admin Users', 'Subscribers', 'Categories'];

                            $element_count = [$published_posts, $draft_posts, $approved_comments, $unapproved_comments, $admin_users, $subscriber_users, $total_categories];

                            for ($i = 0; $i < count($element_text); $i++) { 
                                echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
                            }


                          ?> 

                         // ['Posts', 1000],
                        ]);

                        var options = {
                          chart: {
                            title: 'CMS Stats - <?php echo date('Y'); ?>',
                            subtitle: '',
                          }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                      }
                    </script>
                </div>

                <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>







            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->



<?php require('includes/admin_footer.php'); ?>