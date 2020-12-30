<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>ID</th>
      <th>Author</th>
      <th>Title</th>
      <th>Category</th>
      <th>Status</th>
      <th>Image</th>
      <th>Tags</th>
      <th>Comments</th>
      <th>Date</th>
      <th>Action</th>
    </tr>
  </thead>

  <tbody>

    <?php
      $query = "SELECT * FROM posts;";
      $select_posts = mysqli_query($connection, $query);   

      while ($row = mysqli_fetch_assoc($select_posts)) { 
        ?>

        <tr>
          <td><?= $row['post_id'] ?></td>
          <td><?= utf8_encode($row['post_author']) ?></td>
          <td><?= utf8_encode($row['post_title']) ?></td>
          <td><?= $row['post_category_id'] ?></td>
          <td><?= utf8_encode($row['post_status']) ?></td>
          <td><img src="../images/<?= utf8_encode($row['post_image']) ?>" alt="Post Image" style="width: 100px;"></td>
          <td><?= utf8_encode($row['post_tags']) ?></td>
          <td><?= utf8_encode($row['post_comment_count']) ?></td>
          <td><?= utf8_encode($row['post_date']) ?></td>
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