create table transaction
	(
		id int not null auto_increment,
		c_id varchar(10) not null,
		type varchar(10) not null,
		amount float not null,
		
		to_id varchar(10) null,
        e_id varchar(10) not null,
		primary key(id)
		);