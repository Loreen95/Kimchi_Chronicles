-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mariadb
-- Gegenereerd op: 31 mrt 2023 om 13:56
-- Serverversie: 10.4.27-MariaDB-1:10.4.27+maria~ubu2004
-- PHP-versie: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kimchi_chronicles`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`) VALUES
(75, 'biefstukreepjes'),
(76, 'shiitake paddestoelen'),
(77, 'knoflook'),
(78, 'soyasaus'),
(79, 'suiker'),
(80, 'sesamolie'),
(81, 'sesamzaden'),
(82, 'ei'),
(83, 'spinazie'),
(84, 'zoete aardappel'),
(85, '(witte) ui'),
(86, '(gele) ui'),
(87, 'champignon'),
(88, 'wortel'),
(89, 'paprika'),
(90, 'zwarte peper'),
(91, 'zout'),
(92, 'olijfolie'),
(93, 'bloem'),
(94, 'zilvervliesrijst'),
(95, 'tauge'),
(96, 'gochujang'),
(97, 'azijn'),
(98, 'water'),
(99, 'rundergehakt'),
(100, 'kipfilet'),
(101, 'kipgehakt'),
(102, 'half-om-halfgehakt'),
(103, 'chilipeper'),
(104, 'cayennepeper'),
(105, 'paprikapoeder'),
(106, 'chillivlokken'),
(107, 'avocado');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `instructions`
--

CREATE TABLE `instructions` (
  `recipe_id` int(11) NOT NULL,
  `steps` text NOT NULL,
  `steps_id` int(11) NOT NULL,
  `steps_desc` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `instructions`
--

INSERT INTO `instructions` (`recipe_id`, `steps`, `steps_id`, `steps_desc`) VALUES
(36, 'test', 52, NULL),
(36, 'test123', 53, NULL),
(36, 'test23456', 54, NULL),
(36, 'test234567', 55, NULL),
(37, 'test', 56, NULL),
(37, 'test2', 57, NULL),
(37, 'test3', 58, NULL),
(37, 'test4', 59, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `duration` time NOT NULL,
  `course` enum('starter','main','dessert') NOT NULL,
  `difficulty` enum('easy','medium','hard') NOT NULL,
  `added` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `recipes`
--

INSERT INTO `recipes` (`id`, `title`, `author`, `image`, `duration`, `course`, `difficulty`, `added`) VALUES
(36, 'Bibimbap', 1, 'bibimbap.jpg', '01:30:00', 'main', 'medium', '2023-03-31'),
(37, 'Japchae', 1, 'japchae.jpg', '00:35:00', 'main', 'easy', '2023-03-31');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `recipe_ingredients`
--

CREATE TABLE `recipe_ingredients` (
  `recipe_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `recipe_ingredients`
--

INSERT INTO `recipe_ingredients` (`recipe_id`, `ingredient_id`, `amount`, `id`) VALUES
(36, 82, '1', 71),
(36, 92, '1 eetlepel', 72),
(36, 99, '250 gram', 73),
(36, 80, '1 eetlepel', 74),
(36, 76, '250 gram', 75),
(36, 78, '2 theelepels', 76),
(36, 83, '250 gram', 77),
(36, 95, '300 gram', 78),
(36, 88, '200 gram', 79),
(36, 94, '360 gram', 80),
(36, 91, '3', 81),
(37, 85, '', 82),
(37, 75, '1 hele', 83),
(37, 87, '', 84),
(37, 103, '', 85),
(37, 96, '250 gram', 86),
(37, 77, '', 87),
(37, 89, '', 88),
(37, 80, '150 gram', 89),
(37, 81, '1 hele', 90),
(37, 78, '', 91),
(37, 95, '', 92),
(37, 88, '1 theelepel', 93),
(37, 91, '', 94),
(37, 90, '', 95);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('user','administrator') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `role`) VALUES
(1, 'Cornelius', 'Arne ', 'cornelius.a@kimchi.nl', 'password', 'administrator'),
(2, 'Pascal-Anne', 'Sta', 'sta.pascal-a@kimchi.nl', 'password', 'administrator'),
(3, 'Lisa', 'Test', 'test12@test.nl', 'password', 'user'),
(4, 'Joost', 'van Gent', 'joostvangent911@gmail.com', 'xycumyzr', 'user');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `instructions`
--
ALTER TABLE `instructions`
  ADD PRIMARY KEY (`steps_id`),
  ADD KEY `recipe_id` (`recipe_id`);

--
-- Indexen voor tabel `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`);

--
-- Indexen voor tabel `recipe_ingredients`
--
ALTER TABLE `recipe_ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipe_id` (`recipe_id`),
  ADD KEY `ingredient_id` (`ingredient_id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT voor een tabel `instructions`
--
ALTER TABLE `instructions`
  MODIFY `steps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT voor een tabel `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT voor een tabel `recipe_ingredients`
--
ALTER TABLE `recipe_ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `instructions`
--
ALTER TABLE `instructions`
  ADD CONSTRAINT `instructions_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`);

--
-- Beperkingen voor tabel `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`author`) REFERENCES `users` (`id`);

--
-- Beperkingen voor tabel `recipe_ingredients`
--
ALTER TABLE `recipe_ingredients`
  ADD CONSTRAINT `recipe_ingredients_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`),
  ADD CONSTRAINT `recipe_ingredients_ibfk_2` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
