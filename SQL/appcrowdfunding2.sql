-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 04, 2018 alle 10:35
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
-- Database: `appcrowdfunding2`
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
  `media` int(11) DEFAULT NULL,
  `country` varchar(20) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `bankcount` int(11) NOT NULL,
  `goal` float NOT NULL,
  `funds` float NOT NULL,
  `visibility` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Fabrizio', 'D\'Ascenzo', '0000-00-00', '4036506887904534', '921');

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

-- --------------------------------------------------------

--
-- Struttura della tabella `mediacamp`
--

CREATE TABLE `mediacamp` (
  `id` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `data` blob NOT NULL,
  `idcamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `mediarew`
--

CREATE TABLE `mediarew` (
  `id` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `data` blob NOT NULL,
  `idrew` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `mediauser`
--

CREATE TABLE `mediauser` (
  `id` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `data` blob NOT NULL,
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
  `datan` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `telnumber` varchar(12) NOT NULL,
  `address` varchar(100) NOT NULL,
  `profpic` int(11) DEFAULT NULL,
  `bio` varchar(200) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`id`, `username`, `password`, `name`, `surname`, `datan`, `email`, `telnumber`, `address`, `profpic`, `bio`, `type`) VALUES
(2, 'bigfabbro93', 'fd22041993', 'Fabrizio', 'D\'Ascenzo', '0000-00-00', 'bigfabbro93@gmail.com', '3312934943', 'Via Gabriele Morelli,12', NULL, 'bio', 'registered'),
(3, 'bigfabbro93', 'fd22041993', 'Fabrizio', 'D\'Ascenzo', '0000-00-00', 'bigfabbro93@gmail.com', '3312934943', 'Via Gabriele Morelli,12', NULL, 'bio', 'registered'),
(4, 'bigfabbro93', 'fd22041993', 'Fabrizio', 'D\'Ascenzo', '0000-00-00', 'bigfabbro93@gmail.com', '3312934943', 'Via Gabriele Morelli,12', NULL, 'bio', 'registered'),
(5, 'bigfabbro93', 'fd22041993', 'Fabrizio', 'D\'Ascenzo', '0000-00-00', 'bigfabbro93@gmail.com', '3312934943', 'Via Gabriele Morelli,12', NULL, 'bio', 'registered'),
(6, 'bigfabbro93', 'fd22041993', 'Fabrizio', 'D\'Ascenzo', '0000-00-00', 'bigfabbro93@gmail.com', '3312934943', 'Via Gabriele Morelli,12', NULL, 'bio', 'registered'),
(7, 'bigfabbro93', 'fd22041993', 'Fabrizio', 'D\'Ascenzo', '0000-00-00', 'bigfabbro93@gmail.com', '3312934943', 'Via Gabriele Morelli,12', NULL, 'bio', 'registered'),
(8, 'bigfabbro93', 'fd22041993', 'Fabrizio', 'D\'Ascenzo', '0000-00-00', 'bigfabbro93@gmail.com', '3312934943', 'Via Gabriele Morelli,12', NULL, 'bio', 'registered'),
(9, 'bigfabbro93', 'fd22041993', 'Fabrizio', 'D\'Ascenzo', '0000-00-00', 'bigfabbro93@gmail.com', '3312934943', 'Via Gabriele Morelli,12', NULL, 'bio', 'registered'),
(10, 'bigfabbro93', 'fd22041993', 'Fabrizio', 'D\'Ascenzo', '0000-00-00', 'bigfabbro93@gmail.com', '3312934943', 'Via Gabriele Morelli,12', NULL, 'bio', 'registered'),
(11, 'bigfabbro93', 'fd22041993', 'Fabrizio', 'D\'Ascenzo', '0000-00-00', 'bigfabbro93@gmail.com', '3312934943', 'Via Gabriele Morelli,12', NULL, 'bio', 'registered'),
(12, 'bigfabbro93', 'fd22041993', 'Fabrizio', 'D\'Ascenzo', '0000-00-00', 'bigfabbro93@gmail.com', '3312934943', 'Via Gabriele Morelli,12', NULL, 'bio', 'registered'),
(13, 'bigfabbro93', 'fd22041993', 'Fabrizio', 'D\'Ascenzo', '0000-00-00', 'bigfabbro93@gmail.com', '3312934943', 'Via Gabriele Morelli,12', NULL, 'bio', 'registered'),
(14, 'bigfabbro93', 'fd22041993', 'Fabrizio', 'D\'Ascenzo', '0000-00-00', 'bigfabbro93@gmail.com', '3312934943', 'Via Gabriele Morelli,12', NULL, 'bio', 'registered'),
(15, 'bigfabbro93', 'root', 'Fabrizio', 'D\'Ascenzo', '0000-00-00', 'bigfabbro93@gmail.com', '3312934943', 'Via Gabriele Morelli,12', NULL, 'bio', 'registered');

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
-- Indici per le tabelle `mediacamp`
--
ALTER TABLE `mediacamp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcamp` (`idcamp`);

--
-- Indici per le tabelle `mediarew`
--
ALTER TABLE `mediarew`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idrew` (`idrew`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT per la tabella `commenti`
--
ALTER TABLE `commenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `creditcard`
--
ALTER TABLE `creditcard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `donazioni`
--
ALTER TABLE `donazioni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la tabella `mediacamp`
--
ALTER TABLE `mediacamp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `mediarew`
--
ALTER TABLE `mediarew`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `mediauser`
--
ALTER TABLE `mediauser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `rewards`
--
ALTER TABLE `rewards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `campagne`
--
ALTER TABLE `campagne`
  ADD CONSTRAINT `campagne_ibfk_1` FOREIGN KEY (`founder`) REFERENCES `utenti` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `campagne_ibfk_2` FOREIGN KEY (`bankcount`) REFERENCES `creditcard` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Limiti per la tabella `mediacamp`
--
ALTER TABLE `mediacamp`
  ADD CONSTRAINT `mediacamp_ibfk_1` FOREIGN KEY (`idcamp`) REFERENCES `campagne` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `mediarew`
--
ALTER TABLE `mediarew`
  ADD CONSTRAINT `mediarew_ibfk_1` FOREIGN KEY (`idrew`) REFERENCES `rewards` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
