<?php
session_start();
include("connection.php");

$query = "SELECT * FROM `orderfromcustomer` ";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Weekly Records</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="./style/add.css">
</head>
<body>
    <header>
        <a href="dashboard.php" class="logout-link">Admin Panel</a>
        <a href="logout.php" class="logout-link">Log Out</a>
    </header>
    
    <div class="sidebar">
        <ul>
            <li><a href="monthly.php">Monthly Order Details</a></li>
            <li><a href="weekly.php">Weekly Order Details</a></li>
            <li><a href="view.php">View List </a></li>
            <li><a href="add.php">Add New Content</a></li>
            <li><a href="order.php">Order from Customer</a></li>
        </ul>
    </div>  

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <hr>
                <center><h1>Weekly Records </h1></center>
                <hr>
                <table class="table table-dark table-striped">
                    <tr>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>

                    <?php
                    $today = date("Y-m-d");
                    $thirtyDaysAgo= date("Y-m-d", strtotime("-30 days", strtotime($today)));
                    $totalQuantity = 0;
                    $grandTotal = 0;

                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($row['order_date'] > $thirtyDaysAgo) {
                            $quantity = $row['quantity'];
                            $name = $row['product_name'];
                            $totalQuantity += $quantity;
                            $total = $row['total'];
                            $grandTotal += $total;

                            // Output each row within the loop
                            echo '
                            <tr>
                                <td>' . $name . '</td>
                                <td>' . $quantity . '</td>
                                <td>' . $total . '</td>
                            </tr>
                            ';
                        }
                    }
                    ?>

                    <tr> 
                        <th>Grand Total</th>
                        <th><?php echo $totalQuantity; ?></th>
                        <th><?php echo $grandTotal; ?></th>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJ"></script>
</body>
</html>
