-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2019 at 12:10 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kendaraan`
--

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `ID_DIVISI` int(2) NOT NULL,
  `KODE_DIVISI` varchar(10) NOT NULL,
  `DIVISI` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`ID_DIVISI`, `KODE_DIVISI`, `DIVISI`) VALUES
(1, 'E02', 'Administrasi HC'),
(2, 'D02', 'Akuntansi'),
(3, 'E03', 'Pengembangan HC'),
(4, 'B01', 'Manajemen Proyek'),
(5, 'B02', 'Manajemen O & M'),
(6, 'B03', 'Penunjang Proyek'),
(7, 'B04', 'Logistik'),
(8, 'C01', 'Niaga'),
(9, 'C02', 'Perencanaan & Pengembangan Usaha'),
(10, 'C03', 'Pemasaran'),
(11, 'D01', 'Keuangan'),
(12, '-', 'General'),
(13, 'D03', 'Anggaran'),
(14, 'E01', 'Perencanaan & Pengembangan SDM'),
(16, 'F01', 'Bidang Kepatuhan Manajemen'),
(17, 'F02', 'Bidang Kepatuhan Keuangan'),
(18, 'G01', 'Bidang Hukum'),
(19, 'G02', 'Bidang Umum dan Kehumasan'),
(20, 'G03', 'Bidang Teknologi Informasi'),
(21, 'H01', 'Bidang Manajemen Kinerja'),
(22, 'H02', 'Bidang Manajemen Risiko');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `ID_JABATAN` int(4) NOT NULL,
  `JENIS` varchar(20) NOT NULL,
  `KODE_DIVISI` varchar(10) NOT NULL,
  `NAMA_JABATAN` varchar(50) NOT NULL,
  `KODE_JABATAN` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`ID_JABATAN`, `JENIS`, `KODE_DIVISI`, `NAMA_JABATAN`, `KODE_JABATAN`) VALUES
(1, '1', '-', 'Direktur Utama', 'A000000AA'),
(2, '1', '-', 'Direktur Perencanaan dan Pemasaran', 'C000000AA'),
(3, '1', '-', 'Direktur Operasi', 'B000000AA'),
(4, '1', '-', 'Direktur Keuangan', 'D000000AA'),
(5, '1', '-', 'Direktur ADM & SDM', 'E000000AA'),
(6, '1', '-', 'Kepala Satuan Kepatuhan', 'F000000AB'),
(7, '1', '-', 'Sekretaris Perusahaan', 'G000000AC'),
(8, '1', '-', 'Kepala Satuan Manajemen Kinerja dan Risiko', 'H000000AB'),
(9, '1', 'B01', 'Manajer Manajemen Proyek', 'B010000AD'),
(10, '1', 'B02', 'Manajer Manajemen O & M', 'B020000AD'),
(11, '1', 'B03', 'Manajer Penunjang Proyek', 'B030000AD'),
(12, '1', 'B04', 'Manajer Logistik', 'B040000AD'),
(13, '1', 'C01', 'Manajer Niaga', 'C010000AD'),
(14, '1', 'C02', 'Manajer Perencanaan & Pengembangan Usaha', 'C020000AD'),
(15, '1', 'C03', 'Manajer Pemasaran', 'C030000AD'),
(16, '1', 'D01', 'Manajer Keuangan', 'D0100000AD'),
(17, '1', 'D02', 'Manajer Akuntansi', 'D020000AD'),
(18, '1', 'D03', 'Manajer Anggaran', 'D030000AD'),
(19, '1', 'E01', 'Manajer Perencanaan & Pengembangan SDM', 'E010000AD'),
(20, '1', 'E02', 'Manajer Administrasi SDM', 'E020000AD'),
(21, '1', 'E03', 'Manajer Diklat dan Knowledge Management', 'E030000AD'),
(22, '1', 'F01', 'Manajer Bidang Kepatuhan Manajemen', 'F010000AD'),
(23, '1', 'F02', 'Manajer Bidang Kepatuhan Keuangan', 'F020000AD'),
(24, '1', 'G01', 'Manajer Bidang Hukum', 'G010000AD'),
(25, '1', 'G02', 'Manajer Bidang Umum dan Kehumasan', 'G020000AD'),
(26, '1', 'G03', 'Manajer Bidang Teknologi Informasi', 'G030000AD'),
(27, '1', 'H01', 'Manajer Bidang Manajemen Kinerja', 'H010000AD'),
(28, '1', 'H02', 'Manajer Bidang Manajemen Risiko', 'H020000AD'),
(29, '0', 'G02', 'Staf Senior Pengaturan Kendaraan & Keamanan', 'G021075BS'),
(30, '0', 'G02', 'Staf Junior Pengaturan Kendaraan & Keamanan', 'G021075BT'),
(31, '0', 'G03', 'Staf Senior Layanan Aplikasi', 'G033072BS'),
(32, '0', 'G03', 'Staf Junior Layanan Aplikasi', 'G033072BT'),
(33, '0', 'E02', 'Staf Senior Pengelolaan Administrasi Karyawan', 'E021060BS'),
(34, '0', 'E02', 'Staf Junior Pengelolaan Administrasi Karyawan', 'E021060BT'),
(35, '1', '-', 'Tidak ada Jabatan', '-');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `KODE_JABATAN` varchar(10) NOT NULL,
  `ID_KARYAWAN` int(4) NOT NULL,
  `NAMA` varchar(50) NOT NULL,
  `NID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`KODE_JABATAN`, `ID_KARYAWAN`, `NAMA`, `NID`) VALUES
