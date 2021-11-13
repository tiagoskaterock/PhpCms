<?php define('TITLE', 'Post') ?>

<?php require('includes/header.php'); ?>

<!-- Navigation -->
<?php require('includes/navigation.php'); ?>

<!-- Page Content -->
<div class="container">

  <div class="row"> 

    <?php

    if (isset($_GET['p_id'])) {
      $the_post_id = $_GET['p_id'];

      if ($_GET['p_id'] == '') {
        header("Location: index");
      }

      if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {
        $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
      }
      else {
        $query = "SELECT * FROM posts WHERE post_id = $the_post_id and status == 'published'";
      }

      $select_all_posts_query = mysqli_query($connection, $query);

      if ($select_all_posts_query->num_rows == 0) {
        header("Location: index");
      }

      while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        $post_category_id = $row['post_category_id'];                
        $post_views_count = $row['post_views_count'];
        ?> 

        <?php

        $query_cat_name = "SELECT * FROM categories WHERE cat_id = $post_category_id";
        $result_cat_name = $connection->query($query_cat_name);

        if ($result_cat_name->num_rows > 0) {
          while($row_cat_name = $result_cat_name->fetch_assoc()) {
            $cat_name = $row_cat_name['cat_title'];
            $cat_id = $row_cat_name['cat_id'];
            ?>
            <!-- Blog Entries Column -->
            <div class="col-md-8">
              <h1 class="page-header">
                <?php echo $post_title; ?><br>
                <small>Posted in <a href="category?category=<?php echo $cat_id; ?>"><?php echo $cat_name; ?></a> </small>
              </h1>                   

              <p class="lead">
                by <a href="author_posts?author=<?= $post_author ?>"><?php echo $post_author; ?></a>
              </p>



              <?php

              $post_views_count++;

              $sql = "UPDATE posts SET post_views_count = '$post_views_count' WHERE post_id = $the_post_id";

              $connection->query($sql);

              ?>

              <p>
                <span class="glyphicon glyphicon-time">

                </span> 
                Posted on <?php echo $post_date; ?>
                <br>
                <?php mostra_views() ?>
              </p>

              <hr>

              <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="image" style="width: 100%;">

              <hr>

              <p>
                <?php echo $post_content; ?>
              </p>

              <hr>

              <?php

            }

          }

        }

      } 

      else{
        header("Location: index");
      }

      ?>


      <!-- Blog Comments Query-->
      <?php

      if (isset($_POST['create_comment'])) {

        $the_post_id = $_GET['p_id'];

        $comment_author = utf8_decode($_POST['comment_author']);
        $comment_email = utf8_decode($_POST['comment_email']);
        $comment_content = utf8_decode($_POST['comment_content']);

                    // verifica por campos vazios
        if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {
          $query = "INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) 
          VALUES (NULL, $the_post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapproved', now());";

          $create_comment_query = mysqli_query($connection, $query);

          if (!$create_comment_query) {
            die('QUERY FAILED' . mysqli_error($connection));
          }
          else {
            ?>
            <script>
              alert('Comentário enviado para moderação com sucesso.')
            </script>
            <?php
          }
        }
        else {
          ?>
          <script>alert('Fields cannot be empty')</script>
          <?php
        }


      }
      ?>
      <!-- end query post comments -->

      <!-- Show Posted Comments -->
      <?php
      $query = "SELECT * FROM comments 
      WHERE comment_status = 'approved' 
      AND comment_post_id = $the_post_id
      ORDER BY comment_id DESC";

      $select_all_comments_query = mysqli_query($connection, $query);

      while ($comment = mysqli_fetch_assoc($select_all_comments_query)) {

        ?>
        <!-- Comment -->
        <div class="media">

          <!--
          <a class="pull-left" href="#">
              <img class="media-object" src="http://placehold.it/64x64" alt="">
          </a>
          -->

          <div class="media-body">
            <h4 class="media-heading"><?= utf8_encode($comment['comment_author']) ?>
            <br>
            <small><?= utf8_encode($comment['comment_date']) ?></small>                                    
          </h4>

          <p></p><?= utf8_encode($comment['comment_content']) ?></p>
        </div>
      </div>
      <?php
    }

    ?> 
    <!-- end comments -->  

    <hr>                             

    <!-- Comments Form -->
    <div class="well">
      <h4>Leave a Comment:</h4>
      <form role="form" action="" method="post">


        <div class="form-group">
          <label for="author">Author</label>
          <input type="text" class="form-control" name="comment_author" id="author" required maxlength="255">
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="comment_email" id="email" required maxlength="255">
        </div>

        <div class="form-group">
          <label for="comment">Comment</label>
          <textarea class="form-control" rows="3" name="comment_content" id="comment" required maxlength="1000"></textarea>
        </div>

        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
      </form>
    </div>
    <!-- end comments form -->

  </div>

  <!-- Blog Sidebar Widgets Column -->
  <?php require('includes/sidebar.php'); ?>

</div>
<!-- /.row -->

<hr>

<?php require('includes/footer.php'); ?>