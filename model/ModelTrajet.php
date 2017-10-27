<?php

require_once(File::build_path(array('model', 'Model.php')));

    class ModelTrajet extends Model {

        protected static $object = 'trajet';
        protected static $primary = 'id';

        private $id;
        private $depart;
        private $arrive;
        private $date;
        private $nbplaces;
        private $prix;
        private $conducteur_login;

        function get($nom_attribut){
            return $this->$nom_attribut;
        }

        function set($nom_attribut, $valeur){
            $this->$nom_attribut = $valeur;
        }

        public function __construct($i = NULL, $dep = NULL, $arr = NULL, $dat = NULL, $nbp = NULL, $pri = NULL, $con = NULL)  {
          if (!is_null($i) && !is_null($dep) && !is_null($arr) && !is_null($dat) && !is_null($nbp) && !is_null($pri) && !is_null($con)) {
           $this->id = $i;
           $this->depart = $dep;
           $this->arrive = $arr;
           $this->date = $dat;
           $this->nbplaces = $nbp;
           $this->prix = $pri;
           $this->conducteur_login = $con;
         }
        }

        /*public static function getAllTrajet(){
          $rep = Model::$pdo->query('SELECT * FROM trajet');
          $tab_trajet = $rep->fetchALl(PDO::FETCH_CLASS, 'trajet');
          if(!empty($tab_trajet)){
              echo '<h1>Listes des trajets:</h1></br>';
              echo '<ul>';
              foreach($tab_trajet as $num => $trajet){
                  echo '<li>Trajet ' . $num . ':';
                  $trajet->afficher();
                  echo '</li>';
              }
              echo '</ul>';
          }else{
              echo '<p>Aucune trajet n\'est présente</p>';
          }
        }*/

        /*public function afficher() {
            echo '<ul><li>Id: ' . $this->id . '</li>';
            echo '<li>Départ: ' . $this->depart . '</li>';
            echo '<li>Arrivé: ' . $this->arrive . '</li>';
            echo '<li>Date: ' . $this->date . '</li>';
            echo '<li>Prix: ' . $this->prix . '€</li>';
            echo '<li>Nombres de places: ' . $this->nbplaces . '</li>';
            echo '<li>Login du conducteur: ' . $this->conducteur_login . '</li></ul>';
        }*/

        public static function findPassagers($id) {
            try {
              $sql = "SELECT * FROM utilisateur U INNER JOIN passager P ON p.utilisateur_login = U.login INNER JOIN trajet T ON t.id = P.trajet_id WHERE T.id = :id_trajet";
              $req_prep = Model::$pdo->prepare($sql);
              $values = array(
                  "id_trajet" => $id,
              );

              $req_prep->execute($values);
              $req_prep->setFetchMode(PDO::FETCH_CLASS, 'utilisateur');
              $tab_utilisateur = $req_prep->fetchAll();
              if (empty($tab_utilisateur))
                  return false;
              return $tab_utilisateur;
            } catch (PDOException $e) {
              if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
              } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
              }
              die();
            }
        }

        /*public static function deletePassager($data) {
          try {

            $login = $data['utilisateur_login'];
            $trajet = $data['trajet_id'];
            $sql = "DELETE FROM passager WHERE trajet_id = :id_trajet AND utilisateur_login = :login_utilisateur";
            $req_prep = Model::$pdo->prepare($sql);
            $values = array(
                "login_utilisateur" => $login,
                "id_trajet" => $trajet
            );

            $req_prep->execute($values);
          } catch (PDOException $e) {
            if (Conf::getDebug()) {
              echo $e->getMessage(); // affiche un message d'erreur
            } else {
              echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
          }
        }*/
    }

?>
