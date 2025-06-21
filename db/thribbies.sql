-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jun 2025 pada 05.33
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
-- Database: `thribbies`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `favorit`
--

CREATE TABLE `favorit` (
  `id` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `favorit`
--

INSERT INTO `favorit` (`id`, `id_users`, `id_produk`) VALUES
(6, 0, 31),
(7, 0, 28),
(8, 0, 12),
(9, 1, 12),
(12, 1, 31),
(29, 1, 6),
(52, 1, 9),
(53, 1, 27),
(54, 1, 41),
(55, 1, 40);

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `alasan` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `pelapor` varchar(100) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id`, `id_produk`, `alasan`, `keterangan`, `pelapor`, `tanggal`) VALUES
(1, 27, 'Barang Tidak Sesuai', 'gdsh', 'pira', '2025-06-20 03:32:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `harga` varchar(50) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `no_penjual` varchar(20) DEFAULT NULL,
  `penjual` varchar(100) DEFAULT NULL,
  `gambar_penjual` varchar(255) DEFAULT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `nama`, `harga`, `lokasi`, `gambar`, `deskripsi`, `no_penjual`, `penjual`, `gambar_penjual`, `kategori`, `user_id`) VALUES
(39, 'baju vintage vest', '50000', 'kebayoran baru, jakarta selatan', 'WhatsApp Image 2025-06-02 at 17.56.22_593b12bd.jpg', 'baju baru', '', 'pira', 'Screenshot 2025-04-11 204843.png', 'Baju', 1),
(40, 'Honda Brio 2015 AT', '150000000', 'kebayoran baru, jakarta selatan', 'mobil1.jpg', 'Honda Brio E Matic 2015\r\nSTNK An Perusahaan\r\nPlat Ganjil\r\nPajak Agust 2025\r\nTangerang Selatan\r\nKM 94.xxx\r\nInterior-exterior rapih & terawat\r\nTransmisi automatic responsif\r\nKaki2 senyap\r\nKunci 2\r\nBuku service ada\r\n* Garansi km Asli\r\n* Garansi dokumen Asli & Lengkap\r\n* Garansi tdk bekas tabrakan\r\n* Garansi tdk bekas Banjir\r\nHarga otr credit Rp150jt\r\nDp 2jt\r\nAngs 3.230.000/59bln\r\nDp 8jt\r\nAngs 3.015.000/59bln\r\n* Dp sdh termasuk Angs pertama, adm & asuransi kendaraan Tlo\r\nHarga cash call/wa\r\nMervin Mandiri Motor\r\nSerpong- Bsd city', '', 'pira', 'Screenshot 2025-04-11 204843.png', 'Motor Baru', 1),
(41, 'Vario 125 CBS 2024', '10900000', 'Pasar Minggu, jakarta selatan', 'motor.jpg', 'motor vario 125 CBS 2024 baru 3 bulan pemakaian, surat surat lengkap ', '', 'pira', 'Screenshot 2025-04-11 204843.png', 'Motor Bekas', 1),
(43, 'Sepeda Federal TomCat', '3800000', 'kebayoran lama, jakarta selatan', 'Federal Biru Putih1 1.png', 'p', '', 'pira', 'Screenshot 2025-04-11 204843.png', 'Sepeda, Skuter & Aksesoris', 1),
(44, 'Helm NJS ZX-1 Full Visor', '475000', 'Pesanggrahan, jakarta selatan', 'helm.jpg', 'p', '', 'pira', 'Screenshot 2025-04-11 204843.png', 'Motor Bekas', 1),
(45, 'Amazfit T-Rex 1 Rock Black', '999000', 'Cilandak, jakarta selatan', 'jam.png', 'm', '', 'pira', 'Screenshot 2025-04-11 204843.png', 'Alat Musik & Aksesoris', 1),
(46, 'ipad pro gen 1 12.9inci 128gb', '4500000', 'kebayoran baru, jakarta selatan', 'ipad.png', 'm', '', 'pira', 'Screenshot 2025-04-11 204843.png', 'Tablet', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `Nama` varchar(100) NOT NULL,
  `bio` text DEFAULT NULL,
  `no_wa` varchar(20) DEFAULT NULL,
  `role` varchar(20) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `foto`, `Nama`, `bio`, `no_wa`, `role`) VALUES
(1, 'nisaa@gmail.com', '$2y$10$WkRldVfbGLdwJbCG/OMiGuPQ4eSKxXG8TZwk/NlEs1j.5K/ZlhAuK', 'Screenshot 2025-04-11 204843.png', 'pira', 'o', NULL, 'user'),
(12, 'pira@gmail.com', '$2y$10$nBDjmlbxz5X8uPfJPheXjunoiE.G09w4UWJaAcmtm2ub3hVmnL0uu', 'download-pica.png', 'pira', 'p', NULL, 'user'),
(13, 'sipa@gmail.com', '$2y$10$yXNEYCMBuWxeFqABAZpfr.De1H.iq.R67bdonM9hfNCDxSok6jwJ.', 'webcam-toy-photo2.jpg', 'sipa', NULL, '085762871291', 'user'),
(14, 'admin@gmail.com', '$2y$10$zLNP4PHB/dOLIA0GUv9XP.hPsqSKWQkPEHnfYs5R8T9CKLHororC.', 'Screenshot 2025-04-18 204511.png', 'admin', NULL, '085762871291', 'admin'),
(15, 'admin1@gmail.com', '$2y$10$fhWCmFGwecrmh/6SgQ3bWezI/SXKrlnkIrRLvslfOjLksSSHUA2Li', 'default.png', 'admin', NULL, '085762871291', 'admin'),
(16, 'admin2@gmail.com', '$2y$10$3XbSzZHfe7JN5Iw6kH5Lwe5hX0yvuGuiSuJL0RKtMmSywXtYfAXoi', 'default.png', 'admin2', NULL, '085762812782', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `favorit`
--
ALTER TABLE `favorit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `favorit`
--
ALTER TABLE `favorit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
