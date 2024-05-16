-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 17, 2024 alle 01:32
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
  `commento` varchar(500) NOT NULL,
  `valutazione` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `commenti`
--

INSERT INTO `commenti` (`id`, `game_id`, `mail_utente`, `titolo`, `commento`, `valutazione`) VALUES
(4, 20, 'aaa', 'zdbfgdxc', 'vnzxcnbxcbv', 5),
(5, 20, 'aaa', 'vzbngyrki', 'hgfkvcm', 5),
(7, 21, 'aaa', 'best game in the world', 'che ne so', 10),
(8, 51, 'marco@gmail.com', 'best game in the world', 'miglior gioco dellesistenza', 10),
(9, 51, 'marco@gmail.com', 'xhe ne so ', 'bho dco roba a caso', 5),
(11, 52, 'marco@gmail.com', 'Gioco migliore del mondo', 'Athur morgan e un figo', 8);

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
('aaa', 'aaa', 'aaa', 'oriago'),
('activision@acti.acti', 'Activision', 'acti', 'Caltanissetta'),
('bbb', 'bbb', 'bbb', 'bbb'),
('ccc', 'aaa', 'ccc', 'sss'),
('easports@ea.sport', 'EA sports', 'sports', 'Silicon valley'),
('eee', 'eee', 'eee', 'eee'),
('guerrilla@games', 'Guerrilla', 'guerrilla', 'Posillipo'),
('naughty.dog@naughty.dog', 'Naughty dog', 'naughty', 'Posillipo a bari'),
('rockstar@rock.com', 'Rockstar', 'rock', 'Los Angeles'),
('tencent@ten.ten', 'Tencent', 'ten', 'Gubbio'),
('ubisoft@ubi.ubi', 'Ubisoft', 'ubi', 'Manhattan');

-- --------------------------------------------------------

--
-- Struttura della tabella `giochi`
--

