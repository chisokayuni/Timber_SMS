<?php 

  session_start();
  require 'php/db_conn.php';

  $sql = "SELECT * FROM pine";
  $result = $conn->query($sql);

  $sql2 = "SELECT * FROM bluegam";
  $result2 = $conn->query($sql2);

  

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Timber SMS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo2.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!--  Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="home.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo2.png"  alt="">
       
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->



        <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <!-- <img src="assets/img/profile-img.png" alt="Profile" class="rounded-circle"> -->
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['username']; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

          <li class="dropdown-header">
              <h6><?php echo $_SESSION['username']; ?></h6>
              <span>Timber Sales</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="home.php">
          <i class="bi bi-grid"></i>
          <span>Timber Sales</span>
        </a>
      </li><!-- End Dashboard Nav -->


      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="addTimber.php">
          <i class="bi bi-tree"></i>
          <span>Add Timber</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="addSale.php">
          <i class="bi bi-coin"></i>
          <span>Add Sale</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="inStock.php">
          <i class="bi bi-bookshelf"></i>
          <span>In-Stock</span>
        </a>
      </li>
       <li class="nav-item">
        <a class="nav-link collapsed" href="addRejected.php">
          <i class="bi bi-bookshelf"></i>
          <span>Add Rejected Timber</span>
        </a>
      </li>
       <li class="nav-item">
        <a class="nav-link collapsed" href="rejected.php">
          <i class="bi bi-bookshelf"></i>
          <span>Rejected Timber</span>
        </a>
      </li>



    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Timber Stock</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Timber Stock</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        

        <div class="col-12">
          <div class="card recent-sales overflow-auto">


            <div class="card-body">
              <h5 class="card-title">Pine <span>| in-stock</span></h5>

              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th scope="col">Size</th>
                    <th scope="col">Order Price (MWK)</th>
                    <th scope="col">Total Order Price (MWK)</th>
                    <th scope="col">Selling Price (MWK)</th>
                    <th scope="col">Total Selling Price (MWK)</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Quantity</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 

                    if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row['sizes']."</td>";
                        echo "<td>".$row['order_price']."</td>";
                        echo "<td>".$row['total_order_price']."</td>";
                        echo "<td>".$row['selling_price']."</td>";
                        echo "<td>".$row['total_selling_price']."</td>";
                        echo "<td>".$row['date_added']."</td>";
                        echo "<td>".$row['quantity']."</td>";
                        echo "</tr>";
                      }
                    }else{
                      echo "0 results";
                    }
                  ?>
                  
                </tbody>
              </table>

            </div>

          </div>
        </div>

        <div class="col-12">
          <div class="card recent-sales overflow-auto">


            <div class="card-body">
              <h5 class="card-title">Bluegum <span>| in-stock</span></h5>

              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                  <th scope="col">Size</th>
                    <th scope="col">Order Price (MWK)</th>
                    <th scope="col">Total Order Price (MWK)</th>
                    <th scope="col">Selling Price (MWK)</th>
                    <th scope="col">Total Selling Price (MWK)</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Quantity</th>
                  </tr>
                </thead>
                <tbody>
                <?php 

                  if ($result2->num_rows > 0) {
                    while ($row2 = $result2->fetch_assoc()) {
                      echo "<tr>";
                      echo "<td>".$row2['sizes']."</td>";
                      echo "<td>".$row2['order_price']."</td>";
                      echo "<td>".$row2['total_order_price']."</td>";
                      echo "<td>".$row2['selling_price']."</td>";
                      echo "<td>".$row2['total_selling_price']."</td>";
                      echo "<td>".$row2['date_added']."</td>";
                      echo "<td>".$row2['quantity']."</td>";
                      echo "</tr>";
                    }
                  }else{
                    echo "0 results";
                  }
                  ?>
                  
                </tbody>
              </table>

            </div>

          </div>
        </div>

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Timber SMS</span></strong>. All Rights Reserved
    </div>
   
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
