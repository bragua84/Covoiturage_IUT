<?php
require_once (File::build_path(array('model', 'ModelTrajet.php'))); // chargement du modèle
class ControllerTrajet {

  protected static $object = 'trajet';

    public static function readAll() {
        $tab_t = ModelTrajet::selectAll();     //appel au modèle pour gerer la BD
        $controller = 'trajet';
        $view = 'list';
        $pagetitle = 'Liste des trajets';
        require(File::build_path(array('view','view.php')));  //"redirige" vers la vue
    }

    public static function read() {
      if(isset($_GET['id'])){
        $t = ModelTrajet::select($_GET['id']);
        if($t == NULL){
            $view = 'error';
            $pagetitle = 'Erreur 404';
            require(File::build_path(array('view','view.php')));  //"redirige" vers la vue
        }else{
            $view = 'detail';
            $pagetitle = 'Details du trajet';
            require(File::build_path(array('view','view.php')));  //"redirige" vers la vue
        }
      }else{
          $view = 'error';
          $pagetitle = 'Erreur 404';
          require(File::build_path(array('view','view.php')));  //"redirige" vers la vue
      }
    }

    public static function delete(){
      if(isset($_GET['id'])){
        if(ModelTrajet::delete($_GET['id'])){
          $id = "";
          $view = 'deleted';
          $pagetitle = 'Trajet supprimer | Liste des trajets';
          $tab_t = ModelTrajet::selectAll();
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



    public static function create(){
        $view = 'update';
        $pagetitle = 'Ajout d\'un trajet';

        $tID = "";
        $tDepart = "";
        $tArrive = "";
        $tDate = "";
        $tNbplace = "";
        $tPrix = "";
        $tConducteur_login = "";

        $etat_id = "required";
        $action = "created";
        require(File::build_path(array('view','view.php')));  //"redirige" vers la vue
    }

    public static function created(){
        if(isset($_POST['id']) && isset($_POST['depart']) && isset($_POST['arrive']) && isset($_POST['date']) && isset($_POST['nbplace']) && isset($_POST['prix']) && isset($_POST['conducteur_login'])){
            $trajet = new ModelUtilisateur($_POST['id'], $_POST['depart'], $_POST['arrive'], $_POST['date'], $_POST['nbplace'], $_POST['prix'], $_POST['conducteur_login']);
            $data = array(
                "id" => $_POST['id'],
                "depart" => $_POST['depart'],
                "arrive" => $_POST['arrive'],
                "date" => $_POST['date'],
                "nbplace" => $_POST['nbplace'],
                "prix" => $_POST['prix'],
                "conducteur_login" => $_POST['conducteur_login']
            );
            if($trajet->save($data)){
                $view = 'created';
                $pagetitle = 'Trajet créer | Liste des trajets';
                $tab_u = ModelUtilisateur::selectAll();
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
        $pagetitle = 'Modification d\'un trajet';

        $etat_id = 'readonly';
        $action = "updated";
        require(File::build_path(array('view','view.php')));  //"redirige" vers la vue
    }

    public static function updated(){
        if(isset($_POST['id']) && isset($_POST['depart']) && isset($_POST['arrive']) && isset($_POST['date']) && isset($_POST['nbplace']) && isset($_POST['prix']) && isset($_POST['conducteur_login'])){
            $trajet = new ModelUtilisateur($_POST['id'], $_POST['depart'], $_POST['arrive'], $_POST['date'], $_POST['nbplace'], $_POST['prix'], $_POST['conducteur_login']);
            $data = array(
                "id" => $_POST['id'],
                "depart" => $_POST['depart'],
                "arrive" => $_POST['arrive'],
                "date" => $_POST['date'],
                "nbplace" => $_POST['nbplace'],
                "prix" => $_POST['prix'],
                "conducteur_login" => $_POST['conducteur_login']
            );
            if($trajet->update($data)){
                $view = 'updated';
                $pagetitle = 'Trajet modifier | Liste des trajets';
                $tab_t = ModelTrajet::selectAll();
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
