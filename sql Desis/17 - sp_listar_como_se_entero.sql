DELIMITER $$
CREATE PROCEDURE sp_listar_como_se_entero ()
BEGIN
	
    SELECT ID, nombre FROM como_se_entero;
    
    COMMIT;
END;
//DELIMITER