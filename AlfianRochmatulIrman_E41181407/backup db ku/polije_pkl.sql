-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Apr 2020 pada 06.05
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
(32, 1, 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_prodi`
--

CREATE TABLE `admin_prodi` (
  `ID_ADM` char(10) NOT NULL,
  `NIP_ADM` varchar(20) DEFAULT NULL,
  `NAMA_ADM` varchar(50) DEFAULT NULL,
  `JK_ADM` varchar(10) DEFAULT NULL,
  `ALAMAT_ADM` varchar(100) DEFAULT NULL,
  `HP_ADM` varchar(20) DEFAULT NULL,
  `PRODI_ADM` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin_prodi`
--

INSERT INTO `admin_prodi` (`ID_ADM`, `NIP_ADM`, `NAMA_ADM`, `JK_ADM`, `ALAMAT_ADM`, `HP_ADM`, `PRODI_ADM`) VALUES
('ADM0125', '197104082001121003', 'Wahyu Kurnia Dewanto, S.Kom, MT', 'Laki-Laki', 'Perumahan Kaliurang Cluster B1 Jember', '082394271238', 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `akses_user`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `akses_user` (
`id_access_menu` int(11)
,`role_id` int(11)
,`menu_id` int(32)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosbing`
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
-- Struktur dari tabel `kelompok`
--

CREATE TABLE `kelompok` (
  `ID_KLP` char(10) NOT NULL,
  `NIM_KLP` varchar(20) DEFAULT NULL,
  `NAMA_KLP` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `ID_M` char(10) NOT NULL,
  `NIM` varchar(20) DEFAULT NULL,
  `NAMA_M` varchar(50) DEFAULT NULL,
  `JK_M` varchar(10) DEFAULT NULL,
  `PRODI_M` varchar(30) DEFAULT NULL,
  `SMT` char(5) DEFAULT NULL,
  `ALAMAT_M` varchar(100) DEFAULT NULL,
  `HP_M` varchar(20) DEFAULT NULL,
  `EMAIL_M` varchar(30) DEFAULT NULL,
  `PASSWORD_M` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`ID_M`, `NIM`, `NAMA_M`, `JK_M`, `PRODI_M`, `SMT`, `ALAMAT_M`, `HP_M`, `EMAIL_M`, `PASSWORD_M`) VALUES
('ID-M00604', 'E41232323', 'Alfian Rochmatul Irman', 'Laki-laki', ' D3-Teknik  ', ' 5', ' ok di jember ', '081252223124', 'garmayunanto@gmail.coma', '$2y$10$AWm5ghuf9yu1eEfrw0Pbf.c/7iuFmLe4HikSGvjPOse'),
('ID-M10804', 'E41283912', 'asdokwad', NULL, 'D3-Teknik Komputer', '5', 'keja', '2131232132312', 'alfianrochmatul77a@gmail.com', '$2y$10$fm3QMBCpQHGL4TlDRlaX9ObKE7JAM6bSwxXmSx8yhmq');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
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
('ID-P02804', 'sad', 'asdasdds', '129293', 'asdl@gmail.com', 'Bintang 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id_pr` varchar(15) NOT NULL,
  `nama_pr` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id_pr`, `nama_pr`) VALUES
('IDPR01', 'Teknik Komputer'),
('IDPR02', 'Teknik Informatika'),
('IDPR03', 'Manajemen Informatika');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `submenu`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `submenu` (
`id_submenu` int(11)
,`menu_id` int(11)
,`title` varchar(128)
,`url` varchar(128)
,`is_active` int(11)
);

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
(25, 8, 'pendaftaran_coba', 'pendaftaran/coba', 1);

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
(14, 'mahasiswa', 'fas fa-user-graduate');

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
(2, 'Operator'),
(3, 'Dosen'),
(4, 'Dosen Pengampu PKL'),
(12, 'Mahasiswa');

-- --------------------------------------------------------

--
-- Struktur untuk view `akses_user`
--
DROP TABLE IF EXISTS `akses_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `akses_user`  AS  select `access_user`.`id_access_menu` AS `id_access_menu`,`access_user`.`role_id` AS `role_id`,`access_user`.`menu_id` AS `menu_id` from `access_user` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `submenu`
--
DROP TABLE IF EXISTS `submenu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `submenu`  AS  select `submenu_user`.`id_submenu` AS `id_submenu`,`submenu_user`.`menu_id` AS `menu_id`,`submenu_user`.`title` AS `title`,`submenu_user`.`url` AS `url`,`submenu_user`.`is_active` AS `is_active` from `submenu_user` ;

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
  ADD PRIMARY KEY (`ID_ADM`);

--
-- Indeks untuk tabel `dosbing`
--
ALTER TABLE `dosbing`
  ADD PRIMARY KEY (`ID_DS`);

--
-- Indeks untuk tabel `kelompok`
--
ALTER TABLE `kelompok`
  ADD PRIMARY KEY (`ID_KLP`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`ID_M`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`ID_PND`),
  ADD KEY `FK_RELATIONSHIP_1` (`ID_PR`),
  ADD KEY `FK_RELATIONSHIP_2` (`ID_ADM`),
  ADD KEY `FK_RELATIONSHIP_3` (`ID_M`),
  ADD KEY `FK_RELATIONSHIP_4` (`ID_DS`);

--
-- Indeks untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`ID_PR`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_pr`);

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
  MODIFY `id_access_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `submenu_user`
--
ALTER TABLE `submenu_user`
  MODIFY `id_submenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `token_user`
--
ALTER TABLE `token_user`
  MODIFY `id_token` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pendaftaran`
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
