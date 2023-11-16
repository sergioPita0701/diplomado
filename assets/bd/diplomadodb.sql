-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-09-2018 a las 16:01:52
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
(19, '3', 'Neysa Martinez', 'ggfd', 32, 'dsca', '432', 'asdfds'),
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
(38, '70314419', 'Nelson Moises Herrera Poppe', 'Sucre', 64, 'Bustillos Nº 256', '', ''),
(39, '6222838 Ch', 'Maria Cabezas ', '', 646, '', '123', 'Insertar descripcion u Observaciones');

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
(86, '5695126 Ch', 112),
(87, '6222838 Ch', 38);

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
(55, '70314419', 44),
(56, '98x', 44),
(57, '3', 44),
(58, '123', 44),
(59, '85', 44),
(60, '70314419', 45),
(61, '5112093 Pt', 45),
(62, '5695126 Ch', 45),
(63, '9', 45),
(64, '6222838 Ch', 45),
(65, '10', 45),
(66, '', 45),
(67, '6455585 ', 45),
(68, '8989753', 45),
(69, '543', 45),
(70, '123', 45),
(71, 'sd', 47),
(72, '7845625', 45),
(73, '56442145', 45),
(74, '79446717 ', 47),
(75, '5695126 Ch', 47),
(76, '8989753', 47),
(77, '345321', 47),
(78, '7233256', 47),
(79, '7845625', 47),
(80, '543', 47),
(81, '5112093 Pt', 47),
(82, '543', 51),
(83, 'sd', 51),
(84, '123', 47),
(85, '1', 47),
(86, '6455585 ', 47),
(87, '5695126 Ch', 51),
(88, '56442145', 47),
(89, '56442145', 50),
(90, '7845625', 50),
(91, '5695126 Ch', 50),
(92, '4', 50),
(93, '5112093 Pt', 50),
(94, 'sd', 50),
(95, '8989753', 50),
(96, '8989753', 51),
(97, '70322206  ', 50),
(98, '10', 50),
(99, '85', 50),
(100, '3', 50),
(101, '98x', 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivo`
--

CREATE TABLE `archivo` (
  `idArchivo` int(11) NOT NULL,
  `nombreArchivo` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ruta` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `idParalelo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `archivo`
--

INSERT INTO `archivo` (`idArchivo`, `nombreArchivo`, `ruta`, `idParalelo`) VALUES
(17, 'calificaciones1B', 'propuesta2.docx', 97),
(22, 'calificaciones1A', 'propuesta21.docx', 98),
(24, 'calificaciones1B', 'PRACTICA_NRO_12.docx', 106),
(25, 'calificaciones1C', 'PRACTICA_NRO_121.docx', 107),
(26, 'calificaciones2A', 'PRACTICA_NRO_122.docx', 99),
(27, 'calificaciones3A', 'propuesta22.docx', 100),
(30, 'calificaciones4A', 'propuesta23.docx', 101),
(31, 'calificaciones5A', 'PRACTICA_NRO_123.docx', 102),
(32, 'calificaciones6A', 'propuesta24.docx', 103),
(35, 'calificaciones7A', 'propuesta25.docx', 104),
(36, 'calificaciones1A', 'propuesta26.docx', 117),
(37, 'calificaciones1B', 'propuesta27.docx', 124),
(38, 'calificaciones2B', 'propuesta28.docx', 126),
(40, 'calificaciones2A', 'propuesta29.docx', 118),
(41, 'calificaciones3B', 'JSON.pdf', 127),
(42, 'calificaciones3A', 'JSON1.pdf', 119),
(45, 'calificaciones7A', 'JSON2.pdf', 123),
(46, 'calificaciones1A', 'JSON3.pdf', 149),
(47, 'calificaciones7A', 'propuesta210.docx', 148);

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
(114, 116, 59, 90, '2018-03-22', 75, 'Bueno', '0000-00-00'),
(115, 117, 59, 105, '2018-03-27', 76, 'Bueno', '0000-00-00'),
(116, 118, 59, 92, '2018-03-27', 65, 'Aprobado', '2018-05-17'),
(117, 119, 59, 93, '2018-03-27', 66, 'Aprobado', '2018-05-17'),
(118, 120, 59, 94, '2018-03-27', 80, 'Bueno', '2018-05-17'),
(119, 121, 59, 95, '2018-03-27', 69, 'Aprobado', '2018-05-17'),
(120, 122, 59, 96, '2018-03-27', 90, 'Muy Bueno', '2018-05-17'),
(121, 116, 60, 97, '2018-04-30', 56, 'Reprobado', '0000-00-00'),
(122, 117, 60, 91, '2018-05-16', 67, 'Aprobado', '2018-08-01'),
(123, 118, 60, 92, '2018-05-17', 68, 'Aprobado', '2018-05-17'),
(124, 119, 60, 93, '2018-05-17', 80, 'Bueno', '2018-05-17'),
(125, 120, 60, 94, '2018-05-17', 100, 'Excelente', '2018-05-17'),
(126, 121, 60, 95, '2018-05-17', 88, 'Muy Bueno', '2018-05-17'),
(127, 122, 60, 96, '2018-05-17', 66, 'Aprobado', '2018-05-17'),
(129, 124, 67, 99, '2018-05-18', 65, 'Aprobado', '2018-08-13'),
(133, 116, 70, 90, '2018-08-10', NULL, NULL, NULL),
(140, 123, 76, 98, '2018-08-12', 65, 'Aprobado', '2018-08-13'),
(141, 123, 75, 98, '2018-08-13', 87, 'Muy Bueno', '2018-08-13'),
(142, 123, 77, 98, '2018-08-13', 67, 'Aprobado', '2018-08-13'),
(143, 123, 78, 98, '2018-08-12', 45, 'Reprobado', '2018-08-13'),
(144, 123, 83, 107, '2018-08-13', 65, 'Aprobado', '2018-08-13'),
(145, 123, 84, 107, '2018-08-13', 67, 'Aprobado', '2018-08-13'),
(146, 123, 86, 107, '2018-08-13', 70, 'Aprobado', '2018-08-13'),
(147, 123, 79, 98, '2018-08-13', 10, 'Reprobado', '2018-08-13'),
(148, 123, 80, 106, '2018-08-13', 65, 'Aprobado', '2018-08-13'),
(149, 123, 81, 106, '2018-08-13', 0, 'Reprobado', '2018-08-13'),
(150, 123, 82, 106, '2018-08-13', 70, 'Aprobado', '2018-08-13'),
(151, 124, 76, 99, '2018-08-13', 74, 'Bueno', '2018-08-13'),
(152, 124, 75, 99, '2018-08-13', 70, 'Aprobado', '2018-08-13'),
(153, 124, 77, 99, '2018-08-13', 70, 'Aprobado', '2018-08-13'),
(154, 124, 80, 99, '2018-08-13', 55, 'Reprobado', '2018-08-13'),
(155, 124, 83, 99, '2018-08-13', 78, 'Bueno', '2018-08-13'),
(156, 124, 84, 99, '2018-08-13', 80, 'Bueno', '2018-08-13'),
(157, 124, 86, 99, '2018-08-13', 90, 'Muy Bueno', '2018-08-13'),
(158, 125, 67, 100, '2018-08-13', 70, 'Aprobado', '2018-08-13'),
(159, 125, 76, 100, '2018-08-13', 67, 'Aprobado', '2018-08-13'),
(160, 125, 75, 100, '2018-08-13', 65, 'Aprobado', '2018-08-13'),
(161, 125, 77, 100, '2018-08-13', 65, 'Aprobado', '2018-08-13'),
(162, 125, 83, 100, '2018-08-13', 75, 'Bueno', '2018-08-13'),
(163, 125, 84, 100, '2018-08-13', 65, 'Aprobado', '2018-08-13'),
(164, 125, 86, 100, '2018-08-13', 80, 'Bueno', '2018-08-13'),
(165, 126, 67, 101, '2018-08-13', 65, 'Aprobado', '2018-08-13'),
(167, 126, 75, 101, '2018-08-13', 65, 'Aprobado', '2018-08-13'),
(169, 126, 83, 101, '2018-08-13', 80, 'Bueno', '2018-08-13'),
(170, 126, 84, 101, '2018-08-13', 55, 'Reprobado', '2018-08-13'),
(171, 126, 86, 101, '2018-08-13', 20, 'Reprobado', '2018-08-13'),
(172, 126, 77, 101, '2018-08-13', 65, 'Aprobado', '2018-08-13'),
(173, 126, 76, 101, '2018-08-13', 70, 'Aprobado', '2018-08-13'),
(174, 127, 76, 102, '2018-08-13', 100, 'Excelente', '2018-08-13'),
(175, 127, 67, 102, '2018-08-13', 70, 'Aprobado', '2018-08-13'),
(176, 127, 77, 102, '2018-08-13', 65, 'Aprobado', '2018-08-13'),
(177, 127, 75, 102, '2018-08-13', 80, 'Bueno', '2018-08-13'),
(178, 127, 83, 102, '2018-08-13', 7, 'Reprobado', '2018-08-13'),
(179, 128, 76, 103, '2018-08-13', 68, 'Aprobado', '2018-08-13'),
(180, 128, 67, 103, '2018-08-13', 75, 'Bueno', '2018-08-13'),
(181, 128, 77, 103, '2018-08-13', 75, 'Bueno', '2018-08-13'),
(182, 128, 75, 103, '2018-08-13', 80, 'Bueno', '2018-08-13'),
(183, 129, 76, 104, '2018-08-13', 65, 'Aprobado', '2018-08-13'),
(184, 129, 67, 104, '2018-08-13', 70, 'Aprobado', '2018-08-13'),
(185, 129, 77, 104, '2018-08-13', 80, 'Bueno', '2018-08-13'),
(186, 129, 75, 104, '2018-08-13', 75, 'Bueno', '2018-08-13'),
(187, 137, 87, 117, '2018-08-16', 77, 'Bueno', '2018-08-16'),
(188, 137, 88, 117, '2018-08-16', 45, 'Reprobado', '2018-08-16'),
(189, 137, 90, 117, '2018-08-16', 45, 'Reprobado', '2018-08-16'),
(190, 137, 91, 117, '2018-08-16', 88, 'Muy Bueno', '2018-08-16'),
(191, 137, 92, 117, '2018-08-16', 67, 'Aprobado', '2018-08-16'),
(192, 137, 93, 117, '2018-08-16', 87, 'Muy Bueno', '2018-08-16'),
(193, 137, 94, 124, '2018-08-16', 67, 'Aprobado', '2018-08-16'),
(194, 137, 95, 124, '2018-08-16', 87, 'Muy Bueno', '2018-08-16'),
(195, 137, 96, 124, '2018-08-16', 77, 'Bueno', '2018-08-16'),
(196, 138, 87, 126, '2018-08-16', 80, 'Bueno', '2018-08-16'),
(197, 138, 91, 126, '2018-08-16', 76, 'Bueno', '2018-08-16'),
(198, 138, 92, 118, '2018-08-16', 65, 'Aprobado', '2018-08-16'),
(199, 138, 93, 118, '2018-08-16', 80, 'Bueno', '2018-08-16'),
(200, 138, 94, 118, '2018-08-16', 65, 'Aprobado', '2018-08-16'),
(201, 138, 95, 118, '2018-08-16', 68, 'Aprobado', '2018-08-16'),
(202, 138, 96, 118, '2018-08-16', 75, 'Bueno', '2018-08-16'),
(208, 139, 94, 127, '2018-08-16', 65, 'Aprobado', '2018-08-16'),
(209, 139, 87, 119, '2018-08-16', 65, 'Aprobado', '2018-08-16'),
(210, 139, 93, 127, '2018-08-16', 86, 'Muy Bueno', '2018-08-16'),
(211, 139, 92, 127, '2018-08-16', 78, 'Bueno', '2018-08-16'),
(212, 139, 95, 127, '2018-08-16', 76, 'Bueno', '2018-08-16'),
(213, 139, 96, 127, '2018-08-16', 66, 'Aprobado', '2018-08-16'),
(214, 139, 91, 119, '2018-08-16', 77, 'Bueno', '2018-08-16'),
(215, 140, 91, 120, '2018-08-16', 67, 'Aprobado', '2018-08-16'),
(216, 140, 87, 120, '2018-08-16', 66, 'Aprobado', '2018-08-16'),
(217, 140, 96, 120, '2018-08-16', 65, 'Aprobado', '2018-08-16'),
(218, 140, 95, 120, '2018-08-16', 77, 'Bueno', '2018-08-16'),
(219, 140, 92, 120, '2018-08-16', 87, 'Muy Bueno', '2018-08-16'),
(220, 140, 93, 120, '2018-08-16', 65, 'Aprobado', '2018-08-16'),
(221, 140, 94, 120, '2018-08-16', 45, 'Reprobado', '2018-08-16'),
(222, 141, 91, 121, '2018-08-17', 56, 'Reprobado', '2018-08-17'),
(223, 141, 87, 121, '2018-08-17', 75, 'Bueno', '2018-08-17'),
(224, 141, 96, 121, '2018-08-17', 77, 'Bueno', '2018-08-17'),
(225, 141, 95, 121, '2018-08-17', 85, 'Muy Bueno', '2018-08-17'),
(226, 141, 92, 121, '2018-08-17', 70, 'Aprobado', '2018-08-17'),
(227, 141, 93, 121, '2018-08-17', 65, 'Aprobado', '2018-08-17'),
(228, 142, 87, 122, '2018-08-17', 67, 'Aprobado', '2018-08-17'),
(229, 142, 96, 122, '2018-08-17', 65, 'Aprobado', '2018-08-17'),
(230, 142, 95, 122, '2018-08-17', 76, 'Bueno', '2018-08-17'),
(231, 142, 92, 122, '2018-08-17', 75, 'Bueno', '2018-08-17'),
(232, 142, 93, 122, '2018-08-17', 65, 'Aprobado', '2018-08-17'),
(233, 143, 87, 123, '2018-08-17', 56, 'Reprobado', '2018-08-17'),
(234, 143, 92, 123, '2018-08-17', 67, 'Aprobado', '2018-08-17'),
(235, 143, 93, 123, '2018-08-17', 77, 'Bueno', '2018-08-17'),
(236, 143, 95, 123, '2018-08-17', 66, 'Aprobado', '2018-08-17'),
(238, 165, 102, 149, '2018-08-17', 66, 'Aprobado', '2018-08-31'),
(239, 166, 102, 150, '2018-08-27', NULL, NULL, NULL),
(240, 158, 104, 142, '2018-08-30', 67, 'Aprobado', '2018-08-30'),
(241, 158, 98, 142, '2018-08-30', 75, 'Bueno', '2018-08-30'),
(242, 158, 99, 142, '2018-08-30', 80, 'Bueno', '2018-08-30'),
(243, 158, 100, 142, '2018-08-30', 75, 'Bueno', '2018-08-30'),
(244, 158, 101, 142, '2018-08-30', 65, 'Aprobado', '2018-08-30'),
(245, 159, 98, 143, '2018-08-30', 70, 'Aprobado', '2018-08-30'),
(246, 159, 99, 143, '2018-08-30', 65, 'Aprobado', '2018-08-30'),
(247, 159, 100, 143, '2018-08-30', 65, 'Aprobado', '2018-08-30'),
(248, 159, 101, 143, '2018-08-30', 80, 'Bueno', '2018-08-30'),
(249, 159, 104, 143, '2018-08-30', 90, 'Muy Bueno', '2018-08-30'),
(250, 160, 98, 144, '2018-08-30', 60, 'Reprobado', '2018-08-30'),
(251, 160, 99, 144, '2018-08-30', 70, 'Aprobado', '2018-08-30'),
(252, 160, 100, 144, '2018-08-30', 95, 'Excelente', '2018-08-30'),
(253, 160, 101, 144, '2018-08-30', 85, 'Muy Bueno', '2018-08-30'),
(254, 160, 104, 144, '2018-08-30', 69, 'Aprobado', '2018-08-30'),
(255, 161, 99, 145, '2018-08-30', 67, 'Aprobado', '2018-08-30'),
(256, 161, 100, 145, '2018-08-30', 85, 'Muy Bueno', '2018-08-30'),
(257, 161, 101, 145, '2018-08-30', 85, 'Muy Bueno', '2018-08-30'),
(258, 161, 104, 145, '2018-08-30', 90, 'Muy Bueno', '2018-08-30'),
(259, 162, 99, 146, '2018-08-30', 65, 'Aprobado', '2018-08-30'),
(260, 162, 100, 146, '2018-08-30', 75, 'Bueno', '2018-08-30'),
(261, 162, 101, 146, '2018-08-30', 75, 'Bueno', '2018-08-30'),
(262, 162, 104, 146, '2018-08-30', 75, 'Bueno', '2018-08-30'),
(263, 163, 99, 147, '2018-08-30', 79, 'Bueno', '2018-08-30'),
(264, 163, 100, 147, '2018-08-30', 80, 'Bueno', '2018-08-30'),
(265, 163, 101, 147, '2018-08-30', 85, 'Muy Bueno', '2018-08-30'),
(266, 163, 104, 147, '2018-08-30', 80, 'Bueno', '2018-08-30'),
(267, 164, 99, 148, '2018-08-31', 65, 'Aprobado', '2018-08-31'),
(268, 164, 100, 148, '2018-08-31', 70, 'Aprobado', '2018-08-31'),
(269, 164, 101, 148, '2018-08-31', 75, 'Bueno', '2018-08-31'),
(270, 164, 104, 148, '2018-08-31', 70, 'Aprobado', '2018-08-31'),
(271, 164, 105, 148, '2018-08-31', 80, 'Bueno', '2018-08-31'),
(272, 165, 106, 149, '2018-08-31', 75, 'Bueno', '2018-08-31'),
(273, 165, 107, 149, '2018-08-31', 90, 'Muy Bueno', '2018-08-31'),
(274, 167, 108, 151, '2018-08-31', NULL, NULL, NULL);

--
-- Disparadores `asignacion_modulo_diplomante`
--
DELIMITER $$
CREATE TRIGGER `bit_actualiza_nota_bu` AFTER UPDATE ON `asignacion_modulo_diplomante` FOR EACH ROW BEGIN
        IF OLD.nota IS NULL THEN
    INSERT INTO bit_asignacion_modiplo(
        idBit_amd,
        idinscripcion_bamd,
        idmodulo_bamd,
        anterior_paralelo,
        anterior_nota,
        anterior_establecen,
        nueva_nota,
        nueva_establecen,
        usuario,
        fecha_modif
    )
VALUES(
    OLD.idAsignacionMDI,
    OLD.idInscripcion,
    OLD.idModulo,
    OLD.idParalelo,
    0,
    "Sin Nota",
    NEW.nota,
    NEW.establece_nota,
    SUBSTRING(
        USER(), 1,(INSTR(USER(), '@') -1)), NOW()) ; ELSE
    INSERT INTO bit_asignacion_modiplo(
        idBit_amd,
        idinscripcion_bamd,
        idmodulo_bamd,
        anterior_paralelo,
        anterior_nota,
        anterior_establecen,
        nueva_nota,
        nueva_establecen,
        usuario,
        fecha_modif
    )
VALUES(
    OLD.idAsignacionMDI,
    OLD.idInscripcion,
    OLD.idModulo,
    OLD.idParalelo,
    OLD.nota,
    OLD.establece_nota,
    NEW.nota,
    NEW.establece_nota,
    SUBSTRING(
        USER(), 1,(INSTR(USER(), '@') -1)), NOW()) ;
        END IF ;
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `bit_nota_eliminar` AFTER DELETE ON `asignacion_modulo_diplomante` FOR EACH ROW INSERT INTO bitacora(
    ip,
    usuario,
    nombreTabla,
    operacion,
    fecha
)
VALUES(
    SUBSTRING(USER(),(INSTR(USER(), '@') +1)), SUBSTRING(
        USER(), 1,(INSTR(USER(), '@') -1)), "Calificacion_Diplomante", "Eliminó_nota", NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `bitacora_nota_insertar` AFTER INSERT ON `asignacion_modulo_diplomante` FOR EACH ROW INSERT INTO bitacora(
        ip,
        usuario,
        nombreTabla,
        operacion,
        fecha
    )
VALUES(
    SUBSTRING(USER(),(INSTR(USER(), '@') +1)), SUBSTRING(
        USER(), 1,(INSTR(USER(), '@') -1)), "Calificacion_Diplomante", "Insertó_nota", NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `idBitacora` int(11) NOT NULL,
  `ip` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `nombreTabla` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `operacion` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`idBitacora`, `ip`, `usuario`, `nombreTabla`, `operacion`, `fecha`) VALUES
(121, 'localhost', '0', 'inscripcion', 'Actualizó', '2018-07-31 19:40:57'),
(122, 'localhost', '0', 'inscripcion', 'Actualizó', '2018-07-31 19:40:57'),
(123, 'localhost', '0', 'inscripcion', 'Actualizó', '2018-07-31 19:40:57'),
(124, 'localhost', '0', 'inscripcion', 'Actualizó', '2018-07-31 19:41:18'),
(125, 'localhost', '0', 'inscripcion', 'Actualizó', '2018-07-31 19:42:22'),
(126, 'localhost', '0', 'inscripcion', 'Actualizó', '2018-07-31 19:42:22'),
(127, 'localhost', '0', 'inscripcion', 'Actualizó', '2018-07-31 19:42:22'),
(128, 'localhost', '3', 'inscripcion', 'Actualizó', '2018-07-31 22:49:22'),
(129, 'localhost', '3', 'inscripcion', 'Actualizó', '2018-07-31 22:49:22'),
(130, 'localhost', '3', 'inscripcion', 'Actualizó', '2018-07-31 22:49:22'),
(131, 'localhost', 'eli', 'inscripcion', 'Actualizó', '2018-07-31 23:00:51'),
(132, 'localhost', 'eli', 'inscripcion', 'Actualizó', '2018-07-31 23:00:51'),
(133, 'localhost', 'eli', 'inscripcion', 'Actualizó', '2018-07-31 23:00:51'),
(134, 'localhost', 'root', 'inscripcion', 'Actualizó', '2018-07-31 23:12:19'),
(135, 'localhost', 'root', 'inscripcion', 'Actualizó', '2018-07-31 23:12:19'),
(136, 'localhost', 'root', 'inscripcion', 'Actualizó', '2018-07-31 23:12:20'),
(137, 'localhost', 'root', 'inscripcion', 'Actualizó', '2018-07-31 23:15:24'),
(138, 'localhost', 'root', 'inscripcion', 'Actualizó', '2018-07-31 23:15:24'),
(139, 'localhost', 'root', 'inscripcion', 'Actualizó', '2018-07-31 23:15:25'),
(140, 'localhost', 'SELECT nombreU FROM usuario WHERE idUsuario=4', 'inscripcion', 'Actualizó', '2018-07-31 23:17:10'),
(141, 'localhost', 'SELECT nombreU FROM usuario WHERE idUsuario=4', 'inscripcion', 'Actualizó', '2018-07-31 23:17:10'),
(142, 'localhost', 'SELECT nombreU FROM usuario WHERE idUsuario=4', 'inscripcion', 'Actualizó', '2018-07-31 23:17:11'),
(143, 'localhost', 'root@localhost', 'inscripcion', 'Actualizó', '2018-08-01 02:18:28'),
(144, 'localhost', 'root@localhost', 'inscripcion', 'Actualizó', '2018-08-01 02:18:28'),
(145, 'localhost', 'root@localhost', 'inscripcion', 'Actualizó', '2018-08-01 02:18:28'),
(146, 'localhost', 'root@localhost', 'inscripcion', 'Actualizó', '2018-08-01 09:50:15'),
(147, 'localhost', 'root@localhost', 'inscripcion', 'Actualizó', '2018-08-01 09:50:15'),
(148, 'localhost', 'root@localhost', 'inscripcion', 'Actualizó', '2018-08-01 09:50:16'),
(149, 'localhost', 'root', 'inscripcion', 'Actualizó', '2018-08-01 09:51:59'),
(150, 'localhost', 'root', 'inscripcion', 'Actualizó', '2018-08-01 09:51:59'),
(151, 'localhost', 'root', 'inscripcion', 'Actualizó', '2018-08-01 09:51:59'),
(152, 'localhost', 'root', 'inscripcion', 'Actualizó', '2018-08-01 10:42:10'),
(153, 'localhost', 'root', 'inscripcion', 'Actualizó', '2018-08-01 10:42:10'),
(154, 'localhost', 'root', 'inscripcion', 'Actualizó', '2018-08-01 10:42:10'),
(155, 'localhost', 'root', 'inscripcion', 'Insertó_Diplomante', '2018-08-10 00:07:37'),
(156, 'localhost', 'root', 'inscripcion', 'Insertó', '2018-08-10 11:36:25'),
(157, 'localhost', 'root', 'inscripcion', 'Eliminó', '2018-08-10 12:05:17'),
(158, 'localhost', 'root', 'inscripcion', 'Insertó', '2018-08-10 12:08:40'),
(159, 'localhost', 'root', 'inscripcion', 'Eliminó_Inscripción', '2018-08-10 12:59:44'),
(160, 'localhost', 'root', 'inscripcion', 'Eliminó', '2018-08-10 13:48:25'),
(161, 'localhost', 'root', 'inscripcion', 'Insertó', '2018-08-10 13:50:23'),
(162, 'localhost', 'root', 'inscripcion', 'Insertó_Diplomante', '2018-08-10 13:57:15'),
(163, 'localhost', 'root', 'inscripcion', 'Insertó', '2018-08-10 13:57:38'),
(164, 'localhost', 'root', 'inscripcion', 'Insertó_Diplomante', '2018-08-10 14:03:30'),
(165, 'localhost', 'root', 'inscripcion', 'Insertó', '2018-08-10 14:03:43'),
(166, 'localhost', 'root', 'inscripcion', 'Insertó', '2018-08-11 15:52:42'),
(167, 'localhost', 'root', 'inscripcion', 'Eliminó_Inscripción', '2018-08-11 16:03:14'),
(168, 'localhost', 'root', 'inscripcion', 'Eliminó_Inscripción', '2018-08-11 16:12:18'),
(169, 'localhost', 'root', 'inscripcion', 'Insertó_Diplomante', '2018-08-11 22:22:52'),
(170, 'localhost', 'root', 'inscripcion', 'Eliminó_Inscripción', '2018-08-11 22:24:00'),
(171, 'localhost', 'root', 'inscripcion', 'Insertó_Diplomante', '2018-08-11 22:34:31'),
(172, 'localhost', 'root', 'inscripcion', 'Insertó', '2018-08-11 22:39:13'),
(173, 'localhost', 'root', 'inscripcion', 'Insertó_Diplomante', '2018-08-12 23:29:29'),
(174, 'localhost', 'root', 'inscripcion', 'Insertó', '2018-08-13 00:56:10'),
(175, 'localhost', 'root', 'inscripcion', 'Insertó_Diplomante', '2018-08-13 00:58:22'),
(176, 'localhost', 'root', 'inscripcion', 'Insertó_Diplomante', '2018-08-13 01:00:37'),
(177, 'localhost', 'root', 'inscripcion', 'Insertó_Diplomante', '2018-08-13 01:02:32'),
(178, 'localhost', 'root', 'inscripcion', 'Insertó_Diplomante', '2018-08-13 01:12:59'),
(179, 'localhost', 'root', 'inscripcion', 'Insertó_Diplomante', '2018-08-13 01:26:56'),
(180, 'localhost', 'root', 'inscripcion', 'Insertó', '2018-08-13 01:27:09'),
(181, 'localhost', 'root', 'inscripcion', 'Insertó_Diplomante', '2018-08-13 01:39:25'),
(182, 'localhost', 'root', 'inscripcion', 'Insertó', '2018-08-13 01:39:36'),
(183, 'localhost', 'root', 'inscripcion', 'Insertó_Diplomante', '2018-08-13 01:41:41'),
(184, 'localhost', 'root', 'inscripcion', 'Insertó_Diplomante', '2018-08-13 01:43:31'),
(185, 'localhost', 'root', 'inscripcion', 'Insertó', '2018-08-13 01:43:36'),
(186, 'localhost', 'root', 'inscripcion', 'Insertó', '2018-08-13 01:45:54'),
(187, 'localhost', 'root', 'inscripcion', 'Insertó', '2018-08-13 01:46:08'),
(188, 'localhost', 'root', 'inscripcion', 'Insertó', '2018-08-13 01:46:26'),
(189, 'localhost', 'root', 'inscripcion', 'Insertó', '2018-08-13 01:47:06'),
(190, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-13 14:26:36'),
(191, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-13 14:28:35'),
(192, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-13 14:28:48'),
(193, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-13 14:28:59'),
(194, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-13 14:40:09'),
(195, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-13 14:40:20'),
(196, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-13 14:40:29'),
(197, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-13 14:40:45'),
(198, 'localhost', 'root', 'inscripcion', 'Insertó_Diplomante', '2018-08-16 03:07:16'),
(199, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-16 03:07:52'),
(200, 'localhost', 'root', 'inscripcion', 'Insertó_Diplomante', '2018-08-16 03:09:39'),
(201, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-16 03:12:14'),
(202, 'localhost', 'root', 'inscripcion', 'Insertó_Diplomante', '2018-08-16 03:18:01'),
(203, 'localhost', 'root', 'inscripcion', 'Insertó_Diplomante', '2018-08-16 03:20:51'),
(204, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-16 03:20:56'),
(205, 'localhost', 'root', 'inscripcion', 'Insertó_Diplomante', '2018-08-16 03:22:08'),
(206, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-16 03:22:14'),
(207, 'localhost', 'root', 'inscripcion', 'Insertó_Diplomante', '2018-08-16 03:23:51'),
(208, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-16 03:23:55'),
(209, 'localhost', 'root', 'inscripcion', 'Insertó_Diplomante', '2018-08-16 03:25:17'),
(210, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-16 03:25:21'),
(211, 'localhost', 'root', 'inscripcion', 'Insertó_Diplomante', '2018-08-16 03:26:36'),
(212, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-16 03:26:40'),
(213, 'localhost', 'root', 'inscripcion', 'Insertó_Diplomante', '2018-08-16 03:27:56'),
(214, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-16 03:28:01'),
(215, 'localhost', 'root', 'inscripcion', 'Insertó_Diplomante', '2018-08-16 03:29:39'),
(216, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-16 03:29:43'),
(217, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-16 03:36:12'),
(218, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-16 03:37:09'),
(219, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-16 03:37:20'),
(220, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-16 03:37:29'),
(221, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-16 03:38:18'),
(222, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-16 03:38:28'),
(223, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-16 03:38:36'),
(224, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-16 19:08:51'),
(225, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-16 19:09:01'),
(226, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-16 19:22:09'),
(227, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-16 19:22:21'),
(228, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-16 22:12:20'),
(229, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-16 22:13:28'),
(230, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-16 22:13:38'),
(231, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-16 22:14:06'),
(232, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-16 22:14:14'),
(233, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-16 22:17:19'),
(234, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-16 23:48:12'),
(235, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-16 23:48:21'),
(236, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-16 23:48:42'),
(237, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-16 23:49:16'),
(238, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-16 23:49:25'),
(239, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-16 23:49:35'),
(240, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-16 23:49:45'),
(241, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-17 00:07:23'),
(242, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-17 00:07:32'),
(243, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-17 00:07:42'),
(244, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-17 00:07:53'),
(245, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-17 00:08:04'),
(246, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-17 00:08:13'),
(247, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-17 00:13:28'),
(248, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-17 00:14:38'),
(249, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-17 00:14:51'),
(250, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-17 00:15:02'),
(251, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-17 00:15:14'),
(252, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-17 00:26:06'),
(253, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-17 00:26:17'),
(254, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-17 00:26:24'),
(255, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-17 00:26:32'),
(256, 'localhost', 'root', 'inscripcion', 'Insertó_Diplomante', '2018-08-17 01:08:23'),
(257, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-17 01:09:10'),
(258, 'localhost', 'root', 'inscripcion', 'Eliminó_Inscripción', '2018-08-17 01:13:24'),
(259, 'localhost', 'root', 'inscripcion', 'Insertó_Diplomante', '2018-08-17 01:24:16'),
(260, 'localhost', 'root', 'inscripcion', 'Insertó_Diplomante', '2018-08-17 01:26:52'),
(261, 'localhost', 'root', 'inscripcion', 'Insertó_Diplomante', '2018-08-17 01:28:55'),
(262, 'localhost', 'root', 'inscripcion', 'Insertó_Diplomante', '2018-08-17 01:41:58'),
(263, 'localhost', 'root', 'inscripcion', 'Insertó_Diplomante', '2018-08-17 09:33:59'),
(264, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-17 09:34:23'),
(265, 'localhost', 'root', 'inscripcion', 'Insertó_Diplomante', '2018-08-27 19:10:27'),
(266, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-27 19:11:33'),
(267, 'localhost', 'root', 'inscripcion', 'Insertó_Diplomante', '2018-08-30 23:39:39'),
(268, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-30 23:39:55'),
(269, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-30 23:40:08'),
(270, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-30 23:40:21'),
(271, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-30 23:40:34'),
(272, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-30 23:40:51'),
(273, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-30 23:48:43'),
(274, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-30 23:48:53'),
(275, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-30 23:49:04'),
(276, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-30 23:49:15'),
(277, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-30 23:49:31'),
(278, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-30 23:50:51'),
(279, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-30 23:51:02'),
(280, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-30 23:51:11'),
(281, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-30 23:51:21'),
(282, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-30 23:51:32'),
(283, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-30 23:54:27'),
(284, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-30 23:54:37'),
(285, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-30 23:54:49'),
(286, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-30 23:54:57'),
(287, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-30 23:56:54'),
(288, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-30 23:57:03'),
(289, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-30 23:57:10'),
(290, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-30 23:57:21'),
(291, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-30 23:58:16'),
(292, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-30 23:58:26'),
(293, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-30 23:58:43'),
(294, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-30 23:58:58'),
(295, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-31 00:01:14'),
(296, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-31 00:01:25'),
(297, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-31 00:01:33'),
(298, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-31 00:01:43'),
(299, 'localhost', 'root', 'inscripcion', 'Insertó_Diplomante', '2018-08-31 00:03:12'),
(300, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-31 00:03:34'),
(301, 'localhost', 'root', 'inscripcion', 'Insertó_Diplomante', '2018-08-31 00:42:01'),
(302, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-31 00:42:07'),
(303, 'localhost', 'root', 'inscripcion', 'Insertó_Diplomante', '2018-08-31 00:44:07'),
(304, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-31 00:44:11'),
(305, 'localhost', 'root', 'inscripcion', 'Insertó_Diplomante', '2018-08-31 09:36:46'),
(306, 'localhost', 'root', 'Calificacion_Diplomante', 'Insertó_nota', '2018-08-31 09:37:23');

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
(163, 4, '6712856', '2018-07-23', '11:42:30', '2018-07-25', '17:14:04', 0),
(164, 2, '6712855', '2018-07-23', '11:42:36', '2018-07-25', '18:30:48', 0),
(165, 1, '6712854', '2018-07-23', '12:15:34', '2018-07-23', '18:17:56', 0),
(166, 1, '6712854', '2018-07-23', '13:16:26', '2018-07-23', '18:17:56', 0),
(167, 2, '6712855', '2018-07-23', '17:12:00', '2018-07-25', '18:30:48', 0),
(168, 2, '6712855', '2018-07-23', '17:58:44', '2018-07-25', '18:30:48', 0),
(169, 1, '6712854', '2018-07-23', '18:16:37', '2018-07-23', '18:17:56', 0),
(170, 4, '6712856', '2018-07-23', '18:18:00', '2018-07-25', '17:14:04', 0),
(171, 4, '6712856', '2018-07-24', '00:38:26', '2018-07-25', '17:14:04', 0),
(172, 4, '6712856', '2018-07-24', '00:42:04', '2018-07-25', '17:14:04', 0),
(173, 4, '6712856', '2018-07-24', '05:53:52', '2018-07-25', '17:14:04', 0),
(174, 2, '6712855', '2018-07-24', '18:36:27', '2018-07-25', '18:30:48', 0),
(175, 4, '6712856', '2018-07-24', '18:37:13', '2018-07-25', '17:14:04', 0),
(176, 4, '6712856', '2018-07-25', '00:08:16', '2018-07-25', '17:14:04', 0),
(177, 4, '6712856', '2018-07-25', '01:43:22', '2018-07-25', '17:14:04', 0),
(178, 2, '6712855', '2018-07-25', '15:49:46', '2018-07-25', '18:30:48', 0),
(179, 4, '6712856', '2018-07-25', '16:12:06', '2018-07-25', '17:14:04', 0),
(180, 2, '6712855', '2018-07-25', '17:14:10', '2018-07-25', '18:30:48', 0),
(181, 2, '6712855', '2018-07-25', '18:30:58', '2018-07-29', '01:00:04', 0),
(182, 2, '6712855', '2018-07-25', '23:18:11', '2018-07-29', '01:00:04', 0),
(183, 2, '6712855', '2018-07-26', '03:26:05', '2018-07-29', '01:00:04', 0),
(184, 2, '6712855', '2018-07-26', '03:26:07', '2018-07-29', '01:00:04', 0),
(185, 2, '6712855', '2018-07-26', '15:39:02', '2018-07-29', '01:00:04', 0),
(186, 2, '6712855', '2018-07-26', '15:40:06', '2018-07-29', '01:00:04', 0),
(187, 2, '6712855', '2018-07-26', '19:01:16', '2018-07-29', '01:00:04', 0),
(188, 2, '6712855', '2018-07-26', '22:57:02', '2018-07-29', '01:00:04', 0),
(189, 2, '6712855', '2018-07-26', '22:57:12', '2018-07-29', '01:00:04', 0),
(190, 2, '6712855', '2018-07-27', '01:21:39', '2018-07-29', '01:00:04', 0),
(191, 2, '6712855', '2018-07-27', '04:40:15', '2018-07-29', '01:00:04', 0),
(192, 2, '6712855', '2018-07-27', '13:14:21', '2018-07-29', '01:00:04', 0),
(193, 2, '6712855', '2018-07-27', '18:31:42', '2018-07-29', '01:00:04', 0),
(194, 2, '6712855', '2018-07-28', '03:13:02', '2018-07-29', '01:00:04', 0),
(195, 2, '6712855', '2018-07-28', '08:24:13', '2018-07-29', '01:00:04', 0),
(196, 2, '6712855', '2018-07-28', '19:17:21', '2018-07-29', '01:00:04', 0),
(197, 2, '6712855', '2018-07-28', '19:17:27', '2018-07-29', '01:00:04', 0),
(198, 2, '6712855', '2018-07-28', '22:38:11', '2018-07-29', '01:00:04', 0),
(199, 4, '6712856', '2018-07-29', '00:34:58', '2018-07-31', '14:30:41', 0),
(200, 2, '6712855', '2018-07-29', '01:00:14', '2018-07-30', '22:11:04', 0),
(201, 2, '6712855', '2018-07-29', '20:07:38', '2018-07-30', '22:11:04', 0),
(202, 2, '6712855', '2018-07-30', '06:51:53', '2018-07-30', '22:11:04', 0),
(203, 2, '6712855', '2018-07-30', '17:15:19', '2018-07-30', '22:11:04', 0),
(204, 2, '6712855', '2018-07-30', '19:54:14', '2018-07-30', '22:11:04', 0),
(205, 2, '6712855', '2018-07-30', '22:11:09', '2018-07-31', '06:28:48', 0),
(206, 4, '6712856', '2018-07-31', '01:20:26', '2018-07-31', '14:30:41', 0),
(207, 2, '6712855', '2018-07-31', '04:13:20', '2018-07-31', '06:28:48', 0),
(208, 2, '6712855', '2018-07-31', '06:18:02', '2018-07-31', '06:28:48', 0),
(209, 4, '6712856', '2018-07-31', '06:28:53', '2018-07-31', '14:30:41', 0),
(210, 2, '6712855', '2018-07-31', '14:28:53', '2018-07-31', '18:27:39', 0),
(211, 4, '6712856', '2018-07-31', '14:29:09', '2018-07-31', '14:30:41', 0),
(212, 4, '6712856', '2018-07-31', '14:30:56', '2018-07-31', '16:51:20', 0),
(213, 4, '6712856', '2018-07-31', '16:50:34', '2018-07-31', '16:51:20', 0),
(214, 2, '6712855', '2018-07-31', '16:51:30', '2018-07-31', '18:27:39', 0),
(215, 4, '6712856', '2018-07-31', '18:27:46', '2018-07-31', '19:18:42', 0),
(216, 2, '6712855', '2018-07-31', '19:18:48', '2018-08-09', '19:37:27', 0),
(217, 2, '6712855', '2018-07-31', '19:28:24', '2018-08-09', '19:37:27', 0),
(218, 2, '6712855', '2018-07-31', '22:49:04', '2018-08-09', '19:37:27', 0),
(219, 2, '6712855', '2018-08-01', '09:49:54', '2018-08-09', '19:37:27', 0),
(220, 4, '6712856', '2018-08-01', '10:54:29', '2018-08-01', '14:58:26', 0),
(221, 2, '6712855', '2018-08-01', '14:58:32', '2018-08-09', '19:37:27', 0),
(222, 2, '6712855', '2018-08-01', '15:34:11', '2018-08-09', '19:37:27', 0),
(223, 2, '6712855', '2018-08-08', '12:24:22', '2018-08-09', '19:37:27', 0),
(224, 2, '6712855', '2018-08-08', '19:08:28', '2018-08-09', '19:37:27', 0),
(225, 1, '6712854', '2018-08-08', '22:20:35', '2018-08-09', '17:16:28', 0),
(226, 4, '6712856', '2018-08-08', '22:25:01', '2018-08-09', '19:32:16', 0),
(227, 2, '6712855', '2018-08-09', '05:56:13', '2018-08-09', '19:37:27', 0),
(228, 1, '6712854', '2018-08-09', '06:35:00', '2018-08-09', '17:16:28', 0),
(229, 4, '6712856', '2018-08-09', '06:36:18', '2018-08-09', '19:32:16', 0),
(230, 2, '6712855', '2018-08-09', '16:11:51', '2018-08-09', '19:37:27', 0),
(231, 1, '6712854', '2018-08-09', '16:12:10', '2018-08-09', '17:16:28', 0),
(232, 4, '6712856', '2018-08-09', '16:12:23', '2018-08-09', '19:32:16', 0),
(233, 1, '6712854', '2018-08-09', '17:16:34', '2018-08-10', '11:45:09', 0),
(234, 2, '6712855', '2018-08-09', '19:32:25', '2018-08-09', '19:37:27', 0),
(235, 1, '6712854', '2018-08-09', '19:32:45', '2018-08-10', '11:45:09', 0),
(236, 4, '6712856', '2018-08-09', '19:37:33', '2018-08-09', '23:59:17', 0),
(237, 2, '6712855', '2018-08-09', '19:51:30', '2018-08-10', '00:08:37', 0),
(238, 1, '6712854', '2018-08-09', '23:59:23', '2018-08-10', '11:45:09', 0),
(239, 4, '6712856', '2018-08-10', '00:08:50', '2018-08-10', '14:16:28', 0),
(240, 4, '6712856', '2018-08-10', '00:09:03', '2018-08-10', '14:16:28', 0),
(241, 4, '6712856', '2018-08-10', '02:38:32', '2018-08-10', '14:16:28', 0),
(242, 1, '6712854', '2018-08-10', '03:51:08', '2018-08-10', '11:45:09', 0),
(243, 1, '6712854', '2018-08-10', '11:29:58', '2018-08-10', '11:45:09', 0),
(244, 1, '6712854', '2018-08-10', '11:30:11', '2018-08-10', '11:45:09', 0),
(245, 4, '6712856', '2018-08-10', '11:30:47', '2018-08-10', '14:16:28', 0),
(246, 2, '6712855', '2018-08-10', '11:45:15', '2018-08-10', '23:29:47', 0),
(247, 4, '6712856', '2018-08-10', '13:53:42', '2018-08-10', '14:16:28', 0),
(248, 1, '6712854', '2018-08-10', '14:16:34', '2018-08-10', '23:48:09', 0),
(249, 1, '6712854', '2018-08-10', '17:59:10', '2018-08-10', '23:48:09', 0),
(250, 1, '6712854', '2018-08-10', '18:00:12', '2018-08-10', '23:48:09', 0),
(251, 4, '6712856', '2018-08-10', '18:01:21', '2018-08-10', '23:47:35', 0),
(252, 2, '6712855', '2018-08-10', '21:38:35', '2018-08-10', '23:29:47', 0),
(253, 2, '6712855', '2018-08-10', '23:30:01', '2018-08-12', '21:28:47', 0),
(254, 4, '6712856', '2018-08-10', '23:47:46', '2018-08-12', '05:23:26', 0),
(255, 1, '6712854', '2018-08-10', '23:48:15', '2018-08-11', '06:56:00', 0),
(256, 1, '6712854', '2018-08-11', '06:55:53', '2018-08-11', '06:56:00', 0),
(257, 2, '6712855', '2018-08-11', '06:56:11', '2018-08-12', '21:28:47', 0),
(258, 4, '6712856', '2018-08-11', '14:28:47', '2018-08-12', '05:23:26', 0),
(259, 1, '6712854', '2018-08-11', '14:29:06', '2018-08-11', '14:29:19', 0),
(260, 2, '6712855', '2018-08-11', '14:29:43', '2018-08-12', '21:28:47', 0),
(261, 1, '6712854', '2018-08-11', '14:29:59', '2018-08-13', '03:38:01', 0),
(262, 1, '6712854', '2018-08-11', '22:21:05', '2018-08-13', '03:38:01', 0),
(263, 2, '6712855', '2018-08-11', '22:36:14', '2018-08-12', '21:28:47', 0),
(264, 1, '6712854', '2018-08-11', '22:36:58', '2018-08-13', '03:38:01', 0),
(265, 1, '6712854', '2018-08-12', '04:32:59', '2018-08-13', '03:38:01', 0),
(266, 4, '6712856', '2018-08-12', '04:33:57', '2018-08-12', '05:23:26', 0),
(267, 2, '6712855', '2018-08-12', '04:40:25', '2018-08-12', '21:28:47', 0),
(268, 4, '6712856', '2018-08-12', '05:23:36', '2018-08-13', '18:02:52', 0),
(269, 2, '6712855', '2018-08-12', '15:50:04', '2018-08-12', '21:28:47', 0),
(270, 4, '6712856', '2018-08-12', '16:48:06', '2018-08-13', '18:02:52', 0),
(271, 2, '6712855', '2018-08-12', '17:52:29', '2018-08-12', '21:28:47', 0),
(272, 1, '6712854', '2018-08-12', '21:28:51', '2018-08-13', '03:38:01', 0),
(273, 2, '6712855', '2018-08-12', '22:05:52', '2018-08-13', '14:28:05', 0),
(274, 2, '6712855', '2018-08-13', '01:52:38', '2018-08-13', '14:28:05', 0),
(275, 1, '6712854', '2018-08-13', '03:38:08', '2018-08-13', '12:56:13', 0),
(276, 2, '6712855', '2018-08-13', '04:02:11', '2018-08-13', '14:28:05', 0),
(277, 4, '6712856', '2018-08-13', '04:17:52', '2018-08-13', '18:02:52', 0),
(278, 2, '6712855', '2018-08-13', '11:17:12', '2018-08-13', '14:28:05', 0),
(279, 1, '6712854', '2018-08-13', '11:41:24', '2018-08-13', '12:56:13', 0),
(280, 2, '6712855', '2018-08-13', '12:56:18', '2018-08-13', '14:28:05', 0),
(281, 1, '6712854', '2018-08-13', '14:28:09', '2018-08-13', '16:56:55', 0),
(282, 4, '6712856', '2018-08-13', '14:48:37', '2018-08-13', '18:02:52', 0),
(283, 1, '6712854', '2018-08-13', '16:48:48', '2018-08-13', '16:56:55', 0),
(284, 2, '6712855', '2018-08-13', '16:57:00', '2018-08-14', '00:50:12', 0),
(285, 2, '6712855', '2018-08-13', '18:03:00', '2018-08-14', '00:50:12', 0),
(286, 4, '6712856', '2018-08-13', '22:06:59', '2018-08-14', '00:45:36', 0),
(287, 4, '6712856', '2018-08-14', '00:40:39', '2018-08-14', '00:45:36', 0),
(288, 2, '6712855', '2018-08-14', '00:45:41', '2018-08-14', '00:50:12', 0),
(289, 4, '6712856', '2018-08-14', '00:50:18', '2018-08-14', '04:30:12', 0),
(290, 1, '6712854', '2018-08-14', '02:18:39', '2018-08-14', '02:33:57', 0),
(291, 2, '6712855', '2018-08-14', '02:34:13', '2018-08-14', '02:59:47', 0),
(292, 2, '6712855', '2018-08-14', '02:34:25', '2018-08-14', '02:59:47', 0),
(293, 1, '6712854', '2018-08-14', '02:59:58', '2018-08-14', '04:30:04', 0),
(294, 2, '6712855', '2018-08-14', '15:55:01', '2018-08-15', '21:22:19', 0),
(295, 2, '6712855', '2018-08-14', '18:39:58', '2018-08-15', '21:22:19', 0),
(296, 4, '6712856', '2018-08-14', '22:38:27', '2018-08-17', '01:48:13', 0),
(297, 1, '6712854', '2018-08-14', '22:54:32', '2018-08-15', '21:19:45', 0),
(298, 2, '6712855', '2018-08-15', '21:17:58', '2018-08-15', '21:22:19', 0),
(299, 1, '6712854', '2018-08-15', '21:19:34', '2018-08-15', '21:19:45', 0),
(300, 2, '6712855', '2018-08-15', '21:19:51', '2018-08-15', '21:22:19', 0),
(301, 1, '6712854', '2018-08-15', '21:22:28', '2018-08-15', '22:07:38', 0),
(302, 1, '6712854', '2018-08-15', '22:07:24', '2018-08-15', '22:07:38', 0),
(303, 4, '6712856', '2018-08-15', '22:07:43', '2018-08-17', '01:48:13', 0),
(304, 2, '6712855', '2018-08-15', '22:50:10', '2018-08-16', '00:00:16', 0),
(305, 2, '6712855', '2018-08-15', '23:55:32', '2018-08-16', '00:00:16', 0),
(306, 1, '6712854', '2018-08-16', '00:16:26', '2018-08-17', '00:54:24', 0),
(307, 4, '6712856', '2018-08-16', '02:55:52', '2018-08-17', '01:48:13', 0),
(308, 1, '6712854', '2018-08-16', '02:57:41', '2018-08-17', '00:54:24', 0),
(309, 2, '6712855', '2018-08-16', '16:08:05', '2018-08-17', '01:27:29', 0),
(310, 1, '6712854', '2018-08-16', '16:09:48', '2018-08-17', '00:54:24', 0),
(311, 2, '6712855', '2018-08-16', '18:33:16', '2018-08-17', '01:27:29', 0),
(312, 1, '6712854', '2018-08-16', '18:34:02', '2018-08-17', '00:54:24', 0),
(313, 4, '6712856', '2018-08-16', '19:37:34', '2018-08-17', '01:48:13', 0),
(314, 4, '6712856', '2018-08-16', '23:54:16', '2018-08-17', '01:48:13', 0),
(315, 1, '6712854', '2018-08-17', '00:54:54', '2018-08-17', '01:42:48', 0),
(316, 1, '6712854', '2018-08-17', '01:27:35', '2018-08-17', '01:42:48', 0),
(317, 4, '6712856', '2018-08-17', '07:56:49', '2018-08-17', '07:59:00', 0),
(318, 2, '6712855', '2018-08-17', '07:57:41', '2018-08-17', '07:58:48', 0),
(319, 2, '6712855', '2018-08-17', '09:26:46', '2018-08-22', '00:09:39', 0),
(320, 4, '6712856', '2018-08-17', '09:27:09', '0000-00-00', '00:00:00', 1),
(321, 1, '6712854', '2018-08-17', '09:33:01', '0000-00-00', '00:00:00', 1),
(322, 2, '6712855', '2018-08-21', '00:50:09', '2018-08-22', '00:09:39', 0),
(323, 2, '6712855', '2018-08-21', '05:18:18', '2018-08-22', '00:09:39', 0),
(324, 2, '6712855', '2018-08-21', '12:33:44', '2018-08-22', '00:09:39', 0),
(325, 2, '6712855', '2018-08-21', '22:37:49', '2018-08-22', '00:09:39', 0),
(326, 2, '6712855', '2018-08-22', '00:09:45', '2018-08-22', '00:48:57', 0),
(327, 2, '6712855', '2018-08-22', '00:48:00', '2018-08-22', '00:48:57', 0),
(328, 4, '6712856', '2018-08-22', '00:49:07', '0000-00-00', '00:00:00', 1),
(329, 2, '6712855', '2018-08-22', '05:11:50', '0000-00-00', '00:00:00', 1),
(330, 2, '6712855', '2018-08-22', '19:08:29', '0000-00-00', '00:00:00', 1),
(331, 2, '6712855', '2018-08-23', '05:35:35', '0000-00-00', '00:00:00', 1),
(332, 4, '6712856', '2018-08-23', '06:28:26', '0000-00-00', '00:00:00', 1),
(333, 2, '6712855', '2018-08-23', '18:20:04', '0000-00-00', '00:00:00', 1),
(334, 2, '6712855', '2018-08-27', '19:05:58', '0000-00-00', '00:00:00', 1),
(335, 4, '6712856', '2018-08-27', '19:06:13', '0000-00-00', '00:00:00', 1),
(336, 1, '6712854', '2018-08-27', '19:06:21', '0000-00-00', '00:00:00', 1),
(337, 2, '6712855', '2018-08-27', '23:22:24', '0000-00-00', '00:00:00', 1),
(338, 4, '6712856', '2018-08-27', '23:22:47', '0000-00-00', '00:00:00', 1),
(339, 1, '6712854', '2018-08-27', '23:23:06', '0000-00-00', '00:00:00', 1),
(340, 4, '6712856', '2018-08-30', '22:13:32', '0000-00-00', '00:00:00', 1),
(341, 1, '6712854', '2018-08-30', '22:13:48', '0000-00-00', '00:00:00', 1),
(342, 2, '6712855', '2018-08-30', '22:13:55', '0000-00-00', '00:00:00', 1),
(343, 1, '6712854', '2018-08-31', '08:51:32', '0000-00-00', '00:00:00', 1),
(344, 2, '6712855', '2018-08-31', '08:51:41', '0000-00-00', '00:00:00', 1),
(345, 4, '6712856', '2018-08-31', '08:51:54', '0000-00-00', '00:00:00', 1);

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
(31, 44, 1, '2018-07-23', '04:48:16', 'ssss'),
(32, 44, 0, '2018-07-31', '01:20:41', 'Termino de Version.'),
(33, 44, 1, '2018-07-31', '06:29:25', 'Otra ves Iniciar'),
(34, 45, 1, '2018-08-10', '13:54:01', 'reiniciando'),
(35, 44, 1, '2018-08-13', '16:39:27', 'Habilitando directora'),
(36, 44, 0, '2018-08-13', '16:40:29', 'Termino de Version.'),
(37, 45, 1, '2018-08-13', '16:41:05', 'Volviendo a Habilitar'),
(38, 45, 0, '2018-08-14', '02:54:43', 'Termino de Version.'),
(39, 45, 1, '2018-08-14', '03:08:39', ''),
(40, 45, 1, '2018-08-14', '03:53:08', ''),
(41, 45, 0, '2018-08-16', '02:56:09', 'Termino de Version.'),
(42, 47, 1, '2018-08-16', '02:56:34', ''),
(43, 47, 1, '2018-08-17', '01:05:53', ''),
(44, 47, 0, '2018-08-17', '01:06:19', 'Termino de Version.'),
(46, 47, 1, '2018-08-17', '01:19:48', ''),
(47, 47, 0, '2018-08-17', '01:21:26', 'Termino de Version.'),
(48, 47, 1, '2018-08-17', '01:43:51', ''),
(49, 47, 0, '2018-08-17', '09:31:51', 'Termino de Version.'),
(50, 50, 1, '2018-08-17', '09:37:42', ''),
(51, 47, 1, '2018-08-17', '09:38:03', ''),
(52, 47, 0, '2018-08-22', '00:49:16', 'Termino de Version.'),
(53, 47, 1, '2018-08-22', '00:49:56', ''),
(54, 47, 0, '2018-08-23', '06:28:42', 'Termino de Version.'),
(55, 51, 1, '2018-08-23', '06:29:03', ''),
(56, 47, 1, '2018-08-27', '19:15:44', 'rdg'),
(57, 50, 1, '2018-08-30', '22:28:34', ''),
(58, 47, 1, '2018-08-31', '00:12:33', 'Se Habilito por el Director'),
(59, 50, 1, '2018-08-31', '00:14:11', ''),
(60, 51, 1, '2018-08-31', '00:35:10', ''),
(61, 50, 1, '2018-08-31', '09:40:35', 'Se habilito la version');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bit_asignacion_modiplo`
--

CREATE TABLE `bit_asignacion_modiplo` (
  `idBit_amd` int(11) NOT NULL,
  `idinscripcion_bamd` int(11) NOT NULL,
  `idmodulo_bamd` int(11) NOT NULL,
  `anterior_paralelo` int(11) NOT NULL,
  `anterior_nota` float NOT NULL,
  `anterior_establecen` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nueva_nota` float NOT NULL,
  `nueva_establecen` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_modif` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `bit_asignacion_modiplo`
--

INSERT INTO `bit_asignacion_modiplo` (`idBit_amd`, `idinscripcion_bamd`, `idmodulo_bamd`, `anterior_paralelo`, `anterior_nota`, `anterior_establecen`, `nueva_nota`, `nueva_establecen`, `usuario`, `fecha_modif`) VALUES
(115, 0, 0, 0, 76, 'Bueno', 76, 'Bueno', 'root', '2018-08-01 10:42:10'),
(122, 0, 0, 0, 67, 'Aprobado', 67, 'Aprobado', 'root', '2018-08-01 10:42:10'),
(130, 0, 0, 0, 55, 'Reprobado', 44, 'Reprobado', 'root', '2018-08-01 10:42:10'),
(114, 0, 0, 0, 75, 'Bueno', 75, 'Bueno', 'root', '2018-08-10 11:43:20'),
(121, 0, 0, 0, 56, 'Reprobado', 56, 'Reprobado', 'root', '2018-08-10 11:43:20'),
(114, 0, 0, 0, 75, 'Bueno', 75, 'Bueno', 'root', '2018-08-10 12:38:49'),
(114, 0, 0, 0, 75, 'Bueno', 75, 'Bueno', 'root', '2018-08-10 12:41:16'),
(130, 0, 0, 0, 44, 'Reprobado', 44, 'Reprobado', 'root', '2018-08-10 12:42:36'),
(130, 0, 0, 0, 44, 'Reprobado', 44, 'Reprobado', 'root', '2018-08-10 12:43:15'),
(121, 0, 0, 0, 56, 'Reprobado', 56, 'Reprobado', 'root', '2018-08-10 12:43:47'),
(114, 0, 0, 0, 75, 'Bueno', 75, 'Bueno', 'root', '2018-08-10 12:43:47'),
(114, 0, 0, 0, 75, 'Bueno', 75, 'Bueno', 'root', '2018-08-10 12:44:08'),
(121, 0, 0, 0, 56, 'Reprobado', 56, 'Reprobado', 'root', '2018-08-10 12:44:08'),
(115, 0, 0, 0, 76, 'Bueno', 76, 'Bueno', 'root', '2018-08-10 13:00:46'),
(115, 0, 0, 0, 76, 'Bueno', 76, 'Bueno', 'root', '2018-08-10 13:00:59'),
(115, 0, 0, 0, 76, 'Bueno', 76, 'Bueno', 'root', '2018-08-10 13:01:25'),
(115, 0, 0, 0, 76, 'Bueno', 76, 'Bueno', 'root', '2018-08-10 13:01:41'),
(114, 0, 0, 0, 75, 'Bueno', 75, 'Bueno', 'root', '2018-08-10 13:10:15'),
(121, 0, 0, 0, 56, 'Reprobado', 56, 'Reprobado', 'root', '2018-08-10 13:10:15'),
(114, 0, 0, 0, 75, 'Bueno', 75, 'Bueno', 'root', '2018-08-10 13:10:46'),
(121, 0, 0, 0, 56, 'Reprobado', 56, 'Reprobado', 'root', '2018-08-10 13:10:46'),
(114, 0, 0, 0, 75, 'Bueno', 75, 'Bueno', 'root', '2018-08-10 13:12:27'),
(121, 0, 0, 0, 56, 'Reprobado', 56, 'Reprobado', 'root', '2018-08-10 13:12:28'),
(114, 0, 0, 0, 75, 'Bueno', 75, 'Bueno', 'root', '2018-08-10 13:22:23'),
(121, 0, 0, 0, 56, 'Reprobado', 56, 'Reprobado', 'root', '2018-08-10 13:22:23'),
(114, 0, 0, 0, 75, 'Bueno', 75, 'Bueno', 'root', '2018-08-10 13:38:52'),
(114, 0, 0, 0, 75, 'Bueno', 75, 'Bueno', 'root', '2018-08-10 13:40:53'),
(114, 0, 0, 0, 75, 'Bueno', 75, 'Bueno', 'root', '2018-08-10 13:49:31'),
(134, 71, 123, 98, 45, 'Reprobado', 45, 'Reprobado', 'root', '2018-08-10 20:24:29'),
(134, 71, 123, 106, 45, 'Reprobado', 45, 'Reprobado', 'root', '2018-08-10 20:29:09'),
(134, 71, 123, 98, 45, 'Reprobado', 45, 'Reprobado', 'root', '2018-08-10 20:30:05'),
(134, 71, 123, 106, 45, 'Reprobado', 45, 'Reprobado', 'root', '2018-08-10 20:33:19'),
(134, 71, 123, 98, 45, 'Reprobado', 67, 'Aprobado', 'root', '2018-08-10 20:39:18'),
(135, 72, 123, 98, 33, 'Reprobado', 88, 'Muy Bueno', 'root', '2018-08-10 20:39:18'),
(134, 71, 123, 98, 67, 'Aprobado', 67, 'Aprobado', 'root', '2018-08-10 20:40:56'),
(135, 72, 123, 98, 88, 'Muy Bueno', 88, 'Muy Bueno', 'root', '2018-08-10 20:40:57'),
(134, 71, 123, 106, 67, 'Aprobado', 67, 'Aprobado', 'root', '2018-08-10 20:41:49'),
(135, 72, 123, 106, 88, 'Muy Bueno', 88, 'Muy Bueno', 'root', '2018-08-10 20:42:05'),
(135, 72, 123, 98, 88, 'Muy Bueno', 88, 'Muy Bueno', 'root', '2018-08-10 20:49:46'),
(134, 71, 123, 98, 67, 'Aprobado', 67, 'Aprobado', 'root', '2018-08-10 20:52:53'),
(134, 71, 123, 106, 67, 'Aprobado', 67, 'Aprobado', 'root', '2018-08-10 20:53:07'),
(135, 72, 123, 106, 88, 'Muy Bueno', 88, 'Muy Bueno', 'root', '2018-08-10 20:53:07'),
(134, 71, 123, 98, 67, 'Aprobado', 66, 'Aprobado', 'root', '2018-08-10 20:54:08'),
(135, 72, 123, 98, 88, 'Muy Bueno', 75, 'Bueno', 'root', '2018-08-10 20:54:08'),
(134, 71, 123, 98, 66, 'Aprobado', 66, 'Aprobado', 'root', '2018-08-10 21:34:28'),
(135, 72, 123, 98, 75, 'Bueno', 75, 'Bueno', 'root', '2018-08-10 21:34:36'),
(141, 75, 123, 98, 67, 'Aprobado', 34, 'Reprobado', 'root', '2018-08-12 04:40:48'),
(142, 77, 123, 98, 77, 'Bueno', 67, 'Aprobado', 'root', '2018-08-12 04:40:48'),
(140, 76, 123, 106, 56, 'Reprobado', 1, 'Reprobado', 'root', '2018-08-12 04:41:06'),
(140, 76, 123, 106, 1, 'Reprobado', 1, 'Reprobado', 'root', '2018-08-12 04:41:27'),
(140, 76, 123, 98, 1, 'Reprobado', 1, 'Reprobado', 'root', '2018-08-12 04:41:41'),
(141, 75, 123, 98, 34, 'Reprobado', 34, 'Reprobado', 'root', '2018-08-12 04:41:41'),
(142, 77, 123, 98, 67, 'Aprobado', 67, 'Aprobado', 'root', '2018-08-12 04:41:41'),
(140, 76, 123, 106, 1, 'Reprobado', 1, 'Reprobado', 'root', '2018-08-12 04:41:57'),
(142, 77, 123, 106, 67, 'Aprobado', 67, 'Aprobado', 'root', '2018-08-12 04:44:37'),
(141, 75, 123, 106, 34, 'Reprobado', 0, 'Reprobado', 'root', '2018-08-12 04:44:38'),
(140, 76, 123, 98, 1, 'Reprobado', 0, 'Reprobado', 'root', '2018-08-12 05:24:00'),
(142, 77, 123, 106, 67, 'Aprobado', 67, 'Aprobado', 'root', '2018-08-13 01:50:12'),
(141, 75, 123, 106, 0, 'Reprobado', 0, 'Reprobado', 'root', '2018-08-13 01:50:12'),
(167, 75, 126, 101, 65, 'Aprobado', 65, 'Aprobado', 'root', '2018-08-13 13:20:43'),
(170, 84, 126, 101, 45, 'Reprobado', 45, 'Reprobado', 'root', '2018-08-13 13:20:43'),
(172, 77, 126, 101, 65, 'Aprobado', 65, 'Aprobado', 'root', '2018-08-13 13:20:43'),
(165, 67, 126, 101, 65, 'Aprobado', 65, 'Aprobado', 'root', '2018-08-13 13:20:43'),
(171, 86, 126, 101, 23, 'Reprobado', 23, 'Reprobado', 'root', '2018-08-13 13:20:43'),
(169, 83, 126, 101, 80, 'Bueno', 80, 'Bueno', 'root', '2018-08-13 13:20:43'),
(173, 76, 126, 101, 70, 'Aprobado', 70, 'Aprobado', 'root', '2018-08-13 13:20:44'),
(169, 83, 126, 101, 80, 'Bueno', 80, 'Bueno', 'root', '2018-08-13 13:21:03'),
(172, 77, 126, 101, 65, 'Aprobado', 65, 'Aprobado', 'root', '2018-08-13 13:21:03'),
(165, 67, 126, 101, 65, 'Aprobado', 65, 'Aprobado', 'root', '2018-08-13 13:21:03'),
(170, 84, 126, 101, 45, 'Reprobado', 45, 'Reprobado', 'root', '2018-08-13 13:21:03'),
(171, 86, 126, 101, 23, 'Reprobado', 20, 'Reprobado', 'root', '2018-08-13 13:21:03'),
(167, 75, 126, 101, 65, 'Aprobado', 65, 'Aprobado', 'root', '2018-08-13 13:21:04'),
(173, 76, 126, 101, 70, 'Aprobado', 70, 'Aprobado', 'root', '2018-08-13 13:21:04'),
(174, 76, 127, 102, 0, 'SinNota', 544, 'rango no establecido', 'root', '2018-08-13 14:21:35'),
(175, 67, 127, 102, 0, 'SinNota', 45, 'Reprobado', 'root', '2018-08-13 14:21:35'),
(176, 77, 127, 102, 0, 'SinNota', 65, 'Aprobado', 'root', '2018-08-13 14:21:35'),
(178, 83, 127, 102, 0, 'SinNota', 7, 'Reprobado', 'root', '2018-08-13 14:21:49'),
(176, 77, 127, 102, 0, 'SinNota', 65, 'Aprobado', 'root', '2018-08-13 14:21:49'),
(177, 75, 127, 102, 0, 'SinNota', 80, 'Bueno', 'root', '2018-08-13 14:21:49'),
(174, 76, 127, 102, 0, 'SinNota', 544, 'rango no establecido', 'root', '2018-08-13 14:21:49'),
(175, 67, 127, 102, 0, 'SinNota', 45, 'Reprobado', 'root', '2018-08-13 14:21:50'),
(178, 83, 127, 102, 0, 'SinNota', 7, 'Reprobado', 'root', '2018-08-13 14:23:45'),
(176, 77, 127, 102, 0, 'SinNota', 65, 'Aprobado', 'root', '2018-08-13 14:23:46'),
(174, 76, 127, 102, 0, 'SinNota', 100, 'Excelente', 'root', '2018-08-13 14:23:46'),
(177, 75, 127, 102, 0, 'SinNota', 80, 'Bueno', 'root', '2018-08-13 14:23:46'),
(175, 67, 127, 102, 0, 'SinNota', 45, 'Reprobado', 'root', '2018-08-13 14:23:46'),
(165, 67, 126, 101, 0, 'SinNota', 65, 'Aprobado', 'root', '2018-08-13 14:24:37'),
(172, 77, 126, 101, 0, 'SinNota', 65, 'Aprobado', 'root', '2018-08-13 14:24:37'),
(167, 75, 126, 101, 0, 'SinNota', 65, 'Aprobado', 'root', '2018-08-13 14:24:38'),
(170, 84, 126, 101, 0, 'SinNota', 55, 'Reprobado', 'root', '2018-08-13 14:24:38'),
(169, 83, 126, 101, 0, 'SinNota', 80, 'Bueno', 'root', '2018-08-13 14:24:38'),
(171, 86, 126, 101, 0, 'SinNota', 20, 'Reprobado', 'root', '2018-08-13 14:24:38'),
(173, 76, 126, 101, 0, 'SinNota', 70, 'Aprobado', 'root', '2018-08-13 14:24:38'),
(178, 83, 127, 102, 0, 'SinNota', 7, 'Reprobado', 'root', '2018-08-13 14:27:18'),
(177, 75, 127, 102, 0, 'SinNota', 80, 'Bueno', 'root', '2018-08-13 14:27:18'),
(174, 76, 127, 102, 0, 'SinNota', 100, 'Excelente', 'root', '2018-08-13 14:27:18'),
(175, 67, 127, 102, 0, 'SinNota', 70, 'Aprobado', 'root', '2018-08-13 14:27:18'),
(176, 77, 127, 102, 0, 'SinNota', 65, 'Aprobado', 'root', '2018-08-13 14:27:18'),
(182, 75, 128, 103, 0, 'SinNota', 80, 'Bueno', 'root', '2018-08-13 14:39:23'),
(180, 67, 128, 103, 0, 'SinNota', 75, 'Bueno', 'root', '2018-08-13 14:39:23'),
(179, 76, 128, 103, 0, 'SinNota', 68, 'Aprobado', 'root', '2018-08-13 14:39:23'),
(181, 77, 128, 103, 0, 'SinNota', 75, 'Bueno', 'root', '2018-08-13 14:39:23'),
(186, 75, 129, 104, 0, 'SinNota', 90, 'Muy Bueno', 'root', '2018-08-13 14:46:07'),
(185, 77, 129, 104, 0, 'SinNota', 78, 'Bueno', 'root', '2018-08-13 14:46:07'),
(184, 67, 129, 104, 0, 'SinNota', 65, 'Aprobado', 'root', '2018-08-13 14:46:07'),
(183, 76, 129, 104, 0, 'SinNota', 5, 'Reprobado', 'root', '2018-08-13 14:46:07'),
(184, 67, 129, 104, 0, 'SinNota', 65, 'Aprobado', 'root', '2018-08-13 14:46:19'),
(183, 76, 129, 104, 0, 'SinNota', 51, 'Reprobado', 'root', '2018-08-13 14:46:19'),
(185, 77, 129, 104, 0, 'SinNota', 78, 'Bueno', 'root', '2018-08-13 14:46:19'),
(186, 75, 129, 104, 0, 'SinNota', 90, 'Muy Bueno', 'root', '2018-08-13 14:46:19'),
(183, 76, 129, 104, 0, 'SinNota', 70, 'Aprobado', 'root', '2018-08-13 14:46:31'),
(184, 67, 129, 104, 0, 'SinNota', 65, 'Aprobado', 'root', '2018-08-13 14:46:31'),
(186, 75, 129, 104, 0, 'SinNota', 90, 'Muy Bueno', 'root', '2018-08-13 14:46:31'),
(185, 77, 129, 104, 0, 'SinNota', 78, 'Bueno', 'root', '2018-08-13 14:46:31'),
(186, 75, 129, 104, 0, 'SinNota', 70, 'Aprobado', 'root', '2018-08-13 16:31:13'),
(183, 76, 129, 104, 0, 'SinNota', 65, 'Aprobado', 'root', '2018-08-13 16:31:13'),
(184, 67, 129, 104, 0, 'SinNota', 80, 'Bueno', 'root', '2018-08-13 16:31:13'),
(185, 77, 129, 104, 0, 'SinNota', 76, 'Bueno', 'root', '2018-08-13 16:31:13'),
(184, 67, 129, 104, 80, 'Bueno', 1, 'Reprobado', 'root', '2018-08-13 16:37:17'),
(185, 77, 129, 104, 76, 'Bueno', 45, 'Reprobado', 'root', '2018-08-13 16:37:17'),
(186, 75, 129, 104, 70, 'Aprobado', 33, 'Reprobado', 'root', '2018-08-13 16:37:17'),
(183, 76, 129, 104, 65, 'Aprobado', 65, 'Aprobado', 'root', '2018-08-13 16:37:17'),
(183, 76, 129, 104, 65, 'Aprobado', 65, 'Aprobado', 'root', '2018-08-13 16:41:48'),
(184, 67, 129, 104, 1, 'Reprobado', 70, 'Aprobado', 'root', '2018-08-13 16:41:48'),
(186, 75, 129, 104, 33, 'Reprobado', 75, 'Bueno', 'root', '2018-08-13 16:41:48'),
(185, 77, 129, 104, 45, 'Reprobado', 80, 'Bueno', 'root', '2018-08-13 16:41:49'),
(187, 87, 137, 117, 0, 'Sin Nota', 45, 'Reprobado', 'root', '2018-08-16 03:13:39'),
(188, 88, 137, 117, 0, 'Sin Nota', 4, 'Reprobado', 'root', '2018-08-16 03:13:39'),
(187, 87, 137, 117, 45, 'Reprobado', 45, 'Reprobado', 'root', '2018-08-16 03:14:16'),
(188, 88, 137, 117, 4, 'Reprobado', 4, 'Reprobado', 'root', '2018-08-16 03:14:17'),
(187, 87, 137, 124, 45, 'Reprobado', 45, 'Reprobado', 'root', '2018-08-16 03:14:30'),
(188, 88, 137, 124, 4, 'Reprobado', 4, 'Reprobado', 'root', '2018-08-16 03:14:42'),
(187, 87, 137, 117, 45, 'Reprobado', 0, 'Reprobado', 'root', '2018-08-16 03:15:26'),
(188, 88, 137, 117, 4, 'Reprobado', 0, 'Reprobado', 'root', '2018-08-16 03:15:26'),
(188, 88, 137, 117, 0, 'Reprobado', 0, 'Reprobado', 'root', '2018-08-16 03:31:34'),
(187, 87, 137, 117, 0, 'Reprobado', 0, 'Reprobado', 'root', '2018-08-16 03:31:34'),
(189, 90, 137, 117, 0, 'Sin Nota', 45, 'Reprobado', 'root', '2018-08-16 03:32:58'),
(191, 92, 137, 117, 0, 'Sin Nota', 67, 'Aprobado', 'root', '2018-08-16 03:32:58'),
(192, 93, 137, 117, 0, 'Sin Nota', 87, 'Muy Bueno', 'root', '2018-08-16 03:32:59'),
(193, 94, 137, 117, 0, 'Sin Nota', 67, 'Aprobado', 'root', '2018-08-16 03:32:59'),
(194, 95, 137, 117, 0, 'Sin Nota', 87, 'Muy Bueno', 'root', '2018-08-16 03:32:59'),
(195, 96, 137, 117, 0, 'Sin Nota', 56, 'Reprobado', 'root', '2018-08-16 03:32:59'),
(187, 87, 137, 124, 0, 'Reprobado', 56, 'Reprobado', 'root', '2018-08-16 03:33:30'),
(188, 88, 137, 124, 0, 'Reprobado', 45, 'Reprobado', 'root', '2018-08-16 03:33:30'),
(190, 91, 137, 124, 0, 'Sin Nota', 88, 'Muy Bueno', 'root', '2018-08-16 03:33:30'),
(187, 87, 137, 124, 56, 'Reprobado', 77, 'Bueno', 'root', '2018-08-16 03:33:56'),
(190, 91, 137, 124, 88, 'Muy Bueno', 88, 'Muy Bueno', 'root', '2018-08-16 03:33:57'),
(188, 88, 137, 124, 45, 'Reprobado', 45, 'Reprobado', 'root', '2018-08-16 03:33:57'),
(189, 90, 137, 117, 45, 'Reprobado', 45, 'Reprobado', 'root', '2018-08-16 03:34:43'),
(191, 92, 137, 117, 67, 'Aprobado', 67, 'Aprobado', 'root', '2018-08-16 03:34:43'),
(192, 93, 137, 117, 87, 'Muy Bueno', 87, 'Muy Bueno', 'root', '2018-08-16 03:34:43'),
(193, 94, 137, 117, 67, 'Aprobado', 67, 'Aprobado', 'root', '2018-08-16 03:34:43'),
(194, 95, 137, 117, 87, 'Muy Bueno', 87, 'Muy Bueno', 'root', '2018-08-16 03:34:43'),
(195, 96, 137, 117, 56, 'Reprobado', 77, 'Bueno', 'root', '2018-08-16 03:34:43'),
(195, 96, 137, 117, 77, 'Bueno', 77, 'Bueno', 'root', '2018-08-16 03:35:13'),
(194, 95, 137, 117, 87, 'Muy Bueno', 87, 'Muy Bueno', 'root', '2018-08-16 03:35:13'),
(193, 94, 137, 117, 67, 'Aprobado', 67, 'Aprobado', 'root', '2018-08-16 03:35:14'),
(188, 88, 137, 124, 45, 'Reprobado', 45, 'Reprobado', 'root', '2018-08-16 03:35:31'),
(190, 91, 137, 124, 88, 'Muy Bueno', 88, 'Muy Bueno', 'root', '2018-08-16 03:35:31'),
(187, 87, 137, 124, 77, 'Bueno', 77, 'Bueno', 'root', '2018-08-16 03:35:31'),
(196, 87, 138, 118, 0, 'Sin Nota', 45, 'Reprobado', 'root', '2018-08-16 18:42:46'),
(197, 91, 138, 118, 0, 'Sin Nota', 76, 'Bueno', 'root', '2018-08-16 18:42:46'),
(200, 94, 138, 118, 0, 'Sin Nota', 66, 'Aprobado', 'root', '2018-08-16 18:42:46'),
(198, 92, 138, 118, 0, 'Sin Nota', 67, 'Aprobado', 'root', '2018-08-16 18:42:47'),
(199, 93, 138, 118, 0, 'Sin Nota', 77, 'Bueno', 'root', '2018-08-16 18:42:47'),
(201, 95, 138, 118, 0, 'Sin Nota', 66, 'Aprobado', 'root', '2018-08-16 18:42:47'),
(202, 96, 138, 118, 0, 'Sin Nota', 78, 'Bueno', 'root', '2018-08-16 18:42:47'),
(201, 95, 138, 118, 66, 'Aprobado', 66, 'Aprobado', 'root', '2018-08-16 18:44:04'),
(200, 94, 138, 118, 66, 'Aprobado', 66, 'Aprobado', 'root', '2018-08-16 18:44:04'),
(202, 96, 138, 118, 78, 'Bueno', 78, 'Bueno', 'root', '2018-08-16 18:44:04'),
(199, 93, 138, 118, 77, 'Bueno', 77, 'Bueno', 'root', '2018-08-16 19:02:43'),
(198, 92, 138, 118, 67, 'Aprobado', 67, 'Aprobado', 'root', '2018-08-16 19:02:43'),
(196, 87, 138, 118, 45, 'Reprobado', 45, 'Reprobado', 'root', '2018-08-16 19:05:00'),
(197, 91, 138, 118, 76, 'Bueno', 76, 'Bueno', 'root', '2018-08-16 19:05:00'),
(199, 93, 138, 126, 77, 'Bueno', 77, 'Bueno', 'root', '2018-08-16 19:05:42'),
(201, 95, 138, 126, 66, 'Aprobado', 66, 'Aprobado', 'root', '2018-08-16 19:05:42'),
(200, 94, 138, 126, 66, 'Aprobado', 66, 'Aprobado', 'root', '2018-08-16 19:05:42'),
(198, 92, 138, 126, 67, 'Aprobado', 67, 'Aprobado', 'root', '2018-08-16 19:05:42'),
(202, 96, 138, 126, 78, 'Bueno', 78, 'Bueno', 'root', '2018-08-16 19:05:42'),
(198, 92, 138, 118, 67, 'Aprobado', 67, 'Aprobado', 'root', '2018-08-16 19:06:16'),
(201, 95, 138, 118, 66, 'Aprobado', 66, 'Aprobado', 'root', '2018-08-16 19:06:16'),
(199, 93, 138, 118, 77, 'Bueno', 75, 'Bueno', 'root', '2018-08-16 19:06:17'),
(200, 94, 138, 118, 66, 'Aprobado', 64, 'Reprobado', 'root', '2018-08-16 19:06:17'),
(202, 96, 138, 118, 78, 'Bueno', 78, 'Bueno', 'root', '2018-08-16 19:06:17'),
(200, 94, 138, 118, 64, 'Reprobado', 65, 'Aprobado', 'root', '2018-08-16 19:06:31'),
(198, 92, 138, 118, 67, 'Aprobado', 67, 'Aprobado', 'root', '2018-08-16 19:06:32'),
(199, 93, 138, 118, 75, 'Bueno', 75, 'Bueno', 'root', '2018-08-16 19:06:32'),
(201, 95, 138, 118, 66, 'Aprobado', 66, 'Aprobado', 'root', '2018-08-16 19:06:32'),
(202, 96, 138, 118, 78, 'Bueno', 78, 'Bueno', 'root', '2018-08-16 19:06:32'),
(196, 87, 138, 126, 45, 'Reprobado', 80, 'Bueno', 'root', '2018-08-16 19:06:47'),
(197, 91, 138, 126, 76, 'Bueno', 76, 'Bueno', 'root', '2018-08-16 19:06:48'),
(198, 92, 138, 118, 65, 'Aprobado', 65, 'Aprobado', 'root', '2018-08-16 22:11:11'),
(199, 93, 138, 118, 80, 'Bueno', 80, 'Bueno', 'root', '2018-08-16 22:11:11'),
(201, 95, 138, 118, 80, 'Bueno', 68, 'Aprobado', 'root', '2018-08-16 22:11:11'),
(200, 94, 138, 118, 65, 'Aprobado', 65, 'Aprobado', 'root', '2018-08-16 22:11:11'),
(202, 96, 138, 118, 75, 'Bueno', 75, 'Bueno', 'root', '2018-08-16 22:11:11'),
(208, 94, 139, 119, 0, 'Sin Nota', 34, 'Reprobado', 'root', '2018-08-16 23:37:00'),
(209, 87, 139, 119, 0, 'Sin Nota', 65, 'Aprobado', 'root', '2018-08-16 23:37:00'),
(211, 92, 139, 119, 0, 'Sin Nota', 78, 'Bueno', 'root', '2018-08-16 23:37:01'),
(212, 95, 139, 119, 0, 'Sin Nota', 76, 'Bueno', 'root', '2018-08-16 23:37:01'),
(210, 93, 139, 119, 0, 'Sin Nota', 86, 'Muy Bueno', 'root', '2018-08-16 23:37:01'),
(213, 96, 139, 119, 0, 'Sin Nota', 66, 'Aprobado', 'root', '2018-08-16 23:37:01'),
(214, 91, 139, 119, 0, 'Sin Nota', 77, 'Bueno', 'root', '2018-08-16 23:37:01'),
(212, 95, 139, 119, 76, 'Bueno', 76, 'Bueno', 'root', '2018-08-16 23:37:41'),
(208, 94, 139, 119, 34, 'Reprobado', 34, 'Reprobado', 'root', '2018-08-16 23:37:41'),
(213, 96, 139, 119, 66, 'Aprobado', 66, 'Aprobado', 'root', '2018-08-16 23:37:42'),
(211, 92, 139, 119, 78, 'Bueno', 78, 'Bueno', 'root', '2018-08-16 23:39:18'),
(210, 93, 139, 119, 86, 'Muy Bueno', 86, 'Muy Bueno', 'root', '2018-08-16 23:39:18'),
(208, 94, 139, 127, 34, 'Reprobado', 65, 'Aprobado', 'root', '2018-08-16 23:39:39'),
(210, 93, 139, 127, 86, 'Muy Bueno', 86, 'Muy Bueno', 'root', '2018-08-16 23:39:39'),
(212, 95, 139, 127, 76, 'Bueno', 76, 'Bueno', 'root', '2018-08-16 23:39:40'),
(213, 96, 139, 127, 66, 'Aprobado', 66, 'Aprobado', 'root', '2018-08-16 23:39:40'),
(211, 92, 139, 127, 78, 'Bueno', 78, 'Bueno', 'root', '2018-08-16 23:39:40'),
(215, 91, 140, 120, 0, 'Sin Nota', 67, 'Aprobado', 'root', '2018-08-17 00:04:48'),
(216, 87, 140, 120, 0, 'Sin Nota', 66, 'Aprobado', 'root', '2018-08-17 00:04:48'),
(219, 92, 140, 120, 0, 'Sin Nota', 87, 'Muy Bueno', 'root', '2018-08-17 00:04:48'),
(217, 96, 140, 120, 0, 'Sin Nota', 65, 'Aprobado', 'root', '2018-08-17 00:04:48'),
(218, 95, 140, 120, 0, 'Sin Nota', 77, 'Bueno', 'root', '2018-08-17 00:04:48'),
(220, 93, 140, 120, 0, 'Sin Nota', 65, 'Aprobado', 'root', '2018-08-17 00:04:49'),
(221, 94, 140, 120, 0, 'Sin Nota', 45, 'Reprobado', 'root', '2018-08-17 00:04:49'),
(222, 91, 141, 121, 0, 'Sin Nota', 56, 'Reprobado', 'root', '2018-08-17 00:13:09'),
(225, 95, 141, 121, 0, 'Sin Nota', 85, 'Muy Bueno', 'root', '2018-08-17 00:13:09'),
(223, 87, 141, 121, 0, 'Sin Nota', 75, 'Bueno', 'root', '2018-08-17 00:13:09'),
(226, 92, 141, 121, 0, 'Sin Nota', 70, 'Aprobado', 'root', '2018-08-17 00:13:09'),
(224, 96, 141, 121, 0, 'Sin Nota', 77, 'Bueno', 'root', '2018-08-17 00:13:10'),
(227, 93, 141, 121, 0, 'Sin Nota', 65, 'Aprobado', 'root', '2018-08-17 00:13:10'),
(229, 96, 142, 122, 0, 'Sin Nota', 54, 'Reprobado', 'root', '2018-08-17 00:23:13'),
(228, 87, 142, 122, 0, 'Sin Nota', 54, 'Reprobado', 'root', '2018-08-17 00:23:13'),
(230, 95, 142, 122, 0, 'Sin Nota', 76, 'Bueno', 'root', '2018-08-17 00:23:13'),
(231, 92, 142, 122, 0, 'Sin Nota', 75, 'Bueno', 'root', '2018-08-17 00:23:13'),
(232, 93, 142, 122, 0, 'Sin Nota', 65, 'Aprobado', 'root', '2018-08-17 00:23:13'),
(228, 87, 142, 122, 54, 'Reprobado', 67, 'Aprobado', 'root', '2018-08-17 00:23:24'),
(229, 96, 142, 122, 54, 'Reprobado', 65, 'Aprobado', 'root', '2018-08-17 00:23:24'),
(230, 95, 142, 122, 76, 'Bueno', 76, 'Bueno', 'root', '2018-08-17 00:23:24'),
(232, 93, 142, 122, 65, 'Aprobado', 65, 'Aprobado', 'root', '2018-08-17 00:23:24'),
(231, 92, 142, 122, 75, 'Bueno', 75, 'Bueno', 'root', '2018-08-17 00:23:24'),
(233, 87, 143, 123, 0, 'Sin Nota', 67, 'Aprobado', 'root', '2018-08-17 00:28:59'),
(235, 93, 143, 123, 0, 'Sin Nota', 70, 'Aprobado', 'root', '2018-08-17 00:28:59'),
(234, 92, 143, 123, 0, 'Sin Nota', 56, 'Reprobado', 'root', '2018-08-17 00:28:59'),
(236, 95, 143, 123, 0, 'Sin Nota', 80, 'Bueno', 'root', '2018-08-17 00:29:00'),
(233, 87, 143, 123, 67, 'Aprobado', 0, 'Reprobado', 'root', '2018-08-17 07:58:22'),
(235, 93, 143, 123, 70, 'Aprobado', 0, 'Reprobado', 'root', '2018-08-17 07:58:22'),
(236, 95, 143, 123, 80, 'Bueno', 0, 'Reprobado', 'root', '2018-08-17 07:58:22'),
(234, 92, 143, 123, 56, 'Reprobado', 0, 'Reprobado', 'root', '2018-08-17 07:58:23'),
(238, 102, 165, 149, 0, 'Sin Nota', 45, 'Reprobado', 'root', '2018-08-17 09:36:19'),
(233, 87, 143, 123, 0, 'Reprobado', 56, 'Reprobado', 'root', '2018-08-17 09:38:24'),
(234, 92, 143, 123, 0, 'Reprobado', 67, 'Aprobado', 'root', '2018-08-17 09:38:25'),
(235, 93, 143, 123, 0, 'Reprobado', 77, 'Bueno', 'root', '2018-08-17 09:38:25'),
(236, 95, 143, 123, 0, 'Reprobado', 66, 'Aprobado', 'root', '2018-08-17 09:38:25'),
(238, 102, 165, 149, 45, 'Reprobado', 78, 'Bueno', 'root', '2018-08-23 18:21:17'),
(238, 102, 165, 149, 78, 'Bueno', 66, 'Aprobado', 'root', '2018-08-27 19:13:54'),
(240, 104, 158, 142, 0, 'Sin Nota', 67, 'Aprobado', 'root', '2018-08-30 23:47:58'),
(241, 98, 158, 142, 0, 'Sin Nota', 75, 'Bueno', 'root', '2018-08-30 23:47:58'),
(243, 100, 158, 142, 0, 'Sin Nota', 75, 'Bueno', 'root', '2018-08-30 23:47:58'),
(244, 101, 158, 142, 0, 'Sin Nota', 65, 'Aprobado', 'root', '2018-08-30 23:47:59'),
(242, 99, 158, 142, 0, 'Sin Nota', 80, 'Bueno', 'root', '2018-08-30 23:47:59'),
(245, 98, 159, 143, 0, 'Sin Nota', 70, 'Aprobado', 'root', '2018-08-30 23:50:29'),
(248, 101, 159, 143, 0, 'Sin Nota', 80, 'Bueno', 'root', '2018-08-30 23:50:29'),
(246, 99, 159, 143, 0, 'Sin Nota', 65, 'Aprobado', 'root', '2018-08-30 23:50:29'),
(249, 104, 159, 143, 0, 'Sin Nota', 90, 'Muy Bueno', 'root', '2018-08-30 23:50:30'),
(247, 100, 159, 143, 0, 'Sin Nota', 65, 'Aprobado', 'root', '2018-08-30 23:50:30'),
(250, 98, 160, 144, 0, 'Sin Nota', 60, 'Reprobado', 'root', '2018-08-30 23:52:39'),
(252, 100, 160, 144, 0, 'Sin Nota', 95, 'Excelente', 'root', '2018-08-30 23:52:39'),
(251, 99, 160, 144, 0, 'Sin Nota', 70, 'Aprobado', 'root', '2018-08-30 23:52:40'),
(253, 101, 160, 144, 0, 'Sin Nota', 85, 'Muy Bueno', 'root', '2018-08-30 23:52:40'),
(254, 104, 160, 144, 0, 'Sin Nota', 69, 'Aprobado', 'root', '2018-08-30 23:52:40'),
(255, 99, 161, 145, 0, 'Sin Nota', 67, 'Aprobado', 'root', '2018-08-30 23:56:24'),
(256, 100, 161, 145, 0, 'Sin Nota', 85, 'Muy Bueno', 'root', '2018-08-30 23:56:24'),
(257, 101, 161, 145, 0, 'Sin Nota', 85, 'Muy Bueno', 'root', '2018-08-30 23:56:24'),
(258, 104, 161, 145, 0, 'Sin Nota', 90, 'Muy Bueno', 'root', '2018-08-30 23:56:24'),
(260, 100, 162, 146, 0, 'Sin Nota', 75, 'Bueno', 'root', '2018-08-30 23:57:53'),
(259, 99, 162, 146, 0, 'Sin Nota', 65, 'Aprobado', 'root', '2018-08-30 23:57:54'),
(262, 104, 162, 146, 0, 'Sin Nota', 75, 'Bueno', 'root', '2018-08-30 23:57:54'),
(261, 101, 162, 146, 0, 'Sin Nota', 75, 'Bueno', 'root', '2018-08-30 23:57:54'),
(263, 99, 163, 147, 0, 'Sin Nota', 79, 'Bueno', 'root', '2018-08-31 00:00:49'),
(265, 101, 163, 147, 0, 'Sin Nota', 85, 'Muy Bueno', 'root', '2018-08-31 00:00:49'),
(266, 104, 163, 147, 0, 'Sin Nota', 80, 'Bueno', 'root', '2018-08-31 00:00:49'),
(264, 100, 163, 147, 0, 'Sin Nota', 80, 'Bueno', 'root', '2018-08-31 00:00:49'),
(267, 99, 164, 148, 0, 'Sin Nota', 65, 'Aprobado', 'root', '2018-08-31 00:15:15'),
(268, 100, 164, 148, 0, 'Sin Nota', 70, 'Aprobado', 'root', '2018-08-31 00:15:15'),
(270, 104, 164, 148, 0, 'Sin Nota', 70, 'Aprobado', 'root', '2018-08-31 00:15:15'),
(271, 105, 164, 148, 0, 'Sin Nota', 80, 'Bueno', 'root', '2018-08-31 00:15:15'),
(269, 101, 164, 148, 0, 'Sin Nota', 75, 'Bueno', 'root', '2018-08-31 00:15:15'),
(238, 102, 165, 149, 66, 'Aprobado', 66, 'Aprobado', 'root', '2018-08-31 09:38:32'),
(273, 107, 165, 149, 0, 'Sin Nota', 90, 'Muy Bueno', 'root', '2018-08-31 09:38:33'),
(272, 106, 165, 149, 0, 'Sin Nota', 75, 'Bueno', 'root', '2018-08-31 09:38:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bit_inscripcion_actualizacion`
--

CREATE TABLE `bit_inscripcion_actualizacion` (
  `idBit_inscripcion` int(11) NOT NULL,
  `ci_bit` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `ant_numI` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `ant_sexo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `ant_pais` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `ant_departamento` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `ant_fechanac` date NOT NULL,
  `ant_estadocivil` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `ant_direccion` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `ant_telefono` int(11) NOT NULL,
  `ant_email` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `nuev_numI` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `nuev_sexo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nuev_pais` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `nuev_departamento` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `nuev_fechanac` date NOT NULL,
  `nuev_estadocivil` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `nuev_direccion` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `nuev_telefono` int(11) NOT NULL,
  `nuev_email` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_modI` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `bit_inscripcion_actualizacion`
--

INSERT INTO `bit_inscripcion_actualizacion` (`idBit_inscripcion`, `ci_bit`, `ant_numI`, `ant_sexo`, `ant_pais`, `ant_departamento`, `ant_fechanac`, `ant_estadocivil`, `ant_direccion`, `ant_telefono`, `ant_email`, `nuev_numI`, `nuev_sexo`, `nuev_pais`, `nuev_departamento`, `nuev_fechanac`, `nuev_estadocivil`, `nuev_direccion`, `nuev_telefono`, `nuev_email`, `usuario`, `fecha_modI`) VALUES
(65, '4334324', 'I-104', 'Masculino', 'Bolivia', 'Sucre', '2017-07-03', 'Comprometido', '', 0, '', 'I-104', 'Masculino', 'Bolivia', 'La Paz', '2017-07-03', 'Casado', 'Regimiento Carabineros', 5475421, 'hi@hotmail.com', 'root', '2018-08-01 13:05:25'),
(70, '7878587 Pt', 'I-106', 'Femenino', 'Bolivia', 'Oruro', '1994-06-15', 'Comprometido', 'Paravicini #212', 646, 'hilda@gmail.com', 'I-106', 'Femenino', 'Bolivia', 'Oruro', '1994-06-15', 'Soltero', 'Paravicini #212', 64621, 'hilda@gmail.com', 'root', '2018-08-10 00:30:06'),
(70, '7878587 Pt', 'I-106', 'Femenino', 'Bolivia', 'Oruro', '1994-06-15', 'Soltero', 'Paravicini #212', 64621, 'hilda@gmail.com', 'I-106', 'Masculino', 'Bolivia', 'Oruro', '1994-06-15', 'Casado', 'Paravicini #212', 64621, 'hilda@gmail.com', 'root', '2018-08-10 00:56:23'),
(70, '7878587 Pt', 'I-106', 'Masculino', 'Bolivia', 'Oruro', '1994-06-15', 'Casado', 'Paravicini #212', 64621, 'hilda@gmail.com', 'I-106', 'Femenino', 'Bolivia', 'Oruro', '1994-06-15', 'Soltero', 'Paravicini #212', 64621, 'hilda@gmail.com', 'root', '2018-08-10 03:28:36'),
(70, '7878587 Pt', 'I-106', 'Femenino', 'Bolivia', 'Oruro', '1994-06-15', 'Soltero', 'Paravicini #212', 64621, 'hilda@gmail.com', 'I-106', 'Masculino', 'Bolivia', 'Oruro', '1994-06-16', 'Soltero', 'Paravicini #212', 64621, 'hilda@gmail.com', 'root', '2018-08-10 03:30:49'),
(70, '7878587 Pt', 'I-106', 'Masculino', 'Bolivia', 'Oruro', '1994-06-16', 'Soltero', 'Paravicini #212', 64621, 'hilda@gmail.com', 'I-106', 'Femenino', 'Bolivia', 'Oruro', '1994-06-16', 'Soltero', 'Paravicini #212', 64621, 'hilda@gmail.com', 'root', '2018-08-10 03:31:02'),
(70, '7878587 Pt', 'I-106', 'Femenino', 'Bolivia', 'Oruro', '1994-06-16', 'Soltero', 'Paravicini #212', 64621, 'hilda@gmail.com', 'I-106', 'Femenino', 'Bolivia', 'Oruro', '1994-06-16', 'Soltero', 'Paravicini #212', 64621, 'hilda@gmail.com', 'root', '2018-08-10 13:20:33'),
(70, '7878587Pt', 'I-106', 'Femenino', 'Bolivia', 'Oruro', '1994-06-16', 'Soltero', 'Paravicini #212', 64621, 'hilda@gmail.com', 'I-106', 'Femenino', 'Bolivia', 'Oruro', '1994-06-16', 'Soltero', 'Paravicini #212', 64621, 'hilda@gmail.com', 'root', '2018-08-10 13:20:45'),
(70, '7878587 Pt', 'I-106', 'Femenino', 'Bolivia', 'Oruro', '1994-06-16', 'Soltero', 'Paravicini #212', 64621, 'hilda@gmail.com', 'I-106', 'Femenino', 'Bolivia', 'Oruro', '1994-06-16', 'Soltero', 'Paravicini #212', 64621, 'hilda@gmail.com', 'root', '2018-08-10 13:21:54'),
(70, '7878587Pt', 'I-106', 'Femenino', 'Bolivia', 'Oruro', '1994-06-16', 'Soltero', 'Paravicini #212', 64621, 'hilda@gmail.com', 'I-106', 'Femenino', 'Bolivia', 'Oruro', '1994-06-16', 'Soltero', 'Paravicini #212', 64621, 'hilda@gmail.com', 'root', '2018-08-10 13:40:29'),
(78, '7689878 Ch.', 'I-107', 'Femenino', 'Bolivia', 'Potosi', '1997-01-27', 'Comprometido', 'Suipacha', 645433, '', 'I-107', 'Femenino', 'Bolivia', 'Potosi', '1997-01-27', 'Comprometido', 'Suipacha', 645433, '', 'root', '2018-08-12 23:30:55');

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
(3, 17, '1', 66, '2018-06-19 11:11:00', '1', 'fsdss'),
(4, 15, '1', 88, '2018-06-05 14:31:00', '1', ''),
(5, 17, '2', 0, '2018-08-06 14:22:00', '', ''),
(6, 19, '1', 67, '2018-07-31 12:11:00', '1', 'O1. deta;llar'),
(8, 18, '1', 90, '2018-08-14 11:11:00', '1', ''),
(10, 20, '1', 24, '2018-08-16 12:11:00', '2', '1\n2'),
(11, 21, '1', 53, '2018-08-17 11:11:00', '2', ''),
(12, 20, '2', 65, '2018-08-01 11:11:00', '1', ''),
(13, 21, '2', 0, '2018-08-16 11:11:00', '', ''),
(29, 25, '1', 0, '2111-11-12 00:12:00', '', ''),
(30, 26, '1', 0, '2018-08-24 12:11:00', '', ''),
(31, 27, '1', 75, '2018-08-09 12:12:00', '1', ''),
(32, 28, '1', 56, '2018-08-14 00:12:00', '2', ''),
(33, 29, '1', 0, '2018-08-15 12:11:00', '', '');

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
(8, 4, 47, 'Secretario', ''),
(9, 5, 36, 'Presidente', ''),
(10, 5, 47, 'Secretario', ''),
(11, 6, 69, 'Presidente', '0'),
(12, 6, 61, 'Secretario', '0'),
(15, 8, 61, 'Presidente', ''),
(16, 8, 69, 'Secretario', ''),
(19, 10, 42, 'Presidente', '1'),
(20, 10, 63, 'Secretario', '1'),
(21, 11, 63, 'Presidente', ''),
(22, 11, 64, 'Secretario', ''),
(23, 12, 63, 'Presidente', ''),
(24, 12, 72, 'Secretario', '1'),
(25, 13, 69, 'Presidente', '0'),
(26, 13, 67, 'Secretario', ''),
(57, 29, 85, 'Presidente', ''),
(58, 29, 71, 'Secretario', ''),
(59, 30, 76, 'Presidente', ''),
(60, 30, 79, 'Secretario', ''),
(61, 31, 89, 'Presidente', ''),
(62, 31, 94, 'Secretario', ''),
(63, 32, 91, 'Presidente', ''),
(64, 32, 94, 'Secretario', ''),
(65, 33, 94, 'Presidente', ''),
(66, 33, 97, 'Secretario', '');

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
(97, '4334324', 'Ramiro', 'Bustillos', '', 'Sucre', 110),
(98, '7878587', 'Hilda', 'Carrasco', 'Mamanie', 'Potosi', 85),
(99, '6723212', 'Mirian ', 'Rodrigues', '', 'Sucre', 35),
(100, '5623222 Pt', 'Raul', 'Perez', '', 'Potosi', 110),
(101, '7689878 Ch', 'Ana', 'Rojas', 'Quispe', 'Sucre', 7),
(102, '7277728 Pt', 'Maritza ', 'Rodriguez', '', 'Potosi', 105),
(103, '7839202 O', 'Marco Saul', 'Pardo', '', 'Sucre', 111),
(104, '3828922 LP', 'Jose Daniel', 'Ortuvez', 'Alejo', 'La Paz', 52),
(105, '6543465 Pt', 'Ricardo Eduardo', 'Farfan', 'Tito', 'Sucre', 109),
(106, '9829899 Ch', 'Roger', 'Apaza', 'Laura', 'Sucre', 14),
(107, '7632839 SC', 'Lupe', 'Arraya', 'Zarate', 'Santa Cruz', 86),
(108, '8229222 SC', 'Lourdes', 'Bejarano', '', 'Santa Cruz', 90),
(109, '54333342 Ch', 'Saul', 'Mendoza', 'Maldonado', 'Sucre', 107),
(110, '4545554Pt', 'Nanci', 'Rodas', 'Mancilla', 'Sucre', 31),
(111, '4553498 Ch', 'Maria', 'Mamani', 'Campos', 'Sucre', 15),
(112, '5565443 Pt', 'Marcelino', 'Quispe', '', 'La Paz', 43),
(113, '6843983 O', 'Fabian', 'Mollinedo', '', 'Sucre', 19),
(114, '4334224 Ch', 'Lucio', 'Paniagua', '', 'Oruro', 31),
(115, '3225333 S', 'Gonzalo', 'Huallas', 'Condori', 'Sucre', 111),
(116, '9898094 Pt', 'Marcos', 'Mamani', 'Perez', 'Potosi', 19),
(117, '3289933 Ch', 'Pedro', 'Gaspar', 'Torrez', 'Sucre', 21),
(118, '3227766 LP', 'Laura', 'Calderon', 'Jimenez', 'La Paz', 95),
(119, '5664456 Pt', 'Julio', 'Porcel', 'Camacho', 'Potosi', 35),
(120, '9889877 LP', 'Laura', 'Doria', 'Sanches', 'Bolivia', 37),
(121, '5656778 Ch', 'Hilda', 'Rojas', '', 'Sucre', 14),
(122, '4322342 Ch', 'Marlene', 'Campos', 'Zeballos', 'Sucre', 44),
(123, '7899728 Pt', 'Justino', 'Amurrio', '', 'Potosi', 109),
(124, '5545445 CH', 'Martina', 'Caseres', 'Higueras', 'Chuquisaca', 37),
(125, '7878878', 'Roberto', 'Condori', '', 'La Paz', 109);

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
(99, 39, 117, 'Activo', '', '0000-00-00 00:00:00', '2018-05-14', '2018-05-24', ''),
(101, 60, 123, 'Activo', '', '0000-00-00 00:00:00', '2018-08-07', '2018-08-14', 'dsssad'),
(102, 62, 123, '', '21', '0000-00-00 00:00:00', '2018-08-09', '2018-08-16', ''),
(103, 62, 123, '', '', '0000-00-00 00:00:00', '2018-08-13', '2018-08-17', ''),
(104, 61, 125, '', '', '0000-00-00 00:00:00', '2018-08-13', '2018-08-13', ''),
(105, 63, 126, '', '', '0000-00-00 00:00:00', '2018-08-20', '2018-08-25', ''),
(106, 41, 127, '', '', '0000-00-00 00:00:00', '2018-08-27', '2018-08-01', ''),
(107, 41, 128, '', '', '0000-00-00 00:00:00', '2018-09-07', '2018-09-19', 'ultimo modulo'),
(108, 63, 129, '', '', '0000-00-00 00:00:00', '2018-08-14', '2018-08-17', ''),
(109, 74, 137, '', '21', '0000-00-00 00:00:00', '2018-08-09', '2018-08-16', ''),
(110, 75, 137, '', '', '0000-00-00 00:00:00', '2018-08-09', '2018-08-16', ''),
(111, 76, 138, '', '', '0000-00-00 00:00:00', '2018-08-17', '2018-08-23', ''),
(112, 76, 139, '', '', '0000-00-00 00:00:00', '2018-08-23', '2018-08-30', ''),
(113, 71, 138, '', '', '0000-00-00 00:00:00', '2018-08-16', '2018-08-23', ''),
(114, 74, 139, '', '', '0000-00-00 00:00:00', '2018-08-16', '2018-08-23', ''),
(115, 77, 140, '', '', '0000-00-00 00:00:00', '2018-08-16', '2018-08-23', ''),
(116, 71, 142, '', '', '0000-00-00 00:00:00', '2018-08-16', '2018-08-22', ''),
(117, 76, 141, '', '', '0000-00-00 00:00:00', '2018-08-14', '2018-08-21', ''),
(118, 75, 143, '', '', '0000-00-00 00:00:00', '2018-08-21', '2018-08-27', ''),
(119, 83, 165, '', '', '0000-00-00 00:00:00', '2018-08-16', '2018-08-23', ''),
(120, 89, 158, '', '433', '2018-08-08 00:00:00', '2018-08-02', '2018-08-09', ''),
(121, 90, 159, '', '656', '2018-08-09 00:00:00', '2018-08-10', '2018-08-16', ''),
(122, 91, 160, '', '4533', '2018-08-15 00:00:00', '2018-08-16', '2018-08-23', ''),
(123, 89, 161, '', '', '0000-00-00 00:00:00', '2018-08-23', '2018-08-30', ''),
(124, 92, 162, '', '665', '2018-08-09 00:00:00', '2018-08-22', '2018-08-29', ''),
(125, 92, 163, '', '665', '2018-08-09 00:00:00', '2018-08-22', '2018-08-29', ''),
(126, 92, 164, '', '665', '2018-08-09 00:00:00', '2018-08-22', '2018-08-29', ''),
(127, 96, 166, '', '', '0000-00-00 00:00:00', '2018-08-15', '2018-08-23', '');

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
  `titulo` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ruta` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
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
(66, 45, 74, 'I-100', '57689', 'Femenino', 'Sucre', 'Potosi', '2018-05-18', 'Divorciado', '', 0, 3243242, '', '0000-00-00 00:00:00'),
(67, 45, 97, 'I-101', '4334324', 'Masculino', 'Sucre', 'Potosi', '2018-05-13', 'Casado', '', 0, 0, '', '2018-05-16 16:41:00'),
(68, 45, 95, 'I-102', '32423', 'Femenino', 'Sucre', 'Cochabamba', '2018-05-12', 'Casado', '', 0, 0, '', '2018-05-16 15:44:00'),
(69, 44, 1, 'I-105', '6712854', 'Femenino', 'Bolivia', 'Santa Cruz', '2018-07-04', 'Comprometido', '', 0, 0, '', '2018-07-16 14:11:00'),
(70, 44, 98, 'I-106', '7878587', 'Femenino', 'Bolivia', 'Oruro', '1994-06-16', 'Soltero', 'Paravicini #212', 64621, 67891781, 'hilda@gmail.com', '2018-11-30 12:00:00'),
(75, 45, 100, 'I-104', '5623222 Pt', 'Masculino', 'Bolivia', 'Potosi', '2018-08-14', 'Soltero', '', 0, 0, '', '2018-07-31 11:11:00'),
(76, 45, 98, 'I-105', '7878587', 'Femenino', 'Bolivia', 'Potosi', '2018-07-30', 'Soltero', '', 0, 0, '', '2018-07-31 11:11:00'),
(77, 45, 1, 'I-106', '6712854', 'Femenino', 'Bolivia', 'Sucre', '2018-08-06', 'Soltero', '', 0, 0, '', '2018-08-02 11:11:00'),
(78, 45, 101, 'I-107', '7689878 Ch', 'Femenino', 'Bolivia', 'Potosi', '1997-01-27', 'Comprometido', 'Suipacha', 645433, 75453433, '', '2018-08-12 00:22:00'),
(79, 45, 102, 'I-108', '7277728 Pt', 'Femenino', 'Bolivia', 'Potosi', '1995-01-09', 'Soltero', '', 0, 0, '', '2018-08-07 11:11:00'),
(80, 45, 103, 'I-109', '7839202 O', 'Masculino', 'Bolivia', 'Sucre', '1991-02-18', 'Soltero', '', 0, 0, '', '2018-08-13 02:11:00'),
(81, 45, 104, 'I-110', '3828922 LP', 'Masculino', 'Bolivia', 'La Paz', '2003-07-17', 'Casado', '', 0, 0, '', '2018-08-13 00:12:00'),
(82, 45, 105, 'I-111', '6543465 Pt', 'Masculino', 'Bolivia', 'Potosi', '1993-12-24', 'Soltero', '', 0, 0, '', '2018-08-09 15:23:00'),
(83, 45, 106, 'I-112', '9829899 Ch', 'Masculino', 'Bolivia', 'Sucre', '1996-07-17', 'Casado', '', 0, 0, '', '2018-08-09 11:11:00'),
(84, 45, 107, 'I-113', '7632839 SC', 'Femenino', 'Bolivia', 'Santa Cruz', '1992-06-16', 'Casado', '', 0, 0, '', '2018-08-06 00:21:00'),
(85, 45, 108, 'I-114', '8229222 SC', 'Femenino', 'Bolivia', 'Santa Cruz', '1993-03-11', 'Soltero', '', 0, 0, '', '2018-08-06 15:22:00'),
(86, 45, 109, 'I-115', '54333342 Ch', 'Masculino', 'Bolivia', 'Sucre', '1993-06-15', 'Soltero', '', 0, 0, '', '2018-08-02 12:12:00'),
(87, 47, 110, 'I-100', '4545554Pt', 'Femenino', 'Bolivia', 'Potosi', '1995-08-14', 'Soltero', 'Reg. campos 23', 646567, 7676727, 'nancy@gmail.com', '2018-08-16 07:07:00'),
(88, 47, 111, 'I-101', '4553498 Ch', 'Femenino', 'Bolivia', 'Sucre', '1989-04-12', 'Comprometido', '', 0, 0, '', '2018-08-16 07:09:00'),
(89, 47, 109, 'I-102', '54333342 Ch', 'Masculino', 'Bolivia', 'Cochabamba', '2018-08-16', 'Comprometido', '', 0, 0, '', '2018-08-16 07:17:00'),
(90, 47, 112, 'I-103', '5565443 Pt', 'Masculino', 'Bolivia', 'La Paz', '1999-08-16', 'Casado', '', 0, 0, '', '2018-08-16 08:20:00'),
(91, 47, 113, 'I-104', '6843983 O', 'Femenino', 'Bolivia', 'Sucre', '1997-08-08', 'Comprometido', '', 0, 0, '', '2018-08-16 09:22:00'),
(92, 47, 114, 'I-105', '4334224 Ch', 'Masculino', 'Bolivia', 'Oruro', '2003-08-16', 'Comprometido', '', 0, 0, '', '2018-08-16 07:23:00'),
(93, 47, 115, 'I-106', '3225333 S', 'Masculino', 'Bolivia', 'Chuquisaca', '1993-08-16', 'Soltero', '', 0, 0, '', '2018-08-16 07:25:00'),
(94, 47, 116, 'I-107', '9898094 Pt', 'Masculino', 'Bolivia', 'Potosi', '1999-08-16', 'Soltero', '', 0, 0, '', '2018-08-16 07:26:00'),
(95, 47, 117, 'I-108', '3289933 Ch', 'Masculino', 'Bolivia', 'Chuquisaca', '1992-08-16', 'Soltero', '', 0, 0, '', '2018-08-16 07:27:00'),
(96, 47, 118, 'I-109', '3227766 LP', 'Femenino', 'Bolivia', 'La Paz', '2000-08-16', 'Soltero', '', 0, 0, '', '2018-08-16 07:29:00'),
(98, 50, 119, 'I-100', '5664456 Pt', 'Masculino', 'Bolivia', 'Potosi', '1992-08-17', 'Soltero', 'Loa 34', 43322, 755433, '', '2018-08-17 05:24:00'),
(99, 50, 120, 'I-101', '9889877 LP', 'Masculino', 'Bolivia', 'La Paz', '1996-08-17', 'Comprometido', '', 0, 0, '', '2018-08-17 05:26:00'),
(100, 50, 121, 'I-102', '5656778 Ch', 'Femenino', 'Bolivia', 'Sucre', '2018-08-07', 'Comprometido', '', 0, 0, '', '2018-08-17 11:11:00'),
(101, 50, 122, 'I-103', '4322342 Ch', 'Femenino', 'Bolivia', 'Potosi', '2018-08-13', 'Comprometido', '', 0, 0, '', '2018-08-15 00:11:00'),
(102, 51, 112, 'I-100', '5565443 Pt', 'Masculino', 'Bolivia', 'Chuquisaca', '2018-08-17', 'Comprometido', '', 0, 0, '', '2018-08-17 13:33:00'),
(103, 51, 1, 'I-101', '6712854', 'Femenino', 'Bolivia', 'Potosi', '2018-08-27', 'Soltero', '', 0, 0, '', '2018-08-27 23:09:00'),
(104, 50, 123, 'I-104', '7899728 Pt', 'Masculino', 'Bolivia', 'Chuquisaca', '2018-08-31', 'Soltero', 'Marcelo Quiroga', 6456563, 7877878, 'justino@hotmail.com', '2018-08-31 03:39:00'),
(105, 50, 118, 'I-105', '3227766 LP', 'Femenino', 'Bolivia', 'Chuquisaca', '2018-08-31', 'Casado', '', 0, 0, '', '2018-08-31 04:03:00'),
(106, 51, 124, 'I-102', '5545445 CH', 'Femenino', 'Bolivia', 'Chuquisaca', '2002-08-31', 'Comprometido', '', 0, 0, '', '2018-08-31 04:41:00'),
(107, 51, 125, 'I-103', '7878878', 'Masculino', 'Bolivia', 'La Paz', '1992-04-27', 'Soltero', '', 0, 0, '', '2018-08-31 04:44:00'),
(108, 51, 119, 'I-104', '5664456 Pt', 'Masculino', 'Bolivia', 'Chuquisaca', '2018-08-31', 'Soltero', '', 0, 0, '', '2018-08-31 13:36:00');

--
-- Disparadores `inscripcion`
--
DELIMITER $$
CREATE TRIGGER `bit_inscripcion_actualizar_bu` BEFORE UPDATE ON `inscripcion` FOR EACH ROW INSERT INTO bit_inscripcion_actualizacion(
    idBit_inscripcion,
    ci_bit,
    ant_numI,
    ant_sexo,
    ant_pais,
    ant_departamento,
    ant_fechanac,
    ant_estadocivil,
    ant_direccion,
    ant_telefono,
    ant_email,
    nuev_numI,
    nuev_sexo,
    nuev_pais,
    nuev_departamento,
    nuev_fechanac,
    nuev_estadocivil,
    nuev_direccion,
    nuev_telefono,
    nuev_email,
    usuario,
    fecha_modI
)
VALUES(
    OLD.idInscripcion,
    OLD.ciI,
    OLD.numeroI,
    OLD.sexoI,
    OLD.paisnacI,
    OLD.departamentonacI,
    OLD.fechanacI,
    OLD.estadoCivilI,
    OLD.direccionI,
    OLD.telefonoI,
    OLD.emailI,
    NEW.numeroI,
    NEW.sexoI,
    NEW.paisnacI,
    NEW.departamentonacI,
    NEW.fechanacI,
    NEW.estadoCivilI,
    NEW.direccionI,
    NEW.telefonoI,
    NEW.emailI,
    SUBSTRING(
        USER(), 1,(INSTR(USER(), '@') -1)), NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `bit_inscripcion_eliminar` AFTER DELETE ON `inscripcion` FOR EACH ROW INSERT INTO bitacora(
    ip,
    usuario,
    nombreTabla,
    operacion,
    fecha
)
VALUES(
    SUBSTRING(USER(),(INSTR(USER(), '@') +1)), SUBSTRING(
        USER(), 1,(INSTR(USER(), '@') -1)), "inscripcion", "Eliminó_Inscripción", NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `bitacora_inscripcion_insertar` AFTER INSERT ON `inscripcion` FOR EACH ROW INSERT INTO bitacora(
    ip,
    usuario,
    nombreTabla,
    operacion,
    fecha
)
VALUES(
    SUBSTRING(USER(),(INSTR(USER(), '@') +1)), SUBSTRING(
        USER(), 1,(INSTR(USER(), '@') -1)), "inscripcion", "Insertó_Diplomante", NOW())
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
(116, 1, 'MODULO I', 'Introducción al Uso de la Plataforma Virtual Moodle.', '2018-08-03', '2018-08-11', 1, 44),
(117, 2, 'MODULO II', 'Metodología de la Investigación.', '2018-07-17', '2018-08-01', 0, 44),
(118, 3, 'MODULO III', 'El proceso de Enseñanza y de Aprendizaje en el nivel de Educación Superior.', '0000-00-00', '0000-00-00', 0, 44),
(119, 4, 'MODULO IV', 'Estrategias Metodológicas y Evaluación del Aprendizaje.', '0000-00-00', '0000-00-00', 0, 44),
(120, 5, 'MODULO V', 'Tecnologías de la Información y Comunicación en Educación.', '0000-00-00', '0000-00-00', 0, 44),
(121, 6, 'MODULO VI', 'Planificación Curricular.', '0000-00-00', '0000-00-00', 0, 44),
(122, 7, 'MODULO VII', 'Taller de Monografía.', '0000-00-00', '0000-00-00', 0, 44),
(123, 1, 'MODULO I', 'Introducción al Uso de la Plataforma Virtual Moodle.', '2018-06-28', '2018-08-13', 0, 45),
(124, 2, 'MODULO II', 'Metodología de la Investigación...', '2018-07-23', '2018-08-15', 0, 45),
(125, 3, 'MODULO III', 'El proceso de Enseñanza y de Aprendizaje en el nivel de Educación Superior.', '2018-07-21', '2018-08-14', 0, 45),
(126, 4, 'MODULO IV', 'Estrategias Metodológicas y Evaluación del Aprendizaje.', '2018-08-13', '2018-08-16', 0, 45),
(127, 5, 'MODULO V', 'Tecnologías de la Información y Comunicación en Educación.', '2018-08-14', '2018-08-15', 0, 45),
(128, 6, 'MODULO VI', 'Planificación Curricular.', '2018-08-11', '2018-08-15', 0, 45),
(129, 7, 'MODULO VII', 'Taller de Monografía.', '2018-08-13', '2018-08-16', 0, 45),
(137, 1, 'MODULO I', 'Introducción al Uso de la Plataforma Virtual Moodle.', '2018-08-07', '2018-08-15', 0, 47),
(138, 2, 'MODULO II', 'Metodología de la Investigación.', '2018-08-09', '2018-08-17', 0, 47),
(139, 3, 'MODULO III', 'El proceso de Enseñanza y de Aprendizaje en el nivel de Educación Superior.', '2018-08-13', '2018-08-18', 0, 47),
(140, 4, 'MODULO IV', 'Estrategias Metodológicas y Evaluación del Aprendizaje.', '2018-08-17', '2018-08-23', 0, 47),
(141, 5, 'MODULO V', 'Tecnologías de la Información y Comunicación en Educación.', '2018-08-16', '2018-08-22', 0, 47),
(142, 6, 'MODULO VI', 'Planificación Curricular.', '2018-08-16', '2018-08-17', 0, 47),
(143, 7, 'MODULO VII', 'Taller de Monografía.', '2018-08-16', '2018-08-18', 1, 47),
(158, 1, 'MODULO I', 'Introducción al Uso de la Plataforma Virtual Moodle.', '2018-08-01', '2018-08-31', 0, 50),
(159, 2, 'MODULO II', 'Metodología de la Investigación.', '2018-08-16', '2018-09-01', 0, 50),
(160, 3, 'MODULO III', 'El proceso de Enseñanza y de Aprendizaje en el nivel de Educación Superior.', '2018-08-23', '2018-08-31', 0, 50),
(161, 4, 'MODULO IV', 'Estrategias Metodológicas y Evaluación del Aprendizaje.', '2018-08-23', '2018-08-31', 0, 50),
(162, 5, 'MODULO V', 'Tecnologías de la Información y Comunicación en Educación.', '2018-08-23', '2018-09-01', 0, 50),
(163, 6, 'MODULO VI', 'Planificación Curricular.', '2018-08-24', '2018-08-31', 0, 50),
(164, 7, 'MODULO VII', 'Taller de Monografía.', '2018-08-24', '2018-09-01', 1, 50),
(165, 1, 'MODULO I', 'Introducción al Uso de la Plataforma Virtual Moodle.', '2018-08-17', '2018-08-29', 0, 51),
(166, 2, 'MODULO II', 'Metodología de la Investigación.', '2018-08-08', '2018-09-01', 1, 51),
(167, 3, 'MODULO III', 'El proceso de Enseñanza y de Aprendizaje en el nivel de Educación Superior.', '0000-00-00', '0000-00-00', 0, 51),
(168, 4, 'MODULO IV', 'Estrategias Metodológicas y Evaluación del Aprendizaje.', '0000-00-00', '0000-00-00', 0, 51),
(169, 5, 'MODULO V', 'Tecnologías de la Información y Comunicación en Educación.', '0000-00-00', '0000-00-00', 0, 51),
(170, 6, 'MODULO VI', 'Planificación Curricular.', '0000-00-00', '0000-00-00', 0, 51),
(171, 7, 'MODULO VII', 'Taller de Monografía.', '0000-00-00', '0000-00-00', 0, 51);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monografia`
--

CREATE TABLE `monografia` (
  `idMonografia` int(11) NOT NULL,
  `tituloMonografia` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_inicioMo` date NOT NULL,
  `fecha_finalMo` date NOT NULL,
  `descripcionMo` text COLLATE utf8_spanish_ci NOT NULL,
  `rutaMonografia` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `monografia`
--

INSERT INTO `monografia` (`idMonografia`, `tituloMonografia`, `fecha_inicioMo`, `fecha_finalMo`, `descripcionMo`, `rutaMonografia`) VALUES
(5, 'para la gober', '0000-00-00', '0000-00-00', 'dfas', NULL),
(6, 'qqqqqqqqqqqq', '0000-00-00', '0000-00-00', 'we', NULL),
(11, 'CAMBIO CLIMATICO', '2017-11-01', '2017-12-02', '', NULL),
(12, 'DINAMICA', '2017-11-03', '2017-11-29', '', NULL),
(13, 'Intrumento de Elaboracion para Ing. de sistemas', '2017-11-01', '2017-11-25', 'la vida es bella', NULL),
(19, 'Implementan de Metodología Scrum en alumnos de Economía', '2017-09-06', '2017-11-01', 'dfgdfdsf', NULL),
(21, 'IMPLEMENTACION DE SISTEMA WEB', '2017-11-21', '2017-11-28', 'SADASS parece bien', NULL),
(22, 'SEGUIMIENTO ACADEMICO DE ECR', '2017-12-06', '2018-01-31', '', NULL),
(23, 'IMPLEMENTACIÓN DE NUEVOS MECANISMOS PEDAGÓGICOS PARA OPIMIZAR EL NIVEL DE MANEJO DE LAS REGLAS DE EXPRESIÓN ORAL Y ESCRITA EN LOS ESTUDIANTES DE 3er Y 4to SEMESTRE DE LA CARRERA DE PEDAGOGÍA', '2017-01-01', '2017-03-09', '', NULL),
(24, 'PROPUESTA METODOLOGICA PARA LA INTEGRACION DE TECNOLOGIAS DE INFORMACION Y COMUNICACION A LA ASIGNATURA DE IMAGENOLOGIA DE LA CARRERA DE MEDICINA DE LA UNIVERSIDAD DE SAN FRANCISCO XAVIER DE CHUQUISAC', '2017-12-04', '2018-02-21', '', NULL),
(25, 'METODOLOGIAS DE ENSEÑANZA - APRENDISAJE EN LA ASIGNATURA DE INGENIERIA SANITARIA EN LA CARRERA DE INGENIERIA CIVIL DE LA UNIVERSIDAD DE SAN FRANCISCO XAVIER DE CHUQUISACA', '2017-12-21', '2018-02-22', '', NULL),
(27, 'titulo nue', '2018-02-22', '2018-03-14', 'que te importaque te importaque te importaque te importaque te importaque te importaque te importaque te importaque te importaque te importaque te importaque te importaque te importaque te importaque te importaque te importa', NULL),
(28, 'Investigacion de Recursos Humanos en la Gobernacion', '2018-05-15', '2018-05-22', '', NULL),
(29, 'titulo nuevo', '2018-05-02', '2018-05-24', 'que te importaque te importaque te importaque te importaque te importaque te importaque te importaque te importaque te importaque te importaque te importaque te importaque te importa', 'LISTA_DE_PERSONAL_ENC_GABINETES_EXAMEN(1).xlsx'),
(30, 'MEJORAR LA FORMACIÓN DE LOS ESTUDIANTES EN LA ASIGNATURA DE DIRECCIÓN DE OBRAS ENFOCANDO  LA INTERACCIÓN SOCIAL EN LA CARRERA DE  INGENIERÍA CIVIL DE LA UNIVERSIDAD MAYOR REAL PONTIFICIA DE SAN FRANCI', '2018-08-14', '2018-08-11', 'no hay', 'propuesta21.docx'),
(31, 'MEJORAR LA FORMACIÓN DE LOS ESTUDIANTES EN LA ASIGNATURA DE DIRECCIÓN DE OBRAS ENFOCANDO  LA INTERACCIÓN SOCIAL EN LA CARRERA DE  INGENIERÍA CIVIL DE LA UNIVERSIDAD SAN SIMON', '2018-08-13', '2018-08-13', 'No cancelo ahun', NULL),
(32, '	MEJORAR LA FORMACIÓN DE LOS ESTUDIANTES EN LA ASIGNATURA DE DIRECCIÓN DE OBRAS ENFOCANDO LA INTERACCIÓN SOCIAL', '2018-08-15', '2018-08-16', '', NULL),
(33, 'INCLUSIÓN DE LA LEY N° 348 EN LAS ASIGNATURAS DE DERECHO DE FAMILIA Y DERECHO PENAL DEL PLAN DE ESTUDIOS DE LA CARRERA DE DERECHO DE LA U.M.R.P.S.F.X.CH.', '2018-08-09', '2018-08-23', '', NULL),
(37, 'titulo nuevo1', '2018-08-16', '2018-08-28', '', 'JSON.pdf'),
(38, 'titulo nuevo1', '2018-08-17', '2018-08-24', '', NULL),
(39, 'Investigacion de Recursos de la Alcaldia', '2018-08-31', '2018-08-31', '', NULL),
(40, 'Investigacion de Recursos Humanos en la Gobernacion', '2018-08-31', '2018-08-31', '', NULL),
(41, 'MEJORAR LA FORMACIÓN DE LOS ESTUDIANTES EN LA ASIGNATURA DE DIRECCIÓN DE OBRAS ENFOCANDO LA INTERACCIÓN SOCIAL EN LA CARRERA  DE  INGENIERÍA CIVIL DE LA UNIVERSIDAD MAYOR REAL PONTIFICIA DE SAN FRANCI', '2018-04-27', '2018-06-27', '', NULL),
(42, 'MEJORAR LA FORMACIÓN DE LOS ESTUDIANTES EN LA ASIGNATURA DE DIRECCIÓN DE OBRAS ENFOCANDO ', '2018-08-07', '2018-08-20', '', NULL);

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
(98, 'A', 15, 123, 97),
(99, 'A', 0, 124, 98),
(100, 'A', 0, 125, 104),
(101, 'A', 0, 126, 105),
(102, 'A', 0, 127, 106),
(103, 'A', 0, 128, 107),
(104, 'A', 0, 129, 108),
(105, 'B', 30, 117, 99),
(106, 'B', 0, 123, 101),
(107, 'C', 0, 123, 103),
(117, 'A', 0, 137, 109),
(118, 'A', 0, 138, 111),
(119, 'A', 0, 139, 112),
(120, 'A', 0, 140, 115),
(121, 'A', 0, 141, 117),
(122, 'A', 0, 142, 116),
(123, 'A', 0, 143, 118),
(124, 'B', 10, 137, 110),
(126, 'B', 0, 138, 113),
(127, 'B', 0, 139, 114),
(142, 'A', 0, 158, 120),
(143, 'A', 0, 159, 121),
(144, 'A', 0, 160, 122),
(145, 'A', 0, 161, 123),
(146, 'A', 0, 162, 124),
(147, 'A', 0, 163, 125),
(148, 'A', 0, 164, 126),
(149, 'A', 0, 165, 119),
(150, 'A', 0, 166, 127),
(151, 'A', 0, 167, NULL),
(152, 'A', 0, 168, NULL),
(153, 'A', 0, 169, NULL),
(154, 'A', 0, 170, NULL),
(155, 'A', 0, 171, NULL);

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
(112, 'Auditoria', 'tecMed'),
(113, 'Ing. Geologia', 'ingenieria');

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
(15, 59, 27, 40, '2018-04-18', '2018-04-11', '32', '2018-04-03 00:12:00', 1, '', 1),
(17, 60, 29, 0, '0000-00-00', '0000-00-00', '', '0000-00-00 00:00:00', 0, '', NULL),
(18, 76, 30, 61, '2018-08-06', '2018-08-13', '4343', '2018-08-13 00:11:00', 1, 'Se cancelo.', NULL),
(19, 67, 31, 62, '2018-08-15', '2018-08-30', '231', '0000-00-00 00:00:00', 1, '', 1),
(20, 77, 32, 67, '2018-08-01', '2018-08-15', '32', '0000-00-00 00:00:00', 1, '', 1),
(21, 75, 33, 73, '2018-08-07', '2018-08-20', '231', '0000-00-00 00:00:00', 1, '', 1),
(25, 95, 37, 74, '0000-00-00', '0000-00-00', '', '0000-00-00 00:00:00', 0, '', 0),
(26, 93, 38, 84, '0000-00-00', '0000-00-00', '', '0000-00-00 00:00:00', 0, '', 1),
(27, 99, 39, 89, '2018-08-16', '2018-08-30', '435', '2018-08-17 00:12:00', 1, '', NULL),
(28, 100, 40, 91, '2018-08-16', '2018-08-23', '6756', '0000-00-00 00:00:00', 0, '', 1),
(29, 101, 41, 0, '0000-00-00', '0000-00-00', '', '0000-00-00 00:00:00', 0, '', NULL),
(30, 104, 42, 97, '2018-08-08', '2018-08-23', '54534', '2018-08-16 00:12:00', 0, '', NULL);

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
(94, 63, 10),
(95, 65, 10),
(97, 57, 10),
(98, 66, 11),
(99, 66, 13),
(101, 59, 11),
(107, 53, 10),
(110, 52, 10),
(113, 70, 15),
(117, 65, 11),
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
(145, 85, 14),
(146, 87, 15),
(147, 87, 10);

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
(44, 'VERSION I', '2018-02-25', 4, '2018-08-13', 'SI', 3400, 'Sucre, Facultad de Pedagogía', 0, '2018-08-11'),
(45, 'Version II', '2018-01-01', 4, '2018-08-16', 'Empieza una semana después de la fecha indicada', 4300, 'Sucre, Facultad de Pedagogía', 0, '2018-08-15'),
(47, 'VERSION III', '2018-08-14', 4, '2018-08-23', 'e', 3400, 'Sucre-Bolivia', 0, '2018-08-17'),
(50, 'VERSION IV', '2018-08-17', 4, NULL, '', 3400, 'Sucre-Bolivia', 1, '2018-08-18'),
(51, 'VERSION V', '2018-08-17', 3, NULL, '', 0, 'Sucre-Bolivia', 0, '2018-09-02');

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
  ADD KEY `bitacora_version_ibfk_1` (`idVersion`);

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
  MODIFY `idAcademico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `academico_tiene_profesion`
--
ALTER TABLE `academico_tiene_profesion`
  MODIFY `idTieneAPr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT de la tabla `academico_version`
--
ALTER TABLE `academico_version`
  MODIFY `idRegistroAV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT de la tabla `archivo`
--
ALTER TABLE `archivo`
  MODIFY `idArchivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `asignacion_modulo_diplomante`
--
ALTER TABLE `asignacion_modulo_diplomante`
  MODIFY `idAsignacionMDI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=275;

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `idBitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=307;

--
-- AUTO_INCREMENT de la tabla `bitacora_acceso_usuarios`
--
ALTER TABLE `bitacora_acceso_usuarios`
  MODIFY `idAccesoU_bitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=346;

--
-- AUTO_INCREMENT de la tabla `bitacora_version`
--
ALTER TABLE `bitacora_version`
  MODIFY `idBitacora_version` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `contrato`
--
ALTER TABLE `contrato`
  MODIFY `idContrato` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `defensa_monografia`
--
ALTER TABLE `defensa_monografia`
  MODIFY `idDefensa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `designar_tribunal`
--
ALTER TABLE `designar_tribunal`
  MODIFY `idTribunal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `diplomante`
--
ALTER TABLE `diplomante`
  MODIFY `idDiplomante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT de la tabla `docencia`
--
ALTER TABLE `docencia`
  MODIFY `idDocencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

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
  MODIFY `idInscripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `idModulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT de la tabla `monografia`
--
ALTER TABLE `monografia`
  MODIFY `idMonografia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `nota`
--
ALTER TABLE `nota`
  MODIFY `idNota` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paralelo`
--
ALTER TABLE `paralelo`
  MODIFY `idParalelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT de la tabla `profesion`
--
ALTER TABLE `profesion`
  MODIFY `idProfesion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT de la tabla `realiza_monografia`
--
ALTER TABLE `realiza_monografia`
  MODIFY `idRealizaMono` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `tieneapr_especialidad`
--
ALTER TABLE `tieneapr_especialidad`
  MODIFY `idTieneE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

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
  MODIFY `idVersion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

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
  ADD CONSTRAINT `bitacora_version_ibfk_1` FOREIGN KEY (`idVersion`) REFERENCES `version` (`idVersion`) ON DELETE CASCADE ON UPDATE CASCADE;

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
