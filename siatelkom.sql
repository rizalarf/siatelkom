-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2017 at 02:21 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siatelkom`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosens`
--

CREATE TABLE `dosens` (
  `id` int(10) UNSIGNED NOT NULL,
  `dosNip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dosNama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dosEmail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dosKontak` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dosens`
--

INSERT INTO `dosens` (`id`, `dosNip`, `dosNama`, `dosEmail`, `dosKontak`, `created_at`, `updated_at`) VALUES
(1, '197710092005011001', 'Muhammad Anif, S.T., M.Eng.', 'muhammad.anif@gmail.com', '08156601107', NULL, NULL),
(2, '196008241988031001', 'Agus Rochadi, S.T., M.M.', 'ir_aro@yahoo.com', '08122901427', NULL, NULL),
(3, '197203292000031001', 'Thomas Agung Setyawan, S.T., M.T.', 'tagungsetyawan@gmail.com', '08122843635', NULL, NULL),
(4, '197409282000032001', 'Eni Dwi Wardihani, S.T., M.T., DR.', 'edwardihani@gmail.com', '082141533357', NULL, NULL),
(5, '196710171997022001', 'Sri Anggraeni Kadiran S.T., M.Eng.', 'srianggraeni@gmail.com', '081361602718', NULL, NULL),
(6, '197307082005011001', 'Taufiq Yulianto, S.H., M.H.', 'taufiqyuli@gmail.com', '00', NULL, NULL),
(7, '197908102006041001', 'Helmy, S.T., M.Eng.', 'h3ln1k@gmail.com', '0811278186', NULL, NULL),
(8, '197206102000031001', 'Khamami, S.Ag., M.M.', 'khamami@gmail.com', '081325169567', NULL, NULL),
(9, '196107171986031001', 'Arif Nursyahid, Drs., M.T.', 'arif.nursyahid@polines.ac.id', '08122937024', NULL, NULL),
(10, '196506071990310001', 'Abu Hasan, S.T., M.T.', 'abu.hasan@polines.ac.id', '00', NULL, NULL),
(11, '196104241989031001', 'Endro Wasito, Ir., M.Kom.', 'endrowstgm@gmail.com', '081390919839', NULL, NULL),
(12, '195604261984031001', 'Eddy Triyono, Drs., S.T., M.T., DR.', 'eddytriyono@gmail.com', '08157611687', NULL, NULL),
(13, '197210271999031002', 'Amin Suharjono, S.T., M.T., DR.', 'amin.suharjono@gmail.com', '08164254883', NULL, NULL),
(14, '197409042005011001', 'Ari Sriyanto Nugroho, S.T., M.T., M.Sc.', 'ari.sriyanto@polines.ac.id', '08122974761', NULL, NULL),
(15, '195612091988031001', 'Bambang Eko Sumarsono., Drs., M.M.T.', 'bekos007@gmail.com', '081215587492', NULL, NULL),
(16, '196209111989031002', 'Budi Basuki S., S.T., M.Eng.', 'budi.basuki2010@gmail.com', '081226751962', NULL, NULL),
(17, '198208312005012001', 'Dewi Anggraeni K., S.Pd.', 'dewia@gmail.com', '00', NULL, NULL),
(18, '196902012000121001', 'Eko Supriyanto, S.T., M.T.', 'ekosupriyanto2000@yahoo.com', '081326621058', NULL, NULL),
(19, '196008221989032001', 'Endang Triyani, Dra., M.Pd.', 'endangtriyani@polines.ac.id', '00', NULL, NULL),
(20, '195705141986031012', 'Hery Purnomo, Drs., M.Pd.', 'herypurnomo@polines.ac.id', '00', NULL, NULL),
(21, '196107101988112001', 'Netty Nurdiyani, Dra., M.Hum.', 'netty@polines.ac.id', '00', NULL, NULL),
(22, '195704041987032001', 'Nur Saada, Dra., M.M', 'nursaada@polines.ac.id', '00', NULL, NULL),
(23, '196403091991031003', 'Sarono Widodo, S.T., M.Kom.', 'sarwede@gmail.com', '00', NULL, NULL),
(24, '197203112000031002', 'Sidiq S. H., S.T., M.T., DR.Eng.', 'sidiqsh@gmail.com', '085701572203', NULL, NULL),
(25, '196301251991031001', 'Sindung H. W. S., BSEE., M.Eng.Sc.', 'sindung.hadwi.ws@polines.ac.id', '08157731763', NULL, NULL),
(26, '196005101984031001', 'Slamet Widodo, Ir., M.Eng.', 'slawi92@yahoo.com', '082225913375', NULL, NULL),
(27, '198106092003121000', 'Subuh Pramono, S.T., M.T.', 'subuhpramono@gmail.com', '081321313482', NULL, NULL),
(28, '195709051988031001', 'Suhendro, Drs., M.M.', 'suhendro.suhe@gmail.com', '081214076015', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `haris`
--

CREATE TABLE `haris` (
  `id` int(10) UNSIGNED NOT NULL,
  `hrNama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `haris`
--

INSERT INTO `haris` (`id`, `hrNama`, `created_at`, `updated_at`) VALUES
(1, 'Senin', NULL, NULL),
(2, 'Selasa', NULL, NULL),
(3, 'Rabu', NULL, NULL),
(4, 'Kamis', NULL, NULL),
(5, 'Jumat', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jams`
--

CREATE TABLE `jams` (
  `id` int(10) UNSIGNED NOT NULL,
  `jmKode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jmMulai` time NOT NULL,
  `jmSelesai` time NOT NULL,
  `jmRange` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kaprodis`
--

CREATE TABLE `kaprodis` (
  `id` int(10) UNSIGNED NOT NULL,
  `idDosen` int(10) UNSIGNED NOT NULL,
  `kapMulai` date NOT NULL,
  `idProdi` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(10) UNSIGNED NOT NULL,
  `klsNama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idDosen` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `klsNama`, `idDosen`, `created_at`, `updated_at`) VALUES
(1, 'TE - 4A', 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kurikulums`
--

CREATE TABLE `kurikulums` (
  `id` int(10) UNSIGNED NOT NULL,
  `kurKode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kurNama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idProdi` int(10) UNSIGNED NOT NULL,
  `kurTahun` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kurSk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kurikulums`
--

INSERT INTO `kurikulums` (`id`, `kurKode`, `kurNama`, `idProdi`, `kurTahun`, `kurSk`, `created_at`, `updated_at`) VALUES
(1, '431-121-BC', 'Kurikulum D4 Telkom Broadcast', 2, '2012', 'SK/2012', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laporan_akhirs`
--

CREATE TABLE `laporan_akhirs` (
  `id` int(10) UNSIGNED NOT NULL,
  `idPas` int(10) UNSIGNED NOT NULL,
  `lapakTanggal` date NOT NULL,
  `lapakIsi` text COLLATE utf8_unicode_ci NOT NULL,
  `lapakKomen` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_harians`
--

CREATE TABLE `laporan_harians` (
  `id` int(10) UNSIGNED NOT NULL,
  `idPas` int(10) UNSIGNED NOT NULL,
  `lapTanggal` date NOT NULL,
  `lapIsi` text COLLATE utf8_unicode_ci NOT NULL,
  `lapKomen` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswas`
--

CREATE TABLE `mahasiswas` (
  `id` int(10) UNSIGNED NOT NULL,
  `mhsNim` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mhsNama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mhsEmail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mhsKontak` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mahasiswas`
--

INSERT INTO `mahasiswas` (`id`, `mhsNim`, `mhsNama`, `mhsEmail`, `mhsKontak`, `created_at`, `updated_at`) VALUES
(1, '4.31.13.0.01', 'Aisyah Suyitno Putri', 'aisyahsuyitnop@gmail.com', '081215568993', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliahs`
--

CREATE TABLE `mata_kuliahs` (
  `id` int(10) UNSIGNED NOT NULL,
  `makulKode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `makulNama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idKur` int(10) UNSIGNED NOT NULL,
  `makulSemester` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `makulSks` int(11) NOT NULL,
  `makulJam` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2017_05_09_015041_create_mahasiswas_table', 2),
(12, '2017_05_09_152914_create_dosens_table', 3),
(13, '2017_07_04_111736_create_program_studis_table', 3),
(14, '2017_07_04_111805_create_ruangs_table', 3),
(15, '2017_07_04_111824_create_perusahaans_table', 3),
(16, '2017_07_22_231836_create_jams_table', 3),
(17, '2017_07_22_232450_create_haris_table', 3),
(18, '2017_07_04_110948_create_kaprodis_table', 4),
(19, '2017_07_04_111237_create_kurikulums_table', 5),
(20, '2017_07_04_111749_create_kelas_table', 5),
(22, '2017_07_27_063322_create_pembimbing_lapangans_table', 6),
(23, '2017_07_26_094820_create_riwayat_pendidikans_table', 7),
(24, '2017_07_27_062020_create_mata_kuliahs_table', 7),
(25, '2017_07_27_092429_create_pasangans_table', 7),
(26, '2017_07_27_094855_create_pengampus_table', 8),
(27, '2017_07_27_095425_create_nilai_pemb_laps_table', 8),
(28, '2017_07_27_095711_create_nilai_dosens_table', 8),
(29, '2017_07_27_100138_create_laporan_harians_table', 8),
(30, '2017_07_27_100344_create_laporan_akhirs_table', 8),
(31, '2017_07_27_103037_create_nilai_magangs_table', 9),
(32, '2017_07_27_100921_create_reports_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_dosens`
--

CREATE TABLE `nilai_dosens` (
  `id` int(10) UNSIGNED NOT NULL,
  `idPas` int(10) UNSIGNED NOT NULL,
  `ndosNilai` double(8,2) NOT NULL,
  `ndosKet` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_magangs`
--

CREATE TABLE `nilai_magangs` (
  `id` int(10) UNSIGNED NOT NULL,
  `idPas` int(10) UNSIGNED NOT NULL,
  `idNilPemb` int(10) UNSIGNED NOT NULL,
  `idNilDos` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_pemb_laps`
--

CREATE TABLE `nilai_pemb_laps` (
  `id` int(10) UNSIGNED NOT NULL,
  `idPas` int(10) UNSIGNED NOT NULL,
  `npNilai` double(8,2) NOT NULL,
  `npKet` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pasangans`
--

CREATE TABLE `pasangans` (
  `id` int(10) UNSIGNED NOT NULL,
  `idMahasiswa` int(10) UNSIGNED NOT NULL,
  `idDosen` int(10) UNSIGNED NOT NULL,
  `idPemb` int(10) UNSIGNED NOT NULL,
  `idPerus` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembimbing_lapangans`
--

CREATE TABLE `pembimbing_lapangans` (
  `id` int(10) UNSIGNED NOT NULL,
  `pembNik` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pembNama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pembEmail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pembKontak` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idPerus` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pembimbing_lapangans`
--

INSERT INTO `pembimbing_lapangans` (`id`, `pembNik`, `pembNama`, `pembEmail`, `pembKontak`, `idPerus`, `created_at`, `updated_at`) VALUES
(1, '19790', 'Paolo', 'paolo@gmail.com', '085640600600', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengampus`
--

CREATE TABLE `pengampus` (
  `id` int(10) UNSIGNED NOT NULL,
  `idDosen` int(10) UNSIGNED NOT NULL,
  `idMakul` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perusahaans`
--

CREATE TABLE `perusahaans` (
  `id` int(10) UNSIGNED NOT NULL,
  `perusNama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `perusAlamat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `perusKontak` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `perusEmail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `perusahaans`
--

INSERT INTO `perusahaans` (`id`, `perusNama`, `perusAlamat`, `perusKontak`, `perusEmail`, `created_at`, `updated_at`) VALUES
(1, 'PT Datacomm Diangraha', 'Jl. Kapten Tendean 18A  RT.2/RW.2, Mampang Prapatan, Jakarta Selatan, Jakarta 12790, Indonesia', '(021) 29979797', 'marketing@datacomm.co.id', NULL, NULL),
(2, 'PT PGAS Telekomunikasi Nusantara', 'Gedung B, 4th floor Komplek PT PGN (Persero) Tbk Jl. KH. Zainul Arifin No. 20, Jakarta Barat 11140, Indonesia', '(021) 6331345', 'sales@pgascom.co.id', NULL, NULL),
(3, 'PT PGAS Telekomunikasi Nusantara', 'Jl. Kapten Tendean 18A  RT.2/RW.2, Mampang Prapatan', '(021) 29979797', 'sales@pgascom.co.id', NULL, NULL),
(4, 'PT Telekomunikasi Seluler (Telkomsel)', 'Jl. TB. Simatupang, Jagakarsa, RT.3/RW.2, Tj. Bar., Jagakarsa, Jakarta Selatan, Jakarta 12530, Indonesia', '(021) 6331345', 'sales@telkomsel.ac.id', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `program_studis`
--

CREATE TABLE `program_studis` (
  `id` int(10) UNSIGNED NOT NULL,
  `prodiKode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prodiNama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `program_studis`
--

INSERT INTO `program_studis` (`id`, `prodiKode`, `prodiNama`, `created_at`, `updated_at`) VALUES
(2, '431', 'D4 TEKNIK TELEKOMUNIKASI', NULL, NULL),
(3, '333', 'D3 TEKNIK TELEKOMUNIKASI', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `idPas` int(10) UNSIGNED NOT NULL,
  `idLapHar` int(10) UNSIGNED NOT NULL,
  `idLapAkhir` int(10) UNSIGNED NOT NULL,
  `idNilaiMag` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pendidikans`
--

CREATE TABLE `riwayat_pendidikans` (
  `id` int(10) UNSIGNED NOT NULL,
  `idMahasiswa` int(10) UNSIGNED NOT NULL,
  `riSemester` int(11) NOT NULL,
  `idKelas` int(10) UNSIGNED NOT NULL,
  `riTahunAkt` int(11) NOT NULL,
  `idProdi` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ruangs`
--

CREATE TABLE `ruangs` (
  `id` int(10) UNSIGNED NOT NULL,
  `ruangNama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ruangJenis` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ruangs`
--

INSERT INTO `ruangs` (`id`, `ruangNama`, `ruangJenis`, `created_at`, `updated_at`) VALUES
(1, 'SB-I/01', 'Teori', NULL, NULL),
(2, 'SB-I/03', 'Teori', NULL, NULL),
(3, 'SB-I/04', 'Teori', NULL, NULL),
(4, 'SB-II/04', 'Praktek', NULL, NULL),
(5, 'SB-II/07', 'Praktek', NULL, NULL),
(6, 'SA-II/01', 'Teori', NULL, NULL),
(7, 'SA-II/05', 'Teori', NULL, NULL),
(8, 'SA-II/06', 'Teori', NULL, NULL),
(9, 'LB-I/01', 'Teori / Praktek', NULL, NULL),
(10, 'LB-I/02', 'Teori / Praktek', NULL, NULL),
(11, 'LB-I/03', 'Teori / Praktek', NULL, NULL),
(12, 'LB-I/04', 'Teori / Praktek', NULL, NULL),
(13, 'LB-I/05', 'Teori / Praktek', NULL, NULL),
(14, 'LT-I/01', 'Teori / Praktek', NULL, NULL),
(15, 'LT-II/01', 'Teori / Praktek', NULL, NULL),
(16, 'BC-III/01', 'Teori', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` enum('Administrator','Mahasiswa','Dosen','Kaprodi','Pembimbing Lapangan') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Mahasiswa',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`, `remember_token`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Administrator', 'admin@gmail.com', '$2y$10$pkN5Oo6rh8rxyT35ne3/i.3Iog6S6hon7bhdSkoEI5hqERQNKUH4.', 'N9mfj8EWLlbvW73YPGiMpPK4Lpu1wppwsZUm0837VFIsUrC0xGiBt6iqUanP', 'Administrator', '2017-07-11 02:01:47', '2017-07-11 02:01:47'),
(2, 'Dosen', 'Dosen', 'dosen@gmail.com', '$2y$10$.ucs9GHiy1pAP3tzYTFbTOsl.wb/YVStozQ2RqzQ7DAymqDP7NxsG', 'CHES7WYY0iXYdTHwK4NQPMCsPTljrR5eA3ryo6KaegfYCa5qDrBpnpHXswsV', 'Dosen', '2017-07-11 02:02:20', '2017-07-11 02:02:20'),
(3, 'Kaprodi', 'Kaprodi', 'kaprodi@gmail.com', '$2y$10$/EhoKnfw/itVS4/HQwz3J.6e5k7Hw.7oKG7w68kZ6MHE.P4fMoiVO', 'FXPTvEN8YroNH7MaZ89nV7W1dmMpOQCEjYVz7ge58rVDgND3Bq5lASxzm3Cf', 'Kaprodi', '2017-07-11 02:03:18', '2017-07-11 02:03:18'),
(4, 'Rizal', 'Rizal', 'rizal@gmail.com', '$2y$10$U5IQVrrDljG9chcsIMc13uE6zM2CcXAOCY7djlrB17lJclqRDTHna', 'FlUxmgxas53JdDxPAxJPqsImsPuilcM3vjiCsShXFtMWe2idlDpuVPQGtVVy', 'Mahasiswa', '2017-07-11 02:03:56', '2017-07-11 02:03:56'),
(5, 'Erik', 'Erik', 'erik@gmail.com', '$2y$10$nZMxC1ouh.1Y16aGz5IkN.zPYOD31yIoAH.oGf5b03v5vwyiLZBH6', 'BxO6hizF2IHST9KYIg62yUYGt15W2QfKnBJLO76pejGzJne1RgQcYr731ux0', 'Pembimbing Lapangan', '2017-07-11 02:04:50', '2017-07-11 02:04:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosens`
--
ALTER TABLE `dosens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dosens_dosemail_unique` (`dosEmail`);

--
-- Indexes for table `haris`
--
ALTER TABLE `haris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jams`
--
ALTER TABLE `jams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kaprodis`
--
ALTER TABLE `kaprodis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kaprodis_iddosen_foreign` (`idDosen`),
  ADD KEY `kaprodis_idprodi_foreign` (`idProdi`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_iddosen_foreign` (`idDosen`);

--
-- Indexes for table `kurikulums`
--
ALTER TABLE `kurikulums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kurikulums_idprodi_foreign` (`idProdi`);

--
-- Indexes for table `laporan_akhirs`
--
ALTER TABLE `laporan_akhirs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laporan_akhirs_idpas_foreign` (`idPas`);

--
-- Indexes for table `laporan_harians`
--
ALTER TABLE `laporan_harians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laporan_harians_idpas_foreign` (`idPas`);

--
-- Indexes for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mahasiswas_mhsemail_unique` (`mhsEmail`);

--
-- Indexes for table `mata_kuliahs`
--
ALTER TABLE `mata_kuliahs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mata_kuliahs_idkur_foreign` (`idKur`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_dosens`
--
ALTER TABLE `nilai_dosens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_dosens_idpas_foreign` (`idPas`);

--
-- Indexes for table `nilai_magangs`
--
ALTER TABLE `nilai_magangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_magangs_idpas_foreign` (`idPas`),
  ADD KEY `nilai_magangs_idnilpemb_foreign` (`idNilPemb`),
  ADD KEY `nilai_magangs_idnildos_foreign` (`idNilDos`);

--
-- Indexes for table `nilai_pemb_laps`
--
ALTER TABLE `nilai_pemb_laps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_pemb_laps_idpas_foreign` (`idPas`);

--
-- Indexes for table `pasangans`
--
ALTER TABLE `pasangans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pasangans_idmahasiswa_foreign` (`idMahasiswa`),
  ADD KEY `pasangans_iddosen_foreign` (`idDosen`),
  ADD KEY `pasangans_idpemb_foreign` (`idPemb`),
  ADD KEY `pasangans_idperus_foreign` (`idPerus`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `pembimbing_lapangans`
--
ALTER TABLE `pembimbing_lapangans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembimbing_lapangans_idperus_foreign` (`idPerus`);

--
-- Indexes for table `pengampus`
--
ALTER TABLE `pengampus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengampus_iddosen_foreign` (`idDosen`),
  ADD KEY `pengampus_idmakul_foreign` (`idMakul`);

--
-- Indexes for table `perusahaans`
--
ALTER TABLE `perusahaans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_studis`
--
ALTER TABLE `program_studis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_idpas_foreign` (`idPas`),
  ADD KEY `reports_idlaphar_foreign` (`idLapHar`),
  ADD KEY `reports_idlapakhir_foreign` (`idLapAkhir`),
  ADD KEY `reports_idnilaimag_foreign` (`idNilaiMag`);

--
-- Indexes for table `riwayat_pendidikans`
--
ALTER TABLE `riwayat_pendidikans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `riwayat_pendidikans_idmahasiswa_foreign` (`idMahasiswa`),
  ADD KEY `riwayat_pendidikans_idkelas_foreign` (`idKelas`),
  ADD KEY `riwayat_pendidikans_idprodi_foreign` (`idProdi`);

--
-- Indexes for table `ruangs`
--
ALTER TABLE `ruangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosens`
--
ALTER TABLE `dosens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `haris`
--
ALTER TABLE `haris`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `jams`
--
ALTER TABLE `jams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kaprodis`
--
ALTER TABLE `kaprodis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kurikulums`
--
ALTER TABLE `kurikulums`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `laporan_akhirs`
--
ALTER TABLE `laporan_akhirs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `laporan_harians`
--
ALTER TABLE `laporan_harians`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mata_kuliahs`
--
ALTER TABLE `mata_kuliahs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `nilai_dosens`
--
ALTER TABLE `nilai_dosens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nilai_magangs`
--
ALTER TABLE `nilai_magangs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nilai_pemb_laps`
--
ALTER TABLE `nilai_pemb_laps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pasangans`
--
ALTER TABLE `pasangans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pembimbing_lapangans`
--
ALTER TABLE `pembimbing_lapangans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pengampus`
--
ALTER TABLE `pengampus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `perusahaans`
--
ALTER TABLE `perusahaans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `program_studis`
--
ALTER TABLE `program_studis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `riwayat_pendidikans`
--
ALTER TABLE `riwayat_pendidikans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ruangs`
--
ALTER TABLE `ruangs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `kaprodis`
--
ALTER TABLE `kaprodis`
  ADD CONSTRAINT `kaprodis_iddosen_foreign` FOREIGN KEY (`idDosen`) REFERENCES `dosens` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kaprodis_idprodi_foreign` FOREIGN KEY (`idProdi`) REFERENCES `program_studis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_iddosen_foreign` FOREIGN KEY (`idDosen`) REFERENCES `dosens` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kurikulums`
--
ALTER TABLE `kurikulums`
  ADD CONSTRAINT `kurikulums_idprodi_foreign` FOREIGN KEY (`idProdi`) REFERENCES `program_studis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `laporan_akhirs`
--
ALTER TABLE `laporan_akhirs`
  ADD CONSTRAINT `laporan_akhirs_idpas_foreign` FOREIGN KEY (`idPas`) REFERENCES `pasangans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `laporan_harians`
--
ALTER TABLE `laporan_harians`
  ADD CONSTRAINT `laporan_harians_idpas_foreign` FOREIGN KEY (`idPas`) REFERENCES `pasangans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mata_kuliahs`
--
ALTER TABLE `mata_kuliahs`
  ADD CONSTRAINT `mata_kuliahs_idkur_foreign` FOREIGN KEY (`idKur`) REFERENCES `kurikulums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai_dosens`
--
ALTER TABLE `nilai_dosens`
  ADD CONSTRAINT `nilai_dosens_idpas_foreign` FOREIGN KEY (`idPas`) REFERENCES `pasangans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai_magangs`
--
ALTER TABLE `nilai_magangs`
  ADD CONSTRAINT `nilai_magangs_idnildos_foreign` FOREIGN KEY (`idNilDos`) REFERENCES `nilai_dosens` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_magangs_idnilpemb_foreign` FOREIGN KEY (`idNilPemb`) REFERENCES `nilai_pemb_laps` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_magangs_idpas_foreign` FOREIGN KEY (`idPas`) REFERENCES `pasangans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai_pemb_laps`
--
ALTER TABLE `nilai_pemb_laps`
  ADD CONSTRAINT `nilai_pemb_laps_idpas_foreign` FOREIGN KEY (`idPas`) REFERENCES `pasangans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pasangans`
--
ALTER TABLE `pasangans`
  ADD CONSTRAINT `pasangans_iddosen_foreign` FOREIGN KEY (`idDosen`) REFERENCES `dosens` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pasangans_idmahasiswa_foreign` FOREIGN KEY (`idMahasiswa`) REFERENCES `mahasiswas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pasangans_idpemb_foreign` FOREIGN KEY (`idPemb`) REFERENCES `pembimbing_lapangans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pasangans_idperus_foreign` FOREIGN KEY (`idPerus`) REFERENCES `perusahaans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembimbing_lapangans`
--
ALTER TABLE `pembimbing_lapangans`
  ADD CONSTRAINT `pembimbing_lapangans_idperus_foreign` FOREIGN KEY (`idPerus`) REFERENCES `perusahaans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengampus`
--
ALTER TABLE `pengampus`
  ADD CONSTRAINT `pengampus_iddosen_foreign` FOREIGN KEY (`idDosen`) REFERENCES `dosens` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengampus_idmakul_foreign` FOREIGN KEY (`idMakul`) REFERENCES `mata_kuliahs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_idlapakhir_foreign` FOREIGN KEY (`idLapAkhir`) REFERENCES `laporan_akhirs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reports_idlaphar_foreign` FOREIGN KEY (`idLapHar`) REFERENCES `laporan_harians` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reports_idnilaimag_foreign` FOREIGN KEY (`idNilaiMag`) REFERENCES `nilai_magangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reports_idpas_foreign` FOREIGN KEY (`idPas`) REFERENCES `pasangans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat_pendidikans`
--
ALTER TABLE `riwayat_pendidikans`
  ADD CONSTRAINT `riwayat_pendidikans_idkelas_foreign` FOREIGN KEY (`idKelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `riwayat_pendidikans_idmahasiswa_foreign` FOREIGN KEY (`idMahasiswa`) REFERENCES `mahasiswas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `riwayat_pendidikans_idprodi_foreign` FOREIGN KEY (`idProdi`) REFERENCES `program_studis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
