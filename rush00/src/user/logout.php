<?php
session_start();
include 'src/utils/insert_into_cart.php';

if ($_SESSION['loggued_on_user'] !== "")
{
    unset($_SESSION['loggued_on_user']);
    $conn = connect_mysql();
    $sql = "DELETE FROM `cart`";

    /*delete action*/
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
    header("Location: http://localhost:8100/rush00/index.php");
}
else
{
    echo "ERROR\n";
}
?>
