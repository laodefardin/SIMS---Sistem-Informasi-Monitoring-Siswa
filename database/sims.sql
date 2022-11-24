-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2022 at 05:25 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sims`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `teacher_name` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`id`, `nik`, `teacher_name`, `subject`) VALUES
(1, 123456789, 'Vanessa Angell', 'Matematika'),
(2, 87654321, 'Maria Vania', 'Kimia'),
(3, 12348765, 'Nikita Mirzani', 'Biologi'),
(4, 43215678, 'Ricardo Milos', 'Olahraga'),
(5, 567854321, 'Johny Shin', 'Bahasa Inggris'),
(6, 2147483647, 'Reski Arsala', 'Bahasa Jepang'),
(7, 123456789, 'Hartana Firgantoro', 'Matematika'),
(8, 87654321, 'Talia Uyainah', 'Kimia'),
(9, 12348765, 'Kayla Pudjiastuti', 'Biologi'),
(10, 43215678, 'Galak Hardiansyah', 'Olahraga'),
(11, 567854321, 'Makara Jailani', 'Bahasa Inggris'),
(12, 2147483647, 'Sidiq Mandala', 'Bahasa Jepang'),
(16, 112233, 'KHOLILA', 'TI');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `wali_name` varchar(50) NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `sub_class` enum('X','XI','XII') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `wali_name`, `class_name`, `sub_class`) VALUES
(1, '1', 'X-Mia-1', 'X'),
(2, '2', 'X-Mia-2', 'X'),
(3, '3', 'X-IIS', 'X'),
(4, '4', 'X-IBB', 'X'),
(5, '5', 'XI-Mia-1', 'XI'),
(6, '6', 'XI-Mia-2', 'XI'),
(7, '7', 'XI-IIS', 'XI'),
(8, '8', 'XI-IBB', 'XI'),
(9, '9', 'XII-Mia-1', 'XII'),
(10, '10', 'XII-Mia-2', 'XII'),
(11, '11', 'XII-IIS', 'XII'),
(12, '12', 'XII-IBB', 'XII');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggaran`
--

