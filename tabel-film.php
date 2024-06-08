<?php
include 'session/koneksi.php';

$query_mysql = mysqli_query($mysqli, "SELECT * FROM film");
$total_menu = mysqli_num_rows($query_mysql);

if (isset($_GET['delete'])) {
    $id_film = $_GET['delete'];
    $delete_sql = "DELETE FROM film WHERE id_film = $id_film";
    if ($mysqli->query($delete_sql) === TRUE) {
        echo "<script>alert('Film berhasil dihapus');window.location.href='tabel-film.php';</script>";
    } else {
        echo "Error deleting record: " . $mysqli->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Film</title>
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
    </style>
</head>
<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-custom pb-3 pt-3">
        <a class="navbar-brand me-5 ms-3" href="dashboard.php">
            <h3>Cinematix</h3>
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link " aria-current="page" href="dashboard.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="tabel-film.php">Film</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tabel-jadwal.php">Jadwal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Pesanan</a>
            </li>
            </ul>
            <form class="d-flex me-3" role="search" method="GET" action="">
            <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
            <button class="btn btn-outline-custom" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="container mb-3 p-2" style="margin-top: 8%;">
        <div class="row">
            <div class="col-sm-10">
                <h2>Daftar Film</h2>
            </div>
            <div class="col-sm-2">
                <a href="tambah_film.php" class="btn mb-3" style="background-color: #987070; color:#ffffff;">Tambah Film</a>
            </div>
            <hr>
        </div>
    </div>

    <section class="menu">
    <div class="container" style="padding-bottom: 15px;">
        <div class="row">
            <?php
            $search = isset($_GET['search']) ? $_GET['search'] : '';

            $sql = "SELECT * FROM film";
            if ($search) {
                $sql .= " WHERE judul LIKE '%$search%'";
            }

            $result = $mysqli->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
            ?>
            <div class="col-md-3 mb-3">
                <div class="card">
                <a href="detail_film.php?id=<?= $row["id_film"]; ?>" style="text-decoration: none; color: black;">
                <img src="img/<?= $row["poster"]; ?>" class="card-img-top" alt="<?= $row["judul"]; ?>" style="height: 300px; object-fit: cover;">
                    <div class="card-body">
                        <strong><p class="card-text text-center font-weight-bold"><?= $row["judul"];?></p></strong>
                        <p class="card-text mb-3 mt-3"><?= $row["genre"]; ?></p>
                        <a href="edit_film.php?id=<?= $row["id_film"]; ?>" class="btn btn-sm" style="background-color: #7E6363; color: #ffffff;">Edit</a>
                        <a href="?delete=<?= $row["id_film"]; ?>" class="btn btn-sm btn-outline-secondary"  onclick="return confirm('Apakah ingin menghapus data film ini?')">Delete</a>
                    </div>
                </div>
                </a>
            </div>
            <?php
                }
            } else {
                echo "Tidak ada data film.";
            }
            ?>
        </div>
    </div>
</section>

</body>
</html>