CREATE TABLE `giochi` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descrizione` varchar(4000) NOT NULL,
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
(20, 'Assassins Creed 2', 'Seguito del primo assassin creed, in cui il protagonista Ezio Auditore, che partendo da Firenze, dovrà farsi strada nella scena di una italia rinascimentale e deve riportare l&#039;ordine, attraverso la sua lama.', 29, 0, 'ubisoft@ubi.ubi', '1000033730.jpg', 9, '2024-04-30'),
(21, 'Assassins Creed', 'templari, che sfruttava le crociate per portare avanti la missione templare.\nMan mano che uccide i bersagli, Altaïr scopre che tutti e nove facevano segretamente parte dei templari e stavano operando per localizzare la &quot;Mela dell&#039;Eden&quot;, reliquia appartenente a un&#039;antica civiltà ormai dimenticata che si dice possedesse poteri divini. Mentre cerca di assassinare Roberto al funerale di Majd Addin a Gerusalemme, Altaïr viene ingannato da un&#039;esca, una giovane templare di nome', 19, 0, 'ubisoft@ubi.ubi', '1000033731.jpg', 0, '2024-04-30'),
(22, 'Assassins Creed 3', 'Assassin&#039;s Creed III è un videogioco sviluppato da Ubisoft Montreal e pubblicato da Ubisoft. È il quinto capitolo della serie originale di Assassin&#039;s Creed, nonché il seguito di Assassin&#039;s Creed: Revelations del 2011.', 24, 0, 'ubisoft@ubi.ubi', '1000033732.jpg', 0, '2024-06-05'),
(23, 'Assassins Creed Black Flag', 'Assassin&#039;s Creed III è un videogioco sviluppato da Ubisoft Montreal e pubblicato da Ubisoft. È il quinto capitolo della serie originale di Assassin&#039;s Creed, nonché il seguito di Assassin&#039;s Creed: Revelations del 2011.', 26, 0, 'ubisoft@ubi.ubi', '1000033733.png', 0, '2024-04-30'),
(24, 'Assassin Creed Unity', 'Continuo della saga degli assassini piÃ¹ famosi del mondo dei videogiochi, questa volta ambientato a Parigi, durante la rivoluzione francese. Impersona ArnÃ² in questa avventura piena di omicidi, templari e amore.', 2.99, 0, 'ubisoft@ubi.ubi', 'acv.jpg', 0, '2024-06-12'),
(25, 'Assassin Creed Syndicate', 'Un mondo non piÃ¹ controllato da sovrani, imperatori, politici o religioni, ma da un nuovo denominatore comune, il denaro. Vesti i panni del ribelle e carismatico Jacob Frye e affronta i tuoi nemici con letali contromosse e rapide uccisioni multiple.', 6.99, 0, 'ubisoft@ubi.ubi', 'beo.jpeg', 0, '2024-04-26'),
(26, 'Call of duty', 'Call of Duty Ã¨ uno sparatutto in prima persona ambientato in alcuni campi di battaglia della seconda guerra mondiale dove il giocatore Ã¨ messo nei panni di un soldato statunitense, uno britannico ed uno sovietico impiegati nel combattimento contro il nemico comune, i tedeschi.', 5.99, 0, 'activision@acti.acti', 'la-nascita-call-of-duty-come-infinity-ward-reinvento-genere-speciale-v8-44019-1280x16.jpg', 0, '2024-04-24'),
(27, 'Overwatch Gold edition', 'Sparatutto ambientato in un futuro non troppo lontano, in cui i giocatori si fronteggiano in frenetici scontri a fuoco alla guida di personaggi dotati ognuno di una propria estetica riconoscibile e di proprie abilitÃ  speciali.', 15.99, 0, 'activision@acti.acti', 'Overwatch_(videogioco).jpg', 0, '2024-04-19'),
(28, 'Crash Bandicoot', 'Crash Bandicoot è un videogioco a piattaforme in cui il giocatore deve guidare il protagonista, Crash, attraverso trentadue livelli sparsi sulle tre isole Wumpa, con l\'obiettivo di sconfiggere Cortex e salvare Tawna. Ciascun livello diventa disponibile solo dopo aver superato il livello precedente.', 29.99, 0, 'activision@acti.acti', 'mahcne.jpeg', 0, '2024-04-24'),
(29, 'Call of duty Black ops 3', 'Il futuro della guerra. Black Ops III trasporta i giocatori in un cupo futuro in cui la nascita di una nuova generazione di soldati Black Ops ha reso labile il confine tra l&#039;umanitÃ  e la tecnologia. Dovrai esplorare le zone piÃ¹ calde di una nuova Guerra Fredda per trovare i tuoi fratelli perduti.', 39, 0, 'activision@acti.acti', 'Black_Ops_3.jpg', 0, '2024-04-11'),
(30, 'Spyro', 'Spyro Ã¨ un giovane draghetto viola particolarmente spavaldo e testardo. Ãˆ considerato il Prescelto dal suo villaggio di Draghi e combatte senza sosta per aiutare i suoi simili e i piÃ¹ deboli di lui. Vive nel Regno dei Draghi insieme a Sparx la libellula, provenendo dal Mondo degli Artigiani.', 41.99, 0, 'activision@acti.acti', 'SzdddrptQcyO3tU3O9ALDT77gpNUnRtP.jpeg', 0, '2024-05-09'),
(31, 'Call of duty Balck ops 2', 'Call of Duty: Black Ops II Ã¨ il sequel dello sparatutto sviluppato da Treyarch nel 2010. La trama del gioco si svolge nel 2025, proponendosi come controparte futuristica della Guerra Fredda di Black Ops e venendo definita di fatto come la &quot;guerra fredda del ventunesimo secolo.', 20, 0, 'activision@acti.acti', '61I+6nlpvNS._AC_UF894,1000_QL80_.jpg', 0, '2024-05-07'),
(32, 'Call of Duty: Ghost', 'San Diego, 2017. Mentre Elias Walker racconta dei &quot;Ghost&quot;, soldati furtivi e invincibili, ai figli David, detto &quot;Hesh&quot;, e Logan, la città viene attaccata all&#039;improvviso da ODIN, un sistema missilistico orbitale americano caduto pochi minuti prima sotto il controllo della Federazione, un&#039;unione degli stati sudamericani che sta gettando nel caos il mondo con vari attacchi terroristici. Elias e i figli si mettono in salvo su una jeep, mentre gli astronauti Baker e Mosley distruggono ODIN, seppur sacrificando le loro vite. Il satellite ha comunque sferrato un attacco abbastanza potente da distruggere le principali città americane, causando circa 27 milioni di vittime.', 34, 0, 'activision@acti.acti', '1000033763.jpg', 0, '2024-08-15'),
(33, 'Call of Duty: World at War', 'Il gioco segue le vicende di due soldati: il marine C. Miller della 1st Marine Division e il fuciliere dell&#039;Armata Rossa Dimitri Petrenko, in forza a una divisione della 3ª Armata d&#039;assalto. Soltanto in una missione (Black Cats) l&#039;utente impersona il sottufficiale Locke, mitragliere a bordo di un idrovolante Consolidated PBY Catalina che, nell&#039;aprile 1945, interviene nel corso di un&#039;ondata di attacchi kamikaze al largo di Okinawa.', 32, 0, 'activision@acti.acti', '1000033762.jpg', 0, '2024-04-30'),
(34, 'Uncharted', 'Nathan Drake vuole avere il suo tesoro, in questa spettacolare avventura dovrai combattere con dei mercenari criminali per accapparrarti il tesoro perduto di eldorado. ', 40, 0, 'naughty.dog@naughty.dog', '1000033764.jpg', 0, '2024-04-30'),
(35, 'Uncharted 2', 'Accompagna nuovamente il cacciatore di tesori Nathan Drake in un&#039;avventura costellata di pericoli mortali, ambientazioni esotiche e salvataggi eroici. Indaga i segreti del tragico viaggio di Marco Polo fino alla leggendaria valle himalayana di Shambhala.', 40, 0, 'naughty.dog@naughty.dog', '1000033765.jpg', 0, '2024-04-30'),
(36, 'The last of us', 'In un mondo post apocalittico, segui l&#039;avventura di Ellie e Joel attraverso l&#039;america in una missione per salvare l&#039;umanita da una infezione mortale.', 100, 0, 'naughty.dog@naughty.dog', '1000033766.png', 0, '2024-04-29'),
(37, 'The last of us parte 2', 'L&#039;attesissimo seguito della prima parte, dove Ellie si trova contro a Abbie, una ragazza simile a lei per certi versi ma totalmente opposta per altri, scopri quali!', 150, 0, 'naughty.dog@naughty.dog', '1000033767.png', 0, '2024-04-30'),
(38, 'Call of duty WWII', 'Call of Duty: WWII racconta la storia dell&#039;eterna fratellanza degli uomini comuni che combattono per difendere la libertÃ  in un mondo sul baratro della tirannia. I giocatori si arruolano per un intenso e drammatico viaggio attraverso i campi di battaglia della guerra.', 25.99, 0, 'activision@acti.acti', 'call of duty.jpg', 0, '2024-05-31'),
(39, 'Uncharted 3', 'Il terzo episodio della bellissima saga d&#039;avventura Uncharted, con il cacciatore di fortuna Nathan Drake alla ricerca del leggendario Atlantis of the Sands in un lungo viaggio nel cuore del deserto arabo che lo vede misurarsi, insieme al suo mentore Victor Sullivan, con la slealtÃ  di una losca organizzazione occulta.', 12, 0, 'naughty.dog@naughty.dog', '71xkzcsL96S._AC_UF894,1000_QL80_.jpg', 0, '2024-06-09'),
(40, 'Uncharted 4', 'Uncharted 4 segna la fine delle avventure di Nathan Drake, personaggio creato da Naughty Dog e chiaramente ispirato sia a Indiana Jones che a Lara Croft. Rispetto ai primi Tomb Raider, la serie di Uncharted preme l&#039;acceleratore su meccaniche sparatutto, che fanno da contraltare alla pur presente componente esplorativa.', 25.99, 0, 'naughty.dog@naughty.dog', '511807.jpeg', 0, '2024-08-15'),
(41, 'EA FC 24', 'EA Sports FC 24 Ã¨ un videogioco di calcio sviluppato da EA Sports disponibile per PlayStation 4, PlayStation 5, Xbox One, Xbox Series X e Series S, Microsoft Windows e Nintendo Switch dal 29 settembre 2023, primo con la nuova denominazione dopo la fine della serie FIFA.', 1.99, 0, 'easports@ea.sport', 'EGS_EASPORTSFC24UltimateEdition_EACanada_Editions_S2_1200x1600-dc25e6d71666959d43074b7ed2868ad7.jpeg', 0, '2024-07-13'),
(42, 'Battlefront', 'Star Wars: Battlefront Ã¨ un gioco di tipo sparatutto in prima e in terza persona (i giocatori possono cambiare la visuale in ogni momento). I giocatori attraversano i vari pianeti dell&#039;universo di Guerre stellari, come Endor, Hoth, Tatooine, Sullust ed il nuovo creato, il pianeta di Jakku.', 5.99, 0, 'easports@ea.sport', 'capsule_616x353 (1).jpg', 0, '2024-09-06'),
(43, 'Battlefront II', 'Due squadre da venti giocatori si scontrano in localitÃ  inconfondibili della saga di Guerre stellari. Ãˆ possibile pilotare diversi veicoli, scegliere tra quattro classi di soldati, chiedere rinforzi e diventare un eroe (dopo aver guadagnato sufficienti punti sul campo di battaglia).', 12.99, 0, 'easports@ea.sport', 'star-wars-battlefront-ii-pc-game-ea-app-cover.jpg', 0, '2024-10-04'),
(44, 'Battlefield 1', 'Battlefield 1 Ã¨ uno sparatutto in prima persona, sviluppato da Digital Illusions Creative Entertainment (DICE) e pubblicato da Electronic Arts. Ãˆ il quindicesimo capitolo della serie Battlefield. Il gioco Ã¨ uscito per Microsoft Windows, PlayStation 4 e Xbox One il 21 ottobre 2016.', 45.99, 0, 'easports@ea.sport', 'battlefield-1-1of8y.jpg', 0, '2024-08-15'),
(45, 'Dead space remake', 'Ambientato nel 26Âº secolo, la storia segue l&#039;ingegnere Isaac Clarke, un membro dell&#039;equipaggio su una nave di riparazione chiamata USG Kellion assegnata alla USG Ishimura, un&#039;enorme nave mineraria planetaria che Ã¨ rimasta silenziosa sopra il pianeta Aegis VII.', 23.99, 0, 'easports@ea.sport', '082922604-570b95da-ec7c-495b-b2da-0d8516ef2c2f.jpg', 0, '2024-07-20'),
(46, 'Titanfall', 'In Titanfall la Guerra avanzata del domain ti dÃ  la libertÃ  di combattere sia come Pilota d&#039;assalto che come gigantesco Titan corazzato. Titanfall cambia il modo di combattere e muoversi dando ai giocatori l&#039;abilitÃ  di cambiare le proprie tattiche al volo, attaccando o fuggendo a seconda della situazione.', 12.99, 0, 'easports@ea.sport', 'titanfall-imc-rising.jpg.adapt.crop1x1.767p.jpg', 0, '2024-09-14'),
(47, 'Titanfall II', 'Trama. Jack Cooper, un soldato semplice arruolato nella Milizia, ha il sogno di diventare un pilota di Titan per combattere alla frontiera contro la costante oppressione dell&#039;IMC, una societÃ  privata determinata a spogliare i pianeti colonizzati di tutte le loro risorse.\r\n', 23.99, 0, 'easports@ea.sport', 'capsule_616x353 (2).jpg', 0, '2024-07-05'),
(48, 'Horizon zero down', 'Horizon: Zero Dawn Ã¨ un action RPG con struttura open-world tra i migliori di sempre: dall&#039;ambientazione, al sistema di combattimento fino alla storia, tutto Ã¨ curato nei minimi dettagli. Sviluppato anche per PlayStation 4 Pro, permette di scoprire tutte le potenzialitÃ  della nuova console Sony.\r\n', 24.99, 0, 'guerrilla@games', 'hzd_wide-2560x1440-bd312be05c49cf339097777c493cb899.jpg', 0, '2024-12-06'),
(49, 'Horizon forbidden west', 'Unisciti al viaggio di Aloy verso una nuova frontiera magnifica ma pericolosa, che nasconde nuove e misteriose minacce. Con questa Complete Edition puoi goderti l&#039;acclamato Horizon Forbidden West nella sua interezza su PC con contenuti bonus, tra cui l&#039;espansione Burning Shores che riprende da dove la storia principale si era interrotta. Esplora terre remote, combatti contro Macchine ancora piÃ¹ grandi e terrificanti e incontra nuove e stupefacenti tribÃ¹ al tuo ritorno nel lontano futuro...', 12.88, 0, 'guerrilla@games', 'HORIZON-FORBIDDEN-WEST.jpg', 0, '2024-10-11'),
(50, 'GTAv', 'Descrizione. Los Santos: un&#039;enorme e soleggiata metropoli piena di sedicenti guru, attricette e celebritÃ  sul viale del tramonto. Un tempo era l&#039;invidia del mondo occidentale, ma ora Ã¨ costretta ad arrangiarsi per restare a galla in un&#039;epoca di incertezza economica e TV via cavo da quattro soldi.', 30.99, 0, 'rockstar@rock.com', '59a05cd4bc90a814ee52dceb30d70de2c1946953.jpg', 0, '2024-09-12'),
(51, 'Read Dead Redemption', 'Ambientato nei primi anni del novecento, durante il declino del selvaggio west, Red Dead Redemption racconta la storia di un ex fuorilegge di nome John Marston che Ã¨ costretto dal governo statunitense a dare la caccia ai vecchi membri della sua banda per poter liberare la moglie e il figlio, i quali sono tenuti come ...', 40.99, 0, 'rockstar@rock.com', 'Red_Dead_Redemption.jpg', 0, '2024-07-18'),
(52, 'Red dead redemption II', 'Red Dead Redemption II Ã¨ un gioco d&#039;avventura e azione in prima e terza persona ambientato in un open world a tema western. Il giocatore impersona Arthur Morgan, un fuorilegge appartenente alla banda Van der Linde. Il videogioco dispone di un comparto giocatore singolo e multigiocatore', 12.99, 0, 'rockstar@rock.com', 'red-dead-redemption-2-capolavoro-rockstar-arriva-pc-prova-provato-v9-46038-1280x16-1.jpg', 0, '2024-08-16');

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
  `mail_utente` varchar(255) NOT NULL,
  `game_id` int(11) NOT NULL,
  `data_acquisto` date NOT NULL DEFAULT current_timestamp(),
  `a_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `libreria`
