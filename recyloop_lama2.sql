-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2024 at 11:13 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recyloop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cinderamata`
--

CREATE TABLE `cinderamata` (
  `id` int(11) NOT NULL,
  `nama_gift` varchar(64) NOT NULL,
  `harga` int(64) NOT NULL,
  `photo` varchar(128) DEFAULT NULL,
  `deskripsi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cinderamata`
--

INSERT INTO `cinderamata` (`id`, `nama_gift`, `harga`, `photo`, `deskripsi`) VALUES
(1, 'Tote Bag', 500, 'ToteBag_Ramah_Lingkungan.jpg', 'Tote Bag serbaguna ramah lingkungan, membawa perlengkapan anda saat bepergian. Tersedia dengan berbagai ukuran.'),
(6, 'Gantungan Kunci', 150, 'Ganci_Ramah_Lingkungan.jpg', 'Gantungan Kunci ramah lingkungan, cocok dibawa ke mana pun anda pergi.');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `img_logo` varchar(128) NOT NULL,
  `tagline` varchar(128) NOT NULL,
  `lokasi` varchar(256) NOT NULL,
  `deskripsi` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `lahir` date NOT NULL,
  `no_telp` varchar(16) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `poin` int(32) NOT NULL,
  `level` int(1) NOT NULL,
  `is_active` int(1) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `poin`
--

CREATE TABLE `poin` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sampah`
--

CREATE TABLE `sampah` (
  `id` int(11) NOT NULL,
  `no` int(11) NOT NULL,
  `jenis_sampah` varchar(64) NOT NULL,
  `nilai_tukar` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sampah`
--

INSERT INTO `sampah` (`id`, `no`, `jenis_sampah`, `nilai_tukar`) VALUES
(1, 1, 'Kantong Plastik', 100),
(2, 2, 'Botol Kaca', 500),
(4, 3, 'Botol Plastik', 250),
(5, 4, 'Sampah Daun', 50);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id_staff` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `username` varchar(16) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `no_telp` varchar(16) NOT NULL,
  `photo` varchar(128) NOT NULL,
  `role_id` int(1) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id_staff`, `nama`, `email`, `username`, `alamat`, `no_telp`, `photo`, `role_id`, `is_active`) VALUES
(10240001, 'Derby Markus', 'derbymarkus@gmail.com', 'derby', 'Bandung', '082173958206', 'default.jpg', 2, 1),
(10240002, 'Derby Fransiskus', 'derby@gmail.com', 'derby', 'Bandung', '082173958206', 'default.jpg', 2, 1),
(10240004, 'Dendi Rahmat', 'dendi@gmail.com', 'dendi', 'Lebak', '082175927592', 'default.jpg', 2, 1),
(10240005, 'Adam Warlock', 'adam@gmail.com', 'adam', 'Manchester', '082174927592', 'default.jpg', 2, 1),
(10240006, 'Agus Susanto', 'agus@gmail.com', 'agus', 'Pandeglang', '082173952058', 'default.jpg', 2, 1),
(10240007, 'Damar Aji', 'damar@gmail.com', 'damar', 'Sukabumi', '082186729673', 'default.jpg', 2, 1),
(10240011, 'Budi Pamungkas', 'budipm@gmail.com', 'budipm', 'Nganjuk', '082174927593', 'default.jpg', 2, 1),
(10240012, 'Mohammad Hamzah', 'mohamzah@gmail.com', 'hamzah', 'Kabupaten Tangerang', '082161872392', 'default.jpg', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id_staff` int(11) DEFAULT NULL,
  `id_member` int(11) DEFAULT NULL,
  `nama` varchar(128) NOT NULL,
  `lahir` date NOT NULL,
  `email` varchar(128) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `photo` varchar(128) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `total_sampah` int(11) DEFAULT NULL,
  `level` int(11) NOT NULL,
  `poin` int(11) NOT NULL,
  `komentar` varchar(256) DEFAULT NULL,
  `date_created` int(11) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `id_admin`, `id_staff`, `id_member`, `nama`, `lahir`, `email`, `username`, `password`, `role_id`, `photo`, `no_telp`, `alamat`, `total_sampah`, `level`, `poin`, `komentar`, `date_created`, `is_active`) VALUES
