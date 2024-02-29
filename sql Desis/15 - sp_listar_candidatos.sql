DELIMITER $$
CREATE PROCEDURE sp_listar_candidatos ()
BEGIN
	
    SELECT id_candidato, NombreApellido FROM candidatos;
    
    COMMIT;
END;
//DELIMITER

