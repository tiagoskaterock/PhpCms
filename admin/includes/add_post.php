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

		if ($post_content == "") {
			$post_content = "No content yet, please write something";
		}
			
		$post_date = date('d-m-y');
		$post_comment_count = 4;

		move_uploaded_file($post_image_temp, "../images/$post_image");

		$query = "INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES (NULL, {$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', {$post_comment_count}, '{$post_status}'); ";

		$create_post_query = mysqli_query($connection, $query);

		confirm_query($create_post_query);

		header("Location: posts");

	}

?>

<h2>Criar uma Nova Postagem</h2>

<form action="" method="post" enctype="multipart/form-data">
	
	<!-- Título -->
	<div class="form-group">
		<label for="title">Título</label>
		<input type="text" class="form-control" name="title" required id="title">
	</div>

	<!-- Post Category ID -->
	<div class="form-group">

		<label for="post_category">Categoria</label><br>

		<select name="post_category" id="post_category" class="form-control">

		<?php

		$query = "SELECT * FROM categories";

      $select_categories = mysqli_query($connection, $query);      

      confirm_query($select_categories);

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
		<label for="post_author" for="autor">Autor</label>
		<input type="text" class="form-control" name="post_author" required id="autor">
	</div>


	<!-- Post Status -->
	<div class="form-group">

		<label for="post_status">Status</label><br>

		<select name="post_status" id="post_status" class="form-control form-select">

		    <option value="Draft">Rascunho</option>	

		    <option value="Published">Publicada</option>	        

		</select>

	</div>


	<!-- Post Image -->
	<div class="form-group">
		<label for="post_image">Imagem</label>
		<input type="file" class="form-control" name="post_image" required>
	</div>


	<!-- Post Tags -->
	<div class="form-group">
		<label for="post_tags">Tags</label>
		<input type="text" class="form-control" name="post_tags" required>
	</div>


	<!-- Post Content -->
	<div class="form-group">
		<label>Conteúdo</label>
		<!--<div id="editor" name="post_content"></div>-->
		
		<textarea class="form-control" name="post_content" required cols="30" rows="5" id="editor">Digite seu texto aqui...</textarea>
	</div>


	<!-- Submit -->
	<div class="form-group">		
		<input type="submit" name="create_post" value="Save Post" class="btn btn-primary">
	</div>



</form>