create database if not exists animes;
use animes;

create or replace table desenhos(
    id int primary key auto_increment,
    nome varchar(250) not null,
    genero varchar(250) not null ,
    episodios varchar(250) not null,
    lancamento date not null,
    created_at TIMESTAMP not null default CURRENT_TIMESTAMP 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

alter table desenhos add column foto text not null default "" after nome;

create or replace table login(
    id int primary key auto_increment,
    email varchar(250) not null unique,
    senha varchar(255) not null,
    created_at TIMESTAMP not null default CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

insert into login(email, senha) values ('admin@senac.com.br', md5('admin@123'));
