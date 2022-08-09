<?php
error_reporting(0);
session_start();
date_default_timezone_set('Asia/Kolkata');

if($_SERVER['SERVER_NAME']=="localhost"){
    $conn = mysqli_connect("localhost","root","","car");
}else{

$output = '';
$rec_id = $_POST['id'];
 $conn = mysqli_connect("localhost","posigraph_yard","yard@posigraph.com","posigraph_yard");
}

?>