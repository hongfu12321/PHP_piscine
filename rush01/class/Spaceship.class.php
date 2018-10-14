<?php

class Spaceship{
  private $name;
  private $pos = array();
  private $dir;
  public  $live = 10;
  private $moveInit = 10;
  public  $move = 10;
  public  $flag = 1;

  public function __construct($arr){
    foreach ($arr as $key){
      if ($key == NUll){
        echo "Initial spaceship Fail!!!!\n";
        exit();
      }
    }
    $this->name = $arr['name'];
    $this->pos[0] = $arr['pos'][0];
    $this->pos[1] = $arr['pos'][1];
    $this->dir = $arr['dir'];
    echo ("Ready to fight!!! ". $this->name. PHP_EOL);
  }

  public function turn(int $turn){
    $this->dir = ($turn == 1) ? $this->dir + 1 : $this->dir - 1;
    if ($this->dir == -1) $this->dir = 3;
    if ($this->dir == 4) $this->dir = 0;
    $this->move--;
  }

  public function invalid_movement(){
    $tmp = $this->pos;
    switch ($this->dir) {
      case 0: $tmp[1]--; break;
      case 1: $tmp[0]++; break;
      case 2: $tmp[1]++; break;
      case 3: $tmp[0]--; break;
    }
    if ($tmp[0] < 0 || $tmp[1] < 0 || $tmp[0] >= 100 || $tmp[1] >= 150){
      echo "Invalid movement!". PHP_EOL;
      return (1);
    }
    return (0);
  }

  public function move(){
    if (!$this->invalid_movement()){
      switch ($this->dir) {
        case 0: $this->pos[1]--; break;
        case 1: $this->pos[0]++; break;
        case 2: $this->pos[1]++; break;
        case 3: $this->pos[0]--; break;
      }
      $this->move--;
    }
  }

  public function be_attacked(){
    return --$this->live;
  }

  public function detail(){
    echo "----------------------". PHP_EOL;
    echo ("name:      ". $this->name. PHP_EOL);
    echo ("position:  (". $this->pos[0]. ", ". $this->pos[1]. ")". PHP_EOL);
    echo ("direction: ");
    switch ($this->dir) {
      case 0: echo "up". PHP_EOL; break;
      case 1: echo "right". PHP_EOL; break;
      case 2: echo "down". PHP_EOL; break;
      case 3: echo "left". PHP_EOL; break;
    }
    echo ("movement:  ". $this->move. PHP_EOL);
    echo ("live:      ". $this->live. PHP_EOL);
    echo "----------------------". PHP_EOL;

  }
  public function doc(){
    echo (file_get_contents('Spaceship.doc.txt'). "\n");
  }
}

?>
