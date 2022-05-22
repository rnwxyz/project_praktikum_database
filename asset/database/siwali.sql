-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2022 at 01:28 PM
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
('2008561065', 'Rian Wijaya', 'MIPA1', 'rian', 'Penida Kaja', '111222333444'),
('2008561999', 'Dio', 'IIS1', 'dio', 'Tabanan', '082234567890');

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
(24, 95, 'BIO', 52, 60, 90, 74),
(24, 96, 'FIS', 88, 77, 55, 40),
(24, 97, 'KIM', 90, 90, 90, 90),
(24, 98, 'MTK', 80, 80, 70, 70),
(25, 99, 'BIO', 80, 70, 50, 88),
(25, 100, 'FIS', 90, 70, 40, 80),
(25, 101, 'KIM', 50, 70, 80, 90),
(25, 102, 'MTK', 70, 80, 60, 30),
(26, 103, 'BIO', 55, 68, 80, 50),
(26, 104, 'FIS', 64, 70, 38, 80),
(26, 105, 'KIM', 58, 90, 78, 68),
(26, 106, 'MTK', 69, 65, 90, 33),
(27, 107, 'EKM', 70, 70, 80, 80),
(27, 108, 'GEO', 80, 20, 60, 40),
(27, 109, 'SJR', 66, 66, 66, 66),
(27, 110, 'SOS', 60, 54, 70, 70),
(28, 111, 'EKM', 90, 88, 76, 76),
(28, 112, 'GEO', 88, 55, 77, 89),
(28, 113, 'SJR', 54, 70, 80, 66),
(28, 114, 'SOS', 44, 55, 56, 54);

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
(24, 'Bayu', 1, 'MIPA1', 'Badung Jimbaran', '000999888777'),
(25, 'Agus', 2, 'MIPA1', 'Banyuwangi', '222111333444'),
(26, 'Agung', 3, 'MIPA1', 'Bojonegoro', '998877665544'),
(27, 'Bagus DIto', 1, 'IIS1', 'Bandung Banyuwangi', '111222333444'),
(28, 'Anjani', 2, 'IIS1', 'Banyuwangi', '000999888777');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `NIS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
