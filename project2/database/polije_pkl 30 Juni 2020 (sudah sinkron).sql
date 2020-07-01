-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jun 2020 pada 03.39
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

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
(16, 1, 6),
(17, 1, 7),
(18, 1, 8),
(28, 1, 14),
(44, 1, 18),
(33, 1, 20),
(62, 1, 29),
(8, 2, 2),
(40, 2, 8),
(31, 2, 19),
(59, 2, 23),
(9, 3, 2),
(49, 3, 8),
(50, 3, 23),
(48, 3, 25),
(24, 12, 2),
(58, 12, 8),
(55, 13, 2),
(54, 13, 8),
(57, 13, 18),
(56, 13, 20),
(51, 13, 25);

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
-- Struktur dari tabel `logbook`
--

CREATE TABLE `logbook` (
  `id_logbook` varchar(40) NOT NULL,
  `id_mahasiswa` varchar(20) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `uraian` varchar(70) NOT NULL,
  `progress` varchar(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `logbook`
--

INSERT INTO `logbook` (`id_logbook`, `id_mahasiswa`, `judul`, `uraian`, `progress`, `tanggal`) VALUES
('ID-LB229022', 'E41181407', 'oklahomas', 'dassdasd', 'asd', '2020-02-11');

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
('IDQ05', 'KU0005', 'PR0003', 'E41181335', 3),
('IDQ01', 'KU0001', 'PR0002', 'E41181332', 5),
('IDQ02', 'KU0002', 'PR0002', 'E41181332', 4),
('IDQ03', 'KU0003', 'PR0002', 'E41181332', 4),
('IDQ04', 'KU0004', 'PR0002', 'E41181332', 1),
('IDQ05', 'KU0005', 'PR0002', 'E41181332', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `ID_PND` varchar(30) NOT NULL,
  `ID_PR` varchar(10) NOT NULL,
  `ID_DS` varchar(10) NOT NULL,
  `ID_ST` varchar(10) NOT NULL,
  `WAKTU` varchar(30) DEFAULT NULL,
  `TGL_PND` date NOT NULL,
  `PROPOSAL` varchar(200) DEFAULT NULL,
  `ST_PENDAFTARAN` int(11) DEFAULT NULL,
  `BUKTI` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`ID_PND`, `ID_PR`, `ID_DS`, `ID_ST`, `WAKTU`, `TGL_PND`, `PROPOSAL`, `ST_PENDAFTARAN`, `BUKTI`) VALUES
('PND00001', 'PR0004', 'DS002', 'ST0002', 'Desember, 2020', '2020-06-30', 'Mohammad_Ainun_Ardiansyah__E41181335__FINAL_TERM1.docx', 1, 'ERD_SIM_PKL.png'),
('PND00002', 'PR0003', 'DS001', 'ST0006', 'Desember, 2020', '2020-06-22', 'LAPORAN_AKHIR_WORKSHO1.docx', 1, 'Mohammad_Ainun_Ardiansyah__E41181335__UJIAN_SI1.jpg'),
('PND00003', 'PR0002', 'DS001', 'ST0001', 'Desember, 2020', '2020-06-30', 'LAPORAN_AKHIR_WORKSHO11.docx', 1, '');

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
('PND00001', 'M0005'),
('PND00001', 'M0006'),
('PND00001', 'M0007'),
('PND00002', 'M0001'),
('PND00002', 'M0002'),
('PND00003', 'M0001'),
('PND00003', 'M0002');

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
('PR0001', 'Dinas Komunikasi, Informatika dan Persandian', 'Jl. PB. Sudirman no. 1, Patokan, Situbondo', '111111111111', 'asd@gmail.coma', '3d2ec22f1a7a4a06faf19dac5d363c5b2.jpg'),
('PR0002', 'Paiton Operation &amp; Maintenance Indonesia (POMI', 'Jl. Raya Surabaya-Situbondo Km. 141 Paiton Probolinggo, 67291 (30 Km dari Terminal)', '081252223123', 'asd@gmail.com', '0_85df2132-8a05-4ce8-84bb-545345760d54_387_5161.jpg'),
('PR0003', 'PT. Digdaya Olah Teknologi Indonesia', 'Perumahan Permata Hijau A15, Kel. Tlogomas, Kec.Lowokwaru, Kota Malang', '111111111111', 'asd@gmail.com', '3d2ec22f1a7a4a06faf19dac5d363c5b6.jpg'),
('PR0004', 'PT Google ehehehe', 'kediri', '081252223123', 'google.ehehhe@gm.com', '1-oktober-hari-kesaktian-pancasila-2018_20181001_0700281.jpg'),
('PR0005', 'test199', 'jmbr', '111111111111', 'test1111@gmail.com', '040320063532_laravel7.jpg'),
('PR0006', 'asddsaa12', 'asd1', '111111111111', 'alfianrochmatul77@gmail.com1', 'default.jpg');

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
('IDPR03', 'Manajemen Informatika');

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
(2, 'PR0003', 'ID-U31104', 4),
(12, 'PR0002', 'ID-U30806', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_pendaftaran`
--

CREATE TABLE `status_pendaftaran` (
  `ID_ST` varchar(10) NOT NULL,
  `NAMA_ST` varchar(50) DEFAULT NULL,
  `KETERANGAN` varchar(200) DEFAULT NULL,
  `KET_MHS` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_pendaftaran`
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
(21, 6, 'Admin Program Studi', 'prodi/admin_prodi', 1),
(22, 6, 'Dosen Pembimbing &amp; Koordinator PKL', 'dosen/dosbing', 1),
(23, 14, 'Mahasiswa', 'mahasiswa', 1),
(24, 7, 'Data Perusahaan', 'perusahaan', 1),
(25, 8, 'Data Pendaftaran', 'pendaftaran/index', 1),
(29, 18, 'Manajemen Rating', 'datarating', 1),
(30, 19, 'rating', 'rating', 1),
(31, 20, 'Management Kuisioner', 'kuisioner', 1),
(32, 19, 'List Perusahaan', 'rating/list_perusahaan', 1),
(34, 2, 'Dashboard', 'user', 1),
(35, 23, 'Pendaftaran Peserta PKL', 'pendaftaran/cek_pendaftaran', 1),
(37, 25, 'Mahasiswa Bimbingan', 'mabing', 1),
(40, 29, 'Logbook Mahasiswa', 'logbook', 1),
(41, 31, 'Form Pendaftaran', 'pkl/cek_pendaftaran', 1);

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
(1, 'test1@gmail.com', 'fxu9O8xbXZ/I2F8sGkOo6xPwFH7fwuvcyaA/+804KoM=', 1591813965);

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
('ID-U11303', '197104082001121003', 'Wahyu Kurnia Dewanto, S.Kom, MT', 'alfiannsx98@gmail.com', 'default.jpg', '$2y$10$FCQgn/2Dj9dnYH.HoF6AYemCbUd6ic6MzStjQ0EwxjwuiLZosMhVS', '0', 12, 1, 1586454565, 0),
('ID-U11305', 'E41181335', 'Dindin', 'ansyah@gmail.com', '', '$2y$12$FuWJ/McrJUqhcIG9OEmtouB0B1xtL7dqqEx1/hBLSCt8BxcHPUvz.', '0', 1, 1, 0, 0),
('ID-U11306', 'E41181335', 'Dindin', 'ansyah2@gmail.com', '', '$2y$12$FuWJ/McrJUqhcIG9OEmtouB0B1xtL7dqqEx1/hBLSCt8BxcHPUvz.', '0', 2, 1, 0, 0),
('ID-U11307', 'E41181335', 'Dindin', 'ansyah3@gmail.com', '', '$2y$12$FuWJ/McrJUqhcIG9OEmtouB0B1xtL7dqqEx1/hBLSCt8BxcHPUvz.', '0', 3, 1, 0, 0),
('ID-U11308', 'E41181335', 'Dindin', 'ansyah4@gmail.com', '', '$2y$12$FuWJ/McrJUqhcIG9OEmtouB0B1xtL7dqqEx1/hBLSCt8BxcHPUvz.', '0', 4, 1, 0, 0),
('ID-U11309', 'E41181335', 'Dindin', 'ansyah12@gmail.com', '', '$2y$12$FuWJ/McrJUqhcIG9OEmtouB0B1xtL7dqqEx1/hBLSCt8BxcHPUvz.', '0', 12, 1, 0, 0),
('ID-U21104', '197808192005012001', 'Ika Widiastuti, S.ST, MT', 'alfiannsx98@gmail.com', 'default.jpg', 'polijesip1586623629', '0', 12, 0, 1586623629, 0),
('ID-U30806', 'ID-M90806', 'test1', 'admin@admin.com', 'default.jpg', '$2y$10$9YXSEf73IKGJSlhjr..CIuVriC6/ohS.2AF0Tnc1hCdpMQ1vcHZ/y', '0', 2, 1, 1591612345, 0),
('ID-U31104', '1971040820011210032', 'Ika Widiastuti, S.ST, MT', 'alfiannsx98@gmail.com', 'default.jpg', 'polijesip1586623703', '0', 12, 0, 1586623703, 0),
('ID-U41006', 'ID-M101006', 'test1', 'test1@gmail.com', 'default.jpg', '$2y$10$zFn6wXsFqIFRm31VRrhkE.tYof1fI8T0FWEUIzX/d3nD5scpwdi5e', '0', 2, 1, 1591814069, 0),
('ID-U50806', 'E41181407', 'Alfian Rochmatul Irman', 'alfianrochmatul77@gmail.com', 'default.jpg', '$2y$10$JqNY.x02erU1MVtJCYfyiulSluajd8DzPafEXsnIAzySdCWFRwEim', '0', 1, 1, 1591610989, 0);

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
(6, 'prodi', 'fas fa-book-reader'),
(7, 'perusahaan', 'far fa-building'),
(8, 'pendaftaran', 'fas fa-user-plus'),
(14, 'mahasiswa', 'fas fa-user-graduate'),
(18, 'datarating', 'fas fa-star'),
(19, 'rating', 'fas fa-star-half-alt'),
(20, 'kuisioner', 'fas fa-sticky-note'),
(22, 'Dashboard', 'fas fa-tachometer-alt'),
(23, 'pendaftaran', 'fas fa-plus'),
(25, 'mabing', 'fas fa-user-graduate'),
(29, 'logbook', 'fas fa-book'),
(31, 'pkl', 'fas fa-user-plus');

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
(1, 'Superadmin'),
(2, 'Mahasiswa'),
(3, 'Dosen Pembimbing'),
(12, 'Admin Prodi'),
(13, 'Koordinator PKL');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `access_user`
--
ALTER TABLE `access_user`
  ADD PRIMARY KEY (`id_access_menu`),
  ADD KEY `role_id` (`role_id`,`menu_id`),
  ADD KEY `menu_id` (`menu_id`);

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
-- Indeks untuk tabel `kuisioner`
--
ALTER TABLE `kuisioner`
  ADD PRIMARY KEY (`id_kuisioner`);

--
-- Indeks untuk tabel `logbook`
--
ALTER TABLE `logbook`
  ADD PRIMARY KEY (`id_logbook`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`ID_M`),
  ADD KEY `FK_PRODII` (`ID_PRODI`);

--
-- Indeks untuk tabel `m_kuisioner`
--
ALTER TABLE `m_kuisioner`
  ADD KEY `id_kuisioner` (`id_kuisioner`,`id_pr`,`id_m`),
  ADD KEY `id_pr` (`id_pr`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`ID_PND`),
  ADD KEY `FK_BERSTATUS` (`ID_ST`),
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
-- Indeks untuk tabel `rating1`
--
ALTER TABLE `rating1`
  ADD PRIMARY KEY (`id_rt`),
  ADD KEY `id_pr` (`id_pr`,`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `status_pendaftaran`
--
ALTER TABLE `status_pendaftaran`
  ADD PRIMARY KEY (`ID_ST`);

--
-- Indeks untuk tabel `submenu_user`
--
ALTER TABLE `submenu_user`
  ADD PRIMARY KEY (`id_submenu`),
  ADD KEY `menu_id` (`menu_id`);

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
  MODIFY `id_access_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `rating1`
--
ALTER TABLE `rating1`
  MODIFY `id_rt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `submenu_user`
--
ALTER TABLE `submenu_user`
  MODIFY `id_submenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `token_user`
--
ALTER TABLE `token_user`
  MODIFY `id_token` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `access_user`
--
ALTER TABLE `access_user`
  ADD CONSTRAINT `access_user_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id_menu`),
  ADD CONSTRAINT `access_user_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id_role`);

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
-- Ketidakleluasaan untuk tabel `m_kuisioner`
--
ALTER TABLE `m_kuisioner`
  ADD CONSTRAINT `m_kuisioner_ibfk_1` FOREIGN KEY (`id_kuisioner`) REFERENCES `kuisioner` (`id_kuisioner`),
  ADD CONSTRAINT `m_kuisioner_ibfk_2` FOREIGN KEY (`id_pr`) REFERENCES `perusahaan` (`ID_PR`);

--
-- Ketidakleluasaan untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `FK_BERSTATUS` FOREIGN KEY (`ID_ST`) REFERENCES `status_pendaftaran` (`ID_ST`),
  ADD CONSTRAINT `FK_DIPILIH` FOREIGN KEY (`ID_PR`) REFERENCES `perusahaan` (`ID_PR`),
  ADD CONSTRAINT `FK_PILIH_DS` FOREIGN KEY (`ID_DS`) REFERENCES `dosbing` (`ID_DS`);

--
-- Ketidakleluasaan untuk tabel `pendaftaran_klp`
--
ALTER TABLE `pendaftaran_klp`
  ADD CONSTRAINT `FK_MENDAFTAR` FOREIGN KEY (`ID_PND`) REFERENCES `pendaftaran` (`ID_PND`),
  ADD CONSTRAINT `FK_MENDAFTAR2` FOREIGN KEY (`ID_M`) REFERENCES `mahasiswa` (`ID_M`);

--
-- Ketidakleluasaan untuk tabel `rating1`
--
ALTER TABLE `rating1`
  ADD CONSTRAINT `rating1_ibfk_1` FOREIGN KEY (`id_pr`) REFERENCES `perusahaan` (`ID_PR`),
  ADD CONSTRAINT `rating1_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `submenu_user`
--
ALTER TABLE `submenu_user`
  ADD CONSTRAINT `submenu_user_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id_menu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;