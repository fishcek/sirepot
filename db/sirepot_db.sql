-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2021 at 04:30 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sirepot_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_asesmen`
--

CREATE TABLE `tb_asesmen` (
  `idAses` varchar(50) NOT NULL,
  `tanggalAsesmen` date DEFAULT NULL,
  `Ke1` varchar(1) NOT NULL,
  `Ke2` varchar(1) NOT NULL,
  `Ke3` varchar(1) NOT NULL,
  `Ke4` varchar(1) NOT NULL,
  `Ke5` varchar(1) NOT NULL,
  `Ke6` varchar(1) NOT NULL,
  `Ke7` varchar(1) NOT NULL,
  `Ke8` varchar(1) NOT NULL,
  `Ke9` varchar(1) NOT NULL,
  `Ke10` varchar(1) NOT NULL,
  `Ke11` varchar(1) NOT NULL,
  `Ke12` varchar(1) NOT NULL,
  `Ke13` varchar(1) NOT NULL,
  `Ke14` varchar(1) NOT NULL,
  `Ke15` varchar(1) NOT NULL,
  `Ke16` varchar(1) NOT NULL,
  `Ke17` varchar(1) NOT NULL,
  `Ke18` varchar(1) NOT NULL,
  `Ke19` varchar(1) NOT NULL,
  `Ke20` varchar(1) NOT NULL,
  `skorDataKelahiran` float NOT NULL,
  `kesimpulanDataKelahiran` text NOT NULL,
  `RekomendasiDataKelahiran` text NOT NULL,
  `so1` varchar(1) NOT NULL,
  `so2` varchar(1) NOT NULL,
  `so3` varchar(1) NOT NULL,
  `so4` varchar(1) NOT NULL,
  `so5` varchar(1) NOT NULL,
  `so6` varchar(1) NOT NULL,
  `so7` varchar(1) NOT NULL,
  `so8` varchar(1) NOT NULL,
  `so9` varchar(1) NOT NULL,
  `so10` varchar(1) NOT NULL,
  `skorSosial` float NOT NULL,
  `kesimpulanSosial` text NOT NULL,
  `rekomendasiSosial` text NOT NULL,
  `sp1` varchar(1) NOT NULL,
  `sp2` varchar(1) NOT NULL,
  `sp3` varchar(1) NOT NULL,
  `sp4` varchar(1) NOT NULL,
  `sp5` varchar(1) NOT NULL,
  `sp6` varchar(1) NOT NULL,
  `sp7` varchar(1) NOT NULL,
  `sp8` varchar(1) NOT NULL,
  `sp9` varchar(1) NOT NULL,
  `sp10` varchar(1) NOT NULL,
  `skorSpiritual` float NOT NULL,
  `kesimpulanSpiritual` text NOT NULL,
  `RekomendasiSpiritual` text NOT NULL,
  `pe1` varchar(1) NOT NULL,
  `pe2` varchar(1) NOT NULL,
  `pe3` varchar(1) NOT NULL,
  `pe4` varchar(1) NOT NULL,
  `pe5` varchar(1) NOT NULL,
  `pe6` varchar(1) NOT NULL,
  `pe7` varchar(1) NOT NULL,
  `pe8` varchar(1) NOT NULL,
  `pe9` varchar(1) NOT NULL,
  `pe10` varchar(1) NOT NULL,
  `pe11` varchar(1) NOT NULL,
  `pe12` varchar(1) NOT NULL,
  `pe13` varchar(1) NOT NULL,
  `pe14` varchar(1) NOT NULL,
  `pe15` varchar(1) NOT NULL,
  `pe16` varchar(1) NOT NULL,
  `pe17` varchar(1) NOT NULL,
  `pe18` varchar(1) NOT NULL,
  `pe19` varchar(1) NOT NULL,
  `pe20` varchar(1) NOT NULL,
  `skorPenglihatan` float NOT NULL,
  `kesimpulanPenglihatan` text NOT NULL,
  `rekomendasiPenglihatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_ortu`
--

CREATE TABLE `tb_ortu` (
  `idOrtu` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `umur` varchar(2) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `tempatLahir` varchar(50) NOT NULL,
  `tanggalLahir` date NOT NULL,
  `nomorKTP` varchar(15) NOT NULL,
  `noTelp` varchar(13) NOT NULL,
  `type` varchar(5) NOT NULL,
  `idPasien` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ortu`
