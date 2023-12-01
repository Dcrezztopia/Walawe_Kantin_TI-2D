-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Nov 2023 pada 06.10
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
(1, 'Classic Baguette', 'Roti', '100', '3', 'CB001', 1),
(2, 'Cinnamon Swirl Delight', 'Roti', '50', '3', 'CSD002', 2),
(3, 'Cheesy Cheddar Rolls', 'Roti', '75', '4', 'CCR003', 1),
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
(50, 'Dark Chocolate Truffle Cupcake', 'Kue', '110', '4', 'DCTC050', 49);

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
  `harga` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  MODIFY `idBarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

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
  MODIFY `id_waiting` int(11) NOT NULL AUTO_INCREMENT;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
