<?php
session_start();
include "../api/include.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <title>
        <?php
        echo $_SESSION['name'];
        ?>
    </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">


    <script>
        $(document).ready(function() {

            $('.add-btn').on('click', function() {
                $("#add-voucher-modal").modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children('td').map(function() {
                    return $(this).text();
                }).get();

                //console.log(data);

                $("#voucher_id").val(data[0]);


            })


            $("#buy-voucher-btn").on('click', function() {
                $('#buy-voucher-modal').modal('show');

                $("#voucher_qty").on('change', function() {

                    ///dynamic voucher rate

                    <?php

                    $get_voucher_rate = "SELECT `meta_value` FROM `system_info` WHERE `meta_field` = 'voucher_rate'";
                    $result = mysqli_query($conn, $get_voucher_rate);
                    $voucher_rate = 0;
                    if ($result->num_rows > 0) {

                        while ($row = $result->fetch_assoc()) {
                            $voucher_rate = $row['meta_value'];
                        }
                    }
                    ?>



                    var value = $("#voucher_qty").val() * <?php echo $voucher_rate;?>;
                    $("#amount").val(value);
                })




            })


        });
    </script>

</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <?php include '../assets/navtop.php'; ?>
        <?php include '../assets/sidenav.php'; ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-3">
                            <h1 class="m-0">Voucher</h1>
                        </div>
                        <div class="col-sm-3">
                            <button class="btn btn-info" id="buy-voucher-btn">Buy Voucher</button>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Voucher</li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <?php



                    $phone = $_SESSION['phone'];

                    $SQL = "SELECT COUNT(voucher_limit),SUM(voucher_limit) FROM voucher WHERE owned_by = '$phone'";

                    $result = mysqli_query($conn, $SQL);

                    $total_voucher = 0;
                    $limit_voucher = 0;

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            if ($row['SUM(voucher_limit)'] > 0) {

                                $total_voucher = $row['COUNT(voucher_limit)'];
                                $limit_voucher = $row['SUM(voucher_limit)'];
                            }
                        }
                    }





                    ?>

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="">Total Voucher:</label>
                                <input type="text" class="form-control" disabled value="<?php echo $total_voucher; ?>">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="">Total Voucher Limit:</label>
                                <input type="text" class="form-control" disabled value="<?php echo $limit_voucher; ?>">
                            </div>
                        </div>
                    </div>


                    <!-- Info boxes -->
                    <div class="row">




                        <div class="col-sm-12">
                            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                <thead>
                                    <tr>
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Voucher ID</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Voucher Limit</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php


                                    $phone = $_SESSION['phone'];


                                    $check_voucher_status = "SELECT SUM(status) FROM voucher WHERE owned_by = '$phone'";
                                    $result = mysqli_query($conn, $check_voucher_status);

                                    $status = 0;
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {

                                            if ($row['SUM(status)']) {

                                                $status = $row['SUM(status)'];
                                            }
                                        }
                                    }

                                    $SQL = "SELECT * FROM voucher WHERE owned_by = '$phone'";

                                    $result = mysqli_query($conn, $SQL);


                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {

                                            if ($row['voucher_limit'] > 0) {
                                                print "<tr>";
                                                print "<td>" . $row['id'] . "</td>";
                                                print "<td>" . $row['voucher_limit'] . "</td>";


                                                if ($status <= 0) {
                                                    print "<td><button class='add-btn btn btn-info'>Add to Leaderboard</button></td>";
                                                }
                                            }

                                            print "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='4'>No Data Found</td></tr>";
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.row -->




                </div>
                <!--/. container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021</strong> All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>


        <!--================================ MODALS ===================================-->

        <!-- Confirm Modal -->
        <div class="modal fade" id="add-voucher-modal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Confirmation</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Do you want to add the voucher to leaderboard?</p>
                        <form action="../api/add_voucher_to_leaderboard.php" method="POST">
                            <input type="hidden" id="voucher_id" name="voucher_id">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info" id="delete-confirm-btn">Confirm</button>
                        </form>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Buy Voucher Modal -->
        <div class="modal fade" id="buy-voucher-modal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Confirmation</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="../api/buy_voucher.php" method="POST">
                            <div class="form-group">
                                <label for="voucher_qty">Quantity</label>
                                <input type="number" class="form-control" id="voucher_qty" name="voucher_qty" required>
                            </div>
                            <div class="form-group">
                                <label for="voucher_qty">Amount</label>
                                <input class="form-control" id="amount" disabled>
                            </div>

                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['phone']; ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info" id="delete-confirm-btn">Buy</button>
                        </form>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

















    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- Bootstrap -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>


</body>

</html>