<?php

class Fighter{
  private $name;

  protected function __construct($str){
    $this->name = $str;
  }

  public function getName(){
    return $this->name;
  }
}

?>
