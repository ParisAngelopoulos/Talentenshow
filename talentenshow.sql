-- Database voor Talentenshow
-- Importeer dit bestand in een database met de naam `talentenshow`.

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `bestelen`, `aanmeldingen`;

-- Ticketbestellingen (formulier op bestellen.html, opgeslagen door connect.php)
CREATE TABLE `bestelen` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `besteld_op` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `bestelen` (`name`, `lastname`, `email`, `birthdate`, `mobile`, `address`, `besteld_op`) VALUES
('Emma', 'de Jong', 'emma.dejong@voorbeeld.nl', '1998-02-14', '0612345678', 'Kerkewijk 12, Veenendaal', '2025-04-01 10:12:00'),
('Lucas', 'Visser', 'lucas.visser@voorbeeld.nl', '2001-07-30', '0623456789', 'Molenstraat 4, Ede', '2025-04-01 18:45:00'),
('Sophie', 'Bakker', 'sophie.bakker@voorbeeld.nl', '1995-11-03', '0634567890', 'Grotestraat 88, Rhenen', '2025-04-02 09:30:00'),
('Milan', 'Smit', 'milan.smit@voorbeeld.nl', '2003-05-21', '0645678901', 'Stationsweg 7, Veenendaal', '2025-04-03 14:05:00'),
('Julia', 'Meijer', 'julia.meijer@voorbeeld.nl', '1999-09-09', '0656789012', 'Bergstraat 23, Wageningen', '2025-04-04 20:20:00'),
('Noah', 'de Boer', 'noah.deboer@voorbeeld.nl', '2000-01-17', '0667890123', 'Hoofdstraat 51, Ede', '2025-04-05 11:40:00'),
('Tess', 'Mulder', 'tess.mulder@voorbeeld.nl', '2002-12-01', '0678901234', 'Prins Bernhardlaan 9, Veenendaal', '2025-04-06 16:55:00'),
('Daan', 'Hendriks', 'daan.hendriks@voorbeeld.nl', '1997-03-28', '0689012345', 'Dorpsstraat 3, Scherpenzeel', '2025-04-07 08:15:00');

-- Deelnemers aan de show (formulier op aanmelden.html, opgeslagen door aanmelden.php)
CREATE TABLE `aanmeldingen` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `category` enum('Singing','Dancing','Comedy','Magic') NOT NULL,
  `aangemeld_op` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `aanmeldingen` (`name`, `lastname`, `birthdate`, `mobile`, `address`, `category`, `aangemeld_op`) VALUES
('Sara', 'Yilmaz', '2004-06-11', '0611122233', 'Zandstraat 15, Veenendaal', 'Singing', '2025-03-20 19:00:00'),
('Thomas', 'Kok', '2002-08-25', '0622233344', 'Raadhuisstraat 2, Ede', 'Comedy', '2025-03-21 12:30:00'),
('Lotte', 'van Dijk', '2006-01-09', '0633344455', 'Lindelaan 40, Rhenen', 'Dancing', '2025-03-22 15:10:00'),
('Jayden', 'Peters', '2005-10-02', '0644455566', 'Beukenlaan 6, Veenendaal', 'Magic', '2025-03-23 10:45:00'),
('Fleur', 'Jansen', '2003-04-18', '0655566677', 'Eikenlaan 19, Wageningen', 'Singing', '2025-03-24 17:25:00'),
('Ilias', 'Bouzid', '2004-12-30', '0666677788', 'Parkweg 11, Ede', 'Dancing', '2025-03-25 21:05:00');
