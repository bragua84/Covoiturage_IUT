<?php

if(isset($_GET['login'])){
  $utilisateur = ModelUtilisateur::select($_GET['login']);

  $uLogin = htmlspecialchars($utilisateur->get('login'));
  $uNom = htmlspecialchars($utilisateur->get('nom'));
  $uPrenom = htmlspecialchars($utilisateur->get('prenom'));
}

 ?>

<form class="form-horizontal col-sm-offset-1 col-sm-10" method="post" action="?action=<?=$action?>&controller=<?=static::$object?>">
  <div class="form-group">
    <legend><?=$pagetitle?></legend>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="nom_id">Nom</label>
    <div class="col-sm-10">
      <input value="<?=$uNom?>" class="form-control" type="text" placeholder="Ex : Dupond" name="nom" id="nom_id" required/>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="prenom_id">Prénom</label>
    <div class="col-sm-10">
      <input value="<?=$uPrenom?>" class="form-control" type="text" placeholder="Ex : Michel" name="prenom" id="prenom_id" required/>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="login_id">Login</label>
    <div class="col-sm-10">
      <input value="<?=$uLogin?>" class="form-control" type="text" placeholder="Ex : dupontm" name="login" id="login_id" <?=$etat_login?>/>
    </div>
  </div>
  <div class="form-group">
    <input type="submit" class="btn btn-defaut btn-block" value="Envoyer" />
  </div>
</form>
