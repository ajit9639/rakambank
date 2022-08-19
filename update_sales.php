<?php
include_once('includes/db.php');

$id = $_GET['idd'];
$status = $_GET['status'];
// $table = $_GET['table'];
// exit();
// echo "UPDATE `dsa` SET `approval`='disapproved' where `id`='$id'";exit;



    // echo "hello";
    $update = mysqli_query($conn , "UPDATE `dsa` SET `sales_executive`='$status' where `id`='$id'");    
    if($update){
        echo "<script>location.replace('registered_dsa.php');</script>";
        }   


?>