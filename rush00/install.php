<?php
//include 'para.php';
/*database info.*/
$host = 'localhost:8500';
$user = 'root';
$pass = 'root';
$dbname = 'mystore';

/*create database*/
$conn = mysqli_connect($host, $user, $pass);
if(!$conn){
    die('Could not connect: '.mysqli_connect_error());
}
//echo "Connected successfully\n";
mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS $dbname");
mysqli_close($conn);

/*create table in database*/
$conn = mysqli_connect($host, $user, $pass, $dbname);
mysqli_query($conn, "CREATE TABLE IF NOT EXISTS users (id INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY, login VARCHAR(255) NOT NULL, passwd VARCHAR(255) NOT NULL)");
mysqli_query($conn, "CREATE TABLE IF NOT EXISTS products (id INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255) NOT NULL, price FLOAT(9) UNSIGNED, type VARCHAR(255))");
mysqli_query($conn, "CREATE TABLE IF NOT EXISTS cart (id INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255) NOT NULL, amount INT(9) UNSIGNED, eachprice FLOAT(9) UNSIGNED, totalprice FLOAT(9) UNSIGNED)");

/*add admin user*/
$login = 'admin';
$result = mysqli_query($conn, "SELECT * FROM users WHERE login LIKE '$login'");
if (!$result->num_rows)
{
  $adminpasswd = hash('whirlpool', "admin");
  mysqli_query($conn, "INSERT INTO users (login, passwd) VALUES ('$login', '$adminpasswd')");
}

/*add info to product table*/
$result = mysqli_query($conn, "SELECT * FROM products");
if (!$result->num_rows)
{
  mysqli_query($conn, "INSERT INTO products (name, price, type) VALUES ('t-shirt', '10', 'shirt')");
  mysqli_query($conn, "INSERT INTO products (name, price, type) VALUES ('shirt', '15', 'shirt')");
  mysqli_query($conn, "INSERT INTO products (name, price, type) VALUES ('sweater', '20', 'shirt')");
  mysqli_query($conn, "INSERT INTO products (name, price, type) VALUES ('jeans', '20', 'pants')");
  mysqli_query($conn, "INSERT INTO products (name, price, type) VALUES ('short', '30', 'pants')");
  mysqli_query($conn, "INSERT INTO products (name, price, type) VALUES ('cotton', '40', 'pants')");
  mysqli_query($conn, "INSERT INTO products (name, price, type) VALUES ('boots', '10', 'shoes')");
  mysqli_query($conn, "INSERT INTO products (name, price, type) VALUES ('slipper', '5', 'shoes')");
  mysqli_query($conn, "INSERT INTO products (name, price, type) VALUES ('flat', '20', 'shoes')");
}

mysqli_close($conn);
//echo "database installed\n";
?>
