-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2024 at 05:11 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `deskripsi` varchar(512) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `judul`, `deskripsi`, `tanggal`) VALUES
(2, 'Kerja sama dengan PT. Kakatua Steel Alumunium', 'Kaleng kini dapat dikirim dan dijual ke PT. Kakatua Steel Aluminium', '2024-05-27');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cinderamata`
--

INSERT INTO `cinderamata` (`id`, `nama_gift`, `harga`, `photo`, `deskripsi`, `stok`) VALUES
(1, 'Tote Bag', 50000, 'ToteBag_Ramah_Lingkungan.jpg', 'Tote Bag serbaguna ramah lingkungan, membawa perlengkapan anda saat bepergian. ', 0),
(2, 'Gantungan Kunci', 5000, 'Ganci_Ramah_Lingkungan.jpg', 'Gantungan Kunci ramah lingkungan, cocok dibawa ke mana pun anda pergi.', 64);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deposit`
--

INSERT INTO `deposit` (`id`, `id_finance`, `metode`, `jumlah`, `tanggal`, `sumber`, `image`) VALUES
(1, 2, 'Transfer Ba', 200000, '2024-06-03', 'Sponsor', 'logdeposit_001_BCA.jpg'),
(2, 2, 'Tunai', 40000, '2024-06-04', 'Donatur', 'logdeposit_002_Mandiri.JPG'),
(3, 2, 'Transfer Ba', 50000, '2024-06-06', 'Donatur', 'logdeposit_003_BCA.jpg'),
(4, 2, 'Transfer Ba', 175000, '2024-06-07', 'Donatur', 'logdeposit_004_BCA.jpg'),
(5, 2, 'Tunai', 90000, '2024-06-07', 'Sponsor', 'logdeposit_005_BCA.jpg'),
(7, 2, 'Transfer Ba', 190000, '2024-06-07', 'Modal Kas', 'logdeposit_007_BCA.jpg'),
(8, 1, 'Tunai', 10, '2024-06-22', 'Donatur', 'logdeposit_008_Mandiri.JPG'),
(9, 2, 'Tunai', 100, '2024-06-22', 'Donatur', 'logdeposit_009_WhatsApp_Image_2024-06-21_at_15_58_50_219d62b8.jpg'),
(10, 1, 'Tunai', 110, '2024-06-22', 'Donatur', 'logdeposit_010_WhatsApp_Image_2024-06-21_at_15_58_50_219d62b8.jpg'),
(11, 1, 'Tunai', 114, '2024-06-22', 'Donatur', 'logdeposit_011_Mandiri.JPG');

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
  `total` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `distribution`
--

INSERT INTO `distribution` (`id`, `pengepul`, `tanggal`, `bp`, `ka`, `kk`, `nilai_tukar`, `petugas`, `driver`, `total`) VALUES
(1, 'TLP', '2024-06-06', 15, 0, 0, 2325, '', 'Pak Toto', 15),
(2, 'KSA', '2024-06-06', 0, 50, 0, 10000, '', 'Pak Dimas', 50),
(3, 'DPR', '2024-06-06', 0, 0, 100, 50000, '', 'Pak Jimmy', 100),
(4, 'TLP', '2024-06-07', 30, 0, 0, 4650, '', 'Pak Rama', 30),
(5, 'DPR', '2024-06-10', 5, 5, 5, 4275, '', 'Pak Roto', 15),
(6, 'KSA', '2024-06-10', 0, 5, 0, 1000, '', 'Pak Preled', 5),
(7, 'DPR', '2024-06-21', 1, 1, 1, 855, '', 'pak Iyep', 3),
(8, 'DPR', '2024-06-21', 1, 0, 1, 655, '', 'pak Yeyen', 2),
(9, 'TLP', '2024-06-23', 10, 0, 0, 1550, 'alfihzm', 'pak Toto', 10);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `finance`
--

INSERT INTO `finance` (`id`, `rekening`, `saldo`, `tgl_update`, `jam_update`, `username`) VALUES
(1, 'modal', 101550, '2024-06-22', '11:48:02', 'derby'),
(2, 'aruskas', 50000, '2024-06-22', '11:48:08', 'derby');

-- --------------------------------------------------------

--
-- Table structure for table `kelompok_1`
--

