-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Des 2023 pada 08.20
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
  `namaSupplier` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
('Makanan Berat', 'Jenis barang makanan berat'),
('Makanan Ringan', 'Jenis barang makanan ringan'),
('Minuman', 'Jenis barang minuman');

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
-- Indeks untuk tabel `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  ADD PRIMARY KEY (`kodedetail`),
  ADD KEY `fk_kodeTransaksi` (`kodeTransaksi`),
  ADD KEY `fk_idBarang` (`idBarang`);

--
-- Indeks untuk tabel `jenisbarang`
--
ALTER TABLE `jenisbarang`
  ADD PRIMARY KEY (`jenisBarang`);

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
  MODIFY `idBarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  MODIFY `kodedetail` int(11) NOT NULL AUTO_INCREMENT;

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
