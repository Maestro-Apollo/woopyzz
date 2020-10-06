<?php
session_start();
include('class/database.php');
class discount extends database
{
    protected $link;
    public function discountFunction()
    {
        $name = $_SESSION['Rname'];
        $sql = "select * from $name";
        $res = mysqli_query($this->link, $sql);
        if (mysqli_num_rows($res) > 0) {
            return $res;
        } else {
            return false;
        }
        # code...
    }
    public function updateFunction()
    {
        if (isset($_POST['update'])) {
            $name = $_SESSION['Rname'];
            for ($i = 1; $i < 15; $i++) {
                $discountSun = $_POST['discountSun' . $i];
                $personSun = $_POST['personSun' . $i];
                $discountMon = $_POST['discountMon' . $i];
                $personMon = $_POST['personMon' . $i];
                $discountTues = $_POST['discountTues' . $i];
                $personTues = $_POST['personTues' . $i];
                $discountWed = $_POST['discountWed' . $i];
                $personWed = $_POST['personWed' . $i];
                $discountThur = $_POST['discountThur' . $i];
                $personThur = $_POST['personThur' . $i];
                $discountFrid = $_POST['discountFrid' . $i];
                $personFrid = $_POST['personFrid' . $i];
                $discountSat = $_POST['discountSat' . $i];
                $personSat = $_POST['personSat' . $i];

                $sql = "UPDATE $name SET sun='$discountSun',mon='$discountMon',tues='$discountTues',wed='$discountWed',thur='$discountThur',frid='$discountFrid',sat='$discountSat',psun='$personSun',pmon='$personMon',ptues='$personTues',pwed='$personWed',pthur='$personThur',pfrid='$personFrid',psat='$personSat' WHERE id = $i ";
                $res = mysqli_query($this->link, $sql);
            }
            if ($res) {
                echo "Added";
                header('location:discount.php');
                return $res;
            } else {
                echo "no";
                return false;
            }
        } else {
            return false;
        }

        # code...
    }
}
$obj = new discount;
$objRest = $obj->discountFunction();
$objUpdate = $obj->updateFunction();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="restaurant_profile.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="restaurant_profile.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="discount.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Discount</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="profile.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Profile</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="reservation.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Reservation</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="payment.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Payment</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="rest_logout.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Nav Item - Tables -->


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>






                </nav>
                <!-- Topbar -->

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Discount</h6>

                        </div>
                        <form action="" method="post">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="no-sort">Time</th>
                                                <th>Sun</th>
                                                <th>Mon</th>
                                                <th>Tues</th>
                                                <th>Wed</th>
                                                <th>Thur</th>
                                                <th>Frid</th>
                                                <th>Sat</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th class="no-sort">Time</th>

                                                <th>Sun</th>
                                                <th>Mon</th>
                                                <th>Tues</th>
                                                <th>Wed</th>
                                                <th>Thur</th>
                                                <th>Frid</th>
                                                <th>Sat</th>

                                            </tr>
                                        </tfoot>
                                        <tbody id="discount_data">


                                            <?php if ($objRest) { ?>
                                            <?php while ($row = mysqli_fetch_assoc($objRest)) { ?>

                                            <tr>
                                                <th class="text-center"><?php echo $row['time']; ?></th>
                                                <td>
                                                    <div class="p-3 bg-light" id="discount">
                                                        <input class="form-control border-0" type="number"
                                                            placeholder="%" name="discountSun<?php echo $row['id']; ?>"
                                                            value="<?php echo $row['sun']; ?>">

                                                    </div>
                                                    <hr>
                                                    <div class="p-3 bg-light" id="person">
                                                        <input class="form-control border-0" type="number"
                                                            placeholder="person"
                                                            name="personSun<?php echo $row['id']; ?>"
                                                            value="<?php echo $row['psun']; ?>">
                                                    </div>


                                                </td>
                                                <td>
                                                    <div class="p-3 bg-light">
                                                        <input class="form-control border-0" type="number"
                                                            placeholder="%" name="discountMon<?php echo $row['id']; ?>"
                                                            value="<?php echo $row['mon']; ?>">
                                                    </div>
                                                    <hr>
                                                    <div class="p-3 bg-light">
                                                        <input class="form-control border-0" type="number"
                                                            placeholder="person"
                                                            name="personMon<?php echo $row['id']; ?>"
                                                            value="<?php echo $row['pmon']; ?>">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="p-3 bg-light">
                                                        <input class="form-control border-0" type="number"
                                                            placeholder="%" name="discountTues<?php echo $row['id']; ?>"
                                                            value="<?php echo $row['tues']; ?>">
                                                    </div>
                                                    <hr>
                                                    <div class="p-3 bg-light">
                                                        <input class="form-control border-0" type="number"
                                                            placeholder="person"
                                                            name="personTues<?php echo $row['id']; ?>"
                                                            value="<?php echo $row['ptues']; ?>">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="p-3 bg-light">
                                                        <input class="form-control border-0" type="number"
                                                            placeholder="%" name="discountWed<?php echo $row['id']; ?>"
                                                            value="<?php echo $row['wed']; ?>">
                                                    </div>
                                                    <hr>
                                                    <div class="p-3 bg-light">
                                                        <input class="form-control border-0" type="number"
                                                            placeholder="person"
                                                            name="personWed<?php echo $row['id']; ?>"
                                                            value="<?php echo $row['pwed']; ?>">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="p-3 bg-light">
                                                        <input class="form-control border-0" type="number"
                                                            placeholder="%" name="discountThur<?php echo $row['id']; ?>"
                                                            value="<?php echo $row['thur']; ?>">
                                                    </div>
                                                    <hr>
                                                    <div class="p-3 bg-light">
                                                        <input class="form-control border-0" type="number"
                                                            placeholder="person"
                                                            name="personThur<?php echo $row['id']; ?>"
                                                            value="<?php echo $row['pthur']; ?>">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="p-3 bg-light">
                                                        <input class="form-control border-0" type="number"
                                                            placeholder="%" name="discountFrid<?php echo $row['id']; ?>"
                                                            value="<?php echo $row['frid']; ?>">
                                                    </div>
                                                    <hr>
                                                    <div class="p-3 bg-light">
                                                        <input class="form-control border-0" type="number"
                                                            placeholder="person"
                                                            name="personFrid<?php echo $row['id']; ?>"
                                                            value="<?php echo $row['pfrid']; ?>">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="p-3 bg-light">
                                                        <input class="form-control border-0" type="number"
                                                            placeholder="%" name="discountSat<?php echo $row['id']; ?>"
                                                            value="<?php echo $row['sat']; ?>">
                                                    </div>
                                                    <hr>
                                                    <div class="p-3 bg-light">
                                                        <input class="form-control border-0" type="number"
                                                            placeholder="person"
                                                            name="personSat<?php echo $row['id']; ?>"
                                                            value="<?php echo $row['psat']; ?>">
                                                    </div>
                                                </td>




                                            </tr>

                                            <?php } ?>

                                            <?php } ?>
                                            <!-- </form> -->


                                        </tbody>
                                    </table>
                                </div>
                                <button class="btn btn-success" type="submit" name="update">Update</button>
                            </div>
                        </form>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script>
    $('#dataTable').dataTable({
        "order": [],
        "columnDefs": [{
            "targets": 'no-sort',
            "orderable": false,
        }],
        "bPaginate": false

    });
    </script>

</body>

</html>