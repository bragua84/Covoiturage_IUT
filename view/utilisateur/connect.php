<form class="form-horizontal col-sm-offset-1 col-sm-10" method="post" action="?action=<?=$action?>&controller=<?=static::$object?>">
    <div class="form-group">
        <legend><?=$pagetitle?></legend>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="login_id">Login</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" placeholder="Ex : dupontm" name="login" id="login_id" required/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="mdp_id">Mot de passe</label>
        <div class="col-sm-10">
            <input class="form-control" type="password" name="mdp" id="mdp_id" required/>
        </div>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-defaut btn-block" value="Se connecter" />
    </div>
</form>