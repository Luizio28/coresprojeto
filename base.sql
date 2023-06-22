CREATE DATABASE requerimentos;
USE requerimentos;


CREATE TABLE administradores(
    siape INT(7) PRIMARY KEY,

    nome CHAR(255) NOT NULL,
    email CHAR(255) NOT NULL,
    curso INT(1) NOT NULL,

    psswd BINARY(32) NOT NULL
);


CREATE TABLE discente(
    matricula INT(12) PRIMARY KEY,

    nome CHAR(255) NOT NULL,
    email CHAR(255) NOT NULL,
    fone INT(11) NOT NULL,
    curso INT(1) NOT NULL,
    turma INT(1) NOT NULL,

    psswd BINARY(32) NOT NULL
);


CREATE TABLE requerimento(
    id INT PRIMARY KEY AUTO,

    objeto INT(1) NOT NULL,
    inicio DATE NOT NULL,
    termino DATE NOT NULL,
    registro DATETIME DEFAULT(GETDATE()) NOT NULL,

    anexo VARBINARY(MAS) NOT NULL, 
    obs CHAR(255),
    situacao INT(1) NOT NULL,

    FOREIGN KEY discente_id REFERENCES discente(matricula),
);


CREATE TABLE falta(
    faltas INT(1),
    FOREIGN KEY requerimento_id REFERENCES requerimento(id),
    FOREIGN KEY docente_id REFERENCES docente(id)
);


CREATE TABLE docente(
    id INT PRIMARY KEY AUTO,
    nome CHAR(255) NOT NULL
);