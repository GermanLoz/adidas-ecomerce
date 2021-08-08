CREATE TABLE categorias(
    id int(20) NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(100),
    CONSTRAINT pk_categorias PRIMARY KEY(id)
) ENGINE=InnoDb;
CREATE TABLE usuarios(
    id int(255) NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    apellidos VARCHAR(255),
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    rol VARCHAR(20),
    imagen VARCHAR(255),
    CONSTRAINT pk_usuario PRIMARY KEY(id),
    CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb;
CREATE TABLE productos (
    id INT(100) AUTO_INCREMENT NOT NULL,
    categoria_id INT(20) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    precio FLOAT(100,2) NOT NULL, 
    imagen VARCHAR(255),
    stock int(255) NOT NULL,
    oferta VARCHAR(200),
    fecha date,
    CONSTRAINT pk_productos PRIMARY KEY(id),
    CONSTRAINT fk_producto_categorias FOREIGN KEY(categoria_id) REFERENCES categorias(id)
)ENGINE=InnoDb;
CREATE TABLE pedidos(
    id int(20) NOT NULL AUTO_INCREMENT,
    usuario_id int(10) NOT NULL,
    provincia VARCHAR(100),
    direccion VARCHAR(250) NOT NULL,
    coste FLOAT(200,2) NOT NULL,
    estado VARCHAR(100) NOT NULL,
    fecha date,
    hora TIME ,
    CONSTRAINT pk_pedidos PRIMARY KEY(id),
    CONSTRAINT fk_pedido_usuario FOREIGN KEY(usuario_id) REFERENCES usuarios(id)
)ENGINE=InnoDb;

CREATE TABLE lineas_pedidos(
    id int(255) AUTO_INCREMENT NOT NULL,
    pedidos_id INT(20) NOT NULL,
    producto_id INT(255) NOT NULL,
    unidades int(255) NOT NULL,
    CONSTRAINT pk_lineas_pedidos PRIMARY KEY(id),
    CONSTRAINT fk_linea_pedidos FOREIGN KEY(pedidos_id) REFERENCES pedidos(id),
    CONSTRAINT fk_linea_producto FOREIGN KEY(producto_id) REFERENCES productos(id)
)ENGINE=InnoDb;