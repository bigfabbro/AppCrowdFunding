-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Set 05, 2018 alle 18:57
-- Versione del server: 10.1.32-MariaDB
-- Versione PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id7029602_appcrowdfunding`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `campagne`
--

CREATE TABLE `campagne` (
  `id` int(11) NOT NULL,
  `founder` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `category` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `bankcount` varchar(11) NOT NULL,
  `goal` float NOT NULL,
  `funds` float NOT NULL,
  `visibility` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `campagne`
--

INSERT INTO `campagne` (`id`, `founder`, `name`, `description`, `category`, `country`, `startdate`, `enddate`, `bankcount`, `goal`, `funds`, `visibility`) VALUES
(2, 99, 'Zolo liberty plus', 'Cuffie bluetooth senza fili!', 'Tecnology', 'Italia', '2018-07-28', '2019-07-28', 'IT66C010050', 50000, 50, 0),
(4, 99, 'Campagna di prova', 'Questa Ã¨ una campagna di prova per verificare che tutto ciÃ² che abbiamo fatto finora funzioni!', 'Tecnology', 'Italia', '2018-09-02', '2018-12-02', 'IT66C010050', 400000, 0, 0),
(5, 99, 'Campagna di prova 2', 'Ristorante arrosticini abruzzesi!', 'Food', 'Italia', '2018-09-02', '2018-09-02', 'IT66C010050', 50000, 0, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `commenti`
--

CREATE TABLE `commenti` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `text` varchar(150) NOT NULL,
  `date` date NOT NULL,
  `idcamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `commenti`
--

