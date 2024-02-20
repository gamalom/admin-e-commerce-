<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Product</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
      <link rel="stylesheet" href="./style/update.css">
  <style>
    .main {
      margin-top: 50px;
    }
  </style>
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
                    </ul>
                </div>
 
  <?php
    include 'connection.php';
    $Id = $_GET['id'];
    $record = mysqli_query($conn, "SELECT * FROM `producttb` WHERE id = $Id");
    $data = mysqli_fetch_array($record);     
  ?>
   <div>
   <hr>
    <h2 class=" text-center text-capitalize "><strong>update the menu</strong></h2>
    <hr>
  <div class="container">
    <div class="main">
      <form action="update1.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="name" class="form-label">Name:</label>
          <input type="text" class="form-control" name="name" value="<?php echo $data['product_name'];?>">
        </div>
        
        <div class="mb-3">
          <label for="price" class="form-label">Price:</label>
          <input type="text" class="form-control" name="price" value="<?php echo $data['product_price'];?>">
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Image:</label>
          <input type="file" class="form-control" name="image">
          <img src="<?php echo $data['product_image'];?>" width='200px' height='110px' class="mt-2">
        </div>
        <input type="hidden" value="<?php echo $data['id'];?>" name="id">
        <button type="submit" class="btn btn-primary" name="update">Update</button>
      </form>
    </div>
  </div>
  <div>
</body>
</html>
