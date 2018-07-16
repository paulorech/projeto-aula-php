CREATE TABLE pessoa (
    id int NOT NULL AUTO_INCREMENT,
    nome varchar(255),
    email varchar(255),
    sexo varchar(1),
    data_nascimento timestamp,
    uf varchar(255),
    cidade varchar(255),
    PRIMARY KEY (id)
);

CREATE TABLE uf (
    id int NOT NULL AUTO_INCREMENT,
    nome varchar(255),
    uf_id int NOT NULL,
    PRIMARY KEY (id)
)

CREATE TABLE cidade (
    id int NOT NULL AUTO_INCREMENT,
    nome varchar(255),
    sigla varchar(255) NOT NULL,
    PRIMARY KEY (id)
)