--

INSERT INTO `libreria` (`mail_utente`, `game_id`, `data_acquisto`, `a_key`) VALUES
('aaa', 52, '2024-05-17', 'WDddDWdwdwd13231');

-- --------------------------------------------------------

--
-- Struttura della tabella `r_tag_game`
--

CREATE TABLE `r_tag_game` (
  `game_id` int(11) NOT NULL,
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
('aaa', 'aaa', 'aaa', '2024-03-04', '2024-03-09', 'aaa'),
('jjj', 'jjj', 'jjj', '2024-02-28', '2024-03-11', 'jjj'),
('marco@gmail.com', 'Marco', 'Massa', '0000-00-00', '2024-05-01', 'marco'),
('samuele.zanon@itiszuccante.edu.it', 'Samuele', 'Zanon', '2005-02-13', '2024-03-08', 'Lollollollollol');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `commenti`
--
ALTER TABLE `commenti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_id_on_comment` (`game_id`),
  ADD KEY `user_id_on_comment` (`mail_utente`);

--
-- Indici per le tabelle `editori`
--
ALTER TABLE `editori`
  ADD PRIMARY KEY (`e_mail`);

--
-- Indici per le tabelle `giochi`
--
ALTER TABLE `giochi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publisher_on_game` (`mail_editore`);

--
-- Indici per le tabelle `immagini`
--
ALTER TABLE `immagini`
  ADD KEY `game_source` (`game_id`);

--
-- Indici per le tabelle `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`key`),
  ADD KEY `game_id_key_ref` (`game_id`);

--
-- Indici per le tabelle `libreria`
--
ALTER TABLE `libreria`
  ADD KEY `game_id_ref` (`game_id`),
  ADD KEY `nonrompereilcazzo_mail_key_ref` (`mail_utente`);

--
-- Indici per le tabelle `r_tag_game`
--
ALTER TABLE `r_tag_game`
  ADD KEY `tag_ref` (`tag_name`),
  ADD KEY `game_id_ref` (`game_id`);

--
-- Indici per le tabelle `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`e_mail`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `commenti`
--
ALTER TABLE `commenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT per la tabella `giochi`
--
ALTER TABLE `giochi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `commenti`
--
ALTER TABLE `commenti`
  ADD CONSTRAINT `game_ref_com` FOREIGN KEY (`game_id`) REFERENCES `giochi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_id_on_comment` FOREIGN KEY (`mail_utente`) REFERENCES `utenti` (`e_mail`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limiti per la tabella `giochi`
--
ALTER TABLE `giochi`
  ADD CONSTRAINT `publisher_on_game` FOREIGN KEY (`mail_editore`) REFERENCES `editori` (`e_mail`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limiti per la tabella `immagini`
--
ALTER TABLE `immagini`
  ADD CONSTRAINT `game_ref_img` FOREIGN KEY (`game_id`) REFERENCES `giochi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limiti per la tabella `keys`
--
ALTER TABLE `keys`
  ADD CONSTRAINT `geme_ref_key` FOREIGN KEY (`game_id`) REFERENCES `giochi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limiti per la tabella `libreria`
--
ALTER TABLE `libreria`
  ADD CONSTRAINT `game_ref` FOREIGN KEY (`game_id`) REFERENCES `giochi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `nonrompereilcazzo_mail_key_ref` FOREIGN KEY (`mail_utente`) REFERENCES `utenti` (`e_mail`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `r_tag_game`
--
ALTER TABLE `r_tag_game`
  ADD CONSTRAINT `game_id_ref` FOREIGN KEY (`game_id`) REFERENCES `giochi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tag_ref` FOREIGN KEY (`tag_name`) REFERENCES `tags` (`tag`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