('A000000AA', 1, 'Hari Suharso', '5885003H'),
('-', 2, 'Trimurti Eko Sukiono', '5684010JA'),
('B000000AA', 3, 'Ompang Rizki Hasibuan', '6593044Z'),
('E000000AA', 4, 'Adi Setiawan', '6493034Z'),
('D000000AA', 5, 'Rokhayati', '6199001JA'),
('G000000AC', 6, 'Flodesa Anggarijanto', '6893116S'),
('F000000AB', 7, 'Agus Supriyono', '5884028JA'),
('H000000AB', 8, 'Saiful Hidayat', '6082025JA'),
('D020000AD', 9, 'Luluk Setyo Andayani', '7710403KP'),
('B040000AD', 10, 'Agus Priyo Kusuma', '6988024JA'),
('G030000AD', 11, 'Mirandi', '7299005JA'),
('B020000AD', 12, 'Satrio Wahyudi', '7602006JA'),
('B030000AD', 13, 'Mudjito', '6085035JA'),
('G010000AD', 14, 'Nurusobah', '7599017JA'),
('C030000AD', 15, 'Gatot', '6993993JA'),
('B010000AD', 16, 'Agus Budi Santoso', '6485046JA'),
('D0100000AD', 17, 'Yopi Dewi Kumalasari', '7803031JA'),
('E010000AD', 18, 'Pamekas Maduratih', '6995002J'),
('E020000AD', 19, 'Mei Nurrahmawati', '6902001JA'),
('E030000AD', 20, 'Sukardi', '6586016JA'),
('G021075BS', 21, 'Ivan Yulianto', '8410346RB'),
('G033072BT', 23, 'M.Rendra Suryadi', '9013589OD'),
('G033072BT', 24, 'Anggit Satriawan', '9113545OD'),
('E021060BT', 25, 'Eko Hadi Asputro', '8913078KP'),
('-', 26, 'Administrator', 'admin'),
('G033072BT', 29, 'S Fajar Suryadi', '9514119KP');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `NAMA_KENDARAAN` varchar(20) NOT NULL,
  `ID_KENDARAAN` int(4) NOT NULL,
  `STATUS` int(1) NOT NULL,
  `NO_POLISI` varchar(10) NOT NULL,
  `SOPIR` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`NAMA_KENDARAAN`, `ID_KENDARAAN`, `STATUS`, `NO_POLISI`, `SOPIR`) VALUES
