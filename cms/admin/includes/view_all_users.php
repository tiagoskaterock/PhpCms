<table class="table table-bordered table-hover text-center" >
  <thead>
    <tr>
      <th style="text-align: center !important;">Name</th>
      <th style="text-align: center !important;">First Name</th>
      <th style="text-align: center !important;">Last Name</th>
      <th style="text-align: center !important;">Email</th>
      <th style="text-align: center !important;">Role</th>      
      <th style="text-align: center !important;" colspan="3">Action</th>      
    </tr>
  </thead>

  <tbody>
    
      <?php

      	// query 1 for users
        $query = "SELECT * FROM users ORDER BY user_name";
        $select_users = mysqli_query($connection, $query);   

        while ($row = mysqli_fetch_assoc($select_users)) { 
          ?>       
          <tr>
            <td><?= $row['user_name'] ?></td>           
            <td><?= $row['first_name'] ?></td>           
            <td><?= $row['last_name'] ?></td>           
            <td><?= $row['user_email'] ?></td>           
            <td><?= $row['user_role'] ?></td> 
            <td><a href="">Do something</a></td> 
            <td><a href="">Do something</a></td> 
            <td><a href="">Do something</a></td> 
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