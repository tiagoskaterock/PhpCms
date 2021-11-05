<?php define('TITLE', 'Search') ?>

<?php require('includes/header.php'); ?>

<!-- Navigation -->
<?php require('includes/navigation.php'); ?>

<!-- Page Content -->
<div class="container">

  <div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">                

      <?php

      if (isset($_POST['submit'])) {
        $search = $_POST['search'];                    

        $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' OR post_title LIKE '%$search%'
        OR post_author LIKE '%$search%'
        OR post_content LIKE '%$search%';";
        
        $search_query = mysqli_query($connection, $query);

        if (!$search_query) {
          die("QUERY FAILED" . mysqli_error($connection));
        }

        $count = mysqli_num_rows($search_query);

        ?>
        <h1 class="page-header">
          Searching for: <?= $search ?><br>
          <small>Results: <?= $count ?></small>
        </h1>
        <?php

        if ($count == 0) {
          echo "<h1>NO RESULT</h1>";
        }
        else{
          while ($row = mysqli_fetch_assoc($search_query)) {
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = utf8_encode($row['post_date']);
            $post_image = $row['post_image'];
            $post_content = substr($row['post_content'], 0, 100) ;

            ?>                    

            <!-- First Blog Post -->
            <h2>
              <a href="post?p_id=<?php echo $post_id ?>"><?php echo $post_title; ?></a>
            </h2>

            <p class="lead">
              by <a href="/cms"><?php echo $post_author; ?></a>
            </p>

            <p>
              <span class="glyphicon glyphicon-time">
                
              </span> 
              Posted on <?php echo $post_date; ?>
            </p>

            <hr>

            <a href="post?p_id=<?php echo $post_id ?>">
              <img style="width: 50%;" class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
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