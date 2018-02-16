-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2018 at 02:57 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_trx_tindakan`
--

CREATE TABLE `detail_trx_tindakan` (
  `id_detail_trx_tindakan` int(11) NOT NULL,
  `id_trx_tindakan` int(11) NOT NULL,
  `id_mst_tindakan` int(11) NOT NULL,
  `harga` varchar(15) NOT NULL,
  `is_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_trx_tindakan`
--

INSERT INTO `detail_trx_tindakan` (`id_detail_trx_tindakan`, `id_trx_tindakan`, `id_mst_tindakan`, `harga`, `is_create`, `is_update`) VALUES
(1, 2, 2, '450000', '2018-02-13 02:31:58', NULL),
(2, 2, 1, '500000', '2018-02-13 20:25:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `group_access`
--

CREATE TABLE `group_access` (
  `id_group_acces` int(11) NOT NULL,
  `id_mst_pegawai` int(11) NOT NULL,
  `id_mst_group` int(11) NOT NULL,
  `is_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_access`
--

INSERT INTO `group_access` (`id_group_acces`, `id_mst_pegawai`, `id_mst_group`, `is_create`, `is_update`) VALUES
(1, 1, 1, '2018-02-05 10:02:52', NULL),
(2, 2, 3, '2018-02-05 20:15:40', NULL),
(3, 3, 3, '2018-02-06 13:56:52', NULL),
(4, 6, 4, '2018-02-13 20:30:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id_kab` int(11) NOT NULL,
  `id_prov` int(11) NOT NULL,
  `kab` varchar(100) NOT NULL,
  `is_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`id_kab`, `id_prov`, `kab`, `is_create`, `is_update`) VALUES
(1, 1, 'Depok', '2018-02-09 00:14:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kec` int(11) NOT NULL,
  `id_kab` int(11) NOT NULL,
  `kec` varchar(100) NOT NULL,
  `is_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kec`, `id_kab`, `kec`, `is_create`, `is_update`) VALUES
(1, 1, 'Sukmajaya', '2018-02-09 00:14:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id_kel` int(11) NOT NULL,
  `id_kec` int(11) NOT NULL,
  `kel` varchar(100) NOT NULL,
  `is_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`id_kel`, `id_kec`, `kel`, `is_create`, `is_update`) VALUES
(1, 1, 'Sukmajaya', '2018-02-09 00:15:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL,
  `link` varchar(200) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `is_main_menu` int(11) NOT NULL,
  `is_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `menu`, `link`, `icon`, `is_main_menu`, `is_create`, `is_update`) VALUES
