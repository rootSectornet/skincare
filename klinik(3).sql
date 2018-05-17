-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2018 at 12:17 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getAlamat` ()  BEGIN
SELECT * FROM kelurahan INNER JOIN kecamatan ON kecamatan.id_kec = kelurahan.id_kec INNER JOIN kabupaten ON kabupaten.id_kab = kecamatan.id_kab INNER JOIN provinsi ON provinsi.id_prov = kabupaten.id_prov;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getExpProduct` (IN `tanggal` DATE)  BEGIN
SELECT * FROM product WHERE product.exp <= tanggal;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getPasien` ()  BEGIN
SELECT * FROM mst_pasien INNER JOIN kelurahan ON kelurahan.id_kel = mst_pasien.id_kel INNER JOIN kecamatan ON kecamatan.id_kec = kelurahan.id_kec INNER JOIN kabupaten on kabupaten.id_kab = kecamatan.id_kab INNER JOIN provinsi ON provinsi.id_prov = kabupaten.id_prov;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getPasienById` (IN `id` CHAR(10))  BEGIN
SELECT * FROM mst_pasien  INNER JOIN kelurahan ON kelurahan.id_kel = mst_pasien.id_kel INNER JOIN kecamatan ON kecamatan.id_kec = kelurahan.id_kec INNER JOIN kabupaten ON kabupaten.id_kab = kecamatan.id_kab INNER JOIN provinsi ON provinsi.id_prov = kabupaten.id_prov WHERE mst_pasien.id_mst_pasien = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getPendaftaran` ()  BEGIN
SELECT * FROM pendaftaran INNER JOIN mst_pasien ON pendaftaran.id_mst_pasien = mst_pasien.id_mst_pasien INNER JOIN mst_pegawai ON mst_pegawai.id_mst_pegawai = pendaftaran.id_mst_pegawai INNER JOIN kelurahan ON kelurahan.id_kel = mst_pasien.id_kel INNER JOIN kecamatan ON kecamatan.id_kec = kelurahan.id_kec INNER JOIN kabupaten on kabupaten.id_kab = kecamatan.id_kab INNER JOIN provinsi ON provinsi.id_prov = kabupaten.id_prov;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getProduct` ()  BEGIN
SELECT * FROM product INNER JOIN mst_pegawai ON mst_pegawai.id_mst_pegawai = product.id_mst_pegawai;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `HitOutOfStock` ()  BEGIN
SELECT COUNT(qty) as s FROM product WHERE qty = '0';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `laporanPenerimaan` (IN `idSuplier` CHAR(20), IN `awal` DATE, IN `akhir` DATE)  BEGIN
SELECT * FROM penerimaan INNER JOIN mst_pegawai ON mst_pegawai.id_mst_pegawai = penerimaan.id_mst_pegawai WHERE penerimaan.id_suplier = idSuplier AND penerimaan.tgl_penerimaan >= awal AND penerimaan.tgl_penerimaan <= akhir;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `laporanPengunjung` (IN `flag` CHAR(5), IN `awal` DATE, IN `akhir` DATE)  BEGIN 
SELECT * FROM pendaftaran INNER JOIN mst_pasien ON mst_pasien.id_mst_pasien = pendaftaran.id_mst_pasien INNER JOIN mst_pegawai ON mst_pegawai.id_mst_pegawai = pendaftaran.id_mst_pegawai WHERE pendaftaran.flag_lunas = flag AND pendaftaran.tgl >= awal AND pendaftaran.tgl <= akhir;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `laporanPengunjungAll` (IN `awal` DATE, IN `akhir` DATE)  BEGIN 
SELECT * FROM pendaftaran INNER JOIN mst_pasien ON mst_pasien.id_mst_pasien = pendaftaran.id_mst_pasien INNER JOIN mst_pegawai ON mst_pegawai.id_mst_pegawai = pendaftaran.id_mst_pegawai WHERE pendaftaran.tgl >= awal AND pendaftaran.tgl <= akhir;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `laporanPenjualanAll` (IN `awal` DATE, IN `akhir` DATE)  BEGIN
SELECT * FROM billing INNER JOIN penjualan on penjualan.faktur_penjualan = billing.id_tagihan INNER JOIN mst_pegawai ON mst_pegawai.id_mst_pegawai = penjualan.id_mst_pegawai WHERE billing.flag_from = '2' AND penjualan.tgl_penjualan >= awal AND penjualan.tgl_penjualan <= akhir;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `laporanPenjualanBelumLunas` (IN `awal` DATE, IN `akhir` DATE)  BEGIN
SELECT * FROM billing INNER JOIN penjualan on penjualan.faktur_penjualan = billing.id_tagihan INNER JOIN mst_pegawai ON mst_pegawai.id_mst_pegawai = penjualan.id_mst_pegawai WHERE billing.flag_from = '2' AND penjualan.flag_lunas = '0' AND penjualan.tgl_penjualan >= awal AND penjualan.tgl_penjualan <= akhir;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `laporanPenjualanLunas` (IN `awal` DATE, IN `akhir` DATE)  BEGIN
SELECT * FROM billing INNER JOIN penjualan on penjualan.faktur_penjualan = billing.id_tagihan INNER JOIN mst_pegawai ON mst_pegawai.id_mst_pegawai = penjualan.id_mst_pegawai WHERE billing.flag_from = '2' AND penjualan.flag_lunas = '1' AND penjualan.tgl_penjualan >= awal AND penjualan.tgl_penjualan <= akhir;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listTagihanPasien` ()  BEGIN 
SELECT * FROM billing INNER JOIN pendaftaran ON pendaftaran.id_trx_pendaftaran = billing.id_trx_pendaftaran INNER JOIN mst_pegawai ON mst_pegawai.id_mst_pegawai = billing.id_mst_pegawai WHERE billing.flag_from = '1';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ListTagihanPasienByDate` (IN `tanggal` DATE)  BEGIN
SELECT * FROM billing INNER JOIN pendaftaran ON pendaftaran.id_trx_pendaftaran = billing.id_trx_pendaftaran INNER JOIN mst_pasien ON mst_pasien.id_mst_pasien = pendaftaran.id_mst_pasien WHERE pendaftaran.tgl = tanggal AND pendaftaran.flag_lunas = '0' AND pendaftaran.flag_aktif='1';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listTagihanPenjualan` ()  BEGIN 
SELECT * FROM billing INNER JOIN penjualan ON penjualan.faktur_penjualan = billing.id_tagihan INNER JOIN mst_pegawai ON mst_pegawai.id_mst_pegawai = billing.id_mst_pegawai WHERE billing.flag_from = '2' AND penjualan.flag_lunas = '0';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ListTagihanPenjualanByDate` (IN `tanggal` DATE)  BEGIN
SELECT * FROM billing INNER JOIN penjualan on penjualan.faktur_penjualan = billing.id_tagihan INNER JOIN mst_pegawai ON mst_pegawai.id_mst_pegawai = penjualan.id_mst_pegawai WHERE penjualan.flag_lunas = '0' AND penjualan.tgl_penjualan = tanggal;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `outOfStock` ()  BEGIN
SELECT * FROM product WHERE qty = '0';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `readKlurahan` ()  BEGIN 
SELECT * FROM kelurahan;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TotalTagihanPasien` (IN `id` CHAR(20))  BEGIN 
SELECT SUM(trx_tindakan.total) as tagihan FROM trx_tindakan WHERE trx_tindakan.id_trx_pendaftaran = id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `id_billing` int(11) NOT NULL,
  `id_tagihan` varchar(25) DEFAULT NULL,
  `flag_from` int(11) NOT NULL COMMENT '1=tindakan,2=penjualan',
  `id_trx_pendaftaran` varchar(25) DEFAULT NULL,
  `nilai_tagihan` varchar(25) NOT NULL,
  `nilai_terbayar` varchar(25) NOT NULL,
  `id_mst_pegawai` int(11) NOT NULL,
  `is_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_update` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`id_billing`, `id_tagihan`, `flag_from`, `id_trx_pendaftaran`, `nilai_tagihan`, `nilai_terbayar`, `id_mst_pegawai`, `is_create`, `is_update`) VALUES
(6, NULL, 1, 'P00001', '360000', '400000', 1, '2018-03-28 13:26:36', '2018-03-27 17:00:00'),
(8, 'FP00001', 2, NULL, '', '', 1, '2018-03-28 15:37:00', NULL),
(9, NULL, 1, 'P00002', '', '', 1, '2018-03-28 15:51:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_penerimaan`
--

CREATE TABLE `detail_penerimaan` (
  `id_detail_penerimaan` int(11) NOT NULL,
  `faktur_penerimaan` varchar(25) NOT NULL,
  `id_product` int(11) NOT NULL,
  `tgl_exp` date NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` varchar(25) NOT NULL,
  `harga_jual` varchar(25) NOT NULL,
  `sub_total` varchar(30) NOT NULL,
  `is_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_update` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_penerimaan`
--

INSERT INTO `detail_penerimaan` (`id_detail_penerimaan`, `faktur_penerimaan`, `id_product`, `tgl_exp`, `qty`, `harga`, `harga_jual`, `sub_total`, `is_create`, `is_update`) VALUES
(1, 'f001', 5, '2018-11-09', 50, '45000', '50000', '2250000', '2018-03-28 15:34:14', NULL),
(2, 'F002', 6, '2018-07-06', 0, '45000', '50000', '45', '2018-03-28 15:41:51', NULL),
(3, 'F002', 7, '2018-08-16', 60, '45000', '50000', '2700000', '2018-03-28 15:41:51', NULL),
(4, 'asda', 5, '2018-03-31', 2, '20000', '30000', '40000', '2018-03-29 15:39:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_detail_penjualan` int(11) NOT NULL,
  `faktur_penjualan` varchar(25) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` varchar(25) NOT NULL,
  `harga_beli` varchar(25) NOT NULL,
  `sub_total` varchar(25) NOT NULL,
  `is_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_update` timestamp NULL DEFAULT NULL,
  `flag_retur` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_detail_penjualan`, `faktur_penjualan`, `id_product`, `qty`, `harga`, `harga_beli`, `sub_total`, `is_create`, `is_update`, `flag_retur`) VALUES
(1, 'FP00001', 5, 2, '50000', '45000', '100000', '2018-03-28 15:37:00', NULL, 0);

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
(1, 1, 3, '110000', '2018-03-28 22:30:22', NULL),
(2, 2, 5, '130000', '2018-03-28 22:52:02', NULL);

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
(4, 6, 4, '2018-02-13 20:30:50', NULL),
(5, 7, 3, '2018-03-28 22:55:33', NULL);

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
(0, 1, 'Tangerang Selatan', '2018-02-09 00:14:43', NULL),
(1, 1, 'KABUPATEN PANDEGLANG', '0000-00-00 00:00:00', NULL),
(2, 1, 'KABUPATEN LEBAK', '0000-00-00 00:00:00', NULL),
(3, 1, 'KABUPATEN TANGERANG', '0000-00-00 00:00:00', NULL),
(4, 1, 'KABUPATEN SERANG', '0000-00-00 00:00:00', NULL),
(5, 1, 'KOTA TANGERANG', '0000-00-00 00:00:00', NULL),
(6, 1, 'KOTA CILEGON', '0000-00-00 00:00:00', NULL),
(7, 1, 'KOTA SERANG', '0000-00-00 00:00:00', NULL),
(8, 1, 'KOTA TANGERANG SELATAN', '0000-00-00 00:00:00', NULL),
(9, 2, 'KABUPATEN KEPULAUAN SERIBU', '2018-03-31 00:00:00', NULL),
(10, 2, 'KOTA JAKARTA SELATAN', '2018-03-31 00:00:00', NULL),
(11, 2, 'KOTA JAKARTA TIMUR', '2018-03-31 00:00:00', NULL),
(12, 2, 'KOTA JAKARTA PUSAT', '2018-03-31 00:00:00', NULL),
(13, 2, 'KOTA JAKARTA BARAT', '2018-03-31 00:00:00', NULL),
(14, 2, 'KOTA JAKARTA UTARA', '2018-03-31 00:00:00', NULL),
(2000, 1, 'Kabupaten Tangerang', '2018-03-29 21:48:29', NULL);

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
(1, 1, 'SUMUR', '0000-00-00 00:00:00', NULL),
(2, 1, 'CIMANGGU', '0000-00-00 00:00:00', NULL),
(3, 1, 'CIBALIUNG', '0000-00-00 00:00:00', NULL),
(4, 1, 'CIBITUNG', '0000-00-00 00:00:00', NULL),
(5, 1, 'CIKEUSIK', '0000-00-00 00:00:00', NULL),
(6, 1, 'CIGEULIS', '0000-00-00 00:00:00', NULL),
(7, 1, 'PANIMBANG', '0000-00-00 00:00:00', NULL),
(8, 1, 'SOBANG', '0000-00-00 00:00:00', NULL),
(9, 1, 'MUNJUL', '0000-00-00 00:00:00', NULL),
(10, 1, 'ANGSANA', '0000-00-00 00:00:00', NULL),
(11, 1, 'SINDANGRESMI', '0000-00-00 00:00:00', NULL),
(12, 1, 'PICUNG', '0000-00-00 00:00:00', NULL),
(13, 1, 'BOJONG', '0000-00-00 00:00:00', NULL),
(14, 1, 'SAKETI', '0000-00-00 00:00:00', NULL),
(15, 1, 'CISATA', '0000-00-00 00:00:00', NULL),
(16, 1, 'PAGELARAN', '0000-00-00 00:00:00', NULL),
(17, 1, 'PATIA', '0000-00-00 00:00:00', NULL),
(18, 1, 'SUKARESMI', '0000-00-00 00:00:00', NULL),
(19, 1, 'LABUAN', '0000-00-00 00:00:00', NULL),
(20, 1, 'CARITA', '0000-00-00 00:00:00', NULL),
(21, 1, 'JIPUT', '0000-00-00 00:00:00', NULL),
(22, 1, 'CIKEDAL', '0000-00-00 00:00:00', NULL),
(23, 1, 'MENES', '0000-00-00 00:00:00', NULL),
(24, 1, 'PULOSARI', '0000-00-00 00:00:00', NULL),
(25, 1, 'MANDALAWANGI', '0000-00-00 00:00:00', NULL),
(26, 1, 'CIMANUK', '0000-00-00 00:00:00', NULL),
(27, 1, 'CIPEUCANG', '0000-00-00 00:00:00', NULL),
(28, 1, 'BANJAR', '0000-00-00 00:00:00', NULL),
(29, 1, 'KADUHEJO', '0000-00-00 00:00:00', NULL),
(30, 1, 'MEKARJAYA', '0000-00-00 00:00:00', NULL),
(31, 1, 'PANDEGLANG', '0000-00-00 00:00:00', NULL),
(32, 1, 'MAJASARI', '0000-00-00 00:00:00', NULL),
(33, 1, 'CADASARI', '0000-00-00 00:00:00', NULL),
(34, 1, 'KARANGTANJUNG', '0000-00-00 00:00:00', NULL),
(35, 1, 'KORONCONG', '0000-00-00 00:00:00', NULL),
(36, 2, 'MALINGPING', '0000-00-00 00:00:00', NULL),
(37, 2, 'WANASALAM', '0000-00-00 00:00:00', NULL),
(38, 2, 'PANGGARANGAN', '0000-00-00 00:00:00', NULL),
(39, 2, 'CIHARA', '0000-00-00 00:00:00', NULL),
(40, 2, 'BAYAH', '0000-00-00 00:00:00', NULL),
(41, 2, 'CILOGRANG', '0000-00-00 00:00:00', NULL),
(42, 2, 'CIBEBER', '0000-00-00 00:00:00', NULL),
(43, 2, 'CIJAKU', '0000-00-00 00:00:00', NULL),
(44, 2, 'CIGEMBLONG', '0000-00-00 00:00:00', NULL),
(45, 2, 'BANJARSARI', '0000-00-00 00:00:00', NULL),
(46, 2, 'CILELES', '0000-00-00 00:00:00', NULL),
(47, 2, 'GUNUNG KENCANA', '0000-00-00 00:00:00', NULL),
(48, 2, 'BOJONGMANIK', '0000-00-00 00:00:00', NULL),
(49, 2, 'CIRINTEN', '0000-00-00 00:00:00', NULL),
(50, 2, 'LEUWIDAMAR', '0000-00-00 00:00:00', NULL),
(51, 2, 'MUNCANG', '0000-00-00 00:00:00', NULL),
(52, 2, 'SOBANG', '0000-00-00 00:00:00', NULL),
(53, 2, 'CIPANAS', '0000-00-00 00:00:00', NULL),
(54, 2, 'LEBAKGEDONG', '0000-00-00 00:00:00', NULL),
(55, 2, 'SAJIRA', '0000-00-00 00:00:00', NULL),
(56, 2, 'CIMARGA', '0000-00-00 00:00:00', NULL),
(57, 2, 'CIKULUR', '0000-00-00 00:00:00', NULL),
(58, 2, 'WARUNGGUNUNG', '0000-00-00 00:00:00', NULL),
(59, 2, 'CIBADAK', '0000-00-00 00:00:00', NULL),
(60, 2, 'RANGKASBITUNG', '0000-00-00 00:00:00', NULL),
(61, 2, 'KALANGANYAR', '0000-00-00 00:00:00', NULL),
(62, 2, 'MAJA', '0000-00-00 00:00:00', NULL),
(63, 2, 'CURUGBITUNG', '0000-00-00 00:00:00', NULL),
(64, 3, 'CISOKA', '0000-00-00 00:00:00', NULL),
(65, 3, 'SOLEAR', '0000-00-00 00:00:00', NULL),
(66, 3, 'TIGARAKSA', '0000-00-00 00:00:00', NULL),
(67, 3, 'JAMBE', '0000-00-00 00:00:00', NULL),
(68, 3, 'CIKUPA', '0000-00-00 00:00:00', NULL),
(69, 3, 'PANONGAN', '0000-00-00 00:00:00', NULL),
(70, 3, 'CURUG', '0000-00-00 00:00:00', NULL),
(71, 3, 'KELAPA DUA', '0000-00-00 00:00:00', NULL),
(72, 3, 'LEGOK', '0000-00-00 00:00:00', NULL),
(73, 3, 'PAGEDANGAN', '0000-00-00 00:00:00', NULL),
(74, 3, 'CISAUK', '0000-00-00 00:00:00', NULL),
(75, 3, 'PASARKEMIS', '0000-00-00 00:00:00', NULL),
(76, 3, 'SINDANG JAYA', '0000-00-00 00:00:00', NULL),
(77, 3, 'BALARAJA', '0000-00-00 00:00:00', NULL),
(78, 3, 'JAYANTI', '0000-00-00 00:00:00', NULL),
(79, 3, 'SUKAMULYA', '0000-00-00 00:00:00', NULL),
(80, 3, 'KRESEK', '0000-00-00 00:00:00', NULL),
(81, 3, 'GUNUNG KALER', '0000-00-00 00:00:00', NULL),
(82, 3, 'KRONJO', '0000-00-00 00:00:00', NULL),
(83, 3, 'MEKAR BARU', '0000-00-00 00:00:00', NULL),
(84, 3, 'MAUK', '0000-00-00 00:00:00', NULL),
(85, 3, 'KEMIRI', '0000-00-00 00:00:00', NULL),
(86, 3, 'SUKADIRI', '0000-00-00 00:00:00', NULL),
(87, 3, 'RAJEG', '0000-00-00 00:00:00', NULL),
(88, 3, 'SEPATAN', '0000-00-00 00:00:00', NULL),
(89, 3, 'SEPATAN TIMUR', '0000-00-00 00:00:00', NULL),
(90, 3, 'PAKUHAJI', '0000-00-00 00:00:00', NULL),
(91, 3, 'TELUKNAGA', '0000-00-00 00:00:00', NULL),
(92, 3, 'KOSAMBI', '0000-00-00 00:00:00', NULL),
(93, 4, 'CINANGKA', '0000-00-00 00:00:00', NULL),
(94, 4, 'PADARINCANG', '0000-00-00 00:00:00', NULL),
(95, 4, 'CIOMAS', '0000-00-00 00:00:00', NULL),
(96, 4, 'PABUARAN', '0000-00-00 00:00:00', NULL),
(97, 4, 'GUNUNG SARI', '0000-00-00 00:00:00', NULL),
(98, 4, 'BAROS', '0000-00-00 00:00:00', NULL),
(99, 4, 'PETIR', '0000-00-00 00:00:00', NULL),
(100, 4, 'TUNJUNG TEJA', '0000-00-00 00:00:00', NULL),
(101, 4, 'CIKEUSAL', '0000-00-00 00:00:00', NULL),
(102, 4, 'PAMARAYAN', '0000-00-00 00:00:00', NULL),
(103, 4, 'BANDUNG', '0000-00-00 00:00:00', NULL),
(104, 4, 'JAWILAN', '0000-00-00 00:00:00', NULL),
(105, 4, 'KOPO', '0000-00-00 00:00:00', NULL),
(106, 4, 'CIKANDE', '0000-00-00 00:00:00', NULL),
(107, 4, 'KIBIN', '0000-00-00 00:00:00', NULL),
(108, 4, 'KRAGILAN', '0000-00-00 00:00:00', NULL),
(109, 4, 'WARINGINKURUNG', '0000-00-00 00:00:00', NULL),
(110, 4, 'MANCAK', '0000-00-00 00:00:00', NULL),
(111, 4, 'ANYAR', '0000-00-00 00:00:00', NULL),
(112, 4, 'BOJONEGARA', '0000-00-00 00:00:00', NULL),
(113, 4, 'PULO AMPEL', '0000-00-00 00:00:00', NULL),
(114, 4, 'KRAMATWATU', '0000-00-00 00:00:00', NULL),
(115, 4, 'CIRUAS', '0000-00-00 00:00:00', NULL),
(116, 4, 'PONTANG', '0000-00-00 00:00:00', NULL),
(117, 4, 'LEBAK WANGI', '0000-00-00 00:00:00', NULL),
(118, 4, 'CARENANG', '0000-00-00 00:00:00', NULL),
(119, 4, 'BINUANG', '0000-00-00 00:00:00', NULL),
(120, 4, 'TIRTAYASA', '0000-00-00 00:00:00', NULL),
(121, 5, 'CILEDUG', '0000-00-00 00:00:00', NULL),
(122, 5, 'LARANGAN', '0000-00-00 00:00:00', NULL),
(123, 5, 'KARANG TENGAH', '0000-00-00 00:00:00', NULL),
(124, 5, 'CIPONDOH', '0000-00-00 00:00:00', NULL),
(125, 5, 'PINANG', '0000-00-00 00:00:00', NULL),
(126, 5, 'TANGERANG', '0000-00-00 00:00:00', NULL),
(127, 5, 'KARAWACI', '0000-00-00 00:00:00', NULL),
(128, 5, 'JATI UWUNG', '0000-00-00 00:00:00', NULL),
(129, 5, 'CIBODAS', '0000-00-00 00:00:00', NULL),
(130, 5, 'PERIUK', '0000-00-00 00:00:00', NULL),
(131, 5, 'BATUCEPER', '0000-00-00 00:00:00', NULL),
(132, 5, 'NEGLASARI', '0000-00-00 00:00:00', NULL),
(133, 5, 'BENDA', '0000-00-00 00:00:00', NULL),
(134, 6, 'CIWANDAN', '0000-00-00 00:00:00', NULL),
(135, 6, 'CITANGKIL', '0000-00-00 00:00:00', NULL),
(136, 6, 'PULOMERAK', '0000-00-00 00:00:00', NULL),
(137, 6, 'PURWAKARTA', '0000-00-00 00:00:00', NULL),
(138, 6, 'GROGOL', '0000-00-00 00:00:00', NULL),
(139, 6, 'CILEGON', '0000-00-00 00:00:00', NULL),
(140, 6, 'JOMBANG', '0000-00-00 00:00:00', NULL),
(141, 6, 'CIBEBER', '0000-00-00 00:00:00', NULL),
(142, 7, 'CURUG', '0000-00-00 00:00:00', NULL),
(143, 7, 'WALANTAKA', '0000-00-00 00:00:00', NULL),
(144, 7, 'CIPOCOK JAYA', '0000-00-00 00:00:00', NULL),
(145, 7, 'SERANG', '0000-00-00 00:00:00', NULL),
(146, 7, 'TAKTAKAN', '0000-00-00 00:00:00', NULL),
(147, 7, 'KASEMEN', '0000-00-00 00:00:00', NULL),
(148, 8, 'SETU', '0000-00-00 00:00:00', NULL),
(149, 8, 'SERPONG', '0000-00-00 00:00:00', NULL),
(150, 8, 'PAMULANG', '0000-00-00 00:00:00', NULL),
(151, 8, 'CIPUTAT', '0000-00-00 00:00:00', NULL),
(152, 8, 'CIPUTAT TIMUR', '0000-00-00 00:00:00', NULL),
(153, 8, 'PONDOK AREN', '0000-00-00 00:00:00', NULL),
(154, 8, 'SERPONG UTARA', '0000-00-00 00:00:00', NULL),
(155, 9, 'KEPULAUAN SERIBU SELATAN', '0000-00-00 00:00:00', NULL),
(156, 9, 'KEPULAUAN SERIBU UTARA', '0000-00-00 00:00:00', NULL),
(157, 10, 'JAGAKARSA', '0000-00-00 00:00:00', NULL),
(158, 10, 'PASAR MINGGU', '0000-00-00 00:00:00', NULL),
(159, 10, 'CILANDAK', '0000-00-00 00:00:00', NULL),
(160, 10, 'PESANGGRAHAN', '0000-00-00 00:00:00', NULL),
(161, 10, 'KEBAYORAN LAMA', '0000-00-00 00:00:00', NULL),
(162, 10, 'KEBAYORAN BARU', '0000-00-00 00:00:00', NULL),
(163, 10, 'MAMPANG PRAPATAN', '0000-00-00 00:00:00', NULL),
(164, 10, 'PANCORAN', '0000-00-00 00:00:00', NULL),
(165, 10, 'TEBET', '0000-00-00 00:00:00', NULL),
(166, 10, 'SETIA BUDI', '0000-00-00 00:00:00', NULL),
(167, 11, 'PASAR REBO', '0000-00-00 00:00:00', NULL),
(168, 11, 'CIRACAS', '0000-00-00 00:00:00', NULL),
(169, 11, 'CIPAYUNG', '0000-00-00 00:00:00', NULL),
(170, 11, 'MAKASAR', '0000-00-00 00:00:00', NULL),
(171, 11, 'KRAMAT JATI', '0000-00-00 00:00:00', NULL),
(172, 11, 'JATINEGARA', '0000-00-00 00:00:00', NULL),
(173, 11, 'DUREN SAWIT', '0000-00-00 00:00:00', NULL),
(174, 11, 'CAKUNG', '0000-00-00 00:00:00', NULL),
(175, 11, 'PULO GADUNG', '0000-00-00 00:00:00', NULL),
(176, 11, 'MATRAMAN', '0000-00-00 00:00:00', NULL),
(177, 12, 'TANAH ABANG', '0000-00-00 00:00:00', NULL),
(178, 12, 'MENTENG', '0000-00-00 00:00:00', NULL),
(179, 12, 'SENEN', '0000-00-00 00:00:00', NULL),
(180, 12, 'JOHAR BARU', '0000-00-00 00:00:00', NULL),
(181, 12, 'CEMPAKA PUTIH', '0000-00-00 00:00:00', NULL),
(182, 12, 'KEMAYORAN', '0000-00-00 00:00:00', NULL),
(183, 12, 'SAWAH BESAR', '0000-00-00 00:00:00', NULL),
(184, 12, 'GAMBIR', '0000-00-00 00:00:00', NULL),
(185, 13, 'KEMBANGAN', '0000-00-00 00:00:00', NULL),
(186, 13, 'KEBON JERUK', '0000-00-00 00:00:00', NULL),
(187, 13, 'PALMERAH', '0000-00-00 00:00:00', NULL),
(188, 13, 'GROGOL PETAMBURAN', '0000-00-00 00:00:00', NULL),
(189, 13, 'TAMBORA', '0000-00-00 00:00:00', NULL),
(190, 13, 'TAMAN SARI', '0000-00-00 00:00:00', NULL),
(191, 13, 'CENGKARENG', '0000-00-00 00:00:00', NULL),
(192, 13, 'KALI DERES', '0000-00-00 00:00:00', NULL),
(193, 14, 'PENJARINGAN', '0000-00-00 00:00:00', NULL),
(194, 14, 'PADEMANGAN', '0000-00-00 00:00:00', NULL),
(195, 14, 'TANJUNG PRIOK', '0000-00-00 00:00:00', NULL),
(196, 14, 'KOJA', '0000-00-00 00:00:00', NULL),
(197, 14, 'KELAPA GADING', '0000-00-00 00:00:00', NULL),
(198, 14, 'CILINCING', '0000-00-00 00:00:00', NULL);

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
(1, 1, 'UJUNGJAYA', '0000-00-00 00:00:00', NULL),
(2, 1, 'TAMANJAYA', '0000-00-00 00:00:00', NULL),
(3, 1, 'CIGORONDONG', '0000-00-00 00:00:00', NULL),
(4, 1, 'TUNGGALJAYA', '0000-00-00 00:00:00', NULL),
(5, 1, 'KERTAMUKTI', '0000-00-00 00:00:00', NULL),
(6, 1, 'KERTAJAYA', '0000-00-00 00:00:00', NULL),
(7, 1, 'SUMBERJAYA', '0000-00-00 00:00:00', NULL),
(8, 2, 'RANCAPINANG', '0000-00-00 00:00:00', NULL),
(9, 2, 'CIBADAK', '0000-00-00 00:00:00', NULL),
(10, 2, 'BATUHIDEUNG', '0000-00-00 00:00:00', NULL),
(11, 2, 'TUGU', '0000-00-00 00:00:00', NULL),
(12, 2, 'KRAMATJAYA', '0000-00-00 00:00:00', NULL),
(13, 2, 'MANGKUALAM', '0000-00-00 00:00:00', NULL),
(14, 2, 'PADASUKA', '0000-00-00 00:00:00', NULL),
(15, 2, 'CIBURIAL', '0000-00-00 00:00:00', NULL),
(16, 2, 'WARINGINKURUNG', '0000-00-00 00:00:00', NULL),
(17, 2, 'CIJARALANG', '0000-00-00 00:00:00', NULL),
(18, 2, 'CIMANGGU', '0000-00-00 00:00:00', NULL),
(19, 2, 'TANGKILSARI', '0000-00-00 00:00:00', NULL),
(20, 3, 'SUKAJADI', '0000-00-00 00:00:00', NULL),
(21, 3, 'SUDIMANIK', '0000-00-00 00:00:00', NULL),
(22, 3, 'SORONGAN', '0000-00-00 00:00:00', NULL),
(23, 3, 'CURUG', '0000-00-00 00:00:00', NULL),
(24, 3, 'CIHANJUANG', '0000-00-00 00:00:00', NULL),
(25, 3, 'CIBINGBIN', '0000-00-00 00:00:00', NULL),
(26, 3, 'CIBALIUNG', '0000-00-00 00:00:00', NULL),
(27, 3, 'MENDUNG', '0000-00-00 00:00:00', NULL),
(28, 3, 'MAHENDRA', '0000-00-00 00:00:00', NULL),
(29, 4, 'CITELUK', '0000-00-00 00:00:00', NULL),
(30, 4, 'SINDANGKERTA', '0000-00-00 00:00:00', NULL),
(31, 4, 'KIARAJANGKUNG', '0000-00-00 00:00:00', NULL),
(32, 4, 'KUTAKARANG', '0000-00-00 00:00:00', NULL),
(33, 4, 'CIKIRUH', '0000-00-00 00:00:00', NULL),
(34, 4, 'MALANGNENGAH', '0000-00-00 00:00:00', NULL),
(35, 4, 'CIKADU', '0000-00-00 00:00:00', NULL),
(36, 4, 'MANGLID', '0000-00-00 00:00:00', NULL),
(37, 4, 'KIARAPAYUNG', '0000-00-00 00:00:00', NULL),
(38, 4, 'CIKALONG', '0000-00-00 00:00:00', NULL),
(39, 5, 'TANJUNGAN', '0000-00-00 00:00:00', NULL),
(40, 5, 'CIKIRUHWETAN', '0000-00-00 00:00:00', NULL),
(41, 5, 'SUKAWARIS', '0000-00-00 00:00:00', NULL),
(42, 5, 'SUMURBATU', '0000-00-00 00:00:00', NULL),
(43, 5, 'UMBULAN', '0000-00-00 00:00:00', NULL),
(44, 5, 'SUKAMULYA', '0000-00-00 00:00:00', NULL),
(45, 5, 'PARUNGKOKOSAN', '0000-00-00 00:00:00', NULL),
(46, 5, 'NANGGALA', '0000-00-00 00:00:00', NULL),
(47, 5, 'RANCASENENG', '0000-00-00 00:00:00', NULL),
(48, 5, 'SUKASENENG', '0000-00-00 00:00:00', NULL),
(49, 5, 'CIKEUSIK', '0000-00-00 00:00:00', NULL),
(50, 5, 'LEUWIBALANG', '0000-00-00 00:00:00', NULL),
(51, 5, 'CURUGCIUNG', '0000-00-00 00:00:00', NULL),
(52, 5, 'CIKADONGDONG', '0000-00-00 00:00:00', NULL),
(53, 6, 'BANYUASIH', '0000-00-00 00:00:00', NULL),
(54, 6, 'KARANGBOLONG', '0000-00-00 00:00:00', NULL),
(55, 6, 'KARYABUANA', '0000-00-00 00:00:00', NULL),
(56, 6, 'KATUMBIRI', '0000-00-00 00:00:00', NULL),
(57, 6, 'WARINGINJAYA', '0000-00-00 00:00:00', NULL),
(58, 6, 'SINARJAYA', '0000-00-00 00:00:00', NULL),
(59, 6, 'CISEUREUHEUN', '0000-00-00 00:00:00', NULL),
(60, 6, 'CIGEULIS', '0000-00-00 00:00:00', NULL),
(61, 6, 'TARUMANAGARA', '0000-00-00 00:00:00', NULL),
(62, 7, 'MEKARJAYA', '0000-00-00 00:00:00', NULL),
(63, 7, 'GOMBONG', '0000-00-00 00:00:00', NULL),
(64, 7, 'PANIMBANGJAYA', '0000-00-00 00:00:00', NULL),
(65, 7, 'MEKARSARI', '0000-00-00 00:00:00', NULL),
(66, 7, 'CITEUREUP', '0000-00-00 00:00:00', NULL),
(67, 7, 'TANJUNGJAYA', '0000-00-00 00:00:00', NULL),
(68, 8, 'CIMANIS', '0000-00-00 00:00:00', NULL),
(69, 8, 'PANGKALAN', '0000-00-00 00:00:00', NULL),
(70, 8, 'SOBANG', '0000-00-00 00:00:00', NULL),
(71, 8, 'KUTAMEKAR', '0000-00-00 00:00:00', NULL),
(72, 8, 'BOJEN', '0000-00-00 00:00:00', NULL),
(73, 8, 'KERTARAHARJA', '0000-00-00 00:00:00', NULL),
(74, 8, 'TELUKLADA', '0000-00-00 00:00:00', NULL),
(75, 8, 'BOJENWETAN', '0000-00-00 00:00:00', NULL),
(76, 9, 'LEBAK', '0000-00-00 00:00:00', NULL),
(77, 9, 'GUNUNGBATU', '0000-00-00 00:00:00', NULL),
(78, 9, 'PANACARAN', '0000-00-00 00:00:00', NULL),
(79, 9, 'CURUGLANGLANG', '0000-00-00 00:00:00', NULL),
(80, 9, 'MUNJUL', '0000-00-00 00:00:00', NULL),
(81, 9, 'CIBITUNG', '0000-00-00 00:00:00', NULL),
(82, 9, 'KOTADUKUH', '0000-00-00 00:00:00', NULL),
(83, 9, 'PASANGGRAHAN', '0000-00-00 00:00:00', NULL),
(84, 9, 'SUKASABA', '0000-00-00 00:00:00', NULL),
(85, 10, 'CIPINANG', '0000-00-00 00:00:00', NULL),
(86, 10, 'KADUBADAK', '0000-00-00 00:00:00', NULL),
(87, 10, 'CIKAYAS', '0000-00-00 00:00:00', NULL),
(88, 10, 'SUMURLABAN', '0000-00-00 00:00:00', NULL),
(89, 10, 'PADAMULYA', '0000-00-00 00:00:00', NULL),
(90, 10, 'PADAHERANG', '0000-00-00 00:00:00', NULL),
(91, 10, 'KARANGSARI', '0000-00-00 00:00:00', NULL),
(92, 10, 'ANGSANA', '0000-00-00 00:00:00', NULL),
(93, 10, 'KRAMATMANIK', '0000-00-00 00:00:00', NULL),
(94, 11, 'PASIRLOA', '0000-00-00 00:00:00', NULL),
(95, 11, 'BOJONGMANIK', '0000-00-00 00:00:00', NULL),
(96, 11, 'CAMPAKAWARNA', '0000-00-00 00:00:00', NULL),
(97, 11, 'CIODENG', '0000-00-00 00:00:00', NULL),
(98, 11, 'PASIRTENJO', '0000-00-00 00:00:00', NULL),
(99, 11, 'SINDANGRESMI', '0000-00-00 00:00:00', NULL),
(100, 11, 'PASIRLANCAR', '0000-00-00 00:00:00', NULL),
(101, 11, 'PASIRDURUNG', '0000-00-00 00:00:00', NULL),
(102, 11, 'KADUMALATI', '0000-00-00 00:00:00', NULL),
(103, 12, 'CIHERANG', '0000-00-00 00:00:00', NULL),
(104, 12, 'KOLELET', '0000-00-00 00:00:00', NULL),
(105, 12, 'CILILITAN', '0000-00-00 00:00:00', NULL),
(106, 12, 'KADUPANDAK', '0000-00-00 00:00:00', NULL),
(107, 12, 'BUNGURCOPONG', '0000-00-00 00:00:00', NULL),
(108, 12, 'PASIRSEDANG', '0000-00-00 00:00:00', NULL),
(109, 12, 'PASIRPANJANG', '0000-00-00 00:00:00', NULL),
(110, 12, 'KADUBERA', '0000-00-00 00:00:00', NULL),
(111, 12, 'GANGGAENG', '0000-00-00 00:00:00', NULL),
(112, 13, 'GEREDUG', '0000-00-00 00:00:00', NULL),
(113, 13, 'MEKARSARI', '0000-00-00 00:00:00', NULL),
(114, 13, 'CIJAKAN', '0000-00-00 00:00:00', NULL),
(115, 13, 'CITUMENGGUNG', '0000-00-00 00:00:00', NULL),
(116, 13, 'CAHAYAMEKAR', '0000-00-00 00:00:00', NULL),
(117, 13, 'BOJONG', '0000-00-00 00:00:00', NULL),
(118, 13, 'BANYUMAS', '0000-00-00 00:00:00', NULL),
(119, 13, 'MANGGUNGJAYA', '0000-00-00 00:00:00', NULL),
(120, 14, 'SUKALANGU', '0000-00-00 00:00:00', NULL),
(121, 14, 'LANGENSARI', '0000-00-00 00:00:00', NULL),
(122, 14, 'MAJAU', '0000-00-00 00:00:00', NULL),
(123, 14, 'MEDALSARI', '0000-00-00 00:00:00', NULL),
(124, 14, 'SODONG', '0000-00-00 00:00:00', NULL),
(125, 14, 'MEKARWANGI', '0000-00-00 00:00:00', NULL),
(126, 14, 'CIANDUR', '0000-00-00 00:00:00', NULL),
(127, 14, 'SAKETI', '0000-00-00 00:00:00', NULL),
(128, 14, 'KADUDAMPIT', '0000-00-00 00:00:00', NULL),
(129, 14, 'GIRIJAYA', '0000-00-00 00:00:00', NULL),
(130, 14, 'WANAGIRI', '0000-00-00 00:00:00', NULL),
(131, 14, 'PARIGI', '0000-00-00 00:00:00', NULL),
(132, 14, 'TALAGASARI', '0000-00-00 00:00:00', NULL),
(133, 14, 'SINDANGHAYU', '0000-00-00 00:00:00', NULL),
(134, 15, 'KONDANGJAYA', '0000-00-00 00:00:00', NULL),
(135, 15, 'KUBANGKONDANG', '0000-00-00 00:00:00', NULL),
(136, 15, 'CISEREH', '0000-00-00 00:00:00', NULL),
(137, 15, 'CIBARANI', '0000-00-00 00:00:00', NULL),
(138, 15, 'RAWASARI', '0000-00-00 00:00:00', NULL),
(139, 15, 'PASIREURIH', '0000-00-00 00:00:00', NULL),
(140, 15, 'KADURONYOK', '0000-00-00 00:00:00', NULL),
(141, 15, 'CIHERANGJAYA', '0000-00-00 00:00:00', NULL),
(142, 15, 'PALEMBANG', '0000-00-00 00:00:00', NULL),
(143, 16, 'TEGALPAPAK', '0000-00-00 00:00:00', NULL),
(144, 16, 'MARGAGIRI', '0000-00-00 00:00:00', NULL),
(145, 16, 'BAMA', '0000-00-00 00:00:00', NULL),
(146, 16, 'PAGELARAN', '0000-00-00 00:00:00', NULL),
(147, 16, 'SUKADAME', '0000-00-00 00:00:00', NULL),
(148, 16, 'BULAGOR', '0000-00-00 00:00:00', NULL),
(149, 16, 'SURAKARTA', '0000-00-00 00:00:00', NULL),
(150, 16, 'HARAPANKARYA', '0000-00-00 00:00:00', NULL),
(151, 16, 'MONTOR', '0000-00-00 00:00:00', NULL),
(152, 16, 'KARTASANA', '0000-00-00 00:00:00', NULL),
(153, 16, 'SENANGSARI', '0000-00-00 00:00:00', NULL),
(154, 16, 'SINDANGLAYA', '0000-00-00 00:00:00', NULL),
(155, 16, 'MARGASANA', '0000-00-00 00:00:00', NULL),
(156, 17, 'TURUS', '0000-00-00 00:00:00', NULL),
(157, 17, 'PASIRGADUNG', '0000-00-00 00:00:00', NULL),
(158, 17, 'PATIA', '0000-00-00 00:00:00', NULL),
(159, 17, 'BABAKANKEUSIK', '0000-00-00 00:00:00', NULL),
(160, 17, 'CIMOYAN', '0000-00-00 00:00:00', NULL),
(161, 17, 'IDAMAN', '0000-00-00 00:00:00', NULL),
(162, 17, 'CIAWI', '0000-00-00 00:00:00', NULL),
(163, 17, 'SURIANEUN', '0000-00-00 00:00:00', NULL),
(164, 17, 'RAHAYU', '0000-00-00 00:00:00', NULL),
(165, 17, 'SIMPANGTIGA', '0000-00-00 00:00:00', NULL),
(166, 18, 'SEUSEUPAN', '0000-00-00 00:00:00', NULL),
(167, 18, 'KARYASARI', '0000-00-00 00:00:00', NULL),
(168, 18, 'PASIRKADU', '0000-00-00 00:00:00', NULL),
(169, 18, 'PERDANA', '0000-00-00 00:00:00', NULL),
(170, 18, 'SUKARESMI', '0000-00-00 00:00:00', NULL),
(171, 18, 'KUBANGKAMPIL', '0000-00-00 00:00:00', NULL),
(172, 18, 'SIDAMUKTI', '0000-00-00 00:00:00', NULL),
(173, 18, 'CIBUNGUR', '0000-00-00 00:00:00', NULL),
(174, 18, 'WERU', '0000-00-00 00:00:00', NULL),
(175, 18, 'CIKUYA', '0000-00-00 00:00:00', NULL),
(176, 19, 'CIGONDANG', '0000-00-00 00:00:00', NULL),
(177, 19, 'SUKAMAJU', '0000-00-00 00:00:00', NULL),
(178, 19, 'RANCATEUREUP', '0000-00-00 00:00:00', NULL),
(179, 19, 'KALANGANYAR', '0000-00-00 00:00:00', NULL),
(180, 19, 'LABUAN', '0000-00-00 00:00:00', NULL),
(181, 19, 'TELUK', '0000-00-00 00:00:00', NULL),
(182, 19, 'BANYUMEKAR', '0000-00-00 00:00:00', NULL),
(183, 19, 'BANYUBIRU', '0000-00-00 00:00:00', NULL),
(184, 19, 'CARINGIN', '0000-00-00 00:00:00', NULL),
(185, 20, 'PEJAMBEN', '0000-00-00 00:00:00', NULL),
(186, 20, 'BANJARMASIN', '0000-00-00 00:00:00', NULL),
(187, 20, 'TEMBONG', '0000-00-00 00:00:00', NULL),
(188, 20, 'SINDANGLAUT', '0000-00-00 00:00:00', NULL),
(189, 20, 'CARITA', '0000-00-00 00:00:00', NULL),
(190, 20, 'SUKAJADI', '0000-00-00 00:00:00', NULL),
(191, 20, 'SUKARAME', '0000-00-00 00:00:00', NULL),
(192, 20, 'SUKANAGARA', '0000-00-00 00:00:00', NULL),
(193, 20, 'KAWOYANG', '0000-00-00 00:00:00', NULL),
(194, 20, 'CINOYONG', '0000-00-00 00:00:00', NULL),
(195, 21, 'BANYURESMI', '0000-00-00 00:00:00', NULL),
(196, 21, 'SALAPRAYA', '0000-00-00 00:00:00', NULL),
(197, 21, 'PAMARAYAN', '0000-00-00 00:00:00', NULL),
(198, 21, 'SAMPANGBITUNG', '0000-00-00 00:00:00', NULL),
(199, 21, 'JIPUT', '0000-00-00 00:00:00', NULL),
(200, 21, 'SUKACAI', '0000-00-00 00:00:00', NULL),
(201, 21, 'TENJOLAHANG', '0000-00-00 00:00:00', NULL),
(202, 21, 'BABADSARI', '0000-00-00 00:00:00', NULL),
(203, 21, 'JANAKA', '0000-00-00 00:00:00', NULL),
(204, 21, 'SUKAMANAH', '0000-00-00 00:00:00', NULL),
(205, 21, 'SIKULAN', '0000-00-00 00:00:00', NULL),
(206, 21, 'CITAMAN', '0000-00-00 00:00:00', NULL),
(207, 21, 'JAYAMEKAR', '0000-00-00 00:00:00', NULL),
(208, 22, 'KARYAUTAMA', '0000-00-00 00:00:00', NULL),
(209, 22, 'TEGAL', '0000-00-00 00:00:00', NULL),
(210, 22, 'CIPICUNG', '0000-00-00 00:00:00', NULL),
(211, 22, 'KARYASARI', '0000-00-00 00:00:00', NULL),
(212, 22, 'DAHU', '0000-00-00 00:00:00', NULL),
(213, 22, 'BABAKANLOR', '0000-00-00 00:00:00', NULL),
(214, 22, 'MEKARJAYA', '0000-00-00 00:00:00', NULL),
(215, 22, 'PADAHAYU', '0000-00-00 00:00:00', NULL),
(216, 22, 'BANGKUYUNG', '0000-00-00 00:00:00', NULL),
(217, 22, 'CENING', '0000-00-00 00:00:00', NULL),
(218, 23, 'ALASWANGI', '0000-00-00 00:00:00', NULL),
(219, 23, 'TEGALWANGI', '0000-00-00 00:00:00', NULL),
(220, 23, 'MENES', '0000-00-00 00:00:00', NULL),
(221, 23, 'KANANGA', '0000-00-00 00:00:00', NULL),
(222, 23, 'CILABANBULAN', '0000-00-00 00:00:00', NULL),
(223, 23, 'SINDANGKARYA', '0000-00-00 00:00:00', NULL),
(224, 23, 'CIGANDENG', '0000-00-00 00:00:00', NULL),
(225, 23, 'PURWARAJA', '0000-00-00 00:00:00', NULL),
(226, 23, 'MURUY', '0000-00-00 00:00:00', NULL),
(227, 23, 'KADUPAYUNG', '0000-00-00 00:00:00', NULL),
(228, 23, 'SUKAMANAH', '0000-00-00 00:00:00', NULL),
(229, 23, 'RAMAYA', '0000-00-00 00:00:00', NULL),
(230, 24, 'BANJARNEGARA', '0000-00-00 00:00:00', NULL),
(231, 24, 'KADUHEJO', '0000-00-00 00:00:00', NULL),
(232, 24, 'KORANJI', '0000-00-00 00:00:00', NULL),
(233, 24, 'SANGHIANGDENGDEK', '0000-00-00 00:00:00', NULL),
(234, 24, 'CILENTUNG', '0000-00-00 00:00:00', NULL),
(235, 24, 'KARYAWANGI', '0000-00-00 00:00:00', NULL),
(236, 24, 'BANJARWANGI', '0000-00-00 00:00:00', NULL),
(237, 24, 'SUKASARI', '0000-00-00 00:00:00', NULL),
(238, 24, 'SUKARAJA', '0000-00-00 00:00:00', NULL),
(239, 25, 'PANDAT', '0000-00-00 00:00:00', NULL),
(240, 25, 'CIKONENG', '0000-00-00 00:00:00', NULL),
(241, 25, 'GIRIPAWANA', '0000-00-00 00:00:00', NULL),
(242, 25, 'NEMBOL', '0000-00-00 00:00:00', NULL),
(243, 25, 'GUNUNGSARI', '0000-00-00 00:00:00', NULL),
(244, 25, 'KURUNGKAMBING', '0000-00-00 00:00:00', NULL),
(245, 25, 'MANDALASARI', '0000-00-00 00:00:00', NULL),
(246, 25, 'MANDALAWANGI', '0000-00-00 00:00:00', NULL),
(247, 25, 'PARI', '0000-00-00 00:00:00', NULL),
(248, 25, 'SINARJAYA', '0000-00-00 00:00:00', NULL),
(249, 25, 'SIRNAGALIH', '0000-00-00 00:00:00', NULL),
(250, 25, 'CURUGLEMO', '0000-00-00 00:00:00', NULL),
(251, 25, 'PANJANGJAYA', '0000-00-00 00:00:00', NULL),
(252, 25, 'CIKUMBUEUN', '0000-00-00 00:00:00', NULL),
(253, 25, 'RAMEA', '0000-00-00 00:00:00', NULL),
(254, 26, 'KADUDODOL', '0000-00-00 00:00:00', NULL),
(255, 26, 'GUNUNGDATAR', '0000-00-00 00:00:00', NULL),
(256, 26, 'GUNUNGCUPU', '0000-00-00 00:00:00', NULL),
(257, 26, 'SEKONG', '0000-00-00 00:00:00', NULL),
(258, 26, 'CIMANUK', '0000-00-00 00:00:00', NULL),
(259, 26, 'BATUBANTAR', '0000-00-00 00:00:00', NULL),
(260, 26, 'ROCEK', '0000-00-00 00:00:00', NULL),
(261, 26, 'KADUMADANG', '0000-00-00 00:00:00', NULL),
(262, 26, 'DALEMBALAR', '0000-00-00 00:00:00', NULL),
(263, 26, 'KUPAHANDAP', '0000-00-00 00:00:00', NULL),
(264, 26, 'KADUBUNGBANG', '0000-00-00 00:00:00', NULL),
(265, 27, 'CIKADUEUN', '0000-00-00 00:00:00', NULL),
(266, 27, 'KONCANG', '0000-00-00 00:00:00', NULL),
(267, 27, 'PASIRMAE', '0000-00-00 00:00:00', NULL),
(268, 27, 'PARUMASAN', '0000-00-00 00:00:00', NULL),
(269, 27, 'KADUGADUNG', '0000-00-00 00:00:00', NULL),
(270, 27, 'PALANYAR', '0000-00-00 00:00:00', NULL),
(271, 27, 'BATURANJANG', '0000-00-00 00:00:00', NULL),
(272, 27, 'KALANGGUNUNG', '0000-00-00 00:00:00', NULL),
(273, 27, 'CURUGBARANG', '0000-00-00 00:00:00', NULL),
(274, 27, 'PASIREURIH', '0000-00-00 00:00:00', NULL),
(275, 28, 'CIBEUREUM', '0000-00-00 00:00:00', NULL),
(276, 28, 'CIBODAS', '0000-00-00 00:00:00', NULL),
(277, 28, 'KADULIMUS', '0000-00-00 00:00:00', NULL),
(278, 28, 'BANDUNG', '0000-00-00 00:00:00', NULL),
(279, 28, 'KADUMANEUH', '0000-00-00 00:00:00', NULL),
(280, 28, 'CITALAHAB', '0000-00-00 00:00:00', NULL),
(281, 28, 'PASIRAWI', '0000-00-00 00:00:00', NULL),
(282, 28, 'MOGANA', '0000-00-00 00:00:00', NULL),
(283, 28, 'KADUBALE', '0000-00-00 00:00:00', NULL),
(284, 28, 'BANJAR', '0000-00-00 00:00:00', NULL),
(285, 28, 'GUNUNGPUTRI', '0000-00-00 00:00:00', NULL),
(286, 29, 'BANJARSARI', '0000-00-00 00:00:00', NULL),
(287, 29, 'SUKAMANAH', '0000-00-00 00:00:00', NULL),
(288, 29, 'PALURAHAN', '0000-00-00 00:00:00', NULL),
(289, 29, 'KADUGEMBLO', '0000-00-00 00:00:00', NULL),
(290, 29, 'SUKASARI', '0000-00-00 00:00:00', NULL),
(291, 29, 'MANDALASARI', '0000-00-00 00:00:00', NULL),
(292, 29, 'SANINTEN', '0000-00-00 00:00:00', NULL),
(293, 29, 'BAYUMUNDU', '0000-00-00 00:00:00', NULL),
(294, 29, 'CAMPAKA', '0000-00-00 00:00:00', NULL),
(295, 29, 'CIPUTRI', '0000-00-00 00:00:00', NULL),
(296, 30, 'RANCABUGEL', '0000-00-00 00:00:00', NULL),
(297, 30, 'WIRASINGA', '0000-00-00 00:00:00', NULL),
(298, 30, 'PAREANG', '0000-00-00 00:00:00', NULL),
(299, 30, 'KADUBELANG', '0000-00-00 00:00:00', NULL),
(300, 30, 'MEKARJAYA', '0000-00-00 00:00:00', NULL),
(301, 30, 'KADUJANGKUNG', '0000-00-00 00:00:00', NULL),
(302, 30, 'MEDONG', '0000-00-00 00:00:00', NULL),
(303, 30, 'SUKAMULYA', '0000-00-00 00:00:00', NULL),
(304, 31, 'KADOMAS', '0000-00-00 00:00:00', NULL),
(305, 31, 'BABAKAN KALANGANYAR', '0000-00-00 00:00:00', NULL),
(306, 31, 'KABAYAN', '0000-00-00 00:00:00', NULL),
(307, 31, 'PANDEGLANG', '0000-00-00 00:00:00', NULL),
(308, 32, 'SUKARATU', '0000-00-00 00:00:00', NULL),
(309, 32, 'KARATON', '0000-00-00 00:00:00', NULL),
(310, 32, 'CILAJA', '0000-00-00 00:00:00', NULL),
(311, 32, 'SARUNI', '0000-00-00 00:00:00', NULL),
(312, 32, 'PAGERBATU', '0000-00-00 00:00:00', NULL),
(313, 33, 'CIKENTRUNG', '0000-00-00 00:00:00', NULL),
(314, 33, 'KAUNGCAANG', '0000-00-00 00:00:00', NULL),
(315, 33, 'CIINJUK', '0000-00-00 00:00:00', NULL),
(316, 33, 'CADASARI', '0000-00-00 00:00:00', NULL),
(317, 33, 'TAPOS', '0000-00-00 00:00:00', NULL),
(318, 33, 'TANAGARA', '0000-00-00 00:00:00', NULL),
(319, 33, 'KURUNGDAHU', '0000-00-00 00:00:00', NULL),
(320, 33, 'PASIRPEUTEUY', '0000-00-00 00:00:00', NULL),
(321, 33, 'KADUENGANG', '0000-00-00 00:00:00', NULL),
(322, 33, 'KADUELA', '0000-00-00 00:00:00', NULL),
(323, 33, 'KORANJI', '0000-00-00 00:00:00', NULL),
(324, 34, 'KADUMERAK', '0000-00-00 00:00:00', NULL),
(325, 34, 'PAGADUNGAN', '0000-00-00 00:00:00', NULL),
(326, 34, 'CIGADUNG', '0000-00-00 00:00:00', NULL),
(327, 34, 'JUHUT', '0000-00-00 00:00:00', NULL),
(328, 35, 'PASIRJAKSA', '0000-00-00 00:00:00', NULL),
(329, 35, 'BANGKONOL', '0000-00-00 00:00:00', NULL),
(330, 35, 'TEGALONGOK', '0000-00-00 00:00:00', NULL),
(331, 35, 'PASIRKARAG', '0000-00-00 00:00:00', NULL),
(332, 35, 'PANIIS', '0000-00-00 00:00:00', NULL),
(333, 35, 'SETRAJAYA', '0000-00-00 00:00:00', NULL),
(334, 35, 'KARANGSETRA', '0000-00-00 00:00:00', NULL),
(335, 35, 'PAKULURAN', '0000-00-00 00:00:00', NULL),
(336, 35, 'KORONCONG', '0000-00-00 00:00:00', NULL),
(337, 35, 'GERENDONG', '0000-00-00 00:00:00', NULL),
(338, 35, 'AWILEGA', '0000-00-00 00:00:00', NULL),
(339, 35, 'SUKAJAYA', '0000-00-00 00:00:00', NULL),
(340, 36, 'SUKAMANAH', '0000-00-00 00:00:00', NULL),
(341, 36, 'MALINGPING SELATAN', '0000-00-00 00:00:00', NULL),
(342, 36, 'CILANGKAHAN', '0000-00-00 00:00:00', NULL),
(343, 36, 'PAGELARAN', '0000-00-00 00:00:00', NULL),
(344, 36, 'KERSARATU', '0000-00-00 00:00:00', NULL),
(345, 36, 'SUKARAJA', '0000-00-00 00:00:00', NULL),
(346, 36, 'KADUJAJAR', '0000-00-00 00:00:00', NULL),
(347, 36, 'MALINGPING UTARA', '0000-00-00 00:00:00', NULL),
(348, 36, 'RAHONG', '0000-00-00 00:00:00', NULL),
(349, 36, 'SANGHIANG', '0000-00-00 00:00:00', NULL),
(350, 36, 'BOLANG', '0000-00-00 00:00:00', NULL),
(351, 36, 'SUMBER WARAS', '0000-00-00 00:00:00', NULL),
(352, 36, 'CIPEUNDEUY', '0000-00-00 00:00:00', NULL),
(353, 36, 'SENANGHATI', '0000-00-00 00:00:00', NULL),
(354, 37, 'MUARA', '0000-00-00 00:00:00', NULL),
(355, 37, 'WANASALAM', '0000-00-00 00:00:00', NULL),
(356, 37, 'SUKATANI', '0000-00-00 00:00:00', NULL),
(357, 37, 'CIKEUSIK', '0000-00-00 00:00:00', NULL),
(358, 37, 'BEJOD', '0000-00-00 00:00:00', NULL),
(359, 37, 'CIPEDANG', '0000-00-00 00:00:00', NULL),
(360, 37, 'CISARAP', '0000-00-00 00:00:00', NULL),
(361, 37, 'PARUNGSARI', '0000-00-00 00:00:00', NULL),
(362, 37, 'CIPEUCANG', '0000-00-00 00:00:00', NULL),
(363, 37, 'PARUNGPANJANG', '0000-00-00 00:00:00', NULL),
(364, 37, 'KETAPANG', '0000-00-00 00:00:00', NULL),
(365, 37, 'CILANGKAP', '0000-00-00 00:00:00', NULL),
(366, 37, 'KARANG PAMINDANGAN', '0000-00-00 00:00:00', NULL),
(367, 38, 'SITUREGEN', '0000-00-00 00:00:00', NULL),
(368, 38, 'SUKAJADI', '0000-00-00 00:00:00', NULL),
(369, 38, 'HEGARMANAH', '0000-00-00 00:00:00', NULL),
(370, 38, 'PANGGARANGAN', '0000-00-00 00:00:00', NULL),
(371, 38, 'MEKARJAYA', '0000-00-00 00:00:00', NULL),
(372, 38, 'SINDANGRATU', '0000-00-00 00:00:00', NULL),
(373, 38, 'CIMANDIRI', '0000-00-00 00:00:00', NULL),
(374, 38, 'GUNUNG GEDE', '0000-00-00 00:00:00', NULL),
(375, 38, 'SOGONG', '0000-00-00 00:00:00', NULL),
(376, 38, 'JATAKE', '0000-00-00 00:00:00', NULL),
(377, 38, 'CIBARENGKOK', '0000-00-00 00:00:00', NULL),
(378, 39, 'PONDOKPANJANG', '0000-00-00 00:00:00', NULL),
(379, 39, 'CIPARAHU', '0000-00-00 00:00:00', NULL),
(380, 39, 'CIHARA', '0000-00-00 00:00:00', NULL),
(381, 39, 'KARANGKAMULYAN', '0000-00-00 00:00:00', NULL),
(382, 39, 'PANYAUNGAN', '0000-00-00 00:00:00', NULL),
(383, 39, 'MEKARSARI', '0000-00-00 00:00:00', NULL),
(384, 39, 'LEBAK PEUNDEUY', '0000-00-00 00:00:00', NULL),
(385, 39, 'CITEPUSEUN', '0000-00-00 00:00:00', NULL),
(386, 39, 'BARUNAI', '0000-00-00 00:00:00', NULL),
(387, 40, 'BAYAH BARAT', '0000-00-00 00:00:00', NULL),
(388, 40, 'DARMASARI', '0000-00-00 00:00:00', NULL),
(389, 40, 'SAWARNA', '0000-00-00 00:00:00', NULL),
(390, 40, 'CIDIKIT', '0000-00-00 00:00:00', NULL),
(391, 40, 'BAYAH TIMUR', '0000-00-00 00:00:00', NULL),
(392, 40, 'CIMANCAK', '0000-00-00 00:00:00', NULL),
(393, 40, 'SUWAKAN', '0000-00-00 00:00:00', NULL),
(394, 40, 'PASIRGOMBONG', '0000-00-00 00:00:00', NULL),
(395, 40, 'CISUREN', '0000-00-00 00:00:00', NULL),
(396, 40, 'PAMUBULAN', '0000-00-00 00:00:00', NULL),
(397, 40, 'SAWARNA TIMUR', '0000-00-00 00:00:00', NULL),
(398, 41, 'CIBARENO', '0000-00-00 00:00:00', NULL),
(399, 41, 'CILOGRANG', '0000-00-00 00:00:00', NULL),
(400, 41, 'LEBAKTIPAR', '0000-00-00 00:00:00', NULL),
(401, 41, 'CIKATOMAS', '0000-00-00 00:00:00', NULL),
(402, 41, 'CIJENGKOL', '0000-00-00 00:00:00', NULL),
(403, 41, 'PASIRBUNGUR', '0000-00-00 00:00:00', NULL),
(404, 41, 'CIKAMUNDING', '0000-00-00 00:00:00', NULL),
(405, 41, 'GIRIMUKTI', '0000-00-00 00:00:00', NULL),
(406, 41, 'CIREUNDEU', '0000-00-00 00:00:00', NULL),
(407, 41, 'GUNUNGBATU', '0000-00-00 00:00:00', NULL),
(408, 42, 'CIKOTOK', '0000-00-00 00:00:00', NULL),
(409, 42, 'CIBEBER', '0000-00-00 00:00:00', NULL),
(410, 42, 'WARUNGBANTEN', '0000-00-00 00:00:00', NULL),
(411, 42, 'NEGLASARI', '0000-00-00 00:00:00', NULL),
(412, 42, 'MEKARSARI', '0000-00-00 00:00:00', NULL),
(413, 42, 'CIKADU', '0000-00-00 00:00:00', NULL),
(414, 42, 'KUJANGJAYA', '0000-00-00 00:00:00', NULL),
(415, 42, 'CISUNGSANG', '0000-00-00 00:00:00', NULL),
(416, 42, 'HEGARMANAH', '0000-00-00 00:00:00', NULL),
(417, 42, 'CIHAMBALI', '0000-00-00 00:00:00', NULL),
(418, 42, 'SUKAMULYA', '0000-00-00 00:00:00', NULL),
(419, 42, 'CITOREK TENGAH', '0000-00-00 00:00:00', NULL),
(420, 42, 'CITOREK TIMUR', '0000-00-00 00:00:00', NULL),
(421, 42, 'CITOREK KIDUL', '0000-00-00 00:00:00', NULL),
(422, 42, 'KUJANGSARI', '0000-00-00 00:00:00', NULL),
(423, 42, 'SITUMULYA', '0000-00-00 00:00:00', NULL),
(424, 42, 'SINARGALIH', '0000-00-00 00:00:00', NULL),
(425, 42, 'WANASARI', '0000-00-00 00:00:00', NULL),
(426, 42, 'GUNUNG WANGUN', '0000-00-00 00:00:00', NULL),
(427, 42, 'CITOREK BARAT', '0000-00-00 00:00:00', NULL),
(428, 42, 'CIHERANG', '0000-00-00 00:00:00', NULL),
(429, 42, 'CITOREK SABRANG', '0000-00-00 00:00:00', NULL),
(430, 43, 'KANDANGSAPI', '0000-00-00 00:00:00', NULL),
(431, 43, 'CIHUJAN', '0000-00-00 00:00:00', NULL),
(432, 43, 'CIAPUS', '0000-00-00 00:00:00', NULL),
(433, 43, 'CIJAKU', '0000-00-00 00:00:00', NULL),
(434, 43, 'MEKARJAYA', '0000-00-00 00:00:00', NULL),
(435, 43, 'CIPALABUH', '0000-00-00 00:00:00', NULL),
(436, 43, 'CIBEUREUM', '0000-00-00 00:00:00', NULL),
(437, 43, 'CIMENGA', '0000-00-00 00:00:00', NULL),
(438, 43, 'SUKASENANG', '0000-00-00 00:00:00', NULL),
(439, 43, 'KAPUNDUHAN', '0000-00-00 00:00:00', NULL),
(440, 44, 'PEUCANGPARI', '0000-00-00 00:00:00', NULL),
(441, 44, 'CIBUNGUR', '0000-00-00 00:00:00', NULL),
(442, 44, 'CIKARET', '0000-00-00 00:00:00', NULL),
(443, 44, 'CIKADONGDONG', '0000-00-00 00:00:00', NULL),
(444, 44, 'CIKARATUAN', '0000-00-00 00:00:00', NULL),
(445, 44, 'MUGIJAYA', '0000-00-00 00:00:00', NULL),
(446, 44, 'CIGEMBLONG', '0000-00-00 00:00:00', NULL),
(447, 44, 'CIKATE', '0000-00-00 00:00:00', NULL),
(448, 44, 'WANGUNJAYA', '0000-00-00 00:00:00', NULL),
(449, 45, 'KERTARAHARJA', '0000-00-00 00:00:00', NULL),
(450, 45, 'KERTA', '0000-00-00 00:00:00', NULL),
(451, 45, 'BOJONGJURUH', '0000-00-00 00:00:00', NULL),
(452, 45, 'LEBAKKEUSIK', '0000-00-00 00:00:00', NULL),
(453, 45, 'LEUWIIPUH', '0000-00-00 00:00:00', NULL),
(454, 45, 'TAMANSARI', '0000-00-00 00:00:00', NULL),
(455, 45, 'CILEGONG ILIR', '0000-00-00 00:00:00', NULL),
(456, 45, 'CISAMPIH', '0000-00-00 00:00:00', NULL),
(457, 45, 'JALUPANG GIRANG', '0000-00-00 00:00:00', NULL),
(458, 45, 'CIDAHU', '0000-00-00 00:00:00', NULL),
(459, 45, 'KEUSIK', '0000-00-00 00:00:00', NULL),
(460, 45, 'CIRUJI', '0000-00-00 00:00:00', NULL),
(461, 45, 'CIBATURKEUSIK', '0000-00-00 00:00:00', NULL),
(462, 45, 'BENDUNGAN', '0000-00-00 00:00:00', NULL),
(463, 45, 'KUMPAY', '0000-00-00 00:00:00', NULL),
(464, 45, 'GUNUNGSARI', '0000-00-00 00:00:00', NULL),
(465, 45, 'KADUHAUK', '0000-00-00 00:00:00', NULL),
(466, 45, 'LABANJAYA', '0000-00-00 00:00:00', NULL),
(467, 45, 'UMBULJAYA', '0000-00-00 00:00:00', NULL),
(468, 45, 'KERTARAHAYU', '0000-00-00 00:00:00', NULL),
(469, 46, 'MEKARJAYA', '0000-00-00 00:00:00', NULL),
(470, 46, 'PASINDANGAN', '0000-00-00 00:00:00', NULL),
(471, 46, 'KUJANGSARI', '0000-00-00 00:00:00', NULL),
(472, 46, 'PARUNGKUJANG', '0000-00-00 00:00:00', NULL),
(473, 46, 'CIKAREO', '0000-00-00 00:00:00', NULL),
(474, 46, 'CILELES', '0000-00-00 00:00:00', NULL),
(475, 46, 'MARGAMULYA', '0000-00-00 00:00:00', NULL),
(476, 46, 'CIPADANG', '0000-00-00 00:00:00', NULL),
(477, 46, 'DAROYON', '0000-00-00 00:00:00', NULL),
(478, 46, 'PRABUGANTUNGAN', '0000-00-00 00:00:00', NULL),
(479, 46, 'GUMURUH', '0000-00-00 00:00:00', NULL),
(480, 46, 'BANJARSARI', '0000-00-00 00:00:00', NULL),
(481, 47, 'GUNUNGKENDENG', '0000-00-00 00:00:00', NULL),
(482, 47, 'CIMANYANGRAY', '0000-00-00 00:00:00', NULL),
(483, 47, 'KERAMATJAYA', '0000-00-00 00:00:00', NULL),
(484, 47, 'BULAKAN', '0000-00-00 00:00:00', NULL),
(485, 47, 'CICARINGIN', '0000-00-00 00:00:00', NULL),
(486, 47, 'CIAKAR', '0000-00-00 00:00:00', NULL),
(487, 47, 'CISAMPANG', '0000-00-00 00:00:00', NULL),
(488, 47, 'BOJONG KONENG', '0000-00-00 00:00:00', NULL),
(489, 47, 'CIGINGGANG', '0000-00-00 00:00:00', NULL),
(490, 47, 'GUNUNG KENCANA', '0000-00-00 00:00:00', NULL),
(491, 47, 'SUKANEGARA', '0000-00-00 00:00:00', NULL),
(492, 47, 'TANJUNGSARI INDAH', '0000-00-00 00:00:00', NULL),
(493, 48, 'KEBONCAU', '0000-00-00 00:00:00', NULL),
(494, 48, 'CIMAYANG', '0000-00-00 00:00:00', NULL),
(495, 48, 'PARAKANBEUSI', '0000-00-00 00:00:00', NULL),
(496, 48, 'BOJONGMANIK', '0000-00-00 00:00:00', NULL),
(497, 48, 'MEKARMANIK', '0000-00-00 00:00:00', NULL),
(498, 48, 'KADURAHAYU', '0000-00-00 00:00:00', NULL),
(499, 48, 'HARJAWANA', '0000-00-00 00:00:00', NULL),
(500, 48, 'MEKAR RAHAYU', '0000-00-00 00:00:00', NULL),
(501, 48, 'PASIR BITUNG', '0000-00-00 00:00:00', NULL),
(502, 49, 'PARAKANLIMA', '0000-00-00 00:00:00', NULL),
(503, 49, 'KADUDAMAS', '0000-00-00 00:00:00', NULL),
(504, 49, 'DATARCAE', '0000-00-00 00:00:00', NULL),
(505, 49, 'KAROYA', '0000-00-00 00:00:00', NULL),
(506, 49, 'NANGERANG', '0000-00-00 00:00:00', NULL),
(507, 49, 'CIRINTEN', '0000-00-00 00:00:00', NULL),
(508, 49, 'KARANGNUNGGAL', '0000-00-00 00:00:00', NULL),
(509, 49, 'CEMPAKA', '0000-00-00 00:00:00', NULL),
(510, 49, 'BADUR', '0000-00-00 00:00:00', NULL),
(511, 49, 'CIBARANI', '0000-00-00 00:00:00', NULL),
(512, 50, 'KANEKES', '0000-00-00 00:00:00', NULL),
(513, 50, 'NAYAGATI', '0000-00-00 00:00:00', NULL),
(514, 50, 'BOJONG MENTENG', '0000-00-00 00:00:00', NULL),
(515, 50, 'CISIMEUT', '0000-00-00 00:00:00', NULL),
(516, 50, 'MARGAWANGI', '0000-00-00 00:00:00', NULL),
(517, 50, 'SANGKANWANGI', '0000-00-00 00:00:00', NULL),
(518, 50, 'JALUPANG MULYA', '0000-00-00 00:00:00', NULL),
(519, 50, 'LEUWIDAMAR', '0000-00-00 00:00:00', NULL),
(520, 50, 'CIBUNGUR', '0000-00-00 00:00:00', NULL),
(521, 50, 'LEBAK PARAHIANG', '0000-00-00 00:00:00', NULL),
(522, 50, 'WANTISARI', '0000-00-00 00:00:00', NULL),
(523, 50, 'CISIMEUT RAYA', '0000-00-00 00:00:00', NULL),
(524, 51, 'PASIREURIH', '0000-00-00 00:00:00', NULL),
(525, 51, 'PASIRNANGKA', '0000-00-00 00:00:00', NULL),
(526, 51, 'CIKARANG', '0000-00-00 00:00:00', NULL),
(527, 51, 'CIMINYAK', '0000-00-00 00:00:00', NULL),
(528, 51, 'LEUWICOO', '0000-00-00 00:00:00', NULL),
(529, 51, 'MUNCANG', '0000-00-00 00:00:00', NULL),
(530, 51, 'SUKANAGARA', '0000-00-00 00:00:00', NULL),
(531, 51, 'SINDANGWANGI', '0000-00-00 00:00:00', NULL),
(532, 51, 'JAGARAKSA', '0000-00-00 00:00:00', NULL),
(533, 51, 'TANJUNGWANGI', '0000-00-00 00:00:00', NULL),
(534, 51, 'MEKARWANGI', '0000-00-00 00:00:00', NULL),
(535, 51, 'GIRI JAGABAYA', '0000-00-00 00:00:00', NULL),
(536, 52, 'SINARJAYA', '0000-00-00 00:00:00', NULL),
(537, 52, 'CIROMPANG', '0000-00-00 00:00:00', NULL),
(538, 52, 'SUKAMAJU', '0000-00-00 00:00:00', NULL),
(539, 52, 'MAJASARI', '0000-00-00 00:00:00', NULL),
(540, 52, 'CIPARASI', '0000-00-00 00:00:00', NULL),
(541, 52, 'SINDANGLAYA', '0000-00-00 00:00:00', NULL),
(542, 52, 'SOBANG', '0000-00-00 00:00:00', NULL),
(543, 52, 'SUKAJAYA', '0000-00-00 00:00:00', NULL),
(544, 52, 'HARIANG', '0000-00-00 00:00:00', NULL),
(545, 52, 'SUKARESMI', '0000-00-00 00:00:00', NULL),
(546, 53, 'PASIRHAUR', '0000-00-00 00:00:00', NULL),
(547, 53, 'GIRILAYA', '0000-00-00 00:00:00', NULL),
(548, 53, 'JAYAPURA', '0000-00-00 00:00:00', NULL),
(549, 53, 'GIRIHARJA', '0000-00-00 00:00:00', NULL),
(550, 53, 'BINTANGSARI', '0000-00-00 00:00:00', NULL),
(551, 53, 'CIPANAS', '0000-00-00 00:00:00', NULL),
(552, 53, 'LUHURJAYA', '0000-00-00 00:00:00', NULL),
(553, 53, 'SIPAYUNG', '0000-00-00 00:00:00', NULL),
(554, 53, 'BINTANGRESMI', '0000-00-00 00:00:00', NULL),
(555, 53, 'MALANGSARI', '0000-00-00 00:00:00', NULL),
(556, 53, 'SUKASARI', '0000-00-00 00:00:00', NULL),
(557, 53, 'HAURGAJRUG', '0000-00-00 00:00:00', NULL),
(558, 53, 'TALAGAHIANG', '0000-00-00 00:00:00', NULL),
(559, 53, 'HARUMSARI', '0000-00-00 00:00:00', NULL),
(560, 54, 'LEBAKGEDONG', '0000-00-00 00:00:00', NULL),
(561, 54, 'LEBAKSITU', '0000-00-00 00:00:00', NULL),
(562, 54, 'CILADAEUN', '0000-00-00 00:00:00', NULL),
(563, 54, 'BANJARSARI', '0000-00-00 00:00:00', NULL),
(564, 54, 'LEBAKSANGKA', '0000-00-00 00:00:00', NULL),
(565, 54, 'BANJAR IRIGASI', '0000-00-00 00:00:00', NULL),
(566, 55, 'MARAYA', '0000-00-00 00:00:00', NULL),
(567, 55, 'MARGALUYU', '0000-00-00 00:00:00', NULL),
(568, 55, 'SUKAMARGA', '0000-00-00 00:00:00', NULL),
(569, 55, 'SINDANGSARI', '0000-00-00 00:00:00', NULL),
(570, 55, 'SAJIRAMEKAR', '0000-00-00 00:00:00', NULL),
(571, 55, 'SAJIRA', '0000-00-00 00:00:00', NULL),
(572, 55, 'SUKARAME', '0000-00-00 00:00:00', NULL),
(573, 55, 'CALUNGBUNGUR', '0000-00-00 00:00:00', NULL),
(574, 55, 'SUKAJAYA', '0000-00-00 00:00:00', NULL),
(575, 55, 'PAJA', '0000-00-00 00:00:00', NULL),
(576, 55, 'MEKARSARI', '0000-00-00 00:00:00', NULL),
(577, 55, 'PAJAGAN', '0000-00-00 00:00:00', NULL),
(578, 55, 'PARUNGSARI', '0000-00-00 00:00:00', NULL),
(579, 55, 'BUNGUR MEKAR', '0000-00-00 00:00:00', NULL),
(580, 55, 'CIUYAH', '0000-00-00 00:00:00', NULL),
(581, 56, 'SARAGENI', '0000-00-00 00:00:00', NULL),
(582, 56, 'JAYASARI', '0000-00-00 00:00:00', NULL),
(583, 56, 'MARGATIRTA', '0000-00-00 00:00:00', NULL),
(584, 56, 'GUNUNG ANTEN', '0000-00-00 00:00:00', NULL),
(585, 56, 'SANGKAN MANIK', '0000-00-00 00:00:00', NULL),
(586, 56, 'SUDAMANIK', '0000-00-00 00:00:00', NULL),
(587, 56, 'GIRIMUKTI', '0000-00-00 00:00:00', NULL),
(588, 56, 'JAYAMANIK', '0000-00-00 00:00:00', NULL),
(589, 56, 'MARGALUYU', '0000-00-00 00:00:00', NULL),
(590, 56, 'SANGIANG JAYA', '0000-00-00 00:00:00', NULL),
(591, 56, 'TAMBAK', '0000-00-00 00:00:00', NULL),
(592, 56, 'MARGA JAYA', '0000-00-00 00:00:00', NULL),
(593, 56, 'CIMARGA', '0000-00-00 00:00:00', NULL),
(594, 56, 'MEKAR JAYA', '0000-00-00 00:00:00', NULL),
(595, 56, 'INTEN JAYA', '0000-00-00 00:00:00', NULL),
(596, 56, 'KARYA JAYA', '0000-00-00 00:00:00', NULL),
(597, 56, 'MEKARMULYA', '0000-00-00 00:00:00', NULL),
(598, 57, 'ANGGALAN', '0000-00-00 00:00:00', NULL),
(599, 57, 'MUARADUA', '0000-00-00 00:00:00', NULL),
(600, 57, 'MUNCANGKOPONG', '0000-00-00 00:00:00', NULL),
(601, 57, 'TAMAN JAYA', '0000-00-00 00:00:00', NULL),
(602, 57, 'CURUGPANJANG', '0000-00-00 00:00:00', NULL),
(603, 57, 'CIKULUR', '0000-00-00 00:00:00', NULL),
(604, 57, 'CIGOONG SELATAN', '0000-00-00 00:00:00', NULL),
(605, 57, 'CIGOONG UTARA', '0000-00-00 00:00:00', NULL),
(606, 57, 'SUMURBANDUNG', '0000-00-00 00:00:00', NULL),
(607, 57, 'SUKAHARJA', '0000-00-00 00:00:00', NULL),
(608, 57, 'SUKADAYA', '0000-00-00 00:00:00', NULL),
(609, 57, 'PARAGE', '0000-00-00 00:00:00', NULL),
(610, 57, 'PASIR GINTUNG', '0000-00-00 00:00:00', NULL),
(611, 58, 'PASIRTANGKIL', '0000-00-00 00:00:00', NULL),
(612, 58, 'SUKARENDAH', '0000-00-00 00:00:00', NULL),
(613, 58, 'SELARAJA', '0000-00-00 00:00:00', NULL),
(614, 58, 'WARUNGGUNUNG', '0000-00-00 00:00:00', NULL),
(615, 58, 'CIBUAH', '0000-00-00 00:00:00', NULL),
(616, 58, 'BAROS', '0000-00-00 00:00:00', NULL),
(617, 58, 'SINDANGSARI', '0000-00-00 00:00:00', NULL),
(618, 58, 'BANJARSARI', '0000-00-00 00:00:00', NULL),
(619, 58, 'CEMPAKA', '0000-00-00 00:00:00', NULL),
(620, 58, 'PADASUKA', '0000-00-00 00:00:00', NULL),
(621, 58, 'SUKARAJA', '0000-00-00 00:00:00', NULL),
(622, 58, 'JAGABAYA', '0000-00-00 00:00:00', NULL),
(623, 59, 'TAMBAKBAYA', '0000-00-00 00:00:00', NULL),
(624, 59, 'BOJONGLELES', '0000-00-00 00:00:00', NULL),
(625, 59, 'KADUAGUNG TIMUR', '0000-00-00 00:00:00', NULL),
(626, 59, 'KADUAGUNG BARAT', '0000-00-00 00:00:00', NULL),
(627, 59, 'MALABAR', '0000-00-00 00:00:00', NULL),
(628, 59, 'PASAR KEONG', '0000-00-00 00:00:00', NULL),
(629, 59, 'CIBADAK', '0000-00-00 00:00:00', NULL),
(630, 59, 'PANANCANGAN', '0000-00-00 00:00:00', NULL),
(631, 59, 'ASEM', '0000-00-00 00:00:00', NULL),
(632, 59, 'CISANGU', '0000-00-00 00:00:00', NULL),
(633, 59, 'BOJONGCAE', '0000-00-00 00:00:00', NULL),
(634, 59, 'KADUAGUNG TENGAH', '0000-00-00 00:00:00', NULL),
(635, 59, 'MEKAR AGUNG', '0000-00-00 00:00:00', NULL),
(636, 59, 'ASEM MARGALUYU', '0000-00-00 00:00:00', NULL),
(637, 59, 'CIMENTENG JAYA', '0000-00-00 00:00:00', NULL),
(638, 60, 'PASIR TANJUNG', '0000-00-00 00:00:00', NULL),
(639, 60, 'RANGKASBITUNG TIMUR', '0000-00-00 00:00:00', NULL),
(640, 60, 'RANGKASBITUNG BARAT', '0000-00-00 00:00:00', NULL),
(641, 60, 'MUARA CIUJUNG TIMUR', '0000-00-00 00:00:00', NULL),
(642, 60, 'JATIMULYA', '0000-00-00 00:00:00', NULL),
(643, 60, 'CIMANGEUNGTEUNG', '0000-00-00 00:00:00', NULL),
(644, 60, 'CITERAS', '0000-00-00 00:00:00', NULL),
(645, 60, 'MEKARSARI', '0000-00-00 00:00:00', NULL),
(646, 60, 'NAMENG', '0000-00-00 00:00:00', NULL),
(647, 60, 'KOLELET WETAN', '0000-00-00 00:00:00', NULL),
(648, 60, 'SUKAMANAH', '0000-00-00 00:00:00', NULL),
(649, 60, 'PABUARAN', '0000-00-00 00:00:00', NULL),
(650, 60, 'CIJORO PASIR', '0000-00-00 00:00:00', NULL),
(651, 60, 'CIJORO LEBAK', '0000-00-00 00:00:00', NULL),
(652, 60, 'MUARA CIUJUNG BARAT', '0000-00-00 00:00:00', NULL),
(653, 60, 'NARIMBANG MULIA', '0000-00-00 00:00:00', NULL),
(654, 61, 'CILANGKAP', '0000-00-00 00:00:00', NULL),
(655, 61, 'PASIR KUPA', '0000-00-00 00:00:00', NULL),
(656, 61, 'AWEH', '0000-00-00 00:00:00', NULL),
(657, 61, 'SUKAMEKARSARI', '0000-00-00 00:00:00', NULL),
(658, 61, 'KALANGANYAR', '0000-00-00 00:00:00', NULL),
(659, 61, 'SANGIANG TANJUNG', '0000-00-00 00:00:00', NULL),
(660, 61, 'CIKATAPIS', '0000-00-00 00:00:00', NULL),
(661, 62, 'CILANGKAP', '0000-00-00 00:00:00', NULL),
(662, 62, 'PASIR KECAPI', '0000-00-00 00:00:00', NULL),
(663, 62, 'MEKARSARI', '0000-00-00 00:00:00', NULL),
(664, 62, 'SANGIANG', '0000-00-00 00:00:00', NULL),
(665, 62, 'TANJUNG SARI', '0000-00-00 00:00:00', NULL),
(666, 62, 'MAJA', '0000-00-00 00:00:00', NULL),
(667, 62, 'CURUG BADAK', '0000-00-00 00:00:00', NULL),
(668, 62, 'PASIR KEMBANG', '0000-00-00 00:00:00', NULL),
(669, 62, 'PADASUKA', '0000-00-00 00:00:00', NULL),
(670, 62, 'GUBUGANCIBEUREUM', '0000-00-00 00:00:00', NULL),
(671, 62, 'BINONG', '0000-00-00 00:00:00', NULL),
(672, 62, 'SINDANGMULYA', '0000-00-00 00:00:00', NULL),
(673, 62, 'BUYUT MEKAR', '0000-00-00 00:00:00', NULL),
(674, 62, 'MAJA BARU', '0000-00-00 00:00:00', NULL),
(675, 63, 'GURADOG', '0000-00-00 00:00:00', NULL),
(676, 63, 'CANDI', '0000-00-00 00:00:00', NULL),
(677, 63, 'SEKARWANGI', '0000-00-00 00:00:00', NULL),
(678, 63, 'CURUGBITUNG', '0000-00-00 00:00:00', NULL),
(679, 63, 'CIBURUY', '0000-00-00 00:00:00', NULL),
(680, 63, 'MAYAK', '0000-00-00 00:00:00', NULL),
(681, 63, 'CILAYANG', '0000-00-00 00:00:00', NULL),
(682, 63, 'CIPINING', '0000-00-00 00:00:00', NULL),
(683, 63, 'CIDADAP', '0000-00-00 00:00:00', NULL),
(684, 63, 'LEBAKASIH', '0000-00-00 00:00:00', NULL),
(685, 64, 'JEUNG JING', '0000-00-00 00:00:00', NULL),
(686, 64, 'CISOKA', '0000-00-00 00:00:00', NULL),
(687, 64, 'SUKATANI', '0000-00-00 00:00:00', NULL),
(688, 64, 'CEMPAKA', '0000-00-00 00:00:00', NULL),
(689, 64, 'KARANGHARJA', '0000-00-00 00:00:00', NULL),
(690, 64, 'CARENANG', '0000-00-00 00:00:00', NULL),
(691, 64, 'BOJONGLOA', '0000-00-00 00:00:00', NULL),
(692, 64, 'CARINGIN', '0000-00-00 00:00:00', NULL),
(693, 64, 'SELAPAJANG', '0000-00-00 00:00:00', NULL),
(694, 64, 'CIBUGEL', '0000-00-00 00:00:00', NULL),
(695, 65, 'CIKASUNGKA', '0000-00-00 00:00:00', NULL),
(696, 65, 'CIKUYA', '0000-00-00 00:00:00', NULL),
(697, 65, 'CIKAREO', '0000-00-00 00:00:00', NULL),
(698, 65, 'CIREUNDEU', '0000-00-00 00:00:00', NULL),
(699, 65, 'SOLEAR', '0000-00-00 00:00:00', NULL),
(700, 65, 'PASANGGRAHAN', '0000-00-00 00:00:00', NULL),
(701, 65, 'MUNJUL', '0000-00-00 00:00:00', NULL),
(702, 66, 'CILELES', '0000-00-00 00:00:00', NULL),
(703, 66, 'BANTAR PANJANG', '0000-00-00 00:00:00', NULL),
(704, 66, 'SODONG', '0000-00-00 00:00:00', NULL),
(705, 66, 'TAPOS', '0000-00-00 00:00:00', NULL),
(706, 66, 'MARGA SARI', '0000-00-00 00:00:00', NULL),
(707, 66, 'KADU AGUNG', '0000-00-00 00:00:00', NULL),
(708, 66, 'MATA GARA', '0000-00-00 00:00:00', NULL),
(709, 66, 'TIGARAKSA', '0000-00-00 00:00:00', NULL),
(710, 66, 'PETE', '0000-00-00 00:00:00', NULL),
(711, 66, 'TEGALSARI', '0000-00-00 00:00:00', NULL),
(712, 66, 'PEMATANG', '0000-00-00 00:00:00', NULL),
(713, 66, 'PASIR NANGKA', '0000-00-00 00:00:00', NULL),
(714, 66, 'CISEREH', '0000-00-00 00:00:00', NULL),
(715, 66, 'PASIR BOLANG', '0000-00-00 00:00:00', NULL),
(716, 67, 'MEKARSARI', '0000-00-00 00:00:00', NULL),
(717, 67, 'DARU', '0000-00-00 00:00:00', NULL),
(718, 67, 'SUKA MANAH', '0000-00-00 00:00:00', NULL),
(719, 67, 'TABAN', '0000-00-00 00:00:00', NULL),
(720, 67, 'ANCOL PASIR', '0000-00-00 00:00:00', NULL),
(721, 67, 'RANCABUAYA', '0000-00-00 00:00:00', NULL),
(722, 67, 'TIPARRAYA', '0000-00-00 00:00:00', NULL),
(723, 67, 'JAMBE', '0000-00-00 00:00:00', NULL),
(724, 67, 'KUTRUK', '0000-00-00 00:00:00', NULL),
(725, 67, 'PASIR BARAT', '0000-00-00 00:00:00', NULL),
(726, 68, 'BUDI MULYA', '0000-00-00 00:00:00', NULL),
(727, 68, 'BOJONG', '0000-00-00 00:00:00', NULL),
(728, 68, 'SUKA MULYA', '0000-00-00 00:00:00', NULL),
(729, 68, 'CIKUPA', '0000-00-00 00:00:00', NULL),
(730, 68, 'DUKUH', '0000-00-00 00:00:00', NULL),
(731, 68, 'BITUNG JAYA', '0000-00-00 00:00:00', NULL),
(732, 68, 'BUNDER', '0000-00-00 00:00:00', NULL),
(733, 68, 'SUKA DAMAI', '0000-00-00 00:00:00', NULL),
(734, 68, 'PASIR JAYA', '0000-00-00 00:00:00', NULL),
(735, 68, 'PASIR GADUNG', '0000-00-00 00:00:00', NULL),
(736, 68, 'TALAGA SARI', '0000-00-00 00:00:00', NULL),
(737, 68, 'TALAGA', '0000-00-00 00:00:00', NULL),
(738, 68, 'SUKA NAGARA', '0000-00-00 00:00:00', NULL),
(739, 68, 'CIBADAK', '0000-00-00 00:00:00', NULL),
(740, 69, 'RANCA IYUH', '0000-00-00 00:00:00', NULL),
(741, 69, 'MEKAR JAYA', '0000-00-00 00:00:00', NULL),
(742, 69, 'RANCA KALAPA', '0000-00-00 00:00:00', NULL),
(743, 69, 'PANONGAN', '0000-00-00 00:00:00', NULL),
(744, 69, 'SERDANG KULON', '0000-00-00 00:00:00', NULL),
(745, 69, 'CIAKAR', '0000-00-00 00:00:00', NULL),
(746, 69, 'MEKAR BAKTI', '0000-00-00 00:00:00', NULL),
(747, 69, 'PEUSAR', '0000-00-00 00:00:00', NULL),
(748, 70, 'CURUG KULON', '0000-00-00 00:00:00', NULL),
(749, 70, 'CURUG WETAN', '0000-00-00 00:00:00', NULL),
(750, 70, 'SUKA BAKTI', '0000-00-00 00:00:00', NULL),
(751, 70, 'CUKANG GALIH', '0000-00-00 00:00:00', NULL),
(752, 70, 'KADU JAYA', '0000-00-00 00:00:00', NULL),
(753, 70, 'KADU', '0000-00-00 00:00:00', NULL),
(754, 70, 'BINONG', '0000-00-00 00:00:00', NULL),
(755, 71, 'BOJONG NANGKA', '0000-00-00 00:00:00', NULL),
(756, 71, 'CURUG SANGERENG', '0000-00-00 00:00:00', NULL),
(757, 71, 'PAKULONAN BARAT', '0000-00-00 00:00:00', NULL),
(758, 71, 'KELAPA DUA', '0000-00-00 00:00:00', NULL),
(759, 71, 'BENCONGAN INDAH', '0000-00-00 00:00:00', NULL),
(760, 71, 'BENCONGAN', '0000-00-00 00:00:00', NULL),
(761, 72, 'CIANGIR', '0000-00-00 00:00:00', NULL),
(762, 72, 'BABAT', '0000-00-00 00:00:00', NULL),
(763, 72, 'BOJONG KAMAL', '0000-00-00 00:00:00', NULL),
(764, 72, 'CIRARAB', '0000-00-00 00:00:00', NULL),
(765, 72, 'CARINGIN', '0000-00-00 00:00:00', NULL),
(766, 72, 'BABAKAN', '0000-00-00 00:00:00', NULL),
(767, 72, 'KAMUNING', '0000-00-00 00:00:00', NULL),
(768, 72, 'PALA SARI', '0000-00-00 00:00:00', NULL),
(769, 72, 'SERDANG WETAN', '0000-00-00 00:00:00', NULL),
(770, 72, 'RANCAGONG', '0000-00-00 00:00:00', NULL),
(771, 72, 'LEGOK', '0000-00-00 00:00:00', NULL),
(772, 73, 'KARANG TENGAH', '0000-00-00 00:00:00', NULL),
(773, 73, 'MALANG NENGAH', '0000-00-00 00:00:00', NULL),
(774, 73, 'JATAKE', '0000-00-00 00:00:00', NULL),
(775, 73, 'KADU SIRUNG', '0000-00-00 00:00:00', NULL),
(776, 73, 'SITU GADUNG', '0000-00-00 00:00:00', NULL),
(777, 73, 'PAGEDANGAN', '0000-00-00 00:00:00', NULL),
(778, 73, 'CICALENGKA', '0000-00-00 00:00:00', NULL),
(779, 73, 'LENGKONG KULON', '0000-00-00 00:00:00', NULL),
(780, 73, 'CIJANTRA', '0000-00-00 00:00:00', NULL),
(781, 73, 'MEDANG', '0000-00-00 00:00:00', NULL),
(782, 73, 'CIHUNI', '0000-00-00 00:00:00', NULL),
(783, 74, 'MEKARWANGI', '0000-00-00 00:00:00', NULL),
(784, 74, 'DANGDANG', '0000-00-00 00:00:00', NULL),
(785, 74, 'SURADITA', '0000-00-00 00:00:00', NULL),
(786, 74, 'CISAUK', '0000-00-00 00:00:00', NULL),
(787, 74, 'SAMPORA', '0000-00-00 00:00:00', NULL),
(788, 74, 'CIBOGO', '0000-00-00 00:00:00', NULL),
(789, 75, 'SUKAASIH', '0000-00-00 00:00:00', NULL),
(790, 75, 'PASAR KEMIS', '0000-00-00 00:00:00', NULL),
(791, 75, 'SUKAMANTRI', '0000-00-00 00:00:00', NULL),
(792, 75, 'KUTA JAYA', '0000-00-00 00:00:00', NULL),
(793, 75, 'GELAM JAYA', '0000-00-00 00:00:00', NULL),
(794, 75, 'KUTA BARU', '0000-00-00 00:00:00', NULL),
(795, 75, 'KUTA BUMI', '0000-00-00 00:00:00', NULL),
(796, 75, 'PANGADEGAN', '0000-00-00 00:00:00', NULL),
(797, 75, 'SINDANG SARI', '0000-00-00 00:00:00', NULL),
(798, 76, 'WANA KERTA', '0000-00-00 00:00:00', NULL),
(799, 76, 'SUKA HARJA', '0000-00-00 00:00:00', NULL),
(800, 76, 'SINDANG PANON', '0000-00-00 00:00:00', NULL),
(801, 76, 'SINDANG JAYA', '0000-00-00 00:00:00', NULL),
(802, 76, 'SINDANG ASIH', '0000-00-00 00:00:00', NULL),
(803, 76, 'SINDANG SONO', '0000-00-00 00:00:00', NULL),
(804, 76, 'BADAK ANOM', '0000-00-00 00:00:00', NULL),
(805, 77, 'GEMBONG', '0000-00-00 00:00:00', NULL),
(806, 77, 'CANGKUDU', '0000-00-00 00:00:00', NULL),
(807, 77, 'SENTUL', '0000-00-00 00:00:00', NULL),
(808, 77, 'SENTUL JAYA', '0000-00-00 00:00:00', NULL),
(809, 77, 'TALAGASARI', '0000-00-00 00:00:00', NULL),
(810, 77, 'BALA RAJA', '0000-00-00 00:00:00', NULL),
(811, 77, 'TOBAT', '0000-00-00 00:00:00', NULL),
(812, 77, 'SUKA MURNI', '0000-00-00 00:00:00', NULL),
(813, 77, 'SAGA', '0000-00-00 00:00:00', NULL),
(814, 78, 'JAYANTI', '0000-00-00 00:00:00', NULL),
(815, 78, 'PASIR MUNCANG', '0000-00-00 00:00:00', NULL),
(816, 78, 'SUMUR BANDUNG', '0000-00-00 00:00:00', NULL),
(817, 78, 'CIKANDE', '0000-00-00 00:00:00', NULL),
(818, 78, 'PASIR GINTUNG', '0000-00-00 00:00:00', NULL),
(819, 78, 'PANGKAT', '0000-00-00 00:00:00', NULL),
(820, 78, 'DANG DEUR', '0000-00-00 00:00:00', NULL),
(821, 78, 'PABUARAN', '0000-00-00 00:00:00', NULL),
(822, 79, 'KUBANG', '0000-00-00 00:00:00', NULL),
(823, 79, 'PARAHU', '0000-00-00 00:00:00', NULL),
(824, 79, 'SUKA MULYA', '0000-00-00 00:00:00', NULL),
(825, 79, 'KALI ASIN', '0000-00-00 00:00:00', NULL),
(826, 79, 'MERAK', '0000-00-00 00:00:00', NULL),
(827, 79, 'BUNAR', '0000-00-00 00:00:00', NULL),
(828, 79, 'BENDA', '0000-00-00 00:00:00', NULL),
(829, 79, 'BUNI AYU', '0000-00-00 00:00:00', NULL),
(830, 80, 'KOPER', '0000-00-00 00:00:00', NULL),
(831, 80, 'PASIR AMPO', '0000-00-00 00:00:00', NULL),
(832, 80, 'PATRA SANA', '0000-00-00 00:00:00', NULL),
(833, 80, 'RENGED', '0000-00-00 00:00:00', NULL),
(834, 80, 'TALOK', '0000-00-00 00:00:00', NULL),
(835, 80, 'JENGKOL', '0000-00-00 00:00:00', NULL),
(836, 80, 'KEMUNING', '0000-00-00 00:00:00', NULL),
(837, 80, 'RANCA ILAT', '0000-00-00 00:00:00', NULL),
(838, 80, 'KRESEK', '0000-00-00 00:00:00', NULL),
(839, 81, 'KANDA WATI', '0000-00-00 00:00:00', NULL),
(840, 81, 'CIBETOK', '0000-00-00 00:00:00', NULL),
(841, 81, 'TAMIANG', '0000-00-00 00:00:00', NULL),
(842, 81, 'CIPAEH', '0000-00-00 00:00:00', NULL),
(843, 81, 'KEDUNG', '0000-00-00 00:00:00', NULL),
(844, 81, 'ONYAM', '0000-00-00 00:00:00', NULL),
(845, 81, 'GUNUNG KALER', '0000-00-00 00:00:00', NULL),
(846, 81, 'SIDOKO', '0000-00-00 00:00:00', NULL),
(847, 81, 'RANCA GEDE', '0000-00-00 00:00:00', NULL),
(848, 82, 'BLUKBUK', '0000-00-00 00:00:00', NULL),
(849, 82, 'BAKUNG', '0000-00-00 00:00:00', NULL),
(850, 82, 'PASIR', '0000-00-00 00:00:00', NULL),
(851, 82, 'CIRUMPAK', '0000-00-00 00:00:00', NULL),
(852, 82, 'PAGEDANGAN UDIK', '0000-00-00 00:00:00', NULL),
(853, 82, 'PASILIAN', '0000-00-00 00:00:00', NULL),
(854, 82, 'PAGENJAHAN', '0000-00-00 00:00:00', NULL),
(855, 82, 'MUNCUNG', '0000-00-00 00:00:00', NULL),
(856, 82, 'KRONJO', '0000-00-00 00:00:00', NULL),
(857, 82, 'PAGEDANGAN ILIR', '0000-00-00 00:00:00', NULL),
(858, 83, 'GANDA RIA', '0000-00-00 00:00:00', NULL),
(859, 83, 'KOSAMBI DALAM', '0000-00-00 00:00:00', NULL),
(860, 83, 'KLUTUK', '0000-00-00 00:00:00', NULL),
(861, 83, 'MEKAR BARU', '0000-00-00 00:00:00', NULL),
(862, 83, 'WALIWIS', '0000-00-00 00:00:00', NULL),
(863, 83, 'CIJERUK', '0000-00-00 00:00:00', NULL),
(864, 83, 'KEDAUNG', '0000-00-00 00:00:00', NULL),
(865, 83, 'JENGGOT', '0000-00-00 00:00:00', NULL),
(866, 84, 'GUNUNG SARI', '0000-00-00 00:00:00', NULL),
(867, 84, 'SASAK', '0000-00-00 00:00:00', NULL),
(868, 84, 'KEDUNG DALEM', '0000-00-00 00:00:00', NULL),
(869, 84, 'TEGAL KUNIR KIDUL', '0000-00-00 00:00:00', NULL),
(870, 84, 'JATI WARINGIN', '0000-00-00 00:00:00', NULL),
(871, 84, 'TEGAL KUNIR LOR', '0000-00-00 00:00:00', NULL),
(872, 84, 'BANYU ASIH', '0000-00-00 00:00:00', NULL),
(873, 84, 'MAUK TIMUR', '0000-00-00 00:00:00', NULL),
(874, 84, 'MAUK BARAT', '0000-00-00 00:00:00', NULL),
(875, 84, 'KETAPANG', '0000-00-00 00:00:00', NULL),
(876, 84, 'MARGA MULYA', '0000-00-00 00:00:00', NULL),
(877, 84, 'TANJUNG ANOM', '0000-00-00 00:00:00', NULL),
(878, 85, 'LEGOK SUKAMAJU', '0000-00-00 00:00:00', NULL),
(879, 85, 'RANCA LABUH', '0000-00-00 00:00:00', NULL),
(880, 85, 'KEMIRI', '0000-00-00 00:00:00', NULL),
(881, 85, 'KELEBET', '0000-00-00 00:00:00', NULL),
(882, 85, 'PATRA MANGGALA', '0000-00-00 00:00:00', NULL),
(883, 85, 'KARANG ANYAR', '0000-00-00 00:00:00', NULL),
(884, 85, 'LONTAR', '0000-00-00 00:00:00', NULL),
(885, 86, 'BUARAN JATI', '0000-00-00 00:00:00', NULL),
(886, 86, 'GINTUNG', '0000-00-00 00:00:00', NULL),
(887, 86, 'KOSAMBI', '0000-00-00 00:00:00', NULL),
(888, 86, 'MEKAR KONDANG', '0000-00-00 00:00:00', NULL),
(889, 86, 'PEKAYON', '0000-00-00 00:00:00', NULL),
(890, 86, 'SUKADIRI', '0000-00-00 00:00:00', NULL),
(891, 86, 'RAWA KIDANG', '0000-00-00 00:00:00', NULL),
(892, 86, 'KARANG SERANG', '0000-00-00 00:00:00', NULL),
(893, 87, 'JAMBU KARYA', '0000-00-00 00:00:00', NULL),
(894, 87, 'DAON', '0000-00-00 00:00:00', NULL),
(895, 87, 'SUKA TANI', '0000-00-00 00:00:00', NULL),
(896, 87, 'MEKARSARI', '0000-00-00 00:00:00', NULL),
(897, 87, 'SUKA SARI', '0000-00-00 00:00:00', NULL),
(898, 87, 'RAJEGMULYA', '0000-00-00 00:00:00', NULL),
(899, 87, 'RAJEG', '0000-00-00 00:00:00', NULL),
(900, 87, 'SUKA MANAH', '0000-00-00 00:00:00', NULL),
(901, 87, 'PANGARENGAN', '0000-00-00 00:00:00', NULL),
(902, 87, 'RANCA BANGO', '0000-00-00 00:00:00', NULL),
(903, 87, 'LEMBANG SARI', '0000-00-00 00:00:00', NULL),
(904, 87, 'TANJAKAN', '0000-00-00 00:00:00', NULL),
(905, 87, 'TANJAKAN MEKAR', '0000-00-00 00:00:00', NULL),
(906, 88, 'MEKAR JAYA', '0000-00-00 00:00:00', NULL),
(907, 88, 'KARET', '0000-00-00 00:00:00', NULL),
(908, 88, 'PONDOK JAYA', '0000-00-00 00:00:00', NULL),
(909, 88, 'SEPATAN', '0000-00-00 00:00:00', NULL),
(910, 88, 'PISANGAN JAYA', '0000-00-00 00:00:00', NULL),
(911, 88, 'SARAKAN', '0000-00-00 00:00:00', NULL),
(912, 88, 'KAYU BONGKOK', '0000-00-00 00:00:00', NULL),
(913, 88, 'KAYU AGUNG', '0000-00-00 00:00:00', NULL),
(914, 89, 'LEBAK WANGI', '0000-00-00 00:00:00', NULL),
(915, 89, 'KEDAUNG BARAT', '0000-00-00 00:00:00', NULL),
(916, 89, 'JATI MULYA', '0000-00-00 00:00:00', NULL),
(917, 89, 'TANAH MERAH', '0000-00-00 00:00:00', NULL),
(918, 89, 'SANGIANG', '0000-00-00 00:00:00', NULL),
(919, 89, 'GEMPOL SARI', '0000-00-00 00:00:00', NULL),
(920, 89, 'PONDOK KELOR', '0000-00-00 00:00:00', NULL),
(921, 89, 'KAMPUNG KELOR', '0000-00-00 00:00:00', NULL),
(922, 90, 'BUNISARI', '0000-00-00 00:00:00', NULL),
(923, 90, 'RAWA BONI', '0000-00-00 00:00:00', NULL),
(924, 90, 'KIARA PAYUNG', '0000-00-00 00:00:00', NULL),
(925, 90, 'GAGA', '0000-00-00 00:00:00', NULL),
(926, 90, 'LAKSANA', '0000-00-00 00:00:00', NULL),
(927, 90, 'BUARAN BAMBU', '0000-00-00 00:00:00', NULL),
(928, 90, 'PAKU HAJI', '0000-00-00 00:00:00', NULL),
(929, 90, 'PAKU ALAM', '0000-00-00 00:00:00', NULL),
(930, 90, 'BUARAN MANGGA', '0000-00-00 00:00:00', NULL),
(931, 90, 'SURYA BAHARI', '0000-00-00 00:00:00', NULL),
(932, 90, 'SUKAWALI', '0000-00-00 00:00:00', NULL),
(933, 90, 'KRAMAT', '0000-00-00 00:00:00', NULL),
(934, 90, 'KALIBARU', '0000-00-00 00:00:00', NULL),
(935, 90, 'KOHOD', '0000-00-00 00:00:00', NULL),
(936, 91, 'BOJONG RENGED', '0000-00-00 00:00:00', NULL),
(937, 91, 'KEBON CAU', '0000-00-00 00:00:00', NULL),
(938, 91, 'TELUK NAGA', '0000-00-00 00:00:00', NULL),
(939, 91, 'BABAKAN ASEM', '0000-00-00 00:00:00', NULL),
(940, 91, 'KAMPUNG MELAYU TIMUR', '0000-00-00 00:00:00', NULL),
(941, 91, 'KAMPUNG MELAYU BARAT', '0000-00-00 00:00:00', NULL),
(942, 91, 'KAMPUNG BESAR', '0000-00-00 00:00:00', NULL),
(943, 91, 'L E M O', '0000-00-00 00:00:00', NULL),
(944, 91, 'TEGAL ANGUS', '0000-00-00 00:00:00', NULL),
(945, 91, 'PANGKALAN', '0000-00-00 00:00:00', NULL),
(946, 91, 'TANJUNG BURUNG', '0000-00-00 00:00:00', NULL),
(947, 91, 'TANJUNG PASIR', '0000-00-00 00:00:00', NULL),
(948, 91, 'MUARA', '0000-00-00 00:00:00', NULL),
(949, 92, 'RAWA RENGAS', '0000-00-00 00:00:00', NULL),
(950, 92, 'RAWA BURUNG', '0000-00-00 00:00:00', NULL),
(951, 92, 'BELIMBING', '0000-00-00 00:00:00', NULL),
(952, 92, 'JATIMULYA', '0000-00-00 00:00:00', NULL),
(953, 92, 'D A D A P', '0000-00-00 00:00:00', NULL),
(954, 92, 'KOSAMBI TIMUR', '0000-00-00 00:00:00', NULL),
(955, 92, 'KOSAMBI BARAT', '0000-00-00 00:00:00', NULL),
(956, 92, 'CENGKLONG', '0000-00-00 00:00:00', NULL),
(957, 92, 'SALEMBARAN JATI', '0000-00-00 00:00:00', NULL),
(958, 92, 'SALEMBARAN', '0000-00-00 00:00:00', NULL),
(959, 93, 'UMBUL TANJUNG', '0000-00-00 00:00:00', NULL),
(960, 93, 'PASAURAN', '0000-00-00 00:00:00', NULL),
(961, 93, 'BANTARWANGI', '0000-00-00 00:00:00', NULL),
(962, 93, 'BANTARWARU', '0000-00-00 00:00:00', NULL),
(963, 93, 'BULAKAN', '0000-00-00 00:00:00', NULL),
(964, 93, 'KARANG SURAGA', '0000-00-00 00:00:00', NULL),
(965, 93, 'CINANGKA', '0000-00-00 00:00:00', NULL),
(966, 93, 'KUBANG BAROS', '0000-00-00 00:00:00', NULL),
(967, 93, 'RANCASANGGAL', '0000-00-00 00:00:00', NULL),
(968, 93, 'CIKOLELET', '0000-00-00 00:00:00', NULL),
(969, 93, 'MEKARSARI', '0000-00-00 00:00:00', NULL),
(970, 93, 'SINDANGLAYA', '0000-00-00 00:00:00', NULL),
(971, 93, 'KAMASAN', '0000-00-00 00:00:00', NULL),
(972, 93, 'BAROS JAYA', '0000-00-00 00:00:00', NULL),
(973, 94, 'CIBOJONG', '0000-00-00 00:00:00', NULL),
(974, 94, 'KRAMATLABAN', '0000-00-00 00:00:00', NULL),
(975, 94, 'KADUBEUREUM', '0000-00-00 00:00:00', NULL),
(976, 94, 'PADARINCANG', '0000-00-00 00:00:00', NULL);
INSERT INTO `kelurahan` (`id_kel`, `id_kec`, `kel`, `is_create`, `is_update`) VALUES
(977, 94, 'BUGEL', '0000-00-00 00:00:00', NULL),
(978, 94, 'KALUMPANG', '0000-00-00 00:00:00', NULL),
(979, 94, 'CITASUK', '0000-00-00 00:00:00', NULL),
(980, 94, 'BATUKUWUNG', '0000-00-00 00:00:00', NULL),
(981, 94, 'CURUG GOONG', '0000-00-00 00:00:00', NULL),
(982, 94, 'CISAAT', '0000-00-00 00:00:00', NULL),
(983, 94, 'CIPAYUNG', '0000-00-00 00:00:00', NULL),
(984, 94, 'CIOMAS', '0000-00-00 00:00:00', NULL),
(985, 94, 'BARUGBUG', '0000-00-00 00:00:00', NULL),
(986, 94, 'KADUKEMPONG', '0000-00-00 00:00:00', NULL),
(987, 95, 'UJUNGTEBU', '0000-00-00 00:00:00', NULL),
(988, 95, 'CISITU', '0000-00-00 00:00:00', NULL),
(989, 95, 'SIKETUG', '0000-00-00 00:00:00', NULL),
(990, 95, 'LEBAK', '0000-00-00 00:00:00', NULL),
(991, 95, 'CITAMAN', '0000-00-00 00:00:00', NULL),
(992, 95, 'PONDOK KAHURU', '0000-00-00 00:00:00', NULL),
(993, 95, 'SUKADANA', '0000-00-00 00:00:00', NULL),
(994, 95, 'SUKABARES', '0000-00-00 00:00:00', NULL),
(995, 95, 'SUKARENA', '0000-00-00 00:00:00', NULL),
(996, 95, 'CEMPLANG', '0000-00-00 00:00:00', NULL),
(997, 95, 'PANYAUNGAN JAYA', '0000-00-00 00:00:00', NULL),
(998, 96, 'TANJUNGSARI', '0000-00-00 00:00:00', NULL),
(999, 96, 'KADUBEUREUM', '0000-00-00 00:00:00', NULL),
(1000, 96, 'PASANGGRAHAN', '0000-00-00 00:00:00', NULL),
(1001, 96, 'PABUARAN', '0000-00-00 00:00:00', NULL),
(1002, 96, 'PANCANEGARA', '0000-00-00 00:00:00', NULL),
(1003, 96, 'SINDANGHEULA', '0000-00-00 00:00:00', NULL),
(1004, 96, 'SINDANGSARI', '0000-00-00 00:00:00', NULL),
(1005, 96, 'TALAGA WARNA', '0000-00-00 00:00:00', NULL),
(1006, 97, 'CIHERANG', '0000-00-00 00:00:00', NULL),
(1007, 97, 'GUNUNGSARI', '0000-00-00 00:00:00', NULL),
(1008, 97, 'TAMIANG', '0000-00-00 00:00:00', NULL),
(1009, 97, 'SUKALABA', '0000-00-00 00:00:00', NULL),
(1010, 97, 'KADU AGUNG', '0000-00-00 00:00:00', NULL),
(1011, 97, 'LUWUK', '0000-00-00 00:00:00', NULL),
(1012, 97, 'CURUG SULANJANA', '0000-00-00 00:00:00', NULL),
(1013, 98, 'SUKACAI', '0000-00-00 00:00:00', NULL),
(1014, 98, 'SUKAMENAK', '0000-00-00 00:00:00', NULL),
(1015, 98, 'TEJAMARI', '0000-00-00 00:00:00', NULL),
(1016, 98, 'PANYIRAPAN', '0000-00-00 00:00:00', NULL),
(1017, 98, 'TAMANSARI', '0000-00-00 00:00:00', NULL),
(1018, 98, 'SINDANGMANDI', '0000-00-00 00:00:00', NULL),
(1019, 98, 'CURUG AGUNG', '0000-00-00 00:00:00', NULL),
(1020, 98, 'SUKAMANAH', '0000-00-00 00:00:00', NULL),
(1021, 98, 'PADASUKA', '0000-00-00 00:00:00', NULL),
(1022, 98, 'SINARMUKTI', '0000-00-00 00:00:00', NULL),
(1023, 98, 'SIDAMUKTI', '0000-00-00 00:00:00', NULL),
(1024, 98, 'BAROS', '0000-00-00 00:00:00', NULL),
(1025, 98, 'CISALAM', '0000-00-00 00:00:00', NULL),
(1026, 98, 'SUKA INDAH', '0000-00-00 00:00:00', NULL),
(1027, 99, 'KADUGENEP', '0000-00-00 00:00:00', NULL),
(1028, 99, 'PADASUKA', '0000-00-00 00:00:00', NULL),
(1029, 99, 'SANDING', '0000-00-00 00:00:00', NULL),
(1030, 99, 'SINDANGSARI', '0000-00-00 00:00:00', NULL),
(1031, 99, 'CIREUNDEU', '0000-00-00 00:00:00', NULL),
(1032, 99, 'CIRANGKONG', '0000-00-00 00:00:00', NULL),
(1033, 99, 'TAMBILUK', '0000-00-00 00:00:00', NULL),
(1034, 99, 'MEKARBARU', '0000-00-00 00:00:00', NULL),
(1035, 99, 'PETIR', '0000-00-00 00:00:00', NULL),
(1036, 99, 'NAGARA PADANG', '0000-00-00 00:00:00', NULL),
(1037, 99, 'KAMPUNG BARU', '0000-00-00 00:00:00', NULL),
(1038, 99, 'SEUAT', '0000-00-00 00:00:00', NULL),
(1039, 99, 'SEUAT JAYA', '0000-00-00 00:00:00', NULL),
(1040, 99, 'KUBANG JAYA', '0000-00-00 00:00:00', NULL),
(1041, 99, 'BOJONG NANGKA', '0000-00-00 00:00:00', NULL),
(1042, 100, 'PANUNGGULAN', '0000-00-00 00:00:00', NULL),
(1043, 100, 'SUKASARI', '0000-00-00 00:00:00', NULL),
(1044, 100, 'BOJONG MENTENG', '0000-00-00 00:00:00', NULL),
(1045, 100, 'KAMUNING', '0000-00-00 00:00:00', NULL),
(1046, 100, 'BOJONG PANDAN', '0000-00-00 00:00:00', NULL),
(1047, 100, 'BOJONG CATANG', '0000-00-00 00:00:00', NULL),
(1048, 100, 'MALANGGAH', '0000-00-00 00:00:00', NULL),
(1049, 100, 'TUNJUNG JAYA', '0000-00-00 00:00:00', NULL),
(1050, 100, 'PANCAREGANG', '0000-00-00 00:00:00', NULL),
(1051, 101, 'PANYABRANGAN', '0000-00-00 00:00:00', NULL),
(1052, 101, 'DAHU', '0000-00-00 00:00:00', NULL),
(1053, 101, 'BANTAR PANJANG', '0000-00-00 00:00:00', NULL),
(1054, 101, 'KATULISAN', '0000-00-00 00:00:00', NULL),
(1055, 101, 'PANOSOGAN', '0000-00-00 00:00:00', NULL),
(1056, 101, 'CIKEUSAL', '0000-00-00 00:00:00', NULL),
(1057, 101, 'SUKAMAJU', '0000-00-00 00:00:00', NULL),
(1058, 101, 'HARUNDANG', '0000-00-00 00:00:00', NULL),
(1059, 101, 'GANDAYASA', '0000-00-00 00:00:00', NULL),
(1060, 101, 'MONGPOK', '0000-00-00 00:00:00', NULL),
(1061, 101, 'SUKARAME', '0000-00-00 00:00:00', NULL),
(1062, 101, 'CILAYANG', '0000-00-00 00:00:00', NULL),
(1063, 101, 'SUKARATU', '0000-00-00 00:00:00', NULL),
(1064, 101, 'SUKAMENAK', '0000-00-00 00:00:00', NULL),
(1065, 101, 'CIMAUNG', '0000-00-00 00:00:00', NULL),
(1066, 101, 'SUKARAJA', '0000-00-00 00:00:00', NULL),
(1067, 101, 'CILAYANG GUHA', '0000-00-00 00:00:00', NULL),
(1068, 102, 'WIRANA', '0000-00-00 00:00:00', NULL),
(1069, 102, 'SANGIANG', '0000-00-00 00:00:00', NULL),
(1070, 102, 'DAMPING', '0000-00-00 00:00:00', NULL),
(1071, 102, 'KEBON CAU', '0000-00-00 00:00:00', NULL),
(1072, 102, 'PUDAR', '0000-00-00 00:00:00', NULL),
(1073, 102, 'BINONG', '0000-00-00 00:00:00', NULL),
(1074, 102, 'PAMARAYAN', '0000-00-00 00:00:00', NULL),
(1075, 102, 'KAMPUNG BARU', '0000-00-00 00:00:00', NULL),
(1076, 102, 'PASIRLIMUS', '0000-00-00 00:00:00', NULL),
(1077, 102, 'PASIR KEMBANG', '0000-00-00 00:00:00', NULL),
(1078, 103, 'PANGAWINAN', '0000-00-00 00:00:00', NULL),
(1079, 103, 'MANDER', '0000-00-00 00:00:00', NULL),
(1080, 103, 'PANAMPING', '0000-00-00 00:00:00', NULL),
(1081, 103, 'BANDUNG', '0000-00-00 00:00:00', NULL),
(1082, 103, 'MALABAR', '0000-00-00 00:00:00', NULL),
(1083, 103, 'BLOKANG', '0000-00-00 00:00:00', NULL),
(1084, 103, 'BABAKAN', '0000-00-00 00:00:00', NULL),
(1085, 103, 'PRINGWULUNG', '0000-00-00 00:00:00', NULL),
(1086, 104, 'PAGINTUNGAN', '0000-00-00 00:00:00', NULL),
(1087, 104, 'CEMPLANG', '0000-00-00 00:00:00', NULL),
(1088, 104, 'BOJOT', '0000-00-00 00:00:00', NULL),
(1089, 104, 'JAWILAN', '0000-00-00 00:00:00', NULL),
(1090, 104, 'PASIRBUYUT', '0000-00-00 00:00:00', NULL),
(1091, 104, 'MAJASARI', '0000-00-00 00:00:00', NULL),
(1092, 104, 'PARAKAN', '0000-00-00 00:00:00', NULL),
(1093, 104, 'KAREO', '0000-00-00 00:00:00', NULL),
(1094, 104, 'JUNTI', '0000-00-00 00:00:00', NULL),
(1095, 105, 'NANGGUNG', '0000-00-00 00:00:00', NULL),
(1096, 105, 'KOPO', '0000-00-00 00:00:00', NULL),
(1097, 105, 'MEKARBARU', '0000-00-00 00:00:00', NULL),
(1098, 105, 'GARUT', '0000-00-00 00:00:00', NULL),
(1099, 105, 'RANCASUMUR', '0000-00-00 00:00:00', NULL),
(1100, 105, 'CIDAHU', '0000-00-00 00:00:00', NULL),
(1101, 105, 'NYOMPOK', '0000-00-00 00:00:00', NULL),
(1102, 105, 'CARENANG UDIK', '0000-00-00 00:00:00', NULL),
(1103, 105, 'BABAKAN JAYA', '0000-00-00 00:00:00', NULL),
(1104, 105, 'GABUS', '0000-00-00 00:00:00', NULL),
(1105, 106, 'NAMBO UDIK', '0000-00-00 00:00:00', NULL),
(1106, 106, 'SITUTERATE', '0000-00-00 00:00:00', NULL),
(1107, 106, 'CIKANDE', '0000-00-00 00:00:00', NULL),
(1108, 106, 'LEUWILIMUS', '0000-00-00 00:00:00', NULL),
(1109, 106, 'PARIGI', '0000-00-00 00:00:00', NULL),
(1110, 106, 'SONGGOM JAYA', '0000-00-00 00:00:00', NULL),
(1111, 106, 'KOPER', '0000-00-00 00:00:00', NULL),
(1112, 106, 'KAMURANG', '0000-00-00 00:00:00', NULL),
(1113, 106, 'BAKUNG', '0000-00-00 00:00:00', NULL),
(1114, 106, 'GEMBOR UDIK', '0000-00-00 00:00:00', NULL),
(1115, 106, 'JULANG', '0000-00-00 00:00:00', NULL),
(1116, 106, 'SUKATANI', '0000-00-00 00:00:00', NULL),
(1117, 106, 'CIKANDE PERMAI', '0000-00-00 00:00:00', NULL),
(1118, 107, 'NAGARA', '0000-00-00 00:00:00', NULL),
(1119, 107, 'CIJERUK', '0000-00-00 00:00:00', NULL),
(1120, 107, 'BARENGKOK', '0000-00-00 00:00:00', NULL),
(1121, 107, 'NAMBO ILIR', '0000-00-00 00:00:00', NULL),
(1122, 107, 'KIBIN', '0000-00-00 00:00:00', NULL),
(1123, 107, 'TAMBAK', '0000-00-00 00:00:00', NULL),
(1124, 107, 'CIAGEL', '0000-00-00 00:00:00', NULL),
(1125, 107, 'KETOS', '0000-00-00 00:00:00', NULL),
(1126, 107, 'SUKAMAJU', '0000-00-00 00:00:00', NULL),
(1127, 108, 'SILEBU', '0000-00-00 00:00:00', NULL),
(1128, 108, 'SUKAJADI', '0000-00-00 00:00:00', NULL),
(1129, 108, 'PEMATANG', '0000-00-00 00:00:00', NULL),
(1130, 108, 'KRAMATJATI', '0000-00-00 00:00:00', NULL),
(1131, 108, 'DUKUH', '0000-00-00 00:00:00', NULL),
(1132, 108, 'UNDAR ANDIR', '0000-00-00 00:00:00', NULL),
(1133, 108, 'KENDAYAKAN', '0000-00-00 00:00:00', NULL),
(1134, 108, 'CISAIT', '0000-00-00 00:00:00', NULL),
(1135, 108, 'SENTUL', '0000-00-00 00:00:00', NULL),
(1136, 108, 'KRAGILAN', '0000-00-00 00:00:00', NULL),
(1137, 108, 'TEGALMAJA', '0000-00-00 00:00:00', NULL),
(1138, 108, 'JERUKTIPIS', '0000-00-00 00:00:00', NULL),
(1139, 109, 'SASAHAN', '0000-00-00 00:00:00', NULL),
(1140, 109, 'COKOPSULANJANA', '0000-00-00 00:00:00', NULL),
(1141, 109, 'TELAGA LUHUR', '0000-00-00 00:00:00', NULL),
(1142, 109, 'BINANGUN', '0000-00-00 00:00:00', NULL),
(1143, 109, 'KEMUNING', '0000-00-00 00:00:00', NULL),
(1144, 109, 'SUKABARES', '0000-00-00 00:00:00', NULL),
(1145, 109, 'SAMBILAWANG', '0000-00-00 00:00:00', NULL),
(1146, 109, 'MELATI', '0000-00-00 00:00:00', NULL),
(1147, 109, 'SAMPIR', '0000-00-00 00:00:00', NULL),
(1148, 109, 'WARINGINKURUNG', '0000-00-00 00:00:00', NULL),
(1149, 109, 'SUKADALEM', '0000-00-00 00:00:00', NULL),
(1150, 110, 'CIKEDUNG', '0000-00-00 00:00:00', NULL),
(1151, 110, 'CIWARNA', '0000-00-00 00:00:00', NULL),
(1152, 110, 'ANGSANA', '0000-00-00 00:00:00', NULL),
(1153, 110, 'TALAGA', '0000-00-00 00:00:00', NULL),
(1154, 110, 'BALEKAMBANG', '0000-00-00 00:00:00', NULL),
(1155, 110, 'LABUHAN', '0000-00-00 00:00:00', NULL),
(1156, 110, 'SANGIANG', '0000-00-00 00:00:00', NULL),
(1157, 110, 'PASIRWARU', '0000-00-00 00:00:00', NULL),
(1158, 110, 'WARINGIN', '0000-00-00 00:00:00', NULL),
(1159, 110, 'MANCAK', '0000-00-00 00:00:00', NULL),
(1160, 110, 'SIGEDONG', '0000-00-00 00:00:00', NULL),
(1161, 110, 'BATUKUDA', '0000-00-00 00:00:00', NULL),
(1162, 110, 'WINONG', '0000-00-00 00:00:00', NULL),
(1163, 110, 'BALE KENCANA', '0000-00-00 00:00:00', NULL),
(1164, 111, 'BANDULU', '0000-00-00 00:00:00', NULL),
(1165, 111, 'SINDANGMANDI', '0000-00-00 00:00:00', NULL),
(1166, 111, 'BANJARSARI', '0000-00-00 00:00:00', NULL),
(1167, 111, 'BUNIHARA', '0000-00-00 00:00:00', NULL),
(1168, 111, 'TANJUNGMANIS', '0000-00-00 00:00:00', NULL),
(1169, 111, 'CIKONENG', '0000-00-00 00:00:00', NULL),
(1170, 111, 'ANYAR', '0000-00-00 00:00:00', NULL),
(1171, 111, 'KOSAMBI RONYOK', '0000-00-00 00:00:00', NULL),
(1172, 111, 'SINDANGKARYA', '0000-00-00 00:00:00', NULL),
(1173, 111, 'MEKARSARI', '0000-00-00 00:00:00', NULL),
(1174, 111, 'TAMBANG AYAM', '0000-00-00 00:00:00', NULL),
(1175, 111, 'GROGOL INDAH', '0000-00-00 00:00:00', NULL),
(1176, 112, 'WANAKARTA', '0000-00-00 00:00:00', NULL),
(1177, 112, 'KERTASANA', '0000-00-00 00:00:00', NULL),
(1178, 112, 'MANGKUNEGARA', '0000-00-00 00:00:00', NULL),
(1179, 112, 'KARANGKEPUH', '0000-00-00 00:00:00', NULL),
(1180, 112, 'LAMBANGSARI', '0000-00-00 00:00:00', NULL),
(1181, 112, 'BOJONEGARA', '0000-00-00 00:00:00', NULL),
(1182, 112, 'MARGAGIRI', '0000-00-00 00:00:00', NULL),
(1183, 112, 'UKIRSARI', '0000-00-00 00:00:00', NULL),
(1184, 112, 'PAKUNCEN', '0000-00-00 00:00:00', NULL),
(1185, 112, 'PENGARENGAN', '0000-00-00 00:00:00', NULL),
(1186, 112, 'MEKAR  JAYA', '0000-00-00 00:00:00', NULL),
(1187, 113, 'ARGAWANA', '0000-00-00 00:00:00', NULL),
(1188, 113, 'BANYUWANGI', '0000-00-00 00:00:00', NULL),
(1189, 113, 'MARGASARI', '0000-00-00 00:00:00', NULL),
(1190, 113, 'PULOAMPEL', '0000-00-00 00:00:00', NULL),
(1191, 113, 'SUMURANJA', '0000-00-00 00:00:00', NULL),
(1192, 113, 'KEDUNG SOKA', '0000-00-00 00:00:00', NULL),
(1193, 113, 'MANGUNREJA', '0000-00-00 00:00:00', NULL),
(1194, 113, 'SALIRA', '0000-00-00 00:00:00', NULL),
(1195, 113, 'PULO PANJANG', '0000-00-00 00:00:00', NULL),
(1196, 114, 'LEBAKWANA', '0000-00-00 00:00:00', NULL),
(1197, 114, 'PELAMUNAN', '0000-00-00 00:00:00', NULL),
(1198, 114, 'MARGASANA', '0000-00-00 00:00:00', NULL),
(1199, 114, 'KRAMATWATU', '0000-00-00 00:00:00', NULL),
(1200, 114, 'PEJATEN', '0000-00-00 00:00:00', NULL),
(1201, 114, 'WANAYASA', '0000-00-00 00:00:00', NULL),
(1202, 114, 'HARJATANI', '0000-00-00 00:00:00', NULL),
(1203, 114, 'SERDANG', '0000-00-00 00:00:00', NULL),
(1204, 114, 'TOYOMERTO', '0000-00-00 00:00:00', NULL),
(1205, 114, 'PEGADINGAN', '0000-00-00 00:00:00', NULL),
(1206, 114, 'PAMENGKANG', '0000-00-00 00:00:00', NULL),
(1207, 114, 'TONJONG', '0000-00-00 00:00:00', NULL),
(1208, 114, 'TERATE', '0000-00-00 00:00:00', NULL),
(1209, 114, 'TELUK TERATE', '0000-00-00 00:00:00', NULL),
(1210, 114, 'MARGATANI', '0000-00-00 00:00:00', NULL),
(1211, 115, 'CITEREP', '0000-00-00 00:00:00', NULL),
(1212, 115, 'RANJENG', '0000-00-00 00:00:00', NULL),
(1213, 115, 'CIRUAS', '0000-00-00 00:00:00', NULL),
(1214, 115, 'KADIKARAN', '0000-00-00 00:00:00', NULL),
(1215, 115, 'SINGAMERTA', '0000-00-00 00:00:00', NULL),
(1216, 115, 'PULO', '0000-00-00 00:00:00', NULL),
(1217, 115, 'GOSARA', '0000-00-00 00:00:00', NULL),
(1218, 115, 'KEPANDEAN', '0000-00-00 00:00:00', NULL),
(1219, 115, 'PAMONG', '0000-00-00 00:00:00', NULL),
(1220, 115, 'CIGELAM', '0000-00-00 00:00:00', NULL),
(1221, 115, 'PENGGALANG', '0000-00-00 00:00:00', NULL),
(1222, 115, 'BUMIJAYA', '0000-00-00 00:00:00', NULL),
(1223, 115, 'KESERANGAN', '0000-00-00 00:00:00', NULL),
(1224, 115, 'BEBERAN', '0000-00-00 00:00:00', NULL),
(1225, 115, 'PELAWAD', '0000-00-00 00:00:00', NULL),
(1226, 116, 'SUKAJAYA', '0000-00-00 00:00:00', NULL),
(1227, 116, 'SUKANEGARA', '0000-00-00 00:00:00', NULL),
(1228, 116, 'KALAPIAN', '0000-00-00 00:00:00', NULL),
(1229, 116, 'KESERANGAN', '0000-00-00 00:00:00', NULL),
(1230, 116, 'PULO KENCANA', '0000-00-00 00:00:00', NULL),
(1231, 116, 'LINDUK', '0000-00-00 00:00:00', NULL),
(1232, 116, 'KUBANG PUJI', '0000-00-00 00:00:00', NULL),
(1233, 116, 'SINGARAJAN', '0000-00-00 00:00:00', NULL),
(1234, 116, 'PONTANG', '0000-00-00 00:00:00', NULL),
(1235, 116, 'WANAYASA', '0000-00-00 00:00:00', NULL),
(1236, 116, 'DOMAS', '0000-00-00 00:00:00', NULL),
(1237, 117, 'KEBONRATU', '0000-00-00 00:00:00', NULL),
(1238, 117, 'TERASBENDUNG', '0000-00-00 00:00:00', NULL),
(1239, 117, 'KAMARUTON', '0000-00-00 00:00:00', NULL),
(1240, 117, 'PURWADADI', '0000-00-00 00:00:00', NULL),
(1241, 117, 'LEBAKWANGI', '0000-00-00 00:00:00', NULL),
(1242, 117, 'TIREM', '0000-00-00 00:00:00', NULL),
(1243, 117, 'LEBAK KEPUH', '0000-00-00 00:00:00', NULL),
(1244, 117, 'KENCANA HARAPAN', '0000-00-00 00:00:00', NULL),
(1245, 117, 'BOLANG', '0000-00-00 00:00:00', NULL),
(1246, 117, 'PEGANDIKAN', '0000-00-00 00:00:00', NULL),
(1247, 118, 'MANDAYA', '0000-00-00 00:00:00', NULL),
(1248, 118, 'TERAS', '0000-00-00 00:00:00', NULL),
(1249, 118, 'WALIKUKUN', '0000-00-00 00:00:00', NULL),
(1250, 118, 'PANENJOAN', '0000-00-00 00:00:00', NULL),
(1251, 118, 'MEKARSARI', '0000-00-00 00:00:00', NULL),
(1252, 118, 'PAMANUK', '0000-00-00 00:00:00', NULL),
(1253, 118, 'CARENANG', '0000-00-00 00:00:00', NULL),
(1254, 118, 'RAGASMESIGIT', '0000-00-00 00:00:00', NULL),
(1255, 119, 'GEMBOR', '0000-00-00 00:00:00', NULL),
(1256, 119, 'RENGED', '0000-00-00 00:00:00', NULL),
(1257, 119, 'CAKUNG', '0000-00-00 00:00:00', NULL),
(1258, 119, 'LAMARAN', '0000-00-00 00:00:00', NULL),
(1259, 119, 'WARAKAS', '0000-00-00 00:00:00', NULL),
(1260, 119, 'BINUANG', '0000-00-00 00:00:00', NULL),
(1261, 119, 'SUKAMAMPIR', '0000-00-00 00:00:00', NULL),
(1262, 120, 'TENGKURAK', '0000-00-00 00:00:00', NULL),
(1263, 120, 'TIRTAYASA', '0000-00-00 00:00:00', NULL),
(1264, 120, 'LABAN', '0000-00-00 00:00:00', NULL),
(1265, 120, 'PUSER', '0000-00-00 00:00:00', NULL),
(1266, 120, 'SAMPARWADI', '0000-00-00 00:00:00', NULL),
(1267, 120, 'SUJUNG', '0000-00-00 00:00:00', NULL),
(1268, 120, 'KEBON', '0000-00-00 00:00:00', NULL),
(1269, 120, 'KEBUYUTAN', '0000-00-00 00:00:00', NULL),
(1270, 120, 'KEMANISAN', '0000-00-00 00:00:00', NULL),
(1271, 120, 'PONTANG LEGON', '0000-00-00 00:00:00', NULL),
(1272, 120, 'SUSUKAN', '0000-00-00 00:00:00', NULL),
(1273, 120, 'ALANG ALANG', '0000-00-00 00:00:00', NULL),
(1274, 120, 'LONTAR', '0000-00-00 00:00:00', NULL),
(1275, 120, 'WARGASARA', '0000-00-00 00:00:00', NULL),
(1276, 121, 'SIREMEN', '0000-00-00 00:00:00', NULL),
(1277, 121, 'CIBODAS', '0000-00-00 00:00:00', NULL),
(1278, 121, 'CERUKCUK', '0000-00-00 00:00:00', NULL),
(1279, 121, 'LEMPUYANG', '0000-00-00 00:00:00', NULL),
(1280, 121, 'BENDUNG', '0000-00-00 00:00:00', NULL),
(1281, 121, 'SUKAMANAH', '0000-00-00 00:00:00', NULL),
(1282, 121, 'TANARA', '0000-00-00 00:00:00', NULL),
(1283, 121, 'PEDALEMAN', '0000-00-00 00:00:00', NULL),
(1284, 121, 'TENJO AYU', '0000-00-00 00:00:00', NULL),
(1285, 121, 'TAJUR', '0000-00-00 00:00:00', NULL),
(1286, 121, 'PARUNG SERAB', '0000-00-00 00:00:00', NULL),
(1287, 121, 'PANINGGILAN', '0000-00-00 00:00:00', NULL),
(1288, 121, 'PANINGGILAN UTARA', '0000-00-00 00:00:00', NULL),
(1289, 121, 'SUDIMARA SELATAN', '0000-00-00 00:00:00', NULL),
(1290, 121, 'SUDIMARA BARAT', '0000-00-00 00:00:00', NULL),
(1291, 121, 'SUDIMARA JAYA', '0000-00-00 00:00:00', NULL),
(1292, 121, 'SUDIMARA TIMUR', '0000-00-00 00:00:00', NULL),
(1293, 122, 'LARANGAN SELATAN', '0000-00-00 00:00:00', NULL),
(1294, 122, 'GAGA', '0000-00-00 00:00:00', NULL),
(1295, 122, 'CIPADU JAYA', '0000-00-00 00:00:00', NULL),
(1296, 122, 'KEREO SELATAN', '0000-00-00 00:00:00', NULL),
(1297, 122, 'CIPADU', '0000-00-00 00:00:00', NULL),
(1298, 122, 'KEREO', '0000-00-00 00:00:00', NULL),
(1299, 122, 'LARANGAN INDAH', '0000-00-00 00:00:00', NULL),
(1300, 122, 'LARANGAN UTARA', '0000-00-00 00:00:00', NULL),
(1301, 123, 'PEDURENAN', '0000-00-00 00:00:00', NULL),
(1302, 123, 'PONDOK PUCUNG', '0000-00-00 00:00:00', NULL),
(1303, 123, 'KARANG TENGAH', '0000-00-00 00:00:00', NULL),
(1304, 123, 'KARANG TIMUR', '0000-00-00 00:00:00', NULL),
(1305, 123, 'KARANG MULYA', '0000-00-00 00:00:00', NULL),
(1306, 123, 'PARUNG JAYA', '0000-00-00 00:00:00', NULL),
(1307, 123, 'PONDOK BAHAR', '0000-00-00 00:00:00', NULL),
(1308, 124, 'PORIS PLAWAD INDAH', '0000-00-00 00:00:00', NULL),
(1309, 124, 'CIPONDOH', '0000-00-00 00:00:00', NULL),
(1310, 124, 'KENANGA', '0000-00-00 00:00:00', NULL),
(1311, 124, 'GONDRONG', '0000-00-00 00:00:00', NULL),
(1312, 124, 'PETIR', '0000-00-00 00:00:00', NULL),
(1313, 124, 'KETAPANG', '0000-00-00 00:00:00', NULL),
(1314, 124, 'CIPONDOH INDAH', '0000-00-00 00:00:00', NULL),
(1315, 124, 'CIPONDOH MAKMUR', '0000-00-00 00:00:00', NULL),
(1316, 124, 'PORIS PLAWAD UTARA', '0000-00-00 00:00:00', NULL),
(1317, 124, 'PORIS PLAWAD', '0000-00-00 00:00:00', NULL),
(1318, 125, 'PANUNGGANGAN UTARA', '0000-00-00 00:00:00', NULL),
(1319, 125, 'PANUNGGANGAN', '0000-00-00 00:00:00', NULL),
(1320, 125, 'PANUNGGANGAN TIMUR', '0000-00-00 00:00:00', NULL),
(1321, 125, 'KUNCIRAN', '0000-00-00 00:00:00', NULL),
(1322, 125, 'KUNCIRAN INDAH', '0000-00-00 00:00:00', NULL),
(1323, 125, 'SUDIMARA PINANG', '0000-00-00 00:00:00', NULL),
(1324, 125, 'PINANG', '0000-00-00 00:00:00', NULL),
(1325, 125, 'NEROKTOG', '0000-00-00 00:00:00', NULL),
(1326, 125, 'KUNCIRAN JAYA', '0000-00-00 00:00:00', NULL),
(1327, 125, 'PAKOJAN', '0000-00-00 00:00:00', NULL),
(1328, 125, 'CIPETE', '0000-00-00 00:00:00', NULL),
(1329, 126, 'CIKOKOL', '0000-00-00 00:00:00', NULL),
(1330, 126, 'KELAPA INDAH', '0000-00-00 00:00:00', NULL),
(1331, 126, 'BABAKAN', '0000-00-00 00:00:00', NULL),
(1332, 126, 'SUKASARI', '0000-00-00 00:00:00', NULL),
(1333, 126, 'BUARAN INDAH', '0000-00-00 00:00:00', NULL),
(1334, 126, 'TANAH TINGGI', '0000-00-00 00:00:00', NULL),
(1335, 126, 'SUKAASIH', '0000-00-00 00:00:00', NULL),
(1336, 126, 'SUKARASA', '0000-00-00 00:00:00', NULL),
(1337, 127, 'KARAWACI BARU', '0000-00-00 00:00:00', NULL),
(1338, 127, 'NUSAJAYA', '0000-00-00 00:00:00', NULL),
(1339, 127, 'BOJONGJAYA', '0000-00-00 00:00:00', NULL),
(1340, 127, 'KARAWACI', '0000-00-00 00:00:00', NULL),
(1341, 127, 'CIMONE JAYA', '0000-00-00 00:00:00', NULL),
(1342, 127, 'CIMONE', '0000-00-00 00:00:00', NULL),
(1343, 127, 'BUGEL', '0000-00-00 00:00:00', NULL),
(1344, 127, 'MARGASARI', '0000-00-00 00:00:00', NULL),
(1345, 127, 'PABUARAN', '0000-00-00 00:00:00', NULL),
(1346, 127, 'SUKAJADI', '0000-00-00 00:00:00', NULL),
(1347, 127, 'GERENDENG', '0000-00-00 00:00:00', NULL),
(1348, 127, 'KOANGJAYA', '0000-00-00 00:00:00', NULL),
(1349, 127, 'PASARBARU', '0000-00-00 00:00:00', NULL),
(1350, 127, 'SUMUR PACING', '0000-00-00 00:00:00', NULL),
(1351, 127, 'PABUARAN TUMPENG', '0000-00-00 00:00:00', NULL),
(1352, 127, 'NAMBOJAYA', '0000-00-00 00:00:00', NULL),
(1353, 128, 'MANIS JAYA', '0000-00-00 00:00:00', NULL),
(1354, 128, 'JATAKE', '0000-00-00 00:00:00', NULL),
(1355, 128, 'GANDASARI', '0000-00-00 00:00:00', NULL),
(1356, 128, 'KRONCONG', '0000-00-00 00:00:00', NULL),
(1357, 128, 'ALAM JAYA', '0000-00-00 00:00:00', NULL),
(1358, 128, 'PASIR JAYA', '0000-00-00 00:00:00', NULL),
(1359, 129, 'PANUNGGANGAN BARAT', '0000-00-00 00:00:00', NULL),
(1360, 129, 'CIBODASARI', '0000-00-00 00:00:00', NULL),
(1361, 129, 'CIBODAS BARU', '0000-00-00 00:00:00', NULL),
(1362, 129, 'CIBODAS', '0000-00-00 00:00:00', NULL),
(1363, 129, 'UWUNG JAYA', '0000-00-00 00:00:00', NULL),
(1364, 129, 'JATIUWUNG', '0000-00-00 00:00:00', NULL),
(1365, 130, 'GEMBOR', '0000-00-00 00:00:00', NULL),
(1366, 130, 'GEBANG RAYA', '0000-00-00 00:00:00', NULL),
(1367, 130, 'SANGIANG JAYA', '0000-00-00 00:00:00', NULL),
(1368, 130, 'PERIUK', '0000-00-00 00:00:00', NULL),
(1369, 130, 'PERIUK JAYA', '0000-00-00 00:00:00', NULL),
(1370, 131, 'PORISGAGA BARU', '0000-00-00 00:00:00', NULL),
(1371, 131, 'PORIS JAYA', '0000-00-00 00:00:00', NULL),
(1372, 131, 'PORISGAGA', '0000-00-00 00:00:00', NULL),
(1373, 131, 'KEBON BESAR', '0000-00-00 00:00:00', NULL),
(1374, 131, 'BATUCEPER', '0000-00-00 00:00:00', NULL),
(1375, 131, 'BATUJAYA', '0000-00-00 00:00:00', NULL),
(1376, 131, 'BATUSARI', '0000-00-00 00:00:00', NULL),
(1377, 132, 'KARANG ANYAR', '0000-00-00 00:00:00', NULL),
(1378, 132, 'KARANG SARI', '0000-00-00 00:00:00', NULL),
(1379, 132, 'NEGLASARI', '0000-00-00 00:00:00', NULL),
(1380, 132, 'MEKARSARI', '0000-00-00 00:00:00', NULL),
(1381, 132, 'KEDAUNG BARU', '0000-00-00 00:00:00', NULL),
(1382, 132, 'KEDAUNG WETAN', '0000-00-00 00:00:00', NULL),
(1383, 132, 'SELAPAJANG JAYA', '0000-00-00 00:00:00', NULL),
(1384, 133, 'BELENDUNG', '0000-00-00 00:00:00', NULL),
(1385, 133, 'JURUMUDI BARU', '0000-00-00 00:00:00', NULL),
(1386, 133, 'JURUMUDI', '0000-00-00 00:00:00', NULL),
(1387, 133, 'PAJANG', '0000-00-00 00:00:00', NULL),
(1388, 133, 'BENDA', '0000-00-00 00:00:00', NULL),
(1389, 134, 'GUNUNGSUGIH', '0000-00-00 00:00:00', NULL),
(1390, 134, 'KEPUH', '0000-00-00 00:00:00', NULL),
(1391, 134, 'RANDAKARI', '0000-00-00 00:00:00', NULL),
(1392, 134, 'TEGALRATU', '0000-00-00 00:00:00', NULL),
(1393, 134, 'BANJAR NEGARA', '0000-00-00 00:00:00', NULL),
(1394, 134, 'KUBANGSARI', '0000-00-00 00:00:00', NULL),
(1395, 135, 'DERINGO', '0000-00-00 00:00:00', NULL),
(1396, 135, 'LEBAKDENOK', '0000-00-00 00:00:00', NULL),
(1397, 135, 'TAMANBARU', '0000-00-00 00:00:00', NULL),
(1398, 135, 'CITANGKIL', '0000-00-00 00:00:00', NULL),
(1399, 135, 'KEBONSARI', '0000-00-00 00:00:00', NULL),
(1400, 135, 'WARNASARI', '0000-00-00 00:00:00', NULL),
(1401, 135, 'SAMANGRAYA', '0000-00-00 00:00:00', NULL),
(1402, 136, 'MEKARSARI', '0000-00-00 00:00:00', NULL),
(1403, 136, 'TAMANSARI', '0000-00-00 00:00:00', NULL),
(1404, 136, 'LEBAK GEDE', '0000-00-00 00:00:00', NULL),
(1405, 136, 'SURALAYA', '0000-00-00 00:00:00', NULL),
(1406, 137, 'RAMANUJU', '0000-00-00 00:00:00', NULL),
(1407, 137, 'KEBONDALEM', '0000-00-00 00:00:00', NULL),
(1408, 137, 'PURWAKARTA', '0000-00-00 00:00:00', NULL),
(1409, 137, 'TEGAL BUNDER', '0000-00-00 00:00:00', NULL),
(1410, 137, 'PABEAN', '0000-00-00 00:00:00', NULL),
(1411, 137, 'KOTABUMI', '0000-00-00 00:00:00', NULL),
(1412, 138, 'KOTASARI', '0000-00-00 00:00:00', NULL),
(1413, 138, 'GROGOL', '0000-00-00 00:00:00', NULL),
(1414, 138, 'RAWA ARUM', '0000-00-00 00:00:00', NULL),
(1415, 138, 'GEREM', '0000-00-00 00:00:00', NULL),
(1416, 139, 'BAGENDUNG', '0000-00-00 00:00:00', NULL),
(1417, 139, 'CIWEDUS', '0000-00-00 00:00:00', NULL),
(1418, 139, 'BENDUNGAN', '0000-00-00 00:00:00', NULL),
(1419, 139, 'CIWADUK', '0000-00-00 00:00:00', NULL),
(1420, 139, 'KETILENG', '0000-00-00 00:00:00', NULL),
(1421, 140, 'JOMBANG WETAN', '0000-00-00 00:00:00', NULL),
(1422, 140, 'MASIGIT', '0000-00-00 00:00:00', NULL),
(1423, 140, 'PANGGUNG RAWI', '0000-00-00 00:00:00', NULL),
(1424, 140, 'GEDONG DALEM', '0000-00-00 00:00:00', NULL),
(1425, 140, 'SUKMAJAYA', '0000-00-00 00:00:00', NULL),
(1426, 141, 'BULAKAN', '0000-00-00 00:00:00', NULL),
(1427, 141, 'CIKERAI', '0000-00-00 00:00:00', NULL),
(1428, 141, 'KALITIMBANG', '0000-00-00 00:00:00', NULL),
(1429, 141, 'KARANGASEM', '0000-00-00 00:00:00', NULL),
(1430, 141, 'CIBEBER', '0000-00-00 00:00:00', NULL),
(1431, 141, 'KEDALEMAN', '0000-00-00 00:00:00', NULL),
(1432, 142, 'KAMANISAN', '0000-00-00 00:00:00', NULL),
(1433, 142, 'PANCALAKSANA', '0000-00-00 00:00:00', NULL),
(1434, 142, 'TINGGAR', '0000-00-00 00:00:00', NULL),
(1435, 142, 'CIPETE', '0000-00-00 00:00:00', NULL),
(1436, 142, 'CURUGMANIS', '0000-00-00 00:00:00', NULL),
(1437, 142, 'SUKALAKSANA', '0000-00-00 00:00:00', NULL),
(1438, 142, 'SUKAWANA', '0000-00-00 00:00:00', NULL),
(1439, 142, 'CURUG', '0000-00-00 00:00:00', NULL),
(1440, 142, 'SUKAJAYA', '0000-00-00 00:00:00', NULL),
(1441, 142, 'CILAKU', '0000-00-00 00:00:00', NULL),
(1442, 143, 'NYAPAH', '0000-00-00 00:00:00', NULL),
(1443, 143, 'LEBAKWANGI', '0000-00-00 00:00:00', NULL),
(1444, 143, 'CIGOONG', '0000-00-00 00:00:00', NULL),
(1445, 143, 'TEGALSARI', '0000-00-00 00:00:00', NULL),
(1446, 143, 'PASULUHAN', '0000-00-00 00:00:00', NULL),
(1447, 143, 'PABUARAN', '0000-00-00 00:00:00', NULL),
(1448, 143, 'WALANTAKA', '0000-00-00 00:00:00', NULL),
(1449, 143, 'PENGAMPELAN', '0000-00-00 00:00:00', NULL),
(1450, 143, 'PIPITAN', '0000-00-00 00:00:00', NULL),
(1451, 143, 'KIARA', '0000-00-00 00:00:00', NULL),
(1452, 143, 'PAGERAGUNG', '0000-00-00 00:00:00', NULL),
(1453, 143, 'KALODRAN', '0000-00-00 00:00:00', NULL),
(1454, 143, 'KEPUREN', '0000-00-00 00:00:00', NULL),
(1455, 143, 'TERITIH', '0000-00-00 00:00:00', NULL),
(1456, 144, 'GELAM', '0000-00-00 00:00:00', NULL),
(1457, 144, 'DALUNG', '0000-00-00 00:00:00', NULL),
(1458, 144, 'TEMBONG', '0000-00-00 00:00:00', NULL),
(1459, 144, 'KARUNDANG', '0000-00-00 00:00:00', NULL),
(1460, 144, 'CIPOCOK JAYA', '0000-00-00 00:00:00', NULL),
(1461, 144, 'BANJARSARI', '0000-00-00 00:00:00', NULL),
(1462, 144, 'BANJARAGUNG', '0000-00-00 00:00:00', NULL),
(1463, 144, 'PANANCANGAN', '0000-00-00 00:00:00', NULL),
(1464, 145, 'SERANG', '0000-00-00 00:00:00', NULL),
(1465, 145, 'CIPARE', '0000-00-00 00:00:00', NULL),
(1466, 145, 'SUMURPECUNG', '0000-00-00 00:00:00', NULL),
(1467, 145, 'CIMUNCANG', '0000-00-00 00:00:00', NULL),
(1468, 145, 'KOTABARU', '0000-00-00 00:00:00', NULL),
(1469, 145, 'LONTARBARU', '0000-00-00 00:00:00', NULL),
(1470, 145, 'KAGUNGAN', '0000-00-00 00:00:00', NULL),
(1471, 145, 'LOPANG', '0000-00-00 00:00:00', NULL),
(1472, 145, 'UNYUR', '0000-00-00 00:00:00', NULL),
(1473, 145, 'KALIGANDU', '0000-00-00 00:00:00', NULL),
(1474, 145, 'TERONDOL', '0000-00-00 00:00:00', NULL),
(1475, 145, 'SUKAWANA', '0000-00-00 00:00:00', NULL),
(1476, 146, 'CILOWONG', '0000-00-00 00:00:00', NULL),
(1477, 146, 'SAYAR', '0000-00-00 00:00:00', NULL),
(1478, 146, 'SEPANG', '0000-00-00 00:00:00', NULL),
(1479, 146, 'PANCUR', '0000-00-00 00:00:00', NULL),
(1480, 146, 'KALANG ANYAR', '0000-00-00 00:00:00', NULL),
(1481, 146, 'KURANJI', '0000-00-00 00:00:00', NULL),
(1482, 146, 'PANGGUNGJATI', '0000-00-00 00:00:00', NULL),
(1483, 146, 'DRANGONG', '0000-00-00 00:00:00', NULL),
(1484, 146, 'TAKTAKAN', '0000-00-00 00:00:00', NULL),
(1485, 146, 'UMBUL TENGAH', '0000-00-00 00:00:00', NULL),
(1486, 146, 'LIALANG', '0000-00-00 00:00:00', NULL),
(1487, 146, 'TAMANBARU', '0000-00-00 00:00:00', NULL),
(1488, 147, 'KASEMEN', '0000-00-00 00:00:00', NULL),
(1489, 147, 'WARUNG JAUD', '0000-00-00 00:00:00', NULL),
(1490, 147, 'MESJID PRIYAYI', '0000-00-00 00:00:00', NULL),
(1491, 147, 'BENDUNG', '0000-00-00 00:00:00', NULL),
(1492, 147, 'TERUMBU', '0000-00-00 00:00:00', NULL),
(1493, 147, 'SAWAH LUHUR', '0000-00-00 00:00:00', NULL),
(1494, 147, 'KILASAH', '0000-00-00 00:00:00', NULL),
(1495, 147, 'MARGALUYU', '0000-00-00 00:00:00', NULL),
(1496, 147, 'KASUNYATAN', '0000-00-00 00:00:00', NULL),
(1497, 147, 'BANTEN', '0000-00-00 00:00:00', NULL),
(1498, 148, 'KRANGGAN', '0000-00-00 00:00:00', NULL),
(1499, 148, 'MUNCUL', '0000-00-00 00:00:00', NULL),
(1500, 148, 'KADEMANGAN', '0000-00-00 00:00:00', NULL),
(1501, 148, 'SETU', '0000-00-00 00:00:00', NULL),
(1502, 148, 'BABAKAN', '0000-00-00 00:00:00', NULL),
(1503, 148, 'BAKTI JAYA', '0000-00-00 00:00:00', NULL),
(1504, 149, 'BUARAN', '0000-00-00 00:00:00', NULL),
(1505, 149, 'CIATER', '0000-00-00 00:00:00', NULL),
(1506, 149, 'RAWA MEKAR JAYA', '0000-00-00 00:00:00', NULL),
(1507, 149, 'RAWA BUNTU', '0000-00-00 00:00:00', NULL),
(1508, 149, 'SERPONG', '0000-00-00 00:00:00', NULL),
(1509, 149, 'CILENGGANG', '0000-00-00 00:00:00', NULL),
(1510, 149, 'LENGKONG GUDANG', '0000-00-00 00:00:00', NULL),
(1511, 149, 'LENGKONG GUDANG TIMUR', '0000-00-00 00:00:00', NULL),
(1512, 149, 'LENGKONG WETAN', '0000-00-00 00:00:00', NULL),
(1513, 150, 'PONDOK BENDA', '0000-00-00 00:00:00', NULL),
(1514, 150, 'PAMULANG BARAT', '0000-00-00 00:00:00', NULL),
(1515, 150, 'PAMULANG TIMUR', '0000-00-00 00:00:00', NULL),
(1516, 150, 'PONDOK CABE UDIK', '0000-00-00 00:00:00', NULL),
(1517, 150, 'PONDOK CABE ILIR', '0000-00-00 00:00:00', NULL),
(1518, 150, 'KEDAUNG', '0000-00-00 00:00:00', NULL),
(1519, 150, 'BAMBU APUS', '0000-00-00 00:00:00', NULL),
(1520, 150, 'BENDA BARU', '0000-00-00 00:00:00', NULL),
(1521, 151, 'SARUA', '0000-00-00 00:00:00', NULL),
(1522, 151, 'JOMBANG', '0000-00-00 00:00:00', NULL),
(1523, 151, 'SAWAH BARU', '0000-00-00 00:00:00', NULL),
(1524, 151, 'SARUA INDAH', '0000-00-00 00:00:00', NULL),
(1525, 151, 'SAWAH', '0000-00-00 00:00:00', NULL),
(1526, 151, 'CIPUTAT', '0000-00-00 00:00:00', NULL),
(1527, 151, 'CIPAYUNG', '0000-00-00 00:00:00', NULL),
(1528, 152, 'PISANGAN', '0000-00-00 00:00:00', NULL),
(1529, 152, 'CIREUNDEU', '0000-00-00 00:00:00', NULL),
(1530, 152, 'CEMPAKA PUTIH', '0000-00-00 00:00:00', NULL),
(1531, 152, 'REMPOA', '0000-00-00 00:00:00', NULL),
(1532, 152, 'RENGAS', '0000-00-00 00:00:00', NULL),
(1533, 152, 'PONDOK RANJI', '0000-00-00 00:00:00', NULL),
(1534, 153, 'PERIGI BARU', '0000-00-00 00:00:00', NULL),
(1535, 153, 'PONDOK KACANG BARAT', '0000-00-00 00:00:00', NULL),
(1536, 153, 'PONDOK KACANG TIMUR', '0000-00-00 00:00:00', NULL),
(1537, 153, 'PERIGI', '0000-00-00 00:00:00', NULL),
(1538, 153, 'PONDOK PUCUNG', '0000-00-00 00:00:00', NULL),
(1539, 153, 'PONDOK JAYA', '0000-00-00 00:00:00', NULL),
(1540, 153, 'PONDOK AREN', '0000-00-00 00:00:00', NULL),
(1541, 153, 'JURANG MANGGU BARAT', '0000-00-00 00:00:00', NULL),
(1542, 153, 'JURANG MANGGU TIMUR', '0000-00-00 00:00:00', NULL),
(1543, 153, 'PONDOK KARYA', '0000-00-00 00:00:00', NULL),
(1544, 153, 'PONDOK BETUNG', '0000-00-00 00:00:00', NULL),
(1545, 154, 'LENGKONG KARYA', '0000-00-00 00:00:00', NULL),
(1546, 154, 'JELUPANG', '0000-00-00 00:00:00', NULL),
(1547, 154, 'PONDOK JAGUNG', '0000-00-00 00:00:00', NULL),
(1548, 154, 'PONDOK JAGUNG TIMUR', '0000-00-00 00:00:00', NULL),
(1549, 154, 'PAKULONAN', '0000-00-00 00:00:00', NULL),
(1550, 154, 'PAKU ALAM', '0000-00-00 00:00:00', NULL),
(1551, 154, 'PAKU JAYA', '0000-00-00 00:00:00', NULL),
(1552, 155, 'PULAU TIDUNG', '0000-00-00 00:00:00', NULL),
(1553, 155, 'PULAU PARI', '0000-00-00 00:00:00', NULL),
(1554, 155, 'PULAU UNTUNG JAWA', '0000-00-00 00:00:00', NULL),
(1555, 156, 'PULAU PANGGANG', '0000-00-00 00:00:00', NULL),
(1556, 156, 'PULAU KELAPA', '0000-00-00 00:00:00', NULL),
(1557, 156, 'PULAU HARAPAN', '0000-00-00 00:00:00', NULL),
(1558, 157, 'CIPEDAK', '0000-00-00 00:00:00', NULL),
(1559, 157, 'SRENGSENG SAWAH', '0000-00-00 00:00:00', NULL),
(1560, 157, 'CIGANJUR', '0000-00-00 00:00:00', NULL),
(1561, 157, 'JAGAKARSA', '0000-00-00 00:00:00', NULL),
(1562, 157, 'LENTENG AGUNG', '0000-00-00 00:00:00', NULL),
(1563, 157, 'TANJUNG BARAT', '0000-00-00 00:00:00', NULL),
(1564, 158, 'CILANDAK TIMUR', '0000-00-00 00:00:00', NULL),
(1565, 158, 'RAGUNAN', '0000-00-00 00:00:00', NULL),
(1566, 158, 'KEBAGUSAN', '0000-00-00 00:00:00', NULL),
(1567, 158, 'PASAR MINGGU', '0000-00-00 00:00:00', NULL),
(1568, 158, 'JATI PADANG', '0000-00-00 00:00:00', NULL),
(1569, 158, 'PEJATEN BARAT', '0000-00-00 00:00:00', NULL),
(1570, 158, 'PEJATEN TIMUR', '0000-00-00 00:00:00', NULL),
(1571, 159, 'LEBAK BULUS', '0000-00-00 00:00:00', NULL),
(1572, 159, 'PONDOK LABU', '0000-00-00 00:00:00', NULL),
(1573, 159, 'CILANDAK BARAT', '0000-00-00 00:00:00', NULL),
(1574, 159, 'GANDARIA SELATAN', '0000-00-00 00:00:00', NULL),
(1575, 159, 'CIPETE SELATAN', '0000-00-00 00:00:00', NULL),
(1576, 160, 'BINTARO', '0000-00-00 00:00:00', NULL),
(1577, 160, 'PESANGGRAHAN', '0000-00-00 00:00:00', NULL),
(1578, 160, 'ULUJAMI', '0000-00-00 00:00:00', NULL),
(1579, 160, 'PETUKANGAN SELATAN', '0000-00-00 00:00:00', NULL),
(1580, 160, 'PETUKANGAN UTARA', '0000-00-00 00:00:00', NULL),
(1581, 161, 'PONDOK PINANG', '0000-00-00 00:00:00', NULL),
(1582, 161, 'KEBAYORAN LAMA SELATAN', '0000-00-00 00:00:00', NULL),
(1583, 161, 'KEBAYORAN LAMA UTARA', '0000-00-00 00:00:00', NULL),
(1584, 161, 'CIPULIR', '0000-00-00 00:00:00', NULL),
(1585, 161, 'GROGOL SELATAN', '0000-00-00 00:00:00', NULL),
(1586, 161, 'GROGOL UTARA', '0000-00-00 00:00:00', NULL),
(1587, 162, 'GANDARIA UTARA', '0000-00-00 00:00:00', NULL),
(1588, 162, 'CIPETE UTARA', '0000-00-00 00:00:00', NULL),
(1589, 162, 'PULO', '0000-00-00 00:00:00', NULL),
(1590, 162, 'PETOGOGAN', '0000-00-00 00:00:00', NULL),
(1591, 162, 'MELAWAI', '0000-00-00 00:00:00', NULL),
(1592, 162, 'KRAMAT PELA', '0000-00-00 00:00:00', NULL),
(1593, 162, 'GUNUNG', '0000-00-00 00:00:00', NULL),
(1594, 162, 'SELONG', '0000-00-00 00:00:00', NULL),
(1595, 162, 'RAWA BARAT', '0000-00-00 00:00:00', NULL),
(1596, 162, 'SENAYAN', '0000-00-00 00:00:00', NULL),
(1597, 163, 'BANGKA', '0000-00-00 00:00:00', NULL),
(1598, 163, 'PELA MAMPANG', '0000-00-00 00:00:00', NULL),
(1599, 163, 'TEGAL PARANG', '0000-00-00 00:00:00', NULL),
(1600, 163, 'MAMPANG PRAPATAN', '0000-00-00 00:00:00', NULL),
(1601, 163, 'KUNINGAN BARAT', '0000-00-00 00:00:00', NULL),
(1602, 164, 'KALIBATA', '0000-00-00 00:00:00', NULL),
(1603, 164, 'RAWAJATI', '0000-00-00 00:00:00', NULL),
(1604, 164, 'DUREN TIGA', '0000-00-00 00:00:00', NULL),
(1605, 164, 'PANCORAN', '0000-00-00 00:00:00', NULL),
(1606, 164, 'PENGADEGAN', '0000-00-00 00:00:00', NULL),
(1607, 164, 'CIKOKO', '0000-00-00 00:00:00', NULL),
(1608, 165, 'MENTENG DALAM', '0000-00-00 00:00:00', NULL),
(1609, 165, 'TEBET BARAT', '0000-00-00 00:00:00', NULL),
(1610, 165, 'TEBET TIMUR', '0000-00-00 00:00:00', NULL),
(1611, 165, 'KEBON BARU', '0000-00-00 00:00:00', NULL),
(1612, 165, 'BUKIT DURI', '0000-00-00 00:00:00', NULL),
(1613, 165, 'MANGGARAI SELATAN', '0000-00-00 00:00:00', NULL),
(1614, 165, 'MANGGARAI', '0000-00-00 00:00:00', NULL),
(1615, 166, 'KARET SEMANGGI', '0000-00-00 00:00:00', NULL),
(1616, 166, 'KUNINGAN TIMUR', '0000-00-00 00:00:00', NULL),
(1617, 166, 'KARET KUNINGAN', '0000-00-00 00:00:00', NULL),
(1618, 166, 'KARET', '0000-00-00 00:00:00', NULL),
(1619, 166, 'MENTENG ATAS', '0000-00-00 00:00:00', NULL),
(1620, 166, 'PASAR MANGGIS', '0000-00-00 00:00:00', NULL),
(1621, 166, 'GUNTUR', '0000-00-00 00:00:00', NULL),
(1622, 166, 'SETIA BUDI', '0000-00-00 00:00:00', NULL),
(1623, 167, 'PEKAYON', '0000-00-00 00:00:00', NULL),
(1624, 167, 'KALISARI', '0000-00-00 00:00:00', NULL),
(1625, 167, 'BARU', '0000-00-00 00:00:00', NULL),
(1626, 167, 'CIJANTUNG', '0000-00-00 00:00:00', NULL),
(1627, 167, 'GEDONG', '0000-00-00 00:00:00', NULL),
(1628, 168, 'CIBUBUR', '0000-00-00 00:00:00', NULL),
(1629, 168, 'KELAPA DUA WETAN', '0000-00-00 00:00:00', NULL),
(1630, 168, 'CIRACAS', '0000-00-00 00:00:00', NULL),
(1631, 168, 'SUSUKAN', '0000-00-00 00:00:00', NULL),
(1632, 168, 'RAMBUTAN', '0000-00-00 00:00:00', NULL),
(1633, 169, 'PONDOK RANGGON', '0000-00-00 00:00:00', NULL),
(1634, 169, 'CILANGKAP', '0000-00-00 00:00:00', NULL),
(1635, 169, 'MUNJUL', '0000-00-00 00:00:00', NULL),
(1636, 169, 'CIPAYUNG', '0000-00-00 00:00:00', NULL),
(1637, 169, 'SETU', '0000-00-00 00:00:00', NULL),
(1638, 169, 'BAMBU APUS', '0000-00-00 00:00:00', NULL),
(1639, 169, 'CEGER', '0000-00-00 00:00:00', NULL),
(1640, 169, 'LUBANG BUAYA', '0000-00-00 00:00:00', NULL),
(1641, 170, 'PINANG RANTI', '0000-00-00 00:00:00', NULL),
(1642, 170, 'MAKASAR', '0000-00-00 00:00:00', NULL),
(1643, 170, 'KEBON PALA', '0000-00-00 00:00:00', NULL),
(1644, 170, 'HALIM PERDANA KUSUMAH', '0000-00-00 00:00:00', NULL),
(1645, 170, 'CIPINANG MELAYU', '0000-00-00 00:00:00', NULL),
(1646, 171, 'BALE KAMBANG', '0000-00-00 00:00:00', NULL),
(1647, 171, 'BATU AMPAR', '0000-00-00 00:00:00', NULL),
(1648, 171, 'KAMPUNG TENGAH', '0000-00-00 00:00:00', NULL),
(1649, 171, 'DUKUH', '0000-00-00 00:00:00', NULL),
(1650, 171, 'KRAMAT JATI', '0000-00-00 00:00:00', NULL),
(1651, 171, 'CILILITAN', '0000-00-00 00:00:00', NULL),
(1652, 171, 'CAWANG', '0000-00-00 00:00:00', NULL),
(1653, 172, 'BIDARA CINA', '0000-00-00 00:00:00', NULL),
(1654, 172, 'CIPINANG CEMPEDAK', '0000-00-00 00:00:00', NULL),
(1655, 172, 'CIPINANG BESAR SELATAN', '0000-00-00 00:00:00', NULL),
(1656, 172, 'CIPINANG MUARA', '0000-00-00 00:00:00', NULL),
(1657, 172, 'CIPINANG BESAR UTARA', '0000-00-00 00:00:00', NULL),
(1658, 172, 'RAWA BUNGA', '0000-00-00 00:00:00', NULL),
(1659, 172, 'BALI MESTER', '0000-00-00 00:00:00', NULL),
(1660, 172, 'KAMPUNG MELAYU', '0000-00-00 00:00:00', NULL),
(1661, 173, 'PONDOK BAMBU', '0000-00-00 00:00:00', NULL),
(1662, 173, 'DUREN SAWIT', '0000-00-00 00:00:00', NULL),
(1663, 173, 'PONDOK KELAPA', '0000-00-00 00:00:00', NULL),
(1664, 173, 'PONDOK KOPI', '0000-00-00 00:00:00', NULL),
(1665, 173, 'MALAKA JAYA', '0000-00-00 00:00:00', NULL),
(1666, 173, 'MALAKA SARI', '0000-00-00 00:00:00', NULL),
(1667, 173, 'KLENDER', '0000-00-00 00:00:00', NULL),
(1668, 174, 'JATINEGARA', '0000-00-00 00:00:00', NULL),
(1669, 174, 'PENGGILINGAN', '0000-00-00 00:00:00', NULL),
(1670, 174, 'PULO GEBANG', '0000-00-00 00:00:00', NULL),
(1671, 174, 'UJUNG MENTENG', '0000-00-00 00:00:00', NULL),
(1672, 174, 'CAKUNG TIMUR', '0000-00-00 00:00:00', NULL),
(1673, 174, 'CAKUNG BARAT', '0000-00-00 00:00:00', NULL),
(1674, 174, 'RAWA TERATE', '0000-00-00 00:00:00', NULL),
(1675, 175, 'PISANGAN TIMUR', '0000-00-00 00:00:00', NULL),
(1676, 175, 'CIPINANG', '0000-00-00 00:00:00', NULL),
(1677, 175, 'JATINEGARA KAUM', '0000-00-00 00:00:00', NULL),
(1678, 175, 'JATI', '0000-00-00 00:00:00', NULL),
(1679, 175, 'RAWAMANGUN', '0000-00-00 00:00:00', NULL),
(1680, 175, 'KAYU PUTIH', '0000-00-00 00:00:00', NULL),
(1681, 175, 'PULO GADUNG', '0000-00-00 00:00:00', NULL),
(1682, 176, 'KEBON MANGGIS', '0000-00-00 00:00:00', NULL),
(1683, 176, 'PAL MERIEM', '0000-00-00 00:00:00', NULL),
(1684, 176, 'PISANGAN BARU', '0000-00-00 00:00:00', NULL),
(1685, 176, 'KAYU MANIS', '0000-00-00 00:00:00', NULL),
(1686, 176, 'UTAN KAYU SELATAN', '0000-00-00 00:00:00', NULL),
(1687, 176, 'UTAN KAYU UTARA', '0000-00-00 00:00:00', NULL),
(1688, 177, 'GELORA', '0000-00-00 00:00:00', NULL),
(1689, 177, 'BENDUNGAN HILIR', '0000-00-00 00:00:00', NULL),
(1690, 177, 'KARET TENGSIN', '0000-00-00 00:00:00', NULL),
(1691, 177, 'KEBON MELATI', '0000-00-00 00:00:00', NULL),
(1692, 177, 'PETAMBURAN', '0000-00-00 00:00:00', NULL),
(1693, 177, 'KEBON KACANG', '0000-00-00 00:00:00', NULL),
(1694, 177, 'KAMPUNG BALI', '0000-00-00 00:00:00', NULL),
(1695, 178, 'MENTENG', '0000-00-00 00:00:00', NULL),
(1696, 178, 'PEGANGSAAN', '0000-00-00 00:00:00', NULL),
(1697, 178, 'CIKINI', '0000-00-00 00:00:00', NULL),
(1698, 178, 'GONDANGDIA', '0000-00-00 00:00:00', NULL),
(1699, 178, 'KEBON SIRIH', '0000-00-00 00:00:00', NULL),
(1700, 179, 'KENARI', '0000-00-00 00:00:00', NULL),
(1701, 179, 'PASEBAN', '0000-00-00 00:00:00', NULL),
(1702, 179, 'KRAMAT', '0000-00-00 00:00:00', NULL),
(1703, 179, 'KWITANG', '0000-00-00 00:00:00', NULL),
(1704, 179, 'SENEN', '0000-00-00 00:00:00', NULL),
(1705, 179, 'BUNGUR', '0000-00-00 00:00:00', NULL),
(1706, 180, 'JOHAR BARU', '0000-00-00 00:00:00', NULL),
(1707, 180, 'KAMPUNG RAWA', '0000-00-00 00:00:00', NULL),
(1708, 180, 'TANAH TINGGI', '0000-00-00 00:00:00', NULL),
(1709, 180, 'GALUR', '0000-00-00 00:00:00', NULL),
(1710, 181, 'RAWA SARI', '0000-00-00 00:00:00', NULL),
(1711, 181, 'CEMPAKA PUTIH TIMUR', '0000-00-00 00:00:00', NULL),
(1712, 181, 'CEMPAKA PUTIH BARAT', '0000-00-00 00:00:00', NULL),
(1713, 182, 'HARAPAN MULYA', '0000-00-00 00:00:00', NULL),
(1714, 182, 'CEMPAKA BARU', '0000-00-00 00:00:00', NULL),
(1715, 182, 'SUMUR BATU', '0000-00-00 00:00:00', NULL),
(1716, 182, 'SERDANG', '0000-00-00 00:00:00', NULL),
(1717, 182, 'UTAN PANJANG', '0000-00-00 00:00:00', NULL),
(1718, 182, 'KEBON KOSONG', '0000-00-00 00:00:00', NULL),
(1719, 182, 'KEMAYORAN', '0000-00-00 00:00:00', NULL),
(1720, 182, 'GUNUNG SAHARI SELATAN', '0000-00-00 00:00:00', NULL),
(1721, 183, 'PASAR BARU', '0000-00-00 00:00:00', NULL),
(1722, 183, 'GUNUNG SAHARI UTARA', '0000-00-00 00:00:00', NULL),
(1723, 183, 'KARTINI', '0000-00-00 00:00:00', NULL),
(1724, 183, 'KARANG ANYAR', '0000-00-00 00:00:00', NULL),
(1725, 183, 'MANGGA DUA SELATAN', '0000-00-00 00:00:00', NULL),
(1726, 184, 'CIDENG', '0000-00-00 00:00:00', NULL),
(1727, 184, 'PETOJO SELATAN', '0000-00-00 00:00:00', NULL),
(1728, 184, 'GAMBIR', '0000-00-00 00:00:00', NULL),
(1729, 184, 'KEBON KELAPA', '0000-00-00 00:00:00', NULL),
(1730, 184, 'PETOJO UTARA', '0000-00-00 00:00:00', NULL),
(1731, 184, 'DURI PULO', '0000-00-00 00:00:00', NULL),
(1732, 185, 'JOGLO', '0000-00-00 00:00:00', NULL),
(1733, 185, 'SRENGSENG', '0000-00-00 00:00:00', NULL),
(1734, 185, 'MERUYA SELATAN', '0000-00-00 00:00:00', NULL),
(1735, 185, 'MERUYA UTARA', '0000-00-00 00:00:00', NULL),
(1736, 185, 'KEMBANGAN SELATAN', '0000-00-00 00:00:00', NULL),
(1737, 185, 'KEMBANGAN UTARA', '0000-00-00 00:00:00', NULL),
(1738, 186, 'SUKABUMI SELATAN', '0000-00-00 00:00:00', NULL),
(1739, 186, 'SUKABUMI UTARA', '0000-00-00 00:00:00', NULL),
(1740, 186, 'KELAPA DUA', '0000-00-00 00:00:00', NULL),
(1741, 186, 'KEBON JERUK', '0000-00-00 00:00:00', NULL),
(1742, 186, 'DURI KEPA', '0000-00-00 00:00:00', NULL),
(1743, 186, 'KEDOYA SELATAN', '0000-00-00 00:00:00', NULL),
(1744, 186, 'KEDOYA UTARA', '0000-00-00 00:00:00', NULL),
(1745, 187, 'PALMERAH', '0000-00-00 00:00:00', NULL),
(1746, 187, 'SLIPI', '0000-00-00 00:00:00', NULL),
(1747, 187, 'KEMANGGISAN', '0000-00-00 00:00:00', NULL),
(1748, 187, 'KOTA BAMBU UTARA', '0000-00-00 00:00:00', NULL),
(1749, 187, 'KOTA BAMBU SELATAN', '0000-00-00 00:00:00', NULL),
(1750, 187, 'JATI PULO', '0000-00-00 00:00:00', NULL),
(1751, 188, 'TANJUNG DUREN UTARA', '0000-00-00 00:00:00', NULL),
(1752, 188, 'TANJUNG DUREN SELATAN', '0000-00-00 00:00:00', NULL),
(1753, 188, 'TOMANG', '0000-00-00 00:00:00', NULL),
(1754, 188, 'GROGOL', '0000-00-00 00:00:00', NULL),
(1755, 188, 'JELAMBAR', '0000-00-00 00:00:00', NULL),
(1756, 188, 'WIJAYA KESUMA', '0000-00-00 00:00:00', NULL),
(1757, 188, 'JELAMBAR BARU', '0000-00-00 00:00:00', NULL),
(1758, 189, 'KALIANYAR', '0000-00-00 00:00:00', NULL),
(1759, 189, 'DURI SELATAN', '0000-00-00 00:00:00', NULL),
(1760, 189, 'TANAH SEREAL', '0000-00-00 00:00:00', NULL),
(1761, 189, 'DURI UTARA', '0000-00-00 00:00:00', NULL),
(1762, 189, 'KRENDANG', '0000-00-00 00:00:00', NULL),
(1763, 189, 'JEMBATAN BESI', '0000-00-00 00:00:00', NULL),
(1764, 189, 'ANGKE', '0000-00-00 00:00:00', NULL),
(1765, 189, 'JEMBATAN LIMA', '0000-00-00 00:00:00', NULL),
(1766, 189, 'TAMBORA', '0000-00-00 00:00:00', NULL),
(1767, 189, 'ROA MALAKA', '0000-00-00 00:00:00', NULL),
(1768, 189, 'PEKOJAN', '0000-00-00 00:00:00', NULL),
(1769, 190, 'KRUKUT', '0000-00-00 00:00:00', NULL),
(1770, 190, 'MAPHAR', '0000-00-00 00:00:00', NULL),
(1771, 190, 'TAMAN SARI', '0000-00-00 00:00:00', NULL),
(1772, 190, 'TANGKI', '0000-00-00 00:00:00', NULL),
(1773, 190, 'MANGGA BESAR', '0000-00-00 00:00:00', NULL),
(1774, 190, 'KEAGUNGAN', '0000-00-00 00:00:00', NULL),
(1775, 190, 'GLODOK', '0000-00-00 00:00:00', NULL),
(1776, 190, 'PINANGSIA', '0000-00-00 00:00:00', NULL),
(1777, 191, 'DURI KOSAMBI', '0000-00-00 00:00:00', NULL),
(1778, 191, 'RAWA BUAYA', '0000-00-00 00:00:00', NULL),
(1779, 191, 'KEDAUNG KALI ANGKE', '0000-00-00 00:00:00', NULL),
(1780, 191, 'KAPUK', '0000-00-00 00:00:00', NULL),
(1781, 191, 'CENGKARENG TIMUR', '0000-00-00 00:00:00', NULL),
(1782, 191, 'CENGKARENG BARAT', '0000-00-00 00:00:00', NULL),
(1783, 192, 'SEMANAN', '0000-00-00 00:00:00', NULL),
(1784, 192, 'KALIDERES', '0000-00-00 00:00:00', NULL),
(1785, 192, 'PEGADUNGAN', '0000-00-00 00:00:00', NULL),
(1786, 192, 'TEGAL ALUR', '0000-00-00 00:00:00', NULL),
(1787, 192, 'KAMAL', '0000-00-00 00:00:00', NULL),
(1788, 193, 'KAMAL MUARA', '0000-00-00 00:00:00', NULL),
(1789, 193, 'KAPUK MUARA', '0000-00-00 00:00:00', NULL),
(1790, 193, 'PEJAGALAN', '0000-00-00 00:00:00', NULL),
(1791, 193, 'PENJARINGAN', '0000-00-00 00:00:00', NULL),
(1792, 193, 'PLUIT', '0000-00-00 00:00:00', NULL),
(1793, 194, 'PADEMANGAN BARAT', '0000-00-00 00:00:00', NULL),
(1794, 194, 'PADEMANGAN TIMUR', '0000-00-00 00:00:00', NULL),
(1795, 194, 'ANCOL', '0000-00-00 00:00:00', NULL),
(1796, 195, 'SUNTER AGUNG', '0000-00-00 00:00:00', NULL),
(1797, 195, 'SUNTER JAYA', '0000-00-00 00:00:00', NULL),
(1798, 195, 'PAPANGO', '0000-00-00 00:00:00', NULL),
(1799, 195, 'WARAKAS', '0000-00-00 00:00:00', NULL),
(1800, 195, 'SUNGAI BAMBU', '0000-00-00 00:00:00', NULL),
(1801, 195, 'KEBON BAWANG', '0000-00-00 00:00:00', NULL),
(1802, 195, 'TANJUNG PRIUK', '0000-00-00 00:00:00', NULL),
(1803, 196, 'RAWABADAK SELATAN', '0000-00-00 00:00:00', NULL),
(1804, 196, 'TUGU SELATAN', '0000-00-00 00:00:00', NULL),
(1805, 196, 'TUGU UTARA', '0000-00-00 00:00:00', NULL),
(1806, 196, 'LAGOA', '0000-00-00 00:00:00', NULL),
(1807, 196, 'RAWABADAK UTARA', '0000-00-00 00:00:00', NULL),
(1808, 196, 'KOJA', '0000-00-00 00:00:00', NULL),
(1809, 197, 'KELAPA GADING BARAT', '0000-00-00 00:00:00', NULL),
(1810, 197, 'KELAPA GADING TIMUR', '0000-00-00 00:00:00', NULL),
(1811, 197, 'PEGANGSAAN DUA', '0000-00-00 00:00:00', NULL),
(1812, 198, 'SUKA PURA', '0000-00-00 00:00:00', NULL),
(1813, 198, 'ROROTAN', '0000-00-00 00:00:00', NULL),
(1814, 198, 'MARUNDA', '0000-00-00 00:00:00', NULL),
(1815, 198, 'CILINCING', '0000-00-00 00:00:00', NULL),
(1816, 198, 'SEMPER TIMUR', '0000-00-00 00:00:00', NULL),
(1817, 198, 'SEMPER BARAT', '0000-00-00 00:00:00', NULL),
(1818, 198, 'KALI BARU', '0000-00-00 00:00:00', NULL);

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
(17, 'Daftar', 'pendaftaran/pendaftaran/create', 'fa fa-bullseye', 15, '2018-02-09 01:25:27', NULL),
(18, 'Apotik', 'gudang/product', 'fa fa-link', 0, '2018-03-05 00:46:31', NULL),
(19, 'Katalog Obat', 'gudang/product', 'fa fa-bullseye', 18, '2018-03-05 01:52:50', NULL),
(20, 'Suplier', 'gudang/suplier', 'fa fa-link', 0, '2018-03-05 01:54:43', NULL),
(21, 'Penerimaan', 'gudang/penerimaan', 'fa fa-bullseye', 18, '2018-03-06 10:29:54', NULL),
(22, 'Penjualan', 'gudang/Penjualan', 'fa fa-bullseye', 18, '2018-03-11 23:33:45', NULL),
(23, 'Kasir', '#', 'fa fa-link', 0, '2018-03-25 13:45:58', NULL),
(24, 'Tagihan Pasien', 'Kasir/kasir', 'fa fa-bullseye', 23, '2018-03-25 13:47:09', NULL),
(25, 'Tagihan Penjualan', 'Kasir/Tpenjualan', 'fa fa-bullseye', 23, '2018-03-25 13:48:39', NULL),
(26, 'Laporan', '#', 'fa fa-link', 0, '2018-03-27 03:02:31', NULL),
(27, 'Laporan Penjualan', 'Laporan/Laporan/penjualan', 'fa fa-bullseye', 26, '2018-03-27 03:03:12', NULL),
(28, 'Laporan Penerimaan', 'Laporan/Laporan/penerimaan', 'fa fa-bullseye', 26, '2018-03-27 22:45:02', NULL),
(29, 'Laporan Pengunjung', 'Laporan/Laporan/pengunjung', 'fa fa-bullseye', 26, '2018-03-30 22:14:07', NULL);

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
(24, 4, 2, 1, 1, 1),
(25, 1, 18, 1, 1, 1),
(26, 1, 19, 1, 1, 1),
(27, 1, 20, 1, 1, 1),
(28, 1, 21, 1, 1, 1),
(29, 1, 22, 1, 1, 1),
(30, 1, 23, 1, 1, 1),
(31, 1, 24, 1, 1, 1),
(32, 1, 25, 1, 1, 1),
(33, 1, 26, 1, 1, 1),
(34, 1, 27, 1, 1, 1),
(35, 1, 28, 1, 1, 1),
(36, 3, 16, 1, 1, 1),
(37, 3, 15, 1, 1, 1),
(38, 1, 29, 1, 1, 1);

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
(3, 'TN. Ilham Tanjung', 'RM02582', '2018-03-08', '0000000000000', 1, 'BTN BUMI PS. KAMIS INDAH', 1411, '2018-03-08 00:48:55', NULL),
(4, 'OMI MARLATI', 'RM02583', '2018-03-08', '0000000000000', 0, 'DS. GINTUNG RT03/01MAUK', 1411, '2018-03-08 00:53:22', NULL),
(5, 'INDITA PUTRI .A', 'RM02584', '2018-03-08', '0000000000000', 0, 'BTN BUMI PS. KAMIS', 1411, '2018-03-08 00:56:44', NULL),
(6, 'IVOVEMARITA', 'RM02585', '2018-03-08', '0000000000000', 0, 'VTE RT14/11', 1411, '2018-03-08 00:59:52', NULL),
(7, 'SUPIAN NURDINI', 'RM02586', '2018-03-08', '0000000000000', 0, 'KP. PANGADOKAN RT01/06', 1411, '2018-03-08 01:09:09', NULL),
(8, 'LILIS', 'RM02587', '2018-03-08', '0000000000000', 0, 'JL. JERUK 4 NO 2', 1411, '2018-03-08 01:11:08', NULL),
(9, 'SITI SUMIATI', 'RM02588', '2018-03-08', '0000000000000', 0, 'PERMATA SINDANG SARI RT01/06', 1411, '2018-03-08 01:12:33', NULL),
(10, 'SUKEMI', 'RM02589', '2018-03-08', '0000000000000', 0, 'REYENLY II FB2 NO 8', 1411, '2018-03-08 01:14:25', NULL),
(11, 'ADE NURLELA', 'RM02590', '2018-03-08', '0000000000000', 0, 'BUGEL PANGADEGAN RT02/06', 1411, '2018-03-08 01:16:07', NULL),
(12, 'ANISA DWI', 'RM02591', '2018-03-08', '0000000000000', 0, 'MARGA SARI RT04/04', 1411, '2018-03-08 01:17:24', NULL),
(13, 'MIMI MARIANAH', 'RM02592', '2018-03-08', '0', 0, 'KP. SONDOL RT01/02 PS. KAMIS', 1411, '2018-03-08 01:18:54', NULL),
(14, 'VERA AULIA', 'RM02593', '2018-03-08', '0000000000000', 0, 'KP. SUKA BARU RT03/02', 1411, '2018-03-08 01:22:54', NULL),
(15, 'MAYA DEWI LESYANI', 'RM02594', '2018-03-08', '0000000000000', 0, 'KP. DADAP RT01/02PANGADEKAN', 1411, '2018-03-08 01:24:58', NULL),
(16, 'HAERLAH', 'RM02595', '2018-03-08', '0000000000000', 0, 'JL. BANGAU II NO.14 P.S', 1411, '2018-03-08 08:11:02', NULL),
(17, 'KARYATI', 'RM02596', '2018-03-08', '0000000000000', 0, 'CI NO.10', 1411, '2018-03-08 08:16:20', NULL),
(18, 'MEIRIZA PUTRI', 'RM02597', '2018-03-08', '0000000000000', 0, 'VILLA VEGENY II FH NO.11', 1411, '2018-03-08 09:31:24', NULL),
(19, 'SALIYAH', 'RM02598', '2018-03-08', '0000000000000', 0, 'TAMAN PELANGI BLOK B7 PASAR KAMIS', 1411, '2018-03-08 09:33:06', NULL),
(20, 'SUSAN', 'RM02599', '2018-03-08', '0000000000000', 1, 'JL. PALMA 7 NO.31 PONDOK REJEKI', 1411, '2018-03-08 09:34:56', NULL),
(21, 'SUTIANI', 'RM02600', '2018-03-08', '0000000000000', 1, 'KP. DOYONG RT02/02 PRIUK', 1411, '2018-03-08 09:38:30', NULL),
(22, 'NINA PUSPA SARI', 'RM02601', '2018-03-08', '0000000000000', 0, 'DS. MAUK TIMUR RT08/04', 1411, '2018-03-08 09:40:13', NULL),
(23, 'LILIS', 'RM02602', '2018-03-08', '0000000000000', 0, 'TAMAN JATI BLOK B3 N0.14', 1411, '2018-03-08 09:42:57', NULL),
(24, 'IDA ROSIDA', 'RM02603', '2018-03-08', '0000000000000', 0, 'KP. GEMBOR RT04/01 PRIUK', 1411, '2018-03-08 09:44:51', NULL),
(25, 'LINDA WATI', 'RM02604', '2018-03-08', '0000000000000', 0, 'JL. CANA I BLOK B16 NO.46', 1411, '2018-03-08 09:46:54', NULL),
(26, 'RICO HANDA', 'RM02605', '2018-03-08', '0000000000000', 1, 'JL. PALMA I NO.42', 1411, '2018-03-08 09:48:34', NULL),
(27, 'SUHAEBAH', 'RM02606', '2018-03-08', '0000000000000', 0, 'KEDAUNG WETAN RT06/02', 1411, '2018-03-08 09:50:09', NULL),
(28, 'AYU LESTARI', 'RM02607', '2018-03-08', '0000000000000', 0, 'KP. CADAS RT03/04 NEGLA SARI', 1411, '2018-03-08 09:51:48', NULL),
(29, 'NUR IRIANI', 'RM02608', '2018-03-08', '0000000000000', 0, 'IV.73', 1411, '2018-03-08 09:55:52', NULL),
(30, 'USWATUN HASANAH', 'RM02609', '2018-03-08', '0000000000000', 0, 'U.G', 1411, '2018-03-08 09:57:04', NULL),
(31, 'PRATIWI DWI RATNA', 'RM02610', '2018-03-08', '0000000000000', 0, 'JL. ANJELINE I NO.5', 1411, '2018-03-08 09:58:48', NULL),
(32, 'SUMIATI', 'RM02611', '2018-03-08', '0000000000000', 0, 'KP. JAMBU RT04/03 PURI AGUNG', 1411, '2018-03-08 10:00:28', NULL),
(33, 'ABDUL HARIS MULYANA', 'RM02612', '2018-03-08', '0000000000000', 1, 'DUTA ASRI 3 B7', 1411, '2018-03-08 10:03:04', NULL),
(34, 'HAPIPAH FAUZIAH', 'RM02613', '2018-03-08', '0000000000000', 0, 'CIPETE CIPONDOH', 1411, '2018-03-08 10:04:30', NULL),
(35, 'ASEP HIDAYAT', 'RM02614', '2018-03-08', '0000000000000', 1, 'KP. SUKA ASIH RT01/03', 1411, '2018-03-08 10:05:49', NULL),
(36, 'NUR MIAT', 'RM02615', '2018-03-08', '0000000000000', 0, 'KP. KEDAUNG WETAN RT04/02', 1411, '2018-03-08 10:07:47', NULL),
(37, 'ENTIN HANDAYANI', 'RM02616', '2018-03-08', '0000000000000', 0, 'KP. RAWA ROTAN RT02/01', 1411, '2018-03-08 10:10:10', NULL),
(38, 'AYU LISTIANA', 'RM02617', '2018-03-08', '0000000000000', 0, 'KP. ALONGOK RT01/02', 1411, '2018-03-08 10:11:40', NULL),
(39, 'FITRI', 'RM02618', '2018-03-08', '0000000000000', 0, 'KP. BUARAN ASEM RT07/05 TJ. ANOM', 1411, '2018-03-08 10:13:38', NULL),
(40, 'MARTINI', 'RM02619', '2018-03-08', '0000000000000', 0, 'DS. GINTUNG RT05/01 MAUK', 1411, '2018-03-08 10:15:44', NULL),
(41, 'HENI LESTARI', 'RM02620', '2018-03-08', '0000000000000', 0, 'KP. JATAKE RTO3/02 JL.UWANG', 1411, '2018-03-08 10:18:15', NULL),
(42, 'RINI ANDRIANI', 'RM02621', '2018-03-08', '0000000000000', 0, 'KP. PUTAT RT01/02', 1411, '2018-03-08 10:19:27', NULL),
(43, 'YANI', 'RM02622', '2018-03-08', '0000000000000', 0, 'JL. NANAS 4 NO.46 P.M', 1411, '2018-03-08 10:20:44', NULL),
(44, 'ARIES MUNANDAR', 'RM02623', '2018-03-08', '0000000000000', 1, 'JL. CEMPAKA NO.20', 1411, '2018-03-08 10:22:47', NULL),
(45, 'RITA ARIFAH', 'RM02624', '2018-03-08', '0000000000000', 0, 'DUTA ASRI PALEM 2 CADAS', 1411, '2018-03-08 10:23:46', NULL),
(46, 'SUPRIANI', 'RM02625', '2018-03-08', '0000000000000', 0, 'JL. PINUS I N0.18', 1411, '2018-03-08 10:25:08', NULL),
(47, 'YULIANTI', 'RM02626', '2018-03-08', '0000000000000', 0, 'PDK. KULON RT01/01 PK. HAJI', 1411, '2018-03-08 10:28:55', NULL),
(48, 'SAENAH', 'RM02627', '2018-03-08', '0000000000000', 0, 'KP. PLONCO RT019/005 PK. HAJI', 1411, '2018-03-08 10:30:35', NULL),
(49, 'ICIH', 'RM02628', '2018-03-08', '0000000000000', 0, 'KP. LEBAK RT07/02 KARET', 1411, '2018-03-08 10:33:52', NULL),
(50, 'ISS AIAWIYAN', 'RM02629', '2018-03-08', '0000000000000', 0, 'KP. SARAKAN RT03/04 RAJEG', 1411, '2018-03-08 10:35:12', NULL),
(51, 'ANGGUN SARI NURANI', 'RM02630', '2018-03-08', '0000000000000', 0, 'JL. CENDANA I BLOK A-3/7 P.R', 1411, '2018-03-08 10:37:31', NULL),
(52, 'EMI FEBRIA', 'RM02631', '2018-03-08', '0000000000000', 0, 'KP. RAWA BEREM RT03/03', 1411, '2018-03-08 10:39:09', NULL),
(53, 'IIS ROHMI', 'RM02631', '2018-03-08', '0000000000000', 0, 'KP. MEDE RT001/012 PS. BARU', 1411, '2018-03-08 10:40:33', NULL),
(54, 'TETI CAHYATI', 'RM02632', '2018-03-08', '0000000000000', 0, 'KP. PANGODOKAN RT005/010', 1411, '2018-03-08 10:42:08', NULL),
(55, 'DIAN NURUL HIKMAH', 'RM02633', '2018-03-08', '0000000000000', 0, 'KP. OJA SMP SEPATAN', 1411, '2018-03-08 10:44:25', NULL),
(56, 'YULIA FRANSISKA', 'RM02634', '2018-03-08', '0000000000000', 0, 'KP. KARET KAVLING RT03/07', 1411, '2018-03-08 10:45:51', NULL),
(57, 'OLIS', 'RM02636', '2018-03-08', '0000000000000', 0, 'KP. OJA SMP SEPATAN RT01/01', 1411, '2018-03-08 10:47:29', NULL),
(58, 'LSTIQOMAH', 'RM02636', '2018-03-08', '0', 0, 'DUTA ASRI CADAS G/NO.20', 1411, '2018-03-08 10:49:18', NULL),
(59, 'EEN KURNIASIH', 'RM02637', '2018-03-08', '0000000000000', 0, 'DUTA ASRI CADAS D/NO.17', 1411, '2018-03-08 10:52:17', NULL),
(60, 'RIKA PUSPITA SARI', 'RM02638', '2018-03-08', '0000000000000', 0, 'GERAHA SEPATAN K/4', 1411, '2018-03-08 10:56:03', NULL),
(61, 'MIRA MAESAROH', 'RM02639', '1999-03-08', '0000000000000', 0, 'APARTEMEN ACOROPOLIS', 1411, '2018-03-08 11:00:27', NULL),
(62, 'ROLIYATI', 'RM02640', '2018-03-08', '0000000000000', 0, 'KTB 2 JL.JAMBU 2 B-6/22', 1411, '2018-03-08 11:17:47', NULL),
(63, 'UMITA', 'RM02641', '2018-03-08', '0000000000000', 0, 'JL. DAHLIA I NO.8', 1411, '2018-03-08 11:20:04', NULL),
(64, 'RAMAYANTI PUTRI', 'RM02642', '2018-03-08', '0000000000000', 0, 'JL. RASAMALA NO.25 VTE', 1411, '2018-03-08 11:22:18', NULL),
(65, 'FITRI KEMALA DEWI', 'RM02643', '2018-03-08', '0000000000000', 0, 'RUSUNAWA GEBANG RAYA', 1411, '2018-03-08 11:23:46', NULL),
(66, 'IYANUDIN', 'RM02644', '2018-03-08', '0000000000000', 1, 'KP. GEDONG RT03/03 SEPATAN', 1411, '2018-03-08 11:25:14', NULL),
(67, 'HJ. YAYAT', 'RM02645', '2018-03-08', '0000000000000', 0, 'WISMA HARAPAN D4/21', 1411, '2018-03-08 11:28:18', NULL),
(68, 'YOYOH ROHAYATI', 'RM02646', '2018-03-08', '0000000000000', 0, 'PERUM PERMATA SEPATAN', 1411, '2018-03-08 11:29:36', NULL),
(69, 'NINUK SURDIARNI', 'RM02647', '2018-03-08', '0000000000000', 1, 'JL. DADAP I NO.44 PRIUK', 1411, '2018-03-08 11:32:11', NULL),
(70, 'KANISIA BERDINA. P', 'RM02648', '2018-03-08', '0000000000000', 0, 'PASAR KAMIS CIKUPA', 1411, '2018-03-08 11:33:34', NULL),
(71, 'SITI HASIROH', 'RM02649', '2018-03-08', '0000000000000', 0, 'KP. BUARAN MANGGA, PAKU HAJI', 1411, '2018-03-08 11:34:54', NULL),
(72, 'FIDIA MARDOHLAH', 'RM02650', '2018-03-08', '0000000000000', 0, 'KP. PANGKALA, SEMONAL', 1411, '2018-03-08 11:36:30', NULL),
(73, 'SUHAETIN', 'RM02651', '2018-03-08', '0000000000000', 0, 'KP. PANGKALAN, SEMANAD', 1411, '2018-03-08 11:38:48', NULL),
(74, 'EKA APRIYANTI', 'RM02652', '2018-03-08', '0000000000000', 0, 'JL. MERPATI 3 NO.13-14', 1411, '2018-03-08 11:40:40', NULL),
(75, 'WIDIA NINGSIH', 'RM02653', '2018-03-08', '0000000000000', 0, 'SINDANG PANON PASAR KAMIS', 1411, '2018-03-08 11:42:07', NULL),
(76, 'FITI HANDAYANI', 'RM02654', '2018-03-08', '0000000000000', 0, 'KP SUKA BAKTI RT07/04', 1411, '2018-03-08 11:48:38', NULL),
(77, 'LENY WAHYUNI', 'RM02655', '2018-03-08', '0000000000000', 0, 'KP. LEDUG RT03/02 JATAKE', 1411, '2018-03-08 11:50:09', NULL),
(78, 'SUNARTI', 'RM02656', '2018-03-08', '0000000000000', 0, 'TAMAN RAYA RAJEG A10/16', 1411, '2018-03-08 11:51:59', NULL),
(79, 'RAFI NIBROS', 'RM02657', '2018-03-08', '0000000000000', 1, 'JL. PINUS 7 NO.3 D.10', 1411, '2018-03-08 11:53:37', NULL),
(80, 'FINNY DWI ANANDA', 'RM02658', '2018-03-08', '0000000000000', 0, 'VILLA TGL INDAH KA 6/20', 1411, '2018-03-08 11:55:39', NULL),
(81, 'DINA', 'RM02659', '2018-03-08', '0000000000000', 0, 'KP. PISANGAN KAYU AGUNG', 1411, '2018-03-08 11:56:50', NULL),
(82, 'NURJANAH', 'RM02660', '2018-03-08', '0000000000000', 0, 'GRIYA SANGIANG MAS A7 NO.6', 1411, '2018-03-08 11:57:57', NULL),
(83, 'PUSPITA SARI', 'RM02661', '2018-03-08', '0000000000000', 0, 'KP. PASAR KAMIS RT01/01', 1411, '2018-03-08 11:59:17', NULL),
(84, 'ANITA NUR HANDAYANI', 'RM02665', '2018-03-08', '0000000000000', 0, 'RAWA SETAN RT01/03 PAKU HAJI', 1411, '2018-03-08 12:01:52', NULL),
(85, 'UPIK LIKA WANDIRA', 'RM02663', '2018-03-08', '0000000000000', 0, 'PDK SUKATANI PERMAI A3/7 RAJEG', 1411, '2018-03-08 12:03:14', NULL),
(86, 'ATIS PATRICIA', 'RM02664', '2018-03-08', '0000000000000', 0, 'VTB I FU/125', 1411, '2018-03-08 12:06:33', NULL),
(87, 'SURYANI MANALU', 'RM02662', '2018-03-08', '0000000000000', 0, 'JL. KURMA 8 NO.18', 1411, '2018-03-08 12:10:13', NULL),
(88, 'DIAH AYU', 'RM02666', '2018-03-08', '0000000000000', 1, 'BTN. KEBON KELAPA', 1411, '2018-03-08 12:12:54', NULL),
(89, 'ANDES', 'RM02667', '2018-03-08', '0000000000000', 1, 'JL. DUKU II NO.40', 1411, '2018-03-08 12:14:05', NULL),
(90, 'DEDE', 'RM02668', '2018-03-08', '0000000000000', 0, 'SEPATAN PONDOK JAYA', 1411, '2018-03-08 12:24:16', NULL),
(91, 'MUMUN', 'RM02669', '2018-03-01', '0000000000000', 0, 'KAYU BONGKOK RT07/01 SEPATAN', 1411, '2018-03-08 12:25:31', NULL),
(92, 'YUANITA PRAMONO', 'RM02670', '2018-03-08', '0000000000000', 0, 'Y.44', 1411, '2018-03-08 12:27:10', NULL),
(93, 'NUR AISYAH', 'RM02671', '2018-03-08', '0000000000000', 0, 'KP. GELAM PASAR KAMIS', 1411, '2018-03-08 12:32:59', NULL),
(94, 'ARIYANI SETIANINGSIH', 'RM02672', '2018-03-08', '0000000000000', 0, 'KP. TEREP PASAR KAMIS', 1411, '2018-03-08 12:38:47', NULL),
(95, 'YUKI ARDIANSYAH', 'RM02673', '2018-03-08', '0000000000000', 1, 'JL. PALMA 12 NO.3', 1411, '2018-03-08 12:40:21', NULL),
(96, 'ILMI NURHIDAYAH', 'RM02674', '2018-03-08', '0000000000000', 0, 'CADAS KARET RT05/02 SEPATAN', 1411, '2018-03-08 12:41:49', NULL),
(97, 'RUKIYANA WATI', 'RM02675', '2018-03-08', '0000000000000', 0, 'JL. DELIMA 4 RT07/07', 1411, '2018-03-08 12:43:11', NULL),
(98, 'AYU DESITA. R', 'RM02676', '2018-03-08', '0000000000000', 0, 'JL. PARKIT I B32/23', 1411, '2018-03-08 12:44:44', NULL),
(99, 'SARI DARWANTI', 'RM02677', '2018-03-08', '0000000000000', 1, 'JL. PARKIT I B32/23', 1411, '2018-03-08 12:45:56', NULL),
(100, 'SITI ASIAH', 'RM02678', '2018-03-08', '0000000000000', 0, 'KP.GELAM JAYA RT05/01', 1411, '2018-03-08 12:47:31', NULL),
(101, 'DEWI RAKASIWI', 'RM02679', '2018-03-08', '0000000000000', 0, 'KP. RAWA KIDANG RT10/03', 1411, '2018-03-08 12:48:36', NULL),
(102, 'IHDINA', 'RM02680', '2018-03-08', '0000000000000', 0, 'JL. PESUT I B.15 NO.1', 1411, '2018-03-08 12:49:54', NULL),
(103, 'NOVIANI', 'RM02681', '2018-03-08', '0000000000000', 0, 'KP. SUKA ASIH RT02/03', 1411, '2018-03-08 12:51:08', NULL),
(104, 'DESI', 'RM02682', '2018-03-08', '0000000000000', 0, 'KP. MARGA HAYA RT02/03 MAUK', 1411, '2018-03-08 12:54:04', NULL),
(105, 'VENNY ADELIA', 'RM02683', '2018-03-08', '0000000000000', 0, 'TANGERANG GOLDEN CITY', 1411, '2018-03-08 12:55:54', NULL),
(106, 'FITRIANI', 'RM02684', '2018-03-08', '0000000000000', 0, 'KP. KAYU BONGKOK RT01/01 SEPATAN', 1411, '2018-03-08 12:57:21', NULL),
(107, 'IDA HERIYANI', 'RM02685', '2018-03-08', '0000000000000', 0, 'TAMAN WETAN SB8 NO.17', 1411, '2018-03-08 12:58:46', NULL),
(108, 'PUTRI KURNIAWATI', 'RM02686', '2018-03-08', '0000000000000', 0, 'BTN KEBON KELAPA PASAR KAMIS', 1411, '2018-03-08 13:00:21', NULL),
(109, 'ACEM ASMAWATI', 'RM02687', '2018-03-08', '0000000000000', 0, 'KP. GELAM RT10/02 PASAR KAMIS', 1411, '2018-03-08 13:01:45', NULL),
(110, 'LENA', 'RM02688', '2018-03-08', '0000000000000', 0, 'JL. PURI 4 NO.76 BLOK B-15', 1411, '2018-03-08 13:03:34', NULL),
(111, 'SUWANDI', 'RM02689', '2018-03-08', '0000000000000', 1, 'JL.PURTI 4 NO.76 BLOK B-15', 1411, '2018-03-08 13:08:53', NULL),
(112, 'LINDA HANDAYANI', 'RM02690', '2018-03-08', '0000000000000', 0, 'JL. CATELIA 3 NO.7', 1411, '2018-03-08 13:11:19', NULL),
(113, 'CHRISTINE YUNI SARAH. A', 'RM02691', '2018-03-08', '0000000000000', 0, 'VTB I 64 N0.37', 1411, '2018-03-08 13:13:28', NULL),
(114, 'NUR ZUHURI', 'RM02692', '2018-03-08', '0000000000000', 0, 'JL. KUTILANG I NO.57', 1411, '2018-03-08 13:15:20', NULL),
(115, 'USNIA', 'RM02693', '2018-03-08', '0000000000000', 0, 'KP. CADAS RT02/01', 1411, '2018-03-08 13:16:46', NULL),
(116, 'NINA YULI', 'RM02694', '2018-03-08', '0000000000000', 0, 'TAMAN RAYA RAJEG F3/8', 1411, '2018-03-08 13:18:14', NULL),
(117, 'RILIN MELLINDA', 'RM02695', '2018-03-08', '0000000000000', 0, 'JL. MELATI 4 NO.77', 1411, '2018-03-08 13:20:13', NULL),
(118, 'NURYANTI', 'RM02696', '2018-03-08', '0000000000000', 0, 'PERMATA TANGERANG EB7 NO.10', 1411, '2018-03-08 13:21:48', NULL),
(119, 'ANGGA SEPTIAN', 'RM02697', '2018-03-08', '0000000000000', 1, 'JL. DAHILLA 3 NO.22', 1411, '2018-03-08 13:22:59', NULL),
(120, 'BENING KUSUMAWATIY', 'RM02698', '2018-03-08', '0000000000000', 0, 'PERMATA ICON CM/19', 1411, '2018-03-08 13:24:48', NULL),
(121, 'SUTI SURYANAH', 'RM02699', '2018-03-08', '0000000000000', 0, 'KP. JUNGKEL RT14/06', 1411, '2018-03-08 13:26:33', NULL),
(122, 'DINA LISWARA', 'RM02700', '2018-03-08', '0000000000000', 0, 'KP. JUNGKEL RT14/06', 1411, '2018-03-08 13:27:55', NULL),
(123, 'ASMANAH', 'RM02701', '2018-03-08', '0000000000000', 0, 'KOSAMBI BADENG', 1411, '2018-03-08 13:29:32', NULL),
(124, 'TETI RIFKA', 'RM02702', '2018-03-08', '0000000000000', 0, 'KP. KOJA RT03/01 SEPATAN', 1411, '2018-03-08 13:31:13', NULL),
(125, 'ARI LESTARI', 'RM02703', '2018-03-08', '0000000000000', 0, 'PEDONGKELAN KAPUK CENGKARENG', 1411, '2018-03-08 13:33:13', NULL),
(126, 'ICE NISMAWATI', 'RM02704', '2018-03-08', '0000000000000', 0, 'JL. KAYU PUTIH 2 NO.12', 1411, '2018-03-08 13:34:53', NULL),
(127, 'IDA YUNIWATI', 'RM02705', '2018-03-08', '0000000000000', 0, 'BUMI ASRI D-16 NO.17', 1411, '2018-03-08 13:36:02', NULL),
(128, 'RIKA LAPYANI', 'RM02706', '2018-03-08', '0000000000000', 0, 'JL. ADI SUAPTO NO.15', 1411, '2018-03-08 13:38:50', NULL),
(129, 'BELVINA SINAGA', 'RM02707', '2018-03-08', '0000000000000', 0, 'PUTA BLOK HS NO.52 BANDUNG', 1411, '2018-03-08 13:41:04', NULL),
(130, 'RIFDAH IVAFIAH', 'RM02708', '2018-03-08', '0000000000000', 0, 'PONDOK SUKATANI PERMAI', 1411, '2018-03-08 13:43:13', NULL),
(131, 'TUTI', 'RM02709', '2018-03-08', '0000000000000', 0, 'VTB I BI NO.10', 1411, '2018-03-08 13:44:38', NULL),
(132, 'ROS DAHLIA', 'RM02710', '2018-03-08', '0000000000000', 0, 'PISANGAN PAMSOR RT05/03', 1411, '2018-03-08 13:46:17', NULL),
(133, 'SUMIATI', 'RM02711', '2018-03-08', '0000000000000', 0, 'BUARAN JATI RT02/04 SUKADIRI', 1411, '2018-03-08 13:47:28', NULL),
(134, 'RITA NOLARITA', 'RM02712', '2018-03-08', '0000000000000', 0, 'PANGODOKAN LADU', 1411, '2018-03-08 13:49:15', NULL),
(135, 'YATI', 'RM02713', '2018-03-08', '0000000000000', 1, 'KP. TEGAL KUNIR RT13/03 BANYO ASIH', 1411, '2018-03-08 13:51:28', NULL),
(136, 'IMAN HERMAWAN', 'RM02714', '2018-03-08', '0000000000000', 1, 'MAMPANG JAKARTA SELATAN', 1411, '2018-03-08 13:52:51', NULL),
(137, 'SRI WAHYUNINGSIH', 'RM02715', '2018-03-08', '0000000000000', 0, 'KP TEGAL KUNIL, BANYU ASIH', 1411, '2018-03-08 13:54:31', NULL),
(138, 'SITI AISYAH', 'RM02716', '2018-03-08', '0000000000000', 0, 'KP. SONDOL RT04/02', 1411, '2018-03-08 13:55:59', NULL),
(139, 'FITRIA ANGGREANI', 'RM02717', '2018-03-08', '0000000000000', 0, 'KP. SONDOL RT04/02', 1411, '2018-03-08 13:57:17', NULL),
(140, 'SELVIA LANIWIDIA', 'RM02718', '2018-03-08', '0000000000000', 0, 'NAGRAK RT03/05 NO.13', 1411, '2018-03-08 13:58:57', NULL),
(141, 'SUGIARTI', 'RM02719', '2018-03-08', '0000000000000', 0, 'TAMA WALET RT005/013', 1411, '2018-03-08 14:00:07', NULL),
(142, 'NELISDA ERININDA', 'RM02720', '2018-03-08', '0000000000000', 0, 'TAMAN WALET RT005/013', 1411, '2018-03-08 14:01:56', NULL),
(143, 'MIARZ ANOLRIANA', 'RM02721', '2018-03-08', '0000000000000', 0, 'TAMAN WALET SL8 NO.18', 1411, '2018-03-08 14:03:25', NULL),
(144, 'RATINA', 'RM02722', '2018-03-08', '0000000000000', 0, 'VILLA REGENIY D13/14', 1411, '2018-03-08 14:04:54', NULL),
(145, 'ANI FEBRIANTI', 'RM02723', '2018-03-08', '0000000000000', 0, 'TKB B15 NO.69', 1411, '2018-03-08 14:06:01', NULL),
(146, 'SUCI FRANSISKA', 'RM02724', '2018-03-08', '0000000000000', 0, 'TBK C6/23 JL. BRAWI JAYA', 1411, '2018-03-08 14:07:35', NULL),
(147, 'SAHYUMI', 'RM02725', '2018-03-08', '0000000000000', 0, 'JL.DURIAN BLOK CI NO.25', 1411, '2018-03-08 14:09:57', NULL),
(148, 'SAFIERA ELFRIDA', 'RM02726', '2018-03-08', '0000000000000', 0, 'JL. PEPAYA 5 NO.24', 1411, '2018-03-08 14:11:39', NULL),
(149, 'DEWANTI SURYA', 'RM02727', '2018-03-08', '0000000000000', 0, 'JL. KASWARI I NO.II', 1411, '2018-03-08 14:13:15', NULL),
(150, 'ERNI SUSANTI', 'RM02728', '2018-03-08', '0000000000000', 0, 'JL. CEMARA 4 NO.157 PRIUK JAYA', 1411, '2018-03-08 14:15:01', NULL),
(151, 'SADIAH', 'RM02729', '2018-03-08', '0000000000000', 0, 'PRIUK JAYA RT03/03', 1411, '2018-03-08 14:16:06', NULL),
(152, 'ERNI ARYANI', 'RM02730', '2018-03-08', '0000000000000', 0, 'JL.CENDA 7 NO.33', 1411, '2018-03-08 14:30:31', NULL),
(153, 'NURHAYATI', 'RM02731', '2018-03-08', '0000000000000', 0, 'TANAH MERAH SEPATAN RT03/03', 1411, '2018-03-08 14:31:46', NULL),
(154, 'YULIATI', 'RM02732', '2018-03-08', '0000000000000', 0, 'KP.BEIJI RT02/06 SEPATAN', 1411, '2018-03-08 14:33:07', NULL),
(155, 'IDA FARIDA', 'RM02733', '2018-03-08', '0000000000000', 0, 'CIBODAS RT02/09', 1411, '2018-03-08 14:34:50', NULL),
(156, 'DINI FEBRIYANTI', 'RM02734', '2018-03-08', '0000000000000', 0, 'JL. MAWAR 4 NO.21-22', 1411, '2018-03-08 14:36:07', NULL),
(157, 'YULIANA SRI LESTARI', 'RM02735', '2018-03-08', '0000000000000', 0, 'JL. CANNA I BLOK B-16/41', 1411, '2018-03-08 14:38:31', NULL),
(158, 'RATNA WATI', 'RM02736', '2018-03-08', '0000000000000', 0, 'JL. RAYA MAULE RT14/04', 1411, '2018-03-08 14:39:41', NULL),
(159, 'LOVIDA DESTIA', 'RM02737', '2018-03-08', '0000000000000', 0, 'TAMAN RAYA RAJEG F2 NO.33', 1411, '2018-03-08 14:41:13', NULL),
(160, 'FATMAWATI', 'RM02738', '2018-03-08', '0000000000000', 0, 'KP. SULANG RT02/01 SEPATAN', 1411, '2018-03-08 14:43:17', NULL),
(161, 'HALIMATUN', 'RM02739', '2018-03-08', '0000000000000', 0, 'KP. SULANG RT01/02 SEPATAN', 1411, '2018-03-08 14:44:59', NULL),
(162, 'SITI YUNANI', 'RM02740', '2018-03-08', '0000000000000', 0, 'KP. PISANGAN KAYU AGUNG RT07/01', 1411, '2018-03-08 14:46:39', NULL),
(163, 'WITRI', 'RM02741', '2018-03-08', '0000000000000', 0, 'KP. SUKA DIRI RT05/08 MAUK', 1411, '2018-03-08 14:48:05', NULL),
(164, 'MONICA LALASATI', 'RM02742', '2018-03-08', '0000000000000', 0, 'TAMAN BUAH I JL.CERI I NO.II', 1411, '2018-03-08 14:49:37', NULL),
(165, 'DINA HURMA SILVIA', 'RM02743', '2018-03-08', '081310169049', 0, 'KTB 5 C3 NO.22', 1411, '2018-03-08 14:51:54', NULL),
(166, 'ERTINA', 'RM02744', '2018-03-08', '0000000000000', 0, 'JL. JAMRUD 4 B-8 NO.19 KTB 2', 1411, '2018-03-08 14:53:24', NULL),
(167, 'MITA ANJANI TYAS', 'RM02745', '2018-03-08', '0000000000000', 0, 'JL. JAMRUD 4 B-8 NO.D19 KTB 2', 1411, '2018-03-08 14:55:05', NULL),
(168, 'LINA YULIANA', 'RM02746', '2018-03-08', '0000000000000', 0, 'KP. MAUK TIMUR RT08/04', 1411, '2018-03-08 14:56:19', NULL),
(169, 'SUSILAWATI', 'RM02747', '2018-03-08', '0000000000000', 0, 'KP. KETOS RT05/03 PASAR KAMIS', 1411, '2018-03-08 14:58:00', NULL),
(170, 'SITI SUHARNI', 'RM02748', '1974-03-01', '0000000000000', 0, 'SEPATAN RT02/02 ', 1411, '2018-03-08 15:02:21', NULL),
(171, 'AYANI', 'RM02749', '2018-03-08', '0000000000000', 0, 'KP. EMPETAN RT03/02 PK.H.J', 1411, '2018-03-08 15:03:44', NULL),
(172, 'NUR FAZIY', 'RM02750', '2018-03-08', '0000000000000', 1, 'JL. PINUS 7 D10 NO.3', 1411, '2018-03-08 15:05:24', NULL),
(173, 'IMROATUL .H', 'RM02751', '2018-03-08', '0000000000000', 0, 'PEDANG KELAN JAKARTA BARAT', 1411, '2018-03-08 15:06:53', NULL),
(174, 'NAHLIANA', 'RM02752', '2018-03-08', '0000000000000', 0, 'GMP 3 JL. NURI RAYA NO.12', 1411, '2018-03-08 15:08:58', NULL),
(175, 'SRI WATI', 'RM02753', '2018-04-08', '0000000000000', 0, 'PASAR KAMIS TAMAN WALET RT06/10', 1411, '2018-03-08 15:10:14', NULL),
(176, 'SRI WAHYUNI', 'RM02754', '2018-03-08', '0000000000000', 0, 'KETON KELAPA PASAR KAMIS RT04/05', 1411, '2018-03-08 15:12:01', NULL),
(177, 'AROHAENAH', 'RM02755', '2018-03-08', '0000000000000', 0, 'RAJEG MULIA RT01/03', 1411, '2018-03-08 15:13:14', NULL),
(178, 'CASIEM', 'RM02756', '2018-03-08', '0000000000000', 0, 'NAGRAK RT04/06', 1411, '2018-03-08 15:14:15', NULL),
(179, 'MILA NOVIA ', 'RM02757', '2018-03-08', '0000000000000', 0, 'BUMI INDAH DAHLIA 8 ID-15', 1411, '2018-03-08 15:15:42', NULL),
(180, 'LUSIANA SARI', 'RM02361', '2018-03-08', '0000000000000', 0, 'KP. PUTATI RT01/04', 1411, '2018-03-10 10:04:56', NULL),
(181, 'ARMAWATI TEGGAR PRATIWI', 'RM02362', '2018-03-08', '0000000000000', 0, 'KP SITUES RT03/03', 1411, '2018-03-10 10:09:27', NULL),
(182, 'RINA ', 'RM02363', '2018-03-08', '0000000000000', 0, 'KRONCONG PERMAI RT013/003', 1411, '2018-03-10 10:10:38', NULL),
(183, 'NUR AINI', 'RM02364', '2018-03-08', '0000000000000', 0, 'GRAND SUTRA CI NO.9', 1411, '2018-03-10 10:12:02', NULL),
(184, 'AMINAH', 'RM02366', '2018-03-08', '0000000000000', 0, 'KP. PICUNG RT01/05 PAKEM', 1411, '2018-03-10 10:13:43', NULL),
(185, 'ENDANG RUSMIATI', 'RM02367', '2018-03-08', '0000000000000', 0, 'JL. PINUS 4 C2/35 ', 1411, '2018-03-10 10:15:04', NULL),
(186, 'MEGA ANI KARMAWATI', 'RM02368', '2018-03-08', '0000000000000', 0, 'PRIUK JAYA RT03/03', 1411, '2018-03-10 10:17:41', NULL),
(187, 'SUYANTI', 'RM02369', '2018-03-08', '0000000000000', 0, '5.80', 1411, '2018-03-10 10:19:15', NULL),
(188, 'HARIS NURUL FASYAH', 'RM02370', '2018-03-08', '0000000000000', 1, 'JL. JATI 1 NO.13', 1411, '2018-03-10 10:20:39', NULL),
(189, 'BETY KURNIATI', 'RM02371', '2018-03-08', '0000000000000', 0, 'KAWIDARAN, CIBADAK CIKUPA', 1411, '2018-03-10 10:23:05', NULL),
(190, 'ANGGA WAHYU', 'RM02372', '2018-03-08', '0000000000000', 1, 'TAMAN RAYA RAJEG C2/7', 1411, '2018-03-10 10:24:22', NULL),
(191, 'DIAN SURYANI', 'RM02373', '2018-03-08', '0000000000000', 0, 'JL. JATI 4 NO.5', 1411, '2018-03-10 10:25:36', NULL),
(192, 'ALIFIA', 'RM02374', '2018-03-08', '0000000000000', 0, 'DUTA ASRI AI N0.3', 1411, '2018-03-10 11:17:13', NULL),
(193, 'SYARIFAH', 'RM02375', '2018-03-08', '0000000000000', 0, 'KP. GRUDUK SEPATAN', 1411, '2018-03-10 11:18:48', NULL),
(194, 'ROMAWI MANULU', 'RM02376', '2018-03-08', '0000000000000', 0, 'JL. PANGLIMA POLIM CIPONDOH', 1411, '2018-03-10 11:22:22', NULL),
(195, 'ISNIATI', 'RM02377', '2018-03-08', '0000000000000', 0, '1.27', 1411, '2018-03-10 11:24:47', NULL),
(196, 'SEPTI ASIH EDY', 'RM02378', '2018-03-08', '0000000000000', 0, '5.71', 1411, '2018-03-10 11:25:49', NULL),
(197, 'MAYSAROH', 'RM02379', '2018-03-08', '0000000000000', 0, 'KP. TANJAKAN RT01/01 MAUK', 1411, '2018-03-10 11:27:52', NULL),
(198, 'NANI', 'RM02380', '2018-03-08', '0000000000000', 0, 'JL. JERUK 3 NO.24', 1411, '2018-03-10 11:29:04', NULL),
(199, 'A RIZAL', 'RM02381', '2018-03-08', '0000000000000', 1, 'PAKU HAJIRAWA KEPU', 1411, '2018-03-10 11:30:18', NULL),
(200, 'TETI HERAWATI', 'RM02382', '2018-03-08', '0000000000000', 0, 'KP. GAMBAR RT01/07', 1411, '2018-03-10 11:31:37', NULL),
(201, 'SULIEM WATI', 'RM02384', '2018-03-08', '0000000000000', 0, 'JL. KASWARI 1 E35/3', 1411, '2018-03-10 11:33:00', NULL),
(202, 'RINA RIZKY', 'RM02385', '2018-03-08', '0000000000000', 0, 'KP. SANGIANG RT01/15', 1411, '2018-03-10 11:34:01', NULL),
(203, 'IMAS', 'RM02243', '2018-03-08', '0000000000000', 0, 'KAPUK CENGKARENG JAKBAR', 1411, '2018-03-10 11:38:31', NULL),
(204, 'ROSAE', 'RM02244', '2018-03-08', '0000000000000', 0, 'JL. GURAME I NO.3', 1411, '2018-03-10 11:39:46', NULL),
(205, 'LINDA ASTUTI', 'RM02245', '2018-03-08', '0000000000000', 0, 'KP. GRUDUK RT01/01 SEPATAN', 1411, '2018-03-10 11:40:59', NULL),
(206, 'IRMA MAYANG SARI', 'RM02246', '2018-03-08', '0000000000000', 0, 'KP. SULANG RT01/04', 1411, '2018-03-10 11:42:32', NULL),
(207, 'NOVIANTI', 'RM02247', '2018-03-08', '0000000000000', 0, 'JL. M. TOHAKM38 SANGIANG', 1411, '2018-03-10 11:43:49', NULL),
(208, 'ANA ROSIANA', 'RM02248', '2018-03-08', '0000000000000', 0, 'KP. DOYONG', 1411, '2018-03-10 11:44:48', NULL),
(209, 'ISMIALI', 'RM02249', '2018-03-08', '0000000000000', 0, 'TAMAN BUAH E1/1', 1411, '2018-03-10 11:46:18', NULL),
(210, 'NUKE LIUTO RINI', 'RM02250', '2018-03-08', '0000000000000', 0, 'PDK.ARUM D3/1', 1411, '2018-03-10 11:49:25', NULL),
(211, 'MURWATI', 'RM02251', '2018-03-08', '0000000000000', 0, 'JL. LUBUK KENCANA D6/3', 1411, '2018-03-10 11:51:07', NULL),
(212, 'ADE NUR HAINI', 'RM02252', '2018-03-08', '0000000000000', 0, 'PURI A5 NO.58', 1411, '2018-03-10 11:52:08', NULL),
(213, 'NENG SADIAH', 'RM02253', '2018-03-08', '0000000000000', 0, 'PANGODOKANKIDUL RT03/03', 1411, '2018-03-10 11:53:32', NULL),
(214, 'SELVI PURWARDANI', 'RM02254', '2018-03-08', '0000000000000', 0, 'GRIYA ARTARAJEG B6/12', 1411, '2018-03-10 11:55:49', NULL),
(215, 'ENI ANGGRAINI', 'RM02255', '2018-03-08', '0000000000000', 0, 'TJ. KAIT PETEKONG', 1411, '2018-03-10 11:57:47', NULL),
(216, 'LINDA LESTARI', 'RM02256', '2018-03-08', '0000000000000', 0, 'TJ. KAIT PETEKONG', 1411, '2018-03-10 11:58:54', NULL),
(217, 'ANDRE PRATAMA', 'RM02258', '2018-03-08', '0000000000000', 1, 'JL.RAJAWALI BARAT E24/4', 1411, '2018-03-10 12:18:28', NULL),
(218, 'JUJU', 'RM02259', '2018-03-08', '0000000000000', 0, 'DS. JATI MULYA RT02/02 SEPATAN', 1411, '2018-03-10 12:19:45', NULL),
(219, 'UMIYATI', 'RM02260', '2018-03-08', '0000000000000', 0, 'KP. DURI, PAKU HAJI', 1411, '2018-03-10 12:21:02', NULL),
(220, 'VINKA SELINDA', 'RM02261', '2018-03-08', '0000000000000', 0, 'V.G', 1411, '2018-03-10 12:22:02', NULL),
(221, 'DARLIMA', 'RM02262', '2018-03-08', '0000000000000', 0, 'JL. ARMANA 2 NO.12', 1411, '2018-03-10 12:23:45', NULL),
(222, 'MAYA FITRIANI', 'RM02263', '2018-03-08', '0000000000000', 0, 'KP. RAWA  KIDANG RT04/03', 1411, '2018-03-10 12:25:57', NULL),
(223, 'ANI', 'RM02264', '2018-03-08', '0000000000000', 0, 'RAJEG ASRI D8/1', 1411, '2018-03-10 12:27:11', NULL),
(224, 'ADIIN FITRI SIRAIT', 'RM02561', '2018-03-08', '0000000000000', 0, 'KELAPA GADING JAKUT', 1411, '2018-03-10 12:29:43', NULL),
(225, 'ITA MURTAZIQOH', 'RM02562', '2018-03-01', '0000000000000', 0, 'KP. KISERENG RT08/02 MAUK', 1411, '2018-03-10 12:31:55', NULL),
(226, 'TINA', 'RM02758', '2018-03-08', '0000000000000', 0, 'JL.JATI 3 NO.13', 1411, '2018-03-10 12:32:47', NULL),
(227, 'SARTINI', 'RM02564', '2018-03-08', '0000000000000', 0, 'KP. CAMPORAN RT09/08 PAKEM', 1411, '2018-03-10 12:35:28', NULL),
(228, 'TINA', 'RM02563', '2018-03-08', '0000000000000', 0, 'JL. JATI 3 NO.13', 1411, '2018-03-10 12:38:40', NULL),
(229, 'RENI RAHMAN', 'RM02565', '2018-03-08', '0000000000000', 0, 'PERUM PERMATA BLOK CB/17', 1411, '2018-03-10 12:41:40', NULL),
(230, 'SUSANAH', 'RM02566', '2018-03-08', '0000000000000', 0, 'KP. ARMAYA MAUK', 1411, '2018-03-10 12:42:52', NULL),
(231, 'ITA GUSTIANINGSIH', 'RM02567', '2018-03-08', '0000000000000', 0, 'DS. JATIWARINGIN RT02/01 MAUK', 1411, '2018-03-10 12:44:30', NULL),
(232, 'SITI MAESAROH', 'RM02568', '2018-03-08', '0000000000000', 0, 'PDK. MAKMUR JATI UNJUNG', 1411, '2018-03-10 12:46:23', NULL),
(233, 'GUNAWAN', 'RM02569', '2018-03-08', '0000000000000', 1, 'TAMAN KUTA BUMIBLOK D5 NO.3', 1411, '2018-03-10 12:48:09', NULL),
(234, 'HIKMAHTUL HUSNA', 'RM02570', '2018-03-08', '0000000000000', 0, 'H.5', 1411, '2018-03-10 12:50:31', NULL),
(235, 'ROMA SITUMORANG', 'RM02571', '2018-03-08', '0000000000000', 0, 'PERMATAFE10 NO.110', 1411, '2018-03-10 12:51:59', NULL),
(236, 'LIANA', 'RM02572', '2018-03-08', '0000000000000', 0, 'JL.PALMA I NO.4', 1411, '2018-03-10 12:53:40', NULL),
(237, 'REPTI WIYARNI', 'RM02573', '2018-03-08', '0000000000000', 0, 'TAMAN BUAH SUKAMANTRI AC/4', 1411, '2018-03-10 12:55:50', NULL),
(238, 'MULYATI', 'RM02574', '2018-03-08', '0000000000000', 0, 'CLLANGOK RT02/04 PAKEM', 1411, '2018-03-10 12:57:45', NULL),
(239, 'PUTRI ANGGRAINI', 'RM02575', '2018-03-08', '0000000000000', 0, 'JL. GRYA BUMI ASRI', 1411, '2018-03-10 12:59:30', NULL),
(240, 'IDAH ROYANI ', 'RM02576', '2018-03-08', '0000000000000', 0, 'VTB II C3NO.16', 1411, '2018-03-10 13:01:14', NULL),
(241, 'YURI KUMALA', 'RM02577', '2018-03-08', '0000000000000', 0, 'JL.CEMARA I NO.25', 1411, '2018-03-10 13:02:40', NULL),
(242, 'RAFA NURUL AFIFAH', 'RM02578', '2018-03-08', '0000000000000', 0, 'TAMAN BUAH SUKAMANTRI', 1411, '2018-03-10 13:03:58', NULL),
(243, 'MARTA. S', 'RM02579', '2018-03-08', '0000000000000', 0, 'DUTA ASRIPALEM 5 SEPATAN', 1411, '2018-03-10 13:05:04', NULL),
(244, 'MUTIA ERES', 'RM02580', '2018-03-08', '0000000000000', 0, 'GMP II C NO.27 CADAS', 1411, '2018-03-10 13:06:16', NULL),
(245, 'RIZKA PAINA JOGI', 'RM02581', '2018-03-08', '0000000000000', 0, 'JL. BAWAL 4 NO.12', 1411, '2018-03-10 13:07:24', NULL),
(246, 'RIZKY ANDRIANSYAH', 'RM02386', '2018-03-08', '0000000000000', 1, 'R.30', 1411, '2018-03-13 06:34:05', NULL),
(247, 'NIA KUSUMAWATY', 'RM02387', '2018-03-08', '0000000000000', 0, 'KENCANA TIMUR', 1411, '2018-03-13 06:35:31', NULL),
(248, 'KELLY MULYATI', 'RM02388', '2018-03-08', '0000000000000', 0, 'DS. PASIR NANGKA TIGARAKSA', 1411, '2018-03-13 06:37:27', NULL),
(249, 'IMAH YUNITA', 'RM02389', '2018-03-08', '0000000000000', 0, 'NTN BONANA PERMAI', 1411, '2018-03-13 06:39:39', NULL),
(250, 'RANI', 'RM02390', '2018-03-08', '0000000000000', 0, 'SULLLANG, KP.GEDONG', 1411, '2018-03-13 06:42:18', NULL),
(251, 'LSMLATI', 'RM02391', '2018-03-08', '0000000000000', 0, 'PERUM. PERMATA SINDANG SARI', 1411, '2018-03-13 06:44:39', NULL),
(252, 'ROSDIANA', 'RM02392', '2018-03-08', '0000000000000', 0, 'JL. DAHLIA 2 NO.21', 1411, '2018-03-13 07:11:50', NULL),
(253, 'THIN SUHARNI', 'RM02393', '2018-03-08', '0000000000000', 0, 'PDK. ARUM D3/6', 1411, '2018-03-13 07:15:01', NULL),
(254, 'NAWIYAH', 'RM02394', '2018-03-08', '0000000000000', 0, 'KP. KUKUN RT05/06', 1411, '2018-03-13 07:16:45', NULL),
(255, 'FITRI MAYASARI', 'RM02395', '2018-03-08', '0000000000000', 0, 'KP. BUGEL RT03/01', 1411, '2018-03-13 07:17:46', NULL),
(256, 'DWEI RUKMANA', 'RM02396', '2018-03-08', '0000000000000', 0, 'KP. JUNGKEL RT02/01', 1411, '2018-03-13 07:19:19', NULL),
(257, 'TATI', 'RM02397', '2018-03-08', '0000000000000', 0, 'RAWA INDAH RT03/03 TNH. MERAH', 1411, '2018-03-13 07:20:45', NULL),
(258, 'ROMANAH', 'RM02398', '2018-03-08', '0000000000000', 1, 'KP. PISANG RT04/03 SEPATAN', 1411, '2018-03-13 17:24:45', NULL),
(259, 'RON', 'RM02399', '2018-03-08', '0000000000000', 0, '-', 1411, '2018-03-13 17:25:53', NULL),
(260, 'ANNIA TSAMANA', 'RM02400', '2018-03-08', '0000000000000', 0, 'PERUMNAS KARAWACI', 1411, '2018-03-13 17:27:45', NULL),
(261, 'UTAMI PERMATA SARI', 'RM02401', '2018-03-08', '0000000000000', 0, 'JL.DAAN MOGOT NO.137', 1411, '2018-03-13 17:29:14', NULL),
(262, 'DEWI SUSANTI', 'RM02402', '2018-03-08', '0000000000000', 0, 'GRAND PERMATA BLOK E', 1411, '2018-03-13 17:30:49', NULL),
(263, 'SRI MULATI', 'RM02403', '2018-03-08', '0000000000000', 0, 'JL.NUSA INDAH 4 NO.4', 1411, '2018-03-13 17:32:21', NULL),
(264, 'SILVI JUNIAR', 'RM02404', '2018-03-08', '0000000000000', 0, 'JATI WARINGIN BEKASI', 1411, '2018-03-13 17:33:40', NULL),
(265, 'TANTY ERINA', 'RM02405', '2018-03-08', '0000000000000', 0, 'BUMI INDAH LG NO.52', 1411, '2018-03-13 17:35:08', NULL),
(266, 'SUSANTI', 'RM02406', '2018-03-08', '0000000000000', 0, 'KP. DOYONG RT004/013', 1411, '2018-03-13 17:37:45', NULL),
(267, 'HENDRA SITOHANG', 'RM02407', '2018-03-08', '0000000000000', 1, 'SUKATANI RT02/03', 1411, '2018-03-13 17:40:20', NULL),
(268, 'DINA ESA', 'RM02408', '2018-03-08', '0000000000000', 0, 'SEPATAN AWANBIN RT01/01', 1411, '2018-03-13 17:45:12', NULL),
(269, 'SITI KHOIRIAH', 'RM02409', '2018-03-08', '0000000000000', 0, 'JL. ANJELINE NO.7', 1411, '2018-03-13 17:47:02', NULL),
(270, 'DEDE PUHAN', 'RM02410', '2018-03-08', '0000000000000', 0, 'KP. BUNGEL RT05', 1411, '2018-03-13 17:49:05', NULL),
(271, 'INDAH', 'RM02411', '2018-03-08', '0000000000000', 0, 'KP. PISANGAN RT08/04', 1411, '2018-03-14 17:58:23', NULL),
(272, 'SUISTINA', 'RM02412', '2018-03-08', '0000000000000', 0, 'TAMAN WALER 57 NO.19', 1411, '2018-03-14 18:00:00', NULL),
(273, 'IRMAWATI', 'RM02413', '2018-03-08', '0000000000000', 0, 'JL JAMRUD 3 NO.16 KTB 2', 1411, '2018-03-14 18:01:25', NULL),
(274, 'ERANTI', 'RM02414', '2018-03-08', '0000000000000', 0, 'KP. JUNGKE 1 RT01/02 MAUK', 1411, '2018-03-14 18:03:19', NULL),
(275, 'IKLIMAH', 'RM02415', '2018-03-08', '0000000000000', 0, 'SEPATAN GRUDUK RT01/01', 1411, '2018-03-14 18:06:25', NULL),
(276, 'WINDI APRIANI', 'RM02416', '2018-03-08', '0000000000000', 0, 'KP. RAWA KIDANG RT02/01', 1411, '2018-03-14 18:10:46', NULL),
(277, 'YETI', 'RM02417', '2018-03-08', '0000000000000', 0, 'JL. ANGGREK1 NO.23', 1411, '2018-03-14 18:12:26', NULL),
(278, 'KARDINI', 'RM02418', '2018-03-08', '0000000000000', 0, 'JL. ANGGREK 1 NO.62', 1411, '2018-03-14 18:13:57', NULL),
(279, 'PARYATUN', 'RM02419', '2018-03-08', '0000000000000', 0, 'TAMAN. BUAH 2 BAS NO.1', 1411, '2018-03-14 18:15:26', NULL),
(280, 'EFI SUPRIHATI', 'RM02420', '2018-03-08', '0000000000000', 0, 'TAMAN. BUAH 2 BA4 NO.14', 1411, '2018-03-14 18:17:11', NULL),
(281, 'helmina', 'RM02421', '2018-03-08', '0000000000000', 0, 'taman buah 2bas no.1', 1411, '2018-03-15 21:07:22', NULL),
(282, 'siti mutama imah', 'RM02422', '2018-03-08', '0000000000000', 0, 'pabuaran cemara', 1411, '2018-03-15 21:11:44', NULL),
(283, 'mahfira', 'RM02423', '2018-03-08', '0000000000000', 0, 'perum telaga bumi asih blok B NO.18', 1411, '2018-03-15 21:14:57', NULL),
(284, 'DEVI AYU P', 'RM02424', '2018-03-08', '0000000000000', 0, 'JL. ANGSANG 2 NO.1', 1411, '2018-03-15 21:16:07', NULL),
(285, 'TITIN YANLARIAH', 'RM02425', '2018-03-08', '0000000000000', 0, 'JL. MELON 3 NO.4', 1411, '2018-03-15 21:18:02', NULL),
(286, 'ANI SUMARNI', 'RM02426', '2018-03-08', '0000000000000', 0, 'JL. ANGSARA 2 NO.1', 1411, '2018-03-15 21:19:35', NULL),
(287, 'RIPA MUR AMALIA', 'RM02427', '2018-03-08', '0000000000000', 0, 'PRIUK JAYA RT03/02', 1411, '2018-03-15 21:20:47', NULL),
(288, 'TALIA MAGDALENA', 'RM02428', '2018-03-08', '0000000000000', 0, 'JL. MERPATI 3 NO.1', 1411, '2018-03-15 21:22:00', NULL),
(289, 'SITI KHALIFAH', 'RM02429', '2018-03-08', '0000000000000', 0, 'JL. PINUS NO.15 RT01/06', 1411, '2018-03-15 21:23:41', NULL),
(290, 'WIDY', 'RM02430', '2018-03-08', '0000000000000', 0, 'TAMAN BUAH SUKAMANTRI', 1411, '2018-03-15 21:25:41', NULL),
(291, 'FIRDA APRIANTI', 'RM02431', '2018-03-08', '0000000000000', 0, 'SIKAPING, SULANG', 1411, '2018-03-15 21:26:55', NULL),
(292, 'DIAN DARMAYANTI', 'RM02432', '2018-03-08', '0000000000000', 0, 'JL. PARKIT 1 B32/23', 1411, '2018-03-15 21:27:57', NULL),
(293, 'IIS ROSITA', 'RM02433', '2018-03-08', '0000000000000', 0, 'SEPATAN RT04/03 NO.4', 1411, '2018-03-15 21:29:06', NULL),
(294, 'TITIN SUPRIATIN', 'RM02434', '2018-03-08', '0000000000000', 0, 'RAJEG OKLAY RT05/05', 1411, '2018-03-15 21:30:47', NULL),
(295, 'RENATHA APRILIANI', 'RM02435', '2018-03-08', '0000000000000', 0, 'VTE D1 NO.12', 1411, '2018-03-15 21:31:55', NULL),
(296, 'SRI MUNAYATI', 'RM02265', '2018-03-08', '0000000000000', 0, 'KP. BENDA RT09/03', 1411, '2018-03-15 21:34:33', NULL),
(297, 'MURSINAH', 'RM02266', '2018-03-08', '0000000000000', 0, 'JATIWARINGIN', 1411, '2018-03-15 21:35:53', NULL),
(298, 'NOVIANTI', 'RM0267', '2018-03-08', '0000000000000', 0, 'PS. BARU MEDE', 1411, '2018-03-15 21:38:49', NULL),
(299, 'ELIPUTRI', 'RM02268', '2018-03-08', '0000000000000', 0, 'KUTA BARU AGUNG RT003/012', 1411, '2018-03-15 21:41:15', NULL),
(300, 'NUR RENO', 'RM02269', '2018-03-08', '0000000000000', 0, 'KP. GELAM PASAR KAMIS', 1411, '2018-03-15 21:42:29', NULL),
(301, 'NUR RINI', 'RM02270', '2018-03-08', '0000000000000', 0, 'JL. LAYUR RAYA NO.5', 1411, '2018-03-15 21:43:38', NULL),
(302, 'LIA SARI', 'RM02271', '2018-03-08', '0000000000000', 0, 'GRIYA LESTARI P 5 NO.12A', 1411, '2018-03-15 21:45:01', NULL),
(303, 'POPY FEBRIA', 'RM02272', '2018-03-08', '0000000000000', 0, 'JL. TENGGIRI 1 NO.35', 1411, '2018-03-15 21:46:32', NULL),
(304, 'SUSILAWATI', 'RM02273', '2018-03-08', '0000000000000', 0, 'KP. KEBON KELAPA RT05/04', 1411, '2018-03-15 21:49:17', NULL),
(305, 'ASWAD HAMBALI', 'RM02274', '2018-03-08', '0000000000000', 1, 'A 72', 1411, '2018-03-15 21:50:28', NULL),
(306, 'SAU DARINA', 'RM02275', '2018-03-08', '0000000000000', 0, 'GRAND PERMANA SEPATAN', 1411, '2018-03-15 21:54:43', NULL),
(307, 'ENCOP', 'RM02276', '2018-03-08', '0000000000000', 0, 'KP. BEBULAK, KONSAMBI RT12/10', 1411, '2018-03-15 21:56:25', NULL),
(308, 'YUSNIA', 'RM02278', '2018-03-08', '0000000000000', 0, 'TAMAN RAYA RAJEG 6/56', 1411, '2018-03-15 21:58:30', NULL),
(309, 'ERNA', 'RM02278', '2018-03-08', '0000000000000', 0, 'KOSAMBI BARU RT37/18 TELUK NAGA', 1411, '2018-03-15 22:00:50', NULL),
(310, 'ALIYAH JUBASDAH', 'RM02279', '2018-03-08', '0000000000000', 0, 'TAMAN BUAH 15/17', 1411, '2018-03-15 22:02:36', NULL),
(311, 'NINING ANDRIYANI', 'RM02280', '2018-03-08', '0000000000000', 0, 'TAMAN BUAH 15/17', 1411, '2018-03-15 22:04:35', NULL),
(312, 'SUTRIYAH', 'RM02281', '2018-03-08', '0000000000000', 0, 'KP. KEMIRI RT04/02', 1411, '2018-03-15 22:06:03', NULL),
(313, 'SUKINAH', 'RM02282', '2018-03-08', '0000000000000', 0, 'PERMATA SEPATAN BLOKD20/23', 1411, '2018-03-15 22:07:14', NULL),
(314, 'KURNIA PURWANINGSIH', 'RM02283', '2018-03-08', '0000000000000', 0, 'KP. LEBAK WANGI GG BARIN', 1411, '2018-03-15 22:10:05', NULL),
(315, 'SUTARIYAH', 'RM02284', '2018-03-08', '0000000000000', 0, 'KP. KEMIRI RT04/02 MAUK', 1411, '2018-03-15 22:11:09', NULL),
(316, 'AGAIA', 'RM02286', '2018-03-08', '0000000000000', 0, '-', 1411, '2018-03-15 22:12:27', NULL),
(317, 'SITI KEMARIAH', 'RM02287', '2018-03-08', '0000000000000', 0, 'KP. JAMTU RT03/04', 1411, '2018-03-15 22:13:28', NULL),
(318, 'NINA YUMANTI', 'RM02288', '2018-03-08', '0000000000000', 0, 'DS. KOSAMBI', 1411, '2018-03-15 22:14:47', NULL),
(319, 'herendawati', 'RM02436', '2018-03-08', '0000000000000', 0, 'villa sms pasir awi 1/17', 1411, '2018-03-17 06:37:28', NULL),
(320, 'heni handayani', 'RM02437', '2018-03-08', '0000000000000', 0, 'wisma mas 2 f2/23', 1411, '2018-03-17 06:39:04', NULL),
(321, 'sri rahayu', 'RM02438', '2018-03-08', '0000000000000', 0, 'griya lesrati permai 2 n 11', 1411, '2018-03-17 06:41:04', NULL),
(322, 'puji handayani', 'RM02439', '2018-03-08', '0000000000000', 0, 'kp. kebon kelapa', 1411, '2018-03-17 06:42:31', NULL),
(323, 'neti teguh', 'RM02440', '2018-03-08', '0000000000000', 0, 'villa tangerang elok d6 no.2', 1411, '2018-03-17 06:45:00', NULL),
(324, 'ririn fatayati', 'RM02443', '2018-03-08', '0000000000000', 0, 'KTB II D2/3', 1411, '2018-03-17 06:48:53', NULL),
(325, 'WISNU SIGIT', 'RM02444', '2018-03-08', '0000000000000', 1, 'VTB I D5 NO.11', 1411, '2018-03-17 06:51:37', NULL),
(326, 'WIDO WATI', 'RM02445', '2018-03-08', '0000000000000', 0, 'VTB 1 D5 N0.11', 1411, '2018-03-17 06:55:37', NULL),
(327, 'SITI ROFIKAH', 'RM02446', '2018-03-08', '0000000000000', 0, 'KEBUN KELAPA RT04/03', 1411, '2018-03-17 06:57:22', NULL),
(328, 'rumandang s', 'RM02442', '2018-03-08', '0000000000000', 0, 'jl. cana 3', 1411, '2018-03-18 12:36:50', NULL),
(329, 'den dini sajana', 'RM02447', '2018-03-08', '0000000000000', 0, 'gitung rt02/06', 1411, '2018-03-18 12:38:15', NULL),
(330, 'rosinah', 'RM02448', '2018-03-08', '0000000000000', 0, 'kp. pisangan kayu agung rt02/02', 1411, '2018-03-18 12:40:43', NULL),
(331, 'juhaeroh', 'RM02449', '2018-03-08', '0000000000000', 0, 'kp. mauk utara', 1411, '2018-03-18 12:41:54', NULL),
(332, 'neneng mulia hasanah', 'RM02450', '2018-03-08', '0000000000000', 0, 'perum taman wuri nc 1/37 pasar kamis', 1411, '2018-03-18 12:43:27', NULL),
(333, 'sami', 'RM02451', '2018-03-08', '0000000000000', 0, 's.30', 1411, '2018-03-18 12:44:11', NULL),
(334, 'yayah robiah', 'RM02452', '2018-03-08', '0000000000000', 0, 'kp. pekayon, pasar jati', 1411, '2018-03-18 12:45:17', NULL),
(335, 'rizka febriyanti', 'RM02453', '2018-03-08', '0000000000000', 0, 'perum nuansa sukatani rajeg', 1411, '2018-03-18 12:48:08', NULL),
(336, 'suprihati', 'RM02454', '2018-03-08', '0000000000000', 0, 'jl. palma 7 no.23 ', 1411, '2018-03-18 12:49:31', NULL),
(337, 'intan anggraeni', 'RM02455', '1995-03-08', '0000000000000', 0, 'pabuaran', 1411, '2018-03-18 12:54:20', NULL),
(338, 'iin martina riana', 'RM02456', '2018-03-08', '0000000000000', 0, 'tanah tinggi jl. menteng', 1411, '2018-03-18 12:56:01', NULL),
(339, 'zaidah', 'RM02457', '2018-03-08', '0000000000000', 1, 'tkb c8/149', 1411, '2018-03-18 12:56:56', NULL),
(340, 'ami', 'RM02458', '2018-03-08', '0000000000000', 0, 'jl. bugel mas indah no.6', 1411, '2018-03-18 12:58:28', NULL),
(341, 'darini', 'RM02459', '2018-03-08', '0000000000000', 0, 'kebon besar, batu caper', 1411, '2018-03-18 12:59:25', NULL),
(342, 'rahayu dwi novianti', 'RM02460', '2018-03-08', '0000000000000', 0, 'petukangan utara', 1411, '2018-03-18 13:00:49', NULL),
(343, 'RITA APRIYANA', 'RM02510', '2018-03-08', '0000000000000', 0, 'duta asri II recident', 1411, '2018-03-18 13:03:53', NULL),
(344, 'nurdiana', 'RM02511', '2018-03-08', '0000000000000', 0, 'cadas pasir', 1411, '2018-03-18 13:04:48', NULL),
(345, 'nurhayati', 'RM02512', '2018-03-08', '0000000000000', 0, 'cadas lebak rt04/02', 1411, '2018-03-18 13:06:26', NULL),
(346, 'sri kurnia rahayu', 'RM02513', '2018-03-08', '0000000000000', 0, 'jl. raya mauk, sepatan', 1411, '2018-03-18 13:07:38', NULL),
(347, 'H. encun', 'RM02514', '2018-03-08', '0000000000000', 0, 'kp. kondang rt05/02', 1411, '2018-03-18 13:10:01', NULL),
(348, 'ila siti holilah', 'RM02515', '2018-03-08', '0000000000000', 0, 'telaga bumi asri blok i/22', 1411, '2018-03-18 13:14:19', NULL),
(349, 'dian ayu lestari', 'RM02516', '2018-03-08', '0000000000000', 0, 'kp. gelam jaya rt03/03', 1411, '2018-03-18 13:16:44', NULL),
(350, 'asih', 'RM02517', '2018-03-08', '0000000000000', 0, 'perum ktb 2 b6-n0.28', 1411, '2018-03-18 13:19:41', NULL),
(351, 'nabila maghfina', 'RM02518', '2018-03-08', '0000000000000', 0, 'jl. jurumudi lama rt01/05', 1411, '2018-03-18 13:21:36', NULL),
(352, 'endang marina', 'RM02519', '2018-03-08', '0000000000000', 0, 'jl.arya santika, tugu', 1411, '2018-03-18 13:23:11', NULL),
(353, 'lia novia', 'RM02520', '2018-03-08', '0000000000000', 0, 'mede 7. jl. ratiman nurai', 1411, '2018-03-18 13:24:48', NULL),
(354, 'mulyadi', 'RM02521', '2018-03-08', '0000000000000', 1, 'kp. rawa indah rt04/04 sepatan', 1411, '2018-03-18 13:56:21', NULL),
(355, 'asim', 'RM02522', '2018-03-08', '0000000000000', 0, 'kp. kartu bongkok', 1411, '2018-03-18 13:58:14', NULL),
(356, 'yuliana', 'RM02523', '2018-03-08', '0000000000000', 0, 'jl. melah I no.6', 1411, '2018-03-18 13:59:45', NULL),
(357, 'marsella risda', 'RM02524', '2018-03-08', '0000000000000', 0, 'jl. cang I no.46', 1411, '2018-03-18 14:03:17', NULL),
(358, 'm. pratomo', 'RM02525', '2018-03-08', '0000000000000', 1, 'jl. anggrek I no.27', 1411, '2018-03-18 14:05:15', NULL),
(359, 'rosmala', 'RM02526', '2018-03-08', '0000000000000', 0, 'kencana timur 8 vtb II', 1411, '2018-03-18 14:07:00', NULL),
(360, 'novita', 'RM02527', '2018-03-08', '0000000000000', 0, 'jl.teratai II no.12', 1411, '2018-03-18 14:08:03', NULL),
(361, 'een suentina', 'RM02528', '2018-03-08', '0000000000000', 0, 'jl. arjuna, pamulang 2', 1411, '2018-03-18 14:10:18', NULL),
(362, 'fitria yulianingsih', 'RM02529', '2018-03-08', '0000000000000', 0, 'vtb c2/23', 1411, '2018-03-18 14:11:40', NULL),
(363, 'heni hardayani', 'RM02530', '2018-03-08', '0000000000000', 0, 'kp. kemiri rt02/03', 1411, '2018-03-18 14:12:46', NULL),
(364, 'yuni rusdianti', 'RM02531', '2018-03-08', '0000000000000', 0, 'y.53', 1411, '2018-03-18 14:14:05', NULL),
(365, 'indah mngsati', 'RM02532', '2018-03-08', '0000000000000', 0, 'villa bandara dadap', 1411, '2018-03-18 14:15:16', NULL),
(366, 'eka sartika', 'RM0253e', '2018-03-08', '0000000000000', 0, 'cluster agung indah', 1411, '2018-03-18 14:16:21', NULL),
(367, 'lidia ferbritriati', 'RM02168', '2018-03-08', '0000000000000', 0, 'TKB2 Blok A-7 no.28', 1411, '2018-03-18 14:20:52', NULL),
(368, 'soleha', 'RM02169', '2018-03-08', '0000000000000', 0, 'kp. barbulak margo mulia', 1411, '2018-03-18 14:23:42', NULL),
(369, 'den dini sajana', 'RM02447', '2018-03-08', '0000000000000', 0, 'gitung rt02/06', 1411, '2018-03-18 16:18:22', NULL),
(370, 'reka aditya', 'RM02170', '2018-03-08', '0000000000000', 0, 'vila permata b3/6', 1411, '2018-03-18 16:20:42', NULL),
(371, 'budi asih', 'RM02171', '2018-03-08', '0000000000000', 0, 'vila permata b3/8', 1411, '2018-03-18 16:21:56', NULL),
(372, 'ismawati', 'RM02172', '2018-03-08', '0000000000000', 0, 'rajeg mekasari perum greya bentang', 1411, '2018-03-18 16:23:43', NULL),
(373, 'dian puspita. m', 'RM02173', '1085-03-08', '0000000000000', 0, 'jl. salak1', 1411, '2018-03-18 16:28:00', NULL),
(374, 'tomblr', 'RM02174', '2018-03-08', '0000000000000', 0, 'jl. sawo 4 no.32', 1411, '2018-03-18 16:29:19', NULL),
(375, 'mumun ', 'RM02175', '2018-03-08', '0000000000000', 0, 'mauk timur rt02/03', 1411, '2018-03-18 16:30:27', NULL),
(376, 'sulis kawati', 'RM02176', '2018-03-08', '0000000000000', 0, 'kp. kayu bongkok rt01/01', 1411, '2018-03-18 16:31:39', NULL),
(377, 'hamimah', 'RM02177', '2018-03-08', '0000000000000', 0, 'kp.kayu bangkok rt01/01', 1411, '2018-03-18 16:32:48', NULL),
(378, 'fudoh', 'RM02178', '2018-03-08', '0000000000000', 0, 'f.5', 1411, '2018-03-18 16:33:39', NULL),
(379, 'sri elia', 'RM02179', '2018-03-08', '0000000000000', 0, 'gantung sukadiri rt06/02', 1411, '2018-03-18 16:34:47', NULL),
(380, 'rian meliawati', 'RM02180', '2018-03-08', '0000000000000', 0, 'vila balaraja', 1411, '2018-03-18 16:35:45', NULL),
(381, 'sulistina', 'RM02181', '2018-03-08', '0000000000000', 0, 'cipondoh  raya 2', 1411, '2018-03-18 16:36:41', NULL),
(382, 'eltriani', 'RM02182', '2018-03-08', '0000000000000', 0, 'sewan', 1411, '2018-03-18 16:37:37', NULL),
(383, 'vera', 'RM02183', '2018-03-08', '0000000000000', 0, 'kp. jamba rt01/04 puri', 1411, '2018-03-18 16:38:42', NULL),
(384, 'desi sekawati', 'RM02184', '2018-03-08', '0000000000000', 0, 'jl. teguh abdi nurul yadin', 1411, '2018-03-18 16:40:16', NULL),
(385, 'indah lestari', 'RM02185', '2018-03-08', '0000000000000', 0, 'kp.pisangan rawa buaya rt02/06', 1411, '2018-03-18 16:41:26', NULL),
(386, 'ety juniah', 'RM02186', '2018-03-08', '0000000000000', 0, 'b.6', 1411, '2018-03-18 16:42:17', NULL),
(387, 'siti hajar s. y', 'RM02187', '2018-03-08', '0000000000000', 0, 'kp. kebon kelapa rt04/09', 1411, '2018-03-18 16:43:30', NULL),
(388, 'novi nirmala wati', 'RM02189', '2018-03-08', '0000000000000', 0, 'jl. lamda 3 no.417', 1411, '2018-03-18 16:44:49', NULL),
(389, 'mera mustika sari', 'RM02190', '2018-03-08', '0000000000000', 0, 'kp. gruduk rt02/02', 1411, '2018-03-18 16:45:50', NULL),
(390, 'suti', 'RM02191', '2018-03-08', '0000000000000', 0, 'jl rayapakem perum bumi asri', 1411, '2018-03-18 16:46:51', NULL),
(391, 'diana', 'RM02192', '2018-03-08', '0000000000000', 0, 'kp. bojong', 1411, '2018-03-18 16:47:48', NULL),
(392, 'faiqoh nurul fadillah', 'RM02486', '2018-03-08', '0000000000000', 0, 'tegal kunir kidul', 1411, '2018-03-18 16:49:47', NULL),
(393, 'atri fani. s', 'RM02487', '2018-03-08', '0000000000000', 0, 'tegal kunur kidul', 1411, '2018-03-18 16:50:59', NULL),
(394, 'aliyah', 'RM02488', '2018-03-08', '0000000000000', 0, 'kp. pisangeng simpang 4 sepatan', 1411, '2018-03-18 16:52:11', NULL),
(395, 'ratna afriska', 'RM02489', '2018-03-08', '0000000000000', 0, 'jl. gatot sugroto', 1411, '2018-03-18 16:53:30', NULL),
(396, 'amah', 'RM02490', '2018-03-08', '0000000000000', 0, 'sepatan kayu bongkok rt01/01', 1411, '2018-03-18 16:55:03', NULL),
(397, 'talita rathana', 'RM02491', '2018-03-08', '0000000000000', 0, 't.9', 1411, '2018-03-18 16:57:56', NULL),
(398, 'inka ivana atilr', 'RM02492', '2018-03-08', '0000000000000', 0, 'vila permata sarakan', 1411, '2018-03-18 16:59:29', NULL),
(399, 'raena ayu fitria', 'RM02493', '2018-03-08', '0000000000000', 0, '-', 1411, '2018-03-18 17:00:55', NULL),
(400, 'hina handayani', 'RM02494', '2018-03-08', '0000000000000', 0, 'taman nurl nd2/27', 1411, '2018-03-18 17:02:27', NULL),
(401, 'dely kristiawati', 'RM02495', '2018-03-08', '0000000000000', 0, 'jl. makmur IIno.12', 1411, '2018-03-18 17:07:34', NULL),
(402, 'tati ivovlanti', 'RM02496', '2018-03-08', '0000000000000', 0, 'jl. prambanan raya no.38', 1411, '2018-03-18 17:10:26', NULL),
(403, 'naufai mudri', 'RM02497', '2018-03-08', '0000000000000', 0, 'jl tenggiri no.14', 1411, '2018-03-18 17:14:37', NULL),
(404, 'risa nurmata', 'RM02498', '2018-03-08', '0000000000000', 0, 'kuta bumi II blok BII no.09', 1411, '2018-03-18 17:16:07', NULL);
INSERT INTO `mst_pasien` (`id_mst_pasien`, `nama_pasien`, `no_rm`, `tgl_lahir`, `no_telp`, `gender`, `alamat`, `id_kel`, `is_create`, `is_update`) VALUES
(405, 'willy varian. s', 'RM02499', '2018-03-08', '0000000000000', 1, 'bumi indah ug no.5', 1411, '2018-03-18 17:17:19', NULL),
(406, 'christine', 'RM02500', '2018-03-08', '0000000000000', 0, 'bumi indah ug no.05', 1411, '2018-03-18 17:20:05', NULL),
(407, 'umi kalsuin', 'RM02501', '2018-03-08', '0000000000000', 0, 'taman walet sg no.12', 1411, '2018-03-18 17:21:29', NULL),
(408, 'aan handayani', 'RM02502', '2018-03-08', '0000000000000', 0, 'jl. m tuha km priuk', 1411, '2018-03-18 17:22:46', NULL),
(409, 'anita', 'RM02503', '2018-03-08', '0000000000000', 0, 'benua indah a no.11', 1411, '2018-03-18 17:24:26', NULL),
(410, 'amelia', 'RM02504', '2018-03-08', '0000000000000', 0, 'tangerang', 1411, '2018-03-18 17:25:16', NULL),
(411, 'lilis supini', 'RM02505', '2018-03-08', '0000000000000', 0, 'kp. cadas rt03/02', 1411, '2018-03-18 17:26:41', NULL),
(412, 'onih baeitaki', 'RM02506', '2018-03-08', '0000000000000', 0, 'pondok cituis blok e no.112', 1411, '2018-03-18 17:28:26', NULL),
(413, 'linda lie', 'RM02507', '2018-03-08', '0000000000000', 0, 'perum taman walet blok 6-8 no.6', 1411, '2018-03-18 17:29:34', NULL),
(414, 'yani', 'RM02508', '2018-03-08', '0000000000000', 0, 'kp. leles rt01/01 pasarkamis', 1411, '2018-03-18 17:30:45', NULL),
(415, 'dede tarsih', 'RM02509', '2018-03-08', '0000000000000', 0, 'kp. guna rajeg rt01/04', 1411, '2018-03-18 17:31:55', NULL),
(416, 'arif herawati', 'RM02510', '2018-03-08', '0000000000000', 0, 'oerum taman kota bumi', 1411, '2018-03-18 17:33:10', NULL),
(417, 'titi fajar wati', 'RM02461', '2018-03-08', '0000000000000', 0, 'pinang tgr', 1411, '2018-03-18 18:56:25', NULL),
(418, 'diana wati', 'RM02462', '2018-03-08', '0000000000000', 0, 'jl. pepaya I', 1411, '2018-03-18 18:57:55', NULL),
(419, 'siti rahmi', 'RM02463', '2018-03-08', '0000000000000', 0, 'kp kelopi 5 rt04/05', 1411, '2018-03-18 18:59:11', NULL),
(420, 'upus nur fitriani', 'RM02464', '2018-03-08', '0000000000000', 0, 'gitung rt04/01', 1411, '2018-03-18 19:01:44', NULL),
(421, 'desi talmlati', 'RM02465', '2018-03-08', '0000000000000', 0, 'vtebsno.04', 1411, '2018-03-18 19:05:40', NULL),
(422, 'rini julianti', 'RM02466', '2018-03-08', '0000000000000', 0, 'r.31', 1411, '2018-03-18 19:06:42', NULL),
(423, 'pnggah meygiantou', 'RM02667', '2018-03-08', '0000000000000', 0, 'p.9', 1411, '2018-03-18 19:08:52', NULL),
(424, 'kharisma indah', 'RM0268', '2018-03-08', '0000000000000', 0, 'jl. pinus 3no.18 ', 1411, '2018-03-18 19:13:01', NULL),
(425, 'helera', 'RM02468', '2018-03-08', '0000000000000', 0, 'kp. keronjort02/03', 1411, '2018-03-18 19:15:20', NULL),
(426, 'ririn apriyanti', 'RM02470', '2018-03-08', '0000000000000', 0, 'kp.putut rt05/03', 1411, '2018-03-18 19:24:09', NULL),
(427, 'sulastri', 'RM02471', '2018-03-08', '0000000000000', 0, 'kp. perkayon rt04/06', 1411, '2018-03-18 19:26:34', NULL),
(428, 'siti elsa', 'RM02472', '2018-03-08', '0000000000000', 0, 'tangerang', 1411, '2018-03-18 19:28:46', NULL),
(429, 'ira aprlanti', 'RM02473', '2018-03-08', '0000000000000', 0, 'ktb 5, e4 no.12', 1411, '2018-03-18 19:31:17', NULL),
(430, 'nurtati', 'RM02474', '2018-03-08', '0000000000000', 0, 'jl. raya pakem rt08/03', 1411, '2018-03-18 19:33:33', NULL),
(431, 'rena ratna sari', 'RM02475', '2018-03-08', '0000000000000', 0, 'kebon kelapa pakem', 1411, '2018-03-18 19:35:43', NULL),
(432, 'siti mariam', 'RM02759', '2018-03-08', '0000000000000', 0, 'kp, duri rt05/01 paku', 1411, '2018-03-18 19:37:25', NULL),
(433, 'mami maya saroh', 'RM02477', '2018-03-08', '0000000000000', 0, 'cadas pasar rt02/07', 1411, '2018-03-18 19:41:36', NULL),
(434, 'siti mariam', 'RM02476', '2018-03-08', '0000000000000', 0, 'kp.duri rt05/01 paku', 1411, '2018-03-18 19:43:16', NULL),
(435, 'yuna pramono', 'RM02478', '2018-03-08', '0000000000000', 0, 'rawa kidang rt04/02', 1411, '2018-03-18 19:45:17', NULL),
(436, 'mirnawati', 'RM02479', '2018-03-08', '0000000000000', 0, 'kp. biji rt07/02', 1411, '2018-03-18 19:46:46', NULL),
(437, 'entin sofian', 'RM02480', '2018-03-08', '0000000000000', 0, 'tkb d5 no.3', 1411, '2018-03-18 19:49:26', NULL),
(438, 'marni', 'RM02481', '2018-03-08', '0000000000000', 0, 'kosambi ambon rt02/04', 1411, '2018-03-18 19:51:03', NULL),
(439, 'yayah rohayati', 'RM02482', '2018-03-08', '0000000000000', 0, 'kp. kebon cali rt015/004', 1411, '2018-03-18 19:52:29', NULL),
(440, 'yulia', 'RM02483', '2018-03-08', '0000000000000', 0, 'kp. pekayon rt04/01', 1411, '2018-03-18 19:54:02', NULL),
(441, 'omiyati', 'RM02484', '2018-03-08', '0000000000000', 0, 'sepatan jembatan merah', 1411, '2018-03-18 19:55:09', NULL),
(442, 'erna suherna', 'RM02485', '2018-03-08', '0000000000000', 0, 'sangiang jl. damai II', 1411, '2018-03-18 19:56:33', NULL),
(443, 'eka apriyanti', 'RM02218', '1997-03-08', '0000000000000', 0, 'jl merpati 3 13-14', 1411, '2018-03-18 20:09:24', NULL),
(444, 'badriah', 'RM02219', '2018-03-08', '0000000000000', 0, 'kp. pisangan kayu agung', 1411, '2018-03-18 20:13:00', NULL),
(445, 'siti nurhayati', 'RM02220', '2018-03-08', '0000000000000', 0, 'kp. kongwi bqru kukug', 1411, '2018-03-18 20:20:49', NULL),
(446, 'hasanah', 'RM02221', '2018-03-08', '0000000000000', 0, 'kp. kakun recident mekar sari', 1411, '2018-03-21 12:34:08', NULL),
(447, 'miftah unikmah', 'RM02222', '2018-03-08', '0000000000000', 0, 'pedongkelan jakbar', 1411, '2018-03-21 12:35:25', NULL),
(448, 'lilik munawaroh', 'RM02223', '2018-03-08', '0000000000000', 0, 'jl. mawar 7', 1411, '2018-03-21 12:36:46', NULL),
(449, 'eli', 'RM02224', '2018-03-08', '0000000000000', 0, 'jl. mawar 7 taman cibodas', 1411, '2018-03-21 12:51:59', NULL),
(450, 'shinta', 'RM02225', '2018-03-08', '0000000000000', 0, 's.122', 1411, '2018-03-21 12:53:30', NULL),
(451, 'eka puji', 'RM02226', '2018-03-08', '0000000000000', 0, 'vte d6 no.5', 1411, '2018-03-21 12:55:23', NULL),
(452, 'purwati', 'RM02227', '2018-03-08', '0000000000000', 0, 'global menkon', 1411, '2018-03-21 12:59:59', NULL),
(453, 'dedeh', 'RM02228', '2018-03-08', '0000000000000', 0, 'sepatan dukuh rt04/01', 1411, '2018-03-21 13:01:15', NULL),
(454, 'novita karlina', 'RM02229', '2018-03-08', '0000000000000', 0, 'mutiara pluit blok f 10/11', 1411, '2018-03-21 13:02:38', NULL),
(455, 'ria resti fauzi', 'RM02230', '2018-03-08', '0000000000000', 0, 'jl. pesut raya f27/16', 1411, '2018-03-21 13:04:33', NULL),
(456, 'm. wahid', 'RM02231', '2018-03-08', '0000000000000', 1, 'jl. kurma raya f27/16', 1411, '2018-03-21 13:05:55', NULL),
(457, 'fitri', 'RM02232', '2018-03-08', '0000000000000', 0, 'jl. cumi-cumi 2 rt01/04', 1411, '2018-03-21 13:07:49', NULL),
(458, 'rindu dvanda sandia', 'RM02233', '2018-03-08', '0000000000000', 0, 'pdk. jaya rt03/05', 1411, '2018-03-21 13:10:11', NULL),
(459, 'sofianah', 'RM02234', '2018-03-08', '0000000000000', 0, 'sepatan kp. baru kolot', 1411, '2018-03-21 13:12:25', NULL),
(460, 'kurnia sari', 'RM02235', '2018-03-08', '0000000000000', 0, 'cibodas jati uwung', 1411, '2018-03-21 13:13:26', NULL),
(461, 'cici ayu', 'RM02236', '2018-03-08', '0000000000000', 0, 'kp. cilandak rt12/02 cikupa', 1411, '2018-03-21 13:15:00', NULL),
(462, 'milady', 'RM02237', '2018-03-08', '0000000000000', 0, 'vtb g5/35', 1411, '2018-03-21 13:15:58', NULL),
(463, 'mila maysofa', 'RM02238', '2018-03-08', '0000000000000', 0, 'jl. melati 4 no.8', 1411, '2018-03-21 13:17:19', NULL),
(464, 'dewi angraeni', 'RM02239', '2018-03-08', '0000000000000', 0, 'tkb blok d10/19', 1411, '2018-03-21 21:56:16', NULL),
(465, 'nunung puspita dewi', 'RM02240', '2018-03-08', '0000000000000', 0, 'lebak rt03/02', 1411, '2018-03-21 21:58:05', NULL),
(466, 'ane irene', 'RM02241', '2018-03-08', '0000000000000', 0, 'a.63', 1411, '2018-03-21 21:58:47', NULL),
(467, 'ivera susilawati', 'RM02242', '2018-03-08', '0000000000000', 0, 'kp. redeng rt12/04', 1411, '2018-03-21 22:00:12', NULL),
(468, 'witi', 'RM02338', '2018-03-08', '0000000000000', 0, 'taman merah rt004/04 sepatan', 1411, '2018-03-21 22:01:36', NULL),
(469, 'mariah', 'RM02339', '2018-03-08', '0000000000000', 0, 'taman raya rajeg e2/16', 1411, '2018-03-21 22:02:34', NULL),
(470, 'weni angraeni', 'RM02340', '2018-03-08', '0000000000000', 0, 'jati waringin rt06/02', 1411, '2018-03-21 22:03:32', NULL),
(471, 'elfa herlina', 'RM02341', '2018-03-08', '0000000000000', 0, 'sukama readent b4/16', 1411, '2018-03-21 22:04:52', NULL),
(472, 'nurhayati', 'RM02342', '2018-03-08', '0000000000000', 1, '', 0, '2018-03-21 22:05:32', NULL),
(473, 'alifi maltsa', 'RM02343', '2018-03-08', '0000000000000', 0, 'jl. jamrud 3,ktb 2', 1411, '2018-03-21 22:07:33', NULL),
(474, 'sri hidayah', 'RM02344', '2018-03-08', '0000000000000', 0, 'jl. jamrud 3, ktb 2', 1411, '2018-03-21 22:08:24', NULL),
(475, 'narnis', 'RM02345', '2018-03-08', '0000000000000', 0, 'jl. merah delima 4 ktb 2', 1411, '2018-03-21 22:09:21', NULL),
(476, 'siti komariah', 'RM02346', '2018-03-08', '0000000000000', 0, 'dusun III', 1411, '2018-03-21 22:11:15', NULL),
(477, 'sopiah', 'RM02347', '2018-03-08', '0000000000000', 0, 'kp. ketapang rt013/004', 1411, '2018-03-21 22:12:11', NULL),
(478, 'rikza lutfiana', 'RM02348', '2018-03-08', '0000000000000', 0, 'dmp 2 jl. melati 3', 1411, '2018-03-21 22:13:21', NULL),
(479, 'sarah devi', 'RM02349', '2018-03-08', '0000000000000', 0, 'jl. teratai 2 no.72', 1411, '2018-03-21 22:14:18', NULL),
(480, 'novianti', 'RM02350', '2018-03-08', '0000000000000', 0, 'kp. berusa ds. bayu asih mauk', 1411, '2018-03-21 22:15:42', NULL),
(481, 'emi suhaemi', 'RM02351', '2018-03-08', '0000000000000', 0, 'kp. leles rt01/04', 1411, '2018-03-21 22:16:36', NULL),
(482, 'putri chaerunisa', 'RM02352', '2018-03-08', '0000000000000', 0, 'jl. serakai c24/187', 1411, '2018-03-21 22:17:45', NULL),
(483, 'suherna', 'RM02353', '2018-03-08', '0000000000000', 0, 'kp.lamporan rt03/03 ', 1411, '2018-03-21 22:18:47', NULL),
(484, 'dila fadillah ranti', 'RM02354', '2018-03-08', '0000000000000', 0, 'suka wail rt01/03', 1411, '2018-03-21 22:19:46', NULL),
(485, 'yulia', 'RM02355', '2018-03-08', '0000000000000', 0, 'kp. gelam rt02/02p akem', 1411, '2018-03-21 22:20:47', NULL),
(486, 'ayu setiani', 'RM02356', '2018-03-08', '0000000000000', 0, 'kp. lebak karet rt07/02 sepatan', 1411, '2018-03-21 22:21:51', NULL),
(487, 'raehana', 'RM02357', '2018-03-08', '0000000000000', 0, 'tegal kanir mauk rt13/03', 1411, '2018-03-21 22:22:53', NULL),
(488, 'naoni', 'RM02358', '2018-03-08', '0000000000000', 0, 'vtb I ab15', 1411, '2018-03-21 22:23:48', NULL),
(489, 'nurkomaida', 'RM02359', '2018-03-08', '0000000000000', 0, 'vtb I ad no.5', 1411, '2018-03-21 22:24:46', NULL),
(490, 'winda sari', 'RM02360', '2018-03-08', '0000000000000', 0, 'priuk jaya', 1411, '2018-03-21 22:25:30', NULL),
(491, 'nur asiah', 'RM02193', '2018-03-08', '0000000000000', 0, 'kp. rt01/02', 1411, '2018-03-21 22:26:50', NULL),
(492, 'sri yantini', 'RM02194', '2018-03-08', '0000000000000', 0, 'kp. laban rt04/08', 1411, '2018-03-21 22:27:49', NULL),
(493, 'wulan', 'RM02195', '2018-03-08', '0000000000000', 0, 'kp. buaran mangga rt01/02', 1411, '2018-03-21 22:28:50', NULL),
(494, 'usna', 'RM02196', '2018-03-08', '0000000000000', 0, 'kp. buaran mangga rt01/02', 1411, '2018-03-21 22:30:06', NULL),
(495, 'laila intan', 'RM02197', '2018-03-08', '0000000000000', 0, 'pdk. arum AII/4', 1411, '2018-03-21 22:31:10', NULL),
(496, 'franisika', 'RM02198', '2018-03-08', '0000000000000', 0, 'pabuaran tumpeng rt04/10', 1411, '2018-03-21 22:32:21', NULL),
(497, 'ade yuliati', 'RM02201', '2018-03-08', '0000000000000', 0, 'sangiang rt05/03', 1411, '2018-03-21 22:34:00', NULL),
(498, 'yuliati', 'RM02199', '2018-03-08', '0000000000000', 0, 'jl. jamrud 4 blok b7/ktb 2', 1411, '2018-03-21 22:35:46', NULL),
(499, 'errawati', 'RM02200', '2018-03-08', '0000000000000', 0, 'jl. jamrud 4 blokb7/9', 1411, '2018-03-21 22:37:30', NULL),
(500, 'siti fadillah', 'RM02202', '2018-03-08', '0000000000000', 0, 'kp. tegal rt014/005', 1411, '2018-03-21 22:39:33', NULL),
(501, 'siti elsn madiana', 'RM02203', '2018-03-08', '0000000000000', 0, 'paku hagar rt03/02', 1411, '2018-03-21 22:40:59', NULL),
(502, 'iis yayah soliha', 'RM02204', '2018-03-08', '0000000000000', 0, 'kp. cikaping rt01/02', 1411, '2018-03-21 22:42:32', NULL),
(503, 'dinah rahmawati', 'RM02205', '2018-03-08', '0000000000000', 0, 'kp.kukun rt01/02', 1411, '2018-03-21 22:43:44', NULL),
(504, 'epi sumami', 'RM02206', '2018-03-08', '0000000000000', 0, 'kp.cikampung rt01/02', 1411, '2018-03-23 12:34:03', NULL),
(505, 'nana parawasih', 'RM02207', '2018-03-08', '0000000000000', 0, 'kp. rawa kepu', 1411, '2018-03-23 12:35:08', NULL),
(506, 'vivi natalis', 'RM02208', '2018-03-08', '0000000000000', 0, 'kp. kedaung barat', 1411, '2018-03-23 12:36:01', NULL),
(507, 'nina agustina', 'RM02209', '2018-03-08', '0000000000000', 0, 'n.10', 1411, '2018-03-23 12:37:03', NULL),
(508, 'winda wirarti', 'RM02210', '2018-03-08', '0000000000000', 0, 'kp. ketapang kidul', 1411, '2018-03-23 12:38:10', NULL),
(509, 'khusnul khotimah', 'RM02211', '2018-03-08', '0000000000000', 0, 'kp. pangodokan kidul', 1411, '2018-03-23 12:39:43', NULL),
(510, 'maryani yanti', 'RM02212', '2018-03-08', '0000000000000', 0, 'kp.gintung rt014', 1411, '2018-03-23 12:40:56', NULL),
(511, 'wati', 'RM02213', '2018-03-08', '0000000000000', 0, 'kp. jambu rt03/04 puri', 1411, '2018-03-23 12:42:19', NULL),
(512, 'siti indria', 'RM02214', '2018-03-08', '0000000000000', 0, 'rt02/03', 1411, '2018-03-23 12:43:31', NULL),
(513, 'erza ayu', 'RM02215', '2018-03-08', '0000000000000', 0, 'jl. jeruk I no.18', 1411, '2018-03-23 12:45:02', NULL),
(514, 'tika lesatri', 'RM02290', '2018-03-08', '0000000000000', 0, 'geraha pakem a3/15', 1411, '2018-03-23 12:50:33', NULL),
(515, 'yohana', 'RM02290', '2018-03-08', '0000000000000', 0, 'kp. periuk jaya rto2/03', 1411, '2018-03-23 12:51:22', NULL),
(516, 'lia novita', 'RM02291', '2018-03-08', '0000000000000', 0, 'vtb II jl. kencana raya', 1411, '2018-03-23 12:52:16', NULL),
(517, 'linda suryani', 'RM02292', '2018-03-08', '0000000000000', 0, 'jl. empu sendok raya', 1411, '2018-03-23 12:54:11', NULL),
(518, 'galuh nur amalina', 'RM02293', '2018-03-08', '0000000000000', 0, 'kp. cikoping', 1411, '2018-03-23 12:55:10', NULL),
(519, 'siti nur hasanah', 'RM02294', '2018-03-08', '0000000000000', 0, 'kp. nograk rt04/06', 1411, '2018-03-23 12:56:17', NULL),
(520, 'nurhayani', 'RM02295', '2018-03-08', '0000000000000', 0, 'n.38', 1411, '2018-03-23 12:57:11', NULL),
(521, 'della', 'RM02296', '2018-03-08', '0000000000000', 0, 'jl. melpati 4 no.82', 1411, '2018-03-23 12:58:16', NULL),
(522, 'em zahera', 'RM02297', '2018-03-08', '0000000000000', 0, 'surya kencana d2/8 vtb II', 1411, '2018-03-23 12:59:31', NULL),
(523, 'hi mah', 'RM02298', '2018-03-08', '0000000000000', 0, 'jl.durian raya ', 1411, '2018-03-23 13:00:23', NULL),
(524, 'rena natahlia sari', 'RM02299', '2018-03-08', '0000000000000', 0, 'kp. kebon kelapa pakem', 1411, '2018-03-23 13:01:46', NULL),
(525, 'lia huliah', 'RM02300', '1994-03-08', '0000000000000', 0, 'pasar kamis rt02/02', 1411, '2018-03-23 13:03:38', NULL),
(526, 'rosmiah', 'RM02301', '1975-03-08', '0000000000000', 0, 'jatiwaringin', 1411, '2018-03-23 13:06:04', NULL),
(527, 'desi lestari', 'RM02760', '2018-03-08', '0000000000000', 0, 'bintaro cikini tangsel', 1411, '2018-03-23 13:06:54', NULL),
(528, 'omah', 'RM02303', '2018-03-08', '0000000000000', 0, 'jl. kayu putih 2', 1411, '2018-03-23 13:07:34', NULL),
(529, 'neng nurhayati', 'RM02304', '2018-03-08', '0000000000000', 0, 'buaran jati rt01/02', 1411, '2018-03-23 13:08:29', NULL),
(530, 'heriyah', 'RM02305', '2018-03-08', '0000000000000', 0, 'kp. pisangan lebak', 1411, '2018-03-23 13:09:34', NULL),
(531, 'cisiu', 'RM02306', '2018-03-08', '0000000000000', 0, 'jl. jati I rt07/06', 1411, '2018-03-23 13:10:29', NULL),
(532, 'yanah', 'RM02307', '2018-03-08', '0000000000000', 0, 'kp. gintung rt20/08', 1411, '2018-03-23 13:11:29', NULL),
(533, 'siti nur kholifah', 'RM02309', '2018-03-08', '0000000000000', 0, '-', 1411, '2018-03-23 13:12:36', NULL),
(534, 'nur laila', 'RM02308', '2018-03-08', '0000000000000', 0, 'kp. gitung rt20/08', 1411, '2018-03-23 13:13:39', NULL),
(535, 'ani sulistiawati', 'RM02310', '2018-03-08', '0000000000000', 0, 'jl. melati 3 no.11 ', 1411, '2018-03-23 13:14:34', NULL),
(536, 'siti aminah', 'RM02311', '2018-03-08', '0000000000000', 0, '5.111', 1411, '2018-03-23 13:15:30', NULL),
(537, 'miranda ratna sari', 'RM02312', '2018-03-08', '0000000000000', 0, 'vtn II jl. surya', 1411, '2018-03-23 13:17:30', NULL),
(538, 'lili usmayah', 'RM02313', '2018-03-08', '0000000000000', 0, 'karawaci perumnas I', 1411, '2018-03-23 13:18:43', NULL),
(539, 'hindun ismawati', 'RM02314', '2018-03-08', '0000000000000', 0, 'jl. cibedug rt03/01', 1411, '2018-03-23 13:19:54', NULL),
(540, 'nurjanah', 'RM02315', '2018-03-08', '0000000000000', 0, 'kp. ginring rt016/005', 1411, '2018-03-23 13:20:55', NULL),
(541, 'erry nurtanti', 'RM02316', '2018-03-08', '0000000000000', 0, 'e.25', 1411, '2018-03-23 13:23:55', NULL),
(542, 'hastuti', 'RM02317', '2018-03-08', '0000000000000', 0, 'tkp 4 blok a no.8', 1411, '2018-03-23 13:24:56', NULL),
(543, 'siska dame', 'RM02318', '2018-03-08', '0000000000000', 0, 'kp. margo hayu rt021/05', 1411, '2018-03-23 13:26:22', NULL),
(544, 'yeni mutiara', 'RM02319', '2018-03-08', '0000000000000', 0, 'tkb d6 no.9', 1411, '2018-03-23 13:49:39', NULL),
(545, 'yeni farida', 'RM02320', '2018-03-08', '0000000000000', 0, 'kp.periuk rt05/04mauk', 1411, '2018-03-23 13:50:47', NULL),
(546, 'intan sugiarti', 'RM02321', '2018-03-08', '0000000000000', 0, 'kp. panjajaran rt03/03', 1411, '2018-03-23 13:52:03', NULL),
(547, 'atikah', 'RM02322', '2018-03-08', '0000000000000', 0, 'jl.karya damai 3rt04/03', 1411, '2018-03-23 13:53:47', NULL),
(548, 'atik sukmawati', 'RM02323', '2018-03-08', '0000000000000', 0, 'kp. lebak wangi rt06/07', 1411, '2018-03-23 13:54:56', NULL),
(549, 'sanih munaprilin', 'RM02324', '2018-03-08', '0000000000000', 0, 'jl. palem III no24', 1411, '2018-03-23 13:56:41', NULL),
(550, 'lilis elisdawati', 'RM02325', '2018-03-08', '0000000000000', 0, 'jl. bayur opak cadas rt05/06', 1411, '2018-03-23 13:58:11', NULL),
(551, 'd. susanti', 'RM02326', '2018-03-08', '0000000000000', 0, 'jl. raya ktb kp.sandol', 1411, '2018-03-23 13:59:26', NULL),
(552, 'roheen', 'RM02327', '2018-03-08', '0000000000000', 0, 'vtb f2no.1', 1411, '2018-03-23 14:00:22', NULL),
(553, 'christina', 'RM02328', '2018-03-08', '0000000000000', 0, 'tkp I c2/7', 1411, '2018-03-23 14:02:24', NULL),
(554, 'siti sajidah', 'RM02329', '2018-03-08', '0000000000000', 0, 's.135', 1411, '2018-03-23 14:03:20', NULL),
(555, 'anggita nur ayu', 'RM02330', '2018-03-08', '0000000000000', 0, 'mutiara peluit f9/26', 1411, '2018-03-23 14:04:29', NULL),
(556, 'emawati', 'RM0331', '2018-03-08', '0000000000000', 0, 'jl.krukut jakbar', 1411, '2018-03-23 14:05:21', NULL),
(557, 'okoy siti r', 'RM02332', '2018-03-08', '0000000000000', 0, 'permata rajeg d4/8', 1411, '2018-03-23 14:06:34', NULL),
(558, 'ita rosita ', 'RM02333', '2018-03-08', '0000000000000', 0, 'bugel pangadengan', 1411, '2018-03-23 14:07:43', NULL),
(559, 'lala sintia dewi', 'RM02334', '2018-03-08', '0000000000000', 0, 'kp.ribut rt021/04', 1411, '2018-03-23 14:09:39', NULL),
(560, 'elan', 'RM02335', '2018-03-08', '0000000000000', 0, 'ds.gintung rt06/02 no.22', 1411, '2018-03-23 14:11:43', NULL),
(561, 'atikah', 'RM02336', '2018-03-08', '0000000000000', 0, 'kp. pdk jaya sepatan', 1411, '2018-03-23 14:12:47', NULL),
(562, 'rohmlatun', 'RM02337', '2018-03-08', '0000000000000', 0, 'pdk', 1411, '2018-03-23 14:13:56', NULL),
(563, 'juria', 'RM02216', '2018-03-08', '0000000000000', 0, 'sepatan jembatan merah', 1411, '2018-03-23 14:17:51', NULL),
(564, 'yolanda rhamadanti', 'RM02217', '2018-03-08', '0000000000000', 0, 'kosambi pisangan jaya', 1411, '2018-03-23 14:18:56', NULL),
(565, 'm. dikafli firzatullah', 'RM02534', '2018-03-08', '0000000000000', 1, 'pk. haji rt03/02', 1411, '2018-03-24 13:05:10', NULL),
(566, 'lina', 'RM02535', '2018-03-08', '0000000000000', 0, 'kp. nanggul rt06/01 rajeg', 1411, '2018-03-24 13:06:28', NULL),
(567, 'sri amalia', 'RM02536', '2018-03-08', '0000000000000', 0, 'ds. gintung rt05/01mauk', 1411, '2018-03-24 13:07:49', NULL),
(568, 'ayu erita', 'RM02537', '2018-03-08', '0000000000000', 0, 'jl.  bungur III no. 195 rt03/06 priuk jaya', 1411, '2018-03-24 13:09:43', NULL),
(569, 'devipriyanti', 'RM02538', '2018-03-08', '0000000000000', 0, 'jl. dahlia 3 no.22', 1411, '2018-03-24 13:10:49', NULL),
(570, 'oktavia dwi hastuti', 'RM02539', '2018-03-08', '0000000000000', 0, 'wisma harapan c/359', 1411, '2018-03-24 13:12:35', NULL),
(571, 'zulrlsina', 'RM02540', '2018-08-08', '0000000000000', 0, 'keroncong permai rt003/014', 1411, '2018-03-24 13:16:29', NULL),
(572, 'ibnu sidik', 'RM02541', '2018-03-08', '0000000000000', 1, 'jl.merpati 4 no.6', 1411, '2018-03-24 13:17:32', NULL),
(573, 'sandia juniwati', 'RM02542', '2018-03-08', '0000000000000', 0, 'jl. catelin I a15 no.9', 1411, '2018-03-24 13:18:49', NULL),
(574, 'sukriyanti', 'RM02543', '2018-03-08', '0000000000000', 0, 'kp.rawa kidang sepatan', 1411, '2018-03-24 13:19:52', NULL),
(575, 'anis puspita', 'RM02544', '2018-03-08', '0000000000000', 0, 'tkb a18 no.38', 1411, '2018-03-24 13:20:50', NULL),
(576, 'halimah', 'RM02545', '2018-03-08', '0000000000000', 0, 'pasarpk. haji rt01/02', 1411, '2018-03-24 13:22:02', NULL),
(577, 'santi rahmawati', 'RM02546', '2018-03-08', '0000000000000', 0, 'pasar pk. haji rt01/02', 1411, '2018-03-24 13:23:17', NULL),
(578, 'lutfia ananda', 'RM02547', '2018-03-08', '0000000000000', 0, 'ds. surya batam', 1411, '2018-03-24 13:24:48', NULL),
(579, 'sendys andrian w', 'RM02548', '2018-03-08', '0000000000000', 1, '567', 1411, '2018-03-24 13:25:55', NULL),
(580, 'hani puspita', 'RM02549', '2018-03-08', '0000000000000', 0, 'pdk. makmur ', 1411, '2018-03-24 13:27:40', NULL),
(581, 'siti mahromah ', 'RM02550', '2018-03-08', '0000000000000', 0, 'jl.damai no.34 sangiang', 1411, '2018-03-24 13:29:20', NULL),
(582, 'yanti haryanti', 'RM02551', '2018-03-08', '0000000000000', 0, 'pemata regency', 1411, '2018-03-24 13:30:21', NULL),
(583, 'dwi hartati', 'RM02552', '2018-03-08', '0000000000000', 0, 'cadas pasir rt02/03', 1411, '2018-03-24 13:31:45', NULL),
(584, 'budiarti', 'RM02553', '2018-03-08', '0000000000000', 0, 'kp. sondol rt02/02 kota bumi', 1411, '2018-03-24 13:33:35', NULL),
(585, 'suhaeti', 'RM02554', '2018-03-08', '0000000000000', 0, 'jl. delima 5 d6 no.9', 1411, '2018-03-24 13:34:43', NULL),
(586, 'syafira vernanda', 'RM02555', '2018-03-08', '0000000000000', 0, 'taman buah 2 bali no.14', 1411, '2018-03-24 13:36:01', NULL),
(587, 'tris hartati', 'RM02556', '2018-03-08', '0000000000000', 0, 'asrama polisi rajeg', 1411, '2018-03-24 13:37:14', NULL),
(588, 'siti nurseha', 'RM02557', '2018-03-08', '0000000000000', 0, 'jl. masjid nurul huda mauk', 1411, '2018-03-24 13:38:46', NULL),
(589, 'khotimsh', 'RM02558', '2018-03-08', '0000000000000', 0, 'kp.kisah rt10/02 mauk', 1411, '2018-03-24 13:39:51', NULL),
(590, 'ayu wulandari', 'RM02560', '2018-03-08', '0000000000000', 0, 'bumi indah dc 34', 1411, '2018-03-24 13:40:45', NULL),
(591, 'dewiyanti', 'RM01971', '2018-03-08', '0000000000000', 0, 'taman buah c10/5', 1411, '2018-03-26 21:28:39', NULL),
(592, 'widiawati', 'RM01972', '2018-03-08', '0000000000000', 0, 'taman mini jakarta timur', 1411, '2018-03-26 21:30:54', NULL),
(593, 'dezar', 'RM01973', '2018-03-08', '0000000000000', 1, 'citra raya, cikupa', 1411, '2018-03-26 21:33:43', NULL),
(594, 'aan dewi yanti', 'RM01974', '2018-03-08', '0000000000000', 0, 'perum. insan sukamanah', 1411, '2018-03-26 21:43:19', NULL),
(595, 'filza yuniar', 'RM01975', '2018-03-08', '0000000000000', 0, 'jl.royalraya no.3', 1411, '2018-03-26 21:45:17', NULL),
(596, 'yeni', 'RM01976', '2018-03-08', '0000000000000', 0, 'y.45', 1411, '2018-03-26 21:46:30', NULL),
(597, 'yusnia', 'RM01977', '2018-03-08', '0000000000000', 0, 'kp. nanggul rt02/03', 1411, '2018-03-27 10:45:06', NULL),
(598, 'ita novita sari', 'RM01978', '2018-03-08', '0000000000000', 0, 'ds. tegal kunir banyu asih', 1411, '2018-03-27 10:46:14', NULL),
(599, 'pupun yuliandari', 'RM01979', '2018-03-08', '0000000000000', 0, 'kp. rawa kidang rt03/02 sepatan', 1411, '2018-03-27 10:47:52', NULL),
(600, 'usnayah', 'RM01980', '2018-03-08', '0000000000000', 0, 'lembang sari rt04/08', 1411, '2018-03-27 10:48:53', NULL),
(601, 'aan suryani', 'RM01981', '2018-03-08', '0000000000000', 0, 'puri rajeg g1 n0.9', 1411, '2018-03-27 10:50:00', NULL),
(602, 'mutia', 'RM01982', '2018-03-08', '0000000000000', 0, 'm.20', 1411, '2018-03-27 10:50:45', NULL),
(603, 'deby hafillda', 'RM01983', '2018-03-08', '0000000000000', 0, 'kp. terlti rt06/04', 1411, '2018-03-27 10:53:23', NULL),
(604, 'rosida', 'RM01984', '2018-03-08', '0000000000000', 0, 'cluster duta asri blok a-18', 1411, '2018-03-27 10:54:30', NULL),
(605, 'sumlati', 'RM01985', '2018-03-08', '0000000000000', 0, 'ds. lebak wangi rt06/08', 1411, '2018-03-27 10:55:36', NULL),
(606, 'anita yuliana', 'RM01986', '2018-03-08', '0000000000000', 0, 'jl. arjuna 2 c4/12 b.as', 1411, '2018-03-27 10:56:46', NULL),
(607, 'bintara kamajaya', 'RM01987', '2018-03-08', '0000000000000', 0, 'kp. pangadakan encle rt05/01', 1411, '2018-03-27 10:58:03', NULL),
(608, 'usnawati', 'RM01989', '2018-03-08', '0000000000000', 0, 'griya puri sukani', 1411, '2018-03-27 11:08:57', NULL),
(609, 'mery aprianti', 'RM01990', '2018-03-08', '0000000000000', 0, 'kp. pisangan periuk', 1411, '2018-03-27 11:27:52', NULL),
(610, 'Tedi Susanto', '01234', '2018-08-01', '089603786637', 1, 'jl, studio alam rt 01 rw 02 no 35', 1411, '2018-02-09 01:01:49', NULL),
(612, 'Pasien2', 'RM24122', '1997-10-15', '089667571233', 1, 'Alamat Lengkap Kurang tau', 1411, '2018-03-26 16:34:36', NULL),
(613, 'Tn Rizky Dwi P', 'RM00001', '2018-03-01', '0000000000000', 1, 'Jl Gunung Agung B15/18', 1411, '2018-03-27 00:04:29', NULL),
(614, 'Nn Rofiqoh', 'RM00002', '1999-03-01', '0000000000000', 0, 'Villa Permata PS', 1411, '2018-03-27 00:06:07', NULL),
(615, 'Nn Rizki', 'RM00003', '2000-03-01', '0000000000000', 0, 'Jl Kencana Timur 4 VTB 2', 1411, '2018-03-27 00:07:35', NULL),
(616, 'Nn Dedi', 'RM00004', '1995-03-01', '0000000000000', 0, 'Kp Bunder Rt 09/06', 1411, '2018-03-27 00:09:13', NULL),
(617, 'Nn Mila Atriawati', 'RM00005', '2000-03-01', '0000000000000', 0, 'Kp Pasilen Lama', 1411, '2018-03-27 00:10:13', NULL),
(618, 'Nn Siti Yuliana', 'RM00006', '1999-03-01', '0000000000000', 0, 'Kp Sukadiri, Kronjo', 1411, '2018-03-27 00:11:17', NULL),
(619, 'Ny Noviana', 'RM00007', '1992-03-01', '0000000000000', 0, 'Jl Kp Bayur Kali', 1411, '2018-03-27 00:12:39', NULL),
(620, 'Nn Desti Eli Triyani', 'RM00008', '1999-03-01', '0000000000000', 0, 'Jl Perum Taman Buah 1', 1411, '2018-03-27 00:13:55', NULL),
(621, 'Nn Dila', 'RM00009', '1999-01-01', '0000000000000', 0, 'Bumi Asri Rt 06/14', 1411, '2018-03-27 00:15:02', NULL),
(622, 'Nn Resti', 'RM00010', '1998-03-01', '0000000000000', 0, 'Kp Benda Lebak Wangi', 1411, '2018-03-27 00:17:55', NULL),
(623, 'Ny Haeroh', 'RM00011', '1972-03-01', '0000000000000', 0, 'Kp Karet Teriti Rt 02/04', 1411, '2018-03-27 00:19:06', NULL),
(624, 'Nn Zakiyah', 'RM00012', '1995-03-01', '0000000000000', 0, 'Jl Jati 4 E6/27 PR', 1411, '2018-03-27 00:20:37', NULL),
(625, 'Nn Eni', 'RM00013', '1994-03-01', '0000000000000', 0, 'Jl Beringin 1 PR', 1411, '2018-03-27 00:21:34', NULL),
(626, 'Nn Sarah', 'RM00014', '2000-03-01', '0000000000000', 0, 'Bumi Asri E11/20', 1411, '2018-03-27 00:43:40', NULL),
(627, 'Nn Astri', 'RM00015', '1999-03-01', '0000000000000', 0, 'Rajeg, Kp Kukun 1', 1411, '2018-03-27 00:44:44', NULL),
(628, 'Ny Heni', 'RM00016', '1983-03-01', '0000000000000', 0, 'Poris', 1411, '2018-03-27 00:46:21', NULL),
(629, 'Nn Elsa', 'RM00017', '1995-03-01', '0000000000000', 0, 'Jl Cana 1 No 14', 1411, '2018-03-27 00:48:48', NULL),
(630, 'Ny Nike', 'RM00018', '1972-03-01', '0000000000000', 0, 'Jl Cana 1 No 14', 1411, '2018-03-27 00:50:18', NULL),
(631, 'Nn Eva', 'RM00019', '2000-03-01', '0000000000000', 0, 'Kp Tuwis, Paku Haji Rt 09/04', 1411, '2018-03-27 00:51:29', NULL),
(632, 'Nn Siska', 'RM00020', '2000-03-01', '0000000000000', 0, 'Jl Oskar 1', 1411, '2018-03-27 00:52:21', NULL),
(633, 'Nn Puput', 'RM00021', '2000-03-01', '0000000000000', 0, 'Jl Angsana 4', 1411, '2018-03-27 00:53:06', NULL),
(634, 'Ny Elida Tambo', 'RM00022', '2000-03-01', '0000000000000', 0, 'Regency 2', 1411, '2018-03-27 00:53:53', NULL),
(635, 'Ny Neneng', 'RM00023', '2000-03-01', '0000000000000', 0, 'Paku Haji Rt 01/01', 1411, '2018-03-27 00:59:15', NULL),
(636, 'Ny Wulan', 'RM00024', '2000-03-01', '0000000000000', 0, 'Paku Haji Rt 01/01', 1411, '2018-03-27 00:59:55', NULL),
(637, 'Nn Agnes', 'RM00025', '2000-03-01', '0000000000000', 0, 'Regency 1 OA2/24', 1411, '2018-03-27 01:00:56', NULL),
(638, 'Ny Neneng', 'RM00026', '2000-03-01', '0000000000000', 0, 'Mekar Kondang Rt 03/02', 1411, '2018-03-27 01:01:47', NULL),
(639, 'Ny Ratna', 'RM00027', '2000-03-01', '0000000000000', 0, 'Rajeg Asli Rt 16/02', 1411, '2018-03-27 01:02:46', NULL),
(640, 'Ny Fathir', 'RM00028', '2000-03-01', '0000000000000', 0, 'Rajeg Asli A4A/3', 1411, '2018-03-27 01:03:44', NULL),
(641, 'Nn Nia', 'RM00029', '2000-03-01', '0000000000000', 0, 'Jl Merak 2 No 11 PS', 1411, '2018-03-27 01:05:01', NULL),
(642, 'Tn Gilang S', 'RM00030', '2001-03-01', '0000000000000', 1, 'Kp Cengkareng Kp 1/11', 1411, '2018-03-27 01:06:30', NULL),
(643, 'Nn Susan', 'RM00031', '1994-03-01', '0000000000000', 0, 'Cimone', 1411, '2018-03-27 01:07:31', NULL),
(644, 'Ny Lidya Asmawarni', 'RM00032', '2000-03-01', '0000000000000', 0, 'Jl Galunggung B13/13 TKB', 1411, '2018-03-27 01:08:36', NULL),
(645, 'Nn Uyun', 'RM00033', '2000-03-01', '0000000000000', 0, 'Kp geruguk, Mekar Jaya, Sepatan', 1411, '2018-03-27 01:09:48', NULL),
(646, 'Nn Sela', 'RM00034', '2000-03-01', '0000000000000', 0, 'Jl Rambutan C3/46 Bumi Asri', 1411, '2018-03-27 01:10:42', NULL),
(647, 'Nn Yani', 'RM00035', '2000-03-01', '0000000000000', 0, 'Jl Oskar 3/13 PP', 1411, '2018-03-27 01:12:10', NULL),
(648, 'Nn Sari', 'RM00036', '2000-03-01', '0000000000000', 0, 'Jl Oskar 3 No 13 PP', 1411, '2018-03-27 01:13:03', NULL),
(649, 'Nn Lia', 'RM00037', '2000-03-01', '0000000000000', 0, 'Jl oskar 3 No 13 PP', 1411, '2018-03-27 01:14:00', NULL),
(650, 'Nn Devi', 'RM00038', '2000-03-01', '0000000000000', 0, 'Jl Palma 4 No 13 PR', 1411, '2018-03-27 01:15:00', NULL),
(651, 'Ny Nurul', 'RM00039', '2000-03-01', '0000000000000', 0, 'Pd Arum C3/15', 1411, '2018-03-27 01:15:51', NULL),
(652, 'Nn Putri', 'RM00040', '2000-03-01', '0000000000000', 0, 'Pd Arum C3/15', 1411, '2018-03-27 01:16:49', NULL),
(653, 'Ny Yosi', 'RM00041', '2000-03-01', '0000000000000', 0, 'Jati 2/17 PR', 1411, '2018-03-27 01:17:35', NULL),
(654, 'Ny Helmy', 'RM00042', '2000-03-01', '0000000000000', 0, 'Marga Mulya', 1411, '2018-03-27 01:18:14', NULL),
(655, 'Tn Erdison', 'RM00043', '2000-03-01', '0000000000000', 1, 'Jl Cana 3/19', 1411, '2018-03-27 01:19:07', NULL),
(656, 'Nn Nurning', 'RM00044', '2000-03-01', '0000000000000', 0, 'Jl kurma 1/4', 1411, '2018-03-27 01:20:04', NULL),
(657, 'Ny Heru', 'RM00045', '2018-03-01', '0000000000000', 0, 'Jati Mauk Rt 03/02', 1411, '2018-03-27 01:21:06', NULL),
(658, 'Nn Tuti', 'RM00046', '2018-03-01', '0000000000000', 0, 'Taman Cibodas Perum Duta Asri', 1411, '2018-03-27 01:21:59', NULL),
(659, 'Ibu Tedi', 'RM00047', '2018-03-01', '0000000000000', 0, 'Cisoka, Tigaraksa', 1411, '2018-03-27 01:22:54', NULL),
(660, 'Tn Rizky', 'RM00048', '2018-03-01', '0000000000000', 1, 'Villa Regency 1 K6/20', 1411, '2018-03-27 01:23:58', NULL),
(661, 'Nn Ana', 'RM00049', '2018-03-01', '0000000000000', 0, 'Villa Regency 2 FD7/11A', 1411, '2018-03-27 02:04:58', NULL),
(662, 'Ny Munajah', 'RM00050', '2018-03-01', '0000000000000', 0, 'Ketapang, Maul', 1411, '2018-03-27 02:05:36', NULL),
(663, 'Nn Nita', 'RM00051', '2018-03-01', '0000000000000', 0, 'Jl Matahari A3/25', 1411, '2018-03-27 02:06:17', NULL),
(664, 'Ny Endah', 'RM00052', '2018-03-01', '0000000000000', 0, 'Mauk Barat', 1411, '2018-03-27 02:13:12', NULL),
(665, 'Ny Asmiati', 'RM00053', '2018-03-01', '0000000000000', 0, 'Jl Perkutut 2 No 5 PS', 1411, '2018-03-27 02:13:56', NULL),
(666, 'Nn Dini', 'RM00054', '2018-03-01', '0000000000000', 0, 'TKP 1 A3/28', 1411, '2018-03-27 02:14:41', NULL),
(667, 'Nn Vera', 'RM00055', '2018-03-01', '0000000000000', 0, 'Gg Gigi, Jatiuwung', 1411, '2018-03-27 02:15:25', NULL),
(668, 'Nn Talia', 'RM00056', '2018-03-01', '0000000000000', 0, 'Jl Merpati 3 No 1 PS', 1411, '2018-03-27 02:16:10', NULL),
(669, 'Nn Rosita', 'RM00057', '2018-03-01', '0000000000000', 0, 'Taman Royal 1 Cipondoh', 1411, '2018-03-27 02:16:53', NULL),
(670, 'Ny Suci', 'RM00058', '2018-03-01', '0000000000000', 0, 'Puri Pasundan 2 D24', 1411, '2018-03-27 02:17:37', NULL),
(671, 'Ny Iyah', 'RM00059', '2018-03-01', '0000000000000', 0, 'Bumi Asri Kurma 6 E11/22', 1411, '2018-03-27 02:18:47', NULL),
(672, 'Tn Arif', 'RM00060', '2018-03-01', '0000000000000', 0, 'Taman Royal 1 Cipondoh', 1411, '2018-03-27 02:19:40', NULL),
(673, 'Ny Wanty', 'RM00061', '2018-03-01', '0000000000000', 0, 'TKP 1 A3/28', 1411, '2018-03-27 02:20:40', NULL),
(674, 'Ny Lia', 'RM00062', '2018-03-01', '0000000000000', 0, 'Jl Beo Raya No 21 PS', 1411, '2018-03-27 02:22:55', NULL),
(675, 'Nn Violita', 'RM00063', '2018-03-01', '0000000000000', 0, 'P Bukit Tiara F1/37', 1411, '2018-03-27 02:24:05', NULL),
(676, 'Nn Desy', 'RM00064', '2018-03-01', '0000000000000', 0, 'Teriti Rt 06/04', 1411, '2018-03-27 02:24:58', NULL),
(677, 'Nn Ratin', 'RM00065', '2018-03-01', '0000000000000', 0, 'Jl Serayu 1 No 8', 1411, '2018-03-27 02:25:56', NULL),
(678, 'Tn Akil', 'RM00066', '2018-03-01', '0000000000000', 1, 'Jl Delima 3 No 6 PM', 1411, '2018-03-27 02:27:35', NULL),
(679, 'Nn Tumiyati', 'RM00067', '2018-03-01', '0000000000000', 0, 'Perum kedaung Rt 05/06', 1411, '2018-03-27 02:29:32', NULL),
(680, 'Nn Ilmi', 'RM00068', '2018-06-01', '0000000000000', 0, 'Total Persada Raya', 1411, '2018-03-27 02:30:19', NULL),
(681, 'Nn Agnes', 'RM00069', '2018-03-01', '0000000000000', 0, 'Jl Kurma 9 No 15', 1411, '2018-03-27 02:31:01', NULL),
(682, 'Nn Yani', 'RM00070', '2018-03-01', '0000000000000', 0, 'Perum Kedaung Rt 05/07', 1411, '2018-03-27 02:31:48', NULL),
(683, 'Ny Aliya', 'RM00071', '2018-03-01', '0000000000000', 0, 'Karet Rt 02/03', 1411, '2018-03-27 02:32:43', NULL),
(684, 'Ny Een', 'RM00072', '2018-03-01', '0000000000000', 0, 'Pisangan Kayu Agung Rt 01/02', 1411, '2018-03-27 02:34:09', NULL),
(685, 'Nn Agustina', 'RM00073', '2018-03-01', '0000000000000', 0, 'Purati Wisma Harapan C1/90', 1411, '2018-03-27 02:36:18', NULL),
(686, 'Nn Dini', 'RM00074', '2018-03-01', '0000000000000', 0, 'Perum Bumi Asri E11/32', 1411, '2018-03-27 02:37:08', NULL),
(687, 'Ny Hanny', 'RM00075', '2018-03-01', '0000000000000', 0, 'Sangiang', 1411, '2018-03-27 02:39:33', NULL),
(688, 'Ny Kokom', 'RM00076', '2018-03-01', '0000000000000', 0, 'Gintung, Sepatan', 1411, '2018-03-27 02:40:28', NULL),
(689, 'Ny Tati', 'RM00077', '2018-03-01', '0000000000000', 0, 'Gintung, Sepatan', 1411, '2018-03-27 02:41:22', NULL),
(690, 'Nn Rosna', 'RM00078', '2018-03-01', '0000000000000', 0, 'Tapang Mauk', 1411, '2018-03-27 02:42:32', NULL),
(691, 'Nn erna', 'RM00079', '2018-03-01', '0000000000000', 0, 'Pisangan 1', 1411, '2018-03-27 02:43:14', NULL),
(692, 'Nn Iswana', 'RM00080', '2018-03-01', '0000000000000', 0, 'Paku Haji', 1411, '2018-03-27 02:43:53', NULL),
(693, 'Ny Ila', 'RM00081', '2018-03-01', '0000000000000', 0, 'Jl Palma 2 PR', 1411, '2018-03-27 02:44:31', NULL),
(694, 'Nn Eva Nur Falah', 'RM00082', '2018-03-01', '0000000000000', 0, 'Kp Nanggul', 1411, '2018-03-27 02:49:30', NULL),
(695, 'Nn Novianti', 'RM00083', '2018-03-01', '0000000000000', 0, 'Kp Sangiang, Jl Prabu Kiansantang', 1411, '2018-03-27 02:51:13', NULL),
(696, 'Nn Laras', 'RM00084', '2018-03-01', '0000000000000', 0, 'Griya Merpati Mas C/39', 1411, '2018-03-27 02:51:58', NULL),
(697, 'Ny Fanin Farina', 'RM00085', '2018-03-01', '0000000000000', 0, 'Permata Icon C8/11', 1411, '2018-03-27 02:52:43', NULL),
(698, 'Nn Risty Silvias', 'RM00086', '2018-03-01', '0000000000000', 0, 'Kp Gebang Raya, Prabu Kiansantang', 1411, '2018-03-27 02:53:36', NULL),
(699, 'Ny Dedeh', 'RM00087', '2018-03-01', '0000000000000', 0, 'Jl Pengadilan Raya D6/4', 1411, '2018-03-27 02:54:42', NULL),
(700, 'Ny Yuliah', 'RM00088', '2018-03-01', '0000000000000', 0, 'Tomang Baru 2 Rt 06/01', 1411, '2018-03-27 02:55:29', NULL),
(701, 'Nn Eva', 'RM00089', '2018-03-01', '081213909357', 0, 'Tangerang', 1411, '2018-03-27 02:57:20', NULL),
(702, 'Nn Mazzela', 'RM00090', '2018-03-01', '0000000000000', 0, 'Jl Arwana 4 PP', 1411, '2018-03-27 02:58:12', NULL),
(703, 'Nn Fiki Carolina', 'RM00091', '2018-03-01', '0000000000000', 0, 'P Bumi Pasar kemis Indah', 1411, '2018-03-27 02:59:24', NULL),
(704, 'Ny Teti Ningsih', 'RM00092', '2018-03-01', '0000000000000', 0, 'Jl Suka Mulya 3 No 20', 1411, '2018-03-27 03:00:07', NULL),
(705, 'Nn Febriana Suci', 'RM00093', '2018-03-01', '0000000000000', 0, 'Kukun permata Rajeg', 1411, '2018-03-27 03:01:27', NULL),
(706, 'Ny Eli Kusrini', 'RM00094', '2018-03-01', '0000000000000', 0, 'Taman Walet Blok 8/17', 1411, '2018-03-27 03:02:20', NULL),
(707, 'Ny Hj Haeriah', 'RM00095', '2018-03-01', '0000000000000', 0, 'Pasar Paku Haji', 1411, '2018-03-27 03:04:06', NULL),
(708, 'Nn Devi', 'RM00096', '2018-03-01', '0000000000000', 0, 'Permata regency FE8/46', 1411, '2018-03-27 03:04:59', NULL),
(709, 'Nn Finin Farina', 'RM00097', '2018-03-01', '0000000000000', 0, 'Jl Rajawali 4 No 14', 1411, '2018-03-27 03:05:47', NULL),
(710, 'Ny Waljiyanti', 'RM00098', '2018-03-01', '0000000000000', 0, 'Bumi Asri Jl. rambutan 3', 1411, '2018-03-27 03:06:40', NULL),
(711, 'Nn Sitiar Murjiha', 'RM00099', '2018-03-01', '0000000000000', 0, 'Jati Mauk rt 015/04', 1411, '2018-03-27 03:07:48', NULL),
(712, 'Ny Umah Yati', 'RM00100', '2018-03-01', '0000000000000', 0, 'Jati Mauk Rt 015/04', 1411, '2018-03-27 03:08:38', NULL),
(713, 'Nn Learni', 'RM00101', '2018-03-01', '0000000000000', 0, 'Sangiang, Periuk', 1411, '2018-03-27 03:09:11', NULL),
(714, 'Ny Sri Utati', 'RM00102', '2018-03-01', '0000000000000', 0, 'Perum Suka Tani Rt 01/03 Rajeg', 1411, '2018-03-27 03:10:07', NULL),
(715, 'Ny Norma Aliansyah', 'RM00103', '2018-03-01', '0000000000000', 0, 'Jl pepaya 2 No 9 PM', 1411, '2018-03-27 03:11:15', NULL),
(716, 'Nn Paulina', 'RM00104', '2018-03-01', '0000000000000', 0, 'Duta Asri Cadas', 1411, '2018-03-27 03:11:58', NULL),
(717, 'Nn Dian Rohmawati', 'RM00105', '2018-03-01', '0000000000000', 0, 'Jl FLamboyan 2 F19/5 PI', 1411, '2018-03-27 03:12:48', NULL),
(718, 'Nn Sagita Putri', 'RM00106', '2018-03-01', '0000000000000', 0, 'Jl Cumi-cumi No 18 Blok C1 PP', 1411, '2018-03-27 03:13:44', NULL),
(719, 'Nn Nurul Eka Wulandari', 'RM00107', '2018-03-01', '0000000000000', 0, 'VTB 2 A4 No 16', 1411, '2018-03-27 03:15:21', NULL),
(720, 'Ny Lenny Apriliani', 'RM00108', '2018-03-01', '0000000000000', 1, 'GBA Teriti A No 12 A, Karet', 1411, '2018-03-27 03:16:42', NULL),
(721, 'Nn Intan Aka K', 'RM00109', '2018-03-01', '0000000000000', 0, 'Perum Permata Rajeg rt 01/09', 1411, '2018-03-27 03:17:35', NULL),
(722, 'Tn Samsul', 'RM00110', '2018-03-01', '0000000000000', 0, 'Kp Geruduk Rt 02/06', 1411, '2018-03-27 03:18:21', NULL),
(723, 'Nn Lina', 'RM00111', '2018-03-01', '0000000000000', 0, 'Perum Permata rajeg rt 01/09', 1411, '2018-03-27 03:19:37', NULL),
(724, 'Nn Dara', 'RM00112', '2018-03-01', '0000000000000', 0, 'Kp Lebak Rt 03/02', 1411, '2018-03-27 03:20:18', NULL),
(725, 'Nn Desi', 'RM00113', '2018-03-01', '0000000000000', 0, 'Pasar Baru, Jl Ks Subun gg Bahagia', 1411, '2018-03-27 03:21:31', NULL),
(726, 'Tn Adityo Kusuma', 'RM00114', '2018-03-01', '0000000000000', 1, 'Taman Hj Longgar Blok 1/6', 1411, '2018-03-27 03:22:34', NULL),
(727, 'Tn Teodore Leonardo', 'RM00115', '2018-03-01', '0000000000000', 1, 'Viila regency 2 Blok AB1/11', 1411, '2018-03-27 03:23:43', NULL),
(728, 'Ny Nia', 'RM00116', '2018-03-01', '0000000000000', 0, 'Banyu Asih Rt 03/01 no 26', 1411, '2018-03-27 03:25:38', NULL),
(729, 'Nn Dewi Aulia', 'RM00117', '2018-03-01', '0000000000000', 0, 'Jl Palma 3 no 10 PR', 1411, '2018-03-27 03:26:26', NULL),
(730, 'Nn Lia Hayatuddiniyah', 'RM00118', '2018-03-01', '0000000000000', 0, 'Kp Buaran Jati No 131', 1411, '2018-03-27 03:27:55', NULL),
(731, 'Nn Sandra Jeni Artika', 'RM00119', '2018-03-01', '0000000000000', 0, 'Desa Lebak Wangi Rt 03/10', 1411, '2018-03-27 03:29:04', NULL),
(732, 'Nn Lina Maria', 'RM00120', '2018-05-01', '0000000000000', 0, 'Perum 4 Jl Yudiana Karawaci', 1411, '2018-03-27 03:29:58', NULL),
(733, 'Nn Winda Widyati', 'RM00121', '2018-03-01', '0000000000000', 0, 'Kp Baru Koang Jaya Rt 01/05', 1411, '2018-03-27 03:31:00', NULL),
(734, 'Nn Rini Dwi Novianti', 'RM00122', '2018-03-01', '0000000000000', 0, 'GMP 3 Jl Jeruk No 3', 1411, '2018-03-27 03:50:31', NULL),
(735, 'Nn Putri Islamiyah', 'RM00123', '2018-03-01', '0000000000000', 0, 'Kp Jembatan Merah Rt 5/3', 1411, '2018-03-27 03:51:27', NULL),
(736, 'Ny Sofianti', 'RM00124', '2018-03-01', '0000000000000', 0, 'Mauk', 1411, '2018-03-27 03:51:59', NULL),
(737, 'Nn Wirda F', 'RM00125', '2018-03-01', '0000000000000', 0, 'Mauk', 1411, '2018-03-27 03:52:37', NULL),
(738, 'Nn Dewi Intan', 'RM00126', '2018-03-01', '0000000000000', 0, 'Total Persada raya Blok A6', 1411, '2018-03-27 03:53:45', NULL),
(739, 'Ny Suminten', 'RM00127', '2018-03-01', '0000000000000', 0, 'Jl Cana 1 No 5/41 Pondok Indah', 1411, '2018-03-27 03:54:32', NULL),
(740, 'Nn Fitri Wulandari', 'RM00128', '2018-03-01', '0000000000000', 0, 'Wisma Mas No 25 Pakem', 1411, '2018-03-27 03:55:25', NULL),
(741, 'Nn Devi Dilfra S', 'RM00129', '2018-03-01', '0000000000000', 0, 'Kp Buaran Mangga Rt 01/02', 1411, '2018-03-27 03:56:29', NULL),
(742, 'Ny Ami Lestari', 'RM00130', '2018-03-01', '0000000000000', 0, 'Kp Panjang Baru Rt 06/04', 1411, '2018-03-27 03:57:26', NULL),
(743, 'Ny Sri Hariyanti', 'RM00131', '2018-03-01', '0000000000000', 0, 'Jl Kp Cilongok, Ps Kemis', 1411, '2018-03-27 03:58:08', NULL),
(744, 'Tn Wawan', 'RM00132', '2018-03-01', '0000000000000', 1, 'Jl Taman Buah 2  BC 4 No 7', 1411, '2018-03-27 03:58:55', NULL),
(745, 'Nn Lika Asih P', 'RM00133', '2018-03-01', '0000000000000', 0, 'Jl Kurma 3 Blok E7 No 9', 1411, '2018-03-27 03:59:49', NULL),
(746, 'Ny Ita', 'RM00134', '2018-03-01', '0000000000000', 0, 'TKB D9/30 Jl Merkurius 4', 1411, '2018-03-27 04:01:02', NULL),
(747, 'Nny Susilawati', 'RM00135', '2018-03-01', '0000000000000', 0, 'Bumi Indah 1 EA22', 1411, '2018-03-27 04:01:43', NULL),
(748, 'Nn Neneng Kurniasih', 'RM00136', '2018-03-01', '0000000000000', 0, 'Kp Baru Rt 001/05', 1411, '2018-03-27 04:02:43', NULL),
(749, 'Nn Sulastri', 'RM00137', '2018-03-01', '0000000000000', 0, 'KP Babulah Rt 003/002 Mauk', 1411, '2018-03-27 04:03:47', NULL),
(750, 'Nn Intan Tamba', 'RM00138', '2018-03-01', '0000000000000', 0, 'Regency 2 FB 4 No 6', 1411, '2018-03-27 04:04:43', NULL),
(751, 'Tn Wilson Tamba', 'RM00139', '2018-03-01', '0000000000000', 1, 'Regency 2 FB 4 No 6', 1411, '2018-03-27 04:05:28', NULL),
(752, 'Ny Latifa', 'RM00140', '2018-03-01', '0000000000000', 0, 'Jl Srikandi F3/3 Benua Indah', 1411, '2018-03-27 04:06:44', NULL),
(753, 'Nn Imas Supi Ayu', 'RM00141', '2018-03-01', '0000000000000', 0, 'Kp Leles Rt 03/05', 1411, '2018-03-27 04:08:23', NULL),
(754, 'Ny Weny', 'RM00142', '2018-03-01', '0000000000000', 0, 'Permata Tangerang CB 2/27', 1411, '2018-03-27 04:09:09', NULL),
(755, 'Nn Khusnul Khatimah', 'RM00143', '2018-03-01', '0000000000000', 0, 'Rawa Kidang, Sukadiri', 1411, '2018-03-27 04:11:38', NULL),
(756, 'Ny Sulastri', 'RM00144', '2018-03-01', '0000000000000', 0, 'Sepatan', 1411, '2018-03-27 04:12:29', NULL),
(757, 'Ny Eko Winarti', 'RM00145', '2018-03-01', '0000000000000', 0, 'Jl Nusa Indah 4 Rt 4/11', 1411, '2018-03-27 04:17:34', NULL),
(758, 'Nn Widia Rulian', 'RM00146', '2018-03-01', '0000000000000', 0, 'Kota Bumi 5', 1411, '2018-03-27 04:18:28', NULL),
(759, 'Nn Siti Baedilah', 'RM00147', '2018-03-01', '0000000000000', 0, 'Kp Rawa Kidang', 1411, '2018-03-27 04:19:44', NULL),
(760, 'Ny Leliyah', 'RM00148', '2018-03-01', '0000000000000', 0, 'Kp Pisangan rt 004/04', 1411, '2018-03-27 04:20:38', NULL),
(761, 'Nn Ro\'ida Oktaviani', 'RM00149', '2018-03-01', '0000000000000', 0, 'Pabuaran tumpeng', 1411, '2018-03-27 04:22:01', NULL),
(762, 'Ny Sukriyah', 'RM00150', '2018-03-01', '0000000000000', 0, 'Ds Rawa Kidang Rt 04/02', 1411, '2018-03-27 04:22:48', NULL),
(763, 'Nn Sariyah', 'RM00151', '2018-03-01', '0000000000000', 0, 'Desa Banyu Asih Rt 09/02', 1411, '2018-03-27 04:23:38', NULL),
(764, 'Nn Halimah', 'RM00153', '2018-03-01', '0000000000000', 0, 'Kp Cambai, Sukatani, Rt 01/07 Rajeg', 1411, '2018-03-27 04:24:53', NULL),
(765, 'Ny Rokiyah Wati', 'RM00154', '2018-03-01', '0000000000000', 0, 'Perum Gelora Mustika No A3 Rt 03/09', 1411, '2018-03-27 04:30:17', NULL),
(766, 'Nn Dewi Puspita Sari', 'RM00155', '2018-03-01', '0000000000000', 0, 'Kp Gerudug Rt 001/004', 1411, '2018-03-27 04:31:48', NULL),
(767, 'Nn Nauzia', 'RM00156', '2018-03-01', '0000000000000', 0, 'Jl Delima 3 No 13 PM', 1411, '2018-03-27 04:32:54', NULL),
(768, 'Tn Hafif Nugroho', 'RM00157', '2018-03-01', '0000000000000', 1, 'Jl Murai 3  NO 9 Rt 13/10 PP', 1411, '2018-03-27 04:34:06', NULL),
(769, 'Nn halimah', 'RM00158', '2018-03-01', '0000000000000', 0, 'Perumnas 2 Tangerang, jl Empu  Barda 4', 1411, '2018-03-27 04:35:05', NULL),
(770, 'Nn Eni Setia Resih', 'RM00159', '2018-03-01', '0000000000000', 0, 'Jl tenggiri 3 Rt 010/003 PP', 1411, '2018-03-27 04:36:19', NULL),
(771, 'Nn Eka Budiyanti', 'RM00160', '2018-03-01', '0000000000000', 0, 'Jl Raya Sepatan', 1411, '2018-03-27 04:37:10', NULL),
(772, 'Nn Iip Mulipah', 'RM00161', '2018-03-01', '0000000000000', 0, 'Lontar Kronjo Rt 008/09', 1411, '2018-03-27 04:39:07', NULL),
(773, 'Ny Irma', 'RM00162', '2018-03-01', '0000000000000', 0, 'Kukun Rt 01/09', 1411, '2018-03-27 04:40:20', NULL),
(774, 'Ny Damayanti', 'RM00163', '2018-03-01', '0000000000000', 0, 'Jl Jeruk 1 No 4 P Makmur', 1411, '2018-03-27 04:41:09', NULL),
(775, 'Ny Iis Rosita', 'RM00164', '2018-03-01', '0000000000000', 0, 'Ds Sepatan Rt 04/03', 1411, '2018-03-27 04:41:58', NULL),
(776, 'Tn Albi', 'RM00165', '2018-03-01', '0000000000000', 1, 'Regency 2 F6/11', 1411, '2018-03-27 04:42:56', NULL),
(777, 'Nn Dian Vidiani', 'RM00166', '2018-03-01', '0000000000000', 0, 'Taman Buah C8/10', 1411, '2018-03-27 04:43:46', NULL),
(778, 'Nn Betty', 'RM00167', '2018-03-01', '0000000000000', 0, 'Total Persada Jl Aceh No 22', 1411, '2018-03-27 04:44:44', NULL),
(779, 'Ny Yuli', 'RM00168', '2018-03-01', '0000000000000', 0, 'Rajeg Kauling Rt 04/03', 1411, '2018-03-27 04:45:54', NULL),
(780, 'Ny Zulfa', 'RM00169', '2018-03-01', '0000000000000', 0, 'Gambor Pasir Jaya Rt 04/05', 1411, '2018-03-27 04:47:03', NULL),
(781, 'Nn Riga Nursyanasari', 'RM00170', '2018-03-01', '0000000000000', 0, 'Karang Anyar rt 03/02', 1411, '2018-03-27 04:48:05', NULL),
(782, 'Ny Chacha', 'RM00171', '2018-03-01', '0000000000000', 0, 'Teriti', 1411, '2018-03-27 04:48:41', NULL),
(783, 'Nn Fika Robiatul I', 'RM00172', '2018-03-01', '0000000000000', 0, 'Gelam Jaya rt 04/01', 1411, '2018-03-27 04:49:45', NULL),
(784, 'Ny Deni', 'RM00173', '2018-03-01', '0000000000000', 0, 'VTE B25/11A', 1411, '2018-03-27 04:50:52', NULL),
(785, 'Nn Rafika', 'RM00174', '2018-03-01', '0000000000000', 0, 'Taman Walet SE3 No 16', 1411, '2018-03-27 04:51:48', NULL),
(786, 'Ny Anastasia', 'RM00175', '2018-03-01', '0000000000000', 0, 'Jl Cendana 4 No 12A P Rezeki', 1411, '2018-03-27 05:16:18', NULL),
(787, 'Nn Siska', 'RM00176', '2018-03-01', '0000000000000', 0, 'Kp Cituis Desa Surya Bahari Rt 02/01', 1411, '2018-03-27 05:17:20', NULL),
(788, 'Nn Sulistia', 'RM00177', '2018-03-01', '0000000000000', 0, 'Jl Melati 5 Rt 01/03 Tanah Tinggi', 1411, '2018-03-27 05:18:16', NULL),
(789, 'Ny Siti Maryati', 'RM00178', '2018-03-01', '0000000000000', 0, 'Paku Haji rt 01/01', 1411, '2018-03-27 05:19:06', NULL),
(790, 'Nn Nike Febrianti', 'RM00179', '2018-03-01', '0000000000000', 0, 'Taman Buah Sukamantri', 1411, '2018-03-27 05:19:58', NULL),
(791, 'Nn Dita Deviana', 'RM00180', '2018-03-01', '0000000000000', 0, 'Wisma Harapan Rt 02/05', 1411, '2018-03-27 05:21:02', NULL),
(792, 'Nn Een Ernawati', 'RM00181', '2018-03-01', '0000000000000', 0, 'Desa Jati Waringin Rt 03/08', 1411, '2018-03-27 05:22:02', NULL),
(793, 'Nn Enggar Lilian', 'RM00182', '2018-03-01', '0000000000000', 0, 'Jl Jati 2 No 1 Rt 07/06', 1411, '2018-03-27 05:22:59', NULL),
(794, 'Ny Nurlian', 'RM00183', '2018-03-01', '0000000000000', 0, 'Jl Arya Kemuning Km 2 No 9', 1411, '2018-03-27 05:23:59', NULL),
(795, 'Tn Marvin Savero T', 'RM00184', '2018-03-01', '0000000000000', 1, 'Taman Kotabumi D17/3', 1411, '2018-03-27 05:24:50', NULL),
(796, 'Nn Ebi Serli', 'RM00185', '2018-03-01', '0000000000000', 0, 'Kp Doyong', 1411, '2018-03-27 05:26:14', NULL),
(797, 'Ny Dewi S', 'RM00186', '2018-03-01', '0000000000000', 0, 'Taman Kota Bumi Blok D No 16', 1411, '2018-03-27 05:27:05', NULL),
(798, 'Nn Novi Hastari', 'RM00187', '2018-03-01', '0000000000000', 0, 'Kp Gludug', 1411, '2018-03-27 05:27:52', NULL),
(799, 'Nn Eka Septiawati', 'RM00188', '2018-03-01', '0000000000000', 0, 'Jl Raya Rajeg Rt 05/5', 1411, '2018-03-27 05:28:48', NULL),
(800, 'Ny Muninggar', 'RM00189', '2018-03-01', '0000000000000', 0, 'Tangerang Elok Blok D5/8', 1411, '2018-03-27 05:30:11', NULL),
(801, 'Ny Eliyati', 'RM00190', '2018-03-01', '0000000000000', 0, 'Jl Piranha 2 No 7 PP', 1411, '2018-03-27 05:31:11', NULL),
(802, 'Ny Oni Astuti', 'RM00191', '2018-03-01', '0000000000000', 0, 'Mustika Blok C34/20 Tigaraksa', 1411, '2018-03-27 05:32:10', NULL),
(803, 'Nn Rika Apriani', 'RM00192', '2018-03-01', '0000000000000', 0, 'Jl Bukit Dansa C9/8', 1411, '2018-03-27 05:33:13', NULL),
(804, 'Nn Dian Anggraini', 'RM00193', '2018-03-01', '0000000000000', 0, 'Kp Lebak rt 03/02', 1411, '2018-03-27 05:34:06', NULL),
(805, 'Ny Dian Mardiana', 'RM00194', '2018-03-01', '0000000000000', 0, 'Kp Cadas Rt 03/09', 1411, '2018-03-27 05:34:57', NULL),
(806, 'Tn Kresna', 'RM00195', '2018-03-01', '0000000000000', 1, 'Flamboyan 2 No 5 P1', 1411, '2018-03-27 05:35:59', NULL),
(807, 'Nn harlley Brigays', 'RM00196', '2018-03-01', '0000000000000', 0, 'Jl Parkit 1 B22 No 15', 1411, '2018-03-27 05:37:09', NULL),
(808, 'Tn Rifa Zakaria', 'RM00197', '2018-03-01', '0000000000000', 1, 'Jl Rajawali 3 PS', 1411, '2018-03-27 05:38:08', NULL),
(809, 'Ny CItra Agustina', 'RM00198', '2018-03-01', '0000000000000', 0, 'Jl Musi Timur P1', 1411, '2018-03-27 05:38:57', NULL),
(810, 'Tn Suhendri', 'RM00199', '2018-03-01', '0000000000000', 1, 'Jl Gelatik Raya No 3 PS', 1411, '2018-03-27 05:40:00', NULL);
INSERT INTO `mst_pasien` (`id_mst_pasien`, `nama_pasien`, `no_rm`, `tgl_lahir`, `no_telp`, `gender`, `alamat`, `id_kel`, `is_create`, `is_update`) VALUES
(811, 'Nn Vika', 'RM00200', '2018-03-01', '0000000000000', 0, 'Jl Bango 4 No 19 PS', 1411, '2018-03-27 05:41:00', NULL),
(812, 'Nn Sri Suci Jumyati', 'RM00201', '2018-03-01', '0000000000000', 0, 'Kp Pisangan 1', 1411, '2018-03-27 05:41:55', NULL),
(813, 'Ny Retno Sari', 'RM00202', '2018-03-01', '0000000000000', 0, 'Parung Panjang, Bogor', 1411, '2018-03-27 05:42:37', NULL),
(814, 'Tn Saiful', 'RM00203', '2018-03-01', '0000000000000', 1, 'Kp Ketos, Pasar Kemis', 1411, '2018-03-27 05:43:29', NULL),
(815, 'Ny Wati', 'RM00204', '2018-03-01', '0000000000000', 0, 'Villa Tomang Baru 2 No 8', 1411, '2018-03-27 05:44:25', NULL),
(816, 'Nn Ajeng Nur Citra', 'RM00205', '2018-03-01', '0000000000000', 0, 'Jl Karet Pasar Baru Barat 1', 1411, '2018-03-27 05:45:31', NULL),
(817, 'Nn Debby Simatupang', 'RM00206', '2018-03-01', '0000000000000', 0, 'Jl Penyelesaian Tomang 2 Jabar', 1411, '2018-03-27 05:46:56', NULL),
(818, 'Nn Betsyeba Anggraini', 'RM00207', '2018-03-01', '0000000000000', 0, 'Jl Penyelesaian Tomang 2 Jabar', 1411, '2018-03-27 05:48:24', NULL),
(819, 'Nn Cessy Monica', 'RM00208', '2018-03-01', '0000000000000', 0, 'Villa Tomang Baru 2 No 8', 1411, '2018-03-27 05:51:02', NULL),
(820, 'Nn Nuraini', 'RM00209', '2018-03-01', '0000000000000', 0, 'Jl H Sa\'alan Koang Jaya', 1411, '2018-03-27 05:52:19', NULL),
(821, 'Nn Yosi', 'RM00210', '2018-03-01', '0000000000000', 0, 'Pisangan Kayu Agung Rt 01/02 Sepatan', 1411, '2018-03-27 05:53:29', NULL),
(822, 'Nn Devi R', 'RM00211', '2018-03-01', '0000000000000', 0, 'Cipondoh, Tangerang', 1411, '2018-03-27 05:54:18', NULL),
(823, 'Tn Alvi Ryan Fikri', 'RM00212', '2018-03-01', '0000000000000', 1, 'Jl Melon 3 Rt 08/07 P Makmur', 1411, '2018-03-27 05:55:32', NULL),
(824, 'Nn Eva Puspha', 'RM00213', '2018-03-01', '0000000000000', 0, 'Perum Duta Asri, Cadas G/20', 1411, '2018-03-27 05:56:50', NULL),
(825, 'Tn Rusmana', 'RM00214', '2018-03-01', '0000000000000', 1, 'Ketapang Mauk, rt 19/18', 1411, '2018-03-27 05:57:43', NULL),
(826, 'Nn Mentari Aftur', 'RM00215', '2018-03-01', '0000000000000', 0, 'VTE Blok C Jl Cendana 2 No 36', 1411, '2018-03-27 05:59:01', NULL),
(827, 'Tn Rafli Hidayat', 'RM00216', '2018-03-01', '0000000000000', 1, 'Jl Jati 2 No 17 P Rezeki', 1411, '2018-03-27 06:00:11', NULL),
(828, 'Ny Anis Mulyanis', 'RM00217', '2018-03-01', '0000000000000', 0, 'Jl Melon 3 Rt 08/07 P Makmur', 1411, '2018-03-27 06:01:14', NULL),
(829, 'Ny Yanti Oktaviani', 'RM00218', '2018-03-01', '0000000000000', 0, 'Kp Rawa Berem Rt 015/07', 1411, '2018-03-27 06:02:51', NULL),
(830, 'Tn Hendra Tendean', 'RM00219', '2018-03-01', '0000000000000', 1, 'VTB Rt 02/016\r\n', 1411, '2018-03-27 06:03:41', NULL),
(831, 'Nn Soza Briliant', 'RM00220', '2018-03-01', '0000000000000', 0, 'Pdk Sukatani Permai', 1411, '2018-03-27 06:05:12', NULL),
(832, 'Ny Tati Mursalih', 'RM00221', '2018-03-01', '0000000000000', 0, 'VTB Rt 02/016', 1411, '2018-03-27 06:06:00', NULL),
(833, 'Ny Iis Mala', 'RM00222', '2018-03-01', '0000000000000', 0, 'Tanjung Kait rt 07/05', 1411, '2018-03-27 06:06:49', NULL),
(834, 'Ny Wiwi', 'RM00223', '2018-03-01', '0000000000000', 0, 'Jl Karet 1 No 3 PR', 1411, '2018-03-27 06:07:38', NULL),
(835, 'Nn Dewi Yanti', 'RM00224', '2018-03-01', '0000000000000', 0, 'Nagrak gg Toha Rt 05/6', 1411, '2018-03-27 06:08:36', NULL),
(836, 'Ny Rohmalia', 'RM00225', '2018-03-01', '0000000000000', 0, 'Tanjung kait Rt 07/05', 1411, '2018-03-27 10:50:12', NULL),
(837, 'Ny Puput Noviansyah', 'RM00227', '2018-03-01', '0000000000000', 0, 'Jl Jatiuwung F$6/32', 1411, '2018-03-27 10:51:11', NULL),
(838, 'Tn Ryan Arwendis', 'RM00228', '2018-03-01', '0000000000000', 1, 'Ketapang Mauk Rt 019/18', 1411, '2018-03-27 10:53:04', NULL),
(839, 'Tn Hafiz Ari Firdaus', 'RM00229', '2018-03-01', '0000000000000', 1, 'Ketapang Mauk Rt 019/18', 1411, '2018-03-27 10:54:28', NULL),
(840, 'Nn oktaviani Susilawati', 'RM00230', '2018-03-01', '0000000000000', 0, 'Perum Resident F/32', 1411, '2018-03-27 10:56:52', NULL),
(841, 'Nn Siti Diana Martin', 'RM00231', '2018-03-01', '0000000000000', 0, 'Kp Duri, Paku Haji', 1411, '2018-03-27 10:58:06', NULL),
(842, 'Ny Suarti', 'RM00232', '2018-03-01', '0000000000000', 0, 'Perum resident F/32', 1411, '2018-03-27 10:59:34', NULL),
(843, 'Ny Restauli Pardosi', 'RM00233', '2018-03-01', '0000000000000', 0, 'BTN Pasar Kemis', 1411, '2018-03-27 11:00:36', NULL),
(844, 'Nn Maria Nesya C', 'RM00234', '2018-03-01', '0000000000000', 0, 'Tangerang', 1411, '2018-03-27 11:01:38', NULL),
(845, 'Ny Angeline', 'RM00235', '2018-03-01', '0000000000000', 0, 'VTE A14 No 7', 1411, '2018-03-27 11:02:51', NULL),
(846, 'Ny Ani Badriah', 'RM00236', '2018-03-01', '0000000000000', 0, 'Ketapang Mauk Rt 019/18', 1411, '2018-03-27 11:03:53', NULL),
(847, 'Nn Sherly Mariska S', 'RM00237', '2018-08-01', '0000000000000', 0, 'Kp melayu Barat Rt 07/07', 1411, '2018-03-27 11:05:21', NULL),
(848, 'Nn Setya Tamara', 'RM00238', '2018-03-01', '0000000000000', 0, 'Jl Delima 3 D2 No 5 PM', 1411, '2018-03-27 11:06:54', NULL),
(849, 'Nn May Nina', 'RM00239', '2018-03-01', '0000000000000', 0, 'Taman Walet SM 2 No 16', 1411, '2018-03-27 11:10:50', NULL),
(850, 'Ny Siti Fatimah', 'RM00240', '2018-03-01', '0000000000000', 0, 'Taman Walet SM 2 No 16', 1411, '2018-03-27 11:12:13', NULL),
(851, 'Ny Rulian', 'RM00242', '2018-03-01', '0000000000000', 0, 'Perum Permata Lebak Wangi 2', 1411, '2018-03-27 11:13:49', NULL),
(852, 'Ny Lertina', 'RM00241', '2018-03-01', '0000000000000', 0, 'Perum Taman Raya Rt 03/07 No 34', 1411, '2018-03-27 11:17:44', NULL),
(853, 'Nn Ercita Anjani', 'RM00243', '2018-03-01', '0000000000000', 0, 'Jl Sriwijaya 3 C18/20', 1411, '2018-03-27 11:18:59', NULL),
(854, 'Nn Siska Aulia', 'RM00244', '2018-03-01', '0000000000000', 0, 'Villa Permata G8/8', 1411, '2018-03-27 11:21:00', NULL),
(855, 'Ny Siti Rohmi', 'RM00245', '2018-03-01', '0000000000000', 0, 'Paku Haji Rt 01/01', 1411, '2018-03-27 11:21:49', NULL),
(856, 'Nn Tika Oktaviani', 'RM00246', '2018-03-01', '0000000000000', 0, 'Kramat Sukatani Rt 01/01', 1411, '2018-03-27 11:25:20', NULL),
(857, 'Nn Siti Maesaroh', 'RM00247', '2018-03-01', '0000000000000', 0, 'Kramat Sukatani Rt 01/01', 1411, '2018-03-27 11:28:03', NULL),
(858, 'Nn Ru\'yah', 'RM00248', '2018-03-01', '0000000000000', 0, 'Jl Gelora Rt 02/04 No 10', 1411, '2018-03-27 11:32:58', NULL),
(859, 'Nn Intan Nur Azizah', 'RM00249', '2018-03-01', '0000000000000', 1, 'Jl Gelora Rt 02/04', 1411, '2018-03-27 11:33:59', NULL),
(860, 'Ny Khoirunisa', 'RM00250', '2018-03-01', '0000000000000', 0, 'Sepatan Mekar Jaya Rt 02/03', 1411, '2018-03-27 11:35:10', NULL),
(861, 'Ny linda ', 'RM00251', '2018-03-01', '0000000000000', 0, 'Regency 2 FC10/57', 1411, '2018-03-27 11:36:09', NULL),
(862, 'Ny Yulianti', 'RM00253', '2018-03-01', '0000000000000', 0, 'Kp Rawa Kidang, Sukadiri', 1411, '2018-03-27 11:39:03', NULL),
(863, 'Ny Sri Sulastri', 'RM00254', '2018-03-01', '0000000000000', 0, 'Jati Waringin Mauk Rt 01/07', 1411, '2018-03-27 11:40:16', NULL),
(864, 'Nn Isnia Rahayu', 'RM00255', '2018-03-01', '0000000000000', 0, 'Jl Bangu Nusa No 74 Rt 06/07', 1411, '2018-03-27 11:41:46', NULL),
(865, 'Nn Yuliana', 'RM00252', '2018-03-01', '0000000000000', 0, 'Regency 2 FE4 No 21', 1411, '2018-03-27 11:48:02', NULL),
(866, 'Ny Titin', 'RM00256', '2018-03-01', '0000000000000', 0, 'Kp Cadas rt 03/03', 1411, '2018-03-27 11:50:03', NULL),
(867, 'Ny Sri Utami', 'RM00257', '2018-03-01', '0000000000000', 0, 'VTB 2 Jl Kencana timur A6/5', 1411, '2018-03-27 11:51:38', NULL),
(868, 'Ny Eti Sulistiani', 'RM00258', '2018-03-01', '0000000000000', 0, 'Gg Johan, Nagrak Rt 02/06', 1411, '2018-03-27 11:54:02', NULL),
(869, 'Ny Sri Suhartati', 'RM00259', '2018-03-01', '0000000000000', 0, 'Garden City 1  Rt 10/9', 1411, '2018-03-27 11:55:13', NULL),
(870, 'Nn fitri Rizki Amelia', 'RM00260', '2018-03-01', '0000000000000', 0, 'Keroncong Permai DB 3 No 3', 1411, '2018-03-27 11:56:57', NULL),
(871, 'Nn Tiara Dita', 'RM00261', '2018-03-01', '0000000000000', 0, 'Jl Delima 4 No 12 PM', 1411, '2018-03-27 11:58:38', NULL),
(872, 'Ny Susilawati', 'RM00262', '2018-03-01', '0000000000000', 0, 'Pasar Kemis Kp Kelapa Rt 01/04', 1411, '2018-03-27 12:00:12', NULL),
(873, 'Nn Eka Rahmayati', 'RM00263', '2018-03-01', '0000000000000', 0, 'Jl Jati 2 No 17 Blok E3 PR', 1411, '2018-03-27 12:09:22', NULL),
(874, 'Ny Maya Sari', 'RM00264', '2018-03-01', '0000000000000', 0, 'Villa Regency 2 No 22 Rt 07/07', 1411, '2018-03-27 12:12:38', NULL),
(875, 'Nn Anisa Tafafani', 'RM00265', '2018-03-01', '0000000000000', 0, 'Jl Kurma 3 Rt 01/01 PR', 1411, '2018-03-27 12:14:55', NULL),
(876, 'Nn Yuni Handayani', 'RM00266', '2018-03-01', '0000000000000', 0, 'Gelam Barat Rt 04/01 P Kemis', 1411, '2018-03-27 12:16:34', NULL),
(877, 'Nn Icha Yumi', 'RM00267', '2018-03-01', '0000000000000', 0, 'Jl Nila 3 Rt 05/04 P Permai', 1411, '2018-03-27 12:21:48', NULL),
(878, 'Nn Fitri Aptikah Sari', 'RM00268', '2018-03-01', '0000000000000', 0, 'Keroncong Permai Jatiuwung', 1411, '2018-03-27 12:24:13', NULL),
(879, 'Nn Dini Supratiwi', 'RM00269', '2018-09-01', '0000000000000', 0, 'Per Bumi Asri Jl Durian 5', 1411, '2018-03-27 12:25:35', NULL),
(880, 'Nn Ratna Sulfiana', 'RM00270', '2018-03-01', '0000000000000', 0, 'Pd Indah Jl Merapi No 8', 1411, '2018-03-27 12:26:32', NULL),
(881, 'Tn Janu Damanik', 'RM00271', '2018-03-01', '0000000000000', 1, 'Perum Bumi Asri F2/8', 1411, '2018-03-27 12:27:31', NULL),
(882, 'Nn Hapsah Maryam', 'RM00272', '2018-03-01', '0000000000000', 0, 'Jl Serayu raya F32', 1411, '2018-03-27 12:34:23', NULL),
(883, 'Nn Rizka Astuti', 'RM00273', '2018-03-01', '0000000000000', 0, 'Kp pekayon Rt 03/05', 1411, '2018-03-27 12:35:18', NULL),
(884, 'Ny Dila', 'RM00274', '2018-03-01', '0000000000000', 0, 'Rajeg Kp tegal Rt 04/05', 1411, '2018-03-27 12:36:28', NULL),
(885, 'Nn Eli Fransiska', 'RM00275', '2018-03-01', '0000000000000', 0, 'Srengseng Jakbar', 1411, '2018-03-27 12:38:27', NULL),
(886, 'Ny Rama', 'RM00276', '2018-03-01', '0000000000000', 0, 'Jl Jelambar Alaciin Rt 07/06', 1411, '2018-03-27 12:53:58', NULL),
(887, 'Ny Sutrisniawati', 'RM00277', '2018-03-01', '0000000000000', 0, 'Perum bumi Asri, Jl flamboyan 3', 1411, '2018-03-27 12:56:02', NULL),
(888, 'Ny Rita Haryati', 'RM00278', '2018-03-01', '0000000000000', 0, 'Kapuk Cengkareng', 1411, '2018-03-27 12:57:24', NULL),
(889, 'Nn Fitriah', 'RM00279', '2018-03-01', '0000000000000', 0, 'Kapuk, Cengkareng Jakbar', 1411, '2018-03-27 12:59:19', NULL),
(890, 'Nn Ifemi', 'RM00280', '2018-03-01', '0000000000000', 0, 'Jl kecubung 1 no 10 PR', 1411, '2018-03-27 13:00:20', NULL),
(891, 'Nn Dina', 'RM00281', '2018-03-01', '0000000000000', 0, 'Tanah Merah', 1411, '2018-03-27 13:00:58', NULL),
(892, 'Ny Dwi Rahayu', 'RM00282', '2018-03-01', '0000000000000', 0, 'Kp Pabuaran rt 01/01', 1411, '2018-03-27 13:56:30', NULL),
(893, 'Ny Nur Tatiyah', 'RM00283', '2018-03-01', '0000000000000', 0, 'Pasar Paku Haji Rt 01/03', 1411, '2018-03-27 13:57:43', NULL),
(894, 'Ny Sudarti', 'RM00284', '2018-03-01', '0000000000000', 0, 'Keroncong Permai Rt 05/04', 1411, '2018-03-27 13:58:53', NULL),
(895, 'Ny Ela', 'RM00285', '2018-03-01', '0000000000000', 0, 'Bumi Asri Jl Kurma 6 E11/19', 1411, '2018-03-27 14:00:18', NULL),
(896, 'Ny Cana nur Hasanah', 'RM00286', '2018-03-01', '0000000000000', 0, 'Komplek Kehakiman', 1411, '2018-03-27 14:01:08', NULL),
(897, 'Ny Ratna', 'RM00287', '2018-03-01', '0000000000000', 0, 'Nuansa Sukatani Rajeg', 1411, '2018-03-27 14:03:07', NULL),
(898, 'Ny Padris', 'RM00288', '2018-03-01', '0000000000000', 0, 'Bumi Asri Jl Kurma 6', 1411, '2018-03-27 14:04:22', NULL),
(899, 'Ny Nina Herlina', 'RM00289', '2018-03-01', '0000000000000', 0, 'Desa Suka Mauk rt 007/02', 1411, '2018-03-27 14:08:36', NULL),
(900, 'Nn Efriana Sari', 'RM00290', '2018-03-01', '0000000000000', 1, 'Jl Kepodang 2 No 3 PS', 1411, '2018-03-27 14:09:32', NULL),
(901, 'Nn Dewi Kusmawasari', 'RM00291', '2018-03-01', '0000000000000', 0, 'Perum Taman Raya Rajeg', 1411, '2018-03-27 14:10:53', NULL),
(902, 'Nn Yuliana', 'RM00292', '2018-03-01', '0000000000000', 0, 'Tanjung Kait Rt 04/04 Marga Mulya', 1411, '2018-03-27 14:12:01', NULL),
(903, 'Nn Hilda Febrina', 'RM00293', '2018-03-01', '0000000000000', 0, 'Jl Palma 9 No 13', 1411, '2018-03-27 14:13:14', NULL),
(904, 'Ny Yayan Sugianti', 'RM00294', '2018-03-01', '0000000000000', 0, 'Marga Mulya Mauk', 1411, '2018-03-27 14:14:13', NULL),
(905, 'Ny Fatimah', 'RM00295', '2018-03-01', '0000000000000', 0, 'Marga Mulya Mauk Rt 02/03', 1411, '2018-03-27 14:15:10', NULL),
(906, 'Nn Imas Masturo', 'RM00296', '2018-03-01', '0000000000000', 0, 'Sepatan pondok jaya Rt 03/04', 1411, '2018-03-27 14:16:36', NULL),
(907, 'Tn Yoga Cahya K', 'RM00297', '2018-03-01', '0000000000000', 1, 'Pasar Baru', 1411, '2018-03-27 14:17:34', NULL),
(908, 'Nn Sarah', 'RM00298', '2018-03-01', '0000000000000', 0, 'VTB F2 No 15', 1411, '2018-03-27 14:18:11', NULL),
(909, 'Ny Sutini', 'RM00299', '2018-03-01', '0000000000000', 0, 'Jl Anggur 2 Pdk Makmur', 1411, '2018-03-27 14:19:05', NULL),
(910, 'Nn Gambitta', 'RM00300', '2018-03-01', '0000000000000', 0, 'Jl Musi Timur No P1', 1411, '2018-03-27 14:19:52', NULL),
(911, 'Nn Siti Nur Fauziyah', 'RM00301', '2018-03-01', '0000000000000', 0, 'Kp Gembor Rt 02/01', 1411, '2018-03-27 14:20:51', NULL),
(912, 'Ny Lena', 'RM00302', '2018-03-01', '0000000000000', 0, 'Gd Cluster Jade  j2 No 39', 1411, '2018-03-27 14:22:36', NULL),
(913, 'Ny Saidah', 'RM00303', '2018-03-01', '0000000000000', 0, 'Paku Haji Rt 03/01', 1411, '2018-03-27 14:23:32', NULL),
(914, 'Nn Intan Wardani', 'RM00304', '2018-03-01', '0000000000000', 0, 'Curug, Sukabekti', 1411, '2018-03-27 14:25:23', NULL),
(915, 'Nn Wendy', 'RM00305', '2018-03-01', '0000000000000', 0, 'Grand Duta Cluster Jade J2 No 39', 1411, '2018-03-27 14:28:07', NULL),
(916, 'Ny Ernita Danang', 'RM00306', '2018-03-01', '0000000000000', 0, 'Tangerang', 1411, '2018-03-27 14:28:50', NULL),
(917, 'Nn Windi Elles', 'RM00307', '2018-03-01', '0000000000000', 0, 'Paku Haji, Rawa Kepu', 1411, '2018-03-27 14:29:56', NULL),
(918, 'Nn Siti Sumiartilah', 'RM00308', '2018-03-01', '0000000000000', 0, 'Rajeg Tanjaka rt 11/03', 1411, '2018-03-27 14:31:19', NULL),
(919, 'Ny Agis', 'RM00309', '2018-03-01', '0000000000000', 0, 'Jl Palma 12 Rt 08/06 PR', 1411, '2018-03-27 14:32:25', NULL),
(920, 'Ny murni wati', 'RM00310', '2018-03-01', '0000000000000', 0, 'Jl Papandayan 4 No 69', 1411, '2018-03-27 14:44:04', NULL),
(921, 'Ny Maisaroh', 'RM00311', '2018-03-27', '000000000000', 0, 'Kp. Tanjakan RT 01/01', 0, '2018-03-27 19:46:56', NULL),
(922, 'Nn Aziziah Khurfathur j.', 'RM00312', '2018-03-27', '000000000000', 0, 'Jl. Akasia III P. Rejeki', 0, '2018-03-27 19:56:27', NULL),
(923, 'Tn Ernest Elika N.', 'RM00313', '2018-03-01', '000000000000', 1, 'Grand Tomang E6/1', 0, '2018-03-27 20:03:03', NULL),
(924, 'Nn Tia', 'RM00314', '2018-03-27', '000000000000', 0, 'Kp. Picung RT 05/05 P.S', 0, '2018-03-27 20:05:39', NULL),
(925, 'Ny Juwita Rahmawati', 'RM00315', '2018-03-27', '000000000000', 0, 'Jl. K.H. Dewantara B16', 0, '2018-03-27 20:11:10', NULL),
(926, 'Nn Diana Oktavia S.', 'RM00316', '2018-03-27', '000000000000', 0, '', 0, '2018-03-27 20:17:22', NULL),
(927, 'Tn zevic Aulia Noor', 'RM00317', '2018-03-27', '000000000000', 1, 'Jl. Delima III C7/13 P.M', 0, '2018-03-27 20:19:23', NULL),
(928, 'Nn Wiwit Widya', 'RM00318', '2018-03-27', '000000000000', 0, '', 0, '2018-03-27 20:23:02', NULL),
(929, 'Ny Mursani', 'RM00319', '2018-03-27', '000000000000', 0, '', 0, '2018-03-27 20:24:22', NULL),
(930, 'Ny Relina', 'RM00320', '2018-03-27', '000000000000', 0, 'Jl. Kurma III No.35 P.R', 0, '2018-03-27 20:26:28', NULL),
(931, 'Nn Ayu Qawiyyu', 'RM00321', '2018-03-27', '000000000000', 0, 'Teluk Jakarta AC1/3', 0, '2018-03-27 20:28:05', NULL),
(932, 'Ny Tati Mulyati', 'RM00322', '2018-03-27', '000000000000', 0, 'Teluk Jakarta AC/3', 0, '2018-03-27 20:29:22', NULL),
(933, 'Ny Rita Emmawati', 'RM00323', '2018-03-27', '000000000000', 0, 'Perum Griya Bumi Asri', 0, '2018-03-27 20:31:17', NULL),
(934, 'Ny Neng Sri Suryasih', 'RM00324', '2018-03-27', '000000000000', 0, 'Jl. Lumba III No.6 PP', 0, '2018-03-27 20:32:42', NULL),
(935, 'Ny Maisaroh', 'RM00311', '2018-03-01', '0000000000000', 0, 'Kp Tanjakan Rajeg Rt 01/01', 1411, '2018-03-28 00:40:30', NULL),
(936, 'Nn Azizah Khurfathur j', 'RM00312', '2018-03-01', '0000000000000', 0, 'Jl Akasia 3 P Rezeki', 1411, '2018-03-28 00:44:05', NULL),
(937, 'Tn Ernest Elika N', 'RM00313', '2018-03-01', '0000000000000', 1, 'Grand tomang E6/1', 1411, '2018-03-28 00:45:14', NULL),
(938, 'Nn Tia', 'RM00314', '2018-03-01', '0000000000000', 0, 'Kp Picung Rt 05/01 Ps', 1411, '2018-03-28 00:52:11', NULL),
(939, 'Ny Juwita Rahmawati', 'RM00215', '2018-03-01', '0000000000000', 0, 'Jl KH Dewantara B16', 1411, '2018-03-28 00:53:09', NULL),
(940, 'Nn Diana Oktavia S', 'RM00216', '1999-03-01', '0000000000000', 0, 'Cilongok Ps Kemis', 1411, '2018-03-28 00:54:24', NULL),
(941, 'Tn Zefic Aulia Noor', 'RM00217', '2018-03-01', '0000000000000', 1, 'Jl delima 3 C7/13 PM', 1411, '2018-03-28 00:55:34', NULL),
(942, 'Ny Juwita Rahmawati', 'RM00315', '2018-03-01', '0000000000000', 0, 'Jl KH Dewantara B16', 1411, '2018-03-28 00:58:19', NULL),
(943, 'Nn Diana Oktavia S', 'RM00316', '1999-03-01', '0000000000000', 0, 'Cilongok, Ps Kemis', 1411, '2018-03-28 00:59:35', NULL),
(944, 'Tn Zefic Aulia Noor', 'RM00317', '2018-03-01', '0000000000000', 1, 'Jl Delima 3 C7/13 PM', 1411, '2018-03-28 01:42:52', NULL),
(945, 'Nn Wiwit Widya', 'RM00318', '2018-03-01', '0000000000000', 0, 'Tanjung Kait, Tanjung Anom', 1411, '2018-03-28 01:48:49', NULL),
(946, 'Ny Mursani ', 'RM00319', '2018-03-01', '0000000000000', 0, 'Tanjung Kait, Tanjung Anom', 1411, '2018-03-28 01:51:03', NULL),
(947, 'Ny Relina', 'RM00320', '2018-03-01', '0000000000000', 0, 'Jl Kurma 3 No 35 PR', 1411, '2018-03-28 01:52:27', NULL),
(948, 'Nn Ayu Qawiyyu', 'RM00321', '2018-03-01', '0000000000000', 0, 'Teluk Jakarta AC 1/3', 1411, '2018-03-28 01:53:46', NULL),
(949, 'Ny Tati Mulyati', 'RM00322', '2018-03-01', '0000000000000', 0, 'Teluk Jakarta AC1/3', 1411, '2018-03-28 01:54:42', NULL),
(950, 'Ny Tati Emmawati', 'RM00323', '2018-02-01', '0000000000000', 0, 'Perum Griya Bumi Asri', 1411, '2018-03-28 01:55:49', NULL),
(951, 'Ny Neng Sri Suryasih', 'RM00324', '2018-03-01', '0000000000000', 0, 'Jl Lumba - lumba No 6 PP', 1411, '2018-03-28 01:56:46', NULL),
(952, 'Nn Sri Ayu Suciati', 'RM00325', '2018-03-01', '0000000000000', 0, 'Cilongok Sukamantri Rt 01/03', 1411, '2018-03-28 01:58:00', NULL),
(953, 'Ny Siti Khodijah', 'RM00326', '2018-03-01', '0000000000000', 0, 'Kp Nagrak Rt 04/06', 1411, '2018-03-28 01:58:47', NULL),
(954, 'Ny Yuli Rosidah', 'RM00327', '2018-03-01', '0000000000000', 0, 'Cipondoh Taman Royal', 1411, '2018-03-28 01:59:33', NULL),
(955, 'Nn Siti Khodimah', 'RM00328', '2018-03-01', '0000000000000', 0, 'Kp Pangodokan Rt 04/01', 1411, '2018-03-28 02:00:41', NULL),
(956, 'Nn Pratiwi', 'RM00329', '2018-03-01', '0000000000000', 0, 'Jl Kurma 1 No 4 PR', 1411, '2018-03-28 02:02:00', NULL),
(957, 'Nn Endah Nurmala', 'RM00330', '2018-03-01', '0000000000000', 0, 'Cilongok Sukamantri Rt 03/04', 1411, '2018-03-28 02:02:51', NULL),
(958, 'Nn Linda Arifah', 'RM00331', '2018-03-01', '0000000000000', 0, 'Jl raya Mauk, Jatiwaringin', 1411, '2018-03-28 02:03:53', NULL),
(959, 'Nn Eva Nur Falah', 'RM00332', '2018-03-01', '0000000000000', 0, 'Kp Nanggul Rt 03/03', 1411, '2018-03-28 02:05:19', NULL),
(960, 'Ny Pinondang', 'RM00333', '2018-03-01', '0000000000000', 0, 'Jl Akasia 3 No 7 PR', 1411, '2018-03-28 02:06:20', NULL),
(961, 'Ny Iyan Maryani', 'RM00334', '2018-03-01', '0000000000000', 0, 'Citra Raya X6 No 2', 1411, '2018-03-28 02:07:20', NULL),
(962, 'Ny Nurul Anastasya', 'RM00335', '2018-03-01', '0000000000000', 0, 'Kp Babulak Cina Rt 06/04', 1411, '2018-03-28 02:08:40', NULL),
(963, 'Nn Moni Sucianjani', 'RM00336', '2018-03-01', '0000000000000', 0, 'TKB C17/ Jl Sriwijaya S', 1411, '2018-03-28 02:17:29', NULL),
(964, 'Ny iti Haryani', 'RM00337', '2018-03-01', '0000000000000', 0, 'Paku Haji Rt 03/02', 1411, '2018-03-28 02:19:08', NULL),
(965, 'Ny Juju', 'RM00338', '2018-03-01', '0000000000000', 0, 'Sepatan Pdk Jaya Rt 02/02', 1411, '2018-03-28 02:21:11', NULL),
(966, 'Ny Sumartini', 'RM00339', '2018-03-01', '0000000000000', 0, 'Ps Kemis Village 18 No 6 Rt 1/16', 1411, '2018-03-28 02:22:45', NULL),
(967, 'Ny Wasmi Sugianti', 'RM00340', '2018-03-01', '0000000000000', 0, 'Jl Gg Agung B15 /4 P1', 1411, '2018-03-28 02:24:32', NULL),
(968, 'Ny Audri', 'RM00341', '2018-03-01', '0000000000000', 0, 'Sepatan Sektor Rt 02/03', 1411, '2018-03-28 02:25:29', NULL),
(969, 'Ny Sri Robiahtun', 'RM00342', '2018-03-01', '0000000000000', 0, 'Jl Gunung Agung B15 No 21', 1411, '2018-03-28 02:27:14', NULL),
(970, 'Nn icha oktavia', 'RM00343', '2018-03-01', '0000000000000', 0, 'Perum Permata Regency CB/3', 1411, '2018-03-28 02:28:49', NULL),
(971, 'Nn Anisa Dewi', 'RM00344', '2018-03-01', '0000000000000', 0, 'VTB G4/3', 1411, '2018-03-28 02:29:59', NULL),
(972, 'Nn Oki Prafita Sari', 'RM00345', '2018-03-01', '0000000000000', 0, 'Pasar Kemis Banana Permai', 1411, '2018-03-28 02:31:17', NULL),
(973, 'Tn Rizal Aldy', 'RM00346', '2018-03-01', '0000000000000', 1, 'Jl pinus 7 D8/22 PR', 1411, '2018-03-28 02:38:00', NULL),
(974, 'Nn Dian Kumala Sari', 'RM00347', '2018-03-01', '0000000000000', 0, 'Jl Dahlia 9 No 14', 1411, '2018-03-28 02:39:43', NULL),
(975, 'Nn Eka Rahmawati', 'RM00348', '2018-03-01', '0000000000000', 0, 'Kp Kondang Rt 01/01', 1411, '2018-03-28 02:41:13', NULL),
(976, 'Ny May', 'RM00349', '2018-03-01', '0000000000000', 0, 'Gandaria Rt 06/08 Rajeg', 1411, '2018-03-28 02:42:41', NULL);

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
(6, 'Dokter', '0922222222', 0, 'test', '2018-02-13', 1, '2018-02-13 20:29:39', '2018-02-13 20:30:14'),
(7, 'pendaftaran', '0000000000', 0, 'jl jl', '2018-03-05', 1, '2018-03-28 22:54:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mst_suplier`
--

CREATE TABLE `mst_suplier` (
  `id_suplier` int(11) NOT NULL,
  `nama_suplier` varchar(100) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `id_mst_pegawai` int(11) NOT NULL,
  `is_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_suplier`
--

INSERT INTO `mst_suplier` (`id_suplier`, `nama_suplier`, `alamat`, `telp`, `id_mst_pegawai`, `is_create`, `is_update`) VALUES
(1, 'PT. Farmasi Niaga Utama', 'Jl, Pamulang Raya no 35. Pamulang - Tangerang Selatan Banten', '02198876534', 1, '2018-03-06 03:17:56', '2018-03-06 10:21:40');

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
(3, 'Facial', '110000', '2018-03-28 20:21:25', NULL),
(4, 'Peeling', '110000', '2018-03-28 20:21:25', NULL),
(5, 'Micro Dermatasi', '130000', '2018-03-28 20:21:25', NULL),
(6, 'RF', '200000', '2018-03-28 20:21:25', NULL),
(7, 'HIFU', '200000', '2018-03-28 20:21:25', NULL),
(8, 'Roller', '300000', '2018-03-28 20:21:25', NULL),
(9, 'Cauter1', '200000', '2018-03-28 20:21:25', NULL),
(10, 'Cauter2', '300000', '2018-03-28 20:21:25', NULL),
(11, 'Cauter3', '400000', '2018-03-28 20:21:25', NULL);

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
-- Table structure for table `pemakaian_obat`
--

CREATE TABLE `pemakaian_obat` (
  `id_pemakaian_obat` int(11) NOT NULL,
  `id_detail_trx_tindakan` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_mst_pegawai` int(11) NOT NULL,
  `qtyPemakaian` int(11) NOT NULL,
  `harga_jual` varchar(15) NOT NULL,
  `harga_beli` varchar(15) NOT NULL,
  `sub_total` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `is_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_update` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemakaian_obat`
--

INSERT INTO `pemakaian_obat` (`id_pemakaian_obat`, `id_detail_trx_tindakan`, `id_product`, `id_mst_pegawai`, `qtyPemakaian`, `harga_jual`, `harga_beli`, `sub_total`, `tanggal`, `is_create`, `is_update`) VALUES
(1, 1, 5, 1, 5, '50000', '45000', '250000', '2018-03-28', '2018-03-28 15:44:39', NULL),
(2, 2, 5, 1, 2, '50000', '45000', '100000', '2018-03-28', '2018-03-28 15:52:52', NULL);

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
  `flag_aktif` int(11) NOT NULL DEFAULT '1',
  `flag_lunas` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_trx_pendaftaran`, `id_mst_pasien`, `id_mst_pegawai`, `keterangan`, `tgl`, `is_create`, `is_update`, `flag_aktif`, `flag_lunas`) VALUES
('P00001', 610, 1, 'facial', '2018-03-28', '2018-03-28 22:29:45', '2018-03-28 00:00:00', 1, 1),
('P00002', 610, 1, 'ssss', '2018-03-28', '2018-03-28 22:51:50', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `penerimaan`
--

CREATE TABLE `penerimaan` (
  `faktur_penerimaan` varchar(25) NOT NULL,
  `id_suplier` int(11) NOT NULL,
  `id_mst_pegawai` int(11) NOT NULL,
  `tgl_penerimaan` date NOT NULL,
  `cara_bayar` varchar(25) NOT NULL,
  `ppn` tinyint(1) NOT NULL DEFAULT '0',
  `total` varchar(25) NOT NULL,
  `is_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_update` timestamp NULL DEFAULT NULL,
  `flag_verif` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerimaan`
--

INSERT INTO `penerimaan` (`faktur_penerimaan`, `id_suplier`, `id_mst_pegawai`, `tgl_penerimaan`, `cara_bayar`, `ppn`, `total`, `is_create`, `is_update`, `flag_verif`) VALUES
('asda', 1, 1, '2018-03-29', 'ad', 0, '40000', '2018-03-29 15:39:11', NULL, 0),
('f001', 1, 1, '2018-03-28', 'Tunai', 0, '2250000', '2018-03-28 15:34:14', NULL, 1),
('F002', 1, 1, '2018-03-28', 'Tunai', 0, '2700045', '2018-03-28 15:41:51', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `faktur_penjualan` varchar(25) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `id_mst_pegawai` int(11) NOT NULL,
  `cara_bayar` varchar(25) NOT NULL,
  `ppn` int(11) NOT NULL DEFAULT '0',
  `total` varchar(25) NOT NULL,
  `is_create` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_update` timestamp NULL DEFAULT NULL,
  `flag_aktif` int(11) NOT NULL DEFAULT '0',
  `flag_lunas` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`faktur_penjualan`, `tgl_penjualan`, `id_mst_pegawai`, `cara_bayar`, `ppn`, `total`, `is_create`, `is_update`, `flag_aktif`, `flag_lunas`) VALUES
('FP00001', '2018-03-28', 1, 'TUNAI', 0, '100000', '2018-03-28 15:37:00', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `nama_product` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `qty_rusak` int(11) NOT NULL,
  `qty_exp` int(11) NOT NULL,
  `harga_beli` varchar(23) NOT NULL,
  `harga_jual` varchar(22) NOT NULL,
  `exp` date DEFAULT NULL,
  `is_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_update` datetime DEFAULT NULL,
  `id_mst_pegawai` int(11) NOT NULL,
  `flag_aktif` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `nama_product`, `qty`, `qty_rusak`, `qty_exp`, `harga_beli`, `harga_jual`, `exp`, `is_create`, `is_update`, `id_mst_pegawai`, `flag_aktif`) VALUES
(5, 'Cream Malam H1', 41, 0, 0, '45000', '50000', '2018-11-09', '2018-03-28 19:56:25', '2018-03-28 22:52:52', 1, 1),
(6, 'Cream Malam H2', 0, 0, 0, '45000', '50000', '2018-07-06', '2018-03-28 19:56:58', '2018-03-28 22:42:07', 1, 1),
(7, 'Cream Malam T1', 0, 0, 0, '', '', NULL, '2018-03-28 19:57:22', '2018-03-28 20:15:18', 1, 1),
(8, 'Cream Malam t2', 0, 0, 0, '', '', NULL, '2018-03-28 19:57:44', '2018-03-28 20:15:21', 1, 1),
(9, 'Cream Malam D2', 0, 0, 0, '', '', NULL, '2018-03-28 19:58:14', '2018-03-28 20:15:24', 1, 1),
(10, 'Suncreen Pupha SPF 30', 0, 0, 0, '', '', NULL, '2018-03-28 19:58:39', '2018-03-28 20:15:27', 1, 1),
(11, 'SPF 30 Warna', 0, 0, 0, '', '', NULL, '2018-03-28 19:59:01', '2018-03-28 20:15:30', 1, 1),
(12, 'SPF 30 Acne', 0, 0, 0, '', '', NULL, '2018-03-28 19:59:18', '2018-03-28 20:15:33', 1, 1),
(13, 'SPF 45', 0, 0, 0, '', '', NULL, '2018-03-28 19:59:45', '2018-03-28 20:15:36', 1, 1),
(14, 'Cream Malam H2 Tube (Refaquin)', 0, 0, 0, '', '', NULL, '2018-03-28 20:00:09', '2018-03-28 20:15:39', 1, 1),
(15, 'Cream Leher Hq2 Gluco8', 0, 0, 0, '', '', NULL, '2018-03-28 20:00:37', '2018-03-28 20:15:45', 1, 1),
(16, 'Cream Lipatan (Sale Coal LCD5)', 0, 0, 0, '', '', NULL, '2018-03-28 20:01:06', '2018-03-28 20:15:50', 1, 1),
(17, 'Immortal White Trans Cream', 0, 0, 0, '', '', NULL, '2018-03-28 20:01:28', '2018-03-28 20:15:54', 1, 1),
(18, 'Immortal Hydraline Cream', 0, 0, 0, '', '', NULL, '2018-03-28 20:01:50', '2018-03-28 20:15:59', 1, 1),
(19, 'Telngiektasis', 0, 0, 0, '', '', NULL, '2018-03-28 20:02:09', '2018-03-28 20:16:03', 1, 1),
(20, 'Celeteque Acne solution', 0, 0, 0, '', '', NULL, '2018-03-28 20:03:39', '2018-03-28 20:16:11', 1, 1),
(21, 'Clobetasol (Cream Iritasi)', 0, 0, 0, '', '', NULL, '2018-03-28 20:03:58', '2018-03-28 20:16:20', 1, 1),
(22, 'Vitacid', 0, 0, 0, '', '', NULL, '2018-03-28 20:04:08', '2018-03-28 20:16:29', 1, 1),
(23, 'Celeteque Acne Spray', 0, 0, 0, '', '', NULL, '2018-03-28 20:04:23', '2018-03-28 20:16:35', 1, 1),
(24, 'MD - AH Serum', 0, 0, 0, '', '', NULL, '2018-03-28 20:04:43', '2018-03-28 20:16:37', 1, 1),
(25, 'Immortal Eye Serum', 0, 0, 0, '', '', NULL, '2018-03-28 20:05:10', '2018-03-28 20:16:38', 1, 1),
(26, 'Serum Gold', 0, 0, 0, '', '', NULL, '2018-03-28 20:05:25', '2018-03-28 20:16:40', 1, 1),
(27, 'Serum Vit C', 0, 0, 0, '', '', NULL, '2018-03-28 20:05:39', '2018-03-28 20:16:41', 1, 1),
(28, 'serum Acne', 0, 0, 0, '', '', NULL, '2018-03-28 20:05:57', '2018-03-28 20:16:42', 1, 1),
(29, 'Puluus Hydro Active Pressed Powder (Refile Natural)', 0, 0, 0, '', '', NULL, '2018-03-28 20:06:37', '2018-03-28 20:16:44', 1, 1),
(30, 'Puluus Hydro Active Pressed Powder (Refile Ivory)', 0, 0, 0, '', '', NULL, '2018-03-28 20:07:03', '2018-03-28 20:16:46', 1, 1),
(31, 'Puluus Hydro Active Pressed Powder (Natural)', 0, 0, 0, '', '', NULL, '2018-03-28 20:07:21', '2018-03-28 20:16:48', 1, 1),
(32, 'Puluus Hydro Active Pressed Powder (Ivory)', 0, 0, 0, '', '', NULL, '2018-03-28 20:07:33', '2018-03-28 20:16:51', 1, 1),
(33, 'Immortal Loose Powder Silky Touch 50 natural', 0, 0, 0, '', '', NULL, '2018-03-28 20:08:23', '2018-03-28 20:17:06', 1, 1),
(34, 'Immortal Loose Powder Talcum Free', 0, 0, 0, '', '', NULL, '2018-03-28 20:08:47', '2018-03-28 20:17:08', 1, 1),
(35, 'Immortal Loose Powder Talcum Free Acne', 0, 0, 0, '', '', NULL, '2018-03-28 20:09:19', '2018-03-28 20:17:09', 1, 1),
(36, 'Immortal Sun Protector Compact UVA - UVB', 0, 0, 0, '', '', NULL, '2018-03-28 20:09:52', '2018-03-28 20:17:11', 1, 1),
(37, 'Immortal Air Cushion Natural', 0, 0, 0, '', '', NULL, '2018-03-28 20:10:12', '2018-03-28 20:17:12', 1, 1),
(38, 'Facial Wash Oily', 0, 0, 0, '', '', NULL, '2018-03-28 20:10:29', '2018-03-28 20:17:13', 1, 1),
(39, 'Facial Wash Normal', 0, 0, 0, '', '', NULL, '2018-03-28 20:10:43', '2018-03-28 20:17:15', 1, 1),
(40, 'Derma Beauty Facial Wash Oily', 0, 0, 0, '', '', NULL, '2018-03-28 20:11:11', '2018-03-28 20:17:17', 1, 1),
(41, 'Derma Beauty Facial Wash  Normal', 0, 0, 0, '', '', NULL, '2018-03-28 20:11:27', '2018-03-28 20:17:18', 1, 1),
(42, 'Nutriderma Facial Wash TTO - Acne', 0, 0, 0, '', '', NULL, '2018-03-28 20:11:48', '2018-03-28 20:17:20', 1, 1),
(43, 'Nutriderma Facial Wash Aha', 0, 0, 0, '', '', NULL, '2018-03-28 20:12:06', '2018-03-28 20:17:22', 1, 1),
(44, 'Nutriderma Facial Wash ALOE', 0, 0, 0, '', '', NULL, '2018-03-28 20:12:44', '2018-03-28 20:17:24', 1, 1),
(45, 'Facial Cleanser TTO Pupha', 0, 0, 0, '', '', NULL, '2018-03-28 20:13:05', '2018-03-28 20:17:27', 1, 1),
(46, 'Immortal Toner Aha', 0, 0, 0, '', '', NULL, '2018-03-28 20:13:20', '2018-03-28 20:17:29', 1, 1),
(47, 'Derma Beauty Milk Cleanser', 0, 0, 0, '', '', NULL, '2018-03-28 20:13:37', '2018-03-28 20:17:32', 1, 1),
(48, 'derma Beauty Cleansing Solution', 0, 0, 0, '', '', NULL, '2018-03-28 20:13:58', '2018-03-28 20:17:36', 1, 1),
(49, 'derma Beauty Toner Normal', 0, 0, 0, '', '', NULL, '2018-03-28 20:14:15', '2018-03-28 20:17:37', 1, 1),
(50, 'Derma Beauty Toner Oily ', 0, 0, 0, '', '', NULL, '2018-03-28 20:14:40', '2018-03-28 20:17:39', 1, 1),
(51, 'Derma Beauty Body Whitening', 0, 0, 0, '', '', NULL, '2018-03-28 20:15:02', '2018-03-28 20:17:41', 1, 1);

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
(1, 'Banten', '2018-02-09 00:14:06', '0000-00-00 00:00:00'),
(2, 'DKI Jakarta', '2018-03-29 21:47:40', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `retur`
--

CREATE TABLE `retur` (
  `id_retur` int(11) NOT NULL,
  `id_detail` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty_retur` int(11) NOT NULL,
  `keterangan` varchar(55) NOT NULL,
  `harga_beli` varchar(25) NOT NULL,
  `harga_jual` varchar(25) NOT NULL,
  `sub_total` varchar(35) NOT NULL,
  `id_mst_pegawai` int(11) NOT NULL,
  `flag_from` int(11) NOT NULL COMMENT '1=penjualan, penerimaan',
  `flag_active` int(11) NOT NULL DEFAULT '1' COMMENT '1=aktif,0=nonaktif',
  `kondisi` int(11) NOT NULL COMMENT '1=baik,2=rusak,3=exp'
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
(1, 'P00001', 1, '360000', '2018-03-28 22:30:22', '2018-03-28 22:30:22', '2018-03-28 22:44:38'),
(2, 'P00002', 1, '230000', '2018-03-28 22:52:02', '2018-03-28 22:52:02', '2018-03-28 22:52:51');

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
(1, 1, 'root', '$2y$10$OSECT.MydYjNvELwXKnSD.aEO7ap9NpM0Yg4hUuf/2hH6Lb/Y9KFG', '2018-02-05 10:05:59', NULL),
(2, 2, 'pendaftaran', '$2y$10$0xDtwFyj/IA8/DXdcSjRx.axC7lxboCFikc2tLJtpf6rt/WJ9bNsS', '2018-02-05 20:15:24', NULL),
(3, 6, 'dokter', '$2y$10$3cFzKw1PQSECMrrxMOPE.ev7w3crsfzq3V3VjnKNkNYwoRyoMnw2C', '2018-02-13 20:29:53', NULL),
(4, 7, 'pendaftaran', '$2y$10$sDZUezkLeHcqupi6Z7ExqOoNQDerMEtN/EHgycdG8Pg0H5vQFTp5W', '2018-03-28 22:54:41', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`id_billing`);

--
-- Indexes for table `detail_penerimaan`
--
ALTER TABLE `detail_penerimaan`
  ADD PRIMARY KEY (`id_detail_penerimaan`),
  ADD KEY `faktur_penerimaan` (`faktur_penerimaan`),
  ADD KEY `product_penerimaan` (`id_product`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_detail_penjualan`),
  ADD KEY `faktur_penjualan` (`faktur_penjualan`),
  ADD KEY `product` (`id_product`);

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
-- Indexes for table `mst_suplier`
--
ALTER TABLE `mst_suplier`
  ADD PRIMARY KEY (`id_suplier`),
  ADD KEY `user_input` (`id_mst_pegawai`);

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
-- Indexes for table `pemakaian_obat`
--
ALTER TABLE `pemakaian_obat`
  ADD PRIMARY KEY (`id_pemakaian_obat`),
  ADD KEY `id_trx_tindakan` (`id_detail_trx_tindakan`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_mst_pegawai` (`id_mst_pegawai`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_trx_pendaftaran`),
  ADD KEY `id_mst_pasien` (`id_mst_pasien`),
  ADD KEY `pegawai` (`id_mst_pegawai`);

--
-- Indexes for table `penerimaan`
--
ALTER TABLE `penerimaan`
  ADD PRIMARY KEY (`faktur_penerimaan`),
  ADD KEY `pegawai_penerimaan` (`id_mst_pegawai`),
  ADD KEY `suplier_penerimaan` (`id_suplier`) USING BTREE;

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`faktur_penjualan`),
  ADD KEY `pegawaipenjualan` (`id_mst_pegawai`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_mst_pegawai` (`id_mst_pegawai`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_prov`);

--
-- Indexes for table `retur`
--
ALTER TABLE `retur`
  ADD PRIMARY KEY (`id_retur`),
  ADD KEY `id_detail` (`id_detail`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_mst_pegawai` (`id_mst_pegawai`);

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
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `id_billing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `detail_penerimaan`
--
ALTER TABLE `detail_penerimaan`
  MODIFY `id_detail_penerimaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_detail_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail_trx_tindakan`
--
ALTER TABLE `detail_trx_tindakan`
  MODIFY `id_detail_trx_tindakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `group_access`
--
ALTER TABLE `group_access`
  MODIFY `id_group_acces` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id_kab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2001;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id_kel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1819;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `menu_akses`
--
ALTER TABLE `menu_akses`
  MODIFY `id_menu_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `mst_pasien`
--
ALTER TABLE `mst_pasien`
  MODIFY `id_mst_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=977;

--
-- AUTO_INCREMENT for table `mst_pegawai`
--
ALTER TABLE `mst_pegawai`
  MODIFY `id_mst_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mst_suplier`
--
ALTER TABLE `mst_suplier`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mst_tindakan`
--
ALTER TABLE `mst_tindakan`
  MODIFY `id_mst_tindakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pegawai_group`
--
ALTER TABLE `pegawai_group`
  MODIFY `id_mst_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pemakaian_obat`
--
ALTER TABLE `pemakaian_obat`
  MODIFY `id_pemakaian_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id_prov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `retur`
--
ALTER TABLE `retur`
  MODIFY `id_retur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_tindakan`
--
ALTER TABLE `trx_tindakan`
  MODIFY `id_trx_tindakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_penerimaan`
--
ALTER TABLE `detail_penerimaan`
  ADD CONSTRAINT `faktur_penrimaan` FOREIGN KEY (`faktur_penerimaan`) REFERENCES `penerimaan` (`faktur_penerimaan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `product_penrimaan` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON UPDATE CASCADE;

--
-- Constraints for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD CONSTRAINT `faktur_penjualan` FOREIGN KEY (`faktur_penjualan`) REFERENCES `penjualan` (`faktur_penjualan`) ON UPDATE CASCADE;

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
-- Constraints for table `mst_suplier`
--
ALTER TABLE `mst_suplier`
  ADD CONSTRAINT `user_input` FOREIGN KEY (`id_mst_pegawai`) REFERENCES `mst_pegawai` (`id_mst_pegawai`) ON UPDATE CASCADE;

--
-- Constraints for table `pemakaian_obat`
--
ALTER TABLE `pemakaian_obat`
  ADD CONSTRAINT `obat_pemakaian` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pasien_pendaftaran` FOREIGN KEY (`id_mst_pasien`) REFERENCES `mst_pasien` (`id_mst_pasien`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pegawai_pendaftaran` FOREIGN KEY (`id_mst_pegawai`) REFERENCES `mst_pegawai` (`id_mst_pegawai`) ON UPDATE CASCADE;

--
-- Constraints for table `penerimaan`
--
ALTER TABLE `penerimaan`
  ADD CONSTRAINT `pegawai_penerimaan` FOREIGN KEY (`id_mst_pegawai`) REFERENCES `mst_pegawai` (`id_mst_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `suplier_penerimaan` FOREIGN KEY (`id_suplier`) REFERENCES `mst_suplier` (`id_suplier`) ON DELETE CASCADE;

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `pegawaipenjualan` FOREIGN KEY (`id_mst_pegawai`) REFERENCES `mst_pegawai` (`id_mst_pegawai`) ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `input_user` FOREIGN KEY (`id_mst_pegawai`) REFERENCES `mst_pegawai` (`id_mst_pegawai`) ON UPDATE CASCADE;

--
-- Constraints for table `trx_tindakan`
--
ALTER TABLE `trx_tindakan`
  ADD CONSTRAINT `pegawai_tindakan` FOREIGN KEY (`id_mst_pegawai`) REFERENCES `mst_pegawai` (`id_mst_pegawai`),
  ADD CONSTRAINT `pendaftaran_tindakan` FOREIGN KEY (`id_trx_pendaftaran`) REFERENCES `pendaftaran` (`id_trx_pendaftaran`);

--
-- Constraints for table `user_login`
--
ALTER TABLE `user_login`
  ADD CONSTRAINT `pegawai_login` FOREIGN KEY (`id_mst_pegawai`) REFERENCES `mst_pegawai` (`id_mst_pegawai`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
