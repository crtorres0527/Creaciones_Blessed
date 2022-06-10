create database proyecto_blessed;
use proyecto_blessed;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_blessed`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificacion`
--

CREATE TABLE `clasificacion` (
  `idClasificacion` int(11) NOT NULL,
  `Descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clasificacion`
--

INSERT INTO `clasificacion` (`idClasificacion`, `Descripcion`) VALUES
(1, 'obsequios'),
(2, 'camisas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `idInventario` int(11) NOT NULL,
  `StockProducto` int(11) NOT NULL,
  `salida` int(11) NOT NULL,
  `Saldo` int(11) NOT NULL,
  `Entrada` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla ``
--

CREATE TABLE `procesopedido` (
  `id` int(100) auto_increment,
  `usuario` text NOT NULL,
  `producto` text NOT NULL,
  `cantidad`int(100) NOT NULL,
  `email` text NOT NULL,
  `numero` int (50)NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Estructura de tabla para la tabla `pedidodetallado`
--

CREATE TABLE `pedidodetallado` (
  `idPedidoDetallado` int(11) auto_increment,
  `PrecioUnitario` decimal(20,2) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `idPersona` int(11) NOT NULL,
   `Estado` varchar(45) not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idPersona` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `Telefono` bigint(45) NOT NULL,
  `Direccion` varchar(45) NOT NULL,
  `Correo_electornico` varchar(45) NOT NULL,
  `idTipousuario` int(11) NOT NULL,
  `User_name` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `NumeroDocumento` int(45) NOT NULL,
  `idTipoDocumento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idPersona`, `Nombre`, `Apellido`, `Telefono`, `Direccion`, `Correo_electornico`, `idTipousuario`, `User_name`, `password`, `NumeroDocumento`, `idTipoDocumento`) VALUES
(1, 'Jhoan', 'Duarte', 21381238, 'calle 75a#62-28', 'jhoan23425@hotmail.com', 1, 'JhoanDuarte', '92783', 1015482112, 1),
(2, 'Omar', 'Perez ', 1241, 'calle 30# 13-8', 'omarstivenperez@hotmail.com', 2, 'OmarPerez', '1233', 1015467840, 1),
(4, 'Cristian torres', 'torres', 573059247705, '2132412', 'crtorres2127@gmail.com', 1, 'crtorres', '123123', 12321321, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL,
  `NombreP` varchar(45) NOT NULL,
  `Descripcion` varchar(45) NOT NULL,
  `Precio` varchar(45) NOT NULL,
  `Codigo` varchar(45) NOT NULL,
  `idClasificacion` int(11) NOT NULL,
  `Unidad` int(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumento`
--

CREATE TABLE `tipodocumento` (
  `idTipoDocumento` int(11) NOT NULL,
  `Descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipodocumento`
--

INSERT INTO `tipodocumento` (`idTipoDocumento`, `Descripcion`) VALUES
(1, 'Cedula'),
(2, 'Tarjeta Identidad'),
(3, 'Pasaporte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `idTipousuario` int(11) NOT NULL,
  `DescripcionU` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`idTipousuario`, `DescripcionU`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clasificacion`
--
ALTER TABLE `clasificacion`
  ADD PRIMARY KEY (`idClasificacion`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`idInventario`),
  ADD KEY `FK_Inventario_producto` (`idProducto`);

--
-- Indices de la tabla `procesopedido`
--
ALTER TABLE `procesopedido`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidodetallado`
--
ALTER TABLE `pedidodetallado`
  ADD PRIMARY KEY (`idPedidoDetallado`),
  ADD UNIQUE KEY `FK_Pedidodet_persona` (`idPersona`),
  ADD KEY `FK_Pedidodet_producto` (`idProducto`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idPersona`),
  ADD KEY `FK_Persona_Tipousuario` (`idTipousuario`),
  ADD KEY `FK_Persona_Tipodocumento` (`idTipoDocumento`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `FK_Producto_clasificacion` (`idClasificacion`);

--
-- Indices de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  ADD PRIMARY KEY (`idTipoDocumento`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`idTipousuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clasificacion`
--
ALTER TABLE `clasificacion`
  MODIFY `idClasificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `idInventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pedidocabecera`
--
ALTER TABLE `pedidocabecera`
  MODIFY `idPedidoCabecera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pedidodetallado`
--
ALTER TABLE `pedidodetallado`
  MODIFY `idPedidoDetallado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idPersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  MODIFY `idTipoDocumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `idTipousuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `FK_Inventario_producto` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`);

--
-- Filtros para la tabla `pedidodetallado`
--
ALTER TABLE `pedidodetallado`
  ADD CONSTRAINT `FK_Pedidodet_pedidoCabe` FOREIGN KEY (`idPedidoCabecera`) REFERENCES `pedidocabecera` (`idPedidoCabecera`),
  ADD CONSTRAINT `FK_Pedidodet_producto` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`);

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `FK_Persona_Tipodocumento` FOREIGN KEY (`idTipoDocumento`) REFERENCES `tipodocumento` (`idTipoDocumento`),
  ADD CONSTRAINT `FK_Persona_Tipousuario` FOREIGN KEY (`idTipousuario`) REFERENCES `tipo_usuario` (`idTipousuario`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `FK_Producto_clasificacion` FOREIGN KEY (`idClasificacion`) REFERENCES `clasificacion` (`idClasificacion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;