-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jun 2020 pada 22.07
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
(29, 1, 18),
(31, 2, 19),
(32, 2, 8),
(33, 1, 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_prodi`
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
-- Dumping data untuk tabel `admin_prodi`
--

INSERT INTO `admin_prodi` (`ID_ADM`, `ID_PRODI`, `NIP_ADM`, `NAMA_ADM`, `JK_ADM`, `ALAMAT_ADM`, `HP_ADM`) VALUES
('ADM0145', 'IDPR02', 'asdsdadsa', 'irman', 'Laki-Laki', 'Kediri', '81252223114');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bulan`
--

CREATE TABLE `bulan` (
  `ID_BL` char(10) NOT NULL,
  `BL` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bulan`
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
-- Struktur dari tabel `dosbing`
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
-- Dumping data untuk tabel `dosbing`
--

INSERT INTO `dosbing` (`ID_DS`, `ID_PRODI`, `ID_JB`, `NIP_DS`, `NAMA_DS`, `JK_DS`, `ALAMAT_DS`, `HP_DS`) VALUES
('DS001', 'IDPR02', 'JB0001', NULL, 'Mohammad Ainun A', NULL, NULL, NULL),
('DS002', 'IDPR02', 'JB0003', NULL, 'Ardiansyah', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `ID_JB` varchar(10) NOT NULL,
  `NM_JB` varchar(30) DEFAULT NULL,
  `ST_JB` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`ID_JB`, `NM_JB`, `ST_JB`) VALUES
('JB0001', 'Koordinator PKL', 1),
('JB0002', 'Admin Prodi', 0),
('JB0003', 'Dosen', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuisioner`
--

CREATE TABLE `kuisioner` (
  `id_kuisioner` varchar(20) NOT NULL,
  `kuisioner` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kuisioner`
--

INSERT INTO `kuisioner` (`id_kuisioner`, `kuisioner`) VALUES
('KU0001', 'Penilaian Anda terhadap Pembelajaran di'),
('KU0002', 'Penilaian Anda Tugas di'),
('KU0003', 'Penilaian Anda kesesuaian kerja di'),
('KU0004', 'Penilaian Anda Penempatan di'),
('KU0005', 'Penilaian Anda terhadap keloyalan di ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
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
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`ID_M`, `ID_PRODI`, `NIM`, `NAMA_M`, `JK_M`, `SMT`, `ALAMAT_M`, `HP_M`, `ST_KETUA`) VALUES
('E41181330', 'IDPR02', 'E41181330', 'Mohammad', NULL, NULL, NULL, NULL, 1),
('E41181331', 'IDPR02', 'E41181331', 'Ainun', NULL, NULL, NULL, NULL, 0),
('E41181332', 'IDPR02', 'E41181332', 'Ardiansyah', NULL, NULL, NULL, NULL, 1),
('E41181333', 'IDPR02', 'E41181333', 'Ansyah', NULL, NULL, NULL, NULL, 0),
('E41181334', 'IDPR02', 'E41181334', 'Didin', NULL, NULL, NULL, NULL, 1),
('E41181335', 'IDPR02', 'E41181335', 'Dindin', NULL, NULL, NULL, NULL, 0),
('E41181336', 'IDPR02', 'E41181336', 'diiidin', NULL, NULL, NULL, NULL, 1),
('E41181337', 'IDPR02', 'E41181337', 'Tweety', NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_kuisioner`
--

CREATE TABLE `m_kuisioner` (
  `id_kuis` varchar(11) NOT NULL,
  `id_kuisioner` varchar(20) NOT NULL,
  `id_pr` varchar(12) NOT NULL,
  `id_m` varchar(20) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_kuisioner`
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
('IDQ05', 'KU0005', 'PR0003', 'E41181335', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `ID_PND` varchar(20) NOT NULL,
  `ID_PR` varchar(10) NOT NULL,
  `ID_DS` varchar(10) NOT NULL,
  `WAKTU` varchar(30) DEFAULT NULL,
  `PROPOSAL` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`ID_PND`, `ID_PR`, `ID_DS`, `WAKTU`, `PROPOSAL`) VALUES
('PND0001', 'PR0001', 'DS002', NULL, ''),
('PND0002', 'PR0002', 'DS001', NULL, ''),
('PND0003', 'PR0003', 'DS001', NULL, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran_klp`
--

CREATE TABLE `pendaftaran_klp` (
  `ID_PND` varchar(10) NOT NULL,
  `ID_M` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pendaftaran_klp`
--

INSERT INTO `pendaftaran_klp` (`ID_PND`, `ID_M`) VALUES
('PND0001', 'E41181330'),
('PND0001', 'E41181331'),
('PND0002', 'E41181332'),
('PND0002', 'E41181333'),
('PND0003', 'E41181334'),
('PND0003', 'E41181335');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `ID_PR` varchar(10) NOT NULL,
  `NAMA_PR` varchar(50) DEFAULT NULL,
  `ALAMAT_PR` varchar(100) DEFAULT NULL,
  `HP_PR` varchar(20) DEFAULT NULL,
  `EMAIL_PR` varchar(30) DEFAULT NULL,
  `gambar` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`ID_PR`, `NAMA_PR`, `ALAMAT_PR`, `HP_PR`, `EMAIL_PR`, `gambar`) VALUES
('PR0001', 'Dinas Komunikasi, Informatika dan Persandian', 'Jl. PB. Sudirman no. 1, Patokan, Situbondo', '111111111111', 'asd@gmail.coma', '3d2ec22f1a7a4a06faf19dac5d363c5b5.jpg'),
('PR0002', 'Paiton Operation & Maintenance Indonesia (POMI)', 'Jl. Raya Surabaya-Situbondo Km. 141 Paiton Probolinggo, 67291 (30 Km dari Terminal)', '111111111111', 'asd@gmail.com', '0_85df2132-8a05-4ce8-84bb-545345760d54_387_5161.jpg'),
('PR0003', 'PT. Digdaya Olah Teknologi Indonesia', 'Perumahan Permata Hijau A15, Kel. Tlogomas, Kec.Lowokwaru, Kota Malang', '111111111111', 'asd@gmail.com', '3d2ec22f1a7a4a06faf19dac5d363c5b6.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `ID_PRODI` varchar(10) NOT NULL,
  `NM_PRODI` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`ID_PRODI`, `NM_PRODI`) VALUES
('IDPR01', 'Teknik Komputer'),
('IDPR02', 'Teknik Informatika'),
('IDPR03', 'Manajemen Informatik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating`
--

CREATE TABLE `rating` (
  `ID_RT` char(10) NOT NULL,
  `RT` int(11) DEFAULT NULL,
  `nama_rating` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rating`
--

INSERT INTO `rating` (`ID_RT`, `RT`, `nama_rating`) VALUES
('RT1', 1, 'Tidak Baik'),
('RT2', 2, 'Kurang Baik'),
('RT3', 3, 'Cukup'),
('RT4', 4, 'Baik'),
('RT5', 5, 'Sangat Baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating1`
--

CREATE TABLE `rating1` (
  `id_rt` int(11) NOT NULL,
  `id_pr` varchar(11) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rating1`
--

INSERT INTO `rating1` (`id_rt`, `id_pr`, `id_user`, `rating`) VALUES
(58, 'PR0001', 'ID-U42605', 1),
(59, 'PR0003', 'ID-U42699', 4),
(0, 'PR0003', 'ID-U31104', 4);

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
(22, 6, 'Dosen Pembimbing & Koordinator PKL', 'dosbing', 1),
(23, 14, 'Mahasiswa', 'mahasiswa', 1),
(24, 7, 'Data Perusahaan', 'perusahaan', 1),
(25, 8, 'Data Pendaftaran', 'pendaftaran/index', 1),
(26, 8, 'coba', 'pendaftaran/coba', 1),
(27, 8, 'Form Pendaftaran', 'pendaftaran/tambah_data', 1),
(28, 8, 'cari', 'pendaftaran/c_cari', 1),
(29, 18, 'Manajemen Rating', 'rating', 1),
(30, 19, 'rating_mhs', 'rating_mhs', 1),
(31, 20, 'Management Kuisioner', 'kuisioner', 1);

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
('ID-U11302', 'E41181407', 'Alfian Rochmatul Irman', 'alfianrochmatul77@gmail.com', '3d2ec22f1a7a4a06faf19dac5d363c5b2.jpg', '$2y$10$j1Ys.JOZ50HFqdw870GPieIQx76nC712slDkG12/bHeGxHMPIiQDG', 'Wani Tok! yoto', 1, 1, 1583394165, 1586009053),
('ID-U11303', '197104082001121003', 'Wahyu Kurnia Dewanto, S.Kom, MT', 'alfiannsx98@gmail.com', 'default.jpg', '$2y$10$FCQgn/2Dj9dnYH.HoF6AYemCbUd6ic6MzStjQ0EwxjwuiLZosMhVS', '#', 12, 1, 1586454565, 0),
('ID-U11305', 'E41181335', 'Mohammad Ainun Ardiansyah', 'ansyah@gmail.com', '', '$2y$12$FuWJ/McrJUqhcIG9OEmtouB0B1xtL7dqqEx1/hBLSCt8BxcHPUvz.', '', 1, 1, 0, 0),
('ID-U21104', '197808192005012001', 'Ika Widiastuti, S.ST, MT', 'alfiannsx98@gmail.com', 'default.jpg', 'polijesip1586623629', '#', 12, 0, 1586623629, 0),
('ID-U31104', 'E41181335', 'Ika Widiastuti, S.ST, MT', 'admin@admin.com', 'default.jpg', '$2y$10$j1Ys.JOZ50HFqdw870GPieIQx76nC712slDkG12/bHeGxHMPIiQDG', '#', 2, 1, 1586623703, 0);

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
(18, 'rating', 'fas fa-star'),
(19, 'rating_mhs', 'fas fa-star-half-alt'),
(20, 'kuisioner', 'fas fa-sticky-note');

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

--
-- Indexes for dumped tables
--

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
  ADD KEY `FK_HOMEBASE` (`ID_PRODI`),
  ADD KEY `FK_MENJABAT_SBG` (`ID_JB`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`ID_JB`);

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
-- Indeks untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`ID_RT`);

--
-- Indeks untuk tabel `submenu_user`
--
ALTER TABLE `submenu_user`
  ADD PRIMARY KEY (`id_submenu`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `submenu_user`
--
ALTER TABLE `submenu_user`
  MODIFY `id_submenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
  ADD CONSTRAINT `FK_HOMEBASE` FOREIGN KEY (`ID_PRODI`) REFERENCES `prodi` (`ID_PRODI`),
  ADD CONSTRAINT `FK_MENJABAT_SBG` FOREIGN KEY (`ID_JB`) REFERENCES `jabatan` (`ID_JB`);

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
