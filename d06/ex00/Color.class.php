<?php

class Color
{
	public $red;
	public $green;
	public $blue;
	static $verbose = false;

	public function __construct ($color)
	{
		if (isset($color['red']) && isset($color['green']) && isset($color['blue']))
		{
			$this->red = intval($color['red']) % 256;
			$this->green = intval($color['green']) % 256;
			$this->blue = intval($color['blue']) % 256;
		}
		else if (isset($color['rgb']))
		{
			$rgb = intval($color['rgb']);
      $this->red = $rgb / 65281 % 256;
      $this->green = $rgb / 256 % 256;
      $this->blue = $rgb % 256;
		}
		else
			invalidInput();
		if (Self::$verbose == True)
			printf("Color = (red: %3d, green: %3d, blue: %3d) constructed.\n", $this->red, $this->green, $this->blue);
	}

	public function __destruct ()
	{
		if (Self::$verbose == True)
			printf("Color = (red: %3d, green: %3d, blue: %3d) destructed.\n", $this->red, $this->green, $this->blue);
	}

	function __toString()
	{
		return sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue);
	}

	private function invalidInput() {
		echo "Invalid input" . PHP_EOL;
		exit(1);
	}

	public function add(Color $col)
  {
      return (new Color(array('red' => $this->red + $col->red, 'green' => $this->green + $col->green, 'blue' => $this->blue + $col->blue)));
  }
  public function sub(Color $col)
  {
      return (new Color(array('red' => $this->red - $col->red, 'green' => $this->green - $col->green, 'blue' => $this->blue - $col->blue)));
  }
  public function mult($mult)
  {
      return (new Color(array('red' => $this->red * $mult, 'green' => $this->green * $mult, 'blue' => $this->blue * $mult)));
  }

  public static function doc()
  {
      $read = fopen("Color.doc.txt", 'r');
      echo "\n";
      while ($read && !feof($read))
          echo fgets($read);
      echo "\n";
  }

}


?>
