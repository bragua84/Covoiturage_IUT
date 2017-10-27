<?php
require_once (File::build_path(array('model', 'ModelVoiture.php'))); // chargement du modèle
class ControllerVoiture {

  protected static $object = 'voiture';

    public static function readAll() {
        $tab_v = ModelVoiture::selectAll();
        $view = 'list';
        $pagetitle = 'Liste des voitures';
        require(File::build_path(array('view','view.php')));  //"redirige" vers la vue
    }

    public static function read() {
      if(isset($_GET['immat'])){
        $v = ModelVoiture::select($_GET['immat']);
        if($v == NULL){
            $view = 'error';
            $pagetitle = 'Erreur 404';
            require(File::build_path(array('view','view.php')));  //"redirige" vers la vue
        }else{
            $view = 'detail';
            $pagetitle = 'Details d\'une voiture';
            require(File::build_path(array('view','view.php')));  //"redirige" vers la vue
        }
      }else{
          $view = 'error';
          $pagetitle = 'Erreur 404';
          require(File::build_path(array('view','view.php')));  //"redirige" vers la vue
      }
    }

    public static function create(){
        $view = 'update';
        $pagetitle = 'Création d\'une voiture';

        $vImmat = "";
        $vCouleur = "";
        $vMarque = "";

        $etat_immat = "required";
        $action = "created";
        require(File::build_path(array('view','view.php')));  //"redirige" vers la vue
    }

    public static function created(){
      if(isset($_POST['marque']) && isset($_POST['couleur']) && isset($_POST['immatriculation'])){
          $voiture = new ModelVoiture($_POST['marque'], $_POST['couleur'], $_POST['immatriculation']);
          $data = array(
              "immatriculation" => $_POST['immatriculation'],
              "couleur" => $_POST['couleur'],
              "marque" => $_POST['marque']
          );
          if($voiture->save($data)){
              $view = 'created';
              $pagetitle = 'Voiture créer | Liste des voitures';
              $tab_v = ModelVoiture::selectAll();
              require(File::build_path(array('view','view.php')));
          }else{
              $view = 'error';
              $pagetitle = 'Erreur 404';
              require(File::build_path(array('view','view.php')));  //"redirige" vers la vue
          }
      }else{
          $view = 'error';
          $pagetitle = 'Erreur 404';
          require(File::build_path(array('view','view.php')));  //"redirige" vers la vue
      }
    }

    public static function update(){
        $view = 'update';
        $pagetitle = 'Modification d\'une voiture';
        
        $etat_immat = 'readonly';
        $action = "updated";
        require(File::build_path(array('view','view.php')));  //"redirige" vers la vue
    }

    public static function updated(){
      if(isset($_POST['marque']) && isset($_POST['couleur']) && isset($_POST['immatriculation'])){
          $voiture = new ModelVoiture($_POST['marque'], $_POST['couleur'], $_POST['immatriculation']);
          $data = array(
              "immatriculation" => $_POST['immatriculation'],
              "couleur" => $_POST['couleur'],
              "marque" => $_POST['marque']
          );
          if($voiture->update($data)){
              $view = 'updated';
              $pagetitle = 'Voiture modifier | Liste des voitures';
              $tab_v = ModelVoiture::selectAll();
              require(File::build_path(array('view','view.php')));
          }else{
              $view = 'error';
              $pagetitle = 'Erreur 404';
              require(File::build_path(array('view','view.php')));  //"redirige" vers la vue
          }
      }else{
          $view = 'error';
          $pagetitle = 'Erreur 404';
          require(File::build_path(array('view','view.php')));  //"redirige" vers la vue
      }
    }

    /*public static function save(){
      if(isset($_POST['marque']) && isset($_POST['couleur']) && isset($_POST['immatriculation'])){
          $voiture = new ModelVoiture($_POST['marque'], $_POST['couleur'], $_POST['immatriculation']);
          if($voiture->update()){
              $view = 'updated';
              $pagetitle = 'Liste des voitures';
              $tab_v = ModelVoiture::selectAll();
              require(File::build_path(array('view','view.php')));
          }else{
              $view = 'error';
              $pagetitle = 'Erreur 404';
              require(File::build_path(array('view','view.php')));  //"redirige" vers la vue
          }
      }else{
          $view = 'error';
          $pagetitle = 'Erreur 404';
          require(File::build_path(array('view','view.php')));  //"redirige" vers la vue
      }
    }*/

    public static function delete(){
      if(isset($_GET['immat'])){
        if(ModelVoiture::delete($_GET['immat'])){
          $immat = "";
          $view = 'deleted';
          $pagetitle = 'Voiture supprimer | Liste des voitures';
          $tab_v = ModelVoiture::selectAll();
          require(File::build_path(array('view','view.php')));
        }else{
            $view = 'error';
            $pagetitle = 'Erreur 404';
            require(File::build_path(array('view','view.php')));  //"redirige" vers la vue
        }
      }else{
          $view = 'error';
          $pagetitle = 'Erreur 404';
          require(File::build_path(array('view','view.php')));  //"redirige" vers la vue
      }
    }
}
?>
