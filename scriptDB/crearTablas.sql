/**
 * @author Luis Ferreras González
 * @version 1.0.0 Fecha última modificación: 24/02/2025
 * @since 1.0.0
 */
CREATE DATABASE IF NOT EXISTS ListaTareas;
USE ListaTareas;
CREATE USER IF NOT EXISTS 'userListaTareas'@'%' IDENTIFIED BY 'paso';
GRANT ALL PRIVILIGES ON ListaTareas.* TO 'userListaTareas'@'%';
CREATE TABLE IF NOT EXISTS ListaTareas.Usuarios(
    codigo CHAR(8) PRIMARY KEY,
    contrasena VARCHAR(64),
    nombre VARCHAR(255)
);
CREATE TABLE IF NOT EXISTS ListaTareas.Tareas(
    codigoUsuario CHAR(8),
    codigoTarea INT AUTO_INCREMENT,
    descripcion VARCHAR(255),
    fechaCreacion DATETIME DEFAULT CURRENT_TIMESTAMP(),
    fechaCompletado DATETIME DEFAULT NULL,
    PRIMARY KEY (codigoUsuario, codigoTarea),
    FOREIGN KEY (codigoUsuario) REFERENCES Usuarios (codigo) ON DELETE CASCADE ON UPDATE CASCADE
);