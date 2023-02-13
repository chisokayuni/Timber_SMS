<?php 
  session_start();
  
  require 'php/db_conn.php';

  $sql = "SELECT * FROM sales WHERE type_of_timber = 'Pine' ";
  $result = $conn->query($sql);

  $sql2 = "SELECT * FROM sales WHERE type_of_timber = 'Bluegam' ";
  $result2 = $conn->query($sql2);
  
  $sql3 = "SELECT * FROM sales WHERE type_of_timber = 'Rejected' ";
  $result3 = $conn->query($sql3);

  // Daily Pine sales
  $today = date("Y-m-d");
  $sql4 = "SELECT SUM(total_amount) AS daily_sales FROM sales WHERE type_of_timber = 'Pine' AND date_of_sale = '$today' ";
  $result4 = $conn->query($sql4);

  // Daily Bluegam sales
  $today2 = date("Y-m-d");
  $sql5 = "SELECT SUM(total_amount) AS daily_sales2 FROM sales WHERE type_of_timber = 'Bluegam' AND date_of_sale = '$today2' ";
  $result5 = $conn->query($sql5);

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
      <h1>Timber Sales</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home.php">Home</a></li>
          <li class="breadcrumb-item active">Timber Sales</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">



                <div class="card-body">
                  <h5 class="card-title">Daily Sales <span>| Pine  
                    </span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-tree"></i>
                    </div>
                    <div class="ps-3"> 
                        <?php 
                            $row = $result4->fetch_assoc();
                            echo "<h6>".$row['daily_sales']."</h6>";
                            echo $today;
                        ?>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">



                <div class="card-body">
                  <h5 class="card-title">Daily Sales <span>| Bluegum</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-tree-fill"></i>
                    </div>
                    <div class="ps-3">
                    <?php 
                            $row5 = $result5->fetch_assoc();
                            echo "<h6>".$row5['daily_sales2']."</h6>";
                            echo $today2;
                        ?>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

        

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <img style="width: 100%;" src="assets/img/logo3.png" alt="">
      
        </div><!-- End Right side columns -->

        <div class="col-12">
          <div class="card recent-sales overflow-auto">


            <div class="card-body">
              <h5 class="card-title">Pine <span>| Sales</span></h5>

              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Size</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Amount per item (MWK)</th>
                    <th scope="col">Total Amount (MWK)</th>
                  </tr>
                </thead>
                <tbody>
                  
                <?php 

                    if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row['date_of_sale']."</td>";
                        echo "<td>".$row['sizes']."</td>";
                        echo "<td>".$row['quantity']."</td>";
                        echo "<td>".$row['amount_per_item']."</td>";
                        echo "<td>".$row['total_amount']."</td>";
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
              <h5 class="card-title">Bluegum <span>| Sales</span></h5>

              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Size</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Amount per item (MWK)</th>
                    <th scope="col">Total Amount (MWK)</th>
                  </tr>
                </thead>
                <tbody>
                  
                <?php 

                    if ($result2->num_rows > 0) {
                      while ($row2 = $result2->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row2['date_of_sale']."</td>";
                        echo "<td>".$row2['sizes']."</td>";
                        echo "<td>".$row2['quantity']."</td>";
                        echo "<td>".$row2['amount_per_item']."</td>";
                        echo "<td>".$row2['total_amount']."</td>";
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
              <h5 class="card-title">Rejected <span>| Sales</span></h5>

              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Size</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Amount per item (MWK)</th>
                    <th scope="col">Total Amount (MWK)</th>
                  </tr>
                </thead>
                <tbody>
                  
                <?php 

                    if ($result3->num_rows > 0) {
                      while ($row3 = $result3->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row3['date_of_sale']."</td>";
                        echo "<td>".$row3['sizes']."</td>";
                        echo "<td>".$row3['quantity']."</td>";
                        echo "<td>".$row3['amount_per_item']."</td>";
                        echo "<td>".$row3['total_amount']."</td>";
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
