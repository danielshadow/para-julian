-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-04-2024 a las 01:55:34
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `free`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `armas`
--

CREATE TABLE `armas` (
  `id_arma` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `cant_balas` int(11) NOT NULL,
  `dano` int(11) NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bloqueo`
--

CREATE TABLE `bloqueo` (
  `id_bloqueo` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `fec_hora_bloq` datetime NOT NULL,
  `fec_hora_desblo` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dano`
--

CREATE TABLE `dano` (
  `id_dano` int(11) NOT NULL,
  `id_partida` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `tip_arm` varchar(50) NOT NULL,
  `puntos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `duracion`
--

CREATE TABLE `duracion` (
  `id_partida` int(11) NOT NULL,
  `id_mundo` varchar(40) NOT NULL,
  `fecha_ini` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL,
  `duracion` int(70) NOT NULL,
  `id_ganador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eliminacion`
--

CREATE TABLE `eliminacion` (
  `id_eliminacion` int(11) NOT NULL,
  `id_partida` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `punt_ganado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mundo`
--

CREATE TABLE `mundo` (
  `id_mundo` int(11) NOT NULL,
  `nom_mundo` varchar(50) NOT NULL,
  `cap_max_jug` int(11) NOT NULL,
  `imagenes` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mundo`
--

INSERT INTO `mundo` (`id_mundo`, `nom_mundo`, `cap_max_jug`, `imagenes`) VALUES
(1, 'bermuda', 5, ''),
(2, 'alphe', 5, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE `nivel` (
  `id_nivel` int(11) NOT NULL,
  `nomb_nivel` varchar(50) NOT NULL,
  `punt_requerido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partida`
--

CREATE TABLE `partida` (
  `id_partida` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `id_mundo` int(11) NOT NULL,
  `id_nivel` int(11) NOT NULL,
  `id_punto` int(11) NOT NULL,
  `fec_hora_inicio` datetime NOT NULL,
  `fec_hora_fin` datetime NOT NULL,
  `ganador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tip_user`
--

CREATE TABLE `tip_user` (
  `id_tip_user` int(11) NOT NULL,
  `tip_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tip_user`
--

INSERT INTO `tip_user` (`id_tip_user`, `tip_user`) VALUES
(1, 'Administrador'),
(2, 'Jugador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `username` varchar(20) NOT NULL,
  `contrasena` varchar(500) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `id_tip_user` int(11) NOT NULL,
  `nivel` int(100) NOT NULL,
  `puntos` int(100) NOT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `armas`
--
ALTER TABLE `armas`
  ADD PRIMARY KEY (`id_arma`),
  ADD UNIQUE KEY `nom_arma` (`nombre`);

--
-- Indices de la tabla `bloqueo`
--
ALTER TABLE `bloqueo`
  ADD PRIMARY KEY (`id_bloqueo`);

--
-- Indices de la tabla `dano`
--
ALTER TABLE `dano`
  ADD PRIMARY KEY (`id_dano`);

--
-- Indices de la tabla `duracion`
--
ALTER TABLE `duracion`
  ADD PRIMARY KEY (`id_partida`);

--
-- Indices de la tabla `eliminacion`
--
ALTER TABLE `eliminacion`
  ADD PRIMARY KEY (`id_eliminacion`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `mundo`
--
ALTER TABLE `mundo`
  ADD PRIMARY KEY (`id_mundo`);

--
-- Indices de la tabla `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`id_nivel`),
  ADD UNIQUE KEY `nomb_nivel` (`nomb_nivel`);

--
-- Indices de la tabla `partida`
--
ALTER TABLE `partida`
  ADD PRIMARY KEY (`id_partida`);

--
-- Indices de la tabla `tip_user`
--
ALTER TABLE `tip_user`
  ADD PRIMARY KEY (`id_tip_user`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `armas`
--
ALTER TABLE `armas`
  MODIFY `id_arma` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bloqueo`
--
ALTER TABLE `bloqueo`
  MODIFY `id_bloqueo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dano`
--
ALTER TABLE `dano`
  MODIFY `id_dano` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `duracion`
--
ALTER TABLE `duracion`
  MODIFY `id_partida` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `eliminacion`
--
ALTER TABLE `eliminacion`
  MODIFY `id_eliminacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mundo`
--
ALTER TABLE `mundo`
  MODIFY `id_mundo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `nivel`
--
ALTER TABLE `nivel`
  MODIFY `id_nivel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `partida`
--
ALTER TABLE `partida`
  MODIFY `id_partida` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tip_user`
--
ALTER TABLE `tip_user`
  MODIFY `id_tip_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
