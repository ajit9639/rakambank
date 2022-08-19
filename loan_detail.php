<style>
@media (min-width: 576px) {
    #card {
        margin-left: 0% !important;
    }
}
</style>

<?php include_once('includes/header.php');
include_once('includes/check_login.php');
include_once('includes/db.php');

$id = $_GET['id'];

$row1 = mysqli_fetch_assoc($get_all = mysqli_query($conn,"SELECT * FROM `sale_loan` where `id`='$id'"));
$y = $row1['sales_executive'];
$z = $row1['dsa_id'];
$row2 = mysqli_fetch_assoc($get_all = mysqli_query($conn,"SELECT * FROM `sales` where `id`='$y'"));
$row3 = mysqli_fetch_assoc($get_all = mysqli_query($conn,"SELECT * FROM `dsa` where `id`='$z'"));
?>

<body class="theme-red">

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
    <?php //include_once('includes/sales_sidebar.php'); ?>

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
                                Loan Detail
                            </h2>

                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">

                                    <tbody>
                                        <tr>
                                            <td colspan="6" align="center">
                                                <h3>Rakam Bank</h3>

                                                Plot No. 23 Shanti Vihar, Ajabpur Kalan, Opp. Decathlon, Dehradun,
                                                Uttarakhand<br>

                                                <hr>

                                            </td>
                                        </tr>

                                        <tr>

                                            <td><strong>Name </strong></td>
                                            <td><strong>:</strong></td>
                                            <td valign='center'><?= $row1['name']?></td>

                                            <td><strong>Number </strong></td>
                                            <td><strong>:</strong></td>
                                            <td valign='center'><?= $row1['number']?></td>

                                        </tr>
                                        <tr>
                                            <td><strong>Email </strong></td>
                                            <td><strong>:</strong></td>
                                            <td valign='center'><?= $row1['email']?></td>

                                            <td><strong>DSA Name </strong></td>
                                            <td><strong>:</strong></td>
                                            <td valign='center'><?= $row3['name']?></td>
                                        </tr>

                                        <tr>
                                            <td><strong>Loan Status By Sales Executive </strong></td>
                                            <td><strong>:</strong></td>
                                            <td valign='center'><?= $row1['approval']?></td>

                                            <td><strong>Sales Executive Review </strong></td>
                                            <td><strong>:</strong></td>
                                            <td valign='center'><?= $row1['sales_review']?></td>
                                        </tr>


                                        <tr>
                                            <td><strong>pancard_img </strong></td>
                                            <td><strong>:</strong></td>
                                            <td>
                                                <iframe width="100%" height="500px"
                                                    <?php echo 'src="data:application/pdf;base64,' . base64_encode($row1['pancard_img']) . '"' ?>></iframe>
                                            </td>

                                            <td><strong>adhar_img </strong></td>
                                            <td><strong>:</strong></td>
                                            <td> <iframe width="100%" height="500px"
                                                    <?php echo 'src="data:application/pdf;base64,' . base64_encode($row1['adhar_img']) . '"' ?>></iframe>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>passbook_img </strong></td>
                                            <td><strong>:</strong></td>
                                            <td><iframe width="100%" height="500px"
                                                    <?php echo 'src="data:application/pdf;base64,' . base64_encode($row1['passbook_img']) . '"' ?>></iframe>
                                            </td>

                                            <td><strong>salary_slip </strong></td>
                                            <td><strong>:</strong></td>
                                            <td><iframe width="100%" height="500px"
                                                    <?php echo 'src="data:application/pdf;base64,' . base64_encode($row1['salary_slip']) . '"' ?>></iframe>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>photo </strong></td>
                                            <td><strong>:</strong></td>
                                            <td><iframe width="100%" height="500px"
                                                    <?php echo 'src="data:application/pdf;base64,' . base64_encode($row1['photo']) . '"' ?>></iframe>
                                            </td>

                                            <td><strong>property </strong></td>
                                            <td><strong>:</strong></td>
                                            <td><iframe width="100%" height="500px"
                                                    <?php echo 'src="data:application/pdf;base64,' . base64_encode($row1['property']) . '"' ?>></iframe>
                                            </td>




                                            <!-- <td><a <?php echo ' href="data:image/jpeg;base64,' . base64_encode($row1['pancard_img']) . '"' ?>
                                                    data-toggle="lightbox" data-title=" Images">
                                                    <img style="width:200px"
                                                        <?php echo ' src="data:image/jpeg;base64,' . base64_encode($row1['pancard_img']) . '"' ?>
                                                        class="img-fluid mb-2" alt=" Images" />
                                                </a></td> -->

                                        </tr>


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

    <?php include_once('includes/footer.php'); ?>
</body>

</html>