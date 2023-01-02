<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');
if (strlen($_SESSION['aid'] == 0)) {
  header('location:logout.php');
} else {

?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

    <!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet" />
  </head>

  <body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
      <!-- Sidebar -->
      <?php include_once('includes/sidebar.php'); ?>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
          <!-- Topbar -->
          <?php include_once('includes/header.php'); ?>
          <!-- End of Topbar -->

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Uploaded Documents</h1>
            </div>

            <!-- Content Row -->
            <div class="row" style="overflow: auto;">
              <!-- Input Mask start -->

              <!-- Formatter start -->
              <?php
              $studoc = $_GET['docid'];
              if ($studoc == "") { ?>
                <p class="text-danger text-center">Student didn't uploaded a file yet.</p>

                <?php  } else {

                $query = mysqli_query($con, "select * from tbldocument where  ID=$studoc");
                $rw = mysqli_num_rows($query);
                if ($rw > 0) {
                  while ($row = mysqli_fetch_array($query)) {
                ?>

                    <table class="table mb-0">

                      <tr>
                        <th>Transfer Certificate</th>
                        <td><a href="../user/userdocs/<?php echo $row['TransferCertificate']; ?>" target="_blank">View File </a></td>
                      </tr>
                      <tr>
                        <th>10th Marksheet</th>
                        <td><a href="../user/userdocs/<?php echo $row['TenMarksheeet']; ?>" target="_blank">View File </a></td>
                      </tr>
                      <tr>
                        <th>12th Marksheet</th>
                        <td><a href="../user/userdocs/<?php echo $row['TwelveMarksheet']; ?>" target="_blank">View File </a></td>
                      </tr>
                      <tr>
                        <th>Graduation Certificate</th>
                        <td>
                          <?php if ($row['GraduationCertificate'] == "") { ?>
                            NA
                          <?php } else { ?>
                            <a href="../user/userdocs/<?php echo $row['GraduationCertificate']; ?>" target="_blank">View File </a>
                          <?php } ?>
                        </td>
                      </tr>

                      <tr>
                        <th>Post Graduation Certificate</th>
                        <td>
                          <?php if ($row['PostgraduationCertificate'] == "") { ?>
                            NA
                          <?php } else { ?>
                            <a href="../user/userdocs/<?php echo $row['PostgraduationCertificate']; ?>" target="_blank">View File </a>
                          <?php } ?>
                        </td>
                      </tr>

                    </table>
              <?php }
                }
              }  ?>
            </div>
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <?php include_once('includes/footer.php'); ?>
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
    <?php include_once('includes/logout-modal.php'); ?>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../assets/js/demo/chart-area-demo.js"></script>

  </body>

  </html>
<?php  } ?>