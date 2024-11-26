create database php1tom;
use php1tom;

create table post(
	id int not null auto_increment primary key,
	title varchar(128),
	description varchar(512),
	created_at datetime
);

create table category(
	id int not null auto_increment primary key,
	title varchar(128)
);

create table post_category(
	post_id int not null,
	category_id int not null,
	foreign key (post_id) references post(id),
	foreign key (category_id) references category(id)
);

create database avengers;
use avengers;

create table status(
	idstatus int not null auto_increment primary key,
	status varchar(50)
  );
create table personajes(
	id int not null auto_increment primary key,
	nombre varchar(50),
	nombrereal varchar(50),
	poderes varchar(50),
	primeraaparicion varchar(50),
	foreign key (id) references status(idstatus)
);


CREATE TABLE notas_estudiantes_materias(
    id bigint unsigned not null primary key auto_increment,
    id_estudiante bigint unsigned not null,
    id_materia bigint unsigned not null,
    puntaje decimal(9,2) not null,
    foreign key (id_estudiante) references estudiantes(id) on delete cascade on update cascade,
    foreign key (id_materia) references materias(id) on delete cascade on update cascade
);

CREATE TABLE estudiantes(
    id bigint unsigned not null primary key auto_increment,
    nombre varchar(255) not null,
    grupo varchar(255) not null
);

CREATE TABLE materias(
    id bigint unsigned not null primary key auto_increment,
    nombre varchar(255) not null
);


CREATE TABLE notas_estudiantes_materias(
    id bigint unsigned not null primary key auto_increment,
    id_estudiante bigint unsigned not null,
    id_materia bigint unsigned not null,
    puntaje decimal(9,2) not null,
    foreign key (id_estudiante) references estudiantes(id) on delete cascade on update cascade,
    foreign key (id_materia) references materias(id) on delete cascade on update cascade
);


CREATE TABLE status(
  id bigint unsigned not null primary key auto_increment,
  nombre varchar(100) not null
  );
 CREATE TABLE personaje(
   id bigint unsigned not null primary key auto_increment,
   id_status bigint unsigned not null,
   nombre varchar(50),
   foreign key(id_status) references status(id) on delete cascade on update cascade
   );

   CREATE TABLE status(
  id bigint unsigned not null primary key auto_increment,
  nombre varchar(100) not null
  ) ENGINE=InnoDB;
  CREATE TABLE color(
  id bigint unsigned not null primary key auto_increment,
  color varchar(100) not null
  ) ENGINE=InnoDB;
 CREATE TABLE personaje(
   id bigint unsigned not null primary key auto_increment,
   id_status bigint unsigned not null,
   id_color bigint unsigned not null,
   nombre varchar(50),
   foreign key(id_status) references status(id) on delete cascade on update cascade,
   foreign key(id_color) references color(id) on delete cascade on update cascade
     ) ENGINE=InnoDB;

CREATE database amigos;
use amigos;
     CREATE TABLE color(
  id bigint unsigned not null primary key auto_increment,
  color varchar(100) not null
  ) ENGINE=InnoDB;
  CREATE TABLE sexo(
  id bigint unsigned not null primary key auto_increment,
  sexo varchar(100) not null
  ) ENGINE=InnoDB;
    CREATE TABLE mascota(
  id bigint unsigned not null primary key auto_increment,
  mascota varchar(100) not null
  ) ENGINE=InnoDB;
 CREATE TABLE amigo(
   id bigint unsigned not null primary key auto_increment,
   id_color bigint unsigned not null,
   id_sexo bigint unsigned not null,
   id_mascota bigint unsigned not null,
   nombre varchar(50),
   estatura varchar(5),
   hobby varchar(50),
   foreign key(id_color) references color(id) on delete cascade on update cascade,
   foreign key(id_mascota) references mascota(id) on delete cascade on update cascade,
   foreign key(id_sexo) references sexo(id) on delete cascade on update cascade
     ) ENGINE=InnoDB;