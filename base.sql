CREATE DATABASE requerimentos;
USE requerimentos;

CREATE TABLE turma(
    id INT PRIMARY KEY AUTO_INCREMENT,
    turma CHAR(255)
);

CREATE TABLE docente (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome CHAR(255) NOT NULL
);

CREATE TABLE usuario (
    id CHAR(12) PRIMARY KEY,
    nome CHAR(255) NOT NULL,
    email CHAR(255) NOT NULL,
    fone BIGINT,
    superuser BOOLEAN DEFAULT 0,
    psswd CHAR(255) NOT NULL,
    diretorio_foto CHAR(255),
    turmaid INT,
    FOREIGN KEY (turmaid) REFERENCES turma(id)
);

CREATE TABLE requerimento (
    id INT PRIMARY KEY AUTO_INCREMENT,
    objeto TINYINT NOT NULL,
    inicio DATE NOT NULL,
    termino DATE NOT NULL,
    registro DATETIME DEFAULT CURRENT_TIMESTAMP,
    obs CHAR(255),
    diretorio_anexo CHAR(255) NOT NULL,
    situacao TINYINT DEFAULT 0,
    turmaid INT,
    usuario_id CHAR(12) NOT NULL,
    FOREIGN KEY (turmaid) REFERENCES turma(id),
    FOREIGN KEY (usuario_id) REFERENCES usuario(id)
);

CREATE TABLE falta (
    requerimento_id INT NOT NULL,
    docente_id INT NOT NULL,
    FOREIGN KEY (requerimento_id) REFERENCES requerimento(id),
    FOREIGN KEY (docente_id) REFERENCES docente(id)
);

INSERT INTO `turma`(`turma`) VALUES ('ei-11'), ('ei-12'), ('ei-21'), ('ei-22'), ('ei-31'), ('ei-32'), ('ei-41'), ('ei-42'), ('ed-11'), ('ed-12'), ('ed-21'), ('ed-22'), ('ed-31'), ('ed-32'), ('ed-41'), ('ed-42'), ('ema-11'), ('ema-12'), ('ema-21'), ('ema-22'), ('ema-31'), ('ema-32'), ('ema-41'), ('ema-42');