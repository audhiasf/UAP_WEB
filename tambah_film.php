<?php
include 'session/koneksi.php';

if(isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $genre = $_POST['genre'];
    $sinopsis = $_POST['sinopsis'];
    $durasi = $_POST['durasi'];

    // Proses upload gambar poster
    $poster = $_FILES['poster']['name'];
    $tmp_name = $_FILES['poster']['tmp_name'];
    $upload_dir = "img/";
    move_uploaded_file($tmp_name, $upload_dir.$poster);

    // Query untuk menambah data film ke dalam database
    $insert_sql = "INSERT INTO film (judul, genre, sinopsis, durasi, poster) VALUES ('$judul', '$genre', '$sinopsis', '$durasi', '$poster')";
    
    if ($mysqli->query($insert_sql) === TRUE) {
        echo "<script>alert('Film berhasil ditambahkan');window.location.href='tabel-film.php';</script>";
    } else {
        echo "Error: " . $insert_sql . "<br>" . $mysqli->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Film - Everjoy Cafe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
        .navbar-custom {
            background-color: #C39898;
            margin-bottom: 25px; 
        }
        .navbar-custom .navbar-brand,
        .navbar-custom {
            color: #ffffff;
            font-size: 30px;
        }

</style>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom justify-content-center">
        <a class="navbar-brand h2" href="dashboard.php">
            Cinematix
        </a>
        </div>
    </nav>
    <div class="container my-5">
        <h2>Tambah Film</h2>
        <hr>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Film</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>
            <div class="mb-3">
                <label for="genre" class="form-label">Genre</label>
                <input type="text" class="form-control" id="genre" name="genre" required>
            </div>
            <div class="mb-3">
                <label for="sinopsis" class="form-label">Sinopsis</label>
                <textarea class="form-control" id="sinopsis" name="sinopsis" rows="5"></textarea>
            </div>
            <div class="mb-3">
                <label for="durasi" class="form-label">Durasi</label>
                <input type="text" class="form-control" id="durasi" name="durasi" required>
            </div>
            <div class="mb-3">
                <label for="poster" class="form-label">Poster</label>
                <input type="file" class="form-control" id="poster" name="poster" required>
            </div>
            <button type="submit" class="btn mt-3" name="submit" style="background-color:#C39898; color:#ffffff">Tambah</button>
            <a href="tabel-film.php" class="btn mt-3" style="background-color: #987070; color: #ffffff;">Kembali</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
