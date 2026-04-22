-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 13 Jul 2025 pada 14.23
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_silvy`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1736915084),
('356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1736915084;', 1736915084),
('babi@gmail.com|127.0.0.1', 'i:1;', 1736914396),
('babi@gmail.com|127.0.0.1:timer', 'i:1736914396;', 1736914396),
('da4b9237bacccdf19c0760cab7aec4a8359010b0', 'i:1;', 1736915146),
('da4b9237bacccdf19c0760cab7aec4a8359010b0:timer', 'i:1736915146;', 1736915146),
('test@example.com|127.0.0.1', 'i:3;', 1736914430),
('test@example.com|127.0.0.1:timer', 'i:1736914430;', 1736914430);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Persandian', 'Divisi Persandian', '2025-01-17 07:33:04', '2025-01-17 07:33:04'),
(2, 'TIK', 'Divisi TIK', '2025-01-17 07:33:24', '2025-01-17 07:42:00'),
(3, 'Sekre', 'Divisi Sekre', '2025-01-17 07:34:01', '2025-01-17 07:34:01'),
(4, 'IKP', 'Divisi IKP', '2025-01-17 07:34:29', '2025-01-17 07:34:29'),
(5, 'APTIKA', 'Divisi Aptika', '2025-01-17 07:36:33', '2025-01-17 07:36:33'),
(7, 'Statistik', 'Division Statistik', '2025-01-18 01:11:27', '2025-01-18 01:11:27');

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
-- Struktur dari tabel `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `files`
--

