<?php

abstract class House {
  public function introduce(){
    print("House ". $this->getHouseName(). " of ". $this->getHouseSeat());
    print(" : \"". $this->getHouseMotto(). "\"". PHP_EOL);
  }

  abstract function getHouseName();
  abstract function getHouseSeat();
  abstract function getHouseMotto();

}

?>
