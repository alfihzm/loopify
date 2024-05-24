-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2024 at 10:28 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `finance`
--

CREATE TABLE `finance` (
  `id` int(11) NOT NULL,
  `rekening` varchar(128) NOT NULL,
  `saldo` int(32) NOT NULL,
  `tgl_update` date NOT NULL,
  `jam_update` varchar(11) NOT NULL,
  `username` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `finance`
--

INSERT INTO `finance` (`id`, `rekening`, `saldo`, `tgl_update`, `jam_update`, `username`) VALUES
(1, 'modal', 0, '2024-05-22', '13:11:46', 'alfihzm'),
(2, 'aruskas', 8500000, '2024-05-21', '18:36:12', 'alfihzm');

-- --------------------------------------------------------

--
-- Table structure for table `kelompok_1`
--

CREATE TABLE `kelompok_1` (
  `id` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `pekerjaan` varchar(32) NOT NULL,
  `deskripsi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelompok_1`
--

INSERT INTO `kelompok_1` (`id`, `nama`, `pekerjaan`, `deskripsi`) VALUES
(1, 'Mohammad Alfi Hamzami', 'Mahasiswa', 'Kalo pusing, sedih kerjanya cuma makan doang.');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `poin`
--

CREATE TABLE `poin` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sampah`
--

CREATE TABLE `sampah` (
  `id` int(11) NOT NULL,
  `jenis_sampah` varchar(64) NOT NULL,
  `kode` varchar(11) DEFAULT NULL,
  `nilai_tukar` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sampah`
--

INSERT INTO `sampah` (`id`, `jenis_sampah`, `kode`, `nilai_tukar`) VALUES
(1, 'Botol Plastik', NULL, 1100),
(2, 'Kaleng', NULL, 13300),
(3, 'Seng', NULL, 2500),
(12, 'Daun', NULL, 1500),
(13, 'Kertas', NULL, 2800);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id_staff`, `nama`, `email`, `username`, `alamat`, `no_telp`, `photo`, `role_id`, `is_active`) VALUES
(0, 'Makarim', 'RI26@gmail.com', 'RI26', 'BSD ', '085858584040', 'default.jpg', 2, 1),
(6899477, 'Lumia Ferdinand', 'lumia@gmail.com', 'lumia', 'Bekasi', '087492749173', 'default.jpg', 2, 1),
(10240001, 'Derby Markus', 'derbymarkus@gmail.com', 'derby', 'Bandung', '082173958206', 'default.jpg', 2, 1),
(10240002, 'Derby Fransiskus', 'derby@gmail.com', 'derby', 'Bandung', '082173958206', 'default.jpg', 2, 1),
(10240004, 'Dendi Rahmat', 'dendi@gmail.com', 'dendi', 'Lebak', '082175927592', 'default.jpg', 2, 1),
(10240005, 'Adam Warlock', 'adam@gmail.com', 'adam', 'Manchester', '082174927592', 'default.jpg', 2, 1),
(10240006, 'Agus Susanto', 'agus@gmail.com', 'agus', 'Pandeglang', '082173952058', 'default.jpg', 2, 1),
(10240007, 'Damar Aji', 'damar@gmail.com', 'damar', 'Sukabumi', '082186729673', 'default.jpg', 2, 1),
(10240011, 'Budi Pamungkas', 'budipm@gmail.com', 'budipm', 'Nganjuk', '082174927593', 'default.jpg', 2, 1),
(10240012, 'Mohammad Hamzah', 'mohamzah@gmail.com', 'hamzah', 'Kabupaten Tangerang', '082161872392', 'default.jpg', 2, 1),
(29880611, 'Lumia Ferdinand', 'lumia@gmail.com', 'lumia', 'Bekasi', '082174582373', 'default.jpg', 2, 1),
(30634981, 'Lumia Ferdinand', 'lumia@gmail.com', 'lumia', 'Tangerang', '087528572958', 'default.jpg', 2, 1),
(58831092, 'Lumia Ferdinand', 'lumia@gmail.com', 'lumia', 'Bekasi', '087827492194', 'default.jpg', 2, 1),
(74574387, 'Maaruf', 'RI2@gmail.com', 'RI2', 'BSD', '0858585858', 'default.jpg', 2, 1),
(74928261, 'Lumia Ferdian', 'lumia@gmail.com', 'lumia', 'Bekasi', '087832851184', 'default.jpg', 2, 1),
(93000703, 'Lumia Ferdinand', 'lumia@gmail.com', 'lumia', 'Bekasi', '087472972138', 'default.jpg', 2, 1),
(2147483647, 'Makarim', 'RI26@gmail.com', 'RI26', 'BSDQ', '085858584040', 'default.jpg', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_botol` int(11) NOT NULL,
  `jumlah_kaleng` int(11) NOT NULL,
  `jumlah_kardus` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `totalkoin` int(16) NOT NULL,
  `totalkonversi` int(16) NOT NULL,
  `lokasi` varchar(128) NOT NULL,
  `catatan` varchar(128) DEFAULT NULL,
  `status` varchar(32) NOT NULL,
  `tgl_validasi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `id_member`, `username`, `tanggal`, `jumlah_botol`, `jumlah_kaleng`, `jumlah_kardus`, `total`, `totalkoin`, `totalkonversi`, `lokasi`, `catatan`, `status`, `tgl_validasi`) VALUES
(4, 123455, '', '2024-05-20', 1, 0, 1, 0, 0, 0, 'Tenant Official', NULL, 'Sudah dikonfirmasi', '0000-00-00'),
(8, 12345689, '', '2024-05-20', 2, 1, 2, 0, 0, 0, 'Tenant Official', NULL, 'Sudah dikonfirmasi', '0000-00-00'),
(15, 10480001, 'betara', '2024-05-20', 1, 1, 0, 2, 14400, 0, 'Tenant Official', '', 'Sudah dikonfirmasi', '0000-00-00');

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
  `role_id` int(11) DEFAULT NULL,
  `photo` varchar(128) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `total_sampah` float DEFAULT NULL,
  `total_koin` int(32) NOT NULL,
  `level` int(11) NOT NULL,
  `koin` int(11) NOT NULL,
  `komentar` varchar(256) DEFAULT NULL,
  `date_created` int(11) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `id_admin`, `id_staff`, `id_member`, `nama`, `lahir`, `email`, `username`, `password`, `role_id`, `photo`, `no_telp`, `alamat`, `total_sampah`, `total_koin`, `level`, `koin`, `komentar`, `date_created`, `is_active`) VALUES
(1, NULL, NULL, 10480001, 'Betara', '1999-01-01', 'betara@gmail.com', 'betara', '$2y$10$FLuzN7X92R2TQFttbmiQDOacjuIKMV8NnqPrjLrGdU.ow1DNxVEhu', 3, 'default.jpg', '082161872392', 'Jakarta Selatan', 0, 0, 1, 0, NULL, 1712325370, 1),
(2, 19220821, NULL, NULL, 'Mohammad Alfi Hamzami', '1999-11-29', 'alfihzm@gmail.com', 'alfihzm', '$2y$10$D5MOyBMj5CDPCrew38NFT.8yOiEygBprrxhQs009pHmlBCnLyQ55O', 1, 'user_Mohammad_Alfi_Hamzami1.jpg', '082161872392', 'Kabupaten Tangerang', NULL, 0, 1, 0, NULL, 1712465510, 1),
(6, NULL, 10240001, NULL, 'Derby Hendrawan', '2005-05-11', 'derby@gmail.com', 'derby', '$2y$10$o1uWEO7QFLgEyQ3wqSbCAu1kAwjxfYa9/RJ3MJosDtN5NrZmCEX6C', 2, 'default.jpg', '082173958206', 'Bandung', NULL, 0, 1, 0, NULL, 1714830415, 1),
(7, NULL, 10240004, NULL, 'Dendi Rahmat', '2006-11-04', 'dendi@gmail.com', 'dendi', '$2y$10$lQlCdblquou221pGTm3MDudqMSSENy17VBjUvcr7MTgrDFqCDUeUu', 2, 'default.jpg', '082175927592', 'Lebak', NULL, 0, 1, 0, NULL, 1714840913, 1),
(8, NULL, 10240005, NULL, 'Adam Warlock', '2004-04-04', 'adam@gmail.com', 'adam', '$2y$10$PsSx5kVJY/otqt2CNtqiCeV.cyEJSbzGVzDo2OQF0vJLjHe9VAHLq', 2, 'default.jpg', '082174927592', 'Manchester', NULL, 0, 1, 0, NULL, 1714841969, 1),
(9, NULL, 10240006, NULL, 'Agus Sumanto', '2004-04-24', 'agus@gmail.com', 'agus', '$2y$10$tgW2yVQhnKz9scSIv1QcC..v0UZa7nQvgCPmXzJtnckuqbm0uKbdG', 2, 'default.jpg', '082173952058', 'Pandeglang', NULL, 0, 1, 0, NULL, 1714842198, 1),
(12, NULL, NULL, 10480002, 'Supriyadi', '1982-02-03', 'supri@gmail.com', 'supriyadi', '$2y$10$LIWTv1QQF6/gxHAB8lE.h.wD/eNkra5CMojoYePCPGfC8c1wAXJ7K', 3, 'default.jpg', '082174937285', 'Tangerang', 0, 0, 1, 0, NULL, 1715286102, 1),
(13, NULL, 10240012, NULL, 'Mohammad Hamzah', '1999-11-29', 'mohamzah@gmail.com', 'hamzah', '$2y$10$/PlvahgZlEILDRSvuGQc1eL0OsDMSpyT/N4Gaz0mylskekcdgay2u', 2, 'user_Mohammad_Hamzah.jpg', '082161872392', 'Kabupaten Tangerang', NULL, 0, 1, 0, NULL, 1715412654, 1),
(14, NULL, 56002616, NULL, 'Maaruf', '2024-05-19', 'RI2@gmail.com', 'RI2', '$2y$10$6SyqSbx68Rw97TI4eiCMCexPW2sA3hA0ZhmMyTyF2aV9bP4vRm/vC', 2, 'default.jpg', '0858585858', 'BSD', NULL, 0, 1, 0, NULL, 1716102567, 1),
(20, NULL, 83541679, NULL, 'Lumia Ferdinand', '2001-11-11', 'lumia@gmail.com', 'lumia', '$2y$10$MDdGhWQvsJEDpok7z8mgJOEz93HYA2TZaMLUWrPNrH0ANKDRZGlpm', 2, 'default.jpg', '082174582373', 'Bekasi', NULL, 0, 1, 0, NULL, 1716345882, 1),
(21, NULL, NULL, 89922433, 'Vania Cassandra', '2005-03-11', 'vania@gmail.com', 'vaniacas', '$2y$10$kCBGdjju6rypvMNQJhNUJ.QdTOFHhCVZHh2tQNGWlDBbi2j/y/T/G', 3, 'default.jpg', '087839173927', 'Depok', NULL, 0, 0, 0, NULL, 1716385605, 1),
(22, NULL, NULL, 33104308, 'Tanya Degurechaff', '1999-11-29', 'tanya@gmail.com', 'tanya', '$2y$10$Q9Gfiaw5tIMX40SgWBis0O7ZMCl4.wXu.liygUbsC3fLKFRZSluJi', 3, 'default.jpg', '082161872392', 'Uni Soviet', 2.51, 0, 0, 100, NULL, 1716385883, 1),
(23, NULL, NULL, 36769235, 'Izumi Sagiri', '2007-12-10', 'sagiri@gmail.com', 'sagiri', '$2y$10$gkkRBANQBv5V.5m7YiYtUObwP.wjeiGRhZvUCQL8432/XdR2dczgm', 3, 'default.jpg', '082161872392', 'Japan', 0, 0, 0, 0, NULL, 1716387567, 1),
(24, NULL, NULL, 22786747, 'Danu Setiawan', '2001-11-29', 'danu@gmail.com', 'danuset', '$2y$10$xhVw902BGWYMGTGoQOoQRekf0PIBib8arphkpCbbq99NOR3CbuZau', 3, 'default.jpg', '087827491133', 'Bekasi', 0, 0, 0, 0, NULL, 1716561279, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(8, 2, 5),
(10, 2, 8),
(11, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(7, 'Dashboard'),
(8, 'Transaksi');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Staff'),
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(10, 5, 'Informasi Member', 'staff/member', 'fas fa-fw fa-users', 1),
(12, 8, 'Manajemen Transaksi', 'transaction', 'fa-solid fa-money-bill-transfer', 1),
(13, 8, 'Manajemen Keuangan', 'finance', 'fa-solid fa-wallet\r\n', 1),
(14, 8, 'Manajemen Tarik Tunai', 'withdraw', 'fa-solid fa-money-bill-1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `id` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` varchar(11) NOT NULL,
  `tariktunai` int(16) NOT NULL,
  `metode` varchar(128) NOT NULL,
  `norek` varchar(128) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `finance`
--
ALTER TABLE `finance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelompok_1`
--
ALTER TABLE `kelompok_1`
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
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
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
-- AUTO_INCREMENT for table `finance`
--
ALTER TABLE `finance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelompok_1`
--
ALTER TABLE `kelompok_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
