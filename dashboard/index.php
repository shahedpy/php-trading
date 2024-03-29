<?php
session_start();
if($_SESSION['role'] == 1){
    header('location: ../admin/');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="plugins/jquery/jquery.min.js"></script>
    <title><?php echo $_SESSION['name']; ?></title>

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
            $(".withdraw-btn").on('click', function() {
                $("#withdraw-modal").modal('show');
            })
        })
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
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
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
                    <!-- Info boxes -->
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-dollar-sign"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Wallet Balance</span>
                                    <span class="info-box-number">
                                        <?php
                                        include '../login/db.php';
                                        $ref_id = $_SESSION['phone'];

                                        $sql = "SELECT * FROM wallet WHERE phone = $ref_id";

                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while ($row = $result->fetch_assoc()) {
                                                echo $row["amount"];
                                            }
                                        }
                                        $conn->close();
                                        ?>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-money-bill-alt"></i></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Voucher</span>
                                    <span class="info-box-number">
                                        <?php
                                        include '../login/db.php';
                                        $ref_id = $_SESSION['phone'];
                                        $sql = "SELECT * FROM voucher WHERE owned_by = $ref_id AND voucher_limit>0";
                                        $result = $conn->query($sql);

                                        echo $result->num_rows;

                                        $conn->close();
                                        ?>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <!-- fix for small devices only -->
                        <div class="clearfix hidden-md-up"></div>

                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Refferal Users</span>
                                    <span class="info-box-number">
                                        <?php
                                        include '../login/db.php';

                                        $ref_id = $_SESSION['phone'];

                                        $sql = "SELECT * FROM `users` WHERE parent = '$ref_id'";

                                        $result = $conn->query($sql);

                                        echo $result->num_rows;


                                        $conn->close();
                                        ?>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-4">
                            <button class="withdraw-btn btn btn-info"><i class="fas fa-money-bill-wave-alt"></i> Withdraw</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <?php
                            if (isset($_SESSION['error_msg'])) {
                                echo $_SESSION['error_msg'];
                                unset($_SESSION['error_msg']);
                            }

                            if (isset($_SESSION['success_msg'])) {
                                echo $_SESSION['success_msg'];
                                unset($_SESSION['success_msg']);
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

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
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




    <!--============================== Withdraw Modal ==========================-->
    <div class="modal fade" id="withdraw-modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Withdraw</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="../api/withdraw.php" method="POST">
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="number" class="form-control" id="amount" name="amount" required>
                        </div>
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['phone']; ?>">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info" id="delete-confirm-btn">Withdraw</button>
                    </form>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>