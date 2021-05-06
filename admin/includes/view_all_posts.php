<?php require('delete_modal.php'); ?>

<?php
  if (isset($_POST['check_box_array'])) {
    foreach ($_POST['check_box_array'] as $postValueId) {

      $bulk_options = $_POST['bulk_options'];

      switch ($bulk_options) {
        case 'Published':
          $query = "UPDATE posts set post_status = '$bulk_options' 
          WHERE post_id = $postValueId";
          $update_status = mysqli_query($connection, $query);
          break;

        case 'Draft':
          $query = "UPDATE posts set post_status = '$bulk_options' 
          WHERE post_id = $postValueId";
          $update_status = mysqli_query($connection, $query);
          break;

        case 'Delete':
          $query = "DELETE from posts WHERE post_id = $postValueId";
          $delete = mysqli_query($connection, $query);
          break;

        case 'Clone':
          echo 'Clone';

          $sql = "SELECT * FROM posts WHERE post_id = $postValueId";
          $result = $connection->query($sql);

          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $post_id = $row['post_id'];
              $post_category_id = $row['post_category_id'];
              $post_title = $row['post_title'];
              $post_author = $row['post_author'];
              $post_date = $row['post_date'];
              $post_image = $row['post_image'];
              $post_content = $row['post_content'];
              $post_tags = $row['post_tags'];
            }
          }

          $query = "INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`) VALUES (NULL, {$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}'); ";

          $create_post_query = mysqli_query($connection, $query);

          confirm_query($create_post_query);

          header("Location: posts");
          break;
        
        default:
          break;
      }

    }
  }
?>

<form action="" method="post">
  <table class="table table-bordered table-hover text-center">
    <div class="row">
      <div id="bulkOptionContainer" class="col-xs-4">
        <select name="bulk_options" id="" class="form-control" required>
          <option value="" selected disabled>Opções</option>
          <option value="Published">Publicar</option>
          <option value="Draft">Rascunho</option>
          <option value="Delete">Excluir</option>
          <option value="Clone">Clone</option>
        </select>
      </div>


      <div class="col-xs-4">
        <input type="submit" name="submit" class="btn btn-success" value="Aplicar">
        <!--<a class="btn btn-primary" href="posts?source=add_post">Add New</a>-->
      </div>      
    </div>
    <br>

    <thead class="text-center">
      <tr class="text-center">
        <th><input type="checkbox" id="select_all_boxes" name=""></th>
        <th>ID</th>
        <th>Autor</th>
        <th>Título</th>
        <th>Categoria</th>
        <th>Status</th>
        <th>Imagem</th>
        <th>Tags</th>
        <th>Comentários</th>
        <th>Data</th>
        <th colspan="3">Ações</th>
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
            <td><input type="checkbox" class="checkbox" name="check_box_array[]" value="<?= $post_id ?>"></td>
            <td><?= $row['post_id'] ?></td>

            <td>
              <a href="../author_posts?author=<?= $row['post_author'] ?>">
                <?= $row['post_author'] ?>
              </a>
            </td>

            <td>
              <a href="../post?p_id=<?= $row['post_id'] ?>">
                <?= $row['post_title'] ?>          
              </a>
            </td>

            <?php

            	$query = "SELECT * FROM categories WHERE cat_id = $post_category_id;";

              $select_categories = mysqli_query($connection, $query);   

              while ($row_2 = mysqli_fetch_assoc($select_categories)) {
                $cat_id = $row_2['cat_id'];
                $cat_title = $row_2['cat_title'];
              }

            ?>

            <td><a href="../category?category=<?= $cat_id ?>"><?= $cat_title ?></a></td>

            <?php
              $status_do_post = $row['post_status'];
              if ($status_do_post == 'Draft') {
                $status_do_post = 'Rascunho';
                $classe = 'text-muted';
              }
              else{
                $status_do_post = 'Publicado';
                $classe = 'text-success';
              }
            ?>
            <td class="<?= $classe ?>"><?= $status_do_post ?></td>

            <td>
              <a href="../post?p_id=<?= $row['post_id'] ?>">
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

            <td><a href="../post?p_id=<?= $row['post_id'] ?>">See post</a></td>

            <td><a href="posts?source=edit_post&p_id=<?= $row['post_id'] ?>">Editar</a></td>

            <td><a href="javascript:void(0)" rel="<?= $post_id ?>" class="delete_link">Excluir</a></td>
            <!--
            <td><a href="posts?delete=<?= $row['post_id'] ?>" onclick="return confirm('Deseja mesmo excluir o registro?');">Excluir</a></td>
            -->
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
		header("Location: posts");
	}

?>



<script>

  $( document ).ready(function() {
    $('.delete_link').on('click', function(){
      var id = $(this).attr("rel");

      var delete_url = "posts?delete=" + id + "";

      $(".modal_delete_link").attr("href", delete_url);

      $("#myModal").modal('show');
    });
  });

</script>
