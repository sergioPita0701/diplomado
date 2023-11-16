-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-07-2018 a las 22:39:27
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `diplomadodb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `academico`
--

CREATE TABLE `academico` (
  `idAcademico` int(11) NOT NULL,
  `ciA` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombreA` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `ciudadA` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefonoA` int(11) DEFAULT NULL,
  `direccionA` varchar(35) COLLATE utf8_spanish_ci DEFAULT NULL,
  `numFolioA` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `descripcionA` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `academico`
--

INSERT INTO `academico` (`idAcademico`, `ciA`, `nombreA`, `ciudadA`, `telefonoA`, `direccionA`, `numFolioA`, `descripcionA`) VALUES
(12, '98x', 'Raul Aduviri', 'villazon', 25436, 'wdsasddsafs', 'sdsda', 'dfads'),
(17, '1', 'Nazareno Sanches', 'dasafdczxxz', 5678873, 'Nataniel Aguirre #233', 'F-0879', 'Docente de las versiones v2, v3, v4, v5'),
(19, '3', 'Neysa Martinez', 'ggfd', 32, 'dsca', '432', 'asdfdsaasdfdsaasdfdsaasdfdsaasdfdsaasdfdsaasdfdsaasdfdsaasdfdsaasdfdsaasdfdsaasdfdsaasdfdsaasdfdsaasdfdsaasdfdsaasdfdsaasdfdsaasdfdsaasdfdsaasdfdsaasdfdsaasdfdsaasdfdsaasdfdsaasdfdsaasdfdsaasdfdsaasdfdsaasdfdsaasdfdsaasdfdsa'),
(20, '4', 'Said Eduardo Alvares', 'Madrid', 5643, 'fds', 'F-98743', 'gyfhdjklhgsad'),
(21, '9', 'Mario Alcazar', '', 0, '', 'sda', ''),
(22, '123', 'Elias Casimiro Vargas', 'Pando-Bolivia', 67984390, 'Calle Barrio rico #89', 'F-028', ''),
(23, '10', 'Romina Rocamonje Bracamojes', 'Beni-Bolivia', 3422123, 'calle hola 777', 'f-9890', 'asdasasdasdasasdasdasasdasdasasdhoy es un dia bieennnnnn'),
(24, '345321', 'Saturnino Mayta Sanchez', 'Potosi - bolivia', 56789, 'fdserwa', 'F-979', 'ghdgfgdfgfgfgffgdfsdd'),
(25, '543', 'Joaquin Salazar', 'fes', 324, 'dsf', '324', 'ds'),
(26, '85', 'qw', '', 0, '', '', ''),
(27, 'sd', 'Felix Loaysahfg', 'La Paz', 76890, '123', 'F-y89', ''),
(28, '8989753', 'José Alfredo Campos Zilvetty', 'Sucre', 70323956, 'Daniel Campos N° 17', '', 'jo__se@hotmail.com'),
(29, '7845625', 'Juan Rafael Subieta', 'Sucre', 72893255, '', '', ''),
(30, '2546564', 'Víctor Hugo Villegas Choquevillca', '', 0, '', '', ''),
(31, '5112093 Pt', 'Clotilde Calizaya Hidalgo', 'Potosi', 72429806, '', '', ''),
(32, '5695126 Ch', 'Dora Elena Gardeazabal Ossio', 'Sucre', 72852642, '', '', ''),
(33, '6455585 ', 'Julia Amalia Quezada Fernandez', 'Sucre', 734, 'Guido Villagomez 120', '', 'julia.quezada@yahoo.es'),
(34, '7233256', 'Mercedes Chamoso Luna ', 'Sucre', 64, 'Zona Bajo Aranjuez  ', '', ''),
(35, '79446717 ', 'Ruben Alberto Morales Cari', 'Sucre', 0, '', '', ''),
(36, '56442145', 'Graciela Mamani torres    ', '', 0, '', '', ''),
(37, '70322206  ', 'Victor Hugo Perez Serrudo', 'Sucre', 64, 'C.G de la cueva 50  ', '', ''),
(38, '70314419', 'Nelson Moises Herrera Poppe', 'Sucre', 64, 'Bustillos Nº 256', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `academico_tiene_profesion`
--

CREATE TABLE `academico_tiene_profesion` (
  `idTieneAPr` int(11) NOT NULL,
  `ciA` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `idProfesion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `academico_tiene_profesion`
--

INSERT INTO `academico_tiene_profesion` (`idTieneAPr`, `ciA`, `idProfesion`) VALUES
(52, '1', 39),
(53, '1', 41),
(56, '9', 32),
(57, '3', 15),
(59, '10', 35),
(60, '4', 38),
(61, '345321', 44),
(63, '98', 93),
(65, '98x', 41),
(66, '543', 29),
(67, '1', 11),
(70, 'sd', 11),
(74, 'sd', 82),
(75, '8989753', 84),
(76, '7845625', 38),
(77, '2546564', 109),
(78, '5112093 Pt', 80),
(79, '5695126 Ch', 56),
(80, '6455585 ', 56),
(81, '7233256', 56),
(82, '79446717 ', 56),
(83, '56442145', 56),
(84, '70322206  ', 76),
(85, '70314419', 59),
(86, '5695126 Ch', 112);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `academico_version`
--

