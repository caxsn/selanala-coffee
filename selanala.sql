-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 22, 2018 at 10:10 PM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kopi2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_admin`
--

CREATE TABLE `tabel_admin` (
  `idAdmin` varchar(11) NOT NULL,
  `namaAdmin` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_admin`
--

INSERT INTO `tabel_admin` (`idAdmin`, `namaAdmin`, `email`, `password`) VALUES
('1', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_artikel`
--

CREATE TABLE `tabel_artikel` (
  `idArtikel` int(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `path` varchar(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_artikel`
--

INSERT INTO `tabel_artikel` (`idArtikel`, `judul`, `deskripsi`, `path`, `tanggal`) VALUES
(40, 'Warung Kopi Klotok Pakem, Nikmatnya Hidangan Ndeso', 'Meskipun bernama warung kopi klotok, warung makan yang mengusung konsep kampung ini tidak hanya menyediakan kopi. Justru menu yang paling digemari dan menjadikan keberadaan warung ini populer adalah sego jangan (nasi sayur). Warung Kopi Klotok menyediakan aneka sayur yang biasa dimasak oleh ibu di rumah, antara lain lodeh kluwih, lodeh terong, lodeh tempe lombok ijo, sayur asem, dan sop ala ndeso. Selain itu ada juga lauk yang tak kalah ndesonya seperti pindang goreng, telur dadar, tempe garit, dan sambel dadak. ', 'Wisata-Murah-Jogja-Kopi-Klotok-Pakem.jpg', '2018-07-22');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_kategori`
--

CREATE TABLE `tabel_kategori` (
  `idKategori` int(2) NOT NULL,
  `namaKategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_kategori`
--

INSERT INTO `tabel_kategori` (`idKategori`, `namaKategori`) VALUES
(1, 'Single Origin'),
(2, 'Houseblend'),
(3, 'Langganan');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pesan`
--

CREATE TABLE `tabel_pesan` (
  `idPesan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tabel_pesan`
--

INSERT INTO `tabel_pesan` (`idPesan`, `nama`, `email`, `pesan`) VALUES
(1, 'Maguwo Team', 'admin@gmail.com', 'Lorem ipsum dolor sit amet, id cum alienum iracundia. Graece possit scripta at vix, et nibh labores volumus per, mel quem quando eu. Est no minim expetendis, his et graeci dignissim. Ea pri magna laoreet dolorem, at nec epicuri expetenda voluptaria, in quo labore aliquid. Et ius ferri atomorum.'),
(2, 'Maguwo Team', 'user@user.com', 'Testing mas');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_produk`
--

CREATE TABLE `tabel_produk` (
  `idProduk` int(3) NOT NULL,
  `kdProduk` varchar(6) NOT NULL,
  `idKategori` int(2) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(15) NOT NULL,
  `stok` int(5) NOT NULL,
  `path` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_produk`
--

INSERT INTO `tabel_produk` (`idProduk`, `kdProduk`, `idKategori`, `nama`, `harga`, `stok`, `path`, `deskripsi`) VALUES
(6, 'GYO001', 1, 'Kopi Gayo', 9000, 20, 'wow-kopi-gayo.jpg', 'Kopi gayo (bahasa Inggris: Gayo coffee) merupakan varietas kopi arabika yang menjadi salah satu komoditi unggulan yang berasal dari Dataran tinggi Gayo, Aceh Tengah, Indonesia.[1] Kopi gayo telah mendapat Fair Trade Certified™ dari Organisasi Internasional Fair Trade pada tanggal 27 Mei 2010, Kopi gayo menerima sertifikat IG (Indikasi Geografis) diserahkan oleh Menteri Hukum dan HAM Indonesia.');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_profil`
--

CREATE TABLE `tabel_profil` (
  `idProfil` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `path` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tabel_profil`
--

INSERT INTO `tabel_profil` (`idProfil`, `deskripsi`, `path`) VALUES
(1, 'Profil Selanala Update', '416x416.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_transaksi`
--

CREATE TABLE `tabel_transaksi` (
  `idTransaksi` int(3) NOT NULL,
  `kdTransaksi` char(10) NOT NULL,
  `idUser` int(5) NOT NULL,
  `daftarBarang` text NOT NULL,
  `level` varchar(15) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(15) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_trolly`
--

CREATE TABLE `tabel_trolly` (
  `idTrolly` int(5) NOT NULL,
  `idUser` int(5) NOT NULL,
  `idProduk` int(5) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `harga` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_user`
--

CREATE TABLE `tabel_user` (
  `idUser` int(5) NOT NULL,
  `namaUser` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_user`
--

INSERT INTO `tabel_user` (`idUser`, `namaUser`, `email`, `password`, `alamat`, `telp`) VALUES
(4, 'John Doez', 'user@user.com', '202cb962ac59075b964b07152d234b70', 'Bantul', '089669123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_admin`
--
ALTER TABLE `tabel_admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `tabel_artikel`
--
ALTER TABLE `tabel_artikel`
  ADD PRIMARY KEY (`idArtikel`);

--
-- Indexes for table `tabel_kategori`
--
ALTER TABLE `tabel_kategori`
  ADD PRIMARY KEY (`idKategori`);

--
-- Indexes for table `tabel_pesan`
--
ALTER TABLE `tabel_pesan`
  ADD PRIMARY KEY (`idPesan`);

--
-- Indexes for table `tabel_produk`
--
ALTER TABLE `tabel_produk`
  ADD PRIMARY KEY (`idProduk`),
  ADD KEY `idKategori` (`idKategori`);

--
-- Indexes for table `tabel_profil`
--
ALTER TABLE `tabel_profil`
  ADD PRIMARY KEY (`idProfil`);

--
-- Indexes for table `tabel_transaksi`
--
ALTER TABLE `tabel_transaksi`
  ADD PRIMARY KEY (`idTransaksi`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `tabel_trolly`
--
ALTER TABLE `tabel_trolly`
  ADD PRIMARY KEY (`idTrolly`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_artikel`
--
ALTER TABLE `tabel_artikel`
  MODIFY `idArtikel` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `tabel_pesan`
--
ALTER TABLE `tabel_pesan`
  MODIFY `idPesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tabel_produk`
--
ALTER TABLE `tabel_produk`
  MODIFY `idProduk` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tabel_profil`
--
ALTER TABLE `tabel_profil`
  MODIFY `idProfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tabel_transaksi`
--
ALTER TABLE `tabel_transaksi`
  MODIFY `idTransaksi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tabel_trolly`
--
ALTER TABLE `tabel_trolly`
  MODIFY `idTrolly` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `idUser` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_produk`
--
ALTER TABLE `tabel_produk`
  ADD CONSTRAINT `tabel_produk_ibfk_1` FOREIGN KEY (`idKategori`) REFERENCES `tabel_kategori` (`idKategori`);

--
-- Constraints for table `tabel_transaksi`
--
ALTER TABLE `tabel_transaksi`
  ADD CONSTRAINT `tabel_transaksi_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `tabel_user` (`idUser`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
