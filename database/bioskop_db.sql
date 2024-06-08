-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jun 2024 pada 18.44
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bioskop_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `username`, `password`, `nama`, `email`) VALUES
(1, 'jamal', 'jamal123', 'Jamaludin', 'jamaludin@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `film`
--

CREATE TABLE `film` (
  `id_film` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `durasi` varchar(50) DEFAULT NULL,
  `sinopsis` text DEFAULT NULL,
  `poster` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `film`
--

INSERT INTO `film` (`id_film`, `judul`, `genre`, `durasi`, `sinopsis`, `poster`) VALUES
(1, 'Mencuri Raden Saleh', 'Drama, Action', '154 Menit', 'Untuk menyelamatkan ayahnya, seorang pemalsu ulung berencana mencuri lukisan berharga dengan bantuan sekelompok spesialis yang beraneka ragam.', 'Mencuri Raden Saleh.jpeg'),
(2, 'Dua Hati Biru', 'Drama', '106 Menit', 'Sepasang suami istri muda, Dara dan Bima yang tengah menjalin hubungan asmara terpaksa menikah di usia muda karena hamil di luar nikah.', 'Dua Hati Biru.jpeg'),
(3, 'Agak Laen', 'Comedy', '119 Menit', 'Seorang lelaki tua meninggal dalam perjalanan rumah hantu yang gagal. Operator menguburkan jenazahnya di lokasi, mengubahnya menjadi atraksi populer.', 'agak lain.jpeg'),
(4, 'Thor: Love and Thunder', 'Action, Fantasy, Comedy', '118 Menit', 'Thor meminta bantuan Valkyrie, Korg, dan mantan pacarnya Jane Foster untuk melawan Gorr sang Dewa Jagal, yang bermaksud membuat para dewa punah.', 'download (4).jpeg'),
(5, 'Exhuma', 'Horror', '134 Menit', 'Proses penggalian kuburan yang tidak menyenangkan menimbulkan konsekuensi mengerikan yang terkubur di bawahnya.', 'Exhuma.jpg'),
(6, 'Jujutsu Kaisen 0', 'Action, Fantasy', '104 Menit', 'Prekuel Jujutsu Kaisen (2020), di mana seorang siswa sekolah menengah mendapatkan kendali atas roh terkutuk yang sangat kuat dan didaftarkan di Sekolah Menengah Jujutsu Prefektur Tokyo oleh Penyihir Jujutsu.', 'download (5).jpeg'),
(7, 'Avengers: Endgame', 'Action, Superhero', '181 Menit', 'Setelah peristiwa dahsyat di Avengers: Infinity War (2018), alam semesta berada dalam reruntuhan. Dengan bantuan sekutu yang tersisa, para Avengers berkumpul sekali lagi untuk membalikkan tindakan Thanos dan memulihkan keseimbangan alam semesta.', 'endgame.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_film` int(11) DEFAULT NULL,
  `id_teater` int(11) DEFAULT NULL,
  `tanggal_tayang` date DEFAULT NULL,
  `waktu_tayang` time DEFAULT NULL,
  `kursi_tersedia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_film`, `id_teater`, `tanggal_tayang`, `waktu_tayang`, `kursi_tersedia`) VALUES
(1, 1, 2, '2024-06-06', '11:50:00', NULL),
(2, 2, 1, '2024-06-07', '18:40:00', NULL),
(3, 3, 3, '2024-06-08', '20:10:00', NULL),
(4, 4, 2, '2024-06-08', '18:40:00', NULL),
(8, 5, 2, '2024-06-18', '18:10:00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_tayang`
--

CREATE TABLE `jadwal_tayang` (
  `id_jadwal` int(11) NOT NULL,
  `nama_film` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `teater` varchar(255) NOT NULL,
  `tanggal_tayang` date NOT NULL,
  `waktu_tayang` time NOT NULL,
  `kuota_kursi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal_tayang`
--

INSERT INTO `jadwal_tayang` (`id_jadwal`, `nama_film`, `gambar`, `teater`, `tanggal_tayang`, `waktu_tayang`, `kuota_kursi`) VALUES
(1, 'Mencuri Raden Saleh', 'Mencuri Raden Saleh.jpeg', '3', '2024-06-05', '22:50:00', 44),
(2, 'Thor: Love and Thunder', 'thor.jpeg', '2', '2024-06-06', '09:51:00', 111),
(3, 'Dua Hati Biru', 'Dua Hati Biru.jpeg', '2', '2024-06-05', '23:07:00', 100),
(4, 'Agak Lain', 'agak lain.jpeg', '1', '2024-06-30', '12:00:00', 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `teater`
--

CREATE TABLE `teater` (
  `id_teater` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `total_kursi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `teater`
--

INSERT INTO `teater` (`id_teater`, `nama`, `total_kursi`) VALUES
(1, 'Teater 1', 90),
(2, 'Teater 2', 100),
(3, 'Teater 3', 110);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_film` (`id_film`),
  ADD KEY `id_teater` (`id_teater`);

--
-- Indeks untuk tabel `jadwal_tayang`
--
ALTER TABLE `jadwal_tayang`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `teater`
--
ALTER TABLE `teater`
  ADD PRIMARY KEY (`id_teater`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `film`
--
ALTER TABLE `film`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `jadwal_tayang`
--
ALTER TABLE `jadwal_tayang`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `teater`
--
ALTER TABLE `teater`
  MODIFY `id_teater` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_teater`) REFERENCES `teater` (`id_teater`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
