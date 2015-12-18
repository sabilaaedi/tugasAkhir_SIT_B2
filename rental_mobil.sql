-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2015 at 12:10 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rental_mobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE IF NOT EXISTS `driver` (
`id_driver` int(11) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `alamat` varchar(40) DEFAULT NULL,
  `jk` varchar(1) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id_driver`, `nama`, `alamat`, `jk`, `telepon`, `id_perusahaan`) VALUES
(1, 'Sabila', 'Yogyakarta', 'L', '08621939844', 1),
(2, 'Nisrina Nur', 'Ponorogo', 'L', '085214748111', 2),
(3, 'Nicholas Saputra', 'Magelang', 'L', '085123456', 2),
(4, 'Justin Timberlake', 'Klaten', 'L', '085777123456', 1),
(5, 'Rudy Rudyan', 'Sleman', 'L', '0899123456', 1),
(6, 'Husni', 'Magelang', 'P', '0768123456', 2),
(7, 'Komarudin', 'Klaten', 'L', '0987123456', 1),
(8, 'Amirudin', 'Solo', 'L', '098123456', 2),
(9, 'Syarifudin', 'Bantul', 'L', '0877123456', 2),
(10, 'Amirudin', 'Kulonprogo', 'L', '0896123456', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE IF NOT EXISTS `mobil` (
`id_mobil` int(11) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `no_plat` varchar(10) DEFAULT NULL,
  `jumlah_seat` int(11) DEFAULT NULL,
  `merk` varchar(30) DEFAULT NULL,
  `thn_buat` int(11) DEFAULT NULL,
  `warna` varchar(10) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `jumlah_mobil` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `id_perusahaan`, `no_plat`, `jumlah_seat`, `merk`, `thn_buat`, `warna`, `harga`, `jumlah_mobil`) VALUES
(1, 1, 'Z 3 TRA', 7, 'Daihatsu Xenia', 2011, 'Silver', 350000, 4),
(2, 2, 'B 4 LA', 5, 'Toyota Avanza', 2003, 'Hitam', 650000, 8),
(3, 1, 'AD 4 W', 10, 'Nissan Grand Livina', 2008, 'Putih ', 450000, 7),
(4, 2, 'AB 4 L', 8, 'Toyota Agya', 2009, 'Silver', 500000, 7),
(5, 1, 'D 3 NAK', 7, 'Honda Mobilio', 2015, 'Putih ', 650000, 4),
(6, 2, 'M 4 SIH', 5, 'Nissan Juke', 2013, 'Abu-abu', 650000, 3),
(7, 2, 'S 11 P', 12, 'Daihatsu Taruna', 2012, 'Hitam', 750000, 5),
(8, 1, 'G 3 DE', 7, 'Honda HRV', 2012, 'Hijau Tua', 900000, 2),
(9, 2, 'AB 1 S', 12, 'Suzuki APV', 2014, 'Gold', 500000, 5),
(10, 1, 'AP 1 K', 5, 'Honda Freed', 2011, 'Biru', 500000, 3),
(11, 2, 'AB 564 DE', 10, 'Daihatsu Ayla', 2014, 'Putih', 650000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `penyewaan`
--

CREATE TABLE IF NOT EXISTS `penyewaan` (
`id_penyewaan` int(11) NOT NULL,
  `id_mobil` int(11) DEFAULT NULL,
  `id_driver` int(11) DEFAULT NULL,
  `no_identitas` varchar(30) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(60) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `tgl_sewa` date DEFAULT NULL,
  `total_hari` int(11) DEFAULT NULL,
  `jumlah_sewa` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `penyewaan`
--

INSERT INTO `penyewaan` (`id_penyewaan`, `id_mobil`, `id_driver`, `no_identitas`, `nama`, `alamat`, `telepon`, `email`, `tgl_sewa`, `total_hari`, `jumlah_sewa`) VALUES
(7, 1, NULL, '344601', 'Aris Gunawan', 'Pogung Lor', '9175186350', 'arisgunawan@gmail.com', '2015-12-01', 4, 1),
(8, 1, NULL, '344567', 'Himma Turrodiyah', 'Magelang', '027356917', 'himmaturodiyah@yahoo.co.id', '2015-12-15', 3, 1),
(9, 1, NULL, '12937923', 'sabila', 'tegal', '09343840231', 'sabilaaedi@gmail.com', '2005-09-02', 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE IF NOT EXISTS `perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `nama_perusahaan` varchar(30) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `nama_perusahaan`, `alamat`, `telepon`) VALUES
(1, 'Jaya Selalu', 'Magelang', '085743618565'),
(2, 'Kharisma', 'Semarang', '087575656666');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
 ADD PRIMARY KEY (`id_driver`), ADD KEY `id_perusahaan` (`id_perusahaan`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
 ADD PRIMARY KEY (`id_mobil`), ADD KEY `id_perusahaan` (`id_perusahaan`);

--
-- Indexes for table `penyewaan`
--
ALTER TABLE `penyewaan`
 ADD PRIMARY KEY (`id_penyewaan`), ADD KEY `id_driver` (`id_driver`), ADD KEY `id_mobil` (`id_mobil`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
 ADD PRIMARY KEY (`id_perusahaan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
MODIFY `id_driver` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `penyewaan`
--
ALTER TABLE `penyewaan`
MODIFY `id_penyewaan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `driver`
--
ALTER TABLE `driver`
ADD CONSTRAINT `driver_ibfk_1` FOREIGN KEY (`id_perusahaan`) REFERENCES `perusahaan` (`id_perusahaan`);

--
-- Constraints for table `mobil`
--
ALTER TABLE `mobil`
ADD CONSTRAINT `mobil_ibfk_1` FOREIGN KEY (`id_perusahaan`) REFERENCES `perusahaan` (`id_perusahaan`);

--
-- Constraints for table `penyewaan`
--
ALTER TABLE `penyewaan`
ADD CONSTRAINT `penyewaan_ibfk_1` FOREIGN KEY (`id_driver`) REFERENCES `driver` (`id_driver`),
ADD CONSTRAINT `penyewaan_ibfk_2` FOREIGN KEY (`id_mobil`) REFERENCES `mobil` (`id_mobil`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
