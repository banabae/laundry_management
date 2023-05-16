-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 16, 2020 at 03:43 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_log`
--

CREATE TABLE `riwayat_log` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser_detail` varchar(100) NOT NULL,
  `sistem_operasi` varchar(100) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_transaksi`
--

CREATE TABLE `tb_detail_transaksi` (
  `id` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `qty` double NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `id` int(11) NOT NULL,
  `nama_member` varchar(100) NOT NULL,
  `alamat_member` text NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tlp_member` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`id`, `nama_member`, `alamat_member`, `jenis_kelamin`, `tlp_member`) VALUES
(1111111111, 'NaN', 'NaN', 'L', 'NaN');

-- --------------------------------------------------------

--
-- Table structure for table `tb_outlet`
--

CREATE TABLE `tb_outlet` (
  `id` int(11) NOT NULL,
  `nama_outlet` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `tlp` varchar(15) NOT NULL,
  `tanggal_daftar` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_outlet`
--

INSERT INTO `tb_outlet` (`id`, `nama_outlet`, `alamat`, `tlp`, `tanggal_daftar`) VALUES
(20200001, 'LAUNDRY LANGEN', 'langen, rt 01/01, muktisari, langensari, kota banjar, jawa barat, Indonesia', '087726544819', '2020-02-25 15:44:37'),
(20200004, 'KYKY LAUNDRYS', 'Jl. pegadaian Banjar Tengah', '089456354789', '2020-02-25 15:56:53');

-- --------------------------------------------------------

--
-- Table structure for table `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id` int(11) NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `jenis` enum('kiloan','selimut','bed_cover','kaos','lain') NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_paket`
--

INSERT INTO `tb_paket` (`id`, `id_outlet`, `jenis`, `nama_paket`, `harga`) VALUES
(20030001, 20200001, 'kaos', 'Kaos', 5000),
(20030002, 20200001, 'lain', 'kemeja pendek', 5000),
(20030003, 20200001, 'lain', 'kemeja panjang', 6000),
(20030004, 20200001, 'lain', 'celana pendek', 5000),
(20030005, 20200001, 'lain', 'celana panjang', 6000),
(20030006, 20200001, 'lain', 'celana jeans panjang', 7000),
(20030007, 20200001, 'lain', 'rok', 6000),
(20030008, 20200001, 'selimut', 'selimut', 15000),
(20030009, 20200001, 'lain', 'sajadah', 9000),
(20030010, 20200001, 'lain', 'mukena', 7000),
(20030011, 20200001, 'lain', 'kerudung', 7000),
(20030012, 20200001, 'lain', 'Sprei', 25000),
(20030013, 20200001, 'lain', 'sarung bantal', 5000),
(20030014, 20200001, 'lain', 'sarung guling', 5000),
(20030015, 20200001, 'lain', 'gordyn', 25000),
(20030016, 20200001, 'lain', 'tas', 10000),
(20030017, 20200001, 'bed_cover', 'bed cover', 25000),
(20030018, 20200001, 'lain', 'daster', 8000),
(20030019, 20200001, 'lain', 'handuk', 6000),
(20030020, 20200001, 'lain', 'karpet kecil ( 115 x 155 cm )', 20000),
(20030021, 20200001, 'lain', 'karpet standar ( 160 x 215 cm )', 25000),
(20030022, 20200001, 'lain', 'karpet besar ( 190 x 260 cm )', 30000),
(20030023, 20200001, 'kiloan', 'underwear', 7000),
(20030024, 20200001, 'lain', 'jaket', 6000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` int(11) NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `kode_invoice` varchar(100) NOT NULL,
  `id_member` int(11) NOT NULL,
  `nama_member` varchar(255) NOT NULL,
  `tlp_member` varchar(15) NOT NULL,
  `alamat_member` text NOT NULL,
  `tgl` datetime NOT NULL,
  `batas_waktu` datetime NOT NULL,
  `tgl_bayar` datetime NOT NULL,
  `biaya_tambahan` int(11) NOT NULL,
  `diskon` double NOT NULL,
  `pajak` int(11) NOT NULL,
  `status` enum('baru','proses','selesai','diambil') NOT NULL,
  `dibayar` enum('dibayar','belum_diayar') NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `role` enum('admin','kasir','owner') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `email` varchar(191) NOT NULL,
  `tlp` varchar(15) NOT NULL,
  `photo_profile` text NOT NULL DEFAULT 'default_profile.png',
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `id_outlet`, `role`, `tgl_lahir`, `jenis_kelamin`, `email`, `tlp`, `photo_profile`, `last_login`) VALUES
(1, 'Sabana', 'tesuto', '$2y$10$iLhk0R.u0TcndiiATDeYR.r3nY3IuHddYserMnTBsYslKngddieKK', 20200001, 'admin', '2003-11-06', 'L', 'sabana@gmail.com', '082216863513', '200311_tesutoprofile.png', '2020-03-13 06:41:41'),
(2, 'tesuto kozuki', 'tesuto_kasir', '$2y$10$eY0PJ3IEOl59t.0.bvyrm.qOP.ZrCqWWJl38TnwAkaFgSlgBOtglG', 20200001, 'kasir', '2003-11-06', 'L', 'tesutokozuki@gmail.com', '087726544819', '200312_tesuto_kasirprofile.jpeg', '2020-03-12 02:03:40'),
(9, 'owneriz', 'tesuto_owner', '$2y$10$MP47geW2m95Ko2zi6eouHOjh435qGY406xzorxB8JVhizjZj8ZGv.', 20200001, 'kasir', '2003-11-06', 'L', 'tesutokozuki@gmail.com', '082216863513', '200311_tesuto_ownerprofile1.png', '2020-03-12 02:03:07'),
(11, 'Hilda Helmayanti', 'hilda', '$2y$10$a71VfhZXsj8/Jh30XdGKqedobOYCWT4sVM75lO4sOQN5zT2ImP.mu', 20200001, 'admin', '2003-11-06', 'P', 'hilda@gmail.com', '087726544819', '200312_hildaprofile.jpeg', '2020-03-12 07:37:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `riwayat_log`
--
ALTER TABLE `riwayat_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_paket` (`id_paket`),
  ADD KEY `foreign_transaksi` (`id_transaksi`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_outlet`
--
ALTER TABLE `tb_outlet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_outlet` (`id_outlet`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_outlet` (`id_outlet`),
  ADD KEY `foreign_member` (`id_member`),
  ADD KEY `foreign_user` (`id_user`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `outlet` (`id_outlet`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `riwayat_log`
--
ALTER TABLE `riwayat_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1111111112;

--
-- AUTO_INCREMENT for table `tb_outlet`
--
ALTER TABLE `tb_outlet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120200003;

--
-- AUTO_INCREMENT for table `tb_paket`
--
ALTER TABLE `tb_paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20030049;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD CONSTRAINT `foreign_paket` FOREIGN KEY (`id_paket`) REFERENCES `tb_paket` (`id`),
  ADD CONSTRAINT `foreign_transaksi` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD CONSTRAINT `foreign_outlet` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `f_outlet` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlet` (`id`),
  ADD CONSTRAINT `foreign_member` FOREIGN KEY (`id_member`) REFERENCES `tb_member` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `foreign_user` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `outlet` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