('TOYOTA NEW INNOVA   ', 1, 1, 'L1185WN   ', 'SP003'),
('TOYOTA NEW INNOVA   ', 2, 1, 'W1399SC   ', 'SPR17'),
('TOYOTA NEW INNOVA   ', 3, 1, 'L1189WN   ', 'SPR20'),
('NEW AVANZA 1.3G     ', 4, 1, 'B1004PZJ  ', 'SPR011'),
('TOYOTA NEW INNOVA   ', 5, 1, 'L1625IT   ', 'SP001'),
('TOYOTA NEW INNOVA   ', 6, 1, 'L1180WN   ', 'SPR16'),
('TOYOTA NEW INNOVA   ', 7, 1, 'L1506IT   ', 'SPR19'),
('TOYOTA NEW INNOVA   ', 8, 1, 'N1633X    ', 'SP006'),
('TOYOTA NEW INNOVA   ', 9, 1, 'L1194WN   ', 'SP002'),
('TOYOTA NEW INNOVA   ', 10, 1, 'B2236SKM  ', 'SP005'),
('TOYOTA NEW INNOVA   ', 11, 1, 'B1855PGY  ', 'SP004'),
('TOYOTA NEW INNOVA   ', 12, 1, 'L1193WN   ', 'SP000');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `MENU_AKSES` varchar(50) NOT NULL,
  `MENU_ID` int(4) NOT NULL,
  `MENU_NAMA` varchar(15) NOT NULL,
  `MENU_URI` varchar(30) NOT NULL,
  `HAVECHILD` int(1) DEFAULT NULL,
  `PARENT` int(1) DEFAULT NULL,
  `ICON` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`MENU_AKSES`, `MENU_ID`, `MENU_NAMA`, `MENU_URI`, `HAVECHILD`, `PARENT`, `ICON`) VALUES
('+1+2+3+4+5+', 0, 'Home', 'home', 0, NULL, 'dashboard'),
('+1+2+3+', 1, 'Form C', 'request', 0, NULL, 'chat'),
('+1+2+', 2, 'Transaksi', 'approval', 1, NULL, 'spellcheck'),
('+1+4+', 3, 'Update', 'koreksi', 0, NULL, 'edit'),
('+1+4+', 4, 'Master', 'master', 1, NULL, 'amp_stories'),
('+1+4+', 5, 'Report', 'report', 1, NULL, 'print'),
('+1+2+3+4+5+', 7, 'Help', 'help', 0, NULL, 'help'),
('+1+4+', 8, 'Divisi', 'master/subdit', NULL, 4, 'device_hub'),
('+1+4+', 9, 'Jabatan', 'master/jabatan', NULL, 4, 'local_library'),
('+1+4+', 10, 'Karyawan', 'master/karyawan', NULL, 4, 'supervised_user_circle'),
('+1+4+', 11, 'Kendaraan', 'master/kendaraan', NULL, 4, 'local_taxi'),
('+1+4+', 12, 'Supir', 'master/sopir', NULL, 4, 'perm_contact_calendar'),
('+1+4+', 13, 'User', 'master/user', NULL, 4, 'supervisor_account'),
('+1+4+', 14, 'Kendaraan', 'report/kendaraan', NULL, 5, 'local_taxi'),
('+1+4+', 15, 'Operasional', 'report/operasional', NULL, 5, 'crop_rotate'),
('+1+4+', 16, 'Supir', 'report/sopir', NULL, 5, 'perm_contact_calendar'),
('+1+2+', 17, 'Operasional', 'approval/lihat_operasional', NULL, 2, 'crop_rotate'),
('+1+2+', 19, 'Reimburse', 'approval/lihat_reimburse', NULL, 2, 'move_to_inbox'),
('+1+2+', 20, 'Voucher', 'approval/lihat_voucher', NULL, 2, 'monetization_on');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `ID_PEMINJAMAN` varchar(7) NOT NULL,
  `ID_REQUEST` varchar(7) NOT NULL,
  `NO_POLISI` varchar(10) NOT NULL,
  `STATUS` varchar(10) NOT NULL,
  `KETERANGAN` varchar(50) NOT NULL,
  `CHANGE_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reimburse`
--

