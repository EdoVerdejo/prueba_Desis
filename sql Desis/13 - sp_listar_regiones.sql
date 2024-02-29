DELIMITER $$
CREATE PROCEDURE sp_listar_regiones ()
BEGIN
	
    SELECT id_region, nombre FROM regiones;
    
    COMMIT;
END;
//DELIMITER