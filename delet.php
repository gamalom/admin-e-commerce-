<?php

include("connection.php");


 $Id = $_GET['id'];


$result = mysqli_query($conn, "DELETE FROM `producttb` WHERE id = $Id");
echo"<script>alert('Product has been removed.....!')</script>"; 

header("Location:view.php");

?>