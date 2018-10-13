<?php

class Jaime extends Lannister{

  public function sleepWith($a){
    if ($a instanceof Stark)
      print ("Let's do this.". PHP_EOL);
    elseif ($a instanceof Lannister){
      if ($a instanceof Tyrion)
        print ("Not even if I'm drunk !". PHP_EOL);
      elseif ($a instanceof Cersei)
        print ("With pleasure, but only in a tower in Winterfell, then.". PHP_EOL);
    }
  }
}


?>
