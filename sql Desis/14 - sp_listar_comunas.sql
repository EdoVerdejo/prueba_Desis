DELIMITER $$
CREATE PROCEDURE sp_listar_comunas (
	IN iRegion	int
)
BEGIN
	
    SELECT id_comuna, nombre FROM comunas WHERE id_region = iRegion;
    
    COMMIT;
END;
//DELIMITER