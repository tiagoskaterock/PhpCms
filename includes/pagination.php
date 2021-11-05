<ul class="pagination justify-content-center">
  <?php
  for ($i=1; $i <= $count ; $i++) { 
    if ($page == $i) {
      ?>
      <li class="active" ><a href="index?page=<?= $i ?>"><?= $i ?></a></li>
      <?php
    }
    else {
      ?>
      <li><a href="index?page=<?= $i ?>"><?= $i ?></a></li>
      <?php
    }
  }
  ?>
</ul>