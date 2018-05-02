use bacarodb;

insert into productos (id_producto, nombre, imagen, marca, descripcion, edicion, cantidad, precio, longitud, altura, ancho) values
(1, 'Macbook Pro 2017', 'img_server/macbook', 'Apple', 'Apple MJLQ2E/A MacBook Pro Pantalla de 15.4" Retina, Procesador Intel Core i7 2,2GHz, 16GB RAM, 256GB HDD', 'Estandar', 35, 39999.00, 33.7, 0.6, 30.3);

insert into clientes (nombre, apellido, correo, contrasena, cumpleanos, imagen_perfil, bio, tipo_cuenta, fecha_registro) values
('Rafael', 'Rodriguez', 'rafael.rodriguez@gmail.com', 'patito123', 19911103, 'No Existe', 'Genio, Playboy, Filántropo, Millonario.', 'C', 20180430);