CREATE TABLE `reimburse` (
  `ID_REIMBURSE` varchar(7) NOT NULL,
  `ID_REQUEST` varchar(7) NOT NULL,
  `KETERANGAN` varchar(100) NOT NULL,
  `TGL_PEMBERIAN` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `JENIS` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `APPROVED_BY` varchar(10) DEFAULT NULL,
  `NID` varchar(10) NOT NULL,
  `ID_REQUEST` int(5) NOT NULL,
  `STATUS` varchar(10) NOT NULL,
  `JENIS` varchar(10) NOT NULL,
  `PENUMPANG` int(4) NOT NULL,
  `KEPERLUAN` varchar(100) NOT NULL,
  `TUJUAN` varchar(100) NOT NULL,
  `TGL_BERANGKAT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `TGL_KEMBALI` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `WAKTU_REQUEST` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DIVISI` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`APPROVED_BY`, `NID`, `ID_REQUEST`, `STATUS`, `JENIS`, `PENUMPANG`, `KEPERLUAN`, `TUJUAN`, `TGL_BERANGKAT`, `TGL_KEMBALI`, `WAKTU_REQUEST`, `DIVISI`) VALUES
('admin', '8410346RB', 1, '1', '1', 1, 'asa', 'asas', '2019-05-11 00:30:00', '2019-05-10 17:00:00', '2019-11-05 12:38:48', 'G02');

-- --------------------------------------------------------

--
-- Table structure for table `sopir`
--

