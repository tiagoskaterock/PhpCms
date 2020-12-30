<?php    
  require('includes/admin_header.php');

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
        <!-- ID -->
        <td><?= $row['cat_id'] ?></td>

        <!-- Categoria -->
        <td><?= $row['cat_title'] ?></td>                    

        <!-- Botão delete -->
        <td>
          <a href="categories.php?delete=<?= $row['cat_id'] ?>">
          Delete
          </a>
        </td> 

        <!-- Botão edit -->
        <td>
          <a href="categories.php?edit=<?= $row['cat_id'] ?>">
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
      header("Location: categories.php");
    }
  }

  function update_categories(){
    global $connection;
    if (isset($_GET['edit'])){
      $cat_id = $_GET['edit'];
      require('includes/update_categories.php');
    }
  }


?>