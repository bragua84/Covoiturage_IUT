<?php

if(isset($_GET['immat'])){
  $voiture = ModelVoiture::select($_GET['immat']);

  $vImmat = htmlspecialchars($voiture->getImmatriculation());
  $vCouleur = htmlspecialchars($voiture->getCouleur());
  $vMarque = htmlspecialchars($voiture->getMarque());
}

 ?>

<form class="form-horizontal col-sm-offset-1 col-sm-10" method="post" action="?action=<?=$action?>&controller=<?=static::$object?>">
  <div class="form-group">
    <legend><?=$pagetitle?></legend>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="marque_id">Marque</label>
    <div class="col-sm-10">
      <input value="<?=$vMarque?>" class="form-control" type="text" placeholder="Ex : Ford" name="marque" id="marque_id" required/>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="couleur_id">Couleur</label>
    <div class="col-sm-10">
      <input value="<?=$vCouleur?>" class="form-control" type="text" placeholder="Ex : Rouge" name="couleur" id="couleur_id" required/>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="immat_id">Immatriculation</label>
    <div class="col-sm-10">
      <input value="<?=$vImmat?>" class="form-control" type="text" placeholder="Ex : 256AB34" name="immatriculation" id="immat_id" <?=$etat_immat?>/>
    </div>
  </div>
  <div class="form-group">
    <input type="submit" class="btn btn-defaut btn-block" value="Envoyer" />
  </div>
</form>
