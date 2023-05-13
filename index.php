<?php
session_start();
if(empty($_SESSION['user_autentification'])) {
   header("location:login.php");
   die();
}
if($_SESSION['user_autentification'] !="valid") {
   header("location:login.php");
   die();
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Basarnas Dashboard</title>
    <link rel="icon" type="assets/icon" href="assets/Basarnas_Logo.ico">
    
<link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="index.html">Basarnas Admin</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="logout.php">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2" class="align-text-bottom"></span>
              Reports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="settings" class="align-text-bottom"></span>
              Settings
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
          <span>Saved reports</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle" class="align-text-bottom"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Current month
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
        
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar" class="align-text-bottom"></span>
            Today
          </button>
        </div>
      </div>

      

      <div class="row row-cols-1 row-cols-md-2 gx-4 text-center">
        <div class="col themed-grid-col chart-font">Kecepatan Arus Sungai (m/s)</div>
        <div class="col themed-grid-col chart-font">Suhu Air Sungai (&deg;C)</div>
        <div class="col themed-grid-col">
          <canvas class="my-4 w-100" id="myChart1" width="900" height="380"></canvas></div>
        <div class="col themed-grid-col"> 
          <canvas class="my-4 w-100" id="myChart2" width="900" height="380"></canvas></div>
      </div>

      
      <h2>Sungai Kapuas</h2>
      <?php

        $conn=mysqli_connect("mysql","user","root","dibyo") or die();

        // Select data from the table
        $sql = "SELECT id, datetime, kecepatan_arus, kedalaman_sungai, suhu_air_sungai, latitude, longitude FROM river_data";
        $result = mysqli_query($conn, $sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            echo '<div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">Datetime</th>
                            <th scope="col">Kecepatan Arus Sungai (m/s)</th>
                            <th scope="col">Kedalaman Sungai (m)</th>
                            <th scope="col">Suhu Air Sungai (&deg;C)</th>
                            <th scope="col">Latitude/Longitude</th>
                        </tr>
                    </thead>
                    <tbody>';
            while($row = $result->fetch_assoc()) {
                echo '<tr>
                        <td>' . $row["datetime"] . '</td>
                        <td>' . $row["kecepatan_arus"] . '</td>
                        <td>' . $row["kedalaman_sungai"] . '</td>
                        <td>' . $row["suhu_air_sungai"] . '</td>
                        <td><a href="https://www.google.com/maps?q=' . $row["latitude"] . ',' . $row["longitude"] . '">' . $row["latitude"] . ',' . $row["longitude"] . '</a></td>
                    </tr>';
            }
            echo '</tbody></table></div>';
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>

    </main>
  </div>
</div>


    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="js/chart.js"></script>
  </body>
</html>
