CREATE DATABASE `crud_zav` /*!40100 DEFAULT CHARACTER SET latin1 */

-- we don't know how to generate schema crud_zav (class Schema) :(
create table registros
(
	id int auto_increment
		primary key,
	name varchar(50) not null,
	email varchar(70) not null,
	mobile_phone int not null,
	reason varchar(5) not null,
	comment text null,
	constraint registros_id_uindex
		unique (id)
)
;
