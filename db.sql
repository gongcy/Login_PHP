set names utf8;
create database db_reglog;
use db_reglog;

create table tb_member(
    id int(4) primary key auto_increment,
	name varchar(100) not null,
	password varchar(200) not null,
	answer varchar(100) not null,
	question varchar(100) not null,
	email varchar(100) not null,
	realname varchar(200) not null,
	birthday date not null,
	telephone varchar(20) not null,
	qq varchar(15),
	count int(1),
	active int(1)
)
