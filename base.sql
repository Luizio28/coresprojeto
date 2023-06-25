CREATE DATABASE requerimentos;
USE requerimentos;

CREATE TABLE usuario (
    id BIGINT PRIMARY KEY,
    nome CHAR(255) NOT NULL,
    email CHAR(255) NOT NULL,
    fone BIGINT,
    curso TINYINT NOT NULL,
    turma TINYINT,
    superuser BOOLEAN DEFAULT 0,
    psswd char(255) NOT NULL
);

CREATE TABLE requerimento (
    id INT PRIMARY KEY AUTO_INCREMENT,
    objeto TINYINT NOT NULL,
    inicio DATE NOT NULL,
    termino DATE NOT NULL,
    registro DATETIME DEFAULT CURRENT_TIMESTAMP,
    anexo LONGBLOB NOT NULL,
    obs CHAR(255),
    situacao TINYINT DEFAULT 0,
    usuario_id BIGINT NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuario(id)
);

CREATE TABLE docente (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome CHAR(255) NOT NULL
);

CREATE TABLE falta (
    faltas TINYINT NOT NULL,
    requerimento_id INT,
    docente_id INT,
    FOREIGN KEY (requerimento_id) REFERENCES requerimento(id),
    FOREIGN KEY (docente_id) REFERENCES docente(id)
);
