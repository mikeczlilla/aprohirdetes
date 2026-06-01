-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2026. Jún 01. 14:39
-- Kiszolgáló verziója: 10.4.28-MariaDB
-- PHP verzió: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `aprohirdetes`
--
CREATE DATABASE IF NOT EXISTS aprohirdetes DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE aprohirdetes;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `id` int(11) NOT NULL,
  `fnev` varchar(100) NOT NULL,
  `vnev` varchar(100) NOT NULL,
  `knev` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jelszo` varchar(30) NOT NULL,
  `tszam` varchar(11) NOT NULL,
  `sztdatum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`id`, `fnev`, `vnev`, `knev`, `email`, `jelszo`, `tszam`, `sztdatum`) VALUES
(1, 'hlevente08', 'Holló', 'Levente', 'hlevente08@mail.com', 'qwert123', '06301234567', '2008-09-07'),
(3, 'tp67', 'Teszt', 'Péter', 'tp67@mail.com', 'asdf1234', '06708943371', '2006-06-07');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `hirdetesek`
--

CREATE TABLE `hirdetesek` (
  `id` int(11) NOT NULL,
  `cim` varchar(100) NOT NULL,
  `ar` int(11) NOT NULL,
  `leiras` varchar(300) NOT NULL,
  `kep` varchar(300) NOT NULL,
  `feltoltes_ideje` date NOT NULL DEFAULT '2026-04-12',
  `felhasznaloId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `hirdetesek`
--

INSERT INTO `hirdetesek` (`id`, `cim`, `ar`, `leiras`, `kep`, `feltoltes_ideje`, `felhasznaloId`) VALUES
(1, 'Suzuki Swift', 299000, 'Jó állapotú, garázsban tartott Swift', '../frontend/kep/hirdetesek_kep/letöltés.jpg', '2026-06-01', 3),
(2, 'Bojler', 20000, 'Nem lopott, kiváló állapotú, jó egészségnek örvend bojler', '../frontend/kep/hirdetesek_kep/virtual.png', '2026-06-01', 3),
(3, 'Tűzcsap', 54999, 'Vízzel', '../frontend/kep/hirdetesek_kep/Downtown_Charlottesville_fire_hydrant.jpg', '2026-06-01', 1),
(4, 'Oplel', 500000, 'Korza, allapota ok NEM LOPOTT!!!!!!', '../frontend/kep/hirdetesek_kep/corsa.jpg', '2026-06-01', 3),
(5, 'egy marék szanaksz', 400, 'használt, sxzanakxszk', '../frontend/kep/hirdetesek_kep/_101013372_img_6877.jpg', '2026-06-01', 3);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `hirdetesek`
--
ALTER TABLE `hirdetesek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `felhasznaloId` (`felhasznaloId`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `hirdetesek`
--
ALTER TABLE `hirdetesek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `hirdetesek`
--
ALTER TABLE `hirdetesek`
  ADD CONSTRAINT `felhasznaloId` FOREIGN KEY (`felhasznaloId`) REFERENCES `felhasznalok` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
