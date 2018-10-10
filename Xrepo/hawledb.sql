-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 10 Paź 2018, 15:03
-- Wersja serwera: 10.1.36-MariaDB
-- Wersja PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `hawledb`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Item` int(11) NOT NULL,
  `RegionalWarehouse` varchar(40) NOT NULL,
  `Quantity` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `inventory`
--

INSERT INTO `inventory` (`Id`, `Item`, `RegionalWarehouse`, `Quantity`) VALUES
(1, 1, 'Magazyn Testowy', 20);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(40) NOT NULL,
  `SerialNumber` varchar(40) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `item`
--

INSERT INTO `item` (`Id`, `Name`, `SerialNumber`) VALUES
(1, 'Item testowy', '123456789');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orderheader`
--

DROP TABLE IF EXISTS `orderheader`;
CREATE TABLE IF NOT EXISTS `orderheader` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Login` varchar(40) NOT NULL,
  `Date` date NOT NULL,
  `Number` varchar(40) NOT NULL,
  `Type` int(11) NOT NULL,
  `Descritpion` text NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orderlines`
--

DROP TABLE IF EXISTS `orderlines`;
CREATE TABLE IF NOT EXISTS `orderlines` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `OrderNumber` varchar(40) NOT NULL,
  `LineNumber` int(11) NOT NULL,
  `ItemId` int(11) NOT NULL,
  `RegionalWarehouse` varchar(40) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `regionalwarehouse`
--

DROP TABLE IF EXISTS `regionalwarehouse`;
CREATE TABLE IF NOT EXISTS `regionalwarehouse` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(40) NOT NULL,
  `UserLogin` varchar(40) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `regionalwarehouse`
--

INSERT INTO `regionalwarehouse` (`Id`, `Name`, `UserLogin`) VALUES
(1, 'Magazyn Testowy', 'test');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Login` varchar(40) NOT NULL,
  `Password` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`Id`, `Login`, `Password`) VALUES
(1, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
