<table class="table table-bordered table-hover text-center" >
  <thead>
    <tr>
      <th style="text-align: center !important;">Author</th>
      <th style="text-align: center !important;">Comment</th>
      <th style="text-align: center !important;">Email</th>
      <th style="text-align: center !important;">Status</th>
      <th style="text-align: center !important;">In Response to</th>
      <th style="text-align: center !important;">Date</th>
      <th style="text-align: center !important;" colspan="3">Action</th>      
    </tr>
  </thead>

  <tbody>

    <?php

    	// query 1 for comments
      $query = "SELECT * FROM comments ORDER BY comment_id DESC;";
      $select_comments = mysqli_query($connection, $query);   

      while ($row = mysqli_fetch_assoc($select_comments)) { 
      	$comment_post_id = $row['comment_post_id'];
      	$comment_id = $row['comment_id'];
        ?>       

        <tr>

          <!-- Author -->
          <td><?= utf8_encode($row['comment_author']) ?></td>

          <!-- Comment -->
          <td><?= utf8_encode($row['comment_content']) ?></td>

          <!-- Email -->
          <td><?= $row['comment_email'] ?></td>

          <!-- Status -->
          <td><?= $row['comment_status'] ?></td>

          <!-- In response to -->
          <?php
          	// query 2 for post titles
          	// recupera o título do post de acordo com FK $comment_post_id
          	$query_2 = "SELECT * FROM posts WHERE post_id = $comment_post_id;";

          	$select_post_title = mysqli_query($connection, $query_2);

          	while ($row_2 = mysqli_fetch_assoc($select_post_title)) {
          		$post_title = $row_2['post_title'];
          		$post_id = $row_2['post_id'];
          	}
          ?>

          <!-- post title -->
          <td><a href="../post.php?p_id=<?= $post_id; ?>"><?= $post_title; ?></a></td>

          <!-- Date -->
          <td><?= utf8_encode($row['comment_date']) ?></td>

          <!-- Approve -->
          <td><a href="comments.php?approve=<?= $comment_id ?>">Approve</a></td>

          <!-- unapprove -->
          <td><a href="comments.php?unapprove=<?= $comment_id ?>">Unapprove</a></td>

          <!-- delete -->
          <td><a href="comments.php?delete=<?= $comment_id ?>">Delete</a></td>
        </tr>

        <?php

      }

		?>
  
  </tbody>
</table>

<?php

	// APROVE
	if (isset($_GET['approve'])) {
		echo $_GET['approve'];
		$comment_id = $_GET['approve'];
		$query = "UPDATE comments SET comment_status = 'approved' 
							WHERE comment_id = $comment_id; ";
		$update_query = mysqli_query($connection, $query);
		header("Location: comments.php");
		
	}

	// UNAPPROVE
	if (isset($_GET['unapprove'])) {
		echo $_GET['unapprove'];
		$comment_id = $_GET['unapprove'];
		$query = "UPDATE comments SET comment_status = 'unapproved' 
							WHERE comment_id = $comment_id; ";
		$update_query = mysqli_query($connection, $query);
		header("Location: comments.php");
		
	}

	// DELETE
	if (isset($_GET['delete'])) {
		$comment_id = $_GET['delete'];
		$query = "DELETE FROM comments WHERE comment_id = $comment_id";
		$delete_query = mysqli_query($connection, $query);
		header("Location: comments.php");
	}

?>