create type rol as enum('Administrador','Usuario','Arrendador');
create type status as enum('No verificado','En proceso','Verificado');
create type statusInmueble as enum('Disponible','Ocupado','Fuera de servicio');

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

drop table inmuebles;
CREATE TABLE inmuebles (
      id SERIAL not null,
      arrendador int not null,
      nombre VARCHAR(50) not null,
      telefono VARCHAR(50) not null,
      precioAlquiler decimal(10, 2) not null,
      descripcion TEXT not NUll,
      estado VARCHAR(50) not null,
      municipio VARCHAR(50) not null,
      colonia VARCHAR(50) not null,
      direccion VARCHAR(50) not null,
      latitud varchar(50) not null,
      longitud varchar(50) not null,
      estatus statusInmueble not null default 'Disponible',
      internet BOOLEAN DEFAULT FALSE,
      agua BOOLEAN DEFAULT FALSE,
      luz BOOLEAN DEFAULT FALSE,
      garage BOOLEAN DEFAULT FALSE,
      CONSTRAINT alquiler_pkey PRIMARY KEY (id),
      FOREIGN KEY (arrendador) REFERENCES usuarios(id)
);
select * from inmuebles;
-- Insertar primer registro
INSERT INTO inmuebles (arrendador, nombre, telefono, precioAlquiler, descripcion, estado, municipio, colonia, direccion, latitud, longitud, internet, agua, luz, garage)
VALUES (4, 'Casa en la playa', '4586985472',2000.00,'Zona muy bonita, tiene grandes jardines y buenas vistas', 'Quintana Roo', 'Cancún', 'Zona Hotelera', 'Av. Kukulcán', '21.1619', '-86.8515',  TRUE, TRUE, TRUE, FALSE);

-- Insertar segundo registro
INSERT INTO inmuebles (arrendador, nombre, telefono, precioAlquiler, descripcion, estado, municipio, colonia, direccion, latitud, longitud, internet, agua, luz, garage)
VALUES (4, 'Departamento céntrico', '5551234567', 2000.00, 'Excelente ubicación en una de las zonas más populares de la ciudad.', 'Ciudad de México', 'Ciudad de México', 'Condesa', 'Av. Tamaulipas', '19.4124', '-99.1743', TRUE, TRUE, TRUE, TRUE);

INSERT INTO inmuebles (arrendador, nombre, telefono, precioAlquiler, descripcion, estado, municipio, colonia, direccion, latitud, longitud, internet, agua, luz, garage)
VALUES (4, 'Departamento pequeño', '6649873210', 1000.00, 'Acogedor departamento ideal para una persona sola.', 'Guanajuato', 'Uriangato', 'Benito Juárez', 'Salvatierra #15', '20.14503', '-101.15303', FALSE, TRUE, TRUE, FALSE);

INSERT INTO inmuebles (arrendador, nombre, telefono, precioAlquiler, descripcion, estado, municipio, colonia, direccion, latitud, longitud, internet, agua, luz, garage)
VALUES (4, 'Cuarto espacioso', '4428765432', 1500.00, 'Amplio cuarto con mucha luz natural y ambiente tranquilo.', 'Guanajuato', 'Uriangato', 'Benito Juárez', 'Av. Educación Superior #2000', '20.14123', '-101.15008', TRUE, TRUE, TRUE, FALSE);

INSERT INTO inmuebles (arrendador, nombre, telefono, precioAlquiler, descripcion, estado, municipio, colonia, direccion, latitud, longitud, internet, agua, luz, garage)
VALUES (4, 'Departamento en segundo piso', '7223456789', 1600.00, 'Departamento recién remodelado con espacios amplios y acabados modernos.', 'Guanajuato', 'Yuriria', 'Antiguo de la Cruz Colorada', '5 de Mayo #55', '20.21306', '-101.13632', TRUE, TRUE, TRUE, FALSE);

