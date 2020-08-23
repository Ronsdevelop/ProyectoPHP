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