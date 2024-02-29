CREATE TABLE comunas (
  id_comuna int NOT NULL AUTO_INCREMENT,
  id_region int NOT NULL,
  nombre varchar(50) NOT NULL,
  PRIMARY KEY (id_comuna),
  CONSTRAINT FK_comuna_region FOREIGN KEY (id_region) REFERENCES regiones (id_region)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

#DROP TABLE comunas;

