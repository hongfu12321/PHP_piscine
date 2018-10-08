<?php
session_start();
include 'src/utils/insert_into_cart.php';

$conn = connect_mysql();
$result = mysqli_query($conn, "SELECT * FROM `cart`");
?>

<html>
<body>
    <table>
    <?php
    /*table header*/
    print("<tr>");
    print("<th>"."name"."</th><th>"."amount"."</th><th>"."eachprice"."</th><th>"."totalprice"."</th>");
    print("</tr>");
    /*table content*/
    $sum = 0;
    while ($row = mysqli_fetch_array($result))
    {
        if (empty($row))
        {
            print("cart is empty\n");
            break;
        }
        print("<tr>");
        print("<td>".$row['name']."</td><td>".$row['amount']."</td><td>".$row['eachprice']."</td><td>".$row['totalprice']."</td>");
        print(
        "<td>".
        "<form action=\"index.php?page=modify\" method=\"POST\">
            <input type=\"radio\" name=\"item\" value=\"" .$row['name']."\" checked>
            <input type=\"text\" name=\"amount\" value=\"\">
            <input class=\"btn\" type=\"submit\" name=\"submit\" value=\"modify\">
        </form>".
        "</tb>");
        $sum += $row['totalprice'];
        print("</tr>");
    }
    ?>
    </table>
    <div><?php print("<br \>"."Total: ".$sum."<br \>"); ?></div>
    <form action="" method="">
        <!-- <input type="submit" name="submit" value="Pay Your Shit"> -->
        <button type="submit" class="btn"><a href="index.php?page=thanks">Pay your shit</a></button>
    </form>
</body>
</html>

<?php
mysqli_close($conn);
?>
