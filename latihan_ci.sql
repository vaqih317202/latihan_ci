-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2018 at 02:28 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latihan_ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(10) UNSIGNED ZEROFILL NOT NULL,
  `nim` char(8) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `no_hp` char(12) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nim`, `nama`, `no_hp`, `email`, `alamat`) VALUES
(0000020001, '12177764', 'budi santosa', '089608960896', NULL, 'cilebut'),
(0000020003, '12177766', 'aldi', '089608960898', NULL, 'dramaga'),
(0000020004, '12177767', 'rahma', '089608960899', NULL, 'ciampea'),
(0000020005, '12177768', 'wati', '089608960900', NULL, 'ciomas'),
(0000020006, '12177769', 'adnin', '089608960901', NULL, 'kebon pedes'),
(0000020007, '12177770', 'rizal', '089608960902', NULL, 'ciluar'),
(0000020008, '12177771', 'yazid', '089608960903', NULL, 'cilebut'),
(0000020009, '12177772', 'yuyun', '089608960904', NULL, 'bogor');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `kd_buku` int(10) NOT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `pengarang` varchar(50) DEFAULT NULL,
  `penerbit` varchar(50) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `th_terbit` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`kd_buku`, `judul`, `pengarang`, `penerbit`, `stok`, `th_terbit`, `id_kategori`) VALUES
(10001, 'pemrograman visual', 'tatang sutarbi', 'abdi daya', 10, 2017, 1),
(10002, 'pemrograman visual', 'tatang sutarbi', 'abdi jaya', 10, 2017, 1),
(10003, 'pemrograman visual', 'tatang sutarbi', 'abdi jaya', 10, 2017, 1),
(10004, 'pemrograman visual', 'tatang sutarbi', 'abdi jaya', 10, 2017, 1),
(10005, 'pemrograman visual', 'tatang sutarbi', 'abdi jaya', 10, 2017, 1),
(10006, 'pemrograman visual', 'tatang sutarbi', 'abdi jaya', 10, 2017, 1),
(10007, 'pemrograman visual', 'jonsen', 'abdi jaya', 10, 2000, 1),
(10008, 'pemrograman visual', 'jonsen', 'abdi jaya', 10, 2000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` varchar(255) NOT NULL,
  `nadep` varchar(20) DEFAULT NULL,
  `nabel` varchar(20) DEFAULT NULL,
  `namel` varchar(20) DEFAULT NULL,
  `notel` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `nadep`, `nabel`, `namel`, `notel`) VALUES
('00000002', 'ghufron', 'vaqih', 'v2@gmail.com', '081289898989'),
('00000003', 'hamidah', 'vaqih', 'hamidah@gmail.com', '081288364284'),
('00000004', 'vaqih', 'hamidah', 'vaqih@gmail.com', '08129999999'),
('00000005', 'wendi', 'cagur', 'w@gmail.com', '019210731202');

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE `pinjam` (
  `kd_transaksi` int(10) UNSIGNED NOT NULL,
  `id_anggota` int(10) UNSIGNED DEFAULT NULL,
  `kd_buku` int(10) UNSIGNED DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `jml_pinjam` int(11) DEFAULT NULL,
  `denda` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjam`
--

INSERT INTO `pinjam` (`kd_transaksi`, `id_anggota`, `kd_buku`, `tanggal_pinjam`, `tanggal_kembali`, `jml_pinjam`, `denda`) VALUES
(30001, 20001, 10001, NULL, NULL, 2, 0),
(30002, 20002, 10002, NULL, NULL, 2, 0),
(30003, 20003, 10003, NULL, NULL, 2, 0),
(30004, 20004, 10004, NULL, NULL, 2, 0),
(30005, 20005, 10005, NULL, NULL, 2, 0),
(30006, 20006, 10006, NULL, NULL, 2, 0),
(30007, 20007, 10007, NULL, NULL, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `id_buku` int(5) NOT NULL,
  `no_isbn` int(5) NOT NULL,
  `nama_buku` varchar(255) NOT NULL,
  `tanggal_terbit` date NOT NULL,
  `pengarang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `firstname` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`firstname`, `lastname`, `email`, `password`) VALUES
