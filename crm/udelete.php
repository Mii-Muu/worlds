<?php 
include "connect.php";

$id = $_GET['id'];
$dlt=mysqli_query($spot, "DELETE FROM register WHERE id='$id'");
echo "<script>(window.location='usermaster.php');</script>";
?>