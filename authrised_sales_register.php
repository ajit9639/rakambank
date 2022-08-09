<?php include_once('includes/header.php');
include_once('config.php');
if(isset($_SESSION['uid']) && ($_SESSION['uid'] != ''))
{
    echo '<script>window.location="dashboard.php";</script>';
}
if(isset($_POST['submit']))
{

//     echo "<pre>";
// print_r($_POST);
// exit();

    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $password = $_POST['password'];

    $adhar_card = $_FILES['adhar_card'];
    $adhar_card_name = $adhar_card['name'];
    $adhar_card_tmp_name = $adhar_card['tmp_name'];
    $adhar_data = addslashes(file_get_contents($adhar_card_tmp_name));
    //$uploads_dir = './authrised_sales_data';


    $pan_card = $_FILES['pan_card'];
    $pan_card_name = $pan_card['name'];
    $pan_card_tmp_name = $pan_card['tmp_name'];
    $pan_data = addslashes(file_get_contents($pan_card_tmp_name));


    $passbook = $_FILES['passbook'];
    $passbook_name = $passbook['name'];
    $passbook_tmp_name = $passbook['tmp_name'];
    $passbook_data = addslashes(file_get_contents($passbook_tmp_name));

    // echo "INSERT INTO `authrised_sales`(`name`, `email`, `number`, `password`, `adhar_img`, `pancard_img`, `passbook_img`, `approval`) VALUES('$name','$email','$number','$password','$adhar_data','$pan_data','$passbook_data','no')";exit();

    $insert = mysqli_query($conn ,"INSERT INTO `authrised_sales`(`name`, `email`, `number`, `password`, `adhar_img`, `pancard_img`, `passbook_img`, `approval`) VALUES('$name','$email','$number','$password','$adhar_data','$pan_data','$passbook_data','no')");
   
   if($insert){
    echo "<script>alert('Success')</script>";
   }else{
    echo "<script>alert('Error')</script>";
   }

}
?>

<body class="login-page" style="
    background: url(images/bg.jpg)!important;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
">

    <div class="login-box login_register">

        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="#" enctype="multipart/form-data">
                    <div class="msg">Sign in to start your session</div>

                    <div class="input-group lg-input">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="name" placeholder="Enter Name" required
                                autofocus>
                        </div>
                    </div>

                    <div class="input-group lg-input">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="email" placeholder="Email" required autofocus>
                        </div>
                    </div>

                    <div class="input-group lg-input">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="number" placeholder="Number" required
                                autofocus>
                        </div>
                    </div>

                    <div class="input-group lg-input">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required
                                autofocus>
                        </div>
                    </div>

                    <div class="input-group lg-input">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="c_password" placeholder="Confirm Passowrd"
                                required autofocus>
                        </div>
                    </div>


                    <div class="input-group lg-input">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="file" class="form-control" name="adhar_card" required autofocus>
                        </div>
                    </div>


                    <div class="input-group lg-input">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="file" class="form-control" name="pan_card" required>
                        </div>
                    </div>


                    <div class="input-group lg-input">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="file" class="form-control" name="passbook" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                        <button class="btn btn-block bg-pink waves-effect" name="submit" type="submit">Register</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <?php include_once('includes/footer.php'); ?>
    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/pages/examples/sign-in.js"></script>
    <!-- preloadr -->
    <script>
    $(window).on("load", function() {
        $(".loader-container").fadeOut(8000);
    });
    </script>
    <!-- // preloadr -->
</body>

</html>