INSERT INTO `files` (`id`, `user_id`, `nama`, `file`, `type`, `description`, `created_at`, `updated_at`) VALUES
(1, 7, 'Sertifikat Magang', 'uploads/yLIWABDisJj5GhUH7YqoMpQhpX5U1rLlSgUlpt6i.docx', 'Sertifikat', 'asd', '2025-07-12 21:22:22', '2025-07-12 21:22:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `internships`
--

CREATE TABLE `internships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `letter_date` date NOT NULL,
  `institution_name` varchar(255) NOT NULL,
  `major` varchar(255) NOT NULL,
  `participant_count` int(11) NOT NULL,
  `division_id` bigint(20) UNSIGNED DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `request_letter` tinyint(1) NOT NULL DEFAULT 0,
  `acceptance_letter` tinyint(1) NOT NULL DEFAULT 0,
  `kesbangpol_letter` tinyint(1) NOT NULL DEFAULT 0,
  `documentation` text DEFAULT NULL,
  `contact_person` varchar(255) NOT NULL,
  `accepted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `internships`
--

INSERT INTO `internships` (`id`, `letter_date`, `institution_name`, `major`, `participant_count`, `division_id`, `start_date`, `end_date`, `request_letter`, `acceptance_letter`, `kesbangpol_letter`, `documentation`, `contact_person`, `accepted`, `created_at`, `updated_at`) VALUES
(1, '2025-01-18', 'STMIK Mardira', 'Teknik Informatika', 4, 1, '2025-01-18', '2025-03-30', 1, 1, 1, 'Lengkap', '0895622060619', 1, '2025-01-17 21:28:37', '2025-01-18 01:14:25'),
(2, '2025-01-15', 'Universitas Pendidikan Indonesia', 'Teknik Pengolahan Ikan', 1, 3, '2025-02-05', '2025-03-25', 1, 1, 1, 'Lengkap', '089423121233', 1, '2025-01-17 22:18:02', '2025-01-18 05:28:01'),
(4, '2025-01-10', 'Univesitas Padjajaran', 'Ekonomi', 5, 4, '2025-05-06', '2025-07-17', 1, 1, 0, 'Belum Lengkap', '089819283221', 1, '2025-01-17 23:53:51', '2025-07-09 06:20:08'),
(5, '2025-03-11', 'Institute Teknologi Bandung', 'Seni / Sastra', 10, 2, '2025-03-13', '2025-06-25', 0, 0, 0, 'Belum Lengkap', '0878673445', 1, '2025-01-18 01:31:54', '2025-07-09 06:20:18'),
(6, '2025-01-23', 'Univrsitas Pasundan', 'Management Bisnis', 3, 5, '2025-08-01', '2025-12-31', 1, 1, 1, 'Lengkap', '087527437423', 0, '2025-01-18 04:05:24', '2025-01-18 04:06:32'),
(8, '2025-01-29', 'STMIK Mardira', 'Mutimedia', 2, 1, '2025-01-30', '2025-03-28', 1, 0, 0, 'Belum Lengkap', '0893482374823', 0, '2025-01-29 00:41:08', '2025-01-29 00:41:08'),
(9, '2025-01-29', 'STMIK Mardira', 'Mutimedia', 2, 1, '2025-01-29', '2025-05-30', 0, 0, 0, 'Belum Lengkap', '04913489347', 0, '2025-01-29 00:53:01', '2025-01-29 00:53:01'),
(10, '2025-02-21', 'wqee', 'qwe', 21, 4, '2025-02-20', '2025-04-16', 0, 0, 0, 'Belum Lengkap', '0928349832', 1, '2025-02-20 22:34:56', '2025-02-20 22:34:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `internships_new`
--

CREATE TABLE `internships_new` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `letter_date` date NOT NULL,
  `institution_name` varchar(255) NOT NULL,
  `major` varchar(255) NOT NULL,
  `division_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `request_letter` varchar(255) DEFAULT NULL,
  `acceptance_letter` varchar(255) DEFAULT NULL,
  `kesbangpol_letter` varchar(255) DEFAULT NULL,
  `documentation` text DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `date_of_birth` date NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT 'Mendaftar',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `internships_new`
--

INSERT INTO `internships_new` (`id`, `letter_date`, `institution_name`, `major`, `division_id`, `user_id`, `start_date`, `end_date`, `request_letter`, `acceptance_letter`, `kesbangpol_letter`, `documentation`, `name`, `email`, `address`, `date_of_birth`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(4, '2025-07-14', 'Stimik Mardira', 'Teknik Informatika', 1, 7, '2025-07-18', '2025-08-09', 'intern/request_letter/IFieEQP1TKI8vdDvIYoJossEndSze92NcBpVwyFK.png', 'intern/acceptance_letter/bCIbF0W4iqsngCF1zj6Xv1zw6V8zJXuneL98Hogw.docx', NULL, 'Tidak Lengkap', 'KamuBukanAku', 'manusia2@gmail.com', '21312', '2025-07-14', '23423432', 'Diterima', '2025-07-13 01:51:42', '2025-07-13 03:35:32'),
(6, '2025-07-13', 'Stimik Mardira', 'Teknik Informatika', 1, 9, '2025-07-13', '2025-08-30', 'intern/request_letter/DY84KNTrxjDJ1Gq160Hxvo8IWcS4B7kmtf3HFy6K.docx', 'intern/acceptance_letter/2F67JyxynyVaaVnaJlb6SXPEWIHYKQpnfVtNkPAq.png', NULL, 'Belum Lengkap', 'Asep', 'blackidut@gmail.com', 'test', '2003-03-19', '23423432', 'Diterima', '2025-07-13 04:56:17', '2025-07-13 05:01:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(6, '2025_01_17_134640_create_internships_table', 2),
(7, '2025_01_29_062213_create_participations_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `participations`
--

CREATE TABLE `participations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `internship_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `date_of_birth` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `participations`
--

INSERT INTO `participations` (`id`, `internship_id`, `name`, `email`, `address`, `date_of_birth`, `phone`, `created_at`, `updated_at`) VALUES
(1, 8, 'Usep', 'aku@usep.com', 'Penjara', '2025-01-14', '0931283324911', '2025-01-29 00:41:08', '2025-01-29 00:41:08'),
(2, 9, 'Usep', 'dia@usep.com', 'Penjara', '2025-01-30', '0349130923', '2025-01-29 00:53:01', '2025-01-29 00:53:01'),
(3, 10, 'dadedrwq', 'aku@asd.com', '12wqe', '2025-02-21', NULL, '2025-02-20 22:34:56', '2025-02-20 22:34:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `image`, `status`, `start_date`, `end_date`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Tugas Masak Mie', 'masak mie bodoh', 'projects/KGFohloOAbZRhkuGC1qjPJ7lf3E05CX7lWDYzeDL.png', 'Selesai', '2025-07-10', '2025-07-30', 7, '2025-07-09 12:22:05', '2025-07-12 20:33:22'),
(2, 'Bikin Kopi Setiap Jam 7 Pagi', 'qw', 'projects/8DYIIcn7GayGKmMYQcYZFR0ZiXfwbZg65QjLcjAO.png', 'Selesai', '2025-07-11', '2025-07-30', 7, '2025-07-11 05:17:16', '2025-07-12 20:32:57'),
(4, 'Dsa', 'asd', 'projects/IYXiSoCEgtuzejsQa1yUZIHMtILroArvevK799S1.png', 'Belum Selesai', '2025-07-24', '2025-08-01', 7, '2025-07-12 20:38:31', '2025-07-12 20:38:31'),
(5, 'asd', 'qwe', 'projects/lLMiIErSnWUu7ThPZicUgbyaDrDSbBKjCSRhYsx9.jpg', NULL, '2025-07-15', '2025-07-30', 8, '2025-07-12 20:42:38', '2025-07-12 21:54:34'),
(6, 'Beli Permen', 'test', 'projects/1nmdzv1x9FDs2c6RmBOUp9x3pADpofAB9a8tVDCj.png', 'Selesai', '2025-07-13', '2025-07-25', 9, '2025-07-13 04:59:19', '2025-07-13 05:05:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('B13uji57eoN2q1qqk2x5PI19tMCxVucwSMi9xCqU', 9, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSUxPSW9lMXF2TDNkanh5MmpWOHZNOGRmY245NFMwOGppdkswWVpmciI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL2Rhc2hib2FyZCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjk7fQ==', 1752409347),
('DxAq8lt1PUd5NJOzJaKuXJ0Bz4EJJmVPI9PsnZkC', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieVZKcFNnYnhLN3l3ZEVPeGxYZTdxM0Z2NVhsNW5jaE9Ec1A0Q0dLcSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1752404170),
('XuoYIlQfs1XwQDR9hHKkqvggZvvj8nubLedYP4N7', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64; rv:140.0) Gecko/20100101 Firefox/140.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVGYzUkxOd0dpZlU0bTJ5aUhwakFvZjNkdTFwbll3eHVmWEQzQkhsTiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9pbnRlcm4/ND0iO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1752409031);

-- --------------------------------------------------------

--
-- Struktur dari tabel `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `role` enum('peserta','admin') NOT NULL DEFAULT 'peserta',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Toni Stark', 'ironman@marvel.com', NULL, '$2y$12$lGCSCKdJ1j3SGGNSLvEw2.azHEKmAeQk4WGf3ej1fDSA3e01xIoQS', 'admin', NULL, '2025-01-14 21:16:09', '2025-01-14 21:16:09'),
(2, 'Blackidut', 'blackidut@gmail.com', NULL, '$2y$12$CFAtJE2If2sm4IxACQ1mDe9OpKzI5zofAgWgUoTCjAd1J4npiRsqi', 'admin', NULL, '2025-01-14 21:24:34', '2025-01-14 21:24:34'),
(3, 'Test User', 'user@gmail.com', NULL, '$2y$12$znu5NsoyKxT1Q3/0Z5iXOe3MX3yVvgLXDzHf1cp8nGxICgZjYpbVy', 'admin', NULL, '2025-01-23 23:56:15', '2025-01-23 23:56:15'),
(4, 'Manusia', 'manusia@gmail.com', NULL, '$2y$12$MF1OqgM9Pj/KvpUHPHHTEuw7JZnZwaxwmsar37xjogEhf3HJ9NsPm', 'admin', NULL, '2025-06-30 17:58:59', '2025-06-30 17:58:59'),
(6, 'KamuBukanAku', 'kamu@gmail.com', NULL, '$2y$12$04rSwKWluCvc0za60rCTq.VSo0KmIyk/jTP7KlZxHTayV6pdqsX1C', 'admin', NULL, '2025-06-30 23:32:58', '2025-06-30 23:32:58'),
(7, 'manusia', 'manusia2@gmail.com', NULL, '$2y$12$2AuP3jHLGxPJdaiENbgfYexfS70g2DvN/EEGWQTu49eyi5NQCArk.', 'peserta', NULL, '2025-07-05 22:53:29', '2025-07-05 22:53:29'),
(8, 'Asep', 'asep@gmail.com', NULL, '$2y$12$H5EhgBw0Aq6EFZ9EFlbl1eSII5LRUrTOyeOReupcMbQsS4ADR.JDu', 'peserta', NULL, '2025-07-11 06:19:09', '2025-07-11 06:19:09'),
(9, 'Dheni', 'gendut@gmail.com', NULL, '$2y$12$g5euabM201jkW9XG7WX2durhoMH/CBYuh6wsFviGLqSyf8yEu3lqC', 'peserta', NULL, '2025-07-13 04:53:46', '2025-07-13 04:53:46'),
(10, 'eric', 'eric@gmail.com', NULL, '$2y$12$fY/UzLOwJ59xJmCaekl1NuDpbfi3FlvNtcpakOvlw8cfT6wJvqjJq', 'peserta', NULL, '2025-07-13 05:09:40', '2025-07-13 05:09:40');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `files_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `internships`
--
ALTER TABLE `internships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `internships_division_id_foreign` (`division_id`);

--
-- Indeks untuk tabel `internships_new`
--
ALTER TABLE `internships_new`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_internships_division` (`division_id`),
  ADD KEY `fk_internships_user` (`user_id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `participations`
--
ALTER TABLE `participations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `participations_internship_id_foreign` (`internship_id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `task`
--
ALTER TABLE `task`
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
-- AUTO_INCREMENT untuk tabel `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `internships`
--
ALTER TABLE `internships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `internships_new`
--
ALTER TABLE `internships_new`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `participations`
--
ALTER TABLE `participations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `internships`
--
ALTER TABLE `internships`
  ADD CONSTRAINT `internships_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `internships_new`
--
ALTER TABLE `internships_new`
  ADD CONSTRAINT `fk_internships_division` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_internships_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `participations`
--
ALTER TABLE `participations`
  ADD CONSTRAINT `participations_internship_id_foreign` FOREIGN KEY (`internship_id`) REFERENCES `internships` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
