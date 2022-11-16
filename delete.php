<?php

include "conn.php"; // Using database connection file here

$Product_ID = $_GET['Product_ID']; // get id through query string

$del = mysqli_query($con,"delete from tbl_Product where Product_ID = '$Product_ID'");

if($del)
{
    mysqli_close($con); // Close connection
    header("location:admin_page.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>