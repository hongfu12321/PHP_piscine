<?php
session_start();
include 'src/utils/insert_into_cart.php';

if ($_SESSION['loggued_on_user'] !== 'admin')
{
    header("Location: http://localhost:8100/rush00/login.php");
}
$conn = connect_mysql();
$result = mysqli_query($conn, "SELECT * FROM `users`");
?>

<html>
<body>
    <table>
    <?php
    /*table header*/
    print("<tr>");
    print("<th>"."User"."</th>");
    print("</tr>");
    /*table content*/
    $sum = 0;
    while ($row = mysqli_fetch_array($result))
    {
        if (empty($row))
        {
            print("User is empty\n");
            break;
        }
        if ($row['login'] != 'admin')
        {
          print("<tr>");
          print("<td>".$row['login']."</td>");
          print(
          "<td>".
          "<form action=\"index.php?page=delete\" method=\"POST\">
              <input type=\"radio\" name=\"login\" value=\"" .$row['login']."\" checked>
              <input class=\"btn\" type=\"submit\" name=\"submit\" value=\"delete\">
          </form>".
          "</tb>");
          $sum += $row['totalprice'];
          print("</tr>");
      }
    }
    ?>
    </table>
</body>
</html>

<?php
mysqli_close($conn);
?>
