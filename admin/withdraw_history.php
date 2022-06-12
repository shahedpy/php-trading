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


    <script>
        $(document).ready(function() {
            $('.approve-button').on('click', function() {
                $("#approve-modal").modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children('td').map(function() {
                    return $(this).text();
                }).get();

                //console.log(data);

                $("#withdraw-id").val(data[0]);
            })
        })
    </script>

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
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">
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
                            <a href="withdraw_history.php" class="nav-link active">
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
                            <h1 class="m-0">Withdraw</h1>
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
                        <div class="col-sm-12">
                            <?php
                            if (isset($_SESSION['success'])) {
                                echo $_SESSION['success'];
                                unset($_SESSION['success']);
                            }
                            ?>
                        </div>
                        <div class="col-sm-12">

                            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Requested</th>
                                        <th>Approved</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //data table
                                    include '../api/include.php';

                                    $withdraw_data_sql = "SELECT * FROM `withdraw` WHERE `status` = 1";
                                    $result = $conn->query($withdraw_data_sql);

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while ($row = $result->fetch_assoc()) {
                                            print '<tr>';
                                            print '<td>' . $row['id'] . '</td>';
                                            print '<td>' . $row['user'] . '</td>';
                                            print '<td>' . $row['amount'] . '</td>';
                                            if ($row['status'] == 0) {
                                                print '<td>Pending</td>';
                                            } else {
                                                print '<td>Completed</td>';
                                            }
                                            print '<td>' . $row['created_at'] . '</td>';
                                            print '<td>' . $row['updated_at'] . '</td>';




                                            print '</tr>';
                                        }
                                    } else {
                                        echo "<tr><td colspan='6'>No pending request</td></tr>";
                                    }


                                    ?>
                                </tbody>
                            </table>



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

    <!-- Bootstrap -->
    <script src="../dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dashboard/dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="../dashboard/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="../dashboard/plugins/raphael/raphael.min.js"></script>
    <script src="../dashboard/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="../dashboard/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="../dashboard/plugins/chart.js/Chart.min.js"></script>





</body>

</html>