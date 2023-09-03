-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2023 at 10:04 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkg_smk2kotajambi`
--

-- --------------------------------------------------------

--
-- Table structure for table `identitas_guru`
--

CREATE TABLE `identitas_guru` (
  `id_guru` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nip` int(18) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tgl_lahir` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `pendidikan` varchar(30) NOT NULL,
  `golongan` varchar(30) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `spesialisasi` varchar(30) NOT NULL,
  `mata_pelajaran` varchar(30) NOT NULL,
  `telepon` varchar(30) NOT NULL,
  `foto` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `identitas_guru`
--

INSERT INTO `identitas_guru` (`id_guru`, `nama`, `nip`, `jenis_kelamin`, `tgl_lahir`, `alamat`, `pendidikan`, `golongan`, `jabatan`, `spesialisasi`, `mata_pelajaran`, `telepon`, `foto`) VALUES
(2, 'Muhammad Rivan', 132435678, 'L', '03302000', 'batang biyu', 'Teknik Informatika', 'a.III', 'Kepala Sekolah', 'IT', 'bk', '08xxx', ''),
(9, 'ov', 123, 'L', '2023-07-13', 'Pasaman Baru', 'Teknik Informatika', 'a.III', 'Kepala Sekolah', 'IT', 'TIK', '08xxxx', 'Animals___Cats_Angry_black_cat_081068_.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `identitas_sekolah`
--

CREATE TABLE `identitas_sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `nama_sekolah` varchar(120) NOT NULL,
  `alamat_sekolah` varchar(120) NOT NULL,
  `telepon_sekolah` varchar(120) NOT NULL,
  `email_sekolah` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `identitas_sekolah`
--

INSERT INTO `identitas_sekolah` (`id_sekolah`, `nama_sekolah`, `alamat_sekolah`, `telepon_sekolah`, `email_sekolah`) VALUES
(1, 'SMK N 2 KOTA JAMBI', ' Jl. Kopral Ramli Kel. Pasir Putih Kode Pos: 36139 Kota Jambi', '(0741) 572493', 'smknduajambi@yahoo.co.id');

-- --------------------------------------------------------

--
-- Table structure for table `kode_registrasi`
--

