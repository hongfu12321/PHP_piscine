<?php

include 'src/utils/insert_into_cart.php';

if ($_POST['item'] && $_POST['number'])
 insert_into_cart($_POST['item'], $_POST['number']);

?>

<div class="items">
  <img src="img/items/boots.jpg" title="boots">
  <div>
    <p><h2>boots</h2>The boots feat kitties</p>
    <form action="" method="POST">
      <input type="radio" name="item" value="boots" checked>
      <input type="text" name="number" value="">
      <input type="submit" name="test" value="Buy it">
  	</form>
  </div>
</div>
<div class="items">
  <img src="img/items/slippers.jpg" title="slipper">
  <div>
    <p><h2>slippers</h2>As adorable as my teammate</p>
    <form action="" method="POST">
      <input type="radio" name="item" value="slipper" checked>
      <input type="text" name="number" value="">
      <input type="submit" name="buy" value="Buy it">
  	</form>
  </div>
</div>
<div class="items">
  <img src="img/items/skateboard.jpg" title="flat">
  <div>
    <p><h2>skateboard</h2>Only fancy stuff in the store</p>
    <form action="" method="POST">
      <input type="radio" name="item" value="flat" checked>
      <input type="text" name="number" value="">
      <input type="submit" name="buy" value="Buy it">
  	</form>
  </div>
</div>
