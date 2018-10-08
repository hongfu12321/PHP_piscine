<?php
include 'src/utils/insert_into_cart.php';

function modif_from_cart($item_name, $item_amount)
{
    $conn = connect_mysql();

    /*search if item exist in cart*/
    $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
    while ($row = mysqli_fetch_array($cart_query))
    {
        if ($row['name'] == $item_name)
        {
            if ($item_amount > 0)
            {
                $new_totalprice = $item_amount * $row['eachprice'];
                $sql = "UPDATE `cart` SET amount = '$item_amount', totalprice = '$new_totalprice'
                        WHERE id = $row[id]";
            }
            else
            {
                $sql = "DELETE FROM `cart` WHERE name = '$item_name'";
            }
        }
    }

    /*delete action*/
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}

if ($_POST['item'] && $_POST['amount'] && $_POST['submit'] == "modify")
{
    modif_from_cart($_POST['item'], $_POST['amount']);
    header("Location: http://localhost:8100/rush00/index.php?page=cart");
}
?>



Collapse 
