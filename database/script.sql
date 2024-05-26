create type rol as enum('Administrador','Usuario','Arrendador');
create type status as enum('No verificado','En proceso','Verificado');

drop table usuarios;
CREATE TABLE usuarios (
      id SERIAL not null,
      nombre VARCHAR(50),
      apellidoPaterno VARCHAR(50),
      apellidoMaterno VARCHAR(50),
      rol rol not null default 'Usuario',
      correo VARCHAR(100) UNIQUE,
      password VARCHAR(255),
      telefono char(10) null,
      estatus status not null default 'No verificado',
      CONSTRAINT usuarios_pkey PRIMARY KEY (id),
      CONSTRAINT usuarios_email_key UNIQUE (correo)
);

-- Estructura para las búsquedas filtradas
select nombre from usuarios where lower(nombre) like '%jua%';

INSERT INTO usuarios (nombre, apellidoPaterno, apellidoMaterno, rol, correo, password, telefono)
VALUES ('Juan', 'González', 'Pérez', 'Administrador', 'admin@aloha.com', sha224('root'), '4451556094');

INSERT INTO usuarios (nombre, apellidoPaterno, apellidoMaterno, rol, correo, password, telefono)
VALUES ('David', 'Orozco', 'Peña', 'Arrendador', 'david@gmail.com', sha224('123456'), '4451556094');

INSERT INTO Usuarios(nombre, apellidoPaterno, apellidoMaterno, correo, password)
VALUES ('Carlos', 'Rodríguez', 'Sánchez', 'charly2@email.com', sha224('123456'));

