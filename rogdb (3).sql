-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 31, 2024 alle 23:11
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

--
-- Dump dei dati per la tabella `editori`
--

INSERT INTO `editori` (`e_mail`, `nome`, `password`, `sede`) VALUES
('aaa', 'aaa', 'aaa', 'oriago');

-- --------------------------------------------------------

--
-- Struttura della tabella `giochi`
--

CREATE TABLE `giochi` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descrizione` varchar(500) NOT NULL,
  `prezzo` float NOT NULL,
  `sconto` int(11) NOT NULL,
  `mail_editore` varchar(255) NOT NULL,
  `main_img` varchar(255) NOT NULL,
  `valutazione` float NOT NULL,
  `data_pubblicazione` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `giochi`
--

INSERT INTO `giochi` (`id`, `nome`, `descrizione`, `prezzo`, `sconto`, `mail_editore`, `main_img`, `valutazione`, `data_pubblicazione`) VALUES
(1, 'mortal kombat', 'cazzotti', 60, 0, 'aaa', '', 0, '2024-03-08'),
(2, 'sss', 'fsad', 3, 0, 'aaa', '', 0, '2024-02-27'),
(3, 'aaa', 'aaa', 23, 0, 'aaa', '', 0, '2024-02-28'),
(4, 'fff', 'ssss', 3, 0, 'aaa', '', 0, '0000-00-00'),
(5, 'just cause', 'ssssss', 12, 0, 'aaa', '', 0, '0001-01-01'),
(6, 'just cause 3', 'Yu shut grapplin end go ZOOOOOOOOM and then BOOOOOM  end WOW, big plane GNEEEEEEWWWWW and KABOOOM', 14.78, 0, 'aaa', '', 0, '2024-03-11'),
(7, 'giovanniaaa', 'ultimo aggiunto\r\ne figo\r\ntest\r\naaa', 111, 0, 'aaa', '', 0, '2024-02-29'),
(8, 'test img', 'aaa', 22, 0, 'aaa', 'x', 0, '2024-02-29'),
(9, 'test vero', 'upload custom image', 1, 0, 'aaa', 'barche.png', 0, '2024-03-01'),
(10, 'ultimate test', 'immagine caricata spero', 24, 0, 'aaa', 'barche.png', 0, '2024-03-16'),
(11, '14123', 'qadsf', 234, 0, 'aaa', 'barche.png', 0, '2024-03-15'),
(12, 'ee', 'adasf', 315, 0, 'aaa', 'Icon.png', 0, '2024-03-16'),
(13, 'hreasfg', 'wryaghjjj', 134, 0, 'aaa', 'myflixer.png', 0, '2024-03-15'),
(14, 'egqwreq', 'fqegd', 12, 0, 'aaa', 'x', 0, '2024-03-08');

-- --------------------------------------------------------

--
-- Struttura della tabella `immagini`
--

CREATE TABLE `immagini` (
  `game_id` int(11) NOT NULL,
  `source_img` varchar(255) NOT NULL
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
('aaa', 'aaa', 'aaa', '2024-03-04', '2024-03-09', 'aaa'),
('jjj', 'jjj', 'jjj', '2024-02-28', '2024-03-11', 'jjj');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
