-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2022 at 09:21 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siwali`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `admin_view`
-- (See below for the actual view)
--
CREATE TABLE `admin_view` (
`kodeUnik` varchar(20)
,`nama` varchar(255)
,`kodeKelas` varchar(20)
,`alamat` varchar(100)
,`telepon` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `avgnilai`
-- (See below for the actual view)
--
CREATE TABLE `avgnilai` (
`NIS` int(11)
,`absen` int(11)
,`AVGNilai` decimal(19,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `NIP` varchar(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kodeKelas` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`NIP`, `nama`, `kodeKelas`, `password`, `alamat`, `telepon`) VALUES
('2008561065', 'Dewa Bayu', 'MIPA1', 'bayu', 'Denpasar Barat', '082345167116'),
('2008561099', 'Agung Adi', 'IIS1', 'agung', 'Sanur', '082223332223');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kodeKelas` varchar(10) NOT NULL,
  `jurusan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kodeKelas`, `jurusan`) VALUES
('IBB1', 'IBB'),
('IBB2', 'IBB'),
('IBB3', 'IBB'),
('IIS1', 'IIS'),
('IIS2', 'IIS'),
('IIS3', 'IIS'),
('MIPA1', 'MIPA'),
('MIPA2', 'MIPA'),
('MIPA3', 'MIPA');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `NIP` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `matapelajaran`
--

CREATE TABLE `matapelajaran` (
  `kodeMapel` varchar(20) NOT NULL,
  `namaMapel` varchar(20) NOT NULL,
  `jurusan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matapelajaran`
--

INSERT INTO `matapelajaran` (`kodeMapel`, `namaMapel`, `jurusan`) VALUES
('BBI', 'Bahasa Bali ', 'IBB'),
('BIG', 'Bahasa Inggris', 'IBB'),
('BIN', 'Bahasa Indonesia', 'IBB'),
('BIO', 'Biologi', 'MIPA'),
('BJP', 'Bahasa Jepang', 'IBB'),
('EKM', 'Ekonomi', 'IIS'),
('FIS', 'Fisika', 'MIPA'),
('GEO', 'Geografi', 'IIS'),
('KIM', 'Kimia', 'MIPA'),
('MTK', 'Matematika', 'MIPA'),
('SJR', 'Sejarah', 'IIS'),
('SOS', 'Sosiologi', 'IIS');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `NIS` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `kodeMapel` varchar(20) DEFAULT NULL,
  `nilaiTugas` int(11) DEFAULT NULL,
  `nilaiQuiz` int(11) DEFAULT NULL,
  `nilaiUTS` int(11) DEFAULT NULL,
  `nilaiUAS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`NIS`, `id`, `kodeMapel`, `nilaiTugas`, `nilaiQuiz`, `nilaiUTS`, `nilaiUAS`) VALUES
(41, 151, 'BIO', 80, 70, 90, 60),
(41, 152, 'FIS', 90, 80, 70, 60),
(41, 153, 'KIM', 90, 70, 80, 60),
(41, 154, 'MTK', 90, 80, 70, 80),
(42, 155, 'BIO', 70, 90, 90, 80),
(42, 156, 'FIS', 80, 80, 80, 70),
(42, 157, 'KIM', 80, 60, 70, 60),
(42, 158, 'MTK', 60, 70, 60, 50),
(43, 159, 'BIO', 0, 0, 0, 0),
(43, 160, 'FIS', 0, 0, 0, 0),
(43, 161, 'KIM', 0, 0, 0, 0),
(43, 162, 'MTK', 0, 0, 0, 0),
(44, 163, 'BIO', 0, 0, 0, 0),
(44, 164, 'FIS', 0, 0, 0, 0),
(44, 165, 'KIM', 0, 0, 0, 0),
(44, 166, 'MTK', 0, 0, 0, 0),
(45, 167, 'EKM', 0, 0, 0, 80),
(45, 168, 'GEO', 0, 0, 80, 0),
(45, 169, 'SJR', 0, 80, 0, 0),
(45, 170, 'SOS', 80, 0, 0, 0),
(46, 171, 'EKM', 0, 0, 0, 0),
(46, 172, 'GEO', 0, 0, 0, 0),
(46, 173, 'SJR', 0, 0, 0, 0),
(46, 174, 'SOS', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `NIS` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `absen` int(11) DEFAULT NULL,
  `kodeKelas` varchar(20) DEFAULT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`NIS`, `nama`, `absen`, `kodeKelas`, `alamat`, `telepon`) VALUES
