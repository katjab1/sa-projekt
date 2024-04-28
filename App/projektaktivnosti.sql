-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Gostitelj: localhost
-- Čas nastanka: 06. jun 2023 ob 12.56
-- Različica strežnika: 5.7.11
-- Različica PHP: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `projektaktivnosti`
--

-- --------------------------------------------------------

--
-- Struktura tabele `datumi`
--

CREATE TABLE `datumi` (
  `IDdatuma` int(11) NOT NULL,
  `datum` varchar(255) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `datumi`
--

INSERT INTO `datumi` (`IDdatuma`, `datum`) VALUES
(1072023, '1. 7. 2023'),
(3052023, '3. 5. 2023'),
(6062023, '6. 6. 2023'),
(12032023, '12.3.2023'),
(12062023, '12. 6. 2023'),
(12122023, '12. 12. 2023'),
(18042023, '18. 4. 2023'),
(18062023, '18. 6. 2023'),
(24250623, 'Zadnji vikend v juniju'),
(30052023, '30. 5. 2023'),
(30072023, '30. 7. 2023');

-- --------------------------------------------------------

--
-- Struktura tabele `dogodek_datum`
--

CREATE TABLE `dogodek_datum` (
  `IDdogodka` int(11) NOT NULL,
  `IDdatuma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `dogodek_datum`
--

INSERT INTO `dogodek_datum` (`IDdogodka`, `IDdatuma`) VALUES
(5, 1072023),
(2, 3052023),
(44, 12062023),
(45, 12062023),
(1, 18042023),
(2, 18042023),
(4, 18062023),
(3, 24250623),
(3, 30052023),
(3, 30072023);

-- --------------------------------------------------------

--
-- Struktura tabele `dogodki`
--

CREATE TABLE `dogodki` (
  `IDdogodka` int(11) NOT NULL,
  `ime` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `opis` varchar(255) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `sifraP` varchar(5) COLLATE utf8_slovenian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `dogodki`
--

INSERT INTO `dogodki` (`IDdogodka`, `ime`, `opis`, `sifraP`) VALUES
(1, 'Razstava maltežanov', 'Pasja razstava za maltežane', 'USCMB'),
(2, 'Izobraževanje novincev', 'Izobraževanje za tretma proti zajedavcem', 'VELDV'),
(3, 'Srečanje kluba', 'Redno srečanje za člane kluba', 'ZUNDV'),
(4, 'Predavanje veterinarja', 'Predavanje dr. Irme Strnad', 'VELDV'),
(5, 'Zaključni piknik', 'Piknik za člane in redne stranke', 'ZUNDV'),
(44, 'Aktivnost', 'Nova aktivnost', 'USCMB'),
(45, 'Še en dogodek', 'Še ena nova aktivnost', 'ZUNDV');

-- --------------------------------------------------------

--
-- Struktura tabele `prostori`
--

CREATE TABLE `prostori` (
  `sifraP` varchar(5) COLLATE utf8_slovenian_ci NOT NULL,
  `ime` varchar(255) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `prostori`
--

INSERT INTO `prostori` (`sifraP`, `ime`) VALUES
('USCMB', 'UŠC Maribor'),
('VELDV', 'Velika dvorana'),
('ZUNDV', 'Zunanje dvorišče');

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `datumi`
--
ALTER TABLE `datumi`
  ADD PRIMARY KEY (`IDdatuma`);

--
-- Indeksi tabele `dogodek_datum`
--
ALTER TABLE `dogodek_datum`
  ADD PRIMARY KEY (`IDdogodka`,`IDdatuma`),
  ADD KEY `IDdatuma` (`IDdatuma`);

--
-- Indeksi tabele `dogodki`
--
ALTER TABLE `dogodki`
  ADD PRIMARY KEY (`IDdogodka`),
  ADD KEY `sifraP` (`sifraP`);

--
-- Indeksi tabele `prostori`
--
ALTER TABLE `prostori`
  ADD PRIMARY KEY (`sifraP`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `dogodki`
--
ALTER TABLE `dogodki`
  MODIFY `IDdogodka` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- Omejitve tabel za povzetek stanja
--

--
-- Omejitve za tabelo `dogodek_datum`
--
ALTER TABLE `dogodek_datum`
  ADD CONSTRAINT `dogodek_datum_ibfk_1` FOREIGN KEY (`IDdogodka`) REFERENCES `dogodki` (`IDdogodka`),
  ADD CONSTRAINT `dogodek_datum_ibfk_2` FOREIGN KEY (`IDdatuma`) REFERENCES `datumi` (`IDdatuma`);

--
-- Omejitve za tabelo `dogodki`
--
ALTER TABLE `dogodki`
  ADD CONSTRAINT `dogodki_ibfk_1` FOREIGN KEY (`sifraP`) REFERENCES `prostori` (`sifraP`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
