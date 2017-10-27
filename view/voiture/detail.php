<?php
  $vMarque = htmlspecialchars($v->getMarque());
  $vCouleur = htmlspecialchars($v->getCouleur());
  $vImmatriculation = htmlspecialchars($v->getImmatriculation());
?>
<div class="container">
  <div class="row">
    <div class="col-sm-3 well sm-well">
      Marque: <span class="text-info"><?php echo $vMarque;?></span>
    </div>
    <div class="col-sm-offset-1 col-sm-3 well sm-well">
      Couleur: <span class="text-info"><?php echo $vCouleur;?></span>
    </div>
    <div class="col-sm-offset-1 col-sm-3 well sm-well">
      Immatriculation: <span class="text-info"><?php echo $vImmatriculation;?></span>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-offset-1 col-sm-4">
      <a href="?action=update&immat=<?php echo $vImmatriculation ?>" class="btn btn-warning btn-block" role="button">Modifier</a>
    </div>
    <div class="col-sm-offset-2 col-sm-4">
      <a href="?action=delete&immat=<?php echo $vImmatriculation ?>" class="btn btn-danger btn-block" role="button">Supprimer</a>
    </div>
  </div>
</div>
