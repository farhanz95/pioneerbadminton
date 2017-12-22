-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 20, 2017 at 02:06 PM
-- Server version: 10.1.24-MariaDB-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farhanra_pioneerbadminton`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Admin', 1, 1509593072);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) CHARACTER SET utf8mb4 DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/*', 2, NULL, NULL, NULL, 1466400010, 1466400010),
('/booking/*', 2, NULL, NULL, NULL, 1466400010, 1466400010),
('Admin', 1, NULL, NULL, NULL, 1466399301, 1466399301);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('Admin', '/*'),
('Admin', '/booking/*');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `nama` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `booking_code` varchar(255) DEFAULT NULL,
  `booking_name` varchar(255) DEFAULT '' COMMENT 'Name Of Booking e.g : Badminton Race Friday Night',
  `booking_status` int(11) DEFAULT NULL COMMENT 'not confirmed =2 / confirmed = 2 / paid = 3',
  `booking_type` varchar(255) DEFAULT NULL COMMENT 'single / multiple',
  `booking_date` date DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `booking_activeness` tinyint(1) DEFAULT NULL COMMENT 'Active / Not Active',
  `court_id` int(11) DEFAULT NULL,
  `booking_parent_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `submitted_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `booking_code`, `booking_name`, `booking_status`, `booking_type`, `booking_date`, `start_time`, `end_time`, `ip_address`, `booking_activeness`, `court_id`, `booking_parent_id`, `user_id`, `submitted_date`) VALUES
(62, 'B-1-62', 'Brennan Hayden', 3, NULL, NULL, '2017-12-20 00:00:00', '2017-12-21 23:00:00', '::1', NULL, 3, NULL, 1, '2017-12-18 15:59:52'),
(63, 'B-2-63', 'Ima Morris', 3, NULL, NULL, '2017-12-16 00:00:00', '2017-12-22 23:00:00', '::1', NULL, 1, NULL, 1, '2017-12-18 16:04:32'),
(64, 'B-2-64', 'Jamalia Vaughn', 2, NULL, NULL, '2017-12-19 00:00:00', '2017-12-19 23:00:00', '::1', NULL, 2, NULL, 1, '2017-12-18 16:04:39'),
(65, 'B-1-65', 'Ryan Cunningham', 3, NULL, NULL, '2017-12-19 00:00:00', '2017-12-20 23:00:00', '::1', NULL, 1, NULL, 1, '2017-12-18 16:04:47'),
(66, 'B-1-66', 'Rina Blankenship', 3, NULL, NULL, '2017-12-20 00:00:00', '2017-12-20 23:00:00', '::1', NULL, 1, NULL, 1, '2017-12-18 16:04:54'),
(67, 'B-2-67', 'Aiko Wong', 2, NULL, NULL, '2017-12-19 00:00:00', '2017-12-19 23:00:00', '::1', NULL, 2, NULL, 1, '2017-12-18 16:05:01'),
(68, 'B-1-68', 'Brendan Schmidt', 3, NULL, NULL, '2017-12-12 00:00:00', '2017-12-15 23:00:00', '::1', NULL, 1, NULL, 1, '2017-12-18 17:11:46'),
(69, 'B-1-69', 'Lacota Gordon', 2, NULL, NULL, '2017-07-04 00:00:00', '2017-08-24 12:00:00', '::1', NULL, 1, NULL, 1, '2017-12-18 17:49:36'),
(70, 'B-1-70', 'Leonard Kirkland', 2, NULL, NULL, '2017-12-13 10:00:00', '2017-12-13 12:00:00', '::1', NULL, 1, NULL, 1, '2017-12-18 17:56:34'),
(71, 'B-3-71', 'fsdfsdffdf', 2, NULL, NULL, '2017-12-21 00:00:00', '2017-12-21 23:00:00', '::1', NULL, 3, NULL, 1, '2017-12-18 17:57:17'),
(73, 'B-4-73', 'Book 1', 1, NULL, NULL, '2017-12-12 00:00:00', '2017-12-15 23:00:00', '::1', NULL, 4, NULL, 2, '2017-12-18 18:21:46'),
(75, 'B-2-75', 'Rhoda Cantrell', 1, NULL, NULL, '2017-12-05 00:00:00', '2018-01-16 23:00:00', '::1', NULL, 2, NULL, NULL, '2017-12-18 18:29:59'),
(76, 'B-1-76', 'gdfgf', 1, NULL, NULL, '2017-12-05 00:00:00', '2017-12-06 23:00:00', '::1', NULL, 1, NULL, NULL, '2017-12-18 18:46:15'),
(77, 'B-1-77', 'vhjnj', 1, NULL, NULL, '2017-12-05 00:00:00', '2017-12-06 23:00:00', '115.132.125.21', NULL, 1, NULL, NULL, '2017-12-18 19:07:15'),
(78, 'B-2-78', 'Test 001', 1, NULL, NULL, '2017-12-13 17:00:00', '2017-12-13 18:00:00', '183.171.82.137', NULL, 2, NULL, NULL, '2017-12-19 06:17:06'),
(79, 'B-1-79', 'violet', 2, NULL, NULL, '2017-12-01 00:00:00', '2017-12-02 23:00:00', '183.171.91.168', NULL, 1, NULL, 4, '2017-12-20 05:20:19');

-- --------------------------------------------------------

--
-- Table structure for table `court`
--

CREATE TABLE `court` (
  `court_id` int(11) NOT NULL,
  `court_name` varchar(255) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `court`
--

INSERT INTO `court` (`court_id`, `court_name`, `location_id`) VALUES
(1, 'Court Ampang Putra', 2),
(2, 'Court Jati', 4),
(3, 'Court Bert Jennings', 4),
(4, 'Court Quentin Willis', 2);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(255) DEFAULT NULL,
  `daerah_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_name`, `daerah_id`) VALUES
(2, 'Felda 16', 913),
(4, 'Felda 17', 634);

-- --------------------------------------------------------

--
-- Table structure for table `master_daerah`
--

CREATE TABLE `master_daerah` (
  `daerah_id` int(11) UNSIGNED NOT NULL,
  `daerah_nama` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `negeri_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_daerah`
--

INSERT INTO `master_daerah` (`daerah_id`, `daerah_nama`, `negeri_id`) VALUES
(1, 'Kuala Lumpur', 14),
(2, 'Petaling Jaya', 7),
(3, 'Industrial Park,Shah Alam', 7),
(4, 'Bandar Utama, Petaling Jaya', 7),
(5, 'Subang Hitech Industrial Park, Shah Alam', 7),
(6, 'Temasya Industrial Park, Shah Alam', 7),
(7, '3 Persiaran Bandar Utama Petaling Jaya', 8),
(8, 'Ind. Park, Shah Alam', 7),
(9, 'Kuching', 11),
(10, 'Tuaran', 12),
(11, 'Kota Kinabalu', 12),
(12, 'Tawau', 12),
(13, 'Tambunan', 12),
(14, 'Kota Belud', 12),
(15, 'Sarikei', 11),
(16, 'Miri', 11),
(17, 'Sibu', 11),
(18, 'Sandakan', 12),
(19, 'Tenom', 12),
(20, 'Penampang', 12),
(21, 'Inanam', 12),
(22, 'Papar', 12),
(23, 'Kudat', 12),
(24, 'Ayer Itam', 10),
(25, 'Penang', 10),
(26, 'Kuala Penyu', 12),
(27, 'Johor Bahru', 1),
(28, 'Masai', 1),
(29, 'Muar', 1),
(30, 'Subang Jaya', 7),
(31, 'Shah Alam', 7),
(32, 'Bangsar', 7),
(33, 'Puchong', 7),
(34, 'Kelang', 7),
(35, 'Cheras', 7),
(36, 'Damansara', 7),
(37, 'Ampang Jaya', 7),
(38, 'Kajang', 7),
(39, 'Batu Caves', 7),
(40, 'Rawang', 7),
(41, 'Semenyih', 7),
(42, 'Bangi', 7),
(43, 'Kelana Jaya', 7),
(44, 'Seri Kembangan', 7),
(45, 'Alor Star', 2),
(46, 'Bandar Melaka', 5),
(47, 'Seremban', 6),
(48, 'Rasah', 6),
(49, 'Kuantan', 4),
(50, 'Ipoh', 8),
(51, 'Pasir Pinji', 8),
(52, 'Arau', 9),
(53, 'Kuala Perlis', 9),
(54, 'Kuala Terengganu', 13),
(55, 'Kota Bahru', 3),
(56, 'Pasir Putih', 3),
(57, 'Tanah Merah', 3),
(58, 'Bachok', 3),
(578, 'Batu Pahat', 1),
(579, 'Kluang', 1),
(580, 'Kulai', 1),
(581, 'Kota Tinggi', 1),
(582, 'Segamat', 1),
(583, 'Pontian', 1),
(584, 'Ayer Tawar 5', 1),
(585, 'Mersing', 1),
(586, 'Ayer Baloi', 1),
(587, 'Ayer Hitam', 1),
(588, 'Ayer Tawar 2', 1),
(589, 'Ayer Tawar 3', 1),
(590, 'Ayer Tawar 4', 1),
(591, 'Bandar Penawar', 1),
(592, 'Bandar Tenggara', 1),
(593, 'Batu Anam', 1),
(594, 'Bekok', 1),
(595, 'Benut', 1),
(596, 'Bukit Gambir', 1),
(597, 'Bukit Pasir', 1),
(598, 'Chaah', 1),
(599, 'Endau', 1),
(600, 'Gelang Patah', 1),
(601, 'Gerisek', 1),
(602, 'Gugusan Taib Andak', 1),
(603, 'Jementah', 1),
(604, 'Kahang', 1),
(605, 'Kukup', 1),
(606, 'Labis', 1),
(607, 'Layang-Layang', 1),
(608, 'Nusajaya', 1),
(609, 'Pagoh', 1),
(610, 'Paloh', 1),
(611, 'Panchor', 1),
(612, 'Parit Jawa', 1),
(613, 'Parit Raja', 1),
(614, 'Parit Sulong', 1),
(615, 'Pasir Gudang', 1),
(616, 'Pekan Nenas', 1),
(617, 'Pengerang', 1),
(618, 'Rengam', 1),
(619, 'Rengit', 1),
(620, 'Semerah', 1),
(621, 'Senai', 1),
(622, 'Senggarang', 1),
(623, 'Seri Gading', 1),
(624, 'Seri Medan', 1),
(625, 'Simpang Rengam', 1),
(626, 'Sungai Mati', 1),
(627, 'Tangkak', 1),
(628, 'Ulu Tiram', 1),
(629, 'Alor Setar', 2),
(630, 'Baling', 2),
(631, 'Bandar Baharu', 2),
(632, 'Bedong', 2),
(633, 'Bukit Kayu Hitam', 2),
(634, 'Changloon', 2),
(635, 'Gurun', 2),
(636, 'Jeniang', 2),
(637, 'Jitra', 2),
(638, 'Karangan', 2),
(639, 'Kepala Batas', 2),
(640, 'Kodiang', 2),
(641, 'Kota Kuala Muda', 2),
(642, 'Kota Sarang Semut', 2),
(643, 'Kuala Kedah', 2),
(644, 'Kuala Ketil', 2),
(645, 'Kuala Nerang', 2),
(646, 'Kuala Pegang', 2),
(647, 'Kulim', 2),
(648, 'Kupang', 2),
(649, 'Langgar', 2),
(650, 'Langkawi', 2),
(651, 'Lunas', 2),
(652, 'Merbok', 2),
(653, 'Padang Serai', 2),
(654, 'Pendang', 2),
(655, 'Pokok Sena', 2),
(656, 'Serdang', 2),
(657, 'Sik', 2),
(658, 'Simpang Empat', 2),
(659, 'Sungai Petani', 2),
(660, 'Universiti Utara Malaysia', 2),
(661, 'Yan', 2),
(662, 'Ayer Lanas', 3),
(663, 'Cherang Ruku', 3),
(664, 'Dabong', 3),
(665, 'Gua Musang', 3),
(666, 'Jeli', 3),
(667, 'Kem Desa Pahlawan', 3),
(668, 'Ketereh', 3),
(669, 'Kota Bharu', 3),
(670, 'Kuala Balah', 3),
(671, 'Kuala Krai', 3),
(672, 'Machang', 3),
(673, 'Melor', 3),
(674, 'Pasir Mas', 3),
(675, 'Pasir Puteh', 3),
(676, 'Pulai Chondong', 3),
(677, 'Rantau Panjang', 3),
(678, 'Selising', 3),
(679, 'Temangan', 3),
(680, 'Tumpat', 3),
(681, 'Wakaf Bharu', 3),
(682, 'Alor Gajah', 5),
(683, 'Asahan', 5),
(684, 'Ayer Keroh', 5),
(685, 'Bemban', 5),
(686, 'Durian Tunggal', 5),
(687, 'Jasin', 5),
(688, 'Kem Trendak', 5),
(689, 'Kuala Sungai Baru', 5),
(690, 'Lubok China', 5),
(691, 'Masjid Tanah', 5),
(692, 'Melaka', 5),
(693, 'Merlimau', 5),
(694, 'Selandar', 5),
(695, 'Sungai Rambai', 5),
(696, 'Sungai Udang', 5),
(697, 'Tanjong Kling', 5),
(698, 'Bahau', 6),
(699, 'Bandar Enstek', 6),
(700, 'Bandar Seri Jempol', 6),
(701, 'Batu Kikir', 6),
(702, 'Gemas', 6),
(703, 'Gemencheh', 6),
(704, 'Johol', 6),
(705, 'Kota', 6),
(706, 'Kuala Klawang', 6),
(707, 'Kuala Pilah', 6),
(708, 'Labu', 6),
(709, 'Linggi', 6),
(710, 'Mantin', 6),
(711, 'Nilai', 6),
(712, 'Port Dickson', 6),
(713, 'Pusat Bandar Palong', 6),
(714, 'Rantau', 6),
(715, 'Rembau', 6),
(716, 'Rompin', 6),
(717, 'Si Rusa', 6),
(718, 'Simpang Durian', 6),
(719, 'Simpang Pertang', 6),
(720, 'Tampin', 6),
(721, 'Tanjong Ipoh', 6),
(722, 'Balok', 4),
(723, 'Bandar Bera', 4),
(724, 'Bandar Pusat Jengka', 4),
(725, 'Bandar Tun Abdul Razak', 4),
(726, 'Benta', 4),
(727, 'Bentong', 4),
(728, 'Brinchang', 4),
(729, 'Bukit Fraser', 4),
(730, 'Bukit Goh', 4),
(731, 'Chenor', 4),
(732, 'Chini', 4),
(733, 'Damak', 4),
(734, 'Dong', 4),
(735, 'Gambang', 4),
(736, 'Genting Highlands', 4),
(737, 'Jerantut', 4),
(738, 'Karak', 4),
(739, 'Kemayan', 4),
(740, 'Kuala Krau', 4),
(741, 'Kuala Lipis', 4),
(742, 'Kuala Rompin', 4),
(743, 'Lanchang', 4),
(744, 'Lurah Bilut', 4),
(745, 'Maran', 4),
(746, 'Mentakab', 4),
(747, 'Muadzam Shah', 4),
(748, 'Padang Tengku', 4),
(749, 'Pekan', 4),
(750, 'Raub', 4),
(751, 'Ringlet', 4),
(752, 'Sega', 4),
(753, 'Sungai Koyan', 4),
(754, 'Sungai Lembing', 4),
(755, 'Tanah Rata', 4),
(756, 'Temerloh', 4),
(757, 'Triang', 4),
(758, 'Ayer Tawar', 8),
(759, 'Bagan Datoh', 8),
(760, 'Bagan Serai', 8),
(761, 'Bandar Seri Iskandar', 8),
(762, 'Batu Gajah', 8),
(763, 'Batu Kurau', 8),
(764, 'Behrang Stesen', 8),
(765, 'Bidor', 8),
(766, 'Bota', 8),
(767, 'Bruas', 8),
(768, 'Changkat Jering', 8),
(769, 'Changkat Keruing', 8),
(770, 'Chemor', 8),
(771, 'Chenderiang', 8),
(772, 'Chenderong Balai', 8),
(773, 'Chikus', 8),
(774, 'Enggor', 8),
(775, 'Gerik', 8),
(776, 'Gopeng', 8),
(777, 'Hutan Melintang', 8),
(778, 'Intan', 8),
(779, 'Jeram', 8),
(780, 'Kampar', 8),
(781, 'Kampung Gajah', 8),
(782, 'Kampung Kepayang', 8),
(783, 'Kamunting', 8),
(784, 'Kuala Kangsar', 8),
(785, 'Kuala Kurau', 8),
(786, 'Kuala Sepetang', 8),
(787, 'Lambor Kanan', 8),
(788, 'Langkap', 8),
(789, 'Lenggong', 8),
(790, 'Lumut', 8),
(791, 'Malim Nawar', 8),
(792, 'Manong', 8),
(793, 'Matang', 8),
(794, 'Padang Rengas', 8),
(795, 'Pangkor', 8),
(796, 'Pantai Remis', 8),
(797, 'Parit', 8),
(798, 'Parit Buntar', 8),
(799, 'Pengkalan Hulu', 8),
(800, 'Pusing', 8),
(801, 'Sauk', 8),
(802, 'Selama', 8),
(803, 'Selekoh', 8),
(804, 'Seri Manjong', 8),
(805, 'Simpang', 8),
(806, 'Simpang Ampat Semanggol', 8),
(807, 'Sitiawan', 8),
(808, 'Slim River', 8),
(809, 'Sungai Siput', 8),
(810, 'Sungai Sumun', 8),
(811, 'Sungkai', 8),
(812, 'Taiping', 8),
(813, 'Tanjong Malim', 8),
(814, 'Tanjong Piandang', 8),
(815, 'Tanjong Rambutan', 8),
(816, 'Tanjong Tualang', 8),
(817, 'Tapah', 8),
(818, 'Tapah Road', 8),
(819, 'Teluk Intan', 8),
(820, 'Temoh', 8),
(821, 'TLDM Lumut', 8),
(822, 'Trolak', 8),
(823, 'Trong', 8),
(824, 'Tronoh', 8),
(825, 'Ulu Bernam', 8),
(826, 'Ulu Kinta', 8),
(827, 'Kaki Bukit', 9),
(828, 'Kangar', 9),
(829, 'Padang Besar', 9),
(830, 'Simpang Ampat', 9),
(831, 'Balik Pulau', 10),
(832, 'Batu Ferringhi', 10),
(833, 'Batu Maung', 10),
(834, 'Bayan Lepas', 10),
(835, 'Bukit Mertajam', 10),
(836, 'Butterworth', 10),
(837, 'Gelugor', 10),
(838, 'Jelutong', 10),
(839, 'Kubang Semang', 10),
(840, 'Nibong Tebal', 10),
(841, 'Penaga', 10),
(842, 'Penang Hill', 10),
(843, 'Perai', 10),
(844, 'Permatang Pauh', 10),
(845, 'Pulau Pinang', 10),
(846, 'Sungai Jawi', 10),
(847, 'Tanjong Bungah', 10),
(848, 'Tasek Gelugor', 10),
(849, 'USM Pulau Pinang', 10),
(850, 'Beaufort', 12),
(851, 'Beluran', 12),
(852, 'Beverly', 12),
(853, 'Bongawan', 12),
(854, 'Keningau', 12),
(855, 'Kota Kinabatangan', 12),
(856, 'Kota Marudu', 12),
(857, 'Kunak', 12),
(858, 'Lahad Datu', 12),
(859, 'Likas', 12),
(860, 'Membakut', 12),
(861, 'Menumbok', 12),
(862, 'Nabawan', 12),
(863, 'Pamol', 12),
(864, 'Putatan', 12),
(865, 'Ranau', 12),
(866, 'Semporna', 12),
(867, 'Tamparuli', 12),
(868, 'Tanjung Aru', 12),
(869, 'Tenghilan', 12),
(870, 'Asajaya', 11),
(871, 'Balingian', 11),
(872, 'Baram', 11),
(873, 'Bau', 11),
(874, 'Bekenu', 11),
(875, 'Belaga', 11),
(876, 'Belawai', 11),
(877, 'Betong', 11),
(878, 'Bintangor', 11),
(879, 'Bintulu', 11),
(880, 'Dalat', 11),
(881, 'Daro', 11),
(882, 'Debak', 11),
(883, 'Engkilili', 11),
(884, 'Julau', 11),
(885, 'Kabong', 11),
(886, 'Kanowit', 11),
(887, 'Kapit', 11),
(888, 'Kota Samarahan', 11),
(889, 'Lawas', 11),
(890, 'Limbang', 11),
(891, 'Lingga', 11),
(892, 'Long Lama', 11),
(893, 'Lubok Antu', 11),
(894, 'Lundu', 11),
(895, 'Lutong', 11),
(896, 'Matu', 11),
(897, 'Mukah', 11),
(898, 'Nanga Medamit', 11),
(899, 'Niah', 11),
(900, 'Pusa', 11),
(901, 'Roban', 11),
(902, 'Saratok', 11),
(903, 'Sebauh', 11),
(904, 'Sebuyau', 11),
(905, 'Serian', 11),
(906, 'Siburan', 11),
(907, 'Simunjan', 11),
(908, 'Song', 11),
(909, 'Spaoh', 11),
(910, 'Sri Aman', 11),
(911, 'Sundar', 11),
(912, 'Tatau', 11),
(913, 'Ampang', 7),
(914, 'Bandar Baru Bangi', 7),
(915, 'Bandar Puncak Alam', 7),
(916, 'Banting', 7),
(917, 'Batang Berjuntai', 7),
(918, 'Batang Kali', 7),
(919, 'Batu Arang', 7),
(920, 'Beranang', 7),
(921, 'Bukit Rotan', 7),
(922, 'Cyberjaya', 7),
(923, 'Dengkil', 7),
(924, 'Hulu Langat', 7),
(925, 'Jenjarom', 7),
(926, 'Kapar', 7),
(927, 'Kerling', 7),
(928, 'Klang', 7),
(929, 'KLIA', 7),
(930, 'Kuala Kubu Baru', 7),
(931, 'Kuala Selangor', 7),
(932, 'Pelabuhan Klang', 7),
(933, 'Pulau Carey', 7),
(934, 'Pulau Indah', 7),
(935, 'Pulau Ketam', 7),
(936, 'Rasa', 7),
(937, 'Sabak Bernam', 7),
(938, 'Sekinchan', 7),
(939, 'Sepang', 7),
(940, 'Serendah', 7),
(941, 'Sungai Ayer Tawar', 7),
(942, 'Sungai Besar', 7),
(943, 'Sungai Buloh', 7),
(944, 'Sungai Pelek', 7),
(945, 'Tanjong Karang', 7),
(946, 'Tanjong Sepat', 7),
(947, 'Telok Panglima Garang', 7),
(948, 'Ajil', 13),
(949, 'Al Muktatfi Billah Shah', 13),
(950, 'Ayer Puteh', 13),
(951, 'Bukit Besi', 13),
(952, 'Bukit Payong', 13),
(953, 'Ceneh', 13),
(954, 'Chalok', 13),
(955, 'Cukai', 13),
(956, 'Dungun', 13),
(957, 'Jerteh', 13),
(958, 'Kampung Raja', 13),
(959, 'Kemasek', 13),
(960, 'Kerteh', 13),
(961, 'Ketengah Jaya', 13),
(962, 'Kijal', 13),
(963, 'Kuala Berang', 13),
(964, 'Kuala Besut', 13),
(965, 'Marang', 13),
(966, 'Paka', 13),
(967, 'Permaisuri', 13),
(968, 'Sungai Tong', 13),
(969, 'Labuan', 14),
(970, 'Putrajaya', 14);

-- --------------------------------------------------------

--
-- Table structure for table `master_negeri`
--

CREATE TABLE `master_negeri` (
  `negeri_id` int(10) UNSIGNED NOT NULL,
  `negeri_nama` varchar(64) NOT NULL,
  `negeri_aktif` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `master_negeri`
--

INSERT INTO `master_negeri` (`negeri_id`, `negeri_nama`, `negeri_aktif`) VALUES
(1, 'Johor', 1),
(2, 'Kedah', 1),
(3, 'Kelantan', 1),
(4, 'Pahang', 1),
(5, 'Melaka', 1),
(6, 'Negeri Sembilan', 1),
(7, 'Selangor', 1),
(8, 'Perak', 1),
(9, 'Perlis', 1),
(10, 'Pulau Pinang', 1),
(11, 'Sarawak', 1),
(12, 'Sabah', 1),
(13, 'Terengganu', 1),
(14, 'Wilayah Persekutuan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1513235784),
('m130524_201442_init', 1513235788);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'cTemYHAq_jeOJxaq7MTkvnz8BYH4xnRM', '$2y$13$B9GTXjtuyIRvR8ILpRVvBONzQHNS8Cr0.OtIUZN4syVsnTU1ORP.2', NULL, 'admin-badmintonbooking@mailinator.com', 10, 1513235918, 1513235918),
(2, 'user1', 'MeMECYmsbSndIVqk4e6etVnsMvUc1-ZJ', '$2y$13$c6eIEqyV3/iGpGPrEfJxS.8ddbckCgk7oAzliuPmvCKXLdXkifFeO', NULL, 'user1@gmail.com', 10, 1513620212, 1513620212),
(3, 'user2', '2zuQdnxEIX1wmnJk2XHGwqv_q6ajmOTM', '$2y$13$0hpVg/Z6U0IgB3L/diiqBOjrA84BUUzBdWDIUO/VBMzpzmTCqWPzW', NULL, 'user@gmail.com', 10, 1513622602, 1513622602),
(4, 'mai', 't3RXcRN-1-Gi_nJnGQ_8HLlB8gxKB_LV', '$2y$13$YJg1EiVPfya8KENd1WsjK.7556Ekc4k2NljsgeLpMh3ZP4RASHe52', NULL, 'marinaadlene@gmail.com', 10, 1513747128, 1513747128);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`nama`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `court_id` (`court_id`);

--
-- Indexes for table `court`
--
ALTER TABLE `court`
  ADD PRIMARY KEY (`court_id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`),
  ADD KEY `city_id` (`daerah_id`) USING BTREE;

--
-- Indexes for table `master_daerah`
--
ALTER TABLE `master_daerah`
  ADD PRIMARY KEY (`daerah_id`),
  ADD UNIQUE KEY `daerah_nama` (`daerah_nama`),
  ADD KEY `state_id` (`negeri_id`);

--
-- Indexes for table `master_negeri`
--
ALTER TABLE `master_negeri`
  ADD PRIMARY KEY (`negeri_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `court`
--
ALTER TABLE `court`
  MODIFY `court_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `master_daerah`
--
ALTER TABLE `master_daerah`
  MODIFY `daerah_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=971;
--
-- AUTO_INCREMENT for table `master_negeri`
--
ALTER TABLE `master_negeri`
  MODIFY `negeri_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`daerah_id`) REFERENCES `master_daerah` (`daerah_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `master_daerah`
--
ALTER TABLE `master_daerah`
  ADD CONSTRAINT `master_daerah_ibfk_1` FOREIGN KEY (`negeri_id`) REFERENCES `master_negeri` (`negeri_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
