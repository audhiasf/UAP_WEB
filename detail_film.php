<?php
include 'session/koneksi.php';

// Mengambil data film berdasarkan id_film
if(isset($_GET['id'])) {
    $id_film = $_GET['id'];
    $query = mysqli_query($mysqli, "SELECT * FROM film WHERE id_film = '$id_film'");
    $data = mysqli_fetch_array($query);
} 

// Menghapus data film
if (isset($_GET['delete'])) {
    $id_film = $_GET['delete'];
    $delete_sql = "DELETE FROM film WHERE id_film = '$id_film'";
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
    <title>Detail Film</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .navbar-custom {
            background-color: #C39898;
            margin-bottom: 25px; 
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: #ffffff;
            font-size: 30px;
        }
        
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom justify-content-center">
        <a class="navbar-brand h2" href="dashboard.php">
            Cinematix
        </a>
    </nav>
    <div class="container my-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <img src="img/<?= $data['poster']; ?>" class="card-img-top" alt="<?= $data['judul']; ?>">
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title"><?= $data['judul']; ?></h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">Genre: <?= $data['genre']; ?></p>
                                        <p class="card-text">Sinopsis: <?= $data['sinopsis']; ?></p>
                                        <p class="card-text">Durasi: <?= $data['durasi']; ?></p>
                                    </div>
                                </div>
                                <a href="edit_film.php?id=<?= $data['id_film']; ?>" class="btn mt-3 me-3 pe-4 ps-4" style="background-color: #7E6363; color: #ffffff;">Edit</a>
                                <a href="detail_film.php?delete=<?= $data['id_film']; ?>" class="btn mt-3 me-3" style="background-color: #A87C7C; color: #ffffff;" onclick="return confirm('Apakah ingin menghapus data film ini?')">Delete</a>
                                <a href="tabel-film.php" class="btn mt-3 me-3 btn-outline-secondary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
