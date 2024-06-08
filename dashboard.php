<?php
include "session/koneksi.php";

$query_mysql = mysqli_query($mysqli, "SELECT * FROM film");
$total_film = mysqli_num_rows($query_mysql);
$query_jadwal = mysqli_query($mysqli, "SELECT * FROM jadwal");

$total_jadwal = mysqli_num_rows($query_jadwal);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cinematix</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .navbar-custom {
            background-color: #C39898;
            margin-bottom: 25px; 
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: #ffffff;
        }
        .navbar-custom .nav-link:hover {
            color: #d4d4d4;
        }
        .btn-outline-custom {
            border-color: #ffffff;
            color: #ffffff;
        }
        .btn-outline-custom:hover {
            background-color: #ffffff;
            color: #343a40;
        }
        .page-title {
            color: #343a40;
            font-size: 1.5;
            margin-bottom: 0;
        }
        .page-title .page-title-icon {
          display: inline-block;
          width: 36px;
          height: 36px;
          border-radius: 4px;
          text-align: center;
          box-shadow: 0px 3px 8.3px 0.7px rgba(163, 93, 255, 0.35);
        }
        .page-title .page-title-icon i {
          font-size: 0.9375rem;
          line-height: 36px;
        }

        .card-gradient {
            background: linear-gradient(45deg,  #C39898,#f3e6e3);
            border: none;
        }
        .card-gradient h4, .card-gradient h2 {
            color: #343a40;
        }
        .card {
            margin-bottom: 20px; 
        }
        .navbar {
            padding: 1rem;
        }
        .card-body {
            position: relative;padding: 20px;padding: 15px;
        }
        .card-body .icon-bg {
            position: absolute;
            right: 0; 
            opacity: 0.2;
            font-size: 2rem; 
            bottom: -15px;
        }

    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand me-5" href="dashboard.php">
            <h3>Cinematix</h3>
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tabel-film.php">Film</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tabel-jadwal.php">Jadwal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pesanan</a>
                </li>
            </ul>
            <form class="d-flex" role="search" method="GET" action="">
                <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                <button class="btn btn-outline-custom" type="submit">Search</button>
            </form>

        </div>
    </nav>
    <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon text-white me-2 ms-3" style="background-color:#C39898">
                  <i class="fas fa-home"></i>
                </span> Dashboard
              </h3>
            </div>
            <div class="row mt-3 justify-content-center">
              <div class="col-md-3 stretch-card grid-margin">
                <div class="card card-gradient card-img-holder p-2 pb-3">
                  <div class="card-body">
                    <div class="icon-bg">
                      <i class="fa-solid fa-film"></i>
                    </div>
                    <h4 class="mb- text-white">Jumlah Film <i class="fa-solid fa-film ms-5 ps-5"></i></h4>
                    <h2 class="mb-5 text-white"><?= $total_film ?> Film</h2>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card card-gradient card-img-holder p-2">
                  <div class="card-body">
                    <div class="icon-bg pb-2">
                      <i class="fa-regular fa-calendar"></i>
                    </div>
                    <h4 class="mb-3 text-white">Jumlah Jadwal <i class="fa-regular fa-calendar ms-5 ps-5"></i></h4>
                    <h2 class="mb-5 text-white"><?= $total_jadwal; ?> Jadwal</h2>
                  </div>
                </div>
              </div>
              <div class="col-md-3 stretch-card grid-margin">
                <div class="card card-gradient card-img-holder p-2">
                  <div class="card-body ">
                    <div class="icon-bg pb-2">
                      <i class="fa-solid fa-ticket-simple"></i>
                    </div>
                    <h4 class="mb-3 text-white">Jumlah Tiket <i class="fa-solid fa-ticket-simple ms-5 ps-5"></i></h4>
                    <h2 class="mb-5 text-white">4 Tiket</h2>
                  </div>
                </div>
            </div>
        </div>
    </div>   
    <hr>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
