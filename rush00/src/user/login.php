<?php
session_start();

include 'src/utils/connect_mysql.php';

function auth($login, $passwd)
{
    /*database info.*/
    $conn = connect_mysql();
    /*finding match users account*/
    $hashed_passwd = hash("whirlpool", $passwd);
    $login_query = mysqli_query($conn, "SELECT * FROM `users`");
    $flag = 1;
    while ($row = mysqli_fetch_array($login_query)) {
        if ($row['login'] == $login && $row['passwd'] == $hashed_passwd) {
            return (TRUE);
        }
    }
    return (FALSE);
    mysqli_close($conn);
}

if ($_POST['login'] && $_POST['passwd'] && auth($_POST['login'], $_POST['passwd']) == TRUE)
{
    $_SESSION['loggued_on_user'] = $_POST['login'];
    header("Location: http://localhost:8100/rush00/index.php");
}
?>

<div>
  <h1>Login Page</h1>
	<form action="" method="POST" style="font-size:30px;">
    Username: <input type="text" name="login" value="">
    <br>
    Password: <input type="password" name="passwd" value="">
    <br>
    <input type="submit" name="submit" value="login" class="btn">
	</form>
  <div>
    <a href="index.php?page=create">New member</a>
  </div>
</div>
