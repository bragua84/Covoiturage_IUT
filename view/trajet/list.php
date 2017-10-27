<div class="container">
  <div class="row">
    <ul class="list-group">
    <?php
    foreach ($tab_t as $t){
        $tID = htmlspecialchars($t->get('id'));
        $tIDURL = rawurlencode($t->get('id'));
    ?>
          <li class="list-group-item">
            <a class="no-deco" href="?action=read&controller=<?=static::$object?>&id=<?php echo $tIDURL ?>">ID Trajet <kbd><?php echo $tID ?></kbd>.</a>
          </li>
    <?php
      }
    ?>
    </ul>
  </div>
  <div class="row">
    <a href="?action=create&controller=<?=static::$object?>" class="btn btn-success btn-block" role="button">Ajouter un trajet</a>
  </div>
</div>
