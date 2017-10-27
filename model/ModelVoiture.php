<?php

require_once(File::build_path(array('model', 'Model.php')));

class ModelVoiture extends Model{

  protected static $object = 'voiture';
  protected static $primary='immatriculation';

  private $marque;
  private $couleur;
  private $immatriculation;

  // un getter
  public function getMarque() {
       return $this->marque;
  }

  // un setter
  public function setMarque($marque2) {
       $this->marque = $marque2;
  }

  public function getCouleur() {
       return $this->couleur;
  }

  public function setCouleur($couleur2) {
       $this->couleur = $couleur2;
  }

  public function getImmatriculation() {
       return $this->immatriculation;
  }

  public function setImmatriculation($immatriculation2) {
        if(strlen($immatriculation2) <= 8){
            $this->immatriculation = $immatriculation2;
        }
  }

  // un constructeur
  public function __construct($m = NULL, $c = NULL, $i = NULL) {
    if (!is_null($m) && !is_null($c) && !is_null($i)) {
      // Si aucun de $m, $c et $i sont nuls,
      // c'est forcement qu'on les a fournis
      // donc on retombe sur le constructeur à 3 arguments
      $this->marque = $m;
      $this->couleur = $c;
      $this->immatriculation = $i;
    }
  }

  // une methode d'affichage.
  /*public function afficher() {
    echo '<ul><li>' . $this->marque . '</li>';
    echo '<li>' . $this->couleur . '</li>';
    echo '<li>' . $this->immatriculation . '</li></ul>';
  }*/

  /*public function save(){
    try {
      $sql = "INSERT INTO voiture VALUES (:imma, :marque, :couleur)";
      $req_prep = Model::$pdo->prepare($sql);

      $values = array(
          "imma" => $this->immatriculation,
          "marque" => $this->marque,
          "couleur" => $this->couleur
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
      $sql = "UPDATE voiture SET marque=:marque,couleur=:couleur WHERE immatriculation=:imma";
      $req_prep = Model::$pdo->prepare($sql);

      $values = array(
          "imma" => $this->immatriculation,
          "marque" => $this->marque,
          "couleur" => $this->couleur
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