CREATE TABLE `academico_version` (
  `idRegistroAV` int(11) NOT NULL,
  `ciA` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `idVersion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `academico_version`
--

INSERT INTO `academico_version` (`idRegistroAV`, `ciA`, `idVersion`) VALUES
(36, '5695126 Ch', 44),
(37, '5112093 Pt', 44),
(38, 'sd', 44),
(39, '56442145', 44),
(40, '7233256', 44),
(41, '345321', 45),
(42, 'sd', 45),
(43, '', 44),
(44, '1', 44),
(45, '9', 44),
(46, '7845625', 44),
(47, '543', 44),
(48, '6455585 ', 44),
(49, '8989753', 44),
(50, '70322206  ', 44),
(51, '2546564', 44),
(52, '345321', 44),
(53, '10', 44),
(54, '4', 44),
(55, '70314419', 44);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivo`
--

CREATE TABLE `archivo` (
  `idArchivo` int(11) NOT NULL,
  `nombreArchivo` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ruta` mediumblob,
  `idParalelo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_modulo_diplomante`
--

CREATE TABLE `asignacion_modulo_diplomante` (
  `idAsignacionMDI` int(11) NOT NULL,
  `idModulo` int(11) NOT NULL,
  `idInscripcion` int(11) NOT NULL,
  `idParalelo` int(11) DEFAULT NULL,
  `fecha_asignacion` date DEFAULT NULL,
  `nota` float DEFAULT NULL,
  `establece_nota` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `fecha_nota` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `asignacion_modulo_diplomante`
--

INSERT INTO `asignacion_modulo_diplomante` (`idAsignacionMDI`, `idModulo`, `idInscripcion`, `idParalelo`, `fecha_asignacion`, `nota`, `establece_nota`, `fecha_nota`) VALUES
(114, 116, 59, 90, '2018-03-22', 75, 'Bueno', '2018-06-08'),
(115, 117, 59, 91, '2018-03-27', 70, 'Aprobado', '2018-05-17'),
(116, 118, 59, 92, '2018-03-27', 65, 'Aprobado', '2018-05-17'),
(117, 119, 59, 93, '2018-03-27', 66, 'Aprobado', '2018-05-17'),
(118, 120, 59, 94, '2018-03-27', 80, 'Bueno', '2018-05-17'),
(119, 121, 59, 95, '2018-03-27', 69, 'Aprobado', '2018-05-17'),
(120, 122, 59, 96, '2018-03-27', 90, 'Muy Bueno', '2018-05-17'),
(121, 116, 60, 90, '2018-04-30', 56, 'Reprobado', '2018-06-08'),
(122, 117, 60, 91, '2018-05-16', 65, 'Aprobado', '2018-05-17'),
(123, 118, 60, 92, '2018-05-17', 68, 'Aprobado', '2018-05-17'),
(124, 119, 60, 93, '2018-05-17', 80, 'Bueno', '2018-05-17'),
(125, 120, 60, 94, '2018-05-17', 100, 'Excelente', '2018-05-17'),
(126, 121, 60, 95, '2018-05-17', 88, 'Muy Bueno', '2018-05-17'),
(127, 122, 60, 96, '2018-05-17', 66, 'Aprobado', '2018-05-17'),
(128, 116, 65, 97, '2018-05-18', 88, 'Muy Bueno', '2018-05-18'),
(129, 124, 67, 99, '2018-05-18', NULL, NULL, NULL),
(130, 117, 65, 91, '2018-05-18', NULL, NULL, NULL);

--
-- Disparadores `asignacion_modulo_diplomante`
--
DELIMITER $$
CREATE TRIGGER `bit_nota_actualizar` AFTER UPDATE ON `asignacion_modulo_diplomante` FOR EACH ROW INSERT INTO bitacora (ip, usuario, nombreTabla, operacion,fecha)VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)),SUBSTRING(USER(),1,(instr(user(),'@')-1)),"calificacion", "Actualizó_Nota",NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `bit_nota_eliminar` AFTER DELETE ON `asignacion_modulo_diplomante` FOR EACH ROW INSERT INTO bitacora (ip, usuario, nombreTabla, operacion,fecha)VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)),SUBSTRING(USER(),1,(instr(user(),'@')-1)),"calificacion", "Eliminó_Nota",NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `bitacora_nota_insertar` AFTER INSERT ON `asignacion_modulo_diplomante` FOR EACH ROW INSERT INTO bitacora (ip, usuario, nombreTabla, operacion,fecha)VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)),SUBSTRING(USER(),1,(instr(user(),'@')-1)),"calificacion", "Insertó_Nota",NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `idBitacora` int(11) NOT NULL,
  `ip` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombreTabla` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `operacion` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`idBitacora`, `ip`, `usuario`, `nombreTabla`, `operacion`, `fecha`) VALUES
(1, 'localhost', 'root', 'inscripcion', 'Inserto_Diplomante', '2018-05-05 08:01:29'),
(2, 'localhost', 'root', 'inscripcion', 'Inserto_Diplomante', '2018-05-05 08:13:54'),
(3, 'localhost', 'root', 'inscripcion', 'Inserto_Diplomante', '2018-05-05 08:18:43'),
(24, 'localhost', NULL, 'inscripcion', 'Actualizó_Inscripció', '2018-05-08 17:09:42'),
(25, 'localhost', NULL, 'inscripcion', 'Actualizó_Inscripció', '2018-05-08 17:10:21'),
(28, 'localhost', '@usuario', 'inscripcion', 'Actualizó_Inscripció', '2018-05-08 17:20:36'),
(34, 'localhost', NULL, 'inscripcion', 'Actualizó_Inscripció', '2018-05-08 17:50:58'),
(35, 'localhost', NULL, 'inscripcion', 'Actualizó_Inscripció', '2018-05-09 04:42:04'),
(36, 'localhost', NULL, 'inscripcion', 'Actualizó_Inscripció', '2018-05-09 04:56:14'),
(37, 'localhost', NULL, 'inscripcion', 'Actualizó_Inscripció', '2018-05-09 04:58:45'),
(38, 'localhost', NULL, 'inscripcion', 'Actualizó_Inscripció', '2018-05-09 05:02:30'),
(39, 'localhost', NULL, 'inscripcion', 'Actualizó_Inscripció', '2018-05-09 23:34:26'),
(40, 'localhost', NULL, 'inscripcion', 'Actualizó_Inscripció', '2018-05-09 23:41:37'),
(41, 'localhost', NULL, 'inscripcion', 'Actualizó_Inscripció', '2018-05-09 23:42:33'),
(42, 'localhost', NULL, 'inscripcion', 'Actualizó_Inscripció', '2018-05-09 23:44:44'),
(43, 'localhost', NULL, 'inscripcion', 'Actualizó_Inscripció', '2018-05-15 23:09:50'),
(44, 'localhost', NULL, 'inscripcion', 'Actualizó_Inscripció', '2018-05-15 23:13:18'),
(45, 'localhost', 'root', 'calificacion', 'Insertó_Nota', '2018-05-16 05:38:31'),
(46, 'localhost', 'root', 'calificacion', 'Actualizó_Nota', '2018-05-16 05:41:50'),
(47, 'localhost', 'root', 'calificacion', 'Actualizó_Nota', '2018-05-16 05:41:50'),
(48, 'localhost', 'root', 'calificacion', 'Insertó_Nota', '2018-05-16 05:51:48'),
(49, 'localhost', 'root', 'inscripcion', 'Insertó_Diplomante', '2018-05-16 10:57:42'),
(50, 'localhost', 'root', 'calificacion', 'Actualizó_Nota', '2018-05-17 16:05:19'),
(51, 'localhost', 'root', 'calificacion', 'Actualizó_Nota', '2018-05-17 16:05:19'),
(52, 'localhost', 'root', 'calificacion', 'Insertó_Nota', '2018-05-17 18:31:59'),
(53, 'localhost', 'root', 'calificacion', 'Actualizó_Nota', '2018-05-17 19:07:26'),
(54, 'localhost', 'root', 'calificacion', 'Actualizó_Nota', '2018-05-17 19:07:26'),
(55, 'localhost', 'root', 'calificacion', 'Insertó_Nota', '2018-05-17 19:07:36'),
(56, 'localhost', 'root', 'calificacion', 'Actualizó_Nota', '2018-05-17 19:07:50'),
(57, 'localhost', 'root', 'calificacion', 'Actualizó_Nota', '2018-05-17 19:07:50'),
(58, 'localhost', 'root', 'calificacion', 'Insertó_Nota', '2018-05-17 19:08:07'),
(59, 'localhost', 'root', 'calificacion', 'Actualizó_Nota', '2018-05-17 19:08:21'),
(60, 'localhost', 'root', 'calificacion', 'Actualizó_Nota', '2018-05-17 19:08:21'),
(61, 'localhost', 'root', 'calificacion', 'Insertó_Nota', '2018-05-17 19:08:36'),
(62, 'localhost', 'root', 'calificacion', 'Actualizó_Nota', '2018-05-17 19:08:46'),
(63, 'localhost', 'root', 'calificacion', 'Actualizó_Nota', '2018-05-17 19:08:54'),
(64, 'localhost', 'root', 'calificacion', 'Actualizó_Nota', '2018-05-17 19:08:54'),
(65, 'localhost', 'root', 'calificacion', 'Insertó_Nota', '2018-05-17 19:09:10'),
(66, 'localhost', 'root', 'calificacion', 'Actualizó_Nota', '2018-05-17 19:09:25'),
(67, 'localhost', 'root', 'calificacion', 'Actualizó_Nota', '2018-05-17 19:09:25'),
(68, 'localhost', 'root', 'calificacion', 'Insertó_Nota', '2018-05-18 01:18:22'),
(69, 'localhost', 'root', 'calificacion', 'Actualizó_Nota', '2018-05-18 03:07:16'),
(70, 'localhost', 'root', 'calificacion', 'Actualizó_Nota', '2018-05-18 03:07:17'),
(71, 'localhost', 'root', 'calificacion', 'Actualizó_Nota', '2018-05-18 03:07:55'),
(72, 'localhost', 'root', 'inscripcion', 'Insertó_Diplomante', '2018-05-18 03:25:39'),
(73, 'localhost', 'root', 'inscripcion', 'Insertó_Diplomante', '2018-05-18 03:42:08'),
(74, 'localhost', 'root', 'inscripcion', 'Insertó_Diplomante', '2018-05-18 03:44:12'),
(75, 'localhost', 'root', 'calificacion', 'Insertó_Nota', '2018-05-18 03:50:09'),
(76, 'localhost', NULL, 'inscripcion', 'Actualizó_Inscripció', '2018-05-18 04:05:21'),
(77, 'localhost', 'root', 'calificacion', 'Insertó_Nota', '2018-05-18 09:08:10'),
(78, 'localhost', 'root', 'calificacion', 'Actualizó_Nota', '2018-05-18 09:08:36'),
(79, 'localhost', 'root', 'calificacion', 'Actualizó_Nota', '2018-05-18 09:08:36'),
(80, 'localhost', 'root', 'calificacion', 'Actualizó_Nota', '2018-06-08 19:28:35'),
(81, 'localhost', 'root', 'calificacion', 'Actualizó_Nota', '2018-06-08 19:28:35'),
(82, 'localhost', NULL, 'inscripcion', 'Actualizó_Inscripció', '2018-07-18 01:29:58'),
(83, 'localhost', 'root', 'calificacion', 'Actualizó_Nota', '2018-07-19 19:58:52'),
(84, 'localhost', 'root', 'calificacion', 'Actualizó_Nota', '2018-07-19 19:59:16'),
(85, 'localhost', 'root', 'inscripcion', 'Insertó_Diplomante', '2018-07-23 05:29:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora_acceso_usuarios`
--

CREATE TABLE `bitacora_acceso_usuarios` (
  `idAccesoU_bitacora` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `ciU` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_entrada` date NOT NULL,
  `hora_entrada` time NOT NULL,
  `fecha_salida` date NOT NULL,
  `hora_salida` time NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `bitacora_acceso_usuarios`
--

INSERT INTO `bitacora_acceso_usuarios` (`idAccesoU_bitacora`, `idUsuario`, `ciU`, `fecha_entrada`, `hora_entrada`, `fecha_salida`, `hora_salida`, `estado`) VALUES
(1, 1, '6712854', '2018-05-14', '00:00:00', '2018-05-14', '21:21:03', 0),
(2, 1, '6712854', '2018-05-14', '00:00:00', '2018-05-14', '21:21:03', 0),
(3, 2, '6712855', '2018-05-14', '00:00:00', '2018-05-14', '16:54:45', 0),
(4, 2, '6712855', '2018-05-14', '00:00:00', '2018-05-14', '16:54:45', 0),
(5, 2, '6712855', '2018-05-14', '00:00:00', '2018-05-14', '16:54:45', 0),
(6, 1, '6712854', '2018-05-14', '00:00:00', '2018-05-14', '21:21:03', 0),
(7, 1, '6712854', '2018-05-14', '21:08:16', '2018-05-14', '21:21:03', 0),
(21, 2, '6712855', '2018-05-15', '12:21:43', '2018-05-15', '14:46:22', 0),
(22, 2, '6712855', '2018-05-15', '14:46:27', '0000-00-00', '00:00:00', 0),
(23, 1, '6712854', '2018-05-15', '14:47:34', '2018-05-15', '15:19:37', 0),
(28, 2, '6712855', '2018-05-16', '22:03:30', '0000-00-00', '00:00:00', 0),
(32, 1, '6712854', '2018-05-15', '16:33:16', '2018-05-15', '16:48:07', 0),
(33, 1, '6712854', '2018-05-15', '23:01:40', '2018-05-15', '23:02:12', 0),
(34, 2, '6712855', '2018-05-16', '05:30:23', '0000-00-00', '00:00:00', 0),
(35, 2, '6712855', '2018-05-16', '10:53:21', '2018-05-18', '03:03:32', 0),
(36, 1, '6712854', '2018-05-16', '10:54:09', '2018-05-18', '04:06:31', 0),
(37, 2, '6712855', '2018-05-16', '22:04:42', '2018-05-18', '03:03:32', 0),
(38, 2, '6712855', '2018-05-17', '02:22:59', '2018-05-18', '03:03:32', 0),
(39, 2, '6712855', '2018-05-17', '13:01:43', '2018-05-18', '03:03:32', 0),
(40, 2, '6712855', '2018-05-18', '00:36:42', '2018-05-18', '03:03:32', 0),
(41, 1, '6712854', '2018-05-18', '03:01:28', '2018-05-18', '04:06:31', 0),
(42, 2, '6712855', '2018-05-18', '03:03:38', '2018-05-18', '03:05:10', 0),
(43, 2, '6712855', '2018-05-18', '03:05:16', '2018-05-18', '03:12:37', 0),
(44, 2, '6712855', '2018-05-18', '03:12:52', '2018-05-18', '04:06:40', 0),
(45, 2, '6712855', '2018-05-18', '08:43:45', '2018-07-09', '00:33:33', 0),
(46, 1, '6712854', '2018-05-18', '09:02:34', '2018-05-18', '09:02:42', 0),
(47, 1, '6712854', '2018-05-18', '09:03:16', '2018-05-18', '09:10:45', 0),
(48, 6, '333', '2018-05-18', '09:10:51', '2018-05-18', '09:10:54', 0),
(49, 2, '6712855', '2018-05-19', '14:46:22', '2018-07-09', '00:33:33', 0),
(50, 2, '6712855', '2018-05-21', '16:38:01', '2018-07-09', '00:33:33', 0),
(51, 2, '6712855', '2018-05-22', '03:53:05', '2018-07-09', '00:33:33', 0),
(52, 2, '6712855', '2018-05-22', '12:51:23', '2018-07-09', '00:33:33', 0),
(53, 2, '6712855', '2018-05-23', '00:07:32', '2018-07-09', '00:33:33', 0),
(54, 2, '6712855', '2018-05-23', '14:09:26', '2018-07-09', '00:33:33', 0),
(55, 2, '6712855', '2018-05-23', '19:07:18', '2018-07-09', '00:33:33', 0),
(56, 2, '6712855', '2018-06-05', '16:06:27', '2018-07-09', '00:33:33', 0),
(57, 2, '6712855', '2018-06-06', '18:42:58', '2018-07-09', '00:33:33', 0),
(58, 2, '6712855', '2018-06-06', '22:02:16', '2018-07-09', '00:33:33', 0),
(59, 2, '6712855', '2018-06-07', '17:45:57', '2018-07-09', '00:33:33', 0),
(60, 2, '6712855', '2018-06-08', '19:26:36', '2018-07-09', '00:33:33', 0),
(61, 2, '6712855', '2018-06-10', '22:33:03', '2018-07-09', '00:33:33', 0),
(62, 2, '6712855', '2018-06-11', '17:22:02', '2018-07-09', '00:33:33', 0),
(63, 2, '6712855', '2018-06-11', '23:09:53', '2018-07-09', '00:33:33', 0),
(64, 2, '6712855', '2018-06-13', '18:27:23', '2018-07-09', '00:33:33', 0),
(65, 2, '6712855', '2018-06-14', '03:50:42', '2018-07-09', '00:33:33', 0),
(66, 2, '6712855', '2018-06-14', '06:39:04', '2018-07-09', '00:33:33', 0),
(67, 2, '6712855', '2018-06-14', '17:44:58', '2018-07-09', '00:33:33', 0),
(68, 2, '6712855', '2018-06-18', '12:19:12', '2018-07-09', '00:33:33', 0),
(69, 2, '6712855', '2018-06-18', '17:13:40', '2018-07-09', '00:33:33', 0),
(70, 2, '6712855', '2018-06-19', '03:34:51', '2018-07-09', '00:33:33', 0),
(71, 2, '6712855', '2018-06-19', '14:49:56', '2018-07-09', '00:33:33', 0),
(72, 2, '6712855', '2018-06-19', '17:45:03', '2018-07-09', '00:33:33', 0),
(73, 2, '6712855', '2018-06-20', '17:50:10', '2018-07-09', '00:33:33', 0),
(74, 2, '6712855', '2018-06-21', '18:41:46', '2018-07-09', '00:33:33', 0),
(75, 2, '6712855', '2018-06-27', '23:43:24', '2018-07-09', '00:33:33', 0),
(76, 2, '6712855', '2018-06-28', '17:01:48', '2018-07-09', '00:33:33', 0),
(77, 2, '6712855', '2018-06-29', '11:01:28', '2018-07-09', '00:33:33', 0),
(78, 2, '6712855', '2018-06-29', '17:39:23', '2018-07-09', '00:33:33', 0),
(79, 2, '6712855', '2018-07-02', '18:02:20', '2018-07-09', '00:33:33', 0),
(80, 1, '6712854', '2018-07-04', '13:35:36', '2018-07-04', '19:08:31', 0),
(81, 2, '6712855', '2018-07-04', '18:38:58', '2018-07-09', '00:33:33', 0),
(82, 1, '6712854', '2018-07-04', '18:40:59', '2018-07-04', '19:08:31', 0),
(83, 4, '6712856', '2018-07-04', '18:41:14', '2018-07-04', '19:08:01', 0),
(84, 4, '6712856', '2018-07-04', '18:56:51', '2018-07-04', '19:08:01', 0),
(85, 4, '6712856', '2018-07-04', '18:57:42', '2018-07-04', '19:08:01', 0),
(86, 1, '6712854', '2018-07-04', '19:08:09', '2018-07-04', '19:08:31', 0),
(87, 4, '6712856', '2018-07-04', '19:08:37', '2018-07-04', '19:09:01', 0),
(88, 4, '6712856', '2018-07-04', '19:08:55', '2018-07-04', '19:09:01', 0),
(89, 1, '6712854', '2018-07-04', '19:09:07', '2018-07-06', '14:26:29', 0),
(90, 2, '6712855', '2018-07-04', '21:58:42', '2018-07-09', '00:33:33', 0),
(91, 4, '6712856', '2018-07-04', '21:59:22', '2018-07-07', '02:51:30', 0),
(92, 2, '6712855', '2018-07-05', '08:27:10', '2018-07-09', '00:33:33', 0),
(93, 1, '6712854', '2018-07-05', '08:27:28', '2018-07-06', '14:26:29', 0),
(94, 4, '6712856', '2018-07-05', '08:27:50', '2018-07-07', '02:51:30', 0),
(95, 4, '6712856', '2018-07-05', '17:20:31', '2018-07-07', '02:51:30', 0),
(96, 2, '6712855', '2018-07-05', '18:48:43', '2018-07-09', '00:33:33', 0),
(97, 1, '6712854', '2018-07-05', '18:50:45', '2018-07-06', '14:26:29', 0),
(98, 1, '6712854', '2018-07-06', '14:26:07', '2018-07-06', '14:26:29', 0),
(99, 4, '6712856', '2018-07-06', '14:26:15', '2018-07-07', '02:51:30', 0),
(100, 2, '6712855', '2018-07-06', '14:26:41', '2018-07-09', '00:33:33', 0),
(101, 1, '6712854', '2018-07-06', '14:26:50', '2018-07-21', '18:57:11', 0),
(102, 4, '6712856', '2018-07-07', '00:44:40', '2018-07-07', '02:51:30', 0),
(103, 2, '6712855', '2018-07-09', '00:33:08', '2018-07-09', '00:33:33', 0),
(104, 4, '6712856', '2018-07-09', '00:33:40', '2018-07-13', '21:02:57', 0),
(105, 4, '6712856', '2018-07-09', '20:01:14', '2018-07-13', '21:02:57', 0),
(106, 2, '6712855', '2018-07-10', '00:29:33', '2018-07-10', '00:29:38', 0),
(107, 4, '6712856', '2018-07-10', '00:29:45', '2018-07-13', '21:02:57', 0),
(108, 4, '6712856', '2018-07-10', '06:03:37', '2018-07-13', '21:02:57', 0),
(109, 4, '6712856', '2018-07-10', '17:27:34', '2018-07-13', '21:02:57', 0),
(110, 4, '6712856', '2018-07-11', '05:08:24', '2018-07-13', '21:02:57', 0),
(111, 4, '6712856', '2018-07-11', '19:39:50', '2018-07-13', '21:02:57', 0),
(112, 4, '6712856', '2018-07-12', '00:44:31', '2018-07-13', '21:02:57', 0),
(113, 4, '6712856', '2018-07-12', '15:32:24', '2018-07-13', '21:02:57', 0),
(114, 4, '6712856', '2018-07-12', '21:43:06', '2018-07-13', '21:02:57', 0),
(115, 4, '6712856', '2018-07-13', '03:18:27', '2018-07-13', '21:02:57', 0),
(116, 4, '6712856', '2018-07-13', '18:34:14', '2018-07-13', '21:02:57', 0),
(117, 4, '6712856', '2018-07-13', '21:03:02', '2018-07-18', '00:50:06', 0),
(118, 4, '6712856', '2018-07-13', '21:03:11', '2018-07-18', '00:50:06', 0),
(119, 4, '6712856', '2018-07-15', '22:59:26', '2018-07-18', '00:50:06', 0),
(120, 4, '6712856', '2018-07-16', '14:43:11', '2018-07-18', '00:50:06', 0),
(121, 4, '6712856', '2018-07-16', '20:13:29', '2018-07-18', '00:50:06', 0),
(122, 4, '6712856', '2018-07-16', '22:39:18', '2018-07-18', '00:50:06', 0),
(123, 4, '6712856', '2018-07-17', '04:04:14', '2018-07-18', '00:50:06', 0),
(124, 4, '6712856', '2018-07-17', '22:23:21', '2018-07-18', '00:50:06', 0),
(125, 2, '6712855', '2018-07-17', '22:54:54', '2018-07-18', '00:51:50', 0),
(126, 2, '6712855', '2018-07-18', '00:50:12', '2018-07-18', '00:51:50', 0),
(127, 4, '6712856', '2018-07-18', '00:51:56', '2018-07-18', '00:52:26', 0),
(128, 1, '6712854', '2018-07-18', '00:52:35', '2018-07-21', '18:57:11', 0),
(129, 4, '6712856', '2018-07-18', '03:24:31', '2018-07-19', '22:35:27', 0),
(130, 2, '6712855', '2018-07-18', '03:25:52', '2018-07-23', '02:54:47', 0),
(131, 4, '6712856', '2018-07-18', '12:59:22', '2018-07-19', '22:35:27', 0),
(132, 2, '6712855', '2018-07-18', '14:32:28', '2018-07-23', '02:54:47', 0),
(133, 4, '6712856', '2018-07-18', '19:26:28', '2018-07-19', '22:35:27', 0),
(134, 4, '6712856', '2018-07-18', '22:14:54', '2018-07-19', '22:35:27', 0),
(135, 4, '6712856', '2018-07-19', '07:35:27', '2018-07-19', '22:35:27', 0),
(136, 4, '6712856', '2018-07-19', '15:26:14', '2018-07-19', '22:35:27', 0),
(137, 2, '6712855', '2018-07-19', '16:50:11', '2018-07-23', '02:54:47', 0),
(138, 4, '6712856', '2018-07-19', '22:35:21', '2018-07-19', '22:35:27', 0),
(139, 2, '6712855', '2018-07-19', '22:35:34', '2018-07-23', '02:54:47', 0),
(140, 4, '6712856', '2018-07-20', '18:01:36', '2018-07-21', '18:22:26', 0),
(141, 2, '6712855', '2018-07-20', '18:02:14', '2018-07-23', '02:54:47', 0),
(142, 2, '6712855', '2018-07-21', '00:20:01', '2018-07-23', '02:54:47', 0),
(143, 2, '6712855', '2018-07-21', '06:57:25', '2018-07-23', '02:54:47', 0),
(144, 2, '6712855', '2018-07-21', '17:14:56', '2018-07-23', '02:54:47', 0),
(145, 4, '6712856', '2018-07-21', '18:21:43', '2018-07-21', '18:22:26', 0),
(146, 1, '6712854', '2018-07-21', '18:22:31', '2018-07-21', '18:57:11', 0),
(147, 4, '6712856', '2018-07-21', '18:57:16', '2018-07-23', '00:49:21', 0),
(148, 4, '6712856', '2018-07-22', '05:41:56', '2018-07-23', '00:49:21', 0),
(149, 2, '6712855', '2018-07-22', '05:42:23', '2018-07-23', '02:54:47', 0),
(150, 2, '6712855', '2018-07-22', '21:07:00', '2018-07-23', '02:54:47', 0),
(151, 4, '6712856', '2018-07-22', '21:08:52', '2018-07-23', '00:49:21', 0),
(152, 4, '6712856', '2018-07-23', '00:32:26', '2018-07-23', '00:49:21', 0),
(153, 4, '6712856', '2018-07-23', '00:49:10', '2018-07-23', '00:49:21', 0),
(154, 2, '6712855', '2018-07-23', '00:49:27', '2018-07-23', '02:54:47', 0),
(155, 1, '6712854', '2018-07-23', '01:48:25', '2018-07-23', '01:59:57', 0),
(156, 4, '6712856', '2018-07-23', '02:00:06', '2018-07-23', '02:53:03', 0),
(157, 1, '6712854', '2018-07-23', '02:53:08', '2018-07-23', '04:24:24', 0),
(158, 4, '6712856', '2018-07-23', '02:54:55', '2018-07-23', '04:48:49', 0),
(159, 4, '6712856', '2018-07-23', '04:24:29', '2018-07-23', '04:48:49', 0),
(160, 2, '6712855', '2018-07-23', '04:48:54', '2018-07-23', '04:49:07', 0),
(161, 4, '6712856', '2018-07-23', '04:49:15', '2018-07-23', '05:16:14', 0),
(162, 1, '6712854', '2018-07-23', '05:16:20', '2018-07-23', '18:17:56', 0),
(163, 4, '6712856', '2018-07-23', '11:42:30', '0000-00-00', '00:00:00', 1),
(164, 2, '6712855', '2018-07-23', '11:42:36', '0000-00-00', '00:00:00', 1),
(165, 1, '6712854', '2018-07-23', '12:15:34', '2018-07-23', '18:17:56', 0),
(166, 1, '6712854', '2018-07-23', '13:16:26', '2018-07-23', '18:17:56', 0),
(167, 2, '6712855', '2018-07-23', '17:12:00', '0000-00-00', '00:00:00', 1),
(168, 2, '6712855', '2018-07-23', '17:58:44', '0000-00-00', '00:00:00', 1),
(169, 1, '6712854', '2018-07-23', '18:16:37', '2018-07-23', '18:17:56', 0),
(170, 4, '6712856', '2018-07-23', '18:18:00', '0000-00-00', '00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora_version`
--

CREATE TABLE `bitacora_version` (
  `idBitacora_version` int(11) NOT NULL,
  `idVersion` int(11) NOT NULL,
  `estadoVersion` tinyint(4) NOT NULL,
  `fecha_accionV` date NOT NULL,
  `hora_accionV` time NOT NULL,
  `razon_accionV` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `bitacora_version`
--

INSERT INTO `bitacora_version` (`idBitacora_version`, `idVersion`, `estadoVersion`, `fecha_accionV`, `hora_accionV`, `razon_accionV`) VALUES
(1, 44, 0, '2018-07-10', '20:58:28', 'Termino de Version.'),
(2, 44, 0, '2018-07-12', '02:35:32', 'Termino de Version.'),
(3, 45, 0, '2018-07-12', '02:37:03', 'Termino de Version.'),
(4, 44, 0, '2018-07-12', '02:37:32', 'Termino de Version.'),
(5, 44, 0, '2018-07-17', '06:48:46', 'Se finalizo la versionx por que no nadaaaaaaaa'),
(6, 44, 0, '2018-07-17', '06:50:06', 'se termino nomas sis si ssis sisis sis sis siss sisiis '),
(7, 44, 0, '2018-07-17', '06:51:51', 'Termino de Version.'),
(8, 45, 0, '2018-07-17', '06:55:15', 'Termino de Version.sssssssssssss'),
(9, 44, 0, '2018-07-17', '07:05:58', 'Termino de Version.'),
(10, 45, 0, '2018-07-17', '07:10:32', 'tttttttttttttttttt'),
(11, 45, 0, '2018-07-17', '07:11:20', 'Termino de Version.'),
(12, 45, 0, '2018-07-17', '07:14:43', 'Termino de Version.'),
(13, 45, 0, '2018-07-17', '07:17:27', 'Termino de Version.sssssssss'),
(14, 44, 0, '2018-07-17', '07:19:11', 'Termino de Version.'),
(15, 44, 0, '2018-07-17', '07:26:10', 'Termino de Version.'),
(16, 44, 0, '2018-07-17', '07:29:23', 'Termino de Version.'),
(17, 44, 0, '2018-07-17', '07:33:59', 'Termino de Version.'),
(18, 44, 0, '2018-07-17', '07:35:03', 'Termino de Version.'),
(19, 44, 1, '2018-07-17', '07:36:04', 'Termino de Version.'),
(20, 45, 0, '2018-07-17', '08:40:28', 'Termino de Version.ddddddddddddd'),
(21, 45, 1, '2018-07-17', '10:54:44', 'porq.'),
(22, 45, 1, '2018-07-17', '11:09:57', 'as'),
(23, 44, 1, '2018-07-17', '22:31:28', 'w'),
(24, 45, 1, '2018-07-17', '23:11:50', 'wqwqw'),
(25, 44, 1, '2018-07-17', '23:14:18', ''),
(26, 45, 1, '2018-07-17', '23:14:42', 'aaaaaaaaaaaaaaaaaaa'),
(27, 45, 0, '2018-07-17', '23:25:58', 'Termino de Version.'),
(28, 44, 1, '2018-07-17', '23:30:24', 'si'),
(29, 45, 1, '2018-07-18', '04:34:32', 'saaaa'),
(30, 45, 0, '2018-07-23', '04:41:11', 'Termino de Version.'),
(31, 44, 1, '2018-07-23', '04:48:16', 'ssss');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE `contrato` (
  `idContrato` int(11) NOT NULL,
  `idVersion` int(11) NOT NULL,
  `ciA` int(11) NOT NULL,
  `tipoC` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `defensa_monografia`
--

CREATE TABLE `defensa_monografia` (
  `idDefensa` int(11) NOT NULL,
  `idRealizaMono` int(11) NOT NULL,
  `nombreDef` varchar(70) NOT NULL,
  `notaDef` float NOT NULL,
  `fechaDef` datetime NOT NULL,
  `aprobarDef` varchar(10) NOT NULL,
  `observacionDef` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `defensa_monografia`
--

INSERT INTO `defensa_monografia` (`idDefensa`, `idRealizaMono`, `nombreDef`, `notaDef`, `fechaDef`, `aprobarDef`, `observacionDef`) VALUES
(3, 17, '1', 0, '2018-06-19 11:11:00', '', ''),
(4, 15, '1', 0, '2018-06-05 14:31:00', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `designar_tribunal`
--

CREATE TABLE `designar_tribunal` (
  `idTribunal` int(11) NOT NULL,
  `idDefensa` int(11) NOT NULL,
  `idRegistroAV` int(11) DEFAULT NULL,
  `tipo_tribunal` varchar(20) NOT NULL,
  `carta_invitacionTrib` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `designar_tribunal`
--

INSERT INTO `designar_tribunal` (`idTribunal`, `idDefensa`, `idRegistroAV`, `tipo_tribunal`, `carta_invitacionTrib`) VALUES
(5, 3, 50, 'Presidente', ''),
(6, 3, 52, 'Secretario', ''),
(7, 4, 39, 'Presidente', ''),
(8, 4, 47, 'Secretario', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diplomante`
--

CREATE TABLE `diplomante` (
  `idDiplomante` int(11) NOT NULL,
  `ciD` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombreD` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `apellidoPaternoD` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `apellidoMaternoD` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `ciudadD` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `idProfesion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `diplomante`
--

INSERT INTO `diplomante` (`idDiplomante`, `ciD`, `nombreD`, `apellidoPaternoD`, `apellidoMaternoD`, `ciudadD`, `idProfesion`) VALUES
(1, '6712854', 'Elizabeth', 'Aduviri', 'Zeballos', 'Villazon-Bolivia', 105),
(73, '5644', 'Maria', 'Salvatierra', 'Jimenez', '', 1),
(74, '57689', 'Susana', 'Caballero', 'Jimenez', 'Sancta Curz', 22),
(75, '56', 'Susana', 'torrez', '', 'potosi', 107),
(76, '3423-pt', 'Silvio', 'Rodriguez', 'Montana', 'La Paz', 109),
(77, '67782', 'Ramiro', 'Julio', '', 'sucre', 96),
(78, '5248771LP', 'Fernando', 'Suarez', 'Paucar', 'Sucre', 10),
(79, '1243323', 'Maria', 'Delgado', '', '', 86),
(80, '8895445 Sc', 'Adriana', 'Mamani', 'Doranona', '', 21),
(81, '2121122 CH', 'Laura', 'Guzman', 'Castro', 'Sucre', 24),
(82, '4565872', 'Mariano', 'Cespedes', '', 'Sucre', 41),
(83, '6878912 pt', 'Mauricio', 'Churquimia', '', 'Sucre', 32),
(84, '73476759', 'Martha', 'Villca', 'Laime ', 'Sucre', 56),
(85, '68631930 ', 'José Luis', 'Machaca', 'Bautista', 'Sucre', 52),
(86, '6428231', 'Flores', 'Morales', 'Haydee', 'Sucre', 84),
(87, '73434030', 'Raul', 'Ontiveros', 'Salazar', 'Sucre', 84),
(88, '72865707 ', 'Jorge Luis', 'Chumacero', 'Espada', 'Sucre', 84),
(89, '73444933 ', 'Ana Rosa ', 'Ontiveros', 'Vaca', 'Sucre', 84),
(90, '6462946 ', 'Claudia', 'Felipez', 'Carrasco', 'Sucre', 111),
(91, '72860816 ', 'Luis Alejandro', 'Delgado', 'Avila', 'Sucre', 10),
(92, '76282294', 'Reina Isabel', 'Tancara', 'Lima', 'Sucre', 64),
(93, '6443379', 'Maria Alejandra', 'Alem', 'Rivero', 'Sucre', 109),
(94, '343344', 'ana', 'Martinez', '', '', 35),
(95, '32423', 'Martina', 'Paucar', 'Gutirrez', 'Santa Cruz', 112),
(96, '7854', 'Andrea', 'Camargo', '', 'Potosi', 106),
(97, '4334324', 'Ramiro', 'Bustillos', '', 'Sucre', 110);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docencia`
--

CREATE TABLE `docencia` (
  `idDocencia` int(11) NOT NULL,
  `idRegistroAV` int(11) NOT NULL,
  `idModulo` int(11) NOT NULL,
  `estadoDoc` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `contratoDoc` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_contrato` datetime DEFAULT NULL,
  `fechaInicioDoc` date DEFAULT NULL,
  `fechaFinalDoc` date DEFAULT NULL,
  `observacion` text CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `docencia`
--

INSERT INTO `docencia` (`idDocencia`, `idRegistroAV`, `idModulo`, `estadoDoc`, `contratoDoc`, `fecha_contrato`, `fechaInicioDoc`, `fechaFinalDoc`, `observacion`) VALUES
(89, 36, 116, 'Activo', '', '0000-00-00 00:00:00', '2018-03-06', '2018-03-27', ''),
(90, 36, 117, 'Activo', '', '0000-00-00 00:00:00', '2018-03-27', '2018-03-31', ''),
(91, 36, 118, 'Activo', '', '0000-00-00 00:00:00', '2018-03-20', '2018-03-19', ''),
(92, 36, 119, 'Activo', '', '0000-00-00 00:00:00', '2018-03-20', '2018-03-19', ''),
(93, 36, 120, 'Activo', '', '0000-00-00 00:00:00', '2018-03-20', '2018-03-19', ''),
(94, 36, 121, 'Activo', '', '0000-00-00 00:00:00', '2018-03-20', '2018-03-19', ''),
(95, 36, 122, 'Activo', '', '0000-00-00 00:00:00', '2018-03-20', '2018-03-19', ''),
(96, 38, 116, 'Remplazo', '', '0000-00-00 00:00:00', '2018-04-09', '2018-04-17', ''),
(97, 41, 123, 'Activo', '', '0000-00-00 00:00:00', '2018-04-29', '2018-05-22', ''),
(98, 42, 124, 'Activo', '', '0000-00-00 00:00:00', '2018-04-29', '2018-05-16', ''),
(99, 39, 117, 'Activo', '', '0000-00-00 00:00:00', '2018-05-14', '2018-05-24', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encargado_academico_monografia`
--

CREATE TABLE `encargado_academico_monografia` (
  `idEncargadoAM` int(11) NOT NULL,
  `idAcademico` int(11) NOT NULL,
  `idMonografia` int(11) NOT NULL,
  `fecha_inicio_cargo` date NOT NULL,
  `fecha_final_cargo` date NOT NULL,
  `fecha_emision_carta` datetime NOT NULL,
  `numero_contrato` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `cancelacion_acad` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `observaciones` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `idEspecialidad` int(11) NOT NULL,
  `nombreE` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcionE` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`idEspecialidad`, `nombreE`, `descripcionE`) VALUES
(9, 'Especialidad', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. '),
(10, 'Experiencia Laboral', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius dolorem expedita eaque pariatur quisquam hic nobis eligendi asperiores? .'),
(11, 'Doctorado', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius dolorem expedita eaque pariatur quisquam hic nobis eligendi asperiores? Minima exercitationem, molestias earum dolor vero iste! Eos placeat maiores delectus culpa.\r\n'),
(13, 'Otro', 'que no este en la lista'),
(14, 'Maestria', '                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus \r\n'),
(15, 'Diplomado', 'Un diplomado es un curso de mediana o larga duración, generalmente dictado por una universidad o institución de educación superior, que tiene el propósito de enseñar, complementar o actualizar algún conocimiento o habilidad específica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `idImagen` int(11) NOT NULL,
  `titulo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `ruta` varchar(1000) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `idInscripcion` int(11) NOT NULL,
  `idVersion` int(11) NOT NULL,
  `idDiplomante` int(11) NOT NULL,
  `numeroI` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `ciI` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `sexoI` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `paisnacI` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `departamentonacI` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `fechanacI` date NOT NULL,
  `estadoCivilI` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `direccionI` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `telefonoI` int(11) NOT NULL,
  `celularI` int(11) NOT NULL,
  `emailI` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `fechaInscripcionI` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`idInscripcion`, `idVersion`, `idDiplomante`, `numeroI`, `ciI`, `sexoI`, `paisnacI`, `departamentonacI`, `fechanacI`, `estadoCivilI`, `direccionI`, `telefonoI`, `celularI`, `emailI`, `fechaInscripcionI`) VALUES
(59, 44, 95, 'I-100', '32423', 'Masculino', 'Bolivia', 'Santa Cruz', '2018-03-05', 'Comprometido', 'rterweer', 32213442, 2342, 'w', '0000-00-00 00:00:00'),
(60, 44, 74, 'I-101', '57689', 'Femenino', 'boli', '', '2018-05-01', 'Comprometido', '', 0, 0, '', '0000-00-00 00:00:00'),
(62, 44, 96, 'I-103', '7854', 'Femenino', 'Bolivia', '', '2018-05-21', 'Soltero', '', 0, 0, '', '0000-00-00 00:00:00'),
(65, 44, 97, 'I-104', '4334324', 'Masculino', 'Bolivia', 'Sucre', '2017-07-03', 'Comprometido', '', 0, 0, '', '2018-05-16 00:12:00'),
(66, 45, 74, 'I-100', '57689', 'Femenino', 'Sucre', 'Potosi', '2018-05-18', 'Divorciado', '', 0, 3243242, '', '0000-00-00 00:00:00'),
(67, 45, 97, 'I-101', '4334324', 'Masculino', 'Sucre', 'Potosi', '2018-05-13', 'Casado', '', 0, 0, '', '2018-05-16 16:41:00'),
(68, 45, 95, 'I-102', '32423', 'Femenino', 'Sucre', 'Cochabamba', '2018-05-12', 'Casado', '', 0, 0, '', '2018-05-16 15:44:00'),
(69, 44, 1, 'I-105', '6712854', 'Femenino', 'Bolivia', 'Santa Cruz', '2018-07-04', 'Comprometido', '', 0, 0, '', '2018-07-16 14:11:00');

--
-- Disparadores `inscripcion`
--
DELIMITER $$
CREATE TRIGGER `bit_inscripcion_actualizar` AFTER UPDATE ON `inscripcion` FOR EACH ROW INSERT INTO bitacora (ip, usuario, nombreTabla, operacion,fecha)VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)), @usuario ,"inscripcion", "Actualizó_Inscripción",NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `bit_inscripcion_eliminar` AFTER DELETE ON `inscripcion` FOR EACH ROW INSERT INTO bitacora (ip, usuario, nombreTabla, operacion,fecha)VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)),SUBSTRING(USER(),1,(instr(user(),'@')-1)),"inscripcion", "Eliminó_Inscripción",NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `bitacora_inscripcion_insertar` AFTER INSERT ON `inscripcion` FOR EACH ROW INSERT INTO bitacora (ip, usuario, nombreTabla, operacion,fecha)VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)),SUBSTRING(USER(),1,(instr(user(),'@')-1)),"inscripcion", "Insertó_Diplomante",NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `idModulo` int(11) NOT NULL,
  `numeroM` int(11) NOT NULL,
  `nombreM` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcionM` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_inicioMo` date NOT NULL,
  `fecha_finalMo` date NOT NULL,
  `vigenteMo` tinyint(1) NOT NULL,
  `idVersion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`idModulo`, `numeroM`, `nombreM`, `descripcionM`, `fecha_inicioMo`, `fecha_finalMo`, `vigenteMo`, `idVersion`) VALUES
(116, 1, 'MODULO I', 'Introducción al Uso de la Plataforma Virtual Moodle.', '0000-00-00', '0000-00-00', 1, 44),
(117, 2, 'MODULO II', 'Metodología de la Investigación.', '0000-00-00', '0000-00-00', 0, 44),
(118, 3, 'MODULO III', 'El proceso de Enseñanza y de Aprendizaje en el nivel de Educación Superior.', '0000-00-00', '0000-00-00', 0, 44),
(119, 4, 'MODULO IV', 'Estrategias Metodológicas y Evaluación del Aprendizaje.', '0000-00-00', '0000-00-00', 0, 44),
(120, 5, 'MODULO V', 'Tecnologías de la Información y Comunicación en Educación.', '0000-00-00', '0000-00-00', 0, 44),
(121, 6, 'MODULO VI', 'Planificación Curricular.', '0000-00-00', '0000-00-00', 0, 44),
(122, 7, 'MODULO VII', 'Taller de Monografía.', '0000-00-00', '0000-00-00', 0, 44),
(123, 1, 'MODULO I', 'Introducción al Uso de la Plataforma Virtual Moodle.', '2018-06-28', '2018-07-23', 0, 45),
(124, 2, 'MODULO II', 'Metodología de la Investigación...', '2018-07-23', '2018-07-30', 1, 45),
(125, 3, 'MODULO III', 'El proceso de Enseñanza y de Aprendizaje en el nivel de Educación Superior.', '2018-07-21', '2018-07-21', 0, 45),
(126, 4, 'MODULO IV', 'Estrategias Metodológicas y Evaluación del Aprendizaje.', '0000-00-00', '0000-00-00', 0, 45),
(127, 5, 'MODULO V', 'Tecnologías de la Información y Comunicación en Educación.', '0000-00-00', '0000-00-00', 0, 45),
(128, 6, 'MODULO VI', 'Planificación Curricular.', '0000-00-00', '0000-00-00', 0, 45),
(129, 7, 'MODULO VII', 'Taller de Monografía.', '0000-00-00', '0000-00-00', 0, 45);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monografia`
--

CREATE TABLE `monografia` (
  `idMonografia` int(11) NOT NULL,
  `tituloMonografia` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_inicioMo` date NOT NULL,
  `fecha_finalMo` date NOT NULL,
  `descripcionMo` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `monografia`
--

INSERT INTO `monografia` (`idMonografia`, `tituloMonografia`, `fecha_inicioMo`, `fecha_finalMo`, `descripcionMo`) VALUES
(5, 'para la gober', '0000-00-00', '0000-00-00', 'dfas'),
(6, 'qqqqqqqqqqqq', '0000-00-00', '0000-00-00', 'we'),
(11, 'CAMBIO CLIMATICO', '2017-11-01', '2017-12-02', ''),
(12, 'DINAMICA', '2017-11-03', '2017-11-29', ''),
(13, 'Intrumento de Elaboracion para Ing. de sistemas', '2017-11-01', '2017-11-25', 'la vida es bella'),
(19, 'Implementan de Metodología Scrum en alumnos de Economía', '2017-09-06', '2017-11-01', 'dfgdfdsf'),
(21, 'IMPLEMENTACION DE SISTEMA WEB', '2017-11-21', '2017-11-28', 'SADASS parece bien'),
(22, 'SEGUIMIENTO ACADEMICO DE ECR', '2017-12-06', '2018-01-31', ''),
(23, 'IMPLEMENTACIÓN DE NUEVOS MECANISMOS PEDAGÓGICOS PARA OPIMIZAR EL NIVEL DE MANEJO DE LAS REGLAS DE EXPRESIÓN ORAL Y ESCRITA EN LOS ESTUDIANTES DE 3er Y 4to SEMESTRE DE LA CARRERA DE PEDAGOGÍA', '2017-01-01', '2017-03-09', ''),
(24, 'PROPUESTA METODOLOGICA PARA LA INTEGRACION DE TECNOLOGIAS DE INFORMACION Y COMUNICACION A LA ASIGNATURA DE IMAGENOLOGIA DE LA CARRERA DE MEDICINA DE LA UNIVERSIDAD DE SAN FRANCISCO XAVIER DE CHUQUISAC', '2017-12-04', '2018-02-21', ''),
(25, 'METODOLOGIAS DE ENSEÑANZA - APRENDISAJE EN LA ASIGNATURA DE INGENIERIA SANITARIA EN LA CARRERA DE INGENIERIA CIVIL DE LA UNIVERSIDAD DE SAN FRANCISCO XAVIER DE CHUQUISACA', '2017-12-21', '2018-02-22', ''),
(27, 'titulo nuevo1', '2018-02-28', '2018-03-14', ''),
(28, 'Investigacion de Recursos Humanos en la Gobernacion', '2018-05-15', '2018-05-22', ''),
(29, 'sdsdsa', '2018-05-02', '2018-05-24', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota`
--

CREATE TABLE `nota` (
  `idNota` int(11) NOT NULL,
  `idAcademico` int(11) NOT NULL,
  `idModulo` int(11) NOT NULL,
  `nota` float NOT NULL,
  `fecha_insertoN` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paralelo`
--

CREATE TABLE `paralelo` (
  `idParalelo` int(11) NOT NULL,
  `nombre_paralelo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `idModulo` int(11) NOT NULL,
  `idDocencia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `paralelo`
--

INSERT INTO `paralelo` (`idParalelo`, `nombre_paralelo`, `cantidad`, `idModulo`, `idDocencia`) VALUES
(90, 'A', 0, 116, 89),
(91, 'A', 0, 117, 90),
(92, 'A', 0, 118, 91),
(93, 'A', 0, 119, 92),
(94, 'A', 0, 120, 93),
(95, 'A', 0, 121, 94),
(96, 'A', 0, 122, 95),
(97, 'B', 35, 116, 96),
(98, 'A', 0, 123, 97),
(99, 'A', 0, 124, 98),
(100, 'A', 0, 125, NULL),
(101, 'A', 0, 126, NULL),
(102, 'A', 0, 127, NULL),
(103, 'A', 0, 128, NULL),
(104, 'A', 0, 129, NULL),
(105, 'B', 30, 117, 99),
(106, 'B', 0, 123, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesion`
--

CREATE TABLE `profesion` (
  `idProfesion` int(11) NOT NULL,
  `nombreP` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `gradoAcademicoP` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `profesion`
--

INSERT INTO `profesion` (`idProfesion`, `nombreP`, `gradoAcademicoP`) VALUES
(1, 'Agronomia Tec. Sup', 'tecSup'),
(2, 'Zootecnia Tec. Sup.', 'tecSup'),
(4, 'Lic. en Administración de Empresas', 'licenciatura'),
(5, 'Lic. Economia', 'tecSup'),
(7, 'Ing. de Sistemas', 'ingenieria'),
(8, 'Ing. Agronomica', 'ingenieria'),
(10, 'Ing. de Petroleo y Gas Natural ', 'ingenieria'),
(11, 'Auditoria', 'tecSup'),
(12, 'Comunicación Social Tec. Sup.', 'tecSup'),
(13, 'Idiomas Tec. Sup.', 'tecSup'),
(14, 'Turismo Tec. Sup.', 'tecSup'),
(15, 'Fisioterapia T.S.', 'tecSup'),
(16, 'Laboratorio Clínico Tec. Sup.', 'tecSup'),
(17, 'Imagerología  Tec. Sup.', 'tecSup'),
(18, 'Radiología  Tec. Sup.', 'tecSup'),
(19, 'Ind. de la alimentación  Tec. Sup.', 'tecSup'),
(20, 'Informática', 'tecSup'),
(21, 'Química Industrial  Tec. Sup.', 'tecSup'),
(22, 'Química Ambiental Tec. Sup.', 'tecSup'),
(23, 'Topografía ', 'tecSup'),
(24, 'Topografía ', 'tecMed'),
(25, 'Mec. Automotriz', 'tecSup'),
(26, 'Mec. Automotriz', 'tecMed'),
(27, 'Mec. Industrial', 'tecSup'),
(28, 'Radio-TV y Computación ', 'tecSup'),
(29, 'Radio y TV', 'tecMed'),
(30, 'Construccion Civil', 'tecSup'),
(31, 'Construccion Civil', 'tecMed'),
(32, 'Automotores T.M.', 'tecMed'),
(34, 'Prótesis Dental (Tec. Sup.)', 'tecSup'),
(35, 'Bioimagenologia (Tec. Sup.)', 'tecSup'),
(36, 'Mercadotecnia (Tec. Sup.)', 'tecSup'),
(37, 'Gestión Publica (Tec. Sup.)', 'tecSup'),
(38, 'Contaduría Publica (Tec. Sup.)', 'tecSup'),
(39, 'Administración Financieraoooooo (Tec. Sup.)', 'tecSup'),
(40, 'Petroleo y Gas Natural (Tec. Sup.)', 'tecSup'),
(41, 'Diseño de Interiores (Tec. Sup.)', 'tecSup'),
(42, 'Mec. Industrial', 'tecMed'),
(43, 'Electrónica (Tec. Sup.)', 'tecSup'),
(44, 'Electricidad (Tec. Sup.)', 'tecSup'),
(45, 'Metal Mecánica (Tec. Sup.)', 'tecSup'),
(46, 'Metal Mecánica', 'tecMed'),
(47, 'Producción Agropecuaria (Tec. Sup.)', 'tecSup'),
(48, 'Fruticultura', 'tecSup'),
(49, 'Agroindustria', 'tecSup'),
(50, 'Lic. en Derecho', 'licenciatura'),
(51, 'Lic. en Ciencias de la Comunicacional Social', 'licenciatura'),
(52, 'Sociología ', 'licenciatura'),
(53, 'Historia ', 'licenciatura'),
(54, 'Lic. en Idiomas ', 'licenciatura'),
(55, 'Lic. en Turismo ', 'licenciatura'),
(56, 'Lic. en Pedagogía ', 'licenciatura'),
(57, 'Lic. en Psicología ', 'licenciatura'),
(58, 'Lic. en Trabajo Social', 'licenciatura'),
(59, 'Medicina', 'licenciatura'),
(60, 'Odontología ', 'licenciatura'),
(61, 'Lic. en Química Farmacéutica ', 'licenciatura'),
(62, 'Lic. en Bioquímica ', 'licenciatura'),
(63, 'Lic. en Biología ', 'licenciatura'),
(64, 'Lic. en Enfermería ', 'licenciatura'),
(65, 'Lic. en Kinesiologia y Fisioterapia', 'licenciatura'),
(66, 'Lic. en Nutrición y Dietética ', 'licenciatura'),
(67, 'Lic. en Bioimagenología ', 'licenciatura'),
(68, 'Lic. en Economía  ', 'licenciatura'),
(69, 'Ing. Comercial', 'licenciatura'),
(70, 'Lic. en Gestión Publica', 'licenciatura'),
(71, 'Gestión y Gerencia de Negocios ', 'licenciatura'),
(72, 'Lic. en Contaduría Publica', 'licenciatura'),
(73, 'Lic. en Administración  Financiera ', 'licenciatura'),
(74, 'Ing. Química ', 'ingenieria'),
(75, 'Ing. de Alimentos', 'ingenieria'),
(76, 'Ing. Industrial', 'ingenieria'),
(77, 'Ing. Ambiental', 'ingenieria'),
(78, 'Ing. Mecánica ', 'ingenieria'),
(79, 'Ing. Eléctrica ', 'ingenieria'),
(80, 'Ing. Electrónica ', 'ingenieria'),
(81, 'Ing. Electromecánica ', 'ingenieria'),
(82, 'Ing. en Telecomunicaciones ', 'ingenieria'),
(83, 'Ing. en Diseño y Animación Digital ', 'ingenieria'),
(84, 'Ing. Civil', 'ingenieria'),
(85, 'Ing. Geológica ', 'ingenieria'),
(86, 'Arquitectura', 'licenciatura'),
(87, 'Lic. en Diseño de Interiores ', 'licenciatura'),
(88, 'Ing. en Recursos Humanos ', 'ingenieria'),
(89, 'Ing. en Desarrollo Rural', 'ingenieria'),
(90, 'Lic. en Administración Agropecuaria ', 'licenciatura'),
(91, 'Ing. Agroforestal ', 'ingenieria'),
(92, 'Ing. Agroindustrial', 'ingenieria'),
(93, 'Ing. en Zootecnia', 'ingenieria'),
(94, 'Medicina Veterinaria y Zootecnia ', 'licenciatura'),
(95, 'Peluqueria', 'tecSup'),
(96, 'Chef', 'otro'),
(105, 'Auxiliar Contable', 'tecMed'),
(106, 'Auxiliar Contable', 'licenciatura'),
(107, 'Ing. en Mineria', 'ingenieria'),
(109, 'Derecho', 'licenciatura'),
(110, 'Chef', 'tecSup'),
(111, 'Medico Cirujano', 'licenciatura'),
(112, 'Auditoria', 'tecMed');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `realiza_monografia`
--

CREATE TABLE `realiza_monografia` (
  `idRealizaMono` int(11) NOT NULL,
  `idInscripcion` int(11) NOT NULL,
  `idMonografia` int(11) NOT NULL,
  `idRegistroAV` int(11) NOT NULL,
  `fecha_inicioT` date NOT NULL,
  `fecha_finalT` date NOT NULL,
  `contratoT` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaemision_cartaT` datetime NOT NULL,
  `cancelacionT` tinyint(1) NOT NULL,
  `observacionesT` text COLLATE utf8_spanish_ci NOT NULL,
  `aprobarMono` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `realiza_monografia`
--

INSERT INTO `realiza_monografia` (`idRealizaMono`, `idInscripcion`, `idMonografia`, `idRegistroAV`, `fecha_inicioT`, `fecha_finalT`, `contratoT`, `fechaemision_cartaT`, `cancelacionT`, `observacionesT`, `aprobarMono`) VALUES
(15, 59, 27, 40, '2018-04-18', '2018-04-11', '32', '2018-04-03 00:12:00', 0, '', NULL),
(17, 60, 29, 0, '0000-00-00', '0000-00-00', '', '0000-00-00 00:00:00', 0, '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tieneapr_especialidad`
--

CREATE TABLE `tieneapr_especialidad` (
  `idTieneE` int(11) NOT NULL,
  `idTieneAPr` int(11) NOT NULL,
  `idEspecialidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tieneapr_especialidad`
--

INSERT INTO `tieneapr_especialidad` (`idTieneE`, `idTieneAPr`, `idEspecialidad`) VALUES
(85, 56, 10),
(86, 56, 13),
(92, 63, 11),
(93, 63, 9),
(94, 63, 10),
(95, 65, 10),
(96, 57, 9),
(97, 57, 10),
(98, 66, 11),
(99, 66, 13),
(101, 59, 11),
(106, 53, 9),
(107, 53, 10),
(109, 52, 9),
(110, 52, 10),
(113, 70, 15),
(117, 65, 11),
(118, 65, 9),
(119, 70, 11),
(120, 70, 10),
(121, 70, 14),
(122, 75, 15),
(123, 75, 10),
(124, 76, 15),
(125, 76, 10),
(126, 77, 15),
(127, 77, 10),
(128, 77, 14),
(129, 78, 15),
(130, 78, 10),
(131, 79, 15),
(132, 79, 10),
(133, 80, 15),
(134, 80, 10),
(135, 81, 10),
(136, 81, 14),
(137, 82, 15),
(138, 82, 10),
(139, 83, 15),
(140, 83, 10),
(141, 84, 15),
(142, 84, 10),
(143, 85, 11),
(144, 85, 10),
(145, 85, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutoria`
--

CREATE TABLE `tutoria` (
  `idTutoria` int(11) NOT NULL,
  `idAcademico` int(11) NOT NULL,
  `tituloMonografia` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_inicioT` date NOT NULL,
  `fecha_finalT` date NOT NULL,
  `numeroContratoT` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_emision_cartaT` datetime NOT NULL,
  `cancelacionT` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `observacionesT` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tutoria`
--

INSERT INTO `tutoria` (`idTutoria`, `idAcademico`, `tituloMonografia`, `fecha_inicioT`, `fecha_finalT`, `numeroContratoT`, `fecha_emision_cartaT`, `cancelacionT`, `observacionesT`) VALUES
(1, 17, 'Titulo de la monografia', '2017-10-07', '2017-12-23', 'T-0058', '0000-00-00 00:00:00', '1', ''),
(2, 19, 'titulo222', '2017-10-07', '2017-10-07', 'C008', '0000-00-00 00:00:00', '0', ''),
(3, 23, 'hfdjssl', '2017-10-09', '2020-10-09', '6573', '0000-00-00 00:00:00', '0', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `ciU` varchar(30) CHARACTER SET utf8 NOT NULL,
  `nombreU` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `apellidosU` varchar(100) CHARACTER SET utf8 NOT NULL,
  `cargoU` varchar(150) CHARACTER SET utf8 NOT NULL,
  `direccionU` varchar(100) CHARACTER SET utf8 NOT NULL,
  `telefonoU` varchar(30) CHARACTER SET utf8 NOT NULL,
  `emailU` varchar(70) CHARACTER SET utf8 DEFAULT NULL,
  `estadoU` tinyint(1) NOT NULL,
  `tipoU` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `loginU` varchar(50) CHARACTER SET utf8 NOT NULL,
  `contrasenaU` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `observacionU` text CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `ciU`, `nombreU`, `apellidosU`, `cargoU`, `direccionU`, `telefonoU`, `emailU`, `estadoU`, `tipoU`, `loginU`, `contrasenaU`, `observacionU`) VALUES
(1, '6712854', 'elizabeth', 'aduviri', 'Coordinadora ', 'mamerto 354', '704550', 'eli@hotmail', 1, 'Secretario', 'eli', '123', 'actualizados'),
(2, '6712855', 'susana', 'aduviri', 'Coordinadora de posgrado', '', '56123132135-56', 'chana@hotmail', 1, 'Coordinador', 'susana', '123', '5465'),
(4, '6712856', 'sofia', 'adus', 'administradora', 'mamerto 45', '', '', 1, 'Administrador', 'sofia', '123', 'hay q ver'),
(6, '333', 'PatI', 'Roca', 'Coordinadora 2', 'mamerto 45', '5566', 'ana@hotmail', 1, 'Administrador', 'PatIRoc', '333', 'DSFDS'),
(7, '3453', 'Shampoo', 'Canelas', 'Coordinadora 1', 'Dominicana #554', '3232', '', 0, 'Coordinador', 'shan', '111', 'fdgs');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `version`
--

CREATE TABLE `version` (
  `idVersion` int(11) NOT NULL,
  `nombreV` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'insertar nombre',
  `fechaV` date NOT NULL,
  `tiempoV` int(11) NOT NULL,
  `fecha_termino` date DEFAULT NULL,
  `descripcionV` text COLLATE utf8_spanish_ci NOT NULL,
  `costoV` float NOT NULL,
  `lugarV` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `estadoV` tinyint(1) NOT NULL,
  `finscripciones_hasta` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `version`
--

INSERT INTO `version` (`idVersion`, `nombreV`, `fechaV`, `tiempoV`, `fecha_termino`, `descripcionV`, `costoV`, `lugarV`, `estadoV`, `finscripciones_hasta`) VALUES
(44, 'VERSION I', '2018-02-25', 4, '2018-07-17', 'SI', 3400, 'Sucre, Facultad de Pedagogía', 1, '2018-07-18'),
(45, 'Version II', '2018-01-01', 4, '2018-07-23', 'Empieza una semana después de la fecha indicada', 4300, 'Sucre, Facultad de Pedagogía', 0, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `academico`
--
ALTER TABLE `academico`
  ADD PRIMARY KEY (`idAcademico`);

--
-- Indices de la tabla `academico_tiene_profesion`
--
ALTER TABLE `academico_tiene_profesion`
  ADD PRIMARY KEY (`idTieneAPr`),
  ADD KEY `academico_tiene_profesion_ibfk_1` (`ciA`),
  ADD KEY `idProfesion` (`idProfesion`);

--
-- Indices de la tabla `academico_version`
--
ALTER TABLE `academico_version`
  ADD PRIMARY KEY (`idRegistroAV`),
  ADD KEY `ciA` (`ciA`),
  ADD KEY `idVersion` (`idVersion`);

--
-- Indices de la tabla `archivo`
--
ALTER TABLE `archivo`
  ADD PRIMARY KEY (`idArchivo`),
  ADD KEY `idParalelo` (`idParalelo`);

--
-- Indices de la tabla `asignacion_modulo_diplomante`
--
ALTER TABLE `asignacion_modulo_diplomante`
  ADD PRIMARY KEY (`idAsignacionMDI`),
  ADD KEY `idModulo` (`idModulo`),
  ADD KEY `idInscripcion` (`idInscripcion`),
  ADD KEY `idParalelo` (`idParalelo`);

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`idBitacora`);

--
-- Indices de la tabla `bitacora_acceso_usuarios`
--
ALTER TABLE `bitacora_acceso_usuarios`
  ADD PRIMARY KEY (`idAccesoU_bitacora`),
  ADD KEY `usuario` (`idUsuario`);

--
-- Indices de la tabla `bitacora_version`
--
ALTER TABLE `bitacora_version`
  ADD PRIMARY KEY (`idBitacora_version`),
  ADD KEY `idVersion` (`idVersion`);

--
-- Indices de la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`idContrato`),
  ADD KEY `idVersion` (`idVersion`),
  ADD KEY `ciA` (`ciA`);

--
-- Indices de la tabla `defensa_monografia`
--
ALTER TABLE `defensa_monografia`
  ADD PRIMARY KEY (`idDefensa`),
  ADD KEY `idRealizaMono` (`idRealizaMono`);

--
-- Indices de la tabla `designar_tribunal`
--
ALTER TABLE `designar_tribunal`
  ADD PRIMARY KEY (`idTribunal`),
  ADD KEY `idDefensa` (`idDefensa`),
  ADD KEY `idRegistroAV` (`idRegistroAV`);

--
-- Indices de la tabla `diplomante`
--
ALTER TABLE `diplomante`
  ADD PRIMARY KEY (`idDiplomante`),
  ADD KEY `idProfesion` (`idProfesion`);

--
-- Indices de la tabla `docencia`
--
ALTER TABLE `docencia`
  ADD PRIMARY KEY (`idDocencia`),
  ADD KEY `idRegistroAV` (`idRegistroAV`),
  ADD KEY `idModulo` (`idModulo`);

--
-- Indices de la tabla `encargado_academico_monografia`
--
ALTER TABLE `encargado_academico_monografia`
  ADD PRIMARY KEY (`idEncargadoAM`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`idEspecialidad`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`idImagen`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`idInscripcion`),
  ADD KEY `idVersion` (`idVersion`),
  ADD KEY `inscripcion_ibfk_2` (`idDiplomante`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`idModulo`),
  ADD KEY `modulo_ibfk_1` (`idVersion`);

--
-- Indices de la tabla `monografia`
--
ALTER TABLE `monografia`
  ADD PRIMARY KEY (`idMonografia`);

--
-- Indices de la tabla `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`idNota`);

--
-- Indices de la tabla `paralelo`
--
ALTER TABLE `paralelo`
  ADD PRIMARY KEY (`idParalelo`),
  ADD KEY `idModulo` (`idModulo`),
  ADD KEY `paralelo_ibfk_2` (`idDocencia`);

--
-- Indices de la tabla `profesion`
--
ALTER TABLE `profesion`
  ADD PRIMARY KEY (`idProfesion`);

--
-- Indices de la tabla `realiza_monografia`
--
ALTER TABLE `realiza_monografia`
  ADD PRIMARY KEY (`idRealizaMono`),
  ADD KEY `idMonografia` (`idMonografia`),
  ADD KEY `idInscripcion` (`idInscripcion`),
  ADD KEY `idRegistroAV` (`idRegistroAV`);

--
-- Indices de la tabla `tieneapr_especialidad`
--
ALTER TABLE `tieneapr_especialidad`
  ADD PRIMARY KEY (`idTieneE`),
  ADD KEY `idTieneAPr` (`idTieneAPr`),
  ADD KEY `idEspecialidad` (`idEspecialidad`);

--
-- Indices de la tabla `tutoria`
--
ALTER TABLE `tutoria`
  ADD PRIMARY KEY (`idTutoria`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `version`
--
ALTER TABLE `version`
  ADD PRIMARY KEY (`idVersion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `academico`
--
ALTER TABLE `academico`
  MODIFY `idAcademico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `academico_tiene_profesion`
--
ALTER TABLE `academico_tiene_profesion`
  MODIFY `idTieneAPr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT de la tabla `academico_version`
--
ALTER TABLE `academico_version`
  MODIFY `idRegistroAV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `archivo`
--
ALTER TABLE `archivo`
  MODIFY `idArchivo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asignacion_modulo_diplomante`
--
ALTER TABLE `asignacion_modulo_diplomante`
  MODIFY `idAsignacionMDI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `idBitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de la tabla `bitacora_acceso_usuarios`
--
ALTER TABLE `bitacora_acceso_usuarios`
  MODIFY `idAccesoU_bitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT de la tabla `bitacora_version`
--
ALTER TABLE `bitacora_version`
  MODIFY `idBitacora_version` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `contrato`
--
ALTER TABLE `contrato`
  MODIFY `idContrato` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `defensa_monografia`
--
ALTER TABLE `defensa_monografia`
  MODIFY `idDefensa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `designar_tribunal`
--
ALTER TABLE `designar_tribunal`
  MODIFY `idTribunal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `diplomante`
--
ALTER TABLE `diplomante`
  MODIFY `idDiplomante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT de la tabla `docencia`
--
ALTER TABLE `docencia`
  MODIFY `idDocencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de la tabla `encargado_academico_monografia`
--
ALTER TABLE `encargado_academico_monografia`
  MODIFY `idEncargadoAM` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `idEspecialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `idImagen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `idInscripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `idModulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT de la tabla `monografia`
--
ALTER TABLE `monografia`
  MODIFY `idMonografia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `nota`
--
ALTER TABLE `nota`
  MODIFY `idNota` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paralelo`
--
ALTER TABLE `paralelo`
  MODIFY `idParalelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT de la tabla `profesion`
--
ALTER TABLE `profesion`
  MODIFY `idProfesion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT de la tabla `realiza_monografia`
--
ALTER TABLE `realiza_monografia`
  MODIFY `idRealizaMono` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `tieneapr_especialidad`
--
ALTER TABLE `tieneapr_especialidad`
  MODIFY `idTieneE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT de la tabla `tutoria`
--
ALTER TABLE `tutoria`
  MODIFY `idTutoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `version`
--
ALTER TABLE `version`
  MODIFY `idVersion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `academico_tiene_profesion`
--
ALTER TABLE `academico_tiene_profesion`
  ADD CONSTRAINT `academico_tiene_profesion_ibfk_1` FOREIGN KEY (`idProfesion`) REFERENCES `profesion` (`idProfesion`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `academico_version`
--
ALTER TABLE `academico_version`
  ADD CONSTRAINT `academico_version_ibfk_2` FOREIGN KEY (`idVersion`) REFERENCES `version` (`idVersion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `archivo`
--
ALTER TABLE `archivo`
  ADD CONSTRAINT `archivo_ibfk_1` FOREIGN KEY (`idParalelo`) REFERENCES `paralelo` (`idParalelo`);

--
-- Filtros para la tabla `asignacion_modulo_diplomante`
--
ALTER TABLE `asignacion_modulo_diplomante`
  ADD CONSTRAINT `asignacion_modulo_diplomante_ibfk_1` FOREIGN KEY (`idModulo`) REFERENCES `modulo` (`idModulo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asignacion_modulo_diplomante_ibfk_2` FOREIGN KEY (`idInscripcion`) REFERENCES `inscripcion` (`idInscripcion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asignacion_modulo_diplomante_ibfk_3` FOREIGN KEY (`idParalelo`) REFERENCES `paralelo` (`idParalelo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `bitacora_acceso_usuarios`
--
ALTER TABLE `bitacora_acceso_usuarios`
  ADD CONSTRAINT `bitacora_acceso_usuarios_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `bitacora_version`
--
ALTER TABLE `bitacora_version`
  ADD CONSTRAINT `bitacora_version_ibfk_1` FOREIGN KEY (`idVersion`) REFERENCES `version` (`idVersion`);

--
-- Filtros para la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD CONSTRAINT `contrato_ibfk_1` FOREIGN KEY (`idVersion`) REFERENCES `version` (`idVersion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `defensa_monografia`
--
ALTER TABLE `defensa_monografia`
  ADD CONSTRAINT `defensa_monografia_ibfk_1` FOREIGN KEY (`idRealizaMono`) REFERENCES `realiza_monografia` (`idRealizaMono`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `designar_tribunal`
--
ALTER TABLE `designar_tribunal`
  ADD CONSTRAINT `designar_tribunal_ibfk_1` FOREIGN KEY (`idDefensa`) REFERENCES `defensa_monografia` (`idDefensa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `diplomante`
--
ALTER TABLE `diplomante`
  ADD CONSTRAINT `diplomante_ibfk_1` FOREIGN KEY (`idProfesion`) REFERENCES `profesion` (`idProfesion`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `docencia`
--
ALTER TABLE `docencia`
  ADD CONSTRAINT `docencia_ibfk_1` FOREIGN KEY (`idRegistroAV`) REFERENCES `academico_version` (`idRegistroAV`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `docencia_ibfk_2` FOREIGN KEY (`idModulo`) REFERENCES `modulo` (`idModulo`);

--
-- Filtros para la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `inscripcion_ibfk_1` FOREIGN KEY (`idVersion`) REFERENCES `version` (`idVersion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inscripcion_ibfk_2` FOREIGN KEY (`idDiplomante`) REFERENCES `diplomante` (`idDiplomante`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD CONSTRAINT `modulo_ibfk_1` FOREIGN KEY (`idVersion`) REFERENCES `version` (`idVersion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `paralelo`
--
ALTER TABLE `paralelo`
  ADD CONSTRAINT `paralelo_ibfk_1` FOREIGN KEY (`idModulo`) REFERENCES `modulo` (`idModulo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `realiza_monografia`
--
ALTER TABLE `realiza_monografia`
  ADD CONSTRAINT `realiza_monografia_ibfk_1` FOREIGN KEY (`idMonografia`) REFERENCES `monografia` (`idMonografia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `realiza_monografia_ibfk_2` FOREIGN KEY (`idInscripcion`) REFERENCES `inscripcion` (`idInscripcion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tieneapr_especialidad`
--
ALTER TABLE `tieneapr_especialidad`
  ADD CONSTRAINT `tieneapr_especialidad_ibfk_1` FOREIGN KEY (`idTieneAPr`) REFERENCES `academico_tiene_profesion` (`idTieneAPr`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tieneapr_especialidad_ibfk_2` FOREIGN KEY (`idEspecialidad`) REFERENCES `especialidad` (`idEspecialidad`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
