<?php

  session_start(); 
  require 'php/db_conn.php';

  if (isset($_POST['addTimber'])) {
    $type = $_POST['type'];
    $size = $_POST['size'];

    $date_added = date("Y-m-d", strtotime($_POST['date']));
    $form_quantity = $_POST['quantity'];

   if ($type === "Pine") {
        $sql = "SELECT * FROM pine WHERE sizes ='$size' ";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $db_order_price = $row['order_price'];
        $db_total_order_price = $row['total_order_price'];
        $db_selling_price = $row['selling_price'];
        $db_total_selling_price = $row['total_selling_price'];
        $db_quantity = $row['quantity'];

        // calculated variables
        $total_quantity = $db_quantity + $form_quantity;
        $total_order_price = $db_order_price * $total_quantity;
        $total_selling_price = $db_selling_price * $total_quantity;
        
        //sql to update pine stock info 
          $sql = "UPDATE pine 
                  SET date_added = '$date_added',
                      quantity = '$total_quantity',
                      total_selling_price = '$total_selling_price',
                      total_order_price = '$total_order_price'
                  WHERE sizes = '$size'
                ";

          if ($conn->query($sql) === TRUE) {
            header('Location: inStock.php');
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
    }elseif ($type === "Bluegam") {
      $sql = "SELECT * FROM bluegam WHERE sizes ='$size' ";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $db_order_price = $row['order_price'];
        $db_total_order_price = $row['total_order_price'];
        $db_selling_price = $row['selling_price'];
        $db_total_selling_price = $row['total_selling_price'];
        $db_quantity = $row['quantity'];

        // calculated variables
        $total_quantity = $db_quantity + $form_quantity;
        $total_order_price = $db_order_price * $total_quantity;
        $total_selling_price = $db_selling_price * $total_quantity;
        
        //sql to update pine stock info 
          $sql = "UPDATE bluegam 
                  SET date_added = '$date_added',
                      quantity = '$total_quantity',
                      total_selling_price = '$total_selling_price',
                      total_order_price = '$total_order_price'
                  WHERE sizes = '$size'
                ";

          if ($conn->query($sql) === TRUE) {
            header('Location: inStock.php');
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
    }


  }



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

  </header>

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
      <h1>Add Timber</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home.php">Timber</a></li>
          <li class="breadcrumb-item">Add timber</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Timber Details</h5>

              <!-- Vertical Form -->
              <form class="row g-3" method="post" action="addTimber.php">
                <div class="col-12">
                  <label class="col-sm-2 col-form-label">Type</label>

                    <select class="form-select" aria-label="Default select example" name="type">
                      <option >Pine</option>
                      <option >Bluegam</option>
                    </select>
              </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Size</label>
                  <select class="form-select" aria-label="Default select example" name="size">
                    <option >2x6</option>
                    <option >2x4</option>
                    <option >1x8</option>
                    <option >1x6</option>
                  </select>
                </div>
                <!-- <div class="col-12">
                  <label for="inputNanme4" class="form-label">Order Price</label>
                  <input type="number" class="form-control" id="inputNanme4" name="order_price" >
                </div> -->
                <!-- <div class="col-12">
                  <label for="inputNanme4" class="form-label">Selling Price</label>
                  <input type="number" class="form-control" id="inputNanme4" name="selling_price">
                </div> -->
                <div class="col-12">
                <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
                    <input type="date" class="form-control" name="date">
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Quantity</label>
                  <input type="number" class="form-control" id="inputNanme4" name="quantity">
                </div>


                <div class="text-center">
                  <button type="submit" class="btn btn-dark" name="addTimber">Add</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>
         

        </div>

        <div class="col-lg-6">

          <img src="assets/img/logo3.png" style="width: 100%;" alt="">


        </div>
      </div>
    </section>

  </main><!-- End #main -->


    <!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Timber SMS</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->

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
