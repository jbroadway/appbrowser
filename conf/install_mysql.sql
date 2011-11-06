create table appbrowser_app (
	id int not null auto_increment primary key,
	name char(48) not null,
	type char(12) not null,
	ts datetime not null,
	link char(72) not null,
	description text not null,
	index (name),
	index (type),
	index (ts)
);
