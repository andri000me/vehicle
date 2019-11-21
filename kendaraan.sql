-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2019 at 06:50 PM
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
  `ID_DIVISI` int(4) NOT NULL,
  `KODE_DIVISI` varchar(10) NOT NULL,
  `DIVISI` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`ID_DIVISI`, `KODE_DIVISI`, `DIVISI`) VALUES
(0, '-', 'General'),
(1, 'E02', 'Administrasi SDM'),
(2, 'D02', 'Akuntansi'),
(3, 'E03', 'Diklat & Knowledge Management'),
(4, 'B01', 'Manajemen Proyek'),
(5, 'B02', 'Manajemen O & M'),
(6, 'B03', 'Penunjang Proyek'),
(7, 'B04', 'Logistik'),
(8, 'C01', 'Niaga'),
(9, 'C02', 'Perencanaan & Pengembangan Usaha'),
(10, 'C03', 'Pemasaran'),
(11, 'D01', 'Keuangan'),
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
(0, '1', '-', 'Tidak ada Jabatan', '-'),
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
(34, '0', 'E02', 'Staf Junior Pengelolaan Administrasi Karyawan', 'E021060BT');

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
('C000000AA', 2, 'Trimurti Eko Sukiono', '5684010JA'),
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
('G033072BT', 22, 'Ilham Kusdi', '9213514OD'),
('G033072BT', 23, 'M.Rendra Suryadi', '9013589OD'),
('G033072BT', 24, 'Anggit Satriawan', '9113545OD'),
('E021060BT', 25, 'Eko Hadi Asputro', '8913078KP');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `NAMA_KENDARAAN` varchar(20) NOT NULL,
  `ID_KENDARAAN` int(4) NOT NULL,
  `STATUS` varchar(10) NOT NULL,
  `NO_POLISI` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `MENU_AKSES` varchar(50) NOT NULL,
  `MENU_ID` int(4) NOT NULL,
  `MENU_NAMA` varchar(10) NOT NULL,
  `MENU_URI` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`MENU_AKSES`, `MENU_ID`, `MENU_NAMA`, `MENU_URI`) VALUES
('+1+2+3+4+5+6+', 1, 'Home', 'home'),
('+1+2+6+', 2, 'Approval', 'approval'),
('+1+2+3+6+', 3, 'Form C', 'request'),
('+1+', 4, 'Master', 'master'),
('+1+', 5, 'Report', 'report'),
('+4+', 6, 'Update', 'koreksi'),
('+1+2+3+6+', 7, 'Help', 'help');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `PETUGAS` varchar(10) NOT NULL,
  `JENIS` varchar(10) NOT NULL,
  `NO_POLISI` varchar(10) NOT NULL,
  `ID_PEMINJAMAN` varchar(7) NOT NULL,
  `ID_REQUEST` varchar(7) NOT NULL,
  `NID_SOPIR` varchar(10) NOT NULL,
  `STATUS` varchar(10) NOT NULL,
  `KETERANGAN` varchar(50) NOT NULL,
  `TGL_BERANGKAT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `TGL_KEMBALI` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
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
  `NOMIMNAL` varchar(10) NOT NULL,
  `JENIS` varchar(5) NOT NULL,
  `KODE_VOUCHER` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `APPROVED_BY` varchar(10) NOT NULL,
  `NID` varchar(10) NOT NULL,
  `ID_REQUEST` varchar(7) NOT NULL,
  `STATUS` varchar(10) NOT NULL,
  `JENIS` varchar(10) NOT NULL,
  `PENUMPANG` int(4) NOT NULL,
  `KEPERLUAN` varchar(100) NOT NULL,
  `TUJUAN` varchar(100) NOT NULL,
  `TGL_BERANGKAT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `TGL_KEMBALI` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `WAKTU_REQUEST` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 0, '', '', ''),
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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USERNAME` varchar(10) NOT NULL,
  `STATUS` varchar(10) NOT NULL,
  `TIPE_USER` varchar(10) NOT NULL,
  `ID_USER` int(4) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USERNAME`, `STATUS`, `TIPE_USER`, `ID_USER`, `PASSWORD`) VALUES
('admin', 'active', 'admin', 1, '827ccb0eea8a706c4c34a16891f84e7b'),
('manajer', 'active', 'manajer', 2, '827ccb0eea8a706c4c34a16891f84e7b'),
('user', 'active', 'user', 3, '827ccb0eea8a706c4c34a16891f84e7b'),
('8410346RB', 'active', 'admin', 4, '827ccb0eea8a706c4c34a16891f84e7b'),
('7299005JA', 'active', 'manajer', 5, '827ccb0eea8a706c4c34a16891f84e7b'),
('9213514OD', 'active', 'user', 6, '827ccb0eea8a706c4c34a16891f84e7b'),
('6902001JA', 'active', 'manajer', 7, '827ccb0eea8a706c4c34a16891f84e7b'),
('9013589OD', 'active', 'user', 8, '827ccb0eea8a706c4c34a16891f84e7b'),
('9113545OD', 'active', 'user', 9, '827ccb0eea8a706c4c34a16891f84e7b'),
('8913078KP', 'active', 'user', 10, '827ccb0eea8a706c4c34a16891f84e7b');

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
  ADD UNIQUE KEY `KODE_JABATAN` (`KODE_JABATAN`),
  ADD KEY `JBT_DIVISI` (`KODE_DIVISI`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`ID_KARYAWAN`),
  ADD UNIQUE KEY `NID` (`NID`),
  ADD KEY `KRY_JABATAN` (`KODE_JABATAN`);

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
  ADD PRIMARY KEY (`ID_PEMINJAMAN`),
  ADD KEY `PNJ_PETUGAS` (`PETUGAS`),
  ADD KEY `PNJ_KENDARAAN` (`NO_POLISI`),
  ADD KEY `PNJ_REQUEST` (`ID_REQUEST`);

--
-- Indexes for table `reimburse`
--
ALTER TABLE `reimburse`
  ADD PRIMARY KEY (`ID_REIMBURSE`),
  ADD KEY `REM_REQUEST` (`ID_REQUEST`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`ID_REQUEST`),
  ADD KEY `REQ_APPROVE` (`APPROVED_BY`),
  ADD KEY `REQ_NID` (`NID`);

--
-- Indexes for table `sopir`
--
ALTER TABLE `sopir`
  ADD PRIMARY KEY (`ID_SOPIR`),
  ADD UNIQUE KEY `NID` (`NID_SOPIR`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`),
  ADD UNIQUE KEY `USERNAME` (`USERNAME`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sopir`
--
ALTER TABLE `sopir`
  MODIFY `ID_SOPIR` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD CONSTRAINT `JBT_DIVISI` FOREIGN KEY (`KODE_DIVISI`) REFERENCES `divisi` (`KODE_DIVISI`);

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `KRY_JABATAN` FOREIGN KEY (`KODE_JABATAN`) REFERENCES `jabatan` (`KODE_JABATAN`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `PNJ_KENDARAAN` FOREIGN KEY (`NO_POLISI`) REFERENCES `kendaraan` (`NO_POLISI`),
  ADD CONSTRAINT `PNJ_REQUEST` FOREIGN KEY (`ID_REQUEST`) REFERENCES `request` (`ID_REQUEST`);

--
-- Constraints for table `reimburse`
--
ALTER TABLE `reimburse`
  ADD CONSTRAINT `REM_REQUEST` FOREIGN KEY (`ID_REQUEST`) REFERENCES `request` (`ID_REQUEST`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `REQ_NID` FOREIGN KEY (`NID`) REFERENCES `karyawan` (`NID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
