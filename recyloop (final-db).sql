-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2024 at 05:58 PM
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
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `deskripsi` varchar(512) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `judul`, `deskripsi`, `tanggal`) VALUES
(1, 'Kerja sama dengan PT. Kakatua Steel Alumunium', 'Kaleng kini dapat dikirim dan dijual ke PT. Kakatua Steel Aluminium', '2024-05-26');

-- --------------------------------------------------------

--
-- Table structure for table `cinderamata`
--

CREATE TABLE `cinderamata` (
  `id` int(11) NOT NULL,
  `nama_gift` varchar(64) NOT NULL,
  `harga` int(64) NOT NULL,
  `photo` varchar(128) DEFAULT NULL,
  `deskripsi` varchar(128) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cinderamata`
--

INSERT INTO `cinderamata` (`id`, `nama_gift`, `harga`, `photo`, `deskripsi`, `stok`) VALUES
(1, 'Tote Bag', 50000, 'ToteBag_Ramah_Lingkungan.jpg', 'Tote Bag serbaguna ramah lingkungan, membawa perlengkapan anda saat bepergian. ', 1),
(2, 'Gantungan Kunci', 5000, 'Ganci_Ramah_Lingkungan.jpg', 'Gantungan Kunci ramah lingkungan, cocok dibawa ke mana pun anda pergi.', 48);

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
  `judul` varchar(128) NOT NULL,
  `deskripsi` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `nama`, `img_logo`, `tagline`, `lokasi`, `judul`, `deskripsi`) VALUES
(1, 'Recyloop', 'main-logo.png', '#Recyloop', 'Krakatau', 'Apa Rencana Kami?', '<p>Kami bangga dengan sejarah kami, namun yang terpenting, kami bangga dengan kepuasan pelanggan kami. Setiap hari kami meningkatkan posisi situs pelanggan kami semakin tinggi.</p>'),
(2, 'Recyloop', 'main-logo.png', '#Recyloop', 'Krakatau', 'Kenapa harus memilih kami?', '<p>Kami menyediakan solusi inovatif untuk masalah kebersihan dan pengelolaan sampah. Sistem informasi kami menggalang partisipasi masyarakat dan meningkatkan kesadaran akan lingkungan. Melalui insentif penukaran sampah menjadi koin, kami mendorong keterlibatan aktif dan peduli terhadap kebersihan.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `id` int(11) NOT NULL,
  `id_finance` int(11) NOT NULL,
  `metode` varchar(11) NOT NULL,
  `jumlah` int(64) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `sumber` varchar(32) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deposit`
--

INSERT INTO `deposit` (`id`, `id_finance`, `metode`, `jumlah`, `tanggal`, `sumber`, `image`) VALUES
(1, 2, 'Dana Intern', 50000, '2024-06-01', 'Modal Kas', 'logdeposit_021_Mandiri.JPG'),
(2, 2, 'Dana Intern', 50000, '2024-06-03', 'Modal Kas', 'logdeposit_022_Mandiri.JPG'),
(3, 1, 'Tunai', 75000, '2024-06-06', 'Donatur', 'logdeposit_023_Kwitansi.jpg'),
(4, 1, 'Tunai', 20000, '2024-06-04', 'Donatur', 'logdeposit_024_Kwitansi.jpg'),
(5, 1, 'Tunai', 50000, '2024-06-25', 'Sponsor', 'logdeposit_025_Kwitansi.jpg'),
(6, 2, 'Dana Intern', 50000, '0000-00-00', 'Modal Kas', 'logdeposit_026_Mandiri.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `distribution`
--

CREATE TABLE `distribution` (
  `id` int(11) NOT NULL,
  `pengepul` varchar(64) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `bp` int(11) DEFAULT NULL,
  `ka` int(11) DEFAULT NULL,
  `kk` int(11) DEFAULT NULL,
  `nilai_tukar` int(64) NOT NULL,
  `petugas` varchar(32) NOT NULL,
  `driver` varchar(64) NOT NULL,
  `total` int(16) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `distribution`
--

INSERT INTO `distribution` (`id`, `pengepul`, `tanggal`, `bp`, `ka`, `kk`, `nilai_tukar`, `petugas`, `driver`, `total`, `status`) VALUES
(1, 'TLP', '2024-06-03', 30, 0, 0, 45000, 'alfihzm', 'Pak Tomo', 30, 0),
(2, 'TLP', '2024-06-05', 20, 0, 10, 55000, 'alfihzm', 'Pak Pungkad', 30, 0),
(3, 'KSA', '2024-06-25', 0, 5, 0, 66500, 'alfihzm', 'Pak Kosasih', 5, 0),
(4, 'DPR', '2024-06-25', 0, 0, 15, 37500, 'alfihzm', 'Pak Suroto', 15, 0),
(5, 'TLP', '2024-06-25', 5, 0, 0, 7500, 'alfihzm', 'Pak Toto', 5, 0);

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
(1, 'modal', 1706500, '2024-06-25', '02:17:23', 'alfihzm'),
(2, 'aruskas', 500000, '2024-06-24', '12:14:44', 'alfihzm');

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
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `id_account` varchar(16) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `photo` varchar(128) NOT NULL,
  `tanggal` date NOT NULL,
  `is_active` int(1) NOT NULL,
  `review` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `id_member`, `nama`, `photo`, `tanggal`, `is_active`, `review`) VALUES
(1, 10480001, 'Danu Setiawan', 'user_danuset.jpg', '2024-06-25', 1, 'Website ini memiliki desain yang bersih dan intuitif, dengan navigasi yang mudah dipahami oleh pengguna dari berbagai kalangan usia. Penggunaan warna yang ramah lingkungan, seperti hijau dan biru, memberikan kesan positif dan relevan dengan tema daur ulang.'),
(2, 89922433, 'Vania Cassandra', 'user_vaniacas.jpg', '2024-06-25', 1, 'Website ini menunjukkan kinerja yang sangat baik dengan waktu muat yang cepat dan responsif di berbagai perangkat, baik itu desktop maupun mobile. Hal ini penting untuk memastikan pengguna dapat mengakses informasi dengan cepat dan tanpa hambatan.'),
(3, 10480002, 'Supriyadi', 'user_supriyadi.jpg', '2024-06-25', 1, 'Bagus Bintang 7'),
(4, 10480001, 'Betara Waskita Karya', 'user_betara1.jpg', '2024-06-25', 1, 'recyloop terbaik');

-- --------------------------------------------------------

--
-- Table structure for table `sampah`
--

CREATE TABLE `sampah` (
  `id` int(11) NOT NULL,
  `icon` varchar(16384) DEFAULT NULL,
  `jenis_sampah` varchar(64) NOT NULL,
  `kode` varchar(11) DEFAULT NULL,
  `nilai_tukar` int(64) NOT NULL,
  `nilai_satuan` int(11) NOT NULL,
  `total_sampah` int(11) NOT NULL,
  `kapasitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sampah`
--

INSERT INTO `sampah` (`id`, `icon`, `jenis_sampah`, `kode`, `nilai_tukar`, `nilai_satuan`, `total_sampah`, `kapasitas`) VALUES
(1, 'plastic-bottle.png', 'Botol Plastik', 'BP', 1500, 155, 66, 200),
(2, 'tin-can.png', 'Kaleng', 'KA', 13300, 200, 36, 200),
(3, 'book.png', 'Kardus', 'KK', 2500, 500, 20, 200);

-- --------------------------------------------------------

--
-- Table structure for table `secure`
--

CREATE TABLE `secure` (
  `id` int(11) NOT NULL,
  `tittle` varchar(64) NOT NULL,
  `address` varchar(256) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `secure`
--

INSERT INTO `secure` (`id`, `tittle`, `address`, `is_active`) VALUES
(1, 'Pintu Masuk', 'https://cctv.balitower.co.id/Karet-Tengsin-005-700086_3/embed.html', 1),
(2, 'Pintu Masuk 1B', 'https://cctv.balitower.co.id/Karet-Tengsin-003-700084_2/embed.html', 0),
(3, 'Pintu Keluar 1C', 'https://cctv.balitower.co.id/Cikoko-006-705651_4/embed.html', 0),
(4, 'Monumen Arah Utara', 'https://cctv.balitower.co.id/Menteng-001-700123_7/embed.html', 0),
(5, 'Pospol Depan Kantor', 'https://cctv.balitower.co.id/Pospol-Merdeka-Utara-506818_1/embed.html', 0),
(6, 'Taman Khusus Staff', 'https://cctv.balitower.co.id/Tebet-Barat-008-705558_2/embed.html', 0),
(7, 'Pintu Keluar Utara', 'https://cctv.balitower.co.id/Gelora-005-700048_6/embed.html', 0),
(8, 'Gudang Sampah', 'https://cctv.balitower.co.id/Monas-Barat-004_a/embed.html', 0),
(11, 'Kamera Salah Pasang', 'https://cctv.balitower.co.id/Tugu-Selatan-003-701272_1/embed.html', 0),
(12, 'Parkir Non Resmi', 'https://cctv.balitower.co.id/Kapuk-027-702692_1/embed.html', 0),
(13, 'Gedung Belakang Gudang', 'https://cctv.balitower.co.id/Gondangdia-001-700051_6/embed.html', 0),
(14, 'Pintu Perlintasan Kereta', 'https://cctv.balitower.co.id/Menteng-Tenggulun-P01-507302_1/embed.html', 0);

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
(8206489, 'Pangad', 'pangad@gmail.com', 'pangad', 'Tangerang Selatan', '082176667799', 'default.jpg', 2, 1),
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
-- Table structure for table `surat_jalan`
--

CREATE TABLE `surat_jalan` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `petugas` varchar(32) NOT NULL,
  `status` varchar(32) NOT NULL,
  `tgl_validasi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `id_member`, `username`, `tanggal`, `jumlah_botol`, `jumlah_kaleng`, `jumlah_kardus`, `total`, `totalkoin`, `totalkonversi`, `lokasi`, `catatan`, `petugas`, `status`, `tgl_validasi`) VALUES
(1, 10480002, 'supriyadi', '2024-06-01', 12, 4, 0, 16, 71200, 0, 'Tenant Serpong', '', 'alfihzm', 'Sudah dikonfirmasi', '2024-06-25'),
(2, 89922433, 'vaniacas', '2024-06-01', 0, 6, 12, 18, 109800, 0, 'Tenant Serpong', '', 'alfihzm', 'Sudah dikonfirmasi', '2024-06-25'),
(3, 49464707, 'briang', '2024-06-02', 4, 0, 0, 4, 6000, 0, 'Tenant Serpong', '', 'alfihzm', 'Sudah dikonfirmasi', '2024-06-25'),
(4, 89922433, 'vaniacas', '2024-06-03', 35, 0, 10, 45, 77500, 0, 'Tenant Serpong', '', 'alfihzm', 'Sudah dikonfirmasi', '2024-06-25'),
(5, 10480002, 'supriyadi', '2024-06-07', 35, 10, 5, 50, 198000, 0, 'Tenant Serpong', '', 'alfihzm', 'Sudah dikonfirmasi', '2024-06-25'),
(6, 89922433, 'vaniacas', '2024-06-08', 20, 10, 10, 40, 188000, 0, 'Tenant Serpong', '', 'alfihzm', 'Sudah dikonfirmasi', '2024-06-25'),
(7, 10480001, 'betara', '2024-06-25', 0, 0, 5, 5, 12500, 0, 'Tenant Serpong', '', 'hamzah', 'Sudah dikonfirmasi', '2024-06-25'),
(8, 10480001, 'betara', '2024-06-24', 4, 6, 3, 13, 93300, 0, 'Tenant Serpong', 'a', 'alfihzm', 'Sudah dikonfirmasi', '2024-06-25');

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
  `koin` int(11) NOT NULL,
  `alasan_ban` varchar(256) DEFAULT NULL,
  `kupon1` int(11) NOT NULL DEFAULT 0,
  `kupon2` int(11) NOT NULL DEFAULT 0,
  `date_created` int(11) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `id_admin`, `id_staff`, `id_member`, `nama`, `lahir`, `email`, `username`, `password`, `role_id`, `photo`, `no_telp`, `alamat`, `total_sampah`, `total_koin`, `koin`, `alasan_ban`, `kupon1`, `kupon2`, `date_created`, `is_active`) VALUES
(1, NULL, NULL, 10480001, 'Betara Waskita Karya', '1999-01-01', 'betara@gmail.com', 'betara', '$2y$10$FLuzN7X92R2TQFttbmiQDOacjuIKMV8NnqPrjLrGdU.ow1DNxVEhu', 3, 'user_betara1.jpg', '082161872392', 'Jakarta Pusat', 44, 0, 535800, NULL, 1, 0, 1712325370, 1),
(2, 19220821, NULL, NULL, 'Mohammad Alfi Hamzami', '1999-11-29', 'alfihzm@gmail.com', 'alfihzm', '$2y$10$ICaalKLsQe6D09eGGr3jm.6kh/3VPO63j6IQwnFrVGYIai9h8EByK', 1, 'user_alfihzm.jpg', '082161872392', 'Tangerang Selatan', NULL, 0, 0, NULL, 0, 0, 1712465510, 1),
(6, NULL, 10240001, NULL, 'Derby Hendrawan', '2005-05-11', 'derby@gmail.com', 'derby', '$2y$10$o1uWEO7QFLgEyQ3wqSbCAu1kAwjxfYa9/RJ3MJosDtN5NrZmCEX6C', 2, 'user_derby.jpg', '082173958206', 'Bandung', NULL, 0, 0, NULL, 0, 0, 1714830415, 1),
(7, NULL, 10240004, NULL, 'Dendi Rahmat', '2006-11-04', 'dendi@gmail.com', 'dendi', '$2y$10$lQlCdblquou221pGTm3MDudqMSSENy17VBjUvcr7MTgrDFqCDUeUu', 2, 'default.jpg', '082175927592', 'Lebak', NULL, 0, 0, NULL, 0, 0, 1714840913, 1),
(8, NULL, 10240005, NULL, 'Adam Warlock', '2004-04-04', 'adam@gmail.com', 'adam', '$2y$10$PsSx5kVJY/otqt2CNtqiCeV.cyEJSbzGVzDo2OQF0vJLjHe9VAHLq', 2, 'default.jpg', '082174927592', 'Manchester', NULL, 0, 0, NULL, 0, 0, 1714841969, 1),
(9, NULL, 10240006, NULL, 'Agus Sumanto', '2004-04-24', 'agus@gmail.com', 'agus', '$2y$10$tgW2yVQhnKz9scSIv1QcC..v0UZa7nQvgCPmXzJtnckuqbm0uKbdG', 2, 'default.jpg', '082173952058', 'Pandeglang', NULL, 0, 0, NULL, 0, 0, 1714842198, 1),
(12, NULL, NULL, 10480002, 'Supriyadi', '1982-02-03', 'supri@gmail.com', 'supriyadi', '$2y$10$LIWTv1QQF6/gxHAB8lE.h.wD/eNkra5CMojoYePCPGfC8c1wAXJ7K', 3, 'user_supriyadi.jpg', '082174937285', 'Tangerang Selatan', 66, 0, 214200, NULL, 0, 0, 1715286102, 1),
(13, NULL, 10240012, NULL, 'Mohammad Hamzah', '1999-11-29', 'mohamzah@gmail.com', 'hamzah', '$2y$10$/PlvahgZlEILDRSvuGQc1eL0OsDMSpyT/N4Gaz0mylskekcdgay2u', 2, 'user_Mohammad_Hamzah.jpg', '082161872392', 'Kabupaten Tangerang', NULL, 0, 0, NULL, 0, 0, 1715412654, 1),
(14, NULL, 56002616, NULL, 'Maaruf', '2024-05-19', 'RI2@gmail.com', 'RI2', '$2y$10$6SyqSbx68Rw97TI4eiCMCexPW2sA3hA0ZhmMyTyF2aV9bP4vRm/vC', 2, 'default.jpg', '0858585858', 'BSD', NULL, 0, 0, NULL, 0, 0, 1716102567, 1),
(20, NULL, 83541679, NULL, 'Lumia Ferdinand', '2001-11-11', 'lumia@gmail.com', 'lumia', '$2y$10$MDdGhWQvsJEDpok7z8mgJOEz93HYA2TZaMLUWrPNrH0ANKDRZGlpm', 2, 'default.jpg', '082174582373', 'Bekasi', NULL, 0, 0, NULL, 0, 0, 1716345882, 1),
(21, NULL, NULL, 89922433, 'Vania Cassandra', '2005-03-11', 'vania@gmail.com', 'vaniacas', '$2y$10$kCBGdjju6rypvMNQJhNUJ.QdTOFHhCVZHh2tQNGWlDBbi2j/y/T/G', 3, 'user_vaniacas.jpg', '087839173927', 'Depok Baru', 103, 0, 130300, NULL, 0, 0, 1716385605, 1),
(22, NULL, NULL, 33104308, 'Tanya Degurechaff', '1999-11-29', 'tanya@gmail.com', 'tanya', '$2y$10$Q9Gfiaw5tIMX40SgWBis0O7ZMCl4.wXu.liygUbsC3fLKFRZSluJi', 3, 'user_tanya.jpg', '082161872392', 'Uni Soviet', 0, 0, 0, NULL, 0, 0, 1716385883, 1),
(23, NULL, NULL, 36769235, 'Izumi Sagiri', '2007-12-10', 'sagiri@gmail.com', 'sagiri', '$2y$10$gkkRBANQBv5V.5m7YiYtUObwP.wjeiGRhZvUCQL8432/XdR2dczgm', 3, 'default.jpg', '082161872392', 'Japan', 0, 0, 0, NULL, 0, 0, 1716387567, 1),
(24, NULL, NULL, 22786747, 'Danu Setiawan', '2001-11-29', 'danu@gmail.com', 'danuset', '$2y$10$xhVw902BGWYMGTGoQOoQRekf0PIBib8arphkpCbbq99NOR3CbuZau', 3, 'user_danuset.jpg', '087827491133', 'Bekasi', 0, 0, 0, NULL, 0, 0, 1716561279, 1),
(25, NULL, NULL, 49464707, 'Brian Griffin', '2004-01-15', 'mlaku@gmail.com', 'briang', '$2y$10$zDki3yCJ/KRSL9sVLWVfi.4b9TVam53x80TebjoVD0r1QhQ6/Dr6u', 3, 'default.jpg', '085858589999', 'BSD', 4, 0, 6000, NULL, 0, 0, 1716869123, 1),
(26, NULL, NULL, 14099047, 'Boya Bayu', '2024-05-29', 'bayu@gmail.com', 'boyal', '$2y$10$yY96bTS8fKH/e60s4c2yD.Cfm5YnjflQJOnPesu3FYrsOcPqC3sbG', 3, 'default.jpg', '081212001200', 'BSD', 0, 0, 0, NULL, 0, 0, 1716981005, 1),
(29, NULL, NULL, 32524419, 'Muhamad Azhri Amurllah', '1999-11-29', 'azhri@gmail.com', 'azhri', '$2y$10$Vo2p.EHgK2NXdS1WBHF6sePYpbA4nYRytBcD1UrOheFj3tlTJ1ZCq', 3, 'default.jpg', '087884634101', 'Tangerang Selatan', 0, 0, 0, NULL, 0, 0, 1719629609, 1);

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
(11, 1, 8),
(12, 1, 9),
(13, 1, 10);

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
(8, 'Transaksi'),
(9, 'Announcement'),
(10, 'Log');

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
(10, 5, 'Informasi Member', 'member/listMember', 'fas fa-fw fa-users', 1),
(12, 8, 'Manajemen Transaksi', 'transaction', 'fa-solid fa-money-bill-transfer', 1),
(13, 8, 'Manajemen Keuangan', 'finance', 'fa-solid fa-money-bill\r\n', 1),
(14, 8, 'Manajemen Tarik Tunai', 'withdraw', 'fa-solid fa-money-bill-1', 1),
(15, 9, 'Manajemen Pengumuman', 'announcement', 'fa-solid fa-paste', 1),
(16, 8, 'Manajemen Laporan', 'reports', 'fa-solid fa-file', 1),
(17, 10, 'Log Transaksi', 'log/transaction', 'fa-solid fa-file-lines', 1),
(18, 10, 'Log Tarik Tunai', 'log/withdraw', 'fa-solid fa-file-invoice-dollar', 1),
(19, 10, 'Log Laporan Masalah', 'log/reports', 'fa-solid fa-file-prescription', 1),
(20, 6, 'Informasi Perusahaan', 'perusahaan', 'fas fa-fw fa-circle-info', 1),
(21, 9, 'Manajemen Keamanan', 'secure', 'fa-solid fa-building-lock', 1),
(22, 10, 'Log Keuangan', 'log/accounting', 'fa-solid fa-file-code', 1),
(23, 8, 'Manajemen Ulasan', 'review', 'fas fa-fw fa-star', 1);

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `id` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `nominal` int(16) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` varchar(11) NOT NULL,
  `lokasi` varchar(64) NOT NULL,
  `metode` varchar(128) NOT NULL,
  `norek` varchar(128) NOT NULL,
  `catatan` varchar(128) NOT NULL,
  `petugas` varchar(32) NOT NULL,
  `status` varchar(32) NOT NULL,
  `koin1` int(16) NOT NULL,
  `koin2` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `withdraw`
--

INSERT INTO `withdraw` (`id`, `id_member`, `username`, `nominal`, `tanggal`, `jam`, `lokasi`, `metode`, `norek`, `catatan`, `petugas`, `status`, `koin1`, `koin2`) VALUES
(1, 89922433, 'vaniacas', 50000, '2024-06-01', '07:07:35', 'Tenant Serpong', 'Transfer', '123123123', '', 'alfihzm', 'Sudah ditransfer', 187300, 137300),
(2, 10480002, 'supriyadi', 55000, '2024-06-02', '07:11:43', 'Tenant Serpong', 'Transfer', '321321321', '', 'alfihzm', 'Sudah ditransfer', 71200, 16200),
(3, 89922433, 'vaniacas', 40000, '2024-06-25', '07:24:02', 'Tenant Serpong', 'Tunai', '', '', 'alfihzm', 'Diberikan tunai', 117300, 77300),
(4, 89922433, 'vaniacas', 60000, '2024-06-25', '07:56:13', 'Tenant Serpong', 'Transfer', '', '', 'alfihzm', 'Sudah ditransfer', 77300, 17300),
(5, 89922433, 'vaniacas', 75000, '2024-06-25', '08:03:56', 'Tenant Serpong', 'Transfer', '', '', 'alfihzm', 'Sudah ditransfer', 205300, 130300),
(6, 10480001, 'betara', 20000, '2024-06-25', '14:50:34', 'Tenant Serpong', 'Tunai', '', '', 'alfihzm', 'Diberikan tunai', 502500, 482500),
(7, 10480001, 'betara', 20000, '2024-06-25', '14:50:57', 'Tenant Serpong', 'Transfer', '138375882', '', 'alfihzm', 'Sudah ditransfer', 482500, 462500),
(8, 10480001, 'betara', 20000, '2024-06-25', '16:11:21', 'Tenant Serpong', 'Tunai', '', '', 'alfihzm', 'Diberikan tunai', 555800, 535800);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distribution`
--
ALTER TABLE `distribution`
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
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sampah`
--
ALTER TABLE `sampah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `secure`
--
ALTER TABLE `secure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`);

--
-- Indexes for table `surat_jalan`
--
ALTER TABLE `surat_jalan`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cinderamata`
--
ALTER TABLE `cinderamata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `distribution`
--
ALTER TABLE `distribution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sampah`
--
ALTER TABLE `sampah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `secure`
--
ALTER TABLE `secure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `surat_jalan`
--
ALTER TABLE `surat_jalan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
