<?php

class Tyrion extends Lannister{

  public function sleepWith($a){
    if ($a instanceof Stark)
      print ("Let's do this.". PHP_EOL);
    elseif ($a instanceof Lannister)
      print ("Not even if I'm drunk !". PHP_EOL);
  }
}


?>
