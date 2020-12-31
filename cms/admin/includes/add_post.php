<?php

	if (isset($_POST['create_post'])) {
		
		$post_title = $_POST['title'];
		$post_author = $_POST['post_author'];
		$post_category_id = $_POST['post_category'];
		$post_status = $_POST['post_status'];
		
		$post_image = $_FILES['post_image']['name'];
		$post_image_temp = $_FILES['post_image']['tmp_name'];

		$post_tags = $_POST['post_tags'];
		$post_content = $_POST['post_content'];
		$post_date = date('d-m-y');
		$post_comment_count = 4;

		move_uploaded_file($post_image_temp, "../images/$post_image");

		$query = "INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES (NULL, {$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', {$post_comment_count}, '{$post_status}'); ";

		$create_post_query = mysqli_query($connection, $query);

		confirm_query($create_post_query);


	}



?>





<form action="" method="post" enctype="multipart/form-data">
	
	<!-- Título -->
	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" class="form-control" name="title" required>
	</div>


	<!-- Post Category ID -->
	<div class="form-group">

		<label for="post_category_id">Post Category ID</label><br>

		<select name="post_category" id="post_category">

		<?php

		$query = "SELECT * FROM categories";

      $select_categories = mysqli_query($connection, $query); 

      confirm_query($select_categories)  ;

      while ($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        ?>
        <option value="<?= $cat_id ?>"><?= $cat_title ?></option>	
        <?php
      }

     ?>

		</select>

	</div>


	<!-- Post Author -->
	<div class="form-group">
		<label for="post_author">Post Author</label>
		<input type="text" class="form-control" name="post_author" required>
	</div>


	<!-- Post Status -->
	<div class="form-group">
		<label for="post_status">Post Status</label>
		<input type="text" class="form-control" name="post_status" required>
	</div>


	<!-- Post Image -->
	<div class="form-group">
		<label for="post_image">Post Image</label>
		<input type="file" class="form-control" name="post_image" required>
	</div>


	<!-- Post Tags -->
	<div class="form-group">
		<label for="post_tags">Post Tags</label>
		<input type="text" class="form-control" name="post_tags" required>
	</div>


	<!-- Post Content -->
	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea class="form-control" name="post_content" required cols="30" rows="5"></textarea>
	</div>


	<!-- Submit -->
	<div class="form-group">		
		<input type="submit" name="create_post" value="Publish Post" class="btn btn-primary">
	</div>



</form>