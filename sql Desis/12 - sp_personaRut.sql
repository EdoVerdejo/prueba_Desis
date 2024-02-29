DELIMITER $$
CREATE PROCEDURE `sp_personaRut`(
    IN iRut		VARCHAR(20)
)
BEGIN
	
    SELECT * FROM personas WHERE Rut = iRut;
    
    COMMIT;
END;
//DELIMITER