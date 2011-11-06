create table appbrowser_app (
	id integer primary key,
	name char(48) not null,
	type char(12) not null,
	ts datetime not null,
	link char(72) not null,
	description text not null
);

create index appbrowser_app_name on appbrowser_app (name);
create index appbrowser_app_type on appbrowser_app (type);
create index appbrowser_app_ts on appbrowser_app (ts);
