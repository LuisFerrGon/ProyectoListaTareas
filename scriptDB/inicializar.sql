/**
 * @author Luis Ferreras González
 * @version 1.0.0 Fecha última modificación: 26/02/2025
 * @since 1.0.0
 */
INSERT INTO ListaTareas.Usuarios
VALUES
    ('abcd', SHA2('abcdpaso1', 256), 'ABCD'),
    ('efgh', SHA2('efghpaso1', 256), 'EFGH'),
    ('ijkl', SHA2('ijklpaso1', 256), 'IJKL')
;
INSERT INTO ListaTareas.Tareas
    (codigoUsuario, descripcion)
VALUES
    ('abcd', 'abcd1'),
    ('abcd', 'abcd2'),
    ('efgh', 'efgh1'),
    ('efgh', 'efgh2'),
    ('ijkl', 'ijkl1'),
    ('ijkl', 'ijkl2')
;