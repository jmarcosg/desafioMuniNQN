
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET SESSION SQL_MODE='ALLOW_INVALID_DATES';
SET time_zone = "+00:00";

--
-- Database: `desafio_muni_nqn`
--

-- --------------------------------------------------------

--
-- Table structure for table `cursos`
--

CREATE TABLE `cursos` (
  `id` varchar(50) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `descripcion` varchar(356) NOT NULL,
  `modalidad` varchar(25) NOT NULL,
  `cursodeshabilitado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cursos`
--

INSERT INTO `cursos` (`id`, `nombre`, `descripcion`, `modalidad`, `cursodeshabilitado`) VALUES
('HTML2022', 'Curso HTML', 'Dale estructura a tus páginas web', 'Grupal', '0000-00-00 00:00:00'),
('CSS2022', 'Curso CSS', 'Ponele estilo a tus páginas web', 'Grupal', '0000-00-00 00:00:00'),
('JS2022', 'Curso JavaScript', 'Hacé mágia en tus páginas web', 'Grupal', '0000-00-00 00:00:00'),
('PHP2022', 'Curso PHP', 'Seguimos resistiendo', 'Individual', '0000-00-00 00:00:00');

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dni` int(10) NOT NULL,
  `razonsocial` varchar(250) NOT NULL,
  `genero` varchar(64) NOT NULL,
  `edad` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `registrados`
--

CREATE TABLE `registrados` (
  `id` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idcurso` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`id`),
  FOREIGN KEY (`idcurso`) REFERENCES `cursos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
