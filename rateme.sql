-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2017 at 06:54 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rateme`
--

-- --------------------------------------------------------

--
-- Table structure for table `fotos`
--

CREATE TABLE `fotos` (
  `idFoto` int(11) NOT NULL,
  `foto` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT 'img/default.png',
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `puntuaciones`
--

CREATE TABLE `puntuaciones` (
  `idUsuario` int(100) NOT NULL,
  `puntos` decimal(5,4) NOT NULL DEFAULT '3.0000',
  `veces` int(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `puntuaciones`
--

INSERT INTO `puntuaciones` (`idUsuario`, `puntos`, `veces`) VALUES
(44, '3.0000', 0),
(45, '3.0000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombreUsuario` varchar(100) CHARACTER SET utf8 NOT NULL,
  `correoUsuario` varchar(100) CHARACTER SET utf8 NOT NULL,
  `pass` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombreUsuario`, `correoUsuario`, `pass`) VALUES
(44, 'Edgar', 'edgar@mail.com', '123'),
(45, 'jose', 'jose@mail.com', '123');

--
-- Triggers `usuarios`
--
DELIMITER $$
CREATE TRIGGER `puntaje` AFTER INSERT ON `usuarios` FOR EACH ROW BEGIN
INSERT INTO puntuaciones (idUsuario) VALUES (new.idUsuario);
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`idFoto`);

--
-- Indexes for table `puntuaciones`
--
ALTER TABLE `puntuaciones`
  ADD UNIQUE KEY `idUsuario` (`idUsuario`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fotos`
--
ALTER TABLE `fotos`
  MODIFY `idFoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
