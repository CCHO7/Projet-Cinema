-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Generation Time: Apr 18, 2023 at 04:56 PM
-- Server version: 8.0.32
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinema`
--

-- --------------------------------------------------------

--
-- Table structure for table `Cinéma`
--

CREATE TABLE `Cinéma` (
  `IdCine` int NOT NULL,
  `NomCine` varchar(50) NOT NULL,
  `Ville` varchar(50) NOT NULL,
  `ImageCine` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Cinéma`
--

INSERT INTO `Cinéma` (`IdCine`, `NomCine`, `Ville`, `ImageCine`) VALUES
(1, 'Cinéma Cité La Défense', 'Nanterre', 'images/cinéma/ladefense-dome.jpg'),
(2, 'Cinéma Issy-Les-Moulineaux', 'Boulogne-Billancourt', 'images/cinéma/issy-les-moulineaux.jpg'),
(3, 'Cinéma Ciné Cité Rosny', 'Rosny-sous-Bois', 'images/cinéma/cité-rosny.jpg'),
(4, 'Cinéma Cité O Parinor', 'Aulnay-sous-Bois', 'images/cinéma/cité-o-parinor.jpg'),
(5, 'Cinéma Cité Créteil', 'Creteil', 'images/cinéma/cité-créteil.jpg'),
(6, 'Cinéma Nanterre Coeur Université', 'Nanterre', 'images/cinéma/nanterre-coeur.webp'),
(7, 'Cinéma Brignais', 'Lyon', 'images/cinéma/brignais.jpg'),
(8, 'Cinéma Epinay-sur-Seine ', 'Epinay-sur-Saine', 'images/cinéma/epinay.jpg'),
(9, 'Cinéma Paris-Lilas', 'Paris', 'images/cinéma/paris-lilas.jpg'),
(10, 'Cinéma Sarcelles My Place', 'Sarcelles', 'images/cinéma/sarcelles-myplace.jpg'),
(11, 'Cinéma Stade de France', 'Saint-Denis', 'images/cinéma/stade-de-france.jpg'),
(12, 'Cinéma Alésia', 'Paris', 'images/cinéma/alésia.jpg'),
(13, 'Cinéma Aqualouevard', 'Paris ', 'images/aquaboulevard.jpg'),
(14, 'Cinéma Convention', 'Paris', 'images/cinéma/aquaboulevard.jpg'),
(15, 'Cinéma Saron - IMAX', 'Saran', 'images/cinéma/saron-imax.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Client`
--

CREATE TABLE `Client` (
  `IdClient` int NOT NULL,
  `NomClient` varchar(30) NOT NULL,
  `PrenomClient` varchar(30) NOT NULL,
  `EmailClient` varchar(40) NOT NULL,
  `MdpClient` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Client`
--

INSERT INTO `Client` (`IdClient`, `NomClient`, `PrenomClient`, `EmailClient`, `MdpClient`) VALUES
(2, 'Chefirat', 'Naïm', 'naimssj4@gmail.com', 'mdpcompliqué'),
(4, 'Monkey D.', 'Luffy', 'monkeydluffy@gmail.com', '$2y$10$7QpYNSE6CbKGkuATn5WCJO8D0H59ZdE1baU1WiFnhZ7wjjF5neMfm'),
(5, 'Roronoa', 'Zoro', 'zoro@gmail.com', '$2y$10$TcYdqwjcDSDAe1KIysdQr.4souHLfLke535SKdDJXQ.cMFR8D/iLq'),
(7, 'aaa', 'aaa', 'aaa@gmail.com', '$2y$10$hAxad9JmtrmA.cdqkfQRXe8yoIfixZH1P9A.B2jNCmv7DuPdruhuy');

-- --------------------------------------------------------

--
-- Table structure for table `Film`
--

CREATE TABLE `Film` (
  `IdFilm` int NOT NULL,
  `NomFilm` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `GenreFilm` varchar(50) NOT NULL,
  `DuréeFilm` varchar(30) NOT NULL,
  `Producteur` varchar(30) NOT NULL,
  `ImageFilm` varchar(128) DEFAULT NULL,
  `BandeAnnonceFilm` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Film`
--

INSERT INTO `Film` (`IdFilm`, `NomFilm`, `GenreFilm`, `DuréeFilm`, `Producteur`, `ImageFilm`, `BandeAnnonceFilm`) VALUES
(1, 'Le Seigneur des anneaux : Le Retour du roi', 'Fantastique, Aventure', '3h 21min', 'Peter Jackson', 'images/films/seigneur3.jpeg', 'https://www.youtube.com/watch?v=RCuDRcK0BBM%22'),
(2, 'Le Seigneur des anneaux : Les Deux Tours', 'Fantastique, Aventure', '2h 59min', 'Peter Jackson', 'images/films/seigneur2.jpeg', 'https://www.youtube.com/watch?v=c9blKqmyeV4%22'),
(3, 'Le Seigneur des anneaux : La Communauté de l\'anneau', 'Fantastique, Aventure', '2h 58min', 'Peter Jackson', 'images/films/seigneur1.jpeg', 'https://www.youtube.com/watch?v=nalLU8i4zgs%22'),
(4, 'Le Hobbit : la bataille des cinq armées', 'Fantastique, Aventure', '2h 24min', 'Peter Jackson', 'images/films/hobbit3.webp', 'https://www.youtube.com/watch?v=UeJRHbC_BGA%22'),
(5, 'Le Hobbit : La désolation de Smaug', 'Fantastique, Aventure', '2h 41min', 'Peter Jackson', 'images/films/hobbit2.jpeg', 'https://www.youtube.com/watch?v=bvKLagxYhrc%22'),
(6, 'Le Hobbit : Un voyage inattendu', 'Fantastique, Aventure', '2h 49min', 'Peter Jackson', 'images/films/hobbit1.jpeg', 'https://www.youtube.com/watch?v=tiy7peMH3g8%22'),
(7, 'Inception', ' Science fiction, Thriller', '2h 28min', 'Christopher Nolan', 'images/films/inception.jpeg', 'https://www.youtube.com/watch?v=HcoZbHBDHQA%22'),
(8, 'Vol au-dessus d\'un nid de coucou ', ' Drame', '2h 09min', 'Milos Forman', 'images/films/coucou.jpeg', 'https://www.youtube.com/watch?v=OXrcDonY-B8%22'),
(9, 'Princesse Mononoké', 'Drame, Animation', '2h 15min', 'Hayao Miyazaki', 'images/films/momonoké.jpeg', 'https://www.youtube.com/watch?v=4OiMOHRDs14%22'),
(10, 'Le voyage de Chihiro', ' Animation, Aventure', ' 2h 05min', 'Hayao Miyazaki', 'images/films/chihiro.jpeg', 'https://www.youtube.com/watch?v=EhIZrZQoHuA%22'),
(11, 'Arrietty le petit monde des chapardeurs', 'Animation, Fantastique, Aventure', '1h 34min', 'Hiromasa Yonebayashi', 'images/films/arrietty.jpeg', 'https://www.youtube.com/watch?v=RYwYgH9uA_8%22'),
(12, 'La planète au trésor', 'Animation, Science fiction, Aventure', '1h 35min', 'Ron Clements', 'images/films/trésor.jpeg', 'https://www.youtube.com/watch?v=ZLvH-92GvaI%22'),
(13, 'Kuzko', ' Animation, Aventure, Comédie', ' 1h 18min', 'Mark Dindal', 'images/films/kuzco.jpeg', 'https://www.youtube.com/watch?v=f9Sb738xnas%22'),
(14, 'Blood diamond', 'Aventure, Drame, Thriller', '2h 23min', 'Edward Zwick', 'images/films/blood.jpeg', 'https://www.youtube.com/watch?v=yknIZsvQjG4%22'),
(15, 'Avengers', 'Action, Aventure, Science fiction', ' 2h 23min', 'Joss Whedon', 'images/films/avengers.jpeg', 'https://www.youtube.com/watch?v=b-kTeJhHOhc%22'),
(16, 'Avengers Endgame', 'Action, Fantastique, Aventure', '3h 01min', 'Joe Russo', 'images/films/endgame.jpeg', 'https://www.youtube.com/watch?v=wV-Q0o2OQjQ%22'),
(17, 'Avengers Infinity war', 'Action, Fantastique, Aventure', '2h 36min', 'Joe Russo', 'images/films/infinity.jpeg', 'https://www.youtube.com/watch?v=eIWs2IUr3Vs%22'),
(18, 'Iron man', ' Action, Science fiction', '2h 06min', 'Jon Favreau', 'images/films/ironman.png', 'https://www.youtube.com/watch?v=rDCTb9Gp2qk%22'),
(19, 'Spider-man', 'Fantastique, Action', ' 2h 01min', ' Sam Raimi', 'images/films/spiderman.jpeg', 'https://www.youtube.com/watch?v=t06RUxPbp_c%22'),
(20, 'Jumper', 'Aventure, Science fiction, Thriller', '1h 35min', 'Doug Liman', 'images/films/jumper.jpeg', 'https://www.youtube.com/watch?v=DtacNQkFHvo%22');

-- --------------------------------------------------------

--
-- Table structure for table `Réservation`
--

CREATE TABLE `Réservation` (
  `IdRéservation` int NOT NULL,
  `DateRéservation` date DEFAULT NULL,
  `RefClient` int DEFAULT NULL,
  `RefSéance` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Réservation`
--

INSERT INTO `Réservation` (`IdRéservation`, `DateRéservation`, `RefClient`, `RefSéance`) VALUES
(4, '2023-04-13', 7, 11),
(5, '2023-04-13', 4, 194),
(6, '2023-04-13', 4, 14),
(7, '2023-04-13', 7, 194),
(8, '2023-04-13', 7, 157),
(9, '2023-04-13', 7, 18),
(10, '2023-04-13', 7, 18),
(11, '2023-04-13', 7, 98),
(12, '2023-04-13', 7, 98),
(13, '2023-04-13', 7, 98),
(14, '2023-04-15', 7, 15),
(15, '2023-04-15', 7, 15),
(16, '2023-04-15', 7, 195),
(17, '2023-04-15', 7, 195),
(18, '2023-04-15', 7, 115),
(19, '2023-04-15', 7, 115),
(20, '2023-04-15', 7, 116),
(21, '2023-04-15', 7, 116),
(25, '2023-04-18', 7, 111),
(26, '2023-04-18', 7, 111),
(27, '2023-04-18', 7, 111),
(28, '2023-04-18', 7, 111),
(29, '2023-04-18', 7, 121),
(30, '2023-04-18', 7, 141),
(31, '2023-04-18', 7, 9),
(32, '2023-04-18', 7, 29),
(33, '2023-04-18', 7, 93),
(34, '2023-04-18', 7, 93),
(35, '2023-04-18', 7, 93),
(36, '2023-04-18', 7, 93),
(37, '2023-04-18', 7, 93),
(38, '2023-04-18', 7, 93),
(39, '2023-04-18', 7, 19),
(40, '2023-04-18', 7, 19),
(41, '2023-04-18', 7, 19),
(42, '2023-04-18', 7, 19),
(43, '2023-04-18', 7, 19),
(44, '2023-04-18', 7, 19),
(45, '2023-04-18', 7, 6),
(46, '2023-04-18', 7, 6),
(47, '2023-04-18', 7, 92),
(48, '2023-04-18', 7, 92),
(49, '2023-04-18', 7, 68),
(50, '2023-04-18', 7, 68),
(51, '2023-04-18', 7, 295),
(52, '2023-04-18', 7, 295),
(53, '2023-04-18', 7, 295),
(54, '2023-04-18', 7, 16),
(55, '2023-04-18', 7, 16),
(56, '2023-04-18', 7, 296),
(57, '2023-04-18', 7, 276),
(58, '2023-04-18', 7, 276),
(59, '2023-04-18', 7, 40),
(60, '2023-04-18', 7, 60),
(61, '2023-04-18', 7, 60);

-- --------------------------------------------------------

--
-- Table structure for table `Séance`
--

CREATE TABLE `Séance` (
  `IdSéance` int NOT NULL,
  `DateSéance` date NOT NULL,
  `RefFilm` int DEFAULT NULL,
  `RefCine` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Séance`
--

INSERT INTO `Séance` (`IdSéance`, `DateSéance`, `RefFilm`, `RefCine`) VALUES
(5, '2023-05-08', 3, 1),
(6, '2023-05-09', 2, 1),
(7, '2023-05-10', 1, 1),
(8, '2023-05-11', 6, 1),
(9, '2023-05-12', 5, 1),
(10, '2023-05-13', 4, 1),
(11, '2023-05-14', 7, 1),
(12, '2023-05-08', 8, 1),
(13, '2023-05-09', 9, 1),
(14, '2023-05-10', 10, 1),
(15, '2023-05-11', 18, 1),
(16, '2023-05-12', 19, 1),
(17, '2023-05-13', 14, 1),
(18, '2023-05-14', 16, 1),
(19, '2023-05-08', 13, 1),
(20, '2023-05-09', 11, 1),
(21, '2023-05-10', 12, 1),
(22, '2023-05-11', 20, 1),
(23, '2023-05-12', 15, 1),
(24, '2023-05-13', 17, 1),
(25, '2023-05-08', 3, 2),
(26, '2023-05-09', 2, 2),
(27, '2023-05-10', 1, 2),
(28, '2023-05-11', 6, 2),
(29, '2023-05-12', 5, 2),
(30, '2023-05-13', 4, 2),
(31, '2023-05-14', 7, 2),
(32, '2023-05-08', 8, 2),
(33, '2023-05-09', 9, 2),
(34, '2023-05-10', 10, 2),
(35, '2023-05-11', 18, 2),
(36, '2023-05-12', 19, 2),
(37, '2023-05-13', 14, 2),
(38, '2023-05-14', 16, 2),
(39, '2023-05-08', 13, 2),
(40, '2023-05-09', 11, 2),
(41, '2023-05-10', 12, 2),
(42, '2023-05-11', 20, 2),
(43, '2023-05-12', 15, 2),
(44, '2023-05-13', 17, 2),
(45, '2023-05-08', 3, 3),
(46, '2023-05-09', 2, 3),
(47, '2023-05-10', 1, 3),
(48, '2023-05-11', 6, 3),
(49, '2023-05-12', 5, 3),
(50, '2023-05-13', 4, 3),
(51, '2023-05-14', 7, 3),
(52, '2023-05-08', 8, 3),
(53, '2023-05-09', 9, 3),
(54, '2023-05-10', 10, 3),
(55, '2023-05-11', 18, 3),
(56, '2023-05-12', 19, 3),
(57, '2023-05-13', 14, 3),
(58, '2023-05-14', 16, 3),
(59, '2023-05-08', 13, 3),
(60, '2023-05-09', 11, 3),
(61, '2023-05-10', 12, 3),
(62, '2023-05-11', 20, 3),
(63, '2023-05-12', 15, 3),
(64, '2023-05-13', 17, 3),
(65, '2023-05-08', 3, 4),
(66, '2023-05-09', 2, 4),
(67, '2023-05-10', 1, 4),
(68, '2023-05-11', 6, 4),
(69, '2023-05-12', 5, 4),
(70, '2023-05-13', 4, 4),
(71, '2023-05-14', 7, 4),
(72, '2023-05-08', 8, 4),
(73, '2023-05-09', 9, 4),
(74, '2023-05-10', 10, 4),
(75, '2023-05-11', 18, 4),
(76, '2023-05-12', 19, 4),
(77, '2023-05-13', 14, 4),
(78, '2023-05-14', 16, 4),
(79, '2023-05-08', 13, 4),
(80, '2023-05-09', 11, 4),
(81, '2023-05-10', 12, 4),
(82, '2023-05-11', 20, 4),
(83, '2023-05-12', 15, 4),
(84, '2023-05-13', 17, 4),
(85, '2023-05-08', 3, 5),
(86, '2023-05-09', 2, 5),
(87, '2023-05-10', 1, 5),
(88, '2023-05-11', 6, 5),
(89, '2023-05-12', 5, 5),
(90, '2023-05-13', 4, 5),
(91, '2023-05-14', 7, 5),
(92, '2023-05-08', 8, 5),
(93, '2023-05-09', 9, 5),
(94, '2023-05-10', 10, 5),
(95, '2023-05-11', 18, 5),
(96, '2023-05-12', 19, 5),
(97, '2023-05-13', 14, 5),
(98, '2023-05-14', 16, 5),
(99, '2023-05-08', 13, 5),
(100, '2023-05-09', 11, 5),
(101, '2023-05-10', 12, 5),
(102, '2023-05-11', 20, 5),
(103, '2023-05-12', 15, 5),
(104, '2023-05-13', 17, 5),
(105, '2023-05-08', 3, 6),
(106, '2023-05-09', 2, 6),
(107, '2023-05-10', 1, 6),
(108, '2023-05-11', 6, 6),
(109, '2023-05-12', 5, 6),
(110, '2023-05-13', 4, 6),
(111, '2023-05-14', 7, 6),
(112, '2023-05-08', 8, 6),
(113, '2023-05-09', 9, 6),
(114, '2023-05-10', 10, 6),
(115, '2023-05-11', 18, 6),
(116, '2023-05-12', 19, 6),
(117, '2023-05-13', 14, 6),
(118, '2023-05-14', 16, 6),
(119, '2023-05-08', 13, 6),
(120, '2023-05-09', 11, 6),
(121, '2023-05-10', 12, 6),
(122, '2023-05-11', 20, 6),
(123, '2023-05-12', 15, 6),
(124, '2023-05-13', 17, 6),
(125, '2023-05-08', 3, 7),
(126, '2023-05-09', 2, 7),
(127, '2023-05-10', 1, 7),
(128, '2023-05-11', 6, 7),
(129, '2023-05-12', 5, 7),
(130, '2023-05-13', 4, 7),
(131, '2023-05-14', 7, 7),
(132, '2023-05-08', 8, 7),
(133, '2023-05-09', 9, 7),
(134, '2023-05-10', 10, 7),
(135, '2023-05-11', 18, 7),
(136, '2023-05-12', 19, 7),
(137, '2023-05-13', 14, 7),
(138, '2023-05-14', 16, 7),
(139, '2023-05-08', 13, 7),
(140, '2023-05-09', 11, 7),
(141, '2023-05-10', 12, 7),
(142, '2023-05-11', 20, 7),
(143, '2023-05-12', 15, 7),
(144, '2023-05-13', 17, 7),
(145, '2023-05-08', 3, 8),
(146, '2023-05-09', 2, 8),
(147, '2023-05-10', 1, 8),
(148, '2023-05-11', 6, 8),
(149, '2023-05-12', 5, 8),
(150, '2023-05-13', 4, 8),
(151, '2023-05-14', 7, 8),
(152, '2023-05-08', 8, 8),
(153, '2023-05-09', 9, 8),
(154, '2023-05-10', 10, 8),
(155, '2023-05-11', 18, 8),
(156, '2023-05-12', 19, 8),
(157, '2023-05-13', 14, 8),
(158, '2023-05-14', 16, 8),
(159, '2023-05-08', 13, 8),
(160, '2023-05-09', 11, 8),
(161, '2023-05-10', 12, 8),
(162, '2023-05-11', 20, 8),
(163, '2023-05-12', 15, 8),
(164, '2023-05-13', 17, 8),
(165, '2023-05-08', 3, 9),
(166, '2023-05-09', 2, 9),
(167, '2023-05-10', 1, 9),
(168, '2023-05-11', 6, 9),
(169, '2023-05-12', 5, 9),
(170, '2023-05-13', 4, 9),
(171, '2023-05-14', 7, 9),
(172, '2023-05-08', 8, 9),
(173, '2023-05-09', 9, 9),
(174, '2023-05-10', 10, 9),
(175, '2023-05-11', 18, 9),
(176, '2023-05-12', 19, 9),
(177, '2023-05-13', 14, 9),
(178, '2023-05-14', 16, 9),
(179, '2023-05-08', 13, 9),
(180, '2023-05-09', 11, 9),
(181, '2023-05-10', 12, 9),
(182, '2023-05-11', 20, 9),
(183, '2023-05-12', 15, 9),
(184, '2023-05-13', 17, 9),
(185, '2023-05-08', 3, 10),
(186, '2023-05-09', 2, 10),
(187, '2023-05-10', 1, 10),
(188, '2023-05-11', 6, 10),
(189, '2023-05-12', 5, 10),
(190, '2023-05-13', 4, 10),
(191, '2023-05-14', 7, 10),
(192, '2023-05-08', 8, 10),
(193, '2023-05-09', 9, 10),
(194, '2023-05-10', 10, 10),
(195, '2023-05-11', 18, 10),
(196, '2023-05-12', 19, 10),
(197, '2023-05-13', 14, 10),
(198, '2023-05-14', 16, 10),
(199, '2023-05-08', 13, 10),
(200, '2023-05-09', 11, 10),
(201, '2023-05-10', 12, 10),
(202, '2023-05-11', 20, 10),
(203, '2023-05-12', 15, 10),
(204, '2023-05-13', 17, 10),
(205, '2023-05-08', 3, 11),
(206, '2023-05-09', 2, 11),
(207, '2023-05-10', 1, 11),
(208, '2023-05-11', 6, 11),
(209, '2023-05-12', 5, 11),
(210, '2023-05-13', 4, 11),
(211, '2023-05-14', 7, 11),
(212, '2023-05-08', 8, 11),
(213, '2023-05-09', 9, 11),
(214, '2023-05-10', 10, 11),
(215, '2023-05-11', 18, 11),
(216, '2023-05-12', 19, 11),
(217, '2023-05-13', 14, 11),
(218, '2023-05-14', 16, 11),
(219, '2023-05-08', 13, 11),
(220, '2023-05-09', 11, 11),
(221, '2023-05-10', 12, 11),
(222, '2023-05-11', 20, 11),
(223, '2023-05-12', 15, 11),
(224, '2023-05-13', 17, 11),
(225, '2023-05-08', 3, 12),
(226, '2023-05-09', 2, 12),
(227, '2023-05-10', 1, 12),
(228, '2023-05-11', 6, 12),
(229, '2023-05-12', 5, 12),
(230, '2023-05-13', 4, 12),
(231, '2023-05-14', 7, 12),
(232, '2023-05-08', 8, 12),
(233, '2023-05-09', 9, 12),
(234, '2023-05-10', 10, 12),
(235, '2023-05-11', 18, 12),
(236, '2023-05-12', 19, 12),
(237, '2023-05-13', 14, 12),
(238, '2023-05-14', 16, 12),
(239, '2023-05-08', 13, 12),
(240, '2023-05-09', 11, 12),
(241, '2023-05-10', 12, 12),
(242, '2023-05-11', 20, 12),
(243, '2023-05-12', 15, 12),
(244, '2023-05-13', 17, 12),
(245, '2023-05-08', 3, 13),
(246, '2023-05-09', 2, 13),
(247, '2023-05-10', 1, 13),
(248, '2023-05-11', 6, 13),
(249, '2023-05-12', 5, 13),
(250, '2023-05-13', 4, 13),
(251, '2023-05-14', 7, 13),
(252, '2023-05-08', 8, 13),
(253, '2023-05-09', 9, 13),
(254, '2023-05-10', 10, 13),
(255, '2023-05-11', 18, 13),
(256, '2023-05-12', 19, 13),
(257, '2023-05-13', 14, 13),
(258, '2023-05-14', 16, 13),
(259, '2023-05-08', 13, 13),
(260, '2023-05-09', 11, 13),
(261, '2023-05-10', 12, 13),
(262, '2023-05-11', 20, 13),
(263, '2023-05-12', 15, 13),
(264, '2023-05-13', 17, 13),
(265, '2023-05-08', 3, 14),
(266, '2023-05-09', 2, 14),
(267, '2023-05-10', 1, 14),
(268, '2023-05-11', 6, 14),
(269, '2023-05-12', 5, 14),
(270, '2023-05-13', 4, 14),
(271, '2023-05-14', 7, 14),
(272, '2023-05-08', 8, 14),
(273, '2023-05-09', 9, 14),
(274, '2023-05-10', 10, 14),
(275, '2023-05-11', 18, 14),
(276, '2023-05-12', 19, 14),
(277, '2023-05-13', 14, 14),
(278, '2023-05-14', 16, 14),
(279, '2023-05-08', 13, 14),
(280, '2023-05-09', 11, 14),
(281, '2023-05-10', 12, 14),
(282, '2023-05-11', 20, 14),
(283, '2023-05-12', 15, 14),
(284, '2023-05-13', 17, 14),
(285, '2023-05-08', 3, 15),
(286, '2023-05-09', 2, 15),
(287, '2023-05-10', 1, 15),
(288, '2023-05-11', 6, 15),
(289, '2023-05-12', 5, 15),
(290, '2023-05-13', 4, 15),
(291, '2023-05-14', 7, 15),
(292, '2023-05-08', 8, 15),
(293, '2023-05-09', 9, 15),
(294, '2023-05-10', 10, 15),
(295, '2023-05-11', 18, 15),
(296, '2023-05-12', 19, 15),
(297, '2023-05-13', 14, 15),
(298, '2023-05-14', 16, 15),
(299, '2023-05-08', 13, 15),
(300, '2023-05-09', 11, 15),
(301, '2023-05-10', 12, 15),
(302, '2023-05-11', 20, 15),
(303, '2023-05-12', 15, 15),
(304, '2023-05-13', 17, 15),
(305, '2023-05-09', 2, 2),
(306, '2023-05-08', 3, 1),
(313, '2023-04-13', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Cinéma`
--
ALTER TABLE `Cinéma`
  ADD PRIMARY KEY (`IdCine`);

--
-- Indexes for table `Client`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`IdClient`);

--
-- Indexes for table `Film`
--
ALTER TABLE `Film`
  ADD PRIMARY KEY (`IdFilm`);

--
-- Indexes for table `Réservation`
--
ALTER TABLE `Réservation`
  ADD PRIMARY KEY (`IdRéservation`),
  ADD KEY `RefClient` (`RefClient`),
  ADD KEY `RefSéance` (`RefSéance`);

--
-- Indexes for table `Séance`
--
ALTER TABLE `Séance`
  ADD PRIMARY KEY (`IdSéance`),
  ADD KEY `RefFilm` (`RefFilm`),
  ADD KEY `RefCine` (`RefCine`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Cinéma`
--
ALTER TABLE `Cinéma`
  MODIFY `IdCine` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `Client`
--
ALTER TABLE `Client`
  MODIFY `IdClient` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Film`
--
ALTER TABLE `Film`
  MODIFY `IdFilm` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `Réservation`
--
ALTER TABLE `Réservation`
  MODIFY `IdRéservation` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `Séance`
--
ALTER TABLE `Séance`
  MODIFY `IdSéance` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=314;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Réservation`
--
ALTER TABLE `Réservation`
  ADD CONSTRAINT `Réservation_ibfk_1` FOREIGN KEY (`RefClient`) REFERENCES `Client` (`IdClient`),
  ADD CONSTRAINT `Réservation_ibfk_2` FOREIGN KEY (`RefSéance`) REFERENCES `Séance` (`IdSéance`);

--
-- Constraints for table `Séance`
--
ALTER TABLE `Séance`
  ADD CONSTRAINT `Séance_ibfk_1` FOREIGN KEY (`RefFilm`) REFERENCES `Film` (`IdFilm`),
  ADD CONSTRAINT `Séance_ibfk_2` FOREIGN KEY (`RefCine`) REFERENCES `Cinéma` (`IdCine`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
