<?php
    $tID = htmlspecialchars($t->get('id'));
    $tDepart = htmlspecialchars($t->get('depart'));
    $tArrive = htmlspecialchars($t->get('arrive'));
    $tDate = htmlspecialchars($t->get('date'));
    $tNbplaces = htmlspecialchars($t->get('nbplaces'));
    $tPrix = htmlspecialchars($t->get('prix'));
    $tConducteur_login = htmlspecialchars($t->get('conducteur_login'));
?>
<div class="container">
    <div class="row">
        <div class="col-sm-3 well sm-well">
            ID: <span class="text-info"><?php echo $tID;?></span>
        </div>
        <div class="col-sm-offset-1 col-sm-3 well sm-well">
            Départ: <span class="text-info"><?php echo $tDepart;?></span>
        </div>
        <div class="col-sm-offset-1 col-sm-3 well sm-well">
            Arrivé: <span class="text-info"><?php echo $tArrive;?></span>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3 well sm-well">
            Date: <span class="text-info"><?php echo $tDate;?></span>
        </div>
        <div class="col-sm-offset-1 col-sm-3 well sm-well">
            Nombre de place(s): <span class="text-info"><?php echo $tNbplaces;?></span>
        </div>
        <div class="col-sm-offset-1 col-sm-3 well sm-well">
            Prix: <span class="text-info"><?php echo $tPrix;?></span>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-offset-4 col-sm-3 well sm-well">
            Login conducteur: <span class="text-info"><?php echo $tConducteur_login;?></span>
        </div>
    </div>
  <div class="row">
    <div class="col-sm-offset-1 col-sm-4">
      <a href="?action=update&controller=trajet&id=<?=$tID ?>" class="btn btn-warning btn-block" role="button">Modifier</a>
    </div>
    <div class="col-sm-offset-2 col-sm-4">
        <a href="?action=delete&controller=trajet&id=<?=$tID ?>" class="btn btn-danger btn-block" role="button">Supprimer</a>
    </div>
  </div>
</div>
