 /*DROP PROCEDURE IF EXISTS DeviceConfigInsert;*/

DELIMITER $$

CREATE PROCEDURE DeviceConfigInsert (
    IN piddevice   INT,
    IN pnombre     VARCHAR(50),
    IN pdefinicion VARCHAR(100),
    IN pvirtual    CHAR(1)
)
BEGIN

	DECLARE vMaxOrder INT;
    
    SELECT IFNULL(MAX(orden), 0) INTO vMaxOrder 
     FROM dispositivosconfig 
	WHERE iddevice = piddevice;
    
    SET vMaxOrder = vMaxOrder + 1;

	INSERT INTO dispositivosconfig (iddevice, nombre, definicion, virtual, orden) 
           VALUES(piddevice, pnombre, pdefinicion, pvirtual, vMaxOrder) ;

END$$

DELIMITER ;