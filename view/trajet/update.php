<?php

if(isset($_GET['id'])){
    $trajet = ModelTrajet::select($_GET['id']);

    $tID = htmlspecialchars($trajet->get('id'));
    $tDepart = htmlspecialchars($trajet->get('depart'));
    $tArrive = htmlspecialchars($trajet->get('arrive'));
    $tDate = htmlspecialchars($trajet->get('date'));
    $tNbplaces = htmlspecialchars($trajet->get('nbplaces'));
    $tPrix = htmlspecialchars($trajet->get('prix'));
    $tConducteur_login = htmlspecialchars($trajet->get('conducteur_login'));
}else{
    $tID = "";
    $tDepart = "";
    $tArrive = "";
    $tDate = "";
    $tNbplaces = "";
    $tPrix = "";
    $tConducteur_login = "";
}

 ?>

<form class="form-horizontal col-sm-offset-1 col-sm-10" method="post" action="?action=<?=$action?>&controller=<?=static::$object?>">
    <div class="form-group">
        <legend><?=$pagetitle?></legend>
    </div>
    <input value="<?=$tID?>" readonly class="form-control hidden" type="text" name="id" id="idTrajet_id" type="hidden"/>
    <div class="form-group">
        <label class="control-label col-sm-2" for="depart_id">Ville de départ</label>
        <div class="col-sm-4">
            <input value="<?=$tDepart?>" class="form-control" type="text" placeholder="Ex : Paris" name="depart" id="depart_id" required/>
        </div>
        <label class="control-label col-sm-2" for="arrive_id">Ville d'arrivée</label>
        <div class="col-sm-4">
          <input value="<?=$tArrive?>" class="form-control" type="text" placeholder="Ex : Marseille" name="arrive" id="arrive_id" />
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="date_id">Date</label>
        <div class="col-sm-2">
            <input value="<?=$tDate?>" class="form-control" type="date" placeholder="Ex : 2000-12-31" name="date" id="date_id" />
        </div>
        <label class="control-label col-sm-2" for="nbplaces_id">Nombre de place</label>
        <div class="col-sm-2">
            <input value="<?=$tNbplaces?>" class="form-control" type="number" min="1" max="4" placeholder="Ex : 2" name="nbplaces" id="nbplaces_id" />
        </div>
        <label class="control-label col-sm-2" for="prix_id">Prix</label>
        <div class="col-sm-2">
            <input value="<?=$tPrix?>" class="form-control" type="number" min="1" max="99" placeholder="Ex : 15€" name="prix" id="prix_id" />
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="conducteur_login_id">Login Conducteur</label>
        <div class="col-sm-10">
            <input value="<?=$tConducteur_login?>" class="form-control" type="text" placeholder="Ex : nomp" name="conducteur_login" id="conducteur_login_id" />
        </div>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-defaut btn-block" value="Envoyer" />
    </div>
</form>