(1, 'Home', 'Home', 'fa fa-link', 0, '2018-02-05 10:03:30', NULL),
(2, 'Pasien', 'pasien/pasein', 'fa fa-link', 0, '2018-02-05 12:31:16', NULL),
(5, 'Pegawai', '#', 'fa fa-link', 0, '2018-02-05 13:06:17', NULL),
(6, 'Data Pegawai', 'sdm/pegawai', 'fa fa-bullseye', 5, '2018-02-05 13:08:50', NULL),
(7, 'Group Pegawai', '#', 'fa fa-link', 0, '2018-02-05 15:56:18', NULL),
(8, 'Data Group', 'sdm/group', 'fa fa-bullseye', 7, '2018-02-05 15:56:52', NULL),
(9, 'System', '#', 'fa fa-link', 0, '2018-02-05 16:24:44', NULL),
(10, 'Menu', 'sistem/system', 'fa fa-bullseye', 9, '2018-02-05 16:25:57', NULL),
(11, 'Menu Akses', 'sistem/system/menu_akses', 'fa fa-bullseye', 9, '2018-02-05 16:25:57', NULL),
(12, 'Group Akses', 'sistem/system/group_akses', 'fa fa-bullseye', 9, '2018-02-05 19:06:57', NULL),
(13, 'User Login', 'sdm/pegawai/user', 'fa fa-bullseye', 5, '2018-02-06 14:16:32', NULL),
(14, 'Data Pasien', 'Pasien/pasien', 'fa fa-bullseye', 2, '2018-02-06 17:56:12', NULL),
(15, 'Pendaftaran', 'pendaftaran/pendaftaran', 'fa fa-link', 0, '2018-02-09 01:23:37', NULL),
(16, 'Data Pendaftaran', 'pendaftaran/pendaftaran', 'fa fa-bullseye', 15, '2018-02-09 01:24:33', NULL),
(17, 'Daftar', 'pendaftaran/pendaftaran/create', 'fa fa-bullseye', 15, '2018-02-09 01:25:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu_akses`
--

CREATE TABLE `menu_akses` (
  `id_menu_akses` int(11) NOT NULL,
  `id_mst_group` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `create` int(11) NOT NULL DEFAULT '0',
  `update` int(11) NOT NULL DEFAULT '0',
  `delete` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_akses`
--

INSERT INTO `menu_akses` (`id_menu_akses`, `id_mst_group`, `id_menu`, `create`, `update`, `delete`) VALUES
(1, 1, 1, 1, 1, 1),
(2, 1, 2, 1, 1, 1),
(5, 1, 5, 1, 1, 1),
(6, 1, 6, 1, 1, 1),
(7, 1, 7, 1, 1, 1),
(8, 1, 8, 1, 1, 1),
(9, 1, 9, 1, 1, 1),
(10, 1, 10, 1, 1, 1),
(11, 1, 11, 1, 1, 1),
(12, 3, 1, 0, 0, 0),
(13, 1, 12, 1, 1, 1),
(14, 3, 2, 1, 1, 1),
(15, 1, 13, 1, 1, 1),
(16, 1, 14, 1, 1, 1),
(17, 3, 14, 1, 1, 1),
(18, 1, 16, 1, 1, 1),
(19, 1, 15, 1, 1, 1),
(20, 1, 17, 1, 1, 1),
(21, 4, 15, 1, 1, 1),
(22, 4, 16, 1, 1, 1),
(23, 4, 14, 1, 1, 1),
(24, 4, 2, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mst_pasien`
--

CREATE TABLE `mst_pasien` (
  `id_mst_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `no_rm` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `gender` int(11) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `id_kel` int(11) NOT NULL,
  `is_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_pasien`
--

INSERT INTO `mst_pasien` (`id_mst_pasien`, `nama_pasien`, `no_rm`, `tgl_lahir`, `no_telp`, `gender`, `alamat`, `id_kel`, `is_create`, `is_update`) VALUES
(1, 'Tedi Susanto', '01234', '2018-08-01', '089603786637', 1, 'jl, studio alam rt 01 rw 02 no 35', 1, '2018-02-09 01:01:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mst_pegawai`
--

CREATE TABLE `mst_pegawai` (
  `id_mst_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(80) NOT NULL,
  `no_tlp` varchar(13) NOT NULL,
  `gender` int(11) NOT NULL COMMENT '0=P,1=L',
  `alamat` varchar(200) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `flag_aktif` int(11) NOT NULL DEFAULT '1' COMMENT '0=non,1=aktif',
  `is_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_pegawai`
--

INSERT INTO `mst_pegawai` (`id_mst_pegawai`, `nama_pegawai`, `no_tlp`, `gender`, `alamat`, `tgl_lahir`, `flag_aktif`, `is_create`, `is_update`) VALUES
(1, 'Developer', '123456', 1, 'test', '2018-02-05', 1, '2018-02-05 10:02:40', NULL),
(2, 'testing', '12134252', 1, 'wewewe', '1991-02-05', 1, '2018-02-05 15:17:49', NULL),
(3, 'test', '2323', 1, 'sdgs', '2018-02-21', 1, '2018-02-05 15:19:02', NULL),
(4, 'sdfs', '1234566799075', 1, 'test', '2018-02-26', 0, '2018-02-05 15:22:54', '2018-02-05 09:38:45'),
(5, 'adad', '12143', 1, 'segd', '2018-02-20', 0, '2018-02-05 15:25:23', '2018-02-05 15:39:53'),
(6, 'Dokter', '0922222222', 0, 'test', '2018-02-13', 1, '2018-02-13 20:29:39', '2018-02-13 20:30:14');

-- --------------------------------------------------------

--
-- Table structure for table `mst_tindakan`
--

CREATE TABLE `mst_tindakan` (
  `id_mst_tindakan` int(11) NOT NULL,
  `nama_tindakan` varchar(155) NOT NULL,
  `harga` varchar(16) NOT NULL,
  `is_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_tindakan`
--

INSERT INTO `mst_tindakan` (`id_mst_tindakan`, `nama_tindakan`, `harga`, `is_create`, `is_update`) VALUES
(1, 'Thread Lifting (Tanam Benang)', '500000', '2018-02-13 00:42:51', NULL),
(2, 'Platelet Rich Plasma (PRP)', '450000', '2018-02-13 00:42:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai_group`
--

CREATE TABLE `pegawai_group` (
  `id_mst_group` int(11) NOT NULL,
  `nama_group` varchar(80) NOT NULL,
  `flag_aktif` int(11) NOT NULL DEFAULT '1',
  `is_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai_group`
--

INSERT INTO `pegawai_group` (`id_mst_group`, `nama_group`, `flag_aktif`, `is_create`, `is_update`) VALUES
(1, 'Developer', 1, '2018-02-05 10:01:39', NULL),
(2, 'Kasir', 0, '2018-02-05 16:17:41', '2018-02-05 16:21:47'),
(3, 'Pendaftaran', 1, '2018-02-05 19:38:50', NULL),
(4, 'Dokter', 1, '2018-02-13 01:15:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_trx_pendaftaran` varchar(19) NOT NULL,
  `id_mst_pasien` int(11) NOT NULL,
  `id_mst_pegawai` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tgl` date NOT NULL,
  `is_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_update` datetime DEFAULT NULL,
  `flag_aktif` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_trx_pendaftaran`, `id_mst_pasien`, `id_mst_pegawai`, `keterangan`, `tgl`, `is_create`, `is_update`, `flag_aktif`) VALUES
('P00001', 1, 1, 'Mau Konsul ', '2018-02-13', '2018-02-13 00:16:07', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` varchar(15) NOT NULL,
  `nama_product` varchar(100) NOT NULL,
  `jenis_product` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_beli` varchar(23) NOT NULL,
  `harga_jual` varchar(22) NOT NULL,
  `is_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id_prov` int(11) NOT NULL,
  `prov` varchar(100) NOT NULL,
  `is_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_prov`, `prov`, `is_create`, `is_update`) VALUES
(1, 'Jawa Barat', '2018-02-09 00:14:06', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `id_resep` varchar(19) NOT NULL,
  `tgl` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `diskon` int(11) DEFAULT NULL,
  `ppn` int(11) DEFAULT NULL,
  `sub_total` int(11) DEFAULT NULL,
  `grand_total` int(11) NOT NULL,
  `id_trx_pendaftaran` varchar(19) NOT NULL,
  `id_mst_pegawai` int(11) NOT NULL,
  `is_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_update` datetime DEFAULT NULL,
  `flag_aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trx_tindakan`
--

CREATE TABLE `trx_tindakan` (
  `id_trx_tindakan` int(11) NOT NULL,
  `id_trx_pendaftaran` varchar(19) NOT NULL,
  `id_mst_pegawai` int(11) NOT NULL,
  `total` varchar(15) NOT NULL,
  `tgl_tindakan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trx_tindakan`
--

INSERT INTO `trx_tindakan` (`id_trx_tindakan`, `id_trx_pendaftaran`, `id_mst_pegawai`, `total`, `tgl_tindakan`, `is_create`, `is_update`) VALUES
(2, 'P00001', 1, '950000', '2018-02-13 02:31:58', '2018-02-13 02:31:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id_user` int(11) NOT NULL,
  `id_mst_pegawai` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_delete` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id_user`, `id_mst_pegawai`, `username`, `password`, `is_create`, `is_delete`) VALUES
(1, 1, 'root', '$2y$10$0xDtwFyj/IA8/DXdcSjRx.axC7lxboCFikc2tLJtpf6rt/WJ9bNsS', '2018-02-05 10:05:59', NULL),
(2, 2, 'pendaftaran', '$2y$10$0xDtwFyj/IA8/DXdcSjRx.axC7lxboCFikc2tLJtpf6rt/WJ9bNsS', '2018-02-05 20:15:24', NULL),
(3, 6, 'dokter', '$2y$10$3cFzKw1PQSECMrrxMOPE.ev7w3crsfzq3V3VjnKNkNYwoRyoMnw2C', '2018-02-13 20:29:53', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_trx_tindakan`
--
ALTER TABLE `detail_trx_tindakan`
  ADD PRIMARY KEY (`id_detail_trx_tindakan`),
  ADD KEY `id_trx_tindakan` (`id_trx_tindakan`),
  ADD KEY `id_mst_tindakan` (`id_mst_tindakan`);

--
-- Indexes for table `group_access`
--
ALTER TABLE `group_access`
  ADD PRIMARY KEY (`id_group_acces`),
  ADD KEY `pegawai` (`id_mst_pegawai`),
  ADD KEY `group` (`id_mst_group`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id_kab`),
  ADD KEY `provinsi` (`id_prov`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kec`),
  ADD KEY `kabupaten` (`id_kab`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id_kel`),
  ADD KEY `id_kec` (`id_kec`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `menu_akses`
--
ALTER TABLE `menu_akses`
  ADD PRIMARY KEY (`id_menu_akses`),
  ADD KEY `group` (`id_mst_group`),
  ADD KEY `menu` (`id_menu`);

--
-- Indexes for table `mst_pasien`
--
ALTER TABLE `mst_pasien`
  ADD PRIMARY KEY (`id_mst_pasien`);

--
-- Indexes for table `mst_pegawai`
--
ALTER TABLE `mst_pegawai`
  ADD PRIMARY KEY (`id_mst_pegawai`);

--
-- Indexes for table `mst_tindakan`
--
ALTER TABLE `mst_tindakan`
  ADD PRIMARY KEY (`id_mst_tindakan`);

--
-- Indexes for table `pegawai_group`
--
ALTER TABLE `pegawai_group`
  ADD PRIMARY KEY (`id_mst_group`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_trx_pendaftaran`),
  ADD KEY `id_mst_pasien` (`id_mst_pasien`),
  ADD KEY `pegawai` (`id_mst_pegawai`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_prov`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id_resep`),
  ADD KEY `pendaftaran_resep` (`id_trx_pendaftaran`),
  ADD KEY `pegawai_resep` (`id_mst_pegawai`);

--
-- Indexes for table `trx_tindakan`
--
ALTER TABLE `trx_tindakan`
  ADD PRIMARY KEY (`id_trx_tindakan`),
  ADD KEY `id_trx_pendaftaran` (`id_trx_pendaftaran`),
  ADD KEY `id_mst_pegawai` (`id_mst_pegawai`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `pegawai` (`id_mst_pegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_trx_tindakan`
--
ALTER TABLE `detail_trx_tindakan`
  MODIFY `id_detail_trx_tindakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `group_access`
--
ALTER TABLE `group_access`
  MODIFY `id_group_acces` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id_kab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id_kel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `menu_akses`
--
ALTER TABLE `menu_akses`
  MODIFY `id_menu_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `mst_pasien`
--
ALTER TABLE `mst_pasien`
  MODIFY `id_mst_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mst_pegawai`
--
ALTER TABLE `mst_pegawai`
  MODIFY `id_mst_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `mst_tindakan`
--
ALTER TABLE `mst_tindakan`
  MODIFY `id_mst_tindakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pegawai_group`
--
ALTER TABLE `pegawai_group`
  MODIFY `id_mst_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id_prov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `trx_tindakan`
--
ALTER TABLE `trx_tindakan`
  MODIFY `id_trx_tindakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_trx_tindakan`
--
ALTER TABLE `detail_trx_tindakan`
  ADD CONSTRAINT `tindakan` FOREIGN KEY (`id_mst_tindakan`) REFERENCES `mst_tindakan` (`id_mst_tindakan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `trx_tindakan` FOREIGN KEY (`id_trx_tindakan`) REFERENCES `trx_tindakan` (`id_trx_tindakan`) ON UPDATE CASCADE;

--
-- Constraints for table `group_access`
--
ALTER TABLE `group_access`
  ADD CONSTRAINT `group` FOREIGN KEY (`id_mst_group`) REFERENCES `pegawai_group` (`id_mst_group`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pegawai` FOREIGN KEY (`id_mst_pegawai`) REFERENCES `mst_pegawai` (`id_mst_pegawai`) ON UPDATE CASCADE;

--
-- Constraints for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD CONSTRAINT `provinsi` FOREIGN KEY (`id_prov`) REFERENCES `provinsi` (`id_prov`) ON UPDATE CASCADE;

--
-- Constraints for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD CONSTRAINT `kabupaten` FOREIGN KEY (`id_kab`) REFERENCES `kabupaten` (`id_kab`) ON UPDATE CASCADE;

--
-- Constraints for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD CONSTRAINT `kecamatan` FOREIGN KEY (`id_kec`) REFERENCES `kecamatan` (`id_kec`) ON UPDATE CASCADE;

--
-- Constraints for table `menu_akses`
--
ALTER TABLE `menu_akses`
  ADD CONSTRAINT `group_akses` FOREIGN KEY (`id_mst_group`) REFERENCES `pegawai_group` (`id_mst_group`) ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_akses` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON UPDATE CASCADE;

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pasien_pendaftaran` FOREIGN KEY (`id_mst_pasien`) REFERENCES `mst_pasien` (`id_mst_pasien`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pegawai_pendaftaran` FOREIGN KEY (`id_mst_pegawai`) REFERENCES `mst_pegawai` (`id_mst_pegawai`) ON UPDATE CASCADE;

--
-- Constraints for table `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `pegawai_resep` FOREIGN KEY (`id_mst_pegawai`) REFERENCES `mst_pegawai` (`id_mst_pegawai`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pendaftaran_resep` FOREIGN KEY (`id_trx_pendaftaran`) REFERENCES `pendaftaran` (`id_trx_pendaftaran`) ON UPDATE CASCADE;

--
-- Constraints for table `trx_tindakan`
--
ALTER TABLE `trx_tindakan`
  ADD CONSTRAINT `pegawai_tindakan` FOREIGN KEY (`id_mst_pegawai`) REFERENCES `mst_pegawai` (`id_mst_pegawai`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pendaftaran_tindakan` FOREIGN KEY (`id_trx_pendaftaran`) REFERENCES `pendaftaran` (`id_trx_pendaftaran`) ON UPDATE CASCADE;

--
-- Constraints for table `user_login`
--
ALTER TABLE `user_login`
  ADD CONSTRAINT `pegawai_login` FOREIGN KEY (`id_mst_pegawai`) REFERENCES `mst_pegawai` (`id_mst_pegawai`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
