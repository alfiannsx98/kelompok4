-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2020 at 02:47 AM
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
-- Database: `polije-pkl`
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
  `NIP` varchar(20) NOT NULL,
  `NAMA` varchar(50) NOT NULL,
  `JK` varchar(10) NOT NULL,
  `ALAMAT` varchar(100) NOT NULL,
  `NOMOR_HP` varchar(15) NOT NULL,
  `PRODI` varchar(30) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_prodi`
--

INSERT INTO `admin_prodi` (`NIP`, `NAMA`, `JK`, `ALAMAT`, `NOMOR_HP`, `PRODI`, `EMAIL`, `PASSWORD`, `id_role`) VALUES
('', '', '', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dosbing`
--

CREATE TABLE `dosbing` (
  `NIP` varchar(20) NOT NULL,
  `NAMA_DOS` varchar(50) NOT NULL,
  `JK_DOS` varchar(10) NOT NULL,
  `ALAMAT_DOS` varchar(100) NOT NULL,
  `NO_HP_DOS` varchar(15) NOT NULL,
  `EMAIL_DOS` varchar(30) NOT NULL,
  `PASSWORD_DOS` varchar(50) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosbing`
--

INSERT INTO `dosbing` (`NIP`, `NAMA_DOS`, `JK_DOS`, `ALAMAT_DOS`, `NO_HP_DOS`, `EMAIL_DOS`, `PASSWORD_DOS`, `id_role`) VALUES
('', '', '', '', '', '', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kelompok`
--

CREATE TABLE `kelompok` (
  `NIM` varchar(20) NOT NULL,
  `NAMA` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NIM` varchar(10) NOT NULL,
  `NAMA` varchar(50) NOT NULL,
  `JK` varchar(10) NOT NULL,
  `PRODI` varchar(10) NOT NULL,
  `SMT` varchar(2) NOT NULL,
  `ALAMAT` varchar(100) NOT NULL,
  `NOMOR_HP` varchar(15) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`NIM`, `NAMA`, `JK`, `PRODI`, `SMT`, `ALAMAT`, `NOMOR_HP`, `EMAIL`, `PASSWORD`, `id_role`) VALUES
('', '', '', '', '', '', '', '', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `ID` varchar(10) NOT NULL,
  `NAMA` varchar(100) NOT NULL,
  `ALAMAT` varchar(200) NOT NULL,
  `NOMOR_HP` varchar(15) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `REKOMENDASI` varchar(10) NOT NULL,
  `LOKASI_MAP` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`ID`, `NAMA`, `ALAMAT`, `NOMOR_HP`, `EMAIL`, `REKOMENDASI`, `LOKASI_MAP`) VALUES
('pr001', 'Dinas Komunikasi, Informatika dan Persandian', 'Jl. PB. Sudirman no. 1, Patokan, Kec Situbondo- Situbondo', '', '', '', '0');

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
  ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `dosbing`
--
ALTER TABLE `dosbing`
  ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NIM`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`ID`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
