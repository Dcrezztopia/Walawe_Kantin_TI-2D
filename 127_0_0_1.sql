-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Des 2023 pada 04.33
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
-- Database: `akademik`
--
CREATE DATABASE IF NOT EXISTS `akademik` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `akademik`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `Kd_Dosen` varchar(100) NOT NULL,
  `Nm_Dosen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`Kd_Dosen`, `Nm_Dosen`) VALUES
('B104', 'Ati'),
('B105', 'Dita'),
('C102', 'Leo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `No_Mhs` int(10) NOT NULL,
  `Nama_mhs` varchar(100) DEFAULT NULL,
  `Jurusan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`No_Mhs`, `Nama_mhs`, `Jurusan`) VALUES
(1921001, 'Aminah', 'MI'),
(1921002, 'Budiman', 'MI'),
(1921003, 'Carina', 'MI'),
(1921004, 'Della', 'TI'),
(1921005, 'Firda', 'TI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `Kd_MK` varchar(100) NOT NULL,
  `Nama_MK` varchar(100) DEFAULT NULL,
  `Kd_Dosen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`Kd_MK`, `Nama_MK`, `Kd_Dosen`) VALUES
('MI305', 'Basis Data', 'B104'),
('MI465', 'Pemograman', 'B105'),
('TI201', 'Pemograman', 'C102');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `No_Mhs` int(10) DEFAULT NULL,
  `Kd_MK` varchar(100) DEFAULT NULL,
  `nilai` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`Kd_Dosen`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`No_Mhs`);

--
-- Indeks untuk tabel `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`Kd_MK`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD KEY `No_Mhs` (`No_Mhs`),
  ADD KEY `Kd_MK` (`Kd_MK`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`No_Mhs`) REFERENCES `mahasiswa` (`No_Mhs`),
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`Kd_MK`) REFERENCES `mata_kuliah` (`Kd_MK`);
--
-- Database: `db`
--
CREATE DATABASE IF NOT EXISTS `db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_tbl`
--

CREATE TABLE `user_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mobile` varchar(150) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `name`, `email`, `mobile`, `address`) VALUES
(2, 'Airi Satou', 'AiriSatou@gmail.com', '123456789', 'Tokyo'),
(3, 'Ashton Cox', 'AshtonCox@gmail.com', '12345679', 'San Francisco');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Database: `db_polinema`
--
CREATE DATABASE IF NOT EXISTS `db_polinema` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_polinema`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `nidn` int(20) NOT NULL,
  `nama_dosen` char(50) DEFAULT NULL,
  `status` enum('PNS','KONTRAK') DEFAULT 'PNS',
  `jenis_kelamin` enum('L','P') DEFAULT 'L',
  `no_hp` varchar(15) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nidn`, `nama_dosen`, `status`, `jenis_kelamin`, `no_hp`, `alamat`) VALUES
