-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 02 Lut 2023, 14:02
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `url_shortener`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `bans`
--

CREATE TABLE `bans` (
  `ID` int(11) NOT NULL,
  `ip` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Zrzut danych tabeli `bans`
--

INSERT INTO `bans` (`ID`, `ip`) VALUES
(1, 'X'),
(2, 'X');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `local_key` text NOT NULL,
  `user_user` text NOT NULL,
  `user_discriminator` text NOT NULL,
  `user_id` text NOT NULL,
  `user_avatar` text NOT NULL,
  `user_api_key` text NOT NULL,
  `user_type` text NOT NULL,
  `link_shorten` text NOT NULL,
  `link_full` text NOT NULL,
  `local_creation` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `lang` text NOT NULL DEFAULT 'en'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `sessions`
--

INSERT INTO `sessions` (`id`, `local_key`, `user_user`, `user_discriminator`, `user_id`, `user_avatar`, `user_api_key`, `user_type`, `link_shorten`, `link_full`, `local_creation`, `lang`) VALUES
(0, '_', 'Example', '0000', '000000000000000000', '', '_', 'discord', '', '', '2023-02-02 13:00:50', 'en');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `url`
--

CREATE TABLE `url` (
  `id` int(11) NOT NULL,
  `shorten_url` varchar(200) NOT NULL,
  `full_url` varchar(2048) NOT NULL,
  `clicks` int(11) NOT NULL,
  `clientIP` text NOT NULL,
  `ADDED` datetime NOT NULL,
  `userid` text NOT NULL,
  `localkey` text NOT NULL DEFAULT '\'OLD\'',
  `status` text NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `url`
--

INSERT INTO `url` (`id`, `shorten_url`, `full_url`, `clicks`, `clientIP`, `ADDED`, `userid`, `localkey`, `status`) VALUES
(0, 'example', 'https://example.com', 0, '0', '2021-10-01 21:57:41', '000000000000000000', 'Wzf4HmS1hF4mpanQhEnnlBguZoRSVy7FBJuSl9j1ePkpLm9xJ0', 'ACTIVE');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `bans`
--
ALTER TABLE `bans`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `url`
--
ALTER TABLE `url`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `bans`
--
ALTER TABLE `bans`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=309;

--
-- AUTO_INCREMENT dla tabeli `url`
--
ALTER TABLE `url`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1769;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
