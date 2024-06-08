<?php
include 'session/koneksi.php';

// Mendapatkan data jadwal berdasarkan id_jadwal
if (isset($_GET['id'])) {
    $id_jadwal = $_GET['id'];
    $jadwal_query = mysqli_query($mysqli, "SELECT * FROM jadwal WHERE id_jadwal = '$id_jadwal'");
    $jadwal = mysqli_fetch_assoc($jadwal_query);

    // Mengambil data film dan teater untuk dropdown
    $film_query = mysqli_query($mysqli, "SELECT id_film, judul FROM film");
    $teater_query = mysqli_query($mysqli, "SELECT id_teater, nama FROM teater");

    if (!$jadwal) {
        echo "<script>alert('Data jadwal tidak ditemukan');window.location.href='tabel-jadwal.php';</script>";
    }
}

if (isset($_POST['update'])) {
    $id_film = $_POST['id_film'];
    $tanggal = $_POST['tanggal_tayang'];
    $waktu_tayang = $_POST['waktu_tayang'];
    $id_teater = $_POST['id_teater'];

    $update_sql = "UPDATE jadwal SET id_film = '$id_film', tanggal_tayang = '$tanggal', waktu_tayang = '$waktu_tayang', id_teater = '$id_teater' WHERE id_jadwal = '$id_jadwal'";

    if ($mysqli->query($update_sql) === TRUE) {
        echo "<script>alert('Jadwal berhasil diperbarui');window.location.href='tabel-jadwal.php';</script>";
    } else {
        echo "Error: " . $update_sql . "<br>" . $mysqli->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jadwal - Cinematix</title>
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

    <div class="container my-3 p-2">
        <h2>Edit Jadwal</h2>
        <hr>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="id_film" class="form-label">Judul Film</label>
                <select class="form-select" id="id_film" name="id_film" required>
                    <option value="">Pilih Film</option>
                    <?php while ($film = mysqli_fetch_assoc($film_query)) { ?>
                        <option value="<?= $film['id_film']; ?>" <?= $film['id_film'] == $jadwal['id_film'] ? 'selected' : ''; ?>><?= $film['judul']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="tanggal_tayang" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="tanggal_tayang" name="tanggal_tayang" value="<?= $jadwal['tanggal_tayang']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="waktu_tayang" class="form-label">Waktu Tayang</label>
                <input type="time" class="form-control" id="waktu_tayang" name="waktu_tayang" value="<?= $jadwal['waktu_tayang']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="id_teater" class="form-label">Teater</label>
                <select class="form-select" id="id_teater" name="id_teater" required>
                    <option value="">Pilih Teater</option>
                    <?php while ($teater = mysqli_fetch_assoc($teater_query)) { ?>
                        <option value="<?= $teater['id_teater']; ?>" <?= $teater['id_teater'] == $jadwal['id_teater'] ? 'selected' : ''; ?>><?= $teater['nama']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn mt-3" name="update" style="background-color: #987070; color:#ffffff;">Update Jadwal</button>
            <a href="tabel-jadwal.php" class="btn btn-outline-secondary mt-3">Kembali</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
