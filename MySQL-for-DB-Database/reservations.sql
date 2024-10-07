-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Okt 2024 pada 07.08
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservations`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin1', '$2y$10$HMCzDH916qymIKwBF0RBx.6YNJdJfr4.gaYFSuaoOnZGr5rbmST1.', '2024-10-06 11:29:28', '2024-10-06 11:29:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `consultations`
--

CREATE TABLE `consultations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `complaint` text NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `consultations`
--

INSERT INTO `consultations` (`id`, `name`, `phone`, `gender`, `birth_date`, `complaint`, `appointment_date`, `appointment_time`, `created_at`, `updated_at`, `status`) VALUES
(3, 'Nafisahika Putri Herra', '089634206177', 'female', '2004-07-10', 'Ingin mengurangi flek bekas jerawat', '2024-10-17', '10:00:00', '2024-10-05 13:20:31', '2024-10-06 21:10:34', 'completed'),
(12, 'Bunga Citra Lestari', '081123456789', 'female', '2004-07-02', 'Ingin menghilangkan bekas jerawat di pipi', '2024-10-08', '12:00:00', '2024-10-05 21:32:09', '2024-10-05 21:32:09', 'pending'),
(13, 'Charles', '086213628121', 'male', '1988-06-10', 'Ingin menghilangkan kerutan', '2024-10-07', '16:00:00', '2024-10-06 03:22:12', '2024-10-06 03:22:12', 'pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `doctors`
--

INSERT INTO `doctors` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'dr.fina', '$2y$10$02A1vHblW9k9op7oJUpogOSXGD4LqGExyNHzS5HozkJ9NVXNSkPz.', '2024-10-06 02:15:45', '2024-10-06 02:15:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_09_29_082241_create_reservations_table', 1),
(6, '2024_10_05_085637_create_consultations_treatments_table', 1),
(7, '2024_10_06_035436_add_complaint_to_treatments_table', 2),
(8, '2024_10_06_051031_create_products_table', 3),
(9, '2024_10_06_051218_create_orders_table', 3),
(12, '2024_10_06_052309_create_products_table', 4),
(13, '2024_10_06_052515_create_orders_table', 4),
(14, '2024_10_06_091057_create_doctors_table', 5),
(15, '2024_10_06_165209_create_staff_table', 6),
(16, '2024_10_06_182750_create_admins_table', 7),
(17, '2024_10_06_221026_add_is_accepted_to_orders_table', 8),
(18, '2024_10_07_010843_add_status_to_orders_table', 9),
(19, '2024_10_07_015649_create_services_table', 10),
(20, '2024_10_07_020015_add_visitor_count_to_services_table', 11),
(21, '2024_10_07_025510_add_status_to_treatments_table', 12),
(22, '2024_10_07_035641_add_status_to_consultations_table', 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `pickup_date` date NOT NULL,
  `pickup_time` time NOT NULL,
  `items` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`items`)),
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_accepted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `pickup_date`, `pickup_time`, `items`, `status`, `created_at`, `updated_at`, `is_accepted`) VALUES
(7, 'Lalisa Simanjuntak', '082987678543', '2024-10-16', '12:00:00', '\"[{\\\"name\\\":\\\"Nemara Facial Mist Rose\\\",\\\"price\\\":50000,\\\"id\\\":\\\"20\\\"}]\"', 'completed', '2024-10-05 23:37:10', '2024-10-06 18:29:15', 0),
(9, 'Jennie Rosalia', '086457213082', '2024-10-07', '10:00:00', '\"[{\\\"name\\\":\\\"Nemara Sunscreen Gel SPF 50\\\",\\\"price\\\":85000,\\\"id\\\":\\\"18\\\"},{\\\"name\\\":\\\"Nemara Eye Cream Cucumber\\\",\\\"price\\\":70000,\\\"id\\\":\\\"19\\\"},{\\\"name\\\":\\\"Nemara Facial Mist Rose\\\",\\\"price\\\":50000,\\\"id\\\":\\\"20\\\"}]\"', 'completed', '2024-10-05 23:46:32', '2024-10-06 18:29:16', 0),
(10, 'Rere', '087567245134', '2024-10-09', '14:30:00', '\"[{\\\"name\\\":\\\"Nemara Glow Boosting Serum\\\",\\\"price\\\":250000,\\\"id\\\":\\\"1\\\"},{\\\"name\\\":\\\"Nemara Hydrating Gel Cream\\\",\\\"price\\\":220000,\\\"id\\\":\\\"3\\\"}]\"', 'pending', '2024-10-06 18:39:47', '2024-10-06 18:39:47', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `skin_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name`, `stock`, `price`, `description`, `skin_type`, `created_at`, `updated_at`) VALUES
(1, 'Nemara Glow Boosting Serum', 50, 250000, 'Serum ringan dengan kandungan vitamin C dan hyaluronic acid untuk mencerahkan dan menghidrasi kulit', 'Semua jenis kulit', NULL, '2024-10-06 13:58:36'),
(2, 'Nemara Pore Minimizing Toner', 50, 180000, 'Toner dengan kandungan witch hazel yang membantu mengecilkan pori-pori dan menyeimbangkan pH kulit', 'Kulit berminyak dan kombinasi', NULL, NULL),
(3, 'Nemara Hydrating Gel Cream', 50, 220000, 'Pelembap gel ringan yang kaya akan aloe vera untuk menghidrasi kulit tanpa membuatnya berminyak', 'Kulit normal hingga berminyak', NULL, NULL),
(4, 'Nemara Anti-Aging Night Cream', 50, 300000, 'Krim malam dengan kandungan retinol untuk mengurangi kerutan dan meningkatkan elastisitas kulit', 'Kulit dewasa', NULL, NULL),
(5, 'Nemara Acne Control Spot Treatment', 50, 120000, 'Spot treatment dengan kandungan salicylic acid untuk mengeringkan jerawat dan mengurangi peradangan', 'Kulit berjerawat', NULL, NULL),
(6, 'Nemara Brightening Mask', 50, 150000, 'Masker wajah dengan kandungan ekstrak buah-buahan untuk mencerahkan kulit kusam dan memberikan nutrisi', 'Semua jenis kulit', NULL, NULL),
(7, 'Nemara Eye Contour Gel', 50, 200000, 'Gel mata dengan kandungan caffeine untuk mengurangi mata panda dan mengurangi puffiness', 'Semua jenis kulit', NULL, NULL),
(8, 'Nemara Gentle Exfoliating Scrub', 50, 180000, 'Scrub wajah dengan butiran halus untuk mengangkat sel kulit mati dan membuat kulit terasa halus', 'Kulit normal hingga berminyak', NULL, NULL),
(9, 'Nemara Soothing Facial Mist', 50, 100000, 'Facial mist dengan kandungan chamomile untuk menenangkan kulit sensitif dan meredakan kemerahan', 'Kulit sensitif', NULL, NULL),
(10, 'Nemara Hyaluronic Acid Ampoule', 50, 280000, 'Ampoule dengan kandungan hyaluronic acid untuk memberikan hidrasi intensif pada kulit', 'Kulit kering dan dehidrasi', NULL, NULL),
(11, 'Nemara Niacinamide Serum', 50, 250000, 'Serum dengan kandungan niacinamide untuk menyamarkan pori-pori, meratakan warna kulit, dan mengontrol minyak berlebih', 'Kulit berminyak dan kombinasi', NULL, NULL),
(12, 'Nemara Peptide Eye Cream', 50, 220000, 'Eye cream dengan kandungan peptide untuk mengurangi kerutan di sekitar mata dan meningkatkan kekencangan kulit', 'Kulit dewasa', NULL, NULL),
(13, 'Nemara Charcoal Peel-Off Mask', 50, 180000, 'Masker peel-off dengan kandungan charcoal untuk membersihkan pori-pori dan mengangkat kotoran', 'Kulit berminyak dan berjerawat', NULL, NULL),
(14, 'Nemara Collagen Boosting Cream', 50, 350000, 'Krim wajah dengan kandungan collagen untuk meningkatkan elastisitas kulit dan mengurangi tanda-tanda penuaan', 'Kulit dewasa', NULL, NULL),
(15, 'Nemara Facial Wash Tea Tree', 50, 75000, 'Pembersih wajah dengan ekstrak tea tree yang efektif membersihkan dan menyegarkan kulit berminyak dan berjerawat', 'Kulit berminyak dan berjerawat', NULL, NULL),
(16, 'Nemara Toner Aloe Vera', 50, 65000, 'Toner dengan ekstrak aloe vera yang menenangkan dan melembapkan kulit', 'Semua jenis kulit', NULL, NULL),
(17, 'Nemara Moisturizer Hyaluronic Acid', 50, 90000, 'Pelembap ringan dengan hyaluronic acid untuk menghidrasi kulit tanpa membuatnya berminyak', 'Semua jenis kulit', NULL, NULL),
(18, 'Nemara Sunscreen Gel SPF 50', 49, 85000, 'Sunscreen gel ringan dengan SPF 50 untuk melindungi kulit dari sinar matahari', 'Semua jenis kulit', NULL, '2024-10-06 18:37:50'),
(19, 'Nemara Eye Cream Cucumber', 49, 70000, 'Eye cream dengan ekstrak mentimun yang membantu mengurangi mata panda dan memberikan efek menenangkan', 'Semua jenis kulit', NULL, '2024-10-06 18:37:58'),
(20, 'Nemara Facial Mist Rose', 48, 50000, 'Facial mist dengan ekstrak mawar yang menyegarkan dan memberikan aroma yang menenangkan', 'Semua jenis kulit', NULL, '2024-10-06 18:38:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `visitor_count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `price`, `created_at`, `updated_at`, `visitor_count`) VALUES
(1, 'Acne Clear', 'Treatment untuk mengatasi jerawat meradang ringan serta kulit lebih bersih', 250000.00, NULL, NULL, 0),
(2, 'Acne Glow', 'Treatment untuk mengatasi jerawat aktif serta kulit lebih berkilau', 200000.00, NULL, NULL, 0),
(3, 'Clear Bright', 'Facial peeling untuk membersihkan wajah, wajah jadi bersih', 199000.00, NULL, NULL, 0),
(4, 'Breakout Free', 'Treatment atasi wajah bruntusan, kulit jadi halus dan sehat', 200000.00, NULL, NULL, 0),
(5, 'Korean Light', 'Atasi minyak berlebih, dan kulit glowing', 500000.00, NULL, NULL, 1),
(6, 'Korean Glass Skin Bright', 'Samarkan kerutan halus, kulit cerah dan glowing ternutrii', 699000.00, NULL, NULL, 0),
(7, 'Glow DNA Salmon', 'Pico DNA Salmon Glow Laser untuk memudarkan bekas jerawat hitam', 900000.00, NULL, NULL, 0),
(8, 'Fresh Rehydrate', 'Treatment untuk atasi kulit kusam, kulit jadi cerah dan fresh', 200000.00, NULL, '2024-10-06 20:23:37', 2),
(9, 'Skin Barrier Healer', 'Efektif atasi kulit sunburn dan kemerahan', 185000.00, NULL, NULL, 0),
(10, 'Translucent Booster', 'Efektif memudarkan flek hitam, dilengkapi dengan anti aging', 199000.00, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `staff`
--

INSERT INTO `staff` (`id`, `name`, `role`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Fina', 'doctor', 'fina@nemara.com', NULL, NULL),
(2, 'Tejo', 'admin', 'tejo@admin1.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `treatments`
--

CREATE TABLE `treatments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `last_facial` date NOT NULL,
  `treatment_type` varchar(255) NOT NULL,
  `needs_consultation` tinyint(1) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `complaint` text DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `treatments`
--

INSERT INTO `treatments` (`id`, `name`, `phone`, `gender`, `birth_date`, `last_facial`, `treatment_type`, `needs_consultation`, `appointment_date`, `appointment_time`, `created_at`, `updated_at`, `complaint`, `status`) VALUES
(2, 'Lalisa Simanjuntak', '082987678543', 'female', '2024-10-08', '2024-09-01', 'Korean Light', 0, '2024-10-10', '11:00:00', '2024-10-05 21:38:51', '2024-10-06 19:59:48', NULL, 'completed'),
(3, 'Livi', '082317362712', 'female', '2007-06-05', '2024-09-08', 'Fresh Rehydrate', 0, '2024-10-08', '14:00:00', '2024-10-06 20:04:23', '2024-10-06 20:23:35', NULL, 'completed'),
(4, 'Rose', '087682345166', 'female', '2000-01-03', '2024-09-14', 'Fresh Rehydrate', 0, '2024-10-08', '15:00:00', '2024-10-06 20:05:36', '2024-10-06 20:23:37', NULL, 'completed'),
(5, 'Elsa Anna', '078654972816', 'female', '1998-05-26', '2024-09-03', 'Acne Glow', 0, '2024-10-11', '15:00:00', '2024-10-06 20:28:45', '2024-10-06 20:28:45', NULL, 'pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dokter 1', 'dokter1@doctorNemara.com', NULL, '$2y$10$K1g1hYMZygzyWaUgrvwXO.PyYTxv3Kq6pkKDyDx0nliSw3pyDukiq', NULL, '2024-10-06 01:04:17', '2024-10-06 01:04:17'),
(2, 'Dokter 1', 'dokter1@example.com', NULL, '$2y$10$kueIgVdJttzPqHGLMwJdF.D05xGIUHcZaAEkWEtb4g5fgnXl5CFDO', NULL, '2024-10-06 01:56:22', '2024-10-06 01:56:22'),
(5, 'admin1', 'admin1@nemara.com', NULL, '$2y$10$BYxwfs3IPpsubNQsNu9dgu5VQGMp1d2zrAowZNyk/oVC4h49bHlp2', 'zaSonrNKu8czLGEbype6pC1k1ep2OMuK4EPRyxroRIqGOvCUufsc05o3qwb8', '2024-10-06 07:49:22', '2024-10-06 07:49:22');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indeks untuk tabel `consultations`
--
ALTER TABLE `consultations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doctors_username_unique` (`username`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `staff_email_unique` (`email`);

--
-- Indeks untuk tabel `treatments`
--
ALTER TABLE `treatments`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `consultations`
--
ALTER TABLE `consultations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `treatments`
--
ALTER TABLE `treatments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
