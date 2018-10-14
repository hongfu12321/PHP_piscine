<?php

include_once "Spaceship.class.php";

define("UP", 0);
define("RIGHT", 1);
define("DOWN", 2);
define("LEFT", 3);
define("LEFT_TURN", 0);
define("RIGHT_TURN", 1);

$arr = array(
  'name' => 'helltrain',
  'pos' => array(0, 0),
  'dir' => DOWN);
var_dump($arr);

$ship1 = new Spaceship($arr);

$ship1->detail();
$ship1->turn(RIGHT_TURN);
$ship1->detail();
// $ship1->move();
// $ship1->detail();
// $ship1->move();
// $ship1->detail();
$ship1->turn(RIGHT_TURN);
$ship1->detail();
// $ship1->move();
// $ship1->detail();
// $ship1->move();
// $ship1->detail();
$ship1->turn(RIGHT_TURN);
$ship1->detail();

?>
