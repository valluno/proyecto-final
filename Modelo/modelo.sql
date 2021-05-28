
USE valluno;

CREATE TABLE IF NOT EXISTS roles(
id_rol INT NOT NULL AUTO_INCREMENT,
nombre VARCHAR(100) NOT NULL,
descripcion VARCHAR(300) NOT NULL,
estado varchar(30),
PRIMARY KEY(id_rol)
);

CREATE TABLE IF NOT EXISTS usuarios(
 id_usuario int not null AUTO_INCREMENT,
 id_rol int not null,
 nombres VARCHAR(25) NOT NULL,
 usuarios VARCHAR(25)NOT NULL UNIQUE,
 contrasenas VARCHAR(255)NOT NULL,
 sexo VARCHAR(9),
 estado varchar(30),
 PRIMARY key(id_usuario,id_rol),
 FOREIGN KEY(id_rol)
 REFERENCES roles(id_rol)
 ON UPDATE CASCADE 
 ON DELETE RESTRICT
);

create table if not EXISTS paises(
  id_pais int not null AUTO_INCREMENT,
  nombres varchar(30),
  descripcion varchar(300),
  estado varchar(30),
  primary key(id_pais)
);

create table if not EXISTS ciudad(
  id_ciudad int not null AUTO_INCREMENT,
  id_pais int not null,
  nombres varchar(30),
  descripcion varchar(300),
  estado varchar(30),
  primary key(id_ciudad,id_pais),
  FOREIGN KEY(id_pais)
  REFERENCES paises(id_pais)
  ON UPDATE CASCADE 
  ON DELETE RESTRICT
);

create table if not EXISTS sede(
  id_sede int not null AUTO_INCREMENT,
  id_ciudad int not null,
  nombres varchar(30),
  direccion varchar(300),
  estado varchar(30),
  primary key(id_sede,id_ciudad),
  FOREIGN KEY(id_ciudad)
  REFERENCES ciudad(id_ciudad)
  ON UPDATE CASCADE 
  ON DELETE RESTRICT
);

create table if not EXISTS proveedores(
  id_proveedor int not null AUTO_INCREMENT,
  nombre_proveedor varchar(30),
  dir_proveedor varchar(30),
  estado varchar(30),
  primary key(id_proveedor)
);

/*INSERT INTO roles(nombre,descripcion)VALUE('Admin','Usuario administrador');
INSERT INTO roles(nombre,descripcion)VALUE('director','director de sedes');
INSERT INTO roles(nombre,descripcion)VALUE('vendedores','vendedores');
INSERT INTO roles(nombre,descripcion)VALUE('gerente','Gerente de Producción');
INSERT INTO roles(nombre,descripcion)VALUE('gerente de ventas','Gerente de ventas');
INSERT INTO roles(nombre,descripcion)VALUE('gerente de clientes','Gerente de clientes');
INSERT INTO roles(nombre,descripcion)VALUE('cliente','El que compra');


INSERT INTO usuarios(id_rol,nombres,usuarios,contrasenas,sexo,estado)VALUES(1,'Pepito','admin','pv3LsxNIAjRtY','Masculino','Activo');*/
