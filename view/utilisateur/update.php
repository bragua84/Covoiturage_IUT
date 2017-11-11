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
    <?php
    if(!$etat_mdp){
        ?>
        <div class="form-group">
            <label class="control-label col-sm-2" for="mdp_id">Mot de passe</label>
            <div class="col-sm-4">
                <input class="form-control" type="password" placeholder="Mot de passe" name="mdp" id="mdp_login"/>
            </div>
            <label class="control-label col-sm-2" for="mdp2_id">Confirmation de mot de passe</label>
            <div class="col-sm-4">
                <input class="form-control" type="password" placeholder="Mot de passe" name="mdp2" id="mdp2_login"/>
            </div>
        </div>
    <?php
    }
    if(Session::is_admin()){
        ?>

        <div class="form-group">
            <label class="control-label col-sm-2" for="admin_id">Privilège administrateur</label>
            <label class="radio-inline col-sm-offset-1 col-sm-1"><input type="radio" name="admin" value="1">Oui</label>
            <label class="radio-inline col-sm-1"><input type="radio" name="admin" checked value="0">Non</label>
        </div>
    <?php
    }
    ?>
  <div class="form-group">
    <input type="submit" class="btn btn-defaut btn-block" value="Envoyer" />
  </div>
</form>
