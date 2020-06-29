-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2020 at 06:46 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(8, 2, 2),
(9, 3, 2),
(16, 1, 6),
(17, 1, 7),
(18, 1, 8),
(22, 1, 10),
(24, 12, 2),
(25, 12, 7),
(26, 12, 8),
(28, 1, 14),
(31, 2, 19),
(33, 1, 20),
(36, 2, 21),
(37, 1, 21),
(40, 2, 8),
(41, 4, 2),
(42, 4, 7),
(43, 4, 8);

-- --------------------------------------------------------

--
-- Table structure for table `admin_prodi`
--

CREATE TABLE `admin_prodi` (
  `ID_ADM` varchar(10) NOT NULL,
  `ID_PRODI` varchar(10) NOT NULL,
  `NIP_ADM` varchar(20) DEFAULT NULL,
  `NAMA_ADM` varchar(50) DEFAULT NULL,
  `JK_ADM` varchar(10) DEFAULT NULL,
  `ALAMAT_ADM` varchar(100) DEFAULT NULL,
  `HP_ADM` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_prodi`
--

INSERT INTO `admin_prodi` (`ID_ADM`, `ID_PRODI`, `NIP_ADM`, `NAMA_ADM`, `JK_ADM`, `ALAMAT_ADM`, `HP_ADM`) VALUES
('ADM0145', 'IDPR02', 'asdsdadsa', 'irman', 'Laki-Laki', 'Kediri', '81252223114');

-- --------------------------------------------------------

--
-- Table structure for table `bulan`
--

CREATE TABLE `bulan` (
  `ID_BL` char(10) NOT NULL,
  `BL` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulan`
--

INSERT INTO `bulan` (`ID_BL`, `BL`) VALUES
('', 'Januari'),
('', 'Februari'),
('', 'Maret'),
('', 'April'),
('', 'Mei'),
('', 'Juni'),
('', 'Juli'),
('', 'Agustus'),
('', 'September'),
('', 'Oktober'),
('', 'November'),
('', 'Desember');

-- --------------------------------------------------------

--
-- Table structure for table `dosbing`
--

CREATE TABLE `dosbing` (
  `ID_DS` varchar(10) NOT NULL,
  `ID_PRODI` varchar(10) NOT NULL,
  `ID_JB` varchar(10) NOT NULL,
  `NIP_DS` varchar(20) DEFAULT NULL,
  `NAMA_DS` varchar(50) DEFAULT NULL,
  `JK_DS` varchar(10) DEFAULT NULL,
  `ALAMAT_DS` varchar(100) DEFAULT NULL,
  `HP_DS` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosbing`
--

INSERT INTO `dosbing` (`ID_DS`, `ID_PRODI`, `ID_JB`, `NIP_DS`, `NAMA_DS`, `JK_DS`, `ALAMAT_DS`, `HP_DS`) VALUES
('DS001', 'IDPR02', 'JB0001', NULL, 'Mohammad Ainun A', NULL, NULL, NULL),
('DS002', 'IDPR02', 'JB0003', NULL, 'Ardiansyah', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `ID_JB` varchar(10) NOT NULL,
  `NM_JB` varchar(30) DEFAULT NULL,
  `ST_JB` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`ID_JB`, `NM_JB`, `ST_JB`) VALUES
('JB0001', 'Koordinator PKL', 1),
('JB0002', 'Admin Prodi', 0),
('JB0003', 'Dosen', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kuisioner`
--

CREATE TABLE `kuisioner` (
  `id_kuisioner` varchar(20) NOT NULL,
  `kuisioner` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kuisioner`
--

INSERT INTO `kuisioner` (`id_kuisioner`, `kuisioner`) VALUES
('KU0001', 'Penilaian Anda terhadap Pembelajaran di'),
('KU0002', 'Penilaian Anda Tugas di'),
('KU0003', 'Penilaian Anda kesesuaian kerja di'),
('KU0004', 'Penilaian Anda Penempatan di'),
('KU0005', 'Penilaian Anda terhadap keloyalan di ');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `ID_M` varchar(20) NOT NULL,
  `ID_PRODI` varchar(10) NOT NULL,
  `NIM` varchar(20) DEFAULT NULL,
  `NAMA_M` varchar(50) DEFAULT NULL,
  `JK_M` varchar(10) DEFAULT NULL,
  `SMT` varchar(5) DEFAULT NULL,
  `ALAMAT_M` varchar(100) DEFAULT NULL,
  `HP_M` varchar(20) DEFAULT NULL,
  `ST_KETUA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`ID_M`, `ID_PRODI`, `NIM`, `NAMA_M`, `JK_M`, `SMT`, `ALAMAT_M`, `HP_M`, `ST_KETUA`) VALUES
('M0001', 'IDPR02', 'E41181330', 'Mohammad', NULL, NULL, NULL, NULL, 1),
('M0002', 'IDPR02', 'E41181331', 'Ainun', NULL, NULL, NULL, NULL, 0),
('M0003', 'IDPR02', 'E41181332', 'Ardiansyah', NULL, NULL, NULL, NULL, 0),
('M0004', 'IDPR02', 'E41181333', 'Ansyah', NULL, NULL, NULL, NULL, 0),
('M0005', 'IDPR02', 'E41181335', 'Dindin', 'Laki-laki', '4', '', '', 1),
('M0006', 'IDPR02', 'E41181334', 'Didin', NULL, NULL, NULL, NULL, 0),
('M0007', 'IDPR02', 'E41181336', 'diiidin', NULL, NULL, NULL, NULL, 0),
('M0008', 'IDPR02', 'E41181337', 'Tweety', NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `m_kuisioner`
--

CREATE TABLE `m_kuisioner` (
  `id_kuis` varchar(11) NOT NULL,
  `id_kuisioner` varchar(20) NOT NULL,
  `id_pr` varchar(12) NOT NULL,
  `id_m` varchar(20) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_kuisioner`
--

INSERT INTO `m_kuisioner` (`id_kuis`, `id_kuisioner`, `id_pr`, `id_m`, `nilai`) VALUES
('IDQ01', 'KU0001', 'PR0001', 'M0001', 1),
('IDQ02', 'KU0002', 'PR0001', 'M0001', 2),
('IDQ03', 'KU0003', 'PR0001', 'M0001', 3),
('IDQ04', 'KU0004', 'PR0001', 'M0001', 4),
('IDQ05', 'KU0005', 'PR0001', 'M0001', 5),
('IDQ01', 'KU0001', 'PR0003', 'M0006', 1),
('IDQ02', 'KU0002', 'PR0003', 'M0006', 1),
('IDQ03', 'KU0003', 'PR0003', 'M0006', 3),
('IDQ04', 'KU0004', 'PR0003', 'M0006', 4),
('IDQ05', 'KU0005', 'PR0003', 'M0006', 5),
('IDQ01', 'KU0001', 'PR0003', 'E41181335', 3),
('IDQ02', 'KU0002', 'PR0003', 'E41181335', 1),
('IDQ03', 'KU0003', 'PR0003', 'E41181335', 2),
('IDQ04', 'KU0004', 'PR0003', 'E41181335', 5),
('IDQ05', 'KU0005', 'PR0003', 'E41181335', 3),
('IDQ01', 'KU0001', 'PR0002', 'E41181332', 5),
('IDQ02', 'KU0002', 'PR0002', 'E41181332', 4),
('IDQ03', 'KU0003', 'PR0002', 'E41181332', 4),
('IDQ04', 'KU0004', 'PR0002', 'E41181332', 1),
('IDQ05', 'KU0005', 'PR0002', 'E41181332', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `ID_PND` varchar(30) NOT NULL,
  `ID_PR` varchar(10) NOT NULL,
  `ID_DS` varchar(10) NOT NULL,
  `ID_ST` varchar(10) NOT NULL,
  `WAKTU` varchar(30) DEFAULT NULL,
  `PROPOSAL` varchar(200) DEFAULT NULL,
  `ST_PENDAFTARAN` int(11) DEFAULT NULL,
  `BUKTI` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`ID_PND`, `ID_PR`, `ID_DS`, `ID_ST`, `WAKTU`, `PROPOSAL`, `ST_PENDAFTARAN`, `BUKTI`) VALUES
('PND-E41181435', 'PR0004', 'DS001', 'ST0001', NULL, NULL, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran_klp`
--

CREATE TABLE `pendaftaran_klp` (
  `ID_PND` varchar(30) NOT NULL,
  `ID_M` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendaftaran_klp`
--

INSERT INTO `pendaftaran_klp` (`ID_PND`, `ID_M`) VALUES
('PND-E41181435', 'M0001'),
('PND-E41181435', 'M0002');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `ID_PR` varchar(10) NOT NULL,
  `ID_RT` varchar(10) NOT NULL,
  `NAMA_PR` varchar(50) DEFAULT NULL,
  `ALAMAT_PR` varchar(100) DEFAULT NULL,
  `HP_PR` varchar(20) DEFAULT NULL,
  `EMAIL_PR` varchar(30) DEFAULT NULL,
  `RATING` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`ID_PR`, `ID_RT`, `NAMA_PR`, `ALAMAT_PR`, `HP_PR`, `EMAIL_PR`, `RATING`) VALUES
('PR0001', 'RT5', 'Dinas Komunikasi, Informatika dan Persandian', 'Jl. PB. Sudirman no. 1, Patokan, Situbondo', NULL, NULL, NULL),
('PR0002', 'RT5', 'Paiton Operation & Maintenance Indonesia (POMI)', 'Jl. Raya Surabaya-Situbondo Km. 141 Paiton Probolinggo, 67291 (30 Km dari Terminal)', NULL, NULL, NULL),
('PR0003', 'RT5', 'PT. Digdaya Olah Teknologi Indonesia', 'Perumahan Permata Hijau A15, Kel. Tlogomas, Kec.Lowokwaru, Kota Malang', NULL, NULL, NULL),
('PR0004', 'RT4', 'PT. INTERMEDIA MALANG PERS (JAWA POS RADAR MALANG)', 'Jl. Kawi No 11, Kauman, Klojen, Kota Malang 65119-Malang', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `ID_PRODI` varchar(10) NOT NULL,
  `NM_PRODI` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`ID_PRODI`, `NM_PRODI`) VALUES
('IDPR01', 'Teknik Komputer'),
('IDPR02', 'Teknik Informatika'),
('IDPR03', 'Manajemen Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `ID_RT` varchar(10) NOT NULL,
  `RT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`ID_RT`, `RT`) VALUES
('RT1', 1),
('RT2', 2),
('RT3', 3),
('RT4', 4),
('RT5', 5);

-- --------------------------------------------------------

--
-- Table structure for table `rating1`
--

CREATE TABLE `rating1` (
  `id_rt` int(11) NOT NULL,
  `id_pr` varchar(11) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating1`
--

INSERT INTO `rating1` (`id_rt`, `id_pr`, `id_user`, `rating`) VALUES
(1, 'PR0003', 'ID-U42699', 4),
(2, 'PR0003', 'ID-U31104', 4),
(12, 'PR0002', 'ID-U30806', 5),
(58, 'PR0001', 'ID-U42605', 1);

-- --------------------------------------------------------

--
-- Table structure for table `status_pendaftaran`
--

CREATE TABLE `status_pendaftaran` (
  `ID_ST` varchar(10) NOT NULL,
  `NAMA_ST` varchar(50) DEFAULT NULL,
  `KETERANGAN` varchar(200) DEFAULT NULL,
  `KET_MHS` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_pendaftaran`
--

INSERT INTO `status_pendaftaran` (`ID_ST`, `NAMA_ST`, `KETERANGAN`, `KET_MHS`) VALUES
('ST0001', 'BELUM DISETUJUI', 'Ketika pertama kali mendaftar', 'Mohon tunggu persetujuan dari koordinator PKL.'),
('ST0002', 'DISETUJUI', 'Sudah mendapat persetujuan koordinator PKL, lalu mahasiswa minta surat perencanaan PKL ke admin prodi', 'Pendaftaran PKL disetujui, silakan meminta surat pengajuan PKL pada admin prodi.'),
('ST0003', 'SUDAH TERIMA SURAT PENGAJUAN PKL', NULL, ''),
('ST0004', 'DITERIMA', 'Sudah diterima melaksanakan PKL oleh suatu tempat PKL, lalu mahasiswa minta surat pelaksanaan PKL ke admin prodi', 'Harap kirim bukti penerimaan PKL lalu minta Surat Pelaksanaan PKL pada admin prodi.'),
('ST0005', 'SUDAH TERIMA SURAT PELAKSANAAN PKL', NULL, ''),
('ST0006', 'DITOLAK', 'Ditolak oleh tempat PKL', ''),
('ST0007', 'SELESAI PKL', 'mahasiswa telah selesai PKL, lalu minta ijin dibukakan fitur rating', '');

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
(5, 3, 'Management Menu', 'menu', 1),
(6, 3, 'Sub Menu Management', 'menu/submenu', 1),
(7, 1, 'Role', 'admin/role', 1),
(8, 2, 'Edit Password', 'user/edit_password', 1),
(18, 10, 'Privacy and Policy', 'pengaman/privacy_policy', 1),
(21, 6, 'Admin Program Studi', 'dosen/admin_prodi', 1),
(22, 6, 'Dosen Pembimbing & Koordinator PKL', 'dosbing', 1),
(23, 14, 'Mahasiswa', 'mahasiswa', 1),
(24, 7, 'Data Perusahaan', 'perusahaan', 1),
(25, 8, 'Data Pendaftaran', 'pendaftaran/index', 1),
(29, 18, 'Manajemen Rating', 'rating', 1),
(30, 19, 'rating_mhs', 'rating_mhs', 1),
(31, 20, 'Management Kuesioner', 'kuisioner', 1),
(32, 21, 'Data Perusahaan', 'dashboard_mahasiswa', 1),
(33, 21, 'Beranda', 'm_dashboard/beranda', 1),
(34, 2, 'Dashboard', 'user', 1),
(35, 8, 'Form Pendaftaran', 'pendaftaran/cek_pendaftaran', 1),
(36, 25, 'Mahasiswa Bimbingan', 'mhs', 1);

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

--
-- Dumping data for table `token_user`
--

INSERT INTO `token_user` (`id_token`, `email`, `token`, `date_created`) VALUES
(1, 'test1@gmail.com', 'fxu9O8xbXZ/I2F8sGkOo6xPwFH7fwuvcyaA/+804KoM=', 1591813965);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(40) NOT NULL,
  `identity` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `nama` varchar(48) NOT NULL,
  `email` varchar(48) NOT NULL,
  `image` varchar(48) NOT NULL,
  `password` varchar(64) NOT NULL,
  `about` varchar(64) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_created` int(15) NOT NULL,
  `change_pass` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `identity`, `role_id`, `nama`, `email`, `image`, `password`, `about`, `is_active`, `date_created`, `change_pass`) VALUES
('ID-U11303', '197104082001121003', 12, 'Wahyu Kurnia Dewanto, S.Kom, MT', 'alfiannsx98@gmail.com', 'default.jpg', '$2y$10$FCQgn/2Dj9dnYH.HoF6AYemCbUd6ic6MzStjQ0EwxjwuiLZosMhVS', '#', 1, 1586454565, 0),
('ID-U11305', 'E41181335', 1, 'Dindin', 'ansyah@gmail.com', '', '$2y$12$FuWJ/McrJUqhcIG9OEmtouB0B1xtL7dqqEx1/hBLSCt8BxcHPUvz.', '', 1, 0, 0),
('ID-U11306', 'E41181335', 2, 'Dindin', 'ansyah2@gmail.com', '', '$2y$12$FuWJ/McrJUqhcIG9OEmtouB0B1xtL7dqqEx1/hBLSCt8BxcHPUvz.', '', 1, 0, 0),
('ID-U11307', 'E41181335', 3, 'Dindin', 'ansyah3@gmail.com', '', '$2y$12$FuWJ/McrJUqhcIG9OEmtouB0B1xtL7dqqEx1/hBLSCt8BxcHPUvz.', '', 1, 0, 0),
('ID-U11308', 'E41181335', 4, 'Dindin', 'ansyah4@gmail.com', '', '$2y$12$FuWJ/McrJUqhcIG9OEmtouB0B1xtL7dqqEx1/hBLSCt8BxcHPUvz.', '', 1, 0, 0),
('ID-U11309', 'E41181335', 12, 'Dindin', 'ansyah12@gmail.com', '', '$2y$12$FuWJ/McrJUqhcIG9OEmtouB0B1xtL7dqqEx1/hBLSCt8BxcHPUvz.', '', 1, 0, 0),
('ID-U21104', '197808192005012001', 12, 'Ika Widiastuti, S.ST, MT', 'alfiannsx98@gmail.com', 'default.jpg', 'polijesip1586623629', '#', 0, 1586623629, 0),
('ID-U30806', 'E41181332', 2, 'test1', 'admin@admin.com', 'default.jpg', '$2y$10$9YXSEf73IKGJSlhjr..CIuVriC6/ohS.2AF0Tnc1hCdpMQ1vcHZ/y', '', 1, 1591612345, 0),
('ID-U31104', '1971040820011210032', 12, 'Ika Widiastuti, S.ST, MT', 'alfiannsx98@gmail.com', 'default.jpg', 'polijesip1586623703', '#', 0, 1586623703, 0),
('ID-U41006', 'ID-M101006', 2, 'test1', 'test1@gmail.com', 'default.jpg', '$2y$10$zFn6wXsFqIFRm31VRrhkE.tYof1fI8T0FWEUIzX/d3nD5scpwdi5e', '', 1, 1591814069, 0),
('ID-U50806', 'E41181407', 1, 'Alfian Rochmatul Irman', 'alfianrochmatul77@gmail.com', 'default.jpg', '$2y$10$JqNY.x02erU1MVtJCYfyiulSluajd8DzPafEXsnIAzySdCWFRwEim', '', 1, 1591610989, 0);

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
(1, 'Admin', 'fas fa-tachometer-alt'),
(2, 'User', 'fas fa-users'),
(3, 'Menu', 'fas fa-bars'),
(6, 'Dosen', 'fas fa-book-reader'),
(7, 'Perusahaan', 'far fa-building'),
(8, 'Pendaftaran', 'fas fa-user-plus'),
(14, 'Mahasiswa', 'fas fa-user-graduate'),
(18, 'Rating', 'fas fa-star'),
(19, 'Rating', 'fas fa-star-half-alt'),
(20, 'Kuesioner', 'fas fa-sticky-note'),
(21, 'Dashboard Mahasiswa', 'fas fa-tachometer-alt'),
(22, 'Dashboard', 'fas fa-tachometer-alt'),
(26, 'list perusahaan', 'fas fa-building'),
(27, 'mahasiswa bimbingan', 'fas fa-user-graduate');

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
(1, 'Koordinator PKL'),
(2, 'Mahasiswa'),
(3, 'Dosen Pembimbing'),
(4, 'Admin Prodi');

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
  ADD PRIMARY KEY (`ID_ADM`),
  ADD KEY `FK_BEKERJA` (`ID_PRODI`);

--
-- Indexes for table `dosbing`
--
ALTER TABLE `dosbing`
  ADD PRIMARY KEY (`ID_DS`),
  ADD KEY `FK_HOMEBASE` (`ID_PRODI`),
  ADD KEY `FK_MENJABAT_SBG` (`ID_JB`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`ID_JB`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`ID_M`),
  ADD KEY `FK_PRODII` (`ID_PRODI`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`ID_PND`),
  ADD KEY `FK_BERSTATUS` (`ID_ST`),
  ADD KEY `FK_DIPILIH` (`ID_PR`),
  ADD KEY `FK_PILIH_DS` (`ID_DS`);

--
-- Indexes for table `pendaftaran_klp`
--
ALTER TABLE `pendaftaran_klp`
  ADD PRIMARY KEY (`ID_PND`,`ID_M`),
  ADD KEY `FK_MENDAFTAR2` (`ID_M`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`ID_PR`),
  ADD KEY `FK_MEMILIKI` (`ID_RT`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`ID_PRODI`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`ID_RT`);

--
-- Indexes for table `rating1`
--
ALTER TABLE `rating1`
  ADD PRIMARY KEY (`id_rt`);

--
-- Indexes for table `status_pendaftaran`
--
ALTER TABLE `status_pendaftaran`
  ADD PRIMARY KEY (`ID_ST`);

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
  MODIFY `id_access_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `rating1`
--
ALTER TABLE `rating1`
  MODIFY `id_rt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `submenu_user`
--
ALTER TABLE `submenu_user`
  MODIFY `id_submenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `token_user`
--
ALTER TABLE `token_user`
  MODIFY `id_token` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_prodi`
--
ALTER TABLE `admin_prodi`
  ADD CONSTRAINT `FK_BEKERJA` FOREIGN KEY (`ID_PRODI`) REFERENCES `prodi` (`ID_PRODI`);

--
-- Constraints for table `dosbing`
--
ALTER TABLE `dosbing`
  ADD CONSTRAINT `FK_HOMEBASE` FOREIGN KEY (`ID_PRODI`) REFERENCES `prodi` (`ID_PRODI`),
  ADD CONSTRAINT `FK_MENJABAT_SBG` FOREIGN KEY (`ID_JB`) REFERENCES `jabatan` (`ID_JB`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `FK_PRODII` FOREIGN KEY (`ID_PRODI`) REFERENCES `prodi` (`ID_PRODI`);

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `FK_BERSTATUS` FOREIGN KEY (`ID_ST`) REFERENCES `status_pendaftaran` (`ID_ST`),
  ADD CONSTRAINT `FK_DIPILIH` FOREIGN KEY (`ID_PR`) REFERENCES `perusahaan` (`ID_PR`),
  ADD CONSTRAINT `FK_PILIH_DS` FOREIGN KEY (`ID_DS`) REFERENCES `dosbing` (`ID_DS`);

--
-- Constraints for table `pendaftaran_klp`
--
ALTER TABLE `pendaftaran_klp`
  ADD CONSTRAINT `FK_MENDAFTAR` FOREIGN KEY (`ID_PND`) REFERENCES `pendaftaran` (`ID_PND`),
  ADD CONSTRAINT `FK_MENDAFTAR2` FOREIGN KEY (`ID_M`) REFERENCES `mahasiswa` (`ID_M`);

--
-- Constraints for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD CONSTRAINT `FK_MEMILIKI` FOREIGN KEY (`ID_RT`) REFERENCES `rating` (`ID_RT`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
