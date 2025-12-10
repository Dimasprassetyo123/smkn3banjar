-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 10, 2025 at 05:13 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `compeny_profile`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `school_logo` text NOT NULL,
  `school_banner` varchar(200) NOT NULL,
  `school_tagline` varchar(255) NOT NULL,
  `school_description` text NOT NULL,
  `since` date NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `school_name`, `school_logo`, `school_banner`, `school_tagline`, `school_description`, `since`, `alamat`) VALUES
(1, 'SMKN 3 BANJAR', '1756008929_logo.png', '1756450144_banner.png', 'SMK NEGERI 3 BANJAR BERSAMA KITA BISA', 'SMK Negeri 3 Banjar merupakan sekolah kejuruan yang memiliki enam jurusan dan berbagai macam laboratorium untuk praktik.', '2008-06-01', 'Jl. Julaeni, RT/RW 5/2, Dsn. Langensari, Kel. Langensari, Kec. Langensari, Kota Banjar, Jawa Barat 46341');

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `id` bigint NOT NULL,
  `image` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`id`, `image`, `title`, `description`) VALUES
(9, '1756447150.png', 'Juara 1 Futsal Putra', 'Atas prestasi yang di raih oleh tim Puma futsal di indor SC Langgensari '),
(10, '1756447345.png', 'Juara 2 Bola Voli', 'kapolres cup x stisip bp Banjar 2027'),
(11, '1756447604.png', 'Juara 1 O2SN Silat Putra', 'Prestasi yang di raih pada lomba O2SN pencak silat Tingkat Kota Banjar'),
(13, '1756447753.jpg', 'Juara 2 Silat Tingkat Kota Banjar Putri', 'Prestasi yang di raih pada lomba O2SN Tingkat Kota Bnajar Pencaksilat');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint NOT NULL,
  `announcements_title` varchar(255) NOT NULL,
  `announcements_image` text NOT NULL,
  `announcements_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `announcements_title`, `announcements_image`, `announcements_description`) VALUES
(5, 'HIMBAUAN ORANG TUA', '1756623949.jpg', 'Tentang penerapan jam malam bagi peserta didik mewujudkan generasi panca waluya jawa barat istimewa pastikan anak kita sudah di rumah pukul 21.00'),
(8, 'zzzzz', '1757222074.jpg', 'zzzzz');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint NOT NULL,
  `image` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `image`, `title`, `content`) VALUES
(3, '1756652652.png', 'Serah Terimas Jabatan', 'SMKN 3 BANJAR Serah Terima Jabatan\r\nPlt. Kepala SMK Negeri 3 Banjar dari bapak Dede Fajriadi, S.Pd., M.Pd. kepada bapak Rusdiharto, S.Pd');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `email`, `phone`) VALUES
(1, 'info@example.com', '+012 345 67890');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `image`, `description`) VALUES
(5, '1756278632.png', 'Kunjungan Industri Jurusan TKRO ke Balai Yasa PT. KAI dan PT. FUTAKE INDONESIA 2023'),
(6, '1756278789.jpg', 'Kunjungan Industri Jurusan TBSM ke BLPT Jogjakarta 2023'),
(7, '1756278964.jpg', 'Kunjungan Industri Jurusan APAT ke BPTPB Jogjakarta\r\n\r\n'),
(8, '1756279113.jpg', 'Foto Bersama Visitasi Akreditasi SMK Negeri 3 Banjar');

-- --------------------------------------------------------

--
-- Table structure for table `headmasters`
--

CREATE TABLE `headmasters` (
  `id` bigint NOT NULL,
  `headmasters_name` varchar(255) NOT NULL,
  `headmasters_photo` text NOT NULL,
  `headmasters_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `headmasters`
--

