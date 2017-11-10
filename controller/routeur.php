<?php
//require('../lib/File.php');
require_once(File::build_path(array('controller', 'ControllerVoiture.php')));
require_once(File::build_path(array('controller', 'ControllerUtilisateur.php')));
require_once(File::build_path(array('controller', 'ControllerTrajet.php')));
require_once(File::build_path(array('lib', 'Security.php')));

if(isset($_GET['action']))
{
  $action = $_GET['action'];
}else{
  $action = 'readAll';
}
if(isset($_GET['controller']))
{
  $controller = htmlspecialchars($_GET['controller']);
}else{
  $controller = 'voiture';
}
$controller_class = 'Controller' . ucfirst($controller);

if(class_exists($controller_class)){
  $allAction = get_class_methods($controller_class);
  if(in_array($action, $allAction)){
    $controller_class::$action();
  }else{
    require(File::build_path(array('view','voiture', 'error.php')));
  }
}else{
  require(File::build_path(array('view','voiture', 'error.php')));
}
?>
