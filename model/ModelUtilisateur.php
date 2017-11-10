<?php

require_once(File::build_path(array('model', 'Model.php')));

    class ModelUtilisateur extends Model{

        protected static $object = 'utilisateur';
        protected static $primary = 'login';

        private $login;
        private $nom;
        private $prenom;
        private $mdp;

        function get($nom_attribut){
            return $this->$nom_attribut;
        }

        function set($nom_attribut, $valeur){
            $this->$nom_attribut = $valeur;
        }

        public function __construct($l = NULL, $n = NULL, $p = NULL, $mdp = NULL)  {
          if(!is_null($l) && !is_null($n) && !is_null($p) && !is_null($mdp)){
             $this->login = $l;
             $this->nom = $n;
             $this->prenom = $p;
             $this->mdp = $mdp;
          }
        }

        public static function checkPassword($login, $mdp_chiffre){}

        /*public function save(){
            try {
                $sql = "INSERT INTO utilisateur VALUES (:login, :nom, :prenom)";
                $req_prep = Model::$pdo->prepare($sql);

                $values = array(
                    "login" => $this->login,
                    "nom" => $this->nom,
                    "prenom" => $this->prenom
                );
                $req_prep->execute($values);
                return true;
            } catch (PDOException $e) {
                if (Conf::getDebug()) {
                    echo $e->getMessage(); // affiche un message d'erreur
                } else {
                    return false;
                }
            }
        }*/

        /*public function update(){
            try {
                $sql = "UPDATE utilisateur SET prenom=:prenom, nom=:nom WHERE login=:login";
                $req_prep = Model::$pdo->prepare($sql);

                $values = array(
                    "login" => $this->login,
                    "nom" => $this->nom,
                    "prenom" => $this->prenom
                );
                $req_prep->execute($values);
                return true;
            } catch (PDOException $e) {
                if (Conf::getDebug()) {
                    echo $e->getMessage(); // affiche un message d'erreur
                } else {
                    return false;
                }
            }
        }*/
    }

?>