CREATE TABLE `kelompok_1` (
  `id` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `pekerjaan` varchar(32) NOT NULL,
  `deskripsi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `id_account` varchar(16) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `id_account`, `nama`, `judul`, `tanggal`, `deskripsi`) VALUES
(1, '19220821', 'alfihzm', 'AC Mati', '2024-06-21', '&lt;p&gt;AC Mati sebagian, sekitar pukul 14.00&lt;/p&gt;');

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
  `review` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `id_member`, `nama`, `photo`, `tanggal`, `review`) VALUES
(1, 89922433, 'Vania Cassandra', 'default.jpg', '2024-05-25', 'Ide penukaran sampah dengan koin adalah inovatif dan efektif dalam meningkatkan partisipasi masyarakat dalam menjaga kebersihan lingkungan. Proyek ini jelas berpotensi membawa dampak positif yang besar.'),
(2, 10480001, 'Betara', 'user_alfihzm.jpg', '2024-05-28', 'Proyek ini menunjukkan bagaimana inovasi bisa memecahkan masalah lingkungan dengan cara yang praktis dan bermanfaat. Sistem insentifnya pasti akan mendorong lebih banyak orang untuk terlibat dalam upaya menjaga kebersihan. Semoga Recyloop terus membawa perubahan positif!'),
(3, 33104308, 'Tanya Degurechaff', 'default.jpg', '2024-06-02', 'Kami bangga dengan sejarah kami, namun yang terpenting, kami bangga dengan kepuasan pelanggan kami. Setiap hari kami meningkatkan posisi situs pelanggan kami semakin tinggi.');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sampah`
--

INSERT INTO `sampah` (`id`, `icon`, `jenis_sampah`, `kode`, `nilai_tukar`, `nilai_satuan`, `total_sampah`, `kapasitas`) VALUES
(1, 'plastic-bottle.png', 'Botol Plastik', 'BP', 1500, 155, 8, 200),
(2, 'tin-can.png', 'Kaleng', 'KA', 13300, 200, 128, 200),
(3, 'book.png', 'Kardus', 'KK', 2500, 500, 13, 200);

-- --------------------------------------------------------

--
-- Table structure for table `secure`
--

CREATE TABLE `secure` (
  `id` int(11) NOT NULL,
  `tittle` varchar(64) NOT NULL,
  `address` varchar(256) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
-- Table structure for table `surat_jalan`
--

CREATE TABLE `surat_jalan` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `id_member`, `username`, `tanggal`, `jumlah_botol`, `jumlah_kaleng`, `jumlah_kardus`, `total`, `totalkoin`, `totalkonversi`, `lokasi`, `catatan`, `petugas`, `status`, `tgl_validasi`) VALUES
(1, 10480001, 'betara', '2024-05-25', 10, 10, 0, 20, 148000, 0, 'Tenant Serpong', 'Sampah dalam kondisi bagus', '', 'Belum dikonfirmasi', '0000-00-00'),
(2, 10480001, 'betara', '2024-06-28', 15, 20, 0, 35, 288500, 0, 'Tenant Serpong', '', '', 'Belum dikonfirmasi', '0000-00-00'),
(3, 10480002, 'supriyadi', '2024-05-30', 5, 0, 0, 5, 7500, 0, 'Tenant Serpong', '', '', 'Belum dikonfirmasi', '0000-00-00'),
(4, 89922433, 'vaniacas', '2024-05-31', 20, 0, 5, 25, 42500, 0, 'Tenant Serpong', '', '', 'Sudah dikonfirmasi', '2024-06-23'),
(5, 89922433, 'vaniacas', '2024-06-01', 0, 10, 0, 10, 133000, 0, 'Tenant Serpong', 'Kaleng sangat berkualitas', '', 'Sudah dikonfirmasi', '2024-06-22'),
(6, 10480001, 'betara', '2024-06-02', 5, 0, 0, 5, 7500, 0, 'Tenant Serpong', '', '', 'Belum dikonfirmasi', '0000-00-00'),
(7, 10480002, 'supriyadi', '2024-06-03', 5, 15, 10, 30, 232000, 0, 'Tenant Serpong', 'Tiga kantung plastik', '', 'Sudah dikonfirmasi', '2024-06-23'),
(8, 89922433, 'vaniacas', '2024-06-05', 0, 0, 100, 100, 250000, 0, 'Tenant Serpong', 'Satu box', '', 'Belum dikonfirmasi', '0000-00-00'),
(9, 10480001, 'betara', '2024-06-21', 0, 19, 0, 19, 252700, 0, 'Tenant Serpong', '', '', 'Belum dikonfirmasi', '0000-00-00'),
(10, 10480001, 'betara', '2024-06-21', 5, 100, 0, 105, 1337500, 0, 'Tenant Serpong', 'komen\r\n', '', 'Sudah dikonfirmasi', '2024-06-23'),
(11, 10480001, 'betara', '2024-06-23', 5, 15, 5, 25, 219500, 0, 'Tenant Serpong', '', 'derby', 'Belum dikonfirmasi', '0000-00-00');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `id_admin`, `id_staff`, `id_member`, `nama`, `lahir`, `email`, `username`, `password`, `role_id`, `photo`, `no_telp`, `alamat`, `total_sampah`, `total_koin`, `koin`, `alasan_ban`, `kupon1`, `kupon2`, `date_created`, `is_active`) VALUES
(1, NULL, NULL, 10480001, 'Betara Waskita Karya', '1999-01-01', 'betara@gmail.com', 'betara', '$2y$10$FLuzN7X92R2TQFttbmiQDOacjuIKMV8NnqPrjLrGdU.ow1DNxVEhu', 3, 'user_betara1.png', '082161872392', 'Jakarta Selataan', 26, 0, 3068689, NULL, 0, 1, 1712325370, 1),
(2, 19220821, NULL, NULL, 'Mohammad Alfi Hamzamis', '1999-11-29', 'alfihzm@gmail.com', 'alfihzm', '$2y$10$D5MOyBMj5CDPCrew38NFT.8yOiEygBprrxhQs009pHmlBCnLyQ55O', 1, 'user_alfihzm.png', '082161872392', 'Kabupaten Tangerang', NULL, 0, 0, NULL, 0, 0, 1712465510, 1),
(6, NULL, 10240001, NULL, 'Derby Hendrawan', '2005-05-11', 'derby@gmail.com', 'derby', '$2y$10$o1uWEO7QFLgEyQ3wqSbCAu1kAwjxfYa9/RJ3MJosDtN5NrZmCEX6C', 2, 'default.jpg', '082173958206', 'Bandung', NULL, 0, 0, NULL, 0, 0, 1714830415, 1),
(7, NULL, 10240004, NULL, 'Dendi Rahmat', '2006-11-04', 'dendi@gmail.com', 'dendi', '$2y$10$lQlCdblquou221pGTm3MDudqMSSENy17VBjUvcr7MTgrDFqCDUeUu', 2, 'default.jpg', '082175927592', 'Lebak', NULL, 0, 0, NULL, 0, 0, 1714840913, 1),
(8, NULL, 10240005, NULL, 'Adam Warlock', '2004-04-04', 'adam@gmail.com', 'adam', '$2y$10$PsSx5kVJY/otqt2CNtqiCeV.cyEJSbzGVzDo2OQF0vJLjHe9VAHLq', 2, 'default.jpg', '082174927592', 'Manchester', NULL, 0, 0, NULL, 0, 0, 1714841969, 1),
(9, NULL, 10240006, NULL, 'Agus Sumanto', '2004-04-24', 'agus@gmail.com', 'agus', '$2y$10$tgW2yVQhnKz9scSIv1QcC..v0UZa7nQvgCPmXzJtnckuqbm0uKbdG', 2, 'default.jpg', '082173952058', 'Pandeglang', NULL, 0, 0, 'Kanibal', 0, 0, 1714842198, 0),
(12, NULL, NULL, 10480002, 'Supriyadi', '1982-02-03', 'supri@gmail.com', 'supriyadi', '$2y$10$LIWTv1QQF6/gxHAB8lE.h.wD/eNkra5CMojoYePCPGfC8c1wAXJ7K', 3, 'default.jpg', '082174937285', 'Tangerang', 31, 0, 239500, NULL, 0, 1, 1715286102, 1),
(13, NULL, 10240012, NULL, 'Mohammad Hamzah', '1999-11-29', 'mohamzah@gmail.com', 'hamzah', '$2y$10$/PlvahgZlEILDRSvuGQc1eL0OsDMSpyT/N4Gaz0mylskekcdgay2u', 2, 'user_Mohammad_Hamzah.jpg', '082161872392', 'Kabupaten Tangerang', NULL, 0, 0, NULL, 0, 0, 1715412654, 1),
(14, NULL, 56002616, NULL, 'Maaruf', '2024-05-19', 'RI2@gmail.com', 'RI2', '$2y$10$6SyqSbx68Rw97TI4eiCMCexPW2sA3hA0ZhmMyTyF2aV9bP4vRm/vC', 2, 'default.jpg', '0858585858', 'BSD', NULL, 0, 0, NULL, 0, 0, 1716102567, 1),
(20, NULL, 83541679, NULL, 'Lumia Ferdinand', '2001-11-11', 'lumia@gmail.com', 'lumia', '$2y$10$MDdGhWQvsJEDpok7z8mgJOEz93HYA2TZaMLUWrPNrH0ANKDRZGlpm', 2, 'default.jpg', '082174582373', 'Bekasi', NULL, 0, 0, NULL, 0, 0, 1716345882, 1),
(21, NULL, NULL, 89922433, 'Vania Cassandra', '2005-03-11', 'vania@gmail.com', 'vaniacas', '$2y$10$kCBGdjju6rypvMNQJhNUJ.QdTOFHhCVZHh2tQNGWlDBbi2j/y/T/G', 3, 'default.jpg', '087839173927', 'Depok', 101, 0, 400500, NULL, 0, 0, 1716385605, 1),
(22, NULL, NULL, 33104308, 'Tanya Degurechaff', '1999-11-29', 'tanya@gmail.com', 'tanya', '$2y$10$Q9Gfiaw5tIMX40SgWBis0O7ZMCl4.wXu.liygUbsC3fLKFRZSluJi', 3, 'default.jpg', '082161872392', 'Uni Soviet', 2.51, 0, 11300, NULL, 0, 0, 1716385883, 1),
(23, NULL, NULL, 36769235, 'Izumi Sagiri', '2007-12-10', 'sagiri@gmail.com', 'sagiri', '$2y$10$gkkRBANQBv5V.5m7YiYtUObwP.wjeiGRhZvUCQL8432/XdR2dczgm', 3, 'default.jpg', '082161872392', 'Japan', 0, 0, 0, 'Akun tidak aktif', 0, 0, 1716387567, 0),
(24, NULL, NULL, 22786747, 'Danu Setiawan', '2001-11-29', 'danu@gmail.com', 'danuset', '$2y$10$xhVw902BGWYMGTGoQOoQRekf0PIBib8arphkpCbbq99NOR3CbuZau', 3, 'default.jpg', '087827491133', 'Bekasi', 0, 0, 0, NULL, 0, 0, 1716561279, 1),
(25, NULL, NULL, 49464707, 'Brian Griffin', '2004-01-15', 'mlaku@gmail.com', 'briang', '$2y$10$zDki3yCJ/KRSL9sVLWVfi.4b9TVam53x80TebjoVD0r1QhQ6/Dr6u', 3, 'default.jpg', '085858589999', 'BSD', 0, 0, 0, NULL, 0, 0, 1716869123, 1),
(26, NULL, NULL, 14099047, 'Boya Bayu', '2024-05-29', 'bayu@gmail.com', 'boyal', '$2y$10$yY96bTS8fKH/e60s4c2yD.Cfm5YnjflQJOnPesu3FYrsOcPqC3sbG', 3, 'default.jpg', '081212001200', 'BSD', 0, 0, 0, NULL, 0, 0, 1716981005, 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
(10, 5, 'Informasi Member', 'member/listMember', 'fas fa-fw fa-users', 1),
(12, 8, 'Manajemen Transaksi', 'transaction', 'fa-solid fa-money-bill-transfer', 1),
(13, 8, 'Manajemen Keuangan', 'finance', 'fa-solid fa-money-bill\r\n', 1),
(14, 8, 'Manajemen Tarik Tunai', 'withdraw', 'fa-solid fa-money-bill-1', 1),
(15, 9, 'Manajemen Pengumuman', 'announcement', 'fa-solid fa-paste', 1),
(16, 6, 'Manajemen Laporan', 'reports', 'fa-solid fa-file', 1),
(17, 10, 'Log Transaksi', 'log/transaction', 'fa-solid fa-file-lines', 1),
(18, 10, 'Log Tarik Tunai', 'log/withdraw', 'fa-solid fa-file-invoice-dollar', 1),
(19, 10, 'Log Laporan Masalah', 'log/reports', 'fa-solid fa-file-prescription', 1),
(20, 6, 'Informasi Perusahaan', 'perusahaan', 'fas fa-fw fa-circle-info', 1),
(21, 9, 'Manajemen Keamanan', 'secure', 'fa-solid fa-building-lock', 1),
(22, 10, 'Log Keuangan', 'log/accounting', 'fa-solid fa-file-code', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `withdraw`
--

INSERT INTO `withdraw` (`id`, `id_member`, `username`, `nominal`, `tanggal`, `jam`, `lokasi`, `metode`, `norek`, `catatan`, `petugas`, `status`, `koin1`, `koin2`) VALUES
(1, 10480001, 'betara', 50000, '2024-05-28', '23:17:10', 'Tenant Serpong', 'Tunai', '', '', '', 'Diberikan tunai', 1443989, 1393989),
(2, 89922433, 'vaniacas', 25000, '2024-06-06', '23:22:32', 'Tenant Serpong', 'Tunai', '', '', '', 'Diberikan tunai', 175500, 150500),
(3, 10480001, 'betara', 15000, '2024-06-06', '23:25:27', 'Tenant Serpong', 'Transfer Bank', '', 'OVO Payment', '', 'Sudah ditransfer', 1393989, 1378989),
(4, 10480001, 'betara', 50000, '2024-06-06', '23:34:50', 'Tenant Serpong', 'Transfer Bank', '', 'OVO Payment', '', 'Sudah ditransfer', 1378989, 1328989),
(6, 10480001, 'betara', 50000, '2024-06-23', '09:36:52', 'Tenant Serpong', 'Tunai', '', '', 'derby', 'Diberikan tunai', 3118689, 3068689);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `distribution`
--
ALTER TABLE `distribution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