(41, 'Dewa Agus', 1, 'MIPA1', 'Ubud', '089098766787'),
(42, 'Bagus Wirata', 2, 'MIPA1', 'Badung, Jimbaran', '086654453112'),
(43, 'Budhiarta Suputra', 3, 'MIPA1', 'Buleleng, Pance Sari', '082654551456'),
(44, 'Bagus sanjaya', 4, 'MIPA1', 'Denpasar utara', '081112223321'),
(45, 'Widia Anjani', 1, 'IIS1', 'Nusadua', '093337344634'),
(46, 'Santosa Nugraha', 2, 'IIS1', 'Buleleng', '098876665456');

--
-- Triggers `siswa`
--
DELIMITER $$
CREATE TRIGGER `createNilai` AFTER INSERT ON `siswa` FOR EACH ROW BEGIN
	DECLARE eachMapel VARCHAR(20) DEFAULT '';
    DECLARE endloop INT DEFAULT FALSE;
    DECLARE cursorMapel CURSOR FOR
    	SELECT m.kodeMapel FROM matapelajaran m 
			JOIN kelas k ON m.jurusan = k.jurusan
    	WHERE k.kodeKelas = NEW.kodeKelas;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET endloop = TRUE;
    
    OPEN cursorMapel;
    
    insertloop:LOOP
    	FETCH cursorMapel INTO eachMapel;
    	IF endloop THEN
    		LEAVE insertloop;
   		END IF;
		INSERT INTO nilai(NIS, kodeMapel, nilaiTugas, nilaiQuiz, nilaiUTS, nilaiUAS) VALUES
    		(NEW.NIS, eachMapel, 0, 0, 0, 0);
	END LOOP;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `sumnilai`
-- (See below for the actual view)
--
CREATE TABLE `sumnilai` (
`NIS` int(11)
,`absen` int(11)
,`kodeMapel` varchar(20)
,`AVG` decimal(19,2)
);

-- --------------------------------------------------------

--
-- Structure for view `admin_view`
--
DROP TABLE IF EXISTS `admin_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `admin_view`  AS SELECT `guru`.`NIP` AS `kodeUnik`, `guru`.`nama` AS `nama`, `guru`.`kodeKelas` AS `kodeKelas`, `guru`.`alamat` AS `alamat`, `guru`.`telepon` AS `telepon` FROM `guru` ;

-- --------------------------------------------------------

--
-- Structure for view `avgnilai`
--
DROP TABLE IF EXISTS `avgnilai`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `avgnilai`  AS SELECT `sn`.`NIS` AS `NIS`, `s`.`absen` AS `absen`, cast(avg(`sn`.`AVG`) as decimal(19,2)) AS `AVGNilai` FROM (`sumnilai` `sn` join `siswa` `s` on(`sn`.`NIS` = `s`.`NIS`)) GROUP BY `sn`.`NIS` HAVING `s`.`absen` not like 'NULL' ;

-- --------------------------------------------------------

--
-- Structure for view `sumnilai`
--
DROP TABLE IF EXISTS `sumnilai`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sumnilai`  AS SELECT `n`.`NIS` AS `NIS`, `s`.`absen` AS `absen`, `n`.`kodeMapel` AS `kodeMapel`, cast((`n`.`nilaiTugas` + `n`.`nilaiQuiz` + `n`.`nilaiUTS` + `n`.`nilaiUAS`) / 4 as decimal(19,2)) AS `AVG` FROM (`nilai` `n` join `siswa` `s` on(`n`.`NIS` = `s`.`NIS`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`NIP`),
  ADD KEY `kelas` (`kodeKelas`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kodeKelas`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matapelajaran`
--
ALTER TABLE `matapelajaran`
  ADD PRIMARY KEY (`kodeMapel`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nis_c` (`NIS`),
  ADD KEY `kodemapel_c` (`kodeMapel`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`NIS`),
  ADD KEY `kelas_c` (`kodeKelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `NIS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `kelas` FOREIGN KEY (`kodeKelas`) REFERENCES `kelas` (`kodeKelas`);

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `kodemapel_c` FOREIGN KEY (`kodeMapel`) REFERENCES `matapelajaran` (`kodeMapel`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `nis_c` FOREIGN KEY (`NIS`) REFERENCES `siswa` (`NIS`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `kelas_c` FOREIGN KEY (`kodeKelas`) REFERENCES `kelas` (`kodeKelas`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
