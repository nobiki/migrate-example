create table test_mysql_table (
	id int primary key auto_increment,
	name varchar(255) not null
);
insert into test_mysql_table (name) values ('initial');
