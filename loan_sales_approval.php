<style>
.form-group .form-line {
    width: 50% !important;
}
</style>

<?php
include_once('includes/header.php');
include_once('includes/check_login.php');

$id=$_GET['id'];

$sales = $_SESSION['sales_executive'];
// echo "<pre>";
// print_r($_SESSION);
// exit;

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
    
$loan_status = $_POST['status'];
$loan_review = $_POST['review'];

    mysqli_query($conn, "UPDATE `sale_loan` SET `approval`='$loan_status',`sales_review`='$loan_review' where `id`='$id'");
    $id = mysqli_insert_id($conn);            
    echo '<script>alert("Success"); window.location="all_loans_sales.php";</script>';
}

if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $data=mysqli_fetch_assoc(mysqli_query($conn,"select * from `sale_loan` where id='$id'"));
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
    <?php include_once('includes/sales_sidebar.php'); ?>

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
                                    <div class="form-line focused">

                                        <select name="status" class="form-control">

                                            <option value="<?= $data['approval']?>" selected><?= $data['approval']?>
                                            </option>
                                            <option value="pending">Pending</option>
                                            <option value="approved">Approved</option>
                                        </select>
                                        <label class="form-label">Loan Status</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line focused">

                                        <textarea name="review" rows="3"
                                            class="form-control"><?= $data['sales_review']?></textarea>
                                        <label class="form-label">Review</label>
                                    </div>
                                </div>


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <button class="btn btn-primary waves-effect submit_sender" name="submit_sender"
                                            type="submit">SUBMIT</button>

                                    </div>
                                </div>





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