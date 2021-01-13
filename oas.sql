-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2021 at 05:11 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(9999) NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_email` varchar(9999) NOT NULL,
  `admin_password` varchar(9999) NOT NULL,
  `admin_login` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_contact`, `admin_email`, `admin_password`, `admin_login`) VALUES
(1, 'Admin Satu', '019-6399925', 'admin@gmail.com', '12345678', '1'),
(2, 'Admin dua', '011-11113676', 'admin2@gmail.com', 'Syahmi@98', '1'),
(4, 'admin4', '0126518626', 'admin4@gmail.com', 'Admin@76', '1'),
(5, 'admin5', '0126029231', 'admin5@gmail.com', 'Qwerty@67', '1'),
(6, 'Syahmi Jalil', '0128545676', 'admin6@gmail.com', 'Syahmi@12', '1'),
(7, 'Muhammad Syahmi Bin Abdul Jalil', '0128545676', 'syahmijalil@gmail.com', 'Qwerty@12', '1');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `time_in` time DEFAULT NULL,
  `dates` date NOT NULL,
  `attend_status` varchar(30) NOT NULL,
  `attendance_img` longblob DEFAULT NULL,
  `student_id` varchar(767) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `time_in`, `dates`, `attend_status`, `attendance_img`, `student_id`) VALUES
