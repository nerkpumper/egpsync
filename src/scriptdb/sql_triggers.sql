/*
DROP TRIGGER IF EXISTS dispositivosconfig_order;*/

DELIMITER //

CREATE TRIGGER dispositivosconfig_order
AFTER INSERT
   ON dispositivosconfig FOR EACH ROW
BEGIN

   DECLARE vMaxOrder INT;
   DECLARE vUltimo INT;
   
   /*Encontramos el ultimo en orden*/
   SELECT IFNULL(MAX(orden), 0) INTO vMaxOrder 
     FROM dispositivosconfig 
	WHERE iddevice = NEW.iddevice;
    
    SELECT id INTO vUltimo 
     FROM dispositivosconfig 
	WHERE iddevice = NEW.iddevice;
   
   SET vMaxOrder = vMaxOrder + 1;
   
   /*Se inserta el orden que le corresponde*/
   UPDATE dispositivosconfig 
      SET orden = vMaxOrder
	WHERE id = vUltimo;

END; //

DELIMITER ;

