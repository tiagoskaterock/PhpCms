<table class="table table-bordered table-hover" >
  <thead>
    <tr>
      <th class="text-center">Autor</th>
      <th class="text-center">Comentário</th>
      <th class="text-center">Email</th>
      <th class="text-center">Status</th>
      <th class="text-center">Postagem</th>
      <th class="text-center">Data</th>
      <th class="text-center"colspan="3">Ação</th>      
    </tr>
  </thead>

  <tbody>

    <?php

      // comentários de apenas uma postagem em específico usando get
      if (isset($_GET['post_id'])) {
        $post_id = $_GET['post_id'];
        $post_id = mysqli_real_escape_string($connection, $post_id);

      	// query 1 for comments
        $query = "SELECT * FROM comments WHERE comment_post_id = $post_id ORDER BY comment_id DESC";

      }

      // mostra todos comentários
      else {
        // query 1 for comments
        $query = "SELECT * FROM comments ORDER BY comment_id DESC";
      }

      // confere se existem resultados a serem mostrados
      $select_comments = mysqli_query($connection, $query); 

      $numero_de_resultados = $select_comments->num_rows;  

      // sem registros mostra mensagem
      if ($numero_de_resultados == 0) {
        if (isset($_GET['post_id'])) {
          ?>
          <h2 class="bg-warning">Nenhum comentário para esta postagem</h2>
          <?php
        }
        else {
          ?>
          <h2 class="bg-warning">Nenhum comentário no site</h2>
          <?php
        }
      }
      // com registros exibe registros
      else{
        while ($row = mysqli_fetch_assoc($select_comments)) { 
        	$comment_post_id = $row['comment_post_id'];
        	$comment_id = $row['comment_id'];
          ?>       

          <tr>

            <td><?= utf8_encode($row['comment_author']) ?></td>

            <td><?= utf8_encode($row['comment_content']) ?></td>

            <td><?= $row['comment_email'] ?></td>

            <!-- Status -->
            <?php 
              $status_do_comentario = $row['comment_status'];
              if ($status_do_comentario == 'approved') {
                $status_do_comment = 'Aprovado';
                $classe = 'text-success';
              }
              else{
                $status_do_comment = 'Reprovado';
                $classe = 'text-muted';
              }
            ?>
            <td class="<?= $classe ?>"><?= $status_do_comment ?></td>

            <!-- In response to -->
            <?php
            	// query 2 for post titles
            	// recupera o título do post de acordo com FK $comment_post_id
            	$query_2 = "SELECT * FROM posts WHERE post_id = $comment_post_id;";

            	$select_post_title = mysqli_query($connection, $query_2);

              if (mysqli_num_rows($select_post_title) == 0) {

                $sql_delete_comment = "DELETE FROM comments WHERE comment_id = $comment_id";

                if ($connection->query($sql_delete_comment) === TRUE) {
                  echo "Record deleted successfully";
                } else {
                  echo "Error deleting record: " . $connection->error;
                }
              }

            	while ($row_2 = mysqli_fetch_assoc($select_post_title)) {
            		$post_title = $row_2['post_title'];
            		$post_id = $row_2['post_id'];
            	}
            ?>

            <td><a href="../post?p_id=<?= $post_id; ?>"><?= $post_title; ?></a></td>

            <td><?= utf8_encode($row['comment_date']) ?></td>

            <td><a href="comments?approve=<?= $comment_id ?>">Aprovar</a></td>

            <td><a href="comments?unapprove=<?= $comment_id ?>">Reprovar</a></td>

            <td>
              <a href="comments?delete=<?= $comment_id ?>" 
                onclick="return confirm('Deseja mesmo excluir o comentários?')">
                Excluir
              </a>
            </td>
          </tr>

          <?php

        }  

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

		if (isset($_GET['post_id'])) {
      ?>
      <script>
        alert('O comentário foi aprovado com sucesso.');
        window.location.href = "comments?post_id=<?= $post_id ?>";
      </script>
      <?php   
    }
    else {
      ?>
      <script>
        alert('O comentário foi aprovado com sucesso.');
        window.location.href = "comments";
      </script>
      <?php 
    }
		
	}

	// UNAPPROVE
	if (isset($_GET['unapprove'])) {
		echo $_GET['unapprove'];
		$comment_id = $_GET['unapprove'];
		$query = "UPDATE comments SET comment_status = 'unapproved' 
							WHERE comment_id = $comment_id; ";
		$update_query = mysqli_query($connection, $query);

		if (isset($_GET['post_id'])) {      
      ?>
      <script>
        alert('O comentário não foi aprovado.');
        window.location.href = "comments?post_id=<?= $post_id ?>";
      </script>
      <?php   
    }
    else {
      ?>
      <script>
        alert('O comentário não foi aprovado.');
        window.location.href = "comments";
      </script>
      <?php 
    }
		
	}

	// DELETE
	if (isset($_GET['delete'])) {
		$comment_id = $_GET['delete'];
		$query = "DELETE FROM comments WHERE comment_id = $comment_id";
		$delete_query = mysqli_query($connection, $query);

    if (isset($_GET['post_id'])) {

      ?>
      <script>
        alert('O comentário foi excluído com sucesso.');
        window.location.href = "comments?post_id=<?= $post_id ?>";
      </script>
      <?php		
    }
    else {
      ?>
      <script>
        alert('O comentário foi excluído com sucesso.');
        window.location.href = "comments";
      </script>
      <?php 
    }


	}

?>