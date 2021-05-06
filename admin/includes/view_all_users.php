<?php

  // DELETE
  if (isset($_GET['delete'])) {
    $user_id = $_GET['delete'];
    $query = "DELETE FROM users WHERE user_id = $user_id";
    $delete_query = mysqli_query($connection, $query);
    ?>
    <script>alert('Usuário excluído com sucesso')</script>
    <script>window.location.href = "users"</script>
    <?php    
  }

?>

<table class="table table-bordered table-hover text-center" >
  <thead>
    <tr>
      <th style="text-align: center !important;">Usuário</th>
      <th style="text-align: center !important;">Primeiro Nome</th>
      <th style="text-align: center !important;">Sobrenome</th>
      <th style="text-align: center !important;">Email</th>
      <th style="text-align: center !important;">Papel</th>      
      <th style="text-align: center !important;" colspan="2">Ação</th>      
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

            <?php
              $papel = $row['user_role'];
              if ($papel == 'admin') {
                $papel_do_user = 'Administrador';
                $classe = 'text-success';
              }
              else{
                $papel_do_user = 'Inscrito';
                $classe = '';
              }
            ?>

            <td class="<?= $classe; ?>"><?= $papel_do_user ?></td> 

            <td>
              <a href="users?source=edit_user&user_id=<?= $row['user_id'] ?>">Editar</a>
            </td> 

            <td>
              <a href="users?delete=<?= $row['user_id'] ?>" onclick="return confirm('Deseja mesmo excluir este usuário?');">Excluir</a>
            </td> 
          </tr>         
          <?php

        }

  		?>
    
  </tbody>

</table>

