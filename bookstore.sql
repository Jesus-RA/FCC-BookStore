-- Script para la creación de la BD
DROP DATABASE IF EXISTS bookstore;
CREATE DATABASE bookstore;

USE bookstore;

DROP TABLE IF EXISTS carrera;
CREATE TABLE carrera(
    idCarrera INT NOT NULL AUTO_INCREMENT,
    carrera VARCHAR(128) NOT NULL,
    CONSTRAINT idCarrera PRIMARY KEY (idCarrera, carrera)
);

DROP TABLE IF EXISTS internauta;
CREATE TABLE internauta(
    idInternauta INT NOT NULL AUTO_INCREMENT,
    matricula VARCHAR(24) NOT NULL,
    carrera INT NOT NULL,
    telefono VARCHAR(24) NOT NULL,
    email VARCHAR(128) NOT NULL,
    FOREIGN KEY (carrera) REFERENCES carrera (idCarrera) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT idInternauta PRIMARY KEY (idInternauta, matricula, carrera)
);

DROP TABLE IF EXISTS usuario;
CREATE TABLE usuario(
    idUsuario INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(64) NOT NULL,
    email VARCHAR(128) NOT NULL,
    password VARCHAR(128) NOT NULL,
    CONSTRAINT idUsuario PRIMARY KEY (idUsuario, nombre, email)
);

DROP TABLE IF EXISTS area;
CREATE TABLE area(
    idArea INT NOT NULL AUTO_INCREMENT,
    area VARCHAR (128) NOT NULL,
    CONSTRAINT idArea PRIMARY KEY (idArea, area)
);

DROP TABLE IF EXISTS estado;
CREATE TABLE estado(
    idEstado INT NOT NULL AUTO_INCREMENT,
    estado VARCHAR(128) NOT NULL,
    CONSTRAINT idEstado PRIMARY KEY (idEstado, estado)
);

DROP TABLE IF EXISTS libro;
CREATE TABLE libro(
    idLibro INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(128) NOT NULL,
    area INT NOT NULL,
    descripcion VARCHAR(1024),
    precio INT NOT NULL,
    foto VARCHAR(1024) NOT NULL,
    estado INT NOT NULL,
    propietario INT NOT NULL,
    vendido BIT NOT NULL,
    FOREIGN KEY (area) REFERENCES area(idArea) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (estado) REFERENCES estado(idEstado) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (propietario) REFERENCES usuario(idUsuario) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT idLibro PRIMARY KEY (idLibro, titulo)
);

DROP TABLE IF EXISTS compra;
CREATE TABLE compra(
    idCompra INT NOT NULL AUTO_INCREMENT,
    libro INT NOT NULL,
    comprador INT NOT NULL,
    FOREIGN KEY (libro) REFERENCES libro (idLibro) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (comprador) REFERENCES internauta (idInternauta) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT idCompra PRIMARY KEY (idCompra, libro, comprador)
);

-- Script para insertar datos en bookstore
USE bookstore;

INSERT INTO area (area) VALUES ('Computación');
INSERT INTO area (area) VALUES ('Hardware');
INSERT INTO area (area) VALUES ('Matemáticas');
INSERT INTO area (area) VALUES ('Física');
INSERT INTO area (area) VALUES ('Otros');

INSERT INTO estado (estado) VALUES ('Impecable');
INSERT INTO estado (estado) VALUES ('Regular');
INSERT INTO estado (estado) VALUES ('Maltratado');

INSERT INTO carrera (carrera) VALUES ('Ingeniería en Ciencias de la Computación');
INSERT INTO carrera (carrera) VALUES ('Licenciatura en Ciencias de la Computación');
INSERT INTO carrera (carrera) VALUES ('Ingeniería en Tecnologías de la Información');