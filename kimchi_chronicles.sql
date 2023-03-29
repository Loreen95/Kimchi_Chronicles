-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mariadb
-- Gegenereerd op: 29 mrt 2023 om 18:53
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
(1, 'Aubergine'),
(2, 'Gehakt'),
(3, 'Wortel'),
(4, 'Tofu'),
(5, 'Tauge'),
(6, 'Koreaanse rijst'),
(7, 'Japanse rijst'),
(8, 'Zout'),
(9, 'Peper'),
(10, 'Olijfolie'),
(11, 'rest'),
(15, 'tewt'),
(16, '123123'),
(17, 'Bacon'),
(18, 'Bacon'),
(19, 'Bacon'),
(20, 'Bacon');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `instructions`
--

CREATE TABLE `instructions` (
  `recipe_id` int(11) NOT NULL,
  `steps` text NOT NULL,
  `steps_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `instructions`
--

INSERT INTO `instructions` (`recipe_id`, `steps`, `steps_id`) VALUES
(2, 'Kook de rijst volgens de verpakking. Snij een uitje en hak een teentje knoflook fijn. Ontdoe de zaadjes van de peper en hak ook deze fijn. Fruit dit kort aan in een pan met een klein scheutje zonnebloemolie.', 1),
(2, 'Op het moment dat je ziet dat de uitjes gaan verkleuren, voeg je het rundergehakt toe. Even rul bakken.\r\nZodra het gehakt gaar is, voeg je een eetlepel sojasaus toe. Roer goed door. Voeg nu een eetlepel suiker toe. Roer weer goed door en laat nog voor een minuutje zachtjes bakken.', 2),
(4, 'On medium high heat preheat a pan/wok and once heated, add the cooking oil and spread it well with a spatula.', 4),
(4, 'Add the garlic, stir it fast for about 10 seconds. Then add the bacon and stir it well until half of it is cooked.', 5),
(4, 'Add the Kimchi and stir until 80% of it is cooked.', 6),
(4, '(Optional) Add the mushrooms and mix them well for a few seconds. Reduce the heat to medium-medium low.', 7),
(4, 'Add the rice and the kimchi juice. Mix all of them together well and thoroughly.', 8),
(4, 'Add the sesame oil and mix them well. Remove from the heat.', 9),
(4, 'Serve the Kimchi fried rice on a plate. Garnish with the sesame seeds, green onion and seaweed strips. (Garnish is all optional). Place the cooked egg on top. Enjoy!', 10);

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
(2, 'Bibimbap', 1, 'bibimbap.jpg', '02:19:48', 'main', 'medium', '2023-03-27'),
(3, 'Japchae', 2, 'japchae.jpg', '02:11:49', 'main', 'medium', '2023-03-27'),
(4, 'Kimchi', 1, 'kimchi.jpg', '00:11:49', 'starter', 'medium', '2023-03-27'),
(5, 'Sticky Rice Dumplings', 2, 'sticky-rice-dumpling.jpg', '01:12:59', 'main', 'medium', '2023-03-27');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `recipe_ingredients`
--

CREATE TABLE `recipe_ingredients` (
  `recipe_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `amount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `recipe_ingredients`
--

INSERT INTO `recipe_ingredients` (`recipe_id`, `ingredient_id`, `amount`) VALUES
(2, 2, '200 gram'),
(4, 15, ''),
(4, 16, '');

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
(2, 'Pascal-Anne', 'Stá', 'sta.pascal-a@kimchi.nl', 'password', 'administrator');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT voor een tabel `instructions`
--
ALTER TABLE `instructions`
  MODIFY `steps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
