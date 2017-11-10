<?php
  $uLogin = htmlspecialchars($u->get('login'));
  $uNom = htmlspecialchars($u->get('nom'));
  $uPrenom = htmlspecialchars($u->get('prenom'));
  $uLoginURL = rawurlencode($u->get('login'));
?>
<div class="container">
  <div class="row">
    <div class="col-sm-3 well sm-well">
      Login: <span class="text-info"><?php echo $uLogin;?></span>
    </div>
    <div class="col-sm-offset-1 col-sm-3 well sm-well">
      Nom: <span class="text-info"><?php echo $uNom;?></span>
    </div>
    <div class="col-sm-offset-1 col-sm-3 well sm-well">
      Prénom: <span class="text-info"><?php echo $uPrenom;?></span>
    </div>
  </div>
    <?php

    if(Session::is_user($uLogin)){
        ?>
        <div class="row">
            <div class="col-sm-offset-1 col-sm-4">
                <a href="?action=update&controller=utilisateur&login=<?=$uLoginURL ?>" class="btn btn-warning btn-block" role="button">Modifier</a>
            </div>
            <div class="col-sm-offset-2 col-sm-4">
                <a href="?action=delete&controller=utilisateur&login=<?=$uLoginURL ?>" class="btn btn-danger btn-block" role="button">Supprimer</a>
            </div>
        </div>
    <?php
    }

    ?>
</div>
