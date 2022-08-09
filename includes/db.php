<?php
error_reporting(0);
session_start();
date_default_timezone_set('Asia/Kolkata');

if($_SERVER['SERVER_NAME']=="localhost"){
    $conn = mysqli_connect("localhost","root","","rakam_bank");
}else{
$servername = "localhost";
$username = "naamyaafoundation_yd";
$password = "Yard@123#";
$dbname = "naamyaafoundation_yd";
$output = '';
$rec_id = $_POST['id'];
 $conn = mysqli_connect($servername, $username, $password, $dbname);
}

?>