<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <!--<th style="text-align: center !important;">ID</th>-->
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
        ?>

        <tr>
          <!--td><?= $row['post_id'] ?></td>-->
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
          <td><img src="../images/<?= $row['post_image'] ?>" alt="Post Image" style="width: 100px;"></td>
          <td><?= $row['post_tags'] ?></td>
          <td><?= $row['post_comment_count'] ?></td>
          <td><?= $row['post_date'] ?></td>
          <td><a href="posts.php?source=edit_post&p_id=<?= $row['post_id'] ?>">Edit</a></td>
          <td><a href="posts.php?delete=<?= $row['post_id'] ?>">Delete</a></td>
        </tr>

        <?php

      }

		?>
  
  </tbody>
</table>

<?php

	if (isset($_GET['delete'])) {
		$the_post_id = $_GET['delete'];
		$query = "DELETE FROM posts WHERE post_id = $the_post_id";
		$delete_query = mysqli_query($connection, $query);
		header("Location: posts.php");
	}


?>