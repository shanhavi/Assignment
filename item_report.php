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
                                    Item Report
                                </h2>
                                <!-- <a href="invoice_report.php"> <button type="button" name="view" class="btn btn-success" style="float: right;" value="SUBMIT">Manage Student</button></a><br> -->
                                <div class="body">
                                    <div class="table-responsive">
                                        <table
                                            class="table table-bordered table-striped table-hover dataTable js-exportable">
                                            <thead>
                                                <tr>
                                                    <th>Item name</th>
                                                    <th>Item category</th>
                                                    <th>Item sub category</th>
                                                    <th>Quantity</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                        $sql3 = "SELECT * FROM item i JOIN item_category ic ON i.item_category=ic.id JOIN item_subcategory isc ON i.item_subcategory=isc.id  
                                        WHERE i.active='1' ORDER BY i.item_id DESC";
                                        $query3 = mysqli_query($con, $sql3);
                                        while ($row3 = mysqli_fetch_array($query3)) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $row3['item_name']; ?></td>
                                                    <td><?php echo $row3['category']; ?></td>
                                                    <td><?php echo $row3['sub_category']; ?></td>
                                                    <td><?php echo $row3['quantity']; ?></td>

                                                </tr>
                                                <?php
                                        }
                                        ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- #END# Input Group -->
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