(371, NULL, '2021-01-13', 'Absent', NULL, '10A10A10'),
(372, NULL, '2021-01-13', 'Absent', NULL, '10B10B10'),
(373, NULL, '2021-01-13', 'Absent', NULL, '10D10D10'),
(374, NULL, '2021-01-13', 'Absent', NULL, '10E10E10'),
(375, NULL, '2021-01-13', 'Absent', NULL, '10F10F10'),
(376, NULL, '2021-01-13', 'Absent', NULL, '10H10H10'),
(377, NULL, '2021-01-13', 'Absent', NULL, '10I10I10'),
(378, NULL, '2021-01-13', 'Absent', NULL, '10J10J10'),
(379, NULL, '2021-01-13', 'Absent', NULL, '10K10K10'),
(380, NULL, '2021-01-13', 'Absent', NULL, '10Z10Z10'),
(381, NULL, '2021-01-13', 'Absent', NULL, '11A11A11'),
(382, NULL, '2021-01-13', 'Absent', NULL, '11B11B11'),
(383, NULL, '2021-01-13', 'Absent', NULL, '11C11C11 '),
(384, NULL, '2021-01-13', 'Absent', NULL, '11D11D11'),
(385, NULL, '2021-01-13', 'Absent', NULL, '11E11E11'),
(386, NULL, '2021-01-13', 'Absent', NULL, '11F11F11'),
(387, NULL, '2021-01-13', 'Absent', NULL, '11H11H11'),
(388, NULL, '2021-01-13', 'Absent', NULL, '11I11I11'),
(389, NULL, '2021-01-13', 'Absent', NULL, '11J11J11'),
(390, NULL, '2021-01-13', 'Absent', NULL, '11K11K11'),
(391, NULL, '2021-01-13', 'Absent', NULL, '1ACD7D19'),
(392, NULL, '2021-01-13', 'Absent', NULL, '1ADE588C'),
(393, NULL, '2021-01-13', 'Absent', NULL, '1AFDD6BA'),
(394, NULL, '2021-01-13', 'Absent', NULL, '2BCAEDF3'),
(395, NULL, '2021-01-13', 'Absent', NULL, '2C44BA21'),
(396, NULL, '2021-01-13', 'Absent', NULL, '2C6622C2'),
(397, NULL, '2021-01-13', 'Absent', NULL, '2DEBC67A'),
(398, NULL, '2021-01-13', 'Absent', NULL, '2EBB432C'),
(399, NULL, '2021-01-13', 'Absent', NULL, '2EC7D77B'),
(400, NULL, '2021-01-13', 'Absent', NULL, '2EF8D87B'),
(401, NULL, '2021-01-13', 'Absent', NULL, '3ABC3DE2'),
(402, NULL, '2021-01-13', 'Absent', NULL, '3CEA78DA'),
(403, NULL, '2021-01-13', 'Absent', NULL, '3FFEA834'),
(404, NULL, '2021-01-13', 'Absent', NULL, '4AACB5E2'),
(405, NULL, '2021-01-13', 'Absent', NULL, '6A6A6A6A'),
(406, NULL, '2021-01-13', 'Absent', NULL, '6B6B6B6B'),
(407, NULL, '2021-01-13', 'Absent', NULL, '6BCA32FF'),
(408, NULL, '2021-01-13', 'Absent', NULL, '6C6C6C6C '),
(409, NULL, '2021-01-13', 'Absent', NULL, '6CE47EAB'),
(410, NULL, '2021-01-13', 'Absent', NULL, '6D6D6D6D'),
(411, NULL, '2021-01-13', 'Absent', NULL, '6E296CAF'),
(412, NULL, '2021-01-13', 'Absent', NULL, '6E6E6E6E'),
(413, NULL, '2021-01-13', 'Absent', NULL, '6F6F6F6F'),
(414, NULL, '2021-01-13', 'Absent', NULL, '6I6I6I6I'),
(415, NULL, '2021-01-13', 'Absent', NULL, '6J6J6J6J'),
(416, NULL, '2021-01-13', 'Absent', NULL, '6K6K6K6K'),
(417, NULL, '2021-01-13', 'Absent', NULL, '7A7A7A7A'),
(418, NULL, '2021-01-13', 'Absent', NULL, '7B7B7B7B'),
(419, NULL, '2021-01-13', 'Absent', NULL, '7C7C7C7C '),
(420, NULL, '2021-01-13', 'Absent', NULL, '7CABC12F'),
(421, NULL, '2021-01-13', 'Absent', NULL, '7D7D7D7D'),
(422, NULL, '2021-01-13', 'Absent', NULL, '7E7E7E7E'),
(423, NULL, '2021-01-13', 'Absent', NULL, '7F7F7F7F'),
(424, NULL, '2021-01-13', 'Absent', NULL, '7I7I7I7I'),
(425, NULL, '2021-01-13', 'Absent', NULL, '7J7J7J7J'),
(426, NULL, '2021-01-13', 'Absent', NULL, '7K7K7K7K'),
(427, NULL, '2021-01-13', 'Absent', NULL, '8A8A8A8A'),
(428, NULL, '2021-01-13', 'Absent', NULL, '8B8B8B8B'),
(429, NULL, '2021-01-13', 'Absent', NULL, '8BADDAE1'),
(430, NULL, '2021-01-13', 'Absent', NULL, '8C8C8C8C '),
(431, NULL, '2021-01-13', 'Absent', NULL, '8D8D8D8D'),
(432, NULL, '2021-01-13', 'Absent', NULL, '8E8E8E8E'),
(433, NULL, '2021-01-13', 'Absent', NULL, '8F8F8F8F'),
(434, NULL, '2021-01-13', 'Absent', NULL, '8I8I8I8I'),
(435, NULL, '2021-01-13', 'Absent', NULL, '8J8J8J8J'),
(436, NULL, '2021-01-13', 'Absent', NULL, '8K8K8K8K'),
(437, NULL, '2021-01-13', 'Absent', NULL, '9A9A9A9A'),
(438, NULL, '2021-01-13', 'Absent', NULL, '9B9B9B9B'),
(439, NULL, '2021-01-13', 'Absent', NULL, '9C9C9C9C '),
(440, NULL, '2021-01-13', 'Absent', NULL, '9D9D9D9D'),
(441, NULL, '2021-01-13', 'Absent', NULL, '9E046DAF'),
(442, NULL, '2021-01-13', 'Absent', NULL, '9E9E9E9E'),
(443, NULL, '2021-01-13', 'Absent', NULL, '9F9F9F9F'),
(444, NULL, '2021-01-13', 'Absent', NULL, '9H9H9H9H'),
(445, NULL, '2021-01-13', 'Absent', NULL, '9I9I9I9I'),
(446, NULL, '2021-01-13', 'Absent', NULL, '9J9J9J9J'),
(447, NULL, '2021-01-13', 'Absent', NULL, '9K9K9K9K'),
(448, NULL, '2021-01-13', 'Absent', NULL, 'AB45234F'),
(449, NULL, '2021-01-13', 'Absent', NULL, 'ACB54FE'),
(450, NULL, '2021-01-13', 'Absent', NULL, 'BE2C1D65'),
(451, NULL, '2021-01-13', 'Absent', NULL, 'CEB477AF'),
(452, NULL, '2021-01-13', 'Absent', NULL, 'F434AB3'),
(453, NULL, '2021-01-13', 'Absent', NULL, 'F5664BE'),
(454, NULL, '2021-01-13', 'Absent', NULL, 'F6E296CAF'),
(455, NULL, '2021-01-13', 'Absent', NULL, 'FFF54B'),
(456, NULL, '2021-01-13', 'Absent', NULL, 'FFFEE45'),
(457, NULL, '2021-01-04', 'Absent', NULL, '10A10A10'),
(458, NULL, '2021-01-04', 'Absent', NULL, '10B10B10'),
(459, NULL, '2021-01-04', 'Absent', NULL, '10D10D10'),
(460, NULL, '2021-01-04', 'Absent', NULL, '10E10E10'),
(461, NULL, '2021-01-04', 'Absent', NULL, '10F10F10'),
(462, NULL, '2021-01-04', 'Absent', NULL, '10H10H10'),
(463, NULL, '2021-01-04', 'Absent', NULL, '10I10I10'),
(464, NULL, '2021-01-04', 'Absent', NULL, '10J10J10'),
(465, NULL, '2021-01-04', 'Absent', NULL, '10K10K10'),
(466, NULL, '2021-01-04', 'Absent', NULL, '10Z10Z10'),
(467, NULL, '2021-01-04', 'Absent', NULL, '11A11A11'),
(468, NULL, '2021-01-04', 'Absent', NULL, '11B11B11'),
(469, NULL, '2021-01-04', 'Absent', NULL, '11C11C11 '),
(470, NULL, '2021-01-04', 'Absent', NULL, '11D11D11'),
(471, NULL, '2021-01-04', 'Absent', NULL, '11E11E11'),
(472, NULL, '2021-01-04', 'Absent', NULL, '11F11F11'),
(473, NULL, '2021-01-04', 'Absent', NULL, '11H11H11'),
(474, NULL, '2021-01-04', 'Absent', NULL, '11I11I11'),
(475, NULL, '2021-01-04', 'Absent', NULL, '11J11J11'),
(476, NULL, '2021-01-04', 'Absent', NULL, '11K11K11'),
(477, NULL, '2021-01-04', 'Absent', NULL, '1ACD7D19'),
(478, NULL, '2021-01-04', 'Absent', NULL, '1ADE588C'),
(479, NULL, '2021-01-04', 'Absent', NULL, '1AFDD6BA'),
(480, NULL, '2021-01-04', 'Absent', NULL, '2BCAEDF3'),
(481, NULL, '2021-01-04', 'Absent', NULL, '2C44BA21'),
(482, NULL, '2021-01-04', 'Absent', NULL, '2C6622C2'),
(483, NULL, '2021-01-04', 'Absent', NULL, '2DEBC67A'),
(484, NULL, '2021-01-04', 'Absent', NULL, '2EBB432C'),
(485, NULL, '2021-01-04', 'Absent', NULL, '2EC7D77B'),
(486, NULL, '2021-01-04', 'Absent', NULL, '2EF8D87B'),
(487, NULL, '2021-01-04', 'Absent', NULL, '3ABC3DE2'),
(488, NULL, '2021-01-04', 'Absent', NULL, '3CEA78DA'),
(489, NULL, '2021-01-04', 'Absent', NULL, '3FFEA834'),
(490, NULL, '2021-01-04', 'Absent', NULL, '4AACB5E2'),
(491, NULL, '2021-01-04', 'Absent', NULL, '6A6A6A6A'),
(492, NULL, '2021-01-04', 'Absent', NULL, '6B6B6B6B'),
(493, NULL, '2021-01-04', 'Absent', NULL, '6BCA32FF'),
(494, NULL, '2021-01-04', 'Absent', NULL, '6C6C6C6C '),
(495, NULL, '2021-01-04', 'Absent', NULL, '6CE47EAB'),
(496, NULL, '2021-01-04', 'Absent', NULL, '6D6D6D6D'),
(497, NULL, '2021-01-04', 'Absent', NULL, '6E296CAF'),
(498, NULL, '2021-01-04', 'Absent', NULL, '6E6E6E6E'),
(499, NULL, '2021-01-04', 'Absent', NULL, '6F6F6F6F'),
(500, NULL, '2021-01-04', 'Absent', NULL, '6I6I6I6I'),
(501, NULL, '2021-01-04', 'Absent', NULL, '6J6J6J6J'),
(502, NULL, '2021-01-04', 'Absent', NULL, '6K6K6K6K'),
(503, NULL, '2021-01-04', 'Absent', NULL, '7A7A7A7A'),
(504, NULL, '2021-01-04', 'Absent', NULL, '7B7B7B7B'),
(505, NULL, '2021-01-04', 'Absent', NULL, '7C7C7C7C '),
(506, NULL, '2021-01-04', 'Absent', NULL, '7CABC12F'),
(507, NULL, '2021-01-04', 'Absent', NULL, '7D7D7D7D'),
(508, NULL, '2021-01-04', 'Absent', NULL, '7E7E7E7E'),
(509, NULL, '2021-01-04', 'Absent', NULL, '7F7F7F7F'),
(510, NULL, '2021-01-04', 'Absent', NULL, '7I7I7I7I'),
(511, NULL, '2021-01-04', 'Absent', NULL, '7J7J7J7J'),
(512, NULL, '2021-01-04', 'Absent', NULL, '7K7K7K7K'),
(513, NULL, '2021-01-04', 'Absent', NULL, '8A8A8A8A'),
(514, NULL, '2021-01-04', 'Absent', NULL, '8B8B8B8B'),
(515, NULL, '2021-01-04', 'Absent', NULL, '8BADDAE1'),
(516, NULL, '2021-01-04', 'Absent', NULL, '8C8C8C8C '),
(517, NULL, '2021-01-04', 'Absent', NULL, '8D8D8D8D'),
(518, NULL, '2021-01-04', 'Absent', NULL, '8E8E8E8E'),
(519, NULL, '2021-01-04', 'Absent', NULL, '8F8F8F8F'),
(520, NULL, '2021-01-04', 'Absent', NULL, '8I8I8I8I'),
(521, NULL, '2021-01-04', 'Absent', NULL, '8J8J8J8J'),
(522, NULL, '2021-01-04', 'Absent', NULL, '8K8K8K8K'),
(523, NULL, '2021-01-04', 'Absent', NULL, '9A9A9A9A'),
(524, NULL, '2021-01-04', 'Absent', NULL, '9B9B9B9B'),
(525, NULL, '2021-01-04', 'Absent', NULL, '9C9C9C9C '),
(526, NULL, '2021-01-04', 'Absent', NULL, '9D9D9D9D'),
(527, NULL, '2021-01-04', 'Absent', NULL, '9E046DAF'),
(528, NULL, '2021-01-04', 'Absent', NULL, '9E9E9E9E'),
(529, NULL, '2021-01-04', 'Absent', NULL, '9F9F9F9F'),
(530, NULL, '2021-01-04', 'Absent', NULL, '9H9H9H9H'),
(531, NULL, '2021-01-04', 'Absent', NULL, '9I9I9I9I'),
(532, NULL, '2021-01-04', 'Absent', NULL, '9J9J9J9J'),
(533, NULL, '2021-01-04', 'Absent', NULL, '9K9K9K9K'),
(534, NULL, '2021-01-04', 'Absent', NULL, 'AB45234F'),
(535, NULL, '2021-01-04', 'Absent', NULL, 'ACB54FE'),
(536, NULL, '2021-01-04', 'Absent', NULL, 'BE2C1D65'),
(537, NULL, '2021-01-04', 'Absent', NULL, 'CEB477AF'),
(538, NULL, '2021-01-04', 'Absent', NULL, 'F434AB3'),
(539, NULL, '2021-01-04', 'Absent', NULL, 'F5664BE'),
(540, NULL, '2021-01-04', 'Absent', NULL, 'F6E296CAF'),
(541, NULL, '2021-01-04', 'Absent', NULL, 'FFF54B'),
(542, NULL, '2021-01-04', 'Absent', NULL, 'FFFEE45'),
(543, NULL, '2021-01-05', 'Absent', NULL, '10A10A10'),
(544, NULL, '2021-01-05', 'Absent', NULL, '10B10B10'),
(545, NULL, '2021-01-05', 'Absent', NULL, '10D10D10'),
(546, NULL, '2021-01-05', 'Absent', NULL, '10E10E10'),
(547, NULL, '2021-01-05', 'Absent', NULL, '10F10F10'),
(548, NULL, '2021-01-05', 'Absent', NULL, '10H10H10'),
(549, NULL, '2021-01-05', 'Absent', NULL, '10I10I10'),
(550, NULL, '2021-01-05', 'Absent', NULL, '10J10J10'),
(551, NULL, '2021-01-05', 'Absent', NULL, '10K10K10'),
(552, NULL, '2021-01-05', 'Absent', NULL, '10Z10Z10'),
(553, NULL, '2021-01-05', 'Absent', NULL, '11A11A11'),
(554, NULL, '2021-01-05', 'Absent', NULL, '11B11B11'),
(555, NULL, '2021-01-05', 'Absent', NULL, '11C11C11 '),
(556, NULL, '2021-01-05', 'Absent', NULL, '11D11D11'),
(557, NULL, '2021-01-05', 'Absent', NULL, '11E11E11'),
(558, NULL, '2021-01-05', 'Absent', NULL, '11F11F11'),
(559, NULL, '2021-01-05', 'Absent', NULL, '11H11H11'),
(560, NULL, '2021-01-05', 'Absent', NULL, '11I11I11'),
(561, NULL, '2021-01-05', 'Absent', NULL, '11J11J11'),
(562, NULL, '2021-01-05', 'Absent', NULL, '11K11K11'),
(563, NULL, '2021-01-05', 'Absent', NULL, '1ACD7D19'),
(564, NULL, '2021-01-05', 'Absent', NULL, '1ADE588C'),
(565, NULL, '2021-01-05', 'Absent', NULL, '1AFDD6BA'),
(566, NULL, '2021-01-05', 'Absent', NULL, '2BCAEDF3'),
(567, NULL, '2021-01-05', 'Absent', NULL, '2C44BA21'),
(568, NULL, '2021-01-05', 'Absent', NULL, '2C6622C2'),
(569, NULL, '2021-01-05', 'Absent', NULL, '2DEBC67A'),
(570, NULL, '2021-01-05', 'Absent', NULL, '2EBB432C'),
(571, NULL, '2021-01-05', 'Absent', NULL, '2EC7D77B'),
(572, NULL, '2021-01-05', 'Absent', NULL, '2EF8D87B'),
(573, NULL, '2021-01-05', 'Absent', NULL, '3ABC3DE2'),
(574, NULL, '2021-01-05', 'Absent', NULL, '3CEA78DA'),
(575, NULL, '2021-01-05', 'Absent', NULL, '3FFEA834'),
(576, NULL, '2021-01-05', 'Absent', NULL, '4AACB5E2'),
(577, NULL, '2021-01-05', 'Absent', NULL, '6A6A6A6A'),
(578, NULL, '2021-01-05', 'Absent', NULL, '6B6B6B6B'),
(579, NULL, '2021-01-05', 'Absent', NULL, '6BCA32FF'),
(580, NULL, '2021-01-05', 'Absent', NULL, '6C6C6C6C '),
(581, NULL, '2021-01-05', 'Absent', NULL, '6CE47EAB'),
(582, NULL, '2021-01-05', 'Absent', NULL, '6D6D6D6D'),
(583, NULL, '2021-01-05', 'Absent', NULL, '6E296CAF'),
(584, NULL, '2021-01-05', 'Absent', NULL, '6E6E6E6E'),
(585, NULL, '2021-01-05', 'Absent', NULL, '6F6F6F6F'),
(586, NULL, '2021-01-05', 'Absent', NULL, '6I6I6I6I'),
(587, NULL, '2021-01-05', 'Absent', NULL, '6J6J6J6J'),
(588, NULL, '2021-01-05', 'Absent', NULL, '6K6K6K6K'),
(589, NULL, '2021-01-05', 'Absent', NULL, '7A7A7A7A'),
(590, NULL, '2021-01-05', 'Absent', NULL, '7B7B7B7B'),
(591, NULL, '2021-01-05', 'Absent', NULL, '7C7C7C7C '),
(592, NULL, '2021-01-05', 'Absent', NULL, '7CABC12F'),
(593, NULL, '2021-01-05', 'Absent', NULL, '7D7D7D7D'),
(594, NULL, '2021-01-05', 'Absent', NULL, '7E7E7E7E'),
(595, NULL, '2021-01-05', 'Absent', NULL, '7F7F7F7F'),
(596, NULL, '2021-01-05', 'Absent', NULL, '7I7I7I7I'),
(597, NULL, '2021-01-05', 'Absent', NULL, '7J7J7J7J'),
(598, NULL, '2021-01-05', 'Absent', NULL, '7K7K7K7K'),
(599, NULL, '2021-01-05', 'Absent', NULL, '8A8A8A8A'),
(600, NULL, '2021-01-05', 'Absent', NULL, '8B8B8B8B'),
(601, NULL, '2021-01-05', 'Absent', NULL, '8BADDAE1'),
(602, NULL, '2021-01-05', 'Absent', NULL, '8C8C8C8C '),
(603, NULL, '2021-01-05', 'Absent', NULL, '8D8D8D8D'),
(604, NULL, '2021-01-05', 'Absent', NULL, '8E8E8E8E'),
(605, NULL, '2021-01-05', 'Absent', NULL, '8F8F8F8F'),
(606, NULL, '2021-01-05', 'Absent', NULL, '8I8I8I8I'),
(607, NULL, '2021-01-05', 'Absent', NULL, '8J8J8J8J'),
(608, NULL, '2021-01-05', 'Absent', NULL, '8K8K8K8K'),
(609, NULL, '2021-01-05', 'Absent', NULL, '9A9A9A9A'),
(610, NULL, '2021-01-05', 'Absent', NULL, '9B9B9B9B'),
(611, NULL, '2021-01-05', 'Absent', NULL, '9C9C9C9C '),
(612, NULL, '2021-01-05', 'Absent', NULL, '9D9D9D9D'),
(613, NULL, '2021-01-05', 'Absent', NULL, '9E046DAF'),
(614, NULL, '2021-01-05', 'Absent', NULL, '9E9E9E9E'),
(615, NULL, '2021-01-05', 'Absent', NULL, '9F9F9F9F'),
(616, NULL, '2021-01-05', 'Absent', NULL, '9H9H9H9H'),
(617, NULL, '2021-01-05', 'Absent', NULL, '9I9I9I9I'),
(618, NULL, '2021-01-05', 'Absent', NULL, '9J9J9J9J'),
(619, NULL, '2021-01-05', 'Absent', NULL, '9K9K9K9K'),
(620, NULL, '2021-01-05', 'Absent', NULL, 'AB45234F'),
(621, NULL, '2021-01-05', 'Absent', NULL, 'ACB54FE'),
(622, NULL, '2021-01-05', 'Absent', NULL, 'BE2C1D65'),
(623, NULL, '2021-01-05', 'Absent', NULL, 'CEB477AF'),
(624, NULL, '2021-01-05', 'Absent', NULL, 'F434AB3'),
(625, NULL, '2021-01-05', 'Absent', NULL, 'F5664BE'),
(626, NULL, '2021-01-05', 'Absent', NULL, 'F6E296CAF'),
(627, NULL, '2021-01-05', 'Absent', NULL, 'FFF54B'),
(628, NULL, '2021-01-05', 'Absent', NULL, 'FFFEE45'),
(629, NULL, '2021-01-06', 'Absent', NULL, '10A10A10'),
(630, NULL, '2021-01-06', 'Absent', NULL, '10B10B10'),
(631, NULL, '2021-01-06', 'Absent', NULL, '10D10D10'),
(632, NULL, '2021-01-06', 'Absent', NULL, '10E10E10'),
(633, NULL, '2021-01-06', 'Absent', NULL, '10F10F10'),
(634, NULL, '2021-01-06', 'Absent', NULL, '10H10H10'),
(635, NULL, '2021-01-06', 'Absent', NULL, '10I10I10'),
(636, NULL, '2021-01-06', 'Absent', NULL, '10J10J10'),
(637, NULL, '2021-01-06', 'Absent', NULL, '10K10K10'),
(638, NULL, '2021-01-06', 'Absent', NULL, '10Z10Z10'),
(639, NULL, '2021-01-06', 'Absent', NULL, '11A11A11'),
(640, NULL, '2021-01-06', 'Absent', NULL, '11B11B11'),
(641, NULL, '2021-01-06', 'Absent', NULL, '11C11C11 '),
(642, NULL, '2021-01-06', 'Absent', NULL, '11D11D11'),
(643, NULL, '2021-01-06', 'Absent', NULL, '11E11E11'),
(644, NULL, '2021-01-06', 'Absent', NULL, '11F11F11'),
(645, NULL, '2021-01-06', 'Absent', NULL, '11H11H11'),
(646, NULL, '2021-01-06', 'Absent', NULL, '11I11I11'),
(647, NULL, '2021-01-06', 'Absent', NULL, '11J11J11'),
(648, NULL, '2021-01-06', 'Absent', NULL, '11K11K11'),
(649, NULL, '2021-01-06', 'Absent', NULL, '1ACD7D19'),
(650, NULL, '2021-01-06', 'Absent', NULL, '1ADE588C'),
(651, NULL, '2021-01-06', 'Absent', NULL, '1AFDD6BA'),
(652, NULL, '2021-01-06', 'Absent', NULL, '2BCAEDF3'),
(653, NULL, '2021-01-06', 'Absent', NULL, '2C44BA21'),
(654, NULL, '2021-01-06', 'Absent', NULL, '2C6622C2'),
(655, NULL, '2021-01-06', 'Absent', NULL, '2DEBC67A'),
(656, NULL, '2021-01-06', 'Absent', NULL, '2EBB432C'),
(657, NULL, '2021-01-06', 'Absent', NULL, '2EC7D77B'),
(658, NULL, '2021-01-06', 'Absent', NULL, '2EF8D87B'),
(659, NULL, '2021-01-06', 'Absent', NULL, '3ABC3DE2'),
(660, NULL, '2021-01-06', 'Absent', NULL, '3CEA78DA'),
(661, NULL, '2021-01-06', 'Absent', NULL, '3FFEA834'),
(662, NULL, '2021-01-06', 'Absent', NULL, '4AACB5E2'),
(663, NULL, '2021-01-06', 'Absent', NULL, '6A6A6A6A'),
(664, NULL, '2021-01-06', 'Absent', NULL, '6B6B6B6B'),
(665, NULL, '2021-01-06', 'Absent', NULL, '6BCA32FF'),
(666, NULL, '2021-01-06', 'Absent', NULL, '6C6C6C6C '),
(667, NULL, '2021-01-06', 'Absent', NULL, '6CE47EAB'),
(668, NULL, '2021-01-06', 'Absent', NULL, '6D6D6D6D'),
(669, NULL, '2021-01-06', 'Absent', NULL, '6E296CAF'),
(670, NULL, '2021-01-06', 'Absent', NULL, '6E6E6E6E'),
(671, NULL, '2021-01-06', 'Absent', NULL, '6F6F6F6F'),
(672, NULL, '2021-01-06', 'Absent', NULL, '6I6I6I6I'),
(673, NULL, '2021-01-06', 'Absent', NULL, '6J6J6J6J'),
(674, NULL, '2021-01-06', 'Absent', NULL, '6K6K6K6K'),
(675, NULL, '2021-01-06', 'Absent', NULL, '7A7A7A7A'),
(676, NULL, '2021-01-06', 'Absent', NULL, '7B7B7B7B'),
(677, NULL, '2021-01-06', 'Absent', NULL, '7C7C7C7C '),
(678, NULL, '2021-01-06', 'Absent', NULL, '7CABC12F'),
(679, NULL, '2021-01-06', 'Absent', NULL, '7D7D7D7D'),
(680, NULL, '2021-01-06', 'Absent', NULL, '7E7E7E7E'),
(681, NULL, '2021-01-06', 'Absent', NULL, '7F7F7F7F'),
(682, NULL, '2021-01-06', 'Absent', NULL, '7I7I7I7I'),
(683, NULL, '2021-01-06', 'Absent', NULL, '7J7J7J7J'),
(684, NULL, '2021-01-06', 'Absent', NULL, '7K7K7K7K'),
(685, NULL, '2021-01-06', 'Absent', NULL, '8A8A8A8A'),
(686, NULL, '2021-01-06', 'Absent', NULL, '8B8B8B8B'),
(687, NULL, '2021-01-06', 'Absent', NULL, '8BADDAE1'),
(688, NULL, '2021-01-06', 'Absent', NULL, '8C8C8C8C '),
(689, NULL, '2021-01-06', 'Absent', NULL, '8D8D8D8D'),
(690, NULL, '2021-01-06', 'Absent', NULL, '8E8E8E8E'),
(691, NULL, '2021-01-06', 'Absent', NULL, '8F8F8F8F'),
(692, NULL, '2021-01-06', 'Absent', NULL, '8I8I8I8I'),
(693, NULL, '2021-01-06', 'Absent', NULL, '8J8J8J8J'),
(694, NULL, '2021-01-06', 'Absent', NULL, '8K8K8K8K'),
(695, NULL, '2021-01-06', 'Absent', NULL, '9A9A9A9A'),
(696, NULL, '2021-01-06', 'Absent', NULL, '9B9B9B9B'),
(697, NULL, '2021-01-06', 'Absent', NULL, '9C9C9C9C '),
(698, NULL, '2021-01-06', 'Absent', NULL, '9D9D9D9D'),
(699, NULL, '2021-01-06', 'Absent', NULL, '9E046DAF'),
(700, NULL, '2021-01-06', 'Absent', NULL, '9E9E9E9E'),
(701, NULL, '2021-01-06', 'Absent', NULL, '9F9F9F9F'),
(702, NULL, '2021-01-06', 'Absent', NULL, '9H9H9H9H'),
(703, NULL, '2021-01-06', 'Absent', NULL, '9I9I9I9I'),
(704, NULL, '2021-01-06', 'Absent', NULL, '9J9J9J9J'),
(705, NULL, '2021-01-06', 'Absent', NULL, '9K9K9K9K'),
(706, NULL, '2021-01-06', 'Absent', NULL, 'AB45234F'),
(707, NULL, '2021-01-06', 'Absent', NULL, 'ACB54FE'),
(708, NULL, '2021-01-06', 'Absent', NULL, 'BE2C1D65'),
(709, NULL, '2021-01-06', 'Absent', NULL, 'CEB477AF'),
(710, NULL, '2021-01-06', 'Absent', NULL, 'F434AB3'),
(711, NULL, '2021-01-06', 'Absent', NULL, 'F5664BE'),
(712, NULL, '2021-01-06', 'Absent', NULL, 'F6E296CAF'),
(713, NULL, '2021-01-06', 'Absent', NULL, 'FFF54B'),
(714, NULL, '2021-01-06', 'Absent', NULL, 'FFFEE45'),
(715, NULL, '2021-01-07', 'Absent', NULL, '10A10A10'),
(716, NULL, '2021-01-07', 'Absent', NULL, '10B10B10'),
(717, NULL, '2021-01-07', 'Absent', NULL, '10D10D10'),
(718, NULL, '2021-01-07', 'Absent', NULL, '10E10E10'),
(719, NULL, '2021-01-07', 'Absent', NULL, '10F10F10'),
(720, NULL, '2021-01-07', 'Absent', NULL, '10H10H10'),
(721, NULL, '2021-01-07', 'Absent', NULL, '10I10I10'),
(722, NULL, '2021-01-07', 'Absent', NULL, '10J10J10'),
(723, NULL, '2021-01-07', 'Absent', NULL, '10K10K10'),
(724, NULL, '2021-01-07', 'Absent', NULL, '10Z10Z10'),
(725, NULL, '2021-01-07', 'Absent', NULL, '11A11A11'),
(726, NULL, '2021-01-07', 'Absent', NULL, '11B11B11'),
(727, NULL, '2021-01-07', 'Absent', NULL, '11C11C11 '),
(728, NULL, '2021-01-07', 'Absent', NULL, '11D11D11'),
(729, NULL, '2021-01-07', 'Absent', NULL, '11E11E11'),
(730, NULL, '2021-01-07', 'Absent', NULL, '11F11F11'),
(731, NULL, '2021-01-07', 'Absent', NULL, '11H11H11'),
(732, NULL, '2021-01-07', 'Absent', NULL, '11I11I11'),
(733, NULL, '2021-01-07', 'Absent', NULL, '11J11J11'),
(734, NULL, '2021-01-07', 'Absent', NULL, '11K11K11'),
(735, NULL, '2021-01-07', 'Absent', NULL, '1ACD7D19'),
(736, NULL, '2021-01-07', 'Absent', NULL, '1ADE588C'),
(737, NULL, '2021-01-07', 'Absent', NULL, '1AFDD6BA'),
(738, NULL, '2021-01-07', 'Absent', NULL, '2BCAEDF3'),
(739, NULL, '2021-01-07', 'Absent', NULL, '2C44BA21'),
(740, NULL, '2021-01-07', 'Absent', NULL, '2C6622C2'),
(741, NULL, '2021-01-07', 'Absent', NULL, '2DEBC67A'),
(742, NULL, '2021-01-07', 'Absent', NULL, '2EBB432C'),
(743, NULL, '2021-01-07', 'Absent', NULL, '2EC7D77B'),
(744, NULL, '2021-01-07', 'Absent', NULL, '2EF8D87B'),
(745, NULL, '2021-01-07', 'Absent', NULL, '3ABC3DE2'),
(746, NULL, '2021-01-07', 'Absent', NULL, '3CEA78DA'),
(747, NULL, '2021-01-07', 'Absent', NULL, '3FFEA834'),
(748, NULL, '2021-01-07', 'Absent', NULL, '4AACB5E2'),
(749, NULL, '2021-01-07', 'Absent', NULL, '6A6A6A6A'),
(750, NULL, '2021-01-07', 'Absent', NULL, '6B6B6B6B'),
(751, NULL, '2021-01-07', 'Absent', NULL, '6BCA32FF'),
(752, NULL, '2021-01-07', 'Absent', NULL, '6C6C6C6C '),
(753, NULL, '2021-01-07', 'Absent', NULL, '6CE47EAB'),
(754, NULL, '2021-01-07', 'Absent', NULL, '6D6D6D6D'),
(755, NULL, '2021-01-07', 'Absent', NULL, '6E296CAF'),
(756, NULL, '2021-01-07', 'Absent', NULL, '6E6E6E6E'),
(757, NULL, '2021-01-07', 'Absent', NULL, '6F6F6F6F'),
(758, NULL, '2021-01-07', 'Absent', NULL, '6I6I6I6I'),
(759, NULL, '2021-01-07', 'Absent', NULL, '6J6J6J6J'),
(760, NULL, '2021-01-07', 'Absent', NULL, '6K6K6K6K'),
(761, NULL, '2021-01-07', 'Absent', NULL, '7A7A7A7A'),
(762, NULL, '2021-01-07', 'Absent', NULL, '7B7B7B7B'),
(763, NULL, '2021-01-07', 'Absent', NULL, '7C7C7C7C '),
(764, NULL, '2021-01-07', 'Absent', NULL, '7CABC12F'),
(765, NULL, '2021-01-07', 'Absent', NULL, '7D7D7D7D'),
(766, NULL, '2021-01-07', 'Absent', NULL, '7E7E7E7E'),
(767, NULL, '2021-01-07', 'Absent', NULL, '7F7F7F7F'),
(768, NULL, '2021-01-07', 'Absent', NULL, '7I7I7I7I'),
(769, NULL, '2021-01-07', 'Absent', NULL, '7J7J7J7J'),
(770, NULL, '2021-01-07', 'Absent', NULL, '7K7K7K7K'),
(771, NULL, '2021-01-07', 'Absent', NULL, '8A8A8A8A'),
(772, NULL, '2021-01-07', 'Absent', NULL, '8B8B8B8B'),
(773, NULL, '2021-01-07', 'Absent', NULL, '8BADDAE1'),
(774, NULL, '2021-01-07', 'Absent', NULL, '8C8C8C8C '),
(775, NULL, '2021-01-07', 'Absent', NULL, '8D8D8D8D'),
(776, NULL, '2021-01-07', 'Absent', NULL, '8E8E8E8E'),
(777, NULL, '2021-01-07', 'Absent', NULL, '8F8F8F8F'),
(778, NULL, '2021-01-07', 'Absent', NULL, '8I8I8I8I'),
(779, NULL, '2021-01-07', 'Absent', NULL, '8J8J8J8J'),
(780, NULL, '2021-01-07', 'Absent', NULL, '8K8K8K8K'),
(781, NULL, '2021-01-07', 'Absent', NULL, '9A9A9A9A'),
(782, NULL, '2021-01-07', 'Absent', NULL, '9B9B9B9B'),
(783, NULL, '2021-01-07', 'Absent', NULL, '9C9C9C9C '),
(784, NULL, '2021-01-07', 'Absent', NULL, '9D9D9D9D'),
(785, NULL, '2021-01-07', 'Absent', NULL, '9E046DAF'),
(786, NULL, '2021-01-07', 'Absent', NULL, '9E9E9E9E'),
(787, NULL, '2021-01-07', 'Absent', NULL, '9F9F9F9F'),
(788, NULL, '2021-01-07', 'Absent', NULL, '9H9H9H9H'),
(789, NULL, '2021-01-07', 'Absent', NULL, '9I9I9I9I'),
(790, NULL, '2021-01-07', 'Absent', NULL, '9J9J9J9J'),
(791, NULL, '2021-01-07', 'Absent', NULL, '9K9K9K9K'),
(792, NULL, '2021-01-07', 'Absent', NULL, 'AB45234F'),
(793, NULL, '2021-01-07', 'Absent', NULL, 'ACB54FE'),
(794, NULL, '2021-01-07', 'Absent', NULL, 'BE2C1D65'),
(795, NULL, '2021-01-07', 'Absent', NULL, 'CEB477AF'),
(796, NULL, '2021-01-07', 'Absent', NULL, 'F434AB3'),
(797, NULL, '2021-01-07', 'Absent', NULL, 'F5664BE'),
(798, NULL, '2021-01-07', 'Absent', NULL, 'F6E296CAF'),
(799, NULL, '2021-01-07', 'Absent', NULL, 'FFF54B'),
(800, NULL, '2021-01-07', 'Absent', NULL, 'FFFEE45'),
(801, NULL, '2021-01-08', 'Absent', NULL, '10A10A10'),
(802, NULL, '2021-01-08', 'Absent', NULL, '10B10B10'),
(803, NULL, '2021-01-08', 'Absent', NULL, '10D10D10'),
(804, NULL, '2021-01-08', 'Absent', NULL, '10E10E10'),
(805, NULL, '2021-01-08', 'Absent', NULL, '10F10F10'),
(806, NULL, '2021-01-08', 'Absent', NULL, '10H10H10'),
(807, NULL, '2021-01-08', 'Absent', NULL, '10I10I10'),
(808, NULL, '2021-01-08', 'Absent', NULL, '10J10J10'),
(809, NULL, '2021-01-08', 'Absent', NULL, '10K10K10'),
(810, NULL, '2021-01-08', 'Absent', NULL, '10Z10Z10'),
(811, NULL, '2021-01-08', 'Absent', NULL, '11A11A11'),
(812, NULL, '2021-01-08', 'Absent', NULL, '11B11B11'),
(813, NULL, '2021-01-08', 'Absent', NULL, '11C11C11 '),
(814, NULL, '2021-01-08', 'Absent', NULL, '11D11D11'),
(815, NULL, '2021-01-08', 'Absent', NULL, '11E11E11'),
(816, NULL, '2021-01-08', 'Absent', NULL, '11F11F11'),
(817, NULL, '2021-01-08', 'Absent', NULL, '11H11H11'),
(818, NULL, '2021-01-08', 'Absent', NULL, '11I11I11'),
(819, NULL, '2021-01-08', 'Absent', NULL, '11J11J11'),
(820, NULL, '2021-01-08', 'Absent', NULL, '11K11K11'),
(821, NULL, '2021-01-08', 'Absent', NULL, '1ACD7D19'),
(822, NULL, '2021-01-08', 'Absent', NULL, '1ADE588C'),
(823, NULL, '2021-01-08', 'Absent', NULL, '1AFDD6BA'),
(824, NULL, '2021-01-08', 'Absent', NULL, '2BCAEDF3'),
(825, NULL, '2021-01-08', 'Absent', NULL, '2C44BA21'),
(826, NULL, '2021-01-08', 'Absent', NULL, '2C6622C2'),
(827, NULL, '2021-01-08', 'Absent', NULL, '2DEBC67A'),
(828, NULL, '2021-01-08', 'Absent', NULL, '2EBB432C'),
(829, NULL, '2021-01-08', 'Absent', NULL, '2EC7D77B'),
(830, NULL, '2021-01-08', 'Absent', NULL, '2EF8D87B'),
(831, NULL, '2021-01-08', 'Absent', NULL, '3ABC3DE2'),
(832, NULL, '2021-01-08', 'Absent', NULL, '3CEA78DA'),
(833, NULL, '2021-01-08', 'Absent', NULL, '3FFEA834'),
(834, NULL, '2021-01-08', 'Absent', NULL, '4AACB5E2'),
(835, NULL, '2021-01-08', 'Absent', NULL, '6A6A6A6A'),
(836, NULL, '2021-01-08', 'Absent', NULL, '6B6B6B6B'),
(837, NULL, '2021-01-08', 'Absent', NULL, '6BCA32FF'),
(838, NULL, '2021-01-08', 'Absent', NULL, '6C6C6C6C '),
(839, NULL, '2021-01-08', 'Absent', NULL, '6CE47EAB'),
(840, NULL, '2021-01-08', 'Absent', NULL, '6D6D6D6D'),
(841, NULL, '2021-01-08', 'Absent', NULL, '6E296CAF'),
(842, NULL, '2021-01-08', 'Absent', NULL, '6E6E6E6E'),
(843, NULL, '2021-01-08', 'Absent', NULL, '6F6F6F6F'),
(844, NULL, '2021-01-08', 'Absent', NULL, '6I6I6I6I'),
(845, NULL, '2021-01-08', 'Absent', NULL, '6J6J6J6J'),
(846, NULL, '2021-01-08', 'Absent', NULL, '6K6K6K6K'),
(847, NULL, '2021-01-08', 'Absent', NULL, '7A7A7A7A'),
(848, NULL, '2021-01-08', 'Absent', NULL, '7B7B7B7B'),
(849, NULL, '2021-01-08', 'Absent', NULL, '7C7C7C7C '),
(850, NULL, '2021-01-08', 'Absent', NULL, '7CABC12F'),
(851, NULL, '2021-01-08', 'Absent', NULL, '7D7D7D7D'),
(852, NULL, '2021-01-08', 'Absent', NULL, '7E7E7E7E'),
(853, NULL, '2021-01-08', 'Absent', NULL, '7F7F7F7F'),
(854, NULL, '2021-01-08', 'Absent', NULL, '7I7I7I7I'),
(855, NULL, '2021-01-08', 'Absent', NULL, '7J7J7J7J'),
(856, NULL, '2021-01-08', 'Absent', NULL, '7K7K7K7K'),
(857, NULL, '2021-01-08', 'Absent', NULL, '8A8A8A8A'),
(858, NULL, '2021-01-08', 'Absent', NULL, '8B8B8B8B'),
(859, NULL, '2021-01-08', 'Absent', NULL, '8BADDAE1'),
(860, NULL, '2021-01-08', 'Absent', NULL, '8C8C8C8C '),
(861, NULL, '2021-01-08', 'Absent', NULL, '8D8D8D8D'),
(862, NULL, '2021-01-08', 'Absent', NULL, '8E8E8E8E'),
(863, NULL, '2021-01-08', 'Absent', NULL, '8F8F8F8F'),
(864, NULL, '2021-01-08', 'Absent', NULL, '8I8I8I8I'),
(865, NULL, '2021-01-08', 'Absent', NULL, '8J8J8J8J'),
(866, NULL, '2021-01-08', 'Absent', NULL, '8K8K8K8K'),
(867, NULL, '2021-01-08', 'Absent', NULL, '9A9A9A9A'),
(868, NULL, '2021-01-08', 'Absent', NULL, '9B9B9B9B'),
(869, NULL, '2021-01-08', 'Absent', NULL, '9C9C9C9C '),
(870, NULL, '2021-01-08', 'Absent', NULL, '9D9D9D9D'),
(871, NULL, '2021-01-08', 'Absent', NULL, '9E046DAF'),
(872, NULL, '2021-01-08', 'Absent', NULL, '9E9E9E9E'),
(873, NULL, '2021-01-08', 'Absent', NULL, '9F9F9F9F'),
(874, NULL, '2021-01-08', 'Absent', NULL, '9H9H9H9H'),
(875, NULL, '2021-01-08', 'Absent', NULL, '9I9I9I9I'),
(876, NULL, '2021-01-08', 'Absent', NULL, '9J9J9J9J'),
(877, NULL, '2021-01-08', 'Absent', NULL, '9K9K9K9K'),
(878, NULL, '2021-01-08', 'Absent', NULL, 'AB45234F'),
(879, NULL, '2021-01-08', 'Absent', NULL, 'ACB54FE'),
(880, NULL, '2021-01-08', 'Absent', NULL, 'BE2C1D65'),
(881, NULL, '2021-01-08', 'Absent', NULL, 'CEB477AF'),
(882, NULL, '2021-01-08', 'Absent', NULL, 'F434AB3'),
(883, NULL, '2021-01-08', 'Absent', NULL, 'F5664BE'),
(884, NULL, '2021-01-08', 'Absent', NULL, 'F6E296CAF'),
(885, NULL, '2021-01-08', 'Absent', NULL, 'FFF54B'),
(886, NULL, '2021-01-08', 'Absent', NULL, 'FFFEE45'),
(887, NULL, '2021-01-11', 'Absent', NULL, '10A10A10'),
(888, NULL, '2021-01-11', 'Absent', NULL, '10B10B10'),
(889, NULL, '2021-01-11', 'Absent', NULL, '10D10D10'),
(890, NULL, '2021-01-11', 'Absent', NULL, '10E10E10'),
(891, NULL, '2021-01-11', 'Absent', NULL, '10F10F10'),
(892, NULL, '2021-01-11', 'Absent', NULL, '10H10H10'),
(893, NULL, '2021-01-11', 'Absent', NULL, '10I10I10'),
(894, NULL, '2021-01-11', 'Absent', NULL, '10J10J10'),
(895, NULL, '2021-01-11', 'Absent', NULL, '10K10K10'),
(896, NULL, '2021-01-11', 'Absent', NULL, '10Z10Z10'),
(897, NULL, '2021-01-11', 'Absent', NULL, '11A11A11'),
(898, NULL, '2021-01-11', 'Absent', NULL, '11B11B11'),
(899, NULL, '2021-01-11', 'Absent', NULL, '11C11C11 '),
(900, NULL, '2021-01-11', 'Absent', NULL, '11D11D11'),
(901, NULL, '2021-01-11', 'Absent', NULL, '11E11E11'),
(902, NULL, '2021-01-11', 'Absent', NULL, '11F11F11'),
(903, NULL, '2021-01-11', 'Absent', NULL, '11H11H11'),
(904, NULL, '2021-01-11', 'Absent', NULL, '11I11I11'),
(905, NULL, '2021-01-11', 'Absent', NULL, '11J11J11'),
(906, NULL, '2021-01-11', 'Absent', NULL, '11K11K11'),
(907, NULL, '2021-01-11', 'Absent', NULL, '1ACD7D19'),
(908, NULL, '2021-01-11', 'Absent', NULL, '1ADE588C'),
(909, NULL, '2021-01-11', 'Absent', NULL, '1AFDD6BA'),
(910, NULL, '2021-01-11', 'Absent', NULL, '2BCAEDF3'),
(911, NULL, '2021-01-11', 'Absent', NULL, '2C44BA21'),
(912, NULL, '2021-01-11', 'Absent', NULL, '2C6622C2'),
(913, NULL, '2021-01-11', 'Absent', NULL, '2DEBC67A'),
(914, NULL, '2021-01-11', 'Absent', NULL, '2EBB432C'),
(915, NULL, '2021-01-11', 'Absent', NULL, '2EC7D77B'),
(916, NULL, '2021-01-11', 'Absent', NULL, '2EF8D87B'),
(917, NULL, '2021-01-11', 'Absent', NULL, '3ABC3DE2'),
(918, NULL, '2021-01-11', 'Absent', NULL, '3CEA78DA'),
(919, NULL, '2021-01-11', 'Absent', NULL, '3FFEA834'),
(920, NULL, '2021-01-11', 'Absent', NULL, '4AACB5E2'),
(921, NULL, '2021-01-11', 'Absent', NULL, '6A6A6A6A'),
(922, NULL, '2021-01-11', 'Absent', NULL, '6B6B6B6B'),
(923, NULL, '2021-01-11', 'Absent', NULL, '6BCA32FF'),
(924, NULL, '2021-01-11', 'Absent', NULL, '6C6C6C6C '),
(925, NULL, '2021-01-11', 'Absent', NULL, '6CE47EAB'),
(926, NULL, '2021-01-11', 'Absent', NULL, '6D6D6D6D'),
(927, NULL, '2021-01-11', 'Absent', NULL, '6E296CAF'),
(928, NULL, '2021-01-11', 'Absent', NULL, '6E6E6E6E'),
(929, NULL, '2021-01-11', 'Absent', NULL, '6F6F6F6F'),
(930, NULL, '2021-01-11', 'Absent', NULL, '6I6I6I6I'),
(931, NULL, '2021-01-11', 'Absent', NULL, '6J6J6J6J'),
(932, NULL, '2021-01-11', 'Absent', NULL, '6K6K6K6K'),
(933, NULL, '2021-01-11', 'Absent', NULL, '7A7A7A7A'),
(934, NULL, '2021-01-11', 'Absent', NULL, '7B7B7B7B'),
(935, NULL, '2021-01-11', 'Absent', NULL, '7C7C7C7C '),
(936, NULL, '2021-01-11', 'Absent', NULL, '7CABC12F'),
(937, NULL, '2021-01-11', 'Absent', NULL, '7D7D7D7D'),
(938, NULL, '2021-01-11', 'Absent', NULL, '7E7E7E7E'),
(939, NULL, '2021-01-11', 'Absent', NULL, '7F7F7F7F'),
(940, NULL, '2021-01-11', 'Absent', NULL, '7I7I7I7I'),
(941, NULL, '2021-01-11', 'Absent', NULL, '7J7J7J7J'),
(942, NULL, '2021-01-11', 'Absent', NULL, '7K7K7K7K'),
(943, NULL, '2021-01-11', 'Absent', NULL, '8A8A8A8A'),
(944, NULL, '2021-01-11', 'Absent', NULL, '8B8B8B8B'),
(945, NULL, '2021-01-11', 'Absent', NULL, '8BADDAE1'),
(946, NULL, '2021-01-11', 'Absent', NULL, '8C8C8C8C '),
(947, NULL, '2021-01-11', 'Absent', NULL, '8D8D8D8D'),
(948, NULL, '2021-01-11', 'Absent', NULL, '8E8E8E8E'),
(949, NULL, '2021-01-11', 'Absent', NULL, '8F8F8F8F'),
(950, NULL, '2021-01-11', 'Absent', NULL, '8I8I8I8I'),
(951, NULL, '2021-01-11', 'Absent', NULL, '8J8J8J8J'),
(952, NULL, '2021-01-11', 'Absent', NULL, '8K8K8K8K'),
(953, NULL, '2021-01-11', 'Absent', NULL, '9A9A9A9A'),
(954, NULL, '2021-01-11', 'Absent', NULL, '9B9B9B9B'),
(955, NULL, '2021-01-11', 'Absent', NULL, '9C9C9C9C '),
(956, NULL, '2021-01-11', 'Absent', NULL, '9D9D9D9D'),
(957, NULL, '2021-01-11', 'Absent', NULL, '9E046DAF'),
(958, NULL, '2021-01-11', 'Absent', NULL, '9E9E9E9E'),
(959, NULL, '2021-01-11', 'Absent', NULL, '9F9F9F9F'),
(960, NULL, '2021-01-11', 'Absent', NULL, '9H9H9H9H'),
(961, NULL, '2021-01-11', 'Absent', NULL, '9I9I9I9I'),
(962, NULL, '2021-01-11', 'Absent', NULL, '9J9J9J9J'),
(963, NULL, '2021-01-11', 'Absent', NULL, '9K9K9K9K'),
(964, NULL, '2021-01-11', 'Absent', NULL, 'AB45234F'),
(965, NULL, '2021-01-11', 'Absent', NULL, 'ACB54FE'),
(966, NULL, '2021-01-11', 'Absent', NULL, 'BE2C1D65'),
(967, NULL, '2021-01-11', 'Absent', NULL, 'CEB477AF'),
(968, NULL, '2021-01-11', 'Absent', NULL, 'F434AB3'),
(969, NULL, '2021-01-11', 'Absent', NULL, 'F5664BE'),
(970, NULL, '2021-01-11', 'Absent', NULL, 'F6E296CAF'),
(971, NULL, '2021-01-11', 'Absent', NULL, 'FFF54B'),
(972, NULL, '2021-01-11', 'Absent', NULL, 'FFFEE45'),
(973, NULL, '2021-01-12', 'Absent', NULL, '10A10A10'),
(974, NULL, '2021-01-12', 'Absent', NULL, '10B10B10'),
(975, NULL, '2021-01-12', 'Absent', NULL, '10D10D10'),
(976, NULL, '2021-01-12', 'Absent', NULL, '10E10E10'),
(977, NULL, '2021-01-12', 'Absent', NULL, '10F10F10'),
(978, NULL, '2021-01-12', 'Absent', NULL, '10H10H10'),
(979, NULL, '2021-01-12', 'Absent', NULL, '10I10I10'),
(980, NULL, '2021-01-12', 'Absent', NULL, '10J10J10'),
(981, NULL, '2021-01-12', 'Absent', NULL, '10K10K10'),
(982, NULL, '2021-01-12', 'Absent', NULL, '10Z10Z10'),
(983, NULL, '2021-01-12', 'Absent', NULL, '11A11A11'),
(984, NULL, '2021-01-12', 'Absent', NULL, '11B11B11'),
(985, NULL, '2021-01-12', 'Absent', NULL, '11C11C11 '),
(986, NULL, '2021-01-12', 'Absent', NULL, '11D11D11'),
(987, NULL, '2021-01-12', 'Absent', NULL, '11E11E11'),
(988, NULL, '2021-01-12', 'Absent', NULL, '11F11F11'),
(989, NULL, '2021-01-12', 'Absent', NULL, '11H11H11'),
(990, NULL, '2021-01-12', 'Absent', NULL, '11I11I11'),
(991, NULL, '2021-01-12', 'Absent', NULL, '11J11J11'),
(992, NULL, '2021-01-12', 'Absent', NULL, '11K11K11'),
(993, NULL, '2021-01-12', 'Absent', NULL, '1ACD7D19'),
(994, NULL, '2021-01-12', 'Absent', NULL, '1ADE588C'),
(995, NULL, '2021-01-12', 'Absent', NULL, '1AFDD6BA'),
(996, NULL, '2021-01-12', 'Absent', NULL, '2BCAEDF3'),
(997, NULL, '2021-01-12', 'Absent', NULL, '2C44BA21'),
(998, NULL, '2021-01-12', 'Absent', NULL, '2C6622C2'),
(999, NULL, '2021-01-12', 'Absent', NULL, '2DEBC67A'),
(1000, NULL, '2021-01-12', 'Absent', NULL, '2EBB432C'),
(1001, NULL, '2021-01-12', 'Absent', NULL, '2EC7D77B'),
(1002, NULL, '2021-01-12', 'Absent', NULL, '2EF8D87B'),
(1003, NULL, '2021-01-12', 'Absent', NULL, '3ABC3DE2'),
(1004, NULL, '2021-01-12', 'Absent', NULL, '3CEA78DA'),
(1005, NULL, '2021-01-12', 'Absent', NULL, '3FFEA834'),
(1006, NULL, '2021-01-12', 'Absent', NULL, '4AACB5E2'),
(1007, NULL, '2021-01-12', 'Absent', NULL, '6A6A6A6A'),
(1008, NULL, '2021-01-12', 'Absent', NULL, '6B6B6B6B'),
(1009, NULL, '2021-01-12', 'Absent', NULL, '6BCA32FF'),
(1010, NULL, '2021-01-12', 'Absent', NULL, '6C6C6C6C '),
(1011, NULL, '2021-01-12', 'Absent', NULL, '6CE47EAB'),
(1012, NULL, '2021-01-12', 'Absent', NULL, '6D6D6D6D'),
(1013, NULL, '2021-01-12', 'Absent', NULL, '6E296CAF'),
(1014, NULL, '2021-01-12', 'Absent', NULL, '6E6E6E6E'),
(1015, NULL, '2021-01-12', 'Absent', NULL, '6F6F6F6F'),
(1016, NULL, '2021-01-12', 'Absent', NULL, '6I6I6I6I'),
(1017, NULL, '2021-01-12', 'Absent', NULL, '6J6J6J6J'),
(1018, NULL, '2021-01-12', 'Absent', NULL, '6K6K6K6K'),
(1019, NULL, '2021-01-12', 'Absent', NULL, '7A7A7A7A'),
(1020, NULL, '2021-01-12', 'Absent', NULL, '7B7B7B7B'),
(1021, NULL, '2021-01-12', 'Absent', NULL, '7C7C7C7C '),
(1022, NULL, '2021-01-12', 'Absent', NULL, '7CABC12F'),
(1023, NULL, '2021-01-12', 'Absent', NULL, '7D7D7D7D'),
(1024, NULL, '2021-01-12', 'Absent', NULL, '7E7E7E7E'),
(1025, NULL, '2021-01-12', 'Absent', NULL, '7F7F7F7F'),
(1026, NULL, '2021-01-12', 'Absent', NULL, '7I7I7I7I'),
(1027, NULL, '2021-01-12', 'Absent', NULL, '7J7J7J7J'),
(1028, NULL, '2021-01-12', 'Absent', NULL, '7K7K7K7K'),
(1029, NULL, '2021-01-12', 'Absent', NULL, '8A8A8A8A'),
(1030, NULL, '2021-01-12', 'Absent', NULL, '8B8B8B8B'),
(1031, NULL, '2021-01-12', 'Absent', NULL, '8BADDAE1'),
(1032, NULL, '2021-01-12', 'Absent', NULL, '8C8C8C8C '),
(1033, NULL, '2021-01-12', 'Absent', NULL, '8D8D8D8D'),
(1034, NULL, '2021-01-12', 'Absent', NULL, '8E8E8E8E'),
(1035, NULL, '2021-01-12', 'Absent', NULL, '8F8F8F8F'),
(1036, NULL, '2021-01-12', 'Absent', NULL, '8I8I8I8I'),
(1037, NULL, '2021-01-12', 'Absent', NULL, '8J8J8J8J'),
(1038, NULL, '2021-01-12', 'Absent', NULL, '8K8K8K8K'),
(1039, NULL, '2021-01-12', 'Absent', NULL, '9A9A9A9A'),
(1040, NULL, '2021-01-12', 'Absent', NULL, '9B9B9B9B'),
(1041, NULL, '2021-01-12', 'Absent', NULL, '9C9C9C9C '),
(1042, NULL, '2021-01-12', 'Absent', NULL, '9D9D9D9D'),
(1043, NULL, '2021-01-12', 'Absent', NULL, '9E046DAF'),
(1044, NULL, '2021-01-12', 'Absent', NULL, '9E9E9E9E'),
(1045, NULL, '2021-01-12', 'Absent', NULL, '9F9F9F9F'),
(1046, NULL, '2021-01-12', 'Absent', NULL, '9H9H9H9H'),
(1047, NULL, '2021-01-12', 'Absent', NULL, '9I9I9I9I'),
(1048, NULL, '2021-01-12', 'Absent', NULL, '9J9J9J9J'),
(1049, NULL, '2021-01-12', 'Absent', NULL, '9K9K9K9K'),
(1050, NULL, '2021-01-12', 'Absent', NULL, 'AB45234F'),
(1051, NULL, '2021-01-12', 'Absent', NULL, 'ACB54FE'),
(1052, NULL, '2021-01-12', 'Absent', NULL, 'BE2C1D65'),
(1053, NULL, '2021-01-12', 'Absent', NULL, 'CEB477AF'),
(1054, NULL, '2021-01-12', 'Absent', NULL, 'F434AB3'),
(1055, NULL, '2021-01-12', 'Absent', NULL, 'F5664BE'),
(1056, NULL, '2021-01-12', 'Absent', NULL, 'F6E296CAF'),
(1057, NULL, '2021-01-12', 'Absent', NULL, 'FFF54B'),
(1058, NULL, '2021-01-12', 'Absent', NULL, 'FFFEE45');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(255) NOT NULL,
  `class_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`) VALUES
