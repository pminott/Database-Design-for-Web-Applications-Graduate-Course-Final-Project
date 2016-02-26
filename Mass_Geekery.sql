create database Mass_Geekery;

use Mass_Geekery;

create table members(
    memberID int unsigned not null auto_increment primary key,
    firstName varchar(18) not null,
    lastName varchar(18) not null,
    username varchar(60) not null,
    email varchar(60) not null,
    password varchar(40) not null,
    about varchar(360),
    image varchar(360)
);

create table memberMessages(
    memberMessagesID int unsigned not null auto_increment primary key,
    memberID int unsigned not null,
    messageID int unsigned not null
);

create table messages(
    messageID int unsigned not null auto_increment primary key,
    subject varchar(120) not null,
    message varchar(1000) not null,
    toMember varchar(60) not null,
    fromMember varchar(60) not null
);

create table memberCategory(
    memberID int unsigned not null,
    categoryID int unsigned not null
);


create table category(
    categoryID int unsigned not null auto_increment primary key,
    name varchar(30),
    description varchar(300)
);

create table forum(
    postID int unsigned not null auto_increment primary key,
    parent int(11) not null,
    memberID int not null,
    subject varchar(120) not null,
    children int(11) not null default '0',
    area int(11) not null default '1',
    posted datetime not null,
    message text not null
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

create table memberFandom(
    memberID int unsigned not null,
    fandomID int unsigned not null    
);

create table fandom(
    fandomID int unsigned not null auto_increment primary key,
    title varchar(120) not null,
    genreID int not null
);

create table genre(
    genreID int unsigned not null auto_increment primary key,
    name varchar(80)
);

create table fandomMedium(
    fandomID int unsigned not null,
    mediumID int unsigned not null  
);

create table mediums(
    mediumID int unsigned not null auto_increment primary key,
    name varchar(60)
);

create table admin
(
  username char(16) not null primary key,
  password char(40) not null
);

grant select, insert, update, delete
on Mass_Geekery.*
to Mass_Geekery@localhost identified by 'password';

