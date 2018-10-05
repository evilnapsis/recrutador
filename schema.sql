/* 
@author: evilnapsis
@brief: updated 2018 
*/
create database recrutador;
use recrutador;

create table category(
	id int not null auto_increment primary key,
	name varchar(255)
);

create table place(
	id int not null auto_increment primary key,
	name varchar(255)
);

create table job(
	id int not null auto_increment primary key,
	name varchar(255),
	description varchar(511),
	requirements varchar(511),
	limit_at date,
	created_at datetime,
	status int,
	category_id int not null,
	foreign key (category_id) references category(id),
	place_id int not null,
	foreign key (place_id) references place(id)
);


create table person(
	id int not null auto_increment primary key,
	name varchar(255),
	lastname varchar(255),
	file varchar(255),
	phone varchar(255),
	email varchar(255),
	job_id int not null,
	created_at datetime,
	status int default 1,
	foreign key (job_id) references job(id)
);



create table user(
	id int not null auto_increment primary key,
	name varchar(50),
	lastname varchar(50),
	username varchar(50),
	email varchar(255),
	password varchar(60),
	image varchar(255),
	status int default 1,
	kind int default 1, 
	created_at datetime
);

/**
* password: encrypted using sha1(md5("mypassword"))
* status: 1. active, 2. inactive, 3. other, ...
* kind: 1. root, 2. other, ...
**/

insert into user (name,username,password,kind,created_at) value ("Administrator","admin",sha1(md5("admin")),1,NOW());


