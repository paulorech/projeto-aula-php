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
    sigla varchar(2) NOT NULL,
    PRIMARY KEY (id)
)

CREATE TABLE cidade (
    id int NOT NULL AUTO_INCREMENT,
    nome varchar(255),
    sigla varchar(255) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO uf (nome, sigla) VALUES ('Acre', 'AC'); 
INSERT INTO uf (nome, sigla) VALUES ('Alagoas', 'AL');
INSERT INTO uf (nome, sigla) VALUES ('Amapá', 'AP');
INSERT INTO uf (nome, sigla) VALUES ('Amazonas', 'AM');
INSERT INTO uf (nome, sigla) VALUES ('Bahia', 'BA');
INSERT INTO uf (nome, sigla) VALUES ('Ceará', 'CE');
INSERT INTO uf (nome, sigla) VALUES ('Distrito Federal', 'DF');
INSERT INTO uf (nome, sigla) VALUES ('Espírito Santo', 'ES'); 
INSERT INTO uf (nome, sigla) VALUES ('Goiás', 'GO'); 
INSERT INTO uf (nome, sigla) VALUES ('Maranhão', 'MA'); 
INSERT INTO uf (nome, sigla) VALUES ('Mato Grosso', 'MT');
INSERT INTO uf (nome, sigla) VALUES ('Mato Grosso do Sul', 'MS');
INSERT INTO uf (nome, sigla) VALUES ('Minas Gerais', 'MG'); 
INSERT INTO uf (nome, sigla) VALUES ('Pará', 'PA');
INSERT INTO uf (nome, sigla) VALUES ('Paraíba', 'PB');
INSERT INTO uf (nome, sigla) VALUES ('Paraná', 'PR');  
INSERT INTO uf (nome, sigla) VALUES ('Pernambuco', 'PE');
INSERT INTO uf (nome, sigla) VALUES ('Piauí', 'PI');
INSERT INTO uf (nome, sigla) VALUES ('Rio de Janeiro', 'RJ');
INSERT INTO uf (nome, sigla) VALUES ('Rio Grande do Norte', 'RN');
INSERT INTO uf (nome, sigla) VALUES ('Rio Grande do Sul', 'RS');
INSERT INTO uf (nome, sigla) VALUES ('Rondonia', 'RO');
INSERT INTO uf (nome, sigla) VALUES ('Roraima', 'RR');
INSERT INTO uf (nome, sigla) VALUES ('Santa Catarina', 'SC');
INSERT INTO uf (nome, sigla) VALUES ('São Paulo', 'SP');
INSERT INTO uf (nome, sigla) VALUES ('Sergipe', 'SE');
INSERT INTO uf (nome, sigla) VALUES ('Tocantins', 'TO');