INSERT INTO `commenti` (`id`, `iduser`, `text`, `date`, `idcamp`) VALUES
(13, 99, 'Questa campagna funziona bene!', '2018-09-02', 4),
(14, 99, 'ciao come va?', '2018-09-03', 5),
(15, 99, 'Ciao', '2018-09-05', 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `creditcard`
--

CREATE TABLE `creditcard` (
  `id` int(11) NOT NULL,
  `ownername` varchar(50) NOT NULL,
  `ownersurname` varchar(50) NOT NULL,
  `expirationdate` date NOT NULL,
  `ccnumber` varchar(16) NOT NULL,
  `ccv` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `creditcard`
--

INSERT INTO `creditcard` (`id`, `ownername`, `ownersurname`, `expirationdate`, `ccnumber`, `ccv`) VALUES
(1, 'Fabrizio', 'D\'Ascenzo', '2020-09-22', '40855564546', '921'),
(2, 'Fabrizio', 'D\'Ascenzo', '2020-02-20', '4090151699855564', '931'),
(3, 'Fabrizio', 'D\'Ascenzo', '2021-10-02', '4001556419185678', '931');

-- --------------------------------------------------------

--
-- Struttura della tabella `donazioni`
--

CREATE TABLE `donazioni` (
  `id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `date` date NOT NULL,
  `reward` varchar(100) DEFAULT NULL,
  `idutente` int(11) NOT NULL,
  `idcamp` int(11) NOT NULL,
  `donationoccured` tinyint(1) NOT NULL,
  `idcc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `donazioni`
--

INSERT INTO `donazioni` (`id`, `amount`, `date`, `reward`, `idutente`, `idcamp`, `donationoccured`, `idcc`) VALUES
(3, 50, '2018-08-02', 'un paio di cuffie', 99, 2, 1, 1),
(4, 150, '2018-08-02', 'un paio di cuffie + t-shirt', 99, 2, 1, 1),
(5, 70, '2018-08-02', 'un paio di cuffie', 99, 2, 1, 1),
(6, 75, '2018-08-02', 'niente', 99, 2, 1, 1),
(7, 50, '2018-09-02', 'niente', 99, 4, 1, 1),
(8, 30, '2018-09-05', NULL, 99, 2, 1, 2),
(9, 50, '2018-09-05', NULL, 99, 2, 1, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `indirizzi`
--

CREATE TABLE `indirizzi` (
  `id` int(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `number` int(11) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `country` varchar(50) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `indirizzi`
--

INSERT INTO `indirizzi` (`id`, `city`, `street`, `number`, `zipcode`, `country`, `iduser`) VALUES
(42, 'Teramo', 'Via Gabriele Morelli', 12, '64100', 'Italia', 99);

-- --------------------------------------------------------

--
-- Struttura della tabella `mailcheck`
--

CREATE TABLE `mailcheck` (
  `iduser` int(11) NOT NULL,
  `pin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `mediacamp`
--

CREATE TABLE `mediacamp` (
  `id` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `data` longblob NOT NULL,
  `idcamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `mediauser`
--

CREATE TABLE `mediauser` (
  `id` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `data` longblob NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `rewards`
--

CREATE TABLE `rewards` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `pledged` float NOT NULL,
  `description` varchar(150) NOT NULL,
  `idcamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `rewards`
--

INSERT INTO `rewards` (`id`, `name`, `pledged`, `description`, `idcamp`) VALUES
(1, 'Minimum pledge', 50, 'Un prototipo delle cuffie in omaggio', 2),
(2, 'Medium pledge', 100, 'Un prototipo delle cuffie in omaggio + una t-shirt con il nostro logo', 2),
(3, 'Top pledge', 200, 'Due prototipi delle cuffie in omaggio + t-shirt con il nostro logo', 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `datan` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `telnumber` varchar(12) NOT NULL,
  `description` varchar(200) NOT NULL,
  `activate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`id`, `username`, `password`, `name`, `surname`, `sex`, `datan`, `email`, `telnumber`, `description`, `activate`) VALUES
(99, 'bigfabbro93', 'fd22041993', 'Fabrizio', 'D\'Ascenzo', 'M', '1993-04-22', 'bigfabbro93@gmail.com', '3312934943', '... un giovane squattrinato, ricco soltanto della grandiosa visione che ha di se!', 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `campagne`
--
ALTER TABLE `campagne`
  ADD PRIMARY KEY (`id`),
  ADD KEY `founder` (`founder`),
  ADD KEY `bankcount` (`bankcount`);

--
-- Indici per le tabelle `commenti`
--
ALTER TABLE `commenti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iduser` (`iduser`),
  ADD KEY `iduser_2` (`iduser`,`idcamp`),
  ADD KEY `commenti_ibfk_2` (`idcamp`);

--
-- Indici per le tabelle `creditcard`
--
ALTER TABLE `creditcard`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `donazioni`
--
ALTER TABLE `donazioni`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idutente` (`idutente`,`idcamp`,`idcc`),
  ADD KEY `idcc` (`idcc`),
  ADD KEY `donazioni_ibfk_1` (`idcamp`);

--
-- Indici per le tabelle `indirizzi`
--
ALTER TABLE `indirizzi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iduser` (`iduser`);

--
-- Indici per le tabelle `mailcheck`
--
ALTER TABLE `mailcheck`
  ADD KEY `iduser` (`iduser`);

--
-- Indici per le tabelle `mediacamp`
--
ALTER TABLE `mediacamp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcamp` (`idcamp`);

--
-- Indici per le tabelle `mediauser`
--
ALTER TABLE `mediauser`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iduser` (`iduser`);

--
-- Indici per le tabelle `rewards`
--
ALTER TABLE `rewards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcamp` (`idcamp`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `campagne`
--
ALTER TABLE `campagne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `commenti`
--
ALTER TABLE `commenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT per la tabella `creditcard`
--
ALTER TABLE `creditcard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `donazioni`
--
ALTER TABLE `donazioni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT per la tabella `indirizzi`
--
ALTER TABLE `indirizzi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT per la tabella `mediacamp`
--
ALTER TABLE `mediacamp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `mediauser`
--
ALTER TABLE `mediauser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT per la tabella `rewards`
--
ALTER TABLE `rewards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `campagne`
--
ALTER TABLE `campagne`
  ADD CONSTRAINT `campagne_ibfk_1` FOREIGN KEY (`founder`) REFERENCES `utenti` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `commenti`
--
ALTER TABLE `commenti`
  ADD CONSTRAINT `commenti_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `utenti` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commenti_ibfk_2` FOREIGN KEY (`idcamp`) REFERENCES `campagne` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `donazioni`
--
ALTER TABLE `donazioni`
  ADD CONSTRAINT `donazioni_ibfk_1` FOREIGN KEY (`idcamp`) REFERENCES `campagne` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `donazioni_ibfk_2` FOREIGN KEY (`idutente`) REFERENCES `utenti` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `donazioni_ibfk_3` FOREIGN KEY (`idcc`) REFERENCES `creditcard` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `indirizzi`
--
ALTER TABLE `indirizzi`
  ADD CONSTRAINT `indirizzi_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `utenti` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `mailcheck`
--
ALTER TABLE `mailcheck`
  ADD CONSTRAINT `mailcheck_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `utenti` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `mediacamp`
--
ALTER TABLE `mediacamp`
  ADD CONSTRAINT `mediacamp_ibfk_1` FOREIGN KEY (`idcamp`) REFERENCES `campagne` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `mediauser`
--
ALTER TABLE `mediauser`
  ADD CONSTRAINT `mediauser_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `utenti` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `rewards`
--
ALTER TABLE `rewards`
  ADD CONSTRAINT `rewards_ibfk_1` FOREIGN KEY (`idcamp`) REFERENCES `campagne` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
