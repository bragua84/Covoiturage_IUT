<div class="container">
  <div class="row">
    <ul class="list-group">
    <?php
    foreach ($tab_u as $u){
        $uLogin = htmlspecialchars($u->get('login'));
        $uLoginURL = rawurlencode($u->get('login'));
    ?>
          <li class="list-group-item">
            <a class="no-deco" href="?action=read&controller=utilisateur&login=<?php echo $uLoginURL ?>">Login utilisateur <kbd><?php echo $uLogin ?></kbd>.</a>
          </li>
    <?php
      }
    ?>
    </ul>
  </div>
  <div class="row">
    <a href="?action=create&controller=<?=static::$object?>" class="btn btn-success btn-block" role="button">Ajouter un utilisateur</a>
  </div>
</div>
