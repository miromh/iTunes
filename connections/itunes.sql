-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14 март 2017 в 10:13
-- Версия на сървъра: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itunes`
--

-- --------------------------------------------------------

--
-- Структура на таблица `registration`
--

CREATE TABLE `registration` (
  `id_reg` int(11) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date_del` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Схема на данните от таблица `registration`
--

INSERT INTO `registration` (`id_reg`, `f_name`, `l_name`, `password`, `user_name`, `email`, `date_del`) VALUES
(1, 'abfapsf', 'gasdgasd', 'itunes1234', 'itunes', '', NULL);

-- --------------------------------------------------------

--
-- Структура на таблица `singers`
--

CREATE TABLE `singers` (
  `id_singer` int(11) NOT NULL,
  `singer_name` varchar(100) NOT NULL,
  `date_del` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Структура на таблица `songs`
--

CREATE TABLE `songs` (
  `id_song` int(11) NOT NULL,
  `song_name` varchar(30) NOT NULL,
  `date_input` date NOT NULL,
  `time_input` time NOT NULL,
  `date_del` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Схема на данните от таблица `songs`
--

INSERT INTO `songs` (`id_song`, `song_name`, `date_input`, `time_input`, `date_del`) VALUES
(1, 'hello', '2014-03-17', '00:00:00', NULL),
(2, 'df', '2014-03-17', '00:00:00', NULL),
(3, 'hello', '2014-03-17', '09:50:35', NULL),
(4, 'rio', '2014-03-17', '09:50:54', NULL),
(5, 'f', '2014-03-17', '09:51:59', NULL),
(6, 'f', '2014-03-17', '09:52:55', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id_reg`);

--
-- Indexes for table `singers`
--
ALTER TABLE `singers`
  ADD PRIMARY KEY (`id_singer`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id_song`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id_reg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `singers`
--
ALTER TABLE `singers`
  MODIFY `id_singer` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id_song` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
