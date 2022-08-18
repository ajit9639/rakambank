<?php include_once('includes/header.php');
include_once('config.php');
if(isset($_SESSION['uid']) && ($_SESSION['uid'] != ''))
{
    echo '<script>window.location="dashboard.php";</script>';
}
if(isset($_POST['submit']))
{   
    $access_array=array();
    $email=$_POST['email'];
    $password=$_POST['password'];

    // echo "SELECT * FROM `dsa` WHERE `email` = '$email' AND `password`= '$password' where `approval`='approved'";exit;
    

    $qw=mysqli_query($conn,"SELECT * FROM `dsa` WHERE `email` = '$email' AND `password`= '$password' AND `approval`='approved'");

    if(mysqli_num_rows($qw) > 0)
    {
        $data = mysqli_fetch_assoc($qw);
     $_SESSION['uid']=$data['id'];
     
     $user_id=$data['id'];
     $_SESSION['sales_executive']=$data['sales_executive'];
     $_SESSION['name']=$data['name'];
     $_SESSION['number']=$data['number'];
     $_SESSION['email']=$data['email'];

    //  $_SESSION['adhar_img']=$data['adhar_img'];
    //  $_SESSION['pancard_img']=$data['pancard_img'];
    //  $_SESSION['passbook_img']=$data['passbook_img'];
     
     $_SESSION['is_authenticated']=1;

        // $as=mysqli_query($conn,"select * from role where user_id='$user_id'");
        // while($fr=mysqli_fetch_assoc($as))
        // {
        //     array_push($access_array,$fr['pages']);
        // }
        // $_SESSION['access_array']=$access_array;
     echo '<script>window.location="dsa_dashboard.php";</script>';
    }
    else
    {
        //$_SESSION['is_authenticated']=0;
        echo '<script>alert("Invalid Login Credentials"); window.location="index.php";</script>';
    }

}
?>

<body class="login-page">


    <div class="login-box">
        <div class="logo">
            <img src="images/header.png" style="width:100%">
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST">
                    <div class="msg">DSA Sign in</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="email" placeholder="Username" required
                                autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-xs-12">

                            <button class="btn btn-block bg-pink waves-effect" name="submit" type="submit">SIGN
                                IN</button>

                            <a href="dsa_register.php" class="btn btn-block bg-pink waves-effect">DSA Register</a>

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