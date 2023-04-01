-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mariadb
-- Gegenereerd op: 01 apr 2023 om 22:26
-- Serverversie: 10.4.28-MariaDB-1:10.4.28+maria~ubu2004
-- PHP-versie: 8.1.15

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
(1, 'Biefstukreepjes'),
(4, 'Soyasaus'),
(5, 'Suiker'),
(6, 'Sesamolie'),
(7, 'Sesamzaden'),
(8, 'Ei'),
(9, 'Spinazie'),
(10, 'Zoete aardappel'),
(11, '(Witte) ui'),
(13, 'Champignon'),
(14, 'Wortel'),
(15, 'Paprika'),
(16, 'Zwarte peper'),
(17, 'Zout'),
(18, 'Olijfolie'),
(19, 'Bloem'),
(20, 'Zilvervliesrijst'),
(21, 'Tauge'),
(22, 'Gochujang'),
(23, 'Azijn'),
(25, 'Rundergehakt'),
(26, 'Kipfilet'),
(27, 'Kipgehakt'),
(28, 'Half-om-halfgehakt'),
(29, 'Chilipeper'),
(30, 'Cayennepeper'),
(31, 'Paprikapoeder'),
(32, 'Chillivlokken'),
(33, 'Avocado'),
(108, 'Knoflook'),
(109, 'Bruine suiker'),
(110, 'Water'),
(111, 'Shiitakepaddestoelen'),
(112, 'Kimchi'),
(113, 'Enoki paddenstoelen'),
(114, 'Eieren'),
(115, 'Lente ui'),
(116, 'Boter'),
(117, 'Kaas'),
(118, 'Ham'),
(119, 'Spek'),
(120, 'Spam'),
(121, 'Zeewier'),
(122, 'Kleefrijst'),
(123, 'Garnalen'),
(124, 'Oestersaus'),
(125, 'Witte peper');

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
(44, 'Voor vlees, meng het rundergehakt met de eerder genoemde vleessaus. Marineer het vlees gedurende ongeveer 30 minuten terwijl je werkt aan andere ingrediÃ«nten om de smaak te verbeteren. Voeg wat kookolie toe aan een wok en bak het vlees op medium-hoog tot hoog vuur. Het duurt ongeveer 3 tot 5 minuten om het volledig te bakken.', 98, NULL),
(44, 'Meng de ingrediÃ«nten voor de bibimbap saus in een kom.\r\nKook de spinazie en taugÃ©.\r\nSpoel, schil en snijd de wortels in reepjes. Voeg wat kookolie en 1/4 tl fijn zeezout toe aan een wok en bak de wortels op middelhoog tot hoog vuur gedurende 2 tot 3 minuten.', 99, NULL),
(44, 'Schoon/ spoel de shiitake-paddenstoelen en snijd ze in dunne plakjes. Voeg wat kookolie en 1/4 theelepel fijn zeezout toe aan een wok en bak de paddenstoelen op medium hoog tot hoog vuur tot ze allemaal gaar zijn. (Het duurt ongeveer 2 tot 3 minuten.)', 100, NULL),
(44, 'Maak gebakken eieren. (Hoewel sunny side up veel voorkomt, kun je ze maken zoals je wilt.)\r\nDoe de rijst in een kom en voeg het vlees, de groenten, gekruide zeewier, bibimbapsaus en het ei bovenop de rijst toe. Serveer.\r\nOm te eten, meng je de ingrediÃ«nten in de kom en geniet je ervan!', 101, NULL),
(45, 'In een antiaanbakpan of goed gekruide gietijzeren skillet, smelt boter op middellaag vuur en voeg uien toe. Bak de uien al roerend tot ze beginnen te sissen, ongeveer 2 minuten. Voeg kimchi en kimchisaus toe, en roer tot het aan de kook komt, ongeveer 3 minuten. Voeg Spam toe en bak tot de saus bijna is opgedroogd, ongeveer 5 minuten.', 102, NULL),
(45, 'Breek de rijst in de pan met een spatel en roer het door elkaar. Zet het vuur op medium. Kook al roerend tot de rijst de saus heeft opgenomen en zeer heet is, ongeveer 5 minuten. Roer sojasaus en sesamolie erdoor. Proef en pas aan met meer sojasaus, sesamolie of kimchisaus. Draai het vuur iets lager, maar laat de rijst nog lichtjes bruinen terwijl je de eieren bakt.', 103, NULL),
(45, 'Plaats een kleine antiaanbakpan op middelhoog vuur en voeg de plantaardige olie toe. Wanneer het heet is, voeg de eieren toe, breng op smaak met zout en bak ze naar jouw gewenste gaarheid. Serveer de rijst met daarop de gebakken eieren, nori en een snufje sesamzaadjes.', 104, NULL),
(48, 'Kook de zoete aardappelnoedels volgens de instructies op de verpakking. Spoel ze af onder koud water en laat ze uitlekken.\r\nVerhit de plantaardige olie in een wok of koekenpan op middelhoog vuur. Voeg de knoflook toe en roerbak 30 seconden.', 113, NULL),
(48, 'Voeg de paprika, ui, lente-uitjes en shiitake paddenstoelen toe en roerbak gedurende 5 minuten, of tot de groenten zacht zijn.\r\nVoeg de spinazie toe en roerbak totdat deze net verwelkt is.', 114, NULL),
(48, 'Voeg de gekookte noedels, sojasaus, sesamolie en suiker toe. Roerbak alles samen gedurende 2-3 minuten, of totdat de noedels en groenten volledig bedekt zijn met de saus.\r\nServeer warm of op kamertemperatuur.', 115, NULL),
(49, 'Week de kleefrijst gedurende minstens 4 uur in water. Giet de rijst af en laat deze uitlekken.\r\nVerhit een eetlepel olie in een pan op middelhoog vuur. Voeg de ui en knoflook toe en roerbak 1 minuut.', 116, NULL),
(49, 'Voeg het varkensgehakt en de garnalen toe en bak totdat het vlees bruin is.\r\nVoeg de sojasaus, oestersaus, suiker, zout en witte peper toe en roer alles door elkaar. Voeg de shiitake paddenstoelen toe en bak 2 minuten langer.\r\nDoe de kleefrijst in een kom en meng de vulling erdoorheen.', 117, NULL),
(49, 'Week de bamboe bladeren in warm water totdat ze zacht zijn. Knip ze in stukken van ongeveer 20 cm lang. Leg een stukje bamboe blad op je handpalm en leg hierop een eetlepel van het rijstmengsel. Vouw de bladeren dicht en bind ze dicht met touw. Herhaal dit proces met de rest van het rijstmengsel.\r\nKook de dumplings in een grote pan met water gedurende ongeveer 1 uur.', 118, NULL),
(49, 'Haal de dumplings uit de pan en laat ze uitlekken. Bestrijk de dumplings met het losgeklopte ei en grill ze gedurende 5-7 minuten totdat ze goudbruin en knapperig zijn.\r\nServeer warm.', 119, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `author` int(11) NOT NULL,
  `duration` time NOT NULL,
  `course` enum('starter','main','dessert') NOT NULL,
  `difficulty` enum('easy','medium','hard') NOT NULL,
  `added` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `recipes`
--

INSERT INTO `recipes` (`id`, `title`, `image`, `author`, `duration`, `course`, `difficulty`, `added`) VALUES
(44, 'Bibimbap', 'bibimbap.jpg', 1, '01:30:00', 'main', 'medium', '2023-04-01'),
(45, 'Kimchi Fried Rice', 'kimchi.jpg', 1, '00:30:00', 'main', 'easy', '2023-04-01'),
(48, 'Japchae', 'japchae.jpg', 1, '00:40:00', 'main', 'easy', '2023-04-01'),
(49, 'Sticky Rice Dumplings', 'sticky-rice-dumpling.jpg', 1, '03:00:00', 'main', 'medium', '2023-04-01');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `recipe_ingredients`
--

CREATE TABLE `recipe_ingredients` (
  `recipe_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `amount` varchar(266) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `recipe_ingredients`
--

INSERT INTO `recipe_ingredients` (`recipe_id`, `ingredient_id`, `amount`, `id`) VALUES
(44, 23, '1 eetlepel', 317),
(44, 109, '1 theelepel', 318),
(44, 22, '2 theelepels', 319),
(44, 108, '3 tenen', 320),
(44, 18, '2 eetlepels', 321),
(44, 25, '2 eetlepels', 322),
(44, 6, '2 eetlepels', 323),
(44, 7, '2 eetlepels', 324),
(44, 111, '100 gram', 325),
(44, 4, '3 eetlepels', 326),
(44, 9, '150 gram', 327),
(44, 5, '2 eetlepels', 328),
(44, 21, '100 gram', 329),
(44, 110, '1 eetlepel', 330),
(44, 14, '1 kleine', 331),
(44, 20, '4 tenen', 332),
(44, 17, '2 eetlepels', 333),
(44, 16, '1 theelepel', 334),
(45, 11, '1 kleine', 335),
(45, 114, '2', 336),
(45, 112, '100 gram', 337),
(45, 6, '2 eetlepels', 338),
(45, 4, '2 eetlepels', 339),
(45, 20, '350 gram', 340),
(45, 17, '2 theelepels', 341),
(48, 11, '1 in reepjes gesnede', 344),
(48, 108, '3 tenen', 345),
(48, 115, '2, in stukjes gesneden', 346),
(48, 18, '2 eetlepels', 347),
(48, 15, '3, in reepjes gesneden', 348),
(48, 6, '2 eetlepels', 349),
(48, 111, '100 gram', 350),
(48, 4, '3 eetlepels', 351),
(48, 9, '150 gram', 352),
(48, 5, '2 theelepels', 353),
(49, 11, '1 (fijngehakt)', 354),
(49, 8, '1', 355),
(49, 123, '100 gram', 356),
(49, 28, '200 gram', 357),
(49, 122, '500 gram', 358),
(49, 108, '3 tenen', 359),
(49, 124, '2 eetlepels', 360),
(49, 111, '10-20 gram gedroogde, geweekte en in stukjes gesneden', 361),
(49, 4, '3 eetlepels', 362),
(49, 5, '1 eetlepel', 363),
(49, 17, '1 theelepel', 364);

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
(1, 'Cornelius', 'Arne', 'cornelius.a@kimchi.nl', '$2y$10$0/9BBQ8Q4gCRFEuBpJDK3eCG0dQ9TdCmLtU2UTYPOhHh3hhJ1ZJL.', 'administrator'),
(2, 'Pascal-Anne', 'Sta', 'pascal-a.sta@kimchi.nl', '$2y$10$rGL8KTdimaMfYzddAO87reFnU1Ci90EFFipTS3jYrzBbFruNHYKxC', 'administrator'),
(4, 'Joost', 'van Gent', 'joostvangent911@gmail.com', '$2y$10$A4051EkFirLCpKGx/lOiyud0wS4aVd6Bi0uCP46cc9Jt5s0lFE/TC', 'user');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT voor een tabel `instructions`
--
ALTER TABLE `instructions`
  MODIFY `steps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT voor een tabel `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT voor een tabel `recipe_ingredients`
--
ALTER TABLE `recipe_ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=365;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
