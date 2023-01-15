
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `telefono` int(12) DEFAULT NULL,
  `movil` int(12) DEFAULT NULL,
  `fax` varchar(12) DEFAULT NULL,
  `direccioncalle` varchar(255) DEFAULT NULL,
  `codigopostal` varchar(255) DEFAULT NULL,
  `poblacion` varchar(255) DEFAULT NULL,
  `pais` varchar(255) DEFAULT NULL,
  `dninif` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `precio` decimal(30,2) DEFAULT NULL,
  `peso` int(255) DEFAULT NULL,
  `longitud` int(255) DEFAULT NULL,
  `anchura` int(255) DEFAULT NULL,
  `altura` int(255) DEFAULT NULL,
  `existencias` int(255) DEFAULT NULL,
  `activado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `idcliente` int(100) DEFAULT NULL,
  `fecha` varchar(100) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (idcliente) REFERENCES clientes(id)
);

CREATE TABLE IF NOT EXISTS `imagenesproductos` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `idproducto` int(100) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (idproducto) REFERENCES productos(id)
);

CREATE TABLE IF NOT EXISTS `lineaspedido` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `idpedido` int(100) DEFAULT NULL,
  `idproducto` int(100) DEFAULT NULL,
  `unidades` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (idpedido) REFERENCES pedidos(id),
  FOREIGN KEY (idproducto) REFERENCES productos(id)
);

CREATE TABLE IF NOT EXISTS carrito_usuarios(
    id_sesion VARCHAR(255) NOT NULL,
    id_producto int(100) DEFAULT NULL,
    FOREIGN KEY (id_producto) REFERENCES productos(id)
    ON UPDATE CASCADE ON DELETE CASCADE
);

INSERT INTO `clientes` (`id`, `nombre`, `apellidos`, `email`, `usuario`, `contrasena`, `telefono`, `movil`, `fax`, `direccioncalle`, `codigopostal`, `poblacion`, `pais`, `dninif`) VALUES
(1, 'Diego', 'Rodriguez', 'drplaybasketball17@gmail.com', 'diego', '1234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Juan', 'Casillas', 'juanCa@gmail.com', 'juan', '1234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Lorena', 'Bermudez', 'lore45@gmail.com', 'lorena', '1234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Penelope', 'Santiaga', 'PeneSan@gmail.com', 'penesan', '1234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Carmen', 'Sánchez', 'carmen@gmail.com', 'carmen', '1234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Antón', 'Pérez', 'anton@gmail.com', 'anton', '1234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `peso`, `longitud`, `anchura`, `altura`, `existencias`, `activado`) VALUES
(1, 'Jabón de baño', 'Producto tóxico para lavarte las manos después de hacer tus necesidades', '2.52', 1, 10, 10, 10, 80, 1),
(2, 'Jabón de cocina', 'Producto tóxico para lavar los utencilios de la cocina', '1.56', 1, 10, 10, 10, 80, 1),
(3, 'Jabón comestible', 'Producto para limpiar que se puede comer', '2.50', 1, 10, 10, 10, 80, 1),
(4, 'Jabón de automóvil', 'Producto tóxico para limpiar tu coche', '13.80', 1, 30, 30, 30, 80, 1);

INSERT INTO `pedidos` (`id`, `idcliente`, `fecha`, `estado`) VALUES
(2, 1, '1378370611', '1'),
(3, 2, '1378370703', '1'),
(4, 2, '1378371165', '2'),
(5, 1, '1378371384', '1'),
(6, 2, '1378371744', '0'),
(7, 2, '1378371813', '0'),
(8, 1, '1378371829', '0'),
(9, 1, '1378371869', '0'),
(10, 1, '1378372025', '1'),
(11, 1, '1378373074', '0'),
(12, 1, '1378373135', '2'),
(13, 2, '1378373247', '0'),
(14, 1, '1378373329', '0'),
(15, 3, '1378373395', '0'),
(16, 5, '1378373425', '0'),
(17, 1, '1378375518', '0'),
(18, 4, '1378375558', '1'),
(19, 3, '1378374573', '0'),
(20, 1, '1378375889', '0'),
(21, 2, '1378375345', '2'),
(22, 1, '1378375437', '0'),
(23, 5, '1378375222', '0'),
(24, 5, '1378375444', '1'),
(25, 5, '1378375555', '0'),
(26, 1, '1378375777', '0'),
(27, 2, '1378375101', '0'),
(28, 6, '1378375292', '0'),
(29, 6, '1378375393', '0'),
(30, 1, '1378375484', '1'),
(31, 3, '1378375666', '0'),
(32, 3, '1378391111', '0');

INSERT INTO `imagenesproductos` (`id`, `idproducto`, `imagen`, `titulo`, `descripcion`) VALUES
(1, 1, 'jabon1.png', 'Jabón 6', 'Ideal para un olor a menta'),
(2, 1, 'jabonnormal4.png', 'Jabón 1', 'Ideal para irte de viaje.'),
(3, 1, 'jabonnormal5.png', 'Jabón 2', 'Con olor a mar cantábrico.'),
(4, 1, 'jabonnormal6.png', 'Jabón 3', 'Huele a monte y ayuda a la dermatítis.'),
(5, 1, 'jabonfruta5.png', 'Jabón 4', 'Suave olor a limón.'),
(6, 1, 'jabonnormal13.png', 'Jabón 5', 'Parece de mentira.'),
(7, 2, 'jabon2.png', 'Jabón 1', 'Para una mejor digestión'),
(8, 2, 'jabonfruta4.png', 'Jabón 2', 'Se elabora con piel de oveja y escamas de lagarto del Hierro'),
(9, 2, 'jabonnormal7.png', 'Jabón 3', 'Su procedencia: Alburquerque.'),
(10, 2, 'jabonnormal8.png', 'Jabón 4', 'El más reclamado por los clientes. Marrón como la madre Tierra.'),
(11, 2, 'jabonnormal9.png', 'Jabón 5', 'Es de mentira, de relleno.'),
(12, 3, 'jabon3.png', 'Jabón 1', 'Colorea tu piel un 50%'),
(13, 3, 'jabonnormal10.png', 'Jabón 2', 'Su olor te adentra en los 90s.'),
(14, 3, 'jabonnormal11.png', 'Jabón 3', 'Típico jabón de Hotel super malo que siempre robas.'),
(15, 3, 'jabonfruta6.png', 'Jabón 4', 'Huele igual que las rosas de un cementerio.'),
(16, 4, 'jabon4.png', 'Jabón 1', 'Te quedas ciego al mirarlo'),
(17, 4, 'jabonnormal1.png', 'Jabón 2', 'Elaborado con aguacate y semillas de trigo.'),
(18, 4, 'jabonfruta3.png', 'Jabón 3', 'El menos elegido por los clientes. Pero el más útil.'),
(19, 4, 'jabonnormal2.png', 'Jabón 4', 'Parecen quesos camenbert, pero son jabones de alta calidad Francesa.'),
(20, 4, 'jabonnormal3.png', 'Jabón 5', 'Elaborado con cariño. De ahí su color pálido.'),
(21, 4, 'jabonnormal12.png', 'Jabón 6', 'Jabón de princesa.'),
(22, 2, 'jabon5.png', 'Jabón 6', 'Puedes comprarlo pero no te llegará nada a tu casa'),
(23, 3, 'jabonfruta7.png', 'Jabón 6', 'Jabón con grabado.'),
(24, 3, 'jabon6.png', 'Jabón 6', 'Está usado por el mismísimo Lionel Messi.');

INSERT INTO `lineaspedido` (`id`, `idpedido`, `idproducto`, `unidades`) VALUES
(3, 5, 1, 1),
(4, 5, 2, 1),
(5, 5, 3, 1),
(6, 6, 1, 1),
(7, 6, 2, 1),
(8, 6, 3, 1),
(9, 7, 1, 1),
(10, 7, 2, 1),
(11, 7, 3, 1),
(12, 8, 1, 1),
(13, 8, 2, 1),
(14, 8, 3, 1),
(15, 9, 1, 1),
(16, 9, 2, 1),
(17, 9, 3, 1),
(18, 10, 1, 1),
(19, 10, 2, 1),
(20, 10, 3, 1),
(21, 11, 1, 1),
(22, 12, 1, 1),
(23, 13, 1, 1),
(24, 14, 1, 1),
(25, 15, 1, 1),
(26, 16, 1, 1),
(27, 17, 1, 1),
(28, 18, 1, 1),
(29, 18, 2, 1),
(30, 18, 3, 1),
(31, 19, 1, 1),
(32, 19, 2, 1),
(33, 19, 3, 1),
(34, 20, 2, 1),
(35, 23, 3, 1),
(36, 25, 2, 1),
(37, 27, 3, 1),
(38, 28, 3, 1),
(39, 29, 3, 1),
(40, 30, 2, 1);


