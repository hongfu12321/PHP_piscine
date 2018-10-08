<?php

include 'src/utils/insert_into_cart.php';

if ($_POST['item'] && $_POST['number'])
 insert_into_cart($_POST['item'], $_POST['number']);

?>

<div class="items">
  <img src="img/items/t_shirt.jpg" title="t-shirt">
  <div>
    <p><h2>T-shirt</h2>My pen is bigger than yours!!!</p>
    <form action="" method="POST">
      <input type="radio" name="item" value="t-shirt" checked>
      <input type="text" name="number" value="">
      <input type="submit" name="buy" value="Buy it">
  	</form>
  </div>
</div>
<div class="items">
  <img src="img/items/shirt.jpg" title="shirt">
  <div>
    <p><h2>shirt</h2>Normal sexy~</p>
    <form action="" method="POST">
      <input type="radio" name="item" value="shirt" checked>
      <input type="text" name="number" value="">
      <input type="submit" name="buy" value="Buy it">
  	</form>
  </div>
</div>
<div class="items">
  <img src="img/items/sweater.jpg" title="sweater">
  <div>
    <p><h2>sweater</h2>Only for real coder ~</p>
    <form action="" method="POST">
      <input type="radio" name="item" value="sweater" checked>
      <input type="text" name="number" value="">
      <input type="submit" name="buy" value="Buy it">
  	</form>
  </div>
</div>
