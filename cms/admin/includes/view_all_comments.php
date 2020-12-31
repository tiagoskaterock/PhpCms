<table class="table table-bordered table-hover text-center" >
  <thead>
    <tr>
      <!--<th style="text-align: center !important;">ID</th>-->
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
      $query = "SELECT * FROM comments ORDER BY comment_id DESC;";
      $select_comments = mysqli_query($connection, $query);   

      while ($row = mysqli_fetch_assoc($select_comments)) { 
      	$comment_post_id = $row['comment_post_id'];
        ?>       

        <tr>
        	<!-- ID -->
          <!--<td><?= $row['comment_id'] ?></td>-->

          <!-- Author -->
          <td><?= utf8_encode($row['comment_author']) ?></td>

          <!-- Comment -->
          <td><?= utf8_encode($row['comment_content']) ?></td>

          <!-- Email -->
          <td><?= $row['comment_email'] ?></td>

          <!-- Status -->
          <td><?= $row['comment_status'] ?></td>

          <!-- In response to -->
          <td><img src="../images/<?= $row['post_image'] ?>" alt="Post Image" style="width: 100px;"></td>

          <!-- Date -->
          <td><?= utf8_encode($row['comment_date']) ?></td>

          <!-- Approve -->
          <td><a href="">Approve</a></td>

          <!-- unapprove -->
          <td><a href="">Unapprove</a></td>

          <!-- delete -->
          <td><a href="">Delete</a></td>
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