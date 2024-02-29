CREATE TABLE personas (
	ID int NOT NULL AUTO_INCREMENT,
    NombreApellido varchar(255) NOT NULL,
    Alias		varchar(255),	
    Rut			varchar(20),
    Email		varchar(255),
    Region		int,
    Comuna		int,
    Candidato	int,	
    CONSTRAINT PK_Persona PRIMARY KEY (ID),
    CONSTRAINT FK_Persona_region FOREIGN KEY (Region) REFERENCES regiones (id_region),
    CONSTRAINT FK_Persona_comuna FOREIGN KEY (Comuna) REFERENCES comunas (id_comuna),
    CONSTRAINT FK_Persona_candidato FOREIGN KEY (Candidato) REFERENCES candidatos (id_candidato)
);
##DROP TABLE if exists personas;
COMMIT;


SELECT * FROM personas;
DELETE FROM personas;