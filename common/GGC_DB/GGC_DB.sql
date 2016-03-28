DROP TABLE IF EXISTS grupos_personas, tareas, gastos, ingresos, notificaciones, personas, grupos, agendas, cajas, pagos, categorias;

CREATE TABLE
cajas(

    id bigint NOT NULL AUTO_INCREMENT,
    monto_disponible decimal(10,2),
    monto_inicial decimal NOT NULL,
    fecha_cierre TIMESTAMP,
    observacion VARCHAR(200),
    ultima_mod TIMESTAMP NOT NULL,
    PRIMARY KEY (id)

);

CREATE TABLE
agendas(

    id bigint NOT NULL AUTO_INCREMENT,
    anio integer NOT NULL,
    PRIMARY KEY (id)

);

CREATE TABLE
categorias(

    id bigint NOT NULL AUTO_INCREMENT,
    nombre varchar(40) NOT NULL,
    descripcion varchar(200),
    ultima_mod TIMESTAMP NOT NULL,
    PRIMARY KEY (id)

);

CREATE TABLE
personas(

    id bigint NOT NULL AUTO_INCREMENT,
    id_usuario int(11) NOT NULL,
    ci varchar(8) NOT NULL,
    apellido varchar(30) NOT NULL,
    nombre varchar(30) NOT NULL,
    celular varchar(20) NOT NULL,
    fecha_nac TIMESTAMP NOT NULL,
    id_agenda bigint,
    ultima_mod TIMESTAMP NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY(id_agenda) REFERENCES agendas(id) ON DELETE CASCADE,
    FOREIGN KEY(id_usuario) REFERENCES user(id) ON DELETE CASCADE

);

CREATE TABLE
ingresos(

    id bigint NOT NULL AUTO_INCREMENT,
    id_persona bigint NOT NULL,
    monto decimal(10,2),
    ultima_mod TIMESTAMP NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY(id_persona) REFERENCES personas(id) ON DELETE CASCADE

);

CREATE TABLE
grupos(

  	id bigint NOT NULL AUTO_INCREMENT,
    id_agenda bigint NOT NULL,
  	nombre varchar(100) NOT NULL,
  	observacion varchar(200) NOT NULL,
  	fechaCreacion TIMESTAMP NOT NULL,
    ultima_mod TIMESTAMP NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY(id_agenda) REFERENCES agendas(id) ON DELETE CASCADE

);

CREATE TABLE
notificaciones(

  	id bigint NOT NULL AUTO_INCREMENT,
    id_persona bigint,
    id_grupo bigint,
    fecha TIMESTAMP NOT NULL,
    titulo VARCHAR(100) NOT NULL,
    descripcion VARCHAR(150),
    repite int DEFAULT 0,
    ultima_mod TIMESTAMP NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY(id_persona) REFERENCES personas(id) ON DELETE CASCADE,
    FOREIGN KEY(id_grupo) REFERENCES grupos(id) ON DELETE CASCADE

);

/* Relacion entre grupos y personas */
CREATE TABLE
grupos_personas(

  	id_persona bigint NOT NULL,
  	id_grupo bigint NOT NULL,
  	PRIMARY KEY(id_persona, id_grupo),
    FOREIGN KEY(id_persona) REFERENCES personas(id) ON DELETE CASCADE,
    FOREIGN KEY(id_grupo) REFERENCES grupos(id) ON DELETE CASCADE

);

CREATE TABLE
pagos(

  	id bigint NOT NULL AUTO_INCREMENT,
  	evidencia VARCHAR(100),
  	observacion varchar(300) NOT NULL,
  	ultima_mod TIMESTAMP NOT NULL,
    PRIMARY KEY (id)

);

CREATE TABLE
gastos(

  	id bigint NOT NULL AUTO_INCREMENT,
    id_categoria bigint NOT NULL,
    id_grupo bigint,
    id_persona bigint NOT NULL,
    id_pago bigint NOT NULL,
  	concepto varchar(100) NOT NULL,
  	valor decimal(10,2),
  	evidencia varchar(100),
  	observacion varchar(300) NOT NULL,
    esFijo TINYINT(1) NOT NULL,
  	ultima_mod TIMESTAMP NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY(id_categoria) REFERENCES categorias(id) ON DELETE CASCADE,
    FOREIGN KEY(id_persona) REFERENCES personas(id) ON DELETE CASCADE,
    FOREIGN KEY(id_pago) REFERENCES pagos(id) ON DELETE CASCADE

);


CREATE TABLE
tareas(

  	id bigint NOT NULL AUTO_INCREMENT,
  	id_gasto bigint NOT NULL,
    id_agenda bigint NOT NULL,
    titulo varchar(60),
  	descripcion varchar(300) NOT NULL,
  	ultima_mod TIMESTAMP NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY(id_gasto) REFERENCES gastos(id) ON DELETE CASCADE,
    FOREIGN KEY(id_agenda) REFERENCES agendas(id) ON DELETE CASCADE

);

/*******************************************************************************/
