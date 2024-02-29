DELIMITER $$
CREATE PROCEDURE sp_insertar_como_se_entero (
	IN iPersona	int,
    IN iComoSeEntero	int
)
BEGIN
	
    INSERT INTO personas_x_como_se_entero (id_persona, id_como_se_entero) 
    VALUES(iPersona, iComoSeEntero);
    
    COMMIT;
    
    COMMIT;
END;
//DELIMITER