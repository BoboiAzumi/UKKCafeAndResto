-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Bulan Mei 2022 pada 15.15
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafe`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `pLoginDelete` (IN `a1` INT)  DELETE FROM tbl_login WHERE id_login = a1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pLoginTampil` ()  NO SQL
SELECT a.nama_pegawai, a.jabatan, b.id_login, b.username FROM tbl_pegawai a INNER JOIN tbl_login b ON a.id_pegawai = b.id_pegawai$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_log`
--

CREATE TABLE `tbl_log` (
  `id_log` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `aksi` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_log`
--

INSERT INTO `tbl_log` (`id_log`, `id_pegawai`, `nama_pegawai`, `jabatan`, `aksi`, `date`) VALUES
(403, 1, 'Muhammad Hikigaya', 'Manajer', 'Menghapus seluruh Log History', '2022-05-12 02:03:33'),
(404, 1, 'Muhammad Hikigaya', 'Manajer', 'Melakukan Logout', '2022-05-12 02:03:37'),
(405, 6, 'Miranda Hatsune', 'Kasir', 'Login-Melakukan Login', '2022-05-12 02:03:40'),
(406, 6, 'Miranda Hatsune', 'Kasir', 'Melakukan Logout', '2022-05-12 02:05:38'),
(407, 10, 'Suryadi Watanabe', 'Kasir', 'Login-Melakukan Login', '2022-05-12 02:05:42'),
(408, 10, 'Suryadi Watanabe', 'Kasir', 'Melakukan Logout', '2022-05-12 02:07:48'),
(409, 1, 'Muhammad Hikigaya', 'Manajer', 'Login-Melakukan Login', '2022-05-12 02:07:51'),
(410, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Mengubah informasi pegawai Mark Takahashi', '2022-05-12 02:08:45'),
(411, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Mengubah informasi pegawai Kiki Nakano', '2022-05-12 02:09:12'),
(412, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Mengubah informasi pegawai Mark Takahisa', '2022-05-12 02:09:46'),
(413, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Menambah pegawai Mustafa Hinawa', '2022-05-12 02:12:27'),
(414, 1, 'Muhammad Hikigaya', 'Manajer', 'Melakukan Logout', '2022-05-12 02:12:31'),
(415, 2, 'Kamaluddin Kazuma', 'Admin', 'Login-Melakukan Login', '2022-05-12 02:12:34'),
(416, 2, 'Kamaluddin Kazuma', 'Admin', 'Kamaluddin Kazuma - Menambah username mustafa', '2022-05-12 02:12:49'),
(417, 2, 'Kamaluddin Kazuma', 'Admin', 'Melakukan Logout', '2022-05-12 02:12:50'),
(418, 12, 'Mustafa Hinawa', 'Kasir', 'Login-Melakukan Login', '2022-05-12 02:12:54'),
(419, 12, 'Mustafa Hinawa', 'Kasir', 'Melakukan Logout', '2022-05-12 02:19:40'),
(420, 1, 'Muhammad Hikigaya', 'Manajer', 'Login-Melakukan Login', '2022-05-12 02:19:55'),
(421, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Menambah menu Bakso Spesial Daging Wagyu Kyoto', '2022-05-12 02:20:58'),
(422, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Menambah menu Takoyaki + Yakiniku + Lemon Ice', '2022-05-12 02:22:11'),
(423, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Menambah menu Lemon Ice', '2022-05-12 02:22:55'),
(424, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Menambah menu Takoyaki', '2022-05-12 02:23:08'),
(425, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Menambah menu Faiyaru Ramen', '2022-05-12 02:23:28'),
(426, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Menambah menu Ushi Ramen', '2022-05-12 02:24:10'),
(427, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Menambah menu Negi Ramen', '2022-05-12 02:24:21'),
(428, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Menambah menu Naruto Ramen', '2022-05-12 02:25:18'),
(429, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Menambah menu Niwatori Ramen', '2022-05-12 02:25:44'),
(430, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Menambah menu Spesiaru Ramen', '2022-05-12 02:27:01'),
(431, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Menambah menu Spesiaru Ramen + Yakiniku', '2022-05-12 02:27:25'),
(432, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Menambah menu Tamago Ramen', '2022-05-12 02:38:21'),
(433, 1, 'Muhammad Hikigaya', 'Manajer', 'Melakukan Logout', '2022-05-12 02:41:32'),
(434, 6, 'Miranda Hatsune', 'Kasir', 'Login-Melakukan Login', '2022-05-12 02:41:35'),
(435, 6, 'Miranda Hatsune', 'Kasir', 'Melakukan Logout', '2022-05-12 02:52:19'),
(436, 1, 'Muhammad Hikigaya', 'Manajer', 'Login-Melakukan Login', '2022-05-12 02:52:23'),
(437, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Menambah menu Ice Coffee', '2022-05-12 02:54:31'),
(438, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Menambah menu Arabica Coffee', '2022-05-12 02:54:44'),
(439, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Menambah menu Japanese Ice Tea', '2022-05-12 02:54:57'),
(440, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Menambah menu Sawi dan Nanas Juice Blend', '2022-05-12 02:56:43'),
(441, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Menambah menu Cafushino Numiru Uno', '2022-05-12 02:57:11'),
(442, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Menambah menu Arufukado Juice Icu', '2022-05-12 02:57:44'),
(443, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Menambah pegawai Emilia Rie', '2022-05-12 02:59:02'),
(444, 1, 'Muhammad Hikigaya', 'Manajer', 'Melakukan Logout', '2022-05-12 02:59:08'),
(445, 2, 'Kamaluddin Kazuma', 'Admin', 'Login-Melakukan Login', '2022-05-12 03:03:27'),
(446, 2, 'Kamaluddin Kazuma', 'Admin', 'Kamaluddin Kazuma - Menambah username emilia', '2022-05-12 03:03:39'),
(447, 2, 'Kamaluddin Kazuma', 'Admin', 'Melakukan Logout', '2022-05-12 03:03:44'),
(448, 13, 'Emilia Rie', 'Manajer', 'Login-Melakukan Login', '2022-05-12 03:03:47'),
(449, 13, 'Emilia Rie', 'Manajer', 'Melakukan Logout', '2022-05-12 03:22:26'),
(450, 1, 'Muhammad Hikigaya', 'Manajer', 'Login-Melakukan Login', '2022-05-12 03:22:36'),
(451, 1, 'Muhammad Hikigaya', 'Manajer', 'Melakukan Logout', '2022-05-12 03:39:40'),
(452, 10, 'Suryadi Watanabe', 'Kasir', 'Login-Melakukan Login', '2022-05-12 03:39:45'),
(453, 10, 'Suryadi Watanabe', 'Kasir', 'Melakukan Logout', '2022-05-12 03:50:57'),
(454, 1, 'Muhammad Hikigaya', 'Manajer', 'Login-Melakukan Login', '2022-05-12 03:51:02'),
(455, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Mengubah informasi pegawai Markus Takahisa', '2022-05-12 03:51:19'),
(456, 1, 'Muhammad Hikigaya', 'Manajer', 'Melakukan Logout', '2022-05-12 03:51:22'),
(457, 2, 'Kamaluddin Kazuma', 'Admin', 'Login-Melakukan Login', '2022-05-12 03:51:24'),
(458, 2, 'Kamaluddin Kazuma', 'Admin', 'Kamaluddin Kazuma - Mengubah informasi username markus', '2022-05-12 03:51:34'),
(459, 2, 'Kamaluddin Kazuma', 'Admin', 'Melakukan Logout', '2022-05-12 03:51:37'),
(460, 7, 'Markus Takahisa', 'Kasir', 'Login-Melakukan Login', '2022-05-12 03:51:40'),
(461, 7, 'Markus Takahisa', 'Kasir', 'Melakukan Logout', '2022-05-12 04:01:27'),
(462, 7, 'Markus Takahisa', 'Kasir', 'Login-Melakukan Login', '2022-05-12 04:01:34'),
(463, 7, 'Markus Takahisa', 'Kasir', 'Melakukan Logout', '2022-05-12 04:14:29'),
(464, 1, 'Muhammad Hikigaya', 'Manajer', 'Login-Melakukan Login', '2022-05-12 04:14:32'),
(465, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Menambah menu Jigoku Ramen', '2022-05-12 04:14:57'),
(466, 1, 'Muhammad Hikigaya', 'Manajer', 'Melakukan Logout', '2022-05-12 04:15:51'),
(467, 10, 'Suryadi Watanabe', 'Kasir', 'Login-Melakukan Login', '2022-05-12 04:16:05'),
(468, 10, 'Suryadi Watanabe', 'Kasir', 'Melakukan Logout', '2022-05-12 04:16:13'),
(469, 3, 'Aditya Takahashi', 'Admin', 'Login-Melakukan Login', '2022-05-12 04:16:17'),
(470, 3, 'Aditya Takahashi', 'Admin', 'Melakukan Logout', '2022-05-12 04:16:24'),
(471, 2, 'Kamaluddin Kazuma', 'Admin', 'Login-Melakukan Login', '2022-05-12 04:25:40'),
(472, 2, 'Kamaluddin Kazuma', 'Admin', 'Melakukan Logout', '2022-05-12 04:25:48'),
(473, 6, 'Miranda Hatsune', 'Kasir', 'Login-Melakukan Login', '2022-05-12 04:25:52'),
(474, 6, 'Miranda Hatsune', 'Kasir', 'Melakukan Logout', '2022-05-12 05:00:36'),
(475, 1, 'Muhammad Hikigaya', 'Manajer', 'Login-Melakukan Login', '2022-05-12 05:03:51'),
(476, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Menambah menu Makan Brutal', '2022-05-12 12:14:46'),
(477, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Menambah menu Minum Brutal', '2022-05-12 12:15:01'),
(478, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Menambah menu Makan + Minum Brutal', '2022-05-12 12:15:21'),
(479, 1, 'Muhammad Hikigaya', 'Manajer', 'Melakukan Logout', '2022-05-12 12:15:28'),
(480, 10, 'Suryadi Watanabe', 'Kasir', 'Login-Melakukan Login', '2022-05-12 12:15:34'),
(481, 10, 'Suryadi Watanabe', 'Kasir', 'Melakukan Logout', '2022-05-12 12:17:20'),
(482, 6, 'Miranda Hatsune', 'Kasir', 'Login-Melakukan Login', '2022-05-12 12:17:32'),
(483, 6, 'Miranda Hatsune', 'Kasir', 'Melakukan Logout', '2022-05-12 12:18:40'),
(484, 1, 'Muhammad Hikigaya', 'Manajer', 'Login-Melakukan Login', '2022-05-12 12:18:54'),
(485, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Menambah pegawai Eka Akasaka', '2022-05-12 12:23:10'),
(486, 1, 'Muhammad Hikigaya', 'Manajer', 'Melakukan Logout', '2022-05-12 12:23:58'),
(487, 2, 'Kamaluddin Kazuma', 'Admin', 'Login-Melakukan Login', '2022-05-12 12:24:03'),
(488, 2, 'Kamaluddin Kazuma', 'Admin', 'Kamaluddin Kazuma - Menambah username eka', '2022-05-12 12:24:19'),
(489, 2, 'Kamaluddin Kazuma', 'Admin', 'Melakukan Logout', '2022-05-12 12:24:21'),
(490, 14, 'Eka Akasaka', 'Kasir', 'Login-Melakukan Login', '2022-05-12 12:24:25'),
(491, 14, 'Eka Akasaka', 'Kasir', 'Melakukan Logout', '2022-05-12 12:28:49'),
(492, 1, 'Muhammad Hikigaya', 'Manajer', 'Login-Melakukan Login', '2022-05-12 12:29:19'),
(493, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Mengubah menu Paket Makan Brutal', '2022-05-12 12:29:32'),
(494, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Mengubah menu Paket Minum Brutal', '2022-05-12 12:29:44'),
(495, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Mengubah menu Paket Makan + Minum Brutal', '2022-05-12 12:29:56'),
(496, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Menambah menu Paket Makanan Pedas Brutal', '2022-05-12 12:30:17'),
(497, 1, 'Muhammad Hikigaya', 'Manajer', 'Melakukan Logout', '2022-05-12 12:30:20'),
(498, 10, 'Suryadi Watanabe', 'Kasir', 'Login-Melakukan Login', '2022-05-12 12:31:09'),
(499, 10, 'Suryadi Watanabe', 'Kasir', 'Melakukan Logout', '2022-05-12 12:35:00'),
(500, 1, 'Muhammad Hikigaya', 'Manajer', 'Login-Melakukan Login', '2022-05-12 12:35:05'),
(501, 1, 'Muhammad Hikigaya', 'Manajer', 'Melakukan Logout', '2022-05-12 12:36:20'),
(502, 14, 'Eka Akasaka', 'Kasir', 'Login-Melakukan Login', '2022-05-12 12:36:41'),
(503, 14, 'Eka Akasaka', 'Kasir', 'Melakukan Logout', '2022-05-12 13:14:09'),
(504, 10, 'Suryadi Watanabe', 'Kasir', 'Login-Melakukan Login', '2022-05-12 13:14:13'),
(505, 10, 'Suryadi Watanabe', 'Kasir', 'Melakukan Logout', '2022-05-12 13:19:41'),
(506, 6, 'Miranda Hatsune', 'Kasir', 'Login-Melakukan Login', '2022-05-12 13:19:43'),
(507, 6, 'Miranda Hatsune', 'Kasir', 'Melakukan Logout', '2022-05-12 13:57:00'),
(508, 2, 'Kamaluddin Kazuma', 'Admin', 'Login-Melakukan Login', '2022-05-12 13:57:25'),
(509, 2, 'Kamaluddin Kazuma', 'Admin', 'Melakukan Logout', '2022-05-12 14:00:06'),
(510, 1, 'Muhammad Hikigaya', 'Manajer', 'Login-Melakukan Login', '2022-05-12 14:00:09'),
(511, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Menambah menu Paket Ramen Brutal', '2022-05-12 14:00:32'),
(512, 1, 'Muhammad Hikigaya', 'Manajer', 'Melakukan Logout', '2022-05-12 14:22:11'),
(513, 2, 'Kamaluddin Kazuma', 'Admin', 'Login-Melakukan Login', '2022-05-12 14:22:13'),
(514, 2, 'Kamaluddin Kazuma', 'Admin', 'Melakukan Logout', '2022-05-12 14:25:03'),
(515, 6, 'Miranda Hatsune', 'Kasir', 'Login-Melakukan Login', '2022-05-12 14:25:06'),
(516, 6, 'Miranda Hatsune', 'Kasir', 'Melakukan Logout', '2022-05-12 15:01:10'),
(517, 1, 'Muhammad Hikigaya', 'Manajer', 'Login-Melakukan Login', '2022-05-12 15:01:14'),
(518, 1, 'Muhammad Hikigaya', 'Manajer', 'Melakukan Logout', '2022-05-12 22:58:26'),
(519, 2, 'Kamaluddin Kazuma', 'Admin', 'Login-Melakukan Login', '2022-05-12 22:58:33'),
(520, 2, 'Kamaluddin Kazuma', 'Admin', 'Melakukan Logout', '2022-05-12 23:03:07'),
(521, 6, 'Miranda Hatsune', 'Kasir', 'Login-Melakukan Login', '2022-05-12 23:03:11'),
(522, 6, 'Miranda Hatsune', 'Kasir', 'Melakukan Logout', '2022-05-12 23:03:16'),
(523, 1, 'Muhammad Hikigaya', 'Manajer', 'Login-Melakukan Login', '2022-05-12 23:03:19'),
(524, 1, 'Muhammad Hikigaya', 'Manajer', 'Login-Melakukan Login', '2022-05-12 23:06:12'),
(525, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Menambah pegawai Tumbal', '2022-05-12 23:18:34'),
(526, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Menghapus pegawai Tumbal', '2022-05-12 23:18:41'),
(527, 1, 'Muhammad Hikigaya', 'Manajer', 'Melakukan Logout', '2022-05-12 23:27:56'),
(528, 1, 'Muhammad Hikigaya', 'Manajer', 'Melakukan Logout', '2022-05-13 00:04:58'),
(529, 2, 'Kamaluddin Kazuma', 'Admin', 'Login-Melakukan Login', '2022-05-13 00:05:02'),
(530, 2, 'Kamaluddin Kazuma', 'Admin', 'Melakukan Logout', '2022-05-13 00:05:04'),
(531, 2, 'Kamaluddin Kazuma', 'Admin', 'Login-Melakukan Login', '2022-05-13 00:09:26'),
(532, 2, 'Kamaluddin Kazuma', 'Admin', 'Kamaluddin Kazuma - Menambah username tumbal', '2022-05-13 00:41:40'),
(533, 2, 'Kamaluddin Kazuma', 'Admin', 'Kamaluddin Kazuma - Mengubah informasi username tumbal', '2022-05-13 00:42:15'),
(534, 2, 'Kamaluddin Kazuma', 'Admin', 'Kamaluddin Kazuma - Menghapus username tumbal', '2022-05-13 00:42:23'),
(535, 2, 'Kamaluddin Kazuma', 'Admin', 'Melakukan Logout', '2022-05-13 00:42:29'),
(536, 1, 'Muhammad Hikigaya', 'Manajer', 'Login-Melakukan Login', '2022-05-13 00:42:32'),
(537, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Menambah pegawai fef', '2022-05-13 00:42:45'),
(538, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Mengubah informasi pegawai fe', '2022-05-13 00:42:55'),
(539, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Menghapus pegawai fe', '2022-05-13 00:42:59'),
(540, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Menambah menu sfgvd', '2022-05-13 00:43:08'),
(541, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Mengubah menu sfgv', '2022-05-13 00:43:23'),
(542, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Menghapus menu sfgv', '2022-05-13 00:43:26'),
(543, 1, 'Muhammad Hikigaya', 'Manajer', 'Melakukan Logout', '2022-05-13 00:49:20'),
(544, 2, 'Kamaluddin Kazuma', 'Admin', 'Login-Melakukan Login', '2022-05-13 00:55:52'),
(545, 2, 'Kamaluddin Kazuma', 'Admin', 'Melakukan Logout', '2022-05-13 00:55:55'),
(546, 2, 'Kamaluddin Kazuma', 'Admin', 'Login-Melakukan Login', '2022-05-13 00:58:00'),
(547, 2, 'Kamaluddin Kazuma', 'Admin', 'Melakukan Logout', '2022-05-13 00:58:02'),
(548, 2, 'Kamaluddin Kazuma', 'Admin', 'Login-Melakukan Login', '2022-05-13 00:59:05'),
(549, 2, 'Kamaluddin Kazuma', 'Admin', 'Melakukan Logout', '2022-05-13 00:59:07'),
(550, 2, 'Kamaluddin Kazuma', 'Admin', 'Login-Melakukan Login', '2022-05-13 01:12:03'),
(551, 2, 'Kamaluddin Kazuma', 'Admin', 'Kamaluddin Kazuma - Menambah username tes', '2022-05-13 01:14:34'),
(552, 2, 'Kamaluddin Kazuma', 'Admin', 'Kamaluddin Kazuma - Mengubah informasi username te', '2022-05-13 01:14:40'),
(553, 2, 'Kamaluddin Kazuma', 'Admin', 'Kamaluddin Kazuma - Menghapus username te', '2022-05-13 01:14:45'),
(554, 1, 'Muhammad Hikigaya', 'Manajer', 'Muhammad Hikigaya - Mengubah informasi pegawai Suryadi Watanabe', '2022-05-16 13:14:51'),
(555, 1, 'Muhammad Hikigaya', 'Manajer', 'Melakukan Logout', '2022-05-16 13:15:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id_login` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_login`
--

INSERT INTO `tbl_login` (`id_login`, `id_pegawai`, `username`, `password`) VALUES
(1, 1, 'manajer', 'manajer'),
(2, 2, 'admin', 'admin'),
(3, 3, 'aditya', 'aditya'),
(5, 6, 'kasir', 'kasir'),
(6, 7, 'markus', 'markus'),
(9, 8, 'itsuki', 'itsuki'),
(12, 10, 'suryadi', 'suryadi'),
(17, 12, 'mustafa', 'mustafa'),
(18, 13, 'emilia', 'emilia'),
(19, 14, 'eka', 'eka');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(150) NOT NULL,
  `jenis_menu` enum('Makanan','Minuman','Paket 1','Paket 2','Paket 3') NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `nama_menu`, `jenis_menu`, `harga`) VALUES
(6, 'Ayam Bakar', 'Makanan', 30000),
(8, 'Sosis Telur', 'Makanan', 1000),
(9, 'Teh Botol', 'Minuman', 7000),
(11, 'Seblak Super Pedas Lv 1 Juta', 'Makanan', 20000),
(12, 'Jus Jeruk', 'Minuman', 10000),
(13, 'Air Lemon', 'Minuman', 10000),
(14, 'Es Buah', 'Minuman', 15000),
(15, 'Ayam Bakar + Jus Jeruk', 'Paket 1', 38000),
(16, 'Yakiniku Sapi', 'Makanan', 40000),
(17, 'Nasi Goreng Spesial', 'Makanan', 10000),
(18, 'Nasi Goreng Spesial + 4 x Sosis Telur + Jus Jeruk', 'Paket 2', 22000),
(19, 'Ice Orange Milk Juicy', 'Minuman', 10000),
(20, 'Yakiniku + Ramen', 'Paket 1', 20000),
(22, 'Bakso Spesial Daging Wagyu Kyoto', 'Makanan', 70000),
(23, 'Takoyaki + Yakiniku + Lemon Ice', 'Paket 2', 80000),
(24, 'Lemon Ice', 'Minuman', 10000),
(25, 'Takoyaki', 'Makanan', 40000),
(26, 'Faiyaru Ramen', 'Makanan', 25000),
(27, 'Ushi Ramen', 'Makanan', 25000),
(28, 'Negi Ramen', 'Makanan', 23000),
(29, 'Naruto Ramen', 'Makanan', 23000),
(30, 'Niwatori Ramen', 'Makanan', 22000),
(31, 'Spesiaru Ramen', 'Makanan', 28000),
(32, 'Spesiaru Ramen + Yakiniku', 'Paket 1', 38000),
(33, 'Tamago Ramen', 'Makanan', 22000),
(34, 'Ice Coffee', 'Minuman', 15000),
(35, 'Arabica Coffee', 'Minuman', 30000),
(36, 'Japanese Ice Tea', 'Minuman', 20000),
(37, 'Sawi dan Nanas Juice Blend', 'Minuman', 10000),
(38, 'Cafushino Numiru Uno', 'Minuman', 30000),
(39, 'Arufukado Juice Icu', 'Minuman', 18000),
(40, 'Jigoku Ramen', 'Makanan', 28000),
(41, 'Paket Makan Brutal', 'Paket 3', 700000),
(42, 'Paket Minum Brutal', 'Paket 3', 700000),
(43, 'Paket Makan + Minum Brutal', 'Paket 3', 1300000),
(44, 'Paket Makanan Pedas Brutal', 'Paket 3', 500000),
(45, 'Paket Ramen Brutal', 'Paket 3', 400000),
(48, 'Nasi Padang', 'Makanan', 10000),
(50, 'Yakisoba', 'Makanan', 20000),
(51, 'Furaido Raisu', 'Makanan', 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(100) NOT NULL,
  `jabatan` enum('Kasir','Manajer','Admin') NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`id_pegawai`, `nama_pegawai`, `jenis_kelamin`, `alamat`, `telp`, `jabatan`, `photo`) VALUES
(1, 'Muhammad Hikigaya', 'Laki-laki', 'Jl. Medan Madani', '0889 9888 8789', 'Manajer', '11052022063102272885303_103520702246241_8356699649333848959_n.jpg'),
(2, 'Kamaluddin Kazuma', 'Laki-laki', 'Jl. Melati Belok Kanan Kiri', '08888 7788 7766', 'Admin', '11052022054749279501466_690401248704304_1365010250088579675_n.jpg'),
(3, 'Aditya Takahashi', 'Laki-laki', 'Jl. Meja Patah', '0889 9888 8988', 'Admin', '120520220359110000446337.jpg'),
(6, 'Miranda Hatsune', 'Perempuan', 'Jl. Rawan', '0898 8767 4467', 'Kasir', '1105202206000322032022024856kindpng_4386270.png'),
(7, 'Markus Takahisa', 'Laki-laki', 'Jl. Banyak Sekali Duit', '0899 9887 7876', 'Kasir', '11052022064611maxresdefault.jpg'),
(8, 'Kiki Nakano', 'Perempuan', 'Jl. Lima Bagian', '0898 8767 6544', 'Manajer', '1105202207591055d1bbb94a4182570b4540d8b634afe3.jpg'),
(10, 'Suryadi Watanabe', 'Laki-laki', 'Jl. Kaktus no 9', '0898 8787 8986', 'Kasir', '16052022045816Hachiman_S3E1_cropped.jpg'),
(12, 'Mustafa Hinawa', 'Laki-laki', 'Jl. Jalan jalan kesana kemari', '0867 8787 6456', 'Kasir', '12052022041227hqdefault (2).jpg'),
(13, 'Emilia Rie', 'Perempuan', 'Jl. Nippon Isekai no 24', '0823 2777 9876', 'Manajer', '1205202204590224032022010045ddyqpy0-85a4f16d-6fea-4d89-b441-ff469d7ecfe8.png'),
(14, 'Eka Akasaka', 'Laki-laki', 'Jl. Sana sini', '0898 7678 6546', 'Kasir', '12052022142310knalpot.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `no_transaksi` varchar(100) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `total_transaksi` int(11) NOT NULL,
  `no_meja` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `tgl_transaksi`, `no_transaksi`, `id_pegawai`, `total_transaksi`, `no_meja`, `total_bayar`) VALUES
(133, '2022-05-11', '20220511000000133', 6, 60000, 2, 100000),
(134, '2022-05-12', '20220512000000134', 6, 54000, 1, 60000),
(135, '2022-05-12', '20220512000000135', 6, 80000, 2, 100000),
(136, '2022-05-12', '20220512000000136', 10, 172000, 3, 200000),
(137, '2022-05-12', '20220512000000137', 10, 132000, 4, 200000),
(138, '2022-05-12', '20220512000000138', 12, 284000, 2, 400000),
(139, '2022-05-12', '20220512000000139', 12, 30000, 1, 40000),
(140, '2022-05-12', '20220512000000140', 12, 900000, 8, 900000),
(141, '2022-05-12', '20220512000000141', 12, 122000, 2, 150000),
(142, '2022-05-12', '20220512000000142', 12, 70000, 2, 80000),
(143, '2022-05-12', '20220512000000143', 6, 100000, 1, 100000),
(144, '2022-05-12', '20220512000000144', 6, 1128000, 5, 1200000),
(145, '2022-05-12', '20220512000000145', 10, 120000, 2, 150000),
(146, '2022-05-12', '20220512000000146', 10, 129000, 6, 130000),
(147, '2022-05-12', '20220512000000147', 7, 196000, 1, 200000),
(148, '2022-05-12', '20220512000000148', 7, 693000, 11, 700000),
(149, '2022-05-12', '20220512000000149', 7, 80000, 1, 100000),
(150, '2022-05-12', '20220512000000150', 7, 176000, 4, 200000),
(151, '2022-05-12', '20220512000000151', 7, 240000, 5, 250000),
(152, '2022-05-12', '20220512000000152', 7, 88000, 8, 100000),
(153, '2022-05-12', '20220512000000153', 7, 160000, 3, 200000),
(154, '2022-05-12', '20220512000000154', 7, 408000, 6, 500000),
(155, '2022-05-12', '20220512000000155', 7, 104000, 3, 105000),
(156, '2022-05-12', '20220512000000156', 7, 266000, 1, 300000),
(157, '2022-05-12', '20220512000000157', 6, 1320000, 8, 1400000),
(158, '2022-05-12', '20220512000000158', 6, 160000, 1, 170000),
(159, '2022-05-12', '20220512000000159', 6, 176000, 3, 200000),
(160, '2022-05-12', '20220512000000160', 6, 1600000, 8, 2000000),
(161, '2022-05-12', '20220512000000161', 10, 800000, 10, 1000000),
(162, '2022-05-12', '20220512000000162', 10, 110000, 7, 200000),
(163, '2022-05-12', '20220512000000163', 6, 1300000, 11, 1300000),
(164, '2022-05-12', '20220512000000164', 6, 66000, 7, 100000),
(165, '2022-05-12', '20220512000000165', 14, 66000, 1, 70000),
(166, '2022-05-12', '20220512000000166', 14, 868000, 10, 1000000),
(167, '2022-05-12', '20220512000000167', 10, 626000, 8, 1000000),
(168, '2022-05-12', '20220512000000168', 10, 80000, 2, 100000),
(169, '2022-05-12', '20220512000000169', 14, 64000, 3, 100000),
(170, '2022-05-12', '20220512000000170', 14, 80000, 1, 100000),
(171, '2022-05-12', '20220512000000171', 14, 70000, 4, 80000),
(172, '2022-05-12', '20220512000000172', 14, 120000, 1, 140000),
(173, '2022-05-12', '20220512000000173', 14, 44000, 2, 50000),
(174, '2022-05-12', '20220512000000174', 14, 44000, 4, 50000),
(175, '2022-05-12', '20220512000000175', 14, 116000, 1, 150000),
(176, '2022-05-12', '20220512000000176', 14, 74000, 3, 80000),
(177, '2022-05-12', '20220512000000177', 14, 152000, 7, 160000),
(178, '2022-05-12', '20220512000000178', 14, 152000, 6, 160000),
(179, '2022-05-12', '20220512000000179', 14, 1300000, 13, 1300000),
(180, '2022-05-12', '20220512000000180', 14, 60000, 1, 80000),
(181, '2022-05-12', '20220512000000181', 14, 550000, 8, 600000),
(182, '2022-05-12', '20220512000000182', 14, 99000, 2, 100000),
(183, '2022-05-12', '20220512000000183', 14, 90000, 4, 100000),
(184, '2022-05-12', '20220512000000184', 14, 210000, 5, 300000),
(185, '2022-05-12', '20220512000000185', 14, 64000, 1, 70000),
(186, '2022-05-12', '20220512000000186', 14, 80000, 4, 100000),
(187, '2022-05-12', '20220512000000187', 14, 160000, 2, 170000),
(188, '2022-05-12', '20220512000000188', 14, 44000, 1, 50000),
(189, '2022-05-12', '20220512000000189', 14, 104000, 1, 105000),
(190, '2022-05-12', '20220512000000190', 14, 580000, 10, 600000),
(191, '2022-05-12', '20220512000000191', 14, 66000, 4, 70000),
(192, '2022-05-12', '20220512000000192', 14, 850000, 13, 900000),
(193, '2022-05-12', '20220512000000193', 14, 240000, 4, 250000),
(194, '2022-05-12', '20220512000000194', 14, 1300000, 15, 1400000),
(195, '2022-05-12', '20220512000000195', 14, 192000, 4, 200000),
(196, '2022-05-12', '20220512000000196', 10, 80000, 2, 100000),
(197, '2022-05-12', '20220512000000197', 10, 40000, 1, 50000),
(198, '2022-05-12', '20220512000000198', 10, 44000, 4, 50000),
(199, '2022-05-12', '20220512000000199', 10, 44000, 3, 50000),
(200, '2022-05-12', '20220512000000200', 10, 44000, 2, 50000),
(201, '2022-05-12', '20220512000000201', 6, 1300000, 12, 1300000),
(202, '2022-05-12', '20220512000000202', 6, 680000, 6, 700000),
(203, '2022-05-12', '20220512000000203', 6, 44000, 1, 50000),
(204, '2022-05-12', '20220512000000204', 6, 900000, 10, 1000000),
(205, '2022-05-12', '20220512000000205', 6, 320000, 4, 400000),
(206, '2022-05-12', '20220512000000206', 6, 192000, 5, 200000),
(207, '2022-05-12', '20220512000000207', 6, 88000, 7, 90000),
(208, '2022-05-12', '20220512000000208', 6, 44000, 1, 50000),
(211, '2022-05-13', '20220513000000211', 10, 460000, 8, 500000),
(216, '2022-05-13', '20220513000000216', 6, 1300000, 10, 1300000),
(227, '2022-05-13', '20220513000000227', 6, 22000, 3, 0),
(246, '2022-05-13', '20220513000000246', 6, 170000, 5, 200000),
(255, '2022-05-13', '20220513000000255', 6, 60000, 3, 70000),
(273, '2022-05-13', '20220513000000273', 6, 22000, 2, 25000),
(277, '2022-05-14', '20220514000000277', 6, 300000, 10, 450000),
(278, '2022-05-14', '20220514000000278', 6, 230000, 9, 450000),
(279, '2022-05-14', '20220514000000279', 6, 532000, 12, 550000),
(280, '2022-05-14', '20220514000000280', 10, 220000, 5, 250000),
(281, '2022-05-14', '20220514000000281', 14, 76000, 5, 76000),
(283, '2022-05-14', '20220514000000283', 14, 1015000, 9, 1100000),
(284, '2022-05-14', '20220514000000284', 12, 76000, 1, 80000),
(287, '2022-05-14', '20220514000000287', 6, 80000, 10, 100000),
(289, '2022-05-14', '20220514000000289', 6, 100000, 2, 100000),
(290, '2022-05-14', '20220514000000290', 6, 1300000, 1, 1400000),
(291, '2022-05-14', '20220514000000291', 6, 30000, 1, 30000),
(292, '2022-05-16', '20220516000000292', 6, 43000, 1, 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi_detail`
--

CREATE TABLE `tbl_transaksi_detail` (
  `id_detail` int(11) NOT NULL,
  `no_transaksi` varchar(100) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_transaksi_detail`
--

INSERT INTO `tbl_transaksi_detail` (`id_detail`, `no_transaksi`, `id_menu`, `qty`, `harga`) VALUES
(178, '20220511000000133', 6, 2, 30000),
(179, '20220512000000134', 20, 2, 20000),
(180, '20220512000000134', 9, 2, 7000),
(181, '20220512000000135', 11, 2, 20000),
(182, '20220512000000135', 19, 2, 10000),
(183, '20220512000000135', 17, 2, 10000),
(184, '20220512000000136', 15, 4, 38000),
(185, '20220512000000136', 8, 10, 1000),
(186, '20220512000000136', 13, 1, 10000),
(187, '20220512000000137', 18, 6, 22000),
(188, '20220512000000138', 18, 2, 22000),
(189, '20220512000000138', 11, 2, 20000),
(190, '20220512000000138', 20, 2, 20000),
(191, '20220512000000138', 16, 2, 40000),
(192, '20220512000000138', 19, 2, 10000),
(193, '20220512000000138', 6, 2, 30000),
(194, '20220512000000139', 11, 1, 20000),
(195, '20220512000000139', 12, 1, 10000),
(196, '20220512000000140', 15, 10, 38000),
(197, '20220512000000140', 18, 10, 22000),
(198, '20220512000000140', 20, 10, 20000),
(199, '20220512000000140', 13, 10, 10000),
(200, '20220512000000141', 18, 2, 22000),
(201, '20220512000000141', 18, 2, 22000),
(202, '20220512000000141', 13, 2, 10000),
(203, '20220512000000141', 9, 2, 7000),
(204, '20220512000000142', 11, 2, 20000),
(205, '20220512000000142', 14, 2, 15000),
(206, '20220512000000143', 16, 2, 40000),
(207, '20220512000000143', 13, 2, 10000),
(208, '20220512000000144', 23, 6, 80000),
(209, '20220512000000144', 32, 6, 38000),
(210, '20220512000000144', 22, 6, 70000),
(211, '20220512000000145', 16, 1, 40000),
(212, '20220512000000145', 20, 1, 20000),
(213, '20220512000000145', 35, 2, 30000),
(214, '20220512000000146', 36, 3, 20000),
(215, '20220512000000146', 28, 3, 23000),
(216, '20220512000000147', 39, 2, 18000),
(217, '20220512000000147', 23, 2, 80000),
(218, '20220512000000148', 29, 6, 23000),
(219, '20220512000000148', 38, 6, 30000),
(220, '20220512000000148', 25, 6, 40000),
(221, '20220512000000148', 20, 3, 20000),
(222, '20220512000000148', 26, 3, 25000),
(223, '20220512000000149', 13, 2, 10000),
(224, '20220512000000149', 6, 2, 30000),
(225, '20220512000000150', 15, 2, 38000),
(226, '20220512000000150', 11, 2, 20000),
(227, '20220512000000150', 20, 2, 20000),
(228, '20220512000000150', 13, 2, 10000),
(229, '20220512000000151', 23, 3, 80000),
(230, '20220512000000152', 18, 4, 22000),
(231, '20220512000000153', 22, 2, 70000),
(232, '20220512000000153', 37, 2, 10000),
(233, '20220512000000154', 23, 4, 80000),
(234, '20220512000000154', 33, 4, 22000),
(235, '20220512000000155', 18, 2, 22000),
(236, '20220512000000155', 35, 2, 30000),
(237, '20220512000000156', 23, 2, 80000),
(238, '20220512000000156', 31, 2, 28000),
(239, '20220512000000156', 26, 2, 25000),
(240, '20220512000000157', 23, 10, 80000),
(241, '20220512000000157', 18, 10, 22000),
(242, '20220512000000157', 38, 10, 30000),
(243, '20220512000000158', 23, 2, 80000),
(244, '20220512000000159', 22, 2, 70000),
(245, '20220512000000159', 39, 2, 18000),
(246, '20220512000000160', 23, 20, 80000),
(247, '20220512000000161', 41, 1, 700000),
(248, '20220512000000161', 13, 10, 10000),
(249, '20220512000000162', 18, 5, 22000),
(250, '20220512000000163', 43, 1, 1300000),
(251, '20220512000000164', 18, 3, 22000),
(252, '20220512000000165', 29, 2, 23000),
(253, '20220512000000165', 13, 2, 10000),
(254, '20220512000000166', 41, 1, 700000),
(255, '20220512000000166', 35, 3, 30000),
(256, '20220512000000166', 39, 1, 18000),
(257, '20220512000000166', 38, 2, 30000),
(258, '20220512000000167', 44, 1, 500000),
(259, '20220512000000167', 39, 7, 18000),
(260, '20220512000000168', 38, 2, 30000),
(261, '20220512000000168', 17, 2, 10000),
(262, '20220512000000169', 18, 2, 22000),
(263, '20220512000000169', 37, 2, 10000),
(264, '20220512000000170', 39, 2, 18000),
(265, '20220512000000170', 33, 2, 22000),
(266, '20220512000000171', 27, 2, 25000),
(267, '20220512000000171', 37, 2, 10000),
(268, '20220512000000172', 6, 2, 30000),
(269, '20220512000000172', 38, 2, 30000),
(270, '20220512000000173', 18, 2, 22000),
(271, '20220512000000174', 18, 2, 22000),
(272, '20220512000000175', 40, 2, 28000),
(273, '20220512000000175', 35, 2, 30000),
(274, '20220512000000176', 34, 2, 15000),
(275, '20220512000000176', 18, 2, 22000),
(276, '20220512000000177', 15, 4, 38000),
(277, '20220512000000178', 37, 4, 10000),
(278, '20220512000000178', 40, 4, 28000),
(279, '20220512000000179', 43, 1, 1300000),
(280, '20220512000000180', 28, 2, 23000),
(281, '20220512000000180', 9, 2, 7000),
(282, '20220512000000181', 44, 1, 500000),
(283, '20220512000000181', 37, 5, 10000),
(284, '20220512000000182', 37, 3, 10000),
(285, '20220512000000182', 29, 3, 23000),
(286, '20220512000000183', 11, 3, 20000),
(287, '20220512000000183', 13, 3, 10000),
(288, '20220512000000184', 35, 3, 30000),
(289, '20220512000000184', 25, 3, 40000),
(290, '20220512000000185', 30, 2, 22000),
(291, '20220512000000185', 13, 2, 10000),
(292, '20220512000000186', 33, 2, 22000),
(293, '20220512000000186', 39, 2, 18000),
(294, '20220512000000187', 23, 2, 80000),
(295, '20220512000000188', 18, 2, 22000),
(296, '20220512000000189', 38, 2, 30000),
(297, '20220512000000189', 30, 2, 22000),
(298, '20220512000000190', 44, 1, 500000),
(299, '20220512000000190', 13, 8, 10000),
(300, '20220512000000191', 18, 3, 22000),
(301, '20220512000000192', 41, 1, 700000),
(302, '20220512000000192', 35, 5, 30000),
(303, '20220512000000193', 22, 3, 70000),
(304, '20220512000000193', 13, 3, 10000),
(305, '20220512000000194', 43, 1, 1300000),
(306, '20220512000000195', 32, 4, 38000),
(307, '20220512000000195', 13, 4, 10000),
(308, '20220512000000196', 38, 2, 30000),
(309, '20220512000000196', 37, 2, 10000),
(310, '20220512000000197', 37, 2, 10000),
(311, '20220512000000197', 12, 2, 10000),
(312, '20220512000000198', 18, 2, 22000),
(313, '20220512000000199', 18, 2, 22000),
(314, '20220512000000200', 18, 2, 22000),
(315, '20220512000000201', 43, 1, 1300000),
(316, '20220512000000202', 44, 1, 500000),
(317, '20220512000000202', 35, 6, 30000),
(318, '20220512000000203', 18, 2, 22000),
(319, '20220512000000204', 41, 1, 700000),
(320, '20220512000000204', 36, 10, 20000),
(321, '20220512000000205', 23, 4, 80000),
(322, '20220512000000206', 32, 4, 38000),
(323, '20220512000000206', 13, 4, 10000),
(324, '20220512000000207', 18, 4, 22000),
(325, '20220512000000208', 18, 2, 22000),
(328, '20220513000000211', 45, 1, 400000),
(330, '20220513000000211', 37, 6, 10000),
(336, '20220513000000216', 43, 1, 1300000),
(347, '20220513000000227', 18, 1, 22000),
(366, '20220513000000246', 15, 1, 38000),
(367, '20220513000000246', 9, 1, 7000),
(368, '20220513000000246', 22, 1, 70000),
(369, '20220513000000246', 13, 1, 10000),
(370, '20220513000000246', 27, 1, 25000),
(371, '20220513000000246', 36, 1, 20000),
(380, '20220513000000255', 6, 1, 30000),
(381, '20220513000000255', 35, 1, 30000),
(399, '20220513000000273', 18, 1, 22000),
(403, '20220514000000277', 22, 2, 70000),
(404, '20220514000000277', 23, 2, 80000),
(407, '20220514000000278', 22, 1, 70000),
(409, '20220514000000278', 23, 2, 80000),
(414, '20220514000000279', 22, 2, 70000),
(415, '20220514000000279', 36, 2, 20000),
(416, '20220514000000279', 23, 2, 80000),
(417, '20220514000000279', 40, 2, 28000),
(418, '20220514000000279', 35, 2, 30000),
(419, '20220514000000279', 20, 2, 20000),
(420, '20220514000000279', 39, 2, 18000),
(421, '20220514000000280', 23, 2, 80000),
(422, '20220514000000280', 38, 2, 30000),
(423, '20220514000000281', 15, 2, 38000),
(427, '20220514000000283', 41, 1, 700000),
(428, '20220514000000283', 36, 3, 20000),
(429, '20220514000000283', 19, 3, 10000),
(430, '20220514000000283', 35, 3, 30000),
(431, '20220514000000283', 38, 3, 30000),
(432, '20220514000000283', 14, 3, 15000),
(433, '20220514000000284', 15, 2, 38000),
(436, '20220514000000287', 50, 2, 20000),
(437, '20220514000000287', 36, 2, 20000),
(439, '20220514000000289', 35, 1, 30000),
(440, '20220514000000289', 22, 1, 70000),
(441, '20220514000000290', 43, 1, 1300000),
(442, '20220514000000291', 35, 1, 30000),
(443, '20220516000000292', 39, 1, 18000),
(445, '20220516000000292', 27, 1, 25000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indeks untuk tabel `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id_login`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `tbl_transaksi_detail`
--
ALTER TABLE `tbl_transaksi_detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_log`
--
ALTER TABLE `tbl_log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=556;

--
-- AUTO_INCREMENT untuk tabel `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=293;

--
-- AUTO_INCREMENT untuk tabel `tbl_transaksi_detail`
--
ALTER TABLE `tbl_transaksi_detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=446;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
