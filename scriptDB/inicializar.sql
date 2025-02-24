/**
 * @author Luis Ferreras González
 * @version 1.0.0 Fecha última modificación: 24/02/2025
 * @since 1.0.0
 */
INSERT INTO ListaTareas.Usuarios
VALUES
    ('abc', SHA2('abcpaso'), 'ABC'),
    ('def', SHA2('defpaso'), 'DEF'),
    ('ghi', SHA2('ghipaso'), 'GHI')
;
INSERT INTO ListaTareas.Tareas
    (codigoUsuario, descripcion)
VALUES
    ('abc', 'abc1'),
    ('abc', 'abc2'),
    ('def', 'def1'),
    ('def', 'def2'),
    ('ghi', 'ghi1'),
    ('ghi', 'ghi2')
;