(4, '1 Pintar'),
(5, '1 Bijak'),
(6, '2 Pintar'),
(7, '2 Bijak'),
(8, '3 Pintar'),
(9, '3 Bijak'),
(10, '4 Pintar'),
(11, '4 Bijak'),
(12, '5 Pintar'),
(13, '5 Bijak');

-- --------------------------------------------------------

--
-- Table structure for table `class_history`
--

CREATE TABLE `class_history` (
  `classHistory_id` int(11) NOT NULL,
  `classHistory_date` date NOT NULL,
  `class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_history`
--

INSERT INTO `class_history` (`classHistory_id`, `classHistory_date`, `class_id`, `teacher_id`) VALUES
(13, '2021-01-10', 5, 11),
(14, '2021-01-12', 4, 9),
(15, '2021-01-12', 7, 13),
(16, '2021-01-12', 6, 14),
(17, '2021-01-12', 9, 15),
(18, '2021-01-12', 8, 16),
(19, '2021-01-12', 11, 12),
(20, '2021-01-12', 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `device_mode`
--

CREATE TABLE `device_mode` (
  `device_mode_id` int(11) NOT NULL,
  `device_code` int(11) NOT NULL,
  `device_description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `device_mode`
--

INSERT INTO `device_mode` (`device_mode_id`, `device_code`, `device_description`) VALUES
(1, 1, 'device mode');

-- --------------------------------------------------------

--
-- Table structure for table `holiday_date`
--

CREATE TABLE `holiday_date` (
  `holiday_id` int(11) NOT NULL,
  `holiday_type` varchar(9999) NOT NULL,
  `holiday_start` date NOT NULL,
  `holiday_end` date NOT NULL,
  `holiday_description` varchar(9999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `holiday_date`
--

INSERT INTO `holiday_date` (`holiday_id`, `holiday_type`, `holiday_start`, `holiday_end`, `holiday_description`) VALUES
(14, 'National Holiday', '2021-01-03', '2021-01-03', 'blob'),
(16, 'State Holiday', '2021-01-11', '2021-01-14', 'Cuti Sekolah'),
(17, 'School Holiday', '2021-01-11', '2021-01-12', 'Hari rayaa'),
(23, 'National Holiday', '2021-01-13', '2021-01-13', 'Test'),
(26, 'National Holiday', '2021-01-13', '2021-01-13', 'fdsg');

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `parent_id` int(11) NOT NULL,
  `parent_name` varchar(100) NOT NULL,
  `parent_email` varchar(100) NOT NULL,
  `parent_password` varchar(100) NOT NULL,
  `parent_contact` varchar(30) NOT NULL,
  `parent_address` varchar(255) NOT NULL,
  `parent_login` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`parent_id`, `parent_name`, `parent_email`, `parent_password`, `parent_contact`, `parent_address`, `parent_login`) VALUES
(22, 'Muhammad Syahir Syahmi Bin Anuar', 'syahir72@gmail.com', 'Syakir@12', '012-4567543', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '1'),
(23, 'Luhman Musa Bin Abdul Mutalip', 'luhmanmusa@gmail.com', '1234567', '012-3453214', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '0'),
(24, 'Aina Asyikin Binti Mohammad Zaki', 'aina@yahoo.com', 'qwerty', '019-4543245', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '0'),
(25, 'Nurul Aqilah Shahirah Binti Amirudin', 'aqilah@gmail.com', '1234', '011-34534345', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '0'),
(26, 'Muhammad Afif Syakir Bin Razali', 'afifAkey@gmail.com', '1234567', '016-2453456', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '0'),
(27, 'Nurul Afiqah Binti Halim', 'afiqah@gmail.com', 'qwerty', '019-6399925', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '0'),
(28, 'Nur Fajar Adilah', 'adilah65@yahoo.com', 'poiuyt', '019-4532456', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '0'),
(29, 'Muhammad Nazmi Bin Nordin', 'nazmi@yahoo.com', 'zxcvb', '017-3443243', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '0'),
(30, 'Nor Afieqa Binti Mahdi', 'Afieqa@gmail.com', 'lkjhg', '018-4532456', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '0'),
(31, 'Nursyafiqah Adilla Binti Mohd Syafiq', 'nursyafiqah@gmail.com', 'zxcvb', '019-4532452', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '0'),
(32, 'Nurul Natasya Binti Supri', 'natasha@gmail.com', '123', '019-6399342', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '0'),
(33, 'Anbu Selvi AP M Paramasivan', 'anbu@gmail.com', 'qwert', '019-6399925', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '0'),
(34, 'Thivya Tamil Selvam', 'thivya@gmail.com', 'asdfg', '012-5467342', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '0'),
(35, 'Nurfazana Amirah Binti Adnan', 'amirah@gmail.com', 'qwerty', '012-4556787', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '0'),
(36, 'Muhammad Asnawi Bin Hashim', 'asnawi@gmail.com', 'qwert', '016-7645833', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '0'),
(37, 'Atan Bin Abdul Abu', 'syahir76@gmail.com', '1234', '019-6399925', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '1'),
(38, 'Kamal Bin Abdullah', 'kamal@gmail.com', '1234', '019-5436453', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '0'),
(39, 'Nahar', 'nahar@gmail.com', '1234', '019-5436342', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '0'),
(40, 'Mohd Fahmey', 'Fahmey@gmail.com', '1234', '019-5434213', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '0'),
(41, 'Wei Ming', 'meng@gmail.com', '1234', '012-5434563', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '0'),
(42, 'Abul Barakath', 'arakath@gmail.com', '1234', '012-5434563', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '0'),
(43, 'Noor Hafizi', 'Hafizi@gmail.com', '1234', '012-5434263', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '0'),
(44, 'Mazlan Bin Hamid', 'mazlan@gmail.com', '1234', '012-4523456', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '0'),
(45, 'Jayatan Bin Abu Janifa', 'jayatan@gmail.com', '1234', '012-4534567', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '0'),
(46, 'Muslim Bin Abu Ali', 'muslim@gmail.com', '1234', '012-3445634', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '0'),
(47, 'Zulkifli Bin Atan', 'zulkifli@gmail.com', '1234', '012-3456745', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '0'),
(48, 'Rosmi Bin Asnawi', 'Rosmi@gmail.com', '1234', '011-34567451', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '0'),
(49, 'Mohammad Ghadafi', 'Mohammad@gmail.com', '1234', '011-2345342', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '0'),
(50, 'Matzalan Bin Abdul Aliff', 'matzahan@gmail.com', '1234', '011-3457345', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '0'),
(51, 'Azman Bin Ali', 'azman@gmail.com', '1234', '011-3354325', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '0'),
(52, 'Daud Bin Ali', 'daud@gmail.com', '12345', '019-4532452', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '0'),
(53, 'Munggir AL Pratama', 'munggir@gmail.com', '1234', '011-45324567', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '0'),
(54, 'Ahamd Daud Bin Mursyid', 'TEST5@gmail.com', '12345', '019-6399925', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '0'),
(55, 'Putra Bin Puteri ', 'putra@gmai.com', 'qwerty', '011-98654632', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '0'),
(56, 'Mohd Alias Bin Abdul Munir', 'lias@yahoo.com', '1234', '011-2345434', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '0'),
(57, 'Zul Yahya Bin Zul Arifin', 'yahya@gmail.com', '12345', '011-12342312', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '0'),
(58, 'Suvesh AL Santest', 'suvesh@gmail.com', 'qwerty', '016-9875788', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '0'),
(59, 'Muhammad Asnawi Bin Abujar', 'asnawi23@gmail.com', 'qwert', '019-6399925', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '0'),
(60, 'Zarul Bin Afnan', 'zarul@gmail.com', 'qwert', '019-65745367', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '0'),
(61, 'Osman Bin Ali', 'osman@gmail.com', 'qwert', '017-8765463', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '0'),
(62, 'Sulaiman Bin Abdul Munir', 'sulaiman@gmail.com', 'zxcv', '016-7654732', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '0'),
(63, 'Zakuan Bin Abdul Hanif', 'Zakuan Bin Abdul Hanif', 'qwerty', '019-6399925', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '1'),
(64, 'Muhammad Syahmi Bin Abdul Jalil', 'syahmijalil12@gmail.com', 'Qwerty@12', '019-6399925', 'Tl 90 Jalan Masjid Serom 3 Sungai Mati', '1'),
(65, 'Test lima', 'testlima@gmail.com', '1234', '019-6399925', 'TL 87 Jalan Masjid Serom 3 Sungai Mati', '0');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` varchar(767) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `student_ic` varchar(9999) NOT NULL,
  `student_address` varchar(255) NOT NULL,
  `student_status` varchar(100) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `student_ic`, `student_address`, `student_status`, `class_id`, `parent_id`) VALUES
('10A10A10', 'Nurul Izzati Binti Muhammad Syahir Syahmi', '100707-07-7117', 'No 37 Jalan Taming 37 Taman Sari Bachang', 'Active', 10, 22),
('10B10B10', 'Muhd Zakwan Musa Bin Luhman Musa', '100808-08-8118', 'No 38 Jalan Taming 38 Taman Sari Bachang', 'Active', 10, 23),
('10D10D10', 'Prashantini A/P Munggir', '100404-04-4114', 'No 34 Jalan Taming 34 Taman Sari Bachang', 'Active', 10, 53),
('10E10E10', 'Nur Hajar Binti Muhammad Nazmi', '100505-05-5115', 'No 35 Jalan Taming 35 Taman Sari Bachang', 'Active', 10, 29),
('10F10F10', 'Muhd Azizi Bin Putra', '100606-06-6116', 'No 36 Jalan Taming 36 Taman Sari Bachang', 'Active', 10, 55),
('10H10H10', 'Syafiq Alias Bin Ahmad Daud', '100505-05-5115', 'No 35 Jalan Taming 35 Taman Sari Bachang', 'Active', 10, 54),
('10I10I10', 'Siti Nur Baiyah Binti Mohd Alias', '100707-07-7117', 'No 37 Jalan Taming 37 Taman Sari Bachang', 'Active', 10, 56),
('10J10J10', 'Muhd Salam Bin Zul Yahya', '100808-08-8118', 'No 38 Jalan Taming 38 Taman Sari Bachang', 'Active', 10, 57),
('10K10K10', 'Srivaju A/L Suvesh', '100909-09-9119', 'No 39 Jalan Taming 39 Taman Sari Bachang', 'Active', 10, 58),
('10Z10Z10', 'Muhd Syakir Bin Muhammad Asnawi', '100606-06-6116', 'No 36 Jalan Taming 36 Taman Sari Bachang', 'Active', 10, 59),
('11A11A11', 'Nurul Aqilah Binti Zarul', '110808-08-1111', 'No 40 Jalan Taming 40 Taman Sari Bachang', 'Active', 11, 60),
('11B11B11', 'Asyiqin Natasha Binti Alif Syakir', '110202-02-2112', 'No 41 Jalan Taming 41 Taman Sari Bachang', 'Active', 11, 26),
('11C11C11 ', 'Mohd Zuki Bin Osman', '110303-03-3113', 'No 43 Jalan Taming 43 Taman Sari Bachang', 'Active', 11, 61),
('11D11D11', 'Mohd Abu Bin Sulaiman', '110404-04-4114', 'No 44 Jalan Taming 44 Taman Sari Bachang', 'Active', 11, 62),
('11E11E11', 'Nur Cahaya Binti Muhammad Nazmi', '110505-05-5115', 'No 45 Jalan Taming 45 Taman Sari Bachang', 'Active', 11, 29),
('11F11F11', 'Muhd Amin Bin Putra', '110606-06-6116', 'No 46 Jalan Taming 46 Taman Sari Bachang', 'Active', 11, 55),
('11H11H11', 'Neavn raj A/L Suvesh', '110909-09-9119', 'No 49 Jalan Taming 49 Taman Sari Bachang', 'Active', 11, 58),
('11I11I11', 'Siti Nur Kalsom Binti Mohd Alias', '110707-07-7117', 'No 47 Jalan Taming 47 Taman Sari Bachang', 'Active', 11, 56),
('11J11J11', 'Muhd SyahmiBin Zul Yahya', '110808-08-8118', 'No 48 Jalan Taming 48 Taman Sari Bachang', 'Active', 11, 57),
('11K11K11', 'Syahmi Fauzan Bin Daud', '110909-09-9119', 'No 49 Jalan Taming 49 Taman Sari Bachang', 'Active', 11, 52),
('1ACD7D19', 'Elly Surfina Binti Suhaimi', '081223-02-3424', 'No 13 Jalan TU 34,', 'Active', 5, 24),
('1ADE588C', 'Mohamad Aiman Danish Bin Mohammad Ghadafi', '080503-04-5733', 'No 3  Jalan Merpati 3 Taman Burung Bachang', 'Active', 4, 49),
('1AFDD6BA', 'Muhammad Ikhwan Bin Kamal', '080101-04-3653', 'No 13 Jalan Merak Mas 2 Taman Merak Bachang', 'Active', 5, 38),
('2BCAEDF3', 'Alya Farissa Binti Azman', '080907-04-3261', 'No 7 Jalan Siput Taman Khatulistiwa 47 Batu Berendam', 'Active', 5, 50),
('2C44BA21', 'Muhammad Irfan Raziq Bin Nahar', '081101-01-5091', 'No 4 Jalan Bahagia 4 Taman Bunga Batu Berendam', 'Active', 4, 39),
('2C6622C2', 'Muhammad Amir Bin Muhammad Nazmi', '090101-01-5222', 'No 13 Jalan TU 34,', 'Active', 6, 29),
('2DEBC67A', 'Muhammad Farid Bin Jayatan', '080127-04-7689', 'TL 88 Jalan Masjid Alim Simpang 4 Bachang', 'Active', 4, 45),
('2EBB432C', 'Muhammad Aiman Fikri Bin Mohd Fahmey', '080318-04-5065', 'No 9 Jalan Merak Mas 7 Taman Merak Bachang', 'Active', 5, 40),
('2EC7D77B', 'Navin AL Ganeasan', '070313-01-3242', 'No 13 Jalan TU 34,', 'Active', 9, 34),
('2EF8D87B', 'Nur Atiqah Binti Adnan', '060101-01-3431', 'TL 87 Jalan Masjid Serom 3 Sungai Mati', 'Active', 9, 35),
('3ABC3DE2', 'Kew Wei Ming', '080717-04-5671', 'TL 87 Jalan Masjid Alim Simpang 4 Bachang', 'Active', 4, 41),
('3CEA78DA', 'Danish Hakimi Bin Noor Hafizi', '080026-02-6571', 'No 12 Jalan Bahagia 12 Taamn Bunga Batu Berendam', 'Active', 4, 43),
('3FFEA834', 'Muhammad Faiz Hakimi Bin Matzalan', '080118-04-8053', 'No 22 Jalan Siput Taman Khatulistiwa 50 Batu Berendam', 'Active', 4, 50),
('4AACB5E2', 'Nur Samihah Binti Abul Barakath', '080929-04-8074', 'No 4 Jalan Siput Taman Khatulistiwa 56 Batu Berendam', 'Active', 5, 42),
('6A6A6A6A', 'Muhammad Kamarul Bin Syahir Syahmi', '060101-01-1551', 'No 1 Jalan Taming 1 Taman Sari Bachang', 'Active', 6, 22),
('6B6B6B6B', 'Zakwan Bin Luhman Musa', '060202-02-2552', 'No 2 Jalan Taming 2 Taman Sari Bachang', 'Active', 6, 23),
('6BCA32FF', 'Muhammad Naim Bin Zulkifli', '080303-01-5973', 'No 5 Jalan Merpati 2 Taman Burung Bachang', 'Active', 5, 47),
('6C6C6C6C ', 'Muhammad Reza Bin Zakuan', '060303-03-3553', 'No 3 Jalan Taming 3 Taman Sari Bachang', 'Active', 6, 63),
('6CE47EAB', 'Muhamad Hazim Bin Muslim', '080508-04-3907', 'No 27 Jalan Merpati 6 Taman Burung Bachang', 'Active', 4, 46),
('6D6D6D6D', 'Siti Zulaikha Binti Zarul', '060404-04-4554', 'No 4 Jalan Taming 4 Taman Sari Bachang', 'Active', 6, 60),
('6E296CAF', 'Nurul Aqilah Binti Luhman Musaa', '080223-02-6054', 'TL 87 Jalan Masjid Serom 3 Sungai Mati', 'Active', 5, 23),
('6E6E6E6E', 'Nur Hidayah Binti Alif Syakir', '060505-05-5555', 'No 5 Jalan Taming 5 Taman Sari Bachang', 'Active', 6, 26),
('6F6F6F6F', 'Sufian Bin Osman', '060606-06-6556', 'No 6 Jalan Taming 6 Taman Sari Bachang', 'Active', 6, 61),
('6I6I6I6I', 'Najwa Binti Sulaiman', '060707-07-7557', 'No 7 Jalan Taming 7 Taman Sari Bachang', 'Active', 6, 62),
('6J6J6J6J', 'Muhammad Mustaqim Bin Muhammad Nazmi', '060808-08-8558', 'No 8 Jalan Taming 8 Taman Sari Bachang', 'Active', 6, 29),
('6K6K6K6K', 'Syafiq Bin Putra', '060909-09-9559', 'No 9 Jalan Taming 9 Taman Sari Bachang', 'Active', 6, 55),
('7A7A7A7A', 'Muhammad Kamarul Bin Mohd Alias', '070101-01-1771', 'No 10 Jalan Taming 10 Taman Sari Bachang', 'Active', 7, 56),
('7B7B7B7B', 'Nurul Afiqah Binti Zul Yahya', '070202-02-2772', 'No 11 Jalan Taming 11 Taman Sari Bachang', 'Active', 7, 57),
('7C7C7C7C ', 'Srivaju A/L Suvesh', '070303-03-3773', 'No 13 Jalan Taming 13 Taman Sari Bachang', 'Active', 7, 58),
('7CABC12F', 'Muhammad Kamil Bin Mazlan', '080413-04-7043', 'No 45 Lorong Tujuh Simpang Tok Karim Bachang', 'Active', 5, 44),
('7D7D7D7D', 'Pasca A/L Munggir', '070404-04-4774', 'No 14 Jalan Taming 14 Taman Sari Bachang', 'Active', 7, 53),
('7E7E7E7E', 'Nur Hafizah Binti Ahmad Daud', '070505-05-5775', 'No 15 Jalan Taming 15 Taman Sari Bachang', 'Active', 7, 52),
('7F7F7F7F', 'Muhd Azizi Bin Muhammad Asnawi', '070606-06-6776', 'No 16 Jalan Taming 16 Taman Sari Bachang', 'Active', 7, 59),
('7I7I7I7I', 'Aminah Binti Syahir Syahmi', '070707-07-7777', 'No 17 Jalan Taming 17 Taman Sari Bachang', 'Active', 7, 22),
('7J7J7J7J', 'Muhd Ali Bin Luhman Musa', '070808-08-8778', 'No 18 Jalan Taming 18 Taman Sari Bachang', 'Active', 7, 23),
('7K7K7K7K', 'Syafiq Osman Bin Daud', '070909-09-9779', 'No 19 Jalan Taming 19 Taman Sari Bachang', 'Active', 7, 52),
('8A8A8A8A', 'Syafqah Binti Zarul', '080808-08-1881', 'No 80 Jalan Taming 80 Taman Sari Bachang', 'Active', 8, 60),
('8B8B8B8B', 'Nurul Syazana Binti Alif Syakir', '080202-02-2882', 'No 81 Jalan Taming 81 Taman Sari Bachang', 'Active', 8, 26),
('8BADDAE1', 'Iskandar Zulkanain Bin Rosmi', '080717-02-6977', 'No 16 Jalan Merak Mas 3 Taman Merak Bachang', 'Active', 5, 48),
('8C8C8C8C ', 'Mohd Sufian Bin Osman', '080303-03-3883', 'No 83 Jalan Taming 83 Taman Sari Bachang', 'Active', 8, 61),
('8D8D8D8D', 'Ahmad Nazmi Bin Sulaiman', '080404-04-4884', 'No 84 Jalan Taming 84 Taman Sari Bachang', 'Active', 8, 62),
('8E8E8E8E', 'Nur Siti Zulaikha Binti Muhammad Nazmi', '080505-05-5885', 'No 85 Jalan Taming 85 Taman Sari Bachang', 'Active', 8, 29),
('8F8F8F8F', 'Muhd Azizi Bin Putra', '080606-06-6886', 'No 86 Jalan Taming 86 Taman Sari Bachang', 'Active', 8, 55),
('8I8I8I8I', 'Siti Nur Baiyah Binti Mohd Alias', '080707-07-7887', 'No 87 Jalan Taming 87 Taman Sari Bachang', 'Active', 8, 56),
('8J8J8J8J', 'Muhd Salam Bin Zul Yahya', '080808-08-8888', 'No 88 Jalan Taming 88 Taman Sari Bachang', 'Active', 8, 57),
('8K8K8K8K', 'Srivaju A/L Suvesh', '080909-09-9889', 'No 89 Jalan Taming 89 Taman Sari Bachang', 'Active', 8, 57),
('9A9A9A9A', 'Nurul Laila Binti Zarul', '090808-08-1991', 'No 20 Jalan Taming 20 Taman Sari Bachang', 'Active', 9, 60),
('9B9B9B9B', 'Nurul Natasha Binti Alif Syakir', '090202-02-2992', 'No 21 Jalan Taming 21 Taman Sari Bachang', 'Active', 9, 26),
('9C9C9C9C ', 'Mohd Ashraaf Bin Osman', '090303-03-3993', 'No 23 Jalan Taming 23 Taman Sari Bachang', 'Active', 9, 61),
('9D9D9D9D', 'Prashantini A/P Munggir', '090404-04-4994', 'No 24 Jalan Taming 24 Taman Sari Bachang', 'Active', 9, 53),
('9E046DAF', 'Mohd Izwan Bin Muhammad Afif Syakir', '070910-01-6578', 'No 13 Jalan TU 34,', 'Active', 7, 26),
('9E9E9E9E', 'Syafiq Alias Bin Ahmad Daud', '090505-05-5995', 'No 25 Jalan Taming 25 Taman Sari Bachang', 'Active', 9, 52),
('9F9F9F9F', 'Muhd Syakir Bin Muhammad Asnawi', '090606-06-6996', 'No 26 Jalan Taming 26 Taman Sari Bachang', 'Active', 9, 59),
('9H9H9H9H', 'Ahmad Amir Bin Sulaiman', '090404-04-4994', 'No 24 Jalan Taming 24 Taman Sari Bachang', 'Active', 9, 64),
('9I9I9I9I', 'Nurul Izzati Binti Syahir Syahmi', '090707-07-7997', 'No 27 Jalan Taming 27 Taman Sari Bachang', 'Active', 9, 22),
('9J9J9J9J', 'Muhd Zakwan Musa Bin Luhman Musa', '090808-08-8998', 'No 28 Jalan Taming 28 Taman Sari Bachang', 'Active', 9, 23),
('9K9K9K9K', 'Sofian Iman Bin Daud', '090909-09-9999', 'No 29 Jalan Taming 29 Taman Sari Bachang', 'Active', 9, 52),
('AB45234F', 'Muhammad Abdullah Bin Muhammad Syahir Syahmi', '080223-02-4779', 'TL 87 Jalan Masjid Serom 3 Sungai Mati', 'Active', 5, 22),
('ACB54FE', 'Mohammad Aiman Bin Fajar', '070313-01-6578', 'No 13 Jalan TU 34,', 'Active', 7, 28),
('BE2C1D65', 'Ahmad Nazirul Asfraf Bin Muhammad Syahmi', '081023-02-3412', 'Tl 90 Jalan Masjid Serom 3', 'Active', 4, 25),
('CEB477AF', 'Muhammad Awal Ramadhan Bin  Halim', '070916-01-5444', 'No 13 Jalan TU 34,', 'Active', 7, 27),
('F434AB3', 'Muhammad Syahmi Hilmi Bin Annuar', '080223-02-6055', 'No 13 Jalan TU 34,', 'Active', 4, 24),
('F5664BE', 'Khadijah Arwa Binti Mahdi', '090523-01-5436', 'TL 87 Jalan Masjid Serom 3 Sungai Mati', 'Active', 6, 30),
('F6E296CAF', 'Muhammad Nawawi ', '990422-02-5095', 'TL 87 Jalan Masjid Serom 3 Sungai Mati', 'Active', NULL, 62),
('FFF54B', 'Nur Nazira Dayana Binti Muhammad Afif Syakir', '080223-02-6058', 'No 13 Jalan TU 34,', 'Active', 4, 26),
('FFFEE45', 'Nur Amni Binti Syafiq', '090313-01-3241', 'No 13 Jalan TU 34,', 'Active', 6, 31);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `teacher_name` varchar(100) NOT NULL,
  `teacher_email` varchar(255) NOT NULL,
  `teacher_password` varchar(9999) NOT NULL,
  `teacher_contact` varchar(9999) NOT NULL,
  `teacher_login` varchar(255) NOT NULL DEFAULT '0',
  `class_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_name`, `teacher_email`, `teacher_password`, `teacher_contact`, `teacher_login`, `class_id`) VALUES
(9, 'Tengku Hazim Bin Tengku Azis', 'tengku@gmail.com', 'Tengku@98', '019-8765473', '1', 4),
(10, 'Nurhafizi Bin Abu Bakar', 'hafizi43@gmail.com', '1234', '012-7463823', '0', 10),
(11, 'Asnawi Bin Hashim', 'awi@yahoo.com', 'Syahmi@12', '012-5431554', '1', 5),
(12, 'Aliff Bin Pa\'ais', 'aliff@gmail.com', '1234', '012-6518626', '0', 11),
(13, 'Ku Aiman Afnan Bin Ku Ria', 'ku@gmail.com', '1234', '019-9999999', '0', 7),
(14, 'Azrul Afiq Bin Abdul Aziz', 'azrulAfiq@gmail.com', '1234', '012-4323534', '0', 6),
(15, 'Muhammad Firdaus Bin Abdul Rahim ', 'firdaus.my@gmail.com', '12345', '011-45324532', '0', 9),
(16, 'Hanis Afifah Binti Harun', 'afifah@gmail.com', '1234', '012-4564357', '0', 8),
(17, 'Nurhidayah Binti Mohd Lazim', 'dayah@gmail.com', '12345', '018-3456334', '0', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `fk_foreign_key_name1` (`student_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `class_history`
--
ALTER TABLE `class_history`
  ADD PRIMARY KEY (`classHistory_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `device_mode`
--
ALTER TABLE `device_mode`
  ADD PRIMARY KEY (`device_mode_id`);

--
-- Indexes for table `holiday_date`
--
ALTER TABLE `holiday_date`
  ADD PRIMARY KEY (`holiday_id`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`parent_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `fk_foreign_key_name` (`class_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `teacher_email` (`teacher_email`),
  ADD KEY `fk_foreign_key_name2` (`class_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1059;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `class_history`
--
ALTER TABLE `class_history`
  MODIFY `classHistory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `device_mode`
--
ALTER TABLE `device_mode`
  MODIFY `device_mode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `holiday_date`
--
ALTER TABLE `holiday_date`
  MODIFY `holiday_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `fk_foreign_key_name1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `class_history`
--
ALTER TABLE `class_history`
  ADD CONSTRAINT `class_history_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`),
  ADD CONSTRAINT `class_history_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_foreign_key_name` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`),
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `parent` (`parent_id`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `fk_foreign_key_name2` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
