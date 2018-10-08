<?php

include 'src/utils/insert_into_cart.php';

if ($_POST['item'] && $_POST['number'])
 insert_into_cart($_POST['item'], $_POST['number']);

?>

<div class="items">
  <img src="img/items/jeans.jpg" title="jeans">
  <div>
    <p><h2>jeans</h2>Dude! This is future!!!!</p>
    <form action="" method="POST">
      <input type="radio" name="item" value="jeans" checked>
      <input type="text" name="number" value="">
      <input type="submit" name="test" value="Buy it">
  	</form>
  </div>
</div>
<div class="items">
  <img src="img/items/short.jpg" title="short">
  <div>
    <p><h2>short</h2>Super super man's short</p>
    <form action="" method="POST">
      <input type="radio" name="item" value="short" checked>
      <input type="text" name="number" value="">
      <input type="submit" name="buy" value="Buy it">
  	</form>
  </div>
</div>
<div class="items">
  <img src="img/items/cotton.jpg" title="cotton">
  <div>
    <p><h2>cotton</h2>Warm ans sexy</p>
    <form action="" method="POST">
      <input type="radio" name="item" value="cotton" checked>
      <input type="text" name="number" value="">
      <input type="submit" name="buy" value="Buy it">
  	</form>
  </div>
</div>
