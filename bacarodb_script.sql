create database bacarodb;
use bacarodb;

create table clientes (
	id_cliente int primary key auto_increment,
    nombre varchar(30) not null,
    apellido varchar(30) not null,
    correo varchar(30) not null,
    contrasena varchar(10) not null,
    cumpleanos date,
    imagen_perfil varchar(200),
    bio varchar(240),
    tipo_cuenta char(1) not null,
    fecha_registro date not null
);

create table productos (
	id_producto int primary key auto_increment,
    nombre varchar (200) not null,
    imagen varchar (200) not null,
    marca varchar (30) not null,
    descripcion varchar (2000),
    edicion varchar (20),
    cantidad int not null default 0,
    precio double not null default 999999,
    longitud float default 1,
    altura float default 1,
    ancho float default 1
);

create table categorias (
	id_categoria int primary key auto_increment,
    nombre varchar (30) not null
);

create table carritos (
	id_producto int not null,
    cantidad int not null default 1,
    id_cliente int not null,
    foreign key (id_producto) references productos(id_producto),
    foreign key (id_cliente) references clientes(id_cliente),
    primary key (id_producto, id_cliente)
);

create table categorias_productos (
	id_categoria int not null,
    id_producto int not null,
    foreign key (id_categoria) references categorias (id_categoria),
    foreign key (id_producto) references productos (id_producto),
    primary key (id_categoria, id_producto)
);

create table ventas (
	id_venta int primary key,
    id_cliente int not null,
    fecha_compra date not null,
    fecha_entrega date,
    estado char (1) default 'P',
    direccion varchar (50) not null,
    total double not null,
    foreign key (id_cliente) references clientes (id_cliente)
);

create table detalles_venta (
	id_producto int not null,
    cantidad int not null default 1,
    id_venta int not null,
    foreign key (id_producto) references productos (id_producto),
    foreign key (id_venta) references ventas (id_venta),
    primary key (id_producto, id_venta)
);

create table reviews (
	id_review int primary key auto_increment,
    titulo varchar (50) not null,
    descripcion varchar (500) not null,
    calificacion decimal (1, 1) not null
);