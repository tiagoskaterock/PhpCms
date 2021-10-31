<!-- Blog Categories Well -->
<div class="well">

  <?php

  $query = "SELECT * FROM categories;";
  $select_categories_sidebar = mysqli_query($connection, $query);                    
  ?>

  <h4>Blog Categories</h4>

  <div class="row">
    <div class="col-lg-12">
      <ul class="list-unstyled">

        <?php

          // mostra categorias
          while ($row = mysqli_fetch_assoc($select_categories_sidebar)) {
            $the_cat_id = $row['cat_id'];
            ?>
            <li>
              <a 
              <?php 
                // destaca categoria ativa
                if (isset($_GET['category']) && $_GET['category'] == $the_cat_id): ?>
                class="text-warning"   
                <?php endif ?>          
                href="category?category=<?= $the_cat_id ?>"><?= $row['cat_title']; ?>
              </a>
            </li>
            <?php
          } 
        ?>

      </ul>

    </div>

  </div>
  <!-- /.row -->

</div>