INSERT INTO `headmasters` (`id`, `headmasters_name`, `headmasters_photo`, `headmasters_description`) VALUES
(22, 'Rusdiharto S.pd', '1756557355.png', 'Alhamdulillahi robbil alamin kami panjatkan kehadlirat Allah SWT, bahwasannya dengan rahmat dan karunia-Nya lah akhirnya Website sekolah ini dengan alamat www.smkn3banjar.sch.id ini dapat kami perbaharui. Kami mengucapkan selamat datang di Website kami Sekolah Menengah Kejuruan Negeri 3 banjar yang saya tujukan untuk seluruh unsur pimpinan, guru, karyawan dan siswa serta khalayak umum guna dapat mengakses seluruh informasi tentang segala profil, aktifitas/kegiatan serta fasilitas sekolah kami. Kami selaku pimpinan sekolah mengucapkan terima kasih kepada tim pembuat Website ini yang telah berusaha untuk dapat lebih memperkenalkan segala perihal yang dimiliki oleh sekolah. Dan tentunya Website sekolah kami masih terdapat banyak kekurangan, oleh karena itu kepada seluruh civitas akademika dan masyarakat umum dapat memberikan saran dan kritik yang membangun demi kemajuan Website ini lebih lanjut. Saya berharap Website ini dapat dijadikan wahana interaksi yang positif baik antar civitas akademika maupun masyarakat pada umumnya sehingga dapat menjalin silaturahmi yang erat disegala unsur. Mari kita bekerja dan berkarya dengan mengharap ridho sang Kuasa dan keikhlasan yang tulus dijiwa demi anak bangsa. Terima kasih semoga Allah ‘Azza Wa Jalla menyertai doa kita semua……amin.');

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `id` bigint NOT NULL,
  `majors_name` varchar(255) NOT NULL,
  `majors_image` text NOT NULL,
  `majors_description` text NOT NULL,
  `head` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`id`, `majors_name`, `majors_image`, `majors_description`, `head`) VALUES
(11, 'RPL ', '1756365584.png', 'RPL adalah singkatan dari Rekayasa Perangkat Lunak dan merupakan sebuah jurusan yang ada di Sekolah Menengah Kejuruan (SMK). RPL adalah sebuah jurusan yang mempelajari dan mendalami semua cara-cara pengembangan perangkat lunak termasuk pembuatan, pemeliharaan, manajemen organisasi pengembangan perangkat lunak dan manajemen kualitas.', 'Yasrifan Mahzar Nurisa, S.Kom.'),
(12, 'APHP', '1756366669.png', 'Agribisnis Pengolahan Hasil Pertanian atau biasa disingkat dengan APHP merupakan kompetensi keahlian yang mempelajari bagaimana pengolahan hasil tani hingga menjadi suatu produk yang memiliki nilai jual tinggi, termasuk bagaimana penjualan produk tersebut.', 'Dwi Astuti, ST'),
(13, 'TBSM', '1756366731.png', 'Teknik dan Bisnis Sepeda Motor adalah kompetensi keahlian pada Bidang Studi Keahlian Teknologi dan Rekayasa Program Studi Keahlian Teknik Otomotif yang menekankan pada keterampilan pelayanan jasa mekanik kendaraan sepeda motor roda dua. Kompetensi Keahlian Teknik dan Bisnis Sepeda Motor menyiapkan peserta didik untuk bekerja pada bidang pekerjaan yang dikelola oleh badan, instansi atau perusahaan maupun pribadi (wirausaha).\r\n\r\n', 'Wagino, S.Pd'),
(14, 'TKR', '1756366791.png', 'Teknik Kendaraan Ringan Otomotif (TKRO) merupakan kompetensi keahlian pada rumpun program keahlian teknik otomotif. Beberapa tahun lalu mungkin kita familiar dan mengenal jurusan ini dengan Teknik Otomotif. Jadi Jurusan ini memfokuskan peserta didiknya dalam bidang otomotif khususnya mobil baik niaga maupun penumpang. Siswa akan dibekali keterampilan seperti melakukan perawatan dan perbaikan komponen mobil sampai dengan perbaikan mobil sesuai dengan standar yang ditetapkan.', ' Danu Sujiwa, ST'),
(15, 'AKL', '1756366856.png', 'Program Keahlian Akuntansi dan Keuangan Lembaga secara umum memberikan keterampilan kepada peserta didik untuk mengelola dan melakukan pencatatan keuangan secara manual maupun komputerisasi, dan membekali peserta dengan keterampilan akuntansi, mengelola transaksi keuangan, pajak dan membentuk siswa yang bersikap mandiri dan berkarakter sehingga lulusannya dapat menjadi staff accounting yang handal', 'Diki Zaitun, M.Pd.'),
(16, 'APAT', '1756366906.png', 'Agribisnis Perikanan Air Tawar atau sering juga disebut dengan APAT adalah jurusan yang mempelajari proses pemeliharaan dan pengelolaan ikan air tawar untuk kepentingan usaha. Mata pelajaran yang diberikan antara lain Dasar-dasar budidaya perikanan, Teknik pengembangbiakan komoditas Perikanan Air Tawar, serta hasil perikanan dan kewirausahaan', 'Wahyudin Abdul Hadi, STP');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(9, 'Dimas Prassetyo', 'dimas@gmail.com', 'sa', '2025-09-03 08:22:31'),
(10, 'Dimas Prassetyo', 'dimas@gmail.com', 'aaaaaaaaa', '2025-09-04 03:34:16'),
(15, 'Dimas Prassetyo', 'rifki@gmail.com', 'aaaaa', '2025-09-10 06:12:14'),
(16, 'muhamad', 'yanto@gmail.com', 'zzzz', '2025-09-10 06:12:52');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` bigint NOT NULL,
  `icon` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `link_url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `icon`, `title`, `link_url`) VALUES
