<?php

class NightsWatch implements IFighter{
  private $fighters = array();

  public function recruit($f){
    $this->fighters[] = $f;
  }

  public function fight(){
    foreach ($this->fighters as $fighter) {
      if (method_exists(get_class($fighter), 'fight'))
        $fighter::fight();
    }
  }
}

?>
