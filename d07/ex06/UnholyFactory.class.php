<?php

class UnholyFactory{
  private $typeFighter = array();
  private $f_name;

  public function absorb($f){
    if ($f instanceof Fighter)
    {
      $this->f_name = $f->getName();
      foreach ($this->typeFighter as $value){
        if ($this->f_name == $value->getName())
        {
          print ("(Factory already absorbed a fighter of type ". $this->f_name. ")". PHP_EOL);
          return ;
        }
      }
      $this->typeFighter[] = $f;
      print ("(Factory absorbed a fighter of type ". $this->f_name. ")". PHP_EOL);
    }
    else {
      print("(Factory can't absorb this, it's not a fighter)". PHP_EOL);
    }
  }

  public function fabricate (string $requested_fighter){
    foreach ($this->typeFighter as $value){
      if ($requested_fighter == $value->getName())
      {
        print("(Factory fabricates a fighter of type ". $requested_fighter. ")". PHP_EOL);
        return $value;
      }
    }
    print("(Factory hasn't absorbed any fighter of type ". $requested_fighter. ")". PHP_EOL);
    return NULL;
  }
}


?>
