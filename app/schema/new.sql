alter table users add column email varchar(150) after lname;
alter table users add column phone varchar(150) after email;
alter table users add column address varchar(150) after phone;


alter table cakes drop column category;
alter table cakes add column categoryid tinyint not null;



/*2019_28_10*/


alter table orders drop column product_id;
create table order_items(
	id int(10) not null primary key auto_increment,
	orderid tinyint(10) not null,
	productid tinyint(10) not null,
	quantity tinyint(10) not null,
	price decimal(10 , 2)
);


alter table cakecategory add column image text

alter table cakes add column image text;


create table carts(
	id int(10) not null primary key auto_increment ,
	token varchar(50) not null,
	productid int(10) not null,
	quantity  int(10) not null
);

alter table orders drop column fname , lname , mname;
alter table orders add column customername varchar(100);
alter table orders add column userid tinyint(10);


alter table users add column type enum('admin' , 'client') default 'client' after id

drop table if exists forget_pwd_request;

create table forget_pwd_request(
	id int(10) not null primary key auto_increment ,
	token varchar(100) not null,
	password_hash varchar(100) not null,
	password_generated varchar(100),
	userid int (10) not null,
	email_used varchar(100) not null,
	is_active boolean default true
);