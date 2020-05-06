-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Bulan Mei 2020 pada 09.45
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

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
-- Struktur dari tabel `access_user`
--

CREATE TABLE `access_user` (
  `id_access_menu` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `access_user`
--

INSERT INTO `access_user` (`id_access_menu`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(7, 2, 3),
(8, 2, 2),
(9, 3, 2),
(10, 4, 2),
(16, 1, 6),
(17, 1, 7),
(18, 1, 8),
(22, 1, 10),
(24, 12, 2),
(25, 12, 7),
(26, 12, 8),
(28, 1, 14),
(29, 2, 18);

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_prodi`
--

CREATE TABLE `admin_prodi` (
  `ID_ADM` char(10) NOT NULL,
  `ID_PRODI` char(10) NOT NULL,
  `NIP_ADM` varchar(20) DEFAULT NULL,
  `NAMA_ADM` varchar(50) DEFAULT NULL,
  `JK_ADM` varchar(10) DEFAULT NULL,
  `ALAMAT_ADM` varchar(100) DEFAULT NULL,
  `HP_ADM` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin_prodi`
--

INSERT INTO `admin_prodi` (`ID_ADM`, `ID_PRODI`, `NIP_ADM`, `NAMA_ADM`, `JK_ADM`, `ALAMAT_ADM`, `HP_ADM`) VALUES
('ADM0125', 'IDPR02', '197104082001121003', 'Wahyu Kurnia Dewanto, S.Kom, MT', 'Laki-Laki', 'Perumahan Kaliurang Cluster B1 Jember', '082394271238');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosbing`
--

CREATE TABLE `dosbing` (
  `ID_DS` char(10) NOT NULL,
  `ID_PRODI` char(10) NOT NULL,
  `NIP_DS` varchar(20) DEFAULT NULL,
  `NAMA_DS` varchar(50) DEFAULT NULL,
  `JK_DS` varchar(10) DEFAULT NULL,
  `ALAMAT_DS` varchar(100) DEFAULT NULL,
  `HP_DS` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosbing`
--

INSERT INTO `dosbing` (`ID_DS`, `ID_PRODI`, `NIP_DS`, `NAMA_DS`, `JK_DS`, `ALAMAT_DS`, `HP_DS`) VALUES
('DS001', 'IDPR02', NULL, 'Mohammad Ainun A', NULL, NULL, NULL),
('DS002', 'IDPR02', NULL, 'Ardiansyah', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `ID_M` char(10) NOT NULL,
  `ID_PRODI` char(10) NOT NULL,
  `NIM` varchar(20) DEFAULT NULL,
  `NAMA_M` varchar(50) DEFAULT NULL,
  `JK_M` varchar(10) DEFAULT NULL,
  `SMT` char(5) DEFAULT NULL,
  `ALAMAT_M` varchar(100) DEFAULT NULL,
  `HP_M` varchar(20) DEFAULT NULL,
  `ST_KETUA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`ID_M`, `ID_PRODI`, `NIM`, `NAMA_M`, `JK_M`, `SMT`, `ALAMAT_M`, `HP_M`, `ST_KETUA`) VALUES
('M0001', 'IDPR02', NULL, 'Mohammad', NULL, NULL, NULL, NULL, 1),
('M0002', 'IDPR02', NULL, 'Ainun', NULL, NULL, NULL, NULL, 0),
('M0003', 'IDPR02', NULL, 'Ardiansyah', NULL, NULL, NULL, NULL, 1),
('M0004', 'IDPR02', NULL, 'Ansyah', NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `ID_PND` char(10) NOT NULL,
  `ID_PR` char(10) NOT NULL,
  `ID_DS` char(10) NOT NULL,
  `ID_ADM` char(10) NOT NULL,
  `WAKTU` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`ID_PND`, `ID_PR`, `ID_DS`, `ID_ADM`, `WAKTU`) VALUES
('PND0001', 'PR0001', 'DS002', 'ADM0125', NULL),
('PND0002', 'PR0002', 'DS001', 'ADM0125', NULL),
('PND0003', 'PR0003', 'DS001', 'ADM0125', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran_klp`
--

CREATE TABLE `pendaftaran_klp` (
  `ID_PND` char(10) NOT NULL,
  `ID_M` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
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
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`ID_PR`, `NAMA_PR`, `ALAMAT_PR`, `HP_PR`, `EMAIL_PR`, `RATING`) VALUES
('PR0001', 'Dinas Komunikasi, Informatika dan Persandian', 'Jl. PB. Sudirman no. 1, Patokan, Situbondo', NULL, NULL, NULL),
('PR0002', 'Paiton Operation & Maintenance Indonesia (POMI)', 'Jl. Raya Surabaya-Situbondo Km. 141 Paiton Probolinggo, 67291 (30 Km dari Terminal)', NULL, NULL, NULL),
('PR0003', 'PT. Digdaya Olah Teknologi Indonesia', 'Perumahan Permata Hijau A15, Kel. Tlogomas, Kec.Lowokwaru, Kota Malang', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `ID_PRODI` char(10) NOT NULL,
  `NM_PRODI` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`ID_PRODI`, `NM_PRODI`) VALUES
('IDPR01', 'Teknik Komputer'),
('IDPR02', 'Teknik Informatika'),
('IDPR03', 'Manajemen Informatik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `submenu_user`
--

CREATE TABLE `submenu_user` (
  `id_submenu` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `submenu_user`
--

INSERT INTO `submenu_user` (`id_submenu`, `menu_id`, `title`, `url`, `is_active`) VALUES
(2, 1, 'Dashboard', 'admin', 1),
(3, 2, 'My Profile', 'user', 1),
(4, 2, 'Edit Profile', 'user/edit', 1),
(5, 3, 'Management Menu', 'menu', 1),
(6, 3, 'Sub Menu Management', 'menu/submenu', 1),
(7, 1, 'Role', 'admin/role', 1),
(8, 2, 'Edit Password', 'user/edit_password', 1),
(9, 4, 'Car Data', 'transaksi/mobil', 1),
(10, 0, 'Data Mobil', 'cms', 1),
(18, 10, 'Privacy and Policy', 'pengaman/privacy_policy', 1),
(21, 6, 'Admin Program Studi', 'dosen/admin_prodi', 1),
(22, 6, 'Dosen Pembimbing', 'dosen/dosbing', 1),
(23, 14, 'Mahasiswa', 'mahasiswa', 1),
(24, 7, 'Data Perusahaan', 'perusahaan', 1),
(25, 8, 'Data Pendaftaran', 'pendaftaran/index', 1),
(26, 8, 'Form Pendaftaran', 'pendaftaran/coba', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `token_user`
--

CREATE TABLE `token_user` (
  `id_token` int(15) NOT NULL,
  `email` varchar(64) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `token_user`
--

INSERT INTO `token_user` (`id_token`, `email`, `token`, `date_created`) VALUES
(2, 'garmayunanto@gmail.com', 'MTSf+G8KXloij9IZO3/3XTZ9sitk2FPtT66WIfG/arw=', 1586163599),
(3, '1asd@gasd.com', 'EiASNHAw2QOsfJtL0aOUeofH4ivmk7FqjJyA5+eIcuU=', 1586163866),
(4, 'garmayunanto@gmail.com', 'FM7qIeYgU48ruMrjjiKuqIhjXy3dl1aqrZV5FCIg0M8=', 1586164022),
(11, 'alfianrochmatul77@gmail.com', 'x9zmbVoPr/9HOvZHZDa9XX29QRZeP4KQIzc1lCPtSDw=', 1586283804),
(23, 'asd@gmail.comaaad', 'Ut+9OjK92usRj/iblyj164I9ocB3REU0fkJomN+nMFA=', 1586332678),
(27, 'alfianrochmatul77a@gmail.com', '9x/Av2CNZhK/Gk5EljTXYYxkPn0ybWoLl1xkFtV1r84=', 1586333564),
(28, 'wahyu.k.dewanto@gmail.com', 'd20nCt4G2+onu1BdUmSjGtJ8QVCczfGt9WtfBmOGZaY=', 1586454477),
(31, 'okok@gmail.com', '2rqt+hctL/X93KXdCG7ZDkBgNxcygnWnBO2DkY1Zps4=', 1586456126),
(32, 'alfiannsx0@gmail.com', 'Ba/leDy4AH6bz323F33WF+iv5zmbUaqoFRsVa0E7Qpk=', 1586621316),
(33, 'alfiannsx98@gmail.com', 'XLTCRQrM37QFIirZXLdUfSuNNhLvPXm73GPjNaCTfhg=', 1586623520),
(34, 'alfiannsx98@gmail.com', 'GglJqjKgjHrS3Wq9ECU41eNnhErTsiw8bQVPZpI0Pck=', 1586623629),
(35, 'alfiannsx98@gmail.com', 'NFf9EqTdUupIj1TO4mtsgkEZszGmghTgoGj8FRxUlCM=', 1586623703),
(36, 'alfiannsx98@gmail.com', 'CULowsT3Uh8taMGhz/qGb4nbduCInBfn3zOWUdPLiTg=', 1586623769),
(37, 'alfianrochmatul77@gmail.com', 'Ra73V/ksUW7k0etlZFwxG2FsVsEddVa0bHTGEeykzb4=', 1586876811),
(38, 'alfianrochmatul77@gmail.com', 'Ziy+To6IG6EhSxykvgjkb7GKWuhDC4QPSe08FFkT/CU=', 1586876863),
(39, 'alfianrochmatul77@gmail.com', 'iI2hoxkR0PyrtGl1qIPJ0lTSSz129rN+Etd6K90HoFM=', 1586878359),
(40, 'alfianrochmatul77@gmail.com', 'OtjepvOsLluQzuQ0RnIFX5CULMK208Ti+P2SNomEUiE=', 1586917435);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(40) NOT NULL,
  `identity` varchar(50) NOT NULL,
  `nama` varchar(48) NOT NULL,
  `email` varchar(48) NOT NULL,
  `image` varchar(48) NOT NULL,
  `password` varchar(64) NOT NULL,
  `about` varchar(64) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_created` int(15) NOT NULL,
  `change_pass` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `identity`, `nama`, `email`, `image`, `password`, `about`, `role_id`, `is_active`, `date_created`, `change_pass`) VALUES
('ID-U11302', 'E41181407', 'Alfian Rochmatul Irman', 'alfianrochmatul77@gmail.com', 'IMG-20191005-WA0011.jpg', '$2y$10$gya13BhrOdZCscdixis8SuPSrjYw70DuwVJ.MUSBTxvmAopl2.b7m', 'Wani Tok! yoto', 1, 1, 1583394165, 1586009053),
('ID-U11303', '197104082001121003', 'Wahyu Kurnia Dewanto, S.Kom, MT', 'alfiannsx98@gmail.com', 'default.jpg', '$2y$10$FCQgn/2Dj9dnYH.HoF6AYemCbUd6ic6MzStjQ0EwxjwuiLZosMhVS', '#', 12, 1, 1586454565, 0),
('ID-U11305', 'E41181335', 'Mohammad Ainun Ardiansyah', 'ansyah@gmail.com', '', '$2y$12$FuWJ/McrJUqhcIG9OEmtouB0B1xtL7dqqEx1/hBLSCt8BxcHPUvz.', '', 1, 1, 0, 0),
('ID-U21104', '197808192005012001', 'Ika Widiastuti, S.ST, MT', 'alfiannsx98@gmail.com', 'default.jpg', 'polijesip1586623629', '#', 12, 0, 1586623629, 0),
('ID-U31104', '1971040820011210032', 'Ika Widiastuti, S.ST, MT', 'alfiannsx98@gmail.com', 'default.jpg', 'polijesip1586623703', '#', 12, 0, 1586623703, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id_menu` int(11) NOT NULL,
  `menu` varchar(32) NOT NULL,
  `icon` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id_menu`, `menu`, `icon`) VALUES
(1, 'admin', 'fas fa-tachometer-alt'),
(2, 'user', 'fas fa-users'),
(3, 'menu', 'fas fa-bars'),
(6, 'dosen', 'fas fa-book-reader'),
(7, 'perusahaan', 'far fa-building'),
(8, 'pendaftaran', 'fas fa-user-plus'),
(14, 'mahasiswa', 'fas fa-user-graduate'),
(18, 'dashboard mahasiswa', 'fas fa-tachometer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id_role`, `role`) VALUES
(1, 'Admin'),
(2, 'Mahasiswa'),
(3, 'Dosen'),
(4, 'Dosen Pengampu PKL'),
(12, 'Admin Prodi');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_daftar_pkl`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_daftar_pkl` (
`ID_PND` char(10)
,`NAMA_PR` varchar(50)
,`NAMA_DS` varchar(50)
,`NAMA_M` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_kelompok`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_kelompok` (
`ID_PND` char(10)
,`ID_M` char(10)
,`NAMA_M` varchar(50)
,`ST_KETUA` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_tampil_detail`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_tampil_detail` (
`ID_PND` char(10)
,`ID_PR` char(10)
,`NAMA_PR` varchar(50)
,`ALAMAT_PR` varchar(100)
,`NAMA_DS` varchar(50)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_daftar_pkl`
--
DROP TABLE IF EXISTS `view_daftar_pkl`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_daftar_pkl`  AS  select `pendaftaran`.`ID_PND` AS `ID_PND`,`perusahaan`.`NAMA_PR` AS `NAMA_PR`,`dosbing`.`NAMA_DS` AS `NAMA_DS`,`mahasiswa`.`NAMA_M` AS `NAMA_M` from ((((`pendaftaran` join `perusahaan`) join `dosbing`) join `mahasiswa`) join `pendaftaran_klp`) where `pendaftaran`.`ID_PR` = `perusahaan`.`ID_PR` and `pendaftaran`.`ID_DS` = `dosbing`.`ID_DS` and `pendaftaran`.`ID_PND` = `pendaftaran_klp`.`ID_PND` and `pendaftaran_klp`.`ID_M` = `mahasiswa`.`ID_M` and `mahasiswa`.`ST_KETUA` = 1 ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_kelompok`
--
DROP TABLE IF EXISTS `view_kelompok`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_kelompok`  AS  select `pendaftaran_klp`.`ID_PND` AS `ID_PND`,`pendaftaran_klp`.`ID_M` AS `ID_M`,`mahasiswa`.`NAMA_M` AS `NAMA_M`,`mahasiswa`.`ST_KETUA` AS `ST_KETUA` from (`pendaftaran_klp` join `mahasiswa`) where `pendaftaran_klp`.`ID_M` = `mahasiswa`.`ID_M` and `pendaftaran_klp`.`ID_PND` = 'pnd1' ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_tampil_detail`
--
DROP TABLE IF EXISTS `view_tampil_detail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_tampil_detail`  AS  select `pendaftaran`.`ID_PND` AS `ID_PND`,`pendaftaran`.`ID_PR` AS `ID_PR`,`perusahaan`.`NAMA_PR` AS `NAMA_PR`,`perusahaan`.`ALAMAT_PR` AS `ALAMAT_PR`,`dosbing`.`NAMA_DS` AS `NAMA_DS` from ((`pendaftaran` join `perusahaan`) join `dosbing`) where `pendaftaran`.`ID_PR` = `perusahaan`.`ID_PR` and `pendaftaran`.`ID_DS` = `dosbing`.`ID_DS` and `pendaftaran`.`ID_PND` = 'pnd1' ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `access_user`
--
ALTER TABLE `access_user`
  ADD PRIMARY KEY (`id_access_menu`);

--
-- Indeks untuk tabel `admin_prodi`
--
ALTER TABLE `admin_prodi`
  ADD PRIMARY KEY (`ID_ADM`),
  ADD KEY `FK_BEKERJA` (`ID_PRODI`);

--
-- Indeks untuk tabel `dosbing`
--
ALTER TABLE `dosbing`
  ADD PRIMARY KEY (`ID_DS`),
  ADD KEY `FK_HOMEBASE` (`ID_PRODI`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`ID_M`),
  ADD KEY `FK_PRODII` (`ID_PRODI`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`ID_PND`),
  ADD KEY `FK_DIPILIH` (`ID_PR`),
  ADD KEY `FK_MENERIMA` (`ID_ADM`),
  ADD KEY `FK_PILIH_DS` (`ID_DS`);

--
-- Indeks untuk tabel `pendaftaran_klp`
--
ALTER TABLE `pendaftaran_klp`
  ADD PRIMARY KEY (`ID_PND`,`ID_M`),
  ADD KEY `FK_MENDAFTAR2` (`ID_M`);

--
-- Indeks untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`ID_PR`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`ID_PRODI`);

--
-- Indeks untuk tabel `submenu_user`
--
ALTER TABLE `submenu_user`
  ADD PRIMARY KEY (`id_submenu`);

--
-- Indeks untuk tabel `token_user`
--
ALTER TABLE `token_user`
  ADD PRIMARY KEY (`id_token`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `access_user`
--
ALTER TABLE `access_user`
  MODIFY `id_access_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `submenu_user`
--
ALTER TABLE `submenu_user`
  MODIFY `id_submenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `token_user`
--
ALTER TABLE `token_user`
  MODIFY `id_token` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `admin_prodi`
--
ALTER TABLE `admin_prodi`
  ADD CONSTRAINT `FK_BEKERJA` FOREIGN KEY (`ID_PRODI`) REFERENCES `prodi` (`ID_PRODI`);

--
-- Ketidakleluasaan untuk tabel `dosbing`
--
ALTER TABLE `dosbing`
  ADD CONSTRAINT `FK_HOMEBASE` FOREIGN KEY (`ID_PRODI`) REFERENCES `prodi` (`ID_PRODI`);

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `FK_PRODII` FOREIGN KEY (`ID_PRODI`) REFERENCES `prodi` (`ID_PRODI`);

--
-- Ketidakleluasaan untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `FK_DIPILIH` FOREIGN KEY (`ID_PR`) REFERENCES `perusahaan` (`ID_PR`),
  ADD CONSTRAINT `FK_MENERIMA` FOREIGN KEY (`ID_ADM`) REFERENCES `admin_prodi` (`ID_ADM`),
  ADD CONSTRAINT `FK_PILIH_DS` FOREIGN KEY (`ID_DS`) REFERENCES `dosbing` (`ID_DS`);

--
-- Ketidakleluasaan untuk tabel `pendaftaran_klp`
--
ALTER TABLE `pendaftaran_klp`
  ADD CONSTRAINT `FK_MENDAFTAR` FOREIGN KEY (`ID_PND`) REFERENCES `pendaftaran` (`ID_PND`),
  ADD CONSTRAINT `FK_MENDAFTAR2` FOREIGN KEY (`ID_M`) REFERENCES `mahasiswa` (`ID_M`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
