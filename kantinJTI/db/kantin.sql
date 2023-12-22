-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Des 2023 pada 03.54
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kantin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `idBarang` int(11) NOT NULL,
  `namaBarang` varchar(225) NOT NULL,
  `jenisBarang` varchar(225) NOT NULL,
  `stok` varchar(225) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `namaSupplier` varchar(200) NOT NULL,
  `gambar` varchar(225) NOT NULL DEFAULT 'pp.jpeg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`idBarang`, `namaBarang`, `jenisBarang`, `stok`, `harga`, `sku`, `namaSupplier`, `gambar`) VALUES
(112, 'Aqua', 'Minuman', '45', '3000', 'MNM-001', 'Aqua Group', 'aqua_600ml.jpeg'),
(113, 'Teh Pucuk Harum', 'Minuman', '30', '5000', 'MNM-002', 'PT Mayora Indah', 'TEH-PUCUK-HARUM-ORIGINAL-350-ML.jpg'),
(114, 'Makaroni', 'Makanan Ringan', '40', '500', 'MKN-003', 'Bu Supri', 'Makroni.jpg'),
(115, 'Rice Bowl (Ayam)', 'Makanan Berat', '50', '10000', 'MKN-004', 'KFC', 'Ricebowl.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id_card` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailtransaksi`
--

CREATE TABLE `detailtransaksi` (
  `kodeTransaksi` int(11) NOT NULL,
  `idBarang` int(11) NOT NULL,
  `jumlah` varchar(225) DEFAULT NULL,
  `harga` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detailtransaksi`
--

INSERT INTO `detailtransaksi` (`kodeTransaksi`, `idBarang`, `jumlah`, `harga`) VALUES
(37, 112, '2', '6000'),
(37, 114, '10', '5000'),
(38, 113, '20', '100000');

--
-- Trigger `detailtransaksi`
--
DELIMITER $$
CREATE TRIGGER `updateStokAfterInsert` AFTER INSERT ON `detailtransaksi` FOR EACH ROW BEGIN
    DECLARE barangStok INT;

    -- Retrieve the current stok value from the barang table
    SELECT stok INTO barangStok FROM barang WHERE idBarang = NEW.idBarang;

    -- Update the stok value in the barang table
    UPDATE barang SET stok = barangStok - NEW.jumlah WHERE idBarang = NEW.idBarang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenisbarang`
--

CREATE TABLE `jenisbarang` (
  `jenisBarang` varchar(225) NOT NULL,
  `deskripsi` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jenisbarang`
--

INSERT INTO `jenisbarang` (`jenisBarang`, `deskripsi`) VALUES
('Makanan Berat', 'Kadaluarsa maximal 2 hari.'),
('Makanan Ringan', 'Pastikan ditaruh di suhu ruangan yang stabil.'),
('Minuman', 'Penempatan dikulkas. Produk Minuman.\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `omset`
--

CREATE TABLE `omset` (
  `id` int(11) NOT NULL,
  `nilai_omset` decimal(10,2) DEFAULT NULL,
  `tanggalMulai` date NOT NULL,
  `tanggalSelesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `omset`
--

INSERT INTO `omset` (`id`, `nilai_omset`, `tanggalMulai`, `tanggalSelesai`) VALUES
(1, '5171000.00', '2023-01-01', '2023-12-31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `kodeTransaksi` int(11) NOT NULL,
  `jumlahitem` int(225) NOT NULL,
  `totalPembayaran` decimal(50,0) NOT NULL,
  `nip` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`kodeTransaksi`, `jumlahitem`, `totalPembayaran`, `nip`, `tanggal`) VALUES
(1, 20, '30000', 1792371, '2023-12-13'),
(2, 5, '500000', 1792371, '2023-01-01'),
(3, 3, '300000', 1792371, '2023-01-05'),
(4, 8, '800000', 1792371, '2023-02-10'),
(5, 2, '200000', 1792371, '2023-02-15'),
(6, 6, '600000', 1792371, '2023-03-03'),
(7, 4, '400000', 1792371, '2023-03-08'),
(8, 7, '700000', 1792371, '2023-04-12'),
(9, 1, '100000', 1792371, '2023-04-18'),
(10, 9, '900000', 1792371, '2023-05-22'),
(11, 5, '500000', 1792371, '2023-05-28'),
(31, 2, '30000', 1792371, '2023-12-20'),
(37, 2, '11000', 1792371, '2023-12-22'),
(38, 1, '100000', 1792371, '2023-12-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `nip` int(11) NOT NULL,
  `nama_lengkap` varchar(225) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`nip`, `nama_lengkap`, `username`, `password`, `level`) VALUES
(1792371, 'Dennis Parulian Panjaitan', 'dennis', '321', 'pegawai'),
(18203812, 'Muhammad Ariel Saputra', 'ariel', '123', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `waitingroom`
--

CREATE TABLE `waitingroom` (
  `id_waiting` int(11) NOT NULL,
  `namabarang` varchar(225) NOT NULL,
  `jenisbarang` varchar(50) NOT NULL,
  `sku` varchar(225) NOT NULL,
  `namasupplier` varchar(225) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `gambar` varchar(225) NOT NULL,
  `status` enum('menunggu','disetujui','ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `waitingroom`
--

INSERT INTO `waitingroom` (`id_waiting`, `namabarang`, `jenisbarang`, `sku`, `namasupplier`, `harga`, `gambar`, `status`) VALUES
(22, 'Aqua', 'Minuman', 'MNM-001', 'Aqua Group', '3000', 'aqua_600ml.jpeg', 'disetujui'),
(23, 'Teh Pucuk Harum', 'Minuman', 'MNM-002', 'PT Mayora Indah', '5000', 'TEH-PUCUK-HARUM-ORIGINAL-350-ML.jpg', 'disetujui'),
(25, 'Sari Roti Dorayaki', 'Makanan Ringan', 'MKN-001', 'Sari Roti', '5000', 'sari Roti.jpg', 'ditolak'),
(26, 'Risoles', 'Makanan Berat', 'MKN-002', 'Gudang Mas Khrisna', '3500', 'risol.jpeg', 'ditolak'),
(27, 'Makaroni', 'Makanan Ringan', 'MKN-003', 'Bu Supri', '500', 'Makroni.jpg', 'disetujui'),
(28, 'Rice Bowl (Ayam)', 'Makanan Berat', 'MKN-004', 'KFC', '10000', 'Ricebowl.jpg', 'disetujui');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idBarang`),
  ADD KEY `fk_idSupplier` (`namaSupplier`),
  ADD KEY `fk_jenis` (`jenisBarang`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_card`);

--
-- Indeks untuk tabel `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  ADD PRIMARY KEY (`kodeTransaksi`,`idBarang`),
  ADD KEY `fk_kodeTransaksi` (`kodeTransaksi`),
  ADD KEY `fk_idBarang` (`idBarang`);

--
-- Indeks untuk tabel `jenisbarang`
--
ALTER TABLE `jenisbarang`
  ADD PRIMARY KEY (`jenisBarang`);

--
-- Indeks untuk tabel `omset`
--
ALTER TABLE `omset`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kodeTransaksi`),
  ADD KEY `fk_nip` (`nip`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `waitingroom`
--
ALTER TABLE `waitingroom`
  ADD PRIMARY KEY (`id_waiting`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `idBarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id_card` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `omset`
--
ALTER TABLE `omset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `kodeTransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `nip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18203813;

--
-- AUTO_INCREMENT untuk tabel `waitingroom`
--
ALTER TABLE `waitingroom`
  MODIFY `id_waiting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `fk_jenis` FOREIGN KEY (`jenisBarang`) REFERENCES `jenisbarang` (`jenisBarang`);

--
-- Ketidakleluasaan untuk tabel `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  ADD CONSTRAINT `fk_idBarang` FOREIGN KEY (`idBarang`) REFERENCES `barang` (`idBarang`),
  ADD CONSTRAINT `fk_kodeTransaksi` FOREIGN KEY (`kodeTransaksi`) REFERENCES `transaksi` (`kodeTransaksi`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_nip` FOREIGN KEY (`nip`) REFERENCES `user` (`nip`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
