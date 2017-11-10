<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $pagetitle; ?></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
          .navbar {
            margin-bottom: 0;
            border-radius: 0;
          }

          .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            /* Set the fixed height of the footer here */
            height: 40px;
            line-height: 40px; /* Vertically center the text there */
            background-color: #222;
            color: #fff;
          }

          .list-group, form, .container{
            margin-top: 20px;
          }

          .list-group  a{
              text-decoration: none;
          }

          .list-group .no-deco{
            color: black;
          }
          .list-group .no-deco:over{
            color: black;
          }

          .list-group .btn{
            float: right;
            margin-left: 10px;
          }

          .list-group kbd{
            color: #fff;
          }

          .btn-create{
            float: none;
            width: 100%;
          }
        </style>
    </head>
    <body>
      <nav class="navbar navbar-inverse">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">TD Covoiturage !</a>
        </div>
        <div class="container-fluid">
          <ul class="nav navbar-nav">
            <li  class="<?php if(static::$object == "voiture"){echo 'active';}?>"><a href="index.php?action=readAll">Gestion des voitures</a></li>
            <li  class="<?php if(static::$object == "utilisateur"){echo 'active';}?>"><a href="index.php?action=readAll&controller=utilisateur">Gestion des utilisateurs</a></li>
            <li  class="<?php if(static::$object == "trajet"){echo 'active';}?>"><a href="index.php?action=readAll&controller=trajet">Gestion des trajets</a></li>
          </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if(!isset($_SESSION['login'])){
                    ?>
                    <li><a href="./index.php?action=connect&controller=utilisateur"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>
                <?php
                }else{
                    $prenom = ModelUtilisateur::select($_SESSION['login'])->get('prenom');
                    ?>
                    <li><a>Bonjour <?=$prenom?>!</a></li>
                    <li><a href="./index.php?action=deconnect&controller=utilisateur"><span class="glyphicon glyphicon-log-out"></span> Deconnexion</a></li>
                <?php
                }
                ?>
            </ul>
        </div>
      </nav>
<?php
// Si $controleur='voiture' et $view='list',
// alors $filepath="/chemin_du_site/view/voiture/list.php"
$filepath = File::build_path(array("view", static::$object, "$view.php"));
require $filepath;
?>
    </body>
    <footer class="footer container-fluid text-right">
      <p>
        Site de covoiturage de la F.Society
      </p>
    </footer>
</html>