(111, 'Adevian', '', 'P', '08133812731', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahassiswa`
--

CREATE TABLE `mahassiswa` (
  `nim` int(8) NOT NULL,
  `nama_mhs` varchar(50) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT 'L',
  `alamat` varchar(50) DEFAULT NULL,
  `kota` varchar(20) DEFAULT 'Malang',
  `no_hp` varchar(12) DEFAULT NULL,
  `umur` int(11) DEFAULT NULL,
  `kode_prodi` varchar(6) DEFAULT NULL,
  `agama` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahassiswa`
--

INSERT INTO `mahassiswa` (`nim`, `nama_mhs`, `jenis_kelamin`, `alamat`, `kota`, `no_hp`, `umur`, `kode_prodi`, `agama`) VALUES
(2147483647, 'Dennis Parulian Panjaitan', 'L', 'Jalan Anggrek', 'Malang', '081333487717', 20, '123', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `mk_id` char(10) NOT NULL,
  `nama_mk` char(50) DEFAULT NULL,
  `jumlah_jam` float(4,2) DEFAULT NULL,
  `sks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`mk_id`, `nama_mk`, `jumlah_jam`, `sks`) VALUES
('111', 'Basis Data', 4.00, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `kode_prodi` char(6) NOT NULL,
  `nama_prodi` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`kode_prodi`, `nama_prodi`) VALUES
('123', 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang`
--

CREATE TABLE `ruang` (
  `ruang_id` char(3) NOT NULL,
  `nama_ruang` char(20) DEFAULT NULL,
  `kapasitas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ruang`
--

INSERT INTO `ruang` (`ruang_id`, `nama_ruang`, `kapasitas`) VALUES
('222', 'Praktikum', 30);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nidn`);

--
-- Indeks untuk tabel `mahassiswa`
--
ALTER TABLE `mahassiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `kode_prodi` (`kode_prodi`);

--
-- Indeks untuk tabel `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`mk_id`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`kode_prodi`);

--
-- Indeks untuk tabel `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`ruang_id`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `mahassiswa`
--
ALTER TABLE `mahassiswa`
  ADD CONSTRAINT `mahassiswa_ibfk_1` FOREIGN KEY (`kode_prodi`) REFERENCES `prodi` (`kode_prodi`);
--
-- Database: `kantin`
--
CREATE DATABASE IF NOT EXISTS `kantin` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `kantin`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `idBarang` int(11) NOT NULL,
  `namaBarang` varchar(225) NOT NULL,
  `jenisBarang` varchar(50) NOT NULL,
  `stok` varchar(225) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `idSupplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`idBarang`, `namaBarang`, `jenisBarang`, `stok`, `harga`, `sku`, `idSupplier`) VALUES
(2, 'Cinnamon Swirl Delight', 'Roti', '50', '3', 'CSD002', 2),
(4, 'Sesame Seed Sourdough', 'Roti', '80', '4', 'SSS004', 3),
(5, 'Chocolate Chip Brioche', 'Roti', '60', '5', 'CCB005', 4),
(6, 'Whole Wheat Wonder Loaf', 'Roti', '90', '2', 'WWL006', 5),
(7, 'Rustic Rye Boule', 'Roti', '120', '4', 'RRB007', 6),
(8, 'Sweet Potato Sourdough', 'Roti', '40', '5', 'SPS008', 7),
(9, 'Honey Oat Harvest Loaf', 'Roti', '70', '4', 'HOHL009', 8),
(10, 'Sunflower Seed Bagel', 'Roti', '110', '3', 'SSB010', 9),
(11, 'Pumpkin Spice Twist', 'Roti', '55', '3', 'PST011', 10),
(12, 'Blueberry Bliss Scone', 'Kue', '85', '2', 'BBS012', 11),
(13, 'Almond Joy Danish', 'Kue', '65', '4', 'AJD013', 12),
(14, 'Chocolate Hazelnut Croissant', 'Kue', '95', '5', 'CHC014', 13),
(15, 'Raspberry Lemon Cupcake', 'Kue', '75', '3', 'RLC015', 14),
(16, 'Vanilla Bean Macaron', 'Kue', '100', '4', 'VBM016', 15),
(17, 'Red Velvet Whoopie Pie', 'Kue', '45', '4', 'RVWP017', 16),
(18, 'Pistachio Rose Eclair', 'Kue', '80', '6', 'PRE018', 17),
(19, 'Lemon Blueberry Muffin', 'Kue', '60', '3', 'LBM019', 18),
(20, 'Salted Caramel Brownie', 'Kue', '70', '4', 'SCB020', 19),
(21, 'Peanut Butter Cup Cookie', 'Kue', '105', '2', 'PBCC021', 20),
(22, 'Coconut Cream Pie Slice', 'Kue', '50', '3', 'CCPS022', 21),
(23, 'Gingerbread House Kit', 'Kue', '75', '5', 'GHK023', 22),
(24, 'Peach Cobbler Bar', 'Kue', '95', '3', 'PCB024', 23),
(25, 'Chocolate Mint Whoopie Pie', 'Kue', '55', '3', 'CMWP025', 24),
(26, 'Maple Pecan Danish', 'Kue', '85', '4', 'MPD026', 25),
(27, 'Strawberry Shortcake Cupcake', 'Kue', '65', '3', 'SSCC027', 26),
(28, 'Cherry Almond Tart', 'Kue', '90', '4', 'CAT028', 27),
(29, 'Mango Passionfruit Macaron', 'Kue', '110', '4', 'MPM029', 28),
(30, 'Hazelnut Chocolate Scone', 'Kue', '40', '5', 'HCS030', 29),
(31, 'Key Lime Pie Slice', 'Kue', '70', '3', 'KLPS031', 30),
(32, 'Banana Nut Muffin', 'Kue', '95', '4', 'BNM032', 31),
(33, 'Raspberry Chocolate Brownie', 'Kue', '50', '3', 'RCB033', 32),
(34, 'Blueberry Cheesecake Bar', 'Kue', '75', '4', 'BCB034', 33),
(35, 'Pumpkin Spice Cupcake', 'Kue', '85', '4', 'PSC035', 34),
(36, 'Oreo Cookie Cheesecake Slice', 'Kue', '60', '3', 'OCCS036', 35),
(37, 'Lemon Poppy Seed Muffin', 'Kue', '80', '3', 'LPSM037', 36),
(38, 'Salted Caramel Chocolate Tart', 'Kue', '55', '5', 'SCCT038', 37),
(39, 'Coconut Mango Cupcake', 'Kue', '65', '3', 'CMC039', 38),
(40, 'Almond Joy Cupcake', 'Kue', '90', '4', 'AJC040', 39),
(41, 'Chocolate Raspberry Truffle Tart', 'Kue', '40', '6', 'CRTT041', 40),
(42, 'Cranberry Orange Scone', 'Kue', '105', '3', 'COS042', 41),
(43, 'Chocolate Peanut Butter Brownie', 'Kue', '50', '3', 'CPBB043', 42),
(44, 'Red Velvet Cheesecake Bar', 'Kue', '75', '4', 'RVCB044', 43),
(45, 'Apple Cinnamon Muffin', 'Kue', '95', '3', 'ACM045', 44),
(46, 'Pecan Pie Slice', 'Kue', '55', '3', 'PPS046', 45),
(47, 'Mocha Hazelnut Cupcake', 'Kue', '80', '5', 'MHC047', 46),
(48, 'Lavender Honey Tart', 'Kue', '75', '4', 'LHT048', 47),
(49, 'Apricot Almond Scone', 'Kue', '65', '3', 'AAS049', 48),
(50, 'Dark Chocolate Truffle Cupcake', 'Kue', '110', '4', 'DCTC050', 49),
(51, 'ariel', 'dennis', '24', '17', '', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailtransaksi`
--

CREATE TABLE `detailtransaksi` (
  `kodedetail` int(11) NOT NULL,
  `idBarang` int(11) NOT NULL,
  `kodeTransaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `idsupplier` int(11) NOT NULL,
  `namaSupplier` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`idsupplier`, `namaSupplier`) VALUES
(1, 'Golden Wheat Suppliers'),
(2, 'Flour Fusion Inc.'),
(3, 'Dough Delights Co.'),
(4, 'Yeast Paradise'),
(5, 'Bakery Bliss Suppliers'),
(6, 'Sweet Grain Traders'),
(7, 'Rising Sun Distributors'),
(8, 'Dough Master Supply'),
(9, 'Flaky Flour Enterprises'),
(10, 'Grain Galore Corp.'),
(11, 'Tasty Treats Suppliers'),
(12, 'Rolling Pins Unlimited'),
(13, 'Wholesome Wheat Merchants'),
(14, 'Sugar and Spice Trading'),
(15, 'Crunchy Crust Distributors'),
(16, 'Butter and Flour Connection'),
(17, 'Delightful Dough Inc.'),
(18, 'Sweets and Sourdough Co.'),
(19, 'Flour Fantasy Traders'),
(20, 'Golden Crust Enterprises'),
(21, 'Rye and Shine Distributors'),
(22, 'Crispy Crust Suppliers'),
(23, 'Sweet Wheat Emporium'),
(24, 'Hearty Harvest Trading'),
(25, 'Artisanal Breadcraft Co.'),
(26, 'Perfect Pastries Ltd.'),
(27, 'Flavorful Flour Co.'),
(28, 'Savory Slices Traders'),
(29, 'Whisk and Wheat Merchants'),
(30, 'Bread Boutique Inc.'),
(31, 'Dough Dynasty'),
(32, 'Sourdough Symphony Suppliers'),
(33, 'Rolling in Rye Co.'),
(34, 'Sweet Symphony Traders'),
(35, 'Flour Fusion Enterprises'),
(36, 'Bake Bliss Distributors'),
(37, 'Golden Grain Guild'),
(38, 'Hearty Harvest Trading'),
(39, 'Crispy Crust Creations'),
(40, 'Flaky Fantasy Co.'),
(41, 'Yeast Yield Traders'),
(42, 'Butter and Baguette Enterprises'),
(43, 'Rising Rolls Co.'),
(44, 'Artisanal Appetites Trading'),
(45, 'Flourish and Flavor Co.'),
(46, 'Bread Basket Emporium'),
(47, 'Wholesome Wheat Trading'),
(48, 'Dough Divinity Suppliers'),
(49, 'Flavorful Flour Traders'),
(50, 'Rolling in Riches Co.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `kodeTransaksi` int(11) NOT NULL,
  `jumlahitem` int(225) NOT NULL,
  `totalPembayaran` decimal(50,0) NOT NULL,
  `nip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `status` enum('menunggu','disetujui','ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `waitingroom`
--

INSERT INTO `waitingroom` (`id_waiting`, `namabarang`, `jenisbarang`, `sku`, `namasupplier`, `harga`, `status`) VALUES
(1, 'Dennis Parulian Panjaitan', 'Manusia', '32345', 'anjaymabar', '3', 'menunggu'),
(3, 'Ariel', 'Manusia juga kok', '32134', 'adadeh', '34', 'disetujui'),
(4, 'Pascalis', 'anjaynmabar', '324567', 'walawe', '3', 'ditolak');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idBarang`),
  ADD KEY `fk_idSupplier` (`idSupplier`);

--
-- Indeks untuk tabel `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  ADD PRIMARY KEY (`kodedetail`),
  ADD KEY `fk_kodeTransaksi` (`kodeTransaksi`),
  ADD KEY `fk_idBarang` (`idBarang`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`idsupplier`);

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
  MODIFY `idBarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT untuk tabel `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  MODIFY `kodedetail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `idsupplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `kodeTransaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `nip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18203813;

--
-- AUTO_INCREMENT untuk tabel `waitingroom`
--
ALTER TABLE `waitingroom`
  MODIFY `id_waiting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `fk_idSupplier` FOREIGN KEY (`idSupplier`) REFERENCES `supplier` (`idsupplier`);

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
--
-- Database: `new_akademik_uas`
--
CREATE DATABASE IF NOT EXISTS `new_akademik_uas` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `new_akademik_uas`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `lecture_id` char(4) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`lecture_id`, `first_name`, `last_name`, `street`, `city`, `email`, `phone_number`) VALUES
('D001', 'Abdul', 'Chalim', 'Soekarno Hatta', 'Malang', 'abdul@polinema.ac.id', '+628295281495'),
('D002', 'Ade', 'Ismail', 'Soekarno Hatta', 'Malang', 'ade@polinema.ac.id', '+628443138106'),
('D003', 'Agung Nugroho', 'Pramudhita ', 'Soekarno Hatta', 'Malang', 'agungnugroho@polinema.ac.id', '+628764790271'),
('D004', 'Ahmadi Yuli', 'Ananta ', 'Soekarno Hatta', 'Malang', 'ahmadiyuli@polinema.ac.id', '+628459937348'),
('D005', 'Ane Fany', 'Novitasari', 'Soekarno Hatta', 'Malang', 'anefany@polinema.ac.id', '+628399576521'),
('D006', 'Annisa Puspa', 'Kirana ', 'Soekarno Hatta', 'Malang', 'annisapuspa@polinema.ac.id', '+628336754960'),
('D007', 'Annisa Taufika ', 'Firdausi ', 'Soekarno Hatta', 'Malang', 'annisataufika @polinema.ac.id', '+628981397011'),
('D008', 'Anugrah Nur', 'Rahmanto ', 'Soekarno Hatta', 'Malang', 'anugrahnur@polinema.ac.id', '+628616901205'),
('D009', 'Ariadi Retno', 'Ririd ', 'Soekarno Hatta', 'Malang', 'ariadiretno@polinema.ac.id', '+628210995160'),
('D010', 'Arie Rachmad ', 'Syulistyo ', 'Soekarno Hatta', 'Malang', 'arierachmad @polinema.ac.id', '+628497429654'),
('D011', 'Arief ', 'Prasetyo ', 'Soekarno Hatta', 'Malang', 'arief@polinema.ac.id', '+628941503863'),
('D012', 'Arwin ', 'Sumari ', 'Soekarno Hatta', 'Malang', 'arwin@polinema.ac.id', '+628339940812'),
('D013', 'Atiqah Nurul ', 'Asri ', 'Soekarno Hatta', 'Malang', 'atiqahnurul @polinema.ac.id', '+628231355512'),
('D014', 'Bagas Satya Dian ', 'Nugraha', 'Ahmad Yani', 'Surabaya', 'bagassatya dian @polinema.ac.id', '+628365339509'),
('D015', 'Banni Satria', 'Andoko', 'Ahmad Yani', 'Surabaya', 'bannisatria@polinema.ac.id', '+628887167032'),
('D016', 'Budi ', 'Harijanto ', 'Ahmad Yani', 'Surabaya', 'budi@polinema.ac.id', '+628928233598'),
('D017', 'Cahya ', 'Rahmad ', 'Ahmad Yani', 'Surabaya', 'cahya@polinema.ac.id', '+628394772860'),
('D018', 'Candra Bella', 'Vista', 'Ahmad Yani', 'Surabaya', 'candrabella@polinema.ac.id', '+628795147848'),
('D019', 'Candrasena ', 'Setiadi ', 'Ahmad Yani', 'Surabaya', 'candrasena@polinema.ac.id', '+628968346352'),
('D020', 'Deasy Sandhya Elya ', 'Ikawati ', 'Ahmad Yani', 'Surabaya', 'deasysandhya elya @polinema.ac.id', '+628368275772'),
('D021', 'Deddy Kusbianto', 'PA ', 'Ahmad Yani', 'Surabaya', 'deddykusbianto@polinema.ac.id', '+628863380174'),
('D022', 'Dhebys', 'Suryani ', 'Ahmad Yani', 'Surabaya', 'dhebys@polinema.ac.id', '+628393103413'),
('D023', 'Dian Hanifudin', 'Subhi ', 'Sudirman', 'Batu', 'dianhanifudin@polinema.ac.id', '+628499188845'),
('D024', 'Dika Rizky', 'Yunianto ', 'Sudirman', 'Batu', 'dikarizky@polinema.ac.id', '+628673912964'),
('D025', 'Dimas Wahyu ', 'Wibowo ', 'Sudirman', 'Batu', 'dimaswahyu @polinema.ac.id', '+628690551647'),
('D026', 'Dodit', 'Supriyanto ', 'Sudirman', 'Batu', 'dodit@polinema.ac.id', '+628325910439'),
('D027', 'Dwi', 'Puspitasari', 'Sudirman', 'Batu', 'dwi@polinema.ac.id', '+628376131699'),
('D028', 'Eka Larasati', 'Amalia', 'Sudirman', 'Batu', 'ekalarasati@polinema.ac.id', '+628896520403'),
('D029', 'Ekojono', '', 'Sudirman', 'Batu', 'ekojono@polinema.ac.id', '+628173387098'),
('D030', 'Elok Nur', 'Hamdana', 'Sudirman', 'Batu', 'eloknur@polinema.ac.id', '+628251252141'),
('D031', 'Erfan ', 'Rohadi', 'Sudirman', 'Batu', 'erfan@polinema.ac.id', '+628415832550'),
('D032', 'Faiz Ushbah', 'Mubarok', 'Gatot Subroto', 'Kediri', 'faizushbah@polinema.ac.id', '+628141465439'),
('D033', 'Farid Angga', 'Pribadi', 'Gatot Subroto', 'Kediri', 'faridangga@polinema.ac.id', '+628718715072'),
('D034', 'Farida', 'Ulfa', 'Gatot Subroto', 'Kediri', 'farida@polinema.ac.id', '+628972350481'),
('D035', 'Gunawan Budi', 'Prasetyo', 'Gatot Subroto', 'Kediri', 'gunawanbudi@polinema.ac.id', '+628333434836'),
('D036', 'Habibie Ed', 'Dien', 'Gatot Subroto', 'Kediri', 'habibieed@polinema.ac.id', '+628669485237'),
('D037', 'Hairus', '', 'Gatot Subroto', 'Kediri', 'hairus@polinema.ac.id', '+628719372396'),
('D038', 'Hendra', 'Pradibta', 'Gatot Subroto', 'Kediri', 'hendra@polinema.ac.id', '+628251444979'),
('D039', 'Ika Kusumaning', 'Putri', 'Gatot Subroto', 'Kediri', 'ikakusumaning@polinema.ac.id', '+628464176031'),
('D040', 'Imam Fahrur', 'Rozi', 'Gatot Subroto', 'Kediri', 'imamfahrur@polinema.ac.id', '+628914112434'),
('D041', 'Indra Dharma', 'Wijaya', 'Gatot Subroto', 'Kediri', 'indradharma@polinema.ac.id', '+628890018065'),
('D042', 'Irsyad Arif', 'Mashudi', 'Gatot Subroto', 'Kediri', 'irsyadarif@polinema.ac.id', '+628799573421'),
('D043', 'Kadek Suarjuna', 'Batubulan', 'Gajah Mada', 'Bali', 'kadeksuarjuna@polinema.ac.id', '+628183846617'),
('D044', 'Luqman', 'Affandi', 'Imam Bonjol', 'Lumajang', 'luqman@polinema.ac.id', '+628938781587'),
('D045', 'M. Hasyim', 'Ratsanjani', 'Imam Bonjol', 'Lumajang', 'm.hasyim@polinema.ac.id', '+628544239230'),
('D046', 'Mamluatul', 'Haniah', 'Imam Bonjol', 'Lumajang', 'mamluatul@polinema.ac.id', '+628412537260'),
('D047', 'Meyti Eka', 'Apriyani', 'Imam Bonjol', 'Lumajang', 'meytieka@polinema.ac.id', '+628476107548'),
('D048', 'Milyun Nima', 'Shoumi', 'Imam Bonjol', 'Lumajang', 'milyunnima@polinema.ac.id', '+628499749218'),
('D049', 'Moch. Zawaruddin', 'Abdullah', 'Imam Bonjol', 'Lumajang', 'moch.zawaruddin@polinema.ac.id', '+628467207108'),
('D050', 'Moh', 'Amin', 'Imam Bonjol', 'Lumajang', 'moh@polinema.ac.id', '+628915434504'),
('D051', 'Muhammad Afif', 'Hendrawan', 'Imam Bonjol', 'Lumajang', 'muhammadafif@polinema.ac.id', '+628497174069'),
('D052', 'Muhammad Shulhan', 'Khairy', 'Pahlawan', 'Jember', 'muhammadshulhan@polinema.ac.id', '+628933460273'),
('D053', 'Muhammad', 'Pamenang', 'Pahlawan', 'Jember', 'muhammad@polinema.ac.id', '+628750640645'),
('D054', 'Mungki', 'Astiningrum', 'Pahlawan', 'Jember', 'mungki@polinema.ac.id', '+628390642943'),
('D055', 'Mustika', 'Mentari', 'Pahlawan', 'Jember', 'mustika@polinema.ac.id', '+628190873664'),
('D056', 'Noprianto', '', 'Pahlawan', 'Jember', 'noprianto@polinema.ac.id', '+628939493801'),
('D057', 'Odhitya Desta', 'Triswidrananta', 'Pahlawan', 'Jember', 'odhityadesta@polinema.ac.id', '+628599335718'),
('D058', 'Pramana Yoga', 'Saputra', 'Pahlawan', 'Jember', 'pramanayoga@polinema.ac.id', '+628156636490'),
('D059', 'Putra Prima', 'A', 'Pahlawan', 'Jember', 'putraprima@polinema.ac.id', '+628729585968'),
('D060', 'Rakhmat', 'Arianto', 'Pahlawan', 'Jember', 'rakhmat@polinema.ac.id', '+628592720673'),
('D061', 'Rawansyah', '', 'Pahlawan', 'Jember', 'rawansyah@polinema.ac.id', '+628851017712'),
('D062', 'Retno', 'Damayanti', 'Diponegoro', 'Malang', 'retno@polinema.ac.id', '+628467517474'),
('D063', 'Ridwan', 'Rismanto', 'Diponegoro', 'Malang', 'ridwan@polinema.ac.id', '+628179072459'),
('D064', 'Rizki Putri', 'Ramadhani', 'Diponegoro', 'Malang', 'rizkiputri@polinema.ac.id', '+628380806142'),
('D065', 'Rizky', 'Ardiansyah', 'Diponegoro', 'Malang', 'rizky@polinema.ac.id', '+628513775263'),
('D066', 'Robby ', 'Anggriawan', 'Diponegoro', 'Malang', 'robby@polinema.ac.id', '+628155647683'),
('D067', 'Rokhimatul', 'Wakhidah', 'Diponegoro', 'Malang', 'rokhimatul@polinema.ac.id', '+628657703712'),
('D068', 'Rosa Andrie', 'Asmara', 'Diponegoro', 'Malang', 'rosaandrie@polinema.ac.id', '+628855690078'),
('D069', 'Rudy', 'Ariyanto', 'Diponegoro', 'Malang', 'rudy@polinema.ac.id', '+628777832995'),
('D070', 'Satrio Unggul', 'Binusa', 'Diponegoro', 'Malang', 'satriounggul@polinema.ac.id', '+628482260978'),
('D071', 'Septian Enggar', 'Sukmana', 'Diponegoro', 'Malang', 'septianenggar@polinema.ac.id', '+628193092074'),
('D072', 'Shohib', 'Muslim', 'Diponegoro', 'Malang', 'shohib@polinema.ac.id', '+628510177661'),
('D073', 'Siti', 'Romlah', 'Diponegoro', 'Malang', 'siti@polinema.ac.id', '+628380921067'),
('D074', 'Sofyan Noor', 'Arief', 'Merdeka', 'Banyuwangi', 'sofyannoor@polinema.ac.id', '+628773440279'),
('D075', 'Ulla Delfiana', 'Rosiani', 'Merdeka', 'Banyuwangi', 'ulladelfiana@polinema.ac.id', '+628681637521'),
('D076', 'Usman', 'Nurhasan', 'Merdeka', 'Banyuwangi', 'usman@polinema.ac.id', '+628353273367'),
('D077', 'Very', 'Sugiarto', 'Merdeka', 'Banyuwangi', 'very@polinema.ac.id', '+628158999317'),
('D078', 'Vipkas Al Hadid', 'Firdaus', 'Juanda', 'Surabaya', 'vipkasal hadid@polinema.ac.id', '+628851341756'),
('D079', 'Vivi Nur', 'Wijayaningrum', 'Juanda', 'Surabaya', 'vivinur@polinema.ac.id', '+628878994559'),
('D080', 'Vivin Ayu', 'Lestari', 'Juanda', 'Surabaya', 'vivinayu@polinema.ac.id', '+628980391059'),
('D081', 'Widaningsih', 'Condrowardhani', 'Juanda', 'Surabaya', 'widaningsih@polinema.ac.id', '+628656593848'),
('D082', 'Wilda Imama', 'Sabilla', 'Juanda', 'Surabaya', 'wildaimama@polinema.ac.id', '+628813049014'),
('D083', 'Yoppy', 'Yunhasnawa', 'Juanda', 'Surabaya', 'yoppy@polinema.ac.id', '+628681967939'),
('D084', 'Yuri', 'Ariyanto', 'Juanda', 'Surabaya', 'yuri@polinema.ac.id', '+628637072981'),
('D085', 'Zulmy Faqihuddin', 'Putera', 'Juanda', 'Surabaya', 'zulmyfaqihuddin@polinema.ac.id', '+628363503844');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dpa`
--

CREATE TABLE `dpa` (
  `dpa_id` char(4) NOT NULL,
  `class_id` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dpa`
--

INSERT INTO `dpa` (`dpa_id`, `class_id`) VALUES
('D034', 'SIB1B'),
('D056', 'SIB2B'),
('D015', 'TI1B'),
('D067', 'TI2B'),
('D031', 'TK1B'),
('D002', 'TK2B'),
('D024', 'TKI1B'),
('D026', 'TKI2B'),
('D069', 'TP1B'),
('D038', 'TP2B'),
('D008', 'TS1B'),
('D041', 'TS2B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hari`
--

CREATE TABLE `hari` (
  `day_id` char(3) NOT NULL,
  `day_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `hari`
--

INSERT INTO `hari` (`day_id`, `day_name`) VALUES
('H01', 'Senin'),
('H02', 'Selasa'),
('H03', 'Rabu'),
('H04', 'Kamis'),
('H05', 'Jumat'),
('H06', 'Sabtu'),
('H07', 'Minggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `jadwal_id` char(5) NOT NULL,
  `room_id` char(8) NOT NULL,
  `day_id` char(3) NOT NULL,
  `class_id` char(5) NOT NULL,
  `lecture_id` char(8) NOT NULL,
  `mk_id` char(5) NOT NULL,
  `jk_start` int(11) NOT NULL,
  `jk_end` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`jadwal_id`, `room_id`, `day_id`, `class_id`, `lecture_id`, `mk_id`, `jk_start`, `jk_end`) VALUES
('22001', 'RT001', 'H01', 'TI2B', 'D006', 'MK001', 8, 9),
('22002', 'RT002', 'H03', 'SIB1B', 'D067', 'MK002', 7, 10),
('22003', 'RTK02', 'H04', 'TKI2B', 'D034', 'MK009', 6, 8),
('22004', 'RL001', 'H02', 'TKI2B', 'D045', 'MK010', 9, 11),
('22005', 'RL001', 'H01', 'TK1B', 'D056', 'MK013', 10, 12),
('22006', 'RTK01', 'H05', 'TK1B', 'D041', 'MK014', 4, 6),
('22007', 'RTS02', 'H05', 'TS2B', 'D032', 'MK017', 1, 3),
('22008', 'RK001', 'H06', 'TS2B', 'D024', 'MK018', 5, 7),
('22009', 'RTS01', 'H03', 'TP1B', 'D065', 'MK020', 3, 6),
('22010', 'RP001', 'H04', 'TP1B', 'D021', 'MK021', 2, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jk`
--

CREATE TABLE `jk` (
  `jk_id` int(11) NOT NULL,
  `jk_start` time NOT NULL,
  `jk_end` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jk`
--

INSERT INTO `jk` (`jk_id`, `jk_start`, `jk_end`) VALUES
(1, '07:00:00', '07:50:00'),
(2, '07:50:00', '08:40:00'),
(3, '08:40:00', '09:30:00'),
(4, '09:40:00', '10:30:00'),
(5, '10:30:00', '11:20:00'),
(6, '11:20:00', '12:10:00'),
(7, '12:50:00', '13:40:00'),
(8, '13:40:00', '14:30:00'),
(9, '14:30:00', '15:20:00'),
(10, '15:30:00', '16:20:00'),
(11, '16:20:00', '17:10:00'),
(12, '17:10:00', '18:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `jurusan_id` char(5) NOT NULL,
  `jurusan_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`jurusan_id`, `jurusan_name`) VALUES
('TI001', 'Teknologi Informasi'),
('TK002', 'Teknik Kimia'),
('TS003', 'Teknik Sipil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `class_id` char(5) NOT NULL,
  `class_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`class_id`, `class_name`) VALUES
('SIB1B', 'Sistem Informasi Bisnis 2B'),
('SIB2B', 'Sistem Informasi Bisnis 2B'),
('TI1B', 'Teknik Informatika 1B'),
('TI2B', 'Teknik Informatika 2B'),
('TK1B', 'Teknik Kimia 1B'),
('TK2B', 'Teknik Kimia 2B'),
('TKI1B', 'Teknik Kimia Industri 1B'),
('TKI2B', 'Teknik Kimia Industri 2B'),
('TP1B', 'Teknik Pertambangan 1B'),
('TP2B', 'Teknik Pertambangan 2B'),
('TS1B', 'Teknik Sipil 1B'),
('TS2B', 'Teknik Sipil 2B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `krs`
--

CREATE TABLE `krs` (
  `krs_id` char(5) NOT NULL,
  `dpa_id` char(8) NOT NULL,
  `student_id` char(10) NOT NULL,
  `mk_id` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `krs`
--

INSERT INTO `krs` (`krs_id`, `dpa_id`, `student_id`, `mk_id`) VALUES
('K0001', 'D067', '2241720017', 'MK001'),
('K0002', 'D067', '2241720017', 'MK002'),
('K0003', 'D034', '2141720128', 'MK001'),
('K0004', 'D034', '2141720128', 'MK002'),
('K0005', 'D026', '2241720101', 'MK009'),
('K0006', 'D026', '2241720101', 'MK010'),
('K0007', 'D031', '2241760143', 'MK013'),
('K0008', 'D031', '2241760143', 'MK014'),
('K0009', 'D041', '2241760044', 'MK017'),
('K0010', 'D041', '2241760044', 'MK018'),
('K0011', 'D069', '2241760015', 'MK020'),
('K0012', 'D069', '2241760015', 'MK021');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `student_id` char(10) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(13) NOT NULL,
  `prodi_id` char(5) NOT NULL,
  `class_id` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`student_id`, `first_name`, `last_name`, `street`, `city`, `email`, `phone_number`, `prodi_id`, `class_id`) VALUES
('2141720128', 'David Fajar', 'Yusuf', 'Remujung', 'Lamongan', 'David@polinema.ac.id', '+628314709423', 'D4SIB', 'SIB1B'),
('2241720009', 'Radina Aprilia', 'Dardiri', 'Kesumba', 'Sidoarjo', 'Radina@polinema.ac.id', '+628624585594', 'D4TKI', 'TKI1B'),
('2241720014', 'Abiyyu Fiqlal', 'Sholeh Wicaksono', 'Semanggi Barat', 'Malang', 'Abiyyu@polinema.ac.id', '+628177170024', 'D4TIK', 'TI1B'),
('2241720017', 'Chyntia Santi', 'Nur Trisnawati', 'Remujung', 'Lamongan', 'Chyntia@polinema.ac.id', '+628771881194', 'D4TIK', 'TI2B'),
('2241720022', 'Muhammad ', 'Nurul Mustofa', 'Kesumba', 'Sidoarjo', 'Nurul@polinema.ac.id', '+628782645358', 'D4TKI', 'TKI1B'),
('2241720031', 'Jihan Karunia', 'Putri', 'Kembang Turi', 'Lamongan', 'Jihan@polinema.ac.id', '+628389621975', 'D4SIB', 'SIB1B'),
('2241720038', 'M.Rofiq', 'Aulia', 'Kembang Turi', 'Lamongan', 'Rofiq@polinema.ac.id', '+628191430146', 'D4SIB', 'SIB2B'),
('2241720045', 'Tirta Nurrochman', 'Bintang Prawira', 'Simbar Menjangan', 'Sidoarjo', 'Tirta@polinema.ac.id', '+628874247977', 'D4TKI', 'TKI2B'),
('2241720050', 'Joyo', 'Sugito', 'Kembang Turi', 'Lamongan', 'Joyo@polinema.ac.id', '+628449849347', 'D4SIB', 'SIB2B'),
('2241720052', 'Alyssa Tiarra', 'Boediargo', 'Senggani', 'Singosari', 'Alyssa@polinema.ac.id', '+628187715738', 'D3TKM', 'TK1B'),
('2241720059', 'Muhammad ', 'Harafsan Alhad', 'Kesumba', 'Sidoarjo', 'Harafsan@polinema.ac.id', '+628697494747', 'D4SIB', 'SIB2B'),
('2241720089', 'Putra Nindya', 'Yuwana', 'Kesumba', 'Sidoarjo', 'Putra@polinema.ac.id', '+628452780507', 'D4TKI', 'TKI1B'),
('2241720101', 'Zaki Lazuardi', 'Ferysa Putra', 'Senggani', 'Singosari', 'Zaki@polinema.ac.id', '+628996230527', 'D4TKI', 'TKI2B'),
('2241720129', 'Dika Dwi', 'Alamsyah', 'Remujung', 'Lamongan', 'Dika@polinema.ac.id', '+628827871717', 'D4SIB', 'SIB1B'),
('2241720130', 'Sherina Ayu', 'Wanda Pramesti', 'Simbar Menjangan', 'Sidoarjo', 'Sherina@polinema.ac.id', '+628489266118', 'D4TKI', 'TKI2B'),
('2241720147', 'Ravi Wimar', 'Afiansyah', 'Simbar Menjangan', 'Sidoarjo', 'Ravi@polinema.ac.id', '+628424901800', 'D4TKI', 'TKI1B'),
('2241720151', 'Mochamad Imam', 'Hanafi', 'Kesumba', 'Sidoarjo', 'Imam@polinema.ac.id', '+628538243563', 'D4SIB', 'SIB2B'),
('2241720155', 'Aji Hamdani', 'Ahmad', 'Semanggi Barat', 'Malang', 'Aji@polinema.ac.id', '+628449567520', 'D4TIK', 'TI1B'),
('2241720157', 'Azka ', 'Anasiyya Haris', 'Cengger Ayam', 'Malang', 'Azka@polinema.ac.id', '+628845738133', 'D4TIK', 'TI1B'),
('2241720174', 'Wulan Maulidya', 'Putri Firmansyah', 'Simbar Menjangan', 'Sidoarjo', 'Wulan@polinema.ac.id', '+628314872975', 'D4TKI', 'TKI2B'),
('2241720181', 'Hanief', 'Mochsin', 'Kembang Turi', 'Lamongan', 'Hanief@polinema.ac.id', '+628948791802', 'D4SIB', 'SIB1B'),
('2241720182', 'Dennis Parulian', 'Panjaitan', 'Remujung', 'Lamongan', 'Dennis@polinema.ac.id', '+628810946921', 'D4SIB', 'SIB1B'),
('2241720191', 'Cahyo Adi', 'Prasetia', 'Cengger Ayam', 'Malang', 'Cahyo@polinema.ac.id', '+628767393525', 'D4TIK', 'TI2B'),
('2241720202', 'Sony Febri', 'Hari Wibowo', 'Simbar Menjangan', 'Sidoarjo', 'Sony@polinema.ac.id', '+628131744661', 'D4TKI', 'TKI2B'),
('2241720215', 'Agusty ', 'Labdanayoga', 'Semanggi Barat', 'Malang', 'Agusty@polinema.ac.id', '+628221918372', 'D4TIK', 'TI1B'),
('2241720216', 'Azka ', 'Kasmito Putra', 'Cengger Ayam', 'Malang', 'AzkaB@polinema.ac.id', '+628951575313', 'D4TIK', 'TI2B'),
('2241720225', 'Bagus Arnovario', 'Wibowo', 'Cengger Ayam', 'Malang', 'Bagus@polinema.ac.id', '+628892274434', 'D4TIK', 'TI2B'),
('2241720237', 'Maya Melanesia', 'Rumasukun', 'Kembang Turi', 'Lamongan', 'Maya@polinema.ac.id', '+628866877327', 'D4SIB', 'SIB2B'),
('2241720257', 'Asyifa', 'Nurfadilah', 'Semanggi Barat', 'Malang', 'Asyifa@polinema.ac.id', '+628682560639', 'D4TIK', 'TI1B'),
('2241720264', 'Ferdi Riansyah', 'Ramadhani Kusuma', 'Remujung', 'Lamongan', 'Ferdi@polinema.ac.id', '+628531805735', 'D4SIB', 'SIB1B'),
('2241726099', 'Gabriel ', 'Soeharto', 'Pisang Keju', 'Banyuwangi', 'Soeharto@polinema.ac.id', '+628173625728', 'D3TPN', 'TP2B'),
('2241760011', 'Awalinda ', 'Romadhona Kenlany', 'Kembang Kertas', 'Singosari', 'Awalinda@polinema.ac.id', '+628663191106', 'D3TKM', 'TK2B'),
('2241760014', 'Andreas Gale', 'Dwi Jaya', 'Kembang Kertas', 'Singosari', 'Andreas@polinema.ac.id', '+628889253529', 'D3TKM', 'TK1B'),
('2241760015', 'Oddis Nur ', 'Alifathur Razaaq', 'Ikan Tombro', 'Banyuwangi', 'Oddis@polinema.ac.id', '+628560392936', 'D3TPN', 'TP1B'),
('2241760017', 'Dyah Nanda Ayu', 'Purnamayansyah', 'Pisang Kipas', 'Batu', 'Dyah@polinema.ac.id', '+628886975952', 'D3TSP', 'TS1B'),
('2241760019', 'Anggel Dwi', 'Pramita', 'Kembang Kertas', 'Singosari', 'Anggel@polinema.ac.id', '+628150596829', 'D3TKM', 'TK1B'),
('2241760027', 'Carieska Berliana', 'Novita Kusuma Wari', 'Kembang Kertas', 'Singosari', 'Carieska@polinema.ac.id', '+628216169149', 'D3TKM', 'TK2B'),
('2241760030', 'Fardiyani Afro\'ul', 'Yasinta', 'Sudimoro', 'Batu', 'Fardiyani@polinema.ac.id', '+628672619678', 'D3TSP', 'TS1B'),
('2241760035', 'Fifi', 'Novitasari', 'Sudimoro', 'Batu', 'Fifi@polinema.ac.id', '+628960854896', 'D3TSP', 'TS2B'),
('2241760039', 'Muhammad ', 'Khasbul Hadi Fauzan', 'Ikan Tombro', 'Banyuwangi', 'Fauzan@polinema.ac.id', '+628244535012', 'D3TSP', 'TS2B'),
('2241760042', 'Hanum Mufida', 'Akhsanti', 'Sudimoro', 'Batu', 'Hanum@polinema.ac.id', '+628978897828', 'D3TSP', 'TS2B'),
('2241760044', 'Nurhidayah', '', 'Ikan Tombro', 'Banyuwangi', 'Nurhidayah@polinema.ac.id', '+628543544722', 'D3TSP', 'TS2B'),
('2241760048', 'Yunika Puteri', 'Dwi Antika', 'Andong', 'Banyuwangi', 'Yunika@polinema.ac.id', '+628269697009', 'D3TPN', 'TP2B'),
('2241760049', 'Cesario Bayu', 'Pratama', 'Pisang Kipas', 'Batu', 'Cesario@polinema.ac.id', '+628983389880', 'D3TKM', 'TK2B'),
('2241760050', 'Aldamaita Salwa', 'Salsabila', 'Senggani', 'Singosari', 'Aldamaita@polinema.ac.id', '+628965168204', 'D3TKM', 'TK1B'),
('2241760060', 'Suhatta', '', 'Andong', 'Banyuwangi', 'Suhatta@polinema.ac.id', '+628442706140', 'D3TPN', 'TP1B'),
('2241760061', 'Daffa Abiyu ', 'Aidil Amru', 'Pisang Kipas', 'Batu', 'Daffa@polinema.ac.id', '+628819328001', 'D3TSP', 'TS1B'),
('2241760065', 'Moch.Rifqi', 'Andy Setyawan', 'Sudimoro', 'Batu', 'Rifqi@polinema.ac.id', '+628231234155', 'D3TSP', 'TS2B'),
('2241760074', 'Aryo Wahyu', 'Nugroho', 'Kembang Kertas', 'Singosari', 'Aryo@polinema.ac.id', '+628947276322', 'D3TKM', 'TK2B'),
('2241760075', 'Triaji Ibnu', 'Hermawan', 'Andong', 'Banyuwangi', 'Triaji@polinema.ac.id', '+628121375644', 'D3TPN', 'TP2B'),
('2241760077', 'Nabila Hasna', 'Rafifah Hardani', 'Ikan Tombro', 'Banyuwangi', 'Nabila@polinema.ac.id', '+628199653820', 'D3TSP', 'TS2B'),
('2241760078', 'Dhiya Rakha', 'Ardiyona', 'Pisang Kipas', 'Batu', 'Dhiya@polinema.ac.id', '+628597376667', 'D3TSP', 'TS1B'),
('2241760079', 'Chandra Bagus', 'Sulaksono', 'Pisang Kipas', 'Batu', 'Chandra@polinema.ac.id', '+628476497407', 'D3TKM', 'TK2B'),
('2241760082', 'Rifqi', 'Sabilillah', 'Andong', 'Banyuwangi', 'Rifqi@polinema.ac.id', '+628323278270', 'D3TPN', 'TP1B'),
('2241760085', 'Dyalifia Balqis', 'Susanto', 'Sudimoro', 'Batu', 'Dyalifia@polinema.ac.id', '+628693352781', 'D3TSP', 'TS1B'),
('2241760086', 'Muhammad ', 'Wildan Ramadhana', 'Ikan Tombro', 'Banyuwangi', 'Wildan@polinema.ac.id', '+628576243750', 'D3TSP', 'TS2B'),
('2241760088', 'Afifah Rahma', 'Wahidha', 'Senggani', 'Singosari', 'Afifah@polinema.ac.id', '+628723191923', 'D3TKM', 'TK1B'),
('2241760143', 'Abdurrahman ', 'David Haikal', 'Senggani', 'Singosari', 'Abdurrahman@polinema.ac.id', '+628131165596', 'D3TKM', 'TK1B'),
('2241760199', 'Yi Shun ', 'Shin', 'Andong', 'Banyuwangi', 'YiShunShin@polinema.ac.id', '+628556395515', 'D3TPN', 'TP2B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mk`
--

CREATE TABLE `mk` (
  `mk_id` char(5) NOT NULL,
  `mk_name` varchar(50) NOT NULL,
  `sks` int(11) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mk`
--

INSERT INTO `mk` (`mk_id`, `mk_name`, `sks`, `semester`) VALUES
('MK001', 'Basis Data', 4, 2),
('MK002', 'Sistem Operasi', 3, 2),
('MK003', 'Rekayasa Perangkat Lunak', 3, 2),
('MK004', 'Komunikasi Data dan Jaringan', 3, 4),
('MK005', 'Rekayasa Lalu Lintas', 3, 3),
('MK006', 'Sistem Transportasi', 3, 4),
('MK007', 'Pemodelan Transportasi', 4, 4),
('MK008', 'Geometrik Jalan Raya', 4, 5),
('MK009', 'Teknik Reasi Kimia', 4, 3),
('MK010', 'Fisika Terapan', 4, 2),
('MK011', 'Matematika 2', 4, 2),
('MK012', 'Matematika Fluida dan Partikel', 4, 3),
('MK013', 'Azaz Teknik Kimia 1', 3, 2),
('MK014', 'Thermodinamika 1', 4, 1),
('MK015', 'Dinamika dan Pengendalian Proses', 3, 1),
('MK016', 'Kalkulus 1', 4, 1),
('MK017', 'Manajemen Konstruksi', 4, 2),
('MK018', 'Teknik Fluida dan Hidrolik', 4, 2),
('MK019', 'Eksplorasi Tambang', 4, 3),
('MK020', 'Kristalografi dan Mineralogi', 3, 4),
('MK021', 'Teknik Gas Bumi', 3, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `presensi`
--

CREATE TABLE `presensi` (
  `presensi_id` int(11) NOT NULL,
  `student_id` char(10) NOT NULL,
  `jadwal_id` char(5) NOT NULL,
  `tanggal` date NOT NULL,
  `pertemuan` int(11) NOT NULL,
  `keterangan` enum('Alpha','Sakit','Izin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `presensi`
--

INSERT INTO `presensi` (`presensi_id`, `student_id`, `jadwal_id`, `tanggal`, `pertemuan`, `keterangan`) VALUES
(1, '2241720017', '22001', '2023-01-01', 1, 'Sakit'),
(2, '2241760015', '22010', '2023-01-04', 1, 'Izin'),
(3, '2141720128', '22002', '2023-01-12', 2, 'Izin'),
(4, '2241760015', '22009', '2023-01-14', 2, 'Alpha'),
(5, '2241760143', '22005', '2023-01-16', 3, 'Alpha'),
(6, '2141720128', '22002', '2023-01-17', 3, 'Izin'),
(7, '2241720017', '22001', '2023-01-30', 4, 'Sakit'),
(8, '2141720128', '22002', '2023-02-07', 5, 'Izin'),
(9, '2241720101', '22003', '2023-02-09', 5, 'Alpha'),
(10, '2241720101', '22004', '2023-02-13', 7, 'Alpha'),
(11, '2141720128', '22002', '2023-02-21', 8, 'Alpha'),
(12, '2241720101', '22004', '2023-02-23', 8, 'Alpha'),
(13, '2241720101', '22003', '2023-02-28', 9, 'Izin'),
(14, '2241760143', '22006', '2023-03-03', 10, 'Sakit'),
(15, '2241760044', '22007', '2023-03-04', 10, 'Izin'),
(16, '2241760015', '22009', '2023-03-13', 11, 'Sakit'),
(17, '2241760143', '22005', '2023-03-14', 11, 'Izin'),
(18, '2241760015', '22010', '2023-03-16', 12, 'Izin'),
(19, '2241760044', '22008', '2023-03-22', 12, 'Alpha'),
(20, '2241720017', '22001', '2023-03-25', 13, 'Alpha'),
(21, '2241760044', '22008', '2023-03-26', 14, 'Alpha'),
(22, '2241760143', '22006', '2023-03-29', 14, 'Alpha'),
(23, '2241720017', '22001', '2023-03-31', 15, 'Sakit'),
(24, '2241760044', '22007', '2023-04-04', 16, 'Izin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `prodi_id` char(5) NOT NULL,
  `program_name` varchar(10) NOT NULL,
  `studi_name` varchar(30) NOT NULL,
  `jurusan_id` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`prodi_id`, `program_name`, `studi_name`, `jurusan_id`) VALUES
('D3TKM', 'D3', 'Teknik Kimia', 'TK002'),
('D3TPN', 'D3', 'Teknologi Pertambangan', 'TS003'),
('D3TSP', 'D3', 'Teknik Sipil', 'TS003'),
('D4SIB', 'D4', 'Sistem Informasi Bisnis', 'TI001'),
('D4TIK', 'D4', 'Teknik Informatika', 'TI001'),
('D4TKI', 'D4', 'Teknologi Kimia Industri', 'TK002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang`
--

CREATE TABLE `ruang` (
  `room_id` char(5) NOT NULL,
  `room_name` varchar(30) NOT NULL,
  `room_desc` text NOT NULL,
  `room_capacity` int(11) NOT NULL,
  `zoom_id` int(9) NOT NULL,
  `zoom_pass` varchar(30) NOT NULL,
  `zoom_link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ruang`
--

INSERT INTO `ruang` (`room_id`, `room_name`, `room_desc`, `room_capacity`, `zoom_id`, `zoom_pass`, `zoom_link`) VALUES
('RK001', 'Ruang Konstruksi 1', 'Ruang praktik Konstruksi Dasar', 15, 459599055, '234654', 'https://zoom.us/meeting/RK001'),
('RL001', 'Ruang Laboratorium 1', 'Ruang untuk praktikum kimia', 20, 313010086, '123678', 'https://zoom.us/meeting/RL001'),
('RP001', 'Ruang Praktikum 1', 'Ruang untuk praktikum ', 20, 948031765, '345678', 'https://zoom.us/meeting/RP001'),
('RT001', 'Ruang Teori 1', 'Ruang untuk proses pembelajaran teori ', 20, 297875803, '123456', 'https://zoom.us/meeting/RT001'),
('RT002', 'Ruang Teori 2', 'Ruang untuk proses pembelajaran teori ', 20, 941537710, '789012', 'https://zoom.us/meeting/RT002'),
('RTK01', 'Ruang Teori Kimia 1', 'Ruang untuk proses penyampaian materi kimia dasar', 25, 272034326, '901234', 'https://zoom.us/meeting/RTK01'),
('RTK02', 'Ruang Teori Kimia 2', 'Ruang untuk proses penyampaian materi kimia lanjut', 25, 412898727, '567890', 'https://zoom.us/meeting/RTK02'),
('RTS01', 'Ruang Teori Sipil 1', 'Ruang untuk menyampaikan teori sipil', 23, 831142431, '784567', 'https://zoom.us/meeting/RTS01'),
('RTS02', 'Ruang Teori Sipil 2', 'Ruang untuk menyampaikan teori sipil 2', 24, 988565243, '987567', 'https://zoom.us/meeting/RTS02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transkrip`
--

CREATE TABLE `transkrip` (
  `transkrip_id` char(5) NOT NULL,
  `student_id` char(10) NOT NULL,
  `mk_id` char(5) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transkrip`
--

INSERT INTO `transkrip` (`transkrip_id`, `student_id`, `mk_id`, `nilai`) VALUES
('T0001', '2241720017', 'MK001', 50),
('T0002', '2241720017', 'MK002', 45),
('T0003', '2141720128', 'MK001', 65),
('T0004', '2141720128', 'MK002', 55),
('T0005', '2241720101', 'MK009', 75),
('T0006', '2241720101', 'MK010', 85),
('T0007', '2241760143', 'MK013', 80),
('T0008', '2241760143', 'MK014', 85),
('T0009', '2241760044', 'MK017', 60),
('T0010', '2241760044', 'MK018', 70),
('T0011', '2241760015', 'MK020', 90),
('T0012', '2241760015', 'MK021', 85);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`lecture_id`);

--
-- Indeks untuk tabel `dpa`
--
ALTER TABLE `dpa`
  ADD PRIMARY KEY (`dpa_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indeks untuk tabel `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`day_id`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`jadwal_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `day_id` (`day_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `lecture_id` (`lecture_id`),
  ADD KEY `mk_id` (`mk_id`),
  ADD KEY `jk_start` (`jk_start`),
  ADD KEY `jk_end` (`jk_end`);

--
-- Indeks untuk tabel `jk`
--
ALTER TABLE `jk`
  ADD PRIMARY KEY (`jk_id`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`jurusan_id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`class_id`);

--
-- Indeks untuk tabel `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`krs_id`),
  ADD KEY `dpa_id` (`dpa_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `mk_id` (`mk_id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `prodi_id` (`prodi_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indeks untuk tabel `mk`
--
ALTER TABLE `mk`
  ADD PRIMARY KEY (`mk_id`);

--
-- Indeks untuk tabel `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`presensi_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `jadwal_id` (`jadwal_id`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`prodi_id`),
  ADD KEY `jurusan_id` (`jurusan_id`);

--
-- Indeks untuk tabel `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`room_id`);

--
-- Indeks untuk tabel `transkrip`
--
ALTER TABLE `transkrip`
  ADD PRIMARY KEY (`transkrip_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `mk_id` (`mk_id`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dpa`
--
ALTER TABLE `dpa`
  ADD CONSTRAINT `dpa_ibfk_1` FOREIGN KEY (`dpa_id`) REFERENCES `dosen` (`lecture_id`),
  ADD CONSTRAINT `dpa_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `kelas` (`class_id`);

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `ruang` (`room_id`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`day_id`) REFERENCES `hari` (`day_id`),
  ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`class_id`) REFERENCES `kelas` (`class_id`),
  ADD CONSTRAINT `jadwal_ibfk_4` FOREIGN KEY (`lecture_id`) REFERENCES `dosen` (`lecture_id`),
  ADD CONSTRAINT `jadwal_ibfk_5` FOREIGN KEY (`mk_id`) REFERENCES `mk` (`mk_id`),
  ADD CONSTRAINT `jadwal_ibfk_6` FOREIGN KEY (`jk_start`) REFERENCES `jk` (`jk_id`),
  ADD CONSTRAINT `jadwal_ibfk_7` FOREIGN KEY (`jk_end`) REFERENCES `jk` (`jk_id`);

--
-- Ketidakleluasaan untuk tabel `krs`
--
ALTER TABLE `krs`
  ADD CONSTRAINT `krs_ibfk_1` FOREIGN KEY (`dpa_id`) REFERENCES `dpa` (`dpa_id`),
  ADD CONSTRAINT `krs_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `mahasiswa` (`student_id`),
  ADD CONSTRAINT `krs_ibfk_3` FOREIGN KEY (`mk_id`) REFERENCES `mk` (`mk_id`);

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`prodi_id`),
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `kelas` (`class_id`);

--
-- Ketidakleluasaan untuk tabel `presensi`
--
ALTER TABLE `presensi`
  ADD CONSTRAINT `presensi_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `mahasiswa` (`student_id`),
  ADD CONSTRAINT `presensi_ibfk_2` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwal` (`jadwal_id`);

--
-- Ketidakleluasaan untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`jurusan_id`);

--
-- Ketidakleluasaan untuk tabel `transkrip`
--
ALTER TABLE `transkrip`
  ADD CONSTRAINT `transkrip_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `mahasiswa` (`student_id`),
  ADD CONSTRAINT `transkrip_ibfk_2` FOREIGN KEY (`mk_id`) REFERENCES `mk` (`mk_id`);
--
-- Database: `pegawai`
--
CREATE DATABASE IF NOT EXISTS `pegawai` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pegawai`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `golongan`
--

CREATE TABLE `golongan` (
  `Golongan` varchar(100) NOT NULL,
  `BesarGaji` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `golongan`
--

INSERT INTO `golongan` (`Golongan`, `BesarGaji`) VALUES
('A', 1000000),
('B', 750000),
('C', 900000),
('D', 500000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `Nopegawai` varchar(100) NOT NULL,
  `NamaPegawai` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`Nopegawai`, `NamaPegawai`) VALUES
('Peg01', 'Anton'),
('Peg02', 'Paula'),
('Peg03', 'Daniar'),
('Peg04', 'Lubis'),
('Peg06', 'Koko'),
('Peg07', 'Keni'),
('Peg08', 'Sofi'),
('Peg09', 'Yuni'),
('Peg12', 'Sita'),
('Peg14', 'Yusni'),
('Peg15', 'Udin'),
('Peg16', 'Didit'),
('Peg17', 'Dani');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyek`
--

CREATE TABLE `proyek` (
  `Noproyek` varchar(100) NOT NULL,
  `NamaProyek` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `proyek`
--

INSERT INTO `proyek` (`Noproyek`, `NamaProyek`) VALUES
('NP001', 'BRR'),
('NP002', 'PEMDA'),
('NP003', 'CBR'),
('NP004', 'ASK'),
('NP005', 'OB');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyekpegawai`
--

CREATE TABLE `proyekpegawai` (
  `Noproyek` varchar(100) DEFAULT NULL,
  `Nopegawai` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`Golongan`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`Nopegawai`);

--
-- Indeks untuk tabel `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`Noproyek`);

--
-- Indeks untuk tabel `proyekpegawai`
--
ALTER TABLE `proyekpegawai`
  ADD KEY `Noproyek` (`Noproyek`),
  ADD KEY `Nopegawai` (`Nopegawai`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `proyekpegawai`
--
ALTER TABLE `proyekpegawai`
  ADD CONSTRAINT `proyekpegawai_ibfk_1` FOREIGN KEY (`Noproyek`) REFERENCES `proyek` (`Noproyek`),
  ADD CONSTRAINT `proyekpegawai_ibfk_2` FOREIGN KEY (`Nopegawai`) REFERENCES `pegawai` (`Nopegawai`);
--
-- Database: `peminjaman`
--
CREATE DATABASE IF NOT EXISTS `peminjaman` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `peminjaman`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `stok`, `deskripsi`, `foto`) VALUES
(3, 'mouse', 18, 'kondisi layak di pakai', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjambarang`
--

CREATE TABLE `pinjambarang` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `lokasi_barang` text DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pinjambarang`
--

INSERT INTO `pinjambarang` (`id`, `id_barang`, `id_user`, `qty`, `tgl_mulai`, `tgl_selesai`, `lokasi_barang`, `status`) VALUES
(8, 1, 2, 1, '2020-12-29', '2020-12-30', 'Lantai 7', 'approve'),
(10, 3, 2, 2, '2023-11-20', '2023-11-20', '', 'approve'),
(11, 1, 2, 1, '2023-11-21', '2023-11-21', 'lat 7', 'approve');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjamruangan`
--

CREATE TABLE `pinjamruangan` (
  `id` int(11) NOT NULL,
  `id_ruangan` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pinjamruangan`
--

INSERT INTO `pinjamruangan` (`id`, `id_ruangan`, `id_user`, `tgl_mulai`, `tgl_selesai`, `status`) VALUES
(1, 2, 2, '2021-04-25', '2021-04-25', 'approve');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `id` int(11) NOT NULL,
  `nama_ruangan` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`id`, `nama_ruangan`, `deskripsi`, `foto`, `status`) VALUES
(2, 'Gedung A', 'Gedung Bagus', 'Lihat Jadwal Dosen.PNG', 'dipinjam'),
(3, 'Gedung B', 'Gedung B Bagus', 'Multi.PNG', 'free');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama_lengkap`, `email`, `nohp`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin@gmail.com', '089654362', 'admin', 'admin', 'admin'),
(2, 'user', 'ejaaa646@gmail.com', '085434243', 'user', 'user', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pinjambarang`
--
ALTER TABLE `pinjambarang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pinjamruangan`
--
ALTER TABLE `pinjamruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pinjambarang`
--
ALTER TABLE `pinjambarang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pinjamruangan`
--
ALTER TABLE `pinjamruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Database: `penjualan_produk`
--
CREATE DATABASE IF NOT EXISTS `penjualan_produk` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `penjualan_produk`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kode_barang` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama`) VALUES
(1, 'buku tulis'),
(2, 'pensil'),
(3, 'buku gambar'),
(4, 'bolpoin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `kode_penjualan` int(11) NOT NULL,
  `kode_barang` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`kode_penjualan`, `kode_barang`, `harga`, `jumlah`) VALUES
(1, 4, 2, 3),
(2, 3, 5000, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `kode_penjualan` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `kasir` varchar(20) NOT NULL,
  `total_penjualan` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`kode_penjualan`, `tgl`, `kasir`, `total_penjualan`) VALUES
(1, '2021-02-01', 'Doni', 31000),
(2, '2021-02-10', 'Dini', 20000),
(3, '2021-02-08', 'Dini', 10000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indeks untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`kode_penjualan`,`kode_barang`),
  ADD KEY `kode_barang` (`kode_barang`),
  ADD KEY `kode_penjualan` (`kode_penjualan`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`kode_penjualan`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD CONSTRAINT `detail_penjualan_ibfk_2` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`);
--
-- Database: `percobaan`
--
CREATE DATABASE IF NOT EXISTS `percobaan` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `percobaan`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `KDANGGOTA` char(5) NOT NULL,
  `NAMA` varchar(30) NOT NULL,
  `ALAMAT` varchar(50) DEFAULT NULL,
  `TELP` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailpendaftaran`
--

CREATE TABLE `detailpendaftaran` (
  `KDPENDAFTARAN` char(5) NOT NULL,
  `KDKURSUS` char(5) NOT NULL,
  `JUMLAHPERTEMUAN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `headerpendaftaran`
--

CREATE TABLE `headerpendaftaran` (
  `KDPENDAFTARAN` char(5) NOT NULL,
  `KDKASIR` char(5) DEFAULT NULL,
  `KDANGGOTA` char(5) DEFAULT NULL,
  `TANGGALPENDAFTARAN` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir`
--

CREATE TABLE `kasir` (
  `KDKASIR` char(5) NOT NULL,
  `NAMA` varchar(30) NOT NULL,
  `ALAMAT` varchar(50) DEFAULT NULL,
  `TELP` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kursus`
--

CREATE TABLE `kursus` (
  `KDKURSUS` char(5) NOT NULL,
  `NAMAKURSUS` varchar(30) NOT NULL,
  `BIAYA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`KDANGGOTA`);

--
-- Indeks untuk tabel `detailpendaftaran`
--
ALTER TABLE `detailpendaftaran`
  ADD PRIMARY KEY (`KDPENDAFTARAN`,`KDKURSUS`),
  ADD KEY `FK_MEMILIH2` (`KDKURSUS`);

--
-- Indeks untuk tabel `headerpendaftaran`
--
ALTER TABLE `headerpendaftaran`
  ADD PRIMARY KEY (`KDPENDAFTARAN`),
  ADD KEY `FK_MELAKUKAN` (`KDANGGOTA`),
  ADD KEY `FK_MEMBAYAR` (`KDKASIR`);

--
-- Indeks untuk tabel `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`KDKASIR`);

--
-- Indeks untuk tabel `kursus`
--
ALTER TABLE `kursus`
  ADD PRIMARY KEY (`KDKURSUS`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detailpendaftaran`
--
ALTER TABLE `detailpendaftaran`
  ADD CONSTRAINT `FK_MEMILIH` FOREIGN KEY (`KDPENDAFTARAN`) REFERENCES `headerpendaftaran` (`KDPENDAFTARAN`),
  ADD CONSTRAINT `FK_MEMILIH2` FOREIGN KEY (`KDKURSUS`) REFERENCES `kursus` (`KDKURSUS`);

--
-- Ketidakleluasaan untuk tabel `headerpendaftaran`
--
ALTER TABLE `headerpendaftaran`
  ADD CONSTRAINT `FK_MELAKUKAN` FOREIGN KEY (`KDANGGOTA`) REFERENCES `anggota` (`KDANGGOTA`),
  ADD CONSTRAINT `FK_MEMBAYAR` FOREIGN KEY (`KDKASIR`) REFERENCES `kasir` (`KDKASIR`);
--
-- Database: `percobaan_join`
--
CREATE DATABASE IF NOT EXISTS `percobaan_join` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `percobaan_join`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `kode_dosen` varchar(4) NOT NULL,
  `nama_dosen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`kode_dosen`, `nama_dosen`) VALUES
('D001', 'Abdul Chalim, SAg., MPd.I'),
('D002', 'Ade Ismail'),
('D003', 'Agung Nugroho Pramudhita ST., MT.'),
('D004', 'Ahmadi Yuli Ananta ST., MM.'),
('D005', 'Ane Fany Novitasari, SH.MKn.'),
('D006', 'Annisa Puspa Kirana MKom.'),
('D007', 'Annisa Taufika Firdausi ST., MT.'),
('D008', 'Anugrah Nur Rahmanto SSn., MDs.'),
('D009', 'Ariadi Retno Ririd SKom., MKom.'),
('D010', 'Arie Rachmad Syulistyo SKom., MKom.'),
('D011', 'Arief Prasetyo SKom., MKom.'),
('D012', 'Arwin Sumari ST., MT., DR.'),
('D013', 'Atiqah Nurul Asri SPd., MPd.'),
('D014', 'Bagas Satya Dian Nugraha, ST., MT.'),
('D015', 'Banni Satria Andoko, S. Kom., M.MSI'),
('D016', 'Budi Harijanto ST., MMKom.'),
('D017', 'Cahya Rahmad ST., MKom. DR.Eng'),
('D018', 'Candra Bella Vista SKom., MT.'),
('D019', 'Candrasena Setiadi ST., MMT.'),
('D020', 'Deasy Sandhya Elya Ikawati SSi., MSi.'),
('D021', 'Deddy Kusbianto PA Ir. MMKom.'),
('D022', 'Dhebys Suryani SKom. MT.'),
('D023', 'Dian Hanifudin Subhi SKom., MT.'),
('D024', 'Dika Rizky Yunianto SKom., MKom.'),
('D025', 'Dimas Wahyu Wibowo ST., MT.'),
('D026', 'Dodit Supriyanto SKom., MT.'),
('D027', 'Dwi Puspitasari SKom., MKom.'),
('D028', 'Eka Larasati Amalia, SST., MT.'),
('D029', 'Ekojono, ST., M.Kom.'),
('D030', 'Elok Nur Hamdana, ST., MT'),
('D031', 'Erfan Rohadi, ST., MEng., PhD.'),
('D032', 'Faiz Ushbah Mubarok, SPd., MPd.'),
('D033', 'Farid Angga Pribadi, SKom.,MKom.'),
('D034', 'Farida Ulfa, SPd., MPd.'),
('D035', 'Gunawan Budi Prasetyo, ST., MMT., Ph.D.'),
('D036', 'Habibie Ed Dien, MT.'),
('D037', 'Hairus'),
('D038', 'Hendra Pradibta, SE., M.Sc.'),
('D039', 'Ika Kusumaning Putri, MT.'),
('D040', 'Imam Fahrur Rozi, ST., MT.'),
('D041', 'Indra Dharma Wijaya, ST., MMT.'),
('D042', 'Irsyad Arif Mashudi, M.Kom'),
('D043', 'Kadek Suarjuna Batubulan, SKom, MT.'),
('D044', 'Luqman Affandi, SKom., MMSI.'),
('D045', 'M. Hasyim Ratsanjani'),
('D046', 'Mamluatul Haniah'),
('D047', 'Meyti Eka Apriyani ST., MT.'),
('D048', 'Milyun Nima Shoumi'),
('D049', 'Moch. Zawaruddin Abdullah, S.ST., M.Kom'),
('D050', 'Moh. Amin'),
('D051', 'Muhammad Afif Hendrawan, S.Kom.'),
('D052', 'Muhammad Shulhan Khairy, SKom., MKom.'),
('D053', 'Muhammad Unggul Pamenang, SSt., MT.'),
('D054', 'Mungki Astiningrum, ST., MKom.'),
('D055', 'Mustika Mentari, SKom., MKom.'),
('D056', 'Noprianto'),
('D057', 'Odhitya Desta Triswidrananta, SPd., MPd.'),
('D058', 'Pramana Yoga Saputra, SKom., MMT.'),
('D059', 'Putra Prima A., ST., MKom.'),
('D060', 'Rakhmat Arianto SST., MKom.'),
('D061', 'Rawansyah., Drs., MPd.'),
('D062', 'Retno Damayanti, SPd.'),
('D063', 'Ridwan Rismanto, SST., MKom.'),
('D064', 'Rizki Putri Ramadhani, S.S., M.Pd.'),
('D065', 'Rizky Ardiansyah, SKom., MT.'),
('D066', 'Robby Anggriawan SE., ME.'),
('D067', 'Rokhimatul Wakhidah SPd. MT.'),
('D068', 'Rosa Andrie Asmara, ST., MT., Dr. Eng.'),
('D069', 'Rudy Ariyanto, ST., MCs.'),
('D070', 'Satrio Binusa S, SS, M.Pd'),
('D071', 'Septian Enggar Sukmana, SPd., MT.'),
('D072', 'Shohib Muslim'),
('D073', 'Siti Romlah, Dra., M.M.'),
('D074', 'Sofyan Noor Arief, S.ST., M.Kom.'),
('D075', 'Ulla Delfiana Rosiani, ST., MT.'),
('D076', 'Usman Nurhasan, S.Kom., MT.'),
('D077', 'Very Sugiarto, SPd., MKom.'),
('D078', 'Vipkas Al Hadid Firdaus, ST.,MT.'),
('D079', 'Vivi Nur Wijayaningrum, S.Kom, M.Kom'),
('D080', 'Vivin Ayu Lestari, SPd.'),
('D081', 'Widaningsih Condrowardhani, SH., MH.'),
('D082', 'Wilda Imama Sabilla, S.Kom., M.Kom.'),
('D083', 'Yoppy Yunhasnawa, SST., MSc.'),
('D084', 'Yuri Ariyanto, SKom., MKom.'),
('D085', 'Zulmy Faqihuddin Putera, S.Pd., M.Pd'),
('D086', 'Kamado Tanjiro, S.Kom., M.Kom.'),
('D087', 'Rei Ayanami, S.ST., M.Sc.'),
('D088', 'Soryu Asuka Langley, M.Eng, Ph.D.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hari`
--

CREATE TABLE `hari` (
  `kode_hari` varchar(3) NOT NULL,
  `nama_hari` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `hari`
--

INSERT INTO `hari` (`kode_hari`, `nama_hari`) VALUES
('001', 'Senin'),
('002', 'Selasa'),
('003', 'Rabu'),
('004', 'Kamis'),
('005', 'Jumat'),
('006', 'Sabtu'),
('007', 'Minggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `kode_jadwal` int(10) NOT NULL,
  `kode_kelas` varchar(10) DEFAULT NULL,
  `kode_dosen` varchar(4) DEFAULT NULL,
  `kode_mk` varchar(5) DEFAULT NULL,
  `kode_ruang` varchar(5) DEFAULT NULL,
  `kode_hari` varchar(3) DEFAULT NULL,
  `jp_mulai` int(3) DEFAULT NULL,
  `jp_selesai` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`kode_jadwal`, `kode_kelas`, `kode_dosen`, `kode_mk`, `kode_ruang`, `kode_hari`, `jp_mulai`, `jp_selesai`) VALUES
(1, '2021020101', 'D001', '02001', '0504', '001', 7, 9),
(2, '2021010103', 'D001', '02001', '0506', '002', 9, 11),
(3, '2021010105', 'D001', '02001', '0806', '003', 10, 12),
(4, '2021010102', 'D001', '02001', '0506', '004', 1, 3),
(5, '2021010106', 'D001', '02001', '0806', '004', 4, 6),
(6, '2021010101', 'D001', '02001', '0506', '004', 7, 9),
(7, '2021010104', 'D001', '02001', '0506', '005', 10, 12),
(8, '2021010206', 'D002', '02037', '0702', '001', 7, 12),
(9, '2021020202', 'D002', '02036', '0708', '003', 2, 4),
(10, '2021010205', 'D002', '02037', '0713', '004', 1, 6),
(11, '2021020209', 'D002', '02025', '0719', '004', 7, 12),
(12, '2021020301', 'D003', '02012', '0508', '002', 1, 4),
(13, '2021020302', 'D003', '02012', '0508', '002', 1, 4),
(14, '2021010201', 'D003', '02017', '0719', '003', 2, 5),
(15, '2021010202', 'D003', '02017', '0719', '003', 2, 5),
(16, '2021010203', 'D003', '02017', '0507', '005', 2, 5),
(17, '2021010106', 'D004', '02028', '0704', '001', 1, 3),
(18, '2021020203', 'D004', '02032', '0507', '001', 10, 12),
(19, '2021010201', 'D004', '02034', '0617', '002', 7, 12),
(20, '2021020203', 'D004', '02032', '0708', '004', 1, 6),
(21, '2021020104', 'D005', '02016', '0717', '001', 1, 3),
(22, '2021020108', 'D005', '02016', '0504', '001', 4, 6),
(23, '2021020106', 'D005', '02016', '0805', '001', 10, 12),
(24, '2021020105', 'D005', '02016', '0502', '002', 1, 3),
(25, '2021020102', 'D005', '02016', '0806', '002', 4, 6),
(26, '2021020103', 'D005', '02016', '0502', '003', 4, 6),
(27, '2021020107', 'D005', '02016', '0806', '004', 1, 3),
(28, '2021020109', 'D005', '02016', '0502', '005', 1, 3),
(29, '2021010105', 'D006', '02010', '0701', '002', 1, 3),
(30, '2021010105', 'D006', '02030', '0618', '004', 1, 6),
(31, '2021010203', 'D006', '02037', '0705', '004', 7, 12),
(32, '2021010204', 'D006', '02037', '0619', '005', 7, 12),
(33, '2021010103', 'D007', '02011', '0705', '002', 2, 6),
(34, '2021020101', 'D007', '02038', '0503', '003', 3, 5),
(35, '2021020102', 'D007', '02038', '0503', '003', 3, 5),
(36, '2021010102', 'D007', '02011', '0615', '004', 8, 12),
(37, '2021010101', 'D007', '02011', '0703', '005', 2, 6),
(38, '2021010306', 'D008', '02012', '0619', '001', 2, 5),
(39, '2021020203', 'D008', '02036', '0716', '003', 2, 4),
(40, '2021020104', 'D008', '02038', '0505', '004', 4, 6),
(41, '2021020105', 'D008', '02038', '0505', '004', 4, 6),
(42, '2021010304', 'D008', '02012', '0507', '005', 9, 12),
(43, '2021010305', 'D008', '02012', '0507', '005', 9, 12),
(44, '2021020103', 'D009', '02035', '0505', '002', 7, 10),
(45, '2021020104', 'D009', '02035', '0505', '002', 7, 10),
(46, '2021020204', 'D009', '02005', '0704', '003', 7, 12),
(47, '2021020203', 'D009', '02005', '0705', '005', 1, 6),
(48, '2021010103', 'D010', '02026', '0806', '001', 3, 4),
(49, '2021010202', 'D010', '02023', '0704', '001', 8, 11),
(50, '2021010202', 'D010', '02023', '0713', '002', 7, 10),
(51, '2021010201', 'D010', '02023', '0705', '003', 7, 10),
(52, '2021010201', 'D010', '02023', '0716', '005', 8, 11),
(53, '2021010201', 'D011', '02019', '0718', '002', 1, 5),
(54, '2021010203', 'D011', '02019', '0706', '004', 1, 5),
(55, '2021010204', 'D011', '02019', '0716', '004', 8, 12),
(56, '2021010202', 'D011', '02019', '0706', '005', 1, 5),
(57, '2021020204', 'D012', '02018', '0702', '001', 1, 5),
(58, '2021020203', 'D012', '02018', '0619', '002', 1, 5),
(59, '2021010204', 'D012', '02020', '0704', '002', 9, 11),
(60, '2021010302', 'D013', '02008', '0805', '002', 4, 6),
(61, '2021020109', 'D013', '02007', '0805', '002', 7, 9),
(62, '2021010301', 'D013', '02009', '0717', '003', 4, 6),
(63, '2021020101', 'D013', '02008', '0717', '003', 7, 9),
(64, '2021020401', 'D013', '02009', '0717', '004', 4, 6),
(65, '2021020107', 'D013', '02008', '0717', '005', 2, 4),
(66, '2021020102', 'D013', '02008', '0506', '005', 7, 9),
(67, '2021020301', 'D014', '02017', '0720', '004', 1, 4),
(68, '2021020302', 'D014', '02017', '0720', '004', 1, 4),
(69, '2021020303', 'D014', '02017', '0714', '005', 2, 5),
(70, '2021020308', 'D014', '02017', '0714', '005', 7, 10),
(71, '2021020206', 'D015', '02032', '0720', '002', 3, 5),
(72, '2021020206', 'D015', '02005', '0619', '002', 7, 12),
(73, '2021020205', 'D015', '02005', '0713', '003', 7, 12),
(74, '2021020206', 'D015', '02033', '0701', '004', 7, 12),
(75, '2021020103', 'D016', '02038', '0506', '001', 1, 3),
(76, '2021020204', 'D016', '02032', '0615', '001', 7, 9),
(77, '2021010103', 'D016', '02038', '0501', '004', 4, 6),
(78, '2021010104', 'D016', '02038', '0501', '004', 4, 6),
(79, '2021020204', 'D016', '02033', '0719', '005', 7, 12),
(80, '2021020106', 'D017', '02004', '0805', '004', 3, 6),
(81, '2021020302', 'D017', '02027', '0702', '004', 7, 12),
(82, '2021020301', 'D017', '02027', '0704', '005', 1, 6),
(83, '2021020109', 'D017', '02002', '0717', '005', 7, 10),
(84, '2021020302', 'D018', '02039', '0701', '001', 1, 6),
(85, '2021010203', 'D018', '02013', '0501', '001', 10, 12),
(86, '2021010204', 'D018', '02013', '0501', '001', 10, 12),
(87, '2021020301', 'D019', '02022', '0620', '001', 7, 12),
(88, '2021020302', 'D019', '02022', '0702', '005', 1, 6),
(89, '2021020108', 'D020', '02004', '0502', '004', 9, 12),
(90, '2021020107', 'D020', '02004', '0502', '005', 7, 10),
(91, '2021020207', 'D021', '02005', '0615', '001', 1, 6),
(92, '2021020207', 'D021', '02032', '0707', '002', 1, 3),
(93, '2021020207', 'D021', '02033', '0718', '003', 1, 6),
(94, '2021010303', 'D021', '02012', '0703', '003', 8, 11),
(95, '2021010204', 'D022', '02033', '0704', '003', 1, 6),
(96, '2021010205', 'D022', '02033', '0706', '003', 7, 12),
(97, '2021020306', 'D022', '02012', '0504', '005', 1, 4),
(98, '2021010205', 'D023', '02023', '0508', '001', 1, 4),
(99, '2021020206', 'D023', '02025', '0706', '003', 1, 6),
(100, '2021010206', 'D023', '02023', '0618', '003', 8, 11),
(101, '2021010205', 'D023', '02023', '0701', '005', 1, 4),
(102, '2021010206', 'D023', '02023', '0705', '005', 7, 10),
(103, '2021010201', 'D024', '02037', '0713', '001', 1, 6),
(104, '2021010103', 'D024', '02010', '0615', '001', 10, 12),
(105, '2021010103', 'D024', '02010', '0619', '003', 1, 6),
(106, '2021010202', 'D024', '02037', '0701', '005', 7, 12),
(107, '2021020305', 'D025', '02024', '0615', '001', 1, 6),
(108, '2021020306', 'D025', '02022', '0713', '002', 1, 6),
(109, '2021020304', 'D025', '02017', '0620', '005', 1, 4),
(110, '2021020305', 'D025', '02017', '0620', '005', 1, 4),
(111, '2021020305', 'D026', '02015', '0508', '003', 7, 12),
(112, '2021020306', 'D026', '02041', '0701', '004', 1, 6),
(113, '2021020103', 'D027', '02010', '0501', '002', 4, 6),
(114, '2021020104', 'D027', '02010', '0501', '002', 4, 6),
(115, '2021010106', 'D027', '02035', '0707', '003', 1, 4),
(116, '2021020103', 'D027', '02010', '0615', '004', 7, 12),
(117, '2021020104', 'D027', '02010', '0617', '005', 1, 6),
(118, '2021010104', 'D028', '02026', '0504', '002', 1, 4),
(119, '2021020107', 'D028', '02035', '0503', '002', 8, 11),
(120, '2021020108', 'D028', '02035', '0503', '002', 8, 11),
(121, '2021010105', 'D028', '02026', '0505', '003', 3, 6),
(122, '2021010106', 'D028', '02026', '0505', '003', 3, 6),
(123, '2021020209', 'D029', '02032', '0503', '001', 7, 9),
(124, '2021020204', 'D029', '02036', '0703', '003', 1, 3),
(125, '2021020205', 'D029', '02036', '0703', '003', 1, 3),
(126, '2021020209', 'D029', '02033', '0508', '004', 1, 6),
(127, '2021020206', 'D029', '02036', '0501', '005', 1, 3),
(128, '2021020207', 'D029', '02036', '0501', '005', 1, 3),
(129, '2021020109', 'D030', '02010', '0716', '001', 4, 6),
(130, '2021020108', 'D030', '02010', '0715', '002', 2, 4),
(131, '2021020201', 'D030', '02036', '0502', '003', 1, 3),
(132, '2021020109', 'D030', '02030', '0620', '004', 1, 6),
(133, '2021020108', 'D030', '02030', '0615', '005', 1, 6),
(134, '2021020202', 'D031', '02032', '0507', '001', 7, 9),
(135, '2021010203', 'D031', '02020', '0718', '002', 7, 9),
(136, '2021010201', 'D031', '02020', '0501', '004', 7, 9),
(137, '2021010202', 'D031', '02020', '0501', '004', 7, 9),
(138, '2021020202', 'D031', '02033', '0707', '005', 7, 12),
(139, '2021020104', 'D032', '02008', '0806', '001', 7, 9),
(140, '2021020103', 'D032', '02008', '0717', '002', 1, 3),
(141, '2021020403', 'D032', '02009', '0502', '002', 10, 12),
(142, '2021010304', 'D032', '02009', '0506', '003', 4, 6),
(143, '2021020402', 'D032', '02009', '0504', '004', 4, 6),
(144, '2021020105', 'D032', '02009', '0717', '004', 8, 10),
(145, '2021010303', 'D032', '02009', '0806', '005', 7, 9),
(146, '2021020203', 'D033', '02037', '0716', '003', 7, 12),
(147, '2021020108', 'D034', '02008', '0502', '001', 1, 3),
(148, '2021020106', 'D034', '02008', '0502', '002', 7, 9),
(149, '2021010305', 'D034', '02009', '0805', '003', 4, 6),
(150, '2021010306', 'D034', '02009', '0506', '004', 4, 6),
(151, '2021020208', 'D035', '02018', '0618', '002', 2, 6),
(152, '2021020307', 'D035', '02041', '0716', '002', 7, 12),
(153, '2021020308', 'D035', '02041', '0716', '005', 1, 6),
(154, '2021020207', 'D035', '02018', '0615', '005', 8, 12),
(155, '2021020209', 'D036', '02036', '0704', '001', 4, 6),
(156, '2021020304', 'D036', '02022', '0508', '001', 7, 12),
(157, '2021020303', 'D036', '02022', '0704', '002', 1, 6),
(158, '2021020202', 'D036', '02025', '0706', '002', 7, 12),
(159, '2021010102', 'D037', '02016', '0506', '001', 7, 9),
(160, '2021010107', 'D037', '02016', '0806', '002', 7, 9),
(161, '2021010104', 'D037', '02016', '0504', '002', 10, 12),
(162, '2021020101', 'D037', '02016', '0717', '003', 10, 12),
(163, '2021010106', 'D037', '02016', '0717', '004', 1, 3),
(164, '2021010103', 'D037', '02016', '0504', '005', 7, 9),
(165, '2021010101', 'D037', '02016', '0806', '005', 10, 12),
(166, '2021020307', 'D038', '02012', '0714', '002', 2, 5),
(167, '2021020209', 'D038', '02020', '0620', '003', 10, 12),
(168, '2021010301', 'D038', '02012', '0503', '005', 1, 4),
(169, '2021010302', 'D038', '02012', '0503', '005', 1, 4),
(170, '2021010101', 'D039', '02040', '0503', '001', 1, 3),
(171, '2021010102', 'D039', '02040', '0503', '001', 1, 3),
(172, '2021020209', 'D039', '02037', '0703', '002', 1, 6),
(173, '2021010102', 'D039', '02040', '0617', '003', 8, 12),
(174, '2021010101', 'D039', '02040', '0617', '004', 2, 6),
(175, '2021020109', 'D040', '02003', '0713', '001', 9, 11),
(176, '2021010202', 'D040', '02033', '0619', '003', 7, 12),
(177, '2021020109', 'D040', '02003', '0718', '004', 7, 12),
(178, '2021010101', 'D041', '02038', '0507', '001', 4, 6),
(179, '2021010102', 'D041', '02038', '0507', '001', 4, 6),
(180, '2021010101', 'D041', '02028', '0501', '002', 1, 3),
(181, '2021010102', 'D041', '02028', '0501', '002', 1, 3),
(182, '2021020205', 'D042', '02037', '0703', '001', 7, 12),
(183, '2021020204', 'D042', '02037', '0715', '004', 7, 12),
(184, '2021020101', 'D042', '02035', '0505', '005', 2, 5),
(185, '2021020102', 'D042', '02035', '0505', '005', 2, 5),
(186, '2021010204', 'D043', '02017', '0705', '001', 2, 5),
(187, '2021010205', 'D043', '02017', '0505', '002', 2, 5),
(188, '2021010204', 'D043', '02017', '0505', '002', 2, 5),
(189, '2021020208', 'D043', '02036', '0507', '004', 7, 9),
(190, '2021020205', 'D043', '02025', '0720', '005', 1, 6),
(191, '2021020201', 'D044', '02032', '0706', '001', 3, 5),
(192, '2021010205', 'D044', '02021', '0618', '001', 10, 12),
(193, '2021010206', 'D044', '02021', '0618', '001', 10, 12),
(194, '2021020206', 'D044', '02020', '0707', '004', 3, 5),
(195, '2021020207', 'D044', '02020', '0707', '004', 3, 5),
(196, '2021020201', 'D044', '02033', '0713', '004', 7, 12),
(197, '2021020208', 'D045', '02037', '0718', '001', 1, 6),
(198, '2021020107', 'D045', '02010', '0702', '001', 9, 11),
(199, '2021020107', 'D045', '02030', '0615', '003', 1, 6),
(200, '2021020207', 'D045', '02037', '0619', '004', 7, 12),
(201, '2021020103', 'D046', '02003', '0501', '001', 4, 6),
(202, '2021020101', 'D046', '02010', '0617', '002', 3, 5),
(203, '2021020101', 'D046', '02030', '0704', '004', 1, 6),
(204, '2021020209', 'D046', '02018', '0707', '005', 1, 5),
(205, '2021020103', 'D046', '02003', '0702', '005', 7, 12),
(206, '2021020308', 'D047', '02022', '0620', '001', 1, 6),
(207, '2021020203', 'D047', '02020', '0805', '001', 7, 9),
(208, '2021020201', 'D047', '02020', '0620', '002', 1, 3),
(209, '2021020202', 'D047', '02020', '0620', '002', 1, 3),
(210, '2021020307', 'D047', '02022', '0715', '003', 1, 6),
(211, '2021020305', 'D048', '02027', '0716', '002', 1, 6),
(212, '2021020201', 'D048', '02025', '0503', '004', 1, 6),
(213, '2021020208', 'D048', '02025', '0713', '005', 1, 6),
(214, '2021020306', 'D048', '02027', '0620', '005', 7, 12),
(215, '2021010106', 'D049', '02010', '0716', '001', 7, 9),
(216, '2021020204', 'D049', '02025', '0719', '002', 1, 6),
(217, '2021020203', 'D049', '02025', '0703', '002', 7, 12),
(218, '2021010106', 'D049', '02030', '0706', '004', 7, 12),
(219, '2021020106', 'D050', '02001', '0717', '001', 4, 6),
(220, '2021020103', 'D050', '02001', '0506', '001', 7, 9),
(221, '2021020105', 'D050', '02001', '0504', '001', 10, 12),
(222, '2021020109', 'D050', '02001', '0805', '003', 1, 3),
(223, '2021020102', 'D050', '02001', '0504', '003', 8, 10),
(224, '2021020104', 'D050', '02001', '0805', '004', 7, 9),
(225, '2021020107', 'D050', '02001', '0805', '004', 10, 12),
(226, '2021020108', 'D050', '02001', '0805', '005', 7, 9),
(227, '2021020206', 'D051', '02037', '0715', '001', 1, 6),
(228, '2021020208', 'D051', '02020', '0508', '003', 2, 4),
(229, '2021020306', 'D051', '02039', '0701', '003', 7, 12),
(230, '2021020305', 'D051', '02039', '0619', '004', 1, 6),
(231, '2021010104', 'D052', '02010', '0701', '001', 4, 6),
(232, '2021020201', 'D052', '02005', '0708', '002', 7, 12),
(233, '2021020202', 'D052', '02005', '0720', '003', 7, 12),
(234, '2021010104', 'D052', '02030', '0618', '005', 1, 6),
(235, '2021020105', 'D053', '02010', '0708', '001', 7, 9),
(236, '2021020105', 'D053', '02030', '0704', '005', 7, 12),
(237, '2021020101', 'D054', '02003', '0703', '001', 2, 4),
(238, '2021020102', 'D054', '02003', '0703', '001', 2, 4),
(239, '2021010205', 'D054', '02013', '0501', '001', 7, 9),
(240, '2021020102', 'D054', '02029', '0620', '002', 7, 12),
(241, '2021020101', 'D054', '02029', '0720', '004', 7, 12),
(242, '2021020106', 'D055', '02003', '0716', '001', 1, 3),
(243, '2021020304', 'D055', '02027', '0718', '004', 1, 6),
(244, '2021020106', 'D055', '02029', '0618', '004', 7, 12),
(245, '2021020303', 'D055', '02027', '0718', '005', 7, 12),
(246, '2021020107', 'D056', '02003', '0708', '001', 4, 6),
(247, '2021020303', 'D056', '02015', '0715', '001', 7, 12),
(248, '2021020304', 'D056', '02015', '0713', '003', 1, 6),
(249, '2021020107', 'D056', '02029', '0702', '003', 7, 12),
(250, '2021020201', 'D057', '02037', '0720', '001', 7, 12),
(251, '2021020305', 'D057', '02041', '0618', '005', 7, 12),
(252, '2021020208', 'D058', '02032', '0502', '001', 10, 12),
(253, '2021020303', 'D058', '02041', '0720', '003', 1, 6),
(254, '2021020208', 'D058', '02033', '0716', '004', 1, 6),
(255, '2021020304', 'D058', '02041', '0615', '005', 7, 12),
(256, '2021010203', 'D059', '02023', '0719', '001', 1, 4),
(257, '2021010204', 'D059', '02023', '0702', '002', 2, 5),
(258, '2021020207', 'D059', '02025', '0701', '002', 7, 12),
(259, '2021010204', 'D059', '02023', '0718', '005', 2, 5),
(260, '2021010203', 'D059', '02023', '0715', '005', 8, 11),
(261, '2021020308', 'D060', '02039', '0619', '001', 7, 12),
(262, '2021020201', 'D060', '02018', '0615', '003', 7, 11),
(263, '2021020202', 'D060', '02018', '0708', '005', 1, 5),
(264, '2021020307', 'D060', '02039', '0708', '005', 7, 12),
(265, '2021020101', 'D061', '02004', '0717', '002', 9, 12),
(266, '2021020104', 'D061', '02004', '0504', '003', 3, 6),
(267, '2021020105', 'D061', '02004', '0805', '003', 7, 10),
(268, '2021020102', 'D061', '02004', '0806', '004', 8, 11),
(269, '2021020103', 'D061', '02004', '0806', '005', 2, 5),
(270, '2021010106', 'D062', '02011', '0615', '002', 7, 11),
(271, '2021010104', 'D062', '02011', '0703', '004', 8, 12),
(272, '2021010105', 'D062', '02011', '0715', '005', 1, 5),
(273, '2021010105', 'D062', '02038', '0501', '005', 10, 12),
(274, '2021010106', 'D062', '02038', '0501', '005', 10, 12),
(275, '2021020209', 'D063', '02005', '0719', '002', 7, 12),
(276, '2021010101', 'D063', '02026', '0507', '003', 1, 4),
(277, '2021010102', 'D063', '02026', '0507', '003', 1, 4),
(278, '2021020208', 'D063', '02005', '0708', '003', 7, 12),
(279, '2021010301', 'D064', '02006', '0805', '001', 1, 3),
(280, '2021010303', 'D064', '02006', '0506', '001', 4, 6),
(281, '2021010302', 'D064', '02006', '0805', '002', 1, 3),
(282, '2021010305', 'D064', '02006', '0506', '003', 1, 3),
(283, '2021010306', 'D064', '02006', '0504', '004', 1, 3),
(284, '2021010304', 'D064', '02006', '0805', '005', 2, 4),
(285, '2021020102', 'D065', '02010', '0708', '002', 1, 3),
(286, '2021020102', 'D065', '02030', '0615', '004', 1, 6),
(287, '2021010206', 'D066', '02013', '0503', '001', 4, 6),
(288, '2021020104', 'D067', '02003', '0805', '001', 4, 6),
(289, '2021020105', 'D067', '02003', '0805', '001', 4, 6),
(290, '2021020105', 'D067', '02029', '0705', '003', 1, 6),
(291, '2021010201', 'D067', '02013', '0506', '004', 10, 12),
(292, '2021020104', 'D067', '02029', '0703', '005', 7, 12),
(293, '2021020308', 'D068', '02027', '0714', '002', 7, 12),
(294, '2021020307', 'D068', '02027', '0703', '004', 1, 6),
(295, '2021020303', 'D069', '02039', '0618', '002', 7, 12),
(296, '2021010206', 'D069', '02033', '0702', '004', 1, 6),
(297, '2021020406', 'D070', '02009', '0502', '001', 4, 6),
(298, '2021020405', 'D070', '02009', '0806', '001', 10, 12),
(299, '2021020404', 'D070', '02009', '0717', '002', 4, 6),
(300, '2021020407', 'D070', '02009', '0806', '003', 4, 6),
(301, '2021020306', 'D071', '02017', '0505', '001', 1, 4),
(302, '2021020307', 'D071', '02017', '0505', '001', 1, 4),
(303, '2021020108', 'D071', '02003', '0714', '001', 7, 9),
(304, '2021020308', 'D071', '02017', '0501', '003', 1, 4),
(305, '2021020108', 'D071', '02029', '0719', '004', 1, 6),
(306, '2021010303', 'D072', '02014', '0720', '001', 1, 3),
(307, '2021010304', 'D072', '02014', '0720', '001', 1, 3),
(308, '2021010305', 'D072', '02014', '0714', '001', 10, 12),
(309, '2021010306', 'D072', '02014', '0714', '001', 10, 12),
(310, '2021010301', 'D072', '02014', '0501', '005', 7, 9),
(311, '2021010302', 'D072', '02014', '0501', '005', 7, 9),
(312, '2021020305', 'D073', '02012', '0714', '003', 1, 4),
(313, '2021020106', 'D074', '02038', '0507', '002', 3, 5),
(314, '2021020107', 'D074', '02038', '0507', '002', 3, 5),
(315, '2021020109', 'D074', '02038', '0805', '002', 10, 12),
(316, '2021020108', 'D074', '02038', '0806', '003', 7, 9),
(317, '2021010206', 'D074', '02019', '0719', '005', 1, 5),
(318, '2021010205', 'D074', '02019', '0713', '005', 7, 11),
(319, '2021010105', 'D075', '02028', '0501', '001', 1, 3),
(320, '2021020304', 'D075', '02039', '0706', '002', 1, 6),
(321, '2021020301', 'D075', '02039', '0618', '003', 1, 6),
(322, '2021010103', 'D075', '02028', '0503', '003', 8, 10),
(323, '2021010104', 'D075', '02028', '0503', '003', 8, 10),
(324, '2021020303', 'D076', '02012', '0618', '001', 1, 4),
(325, '2021020304', 'D076', '02012', '0618', '001', 1, 4),
(326, '2021020307', 'D076', '02015', '0701', '001', 7, 12),
(327, '2021020308', 'D076', '02015', '0718', '003', 7, 12),
(328, '2021020306', 'D077', '02015', '0705', '001', 7, 12),
(329, '2021020202', 'D077', '02037', '0715', '004', 1, 6),
(330, '2021020205', 'D078', '02018', '0615', '002', 1, 5),
(331, '2021020301', 'D078', '02015', '0715', '002', 7, 12),
(332, '2021020302', 'D078', '02015', '0617', '003', 1, 6),
(333, '2021020206', 'D078', '02018', '0706', '005', 8, 12),
(334, '2021010105', 'D079', '02040', '0503', '002', 4, 6),
(335, '2021010106', 'D079', '02040', '0503', '002', 4, 6),
(336, '2021010105', 'D079', '02031', '0705', '002', 8, 12),
(337, '2021010106', 'D079', '02031', '0715', '003', 8, 12),
(338, '2021020105', 'D079', '02035', '0506', '005', 2, 5),
(339, '2021010103', 'D080', '02040', '0505', '001', 7, 9),
(340, '2021010104', 'D080', '02040', '0505', '001', 7, 9),
(341, '2021020109', 'D080', '02035', '0506', '002', 1, 4),
(342, '2021010104', 'D080', '02031', '0701', '003', 2, 6),
(343, '2021010103', 'D080', '02031', '0508', '004', 8, 12),
(344, '2021020405', 'D081', '02014', '0507', '001', 1, 3),
(345, '2021020406', 'D081', '02014', '0507', '001', 1, 3),
(346, '2021020403', 'D081', '02014', '0503', '002', 1, 3),
(347, '2021020404', 'D081', '02014', '0503', '002', 1, 3),
(348, '2021020407', 'D081', '02014', '0506', '003', 8, 10),
(349, '2021020401', 'D081', '02014', '0501', '004', 1, 3),
(350, '2021020402', 'D081', '02014', '0501', '004', 1, 3),
(351, '2021010202', 'D082', '02013', '0806', '002', 1, 3),
(352, '2021010101', 'D082', '02010', '0707', '002', 4, 6),
(353, '2021010102', 'D082', '02010', '0707', '002', 4, 6),
(354, '2021010101', 'D082', '02030', '0720', '002', 7, 12),
(355, '2021010102', 'D082', '02030', '0508', '005', 1, 6),
(356, '2021020106', 'D083', '02010', '0617', '001', 7, 9),
(357, '2021020302', 'D083', '02041', '0508', '002', 7, 12),
(358, '2021020106', 'D083', '02030', '0719', '003', 7, 12),
(359, '2021020301', 'D083', '02041', '0708', '004', 7, 12),
(360, '2021020205', 'D084', '02032', '0708', '001', 1, 3),
(361, '2021010203', 'D084', '02033', '0620', '003', 1, 6),
(362, '2021020204', 'D084', '02020', '0505', '004', 1, 3),
(363, '2021020205', 'D084', '02020', '0505', '004', 1, 3),
(364, '2021020205', 'D084', '02033', '0620', '004', 7, 12),
(365, '2021010202', 'D085', '02006', '0504', '001', 1, 3),
(366, '2021010204', 'D085', '02006', '0502', '001', 7, 9),
(367, '2021010205', 'D085', '02006', '0504', '002', 7, 9),
(368, '2021010203', 'D085', '02006', '0806', '002', 10, 12),
(369, '2021010206', 'D085', '02006', '0806', '003', 1, 3),
(370, '2021010201', 'D085', '02006', '0502', '004', 2, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jp`
--

CREATE TABLE `jp` (
  `kode_jp` int(3) NOT NULL,
  `jp_mulai` time DEFAULT NULL,
  `jp_Selesai` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jp`
--

INSERT INTO `jp` (`kode_jp`, `jp_mulai`, `jp_Selesai`) VALUES
(1, '07:00:00', '07:50:00'),
(2, '07:50:00', '08:40:00'),
(3, '08:40:00', '09:30:00'),
(4, '09:40:00', '10:30:00'),
(5, '10:30:00', '11:20:00'),
(6, '11:20:00', '12:10:00'),
(7, '12:50:00', '13:40:00'),
(8, '13:40:00', '14:30:00'),
(9, '14:30:00', '15:20:00'),
(10, '15:30:00', '15:30:00'),
(11, '16:20:00', '17:10:00'),
(12, '17:10:00', '18:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `kode_kelas` varchar(10) NOT NULL,
  `kode_prodi` varchar(3) DEFAULT NULL,
  `nama_kelas` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`kode_kelas`, `kode_prodi`, `nama_kelas`) VALUES
('2021010101', '001', 'MI-1A'),
('2021010102', '001', 'MI-1B'),
('2021010103', '001', 'MI-1C'),
('2021010104', '001', 'MI-1D'),
('2021010105', '001', 'MI-1E'),
('2021010106', '001', 'MI-1F'),
('2021010107', '001', 'MI-1H'),
('2021010201', '001', 'MI-2A'),
('2021010202', '001', 'MI-2B'),
('2021010203', '001', 'MI-2C'),
('2021010204', '001', 'MI-2D'),
('2021010205', '001', 'MI-2E'),
('2021010206', '001', 'MI-2F'),
('2021010301', '001', 'MI-3A'),
('2021010302', '001', 'MI-3B'),
('2021010303', '001', 'MI-3C'),
('2021010304', '001', 'MI-3D'),
('2021010305', '001', 'MI-3E'),
('2021010306', '001', 'MI-3F'),
('2021020101', '002', 'TI-1A'),
('2021020102', '002', 'TI-1B'),
('2021020103', '002', 'TI-1C'),
('2021020104', '002', 'TI-1D'),
('2021020105', '002', 'TI-1E'),
('2021020106', '002', 'TI-1F'),
('2021020107', '002', 'TI-1G'),
('2021020108', '002', 'TI-1H'),
('2021020109', '002', 'TI-1I'),
('2021020201', '002', 'TI-2A'),
('2021020202', '002', 'TI-2B'),
('2021020203', '002', 'TI-2C'),
('2021020204', '002', 'TI-2D'),
('2021020205', '002', 'TI-2E'),
('2021020206', '002', 'TI-2F'),
('2021020207', '002', 'TI-2G'),
('2021020208', '002', 'TI-2H'),
('2021020209', '002', 'TI-2I'),
('2021020301', '002', 'TI-3A'),
('2021020302', '002', 'TI-3B'),
('2021020303', '002', 'TI-3C'),
('2021020304', '002', 'TI-3D'),
('2021020305', '002', 'TI-3E'),
('2021020306', '002', 'TI-3F'),
('2021020307', '002', 'TI-3G'),
('2021020308', '002', 'TI-3H'),
('2021020401', '002', 'TI-4A'),
('2021020402', '002', 'TI-4B'),
('2021020403', '002', 'TI-4C'),
('2021020404', '002', 'TI-4D'),
('2021020405', '002', 'TI-4E'),
('2021020406', '002', 'TI-4F'),
('2021020407', '002', 'TI-4G'),
('2021020408', NULL, 'TRM-1A'),
('2021020409', NULL, 'TRM-1B'),
('2021020410', NULL, 'TRM-1C'),
('2021020411', NULL, 'S2TI-A'),
('2021020412', NULL, 'S2TI-B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mk`
--

CREATE TABLE `mk` (
  `kode_mk` varchar(5) NOT NULL,
  `nama_mk` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mk`
--

INSERT INTO `mk` (`kode_mk`, `nama_mk`) VALUES
('02001', 'Agama'),
('02002', 'Alajabar Linier'),
('02003', 'Algoritma dan Struktur Data'),
('02004', 'Aljabar Linier'),
('02005', 'Analisis Dan Desan Berorientasi Objek'),
('02006', 'Bahasa Indonesia'),
('02007', 'Bahasa Inggris'),
('02008', 'Bahasa Inggris 2'),
('02009', 'Bahasa Inggris Persiapan Kerja'),
('02010', 'Basis Data'),
('02011', 'Desain Pemrograman Web'),
('02012', 'Digital Entrepreneurship'),
('02013', 'E-Business'),
('02014', 'Etika Profesi Bidang TI'),
('02015', 'Internet Of Things'),
('02016', 'Kewarganegaraan'),
('02017', 'Komputasi Multimedia'),
('02018', 'Machine Learning'),
('02019', 'Manajemen Jaringan Komputer'),
('02020', 'Manajemen Proyek'),
('02021', 'Manajemen Proyek '),
('02022', 'Pemrograman Berbasis Framework'),
('02023', 'Pemrograman Mobile'),
('02024', 'Pemrograman Multimedia'),
('02025', 'Pemrograman Web Lanjut'),
('02026', 'Pengembangan Perangkat Lunak Berbasis Object'),
('02027', 'Pengolahan Citra dan Visi Komputer'),
('02028', 'Penulisan Ilmiah'),
('02029', 'Praktikum Algoritma dan Struktur Data'),
('02030', 'Praktikum Basis Data'),
('02031', 'Praktikum Struktur Data'),
('02032', 'Proyek 1_P1'),
('02033', 'Proyek 1_P2'),
('02034', 'Proyek 2_P2'),
('02035', 'Rekayasa Perangkat Lunak'),
('02036', 'Sistem Informasi'),
('02037', 'Sistem Manajemen Basis Data'),
('02038', 'Sistem Operasi'),
('02039', 'Sistem Pendukung Keputusan'),
('02040', 'Struktur Data'),
('02041', 'Teknologi Data'),
('02042', 'Cyber Physical System'),
('02043', 'Komputasi Awan'),
('02044', 'Komputasi Kuantum'),
('02045', 'Swarm Robotics'),
('02046', 'Swarm Robotics'),
('02047', 'Collaborative Thought'),
('02048', 'Matematika Transendental');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `kode_prodi` varchar(3) NOT NULL,
  `nama_prodi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`kode_prodi`, `nama_prodi`) VALUES
('001', 'D3 Manajemen Informatika'),
('002', 'D4 Teknik Informatika'),
('003', 'D4 Sistem Integritas Tinggi'),
('004', 'D4 Kecerdasan Buatan dan Robotika'),
('005', 'D4 Sistem Informasi Bisnis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang`
--

CREATE TABLE `ruang` (
  `kode_ruang` varchar(5) NOT NULL,
  `nama_ruang` varchar(20) DEFAULT NULL,
  `deskripsi_ruang` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ruang`
--

INSERT INTO `ruang` (`kode_ruang`, `nama_ruang`, `deskripsi_ruang`) VALUES
('0501', 'RT01', 'Ruang Teori 1'),
('0502', 'RT02', 'Ruang Teori 2'),
('0503', 'RT03', 'Ruang Teori 3'),
('0504', 'RT04', 'Ruang Teori 4'),
('0505', 'RT05', 'Ruang Teori 5'),
('0506', 'RT06', 'Ruang Teori 6'),
('0507', 'RT07', 'Ruang Teori 7'),
('0508', 'LPY1', 'Laboratorium Proyek 1'),
('0615', 'LSI1', 'Laboratorium Sistem Informasi 1'),
('0617', 'LSI2', 'Laboratorium Sistem Informasi 2'),
('0618', 'LSI3', 'Laboratorium Sistem Informasi 3'),
('0619', 'LPY2', 'Laboratorium Proyek 2'),
('0620', 'LPY3', 'Laboratorium Proyek 3'),
('0701', 'LPR1', 'Laboratorium Pemrograman 1'),
('0702', 'LPR2', 'Laboratorium Pemrograman 2'),
('0703', 'LPR3', 'Laboratorium Pemrograman 3'),
('0704', 'LPR4', 'Laboratorium Pemrograman 4'),
('0705', 'LPR5', 'Laboratorium Pemrograman 5'),
('0706', 'LPR6', 'Laboratorium Pemrograman 6'),
('0707', 'LKJ1', 'Laboratorium Keamanan Jaringan 1'),
('0708', 'LPR7', 'Laboratorium Pemrograman 7'),
('0713', 'LKJ2', 'Laboratorium Keamanan Jaringan 2'),
('0714', 'LPR8', 'Laboratorium Pemrograman 8'),
('0715', 'LKJ3', 'Laboratorium Keamanan Jaringan 3'),
('0716', 'LIG1', 'Laboratorium Visi Komputer 1'),
('0717', 'RT08', 'Ruang Teori 8'),
('0718', 'LIG2', 'Laboratorium Visi Komputer 2'),
('0719', 'LPY4', 'Laboratorium Proyek 4'),
('0720', 'LAI1', 'Laboratorium Kecerdasan Buatan 1'),
('0801', 'L DTS', 'Laboratorium DTS'),
('0805', 'RT09', 'Ruang Teori 9'),
('0806', 'RT10', 'Ruang Teori 10'),
('1001', 'RT11', 'Ruang Teori 11'),
('1002', 'ROL1', 'Ruang Online 1'),
('1003', 'ROL2', 'Ruang Online 2'),
('1004', 'ROL3', 'Ruang Online 3');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`kode_dosen`);

--
-- Indeks untuk tabel `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`kode_hari`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`kode_jadwal`),
  ADD KEY `kode_dosen` (`kode_dosen`),
  ADD KEY `kode_mk` (`kode_mk`),
  ADD KEY `kode_ruang` (`kode_ruang`),
  ADD KEY `kode_hari` (`kode_hari`),
  ADD KEY `kode_kelas` (`kode_kelas`),
  ADD KEY `jp_mulai` (`jp_mulai`),
  ADD KEY `jp_selesai` (`jp_selesai`);

--
-- Indeks untuk tabel `jp`
--
ALTER TABLE `jp`
  ADD PRIMARY KEY (`kode_jp`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kode_kelas`),
  ADD KEY `kode_prodi` (`kode_prodi`);

--
-- Indeks untuk tabel `mk`
--
ALTER TABLE `mk`
  ADD PRIMARY KEY (`kode_mk`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`kode_prodi`);

--
-- Indeks untuk tabel `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`kode_ruang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `kode_jadwal` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=371;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`kode_dosen`) REFERENCES `dosen` (`kode_dosen`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`kode_mk`) REFERENCES `mk` (`kode_mk`),
  ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`kode_ruang`) REFERENCES `ruang` (`kode_ruang`),
  ADD CONSTRAINT `jadwal_ibfk_4` FOREIGN KEY (`kode_hari`) REFERENCES `hari` (`kode_hari`),
  ADD CONSTRAINT `jadwal_ibfk_5` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`),
  ADD CONSTRAINT `jadwal_ibfk_6` FOREIGN KEY (`jp_mulai`) REFERENCES `jp` (`kode_jp`),
  ADD CONSTRAINT `jadwal_ibfk_7` FOREIGN KEY (`jp_selesai`) REFERENCES `jp` (`kode_jp`);

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`kode_prodi`) REFERENCES `prodi` (`kode_prodi`);
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

--
-- Dumping data untuk tabel `pma__designer_settings`
--

INSERT INTO `pma__designer_settings` (`username`, `settings_data`) VALUES
('root', '{\"snap_to_grid\":\"off\",\"relation_lines\":\"true\",\"angular_direct\":\"direct\"}');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data untuk tabel `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"akademik\",\"table\":\"matakuliah\"},{\"db\":\"akademik\",\"table\":\"mahasiswa\"},{\"db\":\"db_polinema\",\"table\":\"ruang\"},{\"db\":\"penjualan_produk\",\"table\":\"detail_penjualan\"},{\"db\":\"penjualan_produk\",\"table\":\"penjualan\"},{\"db\":\"penjualan_produk\",\"table\":\"barang\"}]');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data untuk tabel `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'penjualan_produk', 'penjualan', '{\"sorted_col\":\"`penjualan`.`kode_penjualan` DESC\"}', '2023-02-15 01:59:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data untuk tabel `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2023-05-13 08:43:31', '{\"Console\\/Mode\":\"collapse\",\"lang\":\"id\"}');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indeks untuk tabel `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indeks untuk tabel `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indeks untuk tabel `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indeks untuk tabel `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indeks untuk tabel `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indeks untuk tabel `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indeks untuk tabel `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indeks untuk tabel `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indeks untuk tabel `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indeks untuk tabel `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indeks untuk tabel `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indeks untuk tabel `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indeks untuk tabel `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `praktikum11`
--
CREATE DATABASE IF NOT EXISTS `praktikum11` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `praktikum11`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `jabatan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `salt` varchar(50) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Database: `prakwebdb`
--
CREATE DATABASE IF NOT EXISTS `prakwebdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `prakwebdb`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `asd` (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Database: `simanji`
--
CREATE DATABASE IF NOT EXISTS `simanji` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `simanji`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama_lengkap`, `email`, `nohp`, `username`, `password`, `level`) VALUES
(1, 'Dennis Parulian', 'Dennis@gmail.com', '081333487717', 'dennis', 'dennis', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Database: `ujicoba`
--
CREATE DATABASE IF NOT EXISTS `ujicoba` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ujicoba`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_log`
--

CREATE TABLE `tbl_log` (
  `id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `time` datetime DEFAULT curtime()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Trigger `tbl_log`
--
DELIMITER $$
CREATE TRIGGER `dennisoke` BEFORE UPDATE ON `tbl_log` FOR EACH ROW insert into tbl_log (username, description) VALUES (old.username, "user ini mau login")
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user` varchar(20) NOT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user`, `password`) VALUES
('dennis', '1234');

--
-- Trigger `users`
--
DELIMITER $$
CREATE TRIGGER `login_log` AFTER UPDATE ON `users` FOR EACH ROW insert into tbl_log (user, description) values(old.user, "berhasil login")
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_log`
--
ALTER TABLE `tbl_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
