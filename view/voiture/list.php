<div class="container">
  <div class="row">
    <ul class="list-group">
    <?php
    foreach ($tab_v as $v){
        $vImmatriculation = htmlspecialchars($v->getImmatriculation());
        $vImmatriculationURL = rawurlencode($v->getImmatriculation());
    ?>
          <li class="list-group-item">
            <a class="no-deco" href="?action=read&immat=<?php echo $vImmatriculationURL ?>">Voiture d'immatriculation <kbd><?php echo $vImmatriculation ?></kbd>.</a>
          </li>
    <?php
      }
    ?>
    </ul>
  </div>
  <div class="row">
    <a href="?action=create" class="btn btn-success btn-block" role="button">Créer une voiture</a>
  </div>
</div>
