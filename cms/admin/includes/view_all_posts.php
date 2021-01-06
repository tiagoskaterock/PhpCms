<!--<?php //require('delete_modal.php'); ?>-->

<?php
  if (isset($_POST['check_box_array'])) {
    foreach ($_POST['check_box_array'] as $check_box_value) {
      $bulk_options = $_POST['check_box_array'];
    }
  }
?>

<form action="" method="post">
  <table class="table table-bordered table-hover">
    <div class="row">
      <div id="bulkOptionContainer" class="col-xs-4">
        <select name="bulk_options" id="" class="form-control">
          <option value="select">Select Options</option>
          <option value="publish">Publish</option>
          <option value="draft">Draft</option>
          <option value="delete">Delete</option>
        </select>
      </div>


      <div class="col-xs-4">
        <input type="submit" name="submit" class="btn btn-success" value="Apply">
        <!--<a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>-->
      </div>      
    </div>
    <br>

    <thead>
      <tr>
        <th><input type="checkbox" id="select_all_boxes" name=""></th>
        <th style="text-align: center !important;">Author</th>
        <th style="text-align: center !important;">Title</th>
        <th style="text-align: center !important;">Category</th>
        <th style="text-align: center !important;">Status</th>
        <th style="text-align: center !important;">Image</th>
        <th style="text-align: center !important;">Tags</th>
        <th style="text-align: center !important;">Comments</th>
        <th style="text-align: center !important;">Date</th>
        <th style="text-align: center !important;" colspan="2">Action</th>
      </tr>
    </thead>

    <tbody>

      <?php
        $query = "SELECT * FROM posts ORDER BY post_id DESC;";
        $select_posts = mysqli_query($connection, $query);   

        while ($row = mysqli_fetch_assoc($select_posts)) { 
        	$post_category_id = $row['post_category_id'];
          $post_id = $row['post_id'];        
          ?>


          <tr>
            <td><input type="checkbox" class="" name="check_box_array[]" value="<?= $post_id ?>"></td>
            <td><?= $row['post_author'] ?></td>
            <td><?= $row['post_title'] ?></td>

            <?php

            	$query = "SELECT * FROM categories WHERE cat_id = $post_category_id;";

              $select_categories = mysqli_query($connection, $query);   

              while ($row_2 = mysqli_fetch_assoc($select_categories)) {
                $cat_id = $row_2['cat_id'];
                $cat_title = $row_2['cat_title'];
              }

            ?>

            <td><?= $cat_title ?></td>

            <td><?= $row['post_status'] ?></td>

            <td>
              <a href="../post.php?p_id=<?= $row['post_id'] ?>">
                <img src="../images/<?= $row['post_image'] ?>" alt="Post Image" style="width: 100px;">
              </a>
            </td>

            <td><?= $row['post_tags'] ?></td>

            <!-- count comments in each post -->
            <?php
              $query = "SELECT count(comment_id) as total_comments FROM comments WHERE comment_post_id = $post_id";

              $count_comments = mysqli_query($connection, $query); 

              while ($row_3 = mysqli_fetch_assoc($count_comments)) {
                $total_comments = $row_3['total_comments'];
              }
            ?>

            <td><?= $total_comments ?></td>
            <td><?= $row['post_date'] ?></td>


            <td><a href="posts.php?source=edit_post&p_id=<?= $row['post_id'] ?>">Edit</a></td>


            <td><a href="posts.php?delete=<?= $row['post_id'] ?>">Delete</a></td>
          </tr>

          <?php

        }

  		?>
    
    </tbody>

  </table>
</form>





<?php

	if (isset($_GET['delete'])) {
		$the_post_id = $_GET['delete'];
		$query = "DELETE FROM posts WHERE post_id = $the_post_id";
		$delete_query = mysqli_query($connection, $query);
		header("Location: posts.php");
	}

?>
