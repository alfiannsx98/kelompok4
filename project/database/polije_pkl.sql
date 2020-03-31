-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2020 at 11:20 PM
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
  `menu_id` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `access_user`
--

INSERT INTO `access_user` (`id_access_menu`, `role_id`, `menu_id`) VALUES
(1, 1, 'M1'),
(2, 1, 'M2'),
(3, 1, 'M3'),
(4, 2, 'M2');

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

-- --------------------------------------------------------

--
-- Table structure for table `kelompok`
--

CREATE TABLE `kelompok` (
  `ID_KLP` char(10) NOT NULL,
  `NIM_KLP` varchar(20) DEFAULT NULL,
  `NAMA_KLP` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `ID_PND` char(10) NOT NULL,
  `ID_PR` char(10) NOT NULL,
  `ID_ADM` char(10) NOT NULL,
  `ID_M` char(10) NOT NULL,
  `ID_DS` char(10) NOT NULL,
  `WAKTU` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id_role` int(11) NOT NULL,
  `role` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id_role`, `role`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `submenu_user`
--

CREATE TABLE `submenu_user` (
  `id_submenu` int(11) NOT NULL,
  `menu_id` varchar(32) NOT NULL,
  `title` varchar(64) NOT NULL,
  `url` varchar(64) NOT NULL,
  `icon` varchar(64) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `submenu_user`
--

INSERT INTO `submenu_user` (`id_submenu`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 'M1', 'asd', 'ads', 'asd', 1),
(2, 'M1', 'asdsad', 'asddas', 'asdsad', 1);

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
  `id_menu` varchar(32) NOT NULL,
  `menu` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id_menu`, `menu`) VALUES
('M1', 'Dashboard'),
('M2', 'User'),
('M3', 'Menu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_user`
--
ALTER TABLE `access_user`
  ADD PRIMARY KEY (`id_access_menu`);

--
-- Indexes for table `admin_prodi`
--
ALTER TABLE `admin_prodi`
  ADD PRIMARY KEY (`ID_ADM`);

--
-- Indexes for table `dosbing`
--
ALTER TABLE `dosbing`
  ADD PRIMARY KEY (`ID_DS`);

--
-- Indexes for table `kelompok`
--
ALTER TABLE `kelompok`
  ADD PRIMARY KEY (`ID_KLP`);

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
  ADD KEY `FK_RELATIONSHIP_2` (`ID_ADM`),
  ADD KEY `FK_RELATIONSHIP_3` (`ID_M`),
  ADD KEY `FK_RELATIONSHIP_4` (`ID_DS`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`ID_PR`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id_role`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_user`
--
ALTER TABLE `access_user`
  MODIFY `id_access_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `submenu_user`
--
ALTER TABLE `submenu_user`
  MODIFY `id_submenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `token_user`
--
ALTER TABLE `token_user`
  MODIFY `id_token` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`ID_PR`) REFERENCES `perusahaan` (`ID_PR`),
  ADD CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`ID_ADM`) REFERENCES `admin_prodi` (`ID_ADM`),
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`ID_M`) REFERENCES `mahasiswa` (`ID_M`),
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`ID_DS`) REFERENCES `dosbing` (`ID_DS`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