('vaqih', 'hamidah', 'hamidah@gmail.com', '317202'),
('vaqih', 'hiqac', 'h2@gmail.com', '123');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_anggota`
-- (See below for the actual view)
--
CREATE TABLE `v_anggota` (
`id_anggota` int(10) unsigned zerofill
,`nim` char(8)
,`nama` varchar(50)
,`no_hp` char(12)
,`email` varchar(50)
,`alamat` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_buku`
-- (See below for the actual view)
--
CREATE TABLE `v_buku` (
`kd_buku` int(10)
,`judul` varchar(50)
,`pengarang` varchar(50)
,`penerbit` varchar(50)
,`stok` int(11)
,`th_terbit` int(11)
,`id_kategori` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_member`
-- (See below for the actual view)
--
CREATE TABLE `v_member` (
`nadep` varchar(20)
,`nabel` varchar(20)
,`namel` varchar(20)
,`notel` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pinjam`
-- (See below for the actual view)
--
CREATE TABLE `v_pinjam` (
`kd_transaksi` int(10) unsigned
,`id_anggota` int(10) unsigned
,`kd_buku` int(10) unsigned
,`tanggal_pinjam` date
,`tanggal_kembali` date
,`jml_pinjam` int(11)
,`denda` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_user`
-- (See below for the actual view)
--
CREATE TABLE `v_user` (
`firstname` varchar(30)
,`lastname` varchar(30)
,`email` varchar(50)
,`password` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_userpinjam`
-- (See below for the actual view)
--
CREATE TABLE `v_userpinjam` (
`id_anggota` int(10) unsigned zerofill
,`nama` varchar(50)
,`kd_transaksi` int(10) unsigned
,`tanggal_pinjam` date
,`tanggal_kembali` date
,`kd_buku` int(10)
,`judul` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `v_anggota`
--
DROP TABLE IF EXISTS `v_anggota`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_anggota`  AS  select `anggota`.`id_anggota` AS `id_anggota`,`anggota`.`nim` AS `nim`,`anggota`.`nama` AS `nama`,`anggota`.`no_hp` AS `no_hp`,`anggota`.`email` AS `email`,`anggota`.`alamat` AS `alamat` from `anggota` ;

-- --------------------------------------------------------

--
-- Structure for view `v_buku`
--
DROP TABLE IF EXISTS `v_buku`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_buku`  AS  select `buku`.`kd_buku` AS `kd_buku`,`buku`.`judul` AS `judul`,`buku`.`pengarang` AS `pengarang`,`buku`.`penerbit` AS `penerbit`,`buku`.`stok` AS `stok`,`buku`.`th_terbit` AS `th_terbit`,`buku`.`id_kategori` AS `id_kategori` from `buku` ;

-- --------------------------------------------------------

--
-- Structure for view `v_member`
--
DROP TABLE IF EXISTS `v_member`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_member`  AS  select `member`.`nadep` AS `nadep`,`member`.`nabel` AS `nabel`,`member`.`namel` AS `namel`,`member`.`notel` AS `notel` from `member` ;

-- --------------------------------------------------------

--
-- Structure for view `v_pinjam`
--
DROP TABLE IF EXISTS `v_pinjam`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pinjam`  AS  select `pinjam`.`kd_transaksi` AS `kd_transaksi`,`pinjam`.`id_anggota` AS `id_anggota`,`pinjam`.`kd_buku` AS `kd_buku`,`pinjam`.`tanggal_pinjam` AS `tanggal_pinjam`,`pinjam`.`tanggal_kembali` AS `tanggal_kembali`,`pinjam`.`jml_pinjam` AS `jml_pinjam`,`pinjam`.`denda` AS `denda` from `pinjam` ;

-- --------------------------------------------------------

--
-- Structure for view `v_user`
--
DROP TABLE IF EXISTS `v_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_user`  AS  select `user`.`firstname` AS `firstname`,`user`.`lastname` AS `lastname`,`user`.`email` AS `email`,`user`.`password` AS `password` from `user` ;

-- --------------------------------------------------------

--
-- Structure for view `v_userpinjam`
--
DROP TABLE IF EXISTS `v_userpinjam`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_userpinjam`  AS  select `a`.`id_anggota` AS `id_anggota`,`a`.`nama` AS `nama`,`b`.`kd_transaksi` AS `kd_transaksi`,`b`.`tanggal_pinjam` AS `tanggal_pinjam`,`b`.`tanggal_kembali` AS `tanggal_kembali`,`c`.`kd_buku` AS `kd_buku`,`c`.`judul` AS `judul` from ((`anggota` `a` join `pinjam` `b` on((`a`.`id_anggota` = `b`.`id_anggota`))) join `buku` `c` on((`b`.`kd_buku` = `c`.`kd_buku`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kd_buku`),
  ADD KEY `kd_buku` (`kd_buku`);

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`kd_transaksi`),
  ADD KEY `kd_transaksi` (`kd_transaksi`);

--
-- Indexes for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1232314;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `kd_buku` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10011;

--
-- AUTO_INCREMENT for table `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `kd_transaksi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30010;

--
-- AUTO_INCREMENT for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  MODIFY `id_buku` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
