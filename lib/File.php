<?php

class File{

  public static function build_path($path_array){
    //$ROOT_FOLDER = "C:\Users\Mathias\GoogleDrive\Documents\Developpement\DevsWeb\wamp64\www\IUT\PHP\TD5";
    $DS = DIRECTORY_SEPARATOR;
    $ROOT_FOLDER = __DIR__ . $DS . '..';
    return $ROOT_FOLDER . $DS . join($DS, $path_array);
  }

}

?>