(1, NULL, NULL, 10480001, 'Betara', '1999-01-01', 'betara@gmail.com', 'betara', '$2y$10$FLuzN7X92R2TQFttbmiQDOacjuIKMV8NnqPrjLrGdU.ow1DNxVEhu', 3, 'default.jpg', '082161872392', 'Jakarta Selatan', 0, 1, 0, NULL, 1712325370, 1),
(2, 19220821, NULL, NULL, 'Mohammad Alfi Hamzami', '1999-11-29', 'alfihzm@gmail.com', 'alfihzm', '$2y$10$D5MOyBMj5CDPCrew38NFT.8yOiEygBprrxhQs009pHmlBCnLyQ55O', 1, 'user_Mohammad_Alfi_Hamzami1.jpg', '082161872392', 'Kabupaten Tangerang', NULL, 1, 0, NULL, 1712465510, 1),
(6, NULL, 10240001, NULL, 'Derby Hendrawan', '2005-05-11', 'derby@gmail.com', 'derby', '$2y$10$o1uWEO7QFLgEyQ3wqSbCAu1kAwjxfYa9/RJ3MJosDtN5NrZmCEX6C', 2, 'default.jpg', '082173958206', 'Bandung', NULL, 1, 0, NULL, 1714830415, 1),
(7, NULL, 10240004, NULL, 'Dendi Rahmat', '2006-11-04', 'dendi@gmail.com', 'dendi', '$2y$10$lQlCdblquou221pGTm3MDudqMSSENy17VBjUvcr7MTgrDFqCDUeUu', 2, 'default.jpg', '082175927592', 'Lebak', NULL, 1, 0, NULL, 1714840913, 1),
(8, NULL, 10240005, NULL, 'Adam Warlock', '2004-04-04', 'adam@gmail.com', 'adam', '$2y$10$PsSx5kVJY/otqt2CNtqiCeV.cyEJSbzGVzDo2OQF0vJLjHe9VAHLq', 2, 'default.jpg', '082174927592', 'Manchester', NULL, 1, 0, NULL, 1714841969, 1),
(9, NULL, 10240006, NULL, 'Agus Susanto', '2004-04-24', 'agus@gmail.com', 'agus', '$2y$10$tgW2yVQhnKz9scSIv1QcC..v0UZa7nQvgCPmXzJtnckuqbm0uKbdG', 2, 'default.jpg', '082173952058', 'Pandeglang', NULL, 1, 0, NULL, 1714842198, 1),
(10, NULL, 10240011, NULL, 'Budi Pamungkas', '2001-01-01', 'budipm@gmail.com', 'budipm', '$2y$10$YPHbJNkobDpANAQMG43cSOWfw19uCnW/oxQCIRYT8bzhrsxP2oaSi', 2, 'default.jpg', '082174927593', 'Nganjuk', NULL, 1, 0, NULL, 1715140720, 1),
(12, NULL, NULL, 10480002, 'Supriyadi', '1982-02-03', 'supri@gmail.com', 'supriyadi', '$2y$10$LIWTv1QQF6/gxHAB8lE.h.wD/eNkra5CMojoYePCPGfC8c1wAXJ7K', 3, 'default.jpg', '082174937285', 'Tangerang', 0, 1, 0, NULL, 1715286102, 1),
(13, NULL, 10240012, NULL, 'Mohammad Hamzah', '1999-11-29', 'mohamzah@gmail.com', 'hamzah', '$2y$10$/PlvahgZlEILDRSvuGQc1eL0OsDMSpyT/N4Gaz0mylskekcdgay2u', 2, 'user_Mohammad_Hamzah.jpg', '082161872392', 'Kabupaten Tangerang', NULL, 1, 0, NULL, 1715412654, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 1, 4),
(4, 1, 6),
(6, 2, 2),
(7, 2, 3),
(8, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Dashboard'),
(2, 'Pengaturan User'),
(3, 'Manajemen Staff'),
(4, 'Manajemen Anggota'),
(5, 'Manajemen Sampah'),
(6, 'Manajemen Cinderamata'),
(7, 'Dashboard');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Operator'),
(2, 'Pegawai'),
(3, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-home', 1),
(2, 2, 'Dashboard', 'staff', 'fas fa-fw fa-home', 1),
(3, 3, 'Profil Saya', 'user/my_profile', 'fas fa-solid fa-user\r\n', 1),
(4, 3, 'Ubah Profil', 'user/edit_profile', 'fas fa-fw fa-user-pen', 1),
(5, 3, 'Ubah Password', 'user/ubah_password', 'fas fa-fw fa-key', 1),
(6, 4, 'Manajemen Staff', 'admin/staff', 'fas fa-fw fa-id-badge', 1),
(7, 4, 'Manajemen Member', 'admin/member', 'fas fa-fw fa-users', 1),
(8, 6, 'Manajemen Sampah', 'admin/sampah', 'fas fa-fw fa-trash-can', 1),
(9, 6, 'Manajemen Cinderamata', 'admin/cinderamata', '	\r\nfas fa-fw fa-gift', 1),
(10, 5, 'Informasi Member', 'staff/member', 'fas fa-fw fa-users', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cinderamata`
--
ALTER TABLE `cinderamata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `poin`
--
ALTER TABLE `poin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sampah`
--
ALTER TABLE `sampah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cinderamata`
--
ALTER TABLE `cinderamata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poin`
--
ALTER TABLE `poin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sampah`
--
ALTER TABLE `sampah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;