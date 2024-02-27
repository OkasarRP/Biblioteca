/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET SQL_NOTES=0 */;
DROP TABLE IF EXISTS books;
CREATE TABLE `books` (
  `idBook` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `available` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idBook`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

DROP TABLE IF EXISTS payments;
CREATE TABLE `payments` (
  `idPayment` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`idPayment`),
  KEY `idUser` (`idUser`),
  CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

DROP TABLE IF EXISTS rols;
CREATE TABLE `rols` (
  `idRol` int(11) NOT NULL AUTO_INCREMENT,
  `rolName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idRol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

DROP TABLE IF EXISTS subscriptions;
CREATE TABLE `subscriptions` (
  `idSubscription` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  PRIMARY KEY (`idSubscription`),
  KEY `idUser` (`idUser`),
  CONSTRAINT `subscriptions_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

DROP TABLE IF EXISTS users;
CREATE TABLE `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `idRol` int(11) DEFAULT NULL,
  `idSubscription` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `unique_email` (`email`),
  KEY `idRol` (`idRol`),
  KEY `idUser` (`idUser`),
  KEY `idSubscription` (`idSubscription`),
  CONSTRAINT `idSubscription` FOREIGN KEY (`idSubscription`) REFERENCES `subscriptions` (`idSubscription`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `rols` (`idRol`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;