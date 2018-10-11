<?php

class Vector{
	private $_x, $_y, $_z, $_w = 0;
	static  $verbose = False;

	function __construct($arr){
		if (isset($arr['orig']) && $arr['orig'] instanceof Vertex){
			$this->_x = $arr['orig']->getX();
			$this->_y = $arr['orig']->getY();
			$this->_z = $arr['orig']->getZ();
			$this->_w = $arr['orig']->getW();
		}
		else {
			$this->_x = 0;
			$this->_y = 0;
			$this->_z = 0;
			$this->_w = 1;
		}
		if (isset($arr['dest']) && $arr['dest'] instanceof Vertex){
			$this->_x = $arr['dest']->getX() - $this->_x;
			$this->_y = $arr['dest']->getY() - $this->_y;
			$this->_z = $arr['dest']->getZ() - $this->_z;
			$this->_w = $arr['dest']->getW() - $this->_w;
		}
		else
			invalidInput();
		if (Self::$verbose) {
			printf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f ) constructed\n", $this->_x, $this->_y, $this->_z, $this->_w);
		}
	}

	function __destruct(){
		if (Self::$verbose) {
			printf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f ) destructed\n", $this->_x, $this->_y, $this->_z, $this->_w);
		}
	}

	function __toString()
	{
		return (sprintf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f )", $this->_x, $this->_y, $this->_z, $this->_w));
	}

  function invalidInput(){
		echo "Invalid input" . PHP_EOL;
		exit();
	}

	public function add(Vector $new_vector)
	{
		return new Vector(array('dest' => new Vertex(array('x' => $this->_x + $new_vector->_x, 'y' => $this->_y + $new_vector->_y, 'z' => $this->_z + $new_vector->_z))));
	}
	public function sub(Vector $new_vector)
	{
		return new Vector(array('dest' => new Vertex(array('x' => $this->_x - $new_vector->_x, 'y' => $this->_y - $new_vector->_y, 'z' => $this->_z - $new_vector->_z))));
	}
	public function opposite()
	{
		return new Vector(array('dest' => new Vertex(array('x' => $this->_x * -1, 'y' => $this->_y * -1, 'z' => $this->_z * -1))));
	}
	public function scalarProduct($k)
	{
		return new Vector(array('dest' => new Vertex(array('x' => $this->_x * $k, 'y' => $this->_y * $k, 'z' => $this->_z * $k))));
	}

  function doc(){
    echo (file_get_contents('Vector.doc.txt'). "\n");
  }
}


?>
