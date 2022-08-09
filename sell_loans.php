<?php
include_once('includes/header.php');
include_once('includes/check_login.php');

$id=$_GET['id'];

$type = $_GET['type'];
if($type == 'delete'){
$del = mysqli_query($conn, "DELETE FROM `sale_loan` WHERE `id`='$id'");
if($del){
    echo "<script>alert('Data Deleted Successfully');window.location='all_loans.php';</script>";
}else{
    echo "<script>alert('Data Deleted Failed');</script>";
}
}else{

if(isset($_POST['submit_sender']))
{
$id=$_POST['id'];
    
$name = $_POST['name'];
$number = $_POST['number'];
$email = $_POST['email'];

$pancard_img1 = $_FILES['pancard_img']['tmp_name'];
$pancard_img = addslashes(file_get_contents($pancard_img1)) ;

$adhar_img1 = $_FILES['adhar_img']['tmp_name'];
$adhar_img = addslashes(file_get_contents($adhar_img1));

$passbook_img1 = $_FILES['passbook_img']['tmp_name'];
$passbook_img = addslashes(file_get_contents($passbook_img1));

$salary_slip1 = $_FILES['salary_slip']['tmp_name'];
$salary_slip = addslashes(file_get_contents($salary_slip1));

$photo1 = $_FILES['photo']['tmp_name'];
$photo = addslashes(file_get_contents($photo1));

$property1 = $_FILES['property']['tmp_name'];
$property = addslashes(file_get_contents($property1));

$approval = 'pending';

// echo "INSERT INTO `sale_loan`(`name`, `number`, `email`, `pancard_img`, `adhar_img`, `passbook_img`, `salary_slip`, `photo`, `property`, `approval`) 
// VALUES ('$name','$number','$email','$pancard_img','$adhar_img','$passbook_img','$salary_slip','$photo','$property','$approval')";exit;

if ($id == '') {
            mysqli_query($conn, "INSERT INTO `sale_loan`(`name`, `number`, `email`, `pancard_img`, `adhar_img`, `passbook_img`, `salary_slip`, `photo`, `property`, `approval`) VALUES ('$name','$number','$email','$pancard_img','$adhar_img','$passbook_img','$salary_slip','$photo','$property','$approval')");
            $id = mysqli_insert_id($conn);
        } else {
            mysqli_query($conn, "UPDATE `sale_loan` SET `name`='$name',`number`='$number',`email`='$email',`pancard_img`='$pancard_img',`adhar_img`='$adhar_img',`passbook_img`='$passbook_img',`salary_slip`='$salary_slip',`photo`='$photo',`property`='$property' where id='$id'");
        }

        echo '<script>alert("Success"); window.location="all_loans.php";</script>';
}

if(isset($_GET['id']))
{
    $uid=$_GET['id'];
    $data=mysqli_fetch_assoc(mysqli_query($conn,"select * from `sale_loan` where id='$uid'"));
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
    <?php include_once('includes/dsa_sidebar.php'); ?>

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
                                Sell Loans
                            </h2>

                        </div>
                        <div class="body">
                            <form id="sender_form" method="post" action="#" enctype="multipart/form-data">
                                <input type="hidden" name="id"
                                    value="<?php if(isset($_GET['id'])) { echo $data['id']; } ?>">                                   


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="name" name="name" class="form-control"
                                            value="<?php echo @$data['name']; ?>" required>
                                        <label class="form-label">Full Name</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                    <input type="number" id="number" name="number" class="form-control"
                                            value="<?php echo @$data['number']; ?>" required>
                                        <label class="form-label">Phone Number</label>
                                    </div>
                                </div>    
                                
                                <div class="form-group form-float">
                                    <div class="form-line">
                                    <input type="email" id="email" name="email" class="form-control"
                                            value="<?php echo @$data['email']; ?>" required>
                                        <label class="form-label">Email</label>
                                    </div>
                                </div>  
                                
                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                    <input type="file" id="pancard_img" name="pancard_img" class="form-control"
                                            value="<?php echo @$data['pancard_img']; ?>" >
                                        <label class="form-label">Upload PAN Card (pdf format)</label>
                                    </div>
                                </div>  

                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                    <input type="file" id="adhar_img" name="adhar_img" class="form-control"
                                            value="<?php echo @$data['adhar_img']; ?>" >
                                        <label class="form-label">Upload Adhar Card (pdf format)</label>
                                    </div>
                                </div>  

                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                    <input type="file" id="passbook_img" name="passbook_img" class="form-control"
                                            value="<?php echo @$data['passbook_img']; ?>" >
                                        <label class="form-label">Upload Bank Statement of 6month (pdf format)</label>
                                    </div>
                                </div>  

                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                    <input type="file" id="salary_slip" name="salary_slip" class="form-control"
                                            value="<?php echo @$data['salary_slip']; ?>" >
                                        <label class="form-label">Upload 3month Salary Slip (pdf format)</label>
                                    </div>
                                </div> 

                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                    <input type="file" id="photo" name="photo" class="form-control"
                                            value="<?php echo @$data['photo']; ?>" >
                                        <label class="form-label">Upload Photo</label>
                                    </div>
                                </div> 

                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                    <input type="file" id="property" name="property" class="form-control"
                                            value="<?php echo @$data['property']; ?>">
                                        <label class="form-label">Property Detail like sale deed </label>
                                    </div>
                                </div> 

                                <button class="btn btn-primary waves-effect submit_sender" name="submit_sender"
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

</html>