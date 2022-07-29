create database our_blog;
use our_blog;
create table tbl_user(
                         id int auto_increment primary key,
                         first_name varchar(50) not null,
                         last_name varchar(50) not null,
                         email varchar(50) not null unique,
                         password varchar(10)
);

create table tbl_cat(
                        id int auto_increment primary key,
                        name varchar(50) unique not null
);

create table tbl_post(
                         id int auto_increment primary key,
                         tittle varchar(255) not null,
                         description text not null,
                         create_time date not null,
                         update_time date not null,
                         cover varchar(255) not null,
                         liked int default(0),
                         disliked int default(0),
                         author_id int not null,
                         foreign key(author_id) references tbl_user(id),
                         cat_id int not null,
                         foreign key(cat_id) references tbl_cat(id)

);