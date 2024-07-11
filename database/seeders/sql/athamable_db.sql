-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 08 Jul 2024 pada 03.58
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
-- Database: `athamable_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `carousels`
--

CREATE TABLE `carousels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `carousels`
--

INSERT INTO `carousels` (`id`, `title`, `image`, `author_id`, `created_at`, `updated_at`) VALUES
(9, 'Atha Mebel berkomitmen untuk memahami dan memenuhi kebutuhan unik setiap pelanggan melalui layanan kustomisasi yang memungkinkan penyesuaian ukuran, warna, dan desain mebel sesuai dengan keinginan pelanggan.', 'ZaE5ZMiMcRbmMeHWmOhbtA3MY3VRP0.png', 1, '2024-05-30 19:20:22', '2024-05-30 19:20:22'),
(10, 'Kami menawarkan solusi mebel berkualitas dengan harga yang ekonomis, dengan menggunakan material berkualitas seperti kayu solid dan multiplek HPL, kami menjamin produk akhir yang tahan lama dan fungsional.', 'kdaRwfbaBnLbjVNRe9PMwpisvJ2q2d.jpg', 1, '2024-05-30 19:31:07', '2024-06-27 06:13:20'),
(31, 'Setiap potongan mebel di Atha Mebel, diproduksi oleh para ahli yang berpengalaman, lebih dari sekedar perabot—ini adalah cerminan dari dedikasi kami terhadap kualitas, keunikan, dan kepuasan pelanggan.', 'NupxzKar6aXcq0VLspAl1I7Q88VgYz.png', 1, '2024-07-07 18:46:50', '2024-07-07 18:46:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `catalogs`
--

CREATE TABLE `catalogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `catalogs`
--

INSERT INTO `catalogs` (`id`, `title`, `image`, `description`, `author_id`, `category_id`, `created_at`, `updated_at`) VALUES
(7, 'Lemari Mahoni', 'ds3gnimZIgOyVSdwiehHrLiEL6U74k.png', 'Terbuat dari kayu mahoni berkualitas tinggi yang dikenal akan daya tahan dan keindahannya, buffet ini dirancang untuk memberikan fungsionalitas dan estetika maksimal pada ruangan Anda.', 1, 1, '2024-06-06 21:37:25', '2024-06-06 21:37:25'),
(8, 'Meja Tamu', 'T8Rzt2s7SEI1PjWprL69ZkGYjg0RQc.png', 'Hadirkan sentuhan elegan dan fungsionalitas di ruang tamu Anda dengan Meja Tamu kami. Dirancang dengan material berkualitas tinggi dan perhatian terhadap detail, meja tamu ini tidak hanya mempercantik ruangan tetapi juga memberikan kemudahan dalam penggunaan sehari-hari. Temukan berbagai pilihan desain yang sesuai dengan gaya dan kebutuhan Anda, mulai dari modern hingga klasik.', 1, 1, '2024-06-06 21:39:03', '2024-06-27 21:17:17'),
(9, 'Meja Belajar', 'J7GKY7BCjI8mo7AUoA2qBjZ2dRvNFp.png', 'Tingkatkan pengalaman belajar dengan Meja Belajar Kayu Mahoni kami yang elegan dan fungsional. Didesain khusus untuk memberikan kenyamanan dan daya tahan, meja belajar ini terbuat dari kayu mahoni berkualitas tinggi dengan finishing duco yang halus dan tahan lama. Cocok untuk segala usia, meja ini akan menjadi tambahan yang sempurna untuk ruang belajar atau kantor rumah Anda.', 1, 2, '2024-06-06 21:53:47', '2024-06-06 21:53:47'),
(10, 'Meja Makan Minimalis', 'R5PHD7AqJM5FoyNY1AGxMqAPKaPH5i.png', 'Hadirkan kesederhanaan yang elegan di ruang makan Anda dengan Meja Makan Minimalis dari kayu pilihan kami. Dirancang untuk menghadirkan suasana hangat dan modern, meja makan ini terbuat dari bahan kayu berkualitas tinggi dan menawarkan pilihan warna custom untuk memenuhi selera dan gaya interior Anda.', 1, 2, '2024-06-06 21:54:29', '2024-06-06 21:54:29'),
(11, 'Kursi Lipat', 'GFesFRrIn5oHjZTv4e49Rp9LIyvkRS.png', 'Kursi Lipat Tangga Minimalis kami adalah solusi praktis untuk ruang yang terbatas tanpa mengorbankan gaya atau kenyamanan. Dengan desain yang ergonomis dan fitur lipat yang inovatif, kursi ini menjadi pilihan sempurna untuk kebutuhan sehari-hari Anda.', 1, 3, '2024-06-06 21:57:55', '2024-06-06 21:57:55'),
(12, 'Buffet Mahoni', '2IwGtptD8iPDzgBUPN3x6TgnVEtHQy.png', 'Buffet kami dirancang untuk menghadirkan keanggunan dan fungsionalitas dalam satu unit yang indah. Terbuat dari bahan berkualitas tinggi dengan detail pengerjaan yang teliti, buffet ini tidak hanya berfungsi sebagai tempat penyimpanan yang praktis, tetapi juga sebagai elemen dekoratif yang menambah pesona pada ruang makan atau ruang tamu Anda.', 1, 4, '2024-06-06 21:59:32', '2024-06-06 21:59:32'),
(13, 'Rak Handuk', 'uNNLqZ5epA8lzaV7fLUZKW7DniNs2c.png', 'Desainnya yang kokoh dan estetis tidak hanya memperindah ruangan tetapi juga memastikan handuk Anda tersimpan dengan rapi dan mudah dijangkau. Dengan warna natural dan memiliki 3 tingkat, rak handuk kayu ini cocok untuk segala jenis dekorasi kamar mandi.', 1, 4, '2024-06-06 22:00:15', '2024-06-06 22:00:15'),
(14, 'Drawer', 'M9ncB0sEZYoFEn59YGjhmnIJwRoVeT.png', 'Drawer kami dirancang untuk memberikan solusi penyimpanan yang stylish dan praktis di rumah Anda. Dibuat dengan material berkualitas tinggi dan detail pengerjaan yang teliti, drawer ini tidak hanya fungsional tetapi juga menambah sentuhan estetika pada ruangan. Dengan berbagai ukuran dan desain yang elegan, drawer ini cocok digunakan di kamar tidur, ruang tamu, atau bahkan ruang kerja Anda. Simpan barang-barang Anda dengan rapi dan mudah dijangkau dengan drawer yang dirancang untuk kenyamanan dan keindahan.', 1, 4, '2024-06-06 22:00:50', '2024-06-06 22:00:50'),
(15, 'Lemari Mahoni', 'YsgL56XwkIpfjwA1HEvVfYjUO5G4s7.png', 'Bawa kehangatan dan keindahan alami kayu ke dalam rumah Anda dengan Lemari Kayu Mahoni kami yang elegan. Dirancang dengan teliti dan dibuat dengan menggunakan kayu mahoni berkualitas tinggi, lemari ini adalah pilihan yang sempurna untuk menyimpan barang-barang berharga Anda sambil menambah daya tarik visual pada ruang Anda. Dengan sentuhan finishing yang halus dan perhatian terhadap detail, lemari kayu mahoni kami adalah investasi yang tahan lama untuk kebutuhan penyimpanan Anda.', 1, 5, '2024-06-06 22:02:23', '2024-06-06 22:02:23'),
(16, 'Lemari Display', 'zktAGgG4p0OQ4uZiqlviKAELnrhmTd.png', 'Dirancang dengan perpaduan sempurna antara kekuatan kayu mahoni dan kehalusan finishing Duco yang mewah, lemari display ini adalah pilihan ideal untuk memamerkan koleksi barang berharga Anda dengan gaya yang elegan dan berkelas. Dibuat dengan detail yang cermat dan kualitas bahan terbaik, lemari display ini menjanjikan penyimpanan yang aman dan tampilan yang mengesankan.', 1, 5, '2024-06-06 22:02:55', '2024-06-06 22:02:55'),
(17, 'Lemari Kombinasi', 'A8HW68P7zNDVpFfarIGKeqQmdQ5QDi.png', 'Hadirkan kemudahan dan kepraktisan dalam penyimpanan dengan Lemari Kombinasi Minimalis kami yang fungsional dan elegan. Dirancang dengan kesederhanaan sebagai inti, lemari ini menawarkan solusi penyimpanan yang efisien untuk kebutuhan rumah modern. Dengan sentuhan minimalis dan desain yang ergonomis, produk ini menghadirkan harmoni antara estetika yang rapi dan fungsionalitas yang kuat, menjadikannya pilihan yang sempurna untuk menyimpan dan menata barang-barang Anda dengan gaya.', 1, 5, '2024-06-06 22:03:37', '2024-06-06 22:03:37'),
(18, 'Gantungan Panci', 'ovhwSINy7008N1gHzKGJQD4neBY509.png', 'Maksimalkan ruang dapur Anda dengan Gantungan Panci kami yang praktis dan bergaya. Dirancang untuk menyimpan panci, wajan, dan peralatan dapur lainnya dengan rapi, gantungan ini tidak hanya fungsional tetapi juga menambah estetika pada dapur Anda. Terbuat dari material berkualitas tinggi dan tersedia dalam berbagai desain, Gantungan Panci kami adalah solusi sempurna untuk menjaga dapur tetap terorganisir dan menarik.', 1, 6, '2024-06-06 22:05:45', '2024-06-06 22:05:45'),
(19, 'Rak Serbaguna', 'G8mSfXSyjKbxzfhGtI1p9RRy4xoHXN.png', 'Optimalkan ruang dapur Anda dengan Rak Serbaguna kami! Dirancang untuk memberikan solusi penyimpanan yang efisien dan stylish, rak ini sangat ideal untuk menyimpan berbagai peralatan dapur, bumbu, dan kebutuhan memasak lainnya. Dengan desain yang modern dan fungsional, rak ini akan menjadi tambahan sempurna untuk dapur Anda.', 1, 6, '2024-06-06 22:06:09', '2024-06-06 22:06:09'),
(20, 'Dipan Kayu Minimalis', '2GCWfJbqiS45eQK4iJkIgLhMJKMx4a.png', 'Dipan Kayu Minimalis kami adalah pilihan sempurna untuk menciptakan suasana hangat dan nyaman di kamar tidur Anda. Dibuat dengan perhatian terhadap detail dan keahlian tukang kayu, dipan ini menggabungkan keindahan alami kayu dengan desain yang sederhana namun elegan. Dengan garis-garis yang bersih dan tampilan yang minimalis, dipan ini memberikan sentuhan modern yang cocok untuk berbagai gaya dekorasi. Cocok untuk menciptakan tempat tidur yang nyaman dan rapi, dipan kayu minimalis kami akan menjadi pusat perhatian yang indah dalam ruangan tidur Anda.', 1, 7, '2024-06-06 22:10:55', '2024-06-06 22:10:55'),
(21, 'Dipan Anak', 'OMLOy2iQbmGdJm2JZ5OyzmAhYDJQjq.png', 'Dipan Anak kami adalah tempat tidur yang ideal untuk menciptakan suasana nyaman dan aman bagi anak-anak Anda untuk beristirahat setiap malam. Didesain khusus untuk anak-anak, dipan ini menggabungkan keamanan, kenyamanan, dan keceriaan dalam satu unit yang menyenangkan. Dibuat dengan material berkualitas tinggi dan desain yang ceria, dipan anak ini akan menjadi tempat tidur impian bagi si kecil untuk bermimpi dan berpetualang.', 1, 7, '2024-06-06 22:11:31', '2024-06-06 22:11:31'),
(22, 'Dipan HPL', 'fsr8uI5U5rsMSXqB2qIdzm1uknuqS0.png', 'Dibuat dengan menggunakan laminasi tekan berteknologi tinggi (High Pressure Laminate/HPL), dipan ini menggabungkan kekuatan, daya tahan, dan keindahan desain dalam satu unit yang menawan. Dengan berbagai pilihan warna dan motif HPL yang stylish, dipan ini akan menjadi pusat perhatian yang indah dalam ruangan tidur Anda, sementara keunggulannya dalam ketahanan membuatnya menjadi investasi yang cerdas untuk jangka panjang.', 1, 7, '2024-06-06 22:11:58', '2024-06-06 22:11:58'),
(23, 'Pintu Bawah Tangga', 'htRWujlyk9d1SjLRdCf4P67XsPSW8H.png', 'Pintu di Bawah Tangga adalah solusi cerdas untuk memanfaatkan ruang tersembunyi di rumah Anda dengan cara yang aman dan bergaya. Dirancang khusus untuk mengakses ruang di bawah tangga dengan mudah, pintu ini tidak hanya menambah keamanan tetapi juga memberikan sentuhan estetika yang menawan pada rumah Anda. Dibuat dengan bahan berkualitas tinggi dan desain yang cermat, pintu ini adalah pilihan ideal untuk menyembunyikan ruang penyimpanan tambahan atau akses ke area lain yang tersembunyi di rumah Anda.', 1, 8, '2024-06-06 22:13:01', '2024-06-23 22:23:43'),
(24, 'Standing Mirror', 'jJ7IwM6YpmpoLQAmQwXn3RGOkD0VfH.png', 'Standing Mirror adalah perangkat praktis dan elegan yang akan mempercantik ruang Anda sambil menambah fungsionalitasnya. Dengan desain yang ramping dan fitur-fitur yang mengesankan, cermin berdiri ini tidak hanya akan memperluas tampilan ruangan Anda, tetapi juga memberikan kemampuan untuk memeriksa penampilan Anda dari berbagai sudut. Dirancang untuk menghadirkan keindahan dan kenyamanan dalam setiap ruang, Standing Mirror adalah aksesori penting bagi setiap rumah modern.', 1, 8, '2024-06-06 22:14:28', '2024-06-06 22:14:28'),
(25, 'Backdrop TV', 'ezbG3GN3tzlOxOutBQHYHwbehPkmb8.png', 'Backdrop TV adalah aksesori penting yang tidak hanya memberikan perlindungan dan penataan kabel yang rapi untuk televisi Anda, tetapi juga menambah pesona visual pada ruang tamu atau ruang hiburan Anda. Dengan desain yang elegan dan fungsionalitas yang luar biasa, backdrop TV ini memberikan pengalaman menonton yang lebih baik sambil menambah sentuhan estetika yang mewah dan modern pada interior rumah Anda.', 1, 8, '2024-06-06 22:14:59', '2024-06-23 21:12:24'),
(74, 'Meja Tamu Minimalis', 'DMuPGhNMlWkMMRE1TYZHaaoIUsJBl2.png', 'Dibuat dengan bahan berkualitas tinggi dan desain yang stylish, meja ini akan menjadi pusat perhatian yang sempurna di ruang tamu Anda. Baik untuk menyajikan minuman, menampilkan dekorasi, atau hanya untuk tempat meletakkan barang, meja ruang tamu ini dirancang untuk memenuhi semua kebutuhan Anda.', 1, 2, '2024-06-27 06:02:51', '2024-06-27 21:21:26'),
(77, 'Kursi Outdoor', '34i8TMd37HF23UPFsMEllO2xtvSTmc.png', 'Nikmati momen santai di halaman Anda dengan Kursi Taman/Outdoor kami yang nyaman dan bergaya. Dirancang untuk memberikan kenyamanan maksimal dan tahan lama di segala cuaca, kursi ini adalah pilihan ideal untuk santai di teras, taman, atau balkon Anda. Dengan bahan berkualitas tinggi dan desain yang menarik, kursi ini akan memberikan kenyamanan bagi Anda dan tamu Anda.', 1, 1, '2024-06-27 21:14:06', '2024-06-27 21:14:06'),
(78, 'Kursi Bar Minimalis', 'Wbi0ipY3YvhlGSRtV6EV4mtpGQbtHF.png', 'Tambahkan sentuhan modern dan elegan ke ruang bar Anda dengan Kursi Bar Minimalis kami yang bergaya. Dirancang dengan kesederhanaan sebagai inti, kursi ini memadukan estetika yang bersih dengan kenyamanan yang optimal.', 1, 1, '2024-06-27 21:18:40', '2024-06-27 21:18:40'),
(79, 'Kitchen Set', 'QtClGsHepcR3WmwKrqzRZT0KqfrVAX.png', 'Ubah dapur Anda menjadi ruang impian dengan Kitchen Set Custom kami! Kami menawarkan desain yang disesuaikan sepenuhnya dengan kebutuhan dan gaya Anda. Setiap kitchen set dibuat dengan bahan berkualitas tinggi dan pengerjaan tangan yang presisi, memastikan hasil akhir yang tidak hanya indah tetapi juga tahan lama.', 1, 1, '2024-06-27 21:19:33', '2024-06-27 21:19:33'),
(80, 'Sekat Ruangan', 'NBU1fxbhP17T3MM2J0kyLOXHNzlb8G.png', 'Sekat Ruangan kami adalah solusi sempurna untuk membagi dan memperindah ruang di rumah atau kantor Anda. Dengan desain yang elegan dan material berkualitas tinggi, sekat ini tidak hanya memberikan privasi tetapi juga menambah sentuhan estetika pada ruangan. Apakah Anda ingin menciptakan ruang kerja yang tenang, memisahkan area makan dari ruang', 1, 1, '2024-06-27 21:19:53', '2024-06-27 21:19:53'),
(81, 'Meja Tamu', 'iBiXn1dIy6kkfOb1fLti1I3yh4G0Vd.png', 'Hadirkan sentuhan elegan dan fungsionalitas di ruang tamu Anda dengan Meja Tamu kami. Dirancang dengan material berkualitas tinggi dan perhatian terhadap detail, meja tamu ini tidak hanya mempercantik ruangan tetapi juga memberikan kemudahan dalam penggunaan sehari-hari. Temukan berbagai pilihan desain yang sesuai dengan gaya dan kebutuhan Anda, mulai dari modern hingga klasik.', 1, 2, '2024-06-27 21:21:59', '2024-06-27 21:21:59'),
(82, 'Meja Rias', 'S857yyfW6h1gNhhV5HVJRsPf5Q3C4j.png', 'Dirancang dengan estetika yang indah dan fungsionalitas tinggi, meja rias ini adalah tambahan sempurna untuk kamar tidur Anda. Dengan material berkualitas tinggi dan desain yang cermat, meja rias kami menawarkan tempat yang ideal untuk merapikan diri dan menyimpan semua perlengkapan kecantikan Anda dengan rapi.', 1, 2, '2024-06-27 21:22:35', '2024-06-27 21:22:35'),
(83, 'Meja TV', 'r7bAGGY2rfRgAZJMeXCMiVTx85D7FK.png', 'Tingkatkan pengalaman menonton Anda dengan Meja TV kami yang stylish dan praktis. Dirancang untuk memenuhi kebutuhan ruang hiburan modern, meja TV ini menawarkan solusi penyimpanan yang cerdas dan estetika yang menarik. Terbuat dari material berkualitas tinggi, meja TV kami adalah pilihan sempurna untuk menambah kenyamanan dan keindahan pada ruang keluarga atau ruang tamu Anda.', 1, 2, '2024-06-27 21:23:17', '2024-06-27 21:23:17'),
(84, 'Kursi Outdoor', 'dTBMGZbtfyGfEiOMR1C4B5a7si2H8C.png', 'Nikmati momen santai di halaman Anda dengan Kursi Taman/Outdoor kami yang nyaman dan bergaya. Dirancang untuk memberikan kenyamanan maksimal dan tahan lama di segala cuaca, kursi ini adalah pilihan ideal untuk santai di teras, taman, atau balkon Anda. Dengan bahan berkualitas tinggi dan desain yang menarik, kursi ini tidak hanya menambah keindahan alam terbuka Anda tetapi juga memberikan kenyamanan bagi Anda dan tamu Anda.', 1, 3, '2024-06-27 21:24:08', '2024-06-27 21:24:08'),
(85, 'Kursi Bar Minimalis', 'RKFn8Xr6OtotT7ympgrS7jkMOUZroq.png', 'Tambahkan sentuhan modern dan elegan ke ruang bar Anda dengan Kursi Bar Minimalis kami yang bergaya. Dirancang dengan kesederhanaan sebagai inti, kursi ini memadukan estetika yang bersih dengan kenyamanan yang optimal. Dengan desain yang ergonomis dan bahan berkualitas tinggi, kursi ini menjadi pilihan sempurna untuk menikmati minuman atau bersantai dengan teman-teman dalam gaya yang berkelas.', 1, 3, '2024-06-27 21:25:03', '2024-06-27 21:25:03'),
(86, 'Kursi Kayu Minimalis', '0XjoeHxeE2ZkHz6dcXZPuEwipH8mPI.png', 'Menjadi harmoni antara kesederhanaan dan keindahan dalam ruang Anda dengan Kursi Kayu Minimalis kami. Dirancang untuk memberikan sentuhan alami dan estetika yang elegan, kursi kayu ini menambah pesona dan kemewahan pada setiap ruangan. Dibuat dengan teliti dari kayu solid berkualitas tinggi, kursi ini tidak hanya menawarkan keindahan visual tetapi juga kenyamanan yang luar biasa untuk Anda dan tamu Anda.', 1, 3, '2024-06-27 21:25:43', '2024-06-27 21:25:43'),
(87, 'Set Kursi Cofee', 'LsBUlTmLID2eFhDXhpebob3K0JiPqp.png', 'Dirancang khusus untuk ruang santai atau area kopi Anda, set kursi ini menyatukan desain kontemporer dengan kenyamanan yang luar biasa. Dengan bahan berkualitas tinggi dan desain yang menarik, set kursi ini akan menjadi tempat favorit untuk bersantai, membaca buku, atau sekadar menikmati percakapan bersama teman dan keluarga.', 1, 3, '2024-06-27 21:26:18', '2024-06-27 21:26:18'),
(88, 'Set Sofa Minimalis', 'Owy3xJzlqiVyQYU3cEcPl2oQdxRQyi.png', 'Dengan desain yang elegan namun sederhana, set sofa ini menambah sentuhan modern dan santai ke dalam rumah Anda. Dirancang untuk memberikan kenyamanan maksimal tanpa mengorbankan estetika, set sofa ini menjadi pusat perhatian yang indah di ruang tamu atau ruang keluarga Anda.', 1, 3, '2024-06-27 21:26:45', '2024-06-27 21:26:45'),
(89, 'Rak Buku', 'LTgZcbjnWYO18JAIKWw5bRCVhC5bkA.png', 'Didesain dengan detail yang cermat dan kualitas yang tinggi, rak ini tidak hanya menawarkan ruang penyimpanan yang luas untuk buku-buku Anda, tetapi juga menambahkan sentuhan elegan ke dalam ruangan Anda. Terlepas dari ukuran atau gaya ruangan Anda, rak buku ini akan membantu menciptakan suasana yang rapi dan terorganisir sambil menampilkan buku-buku Anda dengan indah', 1, 4, '2024-06-27 21:28:16', '2024-06-27 21:28:16'),
(90, 'Rak Sepatu', 'KfLmsE8tx7r3YiyRiwahLE4KaF2GjO.png', 'Rak Sepatu Multipleks HPL kami adalah solusi sempurna untuk menyimpan dan mengorganisir koleksi sepatu Anda dengan cara yang stylish dan praktis. Dibuat dari bahan multipleks berkualitas tinggi dengan lapisan HPL yang tahan lama, rak sepatu ini menawarkan kekuatan dan estetika yang luar biasa. Dengan pilihan motif HPL yang dapat disesuaikan sesuai selera, Anda dapat menciptakan tampilan yang unik dan menarik untuk rumah Anda. Ukuran yang besar dan desain yang fungsional menjadikan rak sepatu ini pilihan ideal untuk segala jenis rumah tangga.', 1, 4, '2024-06-27 21:28:56', '2024-06-27 21:29:08'),
(91, 'Rak Minimalis Mahoni', 'lgrSXYtxcC8yyAhFmyWLHcvLth1WOc.png', 'Dibuat dengan teliti dari kayu mahoni pilihan, rak ini menawarkan keindahan alami dan kekuatan yang tahan lama. Desainnya yang minimalis memastikan kesederhanaan yang menawan, sementara ruang penyimpanannya yang fungsional menjadikannya pilihan yang tepat untuk mengorganisir dan menampilkan barang-barang Anda dengan indah. Cocok untuk berbagai dekorasi interior, rak ini akan menjadi sentuhan menawan dalam ruang Anda.', 1, 4, '2024-06-27 21:29:42', '2024-06-27 21:30:51'),
(92, 'Lemari Minimalis 2 Pintu', 'KZ8CikJ0P2fm4ZLmUt8scxtf4n7zKR.png', 'Dirancang dengan estetika minimalis, lemari ini menggabungkan keindahan dan kepraktisan dalam satu unit yang kompak. Terbuat dari material berkualitas tinggi, lemari ini menjamin kekuatan dan daya tahan, sehingga cocok untuk penggunaan jangka panjang. Dengan ruang penyimpanan yang luas dan desain yang fungsional, lemari ini cocok untuk berbagai jenis kamar tidur dan gaya dekorasi.', 1, 5, '2024-06-27 21:32:14', '2024-06-27 21:32:22'),
(93, 'Lemari Serbaguna', 'oPFytF1ykTORMWEfsDwjgGQWAtelHy.png', 'Lemari Serbaguna kami adalah solusi sempurna untuk mengatur dan menyimpan pakaian, tas, dan sepatu Anda dengan rapi dan efisien. Didesain dengan detail yang cermat dan fokus pada fungsionalitas, lemari ini tidak hanya menawarkan ruang penyimpanan yang luas, tetapi juga memberikan kemudahan akses serta tampilan yang menawan. Terbuat dari bahan berkualitas tinggi dan desain yang cerdas, lemari ini akan menjadi tambahan yang berharga untuk ruang penyimpanan Anda.', 1, 5, '2024-06-27 21:33:01', '2024-06-27 21:33:01'),
(94, 'Lemari Pakaian dan Rak', '5kSPdN80CtZHjOuv6bLj2wxqUgxSBk.png', 'Lemari Pakaian dengan Rak Hijab kami adalah solusi ideal untuk menyimpan dan mengorganisir pakaian serta koleksi hijab Anda dengan rapi dan efisien. Dirancang dengan gaya modern dan fungsionalitas tinggi, lemari ini terbuat dari material berkualitas yang menjamin kekuatan dan daya tahan.', 1, 5, '2024-06-27 21:33:37', '2024-06-27 21:33:37'),
(95, 'Kitchen Set', 'glN9pgrYCWAoid4DVqbQ350eBv3Wqi.png', 'Ubah dapur Anda menjadi ruang impian dengan Kitchen Set Custom kami! Kami menawarkan desain yang disesuaikan sepenuhnya dengan kebutuhan dan gaya Anda. Setiap kitchen set dibuat dengan bahan berkualitas tinggi dan pengerjaan tangan yang presisi, memastikan hasil akhir yang tidak hanya indah tetapi juga tahan lama.', 1, 6, '2024-06-27 21:34:38', '2024-06-27 21:34:38'),
(96, 'Dipan Anak dengan Mainan', 'x4RgFHCVSV1srn60h5riDJv1BIPYUA.png', 'Dirancang khusus untuk kebutuhan anak-anak, dipan ini tidak hanya menawarkan kenyamanan untuk beristirahat, tetapi juga menyediakan tempat yang nyaman untuk menyimpan mainan dan barang-barang kesayangan anak-anak. Dengan desain yang ceria dan rak penyimpanan yang fungsional, dipan ini akan menjadi tempat tidur impian bagi si kecil untuk bermimpi dan berpetualang.', 1, 7, '2024-06-27 21:35:48', '2024-06-27 21:35:48'),
(97, 'Baby Tuffle', 'TZ4WcrFSgZ1tKLXD3pdN1tHVLeKsIB.png', 'Memberikan perawatan terbaik bagi bayi Anda menjadi lebih mudah dengan Meja Ganti Baju Bayi kami yang fungsional dan aman. Dirancang dengan kelembutan dan kepraktisan sebagai fokus utama, meja ganti baju ini menjadi kawan setia setiap kali momen perawatan dan kebersihan tiba. Dibuat dengan material berkualitas dan fitur-fitur yang mendukung, setiap ganti pakaian menjadi momen yang menyenangkan bagi si kecil dan Anda.', 1, 8, '2024-06-27 21:36:36', '2024-06-27 21:36:36'),
(98, 'Kandang Peliharaan', 'xOL5aa9WXgZntbGbrjDgOdv8FFo6xY.png', 'Berikan peliharaan kesayangan Anda tempat tinggal yang mewah dan aman dengan Kandang Peliharaan Custom kami. Dirancang khusus untuk memenuhi kebutuhan Peliharaan Anda, kandang ini merupakan gabungan sempurna antara keindahan dan fungsionalitas.', 1, 8, '2024-06-27 21:37:14', '2024-06-27 21:37:14'),
(99, 'Sekat Rumah', 'A9HJrnBgxVgQPgUHDffqkGOhYOA8OJ.png', 'Sekat Ruangan kami adalah solusi sempurna untuk membagi dan memperindah ruang di rumah atau kantor Anda. Dengan desain yang elegan dan material berkualitas tinggi, sekat ini tidak hanya memberikan privasi tetapi juga menambah sentuhan estetika pada ruangan.', 1, 8, '2024-06-27 21:37:42', '2024-06-27 21:37:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Top Pick', '2024-05-08 06:35:23', NULL),
(2, 'Meja', '2024-05-08 06:35:23', NULL),
(3, 'Kursi', '2024-05-08 06:35:23', NULL),
(4, 'Rak', '2024-05-08 06:35:23', NULL),
(5, 'Lemari', '2024-05-08 06:35:23', NULL),
(6, 'Kitchen Set', '2024-05-08 06:35:23', NULL),
(7, 'Bedroom Set', '2024-05-08 06:35:23', NULL),
(8, 'Lainnya', '2024-05-08 06:35:23', NULL);

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_08_064200_create_categories_table', 1),
(6, '2024_03_08_064206_create_catalogs_table', 1),
(7, '2024_03_08_064707_create_testimonials_table', 1),
(8, '2024_03_08_064723_create_carousels_table', 1),
(9, '2024_05_04_140756_add_image_column_to_catalogs_table', 1);

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

--
-- Dumping data untuk tabel `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'Admin Login', '444b0616c3cf9dd1c4bdd715a1a40650d5739b7f08b5bc0e05dfffd437d3e830', '[\"*\"]', '2024-06-23 22:43:30', NULL, '2024-05-07 23:44:40', '2024-06-23 22:43:30'),
(2, 'App\\Models\\User', 1, 'Admin Login', 'a90ab632b992f1fac29c6fdf0028b86602f5c4611b327a53e75286ca612b763e', '[\"*\"]', '2024-05-14 23:08:56', NULL, '2024-05-14 22:58:10', '2024-05-14 23:08:56'),
(3, 'App\\Models\\User', 1, 'Admin Login', '16d0507c334402e9a4f3fd95524f46caac90752a9838b85e519189edc4d716b0', '[\"*\"]', '2024-06-22 21:39:56', NULL, '2024-05-14 23:15:48', '2024-06-22 21:39:56'),
(4, 'App\\Models\\User', 1, 'Admin Login', 'dc326dcd1ea7ed24a66bdd641d31d687f258f11e00c15c86dd7712efc41ae513', '[\"*\"]', '2024-06-23 23:19:38', NULL, '2024-05-28 23:50:15', '2024-06-23 23:19:38'),
(5, 'App\\Models\\User', 1, 'Admin Login', 'f31c410362e0a1ee0fbcc88da653159ad0cef2ab1baab5be48d7609760ff8514', '[\"*\"]', '2024-05-30 01:14:18', NULL, '2024-05-29 23:28:47', '2024-05-30 01:14:18'),
(6, 'App\\Models\\User', 1, 'Admin Login', 'dafe60754069dbf8644c4b65177535ecf3620f5adbbe8408859e42c3279d1340', '[\"*\"]', NULL, NULL, '2024-05-30 04:56:38', '2024-05-30 04:56:38'),
(7, 'App\\Models\\User', 1, 'Admin Login', '279ec09fae9f158a85d483056d94673668f8394ee7bfeab42d66a907260c412e', '[\"*\"]', NULL, NULL, '2024-05-30 04:56:45', '2024-05-30 04:56:45'),
(8, 'App\\Models\\User', 1, 'Admin Login', '052a62a257a49b0518344875331adec4c7e4a73ad7fde1f2257a1a3453d08294', '[\"*\"]', NULL, NULL, '2024-05-30 04:57:21', '2024-05-30 04:57:21'),
(9, 'App\\Models\\User', 1, 'Admin Login', '0dbe655534abaa9db4318585f059147fccdf26fddf22120d8d5c4593eab60877', '[\"*\"]', NULL, NULL, '2024-05-30 04:57:57', '2024-05-30 04:57:57'),
(10, 'App\\Models\\User', 1, 'Admin Login', 'a69111f82162fb481e2ab18468ab08fa4d0c1f71ff1b9a9a33d1ddaf200a729d', '[\"*\"]', NULL, NULL, '2024-05-30 04:58:12', '2024-05-30 04:58:12'),
(11, 'App\\Models\\User', 1, 'Admin Login', '9b769e7185d8ae660326a02fd77f791a828a81104ac088086c85a84efc15ffda', '[\"*\"]', NULL, NULL, '2024-05-30 19:56:05', '2024-05-30 19:56:05'),
(12, 'App\\Models\\User', 1, 'Admin Login', 'ee78cb4da2a2890639f59226549568ba735bfba8545c2cab363bbdc763738aad', '[\"*\"]', NULL, NULL, '2024-05-30 20:27:43', '2024-05-30 20:27:43'),
(13, 'App\\Models\\User', 1, 'Admin Login', 'd661ad381b8bafb9b711a2a709ee1c42f3667e8a1c1075d64a5a9258f4fdc7ee', '[\"*\"]', NULL, NULL, '2024-06-13 18:52:51', '2024-06-13 18:52:51'),
(14, 'App\\Models\\User', 1, 'Admin Login', '3a81dd716a65e46d36627bfeba65231e897d47b8cdf866d98b4605062251bebf', '[\"*\"]', NULL, NULL, '2024-06-13 18:57:21', '2024-06-13 18:57:21'),
(15, 'App\\Models\\User', 1, 'Admin Login', 'de00d42a5664bbbc6a3a44e049df0f08d50151a871027c2dffa5a2d7923a1a7f', '[\"*\"]', '2024-06-13 19:36:04', NULL, '2024-06-13 19:17:26', '2024-06-13 19:36:04'),
(16, 'App\\Models\\User', 1, 'Admin Login', '01162bace1b0c2f8086359908199c0a07b43cb860d729d295303d922ea54218f', '[\"*\"]', NULL, NULL, '2024-06-13 23:49:36', '2024-06-13 23:49:36'),
(17, 'App\\Models\\User', 1, 'Admin Login', '9d7f5b2762a87150a3813cb78a5d8f4f128a49637d8cb5a7e3f128a489fe1016', '[\"*\"]', '2024-06-22 00:30:10', NULL, '2024-06-13 23:56:54', '2024-06-22 00:30:10'),
(18, 'App\\Models\\User', 1, 'Admin Login', 'e052eff5ca324daf95d666f141c3a1a06d2d3519bd43d702fb3e5bbbab3776da', '[\"*\"]', NULL, NULL, '2024-06-22 01:03:37', '2024-06-22 01:03:37'),
(19, 'App\\Models\\User', 1, 'Admin Login', '0af79cba483f8ead1cde72e661c6c764776e95003520ef38732914d61fe460de', '[\"*\"]', NULL, NULL, '2024-06-22 01:06:06', '2024-06-22 01:06:06'),
(20, 'App\\Models\\User', 1, 'Admin Login', 'fdcfb3942351cca44dd06341fc97165f6c981dc202c6571057f57197ad2b854d', '[\"*\"]', NULL, NULL, '2024-06-22 01:09:59', '2024-06-22 01:09:59'),
(21, 'App\\Models\\User', 1, 'Admin Login', 'dab317bed14f606518373e283261ec9c6369bcb3b5b436bab3e40b21d1fa1b44', '[\"*\"]', '2024-06-22 01:11:10', NULL, '2024-06-22 01:11:03', '2024-06-22 01:11:10'),
(22, 'App\\Models\\User', 1, 'Admin Login', '8b3956721a34372840bcf1f103149672e96ec40311d8a21d4b989f1b307354ec', '[\"*\"]', '2024-06-22 01:29:40', NULL, '2024-06-22 01:24:29', '2024-06-22 01:29:40'),
(23, 'App\\Models\\User', 1, 'Admin Login', '94c29c43b5c69fd55b148f5af38db3fa53e62ef93faf796261ed79dcfb30fa02', '[\"*\"]', NULL, NULL, '2024-06-22 04:24:25', '2024-06-22 04:24:25'),
(24, 'App\\Models\\User', 1, 'Admin Login', '798518a731008dc14f1a6eef822cc9e9f28dbbd41c172aeda62bd1ee36a919e7', '[\"*\"]', '2024-06-22 08:24:52', NULL, '2024-06-22 04:30:37', '2024-06-22 08:24:52'),
(25, 'App\\Models\\User', 1, 'Admin Login', '9b95746da640537097fcc398cc9b7733124e99ccc81c77c4fae5d6cbbe86bf1f', '[\"*\"]', '2024-06-22 21:40:19', NULL, '2024-06-22 08:25:42', '2024-06-22 21:40:19'),
(26, 'App\\Models\\User', 1, 'Admin Login', '7725ef7ca417da97d5b4a3df9398fab8df822e605b2ac0ef720498b7188830bb', '[\"*\"]', NULL, NULL, '2024-06-22 21:41:12', '2024-06-22 21:41:12'),
(27, 'App\\Models\\User', 1, 'Admin Login', '767ccae5ed9b136cd91fefb885c76045518a838611932c74157c1c6d9b9ce393', '[\"*\"]', '2024-06-23 21:12:24', NULL, '2024-06-22 21:43:05', '2024-06-23 21:12:24'),
(28, 'App\\Models\\User', 1, 'Admin Login', '468df85071e6d2e91ae19c59955ea320fa1542302225b643771eed99b1c600c3', '[\"*\"]', '2024-06-23 22:41:41', NULL, '2024-06-23 21:13:18', '2024-06-23 22:41:41'),
(29, 'App\\Models\\User', 1, 'Admin Login', '7656a0a3a508a70413f6769aa107ea1a30d32b2463b39556d7bda3d176f283ed', '[\"*\"]', '2024-06-23 22:50:12', NULL, '2024-06-23 22:44:18', '2024-06-23 22:50:12'),
(31, 'App\\Models\\User', 1, 'Admin Login', '3a2bad302f53666d456897ae1d07f119cef9d3dd934baa24be2d3f7050617626', '[\"*\"]', '2024-06-24 00:22:13', NULL, '2024-06-23 23:20:42', '2024-06-24 00:22:13'),
(32, 'App\\Models\\User', 1, 'Admin Login', '61fef74d66088985a024d9b0bfa7174ba4efedf83dc86cf098ed9d7c3183fb32', '[\"*\"]', '2024-06-27 02:06:29', NULL, '2024-06-24 00:32:20', '2024-06-27 02:06:29'),
(33, 'App\\Models\\User', 1, 'Admin Login', '50f1f23399bb1ac08dc85c0cf9dd434c0753676c9a41b0fc5a6cbd5886f290a2', '[\"*\"]', NULL, NULL, '2024-06-25 07:03:52', '2024-06-25 07:03:52'),
(34, 'App\\Models\\User', 1, 'Admin Login', '1876f25d44949f07165ad92dbb7a24562b44c0a92968e3bdc3480f34c13d55a5', '[\"*\"]', NULL, NULL, '2024-06-25 07:04:10', '2024-06-25 07:04:10'),
(35, 'App\\Models\\User', 1, 'Admin Login', '06ebe2ed729adc9b26dc21554045b074ca13a0cc00706696c7cfbcce74665498', '[\"*\"]', '2024-06-25 07:05:07', NULL, '2024-06-25 07:05:07', '2024-06-25 07:05:07'),
(36, 'App\\Models\\User', 1, 'Admin Login', '1368007f8b4be93383a8bfeae7ad1fff48b518fee8607a5adf8cc82e406d04b4', '[\"*\"]', '2024-06-25 07:07:35', NULL, '2024-06-25 07:07:35', '2024-06-25 07:07:35'),
(37, 'App\\Models\\User', 1, 'Admin Login', 'beab771663ad4ac83eecfffd7a4c93c30c4b7c883f2f96a7ad9b0eec97e6f705', '[\"*\"]', '2024-06-25 07:08:56', NULL, '2024-06-25 07:08:56', '2024-06-25 07:08:56'),
(38, 'App\\Models\\User', 1, 'Admin Login', '82b62dcfcac78dd91e8718d3ac6b85bc2d42adb5df456bb72ace03226b315118', '[\"*\"]', '2024-06-25 07:11:32', NULL, '2024-06-25 07:11:32', '2024-06-25 07:11:32'),
(39, 'App\\Models\\User', 1, 'Admin Login', '4eaace35808f3f603148d8689c7a4da6310144470c0fc6e45f83d13773f8e0aa', '[\"*\"]', '2024-06-25 07:12:53', NULL, '2024-06-25 07:12:49', '2024-06-25 07:12:53'),
(40, 'App\\Models\\User', 1, 'Admin Login', '548ddef5f6d4e9f2b12b49f3b47a23cc6221f1fc3cd0cfc684098731139b1353', '[\"*\"]', '2024-06-25 07:13:43', NULL, '2024-06-25 07:13:43', '2024-06-25 07:13:43'),
(41, 'App\\Models\\User', 1, 'Admin Login', '3208fa737e49ccca50b2791ad86e07cd261ff40ec3dedd52f2d8365227128710', '[\"*\"]', NULL, NULL, '2024-06-25 07:18:11', '2024-06-25 07:18:11'),
(42, 'App\\Models\\User', 1, 'Admin Login', '78657fa28ad8e6b677d4ed96ff9e306d0b60146e491d12ad6360129d0f35bd73', '[\"*\"]', '2024-06-25 07:18:37', NULL, '2024-06-25 07:18:37', '2024-06-25 07:18:37'),
(43, 'App\\Models\\User', 1, 'Admin Login', 'ee8dab9d04842ed4a295365a8499fb51a46bc502ff630ea5315cc653e6fbf849', '[\"*\"]', '2024-06-25 07:18:49', NULL, '2024-06-25 07:18:49', '2024-06-25 07:18:49'),
(44, 'App\\Models\\User', 1, 'Admin Login', 'cb81b962a1e468566fa4d36eb5d2b28e4ce04fc647e83642c6edfce5a56e8984', '[\"*\"]', NULL, NULL, '2024-06-25 07:57:47', '2024-06-25 07:57:47'),
(45, 'App\\Models\\User', 1, 'Admin Login', '53c08aaeb45cf58f276a9e0a94212880f3faa74960f081bb8477602e14a9f24a', '[\"*\"]', '2024-06-25 19:21:48', NULL, '2024-06-25 19:21:37', '2024-06-25 19:21:48'),
(46, 'App\\Models\\User', 1, 'Admin Login', 'e5231b7d470a7abb2090127b31e51fdff38aaebf17215ac00dd186715f040ca8', '[\"*\"]', NULL, NULL, '2024-06-27 05:19:12', '2024-06-27 05:19:12'),
(47, 'App\\Models\\User', 1, 'Admin Login', '7f6bb6b5ce10f758a503d66c90d632a64eaaa3e8da36b1ebb7af072048ff65a3', '[\"*\"]', '2024-07-05 06:18:37', NULL, '2024-06-27 05:20:31', '2024-07-05 06:18:37'),
(48, 'App\\Models\\User', 1, 'Admin Login', '9395ffc278125e51fc6b0fe7e0886170860740f6953b92f42d5fc430fc854b1e', '[\"*\"]', NULL, NULL, '2024-06-27 06:01:13', '2024-06-27 06:01:13'),
(49, 'App\\Models\\User', 1, 'Admin Login', '940aade30f79ecd7c6a214b46f8014bf7d8bcc85a7e4ff8d7f992e650754c44d', '[\"*\"]', '2024-06-27 06:13:24', NULL, '2024-06-27 06:02:15', '2024-06-27 06:13:24'),
(50, 'App\\Models\\User', 1, 'Admin Login', '9b8611c503e814f1d506f37248f1226bc7168157402a7e8056fc6a0a2c77d1b4', '[\"*\"]', '2024-06-27 22:16:06', NULL, '2024-06-27 20:34:06', '2024-06-27 22:16:06'),
(51, 'App\\Models\\User', 1, 'Admin Login', '900a798841c3759da79a9ed936adaff7f0c362bdbecbad285b8ea49f2adcfe1a', '[\"*\"]', '2024-06-27 23:22:01', NULL, '2024-06-27 23:15:48', '2024-06-27 23:22:01'),
(52, 'App\\Models\\User', 1, 'Admin Login', 'a3f391b0c98b7f0e35dfee734cacdcdc28978482abf6d6968744d0692701d470', '[\"*\"]', '2024-07-04 01:24:50', NULL, '2024-06-27 23:35:50', '2024-07-04 01:24:50'),
(53, 'App\\Models\\User', 1, 'Admin Login', '4d1286d5c5541194e44053449c27af228a2bc21a80311d7c50eda5b72cfe896a', '[\"*\"]', '2024-07-07 06:04:17', NULL, '2024-07-04 01:25:41', '2024-07-07 06:04:17'),
(54, 'App\\Models\\User', 1, 'Admin Login', 'ddd35c69f9d65a96ad9f0de04cf1dee6cf00240414854449e1e981a7699ab001', '[\"*\"]', '2024-07-07 06:06:23', NULL, '2024-07-07 06:04:33', '2024-07-07 06:06:23'),
(55, 'App\\Models\\User', 1, 'Admin Login', 'ad3a5bfba5040070d29be0aaad0d325c87a91f60e3cca5f496a67633bd40aac7', '[\"*\"]', '2024-07-07 18:48:43', NULL, '2024-07-07 06:18:19', '2024-07-07 18:48:43'),
(56, 'App\\Models\\User', 1, 'Admin Login', '774a4d71e0069dcbfab97c6b73862e9c2b1a218f0121e988ff453f2226ce610d', '[\"*\"]', '2024-07-07 18:53:40', NULL, '2024-07-07 18:50:45', '2024-07-07 18:53:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', 'admin', '$2y$10$ddX/5s1pceCMJn0yO215aecYIUJDw1tjkGmHC98Qinr00wmlYEVQy', NULL, NULL),
(2, 'magang@gmail.com', 'magang', '$2y$10$ddX/5s1pceCMJn0yO215aecYIUJDw1tjkGmHC98Qinr00wmlYEVQy', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `carousels`
--
ALTER TABLE `carousels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carousels_author_id_foreign` (`author_id`);

--
-- Indeks untuk tabel `catalogs`
--
ALTER TABLE `catalogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catalogs_author_id_foreign` (`author_id`),
  ADD KEY `catalogs_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testimonials_author_id_foreign` (`author_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `carousels`
--
ALTER TABLE `carousels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `catalogs`
--
ALTER TABLE `catalogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `carousels`
--
ALTER TABLE `carousels`
  ADD CONSTRAINT `carousels_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `catalogs`
--
ALTER TABLE `catalogs`
  ADD CONSTRAINT `catalogs_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `catalogs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Ketidakleluasaan untuk tabel `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `testimonials_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