CREATE TABLE `tb_pelanggaran` (
  `id_pelanggaran` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `pelanggaran` varchar(300) NOT NULL,
  `note` text NOT NULL,
  `reported_on` datetime NOT NULL,
  `foto` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pelanggaran`
--

INSERT INTO `tb_pelanggaran` (`id_pelanggaran`, `student_id`, `class_id`, `pelanggaran`, `note`, `reported_on`, `foto`) VALUES
(26, 29, 1, 'Tidur di kelas saat jam pelajaran', '', '2022-11-19 21:02:00', '1920221402th313173039_167317689241392_6682989734795334349_n.jpg'),
(28, 29, 1, 'Tidur di kelas saat jam pelajaran', 'as', '2022-11-21 10:05:00', '2120220305st316029871_447705840879135_2107878748496390473_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id` int(11) NOT NULL,
  `student_id` int(40) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `level` enum('Administrator','Guru','Orang Tua Wali','Wali Kelas') NOT NULL,
  `foto` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id`, `student_id`, `full_name`, `email`, `username`, `password`, `level`, `foto`) VALUES
(2, 0, 'Admin', 'admin@gmail.com', 'admin', '66b65567cedbc743bda3417fb813b9ba', 'Administrator', ''),
(40, 29, 'Dimaz Budiyanto', '', '11111', '87a28629cd5bbdf61772c2636c37c9df', 'Orang Tua Wali', '2120220450stScreenshot_1.jpg'),
(44, 4, 'Ricardo Milos', '', 'Ricardo Milos', '37cdd19c8adf19dfb619fd27445445f2', 'Wali Kelas', ''),
(45, 31, 'Supriadi', '', '22222', '229c65fb6f228f18b82b215493158479', 'Orang Tua Wali', ''),
(46, 32, 'Saubi Arabi', '', '9999', 'cff147928a809c5244d196b6a7fe4dea', 'Orang Tua Wali', ''),
(48, 36, 'Saubi Arabi', '', '11111123', '5f973c824c8a0afe1e214ee3492f8644', 'Orang Tua Wali', ''),
(49, 37, 'kholila', '', '160201', 'd02d0203c65814255516921515e21d4c', 'Orang Tua Wali', ''),
(52, 3, 'Nikita Mirzani', 'niki@gmail.com', 'niiier', '6c991fe85d9fcaea917f71fbdc9e384e', 'Wali Kelas', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_prestasi`
--

CREATE TABLE `tb_prestasi` (
  `id_prestasi` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `prestasi` varchar(300) NOT NULL,
  `note` text NOT NULL,
  `reported_on` datetime NOT NULL,
  `foto` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_prestasi`
--

INSERT INTO `tb_prestasi` (`id_prestasi`, `student_id`, `class_id`, `prestasi`, `note`, `reported_on`, `foto`) VALUES
(27, 29, 1, 'Juara 1 Lomba Menulis Tingkat Kabupaten', '', '2022-11-19 21:01:00', '1920221401thanders-nord-IQUyLpKDFKI-unsplash.jpg'),
(28, 29, 1, 'Juara 1 Lomba Makan Kerupuk', 'Banyak makan', '2022-11-21 11:30:00', '2120220430st3c54ce8e58735b46fe8abc4fdf2c5287.jpg'),
(29, 32, 4, 'Juara 1 Lomba Menulis Tingkat Kabupaten', 'a', '2022-11-21 14:08:00', '2120220708stINSTAGRAM.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id` int(11) NOT NULL,
  `nisn` varchar(15) NOT NULL,
  `std_name` varchar(50) NOT NULL,
  `class_id` varchar(11) NOT NULL,
  `address` text NOT NULL,
  `phone_number` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id`, `nisn`, `std_name`, `class_id`, `address`, `phone_number`) VALUES
(29, '11111', 'Vero Kusumo', '1', 'Psr. Basket No. 36, Tarakan 53102, SulTeng', '0379 4399 1930'),
(31, '22222', 'Hartono', '6', 'Btn Axuri Blok D No 12', '12312312312'),
(32, '9999', 'Deri Rifanudinsyah', '4', 'Btn Axuri Blok D No 12', '97978798798'),
(36, '11111123', 'Laode Muh ZulFardin Syah', '3', 'Btn Axuri Blok D No 12', '082393448980'),
(37, '160201', 'nurul', '4', 'mmmmmm', '1111111111');

-- --------------------------------------------------------

--
-- Table structure for table `tb_wali`
--

CREATE TABLE `tb_wali` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `parent_name` varchar(50) NOT NULL,
  `phone_numberwali` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_wali`
--

INSERT INTO `tb_wali` (`id`, `student_id`, `parent_name`, `phone_numberwali`) VALUES
(24, 29, 'Dimaz Budiyanto', '0379 4399 1930'),
(26, 31, 'Supriadi', '98798797889'),
(27, 32, 'Saubi Arabi', '879789798'),
(29, 36, 'Saubi Arabi', ''),
(30, 37, 'kholila', '111111111111');

-- --------------------------------------------------------

--
-- Table structure for table `tb_website`
--

CREATE TABLE `tb_website` (
  `id` int(1) NOT NULL,
  `school_name` varchar(50) NOT NULL,
  `logo` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_website`
--

INSERT INTO `tb_website` (`id`, `school_name`, `logo`) VALUES
(1, 'SMA NEGERI 7 BULUKUMBA', '1620220806thicon2.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_pelanggaran`
--
ALTER TABLE `tb_pelanggaran`
  ADD PRIMARY KEY (`id_pelanggaran`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_prestasi`
--
ALTER TABLE `tb_prestasi`
  ADD PRIMARY KEY (`id_prestasi`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `tb_wali`
--
ALTER TABLE `tb_wali`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `tb_website`
--
ALTER TABLE `tb_website`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_pelanggaran`
--
ALTER TABLE `tb_pelanggaran`
  MODIFY `id_pelanggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tb_prestasi`
--
ALTER TABLE `tb_prestasi`
  MODIFY `id_prestasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tb_wali`
--
ALTER TABLE `tb_wali`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_website`
--
ALTER TABLE `tb_website`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
