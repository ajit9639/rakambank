<?php include_once('includes/header.php');
include_once('includes/check_login.php');
include_once('includes/db.php');


?>

<body class="theme-red">


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
                <h2>

                </h2>
            </div>

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="card">
                        <div class="header">
                            <h2 class="text-center">
                                All Registered DSA
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="sell_loans.php">
                                        <i class="material-icons adds">add</i>
                                    </a>

                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>

                                            <th>SNO</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Password</th>
                                            <th>Adhar Card</th>
                                            <th>PAN Card</th>
                                            <th>Passbook Image</th>
                                            <th>Status</th>
                                            <th>Status Approval</th>
                                            <th>Sales Executive</th>
                                            <th>Sales Approval</th>

                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                    $s=1;
                                    $sql=mysqli_query($conn,"SELECT * FROM `dsa`");
                                    while($row=mysqli_fetch_assoc($sql))
                                    {
                                    ?>
                                        <tr>

                                            <td><?php echo $s; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['number']; ?></td>
                                            <td><?php echo $row['password']; ?></td>
                                            <!-- <td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['pancard_img']) .'" style="width:100px;"/> '; ?></td> -->
                                            <td><a href="" class="btn btn-danger">Adhar</a></td>
                                            <td><a href="" class="btn btn-primary">PAN</a></td>
                                            <td><a href="" class="btn btn-warning">Passbook</a></td>
                                            <td><span class="btn btn-success"><?php echo $row['approval']; ?></span>
                                            </td>

                                            <td>
                                                <select class="form-control" onchange="location = this.value;">

                                                    <option value="" selected>Status</option>
                                                    <option
                                                        value="update_registered.php?id=<?php echo $row['id']?>&status=approved&table=dsa">
                                                        Approved</option>
                                                    <option
                                                        value="update_registered.php?id=<?php echo $row['id']?>&status=disapproved&table=dsa">
                                                        Disapproved</option>
                                                </select>
                                            </td>

                                            <td><span class="btn btn-success"><?php 
                                             $x = $row['sales_executive']; 

                                             $sqll1=mysqli_query($conn,"SELECT * FROM `sales` where `id`='$x'");
                                            $roww1=mysqli_fetch_assoc($sqll1);
                                             echo $roww1['name'];
                                             ?></span></td>

                                            <td>

                                                <select  onchange="location = this.value;" class="form-control">
                                                    <option value="">Select Sales Executive</option>
                                                    <?php
                                                    $sal = mysqli_query($conn , "SELECT * FROM `sales`");
                                                    while($get_all_sales = mysqli_fetch_assoc($sal)){?>

                                                    <option value="update_sales.php?idd=<?php echo $row['id']?> & status=<?=$get_all_sales['id']?>">
                                                        <?php echo $get_all_sales['name']?></option>
                                                    <?php } ?>
                                                </select>


                                                <!-- <select class="form-control" onchange="location = this.value;">

                                                    <option value="" selected>Select Sales</option>
                                                    <option
                                                        value="update_sales.php?id=<?php echo $row['id']?>&status=approved&table=dsa">
                                                        Approved</option>
                                                    <option
                                                        value="update_sales.php?id=<?php echo $row['id']?>&status=disapproved&table=dsa">
                                                        Disapproved</option>
                                                </select> -->
                                            </td>


                                        </tr>

                                        <?php $s++;} ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">

                <div class="modal-body" id="load_data">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $(".get_id").click(function() {
            var ids = $(this).data('id');
            $.ajax({
                url: "all_loan_view.php",
                method: 'POST',
                data: {
                    id: ids
                },
                success: function(data) {

                    $('#load_data').html(data);

                }

            })
        })

    })
    </script>

    <?php include_once('includes/footer.php'); ?>
</body>

</html>