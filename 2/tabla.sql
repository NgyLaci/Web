-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: sql211.byetcluster.com
-- Létrehozás ideje: 2024. Máj 14. 06:44
-- Kiszolgáló verziója: 10.4.17-MariaDB
-- PHP verzió: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `if0_36542880_adatok`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tabla`
--

CREATE TABLE `tabla` (
  `username` varchar(255) DEFAULT NULL,
  `titkos` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `tabla`
--

INSERT INTO `tabla` (`username`, `titkos`) VALUES
('katika@gmail.com', 'piros'),
('arpi40@freemail.hu', 'zold'),
('zsanettka@hotmail.com', 'sarga'),
('hatizsak@protonmail.com', 'kek'),
('terpeszterez@citromail.hu', 'fekete'),
('nagysanyi@gmail.hu', 'feher');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
