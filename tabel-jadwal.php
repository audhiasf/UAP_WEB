<?php
include 'session/koneksi.php';

// Mengambil data dari tabel jadwal, film, dan teater
$query_mysql = mysqli_query($mysqli, "
    SELECT jadwal.*, film.judul, teater.nama, teater.total_kursi
    FROM jadwal
    JOIN film ON jadwal.id_film = film.id_film
    JOIN teater ON jadwal.id_teater = teater.id_teater
");

if (isset($_GET['delete'])) {
    $id_jadwal = $_GET['delete'];
    $delete_sql = "DELETE FROM jadwal WHERE id_jadwal = $id_jadwal";
    if ($mysqli->query($delete_sql) === TRUE) {
        echo "<script>alert('Jadwal berhasil dihapus');window.location.href='tabel-jadwal.php';</script>";
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
    <title>Jadwal Film</title>
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
    <nav class="navbar navbar-expand-lg navbar-custom pe-2 pb-3 pt-3">
        <a class="navbar-brand me-5 ms-3" href="dashboard.php">
            <h3>Cinematix</h3>
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="dashboard.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tabel-film.php">Film</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="tabel-jadwal.php">Jadwal</a>
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

    <div class="container mb-3 p-2" >
        <div class="row">
            <div class="col-sm-10">
                <h2>Daftar Jadwal</h2>
            </div>
            <div class="col-sm-2">
                <a href="tambah_jadwal.php" class="btn mb-3" style="background-color: #987070; color:#ffffff;">Tambah Jadwal</a>
            </div>
            <hr>
        </div>
    </div>

    <div class="container my-2 p-2">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Waktu Tayang</th>
                    <th>Teater</th>
                    <th>Total Kursi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; while ($result = mysqli_fetch_assoc($query_mysql)) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $result['judul']; ?></td>
                    <td><?= $result['tanggal_tayang']; ?></td>
                    <td><?= $result['waktu_tayang']; ?></td>
                    <td><?= $result['nama']; ?></td>
                    <td><?= $result['total_kursi']; ?></td>
                    <td>
                        <a href="edit_jadwal.php?id=<?= $result['id_jadwal']; ?>" class="btn btn-sm" style="background-color: #A87C7C; color: #ffffff;">Edit</a>
                        <a href="?delete=<?= $result['id_jadwal']; ?>" class="btn btn-outline-secondary btn-sm "  onclick="return confirm('Apakah ingin menghapus data jadwal ini?')">Delete</a>
                    
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
