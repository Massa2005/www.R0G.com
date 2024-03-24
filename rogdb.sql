-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 09, 2024 alle 19:30
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rogdb`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `commenti`
--

CREATE TABLE `commenti` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `mail_utente` varchar(255) NOT NULL,
  `titolo` varchar(255) NOT NULL,
  `commento` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `editori`
--

CREATE TABLE `editori` (
  `e_mail` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sede` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `giochi`
--

CREATE TABLE `giochi` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `prezzo` float NOT NULL,
  `sconto` int(11) NOT NULL,
  `mail_editore` varchar(255) NOT NULL,
  `valutazione` float NOT NULL,
  `data_pubblicazione` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `keys`
--

CREATE TABLE `keys` (
  `game_id` int(11) NOT NULL,
  `key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `libreria`
--

CREATE TABLE `libreria` (
  `mail_utente` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `data_acquisto` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `r_tag_game`
--

CREATE TABLE `r_tag_game` (
  `game_id` varchar(255) NOT NULL,
  `tag_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `tags`
--

CREATE TABLE `tags` (
  `tag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `e_mail` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `data_nascita` date NOT NULL,
  `data_account` date NOT NULL DEFAULT current_timestamp(),
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`e_mail`, `nome`, `cognome`, `data_nascita`, `data_account`, `password`) VALUES
('samuele.zanon@itiszuccante.edu.it', 'Samuele', 'Zanon', '2005-02-13', '2024-03-08', 'Lollollollollol'),
('aaa', 'aaa', 'aaa', '2024-03-04', '2024-03-09', 'aaa');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
