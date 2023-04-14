-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 29, 2022 at 12:37 PM
-- Server version: 5.7.34-log
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sites_simkar`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_auth`
--

CREATE TABLE `tb_auth` (
  `uid` varchar(36) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `karyawan_uid` varchar(36) CHARACTER SET utf8 DEFAULT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role_uid` varchar(36) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_auth`
--

INSERT INTO `tb_auth` (`uid`, `karyawan_uid`, `username`, `password`, `role_uid`) VALUES
('0', NULL, 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL),
('b3737a0a-8552-4bf9-99cf-3db54d69b3ed', '0c9335e2-fc0d-4e27-94c1-12ed4a3943d9', 'user1', '6ad14ba9986e3615423dfca256d04e3f', '5785c23c-77d3-4fb9-ad30-9b580777e544');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bank`
--

CREATE TABLE `tb_bank` (
  `uid` varchar(36) NOT NULL,
  `karyawan_uid` varchar(36) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `no_rekening` varchar(30) NOT NULL,
  `cabang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bank`
--

INSERT INTO `tb_bank` (`uid`, `karyawan_uid`, `nama`, `bank`, `no_rekening`, `cabang`) VALUES
('010e7314-8a01-40b2-ac06-b706566f97aa', '0c9335e2-fc0d-4e27-94c1-12ed4a3943d9', 'Timah', 'BCA', '982634', 'Tangerang'),
('7236654a-2725-4b6e-9035-577bcf3fd8d4', '35f6047a-452d-463c-83a4-82e8cd2243c0', 'Putra', 'BCA', '4878965', 'Tangerang');

-- --------------------------------------------------------

--
-- Table structure for table `tb_department`
--

CREATE TABLE `tb_department` (
  `uid` varchar(36) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_department`
--

INSERT INTO `tb_department` (`uid`, `name`) VALUES
('2a1517ce-f36d-47ee-b938-1dee31948167', 'PRODUCTION'),
('36282135-0559-4c34-a776-6f0e97738846', 'IT'),
('383a1b67-64df-4a7e-8ebc-be1af76edccf', 'ENGINEERING'),
('4e089f1d-4321-4454-84fd-650ce0921533', 'PPIC'),
('52d236f1-1c11-4815-9635-03fe52c5b55d', 'SALES & MARKETING'),
('7bfd7238-d411-4d20-8202-a1577b8bdd55', 'QA / QC'),
('a6dde887-d0fc-407f-b4f4-72ff609b1f7f', 'HC & GA'),
('c77be10e-05af-45d1-a492-c66c30afd50f', 'FINANCE & ACCOUNTING'),
('d05de023-eaa7-4f89-9a5c-5b2559d43e5d', 'PURCHASING'),
('e805fc13-bd5a-4cb9-8c0f-21fd8d8844cc', 'LEGAL CORPORATE');

-- --------------------------------------------------------

--
-- Table structure for table `tb_department_section`
--

CREATE TABLE `tb_department_section` (
  `uid` varchar(36) NOT NULL,
  `department_uid` varchar(36) NOT NULL,
  `name` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_department_section`
--

INSERT INTO `tb_department_section` (`uid`, `department_uid`, `name`) VALUES
('11d69172-a7d6-4044-b67f-5961179456c4', '4e089f1d-4321-4454-84fd-650ce0921533', 'PPC'),
('28a1baff-6336-4ca5-8d96-6743528192f5', '4e089f1d-4321-4454-84fd-650ce0921533', 'MATERIAL WAREHOUSE'),
('29a741e6-1fdf-40d8-9785-7eb33cc9296f', '4e089f1d-4321-4454-84fd-650ce0921533', 'FINISH GOOD'),
('493e7fa7-7437-4c77-90fc-deef1d5ecbfa', 'c77be10e-05af-45d1-a492-c66c30afd50f', 'FINANCE'),
('4b601066-b35f-4055-9e26-7c9042f22dfa', '2a1517ce-f36d-47ee-b938-1dee31948167', 'LEAN PROCESS & SHORT PROCESS'),
('50dfe789-7b22-4e9e-b871-1a3b0809d4c4', '2a1517ce-f36d-47ee-b938-1dee31948167', 'TRIMMING'),
('5e0e8439-da04-489d-a739-122db7d79624', 'a6dde887-d0fc-407f-b4f4-72ff609b1f7f', 'GA'),
('8e71cdc3-1f6b-4a04-a872-15c81f49e2fe', 'c77be10e-05af-45d1-a492-c66c30afd50f', 'ACCOUNTING'),
('904da1d3-18d6-453e-8fbe-f0721738f1c1', '2a1517ce-f36d-47ee-b938-1dee31948167', 'PACKAGING & ASSEMBLY'),
('b533a987-f87b-4465-94a5-dc3ff77daf5c', '7bfd7238-d411-4d20-8202-a1577b8bdd55', 'QC'),
('bc6548c5-9c10-4c7b-8f14-445f36a8f82f', 'a6dde887-d0fc-407f-b4f4-72ff609b1f7f', 'HC'),
('c1c53b05-f5d5-4110-a03c-fee429cc7feb', '2a1517ce-f36d-47ee-b938-1dee31948167', 'OFFICE'),
('c528e224-9b54-476a-98ec-8ce96412c910', '2a1517ce-f36d-47ee-b938-1dee31948167', 'VISUAL INSPECTION'),
('d0315282-cfca-4bb1-974f-afcd7f21bbd0', '2a1517ce-f36d-47ee-b938-1dee31948167', 'METAL TREATMENT'),
('d2572f7b-e2e8-4d97-b435-2e46e4490d61', '2a1517ce-f36d-47ee-b938-1dee31948167', 'MOLDING'),
('dff48dd3-fa66-4777-9b1b-b315aee6e282', '2a1517ce-f36d-47ee-b938-1dee31948167', 'COMPOUNDING'),
('eede886e-bc87-4237-a4f7-506c44a2156d', '7bfd7238-d411-4d20-8202-a1577b8bdd55', 'QA'),
('f09e385f-5e0d-4fd5-b5eb-a9faaff1b887', '2a1517ce-f36d-47ee-b938-1dee31948167', 'LEAN PROCESS & SHORT PROCESS');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `uid` varchar(36) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`uid`, `name`) VALUES
('086d118e-4c5c-46a6-bb82-3d5bb3fe4875', 'CORPORATE PLANNING MANAGER'),
('0facf5e7-82c4-4ee3-b8eb-584e848f60ff', 'OPERATOR'),
('10ea74c7-7b71-4b03-a9ae-7338b0a56821', 'DIREKTUR PRESIDEN'),
('175b07bf-0d1e-46d0-a815-633a63f4b038', 'SUB SECTION HEAD'),
('33e08400-d686-4af4-a1d0-cf409a6ac130', 'STAFF'),
('3629c517-54b7-479b-bc2e-6c2a5a423459', 'ADM STAFF'),
('59e72e74-a4a1-4a70-ad6b-89b3d02234a9', 'GENERAL MANAGER'),
('6263f8d7-e181-4251-a975-c477363ee9fb', 'BOD'),
('8adb4516-85e6-4d52-b0b9-a514e6f10eba', 'ASISSTEN MANAGER'),
('ab51cfb1-b79f-4687-b9e4-32e68ffa9fa9', 'FOREMAN'),
('bee67329-977d-41c0-8c66-54181c6d3719', 'OWNER'),
('e94f4f3d-ea1e-4f60-8fdc-cdad281427d1', 'DIREKTUR'),
('f3662959-fd99-4037-af27-9bebe357d8f2', 'MANAGER'),
('fb6c300d-a3a2-4add-825c-1ee1d2806cdc', 'SECTION HEAD');

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `uid` varchar(36) NOT NULL,
  `npk` varchar(10) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `department_uid` varchar(36) NOT NULL,
  `section_uid` varchar(36) DEFAULT NULL,
  `jabatan_uid` varchar(36) NOT NULL,
  `alamat` text NOT NULL,
  `alamat_domisili` text NOT NULL,
  `status_nikah` varchar(16) NOT NULL,
  `status_kerja` int(11) NOT NULL DEFAULT '1',
  `jkel` varchar(10) NOT NULL,
  `tlp` varchar(13) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `npwp` varchar(20) NOT NULL,
  `kebangsaan` varchar(50) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `jumlah_anak` varchar(20) NOT NULL,
  `golongan_darah` varchar(5) NOT NULL,
  `bpjs_kes` varchar(20) NOT NULL,
  `bpjs_tk` varchar(20) NOT NULL,
  `foto` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`uid`, `npk`, `nik`, `nama`, `department_uid`, `section_uid`, `jabatan_uid`, `alamat`, `alamat_domisili`, `status_nikah`, `status_kerja`, `jkel`, `tlp`, `tempat_lahir`, `tanggal_lahir`, `email`, `npwp`, `kebangsaan`, `agama`, `jumlah_anak`, `golongan_darah`, `bpjs_kes`, `bpjs_tk`, `foto`) VALUES
('0c9335e2-fc0d-4e27-94c1-12ed4a3943d9', 'K8320', '12345', 'Angga Kurniawan Budi', '4e089f1d-4321-4454-84fd-650ce0921533', NULL, '33e08400-d686-4af4-a1d0-cf409a6ac130', 'Depok', 'Binong Tangerang', 'Menikah', 2, 'Laki-Laki', '0812365466', 'Depok', '1986-09-25', 'aan@gmail.com', '4564325', 'WNI', 'Protestan', '0', 'A', '112233', '112233', '11.png'),
('35f6047a-452d-463c-83a4-82e8cd2243c0', 'K7777', '223344', 'Putra', '2a1517ce-f36d-47ee-b938-1dee31948167', 'd2572f7b-e2e8-4d97-b435-2e46e4490d61', '0facf5e7-82c4-4ee3-b8eb-584e848f60ff', 'Tangerang', 'Kadu', 'Menikah', 1, 'Laki-Laki', '0799768796', 'Tangerang', '1990-03-20', 'putra@gmail.com', '97810', 'WNI', 'Islam', '', 'O', '09732r', '83279', 'ca20be2c-bfa4-43b5-9e73-6911a4b6798a1.png'),
('456f0a14-5406-443a-a1ad-6bd70e503311', 'K8122', '54321', 'Putri', 'c77be10e-05af-45d1-a492-c66c30afd50f', '493e7fa7-7437-4c77-90fc-deef1d5ecbfa', '33e08400-d686-4af4-a1d0-cf409a6ac130', 'Tangerang', 'Curug Tangerang', 'Menikah', 1, 'Laki-Laki', '0812365466', 'Bogor', '1991-08-20', 'dsfj@gmail.com', '6541123', 'WNI', 'Hindu', '', 'A', '123456', '165432', '2753c890-4d71-40a9-985a-99b7170415321.png'),
('5ae9fe9c-08cc-44e5-9915-793e2c12d9be', 'K8112', '123', 'Nina Putri', 'e805fc13-bd5a-4cb9-8c0f-21fd8d8844cc', NULL, '175b07bf-0d1e-46d0-a815-633a63f4b038', 'Medan', 'Curug Tangerang', 'Menikah', 1, 'Perempuan', '0811222', 'Bogor', '1982-06-23', 'siti@gmail.com', '6541123', 'WNI', 'Islam', 'Lebih dari 4', 'A', '55443', '55443', 'd7d4ea2d-ecc5-414f-9289-9a4696fb73dd1.jpg'),
('9cce5a37-cd57-4ad3-a2d8-32080a29eaa7', 'K8633', '54321', 'Mawar Sari', '52d236f1-1c11-4815-9635-03fe52c5b55d', NULL, 'fb6c300d-a3a2-4add-825c-1ee1d2806cdc', 'Jakarta', 'Rajeg Tangerang', 'Belum Menikah', 1, 'Perempuan', '0812365466', 'Jakarta', '1993-09-11', 'sari@gmail.com', '868541', 'WNI', 'Islam', '0', 'O', '165432', '165432', '9cce5a37-cd57-4ad3-a2d8-32080a29eaa71.jpg'),
('ad197594-ae21-46a7-a10e-f11147259e5d', 'K8123', '54321', 'Susi Susanti', 'a6dde887-d0fc-407f-b4f4-72ff609b1f7f', '5e0e8439-da04-489d-a739-122db7d79624', '33e08400-d686-4af4-a1d0-cf409a6ac130', 'Depok', 'Karawaci Tangerang', 'Menikah', 1, 'Laki-Laki', '0878654987', '', '0000-00-00', 'susi@gmail.com', '4564325', 'WNI', 'Islam', '', 'O', '55443', '165432', '1ee4d605-afdd-4cfe-a9f0-7ca6f711a9011.jpg'),
('b9d22819-249c-4c24-9c63-9eceb0e3ccc3', 'K8811', '11223', 'Abdul', '2a1517ce-f36d-47ee-b938-1dee31948167', 'c528e224-9b54-476a-98ec-8ce96412c910', '0facf5e7-82c4-4ee3-b8eb-584e848f60ff', 'Jakarta', 'Karawaci Tangerang', 'Menikah', 1, 'Laki-Laki', '0878654987', 'Tangerang', '0000-00-00', 'abdul@gmail.com', '4564324', 'WNI', 'Islam', '', 'AA', '165432', '665533', NULL),
('d68df906-5eed-49fb-9551-705b945dda5c', 'K8888', '11223', 'Rian Dede', '36282135-0559-4c34-a776-6f0e97738846', NULL, 'f3662959-fd99-4037-af27-9bebe357d8f2', 'Karawang', 'Binong Tangerang', 'Menikah', 1, 'Laki-Laki', '0878654987', 'Malang', '1980-08-20', 'rian@gmail.com', '868541', 'WNI', 'Islam', '', 'O', '28542', '68352', 'd68df906-5eed-49fb-9551-705b945dda5c1.jpg'),
('df09b97b-1ace-4ca3-8718-cf43905cc895', 'K7011', '123', 'Tohang Siregar', '4e089f1d-4321-4454-84fd-650ce0921533', '29a741e6-1fdf-40d8-9785-7eb33cc9296f', '33e08400-d686-4af4-a1d0-cf409a6ac130', 'Karawang', 'Kadu Tangerang', 'Menikah', 1, 'Laki-Laki', '0812365466', 'Malang', '1980-08-16', 'abdul@gmail.com', '4564325', 'WNI', 'Hindu', '1', 'O', '123456', '123456', 'd4721044-d9ff-4e23-acbc-1fd3a9dc9a511.jpg'),
('ee030b53-c6bd-466b-b4bd-019202a0c49b', 'K7123', '987654321', 'Satria Puji', 'd05de023-eaa7-4f89-9a5c-5b2559d43e5d', NULL, 'fb6c300d-a3a2-4add-825c-1ee1d2806cdc', 'Tangerang', 'Kadu Tangerang', 'Belum Menikah', 1, 'Laki-Laki', '0812345677', 'Tangerang', '1996-02-11', 'satria@gmail.com', '6541123', 'WNI', 'Islam', '0', 'A+', '136644', '123456', 'ee030b53-c6bd-466b-b4bd-019202a0c49b1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keluarga`
--

CREATE TABLE `tb_keluarga` (
  `uid` varchar(36) NOT NULL,
  `karyawan_uid` varchar(36) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `hubungan` varchar(50) NOT NULL,
  `no_kk` varchar(30) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_keluarga`
--

INSERT INTO `tb_keluarga` (`uid`, `karyawan_uid`, `nama`, `hubungan`, `no_kk`, `tempat_lahir`, `tanggal_lahir`) VALUES
('09ed20c0-15b7-46b3-bc42-30659e13c1ab', '456f0a14-5406-443a-a1ad-6bd70e503311', 'Abdul', 'Suami', '567890', 'Jakarta', '1993-11-02'),
('2fcaab91-10c8-4dba-b041-ac39335ac492', '0c9335e2-fc0d-4e27-94c1-12ed4a3943d9', 'Andi', 'Anak', '8753219', 'Jakarta', '2009-05-17'),
('5d362a9c-f088-4724-936d-405a8fea2650', '0c9335e2-fc0d-4e27-94c1-12ed4a3943d9', 'Ayu', 'Istri', '8753219', 'Jakarta', '1991-12-06'),
('676afb17-ab02-4bc4-aed8-9a48ec58ebfd', '35f6047a-452d-463c-83a4-82e8cd2243c0', 'Bunga', 'Istri', '1589561', 'Jakarta', '1991-02-27');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kontak`
--

CREATE TABLE `tb_kontak` (
  `uid` varchar(36) NOT NULL,
  `karyawan_uid` varchar(36) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `hubungan` varchar(50) NOT NULL,
  `tlp` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kontak`
--

INSERT INTO `tb_kontak` (`uid`, `karyawan_uid`, `nama`, `hubungan`, `tlp`, `alamat`) VALUES
('de303696-f949-47d5-b874-5bdb75050134', '0c9335e2-fc0d-4e27-94c1-12ed4a3943d9', 'Abdul', 'Kakak', '823649283', 'Kadu'),
('f6ace6b7-125f-4ac8-8d40-02d2d7fff864', '35f6047a-452d-463c-83a4-82e8cd2243c0', 'Bunga', 'Istri', '564984', 'Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kontrak`
--

CREATE TABLE `tb_kontrak` (
  `uid` varchar(36) NOT NULL,
  `karyawan_uid` varchar(36) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_keluar` date NOT NULL,
  `status_kontrak` varchar(30) NOT NULL,
  `start` date NOT NULL,
  `finish` date NOT NULL,
  `surat_kontrak` varchar(50) NOT NULL,
  `kontrak_ke` varchar(20) NOT NULL,
  `status_karyawan` varchar(30) NOT NULL,
  `surat_permanen` varchar(50) NOT NULL,
  `tgl_permanen` date NOT NULL,
  `lok_kerja` varchar(20) NOT NULL,
  `team` varchar(20) NOT NULL,
  `grade` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kontrak`
--

INSERT INTO `tb_kontrak` (`uid`, `karyawan_uid`, `tgl_masuk`, `tgl_keluar`, `status_kontrak`, `start`, `finish`, `surat_kontrak`, `kontrak_ke`, `status_karyawan`, `surat_permanen`, `tgl_permanen`, `lok_kerja`, `team`, `grade`) VALUES
('4e4d095d-8776-4c36-8ea6-ab828b7c259d', '35f6047a-452d-463c-83a4-82e8cd2243c0', '2016-01-15', '0000-00-00', 'Kontrak', '2016-01-15', '2017-01-14', '456/ARS/I/2016', '1', 'Permanen', '789/ARS/II/2017', '2017-01-15', 'Office', '-', 'IIIF'),
('a0cc7435-f8c6-44c4-8599-d6224e8645ad', '0c9335e2-fc0d-4e27-94c1-12ed4a3943d9', '2015-10-20', '0000-00-00', '-', '0000-00-00', '0000-00-00', '', '', 'Permanen', '789/ARS/II/2017', '2017-08-11', 'Office', '-', 'IIA'),
('a3bc14dd-1d3d-4a9d-9451-7cc3272bbc18', '0c9335e2-fc0d-4e27-94c1-12ed4a3943d9', '2015-10-20', '0000-00-00', 'PKWT', '2015-10-20', '2016-10-20', '456/ARS/I/2016', '1', 'Kontrak', '', '0000-00-00', 'Office', '-', 'IIA');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendidikan`
--

CREATE TABLE `tb_pendidikan` (
  `uid` varchar(36) NOT NULL,
  `karyawan_uid` varchar(36) NOT NULL,
  `nama_pendidikan` varchar(100) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `jenjang` varchar(5) NOT NULL,
  `tahun` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pendidikan`
--

INSERT INTO `tb_pendidikan` (`uid`, `karyawan_uid`, `nama_pendidikan`, `jurusan`, `jenjang`, `tahun`) VALUES
('118be78e-bec3-4391-a596-27d836819ec1', '35f6047a-452d-463c-83a4-82e8cd2243c0', 'SMKN 1 Jakarta', 'Mesin', 'SMK', 2015),
('906f11e4-ea0c-4c86-8430-4a699788990c', '0c9335e2-fc0d-4e27-94c1-12ed4a3943d9', 'Univ Indonesia', 'Sastra', 'S-1', 2015);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengalaman`
--

CREATE TABLE `tb_pengalaman` (
  `uid` varchar(36) NOT NULL,
  `karyawan_uid` varchar(36) NOT NULL,
  `perusahaan` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `periode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengalaman`
--

INSERT INTO `tb_pengalaman` (`uid`, `karyawan_uid`, `perusahaan`, `jabatan`, `periode`) VALUES
('ee80923b-19eb-4893-8bc5-502abe4e7f6d', '0c9335e2-fc0d-4e27-94c1-12ed4a3943d9', 'PT ABC', 'Staff', '2010-2011'),
('faf21d9d-e8bb-41f6-bd47-2e2b5296e7bc', '35f6047a-452d-463c-83a4-82e8cd2243c0', 'PT A', 'Staff', '2016 - 2017');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penilaian`
--

CREATE TABLE `tb_penilaian` (
  `uid` varchar(36) NOT NULL,
  `karyawan_uid` varchar(36) NOT NULL,
  `tahun` int(11) NOT NULL,
  `nilai` varchar(20) NOT NULL,
  `catatan` text NOT NULL,
  `talent_full` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penilaian`
--

INSERT INTO `tb_penilaian` (`uid`, `karyawan_uid`, `tahun`, `nilai`, `catatan`, `talent_full`) VALUES
('220938a2-444e-42d1-b8aa-7cf911c332ed', '0c9335e2-fc0d-4e27-94c1-12ed4a3943d9', 2009, 'B', 'Good', 'Ya');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peringatan`
--

CREATE TABLE `tb_peringatan` (
  `uid` varchar(36) NOT NULL,
  `karyawan_uid` varchar(36) NOT NULL,
  `status` varchar(30) NOT NULL,
  `komentar` varchar(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_peringatan`
--

INSERT INTO `tb_peringatan` (`uid`, `karyawan_uid`, `status`, `komentar`, `tanggal`) VALUES
('776f4353-9b50-4887-bd88-ea5a8802f0fc', '0c9335e2-fc0d-4e27-94c1-12ed4a3943d9', 'Peringatan Lisan', 'Bolos', '2018-03-05'),
('85edf2e3-09e9-445a-8d26-37b798b01818', '35f6047a-452d-463c-83a4-82e8cd2243c0', 'SP 1', 'Malas', '2016-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `tb_promosi`
--

CREATE TABLE `tb_promosi` (
  `uid` varchar(36) NOT NULL,
  `karyawan_uid` varchar(36) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `tgl` date NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `alasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_promosi`
--

INSERT INTO `tb_promosi` (`uid`, `karyawan_uid`, `keterangan`, `tgl`, `no_surat`, `alasan`) VALUES
('758aa01f-8715-4cab-a323-9724cd670a66', '0c9335e2-fc0d-4e27-94c1-12ed4a3943d9', 'Mutasi', '2017-05-15', '12345/ARS/V/2017', 'kurang orang');

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `uid` varchar(36) NOT NULL,
  `name` varchar(36) NOT NULL,
  `permission` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`uid`, `name`, `permission`) VALUES
('5785c23c-77d3-4fb9-ad30-9b580777e544', 'Manager', '{\"dashboardRead\":\"on\",\"masterDataRead\":\"on\",\"masterDataCreate\":\"on\",\"masterDataUpdate\":\"on\",\"masterDataDelete\":\"on\",\"karyawanRead\":\"on\",\"monitoringRead\":\"on\"}');

-- --------------------------------------------------------

--
-- Table structure for table `tb_training`
--

CREATE TABLE `tb_training` (
  `uid` varchar(36) NOT NULL,
  `karyawan_uid` varchar(36) NOT NULL,
  `nama_training` varchar(100) NOT NULL,
  `penyelenggara` varchar(100) NOT NULL,
  `tahun` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_training`
--

INSERT INTO `tb_training` (`uid`, `karyawan_uid`, `nama_training`, `penyelenggara`, `tahun`, `keterangan`) VALUES
('4bf94da4-f299-4499-bb48-f27487e171c7', '0c9335e2-fc0d-4e27-94c1-12ed4a3943d9', 'Bahasa', 'ABC', 2009, 'Non Certified'),
('b5b6e5ca-aaad-46ad-a4dd-10d878fea505', '35f6047a-452d-463c-83a4-82e8cd2243c0', 'Bahasa', 'A', 2007, 'Non Certified');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_auth`
--
ALTER TABLE `tb_auth`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tb_bank`
--
ALTER TABLE `tb_bank`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `tb_department`
--
ALTER TABLE `tb_department`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `tb_department_section`
--
ALTER TABLE `tb_department_section`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `tb_keluarga`
--
ALTER TABLE `tb_keluarga`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `tb_kontak`
--
ALTER TABLE `tb_kontak`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `tb_kontrak`
--
ALTER TABLE `tb_kontrak`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `tb_pengalaman`
--
ALTER TABLE `tb_pengalaman`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `tb_peringatan`
--
ALTER TABLE `tb_peringatan`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `tb_promosi`
--
ALTER TABLE `tb_promosi`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `tb_training`
--
ALTER TABLE `tb_training`
  ADD PRIMARY KEY (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
