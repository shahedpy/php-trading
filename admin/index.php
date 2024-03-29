<?php
session_start();
if ($_SESSION['role'] != 1) {
    header('location: ../');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- jQuery -->
    <script src="../dashboard/plugins/jquery/jquery.min.js"></script>
    <title>
        <?php
        echo $_SESSION['name'];
        ?>
    </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../dashboard/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dashboard/dist/css/adminlte.min.css">



</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <?php include '../assets/navtop.php'; ?>
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <!-- <img src="#" alt="App Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
                <span class="brand-text font-weight-light">App Name</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                    <div class="info">
                        <a href="#" class="d-block"><?php echo $_SESSION['name']; ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="index.php" class="nav-link active">
                                <i class="nav-icon fas fa-money-bill-alt"></i>
                                <p>
                                    Voucher
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">Withdraw</li>
                        <li class="nav-item">
                            <a href="withdraw.php" class="nav-link">
                                <i class="fas fa-money-bill-wave-alt nav-icon"></i>
                                <p>Requests</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="withdraw_history.php" class="nav-link">
                                <i class="fas fa-money-bill-wave-alt nav-icon"></i>
                                <p>History</p>
                            </a>
                        </li>

                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>



        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-3">
                            <h1 class="m-0">Voucher</h1>
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
                    <div class="row">
                        <div class="col-sm-3">
                            <form action="../api/buy_voucher_by_admin.php" method="post">

                                <div class="form-group">
                                    <label for="">Phone Number:</label>
                                    <input type="text" class="form-control" name="user_id" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Voucher Qty:</label>
                                    <input type="text" class="form-control" name="voucher_qty" required>
                                </div>
                                <div class="form-grouup">
                                    <input class="btn btn-info" type="submit" value="Send Voucher" name="voucher">
                                </div>

                            </form>


                        </div>
                        <div class="col-sm-3">
                            <?php
                            if (isset($_SESSION['success'])) {
                                echo $_SESSION['success'];
                                unset($_SESSION['success']);
                            }
                            ?>
                        </div>
                    </div>






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