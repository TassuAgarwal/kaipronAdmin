<?php
session_start();
ini_set("display_errors", "1");
error_reporting(E_ALL);
include '../connection.php';

if (isset($_GET['product_id'])) {

    $delete = $_GET['product_id'] ;
   
   $sql = "Delete from product where product_id = '$delete'" ;

   $res = mysqli_query($conn , $sql);

   if($res)
   {
  $_SESSION['status'] = "Image Deleted";
  header("location:product.php");
 } 
   else{
    echo "Something Went wrong";
   }

}

?>