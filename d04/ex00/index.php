<?php

if (isset($_GET['login'], $_GET['passwd'], $_GET['submit']) && $_GET['submit'] === "OK")
{
	$_SESSION['login'] = $_GET['login'];
	$_SESSION['passwd'] = $_GET['passwd'];
	setcookie($)
}

?>
<html><body>
<form ...>
	Username: <input type="text" name="login" value="<?php echo $_SESSION['login'];?>" />
	<br />
	Password: <input type="text" name="passwd"  <?php echo "value=\"". $_SESSION['passwd']. "\"";?>/>
	<input type="submit" name="submit" value="OK" />
</form>
</body></html>
