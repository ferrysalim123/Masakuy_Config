-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2021 at 07:19 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `masakuy`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `url` text NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `url`, `name`) VALUES
(1, 'http://192.168.0.124/MasaKuy/uploads/1.jpg', 'Nasi Goreng Telur Pak Ferry'),
(37, 'http://192.168.0.124/MasaKuy/uploads/2.jpg', 'Pecel Lele ');

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `recipe_id` int(11) NOT NULL,
  `recipe_name` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `steps` varchar(10000) NOT NULL,
  `ingredients` varchar(5000) NOT NULL,
  `recipe_pict` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`recipe_id`, `recipe_name`, `description`, `user_id`, `steps`, `ingredients`, `recipe_pict`) VALUES
(1, 'Nasi Goreng Telur Pak Ferry', 'Nasi goreng spesial ala Pak Ferry', 1, 'Panaskan margarin hingga meleleh, masak telur orak-arik hingga matang.\r\nTambahkan minyak goreng dan bumbu halus, aduk rata, masak hingga harum.\r\nMasukkan nasi ke dalam adonan telur dan bumbu, aduk rata.\r\nTambahkan daun bawang, aduk rata, koreksi rasa.\r\nJika nasi goreng sudah matang dan rasanya pas, angkat lalu sajikan.\r\nSajikan bersama topping tomat ceri dan kerupuk juga sedikit hiasan daun seledri juga irisan cabai merah.', '1 piring nasi,\r\n2 butir telur,\r\n1 batang daun bawang (cincang kasar),\r\n3 buah tomat merah (potong sesuai selera),\r\nkerupuk (secukupnya),\r\n1 sdm margarin,\r\n2 sdm minyak goreng,\r\n2 siung bawang putih,\r\n3 siung bawang merah,\r\n5 buah cabai rawit,\r\nGaram (secukupnya),\r\nGula (secukupnya),\r\nKecap manis (secukupnya)', 'http://192.168.0.124/MasaKuy/uploads/1.jpg'),
(2, 'Pecel Lele ', 'Pecel lele khas Lamongan, lengkap dengan sambal', 1, '1. Siapkan lele yang sudah dibersihkan ke dalam wadah bersih. Rendam lele dengam larutan bumbu perendam. Biarkan 30 menit agar bumbu meresap.\r\n2. Panaskan minyak, goreng lele di atas api sedang hingga matang. Angkat dan tiriskan.\r\n3. Sambal pecel lele: Campurkan semua bahan lele di cobek. Ulek hingga dirasa sudah lembut.\r\n4. Penyajian: Tata ikan lele, nasi putih, sambal pecel lele, dan lalapan. Hidangkan dan nikmati selagi masih panas.', '4 ekor lele,\nminyak untuk menggoreng,\n1 sdt ketumbar,\n3 siung bawang putih,\n1 sdt garam,\n2 sdm air jeruk nipis,\n75 ml air,\n5 buah cabai merah besar,\n10 buah cabai rawit,\n2 buah tomat,\n4 siung bawang putih,\n2 buah bawang merah,\n4 butir kemiri,\n1 sdt air jeruk limau,\n1 sdt garam', 'http://192.168.0.124/MasaKuy/uploads/2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `recipe_comments`
--

CREATE TABLE `recipe_comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comments` varchar(2000) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipe_comments`
--

INSERT INTO `recipe_comments` (`comment_id`, `user_id`, `comments`, `recipe_id`, `likes`) VALUES
(2, 11, 'Enak sekali!!', 1, 0),
(3, 1, 'enak', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `password` varchar(150) NOT NULL,
  `profile_pict` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `phone_number`, `password`, `profile_pict`) VALUES
(1, 'admin', 'admin@admin.com', '08123123123', '$2y$10$xnsAjJ.5AlsvtqY/2/G6h.lZ6GID..pu348qyrA9ptn3wzQDxawra', ''),
(11, 'HadiMita', 'hadi@gmail.com', '08963528472', '$2y$10$.b7Osuue60ShdDAT34ZYTuhFuZYdCYIU5GE7ApGDxwpYEd17N/ply', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`recipe_id`),
  ADD KEY `foreign_user` (`user_id`);

--
-- Indexes for table `recipe_comments`
--
ALTER TABLE `recipe_comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `foreign_user` (`user_id`),
  ADD KEY `foreign_recipe` (`recipe_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `recipe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `recipe_comments`
--
ALTER TABLE `recipe_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
