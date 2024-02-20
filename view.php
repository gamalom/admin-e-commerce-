<?php
include 'connection.php';



if (isset($_POST['upload'])) {
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $price = mysqli_real_escape_string($conn, $_POST['price']);
  
  $image = $_FILES['image'];
  

  $img_loc = $image['tmp_name'];
  $img_name = $_FILES['image']['name'];
  $upload_path = 'uploadimage/' . $img_name;

  move_uploaded_file($img_loc, $upload_path);
  $image_des = "uploadimage/" . $img_name;

  // insert data with sanitized inputs
  $result = mysqli_query($conn, "INSERT INTO `producttb` (`id`,`product_name`, `product_price`, `product_image`, `quantity`) VALUES ('','$name', '$price', '$image_des', '')");
  if ($result) {
    echo "Data and image uploaded successfully to the database.";
} else {
    echo "Error: " . mysqli_error($conn);
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
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
  <!-- fetch date -->

  <div class="container">

  <table class="table">
  <thead>
    <tr>
      <th scope="col">S.N</th>
      <th scope="col">NAME</th>
      <th scope="col">PRICE</th>
      <th scope="col">IMAGE</th>
      <th scope="col">DELET</th>
      <th scope="col">UPDATE</th>
    
    </tr>
  </thead>
  <tbody>
  <?php
include 'connection.php';

$pic = mysqli_query($conn, "SELECT * FROM `producttb`"); 
$i=0;
while ($row = mysqli_fetch_array($pic)) {
  $i =$i+ 1;
  echo "
  <tr>
  <td> $i</td>
      <td> $row[product_name]</td> 
      <td> $row[product_price]</td> 
      <td> <img src='$row[product_image]' width='200px' height='110px' ></td>
      <td> <a href='delet.php?id=$row[id]' onclick=\"return confirm('Are you sure for order?')\" class='btn btn-danger'>delete</a></td>
      <td> <a href='update.php?id=$row[id]' class='btn btn-primary'>update </a></td>
  </tr>
  ";
}

?>

</table> 
    </div>
</body>
</html>