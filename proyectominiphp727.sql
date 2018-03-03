-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 25-02-2018 a las 20:56:44
-- Versión del servidor: 5.7.19
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectominiphp727`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantemateria`
--

DROP TABLE IF EXISTS `estudiantemateria`;
CREATE TABLE IF NOT EXISTS `estudiantemateria` (
  `IdEstudianteMateria` int(11) NOT NULL AUTO_INCREMENT,
  `IdEstudiante` int(11) NOT NULL,
  `IdPrograma` int(11) NOT NULL,
  `IdMateria` int(11) NOT NULL,
  `Conocimiento` float NOT NULL,
  `Desempenio` float NOT NULL,
  `Producto` float NOT NULL,
  `Promedio` float NOT NULL,
  PRIMARY KEY (`IdEstudianteMateria`),
  KEY `IdEstudiante` (`IdEstudiante`),
  KEY `IdPrograma` (`IdPrograma`),
  KEY `IdMateria` (`IdMateria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

DROP TABLE IF EXISTS `estudiantes`;
CREATE TABLE IF NOT EXISTS `estudiantes` (
  `IdEstudiante` int(11) NOT NULL AUTO_INCREMENT,
  `IdPersona` int(11) NOT NULL,
  `CodigoE` varchar(30) NOT NULL,
  `FechaRegistro` datetime NOT NULL,
  PRIMARY KEY (`IdEstudiante`),
  KEY `IdPersona` (`IdPersona`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

DROP TABLE IF EXISTS `materias`;
CREATE TABLE IF NOT EXISTS `materias` (
  `IdMateria` int(11) NOT NULL AUTO_INCREMENT,
  `CodigoM` varchar(20) NOT NULL,
  `Materia` varchar(50) NOT NULL,
  PRIMARY KEY (`IdMateria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

DROP TABLE IF EXISTS `personas`;
CREATE TABLE IF NOT EXISTS `personas` (
  `IdPersona` int(11) NOT NULL AUTO_INCREMENT,
  `Documento` varchar(20) NOT NULL,
  `IdTipoDocumento` int(11) NOT NULL,
  `Nombres` varchar(70) NOT NULL,
  `Apellidos` varchar(70) NOT NULL,
  `Celular` varchar(15) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `Correo` varchar(60) NOT NULL,
  PRIMARY KEY (`IdPersona`),
  KEY `IdTipoDocumento` (`IdTipoDocumento`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`IdPersona`, `Documento`, `IdTipoDocumento`, `Nombres`, `Apellidos`, `Celular`, `Direccion`, `Correo`) VALUES
(1, '1017181664', 1, 'Cristian', 'Galeano', '3045927004', 'Robledo', 'aleprada02@gmail.com'),
(2, '24356232', 1, 'Daniela', 'Lopez', '3218308354', 'Envigado', 'daniela78@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `progamas`
--

DROP TABLE IF EXISTS `progamas`;
CREATE TABLE IF NOT EXISTS `progamas` (
  `IdPrograma` int(11) NOT NULL AUTO_INCREMENT,
  `CodigoP` varchar(20) NOT NULL,
  `Programa` varchar(50) NOT NULL,
  PRIMARY KEY (`IdPrograma`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programamaterias`
--

DROP TABLE IF EXISTS `programamaterias`;
CREATE TABLE IF NOT EXISTS `programamaterias` (
  `IdProgramaMateria` int(11) NOT NULL AUTO_INCREMENT,
  `IdPrograma` int(11) NOT NULL,
  `IdMateria` int(11) NOT NULL,
  PRIMARY KEY (`IdProgramaMateria`),
  KEY `IdPrograma` (`IdPrograma`),
  KEY `IdMateria` (`IdMateria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `IdRol` int(11) NOT NULL AUTO_INCREMENT,
  `Rol` varchar(50) NOT NULL,
  PRIMARY KEY (`IdRol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`IdRol`, `Rol`) VALUES
(1, 'Administrador'),
(2, 'Gerente '),
(3, 'Docente'),
(4, 'secretario/a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposdocumentos`
--

DROP TABLE IF EXISTS `tiposdocumentos`;
CREATE TABLE IF NOT EXISTS `tiposdocumentos` (
  `IdTipoDocumento` int(11) NOT NULL AUTO_INCREMENT,
  `TipoDocumento` varchar(50) NOT NULL,
  PRIMARY KEY (`IdTipoDocumento`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tiposdocumentos`
--

INSERT INTO `tiposdocumentos` (`IdTipoDocumento`, `TipoDocumento`) VALUES
(1, 'Cedula'),
(2, 'Cédula extranjera '),
(3, 'Tarjeta Identidad ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `IdUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `IdPersona` int(11) NOT NULL,
  `Usuario` varchar(100) NOT NULL,
  `Clave` varchar(200) NOT NULL,
  `Foto` varchar(30) NOT NULL,
  `IdRol` int(11) NOT NULL,
  `Estado` tinyint(4) NOT NULL,
  PRIMARY KEY (`IdUsuario`),
  KEY `IdPersona` (`IdPersona`),
  KEY `IdRol` (`IdRol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IdUsuario`, `IdPersona`, `Usuario`, `Clave`, `Foto`, `IdRol`, `Estado`) VALUES
(1, 1, 'cristiangno', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'user1-128x128.jpg', 2, 1),
(2, 2, 'DANIELA', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'maria.jpg', 1, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estudiantemateria`
--
ALTER TABLE `estudiantemateria`
  ADD CONSTRAINT `fk_Estidiantesmaterias_estudiantes` FOREIGN KEY (`IdEstudiante`) REFERENCES `estudiantes` (`IdEstudiante`),
  ADD CONSTRAINT `fk_estudiantemateria_programas` FOREIGN KEY (`IdPrograma`) REFERENCES `progamas` (`IdPrograma`),
  ADD CONSTRAINT `fk_estudinatematerias_materias` FOREIGN KEY (`IdMateria`) REFERENCES `materias` (`IdMateria`);

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `fk_Estuduante_Personas` FOREIGN KEY (`IdPersona`) REFERENCES `personas` (`IdPersona`);

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `fk_persona_TiposDocumento` FOREIGN KEY (`IdTipoDocumento`) REFERENCES `tiposdocumentos` (`IdTipoDocumento`);

--
-- Filtros para la tabla `programamaterias`
--
ALTER TABLE `programamaterias`
  ADD CONSTRAINT `fk_programamateria_programas` FOREIGN KEY (`IdPrograma`) REFERENCES `progamas` (`IdPrograma`),
  ADD CONSTRAINT `fk_programamaterias_materias` FOREIGN KEY (`IdMateria`) REFERENCES `materias` (`IdMateria`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuarios_Personas` FOREIGN KEY (`IdPersona`) REFERENCES `personas` (`IdPersona`),
  ADD CONSTRAINT `fk_Usuarios_Roles` FOREIGN KEY (`IdRol`) REFERENCES `roles` (`IdRol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
