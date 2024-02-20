<?php
include_once 'connection.php';

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $Id = $_POST['id'];

    // Check if a new image is uploaded
    if (!empty($_FILES['image']['name'])) {
        $img_name = $_FILES['image']['name'];
        $img_loc = $_FILES['image']['tmp_name'];
        $upload_path = 'uploadimage/' . $img_name;

        // Move the uploaded image to the destination folder
        if (move_uploaded_file($img_loc, $upload_path)) {
            $image_des = "uploadimage/" . $img_name;

            // Update data with the new price and image
            $query = "UPDATE `producttb` SET `product_name`='$name', `product_price`='$price', `product_image`='$image_des' WHERE id='$Id'";
            mysqli_query($conn, $query);
        } else {
            echo "Image upload failed. Check file permissions and try again.";
        }
    } else {
        // Update data with only the new price, keeping the existing image
        $query = "UPDATE `producttb` SET `product_name`='$name', `product_price`='$price' WHERE id='$Id'";
        mysqli_query($conn, $query);
    }

    header("Location: view.php");
    exit();
}
?>
