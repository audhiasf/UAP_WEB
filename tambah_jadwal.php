<?php
include 'session/koneksi.php';

if(isset($_POST['submit'])) {
    $id_film = $_POST['id_film'];
    $tanggal_tayang = $_POST['tanggal_tayang'];
    $waktu_tayang = $_POST['waktu_tayang'];
    $id_teater = $_POST['id_teater'];
    
    // Prepare and bind
    $stmt = $mysqli->prepare("INSERT INTO jadwal (id_film, tanggal_tayang, waktu_tayang, id_teater) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("issi", $id_film, $tanggal_tayang, $waktu_tayang, $id_teater);

    if ($stmt->execute()) {
        echo "<script>alert('Jadwal berhasil ditambahkan');window.location.href='tabel-jadwal.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$film_query = mysqli_query($mysqli, "SELECT id_film, judul FROM film");
$teater_query = mysqli_query($mysqli, "SELECT id_teater, nama FROM teater");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jadwal - Cinematix</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
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
<body>
    <nav class="navbar navbar-expand-lg navbar-custom justify-content-center">
        <a class="navbar-brand h2" href="dashboard.php">
            Cinematix
        </a>
        </div>
    </nav>

    <div class="container my-5 p-2">
        <h2>Tambah Jadwal</h2>
        <hr>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="id_film" class="form-label">Judul Film</label>
                <select class="form-select" id="id_film" name="id_film" required>
                    <option value="">Pilih Film</option>
                    <?php while ($film = mysqli_fetch_assoc($film_query)) { ?>
                        <option value="<?= $film['id_film']; ?>"><?= $film['judul']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="tanggal_tayang" class="form-label">Tanggal Tayang</label>
                <input type="date" class="form-control" id="tanggal_tayang" name="tanggal_tayang" required>
            </div>
            <div class="mb-3">
                <label for="waktu_tayang" class="form-label">Waktu Tayang</label>
                <input type="time" class="form-control" id="waktu_tayang" name="waktu_tayang" required>
            </div>
            <div class="mb-3">
                <label for="id_teater" class="form-label">Teater</label>
                <select class="form-select" id="id_teater" name="id_teater" required>
                    <option value="">Pilih Teater</option>
                    <?php while ($teater = mysqli_fetch_assoc($teater_query)) { ?>
                        <option value="<?= $teater['id_teater']; ?>"><?= $teater['nama']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Tambah Jadwal</button>
            <a href="tabel-jadwal.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
