CREATE DATABASE alquilarartemis;
USE alquilarartemis;

CREATE TABLE empleados (
    id_empleado INT(50) NOT NULL PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    usuario VARCHAR(30) NOT NULL,
    password VARCHAR(18) NOT NULL
);


CREATE TABLE constructoras (
    id_constructora INT(50) NOT NULL PRIMARY KEY,
    nombre VARCHAR(35) NOT NULL,
    direccion VARCHAR(40)
);

CREATE TABLE cotizaciones (
    id_cotizacion INT(50) NOT NULL PRIMARY KEY,
    id_empleado INT(50) NOT NULL,
    id_constructora INT(50) NOT NULL,
    fecha DATE NOT NULL,
    total DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (id_empleado) REFERENCES empleados(id_empleado),
    FOREIGN KEY (id_constructora) REFERENCES constructoras(id_constructora)
);

CREATE TABLE productos (
    id_producto INT(50) NOT NULL PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    precio_dia DECIMAL(10, 2) NOT NULL
);

CREATE TABLE detalle_cotizacion (
    id_detalle INT(50) NOT NULL PRIMARY KEY,
    id_cotizacion INT(50) NOT NULL,
    id_producto INT(50) NOT NULL,
    fecha_alquiler DATE NOT NULL,
    duracion_alquiler INT(10) NOT NULL,
    FOREIGN KEY (id_cotizacion) REFERENCES cotizaciones(id_cotizacion),
    FOREIGN KEY (id_producto) REFERENCES productos(id_producto)
);
