<?php
require_once (File::build_path(array('model', 'ModelUtilisateur.php')));// chargement du modèle
class ControllerUtilisateur {

  protected static $object = 'utilisateur';

    public static function readAll() {
        $tab_u = ModelUtilisateur::selectAll();     //appel au modèle pour gerer la BD
        $controller = 'utilisateur';
        $view = 'list';
        $pagetitle = 'Liste des utilisateurs';
        require(File::build_path(array('view','view.php')));  //"redirige" vers la vue
    }

    public static function read() {
      if(isset($_GET['login'])){
        $u = ModelUtilisateur::select($_GET['login']);
        if($u == NULL){
            $view = 'error';
            $pagetitle = 'Erreur 404';
            require(File::build_path(array('view','view.php')));  //"redirige" vers la vue
        }else{
            $view = 'detail';
            $pagetitle = 'Details de l\'utilisateur';
            require(File::build_path(array('view','view.php')));  //"redirige" vers la vue
        }
      }else{
          $view = 'error';
          $pagetitle = 'Erreur 404';
          require(File::build_path(array('view','view.php')));  //"redirige" vers la vue
      }
    }

    public static function delete(){
      if(isset($_GET['login'])){
          if(Session::is_user($_GET[$login])){
              if(ModelUtilisateur::delete($_GET['login'])){
                  $login = "";
                  $view = 'deleted';
                  $pagetitle = 'Utilisateur supprimer | Liste des utilisateurs';
                  $tab_u = ModelUtilisateur::selectAll();
                  require(File::build_path(array('view','view.php')));
              }else{
                  $view = 'error';
                  $pagetitle = 'Erreur 404';
                  require(File::build_path(array('view','view.php')));  //"redirige" vers la vue
              }
          }else{
              self::connect();
          }
      }else{
          $view = 'error';
          $pagetitle = 'Erreur 404';
          require(File::build_path(array('view','view.php')));  //"redirige" vers la vue
      }
    }



    public static function create(){
        $view = 'update';
        $pagetitle = 'Ajout d\'un utilisateur';

        $uLogin = "";
        $uNom = "";
        $uPrenom = "";
        $etat_mdp = false;

        $etat_login = "required";
        $action = "created";
        require(File::build_path(array('view','view.php')));  //"redirige" vers la vue
    }

    public static function created(){
        if(isset($_POST['login']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mdp']) && isset($_POST['mdp2'])){
            if($_POST['mdp'] != $_POST['mdp2']){
                $view = 'error';
                $pagetitle = 'Erreur 404';
                require(File::build_path(array('view', 'view.php')));
            }
            $mdp = Security::chiffrer($_POST['mdp']);

            $utilisateur = new ModelUtilisateur($_POST['login'], $_POST['nom'], $_POST['prenom'], $mdp);
            $data = array(
                "login" => $_POST['login'],
                "nom" => $_POST['nom'],
                "prenom" => $_POST['prenom'],
                "mdp" => $mdp
            );
            if($utilisateur->save($data)){
                $view = 'created';
                $pagetitle = 'Utilisateur créer | Liste des utilisateurs';
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
        if(isset($_GET['login'])){
            $utilisateur = ModelUtilisateur::select($_GET['login']);

            $uLogin = htmlspecialchars($utilisateur->get('login'));
            $uNom = htmlspecialchars($utilisateur->get('nom'));
            $uPrenom = htmlspecialchars($utilisateur->get('prenom'));
        }
        if(Session::is_user($uLogin)){
            $view = 'update';
            $pagetitle = 'Modification d\'un utilisateur';
            $etat_mdp = true;
            $etat_login = 'readonly';
            $action = "updated";
            require(File::build_path(array('view','view.php')));  //"redirige" vers la vue
        }else{
            self::connect();
        }
    }

    public static function updated(){
        if(isset($_POST['login']) && isset($_POST['nom']) && isset($_POST['prenom'])){
            if(Session::is_user($_POST['login'])){
                $utilisateur = new ModelUtilisateur($_POST['login'], $_POST['nom'], $_POST['prenom']);
                $data = array(
                    "login" => $_POST['login'],
                    "nom" => $_POST['nom'],
                    "prenom" => $_POST['prenom']
                );
                if($utilisateur->update($data)){
                    $view = 'updated';
                    $pagetitle = 'Utilisateur modifier | Liste des utilisateurs';
                    $tab_u = ModelUtilisateur::selectAll();
                    require(File::build_path(array('view','view.php')));
                }else{
                    $view = 'error';
                    $pagetitle = 'Erreur 404';
                    require(File::build_path(array('view','view.php')));  //"redirige" vers la vue
                }
            }else{
                self::connect();
            }
        }else{
            $view = 'error';
            $pagetitle = 'Erreur 404';
            require(File::build_path(array('view','view.php')));  //"redirige" vers la vue
        }
    }

    public static function connect(){
        $view = 'connect';
        $pagetitle = 'Connection';
        $error = false;
        $action = "connected";
        require(File::build_path(array('view','view.php')));  //"redirige" vers la vue
    }

    public static function connected(){
        if(isset($_POST['login']) && isset($_POST['mdp'])){
            $mdp = Security::chiffrer($_POST['mdp']);
            if(ModelUtilisateur::checkPassword($_POST['login'], $mdp)){
                $_SESSION['login'] = $_POST['login'];
                $u = ModelUtilisateur::select($_POST['login']);
                $view = 'detail';
                $pagetitle = 'Details de l\'utilisateur';
                require(File::build_path(array('view','view.php')));
            }else{
                $view = 'connect';
                $pagetitle = 'Connection';
                $error = true;
                $action = "connected";
                require(File::build_path(array('view','view.php')));  //"redirige" vers la vue
            }
        }else{
            $view = 'connect';
            $pagetitle = 'Connection';
            $error = true;
            $action = "connected";
            require(File::build_path(array('view','view.php')));  //"redirige" vers la vue
        }
    }

    public static function deconnect(){
        if(isset($_SESSION)){
            session_unset();
            session_destroy();
            setcookie(session_name(),'',time()-1);
            self::readAll();
        }
    }

    /*public static function save(){
        if(isset($_POST['login']) && isset($_POST['nom']) && isset($_POST['prenom'])){
            $utilisateur = new ModelGamer($_POST['login'], $_POST['nom'], $_POST['prenom']);
            if($utilisateur->update()){
                $view = 'updated';
                $pagetitle = 'Liste des utilisateurs';
                $tab_u = ModelGamer::selectAll();
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
}