(6, 'bi bi-youtube', 'Youtube', 'https://youtu.be/FW1Ywl82DyM?si=Hm3ka55ocPRr8ETJ'),
(7, 'bi bi-instagram', 'instagram', 'https://www.instagram.com/smkn3banjar/');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint NOT NULL,
  `teachers_name` varchar(255) NOT NULL,
  `teachers_photo` text NOT NULL,
  `teachers_major` varchar(255) NOT NULL,
  `jk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `teachers_name`, `teachers_photo`, `teachers_major`, `jk`) VALUES
(8, 'Maman Suparman, ST', '1756259492.png', 'PPLG (Pemograman Bahasa Lunak Dan Gim)', 'Laki-laki'),
(9, 'Gema Patimah, S.Pd', '1756259556.png', 'MATEMATIKA', 'Perempuan'),
(10, 'Fitriana Laela, S.Pd.', '1756259616.png', 'SEJARAH', 'Perempuan'),
(11, 'Azka Dalila Nurlimatin, S.Pd', '1756259681.png', 'BAHASA JEPANG', 'Perempuan'),
(12, 'Siti Maryam, S.Pd.', '1756259839.png', 'BIMBINGAN KONSELING', 'Perempuan'),
(13, 'Wahyu Suryaman, SE.,ST', '1756259981.png', 'PPL (PEMOGRAMAN PERANGKAT LUNAK)', 'Laki-laki'),
(14, 'Yusep Yanuar Sanjaya, S.Pd', '1756260069.png', 'BAHASA INGGRIS', 'Laki-laki'),
(15, 'Yasrifan Mahzar Nurisa, S.Kom', '1756260588.png', 'PPLG (Pemograman Bahasa Lunak Dan Gim)', 'Laki-laki');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `massage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `rating` tinyint NOT NULL DEFAULT '5'
) ;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `image`, `name`, `status`, `massage`, `rating`) VALUES
(3, '1756321091.png', 'Dimas Prassetyo', 'Pelajar SMKN 3 BANJAR', 'SMKN 3 Banjar tidak hanya mengajarkan teori tetapi juga praktik nyata yang berguna di industri. Melalui berbagai program magang dan pelatihan, ', 5),
(4, '1756321446.png', 'Agus ', 'Pelajar SMKN 3 BANJAR', '\"Bersekolah di SMKN 3 Banjar adalah pengalaman yang sangat berharga. Guru-guru yang kompeten dan fasilitas yang lengkap membantu saya mengembangkan keterampilan praktis yang siap untuk dunia kerja.', 5),
(6, '1756616110.png', 'Anisa', 'Pelajar SMKN 3 BANJAR', '\"Belajar di SMKN 3 Banjar membuat saya siap menghadapi dunia kerja. Guru-guru selalu mendukung dan fasilitas sekolah sangat lengkap. Saya merasa lebih percaya diri dan terampil setelah lulus.\"', 3),
(7, '1756616157.png', 'Auliya', 'Pelajar SMKN 3 BANJAR', '\"SMKN 3 Banjar memiliki suasana belajar yang menyenangkan. Program praktiknya membantu saya memahami materi secara nyata. Saya senang bisa belajar sambil langsung mempraktekan keahlian saya.\"', 5),
(8, '1756616218.png', 'Aminah', 'Pelajar SMKN 3 BANJAR', '\"Guru-guru di SMKN 3 Banjar sangat profesional dan ramah. Setiap pelajaran selalu disertai praktik sehingga lebih mudah dipahami. Saya bangga menjadi bagian dari sekolah ini.\"', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('admin','staff') NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`) VALUES
(14, 'admin', 'admin@gmail.com', 'admin', '123'),
(15, 'stafff', 'staff@gmail.com', 'staff', '123');

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--

CREATE TABLE `user_sessions` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `login_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `logout_at` timestamp NULL DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_sessions`
--

INSERT INTO `user_sessions` (`id`, `user_id`, `username`, `login_at`, `logout_at`, `ip_address`, `user_agent`) VALUES
(1, 10, 'superadmin@gmail.com', '2025-09-03 14:20:36', '2025-09-03 14:20:53', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36'),
(2, 9, 'admin@gmail.com', '2025-09-03 14:21:06', '2025-09-04 02:43:01', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36'),
(3, 10, 'superadmin@gmail.com', '2025-09-04 02:43:39', '2025-09-04 02:50:55', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36'),
(4, 11, 'dimas@gmail.com', '2025-09-04 02:51:04', '2025-09-04 06:06:07', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36'),
(5, 9, 'admin@gmail.com', '2025-09-04 06:07:10', '2025-09-04 06:39:03', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36'),
(6, 10, 'superadmin@gmail.com', '2025-09-04 06:39:23', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36'),
(7, 10, 'superadmin@gmail.com', '2025-09-05 10:07:38', '2025-09-08 04:27:11', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36'),
(8, 14, 'admin@gmail.com', '2025-09-08 04:27:28', '2025-09-08 04:27:50', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36'),
(9, 15, 'staff@gmail.com', '2025-09-08 04:28:19', '2025-09-08 04:28:29', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36'),
(10, 14, 'admin@gmail.com', '2025-09-08 04:28:38', '2025-09-09 08:07:47', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36'),
(11, 15, 'staff@gmail.com', '2025-09-09 08:08:02', '2025-09-09 08:10:04', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36'),
(12, 14, 'admin@gmail.com', '2025-09-09 08:10:19', '2025-09-09 08:20:13', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36'),
(13, 15, 'staff@gmail.com', '2025-09-09 08:20:28', '2025-09-10 06:26:01', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36'),
(14, 14, 'admin@gmail.com', '2025-09-10 06:26:14', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36'),
(15, 14, 'admin@gmail.com', '2025-09-10 07:14:52', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36'),
(16, 14, 'admin@gmail.com', '2025-09-15 04:11:30', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36'),
(17, 14, 'admin@gmail.com', '2025-09-22 06:39:04', '2025-09-22 06:39:22', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36'),
(18, 15, 'staff@gmail.com', '2025-09-22 06:40:21', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36'),
(19, 14, 'admin@gmail.com', '2025-10-06 05:37:32', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36'),
(20, 14, 'admin@gmail.com', '2025-11-25 02:16:30', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36'),
(21, 14, 'admin@gmail.com', '2025-11-25 02:32:12', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36');

-- --------------------------------------------------------

--
-- Table structure for table `visi_misions`
--

CREATE TABLE `visi_misions` (
  `id` bigint UNSIGNED NOT NULL,
  `category` enum('visi','misi') NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `visi_misions`
--

INSERT INTO `visi_misions` (`id`, `category`, `text`) VALUES
(2, 'visi', 'MENGHASILKAN LULUSAN YANG KOMPETITIF DAN BERAKHLAK MULIA'),
(3, 'misi', 'MENINGKATKAN PROFESIONALITAS GURU DAN TENAGA KEPENDIDIKAN.\r\nMENANAMKAN SOFT SKILLS DAN HARD SKILLS PADA PESERTA DIDIK.\r\nMENYEDIAKAN FASILITAS PEMBELAJARAN YANG REPRESENTATIF MELALUI PROGRAM REVITALISASI SMK.\r\nMENCIPTAKAN LINGKUNGAN YANG SEHAT, AMAN, RINDANG, DAN INDAH.\r\nMENJALIN KERJASAMA YANG OPTIMAL DENGAN INDUSTRI DAN DUNIA KERJA.\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `headmasters`
--
ALTER TABLE `headmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_email` (`email`);

--
-- Indexes for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visi_misions`
--
ALTER TABLE `visi_misions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `headmasters`
--
ALTER TABLE `headmasters`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `majors`
--
ALTER TABLE `majors`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_sessions`
--
ALTER TABLE `user_sessions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `visi_misions`
--
ALTER TABLE `visi_misions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
