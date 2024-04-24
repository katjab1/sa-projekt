-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Gostitelj: localhost
-- Čas nastanka: 22. jun 2023 ob 10.16
-- Različica strežnika: 5.7.11
-- Različica PHP: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `projektuporabniki`
--

-- --------------------------------------------------------

--
-- Struktura tabele `uporabniki`
--

CREATE TABLE `uporabniki` (
  `IDup` int(11) NOT NULL,
  `ime` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `enaslov` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `geslo` varchar(255) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `uporabniki`
--

INSERT INTO `uporabniki` (`IDup`, `ime`, `enaslov`, `geslo`) VALUES
(1, 'Katja', 'katja@jaz.com', 'mojegeslo'),
(4, 'katja', 'katja@novo', '$2y$10$V11zmvoE6zqP2/FmAkSMw.OzhFzI.zWf.KO1nJsvts05ew/0sZXmy'),
(5, 'Nov', 'nov@uporabnik', '$2y$10$IQ9z7i136XwUJ7r5ABYaVOgPdIs1bMlDaCzcekT0.Igc0sYc6b9qu');

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `uporabniki`
--
ALTER TABLE `uporabniki`
  ADD PRIMARY KEY (`IDup`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `uporabniki`
--
ALTER TABLE `uporabniki`
  MODIFY `IDup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
