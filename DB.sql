create database API_PHP;

use API_PHP;

create table employees(
	idEmployee bigint primary key auto_increment not null,
    name varchar(150) not null,
    phone varchar(8) not null,
    email varchar(50),
    isActive bit not null
);
