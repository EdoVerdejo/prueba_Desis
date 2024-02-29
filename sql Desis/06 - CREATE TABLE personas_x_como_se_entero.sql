CREATE TABLE personas_x_como_se_entero(
	ID int NOT NULL AUTO_INCREMENT,
	id_persona int,
    id_como_se_entero int,
    CONSTRAINT PK_Como_Se_Entero PRIMARY KEY (ID),
    CONSTRAINT FK_per_comose FOREIGN KEY (id_persona) REFERENCES personas (ID),
    CONSTRAINT FK_comose_per FOREIGN KEY (id_como_se_entero) REFERENCES como_se_entero (ID)
);

##DROP TABLE personas_x_como_se_entero;
##SELECT * FROM personas_x_como_se_entero;