-- phpMyAdmin SQL Dump
1-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-07-2022 a las 19:12:32
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinica-abc-bd`
--
CREATE DATABASE IF NOT EXISTS `clinica-abc-bd` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `clinica-abc-bd`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

DROP TABLE IF EXISTS `resultados`;
CREATE TABLE `resultados` (
  `Tipo` varchar(50) NOT NULL,
  `Usuario` varchar(50) NOT NULL,
  `Registro1` varchar(50) NOT NULL,
  `Registro2` varchar(50) NOT NULL,
  `Resultado` varchar(50) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `resultados`
--

INSERT INTO `resultados` (`Tipo`, `Usuario`, `Registro1`, `Registro2`, `Resultado`, `Fecha`) VALUES
('IMC', 'prueba', 'prueba', 'prueba', 'prueba', '0000-00-00'),
('IMC', 'prueba', 'prueba', 'prueba', 'prueba', '0000-00-00'),
('IMC', 'prueba', 'prueba', 'prueba', 'prueba', '0000-00-00'),
('IMC', '.Altura: 1.7 m.', 'prueba', 'prueba', 'prueba', '0000-00-00'),
('IMC', 'Altura: 1.2 m', 'prueba', 'prueba', 'prueba', '0000-00-00'),
('IMC', 'william', 'Altura: 1.2 m', 'Masa: 33 kg', '', '2022-07-27'),
('IMC', 'william', 'Altura: 1.2 m', 'Masa: 44 kg', '', '2022-07-20'),
('IMC', 'william', 'Altura: 1.8 m', 'Masa: 70 kg', '21.604938271605', '2022-07-20'),
('IMC', 'william', 'Altura: 1.7 m', 'Masa: 60 kg', '20.76124567474 (Peso Normal)', '2022-07-20'),
('IMC', 'william', 'Altura: 1.7 m', 'Masa: 60 kg', '20.8 (Peso Normal)', '2022-07-21'),
('IMC', 'william', 'Altura: 1.8 m', 'Masa: 120 kg', '37 (Obeso)', '2022-07-03'),
('IMC', 'test', 'Altura: 1.7 m', 'Masa: 60 kg', '20.8 (Peso Normal)', '2022-07-21'),
('IMC', 'test', 'Altura: 1.7 m', 'Masa: 33 kg', '11.4 (Bajo de Peso)', '2022-07-21'),
('IMC', 'test', 'Altura: 1.7 m', 'Masa: 33 kg', '11.4 (Bajo de Peso)', '2022-08-03'),
('IMC', 'test', 'Altura: 1.5 m', 'Masa: 55 kg', '24.4 (Peso Normal)', '2022-07-20'),
('Glucosa', 'test', 'Glucometro: 70 mm Hg', 'Medida: ', 'Glucosa Normal', '0000-00-00'),
('Glucosa', 'test', 'Glucometro: 60 mm Hg', 'Medida: en ayuna', '', '2022-07-15'),
('Glucosa', 'test', 'Glucometro: 70 mm Hg', 'Medida: Posprandial', 'Glucosa Normal', '2022-07-22'),
('IMC', 'test', 'Altura: 1.4 m', 'Masa: 40 kg', '20.4 (Peso Normal)', '2022-07-21'),
('Glucosa', 'test', 'Glucometro: 80 mg/L', 'Medida: en ayuna', 'Glucosa Normal', '2022-07-30'),
('Glucosa', 'test', 'Sistólica: 100 mm Hg', 'Diastólica: 100 mm Hg', 'Presión Arterial Alta </br>Hipertensión Nivel 2', '2022-07-13'),
('Presion', 'test', 'Sistólica: 100 mm Hg', 'Diastólica: 100 mm Hg', 'Hipertensión Nivel 2', '2022-04-14'),
('IMC', 'test', 'Altura: 1.8 m', 'Masa: 70 kg', '21.6 (Peso Normal)', '2022-01-18'),
('Glucosa', 'test', 'Glucometro: 80 mg/L', 'Medida: Posprandial', 'Glucosa Normal', '2022-02-17'),
('Presion', 'test', 'Sistólica: 80 mm Hg', 'Diastólica: 110 mm Hg', 'Hipertensión Nivel 2', '2022-02-21'),
('Presion', 'test', '90 mm Hg', '70 mm Hg', 'Presión Arterial Normal', '2022-05-19'),
('Glucosa', 'test', '80 mg/L', 'en ayuna', 'Glucosa Normal', '2022-05-24'),
('IMC', 'test', '1.6 m', '50 kg', '19.5 (Peso Normal)', '2022-04-19'),
('IMC', 'helly', '1.9 m', '85 kg', '23.5 (Peso Normal)', '2022-05-16'),
('Glucosa', 'helly', '80 mg/L', 'Posprandial', 'Glucosa Normal', '2022-06-16'),
('Presion', 'helly', '70 mm Hg', '100 mm Hg', 'Hipertensión Nivel 2', '2022-03-16'),
('IMC', 'test', '1.7 m', '60 kg', '20.8 (Peso Normal)', '2022-07-18'),
('IMC', 'test', '1.2 m', '40 kg', '27.8 (Sobrepeso)', '2022-07-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `usuario` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario`, `clave`) VALUES
('test', 'test'),
('test', 'test'),
('test', 'test'),
('', ''),
('', ''),
('', ''),
('test2', '1234'),
('test3', '1234'),
('testeeee', 'test'),
('testfrrgreg', 'test'),
('william', 'test'),
('helly', '1234'),
('fercu', '1234');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
