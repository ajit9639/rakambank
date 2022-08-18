<?php
include_once('includes/db.php');

$id = $_GET['id'];
$status = $_GET['status'];
$table = $_GET['table'];
// exit();
// echo "UPDATE `dsa` SET `approval`='disapproved' where `id`='$id'";exit;

if($table == 'dsa'){
if($status == 'approved'){
    // echo "hello";
    $update = mysqli_query($conn , "UPDATE `dsa` SET `approval`='approved' where `id`='$id'");    
    if($update){
        echo "<script>location.replace('registered_dsa.php');</script>";
        }   
}else{
    $update = mysqli_query($conn , "UPDATE `dsa` SET `approval`='disapproved' where `id`='$id'");    
    if($update){
        echo "<script>location.replace('registered_dsa.php');</script>";
        }
}
}
elseif($table == 'hr'){
    if($status == 'approved'){
        // echo "hello";
        $update = mysqli_query($conn , "UPDATE `hr` SET `approval`='approved' where `id`='$id'");    
        if($update){
            echo "<script>location.replace('registered_hr.php');</script>";
            }   
    }else{
        $update = mysqli_query($conn , "UPDATE `hr` SET `approval`='disapproved' where `id`='$id'");    
        if($update){
            echo "<script>location.replace('registered_hr.php');</script>";
            }
    }
}else{
    if($status == 'approved'){
        // echo "hello";
        $update = mysqli_query($conn , "UPDATE `sales` SET `approval`='approved' where `id`='$id'");    
        if($update){
            echo "<script>location.replace('registered_sales.php');</script>";
            }   
    }else{
        $update = mysqli_query($conn , "UPDATE `sales` SET `approval`='disapproved' where `id`='$id'");    
        if($update){
            echo "<script>location.replace('registered_sales.php');</script>";
            }
    }
}

?>