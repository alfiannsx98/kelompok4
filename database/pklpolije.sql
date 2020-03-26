-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2020 at 01:07 AM
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
-- Database: `pklpolije`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `NIP` varchar(20) NOT NULL,
  `NAMA` varchar(50) NOT NULL,
  `JK` varchar(10) NOT NULL,
  `ALAMAT` varchar(100) NOT NULL,
  `NOMOR_HP` varchar(15) NOT NULL,
  `PRODI` varchar(30) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `PASSWORD_DOS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `PASSWORD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `ID` varchar(10) NOT NULL,
  `NAMA` varchar(50) NOT NULL,
  `ALAMAT` varchar(100) NOT NULL,
  `NOMOR_HP` varchar(15) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `LOKASI_MAP` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
