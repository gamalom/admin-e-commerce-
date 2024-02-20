<?php

include_once("connection.php");

$result = mysqli_query($conn, "SELECT * FROM `ordertb`  ");
if (!$result) {
    die("Database fetch failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="./style/dashboard2.css">
</head>
<body>
    <header>
    <a href="#" class="logout-link">Admin panel</a>
    <a href="logout.php" class="logout-link">Log Out</a>
    </header>
    
    <div class="container">
        <div class="sidebar">
            <ul>
                <li><a href="monthly.php">Monthly Order Details</a></li>
                <li><a href="weekly.php">Weekly Order Details</a></li>
                <li><a href="view.php">view list </a></li>
                <li><a href="add.php">add new content</a></li>
                <li><a href="order.php">order from customer</a></li>
            </ul>
        </div>
        <div class="content">
            
            <h1>Order Info</h1>
            
            <table>
                <tr>
                    <th>Name</th>
                    <!-- <th>Image</th> -->
                    <th> TableNumber </th>
                    <th> Customer Name</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
                <?php while ($row = mysqli_fetch_array($result)) { ?>
                            <tr>
                                <td><?php echo $row['product_name']; ?></td>
                                <td><?php echo $row['table']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <!-- <td><img src="<?php echo $row['product_image']; ?>" alt="Product Image" class="product-image"></td> -->
                                <td><?php echo $row['quantity']; ?></td>
                                <td>
                                    <a href="delete.php?id=<?php echo $row['id']; ?>" onClick="return confirm('Are you sure you want to confirm the order?')">Confirm</a>
                                </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>
