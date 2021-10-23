<?php
ob_start();
session_start();
include "inc/dbconfig.php";
include "inc/functions.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Welcome To | ERP System</title>

    <?php include "inc/head.php"; ?>
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

</head>

<body class="theme-red">
    <?php include "inc/navbar.php"; ?>
    <section>
        <?php include "inc/sidebar.php"; ?>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="block-header">
                <!-- Input Group -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Invoice Report
                                </h2>
                                <!-- <a href="invoice_report.php"> <button type="button" name="view" class="btn btn-success" style="float: right;" value="SUBMIT">Manage Student</button></a><br> -->

                            </div>

                            <form action="" method="GET">
                                <div class="body">
                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">verified_user</i>
                                                </span>
                                                <div class="form-line">
                                                    <label for="">Date</label>
                                                    <input type="date" name="fromdate" class="form-control date"
                                                        placeholder="From Date" required
                                                        value="<?php if (isset($_GET['fromdate'])){echo $_GET['fromdate'];} else {}?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">verified_user</i>
                                                </span>
                                                <div class="form-line">
                                                    <label for="">Date</label>
                                                    <input type="date" name="todate" class="form-control date"
                                                        placeholder="To Date" required
                                                        value="<?php if (isset($_GET['todate'])){echo $_GET['todate'];} else {}?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" name="submit" class="btn btn-primary" value="SEARCH">

                                </div>

                        </div>
                        </form>
                    </div>
                    <!-- #END# Input Group -->
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Invoice number</th>
                                            <th>Date</th>
                                            <th>Customer</th>
                                            <th>Item count</th>
                                            <th>Invoice amoun</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(isset($_GET['fromdate']) && isset($_GET['todate']))
                                        {
                                            $fromdate = $_GET['fromdate'];
                                            $todate = $_GET['todate'];

                                            $query="SELECT * FROM invoice WHERE date BETWEEN '$fromdate' AND '$todate'";
                                            $queryrun=mysqli_query($con, $query);
                                            while ($row = mysqli_fetch_array($queryrun)) {
                                                ?>
                                        <tr>
                                            <td><?php echo $row['date']; ?></td>
                                            <td><?php echo $row['time']; ?></td>
                                            <td><?php echo $row['invoice_no']; ?></td>
                                            <td><?php echo $row['customer']; ?></td>
                                            <td><?php echo $row['item_count']; ?></td>
                                            <td><?php echo $row['amount']; ?></td>

                                        </tr>
                                        <?php
                                        }
                                    }
                                    else{
                                        
                                        echo 'No record found';
                                    }
                                       ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>



    </section>
    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/tables/jquery-datatable.js"></script>

</body>

</html>
<?php ob_end_flush(); ?>