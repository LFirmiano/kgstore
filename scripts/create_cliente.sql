-- CODIGO PARA MYSQL

CREATE TABLE cliente (
    id_cliente INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(200) NOT NULL,
    email VARCHAR(200) NOT NULL,
    telefone VARCHAR(200) NOT NULL,
    endereco VARCHAR(200) NOT NULL,
    data_nascimento DATETIME NOT NULL
)