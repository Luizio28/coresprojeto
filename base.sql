CREATE DATABASE requerimentos;
USE requerimentos;


CREATE TABLE usuario(
    id INT(12) PRIMARY KEY,

    nome CHAR(255) NOT NULL,
    email CHAR(255) NOT NULL,
    fone INT(11),
    curso INT(1) NOT NULL,
    turma INT(1),

    superuser BOOLEAN DEFAULT 0,
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

    FOREIGN KEY usuario_id REFERENCES usuario(id),
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