/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.37-MariaDB : Database - bdpanaderialeos
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bdpanaderialeos` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `bdpanaderialeos`;

/*Table structure for table `caja` */

DROP TABLE IF EXISTS `caja`;

CREATE TABLE `caja` (
  `caja_id` int(11) NOT NULL AUTO_INCREMENT,
  `sucursal_id` int(11) NOT NULL,
  `fApertura` date NOT NULL,
  `hApertura` time NOT NULL,
  `mApertura` decimal(9,2) NOT NULL,
  `mCierre` decimal(9,2) DEFAULT NULL,
  `hCierre` datetime DEFAULT NULL,
  `estado` varchar(45) NOT NULL,
  `observaciones` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`caja_id`),
  KEY `fk_CAJA_SUCURSAL1_idx` (`sucursal_id`),
  CONSTRAINT `fk_CAJA_SUCURSAL1` FOREIGN KEY (`sucursal_id`) REFERENCES `sucursal` (`sucursal_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `caja` */

/*Table structure for table `cant_venta_pan` */

DROP TABLE IF EXISTS `cant_venta_pan`;

CREATE TABLE `cant_venta_pan` (
  `cant_venta_pan_id` int(11) NOT NULL,
  `cantidad_x_sol` int(11) NOT NULL,
  `detalles` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cant_venta_pan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `cant_venta_pan` */

/*Table structure for table `cargo` */

DROP TABLE IF EXISTS `cargo`;

CREATE TABLE `cargo` (
  `cargo_id` int(11) NOT NULL AUTO_INCREMENT,
  `cargo` varchar(45) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `fCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cargo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `cargo` */

insert  into `cargo`(`cargo_id`,`cargo`,`descripcion`,`fCreacion`) values (1,'ADMINISTRADOR','ACCESO TOTAL AL SISTEMA','2020-08-03 14:06:07'),(2,'VENDEDOR','ACCESO AL AREA DE VENTAS','2020-08-03 14:06:09'),(3,'PANADERO','ACCESO AL AREA DE PRODUCION','2020-08-03 14:06:14');

/*Table structure for table `categoria` */

DROP TABLE IF EXISTS `categoria`;

CREATE TABLE `categoria` (
  `categoria_id` char(5) NOT NULL,
  `categoria` varchar(45) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `seccion_id` int(11) NOT NULL,
  PRIMARY KEY (`categoria_id`),
  KEY `fk_CATEGORIA_SECCION1_idx` (`seccion_id`),
  CONSTRAINT `fk_CATEGORIA_SECCION1` FOREIGN KEY (`seccion_id`) REFERENCES `seccion` (`seccion_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `categoria` */

insert  into `categoria`(`categoria_id`,`categoria`,`descripcion`,`seccion_id`) values ('CA001','DULCES','CATEGORIA DE TODOS LOS PANES CON DULCE',1),('CA002','PAN','CATEGORIA DE TODOS LOS PANES SALADO',1);

/*Table structure for table `cliente` */

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `cliente_id` char(10) NOT NULL,
  `nombre_razon` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `documento_identi` char(11) NOT NULL,
  `alias` varchar(50) DEFAULT NULL,
  `referencia` text NOT NULL,
  `representante` varchar(100) NOT NULL,
  `nCelular` char(9) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cumpleaños` date DEFAULT NULL,
  `tipoCliente_id` int(11) NOT NULL,
  `identificacion_id` int(11) NOT NULL,
  `sucursal_id` int(11) NOT NULL,
  `colaborador_id` int(11) NOT NULL,
  PRIMARY KEY (`cliente_id`),
  KEY `fk_CLIENTE_TIPO_CLIENTE1_idx` (`tipoCliente_id`),
  KEY `fk_CLIENTE_IDENTIFICACION_CLIENTE1_idx` (`identificacion_id`),
  KEY `fk_CLIENTE_SUCURSAL1_idx` (`sucursal_id`),
  KEY `fk_CLIENTE_COLABORADOR1_idx` (`colaborador_id`),
  CONSTRAINT `fk_CLIENTE_COLABORADOR1` FOREIGN KEY (`colaborador_id`) REFERENCES `colaborador` (`colaborador_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_CLIENTE_IDENTIFICACION1` FOREIGN KEY (`identificacion_id`) REFERENCES `identificacion_cliente` (`identificacion_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_CLIENTE_SUCURSAL1` FOREIGN KEY (`sucursal_id`) REFERENCES `sucursal` (`sucursal_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_CLIENTE_TIPO_CLIENTE1` FOREIGN KEY (`tipoCliente_id`) REFERENCES `tipo_cliente` (`tipoCliente_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `cliente` */

insert  into `cliente`(`cliente_id`,`nombre_razon`,`direccion`,`documento_identi`,`alias`,`referencia`,`representante`,`nCelular`,`email`,`fRegistro`,`cumpleaños`,`tipoCliente_id`,`identificacion_id`,`sucursal_id`,`colaborador_id`) values ('CL00000001','cliente1','direc','46261585','un alias','una referencia','un representate','965555','un email','2020-08-19 12:58:07','2020-11-05',1,1,1,1),('CL00000002','cliente1','direc','46261585','un alias','una referencia','un representate','965555','un email','2020-08-19 12:58:45','2020-11-05',1,1,1,1),('CL00000003','cliente1','direc','46261585','un alias','una referencia','un representate','965555','un email','2020-08-19 12:58:58','2020-11-05',1,1,1,1),('CL00000004','cliente1','direc','46261585','un alias','una referencia','un representate','965555','un email','2020-08-19 20:44:46','2020-11-05',2,2,1,1),('CL00000005','cliente1','direc','46261585','un alias','una referencia','un representate','965555','un email','2020-08-19 12:59:00','2020-11-05',1,1,1,1),('CL00000006','cliente1','direc','46261585','un alias','una referencia','un representate','965555','un email','2020-08-19 12:59:01','2020-11-05',1,1,1,1),('CL00000007','cliente1','direc','46261585','un alias','una referencia','un representate','965555','un email','2020-08-19 12:59:02','2020-11-05',1,1,1,1),('CL00000008','cliente1','direc','46261585','un alias','una referencia','un representate','965555','un email','2020-08-19 12:59:02','2020-11-05',1,1,1,1),('CL00000009','cliente1','direc','46261585','un alias','una referencia','un representate','965555','un email','2020-08-19 12:59:03','2020-11-05',1,1,1,1),('CL00000010','cliente1','direc','46261585','un alias','una referencia','un representate','965555','un email','2020-08-19 12:59:03','2020-11-05',1,1,1,1),('CL00000011','cliente1','direc','46261585','un alias','una referencia','un representate','965555','un email','2020-08-19 12:59:03','2020-11-05',1,1,1,1);

/*Table structure for table `colaborador` */

DROP TABLE IF EXISTS `colaborador`;

CREATE TABLE `colaborador` (
  `colaborador_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `aPaterno` varchar(80) NOT NULL,
  `aMaterno` varchar(80) NOT NULL,
  `dni` char(8) NOT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `nCelular` char(9) DEFAULT NULL,
  `fIngreso` date NOT NULL,
  `avatar` varchar(45) DEFAULT NULL,
  `user` varchar(30) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(80) NOT NULL,
  `cargo_id` int(11) NOT NULL,
  `ultimoLogeo` datetime DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`colaborador_id`),
  KEY `fk_COLABORADOR_CARGO1_idx` (`cargo_id`),
  CONSTRAINT `fk_COLABORADOR_CARGO1` FOREIGN KEY (`cargo_id`) REFERENCES `cargo` (`cargo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `colaborador` */

insert  into `colaborador`(`colaborador_id`,`nombre`,`aPaterno`,`aMaterno`,`dni`,`direccion`,`nCelular`,`fIngreso`,`avatar`,`user`,`pass`,`email`,`cargo_id`,`ultimoLogeo`,`estado`) values (1,'RONY','AGUILERA','RIVERA','46261585','CASTILLA - PIURA','927111112','2019-11-15','vistas/img/usuarios/Rony/751.jpeg','Rony','$2y$10$BakQHyFE5CYJsiHzbvcunO5bvlK3Lui//q3u8ZZgZhDzeF4i8syye','rony@panaderialeos.com',1,'2020-08-19 18:46:47',1),(2,'JESUS','RAMOS','GARCIA','46263434','CASTILLA - PIURA','984383838','2020-08-11','vistas/img/usuarios/Jess/458.jpeg','Jess','$2y$10$OYAK49E/SqQVctXmXeTvtO2kgOtUjzHAfr8.5GZ1RRgO85aZZhSjq','jesus@panaderialeos.com',2,'2020-08-16 16:42:30',1);

/*Table structure for table `compras_ingresos` */

DROP TABLE IF EXISTS `compras_ingresos`;

CREATE TABLE `compras_ingresos` (
  `ingresos_id` char(15) NOT NULL,
  `proveedor_id` char(5) NOT NULL,
  `nroComprobante` char(11) NOT NULL,
  `fecha` date NOT NULL,
  `montoCompra` decimal(10,2) NOT NULL,
  `igv` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `tipoComprobante_id` int(11) NOT NULL,
  `colaborador_id` int(11) NOT NULL,
  PRIMARY KEY (`ingresos_id`),
  KEY `fk_COMPRAS_INGRESOS_PROVEEDOR1_idx` (`proveedor_id`),
  KEY `fk_COMPRAS_INGRESOS_TIPO_COMPROBANTE1_idx` (`tipoComprobante_id`),
  KEY `fk_COMPRAS_INGRESOS_COLABORADOR1_idx` (`colaborador_id`),
  CONSTRAINT `fk_COMPRAS_INGRESOS_COLABORADOR1` FOREIGN KEY (`colaborador_id`) REFERENCES `colaborador` (`colaborador_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_COMPRAS_INGRESOS_PROVEEDOR` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedor` (`proveedor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_COMPRAS_INGRESOS_TIPO_COMPROBANTE1` FOREIGN KEY (`tipoComprobante_id`) REFERENCES `tipo_comprobante` (`tipoComprobante_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `compras_ingresos` */

/*Table structure for table `detalle_abarrotes_proveedor` */

DROP TABLE IF EXISTS `detalle_abarrotes_proveedor`;

CREATE TABLE `detalle_abarrotes_proveedor` (
  `producto_id` char(10) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `pCompra` decimal(9,2) NOT NULL,
  `fVencimiento` date NOT NULL,
  `valorCompra` decimal(9,2) NOT NULL,
  `ingresos_id` char(15) NOT NULL,
  KEY `fk_DETALLE_PROD_PROVEEDOR_PRODUCTO1_idx` (`producto_id`),
  KEY `fk_DETALLE_PROD_PROVEEDOR_COMPRAS_INGRESOS1_idx` (`ingresos_id`),
  CONSTRAINT `fk_DETALLE_PROD_PROVEEDOR_COMPRAS_INGRESOS1` FOREIGN KEY (`ingresos_id`) REFERENCES `compras_ingresos` (`ingresos_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_DETALLE_PROD_PROVEEDOR_PRODUCTO1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`producto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `detalle_abarrotes_proveedor` */

/*Table structure for table `detalle_matprima_proveedor` */

DROP TABLE IF EXISTS `detalle_matprima_proveedor`;

CREATE TABLE `detalle_matprima_proveedor` (
  `ingresos_id` char(15) NOT NULL,
  `mPrima_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(9,2) NOT NULL,
  `observacion` varchar(45) DEFAULT NULL,
  `fVencimiento` date NOT NULL,
  KEY `fk_PROVEEDOR_MPRIMA_MATERIA_PRIMA1_idx` (`mPrima_id`),
  KEY `fk_PROVEEDOR_MPRIMA_COMPRAS_INGRESOS1_idx` (`ingresos_id`),
  CONSTRAINT `fk_PROVEEDOR_MPRIMA_COMPRAS_INGRESOS1` FOREIGN KEY (`ingresos_id`) REFERENCES `compras_ingresos` (`ingresos_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_PROVEEDOR_MPRIMA_MATERIA_PRIMA1` FOREIGN KEY (`mPrima_id`) REFERENCES `materia_prima` (`mPrima_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `detalle_matprima_proveedor` */

/*Table structure for table `detalle_pedido` */

DROP TABLE IF EXISTS `detalle_pedido`;

CREATE TABLE `detalle_pedido` (
  `pedido_id` char(20) NOT NULL,
  `producto_id` char(10) NOT NULL,
  `cant_venta_pan_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `crearegistro` datetime DEFAULT NULL,
  KEY `fk_DETALLE_PEDIDO_PEDIDO1_idx` (`pedido_id`),
  KEY `fk_DETALLE_PEDIDO_PRODUCTO1_idx` (`producto_id`),
  KEY `fk_DETALLE_PEDIDO_CANT_VENTA_PAN1_idx` (`cant_venta_pan_id`),
  CONSTRAINT `fk_DETALLE_PEDIDO_CANT_VENTA_PAN1` FOREIGN KEY (`cant_venta_pan_id`) REFERENCES `cant_venta_pan` (`cant_venta_pan_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_DETALLE_PEDIDO_PEDIDO1` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`pedido_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_DETALLE_PEDIDO_PRODUCTO1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`producto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `detalle_pedido` */

/*Table structure for table `detalle_venta` */

DROP TABLE IF EXISTS `detalle_venta`;

CREATE TABLE `detalle_venta` (
  `venta_id` char(20) NOT NULL,
  `producto_id` char(10) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(9,2) NOT NULL,
  `valorVena` decimal(9,2) NOT NULL,
  KEY `fk_DETALLE_VENTA_PRODUCTO1_idx` (`producto_id`),
  KEY `fk_DETALLE_VENTA_VENTA1_idx` (`venta_id`),
  CONSTRAINT `fk_DETALLE_VENTA_PRODUCTO1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`producto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_DETALLE_VENTA_VENTA1` FOREIGN KEY (`venta_id`) REFERENCES `venta` (`venta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `detalle_venta` */

/*Table structure for table `detalles_maquina` */

DROP TABLE IF EXISTS `detalles_maquina`;

CREATE TABLE `detalles_maquina` (
  `fDetalle` date NOT NULL,
  `concepto` varchar(100) NOT NULL,
  `observacion` varchar(150) DEFAULT NULL,
  `costo` decimal(9,2) DEFAULT NULL,
  `maquina_id` int(11) NOT NULL,
  KEY `fk_DETALLES_MAQUINA_MAQUINA_idx` (`maquina_id`),
  CONSTRAINT `fk_DETALLES_MAQUINA_MAQUINA` FOREIGN KEY (`maquina_id`) REFERENCES `maquina` (`maquina_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `detalles_maquina` */

/*Table structure for table `ficha_produccion` */

DROP TABLE IF EXISTS `ficha_produccion`;

CREATE TABLE `ficha_produccion` (
  `produccion_id` char(20) NOT NULL,
  `producto_id` char(10) NOT NULL,
  `latasCompletas` int(11) NOT NULL,
  `canpanxLatasIcompletas` int(11) DEFAULT NULL,
  `canTotal` int(11) NOT NULL,
  `observacion` varchar(100) DEFAULT NULL,
  KEY `fk_DETALLE_PRODUCCION_PRODUCTO1_idx` (`producto_id`),
  KEY `fk_DETALLE_PRODUCCION_PRODUCCCION1_idx` (`produccion_id`),
  CONSTRAINT `fk_DETALLE_PRODUCCION_PRODUCCCION1` FOREIGN KEY (`produccion_id`) REFERENCES `producccion` (`produccion_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_DETALLE_PRODUCCION_PRODUCTO1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`producto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ficha_produccion` */

/*Table structure for table `identificacion_cliente` */

DROP TABLE IF EXISTS `identificacion_cliente`;

CREATE TABLE `identificacion_cliente` (
  `identificacion_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_identificacion` varchar(50) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`identificacion_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `identificacion_cliente` */

insert  into `identificacion_cliente`(`identificacion_id`,`tipo_identificacion`,`descripcion`) values (1,'RUC','CLIENTE CON RUC '),(2,'DNI','CLIENTE CON DNI'),(3,'PASAPORTE',NULL);

/*Table structure for table `maquina` */

DROP TABLE IF EXISTS `maquina`;

CREATE TABLE `maquina` (
  `maquina_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `uso` varchar(150) DEFAULT NULL,
  `fCompra` date NOT NULL,
  `costo` decimal(10,2) NOT NULL,
  `proveedor` varchar(150) NOT NULL,
  `celular` char(9) NOT NULL,
  `contacto` varchar(100) NOT NULL,
  `celular2` char(9) DEFAULT NULL,
  `imagen` varchar(45) DEFAULT NULL,
  `sucursal_id` int(11) NOT NULL,
  PRIMARY KEY (`maquina_id`),
  KEY `fk_MAQUINA_SUCURSAL1_idx` (`sucursal_id`),
  CONSTRAINT `fk_MAQUINA_SUCURSAL1` FOREIGN KEY (`sucursal_id`) REFERENCES `sucursal` (`sucursal_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `maquina` */

/*Table structure for table `materia_prima` */

DROP TABLE IF EXISTS `materia_prima`;

CREATE TABLE `materia_prima` (
  `mPrima_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `pCompra` date NOT NULL,
  `stokUnd` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `stockGramos` int(11) NOT NULL,
  `observacion` varchar(50) DEFAULT NULL,
  `unMedida_Id` int(11) NOT NULL,
  PRIMARY KEY (`mPrima_id`),
  KEY `fk_MATERIA_PRIMA_UNIDAD_MEDIDA1_idx` (`unMedida_Id`),
  CONSTRAINT `fk_MATERIA_PRIMA_UNIDAD_MEDIDA1` FOREIGN KEY (`unMedida_Id`) REFERENCES `unidad_medida` (`unMedida_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `materia_prima` */

/*Table structure for table `movimientos_caja` */

DROP TABLE IF EXISTS `movimientos_caja`;

CREATE TABLE `movimientos_caja` (
  `movCaja_id` int(11) NOT NULL AUTO_INCREMENT,
  `caja_id` int(11) NOT NULL,
  `tMovimiento_id` int(11) NOT NULL,
  `tipoComprobante_id` int(11) NOT NULL,
  `nroComprobante` varchar(45) NOT NULL,
  `nombreEmpre_persona` varchar(45) NOT NULL,
  `monto` decimal(9,2) NOT NULL,
  `observacion` varchar(45) DEFAULT NULL,
  `estado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`movCaja_id`),
  KEY `fk_MOVIMIENTOS_CAJA_TIPO_MOVIMIENTO1_idx` (`tMovimiento_id`),
  KEY `fk_MOVIMIENTOS_CAJA_TIPO_COMPROBANTE1_idx` (`tipoComprobante_id`),
  KEY `fk_MOVIMIENTOS_CAJA_CAJA1_idx` (`caja_id`),
  CONSTRAINT `fk_MOVIMIENTOS_CAJA_CAJA1` FOREIGN KEY (`caja_id`) REFERENCES `caja` (`caja_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_MOVIMIENTOS_CAJA_TIPO_COMPROBANTE1` FOREIGN KEY (`tipoComprobante_id`) REFERENCES `tipo_comprobante` (`tipoComprobante_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_MOVIMIENTOS_CAJA_TIPO_MOVIMIENTO1` FOREIGN KEY (`tMovimiento_id`) REFERENCES `tipo_movimiento` (`tMovimiento_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `movimientos_caja` */

/*Table structure for table `pedido` */

DROP TABLE IF EXISTS `pedido`;

CREATE TABLE `pedido` (
  `pedido_id` char(20) NOT NULL,
  `fecha` date NOT NULL,
  `monto` decimal(9,2) NOT NULL,
  `observaciones` varchar(100) DEFAULT NULL,
  `estado` bit(1) NOT NULL,
  `registroElab` datetime NOT NULL,
  `cliente_id` char(15) NOT NULL,
  `turno_id` int(11) NOT NULL,
  `colaborador_id` int(11) NOT NULL,
  PRIMARY KEY (`pedido_id`),
  KEY `fk_PEDIDO_CLIENTE1_idx` (`cliente_id`),
  KEY `fk_PEDIDO_TURNO1_idx` (`turno_id`),
  KEY `fk_PEDIDO_COLABORADOR1_idx` (`colaborador_id`),
  CONSTRAINT `fk_PEDIDO_CLIENTE1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`cliente_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_PEDIDO_COLABORADOR1` FOREIGN KEY (`colaborador_id`) REFERENCES `colaborador` (`colaborador_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_PEDIDO_TURNO1` FOREIGN KEY (`turno_id`) REFERENCES `turno` (`turno_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `pedido` */

/*Table structure for table `permiso` */

DROP TABLE IF EXISTS `permiso`;

CREATE TABLE `permiso` (
  `permiso_id` int(11) NOT NULL,
  `permiso` varchar(50) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `fCreacion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`permiso_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `permiso` */

/*Table structure for table `permiso_colaborador` */

DROP TABLE IF EXISTS `permiso_colaborador`;

CREATE TABLE `permiso_colaborador` (
  `permiso_id` int(11) NOT NULL,
  `colaborador_id` int(11) NOT NULL,
  KEY `fk_PERMISO_COLABORADOR_PERMISO1_idx` (`permiso_id`),
  KEY `fk_PERMISO_COLABORADOR_COLABORADOR1_idx` (`colaborador_id`),
  CONSTRAINT `fk_PERMISO_COLABORADOR_COLABORADOR1` FOREIGN KEY (`colaborador_id`) REFERENCES `colaborador` (`colaborador_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_PERMISO_COLABORADOR_PERMISO1` FOREIGN KEY (`permiso_id`) REFERENCES `permiso` (`permiso_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `permiso_colaborador` */

/*Table structure for table `producccion` */

DROP TABLE IF EXISTS `producccion`;

CREATE TABLE `producccion` (
  `produccion_id` char(20) NOT NULL,
  `fProduccion` date NOT NULL,
  `cantidad` int(11) NOT NULL,
  `observaciones` varchar(100) DEFAULT NULL,
  `turno_id` int(11) NOT NULL,
  `colaborador_id` int(11) NOT NULL,
  PRIMARY KEY (`produccion_id`),
  KEY `fk_PRODUCCCION_TURNO1_idx` (`turno_id`),
  KEY `fk_PRODUCCCION_COLABORADOR1_idx` (`colaborador_id`),
  CONSTRAINT `fk_PRODUCCCION_COLABORADOR1` FOREIGN KEY (`colaborador_id`) REFERENCES `colaborador` (`colaborador_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_PRODUCCCION_TURNO1` FOREIGN KEY (`turno_id`) REFERENCES `turno` (`turno_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `producccion` */

/*Table structure for table `producto` */

DROP TABLE IF EXISTS `producto`;

CREATE TABLE `producto` (
  `producto_id` char(10) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `presentacion` varchar(45) NOT NULL,
  `stock` varchar(45) NOT NULL,
  `imagen` varchar(45) DEFAULT NULL,
  `pVenta` decimal(9,2) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `categoria_id` char(5) NOT NULL,
  PRIMARY KEY (`producto_id`),
  KEY `fk_PRODUCTO_CATEGORIA1_idx` (`categoria_id`),
  CONSTRAINT `fk_PRODUCTO_CATEGORIA1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`categoria_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `producto` */

/*Table structure for table `proveedor` */

DROP TABLE IF EXISTS `proveedor`;

CREATE TABLE `proveedor` (
  `proveedor_id` char(5) NOT NULL,
  `rason` varchar(100) NOT NULL,
  `ruc` char(11) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `contacto` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nCelular` char(9) NOT NULL,
  `nFono` char(9) DEFAULT NULL,
  `referencia` text,
  PRIMARY KEY (`proveedor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `proveedor` */

insert  into `proveedor`(`proveedor_id`,`rason`,`ruc`,`direccion`,`contacto`,`email`,`nCelular`,`nFono`,`referencia`) values ('PV001','GRUPO FUMINSUMOS SAC','20600149645','CALLE LOS FICUS MZ Q LT 23 CASTILLA','JUAN MARTINEZ','grupo@hotmail.com','123456789','383883','A ESPALDAS DEL ESTADIO');

/*Table structure for table `seccion` */

DROP TABLE IF EXISTS `seccion`;

CREATE TABLE `seccion` (
  `seccion_id` int(11) NOT NULL AUTO_INCREMENT,
  `seccion` varchar(45) NOT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `estado` bit(1) NOT NULL,
  PRIMARY KEY (`seccion_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `seccion` */

insert  into `seccion`(`seccion_id`,`seccion`,`descripcion`,`estado`) values (1,'PANADERIA','VENTA DE TODO TIPO DE PRODUCTOS DE PANADERIA',''),(2,'BODEGA','VENTA DE PRODUCTOS DE ALGUNOS PROUDUCTOS DE PRIMERA NECESIDA, BASICOS','');

/*Table structure for table `sucursal` */

DROP TABLE IF EXISTS `sucursal`;

CREATE TABLE `sucursal` (
  `sucursal_id` int(11) NOT NULL AUTO_INCREMENT,
  `direccion` varchar(100) NOT NULL,
  `nFono` char(9) DEFAULT NULL,
  `estado` int(1) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`sucursal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `sucursal` */

insert  into `sucursal`(`sucursal_id`,`direccion`,`nFono`,`estado`,`descripcion`) values (1,'CALLE LOS PINOS','927665554',1,'LOCAL PRINCIPAL DE PRODUCCION');

/*Table structure for table `tipo_cliente` */

DROP TABLE IF EXISTS `tipo_cliente`;

CREATE TABLE `tipo_cliente` (
  `tipoCliente_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tipoCliente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tipo_cliente` */

insert  into `tipo_cliente`(`tipoCliente_id`,`tipo`,`descripcion`) values (1,'DISTRIBUIDOR','CLIENTES QUE SE ENTREGA PAN PARA VENDER'),(2,'CONSUMIDOR','CLIENTE QUE COMPRA EN TIENDA');

/*Table structure for table `tipo_comprobante` */

DROP TABLE IF EXISTS `tipo_comprobante`;

CREATE TABLE `tipo_comprobante` (
  `tipoComprobante_id` int(11) NOT NULL AUTO_INCREMENT,
  `comprobante` varchar(50) NOT NULL,
  PRIMARY KEY (`tipoComprobante_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tipo_comprobante` */

/*Table structure for table `tipo_movimiento` */

DROP TABLE IF EXISTS `tipo_movimiento`;

CREATE TABLE `tipo_movimiento` (
  `tMovimiento_id` int(11) NOT NULL,
  `tipoMovimiento` varchar(50) NOT NULL,
  `estado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`tMovimiento_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tipo_movimiento` */

/*Table structure for table `tipo_pago` */

DROP TABLE IF EXISTS `tipo_pago`;

CREATE TABLE `tipo_pago` (
  `tPago_id` int(11) NOT NULL,
  `tPago` varchar(50) NOT NULL,
  `descriipcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tPago_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tipo_pago` */

/*Table structure for table `turno` */

DROP TABLE IF EXISTS `turno`;

CREATE TABLE `turno` (
  `turno_id` int(11) NOT NULL,
  `turno` varchar(50) NOT NULL,
  PRIMARY KEY (`turno_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `turno` */

/*Table structure for table `unidad_medida` */

DROP TABLE IF EXISTS `unidad_medida`;

CREATE TABLE `unidad_medida` (
  `unMedida_Id` int(11) NOT NULL,
  `unidadMedida` varchar(100) NOT NULL,
  `unidadConversion` int(11) DEFAULT NULL,
  PRIMARY KEY (`unMedida_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `unidad_medida` */

/*Table structure for table `uso_mprima` */

DROP TABLE IF EXISTS `uso_mprima`;

CREATE TABLE `uso_mprima` (
  `produccion_id` char(20) NOT NULL,
  `mPrima_id` int(11) NOT NULL,
  `cantidad` decimal(9,2) NOT NULL,
  `observacion` varchar(100) DEFAULT NULL,
  KEY `fk_PRODUCTO_MPRIMA_MATERIA_PRIMA1_idx` (`mPrima_id`),
  KEY `fk_USO_MPRIMA_PRODUCCCION1_idx` (`produccion_id`),
  CONSTRAINT `fk_PRODUCTO_MPRIMA_MATERIA_PRIMA1` FOREIGN KEY (`mPrima_id`) REFERENCES `materia_prima` (`mPrima_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_USO_MPRIMA_PRODUCCCION1` FOREIGN KEY (`produccion_id`) REFERENCES `producccion` (`produccion_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `uso_mprima` */

/*Table structure for table `venta` */

DROP TABLE IF EXISTS `venta`;

CREATE TABLE `venta` (
  `venta_id` char(20) NOT NULL,
  `correlativo` char(6) NOT NULL,
  `fecha` date NOT NULL,
  `total` decimal(9,2) NOT NULL,
  `igv` decimal(9,2) NOT NULL,
  `subtotal` decimal(9,2) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `fRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tipoComprobante_id` int(11) NOT NULL,
  `cliente_id` char(15) NOT NULL,
  `colaborador_id` int(11) NOT NULL,
  `sucursal_id` int(11) NOT NULL,
  `tPago_id` int(11) NOT NULL,
  `turno_id` int(11) NOT NULL,
  PRIMARY KEY (`venta_id`),
  KEY `fk_VENTA_TIPO_COMPROBANTE1_idx` (`tipoComprobante_id`),
  KEY `fk_VENTA_CLIENTE1_idx` (`cliente_id`),
  KEY `fk_VENTA_COLABORADOR1_idx` (`colaborador_id`),
  KEY `fk_VENTA_SUCURSAL1_idx` (`sucursal_id`),
  KEY `fk_VENTA_TIPO_PAGO1_idx` (`tPago_id`),
  KEY `fk_VENTA_TURNO1_idx` (`turno_id`),
  CONSTRAINT `fk_VENTA_CLIENTE1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`cliente_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_VENTA_COLABORADOR1` FOREIGN KEY (`colaborador_id`) REFERENCES `colaborador` (`colaborador_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_VENTA_SUCURSAL1` FOREIGN KEY (`sucursal_id`) REFERENCES `sucursal` (`sucursal_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_VENTA_TIPO_COMPROBANTE1` FOREIGN KEY (`tipoComprobante_id`) REFERENCES `tipo_comprobante` (`tipoComprobante_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_VENTA_TIPO_PAGO1` FOREIGN KEY (`tPago_id`) REFERENCES `tipo_pago` (`tPago_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_VENTA_TURNO1` FOREIGN KEY (`turno_id`) REFERENCES `turno` (`turno_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `venta` */

/* Procedure structure for procedure `sp_ingresaCategoria` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_ingresaCategoria` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ingresaCategoria`(cat varchar(45),des varchar(100),est int,secc int)
BEGIN
    
       DECLARE id CHAR(5);
   
		SET id=(SELECT CONCAT("CA",RIGHT(CONCAT("000",
		MAX(SUBSTRING(`categoria_id`,3)+1)),3)) FROM `categoria`);
			BEGIN 
				IF ISNULL(id) THEN 
					SET id='CA001';
				END IF;
			END;
		INSERT INTO `categoria` (`categoria_id`,`categoria`,`descripcion`,`estado`,`seccion_id`)
		VALUES (id,cat,des,est,secc);
    
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_ingresaCliente` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_ingresaCliente` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ingresaCliente`(ras VARCHAR(100),direc VARCHAR(100),doc CHAR(11),alis VARCHAR(100),refere TEXT,contac VARCHAR(100),nCel CHAR(9),emails VARCHAR(100), cumple date, tpcli int,tident INT,surco INT,colab INT)
BEGIN 
		DECLARE id CHAR(10);
   
		SET id=(SELECT CONCAT("CL",RIGHT(CONCAT("00000000",
		MAX(SUBSTRING(`cliente_id`,8)+1)),8)) FROM `cliente`);
			BEGIN 
				IF ISNULL(id) THEN 
					SET id='CL00000001';
				END IF;
			END;
		INSERT INTO `cliente` (`cliente_id`,`nombre_razon`,`direccion`,`documento_identi`,`alias`,`referencia`,`representante`,`nCelular`,`email`,`cumpleaños`,`tipoCliente_id`,`identificacion_id`,`sucursal_id`,`colaborador_id`)
		VALUES (id,ras,direc,doc,alis,refere,contac,nCel,emails,cumple,tpcli,tident,surco,colab);
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_ingresaProveedor` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_ingresaProveedor` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ingresaProveedor`(ras varchar(100),rucs char(11),direc varchar(100),contac varchar(100),emails varchar(100),nCel char(9),nFon char(9),refere text)
BEGIN 
		DECLARE id CHAR(5);
   
		SET id=(SELECT CONCAT("PV",RIGHT(CONCAT("000",
		MAX(SUBSTRING(`proveedor_id`,3)+1)),3)) FROM `proveedor`);
			BEGIN 
				IF ISNULL(id) THEN 
					SET id='PV001';
				END IF;
			END;
		INSERT INTO `proveedor` (`proveedor_id`,`rason`,`ruc`,`direccion`,`contacto`,`email`,`nCelular`,`nFono`,`referencia`)
		VALUES (id,ras,rucs,direc,contac,emails,nCel,nFon,refere);
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_listarClientes` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_listarClientes` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listarClientes`()
BEGIN
	SELECT c.cliente_id AS ID, c.nombre_razon AS CLIENTE, c.direccion AS DIRECCION,ic.tipo_identificacion AS DOCUMENTO, c.documento_identi AS NUMERO, c.alias AS ALIAS,c.referencia AS REFERENCIA, c.nCelular AS CELULAR, c.representante AS CONTACTO, c.cumpleaños AS CUMPLEANOS,tc.tipo AS TIPCLIE FROM cliente c INNER JOIN tipo_cliente tc ON c.tipoCliente_id=tc.tipoCliente_id INNER JOIN identificacion_cliente ic ON c.identificacion_id=ic.identificacion_id ;
    END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
