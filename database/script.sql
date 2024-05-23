create type rol as enum('Usuario','Arrendador');

drop table usuarios;
CREATE TABLE usuarios (
    id SERIAL not null,
    nombre VARCHAR(50),
    apellidoPaterno VARCHAR(50),
    apellidoMaterno VARCHAR(50),
    rol rol not null,
    correo VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    telefono char(10) null,
    CONSTRAINT usuarios_pkey PRIMARY KEY (id),
    CONSTRAINT usuarios_email_key UNIQUE (correo)
);

INSERT INTO usuarios (nombre, apellidoPaterno, apellidoMaterno, rol, correo, password, telefono)
VALUES ('Juan', 'González', 'Pérez', 'Arrendador', 'arrendador@email.com', 'root', '1234567890');

INSERT INTO usuarios (nombre, apellidoPaterno, apellidoMaterno, rol, correo, password)
VALUES ('María', 'Martínez', 'López', 'Usuario', 'mari@email.com', 'mmartinez');

INSERT INTO usuarios (nombre, apellidoPaterno, apellidoMaterno, rol, correo, password)
VALUES ('Carlos', 'Rodríguez', 'Sánchez', 'Usuario', 'charly@email.com', '123456');

select * from usuarios;
SELECT id, nombre, apellidoPaterno, apellidoMaterno, rol, correo, telefono
            FROM usuarios WHERE correo='arrendador@email.com' AND password='root';

-- Estructura para las búsquedas filtradas
select nombre from usuarios where lower(nombre) like '%jua%';