CREATE TABLE `kode_registrasi` (
  `id_kode` int(11) NOT NULL,
  `kode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kode_registrasi`
--

INSERT INTO `kode_registrasi` (`id_kode`, `kode`) VALUES
(1, 333);

-- --------------------------------------------------------

--
-- Table structure for table `pkg_kepribadian`
--

CREATE TABLE `pkg_kepribadian` (
  `id_kepribadian` int(11) NOT NULL,
  `kompetensi_1` int(30) NOT NULL,
  `kompetensi_2` int(30) NOT NULL,
  `kompetensi_3` int(30) NOT NULL,
  `guru` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pkg_kepribadian`
--

INSERT INTO `pkg_kepribadian` (`id_kepribadian`, `kompetensi_1`, `kompetensi_2`, `kompetensi_3`, `guru`) VALUES
(1, 50, 50, 50, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pkg_pendagogik`
--

CREATE TABLE `pkg_pendagogik` (
  `id_pendagogik` int(11) NOT NULL,
  `kompetensi_1` int(30) NOT NULL,
  `kompetensi_2` int(30) NOT NULL,
  `kompetensi_3` int(30) NOT NULL,
  `kompetensi_4` int(30) NOT NULL,
  `kompetensi_5` int(30) NOT NULL,
  `kompetensi_6` int(30) NOT NULL,
  `kompetensi_7` int(30) NOT NULL,
  `guru` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pkg_pendagogik`
--

INSERT INTO `pkg_pendagogik` (`id_pendagogik`, `kompetensi_1`, `kompetensi_2`, `kompetensi_3`, `kompetensi_4`, `kompetensi_5`, `kompetensi_6`, `kompetensi_7`, `guru`) VALUES
(7, 50, 50, 50, 50, 50, 50, 50, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pkg_prestasi`
--

CREATE TABLE `pkg_prestasi` (
  `id_prestasi` int(11) NOT NULL,
  `kompetensi_1` int(30) NOT NULL,
  `guru` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pkg_prestasi`
--

INSERT INTO `pkg_prestasi` (`id_prestasi`, `kompetensi_1`, `guru`) VALUES
(1, 50, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pkg_profesional`
--

CREATE TABLE `pkg_profesional` (
  `id_profesional` int(11) NOT NULL,
  `kompetensi_1` int(30) NOT NULL,
  `kompetensi_2` int(30) NOT NULL,
  `guru` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pkg_profesional`
--

INSERT INTO `pkg_profesional` (`id_profesional`, `kompetensi_1`, `kompetensi_2`, `guru`) VALUES
(1, 50, 50, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pkg_sosial`
--

CREATE TABLE `pkg_sosial` (
  `id_sosial` int(11) NOT NULL,
  `kompetensi_1` int(30) NOT NULL,
  `kompetensi_2` int(30) NOT NULL,
  `guru` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pkg_sosial`
--

INSERT INTO `pkg_sosial` (`id_sosial`, `kompetensi_1`, `kompetensi_2`, `guru`) VALUES
(1, 50, 50, 2);

-- --------------------------------------------------------

--
-- Table structure for table `profil_user`
--

CREATE TABLE `profil_user` (
  `id_profil_user` int(11) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nip` int(30) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `tgl_lahir` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `pendidikan` varchar(30) NOT NULL,
  `golongan` varchar(30) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `telepon` int(30) NOT NULL,
  `user` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profil_user`
--

INSERT INTO `profil_user` (`id_profil_user`, `foto`, `nama`, `nip`, `jenis_kelamin`, `tgl_lahir`, `alamat`, `pendidikan`, `golongan`, `jabatan`, `telepon`, `user`) VALUES
(2, '75-Hitman-Wallpapers-on-WallpaperSafari.jpg', 'Iam Admin', 1234567890, 'L', '2023-07-13', 'Kota Jambi', 'Sarjana Komputer', 'a.III', '', 8, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `akses` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `akses`) VALUES
(2, 'Sujono', 'Sujono123', 'Kepala Sekolah'),
(3, 'operator', 'operator123', 'operator'),
(6, 'admin', 'admin', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `identitas_guru`
--
ALTER TABLE `identitas_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `identitas_sekolah`
--
ALTER TABLE `identitas_sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `kode_registrasi`
--
ALTER TABLE `kode_registrasi`
  ADD PRIMARY KEY (`id_kode`);

--
-- Indexes for table `pkg_kepribadian`
--
ALTER TABLE `pkg_kepribadian`
  ADD PRIMARY KEY (`id_kepribadian`);

--
-- Indexes for table `pkg_pendagogik`
--
ALTER TABLE `pkg_pendagogik`
  ADD PRIMARY KEY (`id_pendagogik`);

--
-- Indexes for table `pkg_prestasi`
--
ALTER TABLE `pkg_prestasi`
  ADD PRIMARY KEY (`id_prestasi`);

--
-- Indexes for table `pkg_profesional`
--
ALTER TABLE `pkg_profesional`
  ADD PRIMARY KEY (`id_profesional`);

--
-- Indexes for table `pkg_sosial`
--
ALTER TABLE `pkg_sosial`
  ADD PRIMARY KEY (`id_sosial`);

--
-- Indexes for table `profil_user`
--
ALTER TABLE `profil_user`
  ADD PRIMARY KEY (`id_profil_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `identitas_guru`
--
ALTER TABLE `identitas_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `identitas_sekolah`
--
ALTER TABLE `identitas_sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kode_registrasi`
--
ALTER TABLE `kode_registrasi`
  MODIFY `id_kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pkg_kepribadian`
--
ALTER TABLE `pkg_kepribadian`
  MODIFY `id_kepribadian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pkg_pendagogik`
--
ALTER TABLE `pkg_pendagogik`
  MODIFY `id_pendagogik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pkg_prestasi`
--
ALTER TABLE `pkg_prestasi`
  MODIFY `id_prestasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pkg_profesional`
--
ALTER TABLE `pkg_profesional`
  MODIFY `id_profesional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pkg_sosial`
--
ALTER TABLE `pkg_sosial`
  MODIFY `id_sosial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profil_user`
--
ALTER TABLE `profil_user`
  MODIFY `id_profil_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
