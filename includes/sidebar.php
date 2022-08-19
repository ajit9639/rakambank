<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <!-- <div class="user-info">
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['name'];?></div>
                <div class="email">Login From IP : <?php echo $_SERVER['REMOTE_ADDR']; ?></div>
                <div class="email"><?php echo $_SESSION['mobile']; ?></div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="logout.php"><i class="material-icons">input</i>Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div> -->
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
     
                <li class="header"><?php echo  $_SESSION['username']; ?>
                 
                </li>
                <li>
                    <a href="dashboard.php">
                        <i class="material-icons">home</i>
                        <span>Dashboard</span>
                    </a>
                </li>      
                
                <li>
                    <a href="registered_dsa.php">
                        <i class="material-icons">home</i>
                        <span>All Registered DSA</span>
                    </a>
                </li>  

                <li>
                    <a href="registered_sales.php">
                        <i class="material-icons">home</i>
                        <span>ALL Registered Sales Executive</span>
                    </a>
                </li>  


                <li>
                    <a href="registered_hr.php">
                        <i class="material-icons">home</i>
                        <span>All Registered HR</span>
                    </a>
                </li>  


                <li>
                    <a href="all_loans_master.php">
                        <i class="material-icons">home</i>
                        <span>All Loan Pending</span>
                    </a>
                </li>  


                <li>
                    <a href="all_loans_master.php">
                        <i class="material-icons">home</i>
                        <span>All Loan Approved</span>
                    </a>
                </li>  

                <li>
                    <a href="all_loans_master.php">
                        <i class="material-icons">home</i>
                        <span>All Loan Rejected</span>
                    </a>
                </li>  

                <li>
                    <a href="logout.php">
                        <i class="material-icons">keyboard_tab</i>
                        <span>Logout</span>
                    </a>
                </li>
               
            </ul>

        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; Copyright 2022 <br><a href="" target="_blank">Rakam Bank</a>
            </div>

        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->

</section>
<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a href="dashboard.php">
                <!-- <img src="images/header.png" class="img-responsive logos" style="width: 40%;"> -->
                <strong style="color: #303030;
    font-size: 20px;
    font-weight: 800;"><img src="images/header.png" style="
    width: 150px;"></strong>
            </a>
        </div>
    </div>
</nav>
<!-- #Top Bar -->