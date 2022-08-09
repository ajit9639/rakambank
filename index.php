<?php include_once('includes/header.php');
?>

<body class="login-page" style="
    background: url(images/bg.jpg)!important;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
">

    <div class="login-box">
        <div class="logo">
  <img src="images/header.png">
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="#">
                   
                    
                    <div class="row">
                                            
                        <div class="col-xs-12">
                            <a href="dsa.php" class="btn btn-block bg-pink waves-effect">DSA Register</a>
                            <a href="sales.php" class="btn btn-block bg-pink waves-effect">Sales Executive Register</a>
                            <a href="hr.php" class="btn btn-block bg-pink waves-effect">HR Register</a>
                            <a href="master.php" class="btn btn-block bg-pink waves-effect">Master</a>
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
        $(window).on("load",function(){
            $(".loader-container").fadeOut(8000);
        });
    </script>
    <!-- // preloadr -->
</body>

</html>