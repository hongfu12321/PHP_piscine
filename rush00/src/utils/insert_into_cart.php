<?php

include 'connect_mysql.php';
function insert_into_cart($item_name, $item_amount)
{
    $conn = connect_mysql();

    $insertnew_flag = 1;
    /*search if item exist in cart*/
    $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
    while ($row = mysqli_fetch_array($cart_query)) {
        if ($row['name'] == $item_name) {
            $item_price = $row['eachprice'];
            $new_amount = $item_amount + $row['amount'];
            $new_totalprice = $item_amount * $item_price + $row['totalprice'];
            $sql = "UPDATE `cart` SET amount = '$new_amount', totalprice = '$new_totalprice'
                    WHERE id = $row[id]";
            $insertnew_flag = 0;
        }
    }

    /*search item price*/
    if ($insertnew_flag == 1)
    {
        $product_query = mysqli_query($conn, "SELECT * FROM `products`");
        while ($row = mysqli_fetch_array($product_query)) {
            if ($row['name'] == $item_name) {
                $item_price = $row['price'];
                $item_totalprice = $item_amount * $item_price;
                $sql = "INSERT INTO `cart` (name, amount, eachprice, totalprice) VALUES ('$item_name', '$item_amount', '$item_price', '$item_totalprice')";
                break;
            }
        }
    }

    /*insert action*/
    if (mysqli_query($conn, $sql)) {
        echo "You got it!\n";
    }
    else {
        echo "Error insert record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}

?>
