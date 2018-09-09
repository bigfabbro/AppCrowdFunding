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

-- --------------------------------------------------------

--
-- Struttura della tabella `commenti`
--

CREATE TABLE `commenti` (
  `id` int(11) NOT NULL,
  `iduser` int(11) DEFAULT NULL,
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

-- --------------------------------------------------------

--
-- Struttura della tabella `donazioni`
--

CREATE TABLE `donazioni` (
  `id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `date` date NOT NULL,
  `reward` varchar(100) DEFAULT NULL,
  `idutente` int(11) DEFAULT NULL,
  `idcamp` int(11) NOT NULL,
  `donationoccured` tinyint(1) NOT NULL,
  `idcc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `datan` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `telnumber` varchar(12) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `activate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `commenti`
--
ALTER TABLE `commenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT per la tabella `creditcard`
--
ALTER TABLE `creditcard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `donazioni`
--
ALTER TABLE `donazioni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `indirizzi`
--
ALTER TABLE `indirizzi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT per la tabella `mediacamp`
--
ALTER TABLE `mediacamp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `mediauser`
--
ALTER TABLE `mediauser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT per la tabella `rewards`
--
ALTER TABLE `rewards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

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
  ADD CONSTRAINT `commenti_ibfk_2` FOREIGN KEY (`idcamp`) REFERENCES `campagne` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commenti_ibfk_3` FOREIGN KEY (`iduser`) REFERENCES `utenti` (`id`) ON DELETE SET NULL;

--
-- Limiti per la tabella `donazioni`
--
ALTER TABLE `donazioni`
  ADD CONSTRAINT `donazioni_ibfk_1` FOREIGN KEY (`idcamp`) REFERENCES `campagne` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `donazioni_ibfk_3` FOREIGN KEY (`idcc`) REFERENCES `creditcard` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `donazioni_ibfk_4` FOREIGN KEY (`idutente`) REFERENCES `utenti` (`id`) ON DELETE SET NULL;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
