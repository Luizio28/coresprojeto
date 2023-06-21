create database requerimentos;
use requerimentos;


create table administradores(
    siape numeric(7) primary key,

    nome char(255) not null,
    email char(255) not null,
    curso numeric(1) not null,

    psswd char(255) not null
);


create table discente(
    matricula numeric(12) primary key,

    nome char(255) not null,
    email char(255) not null,
    fone numeric(11) not null,
    curso numeric(1) not null,
    turma numeric(1) not null,

    psswd char(255) not null
);


create table requerimento(
    id numeric primary key auto,

    discente_id numeric(11) foreign key discente(matricula),

    objeto numeric(2) not null,
    inicio date not null,
    termino date not null,
    registro datetime default(getdate()) not null,

    anexo varbinary(max) not null, 
    obs char(255),
    situacao numeric(1) not null
);


create table falta(
    requerimento_id numeric foreign key requerimento(id),
    docente_id numeric foreign key docente(id),
    faltas numeric(1)
);


create table docente(
    id numeric primary key auto,
    nome char(255) not null
);