CREATE TABLE `sopir` (
  `ID_SOPIR` int(4) NOT NULL,
  `STATUS` int(1) NOT NULL DEFAULT '1',
  `NAMA` varchar(50) NOT NULL,
  `CHAT_ID` varchar(10) NOT NULL,
  `NID_SOPIR` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sopir`
--

INSERT INTO `sopir` (`ID_SOPIR`, `STATUS`, `NAMA`, `CHAT_ID`, `NID_SOPIR`) VALUES
(4, 1, 'MUJAYIN', '', 'SPR011'),
(6, 1, 'IVON FERDIYANTO', '', 'SPR012'),
(7, 1, 'DWIYONO', '', 'SP006'),
(8, 1, 'ARIF HERMAWAN', '', 'SP007'),
(9, 1, 'MUSTOFA', '', 'SP008'),
(10, 1, 'RIBUT ARI WIDODO', '', 'SP000'),
(11, 1, 'DEDDY JUNAIDY', '', 'SP001'),
(12, 1, 'EDDY KHOIRI', '', 'SP002'),
(13, 1, 'AGUS WIDODO', '', 'SP003'),
(14, 1, 'MICHO RAWUNG', '', 'SP004'),
(15, 1, 'HARRY MADJID', '', 'SP005'),
(16, 1, 'TRI CAHYO PRASETYO', '', 'SPR16'),
(17, 1, 'KHOIRUL ANWAR', '', 'SPR018'),
(18, 1, 'ABDUL ROCHIM', '', 'SPR20'),
(19, 1, 'DEDI WAHYU SYAMSUDIN', '', 'SPR19'),
(21, 1, 'ANDI ANSYAH', '', 'SPR17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `USERNAME` varchar(10) NOT NULL,
  `STATUS` int(1) NOT NULL,
  `TIPE_USER` int(1) NOT NULL,
  `ID_USER` int(4) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`USERNAME`, `STATUS`, `TIPE_USER`, `ID_USER`, `PASSWORD`) VALUES
('5885003H', 1, 1, 0, '827ccb0eea8a706c4c34a16891f84e7b'),
('admin', 1, 1, 1, '827ccb0eea8a706c4c34a16891f84e7b'),
('manajer', 1, 2, 2, '827ccb0eea8a706c4c34a16891f84e7b'),
('user', 1, 3, 3, '827ccb0eea8a706c4c34a16891f84e7b'),
('8410346RB', 1, 1, 4, '827ccb0eea8a706c4c34a16891f84e7b'),
('7299005JA', 1, 2, 5, '827ccb0eea8a706c4c34a16891f84e7b'),
('6902001JA', 0, 2, 7, '827ccb0eea8a706c4c34a16891f84e7b'),
('9013589OD', 1, 3, 8, '827ccb0eea8a706c4c34a16891f84e7b'),
('9113545OD', 1, 3, 9, '827ccb0eea8a706c4c34a16891f84e7b'),
('8913078KP', 1, 1, 10, '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_jabatan`
-- (See below for the actual view)
--
CREATE TABLE `view_jabatan` (
`ID_JABATAN` int(4)
,`JENIS` varchar(20)
,`KODE_DIVISI` varchar(10)
,`NAMA_JABATAN` varchar(50)
,`KODE_JABATAN` varchar(10)
,`DIVISI` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_karyawan`
-- (See below for the actual view)
--
CREATE TABLE `view_karyawan` (
`ID_KARYAWAN` int(4)
,`NID` varchar(10)
,`NAMA` varchar(50)
,`KODE_JABATAN` varchar(10)
,`NAMA_JABATAN` varchar(50)
,`JENIS` varchar(20)
,`KODE_DIVISI` varchar(10)
,`DIVISI` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_kendaraan`
-- (See below for the actual view)
--
CREATE TABLE `view_kendaraan` (
`NAMA_KENDARAAN` varchar(20)
,`ID_KENDARAAN` int(4)
,`STATUS` int(1)
,`NO_POLISI` varchar(10)
,`SOPIR` varchar(10)
,`NAMA` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_operasional`
-- (See below for the actual view)
--
CREATE TABLE `view_operasional` (
`ID_PEMINJAMAN` varchar(7)
,`ID_REQUEST` varchar(7)
,`NO_POLISI` varchar(10)
,`STATUS` varchar(10)
,`KETERANGAN` varchar(50)
,`CHANGE_DATE` timestamp
,`TGL_BERANGKAT` timestamp
,`JENIS` varchar(10)
,`TGL_KEMBALI` timestamp
,`TUJUAN` varchar(100)
,`KEPERLUAN` varchar(100)
,`NID` varchar(10)
,`NAMA_KARYAWAN` varchar(50)
,`SOPIR` varchar(10)
,`NAMA_SOPIR` varchar(50)
,`NAMA_KENDARAAN` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_reimburse`
-- (See below for the actual view)
--
CREATE TABLE `view_reimburse` (
`ID_REIMBURSE` varchar(7)
,`ID_REQUEST` varchar(7)
,`KETERANGAN` varchar(100)
,`TGL_PEMBERIAN` timestamp
,`JENIS` int(1)
,`NID` varchar(10)
,`NAMA` varchar(50)
,`TGL_BERANGKAT` timestamp
,`TUJUAN` varchar(100)
,`KEPERLUAN` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_request`
-- (See below for the actual view)
--
CREATE TABLE `view_request` (
`APPROVED_BY` varchar(10)
,`NID` varchar(10)
,`ID_REQUEST` int(5)
,`STATUS` varchar(10)
,`JENIS` varchar(10)
,`PENUMPANG` int(4)
,`KEPERLUAN` varchar(100)
,`TUJUAN` varchar(100)
,`TGL_BERANGKAT` timestamp
,`TGL_KEMBALI` timestamp
,`WAKTU_REQUEST` timestamp
,`DIVISI` varchar(10)
,`NAMA` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_users`
-- (See below for the actual view)
--
CREATE TABLE `view_users` (
`USERNAME` varchar(10)
,`NAMA` varchar(50)
,`STATUS` int(1)
,`TIPE_USER` int(1)
,`ID_USER` int(4)
,`PASSWORD` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_voucher`
-- (See below for the actual view)
--
CREATE TABLE `view_voucher` (
`ID_VOUCHER` int(10)
,`ID_REQUEST` int(5)
,`KODE_VOUCHER` varchar(20)
,`TGL_PEMBERIAN` timestamp
,`NILAI_VOUCHER` varchar(20)
,`KETERANGAN` varchar(50)
,`NID` varchar(10)
,`NAMA` varchar(50)
,`TGL_BERANGKAT` timestamp
,`TUJUAN` varchar(100)
,`KEPERLUAN` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `ID_VOUCHER` int(10) NOT NULL,
  `ID_REQUEST` int(5) NOT NULL,
  `KODE_VOUCHER` varchar(20) NOT NULL,
  `TGL_PEMBERIAN` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `NILAI_VOUCHER` varchar(20) NOT NULL,
  `KETERANGAN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure for view `view_jabatan`
--
DROP TABLE IF EXISTS `view_jabatan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_jabatan`  AS  select `j`.`ID_JABATAN` AS `ID_JABATAN`,`j`.`JENIS` AS `JENIS`,`j`.`KODE_DIVISI` AS `KODE_DIVISI`,`j`.`NAMA_JABATAN` AS `NAMA_JABATAN`,`j`.`KODE_JABATAN` AS `KODE_JABATAN`,`d`.`DIVISI` AS `DIVISI` from (`jabatan` `j` left join `divisi` `d` on((`j`.`KODE_DIVISI` = `d`.`KODE_DIVISI`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_karyawan`
--
DROP TABLE IF EXISTS `view_karyawan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_karyawan`  AS  select `k`.`ID_KARYAWAN` AS `ID_KARYAWAN`,`k`.`NID` AS `NID`,`k`.`NAMA` AS `NAMA`,`vj`.`KODE_JABATAN` AS `KODE_JABATAN`,`vj`.`NAMA_JABATAN` AS `NAMA_JABATAN`,`vj`.`JENIS` AS `JENIS`,`vj`.`KODE_DIVISI` AS `KODE_DIVISI`,`vj`.`DIVISI` AS `DIVISI` from (`karyawan` `k` left join `view_jabatan` `vj` on((`k`.`KODE_JABATAN` = `vj`.`KODE_JABATAN`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_kendaraan`
--
DROP TABLE IF EXISTS `view_kendaraan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_kendaraan`  AS  select `k`.`NAMA_KENDARAAN` AS `NAMA_KENDARAAN`,`k`.`ID_KENDARAAN` AS `ID_KENDARAAN`,`k`.`STATUS` AS `STATUS`,`k`.`NO_POLISI` AS `NO_POLISI`,`k`.`SOPIR` AS `SOPIR`,`s`.`NAMA` AS `NAMA` from (`kendaraan` `k` left join `sopir` `s` on((`k`.`SOPIR` = `s`.`NID_SOPIR`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_operasional`
--
DROP TABLE IF EXISTS `view_operasional`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_operasional`  AS  select `pjm`.`ID_PEMINJAMAN` AS `ID_PEMINJAMAN`,`pjm`.`ID_REQUEST` AS `ID_REQUEST`,`pjm`.`NO_POLISI` AS `NO_POLISI`,`pjm`.`STATUS` AS `STATUS`,`pjm`.`KETERANGAN` AS `KETERANGAN`,`pjm`.`CHANGE_DATE` AS `CHANGE_DATE`,`vr`.`TGL_BERANGKAT` AS `TGL_BERANGKAT`,`vr`.`JENIS` AS `JENIS`,`vr`.`TGL_KEMBALI` AS `TGL_KEMBALI`,`vr`.`TUJUAN` AS `TUJUAN`,`vr`.`KEPERLUAN` AS `KEPERLUAN`,`vr`.`NID` AS `NID`,`vr`.`NAMA` AS `NAMA_KARYAWAN`,`vk`.`SOPIR` AS `SOPIR`,`vk`.`NAMA` AS `NAMA_SOPIR`,`vk`.`NAMA_KENDARAAN` AS `NAMA_KENDARAAN` from ((`peminjaman` `pjm` left join `view_kendaraan` `vk` on((`pjm`.`NO_POLISI` = `vk`.`NO_POLISI`))) left join `view_request` `vr` on((`pjm`.`ID_REQUEST` = `vr`.`ID_REQUEST`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_reimburse`
--
DROP TABLE IF EXISTS `view_reimburse`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_reimburse`  AS  select `r`.`ID_REIMBURSE` AS `ID_REIMBURSE`,`r`.`ID_REQUEST` AS `ID_REQUEST`,`r`.`KETERANGAN` AS `KETERANGAN`,`r`.`TGL_PEMBERIAN` AS `TGL_PEMBERIAN`,`r`.`JENIS` AS `JENIS`,`vr`.`NID` AS `NID`,`vr`.`NAMA` AS `NAMA`,`vr`.`TGL_BERANGKAT` AS `TGL_BERANGKAT`,`vr`.`TUJUAN` AS `TUJUAN`,`vr`.`KEPERLUAN` AS `KEPERLUAN` from (`reimburse` `r` left join `view_request` `vr` on((`r`.`ID_REQUEST` = `vr`.`ID_REQUEST`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_request`
--
DROP TABLE IF EXISTS `view_request`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_request`  AS  select `rq`.`APPROVED_BY` AS `APPROVED_BY`,`rq`.`NID` AS `NID`,`rq`.`ID_REQUEST` AS `ID_REQUEST`,`rq`.`STATUS` AS `STATUS`,`rq`.`JENIS` AS `JENIS`,`rq`.`PENUMPANG` AS `PENUMPANG`,`rq`.`KEPERLUAN` AS `KEPERLUAN`,`rq`.`TUJUAN` AS `TUJUAN`,`rq`.`TGL_BERANGKAT` AS `TGL_BERANGKAT`,`rq`.`TGL_KEMBALI` AS `TGL_KEMBALI`,`rq`.`WAKTU_REQUEST` AS `WAKTU_REQUEST`,`rq`.`DIVISI` AS `DIVISI`,`k`.`NAMA` AS `NAMA` from (`request` `rq` left join `karyawan` `k` on((`rq`.`NID` = `k`.`NID`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_users`
--
DROP TABLE IF EXISTS `view_users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_users`  AS  select `u`.`USERNAME` AS `USERNAME`,`k`.`NAMA` AS `NAMA`,`u`.`STATUS` AS `STATUS`,`u`.`TIPE_USER` AS `TIPE_USER`,`u`.`ID_USER` AS `ID_USER`,`u`.`PASSWORD` AS `PASSWORD` from (`users` `u` left join `karyawan` `k` on((`u`.`USERNAME` = `k`.`NID`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_voucher`
--
DROP TABLE IF EXISTS `view_voucher`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_voucher`  AS  select `v`.`ID_VOUCHER` AS `ID_VOUCHER`,`v`.`ID_REQUEST` AS `ID_REQUEST`,`v`.`KODE_VOUCHER` AS `KODE_VOUCHER`,`v`.`TGL_PEMBERIAN` AS `TGL_PEMBERIAN`,`v`.`NILAI_VOUCHER` AS `NILAI_VOUCHER`,`v`.`KETERANGAN` AS `KETERANGAN`,`vr`.`NID` AS `NID`,`vr`.`NAMA` AS `NAMA`,`vr`.`TGL_BERANGKAT` AS `TGL_BERANGKAT`,`vr`.`TUJUAN` AS `TUJUAN`,`vr`.`KEPERLUAN` AS `KEPERLUAN` from (`voucher` `v` left join `view_request` `vr` on((`v`.`ID_REQUEST` = `vr`.`ID_REQUEST`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`ID_DIVISI`),
  ADD UNIQUE KEY `KODE_DIVISI` (`KODE_DIVISI`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`ID_JABATAN`),
  ADD UNIQUE KEY `KODE_JABATAN` (`KODE_JABATAN`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`ID_KARYAWAN`),
  ADD UNIQUE KEY `NID` (`NID`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`ID_KENDARAAN`),
  ADD UNIQUE KEY `NO_POLISI` (`NO_POLISI`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`MENU_ID`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`ID_PEMINJAMAN`);

--
-- Indexes for table `reimburse`
--
ALTER TABLE `reimburse`
  ADD PRIMARY KEY (`ID_REIMBURSE`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`ID_REQUEST`),
  ADD KEY `REQ_APPROVE` (`APPROVED_BY`);

--
-- Indexes for table `sopir`
--
ALTER TABLE `sopir`
  ADD PRIMARY KEY (`ID_SOPIR`),
  ADD UNIQUE KEY `NID` (`NID_SOPIR`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_USER`),
  ADD UNIQUE KEY `USERNAME` (`USERNAME`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`ID_VOUCHER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `ID_DIVISI` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `ID_JABATAN` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `ID_KARYAWAN` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `ID_KENDARAAN` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `MENU_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `ID_REQUEST` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sopir`
--
ALTER TABLE `sopir`
  MODIFY `ID_SOPIR` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `ID_VOUCHER` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
