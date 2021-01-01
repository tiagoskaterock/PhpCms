<?php

	if (isset($_GET['p_id'])) {

		$the_post_id = $_GET['p_id'];

		$query = "SELECT * FROM posts WHERE post_id = $the_post_id;";
		$select_posts = mysqli_query($connection, $query);  

		confirm_query($select_posts); 

		while ($row = mysqli_fetch_assoc($select_posts)) {

			$post_id =  $row['post_id'];
			$post_author = $row['post_author'];
			$post_title = $row['post_title'];
			$post_category_id = $row['post_category_id'];
			$post_status = $row['post_status'];
			$post_image = "../images/" . $row['post_image'];
			$post_tags = $row['post_tags'];
			$post_comment_count = $row['post_comment_count'];
			$post_date = $row['post_date'];
			$post_content = $row['post_content'];

		}

		if (isset($_POST['update_post'])) {

			$post_author = $_POST['post_author'];

			$post_title = $_POST['post_title'];

			$post_category_id = $_POST['post_category'];

			$post_status = $_POST['post_status'];

			$post_image = $_FILES['post_image']['name'];

			$post_image_tmp = $_FILES['post_image']['tmp_name'];

			$post_content = $_POST['post_content'];

			$post_tags = $_POST['post_tags'];

			move_uploaded_file($post_image_tmp, "../images/$post_image");

			if (empty($post_image)) {
				$query = "SELECT * FROM posts WHERE post_id = $the_post_id";

				$select_image = mysqli_query($connection, $query);

				while($row = mysqli_fetch_array($select_image)){

					$post_image = $row['post_image'];

				}
			}


			$query = "UPDATE `posts` SET `post_category_id` = $post_category_id, `post_title` = '$post_title', `post_author` = '$post_author', `post_image` = '$post_image', `post_content` = '$post_content', `post_tags` = '$post_tags', `post_status` = '$post_status' WHERE `posts`.`post_id` = $the_post_id; ";

			$update_post = mysqli_query($connection, $query);

			confirm_query($update_post);		

			if (!$update_post) {
				die('QUERY FAILED: '. mysqli_error($connection));
			}

			header("Location: posts.php");

		}

	}	
	
?>


<form action="" method="post" enctype="multipart/form-data">
	
	<!-- Título -->
	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" class="form-control" name="post_title" required value="<?= $post_title ?>">
	</div>


	<!-- Post Category ID -->
	<div class="form-group">

		<label for="post_category_id">Category</label><br>

		<select name="post_category" id="post_category">

		<?php

		$query = "SELECT * FROM categories ORDER BY cat_title";

      $select_categories = mysqli_query($connection, $query); 

      confirm_query($select_categories)  ;

      while ($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<h1>$cat_id</h1>";
        
        ?>
        <option 
        <?php
        	if ($post_category_id == $cat_id) {
        		echo "selected";
        	}
        ?>
        value="<?= $cat_id ?>"><?= $cat_title ?></option>	
        <?php
      }

     ?>

		</select>

	</div>


	<!-- Post Author -->
	<div class="form-group">
		<label for="post_author">Post Author</label>
		<input type="text" class="form-control" name="post_author" required value="<?= $post_author ?>">
	</div>


	<!-- Post Status -->
	<div class="form-group">

		<label for="post_status">Status</label><br>

		<select name="post_status" id="post_status">

			<?php

				$query = "SELECT * FROM posts";

	      $select_post = mysqli_query($connection, $query); 

	      confirm_query($select_post);

	    ?>

	    <!-- draft -->
	    <option 
	    	<?php
	    		if ($post_status == "Draft") {
	    			echo "selected";
	    		}
	    	?>
	    value="Draft">Draft</option>	

	    <!-- published -->
	    <option 
	    	<?php
	    		if ($post_status == "Published") {
	    			echo "selected";
	    		}
	    	?>
	    value="Published">Published</option>	        

		</select>

	</div>



	<!--
	<div class="form-group">
		<label for="post_status">Post Status</label>
		<input type="text" class="form-control" name="post_status" required value="<?= $post_status ?>">
	</div>-->


	<!-- Post Image -->
	<div class="form-group">
		<label for="post_image">Post Image</label><br>
		<img src="../images/<?= $post_image ?>" alt="Image" style="width: 100px">
		<input type="file" class="form-control" name="post_image" value="../images/<?= $post_image ?>">
	</div>


	<!-- Post Tags -->
	<div class="form-group">
		<label for="post_tags">Post Tags</label>
		<input type="text" class="form-control" name="post_tags" required value="<?= $post_tags ?>">
	</div>


	<!-- Post Content -->
	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea type="text" class="form-control" name="post_content" required cols="30" rows="5"><?= $post_content ?>			
		</textarea>
	</div>


	<!-- Submit -->
	<div class="form-group">		
		<input type="submit" name="update_post" value="Update Post" class="btn btn-primary">
	</div>


</form>