<?php
include("connection.php");

// Getting id of the data from URL
$id = $_GET['id'];

// Fetching the data based on id
$query = "SELECT * FROM `ordertb` WHERE id = '$id'";
$result = mysqli_query($conn, $query);

if ($result) {
    // Fetching data
    $row = mysqli_fetch_assoc($result);

    // Storing values in variables
    $id = $row['id'];
    $name = $row['product_name'];
    $quantity = $row['quantity'];
    $price = $row['product_price'];
    $image = $row['product_image'];

    // Calculating total
    $total = $quantity * $price;

    // Inserting into orderfromcustomer
    $insertQuery = "INSERT INTO `orderfromcustomer` (`id`, `product_name`, `product_price`, `product_image`, `quantity`, `order_date`, `total`) VALUES ('$id', '$name', '$price', '$image', '$quantity', NOW(), '$total')";
    $insertResult = mysqli_query($conn, $insertQuery);
  

    // Deleting the record from the table
    $deleteQuery = "DELETE FROM ordertb WHERE id = '$id'";
    mysqli_query($conn, $deleteQuery);

    // Redirect to the display page (dashboard.php)
    header("Location: dashboard.php");
} else {
    echo "Error fetching data: " . mysqli_error($conn);
}
?>
