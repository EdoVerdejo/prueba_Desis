DELIMITER $$
CREATE PROCEDURE `sp_registrarPersona`(
	IN iNombreApellido VARCHAR(255),
    IN iAlias	VARCHAR(255),
    IN iRut		VARCHAR(20),
    IN iEmail	varchar(255),
    IN iRegion	int,
    IN iComuna	int,
    IN iCandidato int
)
BEGIN
	
    INSERT INTO personas (nombreApellido, Alias, Rut, Email, Region, Comuna, Candidato) 
    VALUES(iNombreApellido, iAlias, iRut, iEmail, iRegion, iComuna, iCandidato);
    
    COMMIT;
END;
//DELIMITER