-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2020 at 10:26 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `polije_pkl`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_user`
--

CREATE TABLE `access_user` (
  `id_access_menu` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `access_user`
--

INSERT INTO `access_user` (`id_access_menu`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(7, 2, 3),
(8, 2, 2),
(9, 3, 2),
(10, 4, 2),
(12, 1, 6),
(13, 1, 7),
(14, 1, 8),
(15, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `admin_prodi`
--

CREATE TABLE `admin_prodi` (
  `ID_ADM` char(10) NOT NULL,
  `NIP_ADM` varchar(20) DEFAULT NULL,
  `NAMA_ADM` varchar(50) DEFAULT NULL,
  `JK_ADM` varchar(10) DEFAULT NULL,
  `ALAMAT_ADM` varchar(100) DEFAULT NULL,
  `HP_ADM` varchar(20) DEFAULT NULL,
  `PRODI_ADM` varchar(10) DEFAULT NULL,
  `EMAIL_ADM` varchar(30) DEFAULT NULL,
  `PASSWORD_ADM` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dosbing`
--

CREATE TABLE `dosbing` (
  `ID_DS` char(10) NOT NULL,
  `NIP_DS` varchar(20) DEFAULT NULL,
  `NAMA_DS` varchar(50) DEFAULT NULL,
  `JK_DS` varchar(10) DEFAULT NULL,
  `ALAMAT_DS` varchar(100) DEFAULT NULL,
  `HP_DS` varchar(20) DEFAULT NULL,
  `EMAIL_DS` varchar(30) DEFAULT NULL,
  `PASSWORD_DS` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosbing`
--

INSERT INTO `dosbing` (`ID_DS`, `NIP_DS`, `NAMA_DS`, `JK_DS`, `ALAMAT_DS`, `HP_DS`, `EMAIL_DS`, `PASSWORD_DS`) VALUES
('ds001', NULL, 'Mohammad Ainun A', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `ID_M` char(10) NOT NULL,
  `NIM` varchar(20) DEFAULT NULL,
  `NAMA_M` varchar(50) DEFAULT NULL,
  `JK_M` varchar(10) DEFAULT NULL,
  `PRODI_M` varchar(10) DEFAULT NULL,
  `SMT` char(5) DEFAULT NULL,
  `ALAMAT_M` varchar(100) DEFAULT NULL,
  `HP_M` varchar(20) DEFAULT NULL,
  `EMAIL_M` varchar(30) DEFAULT NULL,
  `PASSWORD_M` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`ID_M`, `NIM`, `NAMA_M`, `JK_M`, `PRODI_M`, `SMT`, `ALAMAT_M`, `HP_M`, `EMAIL_M`, `PASSWORD_M`) VALUES
('m0001', NULL, 'Mohammad', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('m0002', NULL, 'Ainun', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('m0003', NULL, 'Ardiansyah', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('m0004', NULL, 'Ansyah', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `ID_PND` char(10) NOT NULL,
  `ID_PR` char(10) NOT NULL,
  `ID_DS` char(10) NOT NULL,
  `ID_M` varchar(50) NOT NULL,
  `WAKTU` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`ID_PND`, `ID_PR`, `ID_DS`, `ID_M`, `WAKTU`) VALUES
('pnd1', 'pr001', 'ds001', '', NULL),
('pnd2', 'pr001', 'ds001', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran_klp`
--

CREATE TABLE `pendaftaran_klp` (
  `ID_PND` char(10) NOT NULL,
  `ID_M` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran_klp`
--

INSERT INTO `pendaftaran_klp` (`ID_PND`, `ID_M`) VALUES
('pnd1', 'm0001'),
('pnd1', 'm0002'),
('pnd1', 'm0003'),
('pnd2', 'm0004');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `ID_PR` char(10) NOT NULL,
  `NAMA_PR` varchar(50) DEFAULT NULL,
  `ALAMAT_PR` varchar(100) DEFAULT NULL,
  `HP_PR` varchar(20) DEFAULT NULL,
  `EMAIL_PR` varchar(30) DEFAULT NULL,
  `RATING` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`ID_PR`, `NAMA_PR`, `ALAMAT_PR`, `HP_PR`, `EMAIL_PR`, `RATING`) VALUES
('pr001', 'Dinas Komunikasi, Informatika dan Persandian', 'Jl. PB. Sudirman no. 1, Patokan, Situbondo', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `submenu_user`
--

CREATE TABLE `submenu_user` (
  `id_submenu` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `submenu_user`
--

INSERT INTO `submenu_user` (`id_submenu`, `menu_id`, `title`, `url`, `is_active`) VALUES
(2, 1, 'Dashboard', 'admin', 1),
(3, 2, 'My Profile', 'user', 1),
(4, 2, 'Edit Profile', 'user/edit', 1),
(5, 3, 'Management Menu\r\n', 'menu', 1),
(6, 3, 'Sub Menu Management\r\n', 'menu/submenu', 1),
(7, 1, 'Role', 'admin/role', 1),
(8, 2, 'Edit Password', 'user/edit_password', 1),
(9, 4, 'Car Data', 'transaksi/mobil', 1),
(10, 0, 'Data Mobil', 'cms', 1),
(17, 8, 'bla', 'pendaftaran/index', 1);

-- --------------------------------------------------------

--
-- Table structure for table `token_user`
--

CREATE TABLE `token_user` (
  `id_token` int(15) NOT NULL,
  `email` varchar(64) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(20) NOT NULL,
  `nama` varchar(48) NOT NULL,
  `email` varchar(48) NOT NULL,
  `image` varchar(48) NOT NULL,
  `password` varchar(64) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_created` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
('ID-U11302', 'Alfian Rochmatul Irman', 'alfianrochmatul77@gmail.com', 'default.jpg', '$2y$10$gfudft15mCxaxhvkzrsrZeqM27pkzlb.EArC8JTAtDK6vtsT1PqH6', 1, 1, 1583394165),
('ID-U11344', 'Rohmat', 'alfianrochmatul77a@gmail.com', 'default.jpg', '$2y$10$gfudft15mCxaxhvkzrsrZeqM27pkzlb.EArC8JTAtDK6vtsT1PqH6', 2, 1, 1583394165);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id_menu` int(11) NOT NULL,
  `menu` varchar(32) NOT NULL,
  `icon` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id_menu`, `menu`, `icon`) VALUES
(1, 'admin', 'dashboard'),
(2, 'user', 'contacts'),
(3, 'menu', 'menu'),
(6, 'dosen', 'supervisor_account'),
(7, 'perusahaan', 'domain'),
(8, 'pendaftaran', 'work_outline');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_role`, `role`) VALUES
(1, 'admin'),
(2, 'mahasiswa'),
(3, 'Dosen'),
(4, 'Dosen Pengampu PKL');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_pendaftaran`
-- (See below for the actual view)
--
CREATE TABLE `view_pendaftaran` (
`ID_PND` char(10)
,`ID_PR` char(10)
,`NAMA_PR` varchar(50)
,`ID_DS` char(10)
,`NAMA_DS` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `view_pendaftaran`
--
DROP TABLE IF EXISTS `view_pendaftaran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pendaftaran`  AS  select `pendaftaran`.`ID_PND` AS `ID_PND`,`pendaftaran`.`ID_PR` AS `ID_PR`,`perusahaan`.`NAMA_PR` AS `NAMA_PR`,`pendaftaran`.`ID_DS` AS `ID_DS`,`dosbing`.`NAMA_DS` AS `NAMA_DS` from ((`pendaftaran` join `perusahaan`) join `dosbing`) where `pendaftaran`.`ID_PR` = `perusahaan`.`ID_PR` and `pendaftaran`.`ID_DS` = `dosbing`.`ID_DS` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_user`
--
ALTER TABLE `access_user`
  ADD PRIMARY KEY (`id_access_menu`);

--
-- Indexes for table `dosbing`
--
ALTER TABLE `dosbing`
  ADD PRIMARY KEY (`ID_DS`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`ID_M`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`ID_PND`),
  ADD KEY `FK_RELATIONSHIP_1` (`ID_PR`),
  ADD KEY `FK_RELATIONSHIP_4` (`ID_DS`),
  ADD KEY `ID_M` (`ID_M`);

--
-- Indexes for table `pendaftaran_klp`
--
ALTER TABLE `pendaftaran_klp`
  ADD KEY `FK_RELATIONSHIP_3` (`ID_PND`),
  ADD KEY `FK_RELATIONSHIP_5` (`ID_M`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`ID_PR`);

--
-- Indexes for table `submenu_user`
--
ALTER TABLE `submenu_user`
  ADD PRIMARY KEY (`id_submenu`);

--
-- Indexes for table `token_user`
--
ALTER TABLE `token_user`
  ADD PRIMARY KEY (`id_token`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_user`
--
ALTER TABLE `access_user`
  MODIFY `id_access_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `submenu_user`
--
ALTER TABLE `submenu_user`
  MODIFY `id_submenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `token_user`
--
ALTER TABLE `token_user`
  MODIFY `id_token` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`ID_PR`) REFERENCES `perusahaan` (`ID_PR`),
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`ID_DS`) REFERENCES `dosbing` (`ID_DS`);

--
-- Constraints for table `pendaftaran_klp`
--
ALTER TABLE `pendaftaran_klp`
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`ID_PND`) REFERENCES `pendaftaran` (`ID_PND`),
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`ID_M`) REFERENCES `mahasiswa` (`ID_M`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
