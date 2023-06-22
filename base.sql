create database requerimentos;
use requerimentos;


create table administradores(
    siape int(7) primary key,

    nome char(255) not null,
    email char(255) not null,
    curso int(1) not null,

    psswd binary(32) not null
);


create table discente(
    matricula int(12) primary key,

    nome char(255) not null,
    email char(255) not null,
    fone int(11) not null,
    curso int(1) not null,
    turma int(1) not null,

    psswd binary(32) not null
);


create table requerimento(
    id int primary key auto,

    discente_id int(12) foreign key discente(matricula),

    objeto int(1) not null,
    inicio date not null,
    termino date not null,
    registro datetime default(getdate()) not null,

    anexo varbinary(max) not null, 
    obs char(255),
    situacao int(1) not null
);


create table falta(
    requerimento_id int foreign key requerimento(id),
    docente_id int foreign key docente(id),
    faltas int(1)
);


create table docente(
    id numeric primary key auto,
    nome char(255) not null
);