--

INSERT INTO `tb_ortu` (`idOrtu`, `nama`, `umur`, `jk`, `agama`, `pekerjaan`, `alamat`, `tempatLahir`, `tanggalLahir`, `nomorKTP`, `noTelp`, `type`, `idPasien`) VALUES
('OR2307211', 'Nanang sutisna', '47', 'L', 'islam', 'Pegawai swasta', 'Jl. padalembut no.33 ', 'Bandung', '1974-03-01', '327123456789000', '088812345678', 'ayah', 'PS23072021130620001'),
('OR2307212', 'Nana kurniasih', '45', 'P', 'islam', 'Wirausaha', 'Jl. padalembut no.33', 'Cianjur', '1976-12-10', '327987654321000', '087712345678', 'ibu', 'PS23072021130620001'),
('OR2307213', 'Destriana rizkia', '26', 'P', 'islam', 'Karyawan swasta', 'Jl. padalembut no. 33', 'Bandung', '1995-03-11', '327112233445000', '0875723287128', 'wali', 'PS23072021130620001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `idPasien` varchar(50) NOT NULL,
  `namaPasien` varchar(100) NOT NULL,
  `tempatLahir` varchar(100) NOT NULL,
  `tanggalLahir` date NOT NULL,
  `tanggalMasukPanti` date NOT NULL,
  `anak` int(2) NOT NULL,
  `jenisKelaminPasien` varchar(2) NOT NULL,
  `agamaPasien` varchar(20) NOT NULL,
  `pendidikanPasien` varchar(50) NOT NULL,
  `statusPasien` varchar(20) NOT NULL,
  `golPasien` varchar(3) NOT NULL,
  `kerjaanPasien` varchar(50) NOT NULL,
  `jmlSaudaraPasien` int(2) NOT NULL,
  `kelDekatPasien` varchar(20) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `statAktif` int(1) NOT NULL,
  `idOrtu` varchar(50) NOT NULL,
  `idAses` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pasien`
--

INSERT INTO `tb_pasien` (`idPasien`, `namaPasien`, `tempatLahir`, `tanggalLahir`, `tanggalMasukPanti`, `anak`, `jenisKelaminPasien`, `agamaPasien`, `pendidikanPasien`, `statusPasien`, `golPasien`, `kerjaanPasien`, `jmlSaudaraPasien`, `kelDekatPasien`, `foto`, `statAktif`, `idOrtu`, `idAses`) VALUES
('PS23072021130620001', 'Seblakia Cekeriawati', 'Warung', '2000-06-13', '2021-07-23', 3, 'P', 'islam', 'S3', 'Kawin Silang', 'B', 'Ngegoreng', 5, '085795851674', 'PS23072021130620001.jpg', 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `kode` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(7) NOT NULL,
  `tanggalInput` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`kode`, `nama`, `email`, `username`, `password`, `level`, `tanggalInput`) VALUES
('US0160721002', 'Nathan Al-Rizqi', 'nathanalrizqi20@gmail.com', 'admin', '$2y$10$mc5y1Xhy9zPpdBblLYDR0eTTyAZ8JE8LKMtomuugUY33p/xakSp3W', 'Adm', '2021-07-17'),
('US1160721001', 'Anatasya Trivia Wulandari', 'Anatasya12@gmail.com', 'fo', '$2y$10$S6ZHfJZNWqy8DFF7s30fHuNxfjHG9grr0HflR2CguNirVkBJ9ziAS', 'Fo', '2021-07-17'),
('US2160721003', 'Dira Amanda', 'diraamanda123@gmail.com', 'peksos', '$2y$10$zudzuuvuco4FBfDajMlaWOsEJOvUNdtXZvy8WtcDTHUWkJvcU3oTS', 'Peksos', '2021-07-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_asesmen`
--
ALTER TABLE `tb_asesmen`
  ADD PRIMARY KEY (`idAses`);

--
-- Indexes for table `tb_ortu`
--
ALTER TABLE `tb_ortu`
  ADD PRIMARY KEY (`idOrtu`);

--
-- Indexes for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`idPasien`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`kode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
