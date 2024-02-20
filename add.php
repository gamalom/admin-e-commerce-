<?php
include 'connection.php';

if (isset($_POST['upload'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image'];
    $img_loc = $image['tmp_name'];
    $img_name = $_FILES['image']['name'];
    $upload_path = 'uploadimage/' . $img_name;

    move_uploaded_file($img_loc, $upload_path);
    $image_des = "uploadimage/" . $img_name;

    // insert data with sanitized inputs
    mysqli_query($conn, "INSERT INTO `productdb` (`product_name`, `product_price`, `product_image`) VALUES ('$name', '$price', '$image_des')");
    header("Location: add.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> 
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
                        <li><a href="view.php">view list </a></li>
                        <li><a href="add.php">add new content</a></li>
                        <li><a href="order.php">order from customer</a></li>
                    </ul>
                </div>
                <center>
                  <hr>
    <h2>Make a New List in Menu.</h2>
    <hr>
  </center>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-4 custom-container shadow my-3">
        <div class="row">
          <div class="col">
            <form action="view.php" method="post" enctype="multipart/form-data">
              <div class="form-group mb-3 pb-2">
                <label for="name" class="mt-3 pt-2">Name:</label>
                <input type="text" name="name" required class="form-control">
              </div>
              <div class="form-group mb-3 pb-2">
                <label for="price">Price:</label>
                <input type="text" name="price" required class="form-control">
              </div>
              <div class="form-group mb-3 pb-2">
                <label for="image">Image:</label>
                <input type="file" name="image" required class="form-control">
              </div>
              <button type="submit" name="upload" class="btn btn-primary mb-3 pb-2">Add Data</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
