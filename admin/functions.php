<?php

require_once('../includes/db.php');

function confere_se_e_admin() {
  if ($_SESSION['user_role'] != 'admin') {
    ?>
    <script>
      window.location.href = '..';
    </script>
    <?php
  }
}

function users_online() {

  if (isset($_GET['online_users'])) {
    
    global $connection;

    session_start();

    $session = session_id();
    $time = time();
    $time_out_in_seconds = 2;
    $time_out =  $time - $time_out_in_seconds;

    $query = "SELECT * FROM users_online WHERE session = '$session'";

    $send_query = mysqli_query($connection, $query);

    $count = mysqli_num_rows($send_query);

    if ($count == NULL) {
      mysqli_query($connection, "INSERT INTO users_online(session, time) VALUES ('$session', '$time')");
    }
    else {
      mysqli_query($connection, "UPDATE users_online SET `time` = $time WHERE session = '$session'");
    }

    $users_online_query = mysqli_query($connection, "SELECT * FROM users_online WHERE `time` > '$time_out'");

    $count_user = mysqli_num_rows($users_online_query);

    echo $count_user;

  } // get

} // function






users_online();

function mostra_grafico_de_colunas(){
  ?>
  <div class="row">
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([                        
          ['', ''],

          <?php

            $element_text = ['Posts Publicados', 'Posts Rascunho', 'Comentários Aprovados', 'Comentários Em Espera', 'Administradores', 'Inscritos', 'Categories'];

            $element_count = [mostra_total_posts_publicados(), mostra_total_posts_rascunho(), mostra_total_comentarios_aprovados(), mostra_total_comentarios_NAO_aprovados(), mostra_total_administradores(), mostra_total_inscritos(), mostra_total_categorias()];

            for ($i = 0; $i < count($element_text); $i++) { 
                echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
            }


          ?> 

         // ['Posts', 1000],
        ]);

        var options = {
          chart: {
            title: 'Estatísticas em <?php echo date('d/m/Y'); ?>',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </div>

  <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
  <?php
}

function mostra_cartoes_de_estatisticas(){
  ?>
  <div class="row">

      <?= mostra_cartao_posts() ?>

      <?= mostra_cartao_comentarios() ?>

      <?= mostra_cartao_usuarios() ?>

      <?=  mostrar_cartao_categorias() ?>

  </div>
  <?php
}

function mostrar_cartao_categorias(){
  ?>
  <div class="col-lg-3 col-md-6">
    <div class="panel panel-red">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-list fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class='huge'><?= mostra_total_categorias() ?></div>
                     <div>Categorias</div>
                </div>
            </div>
        </div>
        <a href="categories">
            <div class="panel-footer">
                <span class="pull-left">Ver Detalhes</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </div>
        </a>
    </div>
  </div>
  <?php
}

function mostra_total_categorias(){
  global $connection;
  $query_total_categories = "SELECT COUNT(cat_id) total_categories FROM categories;";
  $select_total_categories = mysqli_query($connection, $query_total_categories);   

  while ($row_total_categories = mysqli_fetch_assoc($select_total_categories)) { 
      $total_categories = $row_total_categories['total_categories'];
  }
  return $total_categories;
}

function mostra_total_inscritos(){
  global $connection;
  $query_subscriber_users = "SELECT COUNT(user_id) subscriber_users FROM users WHERE user_role = 'Subscriber'";
  $select_subscriber_users = mysqli_query($connection, $query_subscriber_users);   

  while ($row_subscriber_users = mysqli_fetch_assoc($select_subscriber_users)) { 
      $subscriber_users = $row_subscriber_users['subscriber_users'];
  }
  return $subscriber_users;
}

function mostra_total_administradores(){
  global$connection;
  $query_admin_users = "SELECT COUNT(user_id) admin_users FROM users WHERE user_role = 'admin'";
  $select_admin_users = mysqli_query($connection, $query_admin_users);   

  while ($row_admin_users = mysqli_fetch_assoc($select_admin_users)) { 
      $admin_users = $row_admin_users['admin_users'];
  }
  return $admin_users;
}

function mostra_cartao_usuarios(){
  global $connection;
  ?>
  <div class="col-lg-3 col-md-6">
    <div class="panel panel-yellow">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-user fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                <div class='huge'><?= mostra_total_usuarios() ?></div>
                    <div>Usuários</div>
                </div>
            </div>
        </div>
        <a href="users">
            <div class="panel-footer">
                <span class="pull-left">Ver Detalhes</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </div>
        </a>
    </div>
  </div>
  <?php
}

function mostra_total_usuarios(){
  global $connection;
  // query for users
  $query_total_users = "SELECT COUNT(user_id) total_users FROM users;";
  $select_total_users = mysqli_query($connection, $query_total_users);   

  while ($row_total_users = mysqli_fetch_assoc($select_total_users)) { 
      $total_users = $row_total_users['total_users'];
  }
  return $total_users;
}

function mostra_total_comentarios_NAO_aprovados(){
  global $connection;
  // query ONLY for NOT approved comments
  $query_unapproved_comments = "SELECT COUNT(comment_id) unapproved_comments FROM comments WHERE comment_status = 'Unapproved'";
  $select_unapproved_comments = mysqli_query($connection, $query_unapproved_comments);   
  while ($row_unapproved_comments = mysqli_fetch_assoc($select_unapproved_comments)) { 
      $unapproved_comments = $row_unapproved_comments['unapproved_comments'];
  }
  return $unapproved_comments;
}

function mostra_total_comentarios_aprovados(){
  global $connection;
  $query_approved_comments = "SELECT COUNT(comment_id) approved_comments FROM comments WHERE comment_status = 'Approved'";

  $select_approved_comments = mysqli_query($connection, $query_approved_comments);   

  while ($row_approved_comments = mysqli_fetch_assoc($select_approved_comments)) { 
      $approved_comments = $row_approved_comments['approved_comments'];
  }
  return $approved_comments;
}

function mostra_total_comentarios(){
  global $connection;
  $query_total_comments = "SELECT COUNT(comment_id) total_comments FROM comments;";
  $select_total_comments = mysqli_query($connection, $query_total_comments);   

  while ($row_total_comments = mysqli_fetch_assoc($select_total_comments)) { 
      $total_comments = $row_total_comments['total_comments'];
  }
  return $total_comments;
}

function mostra_cartao_comentarios(){
  ?>
  <div class="col-lg-3 col-md-6">
    <div class="panel panel-green">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-comments fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                 <div class='huge'><?= mostra_total_comentarios() ?></div>
                  <div>Comentários</div>
                </div>
            </div>
        </div>
        <a href="comments">
            <div class="panel-footer">
                <span class="pull-left">Ver Detalhes</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </div>
        </a>
    </div>
  </div>
  <?php
}

function mostra_cartao_posts(){
  ?>
  <div class="col-lg-3 col-md-6">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-file-text fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
              <div class='huge'><?= mostra_total_posts() ?></div>
                    <div>Posts</div>
                </div>
            </div>
        </div>
        <a href="posts">
            <div class="panel-footer">
                <span class="pull-left">Ver Detalhes</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </div>
        </a>
    </div>
  </div>
  <?php
}

function mostra_total_posts_rascunho(){
  global $connection;
  // query only for draft posts
  $draft_posts = "SELECT COUNT(post_id) draft_posts FROM posts WHERE post_status = 'Draft'";
  $select_draft_posts = mysqli_query($connection, $draft_posts);   
  while ($row_draft_posts = mysqli_fetch_assoc($select_draft_posts)) { 
      $draft_posts = $row_draft_posts['draft_posts'];
  }
  return $draft_posts;
}

function mostra_total_posts_publicados(){
  global $connection;
  // query only for published posts
  $published_posts = "SELECT COUNT(post_id) published_posts FROM posts WHERE post_status = 'Published'";
  $select_published_posts = mysqli_query($connection, $published_posts);   
  while ($row_published_posts = mysqli_fetch_assoc($select_published_posts)) { 
      $published_posts = $row_published_posts['published_posts'];
  }
  return $published_posts;
}

function mostra_total_posts(){
  // query for ALL posts
  global $connection;
  $query_total_posts = "SELECT COUNT(post_id) total_posts FROM posts;";
  $select_total_posts = mysqli_query($connection, $query_total_posts); 
  while ($row_total_posts = mysqli_fetch_assoc($select_total_posts)) { 
      $total_posts = $row_total_posts['total_posts'];
  }
  return $total_posts;
}

function boas_vindas_admin(){
  ?>
  <!-- Page Heading -->
  <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header">
              Bem vindo, 
              <small><?= ucfirst($_SESSION['username']) ?></small>
          </h1>


      </div>
  </div>
  <!-- /.row -->
  <?php
}

function confirm_query($result){
  global $connection;
  if (!$result) {
    die('QUERY FAILED: ' . mysqli_error($connection));
  }
  return $result;
}

function insert_categories(){

  global $connection;

  if (isset($_POST['submit'])) {

    $cat_title = $_POST['cat_title'];

    if ($cat_title == "" || empty($cat_title)) {
      echo '<h3>This field should not be empty</h3>';
    }

    else{
      $query = "INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES (NULL, '{$cat_title}'); ";

      $create_category_query = mysqli_query($connection, $query);

      if (!$create_category_query) {
        die('QUERY FAILED' . mysqli_error($connection));
      }
    }
  }    
}   

function find_all_categories(){

  global $connection;

  // FIND ALL CATEGORIES 
  $query = "SELECT * FROM categories;";
  $select_categories = mysqli_query($connection, $query);   

  while ($row = mysqli_fetch_assoc($select_categories)) { ?>
    <tr>

      <!-- Categoria -->
      <td><?= $row['cat_title'] ?></td>                    

      <!-- Botão delete -->
      <td>
        <a href="categories?delete=<?= $row['cat_id'] ?>">
        Delete
        </a>
      </td> 

      <!-- Botão edit -->
      <td>
        <a href="categories?edit=<?= $row['cat_id'] ?>">
        Edit
        </a>
      </td> 


    </tr>
    <?php 
  }                   
} 

function delete_categories(){

  global $connection;

  // DELETE QUERY
  if (isset($_GET['delete'])) {

    $the_cat_id = $_GET['delete'];

    $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";

    $delete_query = mysqli_query($connection, $query);

    // REFRESH
    header("Location: categories");
  }
}

function update_categories(){
  global $connection;
  if (isset($_GET['edit'])){
    $cat_id = $_GET['edit'];
    require('includes/update_categories.php');
  }
}

function show_post_buttons(){
  ?>
    <!-- Buttons -->
    <div class="form-group">  

      <!-- Add New Post Button -->
      <a href="posts?source=add_post">
        <button class="btn btn-primary">Nova Postagem</button>
      </a>

      <!-- See All Posts Button -->
      <a href="posts">
        <button class="btn btn-primary">Ver Postagens</button>
      </a>
    </div>
    <!-- End Buttons -->
  <?php
}

function show_user_buttons(){
  ?>
    <!-- Buttons -->
    <div class="form-group">  

      <!-- Add New User Button -->
      <a href="users?source=add_user">
        <button class="btn btn-primary">Criar Novo Usuário</button>
      </a>

      <!-- See All Users Button -->
      <a href="users">
        <button class="btn btn-primary">Ver Todos Usuários</button>
      </a>
    </div>
    <!-- End Buttons -->
  <?php
}



?>