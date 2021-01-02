<table class="table table-bordered table-hover text-center" >
  <thead>
    <tr>
      <th style="text-align: center !important;">User Name</th>
      <th style="text-align: center !important;">First Name</th>
      <th style="text-align: center !important;">Last Name</th>
      <th style="text-align: center !important;">Email</th>
      <th style="text-align: center !important;">Role</th>      
      <th style="text-align: center !important;" colspan="2">Action</th>      
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
            <td><a href="users.php?source=edit_user&user_id=<?= $row['user_id'] ?>">Edit</a></td> 
            <td><a href="users.php?delete=<?= $row['user_id'] ?>">Delete</a></td> 
          </tr>         
          <?php

        }

  		?>
    
  </tbody>

</table>

<?php

	// DELETE
	if (isset($_GET['delete'])) {
    $user_id = $_GET['delete'];
    $query = "DELETE FROM users WHERE user_id = $user_id";
		$delete_query = mysqli_query($connection, $query);
		header("Location: users.php");    
	}

?>