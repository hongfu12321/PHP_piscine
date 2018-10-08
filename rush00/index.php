<?php
  session_start();
  if ($_GET['page'] == "")        $page = "src/home.php";
  if ($_GET['page'] == "create")  $page = "src/user/create.php";
  if ($_GET['page'] == "login")   $page = "src/user/login.php";
  if ($_GET['page'] == "logout")  $page = "src/user/logout.php";
  if ($_GET['page'] == "admin")   $page = "src/user/admin.php";
  if ($_GET['page'] == "delete")  $page = "src/user/delete.php";
  if ($_GET['page'] == "cart")    $page = "src/cart/cart.php";
  if ($_GET['page'] == "modify")  $page = "src/cart/modif_cart.php";
  if ($_GET['page'] == "thanks")  $page = "src/cart/thanks.php";
  if ($_GET['page'] == "shirt")   $page = "src/items/shirt.php";
  if ($_GET['page'] == "pants")   $page = "src/items/pants.php";
  if ($_GET['page'] == "shoes")   $page = "src/items/shoes.php";
  include("install.php");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Welcome</title>
  <link href="css/index.css" rel="stylesheet" type"text/css">
  <link href="css/items.css" rel="stylesheet" type"text/css">
</head>
<body>
  <div class="menu">
    <div class="logo"><a href="index.php"><img src="https://i.imgflip.com/2jmpcn.jpg"></a></div>
    <ul><a href="index.php?page=shirt">shirt</a></ul>
    <ul><a href="index.php?page=pants">pants</a></ul>
    <ul><a href="index.php?page=shoes">shoes</a></ul>
  </div>
  <div class="main_field">
    <header class="header">
      <div></div>
      <div class="user">
        <div class="icon" title="cart">
          <a href="index.php?page=cart"><img src="https://cdn.iconscout.com/icon/premium/png-512-thumb/cart-267-357257.png"></a>
        </div>
        <div class="icon" id="usr" title="user">
          <?php
            if ($_SESSION['loggued_on_user'] == "")
              echo "<a href=\"index.php?page=login\">Login</a>";
            else{
              echo "<a href=\"index.php?page=logout\">".$_SESSION['loggued_on_user']."</a>";
            }
          ?>
        </div>
      </div>
    </header>
    <div class="container">
    <div class="admin">
      <?php
        if ($_SESSION['loggued_on_user'] == "admin")
          echo "<a href=\"index.php?page=admin\">only for admin</a>";
      ?>
    </div>
    <?php include $page; ?>
  </div>
  </div>
</body>
</html>
