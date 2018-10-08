<?php
include 'src/utils/insert_into_cart.php';

function delete_user($user_name)
{
    $conn = connect_mysql();
    /*delete*/
    $sql = "DELETE FROM users WHERE login = '$user_name'";
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}

if ($_POST['login'] && $_POST['submit'] == "delete")
{
    delete_user($_POST['login']);
    header("Location: http://localhost:8100/rush00/index.php?page=admin");
}
?>
