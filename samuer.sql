-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: mysql.metropolia.fi
-- Generation Time: 12.05.2019 klo 18:31
-- Palvelimen versio: 10.1.38-MariaDB
-- PHP Version: 7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `samuer`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `apartment`
--

CREATE TABLE `apartment` (
  `ID` varchar(10) COLLATE utf8_swedish_ci NOT NULL,
  `apartment_number` varchar(10) COLLATE utf8_swedish_ci NOT NULL,
  `estate_ID` int(11) NOT NULL,
  `user_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Vedos taulusta `apartment`
--

INSERT INTO `apartment` (`ID`, `apartment_number`, `estate_ID`, `user_ID`) VALUES
('HR7_H77', 'H77', 2, 2),
('KK6_B66', 'B66', 1, 1);

-- --------------------------------------------------------

--
-- Rakenne taululle `bullet`
--

CREATE TABLE `bullet` (
  `ID` int(10) NOT NULL,
  `estate_ID` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `text` varchar(1000) COLLATE utf8_swedish_ci NOT NULL,
  `publish` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Vedos taulusta `bullet`
--

INSERT INTO `bullet` (`ID`, `estate_ID`, `date`, `text`, `publish`) VALUES
(1, 1, '2019-04-06 07:02:14', 'Kerhohuoneen remontti suoritetaan 15.4-26.4 välisenä aikana. Tästä johtuen kerhohuone on valitettavasti poissa käytöstä edellä mainitun ajan.', 1),
(2, 1, '2019-05-06 07:03:48', 'Kylpyhuoneiden putkiremontti suoritetaan 13.5-17.5 välisenä aikana.', 1),
(3, 2, '2019-04-06 06:59:25', 'Vesikatko maanantaina 22.4. kello 9-12', 1),
(4, 1, '2019-01-11 22:00:00', 'Kerhohuoneessa järjestetään peli-ilta lauantaina 26.1. taloyhtiön asukkaille. Ohjelmassa on yhdessäoloa, pelailua ja tarjolla on ruokaa ja juomista. Tervetuloa!', 1),
(5, 2, '2019-04-05 14:04:00', 'Keittiön putkiremontti suoritetaan 22.4-26-4. välisenä aikana. Pahoittelemme tästä aiheutuvaa häiriötä. Remontista lähetetään tarkempi kuvaus sähköpostitse.', 0),
(6, 2, '2019-03-04 12:37:00', 'Kerhohuoneessa järjestetään peli-ilta perjantaina 22.3. kello 18 alkaen. Luvassa pelailua ja yhdessäoloa sekä tarjolla on ruokaa ja juomaa. Kaikki ovat tervetulleita!', 0);

-- --------------------------------------------------------

--
-- Rakenne taululle `estate`
--

CREATE TABLE `estate` (
  `ID` int(11) NOT NULL,
  `name` varchar(25) CHARACTER SET latin1 NOT NULL,
  `address` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Vedos taulusta `estate`
--

INSERT INTO `estate` (`ID`, `name`, `address`) VALUES
(1, 'Kikkihiiren Luukut As Oy', 'Kontulankaari 6'),
(2, 'Akun Peräluukku Oy', 'Hullunraitti 7');

-- --------------------------------------------------------

--
-- Rakenne taululle `user`
--

CREATE TABLE `user` (
  `user_ID` int(10) NOT NULL,
  `username` varchar(25) CHARACTER SET latin1 NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 NOT NULL,
  `firstname` varchar(50) CHARACTER SET latin1 NOT NULL,
  `lastname` varchar(50) CHARACTER SET latin1 NOT NULL,
  `phone` varchar(25) CHARACTER SET latin1 NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Vedos taulusta `user`
--

INSERT INTO `user` (`user_ID`, `username`, `password`, `firstname`, `lastname`, `phone`, `email`, `admin`) VALUES
(1, 'henrihok', 'salasana', 'Henrik', 'Hokkanen', '0406666666', 'henukeppi@mikkihiiri.fi', 0),
(2, 'samuelr', 'passu', 'Samuel', 'Räsänen', '0407777777', 'samuel.rasanen@posti.fi', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apartment`
--
ALTER TABLE `apartment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `estate_ID` (`estate_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `bullet`
--
ALTER TABLE `bullet`
  ADD PRIMARY KEY (`ID`,`date`),
  ADD KEY `estate` (`estate_ID`);

--
-- Indexes for table `estate`
--
ALTER TABLE `estate`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bullet`
--
ALTER TABLE `bullet`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `estate`
--
ALTER TABLE `estate`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Rajoitteet vedostauluille
--

--
-- Rajoitteet taululle `apartment`
--
ALTER TABLE `apartment`
  ADD CONSTRAINT `apartment_ibfk_1` FOREIGN KEY (`estate_ID`) REFERENCES `estate` (`ID`),
  ADD CONSTRAINT `apartment_ibfk_2` FOREIGN KEY (`user_ID`) REFERENCES `user` (`user_ID`);

--
-- Rajoitteet taululle `bullet`
--
ALTER TABLE `bullet`
  ADD CONSTRAINT `estate` FOREIGN KEY (`estate_ID`) REFERENCES `estate` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
