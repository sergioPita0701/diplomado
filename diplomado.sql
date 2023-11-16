--Aumentar un campo mas a la tabla versiones
ALTER TABLE versiones
ADD COLUMN cantidad_minima_pago DECIMAL(10, 2);



--versiones 




ALTER TABLE version
ADD COLUMN numCuotasV INT ,
ADD COLUMN tiposCursoV VARCHAR(100) COLLATE utf8_spanish_ci,
ADD COLUMN costoMatriculaV DECIMAL(10, 2) DEFAULT 0.00,
ADD COLUMN costoModulosV DECIMAL(10, 2) DEFAULT 0.00,
ADD COLUMN costoModuloIndiviV DECIMAL(10, 2) DEFAULT 0.00,
ADD COLUMN montoMinPrimerPagoV DECIMAL(10, 2) DEFAULT 0.00,
ADD COLUMN costoTotalV DECIMAL(10, 2);
ADD COLUMN cantidadModulosV DECIMAL(10, 2);

ALTER TABLE modulo
ADD COLUMN nivel VARCHAR(10),
ADD COLUMN asignaturaNombreM vARCHAR(255);


CREATE TABLE tipos_curso (
    idTipoCurso INT PRIMARY KEY,
    nombreTipoCurso VARCHAR(255) UNIQUE
);

INSERT INTO tipos_curso (nombreTipoCurso) VALUES 
('Especialidad'),
('Maestría'),
('Diplomado');

--crear tabla descuento 

CREATE TABLE `descuento` (
  `idDescuento` BIGINT NOT NULL AUTO_INCREMENT,
  `nombreD` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcionD` text COLLATE utf8_spanish_ci NOT NULL,
  `porcentajeD` decimal(10, 2) NOT NULL, -- Utilizamos DECIMAL con precisión de 10 dígitos y 2 decimales para valores monetarios
  `estadoD` int(1) NOT NULL DEFAULT '1', -- 1: Activo, 2: Inactivo
  PRIMARY KEY (`idDescuento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `descuento` (`idDescuento`, `nombreD`, `descripcionD`, `porcentajeD`, `estadoD`) VALUES
(1, 'Descuento 1', 'Descuento 1', '10.00', 1),
(2, 'Descuento 2', 'Descuento 2', '20.00', 1),
(3, 'Descuento 3', 'Descuento 3', '30.00', 1),
(4, 'Descuento 4', 'Descuento 4', '40.00', 1),
(5, 'Descuento 5', 'Descuento 5', '50.00', 1),
(6, 'Descuento 6', 'Descuento 6', '60.00', 1),
(7, 'Descuento 7', 'Descuento 7', '70.00', 1),
(8, 'Descuento 8', 'Descuento 8', '80.00', 1),
(9, 'Descuento 9', 'Descuento 9', '90.00', 1),
(10, 'Descuento 10', 'Descuento 10', '100.00', 1);



CREATE TABLE `transaccion` (
  `idTransaccion` int(11) NOT NULL AUTO_INCREMENT,
  `idDescuento` int(11),
  `idInscripcion` int(11),
  `montoOriginalT` DECIMAL(10, 2),
  `montoDescuentoT` DECIMAL(10, 2),
  `estado` ENUM('activo', 'inactivo', 'pendiente') NOT NULL DEFAULT 'activo',
  PRIMARY KEY (`idTransaccion`),
  FOREIGN KEY (`idDescuento`) REFERENCES `descuento`(`idDescuento`),
  FOREIGN KEY (`idInscripcion`) REFERENCES `inscripcion`(`idInscripcion`) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;



CREATE TABLE `pago` (
  `idPago` int(11) NOT NULL AUTO_INCREMENT,
  `idTransaccion` int(11), 
  `fechaDepositoP` DATE,
  `numeroDepositoP` BIGINT,
  `montoP` decimal(10, 2) NOT NULL, 
  `monedaP` enum('BS', 'USD') NOT NULL,
  `tasaCambioP` decimal(10, 2),
  `montoTotalBsP` decimal(10, 2),
  PRIMARY KEY (`idPago`),
  FOREIGN KEY (`idTransaccion`) REFERENCES `transaccion`(`idTransaccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;



CREATE TABLE `Multa`(
    `idMulta` int(11) NOT NULL AUTO_INCREMENT,
    `nombreM` varchar(100),
    `descripcionM` varchar(100),
    `montoM` decimal(10, 2) NOT NULL, 
    `monedaM` enum('BS', 'USD') NOT NULL,
    `estadoM` int,  -- 1: Activo, 2: Inactivo
    PRIMARY KEY (`idMulta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


CREATE TABLE `TransaccionMulta` (
  `idMulta` int(11), 
  `idTransaccion` int(11),
  `fechaTM` DATE,
  `estadoTM` ENUM('activo', 'inactivo', 'pendiente') NOT NULL DEFAULT 'activo',
  PRIMARY KEY (idTransaccion, idMulta),
  FOREIGN KEY (idTransaccion) REFERENCES Transaccion(idTransaccion),
  FOREIGN KEY (idMulta) REFERENCES Multa(idMulta) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO transaccion (idDescuento, idInscripcion, montoOriginalT, montoDescuentoT) VALUES
(1, 111, 3060.00, 2754.00);

insert INTO pago (idTransaccion, fechaDepositoP, numeroDepositoP, montoP, monedaP, tasaCambioP) VALUES
(2, '2019-10-10', 123456789, 2754.00, 'BS', 0.00);