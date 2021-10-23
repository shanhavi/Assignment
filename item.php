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
        <?php
        if (isset($_GET['success'])) {
        ?>
        <div class="alert alert-success" role="alert">
            The Student Added Successfully!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">×</span></button>
        </div>
        <?php
        }
        if (isset($_GET['fail'])) {
        ?>
        <div class="alert alert-warning" role="alert">
            Sorry, The Student NOT Added!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">×</span></button>
        </div>
        <?php
        }
        ?>
        <?php
        if (isset($_GET['success1'])) {
        ?>
        <div class="alert alert-success" role="alert">
            The Item updated Successfully!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">×</span></button>
        </div>
        <?php
        }
        if (isset($_GET['fail1'])) {
        ?>
        <div class="alert alert-warning" role="alert">
            Sorry, The Item NOT updated!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">×</span></button>
        </div>
        <?php
        }
        ?>

        <div class="container-fluid">
            <?php
                if(isset($_GET['create'])){
                    ?>
            <div class="block-header">
                <!-- Input Group -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Item Register
                                </h2>
                                <a href="item.php"> <button type="button" name="view" class="btn btn-success"
                                        style="float: right;" value="SUBMIT">Manage Student</button></a><br>

                            </div>
                            <?php
                            if (isset($_GET['edit']) && $_GET['edit'] != "") {
                                $id = $_GET['edit'];
                                $sqlget = "SELECT * FROM item WHERE item_id='$id'";
                                $exeget = mysqli_query($con, $sqlget);
                                $rowget = mysqli_fetch_array($exeget);
                            }
                            ?>
                            <form action="" method="POST">
                                <div class="body">

                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <select name="icat" class="form-control" required>
                                                <option>Select Item category</option>
                                                <?php
                                                  $query1 = "SELECT * FROM item_category";
                                                $result1 = mysqli_query($con, $query1);

                                                while ($row1 = mysqli_fetch_array($result1)) {
                                                ?>
                                                <option value=<?php echo $row1["id"] ?> <?php if (isset($_GET['edit']) && $_GET['edit'] != "" 
                                                    && $rowget['item_id'] ==$row1['id']) { echo "selected";}  ?>>
                                                    <?php echo $row1["category"] ?>
                                                </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <select name="isubcat" class="form-control" required>
                                                <option>Select Item sub category</option>
                                                <?php
                                                  $query2 = "SELECT * FROM item_subcategory";
                                                $result2 = mysqli_query($con, $query2);

                                                while ($row2 = mysqli_fetch_array($result2)) {
                                                ?>
                                                <option value=<?php echo $row2["id"] ?> <?php if (isset($_GET['edit']) && $_GET['edit'] != "" 
                                                    && $rowget['item_id'] ==$row2['id']) { echo "selected";}  ?>>
                                                    <?php echo $row2["sub_category"] ?>
                                                </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <div class="form-line">
                                                    <input type="text" name="icode" class="form-control date"
                                                        placeholder="Item Code" required
                                                        value="<?php if (isset($_GET['edit']) && $_GET['edit'] != "") {echo $rowget['item_code'];}  ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <div class="form-line">
                                                    <input type="text" name="iname" class="form-control date"
                                                        placeholder="Item Name" required
                                                        value="<?php if (isset($_GET['edit']) && $_GET['edit'] != "") {echo $rowget['item_name'];}  ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <div class="form-line">
                                                    <input type="text" name="iquantity" class="form-control date"
                                                        placeholder="Quantity" required
                                                        value="<?php if (isset($_GET['edit']) && $_GET['edit'] != "") {echo $rowget['quantity'];}  ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <div class="form-line">
                                                    <input type="text" name="uprice" class="form-control date"
                                                        placeholder="Unit price" required
                                                        value="<?php if (isset($_GET['edit']) && $_GET['edit'] != "") {echo $rowget['unit_price'];}  ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                    if (isset($_GET['edit'])) {
                                    ?>
                                    <input type="submit" name="update" value="UPDATE" class="btn btn-success">

                                    <?php
                                    } else {
                                    ?>
                                    <input type="submit" name="btninsert" class="btn btn-primary" value="SUBMIT">
                                    <?php
                                    }
                                    ?>

                                </div>

                        </div>
                        </form>
                        <?php
                        /*Add Category1*/
                        if (isset($_POST['btninsert'])) {
                            $icode = mysqli_real_escape_string($con, $_POST['icode']);
                            $iname = mysqli_real_escape_string($con, $_POST['iname']);
                            $icat = mysqli_real_escape_string($con, $_POST['icat']);
                            $isubcat = mysqli_real_escape_string($con, $_POST['isubcat']);
                            $iquantity = mysqli_real_escape_string($con, $_POST['iquantity']);
                            $uprice = mysqli_real_escape_string($con, $_POST['uprice']);
                            $active = '1';
                             $sqlinsert = "INSERT INTO  item (item_code, item_category, item_subcategory, item_name, quantity, unit_price, active) 
                            VALUES ('$icode','$icat','$isubcat','$iname','$iquantity','$uprice','$active')";
                            $exeinsert = mysqli_query($con, $sqlinsert);
                            if ($exeinsert) {
                                header("Location: item.php?success");
                            } else {
                                header("Location: item.php?fail");
                            }
                        }
                         /*Update Category1*/
                        if(isset($_POST['update'])){
                            $id=$_GET['edit'];
                            $icode = mysqli_real_escape_string($con, $_POST['icode']);
                            $iname = mysqli_real_escape_string($con, $_POST['iname']);
                            $icat = mysqli_real_escape_string($con, $_POST['icat']);
                            $isubcat = mysqli_real_escape_string($con, $_POST['isubcat']);
                            $iquantity = mysqli_real_escape_string($con, $_POST['iquantity']);
                            $uprice = mysqli_real_escape_string($con, $_POST['uprice']);
                            $active = '1';
                            $sqlupdate="UPDATE item SET item_code='$icode',item_category='$icat',item_subcategory='$isubcat',item_name='$iname',
                            quantity='$iquantity',unit_price='$uprice',active='$active' WHERE item_id='$id'";
                            $exeupdate=mysqli_query($con, $sqlupdate);
                            if($exeupdate){
                                header("Location: item?edit=$id&success1");
                            }else{
                                header("Location: item?edit=$id&fail1");
                            }
                        }
                         ?>
                    </div>
                    <!-- #END# Input Group -->
                </div>
            </div>
            <?php
                }else{
                    ?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <a href="item.php?create"> <button type="button" name="view" style="float: right;"
                                    class="btn btn-info" value="SUBMIT">Create Iteam</button></a><br>
                            <?php
                            if (isset($_GET['success3'])) {
                            ?>
                            <div class="alert alert-success" role="alert">
                                The item Deleted Successfully!!!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">×</span></button>
                            </div>
                            <?php
                            }
                            if (isset($_GET['fail3'])) {
                            ?>
                            <div class="alert alert-warning" role="alert">
                                Sorry, The item NOT Deleted!!!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">×</span></button>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Item code</th>
                                            <th>Item name</th>
                                            <th>Item category</th>
                                            <th>Item sub category</th>
                                            <th>Quantity</th>
                                            <th>Unit price</th>
                                            <th>Action</th>
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
                                            <td><?php echo $row3['item_code']; ?></td>
                                            <td><?php echo $row3['item_name']; ?></td>
                                            <td><?php echo $row3['category']; ?></td>
                                            <td><?php echo $row3['sub_category']; ?></td>
                                            <td><?php echo $row3['quantity']; ?></td>
                                            <td><?php echo $row3['unit_price']; ?></td>
                                            <td>
                                                <a href="?id=<?php echo $row3['item_id']; ?>" class="btn btn-danger"><i
                                                        class="fas fa-trash-alt"></i></a>
                                                <a href="item.php?create&edit=<?php echo $row3['item_id']; ?>"
                                                    class="btn btn-success"><i class="fas fa-edit"></i></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <?php
                                if (isset($_GET['item_id'])) {
                                    $id = $_GET['item_id'];
                                    echo $sqldelete = "UPDATE item SET active = '0' WHERE item_id='$id'";
                                    $exedelete = mysqli_query($con, $sqldelete);
                                    if ($exedelete) {
                                        header("Location:item.php?success3");
                                    } else {
                                        header("Location:item.php?fail3");
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
                ?>


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