<?php
include_once('includes/header.php');
include_once('includes/check_login.php');
$uid=$_GET['id'];

    $uid=$_GET['id'];
    $data=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `unloading_vehicle_out_temp` where `id`='$uid'"));
    $unid = $data['unloading_ref_id'];
	$vno1 = $data['Vehicle_No'];
	$vno2 = $data['vehicle_type'];

if($type == 'delete'){
$del = mysqli_query($conn, "DELETE FROM `unloading_vehicle_out_temp` WHERE `id`='$id'");
if($del){
    echo "<script>alert('Data Deleted Successfully');
    window.location.replace('unloading_vehicle_entry.php?id=$unid');
    </script>";
}else{
    echo "<script>alert('Data Deleted Failed');</script>";
}
}
// vehicle out
if(isset($_POST['vehicle_out'])){
    $id=$_GET['id'];  
    $vehicle_no = $_POST['vehicle_no'];
  	$vehicle_type = $_POST['vehicle_type'];
    $trans_challan = $_POST['trans_challan'];
    $tare_weight = $_POST['tare_weight'];
    $gross_weight = $_POST['gross_weight'];
  	$net_weight = $gross_weight - $tare_weight;
    $kata_slip = $_POST['kata_slip'];     
  
    $insert = mysqli_query($conn , "INSERT INTO `unloading_vehicle_kata_entry_in`(`vehicle_no`, `vehicle_type`, `challn_no`, `tare_weight`, `gross_weight`,`net_weight`, `unloading_ref_id`, `status`) VALUES 
    ('$vehicle_no','$vehicle_type','$trans_challan','$tare_weight','$gross_weight','$net_weight','$unid','0')");
	
  //echo "UPDATE `unloading_vehicle_in_temp` SET `status`='1' WHERE `id`='$id'";exit();
  
     if($insert){
    mysqli_query($conn , "UPDATE `unloading_vehicle_in_temp` SET `status`='1' WHERE `id`='$uid'");
       
    echo "<script>alert('Success');
    window.location.replace('unloading_kata_entry.php?id=$unid');
    </script>";                    
    
}
}
?>



<body class="theme-red">
    <!-- Page Loader -->

    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <?php include_once('includes/sidebar.php'); ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <!-- <h2>Manage Material</h2> -->
            </div>

            <!-- Vertical Layout | With Floating Label -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="card">
                        <div class="header">
                            <h2 class="text-center">
                                Vehicle Out
                            </h2>

                        </div>
                        <div class="body">
                            <form id="sender_form" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id"
                                    value="<?php if(isset($_GET['id'])) { echo $data['id']; } ?>">


                                <div class="form-group form-float">
                                    <div class="form-line">
                                      <input type="text" id="vehicle_no" name="vehicle_no" class="form-control"
                                            value="<?php echo vehicle_no; ?>" readonly>                                                                                                     
                                        <label class="form-label">vehicle_no</label>
                                    </div>
                                </div>
                              
                              <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="vehicle_type" name="vehicle_type" class="form-control"
                                            value="<?php echo @$data['vehicle_type']; ?>" required readonly>                                    
                                        <label class="form-label">vehicle_type</label>
                                    </div>
                                </div>

                              <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="trans_challan" name="trans_challan" class="form-control"
                                            value="<?php echo @$data['trans_challan']; ?>" required>                                    
                                        <label class="form-label">trans_challan</label>
                                    </div>
                                </div>                                                                                        			                       

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="tare_weight" name="tare_weight" class="form-control"
                                            value="<?php echo @$data['tare_weight']; ?>" required>
                                        <label class="form-label">tare_weight</label>
                                    </div>
                                </div>

                               

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="gross_weight" name="gross_weight" class="form-control"
                                            value="<?php echo @$data['gross_weight']; ?>" >
                                        <label class="form-label">gross_weight</label>
                                    </div>
                                </div> 
                                
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="kata_slip" name="kata_slip" class="form-control"
                                            value="<?php echo @$data['kata_slip']; ?>" >
                                        <label class="form-label">kata_slip</label>
                                    </div>
                                </div> 

                                

                                <button class="btn btn-primary waves-effect submit_sender" name="vehicle_out"
                                    type="submit">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Vertical Layout | With Floating Label -->

        </div>
    </section>
    <?php include_once('includes/footer.php'); ?>
</body>